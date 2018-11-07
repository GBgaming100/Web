<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 6/25/2018
 * Time: 1:42 PM
 */
session_start();
//var_dump($_POST);
//echo json_encode($_POST);

$FirstName = $_POST['FirtsName'] ;
$LastName = $_POST['LastName'] ;
$Email = $_POST['Email'] ;
$PhoneNumber = $_POST['PhoneNumber'] ;
$Street = $_POST['Street'] ;
$Number = $_POST['Number'] ;
if (isset($_POST['Extra'])){
$Extra = $_POST['Extra'] ;}
else{
    $Extra = '';
}
$Zipcode = $_POST['Zipcode'] ;
$City = $_POST['City'];
$userId = $_POST['userId'];


$userid = 1;

include "db.php";

$sql = "INSERT INTO `contacts`(`userId`, `FirtsName`, `LastName`, `Email`, `Street`, `Number`, `Extra`, `Zipcode`, `City`) VALUES ($userid,'$FirstName','$LastName','$Email','$Street','$Number','$Extra','$Zipcode','$City')";

echo $sql;


$i = connectDB($sql);
?>