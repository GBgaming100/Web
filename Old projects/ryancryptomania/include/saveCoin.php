<?php
  include 'defaults.php';
  date_default_timezone_set('UTC');

  $price = $_POST['price'];
  $amount = $_POST['amount'];
  $date = date("d-m-Y");
  $coin = $_POST['coinId'];
  $user = $_POST['user'];
  // echo json_encode($_POST);
  // echo $date;

  $insert = "INSERT INTO `coins` (`price`, `date`, `userId`, `amount`, `coinId`)
    VALUES ('$price','$date','$user','$amount','$coin');";
  //
  if (mysqli_query($connect, $insert)) {
    echo "succes";
  } else {
    echo "Error: " . $insert . "<br>" . mysqli_error($connect);
  }
?>
