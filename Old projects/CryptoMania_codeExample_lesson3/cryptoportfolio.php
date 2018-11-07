<?php


include('includes/get_coins_db.php');

?>
<html>
<head>

	<meta charset="UTF-8">

	<title>CryptoMania - Lesson 3</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" >

</head>
<body>

	<nav>
		<ul class="nav">
		  <li class="nav-item">
		    <a class="nav-link active" href="index.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="cryptoportfolio.php">Crypto portfolio</a>
		  </li>
		</ul>
	</nav>

	<table class="table" id="crypto-folio-table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Bought on</th>
				<th>Name</th>
				<th>Price</th>
				<th>Amount</th>
				
				<th>Total</th>
				<th>Save</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			<template id="all-coins-template">
				{{#.}}
				<tr>
					<td>{{id}}</td>
					<td>{{bought_on}}</td>
					<td>{{name}}</td>
					<td >{{price}}</td>
					<td><input type="number" value="{{amount}}" class="amount-input" /></td>
					<td class="price-total">{{totalValue}}</td>
					<td><button type="button" class="btn btn-warning save-coin-btn" value="{{id}}">Save</button></td>
					<td><button type="button" class="btn btn-danger">Delete</button></td>
				</tr>
				{{/.}}
			</template>

		</tbody>
		<tfoot>
			<tr>
			  <td></td>
			  <td></td>
			   <td></td>
			    <td></td>
			     <td></td>
			   <td id="total-value"></td>
			  <td></td>
			  <td></td>
			</tr>
	  </tfoot>
	</table>

	

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<!-- Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- Mustache JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.js"></script>
    		
    <!-- Custom js  -->
    <script src="js/main.js"></script>
</body>
</html>