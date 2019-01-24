<?php
/**
 * Created by PhpStorm.
 * User: Max van den Boom
 * Date: 1/31/2018
 * Time: 9:20 AM
 */

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            rmdir($file->getRealPath());
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
class FlxZipArchive extends ZipArchive {

    public function addDir($location, $name) {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    } // EO addDir;

    private function addDirDo($location, $name) {
        $name .= '/';         $location .= '/';
        // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))    {
            if ($file == '.' || $file == '..') continue;
            // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    }
}

$dirnameUploads = "results/";


//Method for resizing all images
$images = glob($dirnameUploads."*jpeg");
$_Dirjpeg = "";
foreach($images as $image){

    var_dump($image);

    $im = imagecreatefromjpeg($image);

    imageinterlace($im, 1);
    var_dump($im);
    imagejpeg($im, $image);
    imagedestroy($im);

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
}



$the_folder = 'results/';
$zip_file_name = 'resized/resized.zip';



//Adding fotos to a zip file and also deleting the images from the results/uploads directory
$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE)    {
    $za->addDir($the_folder, basename($the_folder)); $za->close();

    $file = $zip_file_name;
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);

    deleteDir("resized/");
    deleteDir("results/");
    deleteDir("uploads/");
}
else
{
    echo 'Could not create a zip archive';
}



?>

<html>
<head>

</head>
<body>

    <a href="resized.zip" download>download test</a>

</body>
</html>