<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 12/24/2018
 * Time: 11:27 PM
 */


session_start();

include "inc/functions.php";
if (isset($_POST['Title'])) {
    $title = $_POST['Title'];
}
if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
}
$date = date('Y-m-d');

if ($comment != "" && $title != "") {
// select query for whole database
    $query = "INSERT INTO `contact`(`title`, `comment`, `date`) VALUES ('" . $title . "', '" . $comment . "', '" . $date . "')";
} else {
    echo "not a valid input";
}
//gives your database a query to do
$i = connectDB($query);

header('Location: about.html');