<?Php 

	include('connect.php');

	$traffic_id = $_POST['io'];
	$traffic_status = $_POST['status'];

	$sql = "UPDATE trafficlights SET state = '". $trafficlights ."' WHERE id = ". $traffic_id . "";
	
	if (mysqli_query($con, $sql)) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($con);
	}

?>