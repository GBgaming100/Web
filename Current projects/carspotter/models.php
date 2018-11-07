<?php
session_start();
$brand = "Car";
    if(isset($_GET['brand']))
    {
    $brand = $_GET['brand'];
    echo $brand;
    $sql = "SELECT *, AVG(COALESCE(NULL, p.rating/2)) AS avg_salary, COUNT(p.rating) as countrating FROM types e left JOIN review p ON p.typeId = e.id WHERE e.brandId = (SELECT id FROM brand WHERE brand = '" .$brand. "') GROUP BY e.name ORDER BY avg_salary DESC, countrating DESC";
    }
    else
    {
    $sql = " SELECT *, AVG(COALESCE(NULL, p.rating/2)) AS avg_salary, COUNT(p.rating) as countrating FROM types e left JOIN review p ON p.typeId = e.id GROUP BY e.name ORDER BY avg_salary DESC, countrating DESC";
    }
  include("inc/functions.php"); 
    $models = connectWithDatabase($sql);
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Spotter | Models</title>

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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Brands</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="models.php">Models
                <span class="sr-only">(current)</span>
              </a>
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
      <h1 class="my-4">Models
        <small>All <?php echo $brand ; ?> Models</small>
      </h1>
      <?php 
        foreach ($models as $model) {
          if(!isset($_GET['brand'])) {
            $sql = "SELECT brand FROM brand WHERE id = (SELECT brandid FROM types WHERE name = '". $model['name']. "')";
            $brand = connectWithDatabase($sql)[0]['brand'];
          }

		?>
      <!-- Project One -->
      <div class="row">
        <div class="col-md-7">
          <a href="model.php?brand=<?php echo $brand  ?>&model=<?php echo $model['name'] ?>">
            <img class="img-fluid rounded mb-3 mb-md-0" src="img/<?php echo $brand ;?>/<?php echo $model['name'] ?>/car.png" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $brand ." ". $model['name'] ?></h3>
          <br>
          <a class="btn btn-primary" href="model.php?brand=<?php echo $brand  ?>&model=<?php echo $model['name'] ?>">View Model</a>
          <hr>
          <p><?php echo $model['description'] ?></p>
          
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
