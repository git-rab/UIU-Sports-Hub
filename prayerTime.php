<?php 
session_start();
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}


// Retrieve employee data from database

//dhuhr
$sql = "SELECT FAJR, DHUHR, ASR, MAGHRIB, ISHA  FROM prayer_time";
$result = mysqli_query($conn, $sql);

//fajr
$sql1 = "SELECT FAJR, DHUHR, ASR, MAGHRIB, ISHA  FROM prayer_time";
$result1= mysqli_query($conn, $sql1);

//asr
$sql1 = "SELECT FAJR, DHUHR, ASR, MAGHRIB, ISHA  FROM prayer_time";
$result2= mysqli_query($conn, $sql1);

//maghrib
$sql1 = "SELECT FAJR, DHUHR, ASR, MAGHRIB, ISHA  FROM prayer_time";
$result3= mysqli_query($conn, $sql1);

//isha
$sql1 = "SELECT FAJR, DHUHR, ASR, MAGHRIB, ISHA  FROM prayer_time";
$result4= mysqli_query($conn, $sql1);


$loggedInUserName = ""; // Initialize the variable

if (isset($_SESSION['username'])) {
    $loggedInUserId = $_SESSION['username'];

    // Fetch user's name from the database based on the logged-in user's ID
    $sql = "SELECT Name FROM login_info WHERE ID = '$loggedInUserId'";
    $result7 = mysqli_query($conn, $sql);

    if ($result7 && mysqli_num_rows($result7) > 0) {
        $row = mysqli_fetch_assoc($result7);
        $loggedInUserName = $row['Name'];
    }

    mysqli_close($conn);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>UIU Sports Hub</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">
  
  <style>
    


/* Style for each prayer time container */
.prayer-time-container {
    background-color: #1b262c;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    color: #ffffff;
    margin: 15px 0;
}

/* Style for the prayer time */
.prayer-time {
    font-size: 20px;
    margin-top: 10px;
}

/* Add icons to prayer times */
.prayer-time i {
    font-size: 24px;
    margin-right: 10px;
}

/* Style for the prayer time name */
.prayer-name {
    font-size: 18px;
    margin-top: 5px;
    text-transform: uppercase;
}

/* Add hover effect to prayer time containers */
.prayer-time-container:hover {
    background-color: rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease-in-out;
}

#quotesCarousel {
    margin-top: 20px;
    background-color: #1b262c;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    color: #000000;
}

/* Style for the quotes */
.quote {
    font-size: 18px;
    padding: 10px;
    border: 1px solid #dee2e6;
    background-color: #ffffff;
    border-radius: 5px;
}

/* Style for the carousel control icons */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #000000;
    padding: 10px;
    border-radius: 5px;
}




  </style>
  

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <form method="POST"></form>
    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
      <div class="row gx-0">
          <div class="col-lg-3 bg-dark d-none d-lg-block">
              <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                  <h1 class="m-0 display-4 text-primary text-uppercase">UIU Sports Hub</h1>
              </a>
          </div>
          <div class="col-lg-9">
              <div class="row gx-0 bg-secondary d-none d-lg-flex">
                  <div class="col-lg-7 px-5 text-start">
                      <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                          <i class="fa fa-envelope text-primary me-2"></i>
                          <h6 class="mb-0">uiusportsclub@gmail.com</h6>
                      </div>
                      <div class="h-100 d-inline-flex align-items-center py-2">
                          <i class="fa fa-phone-alt text-primary me-2"></i>
                          <h6 class="mb-0">+8801*********</h6>
                      </div>
                  </div>
                  <div class="col-lg-5 px-5 text-end">
                      <div class="d-inline-flex align-items-center py-2">
                          <?php
            if (!empty($loggedInUserName)) {
                echo "<h6 class='mb-0'>Hi: $loggedInUserName</h6>";
            } else {
                echo "<h6 class='mb-0'>Hi: Guest</h6>";
            }
            ?>                              
                      </div>
                  </div>
              </div>
              <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                  <a href="index.php" class="navbar-brand d-block d-lg-none">
                      <h1 class="m-0 display-4 text-primary text-uppercase">UIU Sports Hub</h1>
                  </a>
                  <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                      <div class="navbar-nav mr-auto py-0">
                          <a href="mainPage.php" class="nav-item nav-link active">Home</a>
                          <a href="inventorys.php" class="nav-item nav-link">Sports Inventory</a>
                          <a href="eventUpdate.php" class="nav-item nav-link">Event Update</a>
                          <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                          
                          <a href="createJoinTeam.php" class="nav-item nav-link">Create / Join Team</a>
                          <a href="prayerTime.php" class="nav-item nav-link">Prayer Time</a>
                          <a href="Group_chat.php" class="nav-item nav-link">Shoutout Box</a>
                      </div>
                      <a href="signup.php" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Logout</a>
                  </div>
              </nav>
          </div>
      </div>
  </div>
   
  
  <!--prayer time-->

