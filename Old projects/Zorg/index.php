<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>
        Reminder
    </title>

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style/main.css" >
    <link rel="stylesheet" href="style/var.css" >

    <link rel="icon" href="http://www.myiconfinder.com/uploads/iconsets/256-256-64273d52c282e3b26d2d0968d08b9d8d.png">
</head>

<body class="renegade-network" data-spy="scroll">

<nav class="navbar navbar-expand-lg bg-primary text-center mb-4">
  <h3 class="nav-header"></h3>
</nav>

<nav class="side-menu">
    <ul>
      <li><a href="#" data-toggle="modal" data-target="#exampleModal">Voeg taak Toe</a><span><i class="fas fa-plus-circle"></i></span></li>
      <li><a href="#" onclick="print()">Afdrukken</a><span><i class="fa fa-print"></i></span></li>
      <li>
      	<a href="https://www.nederlandfietsland.nl/knooppuntroutes">
	      	Fiets Routes
	      	
	      </a>
	      <span>
	      		<i class="fa fa-bicycle"></i>
	      </span>
	  </li>
      <li><a href="#">Navigeer Huis</a><span><i class="fas fa-map-marked"></i></span></li>
      <li><a href="#">Help</a><span><i class="fa fa-question"></i></span></li><!-- hier komt link naar handleiding -->
    </ul>
  </nav>

<div class="container" id="today">

	<button type="button" class="btn btn-secondary mb-4" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Voeg taak toe<i class="fas fa-plus-circle"></i>
	</button>

	<h3>Afgelopen uren</h3>
	<div id="todaysTask">

		<template id="todaysTask-template">
			{{#.}}
			<div class="card mb-4">
			  <div class="card-body" style="border-color: {{taak_color}};">
			    <h5 class="card-title">{{taak_name}} <i class="{{taak_medical}}"></i></h5>
			    <p class="card-text">{{taak_time_from}} - {{taak_time_till}}</p>
			    <a href="#" class="btn btn-secondary">Go somewhere</a>
			  </div>
			</div>
			{{/.}}
		</template>

	</div>
	<hr>

	
</div>

<!-- <div class="container" id="week">
	
	deze week
	
</div>

<div class="container" id="month">
	
	<div class="container-fluid">
	  <header>
	    <div class="row d-none d-sm-flex p-1 bg-secondary text-white">
	      <h5 class="col-sm p-1 text-center">Zaterdag</h5>
	      <h5 class="col-sm p-1 text-center">Zondag</h5>
	      <h5 class="col-sm p-1 text-center">Maandag</h5>
	      <h5 class="col-sm p-1 text-center">Dinsdag</h5>
	      <h5 class="col-sm p-1 text-center">Woensdag</h5>
	      <h5 class="col-sm p-1 text-center">Donderdag</h5>
	      <h5 class="col-sm p-1 text-center">Vrijdag</h5>
	    </div>
	  </header>

	  <div class="row border border-right-0 border-bottom-0 months">
	    <template id="month-template">
				{{#.}}
			    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate {{class}}">
			      <h5 class="row align-items-center">
			        <span class="date col-1">{{days}}</span>
			        <small class="col d-sm-none text-center text-muted">Sunday</small>
			        <span class="col-1"></span>
			      </h5>
			      <p class="d-sm-none">No events</p>
			    </div>
			    <div class="{{extra}}"></div>
			    {{/.}}
			</template>
	  </div>
	</div>
	
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Voeg Taak Toe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
		    <label for="taskName">Taak naam</label>
		    <input type="text" class="form-control" id="taskName" placeholder="bijv. Medicijnen in nemen">
	  	</div>

	  	<div class="form-group">
		    <label for="taskDate">Datum voor de taak</label>
		    <input type="date" class="form-control" id="taskDate">
	  	</div>

	  	<div class="form-group">
		    <label for="taskStart">Begin tijd</label>
		    <input type="time" class="form-control" id="taskStart" value="12:00">
	  	</div>

	  	<div class="form-group">
		    <label for="taskEnd">Eind tijd</label>
		    <input type="time" class="form-control" id="taskEnd" value="13:00">
	  	</div>

	  	<div class="form-group">
	 		<label for="colorPicker">Kleur van de kaart</label>
	 		<div class="color-selector" id="colorPicker">


				<label class="orange">
				  <input type="radio" name="color" value="#2196f3">
				  <div class="button"><span></span></div>
				</label>

				<label class="amber">
				  <input type="radio" name="color" value="#e91e63">
				  <div class="button"><span></span></div>
				</label>

				<label class="lime">
				  <input type="radio" name="color" value="#ffeb3b">
				  <div class="button"><span></span></div>
				</label>

				<label class="teal">
				  <input type="radio" name="color" value="#4caf50">
				  <div class="button"><span></span></div>
				</label>

				<label class="blue">
				  <input type="radio" name="color" value="#00bcd4">
				  <div class="button"><span></span></div>
				</label>

				<label class="indigo">
				  <input type="radio" name="color" value="#ff9800">
				  <div class="button"><span></span></div>
				</label>
			</div>
		</div>

		<h5>Voorbeeld:</h5>

		<div class="card mb-4">
		  <div class="card-body preview-body">
		    <h5 class="card-title"><span class="preview-title">titel</span> <i class="{{taak_medical}}"></i></h5>
		    <p class="card-text"><span class="preview-start">00:00</span> - <span class="preview-end">00:00</span></p>
		    <a href="#" class="btn btn-secondary">Go somewhere</a>
		  </div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuleren</button>
        <button type="button" id="add-task" class="btn btn-primary">Toevoegen <i class="fas fa-plus-circle"></i></button>
      </div>
    </div>
  </div>
</div>

<!-- <footer class="fixed-bottom bg-white">
	<ul class="nav nav-tabs justify-content-center">
	  <li class="nav-item">
	    <a class="tabs nav-link active" href="#today">Vandaag</a>
	  </li>
	  <li class="nav-item">
	    <a class="tabs nav-link" href="#week">Deze Week</a>
	  </li>
	  <li class="nav-item">
	    <a class="tabs nav-link" href="#month">Deze Maand</a>
	  </li>
	</ul>
</footer> -->

</body>
<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Mustache JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.js"></script>
    
    <!-- Font Awsome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    
    <!-- Custom js  -->
    <script src="js/main.js"></script>
    </html>
