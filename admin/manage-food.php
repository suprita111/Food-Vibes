<?php  include('partials/menu.php');  ?>

<div class="main-content">
	<div class="wrapper">
		<h1>All Foods</h1>

			<br/><br/><br/>

			<table class="tbl-full-food">
					<tr>
						<th>Food_id</th>
						<th>Food_Name</th>
						<th>Category</th>
						<th>Serve_time</th>
						<th>Food_type</th>
						<th>Food_desc</th>
						<th>Food_img</th>
					</tr>


					<?php 
					
					$sql = "SELECT * FROM food";     //here food is food table in the database
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['fid'];
								$name=$rows['fname'];
								$category=$rows['cuisine'];
								$serve_time=$rows['serve_time'];
								$ftype=$rows['ftype'];
								$fdesc=$rows['fdesc'];
								$fimg=$rows['fimg'] ;

								?>
									<tr>
										<td><?php  echo $id;  ?></td>
										<td><?php  echo $name;  ?></td>
										<td><?php  echo $category;  ?></td>
										<td><?php  echo $serve_time;  ?></td>
										<td><?php  echo $ftype;  ?></td>
										<td><?php  echo $fdesc;  ?></td>
										<td>
												<?php  
															?>
															<img src="../images/<?php echo $fimg; ?>" width="100px">
															<?php
												?>
										</td>
									</tr>


								<?php
							}
						}
						else 
						{

						}
					}

					//echo "<img src=$fimg width = '20%'  height='30%'>" ;
					?>

			
				</table>


	</div>
</div>

<?php  include('partials/footer.php');  ?>
