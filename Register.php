<?php 
  // password incrypting with md5 
  $fname = "";
  $lname = "";
  $username = "";
  $email = "";
  $errors = array();
  $db = mysqli_connect('localhost', 'root', 'usbw', 'ulogin');

  if (isset($_POST['submit'])) 
  {
            $fname = mysql_real_escape_string($_POST['fname']);
            $lname = mysql_real_escape_string($_POST['lname']);
            $username = mysql_real_escape_string($_POST['username']);
            $email = mysql_real_escape_string($_POST['email']);
            $password = mysql_real_escape_string($_POST['password']);
            $password2 = mysql_real_escape_string($_POST['password2']);


    if (empty($username)) { 
      array_push($errors, "Username is required");    }
    if (empty($fname)) {
      array_push($errors, "Name is required");    }
    if (empty($email)) {
      array_push($errors, "Email is required");   }
    if (empty($password)) {
      array_push($errors, "Password is required");    }
    if ($password != $password2) {
      array_push($errors, "Please Confirm your Password");    }


      if (count($errors) == 0) {
        $password = md5($password);
        $sql = "INSERT INTO user (fname, lname, username, email, password) VALUES ('$fname', '$lname', '$username', '$email', '$password')";
        mysqli_query($db, $sql);
        header('location:login.php');
        } else{
              $error2="Data not insterted";
      }
      
  }
?> 



<!DOCTYPE html>
<head>
       
  <title>Sign Up</title>
  
  <link rel="stylesheet" type="text/css" href="regs.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
 
  <script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body background="img/1(10).jpg">


  <form method="post" action="register.php" class="form">
    <br>
    <h1 class="display-3">Register</h1>
    <br>
        <?php if (count($errors) > 0): ?>
        <?php foreach ($errors as $error): {
        } ?>  
          
           <?php echo $error ; 
                 echo $error2 ;
           ?>
          
        <?php endforeach ?>
      <?php endif ?>
    <br>

    <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"></span>
            </div>
            <input type="text" aria-label="First name" class="form-control" placeholder="First name" autofocus="" name="fname">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="lname">
    </div><br>

      <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="example@email.com" aria-label="Enter Email" aria-describedby="basic-addon2" name="email">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Enter Email</span>
               </div>
      </div>

    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">@</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="username">
    </div><br>
    <div class="input-group mb-3">
              <input type="Password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" name="password">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">*</span>
              </div>
    </div>
    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">*</span>
            </div>
            <input type="password" class="form-control" placeholder="Confirm Password"aria-label="Password"aria-describedby="addon-wrapping" name="password2">
    </div><br>
          <input type="submit" class="btn btn-info" name="submit" value="Register"></input>
          <br><br>
 <center><a href="login.php" class="text-primary">Already Registered?Login</a></center>
  </form>

</body>
</html>