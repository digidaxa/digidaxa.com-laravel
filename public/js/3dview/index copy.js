const scene = new THREE.Scene();
scene.background = new THREE.Color( 0xa0a0a0 );
scene.fog = new THREE.Fog( 0xa0a0a0, 10, 50 );

const camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 0.1, 1000 );
camera.position.set( 7, 3, 7 );

const renderer = new THREE.WebGLRenderer( { antialias: true } );
renderer.setPixelRatio( window.devicePixelRatio );
renderer.setSize( window.innerWidth, window.innerHeight );
renderer.toneMapping = THREE.ACESFilmicToneMapping;
renderer.outputEncoding = THREE.sRGBEncoding;
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

const pmremGenerator = new THREE.PMREMGenerator( renderer );
pmremGenerator.compileEquirectangularShader();

const doc = document.querySelector( '.main' );
doc.appendChild( renderer.domElement );

window.addEventListener( 'resize', function () {

	const width = window.innerWidth;
	const height = window.innerHeight;
	renderer.setSize( width, height );
	camera.aspect = width / height;
	camera.updateProjectionMatrix();

} );

const controls = new THREE.OrbitControls( camera, renderer.domElement );

const hlight = new THREE.AmbientLight( 0x404040, 1 );
scene.add( hlight );

const directionalLight = new THREE.DirectionalLight( 0xffffff, 1 );
directionalLight.castShadow = true;
directionalLight.shadow.camera.top = 4;
directionalLight.shadow.camera.bottom = - 4;
directionalLight.shadow.camera.left = - 4;
directionalLight.shadow.camera.right = 4;
directionalLight.shadow.camera.near = 0.1;
directionalLight.shadow.camera.far = 40;
directionalLight.shadow.camera.far = 40;
directionalLight.shadow.bias = - 0.002;
directionalLight.position.set( 0, 20, 20 );
scene.add( directionalLight );

//scene.add( new THREE.CameraHelper( directionalLight.shadow.camera ) );

// ground

const mesh = new THREE.Mesh( new THREE.PlaneBufferGeometry( 100, 100 ), new THREE.MeshPhongMaterial( { color: 0x999999, depthWrite: false } ) );
mesh.rotation.x = - Math.PI / 2;
mesh.receiveShadow = true;
scene.add( mesh );

// car

new THREE.RGBELoader()
	.setDataType( THREE.UnsignedByteType )
	.setPath( 'img/' )
	.load( 'pedestrian_overpass_1k.hdr', function ( texture ) {

		const envMap = pmremGenerator.fromEquirectangular( texture ).texture;

		scene.environment = envMap;

		texture.dispose();
		pmremGenerator.dispose();

		var loader = new THREE.GLTFLoader();
		loader.load( 'img/nissan/scene.gltf', handle_load );

	} );


let car;

function handle_load( gltf ) {

	car = gltf.scene;
	car.position.y = 1.1;

	car.traverse( function ( child ) {

		if ( child.isMesh ) {

			child.castShadow = true;
			child.receiveShadow = true;

		}

	} );

	scene.add( car );

	animate();

}

const animate = function () {

	requestAnimationFrame( animate );

	renderer.render( scene, camera );

};