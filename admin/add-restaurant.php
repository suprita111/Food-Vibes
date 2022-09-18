<?php  include('partials/menu.php');  ?>

<div class="main-content">
	<div class="wrapper">
		<h1> Add Restaurant </h1>
		<br/><br/><br/>

		<?php 
				if(isset($_SESSION['add_res']))
				{
					echo $_SESSION['add_res'];
					unset($_SESSION['add_res']);
				}
		?>


		<form action=" " method="post">
				<table class="tbl-30">

				
					<tr>
							<td>Res_Name</td>
							<td>
									<input type="text" name="res_name" placeholder="Enter  restaurant name">
							</td>
					</tr>

					<tr>
							<td>Address</td>
							<td>
									<input type="text" name="address" placeholder="Enter  address">
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
									<input type="Number" name="number" placeholder="Enter  number">
							</td>
					</tr>


					<tr>
							<td>Rating</td>
							<td>
									<input type="number" name="rating" placeholder="Enter rating">
							</td>
					</tr>

					<tr>
							<td>Password</td>
							<td>
									<input type="password" name="password" placeholder="password">
							</td>
					</tr>

					<tr>
							<td>Duration</td>
							<td>
									<input type="text" name="time" placeholder="Duration">
							</td>
					</tr>



					<tr>
							<td colspan="2">
									<input type="submit" name="submit" value="Add Restaurant" class="btn-secondary">
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
			$rname = $_POST['res_name'];
			$address= $_POST['address'];
			$email = $_POST['email'];
			$contact = $_POST['number'];
			$rating = $_POST['rating'];
			$duration = $_POST['time'];
			$password=$_POST['password'];

			//Query to insert the data into database
			
				$sql = "INSERT INTO res(rname,radd,remail,rcontact,rating,duration,password) VALUES ('$rname', '$address', '$email', $contact, '$rating', '$duration' ,'$password')";
			

			if ($conn->query($sql) == TRUE) 
			{
					$_SESSION['add_res'] = "Restaurant added successfully";
					header("location:manage-res.php");


			} 
			else 
			{
				
				$_SESSION['add_res'] = "Failed to add restaurant";
				 echo "Failed to insert record. " . $conn->error;
				 header("location:add-restaurant.php");
			}
			echo $sql;

	$conn->close();

		}

		

?>

