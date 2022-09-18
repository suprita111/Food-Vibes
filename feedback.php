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



<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Feedback </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=IM+Fell+Great+Primer&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9b09828476.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/feedback.css">
		<link rel="stylesheet" href="CSS/Style1.css">
    </head>
    <body>
        <div class="wrap">
            <h1>Feedback</h1>
            <form action="" method="post">
                <input type="text" name="oid" placeholder="Enter order id" required>
                <input type="text" name="rid" placeholder="Enter restaurant id" required>
                 <input type="text" name="fid" placeholder="Enter food id" required>
                <h2>Please rate our service</h2>
                <div class="rating">
                   <div>
                       <i class="far fa-frown"></i><br>
                       <input type="radio" name="rating" value="1">Very bad
                   </div>
                    <div>
                      <i class="far fa-meh"></i><br>
                      <input type="radio" name="rating" value="2">Bad
                    </div>
                    <div>
                       <i class="far fa-smile"></i><br>
                       <input type="radio" name="rating" value="3">Okay
                   </div>
                   <div>
                       <i class="far fa-grin-beam"></i><br>
                       <input type="radio" name="rating" value="4">Good
                   </div>
                   <div>
                       <i class="far fa-grin-hearts"></i><br>
                       <input type="radio" name="rating" value="5">Loved it
                    </div>
                </div>
                <h2>Your suggestion is important to us</h2>
                <textarea name="desc" rows="8" cols="40"></textarea><br>
                <input type="submit" name="submit" value="Submit Feedback">
                <?php  
					if(isset($_SESSION['success']))
					{
						echo $_SESSION['success']; //displaying session message
						unset($_SESSION['success']);//removing session message
					}
                  ?>
            </form>
        </div>
    </body>
</html>


<?php

    //check whether the submit button is clicked or not

			if (isset($_POST['submit']) )
			{
			//Get the data from form
				$oid = $_POST['oid'];
				$rid= $_POST['rid'];
				$fid = $_POST['fid'];
				$fdesc= $_POST['desc'];
				$active = $_POST['rating'];
			
				//$id =$_SESSION['rid'];
				//$fid=$_GET['id'];
				//sql query to update in table food

						$sql = "INSERT INTO review (revdesc,revrating,oid,rid,fid) VALUES ('$fdesc','$active' , '$oid' , '$rid' , '$fid')";
						$res = mysqli_query($conn , $sql);

						//echo $rid;
						if ($res == true)
						{
                            $_SESSION[ 'success' ] = "Thanks for your feedback!!!!";
							header("location:feedback.php");
					    }
             }
                       
	?>
	<?php  include('partials-front/footer.php'); ?>


