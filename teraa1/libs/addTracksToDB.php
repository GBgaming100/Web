<?Php 

	include('connect.php');

	$track_id = $_POST['trackId'];
	$track_status = $_POST['trackStatus'];



	$sql = "UPDATE track SET status = '". $track_status ."' WHERE id = ". $track_id ."";
	
	// echo $sql;
	if (mysqli_query($con, $sql)) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($con);
	}

?>