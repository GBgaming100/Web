<?php

include '/inc/functions.php';
//this selects every thing from your database
$query = "SELECT * FROM `guestinfo` WHERE 1";

//gives your database a query to do
$sql = mysqli_query(connectToDB("guestbook"),$query);

//this array will be filled with information from your database
$results = array();
while ($row = mysqli_fetch_assoc($sql))
{
	$results[] = $row;
}

?>
<html>
<head>
	<title>Guest Book</title>
	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="Container">
	<header>
      <a href="#home"><div id="logo"><img src="images/logo.jpg" alt="Logo"></div></a>
      <div id="menuContent">
        <div class="menuPadding"></div>
        <a href="index.php"><div class="button">Home</div></a>
        <a href="guestbook.php"><div class="button active">GuestBook</div></a>
      </div>
	</header>
	<?php
		for ($i=0; $i < count($results); $i++) { 
			?>
			<div id="Message">
			Name:
			<?php echo $results[$i]["Name"]; ?>
			<br>
			LastName:
			<?php echo $results[$i]["LastName"]; ?>
			<br>
			webAdress:
			<?php echo $results[$i]["WebAdress"]; ?>
			<br>
			Message:
			<?php echo $results[$i]["Message"]; ?>
			<br>
			Date:
			<?php echo $results[$i]["datetime"]; ?>
			<br>
			</div>
			<br>
			<?php 	
			}
			?>


    <footer>
     <a href="http://www.nyan.cat/"> @ Made By Max van den Boom. </a>
    </footer>
</body>
</html>