<div class="container-fluid">
    <div id="quotesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="quote">"Success is not final, failure is not fatal: It is the courage to continue that counts." - Winston Churchill</div>
            </div>
            <div class="carousel-item">
                <div class="quote">"The only way to do great work is to love what you do." - Steve Jobs</div>
            </div>
            <div class="carousel-item">
                <div class="quote">"Believe you can and you're halfway there." - Theodore Roosevelt</div>
            </div>
            <!-- Add more quotes here -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#quotesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#quotesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="prayer-time-container">
                <div class="prayer-time">
                    <i class="fas fa-moon"></i>
                    <span class="time"><?php 
                     if ($result1 && mysqli_num_rows($result1) > 0) {
                    $row = mysqli_fetch_assoc($result1);
                    echo $row['FAJR'];
                } 

                    ?></span>
                </div>
                <div class="prayer-name">Fajr</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="prayer-time-container">
                <div class="prayer-time">
                    <i class="fas fa-sun"></i>
                    <span class="time"><?php 
                     if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row['DHUHR'];
                } 

                    ?>
                        
                    </span>
                </div>
                <div class="prayer-name">Dhuhr</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="prayer-time-container">
                <div class="prayer-time">
                    <i class="fas fa-cloud"></i>
                    <span class="time"><?php 
                     if ($result2 && mysqli_num_rows($result2) > 0) {
                    $row = mysqli_fetch_assoc($result2);
                    echo $row['ASR'];
                } 
                ?>
                </span>
                </div>
                <div class="prayer-name">Asr</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="prayer-time-container">
                <div class="prayer-time">
                    <i class="bi bi-sunset"></i>
                    <span class="time"><?php 
                     if ($result3 && mysqli_num_rows($result3) > 0) {
                    $row = mysqli_fetch_assoc($result3);
                    echo $row['MAGHRIB'];
                } 
                ?>
                </span>
                </div>
                <div class="prayer-name">Maghrib</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="prayer-time-container">
                <div class="prayer-time">
                    <i class="fas fa-moon"></i>
                    <span class="time"><?php 
                     if ($result4 && mysqli_num_rows($result4) > 0) {
                    $row = mysqli_fetch_assoc($result4);
                    echo $row['ISHA'];
                }
                ?> 

                </span>
                </div>
                <div class="prayer-name">Isha</div>
            </div>
        </div>
    </div>
</div>




  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-secondary px-5 mt-5">
    <div class="row gx-5">
        <div class="col-lg-8 col-md-6">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                    <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        <p class="mb-0">United International University, Dhaka 1212, Bangladesh</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        <p class="mb-0">---System Bandits---</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        <p class="mb-0">+880 1*********</p>
                    </div>
                    <div class="d-flex mt-4">
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="https://www.facebook.com/SCUIU"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
                
     <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>  


    </form>
      </body>
</html>