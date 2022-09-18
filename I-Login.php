<?php
session_start();
if(isset($_SESSION['cemail']) && isset($_SESSION['usname']))
{
	header("location:B-Index.php");
}
else{
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> log in </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=IM+Fell+Great+Primer&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="wrap">
        <h2>Log In</h2>


        <?php  

					

					if(isset($_SESSION['update']))
					{
						echo $_SESSION['update']; //displaying session message
						unset($_SESSION['update']);//removing session message
					}



			?>
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder=" email ..." required>
            <input type="password" name="passwd" placeholder="password..." required>
            <input type="submit" value="Log In">
            <p>
                <a href="#">Forgot Password ?</a>
                <br><br>Don't have an account? <a href="H-signUp.php">sign up here</a>
            </p>
        </form>
    </div>
</body>
</html>
<?php
}
?>