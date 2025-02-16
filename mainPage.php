<?php
session_start(); // Start the session
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'uiu sports hub';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$loggedInUserName = ""; // Initialize the variable

if (isset($_SESSION['username'])) {
    $loggedInUserId = $_SESSION['username'];

    // Fetch user's name from the database based on the logged-in user's ID
    $sql = "SELECT Name FROM login_info WHERE ID = '$loggedInUserId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
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
                        <div class="notice-section">
                            <marquee behavior="scroll" direction="left">
                                <!-- Your important notices here -->
                                Upcoming Event 1. Intra University Indoor Tournament 23,
                                Upcoming Event 2. NSU Sports Carnival,
                                Upcoming Event 3. VC Cup Cricket Tournament 23,
                                Medical service available from after 2:00 PM every day.
                            </marquee>
                        </div>
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
                      <a href="login.php" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Log Out</a>
                  </div>
              </nav>
          </div>
      </div>
  </div>

  <!-- About Start -->
  <div class="container-fluid p-5">
    <div class="row gx-5">
        <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
            <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded" src="img\2022_09_04_17_02_IMG_7400.JPG" style="object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-7">
            <div class="mb-4">
                <h5 class="text-primary text-uppercase">About Us</h5>
                <h1 class="display-3 text-uppercase mb-0">Welcome to UIU Sports Hub</h1>
            </div>
            <h4 class="text-body mb-4"><p>Welcome to the University Sports Club, a vibrant community dedicated to promoting sportsmanship, fitness, and teamwork among our varsity members. Whether you're an aspiring athlete or a sports enthusiast, we provide a platform for you to pursue your passion for sports and stay active while making lasting memories.</p>

              <h2>Our Mission</h2>
              <p>Our mission is to foster a thriving sports culture within the university by offering a diverse range of sporting opportunities, encouraging inclusivity, and promoting healthy competition. We aim to create a supportive environment that nurtures talent and empowers individuals to reach their full potential, both on and off the field.</p>
          
              <h2>Our Vision</h2>
              <p>Our vision is to be a leading sports club that inspires excellence, camaraderie, and lifelong dedication to physical fitness. We aspire to be a driving force in promoting sports as an integral part of university life, creating a legacy that extends beyond graduation.</p>
          
              <h2>What We Offer</h2>
              <ul>
                <li>Opportunities to participate in various sports teams and tournaments</li>
                <li>A well-equipped sports inventory for your sporting needs</li>
                <li>Regularly updated event calendar to keep you informed about upcoming matches and activities</li>
                <li>Dedicated practice schedules to help you plan and improve your skills</li>
                <li>A gallery showcasing memorable moments captured during our sports events</li>
                <li>A platform to create and join sports teams for friendly matches and competitions</li>
                <li>Information on the availability of sports fields and facilities for your convenience</li>
                <li>Access to prayer times at the varsity mosque for those who wish to observe their religious obligations</li>
                <li>Emergency medical services for quick assistance during sports activities</li>
                <li>A shoutout box to engage in discussions and connect with other sports club members</li>
              </ul>
            <div class="rounded bg-dark p-5">
                <ul class="nav nav-pills justify-content-between mb-3">
                    <li class="nav-item w-50">
                        <a class="nav-link text-uppercase text-center w-100 active" data-bs-toggle="pill" href="#pills-1">Get Involved</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-1">
                  <p>We believe that sports are not just about competition but also about building lifelong friendships and enhancing personal growth. Join our sports club today and become part of a dynamic community that shares the passion for sports. Whether you're an athlete, a supporter, or a volunteer, your participation is invaluable in making our sports club thrive.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



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
            </div>
        </div>
    </div>
</div>
                
                <!-- Back to Top -->
    <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

            </body>
            </html>