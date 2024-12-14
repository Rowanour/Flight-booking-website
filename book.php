<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book</title>

    <!-- swiper css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/h.css">
</head>
<body>
    <!-- header section starts -->
    <section class="header">
        <a href="home.php" class="logo">Flight booking website</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="flight.php">Book</a>
            <a href="my_tickets.php">My Flights</a>
            <a href="index.php">Sign out</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <!-- header section ends -->
    <div class="heading" style="background:url(images/9.jpg) no-repeat">
        <h1>book now</h1>
    </div>







    <!--booking starts-->

<section class="book">
    <h1 class="heading-title">book your flight now</h1>





    <div class="booking-form">
            <h2>Travel booking</h2>
            <?php
            include("php/config.php");

            if(isset($_POST['submit'])){
                $source = $_POST['source'];
                $destination = $_POST['destination'];
                $departure = $_POST['departure'];

                $result = mysqli_query($con, "SELECT * FROM flight WHERE Source='$source' AND Destination='$destination' AND Departure='$departure' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);
                
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='message'><p>Available flights:</p></div><br>";
                    echo "<form method='POST' action='conn.php'>"; // Assuming 'booking.php' is the action file
                    echo "<ul>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li><label><input type='checkbox' name='selected_flights[]' value='{$row['flight_id']}' required>";
                        echo " Flight from {$row['source']} to {$row['Destination']} on {$row['departure']} at {$row['Time']}</label></li>";
                    }
                    
                    echo "</ul>";
                    echo "<button type='submit'>Book Selected Flight</button>";
                    echo "</form>";}
                    
                else{
                    echo "<div class='message'>
                              <p>No available flights</p>
                          </div> <br>";
                    
                }
            }
            else{
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>

                <label for="destination">Destination</label>
                <input type="text" name="destination" id="destination" required>

                <label for="source">Source</label>
                <input type="text" name="source" id="source" required>

                <label for="date">Departure</label>
                <input type="date" name="departure" id="date" required>

                <button type="submit" name="submit">Search</button>
            </form>
            <?php } ?>
        </div>

</section>

    <!--booking ends-->













    <section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
            <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
            <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"></i>ask questions</a>
            <a href="#"><i class="fas fa-angle-right"></i>about us</a>
            <a href="#"><i class="fas fa-angle-right"></i>privacy policy</a>
            <a href="#"><i class="fas fa-angle-right"></i>terms of use</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i> +20112 246 3387 </a>
            <a href="#"><i class="fas fa-envelope"></i> rowan.nour@gmail.com </a>
            <a href="#"><i class="fas fa-map"></i> Ejust, Alexandria, Egypt</a>
        </div>

        <div class="box">
            <h3>Follow us</h3>
            <a href="#"><i class="fab fa-facebook"></i> sara Adel </a>
            <a href="#"><i class="fab fa-twitter"></i> rowan nour </a>
            <a href="#"><i class="fab fa-instagram"></i> Hager Tamer</a>
            <a href="#"><i class="fab fa-linkedin"></i> SRH</a>
        </div>
    </div>

    <div class="credit"> Created by: <span> Rowan Nour 120210133 - Sara Adel 120210144 - Hager Tamer 120210092</span> | Software Engineering</div>

</section>




    
    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>
</body>
</html>
