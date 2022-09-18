<?php  include('partials/menu.php');  ?>
	
	<div class="main-content">
		<div class="wrapper">
			<h1> Update Restaurant </h1>
			<br/><br/>

			<?php
			//get the ID of selected admin
				$id=$_GET['id'];

			//query to get the admin details
				$sql ="SELECT * FROM res WHERE rid='$id'";

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
						$rname = $row['rname'];
						$radd = $row['radd'];
						$remail = $row['remail'];
						$rcontact = $row['rcontact'];
						$rating = $row['rating'];
						$duration = $row['duration'];
						$password = $row['password'];
						
						echo "Restaurant available";
					}
					else 
					{
						header("location:manage-res.php");
					}

				}

			?>

			<form action=" " method="POST">
				<table class="tbl-30">
					

					<tr>
							<td>Res Name</td>
							<td>
									<input type="text" name="rname"  value="<?php echo $rname;  ?>">
							</td>
					</tr>

					<tr>
							<td>Address</td>
							<td>
									<input type="text" name="radd" value="<?php echo $radd;  ?>">
							</td>
					</tr>

					<tr>
							<td>Email</td>
							<td>
									<input type="email" name="email" value="<?php echo$remail ;  ?>">
							</td>
					</tr>


					<tr>
							<td>Contact</td>
							<td>
									<input type="Number" name="contact" value="<?php echo $rcontact;  ?>">
							</td>
					</tr>


					<tr>
							<td>Rating</td>
							<td>
									<input type="number" name="rating"  value="<?php echo $rating;  ?>">
							</td>
					</tr>

						<tr>
							<td>Duration</td>
							<td>
									<input type="text" name="duration"  value="<?php echo $duration;  ?>">
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
									<input type="submit" name="submit" value="Update Restaurant" class="btn-secondary">
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


						$rname = $_POST['rname'];
						$radd= $_POST['radd'];
						$email = $_POST['email'];
						$contact = $_POST['contact'];
						$rating = $_POST['rating'];
						$duration = $_POST['duration'];
						$password = $_POST['password'];
						
						//sql query to update in table
						$sql = "UPDATE res SET 
						rid = '$rid'  ,
						rname='$rname' ,
						radd='$radd' ,
						remail='$email' ,
						rcontact= '$contact',
						rating='$rating' ,
						duration='$duration' ,
						password='$password'  WHERE  rid='$id'
						";

						//$sql = "INSERT INTO admin(sname,role,semail,scontact,username,password,rid) VALUES('xyz','xyx','xyx@gmail.com',12345,'ffsfssf','hghfhf',111)";

						$res = mysqli_query($conn , $sql);

						//echo $rid;
						if ($res == true)
						{
							$_SESSION[ 'update' ] = "Restaurant updated successfully";
							header("location:manage-res.php");

						}
						else {
									$_SESSION[ 'update' ] = "Failed to update Restaurant";
									header("location:manage-res.php");

								}


			}

	?>



<?php  include('partials/footer.php');  ?>
	

	