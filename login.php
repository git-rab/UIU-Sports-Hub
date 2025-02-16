 <?php
session_start();
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

if(isset($_POST['login'])){
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $i=0;
    $usern = "";
    $passd = "";
    $userType = "";

    $sql="SELECT ID, Password, Type FROM login_info WHERE ID='$username' and Password='$password'";
    $result2 = mysqli_query($conn, $sql);

    if($result2) {
        while($rows = mysqli_fetch_assoc($result2) and $i==0)
        {
            $usern = $rows['ID'];    
            $passd = $rows['Password'];
            $userType = $rows['Type'];
            $i= $i+1;
        }

        if ($usern==$username and $passd==$password) {
          $_SESSION['username'] = $username;
            if ($userType == 'admin') {
                header('location: adminMainPage.php');
            } else if ($userType == 'player') {
                header('location: mainPage.php');
            } else {
               
            }
        }
        else{
            ?>
            <script>
                alert("Invalid username or password");
            </script>
            <?php
        }
    }
}

// After successful login
$_SESSION['username'] = $username; // Set the user's ID in the session

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container{
      max-width: 98%;
      height: auto;
      /*overflow-y: auto;  Add scrollbars if content exceeds max-height */
      margin: 10px auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ced4da;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .container-box {
      max-width: 100%;
      height: 750px;
      margin: 10px auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ced4da; /* Add a border */
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      background-size: cover;
      background-position: center;
    }
    
    .login-container {
      max-width: 99%; /* Adjust the width of the containers as needed */
      height: 750px;
      margin: 10px auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ced4da; /* Add a border */
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .img{
      margin-right: 20px;
    }

    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    .form-group label {
      font-weight: bold;
    }
    .form-control {
      width: 400px; /* Adjust the width as needed */
    }
    .btn-login {
      background-color: #007bff;
      border: none;
      position: sticky;
      width: 200px;

    }
    .btn-login:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="container-box" style="background-image: url('image/field.jpg'); background-size: cover; background-position: right;">
        <img src= "img\logo.png" height = "200" width="200" align="center">
        <h3 class="text-white text-center text-uppercase display-6 mb-0">UIU Sports Hub is your ultimate sports companion.</h3>  
  </div>
      </div>
      <div class="col-md-6">
      <div class="login-container">
        <form method="POST">
          <h2 class="text-center">Login</h2>
          <div class="form-group">
            <label for="username">User ID</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-login" name="login">Login</button>
          <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
        
      </div>
    </div>
    </div>
  </div>
  
  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
