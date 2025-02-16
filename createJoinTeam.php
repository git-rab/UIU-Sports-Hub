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
  
  <style>
    /* Styling for the popup buttons */
.buttons {
  text-align: center;
  margin-top: 30px;
}

.create-button-popup,
.join-button-popup,
.view-button-popup {
  display: inline-block;
  margin: 10px;
  padding: 15px 30px;
  border: none;
  border-radius: 5px;
  font-size: 18px;
  color: #ffffff;
  background-color: #FF6F61;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.2s;
    margin-left: 80px;
}

.create-button-popup:hover,
.join-button-popup:hover,
.view-button-popup:hover {
  background-color: #ffffff;
  transform: scale(1.05);
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


  <div class="container">
    <h1 class="mt-5 mb-4">Match Management System</h1>

    <!-- Create Match Form -->
    <div class="card mb-4">
        <div class="card-header">
            Create Match
        </div>
        <div class="card-body">
            <form id="createMatchForm">
                <div class="form-group">
                    <label for="player1">Your Name:</label>
                    <input type="text" class="form-control" id="player1" required>
                </div>
                <div class="form-group">
                    <label for="player2">Teammate's Name:</label>
                    <input type="text" class="form-control" id="player2" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Match</button>
            </form>
        </div>
    </div>

    <!-- Join Match Form -->
    <div class="card mb-4">
        <div class="card-header">
            Join Match
        </div>
        <div class="card-body">
            <form id="joinMatchForm">
                <div class="form-group">
                    <label for="playerName">Your Name:</label>
                    <input type="text" class="form-control" id="playerName" required>
                </div>
                <button type="submit" class="btn btn-primary">Join Match</button>
            </form>
        </div>
    </div>

    <!-- Team List -->
    <div class="card">
        <div class="card-header">
            Team List
        </div>
        <div class="card-body">
            <ul id="teamList" class="team-list"></ul>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        // Array to store teams
        let teams = [];

        // Create Match Form Submission
        $("#createMatchForm").submit(function(event){
            event.preventDefault();
            let player1 = $("#player1").val();
            let player2 = $("#player2").val();
            let team = [player1, player2];
            teams.push(team);
            updateTeamList();
            // Clear input fields after submitting form
            $("#player1").val("");
            $("#player2").val("");
        });

        // Join Match Form Submission
        $("#joinMatchForm").submit(function(event){
            event.preventDefault();
            let playerName = $("#playerName").val();
            alert(playerName + " joined the match!");
        });

        // Update Team List
        function updateTeamList() {
            $("#teamList").empty();
            teams.forEach(function(team, index) {
                $("#teamList").append(`<li>Team ${index + 1}: ${team.join(" & ")}</li>`);
            });
        }
    });
</script>
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
    var createButtons = document.querySelectorAll(".create-button-popup");
    var joinButtons = document.querySelectorAll(".join-button-popup");
    var viewbutton = document.querySelectorAll(".view-button-popup");

    createButtons.forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault();
        openPopup(button.getAttribute("href"), 500, 400); // Adjust width and height as needed
      });
    });
  

   joinButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            openPopup(button.getAttribute("href"), 500, 400);
        });
    });

   viewbutton.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            openPopup(button.getAttribute("href"), 500, 400);
        });
    });

   });
</script>          

      </body>
      </html>






