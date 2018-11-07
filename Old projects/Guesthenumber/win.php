<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 4/12/2018
 * Time: 4:27 PM
 */
?>

<html>
	<head>
		<title>Jquery memory</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">


	</head>
	<body>


    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Guess the number</h1>
            <p class="lead">This is just a simple game about guessing a random number.</p>
            <hr>
            <p class="lead">First set some settings, Select the maximum of the randomly generated number (minimum is 10, maximum is 100</p>
        </div>
    </div>

    <div class="container">
            <h1>you have won!</h1>
    </div>



		<footer></footer>
	<script src="JS/app/jquery.js"></script>
		<script src="JS/app/timer.jquery.min.js"></script>
		<script src="JS/main.js"></script>

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</body>
</html>
