// import 'regenerator-runtime';

import * as THREE from 'three';
import { GLTFLoader } from '/jsm/loaders/GLTFLoader';
import { RGBELoader } from '/jsm/loaders/RGBELoader';
import { OrbitControls } from '/jsm/controls/OrbitControls';
import LoadingBar from '../../libs/LoadingBar';
// import XRGestures from '../public/libs/XRGestures';

class App {
  constructor() {
    const container = document.createElement('div');
    document.body.appendChild(container);

    this.clock = new THREE.Clock();

    this.loadingBar = new LoadingBar();
    this.loadingBar.visible = false;

    this.assetsPath = 'models/';
    this.fileName = document.getElementById('file3dar').value;

    this.camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.01, 20);
    this.camera.position.set(0, 1.6, 0);

    this.scene = new THREE.Scene();

    const ambient = new THREE.HemisphereLight(0x606060, 0x404040);
    ambient.position.set(0.5, 1, 0.25);
    this.scene.add(ambient);

    const light = new THREE.DirectionalLight(0xffffff);
    light.position.set(1, 1, 1).normalize();
    this.scene.add(light);

    this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    this.renderer.setPixelRatio(window.devicePixelRatio);
    this.renderer.setSize(window.innerWidth, window.innerHeight);
    this.renderer.outputEncoding = THREE.sRGBEncoding;
    container.appendChild(this.renderer.domElement);
    this.setEnvironment();

    this.reticle = new THREE.Mesh(
      new THREE.RingBufferGeometry(0.15, 0.2, 32).rotateX(-Math.PI / 2),
      new THREE.MeshBasicMaterial(),
    );

    this.reticle.matrixAutoUpdate = false;
    this.reticle.visible = false;
    this.scene.add(this.reticle);

    this.setupXR();

    window.addEventListener('resize', this.resize.bind(this));

    this.renderer.domElement.addEventListener('touchstart', (e) => {
      e.preventDefault();
      touchDown = true;
      touchX = e.touches[0].pageX;
      touchY = e.touches[0].pageY;
    }, false);

    this.renderer.domElement.addEventListener('touchend', (e) => {
      e.preventDefault();
      touchDown = false;
    }, false);

