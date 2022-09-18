<?php  include('partials/menu.php');  ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Review</h1>

			<br/><br/><br/>

				<table class="tbl-full">
					<tr>
						<th>Rev_id</th>
						<th>Order_date</th>
						<th>Food</th>
						<th>Restaurant</th>
						<th>Customer</th>
						<th>Cus_Address</th>
						<th>Cus_Contact</th>
						<th>Rating</th>
						<th>Description</th>
					</tr>


					<?php 

					//order_status,(error)
					
					$sql = "SELECT  fname,rname,cname,cadd,ccontact,odate,review.revid,revdesc,revrating FROM((((review INNER JOIN res ON review.rid=res.rid) INNER
					JOIN food ON review.fid=food.fid)INNER
					JOIN tbl_order ON review.oid=tbl_order.oid) INNER
					JOIN cus ON tbl_order.cid=cus.cid) " ;
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['revid'];
								$fname=$rows['fname'];
								$rname=$rows['rname'];
								$cname=$rows['cname'];
								$cadd=$rows['cadd'];
								$contact=$rows['ccontact'];
								$odate=$rows['odate'];
								$revdesc=$rows['revdesc'];
								$rating=$rows['revrating'];
								

								?>
									<tr>
										<td><?php  echo $id;  ?></td>
										<td><?php  echo $odate;  ?></td>
										<td><?php  echo $fname;  ?></td>
										<td><?php  echo $rname;  ?></td>
										<td><?php  echo $cname;  ?></td>
										<td><?php  echo $cadd;  ?></td>
										<td><?php  echo $contact;  ?></td>
										<td><?php  echo $rating;  ?></td>
										<td><?php  echo $revdesc;  ?></td>
								
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
