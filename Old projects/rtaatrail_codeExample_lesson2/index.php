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

	<title>Arduino</title>
</head>
<body>

   
    <div>The speed is: <span id="speed-value-container">0</span></div>
    <input type="range" value="0" min="0" max="255" id="speed-range-slider">
    

	<!-- jQuery -->
	<script src="js/jquery-3.3.1.min.js"></script>


    <!-- Custom js  -->
    <script src="js/main.js"></script>
</body>
</html>