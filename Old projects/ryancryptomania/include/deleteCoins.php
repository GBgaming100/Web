<?php
  include 'defaults.php';

  $id = $_POST['id'];

  $deleteTasks = "DELETE FROM `coins` WHERE `id`=$id";

  if (mysqli_query($connect, $deleteTasks)) {
      echo 'succes';
  } else {
    echo "Error: " . "<br>" . mysqli_error($connect);
  }
 ?>
