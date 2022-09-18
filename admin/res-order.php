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
	echo $id;
	$sql="SELECT rname FROM res WHERE rid='$id'";
	$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						
							while($rows = mysqli_fetch_assoc($res))
							{
								$name=$rows['rname'];
							}
						
					}

?>

<div class="main-content">
	<div class="wrapper">
		<h1>Orders  of	"<?php echo $name ?>"</h1>

			<br/><br/><br/>

			<?php  

					

					if(isset($_SESSION['update']))
					{
						echo $_SESSION['update']; //displaying session message
						unset($_SESSION['update']);//removing session message
					}



			?>

			<table class="tbl-full">
					<tr>
						<th>oid</th>
						<th>Food</th>
						<th>Restaurant</th>
						<th>Customer</th>
						<th>Address</th>
						<th>Contact</th>
						<th>Date</th>
						<th>Qty.</th>
						<th>Total</th>
						<th>Order_Status</th>
						<th>Actions</th>
					</tr>


					<?php 

					
					$sql1 = "SELECT  fname,rname,cname,cadd,ccontact,odate,qty,price,total,food_res_tbl_order.fid,food_res_tbl_order.rid,food_res_tbl_order.oid ,order_status FROM(((((food_res_tbl_order INNER JOIN res ON food_res_tbl_order.rid=res.rid) INNER
					JOIN food ON food_res_tbl_order.fid=food.fid) INNER JOIN food_res ON food_res_tbl_order.fid=food_res.fid AND food_res_tbl_order.rid=food_res.rid )INNER
					JOIN tbl_order ON food_res_tbl_order.oid=tbl_order.oid) INNER
					JOIN cus ON tbl_order.cid=cus.cid) 
					  WHERE food_res_tbl_order.rid='$id'" ;
					$res1 = mysqli_query($conn,$sql1);
					if($res1 == TRUE)
					{
						$count1 = mysqli_num_rows($res1);
						if($count1>0)
						{
							while($rows1 = mysqli_fetch_assoc($res1))
							{
								$id=$rows1['oid'];
								$fid=$rows1['fid'];
								$fname=$rows1['fname'];
								$rname=$rows1['rname'];
								$cname=$rows1['cname'];
								$price=$rows1['price'];
								$cadd=$rows1['cadd'];
								$contact=$rows1['ccontact'];
								$odate_time=$rows1['odate'];
								$qty=$rows1['qty'];
								$total=$rows1['total'];
								$Status=$rows1['order_status'];
								//$_SESSION['fid']=$rows1['fid'];
								//echo $_SESSION['fid'];

								?>
								<form action="update-order.php" method="POST">

									


								

										<tr>
											<td><?php  echo $id;  ?></td>
											<td><?php  echo $fname;  ?></td>
											<td><?php  echo $rname;  ?></td>
											<td><?php  echo $cname;  ?></td>
											<td><?php  echo $cadd;  ?></td>
											<td><?php  echo $contact;  ?></td>
											<td><?php  echo $odate_time;  ?></td>
											<td><?php  echo $qty;  ?></td>
											<td><?php  echo $qty * $price;  ?></td>
											<td><?php  echo $Status;  ?></td>
											<td>
												<!--<a href="update-order.php?id=<?php // echo$id ;  ?>"  class="btn-secondary">Update</a><br/><br/>-->
											<input type="hidden" name="fid" value="<?php echo $fid; ?>">
											<input type="hidden" name="oid" value="<?php echo $id; ?>">
											<input type="submit" name="update" value="Update"class="btn-secondary">
											
											
											</td>
								
										</tr>
								</form>
								<?php
							}
						}
						else 
						{
							echo "Failed. " . $conn->error;
						}
					}
				?>


				</table>
		<div class="clearfix"></div>

	</div>
</div>

<?php  include('partials/footer.php');  ?>
