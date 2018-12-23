<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 12/13/2018
 * Time: 5:18 PM
 */

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arduino to DMX</title>
    <!--Bootstrap styling-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <!--Custom styling-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!--header Start-->
<div class="jumbotron jumbotron-fluid">
    <div class="jumbotron_bg"></div>
    <div class="container ">
        <div class="jumbotron_Text">
            <h1 class="display-4">Web to DMX</h1>
            <a href="about.php" class="btn btn-primary">About ! click me</a>
        </div>
    </div>
</div>
<!--header End-->
<!--content Start-->
<div class="container">
    <form>
        <div class="form-group">
            <label for="formControlRange">Shutter, strobe, reset, lamp on/off</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Dimmer</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Dimmer fine</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Cyan</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Magenta</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Yellow</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Cyan</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Color wheel scrolling and rotation, random CMY</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Frost filter</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Pan</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Pan fine</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Tilt</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Tilt fine</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Pan/Tilt speed</label>
            <input type="range" class="speed-range-slider slider" >
            <label for="formControlRange">Effect speed</label>
            <input type="range" class="speed-range-slider slider" >
        </div>
    </form>
</div>
<!--content End-->
<!--javascript bootstrap and jquery-->
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
