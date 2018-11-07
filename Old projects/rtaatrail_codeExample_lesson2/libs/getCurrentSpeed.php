<?php
include("connect.php");

$getCurrentBlockStatus = "SELECT * FROM speed";

$resultCurrentBlocksStatus = mysqli_query($con, $getCurrentBlockStatus);

$blocks = array();

while ($rowBlocks = mysqli_fetch_assoc($resultCurrentBlocksStatus)) {

    $blocks[] = $rowBlocks;
}

header('Content-Type: application/json');
echo json_encode($blocks);
?>