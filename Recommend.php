
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

<!-- Food Search section starts here-->
    <section class="food-search text-center">
        <div class="container">
        </div>
    </section>
    <!-- Food Search section ends here-->


	 <!--  Food Menu section starts here-->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center food-menu ">Best rated Restaurant's for you</h2>

              <?php

                    $sql ="SELECT * from res WHERE rid !=111 AND rating >= 4.5";
					$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								
								$rid=$rows['rid'];
                                $rname=$rows['rname'];
                                $rating=$rows['rating'];

				         ?>

                                 <div class="Resturant-box">
                            <div class=" food-menu-img">
                                <img src=" images/menu-momos.png" alt="Momos" class=" img-responsive  img-curve ">
                            </div>
                 
                                <div class=" Resturant-desc">
                                    <h4 class="text-red"><?php echo $rname;  ?></h4>
                                    <br>

                                     <a href="P-RestaurantMenu.php?id=<?php  echo$rid;   ?>"  class=" btn btn-primary "> Explore More</a>

                            </div>
                        </div>


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
            <a href="M-Resturant.php"> See All Restaurants </a>
        </p>
    </section>

    <!--  Food Menu section ends here-->






<?php include  ('partials-front/footer.php');  ?>