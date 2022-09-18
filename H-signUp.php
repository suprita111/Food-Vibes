<?php
session_start();
if(isset($_SESSION[' ']) )
{
	header("location:I-Login.php");
}
else{
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=IM+Fell+Great+Primer&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleSignUp.css">


</head>
<body>



    <div class="wrap">
        <h2>Sign Up</h2>
        

        <form action="sign-up.php" method="POST">
            <input type="text" name="fname" placeholder="First Name..." required>
            <input type="text" name="username" placeholder="User Name..." required>
            <input type="tel" name="number" placeholder="Phone Number..." required>
            <input type="text" name="mail" placeholder="email id..." required>
            <input type="text" name="add" placeholder="Address..." required>
            <input type="password" name="pass" placeholder="password..." required>
            <input type="submit" value="Create Account">
            <p>
                By clicking 'Create Account' you agree to Food Vibes's <a href="#">Condition of use</a> and <a href="#">Privacy notice</a>
                <br><br>Already have an account? <a href="I-Login.php">Log in here</a>
            </p>
        </form>
    </div>
</body>
</html>
<?php
}
?>