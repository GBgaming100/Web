<?Php 

	include('connect.php');

	$block_id = $_POST['blockId'];
	$block_status = $_POST['blockStatus'];



	$sql = "UPDATE blocks SET status = '". $block_status ."' WHERE id = ". $block_id ."";
	
	if (mysqli_query($con, $sql)) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($con);
	}

?>