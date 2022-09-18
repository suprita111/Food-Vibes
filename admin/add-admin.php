<?php  include('partials/menu.php');  ?>

<div class="main-content">
	<div class="wrapper">
		<h1> Add Admin </h1>
		<br/><br/><br/>

		<?php 
				if(isset($_SESSION['admin']))
				{
					echo $_SESSION['admin'];
					unset($_SESSION['admin']);
				}
		?>


		<form action=" " method="post">
				<table class="tbl-30">

				<tr>
							<td>Res id</td>
							<td>
									<input type="Number" name="rid" placeholder="Enter restaurant id">
							</td>
					</tr>

					<tr>
							<td>Full Name</td>
							<td>
									<input type="text" name="full_name" placeholder="Enter  name">
							</td>
					</tr>

					<tr>
							<td>Role</td>
							<td>
									<input type="text" name="role" placeholder="Enter  role">
							</td>
					</tr>

					<tr>
							<td>Email</td>
							<td>
									<input type="email" name="email" placeholder="Enter  email">
							</td>
					</tr>


					<tr>
							<td>Contact</td>
							<td>
									<input type="text" name="number" placeholder="Enter  number">
							</td>
					</tr>


					<tr>
							<td>Username</td>
							<td>
									<input type="text" name="username" placeholder="Enter username">
							</td>
					</tr>


					<tr>
							<td>Password</td>
							<td>
									<input type="password" name="password" placeholder="  password">
							</td>
					</tr>

					<tr>
							<td colspan="2">
									<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
							</td>
					</tr>

					

				</table>
		</form>
	</div>
</div>
<?php  include('partials/footer.php');  ?>



<?php
		
	//Process the value from form save it in database

	//Check whether the submit button is clicked or not

		if (isset($_POST['submit']) )
		{
			//Get the data from the form
			$rid =$_POST['rid'];
			$full_name = $_POST['full_name'];
			$role = $_POST['role'];
			$email = $_POST['email'];
			$contact = $_POST['number'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			//Query to insert the data into database
		
			
		$sql = "INSERT INTO admin(sname,role,semail,scontact,username,password,rid) VALUES ('$full_name', '$role', '$email', '$contact', '$username', '$password',$rid)";


			if ($conn->query($sql) == TRUE) 
			{
					$_SESSION['admin'] = "Admin added successfully";
					header("location:admin.php");


			} 
			else 
			{
				
					$_SESSION['admin'] = "Failed to add admin";
				 echo "Failed to insert record. " . $conn->error;
				 		header("location:add-admin.php");
			}
			echo $sql;

	$conn->close();

		}

		

?>

