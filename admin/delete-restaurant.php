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

	//getting the admin to be deleted
		$id=$_GET['id'];
	//generate query to delete admin
		$sql = "DELETE FROM res WHERE rid='$id'";

		$res = mysqli_query($conn , $sql);

		if($res == true)
		{
			//echo "Admin deleted";
			$_SESSION['delete'] = "Restaurant deleted";
			header("location:manage-res.php");
		}
		else
		{
			//	echo "Admin not deleted";
			$_SESSION['delete'] = "Restaurant not deleted";
			header("location:manage-res.php");
	
		}
	
?>