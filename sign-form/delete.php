<?php

include("connection.php");
$ide = $_GET['id'];

$query = "DELETE FROM data2 WHERE id = '$ide'";
$data = mysqli_query($conn,$query);

if($data){

  
  header("location:display.php");
 echo "<script>alert('Record Delete')</script>";
}
else{
  echo "<script>alert('Failed Record')</script>";
}
?>