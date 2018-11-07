<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 4/10/2018
 * Time: 9:36 AM
 */

session_start();

//include "inc/generate.php";

//randomNumb();

//variables
$totalGuesses = 0;


if ($_SESSION['statusGame'] == 0) {
    if (isset($_SESSION['Debug'])) {
        var_dump($_SESSION);
    }
    if (isset($_SESSION['Debug'])) {
        echo("Random Number: " . $_SESSION["randomNumber"]);
    }
}




//echo $_SESSION["randomNumber"];
//echo $_SESSION["maxNumber"];


foreach ($_SESSION['historyguesses'] as $x => $x_value) {
    if ($x > 0) {
//        echo "previous Guess " . $x_value;
//        echo "<br>";
    }
}

?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Guess the number</h1>
        <p class="lead">This is just a simple game about guessing a random number.</p>
        <hr>
        <p class="lead">First set some settings, Select the maximum of the randomly generated number (minimum is 10,
            maximum is 100</p>
    </div>
</div>
<div class="container">

    <form action="check.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputEmail1">Geus Number</label>
            <input type="number" class="form-control" name="guesNumber" placeholder="Your Guess">
        </div>

        <button class="btn btn-primary" type="submit">Guess!</button>
        <button class="btn btn-primary" type="reset">Reset!</button>
    </form>
    <div class="guessCount">
        Guess count is:
        <?php
        echo $_SESSION['totalGuesses'];
        ?>
    </div>
    <div class="lastGeuss">
        My guess is:
        <?php
        echo $_SESSION['lastGuess'];
        ?>
    </div>
    <div class="row">
        <div class="col-3 list">
            <ul class="list-group">
                <li class="list-group-item active">your previous guesses</li>
            <?php
            foreach ($_SESSION['historyguesses'] as $historyguess) {
                    echo '<li class="list-group-item">' . $historyguess . '</li>';
                }
            ?>
            </ul>
        </div>
        <div class="col-3">
            <?php
            if ($_SESSION['statusGame'] == 1) {
                header("location:win.php");
            } elseif ($_SESSION['statusGame'] == 2) {
                echo '<button type="button" class="btn btn-info">To low</button>';
            } elseif ($_SESSION['statusGame'] == 3) {
                echo '<button type="button" class="btn btn-danger">To high</button>';
            }
            ?>
        </div>
    </div>
</div>
<script src="JS/app/jquery.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
