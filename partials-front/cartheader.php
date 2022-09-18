<?php
    session_start();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Important to make website reaponsive -->
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  

    <script type ="text/javascript" >
        function togglemenu()
        {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</head>
<body class="container">
 <!--<section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="B-Index.php" title="Logo">
                    <img src=" images/fv1.png" alt="Resturant Logo" class=" img-responsive">
                </a>
      
            </div>
              </div>
    </section>-->
    <h1 class="text-center text-danger mb-5"
    style="font-family:'Abril Fatface',cursive; ">Food cart</h1>

    <div>
        <a href="my-cart.php" class="btn btn-warning col-lg-2">View CART</a>
        <a href="food-cart.php" class="btn btn-warning col-lg-2">Food Gallery</a>
        <a href="B-Index.php" class="btn btn-warning col-lg-2">Home</a>


    </div>
    <br/><br/>


   