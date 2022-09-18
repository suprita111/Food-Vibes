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
        </div>
    </section>
    <!-- Food Search section ends here-->




 <!-- Categories section starts here-->

<section class="Categories text-center ">
        <div class="container">
            <h2 class="text-center Categories ">Eat What Makes You Happy </h2>
<?php 

   $sql2 = "SELECT fid,fname,cuisine,fimg FROM food GROUP BY cuisine";
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



            
            <div class="clearfix"></div>

        </div>
    </section>
    <!-- Categories section ends here-->


<?php  include('partials-front/footer.php '); ?>