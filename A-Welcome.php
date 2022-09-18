<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Welcome page </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=IM+Fell+Great+Primer&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styleWelcome.css">
        
    </head>
    <body>
           <section class="banner">
            <div class="navbar">
                <img src="images/fv1.png" class="logo">
                <ul>
                    <li><a href="B-Index.php">Home</a></li>
                    <li><a href="C-Explore.php">Explore</a></li>
                    <li><a href="L-AboutUs.php">About Us</a></li>
                </ul>
            </div>
            <div class="content">
                <h1>Food Vibes</h1>
                <h2>Where Food Matches Mood</h2>
                <p>
                 <a href="H-signUp.php"> <button type="button"><span></span>
                     <p>Want to join our family?<br>SIGN UP</p></button></a>
                <a href="I-Login.php"><button type="button"><span></span><p>Already a member?<br>LOG IN</p></button></a>
            </div>
            <div class="search-box">
                 <form  action="N-Restaurant-Food.php" method="POST">
                     <input type="search" name="search"  class="dish" placeholder="search by dishes ,cuisines...">
                    <input type="submit" name="submit" value="🔍"  class="search-btn" type="button">

                 </form>
            </div>
            </section>
            <section class="menu">
                <p class="des1"><font size="50px" color="salmon"><b>&ldquo;</b></font> Food for us comes from our relatives. Wheather they have <br><br>&ensp; wings or fins or roots.
                    <br><br>&ensp;That is how we consider food. <br><br>&ensp;Food has a culture. Food has a history.
                    <br>&ensp;It has a story. It has relationships.<font size="50px" color="salmon"><b>&rdquo;</b></font>
                </p>
            <div class="lnk1"><a href="C-Explore.php">
                 <button type="button"><span></span><p>Let's dig in...</p></button></a>
            </div>
            </section>
        <section class="about">
            <p class="des2"><br><br>We know how much of a challenge it can be to find the exact food product to handle your cravings.
                <br><br>That's why <font color="salmon">Food Vibes</font> is here to help you with freshest food selections
                 <br><br>that matches exactly to your MOOD 😉.
            </p>
            <div class="lnk2"><a href="L-AboutUs.php">
                <button type="button"><span></span><p>Get to know about us</p></button></a>
            </div>
        </section>
        <section class="reach">
            <div class ="link">
                <h2 class="social">Follow us on Social Media</h2>
                <div class=links>
                    <a href="#"><i class="fa fa-facebook">&ensp; Food Vibes</i></a>
                    <a href="#"><i class="fa fa-instagram">&ensp; Food_Vibes</i></a>
                    <a href="#"><i class="fa fa-twitter">&ensp; Food_Vibes</i></a>
                </div>
                <h2 class="contact">Contact Us</h2>
                <div class="links">
                    <a href="#"><i class="fa fa-phone"> &ensp; 12345678</i></a>
                    <a href="#"><i class="fa fa-envelope-open">&ensp; foodvibes@gmail.com</i></a>
                </div>
            </div>
        </section>
        
    </body>
    </html>
    