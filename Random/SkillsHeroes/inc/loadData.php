<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 9/26/2018
 * Time: 1:15 PM
 */

session_start();

include "db.php";

$query = "SELECT * FROM contacts WHERE 1";

//gives your database a query to do
$i = connectDB($query);


//var_dump($i);

//echo "test";
echo json_encode($i);
//echo $i;