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
    <title>Sports Gallery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">

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
                <a href="index.php"
                    class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
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
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
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
    <!-- Header End -->


    <!-- Hero Start -->
<div class="container-fluid bg-primary p-5 bg-hero mb-5">
    <div class="row py-5">
        <div class="col-12 text-center">
            <h1 class="display-2 text-uppercase text-white mb-md-4">Welcome to Sports Gallery</h1>
            <a href="upload.php" class="btn btn-primary py-md-3 px-md-5 me-3">Upload Picture</a>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Gallery Start -->
<div class="container-fluid p-5">
    <div class="mb-5 text-center">
        <h5 class="text-primary text-uppercase">Picture Highlights</h5>
        <h1 class="display-3 text-uppercase mb-0">Best Pictures of the month</h1>
    </div>
    <div class="row g-5">
        <?php
        // Database connection code
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uiu sports hub";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query to fetch image data from the database
        $sql = "SELECT * FROM gallery";

        // Execute the SQL query and fetch results
        $result = $conn->query($sql);

        // Loop through the fetched images and display them
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4 col-md-6">';
            echo '<div class="team-item position-relative">';
            echo '<div class="position-relative overflow-hidden rounded">';
            echo '<img class="img-fluid w-100" src="' . $row['image_path'] . '" alt="">';
            echo '</div>';
            echo '<div class="position-center start-0 bottom-5 w-20 rounded-bottom text-center p-3" style="background: rgba(34, 36, 41, .9);">';
            echo '<h5 class="text-uppercase text-light">' . $row['caption'] . '</h5>';
            echo '<p class="text-uppercase text-secondary m-0">PC: ' . $row['picture_credit'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
        

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>
<!-- Gallery End -->


   <!-- Team Start -->
   <div class="container-fluid p-5">
    <div class="mb-5 text-center">
        <h5 class="text-primary text-uppercase">Team Highlights</h5>
        <h2 class="display-3 text-uppercase mb-0">Best Teams of the Season</h2>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Column 1 -->
        <div class="col">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid rounded h-100" src="img/gallery/football_1.jpg" alt="VC Cup Football Tournament">
                </div>
                <div class="position-center start-0 bottom-5 w-100 bg-dark">
                    <h5 class="text-uppercase text-light">VC Cup Football Tournament</h5>
                    <p class="text-uppercase text-secondary m-0">PC: Rahaman Bapon</p>
                </div>
            </div>
        </div>
        <!-- Column 2 -->
        <div class="col">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid rounded h-100" src="img/gallery/Cricket_1.jpg" alt="Cricket Tournament">
                </div>
                <div class="position-center start-0 bottom-5 w-100 bg-dark">
                    <h5 class="text-uppercase text-light">Cricket Tournament</h5>
                    <p class="text-uppercase text-secondary m-0">PC: UIUPC</p>
                </div>
            </div>
        </div>
        <!-- Column 3 -->
        <div class="col">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid rounded h-100" src="img/gallery/Indoor_1.jpg" alt="Table Tennis">
                </div>
                <div class="position-center start-0 bottom-5 w-100 bg-dark">
                    <h5 class="text-uppercase text-light">Table Tennis</h5>
                    <p class="text-uppercase text-secondary m-0">PC: UIUPC</p>
                </div>
            </div>
        </div>
        <!-- Column 4 -->
        <div class="col">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid rounded h-100" src="img/gallery/football_2.jpg" alt="Bangobondhu Football Tournament Training">
                </div>
                <div class="position-center start-0 bottom-5 w-100 bg-dark">
                    <h5 class="text-uppercase text-light">Bangobondhu Football Tournament Training</h5>
                    <p class="text-uppercase text-secondary m-0">PC: Rahaman Bapon</p>
                </div>
            </div>
        </div>
        <!-- Column 5 -->
        <div class="col">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid rounded h-100" src="img/gallery/football_3.jpg" alt="Football Practice">
                </div>
                <div class="position-center start-0 bottom-5 w-100 bg-dark">
                    <h5 class="text-uppercase text-light">Football Practice</h5>
                    <p class="text-uppercase text-secondary m-0">PC: UIUPC</p>
                </div>
            </div>
        </div>
        <!-- Column 6 -->
        <div class="col">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid rounded h-100" src="img/gallery/Indoor_2.jpg" alt="Carrom">
                </div>
                <div class="position-center start-0 bottom-5 w-100 bg-dark">
                    <h5 class="text-uppercase text-light">Carrom</h5>
                    <p class="text-uppercase text-secondary m-0">PC: UIUPC</p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Team End -->



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