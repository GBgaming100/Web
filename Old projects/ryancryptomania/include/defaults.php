<?php
  $connect =	mysqli_connect("127.0.0.1", "root", "", "cryptomania");

  function dump($dump){
  	echo "<pre>";
  	var_dump($dump);
  	echo "</pre>";
  }
?>
