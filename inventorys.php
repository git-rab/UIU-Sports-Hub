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

//football
$sql = "SELECT football, basketball, cricket_bat, cricket_ball, table_tennis, badminton  FROM inventory";
$result = mysqli_query($conn, $sql);

//basketball
$sql = "SELECT football, basketball, cricket_bat, cricket_ball, table_tennis, badminton  FROM inventory";
$result2 = mysqli_query($conn, $sql);

//cricket bat
$sql = "SELECT football, basketball, cricket_bat, cricket_ball, table_tennis, badminton  FROM inventory";
$result3 = mysqli_query($conn, $sql);

//cricket ball
$sql = "SELECT football, basketball, cricket_bat, cricket_ball, table_tennis, badminton  FROM inventory";
$result4 = mysqli_query($conn, $sql);

//table tennis
$sql = "SELECT football, basketball, cricket_bat, cricket_ball, table_tennis, badminton  FROM inventory";
$result5 = mysqli_query($conn, $sql);

//badminton
$sql = "SELECT football, basketball, cricket_bat, cricket_ball, table_tennis, badminton  FROM inventory";
$result6 = mysqli_query($conn, $sql);


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
        /* Add or modify CSS styles here */
        /* Styles for the Sports Inventory section */
        .sports-inventory {
            padding: 80px 0;
            background-color: #f7f7f7;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: #1b262c;
            text-align: center;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 30px;
        }

        .inventory-icon {
            font-size: 48px;
            color: #FF6F61;
            margin-bottom: 20px;
            display: block;
            text-align: center;
        }

        .item-details h3 {
            font-size: 24px;
            color: #1b262c;
            margin-bottom: 20px;
            text-align: center;
        }

        .item-details p {
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }

        .buttons {
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 576px) {
            .card {
                margin-bottom: 30px;
            }
        }
    </style>
  

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5b86fcd3d0.js" crossorigin="anonymous"></script>
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
   
<!--inventory-->

