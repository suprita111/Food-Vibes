<?php
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
$un = $_POST['email'];
$pw = $_POST['passwd'];

$sql = "SELECT * FROM cus WHERE cemail = '$un' AND password = '$pw'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$email = $row['cemail'];
	$name = $row['usname'];
	$cid = $row['cid'];
	}

if($success == true)
{	
	session_start();
	$_SESSION['usname'] = $name;
	$_SESSION['cemail'] = $email;
	$_SESSION['cid'] = $cid;

	header("location:B-Index.php");
}

else
	{
		header("location:I-Login.php");
	}


$conn->close();
?>	
-------------------------------------------
/*if($count == 1)
{
	echo "Welcome $un";
}
else
{
	echo "Wrong username and password.";
}
$conn->close();
?>*/