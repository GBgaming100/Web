<?php

session_start();
include("inc/functions.php");

date_default_timezone_set('UTC');

if(isset($_GET['rating']))
    {
      $rating = $_GET['rating'];
    }

if(isset($_GET['title']))
    {
      $title = $_GET['title'];
    }

if(isset($_GET['comment']))
    {
      $comment = $_GET['comment'];
    }

if(isset($_GET['model']))
    {
      $model = $_GET['model'];
    }

	$user = $_SESSION['username'];
	$date = date('Y-m-d');


$sql = "SELECT id, brandid FROM TYPES WHERE name =  '" .$model. "'";
$model_id = connectWithDatabase($sql)[0]['id'];
$brand_id = connectWithDatabase($sql)[0]['brandid'];


$sql = "INSERT INTO review (brandid, typeId, author, title, review, rating, datereview) VALUES ('" .$brand_id. "', '" .$model_id. "', '" .$user. "', '" .$title. "', '" .$comment. "', '" .$rating. "', '" .$date. "')";
echo connectWithDatabase($sql);

  if(isset($_REQUEST["destination"])){
      header("Location: {$_REQUEST["destination"]}");
  }else if(isset($_SERVER["HTTP_REFERER"])){
      header("Location: {$_SERVER["HTTP_REFERER"]}");
  }
  end();