<div class="container sports-inventory">
    <h2 class="section-title">Sports Inventory</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card inventory-item">
                <i class="fas fa-futbol fa-spin inventory-icon"></i>
                <div class="card-body item-details">
                    <h3 class="card-title">Football</h3>
                    <p class="card-text">Available: <span id="football-remaining">
                        <?php 
                             if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo $row['football'];
                             } 
                        ?>
                    </span></p>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary book-button-popup" data-bs-toggle="modal" data-bs-target="#bookFootballModal">Book Now</a>
                        <a href="#" class="btn btn-danger cancel-button-popup" data-item="football">Cancel Booking</a>
                        <button class="btn btn-secondary book-list-button-popup" data-bs-toggle="modal" data-bs-target="#bookingListModal">Booking List</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat the above structure for other inventory items -->
        <div class="col-md-4">
            <div class="card inventory-item">
                <i class="fas fa-basketball-ball fa-spin inventory-icon"></i>
                <div class="card-body item-details">
                    <h3 class="card-title">Basketball</h3>
                    <p class="card-text">Available: <span id="basketball-remaining">
                        <?php 
                             if ($result2 && mysqli_num_rows($result2) > 0) {
                                $row = mysqli_fetch_assoc($result2);
                                echo $row['basketball'];
                             } 
                        ?>
                    </span></p>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary book-button-popup" data-bs-toggle="modal" data-bs-target="#bookBasketballModal">Book Now</a>
                        <a href="#" class="btn btn-danger cancel-button-popup" data-item="basketball">Cancel Booking</a>
                        <button class="btn btn-secondary book-list-button-popup" data-bs-toggle="modal" data-bs-target="#bookingListModal">Booking List</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat the above structure for other inventory items -->
        <div class="col-md-4">
            <div class="card inventory-item">
                <i class=" fa-solid fa-baseball-bat-ball fa-shake inventory-icon"></i>
                <div class="card-body item-details">
                    <h3 class="card-title">Cricket Bat</h3>
                    <p class="card-text">Available: <span id="cricketbat-remaining">
                        <?php 
                             if ($result3 && mysqli_num_rows($result3) > 0) {
                                $row = mysqli_fetch_assoc($result3);
                                echo $row['cricket_bat'];
                             } 
                        ?>
                    </span></p>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary book-button-popup" data-bs-toggle="modal" data-bs-target="#bookCricketBatModal">Book Now</a>
                        <a href="#" class="btn btn-danger cancel-button-popup" data-item="cricket_bat">Cancel Booking</a>
                        <button class="btn btn-secondary book-list-button-popup" data-bs-toggle="modal" data-bs-target="#bookingListModal">Booking List</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat the above structure for other inventory items -->
        <div class="col-md-4">
            <div class="card inventory-item">
                <i class="fas fa-baseball-ball fa-spin inventory-icon"></i>
                <div class="card-body item-details">
                    <h3 class="card-title">Cricket Ball</h3>
                    <p class="card-text">Available: <span id="cricketball-remaining">
                        <?php 
                             if ($result4 && mysqli_num_rows($result4) > 0) {
                                $row = mysqli_fetch_assoc($result4);
                                echo $row['cricket_ball'];
                             } 
                        ?>
                    </span></p>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary book-button-popup" data-bs-toggle="modal" data-bs-target="#bookCricketBallModal">Book Now</a>
                        <a href="#" class="btn btn-danger cancel-button-popup" data-item="cricket_ball">Cancel Booking</a>
                        <button class="btn btn-secondary book-list-button-popup" data-bs-toggle="modal" data-bs-target="#bookingListModal">Booking List</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat the above structure for other inventory items -->
        <div class="col-md-4">
            <div class="card inventory-item">
                <i class="fas fa-table-tennis fa-fade inventory-icon"></i>
                <div class="card-body item-details">
                    <h3 class="card-title">Table Tennis</h3>
                    <p class="card-text">Available: <span id="tableTennis-remaining">
                        <?php 
                             if ($result5 && mysqli_num_rows($result5) > 0) {
                                $row = mysqli_fetch_assoc($result5);
                                echo $row['table_tennis'];
                             } 
                        ?>
                    </span></p>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary book-button-popup" data-bs-toggle="modal" data-bs-target="#bookTableTennisModal">Book Now</a>
                        <a href="#" class="btn btn-danger cancel-button-popup" data-item="table_tennis">Cancel Booking</a>
                        <button class="btn btn-secondary book-list-button-popup" data-bs-toggle="modal" data-bs-target="#bookingListModal">Booking List</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card inventory-item">
                <i class="fas fa-table-tennis fa-fade inventory-icon"></i>
                <div class="card-body item-details">
                    <h3 class="card-title">Badminton</h3>
                    <p class="card-text">Available: <span id="tableTennis-remaining">
                        <?php 
                             if ($result6 && mysqli_num_rows($result6) > 0) {
                                $row = mysqli_fetch_assoc($result6);
                                echo $row['badminton'];
                             } 
                        ?>
                    </span></p>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary book-button-popup" data-bs-toggle="modal" data-bs-target="#bookTableTennisModal">Book Now</a>
                        <a href="#" class="btn btn-danger cancel-button-popup" data-item="table_tennis">Cancel Booking</a>
                        <button class="btn btn-secondary book-list-button-popup" data-bs-toggle="modal" data-bs-target="#bookingListModal">Booking List</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat the above structure for other inventory items -->
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

<--football booking-->
<div class="modal fade" id="bookFootballModal" tabindex="-1" aria-labelledby="bookFootballModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookFootballModalLabel">Book Football</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingFootballForm">
                    <input type="hidden" id="football_item_name" value="Football">
                    <div class="mb-3">
                        <label for="football_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="football_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="football_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="football_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="football_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="football_end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>




<--basketball form-->

<div class="modal fade" id="bookBasketballModal" tabindex="-1" aria-labelledby="bookBasketballModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookBasketballModalLabel">Book Basketball</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingBasketballForm">
                    <input type="hidden" id="basketball_item_name" value="Basketball">
                    <div class="mb-3">
                        <label for="basketball_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="basketball_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="basketball_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="basketball_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="basketball_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="basketball_end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

 <--cricket bat booking-->