    this.renderer.domElement.addEventListener('touchmove', (e) => {
      e.preventDefault();

      if (!touchDown) {
        return;
      }

      deltaX = e.touches[0].pageX - touchX;
      deltaY = e.touches[0].pageY - touchY;
      touchX = e.touches[0].pageX;
      touchY = e.touches[0].pageY;

      rotateObject();
    }, false);
  }

  rotateObject() {
    const self = this;
    if (current_object && self.eereticle.visible) {
      current_object.rotation.y += deltaX / 100;
    }
  }

  setupXR() {
    this.renderer.xr.enabled = true;

    if ('xr' in navigator) {
      navigator.xr.isSessionSupported('immersive-ar').then((supported) => {
        if (supported) {
          const collection = document.getElementsByClassName('ar-button');
          // const notSupport = document.getElementsById('not-support');
          [...collection].forEach((el) => {
            el.style.display = 'block';
            // notSupport.style.display = 'none';
          });
        }
      });
    }

    // this.gestures = new XRGestures(this.renderer);
    const self = this;

    this.hitTestSourceRequested = false;
    this.hitTestSource = null;

    function onSelect() {
      if (self.product === undefined) return;

      if (self.reticle.visible) {
        self.product.position.setFromMatrixPosition(self.reticle.matrix);
        self.product.visible = true;
      }
    }

    this.controller = this.renderer.xr.getController(0);
    this.controller.addEventListener('select', onSelect);

    this.scene.add(this.controller);
  }

  resize() {
    this.camera.aspect = window.innerWidth / window.innerHeight;
    this.camera.updateProjectionMatrix();
    this.renderer.setSize(window.innerWidth, window.innerHeight);
  }

  setEnvironment() {
    const loader = new RGBELoader().setDataType(THREE.UnsignedByteType);
    const pmremGenerator = new THREE.PMREMGenerator(this.renderer);
    pmremGenerator.compileEquirectangularShader();

    const self = this;

    loader.load('/hdr/apartment.hdr', (texture) => {
      const envMap = pmremGenerator.fromEquirectangular(texture).texture;
      pmremGenerator.dispose();

      self.scene.environment = envMap;
    }, undefined, (err) => {
      console.error('An error occurred setting the environment');
    });
  }

  showProduct() {
    this.initAR();

    console.log(this.fileName);

    // const loader = new GLTFLoader().setPath(this.assetsPath);
    // const self = this;

    // this.loadingBar.visible = true;

    // // Load a glTF resource
    // loader.load(
    //   // resource URL
    //   `${this.fileName}.glb`,
    //   // called when the resource is loaded
    //   (gltf) => {
    //     self.product = gltf.scene;
    //     self.scene.add(self.product);

    //     self.product.visible = false;

    //     self.loadingBar.visible = false;

    //     this.mixer = new THREE.AnimationMixer(self.product);
    //     const clips = gltf.animations;
    //     clips.forEach((clip) => {
    //       const action = this.mixer.clipAction(clip);
    //       action.play();
    //     });
    //     self.renderer.setAnimationLoop(self.render.bind(self));
    //   },
    //   // called while loading is progressing
    //   (xhr) => {
    //     self.loadingBar.progress = (xhr.loaded / xhr.total);
    //   },
    //   // called when loading has errors
    //   (error) => {
    //     console.log('An error happened');
    //   },
    // );
  }

  initAR() {
    let currentSession = null;
    const self = this;

    this.controls = new OrbitControls(this.camera, this.renderer.domElement);
    this.controls.minDistance = 2;
    this.controls.maxDistance = 10;
    this.controls.target.set(0, 0, -0.2);
    this.controls.enableDamping = true;
    this.controls.dampingFactor = 0.05;
    console.log(this.controls);

    const sessionInit = { requiredFeatures: ['hit-test'] };

    function onSessionStarted(session) {
      session.addEventListener('end', onSessionEnded);

      self.renderer.xr.setReferenceSpaceType('local');
      self.renderer.xr.setSession(session);

      currentSession = session;
    }

    function onSessionEnded() {
      currentSession.removeEventListener('end', onSessionEnded);

      currentSession = null;

      if (self.product !== null) {
        self.scene.remove(self.product);
        self.product = null;
      }

      self.renderer.setAnimationLoop(null);
    }

    if (currentSession === null) {
      navigator.xr.requestSession('immersive-ar', sessionInit).then(onSessionStarted);
    } else {
      currentSession.end();
    }
  }

  requestHitTestSource() {
    const self = this;

    const session = this.renderer.xr.getSession();

    session.requestReferenceSpace('viewer').then((referenceSpace) => {
      session.requestHitTestSource({ space: referenceSpace }).then((source) => {
        self.hitTestSource = source;
      });
    });

    session.addEventListener('end', () => {
      self.hitTestSourceRequested = false;
      self.hitTestSource = null;
      self.referenceSpace = null;
    });

    this.hitTestSourceRequested = true;
  }

  getHitTestResults(frame) {
    const hitTestResults = frame.getHitTestResults(this.hitTestSource);

    if (hitTestResults.length) {
      const referenceSpace = this.renderer.xr.getReferenceSpace();
      const hit = hitTestResults[0];
      const pose = hit.getPose(referenceSpace);

      this.reticle.visible = true;
      this.reticle.matrix.fromArray(pose.transform.matrix);
    } else {
      this.reticle.visible = false;
    }
  }

  render(timestamp, frame) {
    if (frame) {
      if (this.hitTestSourceRequested === false) this.requestHitTestSource();

      if (this.hitTestSource) this.getHitTestResults(frame);
    }

    const dt = this.clock.getDelta();
    this.mixer.update(dt);
    this.controls.update();
    // if (this.product !== undefined) this.product.update(dt);
    this.renderer.render(this.scene, this.camera);
  }
}
export default App;
