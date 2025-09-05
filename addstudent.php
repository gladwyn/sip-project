<?php include("connect.php");
session_start();
$msg ="";
$msg1 ="";
  if (!isset($_SESSION["username"]))
   {
      header("location: index.php");
   }
$datas = array();
if(!isset($_POST['studentcode'])  ){
   if(isset($_POST["submit"])){
	if($_FILES['file']['name']){
		$filename = explode(".",$_FILES['file']['name']);
		if($filename[1] == 'csv'){
			$handle = fopen($_FILES['file']['tmp_name'],"r");
			while($data = fgetcsv($handle) ){ 
				array_shift($datas);
				$arrayLength = count($datas);
				for($row = 0 ; $row <=$arrayLength; $row++){
					
					$venue = mysqli_real_escape_string($conn,strip_tags(trim($_POST['venue'])));
					array_push($datas,$data);
					$item1 = $datas[$row][0];
					$item2 = $datas[$row][1];
					$item3 = $datas[$row][2];
					$item4 = $datas[$row][3];
					$item5 = $datas[$row][4];
					$item6 = $datas[$row][5]; 
					
				    	$sql= "INSERT into studentinfo(StudentID,StudentName,EnrolledCourse,coursename,EnrolledClass,venuecode) VALUES ('$item1','$item2','$item3','$item4','$item5','$item6')";
					if(mysqli_query($conn,$sql)){
				$msg1 = "Successfully imported multiple student info. "."<br>";
						
			}else{
						$error = "$item6";
						
						
					}
					
					}
				  				
			}
			
			fclose($handle);
		}else{
			 $msg = "invalid file. Please enter a csv file";
		}
	}
	
    }
}
if(isset($_POST['studentcode'])  ){
	
    $venuecode= $_POST['studentcode'];
	$select1 = "SELECT * from studentinfo WHERE StudentID ='$venuecode'";
	$result =mysqli_query($conn,$select1);
	$gresult = mysqli_fetch_array($result);
	 
	}
    

 $sql= "SELECT * FROM  reportvenue " ;
	$result=mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);
while($data=mysqli_fetch_array($result)){
$reg_list[]=array(
	'name' => $data['venuename'],
	'code'=>$data['venuecode']);
	
  };
