<?php
session_start();
	include("inc/functions.php"); 


  ?>

  <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Spotter</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Car Spotter <i class="fas fa-car"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Brands
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="models.php">Models</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="model.php">Model</a>
            </li>
            <?php   loginFrom(); ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container page-content">

      <!-- Page Heading -->
      <h1 class="my-4">Brands
        <small>All Car Brands</small>
      </h1>
      <?php 
			$sql = " SELECT *, AVG(COALESCE(NULL, p.rating/2)) AS avg_salary, COUNT(p.rating) as countrating FROM brand e left JOIN review p ON p.brandid = e.id GROUP BY e.brand ORDER BY avg_salary DESC, countrating DESC";
			$brands = connectWithDatabase($sql);
			foreach ($brands as $brand) {
		?>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-7">
          <a href="models.php?brand=<?php echo $brand['brand'] ?>">
            <img class="img-fluid rounded mb-3 mb-md-0" src="img/<?php echo $brand['brand'] ?>/logo.png" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $brand['brand'] ?></h3>
          <p><?php echo $brand['description'] ?></p>
          <a class="btn btn-primary" href="models.php?brand=<?php echo $brand['brand'] ?>">View Models</a>
        </div>
      </div>
      <hr>
      <?php } ?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Car Spotter 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
  </body>

</html>
