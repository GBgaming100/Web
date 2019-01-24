<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 12/23/2018
 * Time: 4:58 PM
 */
var_dump($_POST);

//Database connection
include("functions.php");
session_start();

$user = $_SESSION['username'];
$date = date('Y-m-d');

$model = $_POST['model'];

$sql = "SELECT id, brandid FROM TYPES WHERE name =  '" .$model. "'";
$model_id = connectWithDatabase($sql)[0]['id'];
$brand_id = connectWithDatabase($sql)[0]['brandid'];

$title = $_POST['title'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$id = $_POST['model'];

$sql = "INSERT INTO review (brandid, typeId, author, title, review, rating, datereview) VALUES ('" .$brand_id. "', '" .$model_id. "', '" .$user. "', '" .$title. "', '" .$comment. "', '" .$rating. "', '" .$date. "')";
echo connectWithDatabase($sql);