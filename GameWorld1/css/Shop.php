<?php
session_start();
if (isset($_GET['delete'])) {
	session_destroy();
}
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Game World The Best Game Shop Around">
	<title>Game World.</title>

	<link rel="stylesheet" type="text/css" href="css/buy_style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">    
    <link rel="stylesheet/less" type="text/css" href="less/main.less" />

    <script src="js/less.min.js" type="text/javascript"></script>

</head>
<body>
<div id="container">
	<header id="header">
        <a href="index.php"><div id="logo"><img src="images/logo.jpg" alt="Logo"></div></a>
        <div id="menuContent">
        <div class="menuPadding"></div>
        <a href="index.php"><div class="button">Home</div></a>
        <a href="temp.php?catID=4"><div class="button active">Shop</div></a>
        <a href="about.html"><div class="button">About me</div></a>
      </div>
	</header>

<?php
  include('inc/BackgroundScript.php');
  BackgroundScript();
?>

<div id="Games">
  <?php 
		echo '<div class="games_total">';

	$category = $_GET['catID'];
	
	mysql_connect("localhost","root","usbw");
	mysql_select_db("gameworld");

	//if the catID equals 1,2,3 it will show the console where 1 = pc, 2 = ps4, 3 = xbox.
  if($category == 1 or 2 or 3){
	    $sql = mysql_query("SELECT * FROM PC where Category = $category	");
	  }

	//if the catID equals 4 it will show all console's 
	if($category == 4){
	   	$sql = mysql_query("SELECT * FROM PC");
	  }
   ?>
   <?php 
   //empty array to fill 
   $results = array();
   while($row = mysql_fetch_assoc($sql))
	{
		$results[] = $row;
	};
	?>
	  <form name="orderForm" action="addToCart.php" method="POST">
	<?php
	for ($n=0; $n < count; $n++) { 
		?>
		<div class="games">
		  <div class="price">
		  <?php
		  echo "$" . $results[$n]['Price'] . "<br />";
		  ?>
		  </div>
		<img src="<?php echo $results[$n]['Image']; ?>">
		<p class="name">
		<?php
		echo  $results[$n]['Name'] . "<br />";
		?>
		</p>
	      <div class="bestel">
	        <input type="checkbox" name="gameIds[]" value="<?=$results[$n]['ID']?>">
	      </div>
	    </div>

	    <input type="submit" name="mySubmit" value="Order selected items" />
	   </form>
	<a href="Shop.php?catID=1&delete=1"></a>
</div>	
</body>
</html>
