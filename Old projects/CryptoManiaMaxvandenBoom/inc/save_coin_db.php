<?php
include('db.php');

print_r($_POST);

$updateCoins = "UPDATE `cryptofolio` SET `totalValue`=$_POST[coin_Value], `price`= $_POST[coin_Price],`amount`= $_POST[coin_Amount]  WHERE `id`= $_POST[coin_Id]";



if( mysqli_query($con, $updateCoins) )
{
    echo "Succesfully added to your cryptofolio";
}
else
{
    echo "Oops, can not add a coin to your cryptofolio:" . $updateCoins . "<br />" . mysqli_error($con);
}

?>