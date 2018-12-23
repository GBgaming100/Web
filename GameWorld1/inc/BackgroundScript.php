                        <?php function BackgroundScript()
{
 ?>
<body style="background-image: url('images/bgtwo.jpg');background-size: cover;
  margin: 0px;
  font-family: arial;
"></body>
<script type="text/javascript">

   var num;
   var temp=0;
   var speed=6000 /* this is set for 10 seconds, edit value to suit requirements */
   var preloads=[];

/* add any number of images here */

preload(
        'images/bgone.jpg',
        'images/bgtwo.jpg',
        'images/bgtree.jpg',
        'images/bgfour.jpg',
        'images/bgfive.jpg',
        'images/bgsix.jpg'
       );

function preload(){

for(var c=0;c<arguments.length;c++) {
   preloads[preloads.length]=new Image();
   preloads[preloads.length-1].src=arguments[c];
  }
 }

function rotateImages() {
   num=Math.floor(Math.random()*preloads.length);
if(num==temp){
   rotateImages();
 }
else{
   document.body.style.backgroundImage='url('+preloads[num].src+')';
   temp=num;

setTimeout(function(){rotateImages()},speed);
  }
 }

if(window.addEventListener){
   window.addEventListener('load',function(){setTimeout(function(){rotateImages()},speed)},false);
 }
else { 
if(window.attachEvent){
   window.attachEvent('onload',function(){setTimeout(function(){rotateImages()},speed)});
  }
 }
</script>
<?php
}