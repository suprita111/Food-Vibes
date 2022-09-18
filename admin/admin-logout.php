<?php  include("../connect/database.php"); ?>

<?php 

	//destroy all  the session

		session_destroy();//unset $_SESSION['user']

	//redirect to login page
		header("location:index.php");

?>