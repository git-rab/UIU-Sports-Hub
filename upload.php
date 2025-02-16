<html>
<head>
<title>Image Upload</title>

<meta charset="UTF-8">
    <title>Upload Picture</title>
    <meta content="width=device-width, initial-scale=1.5" name="viewport">
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
                          <a href="Group_chat.php" class="nav-item nav-link">Group Chat</a>
                      </div>
                      <a href="login.php" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Log Out</a>
                  </div>
              </nav>
          </div>
      </div>
  </div>

<!-- Upload Body Starts -->
<div class="image-upload-container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <br>
        <label for="image" class="image-label">Choose an Image:</label>
        <input type="file" name="image" id="image">
        <br><br>
        <h2>Image Information</h2>
        <hr>
        <label for="caption">Caption:</label>
        <input type="text" id="caption" name="caption"><br><br>
        <label for="picture_credit">Picture Credit:</label>
        <input type="text" id="picture_credit" name="picture_credit"><br><br>

        <hr>
        <input type="submit" value="Upload" class="btn btn-primary">&nbsp;
        <a href="gallery.php" class="btn btn-light py-md-0 px-md-1">Cancel</a>
    </form>
    <div id="preview"></div>
    <hr>
</div>


<!-- PHP Starts -->

<?php
// Check if the file was uploaded without errors
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get the image file
    $image = $_FILES['image'];

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo 'Only JPG, JPEG, PNG, and GIF files are allowed.';
        exit;
    }

    // Check if the file size is too big
    if ($image['size'] > 8000000) {
        echo 'The file size must be less than 8MB.';
        exit;
    }

    // Generate a unique filename for the image
    $uniqueFilename = uniqid() . '.' . $imageFileType;

    // Move the file to the uploads directory
    $target_dir = 'img/upload/';
    $target_file = $target_dir . $uniqueFilename;
    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        // Insert image information into the database
        $caption = $_POST['caption'];
        $picture_credit = $_POST['picture_credit'];
        $image_path = $target_file;

        // Database connection code goes here (you need to establish a database connection)
        // Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}

        // Your SQL query to insert data into the database
        $sql = "INSERT INTO gallery (caption, picture_credit, image_path) VALUES ('$caption', '$picture_credit', '$image_path')";

        // Execute the SQL query (make sure you have a database connection established)
         $conn->query($sql); // Uncomment this line if you have a database connection

        echo "Upload successful!";
    } else {
        echo "Upload failed.";
    }
} else {
    echo "Please upload an image file!";
}
?>

<!--old php-->
<?php
// Check if the file was uploaded without errors
/*if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get the image file
    $image = $_FILES['image'];

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo 'Only JPG, JPEG, PNG, and GIF files are allowed.';
        exit;
    }

    // Check if the file size is too big
    if ($image['size'] > 8000000) {
        echo 'The file size must be less than 8MB.';
        exit;
    }

    // Move the file to the uploads directory
    $target_dir = 'C:\xampp\htdocs\Sports Hub_html template\img\upload/';
    $target_file = $target_dir . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        echo "Upload successful!";
    } else {
        echo "Upload failed.";
    }
} else {
    echo "Please upload an image file!";
}*/
?>

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



