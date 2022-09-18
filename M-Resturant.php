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
           <!-- <form action="P-RestaurantMenu.php" method="POST">

                <input type="search" name="search" placeholder="search by resturant.." required>
                <input type="submit" name="submit" value="search" class="btn btn-primary">

            </form>-->
        </div>
    </section>
    <!-- Food Search section ends here-->


    <!--  Resturant section starts here-->
    <section class="Resturant">
        <div class="container">
            <h2 class="text-center Resturant  "> Search by Resturant....</h2>

            <?php

                //sql query to display categories from Database
                $sql = "SELECT * from res WHERE rid !=111";
                $res = mysqli_query($conn,$sql);

                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['rid'];
                        $rname = $row['rname'];
                        $radd = $row['radd'];
                        ?>

                        <div class="Resturant-box">
                            <div class=" food-menu-img">
                                <img src=" images/menu-momos.png" alt="Momos" class=" img-responsive  img-curve ">
                            </div>
                 
                                <div class=" Resturant-desc">
                                    <h4 class="text-red"><?php echo $rname;  ?></h4>
                                    <br>

                                     <a href="P-RestaurantMenu.php?id=<?php  echo$id;   ?>"  class=" btn btn-primary "> Explore More</a>

                            </div>
                        </div>


                        <?php
                    }
                }
                else
                {
                    //echo "<div class="error">Restaurant not dipslayed</div>";
                }


            ?>

            
          

                </div>
            </div>


            <div class=" clearfix "></div>

        </div>


    </section>

    <!--  Resturant section ends here-->


  <?php include  ('partials-front/footer.php');  ?>