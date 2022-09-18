<?php

//start session
session_start();

//Database Connection
	$servername = "localhost";
	$username = "suprita";
	$password = "12345678";
	$dbname="food-vibes";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error)
	{
  		die("Connection failed: " . $conn->connect_error);
	}
?>


<html>

	<head>
		<title> food-order website -home page</title>

		<link rel="stylesheet"  href="../CSS/admin.css">
	</head>


	<!-- Menu section starts-->
	<div class="menu text-center ">
		<div class="wrapper">
			<ul>
				<li><a href="res-food.php">Foods</a></li>
				<li><a href="#">Order</a></li>
				<li><a href="admin-logout.php">log out</a></li>

			</ul>
		</div>

	</div>

 </div>


<div class="main-content">
	<div class="wrapper">
		<h1> Add Food </h1>
		<br/><br/><br/>

		<?php 
				if(isset($_SESSION['add_food']))
				{
					echo $_SESSION['add_food'];
					unset($_SESSION['add_food']);
				}
		?>


		<form action=" " method="post" enctype="multipart/form-data">
				<table class="tbl-30">


					<!--<tr>
							<td>Res_id</td>
							<td>
									<input type="number" name="res_id" placeholder="Enter  restaurant id">
							</td>
					</tr>-->

				
					<tr>
							<td>Food_Name</td>
							<td>
									<input type="text" name="food_name" placeholder="Enter  food name">
							</td>
					</tr>

					<tr>
							<td>Category</td>
							<td>
									<input type="text" name="category" placeholder="Enter  category">
							</td>
					</tr>

					<tr>
							<td>Serve-Time</td>
							<td>
									<input type="text" name="time" placeholder="Enter  duration">
							</td>
					</tr>


					<tr>
							<td>Food-Type</td>
							<td>
									<input type="text" name="food_type" placeholder="Enter  food type">
							</td>
					</tr>


					<tr>
							<td>Food-desc</td>
							<td>
									<input type="text" name="food-desc" placeholder="Enter food description">
							</td>
					</tr>


					<tr>
							<td>Food-price</td>
							<td>
									<input type="text" name="food-price" placeholder="Enter food price">
							</td>
					</tr>


					<tr>
							<td>Food-status</td>
							<td>
									<input type="radio" name="active" value="Available"> Available
									<input type="radio" name="active" value="Not-Available"> Not-Available
							</td>
					</tr>

					<tr>
							<td>select image to upload:</td>
							<td>
									<input type="file" name="pic_upload" id="pic_upload">
							</td>
					</tr>

					<tr>
							<td colspan="2">
									<input type="submit" name="submit" value="Add Food" class="btn-secondary">
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
			//$rid=$_POST['res_id'];
			$fname = $_POST['food_name'];
			$category= $_POST['category'];
			$serve_time = $_POST['time'];
			$ftype= $_POST['food_type'];
			$fdesc= $_POST['food-desc'];
			$fprice = $_POST['food-price'];
			if(isset($_POST['active']))
			{
				$active = $_POST['active'];
			}
			else
			{
				$active = "No";
			}
			$filename = $_FILES["pic_upload"]["name"];
			$tempname = $_FILES["pic_upload"]["tmp_name"];
			$folder = "../images/".$filename;
			$id =$_SESSION['rid'];
			//Query to insert the data into table food
			
				$sql = "INSERT INTO food (fname,cuisine,serve_time,ftype,fdesc,fimg) VALUES  ('$fname', '$category', '$serve_time', '$ftype', '$fdesc', '$filename') ";

			if ($conn->query($sql) == TRUE ) 
			{
				move_uploaded_file($tempname , $folder);

				$sql1 ="SELECT fid ,fname FROM food WHERE fname='$fname' ";
				$res = mysqli_query($conn,$sql1);
				if($res==TRUE)
				{
					$count = mysqli_num_rows($res);
					if($count == 1)
					{
						while($rows = mysqli_fetch_assoc($res))
						{
								
								$fid = $rows['fid'];
								$fname = $rows['fname'];
						}
						
					}
						
					else 
					{
						header("location:add-food.php");
					}
					//echo $fid;
				}
					//$fid=$_GET['fid'];
					//Query to insert the data into table food_res
					$sql2="INSERT INTO food_res(fid,rid,price,fstatus) VALUES ('$fid','$id','$fprice','$active') ";

					if ($conn->query($sql2) == TRUE ) 
					{
						$_SESSION['add_food'] = "Food added successfully";
						header("location:res-food.php");
					}
				
			} 
			else 
			{
				
				//$_SESSION['add_food'] = "Failed to add food";
				 echo "Failed to insert record. " . $conn->error;
				// header("location:add-food.php");
			}
			//echo $sql;
			//	echo $fid;

	$conn->close();

		}

		

?>

