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

            <form action="N-Restaurant-Food.php" method="POST">

                <input type="search" name="search" placeholder="search for food.." required>
                <input type="submit" name="submit" value="search" class="btn btn-primary">

            </form>
        </div>
    </section>
    <!-- Food Search section ends here-->



    <!--  Food Menu section starts here-->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center food-menu "> Food Menu</h2>



             <?php

                //sql query to display categories from Database
              // $id =$_SESSION['rid'];
              
					/*$sql = "SELECT  price,fstatus,fname,cuisine,serve_time,ftype,fdesc,food_res.fid ,res.rid FROM(( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid) WHERE food_res.rid='$id'" ;*/

                    $sql ="SELECT * FROM (( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid) WHERE fstatus='Available'";
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
								$name=$rows['fname'];
								$category=$rows['cuisine'];
								$serve_time=$rows['serve_time'];
								$ftype=$rows['ftype'];
								$fdesc=$rows['fdesc'];
								$fimg=$rows['fimg'];
								$price=$rows['price'];
								$fstatus=$rows['fstatus'];
                                $rating=$rows['rating'];
                                $_SESSION['rid']=$rows['rid'];
                                

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
                                        <p class="food-price"><?php  echo 'Rs.'.$price;  ?></p>
                                        <p class="food-detail">
                                           <?php  echo $fdesc;  ?>
                                        </p>
                                         <input type="number" name="qty" class="input-responsive" placeholder="Quantity" value="1" required>
				                         <input type="hidden" name="food" value="<?php  echo $name;  ?>">
				                         <input type="hidden" name="rname" value="<?php echo $rname;   ?>">
				                         <input type="hidden" name="price" value="<?php echo $price;   ?>">
				                         <input type="hidden" name="rating" value="<?php echo $rating;   ?>">
                                         <input type="hidden" name="fid" value="<?php  echo $id;  ?>">
										 <input type="hidden" name="rid" value="<?php  echo $rid;  ?>">
                                        <br>

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
    </section>

    <!--  Food Menu section ends here-->



   <?php  include('partials-front/footer.php '); ?>