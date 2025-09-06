<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>

<!DOCTYPE html>
	<link rel="stylesheet" href="css/responsivemenu.css">
<?php include("connect.php");
$msg = "";
$msg1 = "";
session_start();
  if (!isset($_SESSION["username"]))
   {
      header("location: index.php");
   }
	
if(isset($_POST['venuecode'])  ){
	
    $venuecode= $_POST['venuecode'];
	$select1 = "SELECT * from reportvenue WHERE ID ='$venuecode'";
	$result =mysqli_query($conn,$select1);
	$gresult = mysqli_fetch_array($result);
	 
	}
if(isset($_POST['addnew'])  ){
	
    $venuecode= $_POST['venuecode'];
	$select1 = "SELECT * from reportvenue WHERE ID ='$venuecode'";
	$result =mysqli_query($conn,$select1);
	$gresult = mysqli_fetch_array($result);
	 
	}
	if(isset($_POST['submit1']) ){
		$submit1 = mysqli_real_escape_string($conn,strip_tags(trim($_POST['submit1'])));
		
		$name=mysqli_real_escape_string($conn,strip_tags( $_POST['name']));
		$code=mysqli_real_escape_string($conn,strip_tags( $_POST['code']));
       $desc = mysqli_real_escape_string($conn,strip_tags( $_POST['desc']));
	    
				 $info = $code;
		if(empty($name)||empty($code)||empty($desc)){
			$msg = "Please fill in all fields."."<br>";
		}
		else{
				if ($submit1 == 'add'){
						$selectvenue = "SELECT * from reportvenue ";
	$resultvenue =mysqli_query($conn,$selectvenue);
	$gresultvenue = mysqli_fetch_array($resultvenue);
					 $filename = $_FILES['uploadfile']['name'];
			 $filetmpname = $_FILES['uploadfile']['tmp_name'];
		if($gresultvenue === NULL) {
					$sql= "INSERT INTO reportvenue (venuecode,venuename,venuedesc) VALUES ('$code','$name','$desc')" ;
			if(mysqli_query($conn,$sql)){
				$msg = "Successfully added new record"."<br>";
				
			}else{
				$msg =  "error:".$sql."<br>". mysqli_error($conn);
			}
				 
			     if ($filename == ""){
					 $msg1 =  "no file inserted";
				 }else{
					  
                     //folder where images will be uploaded
                      $folder = 'images/';
                          //function for saving the uploaded images in a specific folder
                   move_uploaded_file($filetmpname, $folder.$filename);
						
            //inserting image details (ie image name) in the database
                    $sql1 = "INSERT INTO venueimage (imagename,venuecode) VALUES ('$filename','$code')";
                   $qry = mysqli_query($conn, $sql1);
                  if( $qry) {
					  $msg1 = "";
                         $msg1 =  "Image uploaded successfully";
		
                        }else{
				$msg = "error:".$sql1."<br>". mysqli_error($conn);
			}
				 }
								
		}else{
				if($name == $gresultvenue['venuename']|| $code == $gresultvenue['venuecode']){
						$msg = "Failed to add existing record"."<br>";
					}
					else{
					
						$sql= "INSERT INTO reportvenue (venuecode,venuename,venuedesc) VALUES ('$code','$name','$desc')" ;
			if(mysqli_query($conn,$sql)){
				$msg = "Successfully added new record"."<br>";
				
			}else{
				$msg =  "error:".$sql."<br>". mysqli_error($conn);
			}
			if ($filename == ""){
					 $msg1 =  "no file inserted";
				 }else{
					  
                     //folder where images will be uploaded
                      $folder = 'images/';
                          //function for saving the uploaded images in a specific folder
                   move_uploaded_file($filetmpname, $folder.$filename);
						
            //inserting image details (ie image name) in the database
                    $sql1 = "INSERT INTO venueimage (imagename,venuecode) VALUES ('$filename','$code')";
                   $qry = mysqli_query($conn, $sql1);
                  if( $qry) {
					  $msg1 = "";
                         $msg1 =  "Image uploaded successfully";
		
                        }else{
				$msg = "error:".$sql1."<br>". mysqli_error($conn);
			}
				 }
					}
		 
		}
		
		}else if($submit1 == 'edit'){
		
				
								$id=mysqli_real_escape_string($conn,strip_tags( $_POST['id']));
			        
				$sql = "UPDATE reportvenue SET venuename ='$name', venuecode ='$code', venuedesc = '$desc' WHERE ID ='$id'";
          
			if(mysqli_query($conn,$sql)){
				$msg = "Successfully updated  record"."<br>";
			}else{
				$msg = "error:".$sql."<br>". mysqli_error($conn);
			}
				}
			else if($submit1 == 'addimage'){
				  $filename = $_FILES['uploadfile']['name'];
							 if( $_FILES['uploadfile']['name'] == ""){
								 $msg = "No file inserted";
							 }else{
						
								 $filetmpname = $_FILES['uploadfile']['tmp_name'];
                     //folder where images will be uploaded
                      $folder = 'images/';
                          //function for saving the uploaded images in a specific folder
                   move_uploaded_file($filetmpname, $folder.$filename);
						
            //inserting image details (ie image name) in the database
                    $sql1 = "INSERT INTO venueimage (imagename,venuecode) VALUES ('$filename','$code')";
                   $qry = mysqli_query($conn, $sql1);
                  if( $qry) {
					  $msg = "";
                         $msg1 =  "Image uploaded successfully";
		
                        }else{
				$msg = "error:".$sql1."<br>". mysqli_error($conn);
			}
							 }
			}
			else if($submit1 == 'editimg'){
						$imageid = mysqli_real_escape_string($conn,strip_tags(trim($_POST['idimg'])));
								 //$code=mysqli_real_escape_string($conn,strip_tags( $_POST['code']));
                       $filename = $_FILES['uploadfile']['name'];
							 if( $_FILES['uploadfile']['name'] == ""){
								 $msg1 = "No file inserted";
							 }else{
								 $filetmpname = $_FILES['uploadfile']['tmp_name'];
                     //folder where images will be uploaded
                      $folder = 'images/';
                          //function for saving the uploaded images in a specific folder
                   move_uploaded_file($filetmpname, $folder.$filename);
            //inserting image details (ie image name) in the database
                    $sql1 = "update venueimage set  imagename = '$filename' WHERE ID = '$imageid'";
                   $qry = mysqli_query($conn, $sql1);
                  if( $qry) {
                         $msg1 =  "Image has been successfully changed";
		
                        }
							 }
			}
		};


	}

	
