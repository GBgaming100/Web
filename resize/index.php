<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<form action="create_photo_gallery.php" method="POST" enctype="multipart/form-data">
    <input  type="file" name="files[]" multiple>
    <p>Drag your files here or click in this area.</p>
    <div class="numbers">
        <div class="widthContainer">
          <p>Width:</p><input class="width" type="number" name="width" placeholder="Width" value="800">
        </div>
        <div class="heightContainer">
          <p>Height:</p><input class="height" type="number" name="height" placeholder="Height" value="800">
        </div>
    </div>
    <button type="submit">Upload</button>
</form>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/index.js"></script>

</body>
</html>