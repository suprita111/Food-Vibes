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
				<li><a href="res-order">Order</a></li>
				<li><a href="admin-logout.php">log out</a></li>

			</ul>
		</div>

	</div>


	<div class="main-content">
		<div class="wrapper">
			<h1> Update Order </h1>
			<br/><br/>


			<?php  

				//check whether id is set or not $_GET['id'])
				if(isset($_POST['update']) /*&& isset($_SESSION['fid'])*/)
				{
					$oid=$_POST['oid'];
					$fid=$_POST['fid'];
					$rid=$_SESSION['rid'];

					//echo $oid;
					//echo $fid;
					//echo $rid;
					
					
					//get all the order details for status update
					$sql= "SELECT  fname,rname,cname,cadd,ccontact,odate,qty,total,food_res_tbl_order.oid ,order_status FROM((((food_res_tbl_order INNER JOIN res ON food_res_tbl_order.rid=res.rid) INNER
					JOIN food ON food_res_tbl_order.fid=food.fid)INNER
					JOIN tbl_order ON food_res_tbl_order.oid=tbl_order.oid) INNER
					JOIN cus ON tbl_order.cid=cus.cid) WHERE food_res_tbl_order.oid='$oid' AND food_res_tbl_order.fid='$fid' AND  food_res_tbl_order.rid='$rid'" ;
					//execute query
					$res=mysqli_query($conn,$sql);
					//count the rows

					$count= mysqli_num_rows($res);
					echo $count;
					
					if($count==1)
					{
						//detauls available
						$row=mysqli_fetch_assoc($res);
						$fname=$row['fname'];
						$rname=$row['rname'];
						$cname=$row['cname'];
						$status=$row['order_status'];
					}
					else
					{
						//Details not available
						header("location:res-order.php");
					}

				}
				else
				{
					header("location:res-order.php");
				}
			?>

			<form action="" method="POST">

				<table class="tbl-30">
					<tr>
						<td>Food name </td>
						<td><b><?php echo $fname; ?></b></td>
					</tr>

					<tr>
						<td>Restaurant name</td>
						<td><b><?php echo $rname; ?></b></td>
					</tr>

					<tr>
						<td>Customer name </td>
						<td><b><?php echo $cname; ?></b></td>
					</tr>
					
					<tr>
						<td>Status </td>
						<td>
							<select name="status">
								<option <?php if($status=="Ordered") { echo "selected";}?> value="Ordered">Ordered</option>
								<option <?php if($status=="On Delivery") { echo "selected";}?> value="On Delivery">On Delivery</option>
								<option <?php if($status=="Delivered") { echo "selected";}?> value="Delivered">Delivered</option>
								<option <?php if($status=="Canclled") { echo "selected";}?>value="Canclled">Canclled</option>
							</select>
						</td>
					</tr>

					<tr>
							<td colspan="2">
									<input type="hidden" name="id" value="<?php echo $oid ?>">
									<input type="hidden" name="fid" value="<?php echo $fid ?>">
									
									<input type="submit" name="submit" value="Update Order" class="btn-secondary">
							</td>
					</tr>

				</table>



			</form>


			<?php
				//check whether update button is clicked or not
				if(isset($_POST['submit']))
				{
					//get all the values from form

					$oid = $_POST['id'];
					$fid = $_POST['fid'];
					$status = $_POST['status'];

					//update the values and redirect to res-order page

					$sql1="UPDATE food_res_tbl_order SET
							order_status = '$status' WHERE oid='$oid' AND fid='$fid' ";


					//execute the query
					$res1=mysqli_query($conn,$sql1);

					//check whether query executed successfully or not
					if($res1 == TRUE)
					{
						$_SESSION['update'] = "Order status updated successfully";
						header("location:res-order.php");
					}
					else
					{
						$_SESSION['update'] = "failed to update order status ";
						header("location:update-order.php");
					}


				}



			?>



		</div>
	</div>


<?php  include('partials/footer.php');  ?>
	
