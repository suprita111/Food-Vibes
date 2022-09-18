<?php  include('connect/database.php');  ?>


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
				<li><a href="res-order.php">Order</a></li>
				<li><a href="admin-logout.php">log out</a></li>

			</ul>
		</div>

	</div>

 </div>

<!-- Menu section ends-->

<?php
	$id =$_SESSION['rid'];
	$sql="SELECT rname FROM res WHERE rid='$id'";
	$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$name=$rows['rname'];
							}
						}
					}

?>

<div class="main-content">
	<div class="wrapper">
		<h1><?php  echo $name;  ?></h1>

			<br/><br/><br/>

			<?php  
					if(isset($_SESSION['add_food']))
					{
						echo $_SESSION['add_food']; //displaying session message
						unset($_SESSION['add_food']);//removing session message
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


			<!-- Button to add admin -->
			<a href = "add-food.php" class="btn-primary">Add Food</a>

			<br/><br/><br/>
			<table class="tbl-full-food">
					<tr>
						<th>Food_id</th>
						<th>Res_name</th>
						<th>Food_Name</th>
						<th>Category</th>
						<th>Serve_time</th>
						<th>Food_type</th>
						<th>Food_desc</th>
						<!--<th>Food_img</th>-->
						<th>Food_price</th>
						<th>Food_status</th>
						<th>Actions</th>
					</tr>


					<?php 

					$id =$_SESSION['rid'];
					$sql = "SELECT  price,fstatus,fname,cuisine,serve_time,ftype,fdesc,food_res.fid ,res.rid,rname FROM(( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid) WHERE food_res.rid='$id'" ;
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['fid'];
								$rname=$rows['rname'];
								$name=$rows['fname'];
								$category=$rows['cuisine'];
								$serve_time=$rows['serve_time'];
								$ftype=$rows['ftype'];
								$fdesc=$rows['fdesc'];
							//	$fimg=$rows['fimg'];
								$fprice=$rows['price'];
								$fstatus=$rows['fstatus'];

								?>
									<tr>
										<td><?php  echo $id;  ?></td>
										<td><?php  echo $rname;  ?></td>
										<td><?php  echo $name;  ?></td>
										<td><?php  echo $category;  ?></td>
										<td><?php  echo $serve_time;  ?></td>
										<td><?php  echo $ftype;  ?></td>
										<td><?php  echo $fdesc;  ?></td>
									<!--	<td><?php  echo "<img src=$fimg width = '25%'  height='30%'>" ;  ?></td>-->
										<td><?php  echo $fprice;  ?></td>
										<td><?php  echo $fstatus;  ?></td>
										<td>
											<a href="update-food.php?id=<?php echo$id ?>"  class="btn-secondary">Update</a><br/><br/>
											<a href="delete-food.php?id=<?php  echo$id   ?>"  class="btn-danger">Delete</a>
										</td>
								
									</tr>

									<!--update-food.php?id=<?php  echo$id   ?>-->
								<?php
							}
						}
						else 
						{

						}
					}

					//echo "<img src=$fimg width = '25%'  height='30%'>" ;
					?>

			</table>


	</div>
</div>

<?php  include('partials/footer.php');  ?>
