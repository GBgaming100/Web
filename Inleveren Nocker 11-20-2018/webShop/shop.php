<?php
session_start();
include "inc/functions.php";

$selectedCat = 3;

if ($_GET['consoleId'] == 'ps4') {
    $selectedCat = 0;
} elseif ($_GET['consoleId'] == 'Xbox') {
    $selectedCat = 1;
} elseif ($_GET['consoleId'] == 'Pc') {
    $selectedCat = 2;
} else {
    $selectedCat = 3;
}
if ($selectedCat < 3) {
    $query = "SELECT * FROM `products` WHERE `platformId` = $selectedCat";
} else {
    $query = "SELECT * FROM `products` WHERE 1";
}

// select query for whole database

//gives your database a query to do
$i = connectDB($query);

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
    <link href="css/shop.css" rel="stylesheet">

    <!-- Font aweseom -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a <?php if ($_GET['consoleId'] == 'ps4') {
                        echo "class='nav-link active'";
                    } else {
                        echo "class='nav-link'";
                    }; ?> href="shop.php?consoleId=ps4">PS4</a>
                </li>
                <li class="nav-item">
                    <a <?php if ($_GET['consoleId'] == 'Xbox') {
                        echo "class='nav-link active'";
                    } else {
                        echo "class='nav-link'";
                    }; ?> href="shop.php?consoleId=Xbox">Xbox</a>
                </li>
                <li class="nav-item">
                    <a <?php if ($_GET['consoleId'] == 'Pc') {
                        echo "class='nav-link active'";
                    } else {
                        echo "class='nav-link'";
                    }; ?> href="shop.php?consoleId=Pc">Pc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
            </ul>
        </div>
    </div>
    <ul class="navbar-right">
        <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a></li>
    </ul> <!--end navbar-right -->
    </div> <!--end container -->
</nav>


<div class="container">
    <div class="shopping-cart">
        <div class="shopping-cart-header">
            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
            <div class="shopping-cart-total">
                <span class="lighter-text">Total:</span>
            </div>
        </div> <!--end shopping-cart-header -->
        <ul class="shopping-cart-items">


        </ul>
        <div class="row">
            <a href="checkout.php" class="btn btn-success">Checkout</a>
            <a href="deleteSession.php" class="btn btn-danger">Clear Cart</a>
        </div>
    </div> <!--end shopping-cart -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-11">
                <h5>Games</h5>
                Wat ons betreft valt er altijd wel wat te gamen. Van racing games tot RPG's en van shooters tot
                strategiespellen. We zijn van alle markten thuis en eigenlijk moet het toch wel heel raar lopen, willen
                we
                jouw
                favoriete genre hier niet hebben staan.
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <!--Start Item-->
                    <?php
                    foreach ($i as $x => $x_value) {
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-20">
                                <a href="#"><img class="card-img-top" src="<?php echo $x_value['imgSrc']; ?>"
                                                 alt=""></a>
                                <div class="card-body" id="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $x_value['name'] ?></a>
                                    </h4>
                                    <h5>$<?php echo $x_value['price'] ?></h5>
                                    <p class="card-text">Genre: <?php echo $x_value['Genre'] ?></p>
                                    <div class="btn">
                                        <button type="button" class="btn btn-primary btn_add_js"
                                                value="<?php echo $x_value['id'] ?>">Add to basket
                                        </button>

                                        <a href="shopItem.php?gameId=<?php echo $x_value['id'] ?>" type="button"
                                           class="btn btn-secondary btn_add_js"
                                        >More info
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Publisher: <?php echo $x_value['publisher'] ?></small>
                                </div>
                            </div>
                        </div>
                        <!--End Item-->
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="display: none;">
        <template id="template">
            {{#.}}
            <li class="clearfix">
                <img src="{{image}}" alt="item1"/>
                <span class="item-name">{{name}}</span>
                <span class="item-price">${{price}}</span>
            </li>
            {{/.}}
        </template>
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

    <!-- Mustache JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.js"></script>

    <script src="js/moment.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
