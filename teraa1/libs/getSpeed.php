<?php
	include("connect.php");

	$getCurrentTrainSpeed = "SELECT * FROM train";

	$resultCurrentTrainSpeed = mysqli_query($con, $getCurrentTrainSpeed);

	$trainSpeed = array();

	while ($rowBlocks = mysqli_fetch_assoc($resultCurrentTrainSpeed)) {

		$trainSpeed[] = $rowBlocks;
	}
	
	header('Content-Type: application/json');
	echo json_encode($trainSpeed);
?>