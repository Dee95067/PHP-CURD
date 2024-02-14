<?php include("connection.php");

 session_start();

$ide = $_GET['id'];

$userprofile = $_SESSION['user_name'];

if($userprofile == true){
 
}
else{
  header('location:login.php');
}


// echo $_GET['fname'];
// echo $_GET['lname'];
// echo $_GET['gender'];
// echo $_GET['email'];
// echo $_GET['phone'];
// echo $_GET['address'];

$query  = " SELECT * FROM data2 WHERE id ='$ide' ";
$data = mysqli_query($conn, $query);  //QUERY EXECUTE
// $total  = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);   

?>


<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Form</title>
  <link rel="stylesheet" href="style..css">
</head>

<body>
  <div class="container">
    <form action="" method="POST">
      <div class="title">
        Update Student Details
      </div>

      <div class="form">
        <div class="input_field">
          <label>First Name </label>
          <input type="text" class="input" name="fname" required value="<?php echo $result['fname'] ?>">
        </div>

        <div class="input_field">
          <label>Last Name </label>
          <input type="text" class="input" name="lname" required value="<?php echo $result['lname'] ?>">
        </div>

        <div class="input_field">
          <label>Pasword</label>
          <input type="password" class="input" name="password" required value="<?php echo $result['password'] ?>">
        </div>

        <div class="input_field">
          <label>Confirm Password </label>
          <input type="text" class="input" name="confirmpassword"  required value="<?php echo $result['cpassword'] ?>">
        </div>

        <div class="input_field">
          <label>Gender </label>
          <div class="selectBox">
            <select name="gender"  required>
              <option value="">--Select--</option>
              
              <option value="Male"  
               <?php
                 if($result['gender'] == 'Male'){
                  echo ' selected';
                 }
               ?>
              >
                Male</option>
              <option val="Female"
              <?php
                 if($result['gender'] == 'Female'){
                  echo ' selected';
                 }
               ?>
              
              >
                
              Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

        <div class="input_field">
          <label>Email Address</label>
          <input type="Email" class="input" name="email"  required value="<?php echo $result['email'] ?>">
        </div>

        <div class="input_field">
          <label>Phone Number</label>
          <input type="number" class="input" name="phone"  required value="<?php echo $result['phone'] ?>">
        </div>

        <div class="input_field">
          <label>Address</label>
          <textarea name="address"  required> <?php echo $result['address']?> </textarea>
        </div>

        <div class="input_field terms">
          <label class="check">
            <input type="checkbox"  required>
            <span class="checkmarks"></span>
          </label>
          <p>Agree to terms and conditions</p>
        </div>

        <div class="input_field">
          <input type="submit" value="Update Design" class="btn" name="update">
        </div>
      </div>
    </form>
  </div>
</body>

</html>


<!--- create variable >
<?php
if ($_POST['update']) 
{
  $fname    = $_POST['fname'];
  $lname    = $_POST['lname'];
  $pwd      = $_POST['password'];
  $cpwd     = $_POST['confirmpassword'];
  $gender   = $_POST['gender'];
  $email    = $_POST['email'];
  $phone    = $_POST['phone'];
  $address  = $_POST['address'];

  //Server side validation

  // if (
  //   $fname!= "" && $lname!= "" && $pwd!= "" && $cpwd!= "" && $gender!= "" && $email!= "" && $phone!= "" &&
  //   $address  != "")
  
  // {
  

     $query = "UPDATE data2 SET  fname='$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email ='$email',phone ='$phone',address='$address' WHERE id='$ide'";
     $data = mysqli_query($conn, $query);
      
   
     if ($data) 
     {
      
    
      // Redirect to page display.php
      header("location:display.php");
     
     echo "<script>alert('update recorded')</script>";
     
      
     }
     else 
  
     {
      echo  "Failed...........!";
     }
    }

?>



//          client side validation  echo   "<script> alert('fill the form');   </scrpt>">; 