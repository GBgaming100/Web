<?php

//Database connection
include("database.php");
//
//Input arrays
$taskId = $_POST['taskId'];
$taskName = $_POST['taskName'];
$predecessor = $_POST['Predecessor'];
$MoSCoW = $_POST['MoSCoW'];
$Time = $_POST['Time'];
$ActualTime = $_POST['ActualTime'];
$_check = $_POST['_check'];
$act = $_POST['Act'];

for ($i = 0; $i < count($taskId); $i++) {

    $updateTask = "UPDATE `tasks` SET `taskName`=' " . $taskName[$i] . " ',`MoSCoW`=' " . $MoSCoW[$i] . " ',`Time`=' "    . $Time[$i] . " ',`ActualTime`=' "    . $ActualTime[$i] . " ',`Predecessor`=' " . $predecessor[$i] . " ',`_check`=' " . $_check[$i] . " ',`Act`=' " . $act[$i] .  " ' WHERE id='" . $taskId[$i] . "'";

    var_dump($updateTask);
    connectWithDatabase($updateTask);
}


//var_dump($_POST);


?>