<div class="modal fade" id="bookCricketBatModal" tabindex="-1" aria-labelledby="bookCricketBatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookCricketBatModalLabel">Book Cricket Bat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingCricketBatForm">
                    <input type="hidden" id="cricket_bat_item_name" value="cricket_bat">
                    <div class="mb-3">
                        <label for="cricket_bat_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="cricket_bat_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="cricket_bat_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="cricket_bat_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="cricket_bat_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="cricket_bat_end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<--cricket ball booking-->

<div class="modal fade" id="bookCricketBallModal" tabindex="-1" aria-labelledby="bookCricketBallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookCricketBallModalLabel">Book Cricket Ball</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingCricketBallForm">
                    <input type="hidden" id="cricket_ball_item_name" value="cricket_ball">
                    <div class="mb-3">
                        <label for="cricket_ball_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="cricket_ball_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="cricket_ball_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="cricket_ball_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="cricket_ball_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="cricket_ball_end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>


<--table tennis booking-->


<div class="modal fade" id="bookTableTennisModal" tabindex="-1" aria-labelledby="bookTableTennisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookTableTennisModalLabel">Book Table Tennis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingTableTennisForm">
                    <input type="hidden" id="table_tennis_item_name" value="table_tennis">
                    <div class="mb-3">
                        <label for="table_tennis_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="table_tennis_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="table_tennis_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="table_tennis_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="table_tennis_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="table_tennis_end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<-- badminton booking -->

<div class="modal fade" id="bookBadmintonModal" tabindex="-1" aria-labelledby="bookBadmintonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookBadmintonModalLabel">Book Badminton</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingBadmintonForm">
                    <input type="hidden" id="badminton_item_name" value="badminton">
                    <div class="mb-3">
                        <label for="badminton_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="badminton_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="badminton_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="badminton_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="badminton_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="badminton_end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Booking List Modal -->
