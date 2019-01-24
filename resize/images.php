<?php
/**
 * Created by PhpStorm.
 * User: Max van den Boom
 * Date: 1/12/2018
 * Time: 3:02 PM
 */

require 'Zebra_Image.php';

$dirnameUploads = "uploads/";
$dirnameResults = "results/";
$dirnameResized = "resized/";

extract($_POST);


session_start();

$width = $_SESSION['width'];
$height = $_SESSION['height'];


//Method for resizing all images
$imagesjpeg1 = glob($dirnameUploads."*jpeg");
$_Dirjpeg = "";


foreach($imagesjpeg1 as $imagejpeg){


    $_Dirjpeg = $imagejpeg;
    $imagejpeg = new Zebra_Image();
    $imagejpeg->source_path = $_Dirjpeg;
    $ext = ".jpeg";
    $Target = substr($imagejpeg->source_path, strrpos($imagejpeg->source_path, '/') + 1);


    $Target =(str_replace(".png","",$Target));
    $Target =(str_replace(".jpg","",$Target));


//    $tmp = "results/" . $Target;
//
//    var_dump($Target);
//
//    $im = imagecreatefromjpeg($tmp);
//
//    imageinterlace($im, 1);
//    var_dump($im);
//
//    imagejpeg($im, $Target);
//    imagedestroy($im);
//
//
//
//    die();

    $imagejpeg->target_path = 'results/' . $Target;
    if (!$imagejpeg->resize($width,$height, ZEBRA_IMAGE_BOXED, -1)) show_error($imagejpeg->error, $imagejpeg->source_path, $imagejpeg->target_path);{}

}

header("location:progressive.php");

?>

