<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 1/18/2019
 * Time: 10:28 AM
 */

session_start();

include "db.php";

$correct = false;

if (isset($_POST['userName'])) {
    $userName = $_POST['userName'];
    $correct = true;
} else {
    $correct = false;
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $correct = true;
} else {
    $correct = false;
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $correct = true;
} else {
    $correct = false;
}
if ($correct == true) {
    $sql = "INSERT INTO `users` (`id`, `user`, `password`, `email`) VALUES (NULL ,'$userName','$password','$email')";

    $i = connectDB($sql);
} else {
    echo $correct;
}

echo "testing";