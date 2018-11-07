<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 6/20/2018
 * Time: 10:19 PM
 */

include('db.php');

print_r($_POST);

$deleteCoins = "DELETE FROM cryptofolio WHERE id= $_POST[coin_Id]";



if( mysqli_query($con, $deleteCoins) )
{
    echo "Succesfully deleted from your cryptofolio";
}
else
{
    echo "Oops, can not add a coin to your cryptofolio:" . $deleteCoins . "<br />" . mysqli_error($con);
}

?>