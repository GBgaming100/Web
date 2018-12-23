<?php
// config.php

function connectToDB()
{
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dB 	= "guestbook";
	
	$connect = mysqli_connect($host,$user, $pass, $dB);
	
	return $connect;
}
?>