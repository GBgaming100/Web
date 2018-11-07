<?php
	include("../connectwithdatabase.php");

	$sql = "INSERT INTO taken (taak_name, taak_color, taak_date, taak_time_from, taak_time_till) 
	VALUES ('" .$_POST['taak_name']. "', '" .$_POST['taak_color']. "', '" .$_POST['taak_date']. "', '" .$_POST['taak_time_from']. "', '" .$_POST['taak_time_till']. "');";
	connectWithDatabase($sql);
	

?>