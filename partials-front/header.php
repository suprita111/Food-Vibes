<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Important to make website reaponsive -->
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Food Order website</title>

    <!-- Links for the fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=IM+Fell+Great+Primer&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Link our CSS file -->
    <link rel="stylesheet" type="text/css" href="CSS/Style1.css">

    <script type ="text/javascript" >
        function togglemenu()
        {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</head>
<body>


    <!-- Navbar section starts here-->


    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="B-Index.php" title="Logo">
                    <img src=" images/fv1.png" alt="Resturant Logo" class=" img-responsive">
                </a>
      
            </div>

       <div class="container text-center">
            <h2> Welcome  <?php  if(isset($_SESSION['usname'])) {echo  $_SESSION['usname'] ;} else { echo 'Guest'; }  ?>  </h2>
            </div>


            <!--Toggle menu starts-->

            <div id="sidebar" onclick="togglemenu()">
                <div class=" toggle-btn ">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            
                <ul>
                    <li>
                        <a href="D-Food-Menu.php ">Food</a>
                    </li>

                    <li>
                        <a href="user-profile.php ">User Profile</a>
                    </li>

                    <li>
                        <a href="feedback.php">Feedback</a>
                    </li>
                    <li>
                        <a href="logout.php">Log Out</a>
                       
                    </li
                </ul>
            </div>

            <!--Toggle menu ends-->

            <div class="Menu text-right">
                <ul>
                    <li>
                        <a href="B-Index.php">Home</a>
                    </li>

                    <li>
                        <a href="C-Explore.php">Explore</a>
                    </li>


                    <li>
                        <a href="L-AboutUs.php">About Us</a>
                    </li>

                    <li>
                        <a href="food-cart.php">Food Gallery</a>
                    </li>

                     <li>
                        <a href="my-cart.php">Cart</a>
                    </li>


                </ul>

            </div>
            <div class="clearfix"></div>
        </div>
    </section>



    <!-- Navbar section ends here-->