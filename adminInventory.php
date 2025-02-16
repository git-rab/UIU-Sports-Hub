<?php

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
        /* Add this CSS code within the <style> tag in the <head> section */

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

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .inventory-item {
            display: flex;
            align-items: center;
            margin: 0 20px 30px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
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

        .inventory-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .inventory-item i {

            color: #FFA500;
            font-size: 60px;


        }

        .inventory-icon {
            font-size: 42px;
            color: #FF6F61;
            margin-right: 20px;
        }

        .item-details h3 {
            font-size: 24px;
            color: #1b262c;
            margin: 0;
        }

        .item-details p {
            color: #666;
            margin: 8px 0;
        }

        .item-details a {

            margin-right: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .inventory-item {
                width: calc(50% - 40px);
            }
        }

        @media (max-width: 576px) {
            .inventory-item {
                width: calc(100% - 40px);
            }
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }


        .edit-button-popup,
        .booking-list-button {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: #ffffff;
            background-color: #FF6F61;
            transition: background-color 0.3s;
        }

        .edit-button-popup:hover,
        .booking-list-button:hover {
            background-color: #ffffff;
        }
    </style>


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <script src="https://kit.fontawesome.com/5b86fcd3d0.js" crossorigin="anonymous"></script>
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
                        <a class="btn btn-light btn-square rounded-circle me-2" href="https://www.facebook.com/SCUIU">
                            <i class="fab fa-facebook-f"></i>
                        </a>                           
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
                        <a href="adminMainPage.php" class="nav-item nav-link active">Home</a>
                        <a href="adminInventory.php" class="nav-item nav-link">Sports Inventory</a>
                        <a href="adminEventPage.php" class="nav-item nav-link">Event Update</a>
                        
                        <a href="adminCreateJoinTeam.php" class="nav-item nav-link">Create / Join Team</a>
                        <a href="editPrayerTime.php" class="nav-item nav-link">Prayer Time</a>
                        <a href="admin_Group_chat.php" class="nav-item nav-link">Shoutout Box</a>

                    </div>
                    <a href="login.php" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Log Out</a>
                </div>
            </nav>
        </div>
    </div>
</div>
    <!-- Header End -->

    <!--inventory-->
    <div class="container">
        <h2>Sports Inventory</h2>
        <div class="row">
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-futbol fa-spin inventory-icon"></i>
                <div class="item-details">
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
                        <a href="editfootball.php" class="edit-button-popup">Edit</a>

                        <a href="list.php" class="booking-list-button">Booking List</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-basketball-ball fa-spin inventory-icon"></i>
                <div class="item-details">
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
                        <a href="editbasketball.php" class="edit-button-popup">Edit</a>
                        <a href="list.php" class="booking-list-button">Booking List</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <i class=" fa-solid fa-baseball-bat-ball fa-shake inventory-icon"></i>
                <div class="item-details">
                    <h3 class="card-title">Cricket Bat</h3>
                    <p class="card-text">Available: <span id="cricketbat-remaining"><?php
                    if ($result3 && mysqli_num_rows($result3) > 0) {
                        $row = mysqli_fetch_assoc($result3);
                        echo $row['cricket_bat'];
                    }
                    ?></span></p>
                    <div class="buttons">
                        <a href="editcricketbat.php" class="edit-button-popup">Edit</a>
                        <a href="list.php" class="booking-list-button">Booking List</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-baseball-ball fa-spin inventory-icon"></i>
                <div class="item-details">
                    <h3 class="card-title">Cricket Ball</h3>
                    <p class="card-text">Available: <span id="cricketball-remaining"><?php
                    if ($result4 && mysqli_num_rows($result4) > 0) {
                        $row = mysqli_fetch_assoc($result4);
                        echo $row['cricket_ball'];
                    }
                    ?></span></p>
                    <div class="buttons">
                        <a href="editcricketball.php" class="edit-button-popup">Edit</a>
                        <a href="list.php" class="booking-list-button">Booking List</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-table-tennis fa-fade inventory-icon"></i>
                <div class="item-details">
                    <h3 class="card-title">Table Tennis</h3>
                    <p class="card-text">Available: <span id="tableTennis-remaining"><?php
                    if ($result5 && mysqli_num_rows($result5) > 0) {
                        $row = mysqli_fetch_assoc($result5);
                        echo $row['table_tennis'];
                    }
                    ?></span></p>
                    <div class="buttons">
                        <a href="edittabletennis.php" class="edit-button-popup">Edit</a>
                        <a href="list.php" class="booking-list-button">Booking List</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <i class="fas fa-table-tennis fa-fade inventory-icon"></i>
                <div class="item-details">
                    <h3 class="card-title">Badminton</h3>
                    <p class="card-text">Available: <span id="raket-remaining"><?php
                    if ($result6 && mysqli_num_rows($result6) > 0) {
                        $row = mysqli_fetch_assoc($result6);
                        echo $row['badminton'];
                    }
                    ?></span></p>
                    <div class="buttons">
                    <a href="editbadminton.php" class="edit-button-popup">Edit</a>
                    <a href="list.php" class="booking-list-button">Booking List</a>
                </div>
                </div>
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
                            <a class="btn btn-primary btn-square rounded-circle me-2"
                                href="https://www.facebook.com/SCUIU"><i class="fab fa-facebook-f"></i></a>
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

                    <script>
                        // Function to open the popup at the center of the browser window
                        function openPopup(url, width, height) {
                            var left = (window.screen.width - width) / 2; // Center horizontally
                            var top = (window.screen.height - height) / 2; // Center vertically
                            var popup = window.open(url, "_blank", "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top);
                            popup.focus();
                        }

                        // Attach click event to the "Edit" buttons
                        document.addEventListener("DOMContentLoaded", function () {
                            var editButtons = document.querySelectorAll(".edit-button-popup");
                            editButtons.forEach(function (button) {
                                button.addEventListener("click", function (event) {
                                    event.preventDefault();
                                    openPopup(button.getAttribute("href"), 500, 300); // Adjust width and height as needed
                                });
                            });
                        });

                        document.addEventListener("DOMContentLoaded", function () {
                            var editButtons1 = document.querySelectorAll(".booking-list-button");
                            editButtons1.forEach(function (button) {
                                button.addEventListener("click", function (event) {
                                    event.preventDefault();
                                    openPopup(button.getAttribute("href"), 500, 300); // Adjust width and height as needed
                                });
                            });
                        });
                    </script>


</body>

</html>