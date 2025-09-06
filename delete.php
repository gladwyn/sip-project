<!doctype html>
<?php include("connect.php");
session_start();
  if (!isset($_SESSION["username"]))
   {
      header("location: index.php");
   }
$msg1 = "";
	if(isset($_POST["deleteimagevenue"])){
		 $studentname = mysqli_real_escape_string($conn,strip_tags(trim($_POST['imagename'])));
		$delete = mysqli_real_escape_string($conn,strip_tags(trim($_POST['imageid'])));
		$msg = "do want to delete".  " " .  $studentname;
	}
   if(isset($_POST["deletestudent"])){
	      $studentname = mysqli_real_escape_string($conn,strip_tags(trim($_POST['studentname'])));
	   $delete = mysqli_real_escape_string($conn,strip_tags(trim($_POST['studentcode'])));
		$msg = "do want to delete". " " . $studentname;
   }
    if(isset($_POST["deletevenue"])){
		$studentname = mysqli_real_escape_string($conn,strip_tags(trim($_POST['venuename'])));
			$code = mysqli_real_escape_string($conn,strip_tags(trim($_POST['venuenames'])));
	   $delete = mysqli_real_escape_string($conn,strip_tags(trim($_POST['venuecode'])));
		$msg = "do want to delete". " " . $studentname;
   }
   
   // excute sql
    if(isset($_POST['deleteimage'])){
			$delete = mysqli_real_escape_string($conn,strip_tags(trim($_POST['deleteimage'])));
		$sql = "DELETE FROM `venueimage` WHERE `venueimage`.`ID` = '$delete'";
		if(mysqli_query($conn,$sql)){
			 header("location:adminPageDisplay.php");
				$msg = "Successfully updated  record"."<br>";
			}else{
				$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
	}
    if(isset($_POST['deletestudentbtn'])){
			$delete = mysqli_real_escape_string($conn,strip_tags(trim($_POST['deletestudentid'])));
		$sql = "DELETE FROM studentinfo WHERE `ID` = '$delete'";
		if(mysqli_query($conn,$sql)){
				$msg = "Successfully updated  record"."<br>";
			   header("location:adminPageDisplay.php");
			}else{
				$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
	}
       if(isset($_POST['deletevenuebtn'])){
		   	$code = mysqli_real_escape_string($conn,strip_tags(trim($_POST['deletevenuecode'])));
		   $sql2 = "DELETE FROM `venueimage` WHERE `venuecode` = '$code'";
		if(mysqli_query($conn,$sql2)){
			 header("location:adminPageDisplay.php");
				$msg = "Successfully updated  record"."<br>";
			}else{
				$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
		$sql1 = "DELETE FROM studentinfo WHERE `venuecode` = '$code'";
		if(mysqli_query($conn,$sql1)){
				$msg = "Successfully updated  record"."<br>";
			   header("location:adminPageDisplay.php");
			}else{
				$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
		    	$delete = mysqli_real_escape_string($conn,strip_tags(trim($_POST['deletevenueid'])));
		$sql = "DELETE FROM reportvenue WHERE `ID` = '$delete'";
		if(mysqli_query($conn,$sql)){
				$msg = "Successfully updated  record"."<br>";
			   header("location:adminPageDisplay.php");
			}else{
					$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
	}
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
</head>
<body>
	<div class="container-login100" style="background-image: url('images/bg-03.png');">
		<div class="wrap-login100 p-t-30 p-b-50" align="justify">
				<span class="login100-form-title p-b-41">
					DELETE Info
				</span>
				<div class="login100-form  p-b-33 p-t-5">
					<div class="wrap-input100 " ><?php if(isset($_POST["deleteimagevenue"])){?>
						<label class="input100"  ><?php echo $msg ;?></label>
								<div  class="container-login100-form-btn m-t-32" >
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="hidden" name="deleteimage" value="<?php echo $delete ; ?>">
							<button class="login100-form-btn" >delete</button>
									</form></div>
							<div  class="container-login100-form-btn m-t-32" >
						<form action ="adminPageDisplay.php">
							<button class="login100-form-btn">cancel</button>
						</form></div><?php }else if(isset($_POST["deletestudent"])){?>
						    <label class="input100"  ><?php echo $msg ;?></label>
								<div  class="container-login100-form-btn m-t-32" >
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="hidden" name="deletestudentid" value="<?php echo $delete ; ?>">
							<button class="login100-form-btn" name="deletestudentbtn" >delete</button>
									</form></div>
							<div  class="container-login100-form-btn m-t-32">
						<form action ="adminPageDisplay.php">
							<button class="login100-form-btn">cancel</button>
								</form></div>
						<?php }else if(isset($_POST["deletevenue"])) { ?>
						 <label class="input100"  ><?php echo $msg ;?></label>
							<div  class="container-login100-form-btn m-t-32">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							 	<input type="hidden" name="deletevenuecode" value="<?php  echo $code;  ?>">
							 	<input type="hidden" name="deletevenueid" value="<?php echo $delete ; ?>">
							<button class="login100-form-btn" name="deletevenuebtn" >delete</button>
								</form></div>
							<div  class="container-login100-form-btn m-t-32">
						<form action ="adminPageDisplay.php">
							<button class="login100-form-btn">cancel</button>
						</form>
						</div>
						<?php } else{?>
							<div  class="container-login100-form-btn m-t-32">
						<form action ="adminPageDisplay.php">
							<label  class="input100" ><?php echo $msg1?></label>
							<button class="login100-form-btn">BACK</button>
							
						</form>
						</div>
						<?php } ?>
						
					
						
					</div>
			    </div>
		</div>
	</div>
</body>
</html>