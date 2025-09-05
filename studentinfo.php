<!DOCTYPE html>
<?php include("connect.php");
    		if(isset($_POST['username']) ){
	$username = mysqli_real_escape_string($conn,strip_tags(trim($_POST['username'])));
$select = "SELECT * from studentinfo WHERE StudentID = '$username'";
$result=mysqli_query($conn,$select);
	if($result){
		$row = mysqli_num_rows($result); 
while($data=mysqli_fetch_array($result)){
$reg_list[]=array(
	'student' => $data['StudentName'],
	'class'=>$data['EnrolledClass'],
	'courses'=>$data['EnrolledCourse'],
	'code' => $data['venuecode']);
};
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
		<div class="container-login100" style="background-image: url('images/bg-03.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50" align="justify">
				<span class="login100-form-title p-b-41">
					Student information
				</span>
				<form class="login100-form  p-b-33 p-t-5" action="index.php">
                      
					<div class="wrap-input100 " >
						<?php if( isset($_POST['username']) && $row > 0 ){?>
						<?php foreach($reg_list as $student):
						  $vcode = $student["code"];
						  $retrieve = "SELECT * FROM `reportvenue` WHERE venuecode = '$vcode' ";
	                                  $result = mysqli_query($conn,$retrieve);
	                                  $venuedata = mysqli_fetch_array($result);
						?>
						<label class="input100"  >Welcome  <?php echo  $student["student"]?> ,  pls read the following info: </label>
						<label class="input100"  >Course Name: <?php echo  $student["courses"]?></label>
						<label class="input100" >Class: <?php echo  $student["class"]?></label>
						<label class="input100">Reporting Venue Name: <?php echo  $venuedata["venuename"]?> ( <?php echo  $venuedata["venuedesc"]?>)</label>
						
						<div > 
							<?php  $imagename = $student["code"];
	                                  $retrieve = "SELECT * FROM `venueimage` WHERE venuecode = '$imagename' ";
	                                  $result = mysqli_query($conn,$retrieve);
	                                   while($data1=mysqli_fetch_array($result)){
                               $image_list1[]=array(
	                                              'id' => $data1['ID'],
                                            	'name' => $data1['imagename']);
                                  };
									 $rowcount = mysqli_num_rows($result);
																		  
																		  if($rowcount > 0){?>
							 <label class="input100" >Reporting Venue Image: </label>
							<?php foreach ($image_list1 as $images){
									   $image_src = "images/".$images['name'];
									  $imageid = $images['id'];
									  $image = $images['name'];
                                  ?>
							         
							<div class="container-login100-form-btn m-t-32"> <img src='<?php echo $image_src;?>' alt="<?php echo $image;?>" height="200" width="200"  ></div>
						            </div>
						      
						<?php } }
																		  endforeach; } 
															
						else{?>
					
							<label class="input100" style="text-align: center"><h5>No informations found.</h5></label>
						
						<?php } 
?>
						<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">Back</button>
					</div>
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