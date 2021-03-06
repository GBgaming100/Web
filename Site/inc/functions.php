<?php
	session_start();

	function connectWithDatabase($sql)
	{
        $connect = mysqli_connect("http://amxdev.nl:3306","vending","102200", "myvending"); //localhost

		$resource = mysqli_query($connect, $sql);
	    $retuning_array = array();
	    while($result = mysqli_fetch_assoc($resource))
	    {
	    	$retuning_array[] = $result;
	    }
	    return $retuning_array;
	}


	function styleAndStuffs()
	{
		?>
			<link href="https://fonts.googleapis.com/css?family=Lily+Script+One|Montserrat" rel="stylesheet">

			<link rel="stylesheet" href="dest/css/bootstrap.min.css">
			<link rel="stylesheet" href="dest/css/glider.css" />

			<link rel="stylesheet" href="css/style.css" >

			<link rel="stylesheet" type="text/css" href="css/sal.css">

			<link rel="icon" href="img/icon.png">

			<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
			<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>			

		<?php
	}

	function addMessage($type, $text)
	{

	if (!isset($_SESSION['messages'])) {
		$_SESSION['messages'] = [];
	}

	$id = sizeof($_SESSION['messages']);
	$icon = "";
	switch ($type) {
		case 'success':
			$icon = "fa fa-check";
			break;

		case 'danger':
			$icon = "fa fa-exclamation";
			break;


		case 'info':
			$icon = "fa fa-info-circle";
			break;

		case 'warning':
			$icon = "fas fa-exclamation-triangle";
			break;
		
		default:
			$icon = "fa fa-check";
			break;
	}


	$message = array('Id' => $id, 'Type' => $type, 'Text' => $text, 'Icon' => $icon);


	array_push($_SESSION['messages'], $message);

	}

	function alerts()
	{
		?>

		<div class="alert-container"></div>

		<?php
	}

	function importHeader($scrolled)
	{

		$sql = "SELECT user_credit FROM users WHERE user_id = 5";
		$user_credit = connectWithDatabase($sql)[0]['user_credit'];

	?>

	<nav class="navbar navbar-expand-lg navbar-light <?php echo $scrolled; ?>">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        My Vending
      </a>
      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav float-right">

		<?php if (!isset($_SESSION["user"])) { ?>
          <li class="nav-item mr-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
              <i class="fas fa-sign-in-alt"></i> Login
            </button>
          </li>

          <li class="nav-item mr-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAccountModal">
              <i class="fas fa-user-plus"></i> creëer account
            </button>
          </li>
  		<?php }else{ ?>
      
          <li class="nav-item te">
            <a class="nav-link text-white" data-toggle="modal" data-target="#mycard" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-shopping-basket"></i> Lijst
            </a>
          </li>

          <li class="nav-item te">
            <a class="nav-link text-white" data-toggle="modal" data-target="#transactionsModal" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-clipboard-list"></i> Transacties
            </a>
          </li>

          <li class="nav-item mr-1">
            <a href="inc/user/signout.php" class="btn btn-primary text-white">
              <i class="fas fa-sign-out-alt"></i> Sign Out
            </a>
          </li>
          
  		<?php } ?>

        </ul>
      </div>
    </div>
    </nav>

    <!-- mycard -->
	<div class="modal fade" id="mycard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-user="<?php echo $_SESSION['id'];?>">
	  <div class="modal-dialog  modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Mijn <i class="fas fa-shopping-basket text-primary"></i> Lijst</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      	<div class="accordion" id="card-items">
			        <template id="card-items-template">
			        	{{#.}}

			  <div class="card">
			    <div class="card-header" id="heading{{id}}">
			      <h5 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{id}}" aria-expanded="true" aria-controls="collapse{{id}}">
			          Locatie: {{name}}
			        </button>
			      </h5>
			    </div>

			    <div id="collapse{{id}}" class="collapse" aria-labelledby="headingOne" data-parent="#card-locations">
                {{#card}}

			        <div class="row">
			        	
			        	<div class="col-1"><img src="{{img}}" width="40" height="40"></div>
			        	<div class="col-6">{{name}}</div>
			        	<div class="col-3">€{{price}}</div>

			        	<div class="col-1">
			        		<i class="fas fa-minus-circle btn-deleteCardItem" data-product="{{id}}"></i>
			        	</div>

			        </div>

	       		{{/card}}
	       			<hr>

	       			<div class="row">
			        	
			        	<div class="col-1"></div>
			        	<div class="col-6">Total:</div>
			        	<div class="col-3">€<span id="totalPrice-{{id}}">0.00</span></div>

			        	<div class="col-1"></div>
			        </div>

		        	<div class="row">
		        	
			        	<div class="col-1"></div>
			        	<div class="col-6">Mijn crediet:</div>
			        	<div class="col-3">€<span id="saldoCurrent-{{id}}"><?php echo $user_credit;?></span></div>

		        		<div class="col-1"></div>

			        </div>

			        <hr>

			        <div class="row">
		        	
			        	<div class="col-1"></div>
			        	<div class="col-6">Saldo na betaling:</div>
			        	<div class="col-3">€<span id="saldoAfter-{{id}}">0.00</span></div>

		        		<div class="col-1"></div>

			        </div>

			        <button class="btn btn-secondary btn-genratebarcode w-100 mt-4" data-toggle="modal" data-target="#barcode" value="{{id}}">
			        	<i class="fas fa-money-bill"></i> Betalen
			        </button>

			      </div>
			    </div>
			  </div>
			  {{/.}}
	       </template>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

<div class="modal fade" id="barcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel">Locatie: ROC Ter-AA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="testQR"></div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
        <button type="button" class="btn btn-primary">Help</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Transacties-->
<div class="modal fade" id="transactionsModal" tabindex="-1" role="dialog" aria-labelledby="transactionsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="inc/user/signin.php" method="post" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="transactionsTitle">Transacties</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <table class="table">
			  <thead class="thead-primary">
			    <tr>
			      <th scope="col"></th>
			      <th scope="col">Product</th>
			      <th scope="col">Prijs</th>
			      <th scope="col">Datum</th>
			    </tr>
			  </thead>
			  <tbody id="transactions">

			  	<template id="transactions-template">
			  		{{#.}}
					    <tr>
					      <th scope="row"><img src="{{img}}" width="30px"></th>
					      <td>{{name}}</td>
					      <td>{{price}}</td>
					      <td>{{date}}</td>
					    </tr>
			    	{{/.}}
				</template>
			 
			  </tbody>
			</table>

        </div> 
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Login</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Login-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="inc/user/signin.php" method="post" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="loginTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Gebruikersnaam" name="username" aria-label="Username" aria-describedby="basic-addon1" required>
              <div class="invalid-feedback">
		         Voer gebruikersnaam in.
		       </div>
            </div>

            <div class="input-group mb-3 pass_show">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white" id="basic-addon2"><i class="fas fa-unlock-alt"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Wachtwoord" name="password" aria-label="Password" aria-describedby="basic-addon2" required>
               <div class="invalid-feedback">
		          Voer wachtwoord in.
		       </div>
            </div>
            <a href="forgotpassword.php">Wachtwoord vergeten?</a>

        </div> 
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Login</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal create account-->
<div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="createtitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="inc/user/signup.php" method="post" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="createtitle">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control create-name" placeholder="Gebruikersnaam" name="username" aria-label="Username" aria-describedby="basic-addon1" required>
              <div class="invalid-feedback">
		          Voer gebruikersnaam in.
		       </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white" id="basic-addon2"><i class="fas fa-envelope-open"></i></span>
              </div>
              <input type="email" class="form-control create-email" placeholder="E-mail" name="mail" aria-label="mail" aria-describedby="basic-addon2" required>
              <div class="invalid-feedback">
		          Voer e-mail in.
		       </div>
            </div>

            <div class="input-group mb-3 pass_show">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white" id="basic-addon3"><i class="fas fa-unlock-alt"></i></span>
              </div>
              <input type="password" class="form-control create-password" placeholder="Wachtwoord" name="password" aria-label="Password" aria-describedby="basic-addon3" required>
              <div class="invalid-feedback">
		          Voer wachtwoord in.
		       </div>
            </div>
        </div> 
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-create">Create Account</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>

    <?php

    alerts();

	}

	function js()
	{
		?>
			<!-- jQuery -->
		    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

		    <!-- Bootstrap -->
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		    <script src="dest/js/bootstrap.min.js"></script>

		    <!-- Mustache JS -->
		    <script src="dest/js/mustache.js"></script>
		    
		    <!-- Font Awsome JS -->
		    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

		    <!-- glider JS-->
		    <script src="dest/js/glider.js"></script>

		    <!-- qrcode JS -->
		    <script src="dest/js/qrcode.js"></script>

			<!-- sal.js -->
			<script src = "js/functions/sal.js"></script>

		    <!-- Custom js  -->
		    <script src="js/main.js"></script>
		<?php
	}
?>