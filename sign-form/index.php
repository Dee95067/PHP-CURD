<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registraton Form</title>
  <link rel="stylesheet" href="style..css">
</head>

<body>
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="title">
        Registration form
      </div>

      <div class="form">

      <div class="input_field">
          <label>Upload file </label>
          <input type="file" name="uploadfile" style="width:100%;">
        </div>

        <div class="input_field">
          <label>First Name </label>
          <input type="text" class="input" name="fname" required>
        </div>

        <div class="input_field">
          <label>Last Name </label>
          <input type="text" class="input" name="lname" required>
        </div>

        <div class="input_field">
          <label>Pasword</label>
          <input type="password" class="input" name="password" required>
        </div>

        <div class="input_field">
          <label>Confirm Password </label>
          <input type="text" class="input" name="confirmpassword" required>
        </div>

        <div class="input_field">
          <label>Gender </label>
          <div class="selectBox">
            <select name="gender" required>
              <option value="">--Select--</option>
              <option value="Male">Male</option>
              <option val="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

        <div class="input_field">
          <label>Email Address</label>
          <input type="Email" class="input" name="email" required>
        </div>

        <div class="input_field">
          <label>Phone Number</label>
          <input type="number" class="input" name="number" required>
        </div>

        <div class="input_field">
          <label style="margin-right:100px;font-size:17px;">Caste</label>
          <input type="radio" name="name" value="General" required><label style="margin-left:5px;">General</label>
          <input type="radio" name="name" value="OBC" required><label style="margin-left:5px;">OBC</label>
          <input type="radio" name="name" value="SC" required><label style="margin-left:5px;">SC</label>
          <input type="radio" name="name" value="ST" required><label style="margin-left:5px;">ST</label>
        </div>

        <div class="input_field">
          <label style="margin-right:75px;font-size:17px;">Language</label>
          <input type="checkbox" name="lg[]" value="Hindi"><label style="margin-left:5px;">Hindi</label>
          <input type="checkbox" name="lg[]" value="English"><label style="margin-left:5px;">English</label>
          <input type="checkbox" name="lg[]" value="Urdu"><label style="margin-left:5px;">Urdu</label>
        </div>

        <div class="input_field">
          <label>Address</label>
          <textarea name="address" required></textarea>
        </div>

        <div class="input_field terms">
          <label class="check">
            <input type="checkbox" required>
            <span class="checkmarks"></span>
          </label>
          <p>Agree to terms and conditions</p>
        </div>

        <div class="input_field">
          <input type="submit" value="Register" class="btn" name="register">
        </div>
      </div>
    </form>
  </div>
</body>

</html>


<!---create variable---------------------------------- >
<?php
if ($_POST['register']) {

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/". $filename;
  move_uploaded_file($tempname,$folder);


  $fname    = $_POST['fname'];
  $lname    = $_POST['lname'];
  $pwd      = $_POST['password'];
  $cpwd     = $_POST['confirmpassword'];
  $gender   = $_POST['gender'];
  $email    = $_POST['email'];
  $phone    = $_POST['number'];
  $name    = $_POST['name'];
  $lang    = $_POST['lg'];

  $language = implode(",", $lang);  // Array ko string me change krna 

  $address  = $_POST['address'];

  //Server side validation

  // if (
  //   $fname!= "" && $lname!= "" && $pwd!= "" && $cpwd!= "" && $gender!= "" && $email!= "" && $phone!= "" &&
  //   $address  != "")

  // {

  $query = "INSERT INTO data2 (std_image,fname,lname,password,cpassword,gender,email,phone,caste,language,address) VALUES ('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$name','$language','$address')";
  $data = mysqli_query($conn, $query);

  if ($data)
   {
    echo "<script> alert ('data inserted successfully') </script>";
  }

   else 

   {

    echo  "Failed...........!";
  }
}


?>



//          client side validation  echo   "<script> alert('fill the form');   </scrpt>">; 