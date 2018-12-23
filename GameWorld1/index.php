<html>
  <head>
  <meta charset="utf-8" />
  <meta name="description" content="Game World The Best Game Shop Around">
  
  <title>Game World.</title>
    
    <link rel="stylesheet/less" type="text/css" href="less/slideShow.less" />
    <link rel="stylesheet" type="text/css" href="css/style.css">    
    <link rel="stylesheet/less" type="text/css" href="less/main.less" />

    <script src="js/less.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
  </head>

  <body>
  <div class="Container">
      <header>
      <a href="#home"><div id="logo"><img src="images/logo.jpg" alt="Logo"></div></a>
      <div id="menuContent">
        <div class="menuPadding"></div>
        <a href="index.php"><div class="button active">Home</div></a>
        <a href="temp.php?catID=4"><div class="button">Shop</div></a>
        <a href="about.php"><div class="button">About me</div></a>
        <a href="checkout.php"><div class="button">Checkout</div></a>
      </div>
    </header>
        <div class="slideShow">
          <div class="slides">
            <div class="slide"><a href="temp.php?catID=1"><img src="images/slides/slide1.jpg"></a></div>
            <div class="slide"><img src="images/slides/slide2.jpg"></div>
            <div class="slide"><a href="temp.php?catID=2"><img src="images/slides/slide3.jpg"></a></div>
            <div class="slide"><img src="images/slides/slide4.jpg"></div>
            <div class="slide"><a href="temp.php?catID=3"><img src="images/slides/slide5.jpg"></a></div>
          </div>
          
          <div id="Thumbnails">
            <div class="slideThumbnail" slideIndex="0"><img src="images/slides/slide1.jpg"></div>
            <div class="slideThumbnail" slideIndex="1"><img src="images/slides/slide2.jpg"></div>
            <div class="slideThumbnail" slideIndex="2"><img src="images/slides/slide3.jpg"></div>
            <div class="slideThumbnail" slideIndex="3"><img src="images/slides/slide4.jpg"></div>
            <div class="slideThumbnail" slideIndex="4"><img src="images/slides/slide5.jpg"></div>

          </div>
        </div>
        <footer>
          @ Made By Max van den Boom. 
        </footer>
      </div>
    <script src="js/slideShow.js" type="text/javascript"></script>
  </body>
</html>