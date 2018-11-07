<?php
session_start();

if(isset($_POST['loginSet'])){
  if($_POST['loginSet'] == "true"){
    $_SESSION['loggedIn'] = true;
  }
  if($_POST['loginSet'] == "false"){
    $_SESSION['loggedIn'] = false;
  }
}

echo json_encode($_SESSION);

 ?>
