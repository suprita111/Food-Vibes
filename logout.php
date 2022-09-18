<?php

//start session
session_start();

?>


<?php 

	//destroy all  the session

		session_destroy();

	//redirect to login page
		header("location:A-Welcome.php");

?>