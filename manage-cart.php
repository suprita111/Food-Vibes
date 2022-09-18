<?php

session_start();
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

<?php

		if(is_NULL($_SESSION["cart_item"]))
		{
			unset($_SESSION['resid']);
			
		}


			$fid = $_POST['fid'];
			$rid = $_POST['rid'];
			$fname = $_POST['food'];
			$rname = $_POST['rname'];
			$price = $_POST['price'];
			$rating = $_POST['rating'];
			$qty = $_POST['qty'];

	if(is_NULL($_SESSION['resid']))
	{
		
		$_SESSION['resid']=$rid;
	}
		if(($_SESSION['resid'])==$rid)
		{
			
					
			

					$item = array($fname,$rname,$price,$rating,$qty,$fid,$rid);

					$fr=$fid.$rid;
	
					$_SESSION["cart_item"][$fr]=$item;
	
					header('location:food-cart.php');

		}
		else 
		{
			$_SESSION['reminder']="You can't add foods from different restaurants at a time!!!";
			header('location:food-cart.php');
		}

	
		
	
	
	
?>