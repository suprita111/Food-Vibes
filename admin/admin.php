<?php  include('partials/menu.php');  ?>


<!-- Main content section starts-->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>
			<br/><br/>

			<?php  
					if(isset($_SESSION['admin']))
					{
						echo $_SESSION['admin']; //displaying session message
						unset($_SESSION['admin']);//removing session message
					}

					if(isset($_SESSION['delete']))
					{
						echo $_SESSION['delete']; //displaying session message
						unset($_SESSION['delete']);//removing session message
					}

					if(isset($_SESSION['update']))
					{
						echo $_SESSION['update']; //displaying session message
						unset($_SESSION['update']);//removing session message
					}



			?>

				<br/><br/><br/>

			<!-- Button to add admin -->
			<a href = "add-admin.php" class="btn-primary">Add admin</a>
				<br/><br/><br/>



				<table class="tbl-full">
					<tr>
						<th>id</th>
						<th>rid</th>
						<th>Name</th>
						<th>Role</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Username</th>
						<th>Actions</th>
					</tr>


					<?php 
					
					$sql = "SELECT * FROM admin";
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['sid'];
								$name=$rows['sname'];
								$role=$rows['role'];
								$email=$rows['semail'];
								$contact=$rows['scontact'];
								$username=$rows['username'];
								$rid=$rows['rid'];

								?>
									<tr>
										<td><?php  echo $id;  ?></td>
										<td><?php  echo $rid;  ?></td>
										<td><?php  echo $name;  ?></td>
										<td><?php  echo $role;  ?></td>
										<td><?php  echo $email;  ?></td>
										<td><?php  echo $contact;  ?></td>
										<td><?php  echo $username;  ?></td>
										<td>
											<a href="update-admin.php?id=<?php  echo$id   ?>"  class="btn-secondary">Update Admin</a>
											<a href="delete-admin.php?id=<?php  echo$id   ?>"  class="btn-danger">Delete Admin</a>
										</td>
									</tr>


								<?php
							}
						}
						else 
						{

						}
					}

					?>

			
				</table>
		<div class="clearfix"></div>
		</div>

	</div>
<!-- Main content  section ends-->


<?php  include('partials/footer.php');  ?>
