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

<?php  include('partials-front/cartheader.php '); ?>

<?php  

					

					if(isset($_SESSION['reminder']))
					{
						echo $_SESSION['reminder']; //displaying session message
						unset($_SESSION['reminder']);//removing session message
					}



			?>


	
<div class="row">
		<?php



				$sql1= "SELECT  * FROM res" ;
				
				$res1=mysqli_query($conn,$sql1);
							//count the rows

				$count= mysqli_num_rows($res1);
		
					
				if($count>1)
				{
					//detauls available
					$row=mysqli_fetch_assoc($res1);
					$rname=$row['rname'];
					$rid=$row['rid'];
				}
				else	
				{
					echo "error";
				}

				?>
			
					<form action="" method="POST">

								<table class="table">
					
					
									<tr>
										<td>Restaurant</td>
										<td>
											<select name="rname">
												<option <?php if($rname=="The Second Wife") { echo "selected";}?> value="The Second Wife">The Second Wife</option>
												<option <?php if($rname=="Sinclairs") { echo "selected";}?> value="Sinclairs">Sinclairs</option>
												<option <?php if($rname=="Coffee House") { echo "selected";}?> value="Coffee House">Coffee House</option>
												<option <?php if($rname=="Main Street Cafe and Restaurant") { echo "selected";}?> value="Main Street Cafe and Restaurant">Main Street Cafe and Restaurant</option>
												<option <?php if($rname=="Domino''s Pizza") { echo "selected";}?> value="Domino''s Pizza">Domino''s Pizza</option>
												<option <?php if($rname=="Mio Amore") { echo "selected";}?> value="Mio Amore">Mio Amore</option>
												<option <?php if($rname=="ANYTIME Restaurant") { echo "selected";}?> value="ANYTIME Restaurant">ANYTIME Restaurant</option>
												<option <?php if($rname=="Canteen Restaurant") { echo "selected";}?> value="Canteen Restaurant">Canteen Restaurant</option>
												<option <?php if($rname=="Just Baked") { echo "selected";}?> value="Just Baked">Just Baked</option>
												<option <?php if($rname=="Food Street") { echo "selected";}?> value="Food Street">Food Street</option>
											</select>
										</td>
										<td><input type="submit" name="submit" value="🔍" class="btn-secondary"></td>
									</tr>

									<tr>
											<td colspan="2">
												
													<input type="hidden" name="rid" value="<?php  echo $row['rid'];  ?>">
											</td>
									</tr>

								</table>

					</form>

				<?php


				if(isset($_POST['submit']))
				{
					//get the restaurant name from form
						$rname = $_POST['rname'];
					/*	if(isset($_SESSION['rid']))
						{
							
						}
						else
						{
							$_SESSION['rid']=$_POST['rid'];
							$_SESSION['rname']=$rname;
						}*/
						
						
						
						if(isset($rname))
						{

							
								$sql = "SELECT  food_res.fid,res.rid,rating,fname,fimg,rname, price,fstatus FROM(( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
											JOIN food ON food_res.fid=food.fid)WHERE rname='$rname' ORDER By food_res.fid ASC " ;

								$res = mysqli_query($conn,$sql);
											if($res == TRUE)
											{
												$count = mysqli_num_rows($res);
												if($count>0)
												{
													while($rows = mysqli_fetch_array($res))
													{
										

														?>
										
																<div class="col-lg-3 col-md-3 col-sm-12">
												
																	<form action="manage-cart.php" method="post">
																		<div class="card">
																			<h6 class="card-title bg-info text-white p-2 text-uppercase"><?php  echo $rows['fname']  ?></h6>
																			<div class="card-body text-center">

																					<?php  
																					?>
																							<img src="images/<?php echo $rows['fimg'];?>"  class="img-fluid mb-2">
																							<h6><?php echo $rows['rname'];   ?></h6>
																							<h6>  &#8377; <?php echo $rows['price'];   ?></h6>
																							<h6 class="badge badge-success"> <?php echo $rows['rating'];   ?></h6>
																							<input type="number" name="qty" class="input-responsive" placeholder="Quantity" value="1" required>
																							<input type="hidden" name="food" value="<?php  echo $rows['fname'];  ?>">
																							<input type="hidden" name="rname" value="<?php echo $rows['rname'];   ?>">
																							<input type="hidden" name="price" value="<?php echo $rows['price'];   ?>">
																							<input type="hidden" name="rating" value="<?php echo $rows['rating'];   ?>">
																							<input type="hidden" name="fid" value="<?php  echo $rows['fid'];  ?>">
																							<input type="hidden" name="rid" value="<?php  echo $rows['rid'];  ?>">
																			
																			
                                             
																					<?php
																					?>
																	
																			</div>
																			<div class"btn-group d-flex">
															
																					<input type="submit" name="submit" value ="Add to cart"class="btn btn-success flex-fill ">

																					<!--<input type="submit" name="submit" value ="Order Now"class="btn btn-warning flex-fill ">-->

																	
																	
																	


															
																			</div>
																		</div>
																	</form>
												
																</div>
																<br/><br/>

														<?php
													}
												}
											}
						}
				}

		?>
</div>

<?php  include('partials-front/cartfooter.php '); ?>