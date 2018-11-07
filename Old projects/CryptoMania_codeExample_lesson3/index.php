<!DOCTYPE>
<html>
<head>

	<meta charset="UTF-8">

	<title>CryptoMania - Lesson 3</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" >

</head>
<body>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"><span id="coin-name">Bitcoin<span> <span id="short-name">(BTC)</span></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Current price $<span id="coin-price">7486.20</span>
	        <br />
	        Amount: <input type="number" id="amount-coins">
	        <br />
	        Total: <span id="total-value">0</span>
	        <br />
	        <button type="button" class="btn btn-primary" id="js-add-coin-btn">Add</button>
	      </div>
	    </div>
	  </div>
	</div>

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

	<table class="table">
		<thead>
			<tr>
				<th>Short</th>
				<th>Name</th>
				<th>Price</th>
				<th>Marketcap</th>
				<th>%24h</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>BTC</td>
				<td>Bitcoin</td>
				<td>7486.2</td>
				<td>127825554915</td>
				<td>-2.86</td>
				<td>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
 						More info
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 						Add
					</button>
				</td>
			</tr>
			<tr>
				<td>ETH</td>
				<td>Ethereum</td>
				<td>588.652</td>
				<td>127825554915</td>
				<td>-2.86</td>
				<td>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
 						More info
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 						Add
					</button>
				</td>
			</tr>
			<tr>
				<td>BTC</td>
				<td>Bitcoin</td>
				<td>7486.2</td>
				<td>58787215971.692</td>
				<td>-4.35</td>
				<td>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
 						More info
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 						Add
					</button>
				</td>
			</tr>
			<tr>
				<td>XRP</td>
				<td>Ripple</td>
				<td>0.650177</td>
				<td>25513937551.275097</td>
				<td>-1.71</td>
				<td>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
 						More info
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 						Add
					</button>
				</td>
			</tr>
		</tbody>
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