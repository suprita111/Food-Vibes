<?php  include('partials/menu.php');  ?>

<!-- Main content section starts-->
	<div class="main-content">
		<div class="wrapper">
			<h1>DASHBOARD</h1>

			<br/><br/>
					<?php
							if(isset($_SESSION['login']))
							{
								echo $_SESSION['login']; //displaying session message
								unset($_SESSION['login']);//removing session message
							}
					?>

					<br/><br/>
		
					<?php
							if(isset($_SESSION['login']))
							{
								echo $_SESSION['login']; //displaying session message
								unset($_SESSION['login']);//removing session message
							}
					?>

					<br/><br/>
		

			<div class="col-4 text-center">

			<?php 
				
				$sql="SELECT * FROM food GROUP BY cuisine";
				//execute query

				$res=mysqli_query($conn,$sql);
				$count = mysqli_num_rows($res);


			?>



				<h1><?php  echo $count; ?></h1>
				<br/>
				Categories
			</div>

			<div class="col-4 text-center">


			<?php 
				
				$sql1="SELECT * FROM food";
				//execute query

				$res1=mysqli_query($conn,$sql1);
				$count1 = mysqli_num_rows($res1);


			?>



				<h1><?php  echo $count1; ?></h1>
				<br/>
				Foods
			</div>
	

			<div class="col-4 text-center">


			<?php 
				
				$sql2="SELECT * FROM res WHERE rid != 111";
				//execute query

				$res2=mysqli_query($conn,$sql2);
				$count2 = mysqli_num_rows($res2);


			?>



				<h1><?php  echo $count2; ?></h1>
				<br/>
				Restaurants
			</div>
	

			<div class="col-4 text-center">


			<?php 
				
				$sql3="SELECT * FROM food_res_tbl_order ";
				//execute query

				$res3=mysqli_query($conn,$sql3);
				$count3 = mysqli_num_rows($res3);


			?>



				<h1><?php  echo $count3; ?></h1>
				<br/>
				Orders
			</div>

			<div class="col-4 text-center">

			<?php

				//create sql query to generate Revenue
				//aggregate function in sql


				
				$sql4 = "SELECT  SUM(total) AS TOTAL FROM((((food_res_tbl_order INNER JOIN res ON food_res_tbl_order.rid=res.rid) INNER
					JOIN food ON food_res_tbl_order.fid=food.fid)INNER
					JOIN tbl_order ON food_res_tbl_order.oid=tbl_order.oid) INNER
					JOIN cus ON tbl_order.cid=cus.cid) WHERE order_status = 'Delivered'" ;

				//execute the query
				$res4 = mysqli_query($conn , $sql4);

				$row4 = mysqli_fetch_assoc($res4);

				//get the total Revenue

				$total_revenue = $row4['TOTAL'];

			?>



				<h1><?php echo "$total_revenue";  ?></h1>
				<br/>
				Revenue Generated
			</div>

		<div class="clearfix"></div>
		</div>

	</div>
<!-- Main content  section ends-->


<?php include('partials/footer.php'); ?>