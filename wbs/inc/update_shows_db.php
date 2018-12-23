<?php
	
	//Database connection
	include("database.php");

	//Input arrays
	$TaskId = $_POST['showId'];
$taskName = $_POST['taskName'];
$Predecessor = $_POST['Predecessor'];
    $MoSCow = $_POST['MoSCoW'];


for($i = 0; $i < count($TaskId); $i++)
{

    $updateTask = "UPDATE `tasks` SET `taskName`=' " . $taskName[$i] . " ',`MoSCoW`=' " . $MoSCow[$i] . " ',`Predecessor`=' " . $Predecessor[$i] . " ' WHERE id='". $TaskId[$i] . "'";

    var_dump($updateTask);
    connectWithDatabase($updateTask);
}
	


?>