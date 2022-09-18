<?php  include('partials/menu.php');  ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Restaurant</h1>
		<br/><br/>


		<?php  
					if(isset($_SESSION['add_res']))
					{
						echo $_SESSION['add_res']; //displaying session message
						unset($_SESSION['add_res']);//removing session message
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
			<a href = "add-restaurant.php" class="btn-primary">Add Restaurant</a>

			<br/><br/><br/>

					<table class="tbl-full">
					<tr>
						<th>Rid</th>
						<th>Name</th>
						<th>Add</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Rating</th>
						<th>Duration</th>
						<th>Actions</th>
					</tr>


					<?php 
					
					$sql = "SELECT * FROM res WHERE rid != 111";     //here res is restaurant table in the database
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['rid'];
								$name=$rows['rname'];
								$add=$rows['radd'];
								$email=$rows['remail'];
								$contact=$rows['rcontact'];
								$rating=$rows['rating'];
								$duration=$rows['duration'];

								?>
									<tr>
										<td><?php  echo $id;  ?></td>
										<td><?php  echo $name;  ?></td>
										<td><?php  echo $add;  ?></td>
										<td><?php  echo $email;  ?></td>
										<td><?php  echo $contact;  ?></td>
										<td><?php  echo $rating;  ?></td>
										<td><?php  echo $duration;  ?></td>
										<td>
											<a href="update-restaurant.php?id=<?php  echo$id   ?>"  class="btn-secondary">Update</a><br/><br/>
											<a href="delete-restaurant.php?id=<?php  echo$id   ?>"  class="btn-danger">Delete</a>
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
