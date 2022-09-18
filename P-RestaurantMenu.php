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

<?php
	$id=$_GET['id'];
	$sql="SELECT rname FROM res WHERE rid='$id'";
	$res = mysqli_query($conn,$sql);
					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$name=$rows['rname'];
							}
						}
					}

?>

<!--Food search section starts here-->
            <section class="food-search text-center">
                    <div class="container">
          
                    </div>
                </section>
<!--Food search section starts here-->


 <!-- Categories section starts here-->

<section class="Categories text-center ">
        <div class="container">
            <h2 class="text-center Categories ">
            <?php
                echo $name;
                echo "Menu";
            
            ?> </h2>
            <div class="clearfix"></div>

        </div>
</section>
    <!-- Categories section ends here-->

 <!--  Resturant section starts here-->
    <section class="Resturant">
        <div class="container">
           
        <?php

                //sql query to display categories from Database
                $sql ="SELECT  fstatus,fname,food_res.fid,fdesc,res.rid,rname,fimg,price,rating  FROM(( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid) WHERE food_res.rid='$id' " ;
                $res = mysqli_query($conn,$sql);

                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $rid = $row['rid'];
                        $fid = $row['fid'];
                        $fname=$row['fname'];
                        $rname = $row['rname'];
                        $fimg = $row['fimg'];
                        $price = $row['price'];
                        $fdesc=$row['fdesc'];
                        $rating=$row['rating'];
                        $_SESSION['rid'] =$row['rid'];

                        ?>

                        <form action="manage-cart.php" method="post">

                            <div class="Resturant-box">
                                <div class="food-menu-img">
                                   <?php  
				                        ?>
                                              <img src="images/<?php echo $fimg;?>"   class=" img-responsive  img-curve ">
                                         <?php
				                    ?>
                                     </div>
                 
                                    <div class=" Resturant-desc">
                                        <h4 class="text-red"><?php echo $fname;  ?></h4>
                                        <p class=" food-price"><?php  echo 'Rs.'.$price;  ?></p>
                                          <p class=" food-detail">
                                               <?php  echo $fdesc;  ?>
                                          </p>

                                        <input type="number" name="qty" class="input-responsive" placeholder="Quantity" value="1" required>
				                        <input type="hidden" name="food" value="<?php  echo $fname;  ?>">
				                        <input type="hidden" name="rname" value="<?php echo $rname;   ?>">
				                        <input type="hidden" name="price" value="<?php echo $price;   ?>">
				                        <input type="hidden" name="rating" value="<?php echo $rating;   ?>">
                                        <input type="hidden" name="fid" value="<?php  echo $fid;  ?>">
										<input type="hidden" name="rid" value="<?php  echo $rid;  ?>">

                                        <br>
                                         <input type="submit" name="submit" value ="Add to cart" class="btn btn-primary" >
                                </div>
                            </div>

                        </form>
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