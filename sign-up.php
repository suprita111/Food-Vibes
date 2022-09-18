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
$firstun = $_POST['fname'];
$userun = $_POST['username'];
$phnum = $_POST['number'];
$email = $_POST['mail'];
$add = $_POST['add'];
$passwd = $_POST['pass'];


$sql = "SELECT cemail , password ,usname FROM cus WHERE cemail = '$email ' and password = '$passwd '";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
if ($count == 1)
{
	echo "Not Valid";
	header("location:H-signUp.php");

}

else {

$sql = "INSERT INTO cus (cname,usname,ccontact,cemail,cadd,password) VALUES ('$firstun','$userun','$phnum','$email','$add','$passwd')";
}


if ($conn->query($sql) === TRUE) 
{
  //echo "Record inserted successfully";
  			
  header("location:I-Login.php");


} 
else 
{
  echo "Failed to insert record. " . $conn->error;
}

$conn->close();

?>