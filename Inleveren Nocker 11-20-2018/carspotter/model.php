<?php
session_start();
if (isset($_GET['brand'])) {
    $brand = $_GET['brand'];
}
if (isset($_GET['model'])) {
    $modelName = $_GET['model'];
}

include("inc/functions.php");

$sqlI = "SELECT id FROM types WHERE name = '" . $modelName . "'";
$id = connectWithDatabase($sqlI);

//var_dump($id[0]['id']);
//die();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Spotter | <?php echo $brand; ?> | <?php echo $modelName; ?></title>

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="models.php">Models
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Model
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php loginFrom(); ?>
            </ul>
        </div>
    </div>
</nav>
<?php
if (isset($brand) && isset($modelName)) {
    ?>
    <!-- Page Content -->
    <div class="container page-content">

        <!-- Page Heading -->
        <h1 class="my-4"><?php echo $brand; ?>
            <small><?php echo $modelName; ?></small>
        </h1>

        <div class="w3-content" style="max-width:1200px">
            <img class="mySlides img-fluid rounded mb-3 mb-md-0"
                 src="img/<?php echo $brand; ?>/<?php echo $modelName ?>/car.png" style="width:100%">
            <img class="mySlides img-fluid rounded mb-3 mb-md-0"
                 src="img/<?php echo $brand; ?>/<?php echo $modelName ?>/detail.png" style="width:100%">
            <img class="mySlides img-fluid rounded mb-3 mb-md-0"
                 src="img/<?php echo $brand; ?>/<?php echo $modelName ?>/interior.png" style="width:100%">

            <div class="w3-row-padding w3-section">
                <div class="w3-col s4">
                    <img class="demo w3-opacity w3-hover-opacity-off img-fluid rounded mb-3 mb-md-0"
                         src="img/<?php echo $brand; ?>/<?php echo $modelName ?>/car.png" style="width:100%"
                         onclick="currentDiv(1)">
                </div>
                <div class="w3-col s4">
                    <img class="demo w3-opacity w3-hover-opacity-off img-fluid rounded mb-3 mb-md-0"
                         src="img/<?php echo $brand; ?>/<?php echo $modelName ?>/detail.png" style="width:100%"
                         onclick="currentDiv(2)">
                </div>
                <div class="w3-col s4">
                    <img class="demo w3-opacity w3-hover-opacity-off img-fluid rounded mb-3 mb-md-0"
                         src="img/<?php echo $brand; ?>/<?php echo $modelName ?>/interior.png" style="width:100%"
                         onclick="currentDiv(3)">
                </div>
            </div>
        </div>

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function currentDiv(n) {
                showDivs(slideIndex = n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                }
                x[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " w3-opacity-off";
            }
        </script>

        <?php
        if (!isset($brandname)) {
            $sql = "SELECT brand FROM brand WHERE id = (SELECT brandid FROM types WHERE name = '" . $modelName . "')";
            $brand = connectWithDatabase($sql)[0]['brand'];

            $sql = "SELECT description FROM types WHERE name = '" . $modelName . "'";
            ?>
            <!-- Project One -->
            <div class="row">
                <div class="col-md-5">
                    <h3><?php echo $modelName ?></h3>
                    <p> <?php echo connectWithDatabase($sql)[0]['description']; ?></p>
                </div>
            </div>
            <hr>
        <?php }
        if (isset($_SESSION['username'])) {
            ?>
            <h3>Write a Review</h3>


            <div>
                <form id="validation-form"
                ">
                <div>
                    <fieldset class="rate">
                        <input type="radio hidden" id="ratingA" name="rating" value="0"/>
                        <input type="radio" id="rating10 rating" name="rating" value="10"/><label for="rating10"
                                                                                           title="5 stars"></label>
                        <input type="radio" id="rating9" name="rating" value="9"/><label class="half" for="rating9"
                                                                                         title="4 1/2 stars"></label>
                        <input type="radio" id="rating8" name="rating" value="8"/><label for="rating8"
                                                                                         title="4 stars"></label>
                        <input type="radio" id="rating7" name="rating" value="7"/><label class="half" for="rating7"
                                                                                         title="3 1/2 stars"></label>
                        <input type="radio" id="rating6" name="rating" value="6"/><label for="rating6"
                                                                                         title="3 stars"></label>
                        <input type="radio" id="rating5" name="rating" value="5"/><label class="half" for="rating5"
                                                                                         title="2 1/2 stars"></label>
                        <input type="radio" id="rating4" name="rating" value="4"/><label for="rating4"
                                                                                         title="2 stars"></label>
                        <input type="radio" id="rating3" name="rating" value="3"/><label class="half" for="rating3"
                                                                                         title="1 1/2 stars"></label>
                        <input type="radio" id="rating2" name="rating" value="2"/><label for="rating2"
                                                                                         title="1 star"></label>
                        <input type="radio" id="rating1" name="rating" value="1"/><label class="half" for="rating1"
                                                                                         title="1/2 star"></label>
                    </fieldset>
                    <div class="invalid feedback_rating_invalid    hidden">rating is empty.</div>
                    <div class="valid feedback_rating_valid hidden">rating is good.</div>
                </div>
                <label for="fname">Title</label>
                <input type="text" id="input_title" name="title" value="" placeholder="Your title..">
                <div class="invalid feedback_title_invalid hidden">Title is empty.</div>
                <div class="valid feedback_title_valid hidden">Title is good.</div>

                <label for="lname">Message</label>
                <textarea id="comment" name="comment" placeholder="Enter text here.."></textarea>
                <div class="invalid feedback_comment_invalid hidden">comment is empty.</div>
                <div class="valid feedback_comment_valid hidden">comment is good.</div>

                <input type="hidden" name="id" value="<?php echo $id[0]['id']; ?>">
                <input type="hidden" name="model" value="<?php echo $modelName; ?>">
                <button type="button" class="btn btn-primary submit_btn">Add review</button>
                </form >

            </div>

        <?php } else {
            ?>
            You have to be logged in to review this car!
            <a class="btn btn-primary" href="#" onclick="document.getElementById('id01').style.display='block'">Sign
                In</a>
        <?php } ?>
        <hr>
        <?php
        $sql = "SELECT * FROM review WHERE typeId = (SELECT id FROM types WHERE name = '" . $modelName . "')";
        $reviews = connectWithDatabase($sql);
        foreach ($reviews as $review) {
            ?>
            <div class="comment-wrap">
                <div class="comment-block">
                    <h3><?php echo $review['title']; ?></h3>
                    <p class="comment-text"><?php echo $review['review']; ?></p>
                    <div class="bottom-comment">
                        <div class="comment-date"><?php echo $review['datereview']; ?> |
                            By <?php echo $review['author']; ?> | rated <?php echo $review['rating'] / 2; ?> out of 5
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- /.container -->
    <?php
} else {
    ?>
    <div style="
    height: calc(100vh - 208px);
    width: 100%;
"></div>
    <?php
}
?>

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
<script src="js/formValidation.js"></script>

</body>

</html>
