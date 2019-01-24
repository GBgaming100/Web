<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 6/25/2018
 * Time: 1:42 PM
 */
session_start();

include "inc/functions.php";



// select query for whole database
$query = "SELECT * FROM `users` WHERE 1";

//gives your database a query to do
$i = connectDB($query);

if ($_POST['username'] == $i[0]['users'] and $_POST['password'] == $i[0]['password']){
    $_SESSION['login'] = true;
}

var_dump($i);

header('Location: index.php');
