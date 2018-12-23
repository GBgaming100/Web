<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	<meta name="description" content="Game World The Best Game Shop Around">
	<title>Game World.</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">    
    <link rel="stylesheet/less" type="text/css" href="less/main.less" />
    <link rel="stylesheet" type="text/css" href="css/buy_style.css">

    <script src="js/less.min.js" type="text/javascript"></script>

	</head>
	<body>
      <header>
      <a href="#home">
        <div id="logo">
          <img src="images/logo.jpg" alt="Logo" id="LogoImg">
        </div></a>
          <div id="menuContent">
            <div class="menuPadding"></div>
        <a href="index.php"><div class="button">Home</div></a>
        <a href="temp.php?catID=4"><div class="button active">Shop</div></a>
        <a href="about.php"><div class="button">About me</div></a>
        <a href="checkout.php"><div class="button">Checkout</div></a>
      </div>
    </header>

	  <?php 
	    include("inc/Backgroundscript.php");
	    Backgroundscript();
	  ?>

		<div id="Title">
			
				<?php
				$Category = $_GET['catID'];

				// this changes the page title 
				switch ($Category) {
					case '1':
						echo "<h2 id='GameTitle1'>PC</h2>";
						break;

					case '2':
						echo "<h2 id='GameTitle2'>Playstation</h2>";
						break;

					case '3':
						echo "<h2 id='GameTitle0'>Xbox</h2>";
						break;

					case '4':
						echo "<h2 id='gameTitle3'>All Games</h2>";
						break;
				}
				?>
			
		</div>

		<div id="container">
		<form name="orderForm" action="addToCart.php" method="post">
		<?php
		$Category = $_GET['catID'];

		$con = mysqli_connect("localhost","root","usbw","GameWorld");
		if($Category == 1 or 2 or 3){
			$sql = mysqli_query($con,"SELECT * FROM pc WHERE Category = $Category");
		} 	
		if($Category == 4){
			$sql = mysqli_query($con,"SELECT * FROM pc ORDER BY Category ASC");
		}
		
		// empty array to fill
		$results = array();
		while($row = mysqli_fetch_assoc($sql))
		{
			$results[] = $row;
		}
		
		for($n = 0; $n < count($results); $n++)
		{	
			echo '<div class="games'.$results[$n]['Category'].'">';

				//gets the price for each game
				echo '<div class="price">';
					echo "$" . $results[$n]['Price'] . "<br />";
				echo '</div>';

				//gets the image location for each game
				echo "<img src=\"" . $results[$n]['Image'] . "\">" ;

				//gets the name for the game
				echo '<p class="name">';
					echo $results[$n]['Name'] . "<br />";
				echo '</p>';

				// gives each game a check box so that the sesion knows what your choise of game is
				echo '<div class="bestel'.$results[$n]['Category'].'">';
					?>
					<input type="checkbox" name="selectedGameIDs[]" value="<?php echo $results[$n]['ID'];?>">
					<?php
				echo '</div>';

			echo '</div>';
		}


		?>
		<br>
		<input type="submit" name="mySubmit" value="Put in shopping cart">
		</form>
	</div>
	</body>
</html>