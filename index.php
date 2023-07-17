<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$sql ="SELECT * FROM tblemployees where EmailId ='$username' AND Password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if ($row['role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'admin/admin_dashboard.php'; </script>";
		    }
		    elseif ($row['role'] == 'Staff') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'staff/index.php'; </script>";
		    }
		    else {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
		    }
		}

	} 
	else{
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}
// $_SESSION['alogin']=$_POST['username'];
// 	echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leave Home</title>
	<link rel="stylesheet" type="text/css" href="vendors/styles/stylesh.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">HOLIDAY&#8482;</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="form/about.html">ABOUT</a></li>
                    <li><a href="form/services.html">SERVICE</a></li>
                    <li><a href="form/contact.html">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type Text To Search">
                <a href="#"> <button class="btn">Search</button></a>
            </div>

        </div> 
        <div class="content">
            <h1>MMUST ICT LEAVE<br><span>PORTAL HOME</span> 
            <br>Staff Management Simplified</h1>
            <p class="par">HOLIDAY&#8482; makes managing your team's paid time off a breeze.<br>
             No more cluttered spreadsheets and manual data entry.</p>


                <form name="signin"method="POST">
                <div class="for">
                    <h2>Login To Leave Portal</h2>
                    <input type="email" name="username" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <button class="btnn" name="signin">Login</button>

                    <p class="link">Don't have an account?<br>
                    <a href="register.php">Sign up </a> here</a></p><br>
                

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    </div>

                </div>
                </form>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>