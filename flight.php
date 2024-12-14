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
    <link rel="stylesheet" href="css/x.css">



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


    <div class="background">
        <div class="booking-form">
            <h2>Available Flights</h2>
            <?php
            include("php/php_conn.php");

            if(isset($_POST['submit'])){
                $source = $_POST['source'];
                $destination = $_POST['destination'];
                $departure = $_POST['departure'];
                
    
             //verifying the unique email
 
                mysqli_query($con,"INSERT INTO tickk(source,destination,departure) VALUES('$source','$destination','$departure')") or die("Erroe Occured");
    
                echo "<div class='message'>
                          <p></p>
                      </div> <br>";
                
             
    
             }



            if(isset($_POST['submit'])){
                $source = $_POST['source'];
                $destination = $_POST['destination'];
                $departure = $_POST['departure'];
                $type = isset($_POST['type']) ? $_POST['type'] : ''; // Check if 'type' is set
            
                // Rest of the code remains the same
            


                $result = mysqli_query($con, "SELECT * FROM f WHERE Source='$source' AND Destination='$destination' AND Departure='$departure' AND type ='$type' ") or die("Select Error");
                $row_count = mysqli_num_rows($result);

                if ($row_count > 0) {

                    echo "<ul>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>";
                        echo "<div class='ticket'>";
                        echo "<h3>From: {$row['source']}</h3>";
                        echo "<h3>To: {$row['Destination']}</h3>";
                        echo "<p>Time: {$row['Time']}</p>";
                        echo "<p>Date: {$row['departure']}</p>";
                        echo "<p>type: {$row['type']}</p>";
                        echo "<form method='POST' action='{$_SERVER['PHP_SELF']}'>";
                        echo "<button type='submit' name='book' value='{$row['flight_id']}'>Book</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<div class='message'>
                              <p>No available flights</p>
                          </div> <br>";
                }
                
            }elseif (isset($_POST['book'])) {
                $flight_id = $_POST['book'];
                // Store the booking time in session
                ?>
                <div class="container">
                    <div class="card-container">
                        <div class="front">
                            <div class="image">
                                <img src="image/chip.png" alt="">
                                <img src="image/visa.png" alt="">
                            </div>
                            <div class="card-number-box">################</div>
                            <div class="flexbox">
                                <div class="box">
                                    <span>card holder</span>
                                    <div class="card-holder-name">full name</div>
                                </div>
                                <div class="box">
                                    <span>expires</span>
                                    <div class="expiration">
                                        <span class="exp-month">mm</span>
                                        <span class="exp-year">yy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="stripe"></div>
                            <div class="box">
                                <span>cvv</span>
                                <div class="cvv-box"></div>
                                <img src="image/visa.png" alt="">
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="inputBox">
                            <span>card number</span>
                            <input type="text" maxlength="16" class="card-number-input">
                        </div>
                        <div class="inputBox">
                            <span>card holder</span>
                            <input type="text" class="card-holder-input">
                        </div>
                        <div class="flexbox">
                            <div class="inputBox">
                                <span>expiration mm</span>
                                <select name="" id="" class="month-input">
                                    <option value="month" selected disabled>month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <span>expiration yy</span>
                                <select name="" id="" class="year-input">
                                    <option value="year" selected disabled>year</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <span>cvv</span>
                                <input type="text" maxlength="4" class="cvv-input">
                            </div>
                        </div>
                        <button type="submit" name="submit_card" value="<?php echo $flight_id; ?>">Submit</button>
                    </form>
                </div>
                <?php
            }
            
        
        elseif (isset($_POST['submit_card'])) {
            $flight_id = $_POST['submit_card'];
            // Store the booking time in session
            $_SESSION['booking_time'] = time();
            $result = mysqli_query($con, "SELECT * FROM flight WHERE flight_id='$flight_id'");
            $row = mysqli_fetch_assoc($result);
            // Display success notification
            echo "<div class='notification success'><p>Your flight has been successfully booked!</p></div>";
            // Display ticket details
            echo '<div class="row mb-5">                                                         
            <div class="col-9 out">
                <div class="row ">                                                     
                    <div class="col">
                        <h2 class="text-secondary mb-0 brand">
                            YOUR TICKET</h2> 
                    </div>
                </div>
                <hr>
                <div class="row mb-3">  
                    <div class="col-4">
                        <h3 class="head">From</h3>
                        <p class="txt">'. $row['source'] .'</p>
                    </div>
                    <div class="col-4">
                        <h3 class="head">To</h3>    
                        <p class="txt">'. $row['Destination'] .'</p>           
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <h3 class="head">Date</h3>
                        <p class="txt">'. $row['departure'] .'</p>
                    </div>                            
                </div> 
                <form method="POST" action="flight.php">
                    <button type="submit" name="cancel">Cancel</button>
                </form>
                <form action="home.php" method="post"> <!-- Home button form -->
                <button type="submit" name="home">Home</button>
            </form>
            </div>                                                 
        </div>';
        } 
        elseif (isset($_POST['cancel'])) {

            // Display message indicating cancellation cannot be done
            echo "<div class='message'><p>YOUR TICKET CANCELLED.</p></div>";        
            // Add home button form
            echo "<form action='home.php' method='post'> <!-- Home button form -->
                    <button type='submit' name='home'>Home</button>
                </form>";
        }
        
        
        else {
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

                <label for="type">Ticket Type</label>
                <select name="type" id="type" required>
                    <option value="one_way">One-way</option>
                    <option value="round_trip">Round-trip</option>
                    <option value="multi_city">Multi-city</option>
                </select>


                <button type="submit" name="submit">Search</button>
            </form>
            <?php
            }
            ?>

            <?php
            ?>
        </div>
    </div>
    <script>
        document.querySelector('.card-number-input').oninput = () =>{
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
        }

        document.querySelector('.card-holder-input').oninput = () =>{
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
        }

        document.querySelector('.month-input').oninput = () =>{
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
        }

        document.querySelector('.year-input').oninput = () =>{
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        }

        document.querySelector('.cvv-input').onmouseenter = () =>{
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        }

        document.querySelector('.cvv-input').onmouseleave = () =>{
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        }

        document.querySelector('.cvv-input').oninput = () =>{
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
        }
    </script>









</body>
</html>