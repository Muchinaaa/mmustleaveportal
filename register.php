<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
	
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];   
	$email=$_POST['email']; 
	$password=md5($_POST['password']); 
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$department=$_POST['department']; 
	$address=$_POST['address']; 
	$leave_days=$_POST['leave_days']; 
	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber']; 
	$status=1;

	 $query = mysqli_query($conn,"select * from tblemployees where EmailId = '$email'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ ?>
	 <script>
	 alert('Data Already Exist');
	</script>
	<?php
      }else{
        mysqli_query($conn,"INSERT INTO tblemployees(FirstName,LastName,EmailId,Password,Gender,Dob,Department,Address,Av_leave,role,Phonenumber,Status, location) VALUES('$fname','$lname','$email','$password','$gender','$dob','$department','$address','$leave_days','$user_role','$phonenumber','$status', 'NO-IMAGE-AVAILABLE.jpg')         
		") or die(mysqli_error()); ?>
		<script>alert('Staff Records Successfully  Added');</script>;
		<script>
		window.location = "index.php"; 
		</script>
		<?php   }
}

?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/china.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>


<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>ICT LeavePortal</title>

	<!-- Site favicon -->
	

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<section id="rest">
		<div class="container">
			<div class="row align-items-center">
				
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Sign up To LeavePortal</h2>
						</div>
		<form name="signup" method="post">
        
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname"  class="form-control form-control-lg"required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname"  class="form-control form-control-lg" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control form-control-lg" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control form-control-lg" required><br><br>
        
        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" class="form-control form-control-lg" required><br><br>


		<label for ="role">User Role </label>
		<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
			<option value="">Select Role</option>
		    <option value="HOD">Admin</option>
			<option value="Staff">Staff</option>
			<option value="Staff">HOD</option>
		</select>
        <br><br>
        <label>Department :</label>
											<select name="department" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Department</option>
													<?php
													$query = mysqli_query($conn,"select * from tbldepartments");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['DepartmentShortName']; ?>"><?php echo $row['DepartmentName']; ?></option>
													<?php } ?>
											</select>
		<br>
		<BR>
        
        <label for="address">Address:</label>
        <input type="Text" name="address" class="form-control form-control-lg" required></input><br><br>
        
        <label for="av_leave">Available Leave:</label>
        <input type="number" name="av_leave" class="form-control form-control-lg"  required><br><br>
        
        <label for="phoneNo">Phone Number:</label>
        <input type="text"  class="form-control form-control-lg" name="phoneNo" required><br><br>
        
        <br><br>
        
        <label for="regDate">Registration Date:</label>
        <input type="date" name="regDate" class="form-control form-control-lg"  required><br><br>
        
       
        <br><br>
        <label for="location">Location:</label>
        <input type="text" name="location" class="form-control form-control-lg" required><br><br>


        <div class="input-group mb-0">
		<input class="btn btn-primary btn-lg btn-block" name="signin" id="signUP" type="submit" value="Sign Up">
		</div>
        </form>
		</div>
	</div>
	</div>
	</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	</section>
</body>
</html>