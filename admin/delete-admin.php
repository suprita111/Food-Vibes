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
		$sql = "DELETE FROM admin WHERE sid='$id'";

		$res = mysqli_query($conn , $sql);

		if($res == true)
		{
			//echo "Admin deleted";
			$_SESSION['delete'] = "Admin deleted";
			header("location:admin.php");
		}
		else
		{
			//	echo "Admin not deleted";
			$_SESSION['delete'] = "Admin not deleted";
			header("location:admin.php");
	
		}
	
?>