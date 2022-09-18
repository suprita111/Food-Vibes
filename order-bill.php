<?php


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

<?php include  ('partials-front/header.php');  ?>





 <section class="food-menu">
        <div class="container">
            <h2 class="text-center food-menu ">Your Bill</h2>

			<?php  

					

					if(isset($_SESSION['success']))
					{
						echo $_SESSION['success']; //displaying session message
						unset($_SESSION['success']);//removing session message
					}



			?>
             
			<table class="table-full">
					<tr>
						<!--<th>order_id</th>-->
						<th>food_id</th>
						<th>res_id</th>
						<!--<th>Customer</th>-->
						<th>Food</th>
						<th>Restaurant</th>
						<th>Price</th>
						<th>qty</th>
						<th>Total</th>
						
						
					</tr>


					<?php 
					
					
						 if(isset($_SESSION['oid']))
						{
									$id = $_SESSION['oid'];
									echo "Order_id:";
									echo $id;

									$sql =  "SELECT  fname,rname,cname,cadd,ccontact,odate,qty,price,total,food_res_tbl_order.oid,food_res_tbl_order.rid,food_res_tbl_order.fid ,order_status FROM(((((food_res_tbl_order INNER JOIN res ON food_res_tbl_order.rid=res.rid) INNER
									JOIN food ON food_res_tbl_order.fid=food.fid)INNER
									JOIN tbl_order ON food_res_tbl_order.oid=tbl_order.oid) INNER
									JOIN cus ON tbl_order.cid=cus.cid)INNER
									JOIN food_res ON food_res_tbl_order.fid=food_res.fid AND food_res_tbl_order.rid=food_res.rid) WHERE food_res_tbl_order.oid='$id'" ;
									$res = mysqli_query($conn,$sql);
									if($res == TRUE)
									{
										$count = mysqli_num_rows($res);
										if($count>=1)
										{
											while($rows = mysqli_fetch_assoc($res))
											{
												$oid=$rows['oid'];
												$rid=$rows['rid'];
												$fid=$rows['fid'];
												$cname=$rows['cname'];
												$fname=$rows['fname'];
												$rname=$rows['rname'];
												$price=$rows['price'];
												$qty=$rows['qty'];
												$total=$rows['total'];
								
								

												?>
													<tr>
														<!--<td><?php  echo $oid;  ?></td>-->
														<td><?php  echo $fid;  ?></td>
														<td><?php  echo $rid;  ?></td>
														<!--<td><?php  echo $cname;  ?></td>-->
														<td><?php  echo $fname;  ?></td>
														<td><?php  echo $rname;  ?></td>
														<td><?php  echo $price;  ?></td>
														<td><?php  echo $qty;  ?></td>
														<td><?php  echo $qty*$price;  ?></td>
										
													</tr>


												<?php
											}
										}
										else 
										{

										}
										echo "Total Amount:";
										echo "$total"; 

										echo "Customer:";
										echo "$cname"; 

									}
						}

					?>

			</table>


            

        </div>
    </section>

   



<?php include  ('partials-front/footer.php');  ?>