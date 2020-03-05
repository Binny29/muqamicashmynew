 <?php $baseUrl= 'http://localhost/muqamicash/';
include_once 'connection.php';
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">

	<!-- Title -->
	<title>InstantlyCash|Video Rewards - Android App</title>

	<!-- Favicon -->
	<link href="assets/img/brand/favicon.png" rel="icon" type="image/png">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href="<?php echo $baseUrl;?>assets/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="<?php echo $baseUrl;?>assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Ansta CSS -->
	<link href="<?php echo $baseUrl;?>assets/css/dashboard.css" rel="stylesheet" type="text/css">

	<!-- Single-page CSS -->
	<link href="<?php echo $baseUrl;?>assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

</head>
<?php
if (!empty($_POST['username'])) {
//print_r($_POST);
session_start();
        $user_username = isset($_POST['username']) ? $_POST['username'] : '';
        $user_password = isset($_POST['pass']) ? $_POST['pass'] : '';
        //$token = isset($_POST['authenticity_token']) ? $_POST['authenticity_token'] : '';
       $psw=md5($user_password);
         $sql = "SELECT * FROM admins WHERE username = '$user_username' and password = '$psw'";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      
      $count = mysqli_num_rows($result);
      //echo $count;
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $user_username;
         $_SESSION['login_id']=$active;
         header("location: dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }

       

        
        }
    

?>
<body class="bg-gradient-primary">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-5">
<?php if(!empty($error)){echo $error;} ?>
				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<!-- <a href="dashboard.php" class="login100-form-btn btn-primary">
							Login
						</a> -->
						<button type="submit" name="btndubmit" class="login100-form-btn btn-primary">Login</button>
					</div>

			<!-- 		<div class="text-center pt-2">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgot.html">
							Username / Password?
						</a>
					</div>

					<div class="text-center pt-1">
						<a class="txt2" href="register.html">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>

	<!-- Ansta Scripts -->
	<!-- Core -->
	<script src="<?php echo $baseUrl;?>assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo $baseUrl;?>assets/js/popper.js"></script>
	<script src="<?php echo $baseUrl;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>