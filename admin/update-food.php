
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
	<body>

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
			<h1> Update Food </h1>
			<br/><br/>

			<?php
			//get the ID of selected Restaurant
				$id =$_SESSION['rid'];
				$fid=$_GET['id'];
			//query to get the admin details
				$sql = "SELECT  price,fstatus,fname,cuisine,serve_time,ftype,fdesc,food_res.fid ,res.rid FROM(( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid) WHERE food_res.rid='$id' AND food_res.fid='$fid' " ;

			//execute the query
				$res = mysqli_query($conn,$sql);

			//check whether the query is executed ot not
				if($res==true)
				{
					
					//check whether the data is available or not
					$count = mysqli_num_rows($res);
					//check whether we have admin data or not
					if($count==1)
					{
								while($rows = mysqli_fetch_assoc($res))
							{

										$id=$rows['fid'];
										$rid=$rows['rid'];
										$name=$rows['fname'];
										$category=$rows['cuisine'];
										$serve_time=$rows['serve_time'];
										$ftype=$rows['ftype'];
										$fdesc=$rows['fdesc'];
										$fprice=$rows['price'];
										$fstatus=$rows['fstatus'];
							}
							echo "Food available";
					}
					else 
					{
						header("location:res-food.php");
					}
				}

			?>

			<form action=" " method="post">
				<table class="tbl-30">

				
					<tr>
							<td>Food_Name</td>
							<td>
									<input type="text" name="food_name" value="<?php echo $name;  ?>">
							</td>
					</tr>

					<tr>
							<td>Category</td>
							<td>
									<input type="text" name="category" value="<?php echo $category;  ?>">
							</td>
					</tr>

					<tr>
							<td>Serve-Time</td>
							<td>
									<input type="text" name="time" value="<?php echo $serve_time;  ?>">
							</td>
					</tr>


					<tr>
							<td>Food-Type</td>
							<td>
									<input type="text" name="food_type" value="<?php echo $ftype;  ?>">
							</td>
					</tr>


					<tr>
							<td>Food-desc</td>
							<td>
									<input type="text" name="food-desc"value="<?php echo $fdesc;  ?>">
							</td>
					</tr>


					<tr>
							<td>Food-price</td>
							<td>
									<input type="text" name="food-price" value="<?php echo $fprice;  ?>">
							</td>
					</tr>


					<tr>
						<td>Status </td>
						<td>
							<select name="fstatus">
								<option <?php if($fstatus=="Available") { echo "selected";}?> value="Available">Available</option>
								<option <?php if($fstatus=="Not Available") { echo "selected";}?> value="Not Available">Not Available</option>
							</select>
						</td>
					</tr>

					<tr>
							<td colspan="2">
									<input type="submit" name="submit" value="Update Food" class="btn-secondary">
							</td>
					</tr>

					

				</table>
		</form>

		</div>
	</div>

	<?php 
	

		//	$id=$_GET['id'];

			//check whether the submit button is clicked or not

			if (isset($_POST['submit']) )
			{
			//Get the data from form
				$fname = $_POST['food_name'];
				$category= $_POST['category'];
				$serve_time = $_POST['time'];
				$ftype= $_POST['food_type'];
				$fdesc= $_POST['food-desc'];
				$fprice = $_POST['food-price'];
				$fstatus = $_POST['fstatus'];
			//	$filename = $_FILES["pic_upload"]["name"];
				//$tempname = $_FILES["pic_upload"]["tmp_name"];
			//	$folder = "images/".$filename;
				$id =$_SESSION['rid'];
				$fid=$_GET['id'];

				echo $id;
				echo $fid;
				echo $fname;
				//sql query to update in table food

						$sql = "UPDATE food SET 
						fname= '$fname'  ,
						cuisine='$category' ,
						serve_time='$serve_time' ,
						ftype='$ftype' ,
						fdesc= '$fdesc' WHERE fid='$fid'
						";

						$res = mysqli_query($conn , $sql);

						//echo $rid;
						if ($res == true)
						{
									//sql query to update in table food_res
									$sql2 = "UPDATE food_res SET 
									price='$fprice' ,
									fstatus='$fstatus'
									WHERE rid='$id' AND fid='$fid'";
					
			
										$res1 = mysqli_query($conn , $sql2);

										if ($res1 == TRUE)
										{
											$_SESSION[ 'update' ] = "Food updated successfully";
											header("location:res-food.php");

										}
										else 
										{
												$_SESSION[ 'update' ] = "Failed to update Food";
												header("location:res-food.php");
										}

						}
				}

	?>



<?php  include('partials/footer.php');  ?>
	

	