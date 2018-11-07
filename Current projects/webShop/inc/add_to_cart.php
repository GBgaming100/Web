<?php
session_start();

include "functions.php";

if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    $_SESSION['cartName'] = array();
    $_SESSION['cartPrice'] = array();
    $_SESSION['cartImg'] = array();
}

$gameID = $_POST['gameID'];

// define some query with given id
// add this game ...
$query = "SELECT * FROM products where id = $gameID";

$i = connectDB($query);
$cartName = $i[0]["name"];
$cartPrice = $i[0]["price"];
$cartImg = $i[0]["imgSrc"];
// get info from posted gameID
// then,add anything you want to send back into some array
// and return the array (or parts of it) back to client

array_push($_SESSION['cart'],$gameID);
array_push($_SESSION['cartName'],$cartName);
array_push($_SESSION['cartPrice'],$cartPrice);
array_push($_SESSION['cartImg'],$cartImg);


echo json_encode($_SESSION);

?>