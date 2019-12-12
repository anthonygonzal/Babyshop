<!DOCTYPE html>
<html>
<head>
	<title> Sign Up </title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>

	<!-- Banner -->

	<!--<div class="menu-bar">
		<ul>
		<li><a href="homepage.php">Home</a></li>
		
		<li><a href="#">About Us</a>
			<div class="sub-menu-1">
				<ul>
					<li><a href="#">Mission </a></li>
					<li><a href="#">Vission </a></li>
				</ul>
			</div>
		</li>
			
		<li><a href="#">Product</a>
			<div class="sub-menu-1">
				<ul>
					<li><a href="#">Latest</a></li>
					<li><a href="#">Events </a></li>
				</ul>
			</div>
		</li>
		
		<li><a href="#">Contact</a>
			<div class="sub-menu-1">
				<ul>
					<li><a href="#">Email Us </a></li>
					<li><a href="#">Location </a></li>
				</ul>
			</div>
		</li>
			
		<li><a href="#">Account</a>
			<div class="sub-menu-1">
				<ul>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</li>
		</ul>

	</div> -->

	<!-- End of Banner -->

	<br>
	<br>
	<div class="nav">
		<div class="col-lg-10 m-auto">

		<form action="Sign_up.php" method="POST">

			
				<label class="text-center">Create an Account</label>
			
			<br><br>
			<label class="feild">Username</label>
			<input type="text" class="form-control" name="username" placeholder="Type your Username " required/>
			<label class="feild">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Type your Password " required/>
			<label class="feild">Confirm Password</label>
			<input type="password" class="form-control" name="repassword" placeholder="Confirm Password " required/>
			<br>
			<center>
				<input type="submit" class="btn-success" name="sign" value="Submit">
				<a href="login.php" class="btn-warning" >Back </a>
			</center>
			
		</form>

		</div>
	</div>

	<!-- Sign Up -->

	<?php
			require_once("conn.php");
			
				if(isset($_POST['sign']))
				{
					$username = $_POST['username'];
					$password = $_POST['password'];
					$repass = $_POST['repassword'];
					
					if($password==$repass)
					{
						$query = "SELECT * FROM accounts WHERE username='$username'";
						$query_run = mysqli_query($con,$query);

						if(mysqli_num_rows($query_run)>0)
						{
							//username already
							echo '<script type="text/javascript"> alert("User Already Exist Try Another Username") </script>';
						}
						else
						{
							$query = "INSERT INTO accounts (username,password) VALUES ('$username','$password')";
							$sql_run = mysqli_query($con,$query);
							
							if($sql_run)
							{
								echo '<script type="text/javascript"> alert("User Registered Go to login") </script>';
							}
							else
							{
								echo '<script type="text/javascript"> alert("Error") </script>';
							}							
						}
					}
					else
					{
						echo '<script type="text/javascript"> alert("Password And Confirm Password does not match") </script>';
					}
				}

			?>

</body>
</html>
