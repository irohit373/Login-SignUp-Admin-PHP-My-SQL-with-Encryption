<?php 
  // session_start();
  // // if (isset($_SESSION['Is_Login'])){
  // //       header("location: Admin.php");
  // // }else{
  $username = "";
  $password = "";
  $errors = array();
  $db = mysqli_connect('localhost', 'root', 'usbw', 'ulogin');
        # code...
        if (isset($_POST['submit'])) 
          {
                    $username = mysql_real_escape_string($_POST['username']);
                    $password = mysql_real_escape_string($_POST['password']);

                    if (empty($username)) {
                      array_push($errors, "Username is required");    }
                    if (empty($password)) {
                       array_push($errors, "password is required");    }
                      if ($password >0 ) 
              {
                  $password = md5($password);
                  $query = "SELECT * FROM user WHERE username='$username' AND password = '$password'";
                  $result = mysqli_query($db, $query);
                  if (mysqli_num_rows($result) == 1) 
                  {
                      // $_SESSION['Is_Login'] = true;
                      // $_SESSION['username']=$username;
                      header("location:Admin.php");
                  }else
                  {
                    array_push($errors, "wrong pass word or username");
                  }
              }
            } 
          // }
?>
<!DOCTYPE html>
<head>

	<title>Login</title>

  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="logins.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  
  <script type="text/javascript" src="js/bootstrap.js"></script>

</head>

<body background="img/1(10).jpg">

	<form method="post" action="login.php" class="form">

		<br>
		<h1 class="display-3">Login</h1>
		<br>

    <br>
		<div class="input-group flex-nowrap">
    <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">@</span>
    </div>
    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" autofocus="" name="username">
    </div><br>
    <div class="input-group mb-3">
    <input type="Password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" name="password">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">*</span>
    </div>
    </div><br>
    <button type="submit" class="btn btn-info" name="submit">Login</button>
            <br><br>
     <center><a href="Register.php" class="text-primary">Not Have an Account?Sign Up</a></center>
	</form>

</body>
</html>