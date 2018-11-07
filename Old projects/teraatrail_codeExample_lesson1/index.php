<!DOCTYPE html>
<html>
<head>

	<!-- Character set -->
	<meta charset="utf-8">

	<!-- Tells the Internet Explorer to display the webpage in the highest mode available. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- For rendering on mobile devices and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Arduino - blocks - example</title>
</head>
<body>

    <div class="block-container" data-block="1" data-block-status="0" id="block-1">
        1 <br/>
        <input type="button" class="btn-block-on" value="On" />
        <input type="button" class="btn-block-off" value="Off" />
    </div>

    <div class="block-container" data-block="2" data-block-status="0" id="block-2">
        2 <br/>
        <input type="button" class="btn-block-on" value="On" />
        <input type="button" class="btn-block-off" value="Off" />
    </div>

    <div class="block-container" data-block="3" data-block-status="0" id="block-3">
        3 <br/>
        <input type="button" class="btn-block-on" value="On" />
        <input type="button" class="btn-block-off" value="Off" />
    </div>

    <div class="block-container" data-block="4" data-block-status="0"  id="block-4">
        4<br/>
        <input type="button" class="btn-block-on" value="On" />
        <input type="button" class="btn-block-off" value="Off" />
    </div>

	<!-- jQuery -->
	<script src="js/jquery-3.3.1.min.js"></script>
    <!-- Custom js  -->
    <script src="js/main.js"></script>
</body>
</html>