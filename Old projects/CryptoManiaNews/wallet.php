<?php
/**
 * Created by PhpStorm.
 * User: maxvd
 * Date: 6/19/2018
 * Time: 12:12 PM
 */

include ("inc/functions.php");

$i = "SELECT * FROM `cryptofolio`";

$q = connectDB($i);

var_dump($q);