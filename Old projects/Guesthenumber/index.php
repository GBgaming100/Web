<?php
session_start();
$_SESSION['totalGuesses'] = 0;
$_SESSION['lastGuess'] = 1;
$_SESSION['statusGame'] = 0;
$_SESSION['historyguesses'] = array();
?>

<!DOCTYPE html>
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
        <p class="lead">First set some settings, Select the maximum of the randomly generated number (minimum is 10, maximum is 100</p>
    </div>
</div>

<div class="container">
    <div class="form-row">
        <div class="form-group col-md-6">
            <form action="generate.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="Debug">
                            <label class="form-check-label" for="gridCheck">
                                Enable Debug
                            </label>
                        </div>
                        <div class="col-1"></div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="Hack">
                            <label class="form-check-label" for="gridCheck">
                                Show random number
                            </label>
                        </div>
                    </div>
                        <label for="formControlRange">Max Random Number</label>
                        <input type="range" class="slider form-control-range" min="1" max="100" value="50" id="formControlRange" name="maxNumber">
                    <div class="output">50</div>
                </div>

                <button class="btn primary-btn" type="submit">Start Game</button>
            </form>
        </div>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>

</body>
</html>