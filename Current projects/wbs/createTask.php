<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 4/18/2018
 * Time: 9:38 PM
 */

extract($_POST);
var_dump($_POST);

include 'inc/database.php';

$TaskName = $_POST['TaskName'];
$MoSCoW = $_POST['MoSCoW'];
$Plan = $_POST['Plan'];
$Predecessor = $_POST['Predecessor'];
$ProjectId = $_GET['projectId'];

$I = "INSERT INTO `tasks`(`projectId`, `taskName`, `MoSCoW`, `Time`, `Predecessor` ) VALUES (' $ProjectId ', ' $TaskName ',' $MoSCoW ',' $Plan ',' $Predecessor ')";
echo $I;
$I = connectWithDatabase($I);

header(("location:taskPage.php?projectId=". $ProjectId));