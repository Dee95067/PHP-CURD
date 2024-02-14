<?php
// error_reporting(0);                    //---------------> Hide the warning 
$servername="localhost";
$username="root";
$password="";
$databasename="responsiveform";


$conn = mysqli_connect($servername,$username,$password,$databasename);

if($conn){
  //echo "successfuly connection !";




}
else{
  //echo "connection fail..........!"; //.mysqli_connect_error()--->Use of show the error message.


  
}

?>