if(isset($_POST['submit1'])){
	$submit1 = mysqli_real_escape_string($conn,strip_tags(trim($_POST['submit1'])));
	$nric=mysqli_real_escape_string($conn,strip_tags( $_POST['nric']));
	$name=mysqli_real_escape_string($conn,strip_tags( $_POST['name']));
	$enrollcourse=mysqli_real_escape_string($conn,strip_tags( $_POST['cname']));
		$coursecode=mysqli_real_escape_string($conn,strip_tags( $_POST['ccode']));
	$enrollclass = mysqli_real_escape_string($conn,strip_tags( $_POST['eccode']));
	if(isset($_POST['rvc'])){
		$reportvenue = mysqli_real_escape_string($conn,strip_tags( $_POST['rvc']));
	}else{
		 $msg = "There no venue to be selected";
	}
if(empty($nric)||empty($name)||empty($enrollclass)||empty($enrollcourse)||empty($reportvenue)||empty($coursecode))
{
    $msg = "You did not fill out the required fields.";
}else{
	if ($submit1 == 'add'){
				$selectvenue = "SELECT * from studentinfo ";
	$resultvenue =mysqli_query($conn,$selectvenue);
	$gresultvenue = mysqli_fetch_array($resultvenue);
		if($gresultvenue === NULL){ $sql= "INSERT INTO  studentinfo (StudentID,StudentName,EnrolledCourse,EnrolledClass,venuecode,coursename) VALUES ('$nric','$name','$enrollcourse','$enrollclass','$reportvenue','$coursecode')" ;
          
			if(mysqli_query($conn,$sql)){
				$msg = "Successfully added new record"."<br>";
			}else{
				$msg =  "error:".$sql."<br>". mysqli_error($conn);
			}}
		else{
			if($nric == $gresultvenue['StudentID']){
				$msg = "Failed to add existing record"."<br>";
			
			}else{
					$sql= "INSERT INTO  studentinfo (StudentID,StudentName,EnrolledCourse,EnrolledClass,venuecode,coursename) VALUES ('$nric','$name','$enrollcourse','$enrollclass','$reportvenue','$coursecode')" ;
          
			if(mysqli_query($conn,$sql)){
				$msg = "Successfully added new record"."<br>";
			}else{
				$msg =  "error:".$sql."<br>". mysqli_error($conn);
			}
			}
		}
			 
		
		}else{
			$id=mysqli_real_escape_string($conn,strip_tags( $_POST['id']));
			$sql = "UPDATE studentinfo SET StudentID ='$nric', StudentName ='$name',EnrolledCourse ='$enrollcourse',EnrolledClass ='$enrollclass',venuecode='$reportvenue' ,coursename = '$coursecode' WHERE ID ='$id'";
          
			if(mysqli_query($conn,$sql)){
				$msg = "Successfully updated  record"."<br>";
			}else{
				$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
		}	
}
	

	

	 
}
if(isset($_POST['logout'])){
	$_SESSION['vaild']=false;

		session_destroy();
		header("location:index.php");
}
	
?>
<link rel="stylesheet" href="css/responsivemenu.css">
<html lang="en">
<head>
	<title>ITE Orientation Reporting Venue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/horizontal_line_w_text.css">
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
				
			</button>
			<img src="images/ite-logo.png" alt="logo">
			<a class="navbar-brand" href="adminPageDisplay.php"><span class="link"> View Venues Info and Students Info </span></a>
			<a class="navbar-brand" href="addvenue.php"><span class="link"> Add Venues Info   </span></a>
			<a class="navbar-brand" href="addstudent.php"><span class="link"> Add Students Info  </span></a>
				
			<form class="navbar-brand" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>"><button class="link" name="logout"> Log Out    </button></form>
			
		</div>
	
	</div>
</nav>


	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/courses-bg.jpg');">
			
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<?php echo(isset($gresult)?'Edit Student info': 'ADD STUDENT info');?>
				</span>
				<form class="login100-form p-b-33 p-t-5" action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post">

					<div class="wrap-input100">
						<label><h4>Student NRIC:</h4></label><input class="input100" type="text" name="nric" value="<?php echo(isset($gresult)?$gresult['StudentID']: '');?>" style="background-color: lightgrey"><br>
						<label><h4>Student Name:</h4></label><input class="input100" type="text" name="name" value="<?php echo(isset($gresult)?$gresult['StudentName']: '');?>" style="background-color: lightgrey"><br>
						<label><h4>Course Name:</h4></label><input class="input100" type="text" name="cname" value="<?php echo(isset($gresult)?$gresult['EnrolledCourse']: '');?>"style="background-color: lightgrey"><br>
						<label><h4>Course Code:</h4></label><input class="input100" type="text" name="ccode" value="<?php echo(isset($gresult)?$gresult['coursename']: '');?>" style="background-color: lightgrey"><br>
						<label><h4>Enrolled Class Code:</h4></label><input class="input100" type="text" name="eccode" value="<?php echo(isset($gresult)?$gresult['EnrolledClass']: '');?>" style="background-color: lightgrey">
						<label><h4>Course Reporting Venue Code:</h4></label>
						
						<select class="input100" name="rvc" style="background-color: lightgrey" >
							
							<?php foreach($reg_list as $code):?>
                           <option value="<?php echo $code["code"];?>" selected><?php echo $code["code"];?>-<?php echo $code["name"];?></option>
    					 <?php endforeach; ?>
						</select>
                       
					</div>

	

					<div class="container-login100-form-btn m-t-32">
						<input type="hidden" name="codename" value=" <?php echo($gresult['venuecode']);?>">
						<input type="hidden" name="submit1" value=" <?php echo(isset($gresult)?'edit': 'add');?>">
						<input type="hidden" name="id" value=" <?php echo(isset($gresult)?$gresult['ID']: '');?> ">
						<button class="login100-form-btn" ><?php echo(isset($gresult)?'edit': 'add');?></button>
						
					</div>
                    <div class="container-login100-form-btn m-t-32" style="text-align: center;"><h4><?php echo $msg;?><h4></div>
							
						</form>
						
				<br>
					
				<span class="login100-form-title p-b-41">
					Import Multiple Students Information
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" enctype="multipart/form-data">

					<div class="wrap-input100" >
						<label><h4>Upload Multiple Students Information:</h4></label><input class="input100" type="file" name="file" style="background-color: lightgrey">
					</div>
					<div class="container-login100-form-btn m-t-32">
							<?php if(  $row > 0 ){ foreach($reg_list as $code):?>
						<input type="hidden" name="venue" value="<?php echo $code["code"];?>">
						<?php endforeach; }?>
						<button name='submit' class="login100-form-btn">Submit</button>
						 <div class="container-login100-form-btn m-t-32" style="text-align: center;"><h4><?php echo $msg1;?><h4></div>
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