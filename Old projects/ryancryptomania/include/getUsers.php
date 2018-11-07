<?php
  include 'defaults.php';

  $highScoreArray = [];

  $highScoreQuery = mysqli_query($connect,"SELECT * FROM `users`");

  while($row = mysqli_fetch_assoc($highScoreQuery))
    {
    $highScoreArray[] = $row;
  }

  echo json_encode($highScoreArray);
 ?>
