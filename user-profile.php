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
?>



<?php

   //get the emailid of selected customer
					$email=$_SESSION['cemail'] ;
			//query to get the customer details
				$sql ="SELECT * FROM cus WHERE cemail='$email'";

			//execute the query
				$res = mysqli_query($conn,$sql);

			//check whether the query is executed ot not
				if($res==true)
				{
					
					//check whether the data is available or not
					$count = mysqli_num_rows($res);
					//check whether we have admin data or not
					if($count == 1)
					{
						$row=mysqli_fetch_assoc($res);
							$cid = $row['cid'];
							$full_name = $row['cname'];
							$username = $row['usname'];
							$contact = $row['ccontact'];
							$email = $row['cemail'];
							$address = $row['cadd'];
							$password = $row['password'];
					}
				
				}
				

			?>


		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> User Profile</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=IM+Fell+Great+Primer&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="styleSignUp.css">

		</head>
		<body>
						<div class="wrap">
							<h2>Your Details</h2>

							
							<form action="" method="POST">
								<h5><?php  echo $cid;  ?></h5>
								<input type="text" name="cname"  value="<?php echo $full_name;  ?>">
								<input type="text" name="username"  value="<?php echo $username;  ?>">
								<input type="text" name="number"  value="<?php echo $contact;  ?>">
								<input type="tel" name="mail"  value="<?php echo $email;  ?>">
								<input type="text" name="add"  value="<?php echo $address;  ?>">
								<input type="password" name="pass"  value="<?php echo $password;  ?>">
								<input type="hidden" name="id" value="<?php  echo $cid;  ?>">
								<input type="submit" name="submit" value="Save">

								<?php  
								if(isset($_SESSION['update']))
								{
									echo $_SESSION['update']; //displaying session message
									unset($_SESSION['update']);//removing session message
								}
							  ?>
           
							</form>
						</div>
		

			<?php 



				/*$email=$_SESSION['cemail'] ;
				echo $email;
					$sql1= "SELECT cid FROM cus WHERE cemail='$email'";
					$res = mysqli_query($conn,$sql1);
					if($res==TRUE)
					{
							$count = mysqli_num_rows($res);
							if($count == 1)
							{
									while($rows = mysqli_fetch_assoc($res))
									{
								
											$id = $rows['cid'];
											//echo $cid;
									}
						
							}
						
							else 
							{
									header("location:user-profile.php");
							}
					}*/
			//check whether the submit button is clicked or not

			if(isset($_POST['submit']))
			{
				//echo "Button clicked";
				//Get all the value from form to Update

						$cname = $_POST['cname'];
						$username = $_POST['username'];
						$contact = $_POST['number'];
						$email = $_POST['mail'];
						$address = $_POST['add'];
						$password = $_POST['pass'];
						
						//sql query to update in table
						$sql2 = "UPDATE cus SET 
						cid = '$cid'  ,
						cname='$cname' ,
						usname='$username ' ,
						ccontact='$contact' ,
						cemail= '$email ',
						cadd='$address ' ,
						password='$password'  WHERE  cemail='$email'
						";

						//$sql = "INSERT INTO admin(sname,role,semail,scontact,username,password,rid) VALUES('xyz','xyx','xyx@gmail.com',12345,'ffsfssf','hghfhf',111)";

						$res = mysqli_query($conn , $sql2);

						//echo $rid;
						if ($res == true)
						{
							$_SESSION[ 'update' ] = "Your details are  updated successfully";
							header("location:user-profile.php");

						}
						

			}

	?>

 



