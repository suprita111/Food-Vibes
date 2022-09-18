<?php  include('partials/menu.php');  ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Order</h1>

			<br/><br/><br/>

				<table class="tbl-full">
					<tr>
						<th>oid</th>
						<th>Food</th>
						<th>Restaurant</th>
						<th>Customer</th>
						<th>Address</th>
						<th>Contact</th>
						<th>Date_Time</th>
						<th>Qty.</th>
						<th>Total</th>
						<th>Order_Status</th>
						<!--<th>Actions</th>-->
					</tr>


					<?php 

					
					$sql = "SELECT  fname,rname,cname,cadd,ccontact,odate,qty,price,total,food_res_tbl_order.oid ,order_status FROM(((((food_res_tbl_order INNER JOIN res ON food_res_tbl_order.rid=res.rid) INNER
					JOIN food ON food_res_tbl_order.fid=food.fid)INNER
					JOIN tbl_order ON food_res_tbl_order.oid=tbl_order.oid) INNER
					JOIN cus ON tbl_order.cid=cus.cid) INNER JOIN food_res ON food_res_tbl_order.fid=food_res.fid AND food_res_tbl_order.rid=food_res.rid ) " ;
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['oid'];
								$fname=$rows['fname'];
								$rname=$rows['rname'];
								$cname=$rows['cname'];
								$cadd=$rows['cadd'];
								$contact=$rows['ccontact'];
								$date_time=$rows['odate'];
								$qty=$rows['qty'];
								$price=$rows['price'];
								$total=$rows['total'];
								$Status=$rows['order_status'];

								?>
									<tr>
										<td><?php  echo $id;  ?></td>
										<td><?php  echo $fname;  ?></td>
										<td><?php  echo $rname;  ?></td>
										<td><?php  echo $cname;  ?></td>
										<td><?php  echo $cadd;  ?></td>
										<td><?php  echo $contact;  ?></td>
										<td><?php  echo $date_time;  ?></td>
										<td><?php  echo $qty;  ?></td>
										<td><?php  echo $qty * $price;  ?></td>
										<td><?php  echo $Status;  ?></td>
								
									</tr>
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
