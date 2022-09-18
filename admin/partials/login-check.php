<?php

	//check whether the user is logged in not
	if(!isset($_SESSION['user']))	//checking if user session is not set
	{
		$_SESSION['warning'] = "Please login to access the admin panel";
		header("location:index.php");
	}

?>