<?php
include("inc/functions.php");
 session_start();

if(isset($_GET['username']))
  {
    $username = $_GET['username'];
  }
if(isset($_GET['psw']))
  {
    $psw = $_GET['psw'];
  }
$sql = "SELECT * FROM `users` WHERE username = '".$username."' AND password = '".$psw."'";
$login = connectWithDatabase($sql);

if (!empty($login)) {

  $_SESSION['username'] = $login[0]['username'];
  $_SESSION['loggedin']   = true;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
