<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Flights</title>

    <!-- swiper css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/m.css">




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
    <div class="heading" style="background:url(images/ee.webp) no-repeat">
        <h1>My Flights</h1>
    </div>







<body>
    <div class="background">
        <div class="booking-form">
            <h2>Your Tickets</h2>
            <?php
            include("php/php_conn.php");

            // Fetch all tickets from the database
            $query = "SELECT * FROM tickk";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                // Display tickets if there are any
                echo "<div class='message'><p>Your booked tickets:</p></div><br>";
                echo "<ul>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo "<div class='ticket'>";
                    echo "<h3>From: {$row['source']}</h3>";
                    echo "<h3>To: {$row['destination']}</h3>";
                    echo "<p>Departure: {$row['departure']}</p>";
                    // You can add more details here if needed
                    echo "</div>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                // Display message if no tickets are found
                echo "<div class='message'><p>No tickets booked yet</p></div><br>";
            }
            ?>
        </div>
    </div>



        <!-- Footer section starts -->
        <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
                <a href="flight.php"><i class="fas fa-angle-right"></i>Book</a>
                <a href="my_tickets.php"><i class="fas fa-angle-right"></i>My Flights</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"><i class="fas fa-phone"></i> +21111 111 1111</a>
                <a href="#"><i class="fas fa-envelope"></i> rowan.nour@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Ejust, Alexandria, Egypt</a>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"><i class="fab fa-facebook"></i> Sara Adel</a>
                <a href="#"><i class="fab fa-twitter"></i> Rowan Nour</a>
                <a href="#"><i class="fab fa-instagram"></i> Hager Tamer</a>
                <a href="#"><i class="fab fa-linkedin"></i> SRH</a>
            </div>
        </div>
        <div class="credit">Created by: <span>Rowan Nour 120210133 - Sara Adel 120210144 - Hager Tamer 120210092</span> | Software Engineering</div>
    </section>
    <!-- Footer section ends -->

    
</body>
</html>
