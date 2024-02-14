<?php
session_start();
//echo "Welcome".$_SESSION['user_name'] 
 

?>


<html>

<head>
  <title>Display</title>
  <style>
    body {
      background-color: #D071F9;
    }

    table {
      background-color: white;
    }

    .update,
    .delete {
      background-color: green;
      color: white;
      font-size: 14px;
      outline: none;
      border-radius: 5px;
      border: none;
      height: 25px;
      width: 80px;
      font-weight: bold;
      cursor: pointer;
    }

    .delete {
      background-color: red;

    }
  </style>
</head>

</html>





<?php
include("connection.php");
// error_reporting(0);

$userprofile = $_SESSION['user_name'];

if($userprofile == true){
 
}
else{
  header('location:login.php');
}


$query  = " SELECT * FROM data2 ";

$data = mysqli_query($conn, $query);  //QUERY EXECUTE

$total  = mysqli_num_rows($data);    // HOW TO PRESENT DATA


//echo $total;

if ($total != 0) {
  //echo " Table has record";

?>

  <h2 align="center"><mark>Display All Records</mark></h2>
  <center>
    <table border="3" cellspacing="12" width="100%">
      <tr>
        <th width="3%">ID</th>
        <th width="8%">Image</th>
        <th width="7%">First Name</th>
        <th width="6%">Last Name</th>
        <th width="5%">Gender</th>
        <th width="15%">Email Address</th>
        <th width="10%">Phone Number</th>
        <th width="7%">Caste</th>
        <th width="10%">Language</th>
        <th width="15%">Your Address</th>
        <th width="21%">Operations</th>
      </tr>


    <?php
    // $a = 1;

    while ($result = mysqli_fetch_assoc($data)) { // records ko page pr bulane ke liye.(ye data ko Array ke form me lata hai.)

      echo "<tr>
         <td>" . $result['id']  . "</td>
   
         <td><img src= '" . $result['std_image'] .  "' height='50px' width='50px'></td>
         
         <td>" . $result['fname']  . "</td>
         <td>" .  $result['lname']  . "</td>
         <td>" . $result['gender'] . "</td>
         <td>" .  $result['email'] . "</td>
         <td>" . $result['phone']  . "</td>
         <td>" .  $result['caste'] . "</td>
         <td>" .  $result['language'] . "</td>
         <td>" . $result['address']  . "</td>

         <td>
         
         <a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
         <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>
         
         
         </td>

  </tr>";
    }
  } else {
    // echo "No records found";
  }
    ?>
    </table>
  </center>
  <a href="Logout.php"><input type="submit" name="" value="LogOut" style="background:blue; color:white; height:35px; width:100px; margin-top:2opx; border: 0; border-radius:5px; cursor:pointer;"></a>
  <script> 
    function checkdelete() {
      return confirm('Are you sure you want to delete this record ?');
    }
  </script>