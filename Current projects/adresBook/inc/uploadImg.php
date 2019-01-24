<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 1/23/2019
 * Time: 2:47 PM
 */

extract($_POST);
$txtGalleryName = "";
$error = array();
$extension = array("jpeg", "jpg", "png", "gif");

$file_name = $_FILES["files"]["name"][0];
$file_tmp = $_FILES["files"]["tmp_name"][0];
$ext = pathinfo($file_name, PATHINFO_EXTENSION);

if(in_array($ext,$extension))
{
    if(!file_exists("img/".$txtGalleryName."/".$file_name))
    {
        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][0],"img/".$txtGalleryName."/".$file_name.".png");
    }
    else
    {
        $filename=basename($file_name,$ext);
        $newFileName=$filename.time().".".$ext;
        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][0],"img/".$txtGalleryName."/".$newFileName);
    }
}
else
{
    array_push($error,"$file_name, ");
}

if(isset($_REQUEST["destination"])){
    header("Location: {$_REQUEST["destination"]}");
}else if(isset($_SERVER["HTTP_REFERER"])){
    header("Location: {$_SERVER["HTTP_REFERER"]}");
}else{
    /* some fallback, maybe redirect to index.php */
}