<?php
	include("../connectwithdatabase.php");

	$sql = "SELECT * FROM taken WHERE taak_date = '2018-06-26' ORDER BY taak_time_from ASC";
	$todays = connectWithDatabase($sql);

	echo json_encode($todays);
	

?>