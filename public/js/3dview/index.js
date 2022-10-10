import * as THREE from 'three';
import { OrbitControls } from '../../vendor/three/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from '../../vendor/three/examples/jsm/loaders/GLTFLoader.js';
import { DRACOLoader } from '../../vendor/three/examples/jsm/loaders/DRACOLoader.js';
import { RoomEnvironment } from '../../vendor/environments/RoomEnvironment.js';

// Get 3dfile
const file3d = document.querySelector('#file3d');

// Canvas
const canvas = document.querySelector('.result');
// Scene
const scene = new THREE.Scene();
scene.background = new THREE.Color(0xbbbbbb);

// Models
const gltfLoader = new GLTFLoader();
const dracoLoader = new DRACOLoader();

dracoLoader.setDecoderPath('https://www.gstatic.com/draco/v1/decoders/');
gltfLoader.setDRACOLoader(dracoLoader);

let mixer = null;
let product = null;
gltfLoader.load(`${file3d.value}`, (glb) => {
  product = glb;
  mixer = new THREE.AnimationMixer(product.scene);
  const clips = glb.animations;
  clips.forEach((clip) => {
    const action = mixer.clipAction(clip);
    action.play();
  });
  scene.add(product.scene);
});

// Lights
// const ambientLight = new THREE.HemisphereLight(0xdddddd, 0x111111, 4);
// ambientLight.position.set(0.5, 1, 0.25);
// scene.add(ambientLight);

// const directionalLights = new THREE.DirectionalLight(0xffffff);
// directionalLights.castShadow = true;
// directionalLights.position.set(1, 1, 1).normalize();
// scene.add(directionalLights);
const hlight = new THREE.AmbientLight( 0x404040, 1 );
scene.add( hlight );

const directionalLight = new THREE.DirectionalLight( 0xffffff, 1);
directionalLight.castShadow = true;
directionalLight.shadow.camera.top = 4;
directionalLight.shadow.camera.bottom = - 4;
directionalLight.shadow.camera.left = - 4;
directionalLight.shadow.camera.right = 4;
directionalLight.shadow.camera.near = 0.1;
directionalLight.shadow.camera.far = 40;
directionalLight.shadow.camera.far = 40;
directionalLight.shadow.bias = - 0.002;
directionalLight.position.set(0, 20, 20);
scene.add(directionalLight);

// const light4 = new THREE.PointLight(0xc4c4c4,10);
// light4.position.set(-100,0,50);
// scene.add(light4);

const light2 = new THREE.PointLight(0xc4c4c4,10);
light2.position.set(100,100,0);
scene.add(light2);

// Sizes
const sizes = {
  width: innerWidth,
  height: innerHeight,
};

// Camera
const camera = new THREE.PerspectiveCamera(
  10,
  sizes.width / sizes.height,
  0.1,
  100,
);

camera.position.set(0, 2, 10);
// camera.position.set( 7, 3, 7 );
scene.add(camera);

// Control
const control = new OrbitControls(camera, canvas);
control.enableDamping = true;
control.target.set(0, 0.3, 0);
control.autoRotate = false;
control.enableRotate = true;

// Renderer
// const renderer = new THREE.WebGLRenderer({
//   canvas,
//   alpha: true,
//   antialias: true,
// });
// renderer.shadowMap.enabled = true;
// renderer.shadowMap.type = THREE.PCFSoftShadowMap;
// renderer.setSize(sizes.width, sizes.height);
// renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
const renderer = new THREE.WebGLRenderer( { canvas,antialias: true } );
renderer.setPixelRatio( window.devicePixelRatio );
renderer.setSize( window.innerWidth, window.innerHeight );
renderer.toneMapping = THREE.ACESFilmicToneMapping;
renderer.outputEncoding = THREE.sRGBEncoding;
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

// const environment = new RoomEnvironment();
const pmremGenerator = new THREE.PMREMGenerator(renderer);

pmremGenerator.compileEquirectangularShader();
// scene.environment = pmremGenerator.fromScene(environment).texture;

// Resize
window.addEventListener('resize', () => {
  // Update sizes
  sizes.width = window.innerWidth;
  sizes.height = window.innerHeight;

  // Update camera
  camera.aspect = sizes.width / sizes.height;
  camera.updateProjectionMatrix();

  // Update renderer
  renderer.setSize(sizes.width, sizes.height);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
});

// Full Screen
window.addEventListener('dblclick', () => {
  const fullscreenElement = document.fullscreenElement || document.webkitRequestFullscreen;

  if (!fullscreenElement) {
    if (canvas.requestFullscreen) {
      canvas.requestFullscreen();
    } else if (canvas.webkitRequestFullscreen) {
      canvas.webkitRequestFullscreen();
    }
  } else if (document.exitFullscreen) {
    // eslint-disable-next-line no-unused-expressions
    document.exitFullscreen;
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  }
});

// animate
const clock = new THREE.Clock();
let previousTime = 0;

const loop = () => {
  const elapsedTime = clock.getElapsedTime();
  const deltaTime = elapsedTime - previousTime;
  previousTime = elapsedTime;

  if (mixer) {
    mixer.update(deltaTime);
  }

  control.update();
  renderer.render(scene, camera);

  window.requestAnimationFrame(loop);
};

loop();
