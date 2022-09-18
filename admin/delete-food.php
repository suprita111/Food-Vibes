<?php  

	//start session
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

	//getting the food to be deleted
		$id=$_GET['id'];
	//generate query to delete food
	
		$sql = "DELETE FROM food_res WHERE fid='$id'";

		$res = mysqli_query($conn , $sql);

		if($res == true)
		{
			//echo "Food deleted";
			$sql1="DELETE FROM food WHERE fid='$id'";
			$res1 = mysqli_query($conn, $sql1);
			if($res1==TRUE)
			{
					$_SESSION['delete'] = "Food deleted";
					header("location:res-food.php");
			}
		}
		else
		{
			//	echo "Food not deleted";
			$_SESSION['delete'] = "Food not deleted";
			header("location:res-food.php");
	
		}
	
?>