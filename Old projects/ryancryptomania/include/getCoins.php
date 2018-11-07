<?php
  include 'defaults.php';
  $id = $_POST['userId'];

  $highScoreArray = [];

  $highScoreQuery = mysqli_query($connect,"SELECT * FROM `coins` WHERE userId = $id");

  while($row = mysqli_fetch_assoc($highScoreQuery))
  {
    $highScoreArray[] = $row;
  }

  echo json_encode($highScoreArray);
 ?>
