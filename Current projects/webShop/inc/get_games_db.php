<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 6/25/2018
 * Time: 9:57 AM
 */

session_start();

include "functions.php";

$query = "SELECT * FROM products WHERE 1";

//gives your database a query to do
$i = connectDB($query);


//var_dump($i);

//echo "test";
echo json_encode($i);
//echo $i;
