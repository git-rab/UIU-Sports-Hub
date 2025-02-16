<?php
session_start();
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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

    //mysqli_close($conn);
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
    <style>
        /* Custom CSS styles */
        .tab-class {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 20px;
        }

        .nav-pills .nav-link {
            color: #fff;
            border-radius: 20px;
        }

        .nav-pills .nav-link.active {
            background-color: #007bff;
        }

        .card-body {
            background-color: #343a40;
            color: #fff;
            border-radius: 20px;
            padding: 20px;
        }

        .card-body h5 {
            margin-bottom: 10px;
        }

        @media (max-width: 576px) {
            .nav-pills {
                flex-direction: column;
                align-items: center;
            }
            .nav-link {
                margin-bottom: 10px;
            }
        }
    </style>
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

 <!-- Class Timetable Start -->
 <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h1 class="text-primary text-uppercase">Event Update</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase rounded-pill mb-5">
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-1">Saturday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-2">Sunday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-3">Monday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-4">Tuesday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-5">Wednesday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-6">Thursday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-7">Friday</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Tab content for Saturday -->
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-5">
                        <?php
                        $saturdayEvents = mysqli_query($conn, "SELECT * FROM saturday");
                        if (mysqli_num_rows($saturdayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($saturdayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Saturday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Tab content for Sunday -->
                <div id="tab-2" class="tab-pane fade">
                    <div class="row g-5">
                        <?php
                        $sundayEvents = mysqli_query($conn, "SELECT * FROM sunday");
                        if (mysqli_num_rows($sundayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($sundayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Sunday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Add tab content for Monday -->
                <div id="tab-3" class="tab-pane fade">
                    <div class="row g-5">
                        <?php
                        $mondayEvents = mysqli_query($conn, "SELECT * FROM monday");
                        if (mysqli_num_rows($mondayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($mondayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Monday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Add tab content for Tuesday -->
                <div id="tab-4" class="tab-pane fade">
                    <div class="row g-5">
                        <?php
                        $tuesdayEvents = mysqli_query($conn, "SELECT * FROM tuesday");
                        if (mysqli_num_rows($tuesdayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($tuesdayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Tuesday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Add tab content for Wednesday -->
                <div id="tab-5" class="tab-pane fade">
                    <div class="row g-5">
                        <?php
                        $wednesdayEvents = mysqli_query($conn, "SELECT * FROM wednesday");
                        if (mysqli_num_rows($wednesdayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($wednesdayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Wednesday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Add tab content for Thursday -->
                <div id="tab-6" class="tab-pane fade">
                    <div class="row g-5">
                        <?php
                        $thursdayEvents = mysqli_query($conn, "SELECT * FROM thursday");
                        if (mysqli_num_rows($thursdayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($thursdayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Thursday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Add tab content for Friday -->
                <div id="tab-7" class="tab-pane fade">
                    <div class="row g-5">
                        <?php
                        $fridayEvents = mysqli_query($conn, "SELECT * FROM friday");
                        if (mysqli_num_rows($fridayEvents) > 0) {
                            while ($event = mysqli_fetch_assoc($fridayEvents)) {
                                echo '<div class="col-md-6">
                                        <div class="bg-dark rounded text-center py-5 px-3">
                                            <div class="card-body">
                                                <h5 class="text-uppercase text-light mb-3">' . $event['event'] . '</h5>
                                                <p class="text-light mb-3">Venue: ' . $event['venue'] . '</p>
                                                <p class="text-light mb-3">Time: ' . $event['time'] . '</p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        } else {
                            echo '<div class="col-md-12">
                                    <div class="bg-dark rounded text-center py-5">
                                        <h5 class="text-uppercase text-light mb-3">No events on Friday</h5>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
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
<?php
// Close the database connection
mysqli_close($conn);
?>