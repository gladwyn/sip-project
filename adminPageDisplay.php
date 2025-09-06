<!DOCTYPE html>
<link rel="stylesheet" href="css/responsivetable.css">
<link rel="stylesheet" href="css/responsivemenu.css">
<link rel="stylesheet" href="css/smallbtntable.css">
<style>

	.searchbtn{
	font-family: Ubuntu-Bold;
  font-size: 18px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  min-width: 100px;
   height: 42px;
  border-radius: 21px;

  background: #d41872;
  background: -webkit-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: -o-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: -moz-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  position: relative;
  z-index: 1;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}
.searchbtn::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  border-radius: 21px;
  background: -webkit-linear-gradient(left, #8C1212, #DC2832, #FFC3C3);
  top: 0;
  left: 0;
  opacity: 0;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.searchbtn:hover {
  background-color: transparent;
}
.searchbtn:hover:before {
  opacity: 1;
}
	/* table small btn*/
	.table-form-smallbtn{
	font-family: Ubuntu-Bold;
  font-size: 18px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  min-width: 60px;
   height: 42px;
  border-radius: 21px;

  background: #d41872;
  background: -webkit-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: -o-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: -moz-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  position: relative;
  z-index: 1;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}
.table-form-smallbtn::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  border-radius: 21px;
  background: -webkit-linear-gradient(left, #8C1212, #DC2832, #FFC3C3);
  top: 0;
  left: 0;
  opacity: 0;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.table-form-smallbtn:hover {
  background-color: transparent;
}
.table-form-smallbtn:hover:before {
  opacity: 1;
}
	.none-image{
		display: none;
	}
	
    @media screen and (max-width: 600px){
		.none-small{
		display: none;
	}
		.none-image{
		display:block;
	}
      .table-form-smallbtn{
	font-family: Ubuntu-Bold;
  font-size: 18px;
  color: #fff;
  text-transform: uppercase;
  min-width: 160px;
   height: 42px;
  border-radius: 21px;
  background: #d41872;
  background: -webkit-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: -o-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: -moz-linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  background: linear-gradient(right, #8C1212, #DC2832, #FFC3C3);
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}
	}
</style>
<?php include("connect.php");
session_start();
  if (!isset($_SESSION["username"]))
   {
      header("location: index.php");
   }
  
  if (isset($_POST["search"]))
   {
	   $studentname =mysqli_real_escape_string($conn,trim(strip_tags( $_POST['searchtext'])));
        $select = "SELECT * from studentinfo WHERE StudentName ='$studentname' ";
$result=mysqli_query($conn,$select);
$row = mysqli_num_rows($result);
while($data=mysqli_fetch_array($result)){
$reg_list[]=array(
	'id' => $data['ID'],
	'nric' => $data['StudentID'],
	'name' => $data['StudentName'],
	'class'=>$data['EnrolledClass'],
	'venue' => $data['venuecode'],
	'courses'=>$data['EnrolledCourse'],
	'coursename' => $data['coursename']
     );
	
};
   }else{
	     if (isset($_POST["cancel"])  )
	 {
		 	  $select = "SELECT * from studentinfo";
$result=mysqli_query($conn,$select);
$row = mysqli_num_rows($result);
while($data=mysqli_fetch_array($result)){
$reg_list[]=array(
	'id' => $data['ID'],
	'nric' => $data['StudentID'],
	'name' => $data['StudentName'],
	'class'=>$data['EnrolledClass'],
	'venue' => $data['venuecode'],
	'courses'=>$data['EnrolledCourse'],
	'coursename' => $data['coursename']
     );
	
};
	 }else{
			 $select = "SELECT * from studentinfo";
$result=mysqli_query($conn,$select);
$row = mysqli_num_rows($result);
while($data=mysqli_fetch_array($result)){
$reg_list[]=array(
	'id' => $data['ID'],
	'nric' => $data['StudentID'],
	'name' => $data['StudentName'],
	'class'=>$data['EnrolledClass'],
	'venue' => $data['venuecode'],
	'courses'=>$data['EnrolledCourse'],
	'coursename' => $data['coursename']
     );
	
};
		 }
	  
  }

$select1 = "SELECT * from reportvenue";
$result1=mysqli_query($conn,$select1);
$row1 = mysqli_num_rows($result1);
while($data1=mysqli_fetch_array($result1)){
$reg_list1[]=array(
	'id' => $data1['ID'],
	'code' => $data1['venuecode'],
	'desc' => $data1['venuedesc'],
	'name' => $data1['venuename']);
	
};
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
			
			<img src="images/itelogo.png" alt="logo">
			<a class="navbar-brand" href="adminPageDisplay.php"><span class="link"> View Venues Info and Students Info  </span></a>
			<a class="navbar-brand" href="addvenue.php"><span class="link"> Add Venues Info   </span></a>
			<a class="navbar-brand" href="addstudent.php"><span class="link"> Add Students Info </span></a>
				
			  <form class="navbar-brand" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>"><button class="link" name="logout"> Log Out    </button></form>
		
		</div>
		
	
	</div>
</nav>

	<div class="container-login100" style="background-image: url('images/bg-03.png');">
			<div class="wrap-login100 p-t-30 p-b-50" align="justify">
				<span class="login100-form-title p-b-41">
					View Student Info
				</span>
				<div class="login100-form  p-b-33 p-t-5">
					<div class="wrap-input100 " >
							<form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>"> 
							<input type="text"  class="input100" style="background-color: lightgray;" name="searchtext" placeholder="Search student by Fullname" >
									<div class="container-login100-form-btn m-t-32">
										<button   name="search" class="login100-form-btn" >Search</button>
								</div>
									<div class="container-login100-form-btn m-t-32">
								<button name="cancel" class="login100-form-btn">cancel</button>
								</div>
						</form>
						
					<?php if(  $row > 0 ){?>
					 
				<table border="3">
  
  <thead>
    <tr>
      <th scope="col">Student NRIC</th>
      <th scope="col">Student Name</th>
      <th scope="col">Course Code</th>
		<th scope="col">Enrolled Class Code</th>
      <th scope="col">Course Name</th>
		
		<th scope="col">Course Reporting Venue Code</th>
		<th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	  <?php foreach($reg_list as $student): ?>
    <tr>
      <td scope ="row" data-label="Student NRIC"><?php echo  $student["nric"]?></td>
      <td data-label="Student Name"><label ><?php echo  $student["name"]?></label></td>
      <td data-label="Course Code"><?php echo  $student["class"]?></td>
      <td data-label="Enrolled Class Code"><?php echo  $student["coursename"]?></td>
		<td data-label="Course Name" ><?php echo  $student["courses"]?></td>
		<td data-label="Course Reporting Venue Code">
			<?php echo  $student["venue"]?>
		</td>
		<td data-label="Action" >
			<form class="login100-form  p-b-33 p-t-5" method="post" action="addstudent.php">
										<input type="hidden" name="studentcode" value="<?php echo  $student["nric"]?>">
									
									
						
						<button  name="submit" class="table-form-smallbtn" >edit</button>

									</form>
				<form class="login100-form  p-b-33 p-t-5" method="post" action="delete.php">
					<input type="hidden" name="studentname" value="<?php echo  $student["name"] ?>">
										<input type="hidden" name="studentcode" value="<?php echo  $student["id"]?>">
									
									
						
						<button   name="deletestudent" class="table-form-smallbtn">Delete</button>

									</form>
		</td>
    </tr>
       <?php endforeach;}else{?>
	  <div class="container-login100-form-btn m-t-32">
						<label class="input100" style="text-align: center" ><h5>No existing records found.</h5></label>
					</div>
						
						<?php } ?>
    </tbody>
						</table></div>
			</div>
				<br><br>
				
					<span class="login100-form-title p-b-41">
					View Venues Info
				</span>
				<div class="login100-form  p-b-33 p-t-5" >
                      
					<div class="wrap-input100 " >
						
                      
						<?php if( $row1 > 0 ){?>
						<table border="3">
							  <thead>
    <tr>
                      <th scope="col">Reporting Venue Code</th>
							<th scope="col">Reporting Venue Name</th>
							<th scope="col" colspan="2">Reporting Venue Image</th>
		             
		                    <th scope="col" >Reporting Venue Desc</th>
							<th scope="col">Action</th>
                 </tr>
  </thead>
							

						<?php foreach($reg_list1 as $venue): ?>
						<tr>
								<td scope ="row" data-label="Reporting Venue Information"><label ><?php echo  $venue["code"]?></label></td>
								<td data-label="Reporting Venue Name"><label><?php echo  $venue["name"]?></label></td>
								<td data-label="Reporting Venue Map Image" class="none-small">
									<?php  $imagename = $venue["code"];
	                                  $retrieve = "SELECT * FROM `venueimage` WHERE venuecode = '$imagename' ";
	                                  $result = mysqli_query($conn,$retrieve);
											     $rowcount = mysqli_num_rows($result);
	                                  while($data1=mysqli_fetch_array($result)){
                               $image_list1[]=array(
	                                              'id' => $data1['ID'],
                                            	'name' => $data1['imagename']);
                                  };
                                  ?>
									<?php  	   
											  if($rowcount > 0  ){ 
									  foreach ($image_list1 as $images){
									   $image_src = "images/".$images['name'];
									  $imageid = $images['id'];
									  $image = $images['name'];
								?>
									<div  class="container-login100-form-btn m-t-32" >
										
						         <img src='<?php echo $image_src;?>' alt="<?php echo $image; ?>" height="100" width="100" >
									<?php  
										 
									  } }?>
							</td>
				          
							   <td data-label="Reporting Venue Map Image">
							<?php  	  if($rowcount > 0  ){ foreach ($image_list1 as $imagesname){
									   $image_src = "images/".$imagesname['name'];
									  $imageid = $imagesname['id'];
									  $image = $imagesname['name'];
								?>	<div  class="container-login100-form-btn m-t-32" >
								   
								   <img src='<?php echo $image_src;?>' alt="<?php echo $image; ?>" height="100" width="100" class="none-image">
								   </div>
									<div  class="container-login100-form-btn m-t-32" >
												
													<?php  	  if($rowcount > 0  ){ 
								?>
	                 	<?php  if( $rowcount < 2 ){?>
								
									<form method="post" action="addvenue.php">
										<input type="hidden" name="imagename" value="<?php echo $image; ?>">
										<input type="hidden" name="deleteimageid" value="<?php echo $imageid; ?>">
										<input type="hidden" name="venuecode" value="<?php echo  $venue["id"]?>">
										 <button name="addimage" class="table-form-smallbtn">add</button>
										</form>
									<?php }?>
										<div class="container-login100-form-btn m-t-32" >
										<form method="post" action="addvenue.php">
												<input type="hidden" name="venuecode" value="<?php echo  $venue["id"]?>">
										<input type="hidden" name="imageid" value="<?php echo(isset($imageid)?$imageid: $venue["code"]);  ?>">
									   
										<input type="hidden" name="modifyname" value="<?php  if($rowcount > 0 ){
									  echo"edit";
								  }else{
									  echo"add";
								  }  ?>">
										<button name="modify"  class="table-form-smallbtn"><?php  if( $rowcount > 0 ){
									  
									  echo"edit";
								  }else{
									  echo"add";
								  }  ?></button>
									</form>
									</div>
									<?php if( $rowcount > 0){?>
										<div  class="container-login100-form-btn m-t-32" >
									<form method="post" action="delete.php">
										<input type="hidden" name="imageid" value="<?php echo(isset($imageid)?$imageid: $venue["code"]);  ?>">
										<input type="hidden" name="imagename" value="<?php echo $image; ?>">
										 <button name="deleteimagevenue" class="table-form-smallbtn">delete</button>
											</form></div>
									<?php }?>
									<?php }?>
									

								
									<?php $image_list1 = array(); }}?>				
										<?php if($rowcount === 0){?>
										<div  class="container-login100-form-btn m-t-32" ></div>
										<div  class="container-login100-form-btn m-t-32" >
										<form method="post" action="addvenue.php">
										<input type="hidden" name="imageid" value="<?php echo(isset($imageid)?$imageid: $venue["code"]);  ?>">
									   	<input type="hidden" name="venuecode" value="<?php echo  $venue["id"]?>">
										<input type="hidden" name="addnew" value="<?php  if($rowcount > 0 ){
									  echo"edit";
								  }else{
									  echo"add";
								  }  ?>">
										<button   class="table-form-smallbtn"><?php  if( $rowcount > 0 ){
									  
									  echo"edit";
								  }else{
									  echo"add";
								  }  ?></button>
											</form>
										</div>
										<?php }?>
							</td>
							</td>
							<td data-label="Reporting Venue Desc">		
								<label ><?php echo  $venue["desc"]?></label>
							</td>
							<td data-label="Action">
							   <form class="login100-form  p-b-33 p-t-5" method="post" action="addvenue.php">
								
										<input type="hidden" name="venuecode" value="<?php echo  $venue["id"]?>">
						<button  class="searchbtn" name="submit"  >edit</button>
						</form>
								<form  class="login100-form  p-b-33 p-t-5" method="post" action="delete.php">
										<input type="hidden" name="venuecode" value="<?php echo  $venue["id"]?>">
									  <input type="hidden" name="venuenames" value="<?php echo  $venue["code"]?>">
									<input type="hidden" name="venuename" value="<?php echo  $venue["name"]?>">

						<button  class="searchbtn" name="deletevenue" >delete</button>
								</form>
								
							</td>
							</tr>

						
						<?php endforeach; } 
															
						else{?>
						<div class="container-login100-form-btn m-t-32">
						<label class="input100" style="text-align: center" ><h5>No existing records found.</h5></label>
					</div>
							
						
						<?php } 
?>
						</table>				
					</div>
</div>
			</div>


	

	
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