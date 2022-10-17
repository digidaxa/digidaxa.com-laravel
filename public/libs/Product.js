/* eslint-disable no-shadow */
/* eslint-disable max-len */
import * as THREE from 'three';

class Product {
  constructor(options) {
    const fps = options.fps || 30; // default fps

    this.assetsPath = options.assetsPath;
    this.name = options.name || 'Player';

    this.animations = {};

    options.app.scene.add(options.object);

    this.object = options.object;
    this.pathLines = new THREE.Object3D();
    this.pathColor = new THREE.Color(0xFFFFFF);
    options.app.scene.add(this.pathLines);

    this.npc = options.npc;

    if (this.npc) this.dead = false;

    this.speed = options.speed;
    this.app = options.app;

    if (options.app.pathfinder) {
      this.pathfinder = options.app.pathfinder;
      this.ZONE = options.app.ZONE;
      this.navMeshGroup = this.pathfinder.getGroup(this.ZONE, this.object.position);
    }

    const { clip } = options;
    const self = this;

    const pt = this.object.position.clone();
    pt.z += 10;
    this.object.lookAt(pt);

    if (options.anims) {
      // Use this option to crop a single animation into multiple clips
      this.mixer = new THREE.AnimationMixer(options.object);
      options.anims.forEach((anim) => {
        self.animations[anim.name] = THREE.AnimationUtils.subclip(clip, anim.name, anim.start, anim.end);
      });
    }

    if (options.animations) {
      // Use this option to set multiple animations directly
      this.mixer = new THREE.AnimationMixer(options.object);
      options.animations.forEach((animation) => {
        self.animations[animation.name.toLowerCase()] = animation;
      });
    }
  }

  setTargetDirection() {
    const product = this.object;
    const pt = this.calculatedPath[0].clone();
    pt.y = product.position.y;
    const quaternion = product.quaternion.clone();
    product.lookAt(pt);
    this.quaternion = product.quaternion.clone();
    product.quaternion.copy(quaternion);
  }

  showPathLines() {
    if (this.pathLines) this.app.scene.remove(this.pathLines);

    const material = new THREE.LineBasicMaterial({
      color: this.pathColor,
      linewidth: 2,
    });

    const product = this.object;
    const self = this;

    const points = [product.position];

    // Draw debug lines
    this.calculatedPath.forEach((vertex) => {
      points.push(vertex.clone());
    });

    const geometry = new THREE.BufferGeometry().setFromPoints(points);

    this.pathLines = new THREE.Line(geometry, material);
    this.app.scene.add(this.pathLines);

    // Draw debug spheres except the last one. Also, add the product position.
    const debugPath = [product.position].concat(this.calculatedPath);
    const geo = new THREE.SphereBufferGeometry(this.nodeRadius);
    const mat = new THREE.MeshBasicMaterial({ color: this.pathColor });
    const offset = this.app.debug.offset || 0;

    debugPath.forEach((vertex) => {
      const node = new THREE.Mesh(geo, mat);
      node.position.copy(vertex);
      node.position.y += offset;
      self.pathLines.add(node);
    });
  }

  newPath(pt) {
    const product = this.object;

    if (this.pathfinder === undefined) {
      this.calculatedPath = [pt.clone()];
      // Calculate target direction
      this.setTargetDirection();
      this.action = 'walk';
      return;
    }

    // console.log(`New path to ${pt.x.toFixed(1)}, ${pt.y.toFixed(2)}, ${pt.z.toFixed(2)}`);

    const targetGroup = this.pathfinder.getGroup(this.ZONE, pt);
    const closestTargetNode = this.pathfinder.getClosestNode(pt, this.ZONE, targetGroup);

    // Calculate a path to the target and store it
    this.calculatedPath = this.pathfinder.findPath(product.position, pt, this.ZONE, this.navMeshGroup);

    const self = this;

    if (this.calculatedPath && this.calculatedPath.length) {
      this.action = 'walk';

      const pt = this.calculatedPath[0].clone();
      this.setTargetDirection();

      if (this.app.debug.showPath && !this.npc) {
        this.showPathLines();
      }
    } else {
      this.action = 'idle';

      if (self.pathfinder) {
        const closestProductNode = self.pathfinder.getClosestNode(product.position, this.ZONE, this.navMeshGroup);
        const clamped = new THREE.Vector3();
        this.pathfinder.clampStep(
          product.position,
          pt.clone(),
          closestProductNode,
          this.ZONE,
          this.navMeshGroup,
          clamped,
        );
      }

      if (this.pathLines) this.app.scene.remove(this.pathLines);
    }
  }

  set action(name) {
    // Make a copy of the clip if this is a remote player
    if (this.actionName === name.toLowerCase()) return;

    const clip = this.animations[name.toLowerCase()];

    delete this.curAction;

    if (clip !== undefined) {
      const action = this.mixer.clipAction(clip);
      action.loop = clip.loop;
      action.time = 0;
      this.mixer.stopAllAction();
      this.actionName = name.toLowerCase();
      this.actionTime = Date.now();
      action.fadeIn(0.5);
      action.play();
      this.curAction = action;
    }
  }

  update(dt) {
    const { speed } = this;
    const product = this.object;

    if (this.mixer) this.mixer.update(dt);

    if (this.calculatedPath && this.calculatedPath.length) {
      const targetPosition = this.calculatedPath[0];

      const vel = targetPosition.clone().sub(product.position);

      let pathLegComplete = (vel.lengthSq() < 0.01);

      if (!pathLegComplete) {
        // Get the distance to the target before moving
        const prevDistanceSq = product.position.distanceToSquared(targetPosition);
        vel.normalize();
        // Move product to target
        if (this.quaternion) product.quaternion.slerp(this.quaternion, 0.1);
        product.position.add(vel.multiplyScalar(dt * speed));
        // Get distance after moving, if greater then we've overshot and this leg is complete
        const newDistanceSq = product.position.distanceToSquared(targetPosition);
        pathLegComplete = (newDistanceSq > prevDistanceSq);
      }

      if (pathLegComplete) {
        // Remove node from the path we calculated
        this.calculatedPath.shift();
        if (this.calculatedPath.length === 0) {
          if (this.npc) {
            this.newPath(this.app.randomWaypoint);
          } else {
            product.position.copy(targetPosition);
            this.action = 'idle';
          }
        } else {
          const pt = this.calculatedPath[0].clone();
          pt.y = product.position.y;
          const quaternion = product.quaternion.clone();
          product.lookAt(pt);
          this.quaternion = product.quaternion.clone();
          product.quaternion.copy(quaternion);
        }
      }
    } else if (this.npc && !this.dead) this.newPath(this.app.randomWaypoint);
  }
}

export default Product;
