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

<?php
    
	/*if(isset($_GET['fid']))
    {
            $rid=$_SESSION['rid'];
            $fid=$_GET['fid'];
            $sql ="SELECT  * FROM(( food_res INNER JOIN res ON food_res.rid=res.rid) INNER
					JOIN food ON food_res.fid=food.fid)  WHERE food_res.rid='$rid' AND food_res.fid='$fid'";
                    $res = mysqli_query($conn , $sql);
                    if($res == TRUE)
					{
						$count = mysqli_num_rows($res);
						if($count>0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								
								$rid=$rows['rid'];
                                $rname=$rows['rname'];
                                $name=$rows['fname'];
								$fimg=$rows['fimg'];
                                $price=$rows['price'];
                            }
                        }*/

                        $email=$_SESSION['cemail'] ;
						echo $email;
						if(isset($_SESSION['cemail'] ))
						{
								$sql1="SELECT * FROM cus WHERE cemail='$email'";
								$res1 = mysqli_query($conn , $sql1);
								if($res1 == TRUE)
								{
									$count1 = mysqli_num_rows($res1);
									if($count1>0)
									{
										while($rows1 = mysqli_fetch_assoc($res1))
										{
											$cid=$rows1['cid'];
											$cname=$rows1['cname'];
											$contact=$rows1['ccontact'];
											$email=$rows1['cemail'];
											$add=$rows1['cadd'];
										}
                               
									}
						}		 }
						else
						{
							  $_SESSION['update'] = "please login before placing order!!!";
								header("location:I-Login.php");
						}
                   // }
   // }
 ?>



    <!-- Food Order section starts here-->
    <section class="food-order text-center">
        <div class="container">
            <h2 class=" text-center  text-black"> Your Delivery Address Details </h2>

            <form action=" " method="POST" class=" order">
                <fieldset>
                    <legend><b> Delivery Details </b></legend>
                    <div class="order-label "><b>Customer name</b></div>
                     <p class="food-price"><?php  echo $cname;?></p>
                    

                    <div class="order-label "><b>Contact</b></div>
                    <p class="food-price"><?php  echo $contact;?></p>
                   

                    <div class="order-label "><b>Email id</b></div>
                    <p class="food-price"><?php  echo $email;?></p>
                 
                    <div class="order-label "><b>Address</b></div>
                    <input type="text" name="add"  class=" input-responsive " value="<?php echo $add;  ?>">

					
                    <input type="submit" name="submit" value="confirm Order" class="btn btn-primary"><br/>

                </fieldset>
				 
				<a href="order-bill.php" class=" btn btn-primary ">View Bill</a>

				 
            </form>
        </div>
    </section>

    <!-- Food Order section ends here-->


   <?php

       if(isset($_POST['submit']))
	   {
				//echo "Button clicked";
				//Get all the value from form to Update
						 
						
                        // $qty = $_POST['qty'];
                        // $fname = $_POST['fname'];
                        // $price = $_POST['price'];
                        // $remarks = $_POST['remarks'];
                        // $total = $price * $qty;
                         $date_time =date("Y-m-d h:i:sa");
                        $status="ordered";
						$add=$_POST['add'];
						
						//sql query to update in table
						$sql2 = "UPDATE cus SET 
						cadd='$add' 
						WHERE cemail='$email'
						";

						$res2 = mysqli_query($conn , $sql2);
						if ($res2 == TRUE)
						{

							 $sql3="SELECT * FROM cus WHERE cemail='$email'";
								$res3 = mysqli_query($conn , $sql3);
									if($res3 == TRUE)
									{
										$count3 = mysqli_num_rows($res3);
										if($count3>0)
										{
											while($rows3 = mysqli_fetch_assoc($res3))
											{
												$cid =$rows3['cid'];
												$cname=$rows3['cname'];
												$contact=$rows3['ccontact'];
								    
											}
										 }
											else
											{
												echo "error";
											}
									}
						}


						if(isset($_SESSION['total_amount']))
						{
							$total=$_SESSION['total_amount'];

							$sql4="INSERT INTO tbl_order(odate,total,cid) VALUES ('$date_time' ,'$total' , '$cid')";
							if ($conn->query($sql4) == TRUE) 
							{
						
									$sql6 ="SELECT oid,cid  FROM tbl_order WHERE odate='$date_time'";
										$res6 = mysqli_query($conn , $sql6);
										if($res6 == TRUE)
										{
											$counts = mysqli_num_rows($res6);
											if($counts == 1)
											{
												$rows6 = mysqli_fetch_assoc($res6);
												$oid = $rows6['oid'];
												$_SESSION['oid']=$rows6['oid'];
											}
										}
										else 
										{
											header("location:E-Order.php");
										}
							}
						}
						

						$c=0;
						if(isset($_SESSION['counter']))
						{

							$counter=$_SESSION['counter'];

							foreach($_SESSION["cart_item"] as $details)
							{
								foreach($details as $key => $value)
								{
									if($key==4)
									{
										$qty=$value;
									}
									if($key==5)
									{
										$fid=$value;
									}
									if($key==6)
									{
										$rid=$value;
									}
								
									
								}

								
								


								$sql5="INSERT INTO food_res_tbl_order(fid,rid,oid,qty,order_status) VALUES ('$fid' , '$rid' , '$oid', '$qty' , 'ordered')";
								$res5 = mysqli_query($conn , $sql5);
								$c++;
								
							}

						}

						
						

						if($c==$counter)
						{

							
							$_SESSION['success'] = "Food ordered successfully";
							//header("location:order-bill.php");
								
						}
				
			 
						else 
						{
				
				            
							echo  $conn->error;
							// header("location:add-food.php");
							//"Failed to order. " .
						}
			           
							
						
		}

?>

    <?php  include('partials-front/footer.php '); ?>