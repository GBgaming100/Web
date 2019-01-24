<?php
session_start();
include "inc/functions.php";

// select query for whole database
$query = "SELECT * FROM `products` WHERE 1";

//gives your database a query to do
$i = connectDB($query);

//var_dump($_SESSION);


$count = 0;
$totalPrice = 0;


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
    <link href="css/checkout.css" rel="stylesheet">

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
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['cartName'] as $value) {

         ?>
            <tr>
                <td><?php echo $_SESSION['cartName'][$count] ?></td>
                <td><?php echo $_SESSION['cartPrice'][$count] ?></td>
            </tr>
        <?php

            //calculates the total of the cart
            $cartId = $_SESSION['cart'][$count];
            $query = "SELECT price FROM products WHERE id = $cartId";
            $db_price = connectDB($query);
            $totalPrice = $totalPrice +  floatval($db_price[0]['price']);
            var_dump($totalPrice);

            $count++;
        } ?>
        <tr>
            <td  style="float:right"><?php echo $totalPrice;?>,00</td>
            <td colspan="2" style="float:right">Total price is:</td>
        </tr>

        </tbody>
    </table>
</div>


</body>

</html>
