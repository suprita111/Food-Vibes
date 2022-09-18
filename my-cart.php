
<?php  include('partials-front/cartheader.php '); ?>
<h2 align="center"><?php  if(isset($_SESSION['usname'])) {echo  $_SESSION['usname'] ;}?>Your Cart Items</h2>

<table class="table">

	<thead>
		<tr>
			<th>Sno.</th>
			<th>Food</th>
			<th>Restaurant</th>
			<th>price</th>
			<th>rating</th>
			<th>qty.</th>
			<th>Total</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>

		
	</thead>
	<tbody>
		
	<?php


		$total=0;
		$sno=1;
		
		


		if(isset($_SESSION["cart_item"]))
		{
			$total_amount=0;
			$c=0;
				foreach($_SESSION["cart_item"] as $details)
				{
					
					

				//print_r($details);
						$p=0;
						$q=0;

						echo "<tr>";
								echo "<td>".($sno++)."</td>";	
								echo "<form action='update-cart.php' method='post'>";
								foreach($details as $key => $value)
								{
									if($key==6)
									{
										echo "<input type='hidden' name='rid'   value='".$value."'>";
										
									}
									if($key==5)
									{
										echo "<td><input type='hidden' name='fid'   value='".$value."'></td>";
										
									}
									if($key==4)
									{
										echo "<td><input type='text' name='qty'   value='".$value."'></td>";
										$q = $value;
									}
									else if ($key==3)
									{
										echo "<input type='hidden' name='rating' value='".$value."'>";
										echo "<td>".($value)."</td>";
									}
									else if ($key==2)
									{
										echo "<input type='hidden' name='price' value='".$value."'>";
										echo "<td>".($value)."</td>";
										$p = $value;
									}
									else if ($key==1)
									{
										echo "<input type='hidden' name='rname' value='".$value."'>";
										echo "<td>".($value)."</td>";
									}
									else if ($key==0)
									{
										echo "<input type='hidden' name='fname' value='".$value."'>";
										echo "<td>".($value)."</td>";
									}
									

								}
								$c++;
								$total = ($q * $p);
								$total_amount= ($total_amount + $total);
								echo "<td>".($total)."</td>";
								echo  "<td><input type='submit' name='submit' value ='Update'class='btn btn-warning'></td>";
								echo  "<td><input type='submit' name='submit' value ='Remove'class='btn btn-danger'></td>";
								echo "</form>";

						echo"</tr>";
					
			
				}

				//echo  "<td><input type='submit' name='submit' value ='Confirm Order'class='btn btn-success'></td>";
				echo "<td>Total Amount:</td>";
				echo "<td>$total_amount</td>";
				//echo $c;
				$_SESSION['total_amount']=$total_amount;
				$_SESSION['counter']=$c;
				if ($_SESSION['counter']==0) 
				{
					unset($_SESSION["cart_item"]);
					unset($_SESSION['total_amount']);
				}

		}
	?>

	<a href="E-Order.php" class=" btn btn-primary ">Proceed to Order</a>
	
	</tbody>



</table>