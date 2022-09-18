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





<?php  include('partials-front/header.php '); ?>

    <!-- Food Search section starts here-->
    <section class="food-search text-center">
        <div class="container">
            <form action="N-Restaurant-food.php" method="POST">

                <input type="search" name="search" placeholder="search for food.." required>
                <input type="submit" name="submit" value="search" class="btn btn-primary">

            </form>
        </div>
    </section>
    <!-- Food Search section ends here-->


    <!--  Categories section starts here-->

  
				
    <section class="Categories text-center ">
        <div class="container">
            <h2 class="text-center Categories ">Eat What Makes You Happy </h2>

            <?php 

   $sql2 = "SELECT fid,fname,cuisine,fimg FROM food GROUP BY cuisine LIMIT 3";
            $res=mysqli_query($conn,$sql2);
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
								  $fimg = $rows['fimg'];

                                    
				
			                      ?>
                                            <div class="box-3 float-container">
                                                    <?php  
														?>
															  <img src="images/<?php echo $fimg;?>"   class=" img-responsive  img-curve ">
                                                              

														 <?php

													?>
                                            </div>
                                            <a href="category-food.php?category=<?php  echo$category;   ?>"><h3 class="text-black text-left clearfix"><?php echo $category; ?></h3></a>
                          <?php
                         }
                 }
            }

?>

                <!--<div class="box-3 float-container">

                        <img src="images/menu-dosa.jpg" alt="Indian" class="img-responsive  img-curve">
                  <a href=" N-Resturant-Food.php"><h3 class="float-text text-white">Indian</h3></a>
                   
                </div>
            

            
                <div class="box-3 float-container">

                    <img src="images/chocolava.jpg" alt="Dessert" class="img-responsive  img-curve">
                   <a href=" N-Resturant-Food.php"> <h3 class="float-text text-black ">Dessert</h3></a>

                </div>
           

           
                <div class="box-3 float-container">

                    <img src="images/vchow.jpg" alt="chinese" class="img-responsive  img-curve">
                   <a href=" N-Resturant-Food.php"> <h3 class="float-text text-black ">chinese</h3></a>

                </div>-->
            
            <div class="clearfix"></div>

        </div>
    </section>
    <!-- Categories section ends here-->


    <!--  Food Menu section starts here-->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center food-menu "> Food Menu</h2>

              <?php

                    $sql ="SELECT * FROM (( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid) WHERE fstatus='Available' LIMIT 6";
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id=$rows['fid'];
								$rid=$rows['rid'];
                                $rname=$rows['rname'];
                                $rating=$rows['rating'];
								$name=$rows['fname'];
								$category=$rows['cuisine'];
								$serve_time=$rows['serve_time'];
								$ftype=$rows['ftype'];
								$fdesc=$rows['fdesc'];
								$fimg=$rows['fimg'];
								$fprice=$rows['price'];
								$fstatus=$rows['fstatus'];
                                $_SESSION['rid'] = $rows['rid'];
                               

				         ?>

                         <form action="manage-cart.php" method="post">
                                <div class="food-menu-box">
                                    <div class=" food-menu-img">
                                    <?php  
				                        ?>
                                              <img src="images/<?php echo $fimg;?>"   class=" img-responsive  img-curve ">
                                         <?php
				                    ?>
                                    </div>

                                    <div class=" food-menu-desc">
                                      <a href="P-RestaurantMenu.php?id=<?php  echo$rid;   ?>"><h4 class="text-red"><?php  echo $rname;  ?></h4></a>
                                        <h5><?php  echo $name;  ?></h5>
                                        <p class=" food-price"><?php  echo 'Rs.'.$fprice;  ?></p>
                                        <p class=" food-detail">
                                           <?php  echo $fdesc;  ?>
                                      </p>
                                    <input type="number" name="qty" class="input-responsive" placeholder="Quantity" value="1" required>
				                    <input type="hidden" name="food" value="<?php  echo $name;  ?>">
				                    <input type="hidden" name="rname" value="<?php echo $rname;   ?>">
				                    <input type="hidden" name="price" value="<?php echo $fprice;   ?>">
				                    <input type="hidden" name="rating" value="<?php echo $rating;   ?>">
                                    <input type="hidden" name="fid" value="<?php  echo $id;  ?>">
								    <input type="hidden" name="rid" value="<?php  echo $rid;  ?>">
																			
                                   <br>

                                      <!--  <a href="manage-cart.php" class=" btn btn-primary ">Add to cart</a>-->
                                        <input type="submit" name="submit" value ="Add to cart" class="btn btn-primary" >
                  
                                    </div>


                                </div>
                         </form>

                        <?php
                    }
                  }
                }
                else
                {
                    //echo "<div class="error">Restaurant not dipslayed</div>";
                }


            ?>



            <div class=" clearfix "></div>

        </div>

        <p class=" text-center ">
            <a href=" D-Food-Menu.php"> See All Foods </a>
        </p>
    </section>

    <!--  Food Menu section ends here-->


   <?php  include('partials-front/footer.php'); ?>