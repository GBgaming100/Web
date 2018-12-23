<?php
session_start();

if(isset($_POST['mySubmit']))
{ 
	if(!isset($_SESSION['gameIds']))
		{
			$_SESSION['gameIds'] = array();
		}
		foreach ($_POST['selectedGameIDs'] as $gameID)
		{
			$_SESSION['gameIds'] [$gameID]++;
		}
	
	$_SESSION['myCheckout'] = true;

	header("location:checkout.php");
}
?>