if(isset($_POST['logout'])){
	$_SESSION['vaild']=false;

		session_destroy();
		header("location:index.php");
}
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
				
			</button>
		  <img src="images/itelogo.png" alt="logo">
		    <a class="navbar-brand" href="adminPageDisplay.php"><span class="link"> View Venues Info  and Students  Info </span></a>
			<a class="navbar-brand" href="addvenue.php"><span class="link"> Add Venues  Info  </span></a>
			<a class="navbar-brand" href="addstudent.php"><span class="link"> Add Students  Info</span></a>
		  <form class="navbar-brand" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>"><button class="link" name="logout"> Log Out    </button></form>
  </div>
	
			
		</div>
	
</nav>


	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/venue-bg2.jpg');" >
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<?php echo(isset($gresult)?'Edit Venue': 'ADD Venue Info');?>
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

					<div class="wrap-input100 " >
						
						<label><h4>Reporting Venue Code:</h4></label><input class="input100" type="text"  id='test' name="code" style="background-color: lightgrey" value="<?php if(isset($gresult)){echo $gresult['venuecode'];}else{  }?>" ><br>
						
					<label><h4>Reporting Venue Name:</h4></label><input class="input100" type="text" name="name" value="<?php echo(isset($gresult)?$gresult['venuename']: '');?>" style="background-color: lightgrey" ><br>
						
					<label><h4>Reporting Venue Description:</h4></label><input class="input100" type="text" name="desc" value="<?php echo(isset($gresult)?$gresult['venuedesc']: '');?>" style="background-color: lightgrey" ><br>
						<?php   if(!isset($_POST['submit'])){?>
					<label><h4>Reporting Venue Image:</h4>
						</label><input class="input100" type="file"   accept="image/*" name="uploadfile" style="background-color: lightgrey">
						<?php }?>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<input type="hidden" name="codename" value=" <?php echo($gresult['venuecode']);?>">
						<input type="hidden" name="imgid" value=" ">
						<input type="hidden" name="submit1" value=" <?php if(isset($gresult)){ 
	                            if(isset($_POST['modifyname'])){
									echo'editimg';}else{
									if(isset($_POST['addnew'])||isset($_POST['addimage'])){
									echo'addimage';}else{ echo'edit'; }
									} 
                                   }else{ echo'add';}?>">
						<input type="hidden" name="id" value=" <?php echo(isset($gresult)?$gresult['ID']: '');?> ">
						
						<button class="login100-form-btn" ><?php if(isset($gresult)){ 
	                            if(isset($_POST['modifyname'])){
									$imageid =mysqli_real_escape_string($conn,strip_tags( $_POST['imageid']));
									echo'editimage';}else{
									if(isset($_POST['addnew'])||isset($_POST['addimage'])){
									echo'addimage';}else{ echo'edit'; }
									} 
                                   }else{ echo'add';}
							
							?></button>
					</div>
					
					<input type="hidden" name="idimg" value=" <?php echo $imageid;?> ">
						<div class="container-login100-form-btn m-t-32"><h4><?php echo $msg1?><h4></div>
                      <div class="container-login100-form-btn m-t-32"><h4><?php echo $msg?><h4></div>
				</form>		
			</div>
			
		</div>
	</div>
	
    <div></div>
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
