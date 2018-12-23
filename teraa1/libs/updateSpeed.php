<?Php 

	include('connect.php');

	$train_id = $_POST['trainId'];
	$train_speed = $_POST['speedValue'];
	$direction = $_POST['direction'];


	$sql = "UPDATE train SET speed = '". $train_speed ."', direction = '".$direction."' WHERE id = ". $train_id . "";
	
	if (mysqli_query($con, $sql)) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($con);
	}

?>