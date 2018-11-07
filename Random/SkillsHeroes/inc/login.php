<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 6/25/2018
 * Time: 1:42 PM
 */
session_start();
//var_dump($_POST);
echo json_encode($_POST);

include "db.php";

$sql = "SELECT * FROM `users`";

$i = connectDB($sql);

if ($_POST['userName'] == $i[0]['user'] and $_POST['password'] == $i[0]['password']) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $_POST['userName'];
} else{
    $_SESSION['login'] = false;
}