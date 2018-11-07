<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 4/20/2018
 * Time: 9:47 AM
 */

include 'inc/database.php';

$ProjectId = $_GET['projectId'];

$O = "SELECT * FROM `tasks`";

$O = connectWithDatabase($O);

foreach ($O as $Oitem) {
//            die();
    var_dump($Oitem);

    $p = "DELETE FROM tasks WHERE projectId='$ProjectId'";
    var_dump($p);
    $p = connectWithDatabase($p);
}

$I = "DELETE FROM projects WHERE id ='$ProjectId'";
$i = connectWithDatabase($I);


header(("location:index.php"));