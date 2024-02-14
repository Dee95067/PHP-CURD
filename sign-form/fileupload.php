<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>file Upload</title>
</head>

<body>
  <form action="#" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploadfile"><br><br>
    <input type="submit" name="Submit" value="Upload File">
  </form>
</body>

</html>


<?php

 $filename = $_FILES["uploadfile"]["name"];
 $tempname = $_FILES["uploadfile"]["tmp_name"];
 $folder = "images/". $filename;
 //echo $folder;
 move_uploaded_file($tempname,$folder);
 
// print_r($_FILES["uploadfile"]);

echo "<img src='$folder' height='100px' width='100px'>";
?>


<!-- //<img src="images/1.jpg" height="100px" width="100px"> -->