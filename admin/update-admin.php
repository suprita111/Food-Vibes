<?php  include('partials/menu.php');  ?>
	
	<div class="main-content">
		<div class="wrapper">
			<h1> Update Admin </h1>
			<br/><br/>

			<?php
			//get the ID of selected admin
				$id=$_GET['id'];

			//query to get the admin details
				$sql ="SELECT * FROM admin WHERE sid='$id'";

			//execute the query
				$res = mysqli_query($conn,$sql);

			//check whether the query is executed ot not
				if($res==true)
				{
					
					//check whether the data is available or not
					$count = mysqli_num_rows($res);
					//check whether we have admin data or not
					if($count == 1)
					{
						$row=mysqli_fetch_assoc($res);
						$rid = $row['rid'];
						$full_name = $row['sname'];
						$role = $row['role'];
						$email = $row['semail'];
						$contact = $row['scontact'];
						$username = $row['username'];
						$password = $row['password'];
						
						echo "Admin available";
					}
					else 
					{
						header("location:admin.php");
					}

				}

			?>

			<form action=" " method="POST">
				<table class="tbl-30">
					<tr>
							<td>Res id</td>
								<td>
										<input type="Number" name="rid" value="<?php echo $rid;  ?>">
								</td>
					</tr>

					<tr>
							<td>Full Name</td>
							<td>
									<input type="text" name="full_name"  value="<?php echo $full_name;  ?>">
							</td>
					</tr>

					<tr>
							<td>Role</td>
							<td>
									<input type="text" name="role" value="<?php echo $role;  ?>">
							</td>
					</tr>

					<tr>
							<td>Email</td>
							<td>
									<input type="email" name="email" value="<?php echo $email;  ?>">
							</td>
					</tr>


					<tr>
							<td>Contact</td>
							<td>
									<input type="text" name="number" value="<?php echo $contact;  ?>">
							</td>
					</tr>


					<tr>
							<td>Username</td>
							<td>
									<input type="text" name="username" value="<?php echo $username;  ?>">
							</td>
					</tr>


					<tr>
							<td>Password</td>
							<td>
									<input type="password" name="password"  value="<?php echo $password;  ?>">
							</td>
					</tr>

					<tr>
							<td colspan="2">
									<input type="hidden" name="id" value="<?php  echo $id;  ?>">
									<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
							</td>
					</tr>

					

				</table>

		</div>
	</div>

	<?php 
	

		//	$id=$_GET['id'];

			//check whether the submit button is clicked or not

			if(isset($_POST['submit']))
			{
				//echo "Button clicked";
				//Get all the value from form to Update


						 $rid = $_POST['rid'];
						$full_name = $_POST['full_name'];
						$role = $_POST['role'];
						$email = $_POST['email'];
						$contact = $_POST['number'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						
						//sql query to update in table
						$sql = "UPDATE admin SET 
						rid = '$rid'  ,
						sname='$full_name' ,
						role='$role' ,
						semail='$email' ,
						scontact= '$contact',
						username='$username' ,
						password='$password'  WHERE  sid='$id'
						";

						//$sql = "INSERT INTO admin(sname,role,semail,scontact,username,password,rid) VALUES('xyz','xyx','xyx@gmail.com',12345,'ffsfssf','hghfhf',111)";

						$res = mysqli_query($conn , $sql);

						//echo $rid;
						if ($res == true)
						{
							$_SESSION[ 'update' ] = "Admin updated successfully";
							header("location:admin.php");

						}
						else {
									$_SESSION[ 'update' ] = "Failed to update admin";
									header("location:admin.php");

								}


			}

	?>



<?php  include('partials/footer.php');  ?>
	

	