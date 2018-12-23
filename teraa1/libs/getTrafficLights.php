<?php
	include("connect.php");

	$getCurrentTrafficStatus = "SELECT * FROM trafficlights";

	$resultCurrentTrafficStatus = mysqli_query($con, $getCurrentTrafficStatus);

	$lights = array();

	while ($rowLights = mysqli_fetch_assoc($resultCurrentTrafficStatus)) {

		$lights[] = $rowLights;
	}
	
	header('Content-Type: application/json');
	echo json_encode($lights);
?>