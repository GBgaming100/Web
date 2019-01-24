<?php
extract($_POST);
$txtGalleryName = "";
$error=array();
$extension=array("jpeg","jpg","png","gif");

session_start();
$_SESSION['width'] =$_POST['width'];
$_SESSION['height'] =$_POST['height'];

mkdir("results", 0700);
mkdir("uploads", 0700);
mkdir("resized", 0700);

foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
{
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension))
    {
        if(!file_exists("uploads/".$txtGalleryName."/".$file_name))
        {
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$txtGalleryName."/".$file_name.".jpeg");
        }
        else
        {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$txtGalleryName."/".$newFileName);
        }
    }
    else
    {
        array_push($error,"$file_name, ");
    }


    header("location:images.php");
}



?>