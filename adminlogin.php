<!DOCTYPE html>
<?php include("connect.php");
//php code for the login 
$msg=("");
session_start();
if(isset($_POST['login'])){
		$username=mysqli_real_escape_string($conn,strip_tags( $_POST['username']));
	$password=mysqli_real_escape_string($conn,strip_tags( $_POST['pass']));
     $sql= "SELECT*FROM adminlogin WHERE adminname='$username' AND adminpassword='$password'" ;
	$result=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($result);
	//check user
if(!empty($data)){
				//$password ==$data['adminpassword']&& $username ==$data['adminname']
						if($password ==$data['adminpassword']&& $username ==$data['adminname'] ){
		$msg=("Successfully login");
		$_SESSION['vaild']=true;
		$_SESSION['timeout']=time();
		
		$_SESSION['username']=$data['adminname'];
		header("location:adminPageDisplay.php");
	}
	}
	else{
		$msg=("Invalid Username or Password entered");
	}



};
?>
<html lang="en">
<head>
	<title>ITE Orientation Reporting Venue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<nav class="navbar">
	<div class="container-fluid">
		<!-- Nav Header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img src="images/ite-logo.png">
			<a class="navbar-brand" href="index.php"><span class="fa fa-home"></span><span class="link"> Student</span></a>
			<a class="navbar-brand" href="adminlogin.php"><span class="fa fa-user"></span><span class="link"> Admin</span></a>
			
		</div>
	
	</div>
</nav>


	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				<form class="login100-form  p-b-33 p-t-5 validate-form p-b-33 p-t-5" action=" <?php  echo $_SERVER['PHP_SELF']; ?>" method="post">

					<div class="wrap-input100 validate-input " data-validate = "Enter your username">
						<input class="input100" type="text" name="username" placeholder="Username" >
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input"  data-validate = "Enter your password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                     <div>
					 <?php echo $msg; ?>
					</div>
					<div class="container-login100-form-btn m-t-32">
						
						<button class="login100-form-btn" name = "login">Login</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>