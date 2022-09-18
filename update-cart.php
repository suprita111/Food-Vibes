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

	$fid = $_POST['fid'];
	$rid = $_POST['rid'];
	$fname = $_POST['fname'];
	$rname = $_POST['rname'];
	$price = $_POST['price'];
	$rating = $_POST['rating'];
	$qty = $_POST['qty'];
	$submit=$_POST['submit'];


	$item = array($fname,$rname,$price,$rating,$qty,$fid,$rid);

	$fr=$fid.$rid;
	if($submit == "Update")
	{
		
		$_SESSION["cart_item"][$fr] = $item;

	}


	else if($submit == "Remove")
	{
		unset($_SESSION["cart_item"][$fr]);
		
	}

	//$item = array($fname,$rname,$price,$rating,$qty);

	//$_SESSION['$fid']=$item;
	
	header('location:my-cart.php');



?>