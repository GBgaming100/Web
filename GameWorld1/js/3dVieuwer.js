'use strict';


let loadedVieuws = [];

const initAllVieuws = () => {
  const vieuws = Array.from($('canvas'));
  vieuws.forEach(setupVieuw);
}

const initWorkVieuw = (workInfo) => {  
  if(loadedVieuws.indexOf(workInfo) == -1){
    loadedVieuws.push(workInfo);
    const vieuws = Array.from($(`${workInfo} canvas`));
    vieuws.forEach(setupVieuw);
  }
}


const setupVieuw = (canvas) => {

  
  
  let button = $(`<div class="controlls"><button type="button"><i class="fa fa-eye" aria-hidden="true"></i> Solid</button></div>`).appendTo($(canvas).parent()); 
  
  const modelLocation = $(canvas).attr('model');
  let usermoved = false;
  let pointLight;
  let displaySetting = 0;
  

  //set canvas size
  $(canvas).attr('width', Math.round($(window).width()*0.40)); 

  let scene = new THREE.Scene();
  let camera = new THREE.PerspectiveCamera( 75, $(canvas).attr('width') / $(canvas).attr('height'), 0.1, 1000 );
  camera.position.z = 5;
  camera.position.y = 5;

  let renderer = new THREE.WebGLRenderer({ canvas: canvas });
  renderer.setClearColor( 0x2f2f2f );
  renderer.shadowMap.enabled = true;
  renderer.shadowMap.type = THREE.PCFSoftShadowMap;

  // grid
  let gridHelper = new THREE.GridHelper( 10, 10, 0x999999, 0x999999 );
  gridHelper.position.set( 0, - 0.04, 0 );
  scene.add( gridHelper );

  //floor
  /*let geoFloor = new THREE.BoxGeometry( 21, 1, 21 );
  var matFloor = new THREE.MeshPhongMaterial({ ambient: 0x555555, color: 0x555555, specular: 0xffffff, shininess: 100, shading: THREE.SmoothShading } );
  matFloor.color.set( 0x333333 );
  let mshFloor = new THREE.Mesh( geoFloor, matFloor );
  scene.add(mshFloor);
  mshFloor.position.set(0, -0.6, 0);
  mshFloor.receiveShadow = true;*/

  // controls, camera
  let controls = new THREE.OrbitControls( camera, renderer.domElement );
  controls.target.set( 0, 5, 0 );
  camera.position.set( 0, 10, 10 );
  controls.update();

  //light
  //scene.add( new THREE.AmbientLight( 0xffffff ) );
  var light = new THREE.PointLight( 0xffffff, 2, 100 );
  light.position.set( 10, 20, 20 );
  light.castShadow = true;
  scene.add( light );
  
  var light2 = new THREE.PointLight( 0xffffff, 2, 50 );
  light2.position.set( -10, 20, -20 );
  light2.castShadow = true;
  scene.add( light2 );
  
  var light3 = new THREE.PointLight( 0xffffff, 2, 50 );
  light3.position.set( 10, 20, -20 );
  light3.castShadow = true;
  scene.add( light3 );

  // model
  let model1 = null;
  let model2 = null;
  var loader = new THREE.ColladaLoader();
  loader.options.convertUpAxis = true;
  loader.load(modelLocation, function ( collada  ) {
        
    model1 = collada.scene;
    model2 = collada.scene.clone();   
    
    //replace material
    let changeMaterial = (obj) => {
      if (obj.type == "Mesh"){
        obj.material = wireframeMaterial;
      }
      
      for(let i = 0; i < obj.children.length; i++) changeMaterial(obj.children[i]);
    }
    let wireframeMaterial = new THREE.MeshBasicMaterial( { wireframe: true } );
    changeMaterial(model2);
    
    scene.add( model1 );
    scene.add( model2 );
    
    model1.position.set( 0, 0, 0);
    model1.scale.set( $(canvas).attr('scale'), $(canvas).attr('scale'), $(canvas).attr('scale'));
    
    model2.position.set( 0, 0, 0);
    model2.scale.set( $(canvas).attr('scale'), $(canvas).attr('scale'), $(canvas).attr('scale'));
    model2.visible = false;
    
    renderer.render( scene, camera );

  });

  canvas.addEventListener('mousedown', (evt) => {
    usermoved = true;
  });
  
  
  
  
  
  $($(button).children()[0]).click(() => {
    displaySetting ++;
    if (displaySetting > 2) displaySetting = 0;
    
    switch(displaySetting){
        
      //textrue
      case 0 :
        $($(button).children()[0]).html('<i class="fa fa-eye" aria-hidden="true"></i> Solid');
        model1.visible = true;
        model2.visible = false;
        break;
        
      //mix
      case 1 :
        $($(button).children()[0]).html('<i class="fa fa-eye" aria-hidden="true"></i> Wireframe + Solid');
        model1.visible = true;
        model2.visible = true;
        break;
        
      //all
      case 2 :
        $($(button).children()[0]).html('<i class="fa fa-eye" aria-hidden="true"></i> Wireframe');
        model1.visible = false;
        model2.visible = true;
        break;
    }
    
    

    
  });

  function animate() {
    requestAnimationFrame( animate );

    if (model1 && !usermoved) model1.rotation.y += 0.005;
    if (model2 && !usermoved) model2.rotation.y += 0.005;
    if (gridHelper && !usermoved) gridHelper.rotation.y += 0.005;
    
    renderer.render( scene, camera );
  }

  $(window).resize(() => {      
    $(canvas).attr('width', Math.round($(window).width()*0.40));
    camera.aspect = $(canvas).attr('width') / $(canvas).attr('height');
    camera.updateProjectionMatrix();

    renderer.setSize($(canvas).attr('width'), $(canvas).attr('height') );
  });

  animate();
}


