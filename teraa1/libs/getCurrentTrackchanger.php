<?php
	include("connect.php");

	$getCurrentTrackStatus = "SELECT * FROM track";

	$resultCurrentTrackStatus = mysqli_query($con, $getCurrentTrackStatus);

	$track = array();

	while ($rowTracks = mysqli_fetch_assoc($resultCurrentTrackStatus)) {

		$track[] = $rowTracks;
	}
	
	header('Content-Type: application/json');
	echo json_encode($track);
?>