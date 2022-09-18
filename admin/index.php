<?php  include("connect/database.php"); ?>


<html>
	<head>
		<title> Login Admin </title>
		<link rel="stylesheet" href="../CSS/admin.css">
	</head>

	<body>
			<div class ="login">
				<h1 class="text-center">Login</h1>
					<br/><br/>
					<?php
							if(isset($_SESSION['login']))
							{
								echo $_SESSION['login']; //displaying session message
								unset($_SESSION['login']);//removing session message
							}

							if(isset($_SESSION['warning']))
							{
								echo $_SESSION['warning']; //displaying session message
								unset($_SESSION['warning']);//removing session message
							}
					?>

					<br/><br/>
				<!--   Login form starts here   -->

				<form action=" " method="POST" class="text-center">
				Email id:<br/>
				<input type ="email"  class=" input-field" name="email" placeholder="Enter your emailid"><br/><br/>

				Password:<br/>
				<input type ="Password" class=" input-field"  name="password" placeholder="Enter your password">

				<br/><br/>
				<input type="submit" name="submit"  value="Login"  class="btn-login"><br/><br/>
					<br/><br/>
				</form>

				<!--   Login form ends here   -->
				<p class="text-center">Created By - <a href="#">SSSP</a></p>
			</div>
	</body>
</html>

<?php  
	//check whether the submit button is clicked or not

	if(isset($_POST['submit']))
	{
		//get the data from the login form

		 $email = $_POST['email'];
		 $password = $_POST['password'];

		 //sql query to check whether the emailid and passwordexist or not
		   
		 $sql = "SELECT * FROM admin WHERE semail='$email' AND password='$password'";
		 //execute the query
		 $res = mysqli_query($conn, $sql);
		 while($row = mysqli_fetch_array($res))
			{
			$success = true;
			$name = $row['sname'];
			$rid = $row['rid'];
			}

		if($success == true)
		{	
			session_start();
			$_SESSION['sname'] = $name;
			$_SESSION['rid'] = $rid;
		}


		 //count rows to check whether the user exist or not
		 $count = mysqli_num_rows($res);
		 if($count==1)
		 {
				$_SESSION['login'] = "Login successful";
				$_SESSION['user'] = "$name";	//to check whether the user is logged in or not
				if ($_SESSION['rid'] == 111) 
				{
						header("location:home.php");
				}
				else
				{
					header("location:res-food.php");
				}
		 }
		 else 
		{
				$_SESSION['login'] = "Login  not successful";
				header("location:index.php");
		
		}

	}

?>