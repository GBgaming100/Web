<?php
session_start();

include "inc/functions.php";

// select query for whole database
$query = "SELECT * FROM `products` WHERE 1";

//gives your database a query to do
$i = connectDB($query);

$query = "SELECT * FROM `platform` WHERE 1";

$q = connectDB($query);

if (!isset($_SESSION['login'])){
    $_SESSION['login'] = '';
}

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WebShop</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">WebShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php?consoleId=ps4">PS4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php?consoleId=Xbox">Xbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php?consoleId=Pc">Pc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <?php if ($_SESSION['login'] == false){ ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Login
                    </button>
                <?php }else{
                    echo "<li class='nav-item nav-link'>logged in as Admin</li>";
                    echo "<a href='deleteSession.php' class='btn btn-primary'> Logout</a>";

                } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal for inlog -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">UserName</label>
                        <input name="username" type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <INPUT class="btn btn-primary" TYPE = "Submit" Name = "Submit1" VALUE = "Login">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $active = 1;
        foreach ($q as $x => $x_value) {
            if ($active == 1) {
                ?>
                <div class="carousel-item carousel-img active">
                    <a href="<?php echo "shop.php?consoleId=" . $x_value['platformName'] ?>">
                        <img class="d-block w-100" src="<?php echo $x_value['img'] ?>" alt="First slide">
                    </a>
                </div>
                <?php
                $active = 0;
            } else {
                ?>
                <div class="carousel-item carousel-img">
                    <a href="<?php echo "shop.php?consoleId=" . $x_value['platformName'] ?>">
                        <img class="d-block w-100" src="<?php echo $x_value['img'] ?>" alt="First slide">
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Max van den Boom 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</body>

</html>
