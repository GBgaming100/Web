<?php
date_default_timezone_set('UTC');

include '/inc/functions.php';


$Name = 		"";
$Lastname = 	"";
$WebAdress = 	"";	
$Message = 		"";
$Ip = 			"";
$Mail = 		"";
$datetime = 	"";

//gets local time of database location
$datetime = date("Y-m-d", time());

//gets ip from user
$Ip = $_SERVER['REMOTE_ADDR'];

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

//checks submit button is clicked 
//when clicked it will chekc if a input field is empty 
//if it is empty i will not make the variable diffrent
//if its filled in the variable will change to whats in there 
if (isset($_POST["submit"])) {

	if($_POST["Name"]!=""){
		$Name = $_POST["Name"];
	}

	if($_POST["Lastname"]!=""){
		$Lastname = $_POST["Lastname"];
	}

	if ($_POST["Message"] !="") {
	$Message = $_POST["Message"];
	}
	
	if($_POST["Mail"]!=""){
		$Mail = $_POST["Mail"];
	}

	$WebAdress = $_POST["WebAdress"];
}

//code that adds data to you database
if($Name!="" && $Lastname !="" && $Message !="" && $Mail !=""){
	$sql = "INSERT INTO `guestinfo`(`ID`, `Name`, `LastName`, `WebAdress`, `Message`, `Ip`, `Mail`, `datetime`) VALUES ('' , '$Name' , '$Lastname' , '$WebAdress' , '$Message' , '$Ip' , '$Mail' , '$datetime'  )";

		if (connectToDB("guestbook")->query($sql) === TRUE) {
			?>
				<div id="CorrectMessage">
					New record created successfully
				</div>
			<?php 
		} else {
		    echo "Error: " . $sql . "<br>" . connectToDB("guestbook")->error;
		}
}

//	echo "<pre>";
//	var_dump($sql);
//	echo "</pre>";

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
        <a href="index.php"><div class="button active">Home</div></a>
        <a href="guestbook.php"><div class="button">GuestBook</div></a>
      </div>
	</header>

	<div class="Form-Style">
		<form method="POST">
			<fieldset>
				<legend><span class="Number">1 </span>Customer Input</legend>
				<input  type="text" name="Name" 		required placeholder="Name">
				<input  type="text" name="Lastname" 	required placeholder="Lastname">
				<input  type="text" name="Mail" 		required placeholder="E-Mail">
				<input  type="text" name="WebAdress"	required placeholder="WebAdress">
				<legend><span class="number">2</span> Additional Message</legend>
				<textarea name="Message" placeholder="Message"></textarea>

			</fieldset>
			<input onclick="validateForm()" type="submit" name="submit" >
			<input type="reset" name="reset">
		</form>
	</div>

    <footer>
     <a href="http://www.nyan.cat/"> @ Made By Max van den Boom. </a>
    </footer>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>