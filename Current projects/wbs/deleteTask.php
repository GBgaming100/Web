<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 4/20/2018
 * Time: 10:35 AM
 */

include 'inc/database.php';

$taskId = $_GET['taskId'];
$projectId = $_GET['projectId'];
$I = "DELETE FROM tasks WHERE id ='$taskId'";
$i = connectWithDatabase($I);


header(("location:projects.php?projectId=$projectId"));