<div class="modal fade" id="bookingListModal" tabindex="-1" aria-labelledby="bookingListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingListModalLabel">Booking List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Booking list table content will be inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <script>
    $(document).ready(function() {
        // ... (Previous script)

        $("#bookingBasketballForm").submit(function(event) {
            event.preventDefault();

            var quantity = parseInt($("#basketball_quantity").val());
            var remaining = parseInt($("#basketball-remaining").text());

            if (quantity <= remaining) {
                var startDate = $("#basketball_start_date").val();
                var endDate = $("#basketball_end_date").val();
                var itemName = $("#basketball_item_name").val();

                $.ajax({
                    url: "insert_booking.php",
                    type: "POST",
                    data: {
                        name: "<?php echo $loggedInUserName; ?>",
                        id: "<?php echo $loggedInUserId; ?>",
                        item: itemName,
                        quantity: quantity,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        alert("Booking successful!");
                        $("#bookBasketballModal").modal("hide");

                        // Update inventory display for basketball
                        remaining -= quantity;
                        $("#basketball-remaining").text(remaining);

                        // Update inventory in the database
                        $.ajax({
                            url: "update_inventory.php",
                            type: "POST",
                            data: {
                                item: itemName,
                                quantity: remaining
                            },
                            success: function(response) {
                                // Inventory updated in the database
                            },
                            error: function(error) {
                                // Handle error
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        alert("An error occurred while booking.");
                        console.log(error);
                    }
                });
            } else {
                alert("Not enough items available in inventory.");
            }
        });

    
    });
</script>


<script>
    $(document).ready(function() {
        // ... (Previous script)

        $("#bookingFootballForm").submit(function(event) {
            event.preventDefault();

            var quantity = parseInt($("#football_quantity").val());
            var remaining = parseInt($("#football-remaining").text());

            if (quantity <= remaining) {
                var startDate = $("#football_start_date").val();
                var endDate = $("#football_end_date").val();
                var itemName = $("#football_item_name").val();

                $.ajax({
                    url: "insert_booking.php",
                    type: "POST",
                    data: {
                        name: "<?php echo $loggedInUserName; ?>",
                        id: "<?php echo $loggedInUserId; ?>",
                        item: itemName,
                        quantity: quantity,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        alert("Booking successful!");
                        $("#bookFootballModal").modal("hide");

                        // Update inventory display for football
                        remaining -= quantity;
                        $("#football-remaining").text(remaining);

                        // Update inventory in the database
                        $.ajax({
                            url: "update_inventory.php",
                            type: "POST",
                            data: {
                                item: itemName,
                                quantity: remaining
                            },
                            success: function(response) {
                                // Inventory updated in the database
                            },
                            error: function(error) {
                                // Handle error
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        alert("An error occurred while booking.");
                        console.log(error);
                    }
                });
            } else {
                alert("Not enough items available in inventory.");
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        // ... (Previous script)

        $("#bookingCricketBatForm").submit(function(event) {
            event.preventDefault();

            var quantity = parseInt($("#cricket_bat_quantity").val());
            var remaining = parseInt($("#cricketbat-remaining").text());

            if (quantity <= remaining) {
                var startDate = $("#cricket_bat_start_date").val();
                var endDate = $("#cricket_bat_end_date").val();
                var itemName = $("#cricket_bat_item_name").val();

                $.ajax({
                    url: "insert_booking.php",
                    type: "POST",
                    data: {
                        name: "<?php echo $loggedInUserName; ?>",
                        id: "<?php echo $loggedInUserId; ?>",
                        item: itemName,
                        quantity: quantity,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        alert("Booking successful!");
                        $("#bookCricketBatModal").modal("hide");

                        // Update inventory display for cricket bat
                        remaining -= quantity;
                        $("#cricketbat-remaining").text(remaining);

                        // Update inventory in the database
                        $.ajax({
                            url: "update_inventory.php",
                            type: "POST",
                            data: {
                                item: itemName,
                                quantity: remaining
                            },
                            success: function(response) {
                                // Inventory updated in the database
                            },
                            error: function(error) {
                                // Handle error
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        alert("An error occurred while booking.");
                        console.log(error);
                    }
                });
            } else {
                alert("Not enough items available in inventory.");
            }
        });

    });
</script>


<script>
    $(document).ready(function() {
        // ... (Previous script)

        $("#bookingCricketBallForm").submit(function(event) {
            event.preventDefault();

            var quantity = parseInt($("#cricket_ball_quantity").val());
            var remaining = parseInt($("#cricketball-remaining").text());

            if (quantity <= remaining) {
                var startDate = $("#cricket_ball_start_date").val();
                var endDate = $("#cricket_ball_end_date").val();
                var itemName = $("#cricket_ball_item_name").val();

                $.ajax({
                    url: "insert_booking.php",
                    type: "POST",
                    data: {
                        name: "<?php echo $loggedInUserName; ?>",
                        id: "<?php echo $loggedInUserId; ?>",
                        item: itemName,
                        quantity: quantity,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        alert("Booking successful!");
                        $("#bookCricketBallModal").modal("hide");

                        // Update inventory display for cricket ball
                        remaining -= quantity;
                        $("#cricketball-remaining").text(remaining);

                        // Update inventory in the database
                        $.ajax({
                            url: "update_inventory.php",
                            type: "POST",
                            data: {
                                item: itemName,
                                quantity: remaining
                            },
                            success: function(response) {
                                // Inventory updated in the database
                            },
                            error: function(error) {
                                // Handle error
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        alert("An error occurred while booking.");
                        console.log(error);
                    }
                });
            } else {
                alert("Not enough items available in inventory.");
            }
        });

    });
</script>





<script>
    $(document).ready(function() {
        // ... (Previous script)

        $("#bookingTableTennisForm").submit(function(event) {
            event.preventDefault();

            var quantity = parseInt($("#table_tennis_quantity").val());
            var remaining = parseInt($("#tableTennis-remaining").text());

            if (quantity <= remaining) {
                var startDate = $("#table_tennis_start_date").val();
                var endDate = $("#table_tennis_end_date").val();
                var itemName = $("#table_tennis_item_name").val();

                $.ajax({
                    url: "insert_booking.php",
                    type: "POST",
                    data: {
                        name: "<?php echo $loggedInUserName; ?>",
                        id: "<?php echo $loggedInUserId; ?>",
                        item: itemName,
                        quantity: quantity,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        alert("Booking successful!");
                        $("#bookTableTennisModal").modal("hide");

                        // Update inventory display for table tennis
                        remaining -= quantity;
                        $("#tableTennis-remaining").text(remaining);

                        // Update inventory in the database
                        $.ajax({
                            url: "update_inventory.php",
                            type: "POST",
                            data: {
                                item: itemName,
                                quantity: remaining
                            },
                            success: function(response) {
                                // Inventory updated in the database
                            },
                            error: function(error) {
                                // Handle error
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        alert("An error occurred while booking.");
                        console.log(error);
                    }
                });
            } else {
                alert("Not enough items available in inventory.");
            }
        });

     
    });
</script>


<script>
    $(document).ready(function() {
        // ... (Previous script)

        $("#bookingBadmintonForm").submit(function(event) {
            event.preventDefault();

            var quantity = parseInt($("#badminton_quantity").val());
            var remaining = parseInt($("#badminton-remaining").text());

            if (quantity <= remaining) {
                var startDate = $("#badminton_start_date").val();
                var endDate = $("#badminton_end_date").val();
                var itemName = $("#badminton_item_name").val();

                $.ajax({
                    url: "insert_booking.php",
                    type: "POST",
                    data: {
                        name: "<?php echo $loggedInUserName; ?>",
                        id: "<?php echo $loggedInUserId; ?>",
                        item: itemName,
                        quantity: quantity,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        alert("Booking successful!");
                        $("#bookBadmintonModal").modal("hide");

                        // Update inventory display for badminton
                        remaining -= quantity;
                        $("#badminton-remaining").text(remaining);

                        // Update inventory in the database
                        $.ajax({
                            url: "update_inventory.php",
                            type: "POST",
                            data: {
                                item: itemName,
                                quantity: remaining
                            },
                            success: function(response) {
                                // Inventory updated in the database
                            },
                            error: function(error) {
                                // Handle error
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        alert("An error occurred while booking.");
                        console.log(error);
                    }
                });
            } else {
                alert("Not enough items available in inventory.");
            }
        });

    });
</script>


<script>

$(document).ready(function() {
    // ... (Previous script)

    $(".cancel-button-popup").click(function() {
        var itemName = $(this).data("item");
        $.ajax({
            url: "cancel_booking.php",
            type: "POST",
            data: {
                id: "<?php echo $loggedInUserId; ?>",
                item: itemName
            },
            success: function(response) {
                alert("Booking canceled!");
                // Update inventory display for the canceled item
                var canceledQuantity = parseInt(response);
                var remaining = parseInt($("#" + itemName + "-remaining").text());
                remaining += canceledQuantity;
                $("#" + itemName + "-remaining").text(remaining);
            },
            error: function(error) {
                alert("An error occurred while canceling the booking.");
                console.log(error);
            }
        });
    });

    // ... (Other scripts)
});

</script>

<script>
  $(document).ready(function() {
    // Other scripts...

    $(".book-list-button-popup").click(function() {
        // Clear the modal content
        $("#bookingListModal .modal-body").empty();

        // Fetch booking list data using AJAX
        $.ajax({
            url: "get_booking_list.php",
            type: "POST",
            data: {
                id: "<?php echo $loggedInUserId; ?>"
            },
            dataType: "json",
            success: function(bookingList) {
                if (bookingList.length > 0) {
                    // Construct the table HTML
                    var tableHtml = "<table class='table'>";
                    tableHtml += "<thead><tr><th>Name</th><th>ID</th><th>Item</th><th>Quantity</th><th>Start Date</th><th>End Date</th></tr></thead><tbody>";

                    for (var i = 0; i < bookingList.length; i++) {
                        var booking = bookingList[i];
                        tableHtml += "<tr><td>" + booking.name + "</td><td>" + booking.id + "</td><td>" + booking.item + "</td><td>" + booking.quantity + "</td><td>" + booking.start_date + "</td><td>" + booking.end_date + "</td></tr>";
                    }

                    tableHtml += "</tbody></table>";

                    // Insert the table into the modal
                    $("#bookingListModal .modal-body").html(tableHtml);
                } else {
                    // If no bookings, display a message
                    $("#bookingListModal .modal-body").html("<p>No bookings found.</p>");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Other scripts...
});


</script>



  

      </body>
      </html>