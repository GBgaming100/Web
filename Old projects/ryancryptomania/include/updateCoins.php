<?php

  include 'defaults.php';
  $id = $_POST['id'];
  $amount = $_POST['amount'];

  $update = "UPDATE `coins` SET `amount`='$amount' WHERE id=$id";

  // echo json_encode($_POST);
  // echo $update;

  if (mysqli_query($connect, $update)) {
    echo "succes";
  } else {
    echo "Error: " . "<br>" . mysqli_error($connect);
  }

  // echo $update;
 ?>
