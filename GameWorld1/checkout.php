<?php 
session_start();

//if ($_SESSION['myCheckout'] == true {
	//connection to the database (localname, gebruikersnaam wachtwoord, database die je nodig zult hebben)
	$connect = mysqli_connect("localhost","root","usbw","gameworld");

	//sets the query that the data base ask for 
	$selectGameQuery = "SELECT * FROM `pc` WHERE `pc`.`ID`";
	$selectGameQuery .= "IN(";

	//loop that runs until all games are put into the query
	//start query  
	$count = 1;
	foreach ($_SESSION['gameIds'] as $key => $value) {
		$selectGameQuery.= $key;
		if ($count < count($_SESSION['gameIds'])) {
	 	$selectGameQuery .= ",";

		}
		$count++;
	 } 

	 $selectGameQuery .= ")";
	 $selectGameQuery .= " ORDER BY `pc`.`Price` ASC";
	 //end query

	 $resource = mysqli_query($connect, $selectGameQuery);

	 //empty array to fill with information from the database 	
	 $games = array(); 
	 while ($result = mysqli_fetch_assoc($resource)) {
	 	$games[] = $result;
	 }

 ?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Game World The Best Game Shop Around">
		<title>Game World.</title>

		<link rel="stylesheet" type="text/css" href="css/table.css">
	    <link rel="stylesheet" type="text/css" href="css/style.css">    
	    <link rel="stylesheet/less" type="text/css" href="less/main.less" />
    	<link rel="stylesheet" type="text/css" href="css/buy_style.css">

	    <script src="js/less.min.js" type="text/javascript"></script>

	</head>

	<body> 

<div id="container">
	<header id="header">
        <a href="index.php"><div id="logo"><img src="images/logo.jpg" alt="Logo"></div></a>
        <div id="menuContent">
        <div class="menuPadding"></div>
        <a href="index.php"><div class="button">Home</div></a>
        <a href="temp.php?catID=4"><div class="button">Shop</div></a>
        <a href="about.php"><div class="button">About me</div></a>
        <a href="checkout.php"><div class="button active">Checkout</div></a>
      </div>
	</header>

	  <?php 
	    include("inc/Backgroundscript.php");
	    Backgroundscript();
	  ?>
	  
</div>
<table class="table-fill">
	<thead>
		<tr>
		<th class="text-left">image</th>
		<th class="text-left">name</th>
		<th class="text-left">price</th>
		</tr>
	</thead>
	<tbody class="table-hover">
	<?php 
		foreach ($games as $key => $game) {
			?>
			<tr>
				<td>
					<img src="<?php echo $game['Image'] ?>">

					</td>
					<td><?php echo $game['Name']; ?></td>
					<td><?php echo $game['Price']; ?></td>
				</td>
			</tr>
		<?php
		}
	 ?>
	</tbody>
	<tfoot>
		<td colspan="2">total</td>
		<td>
		</td>
	</tfoot>
</table>
</body> 