<?php
 session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="loginstyle.css">
  <title>Login</title>
</head>

<body>
  <div class="center">
    <h1>Login</h1>
    <form action="#" method="POST" autocomplete="off">
    <div class="form">
      <input type="text" name="username" class="textfield" placeholder="Username">
      <input type="text" name="password" class="textfield" placeholder="Password">

      <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password</a></div>
      <input type="submit" name="login" value="Login" class="btn">
      <div class="signup">New Member ? <a href="#" class="link"> SignUp Here</div>
    </div>
    </from>
  </div>

  <script>
    function message() {
      alert("Please enter the correct Password");
    }
  </script>
</body>

</html>

<?php
include("connection.php");

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $pwd = $_POST['password'];

  $query = "SELECT * FROM data2 WHERE email = '$username' && password = '$pwd' ";
  $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    //echo $total;
    if($total == 1){
    // echo "Login Ok";
    $_SESSION['user_name'] = $username;
    
    header('location:display.php');
    }
    else{
      //echo "Enter the correct username & password";
    }
  
}
?>