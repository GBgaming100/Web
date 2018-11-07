<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 4/18/2018
 * Time: 8:02 PM
 */
extract($_POST);
var_dump($_POST);

include 'inc/database.php';

$ProjectName = $_POST['ProjectName'];
$Description = $_POST['Description'];

$I = "INSERT INTO `projects`(`id`, `Title`, `Description`) VALUES ('','  $ProjectName ', ' $Description ')";
$I = connectWithDatabase($I);

header("location:index.php");