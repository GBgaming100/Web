<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 4/10/2018
 * Time: 9:21 AM
 */
extract($_POST);
session_start();


$randomNumber = rand(1, $_POST['maxNumber']);
$_SESSION['Debug'] = $_POST['Debug'];
$_SESSION['Hack'] = $_POST['Hack'];
$_SESSION['randomNumber'] = $randomNumber;

echo $_SESSION["randomNumber"];


header("location:guess.php");