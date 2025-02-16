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

   // mysqli_close($conn);
}

?>


<?php
//session_start(); // Start the session
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

if (isset($_POST['submit']) && isset($_SESSION['username'])) {
    $loggedInUserName = $_SESSION['username'];

    // Fetch user's name from the database based on the logged-in user's ID
    $sql = "SELECT Name FROM login_info WHERE ID = '$loggedInUserId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $loggedInUserName = $row['Name'];
    }

    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    date_default_timezone_set('Asia/Dhaka');
    $ts = date('Y-m-d h:ia');

    $sql = "INSERT INTO chats (uname, msg, dt) VALUES ('$loggedInUserName', '$msg', '$ts')";

    if (mysqli_query($conn, $sql)) {
        // Message sent successfully
    } else {
        echo "ERROR: Message not sent!!!";
    }
}

mysqli_close($conn);
?>


<!-- HTML Starts -->
<html>
<head>
    <meta charset="utf-8">
  <title>Shoutout Box</title>
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
*{
    box-sizing:border-box;
}
body{
    background-color:#d9d9d9;
    font-family:Arial;
}
#container{
    width:500px;
    height:700px;
    background:white;
    margin:0 auto;
    font-size:0;
    border-radius:5px;
    overflow:hidden;
}
main{
    width:500px;
    height:700px;
    display:inline-block;
    font-size:15px;
    vertical-align:top;
}
main header{
    height:100px;
    padding:30px 20px 30px 40px;
    background-color:#ff6d33;  
}
main header > *{
    display:inline-block;
    vertical-align:top;
}
main header img:first-child{
    width:24px;
    margin-top:8px;
}  
main header img:last-child{
    width:24px;
    margin-top:8px;
}
main header div{
    margin-left:90px;
    margin-right:90px;
}
main header h2{
    font-size:25px;
    margin-top:5px;
    text-align:center;
    color:#FFFFFF;  
}
main .inner_div{
    padding-left:0;
    margin:0;
    list-style-type:none;
    position:relative;
    overflow:auto;
    height:500px;
    background-image:url(https://w0.peakpx.com/wallpaper/266/664/HD-wallpaper-football-field-whatsapp-glass.jpg);
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    position: relative;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
     
}
main .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent transparent
      #58b666 transparent;
    margin-left:20px;
    clear:both;
}
main .message{
    padding:10px;
    color:#000;
    margin-left:15px;
    background-color:#58b666;
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    clear:both;
}
main .triangle1{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
      transparent #6fbced transparent;
    margin-right:20px;
    float:right;
    clear:both;
}
main .message1{
    padding:10px;
    color:#000;
    margin-right:15px;
    background-color:#6fbced;
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    float:right;
    clear:both;
}
 
main footer{
    height:150px;
    padding:20px 30px 10px 20px;
    background-color:#ff6d33;
}
main footer .input1{
    resize:none;
    border:100%;
    display:block;
    width:120%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
}
main footer textarea{
    resize:none;
    border:100%;
    display:block;
    width:140%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:20px;
}
main footer .input2{
    resize:none;
    border:100%;
    display:block;
    width:40%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:100px;
    color:white;
    text-align:center;
    background-color:black;
    border: 2px solid white; 
}

main footer textarea::placeholder{
    color:#ddd;
}
 
</style>

<body onload="show_func()">

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
     

<div id="container">
    <main>
        <header>
            <img src="img\Chat_icon.png" alt="Shoutout Box">
            <div>
                <h2>Shoutout Box</h2>
            </div>
            <!--<img src="https://s3-us-west-2.amazonaws.com/
            s.cdpn.io/1940306/ico_star.png" alt="">-->
        </header>
 
<script>
function show_func(){
 
 var element = document.getElementById("chathist");
    element.scrollTop = element.scrollHeight;
  
 }
 </script>
  
<form id="myform" action="Group_chat.php" method="POST" >
<div class="inner_div" id="chathist">

<!-- PHP Starts -->
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "uiu sports hub";
$con = new mysqli($host, $user, $pass, $db_name);
 
$query = "SELECT * FROM chats";
 $run = $con->query($query);
 $i=0;
  
 while($row = $run->fetch_array()) :
 if($i==0){
 $i=5;
 $first=$row;
 ?>

 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
 <?php echo $row['msg']; ?></span> <br/>
 <div>
   <span style="color:black;float:left;
   font-size:10px;clear:both;">
    <?php echo $row['uname']; ?>,
        <?php echo $row['dt']; ?>
   </span>
</div>
</div>
<br/><br/>

 <?php
 }
else
{
if($row['uname']!=$first['uname'])
{
?>
 <div id="triangle" class="triangle"></div>
 <div id="message" class="message">
 <span style="color:white;float:left;">
   <?php echo $row['msg']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:right;
          font-size:10px;clear:both;">
  <?php echo $row['uname']; ?>,
        <?php echo $row['dt']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}
else
{
?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
  <?php echo $row['msg']; ?>
 </span> <br/>
 <div>
 <span style="color:black;float:left;
         font-size:10px;clear:both;">
 <?php echo $row['uname']; ?>,
      <?php echo $row['dt']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}
}
endwhile;
?>
</div>
    <footer>
        <table>
        <tr>
           <th>
            <textarea id="msg" name="msg"
                rows='3' cols='50'
                placeholder="Type your message">
            </textarea></th>
           <th>
            <input class="input2" type="submit"
            id="submit" name="submit" value="send">
           </th>               
        </tr>
        </table>               
    </footer>
</form>
</main>   
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