<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

// Create a PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Assuming your table name is 'saturday'
$stmt = $pdo->query("SELECT * FROM saturday"); // Replace with your actual table name
$stmtsunday = $pdo->query("SELECT * FROM sunday");
$stmtmonday = $pdo->query("SELECT * FROM monday");
$stmttuesday = $pdo->query("SELECT * FROM tuesday");
$stmtwednesday = $pdo->query("SELECT * FROM wednesday");
$stmtthursday = $pdo->query("SELECT * FROM thursday");
$stmtfriday = $pdo->query("SELECT * FROM friday");









if (isset($_POST['deleteid'])) {
    $deleteId = $_POST['deleteid'];

    // Delete the row with the provided ID from the table
    $deleteStmt = $pdo->prepare("DELETE FROM saturday WHERE id = :deleteId");
    $deleteStmt->bindParam(':deleteId', $deleteId, PDO::PARAM_INT);
    $deleteStmt->execute();
}
if (isset($_POST['newEvent']) && isset($_POST['newVenue']) && isset($_POST['newTime'])) {
    $newEvent = $_POST['newEvent'];
    $newVenue = $_POST['newVenue'];
    $newTime = $_POST['newTime'];

    // Insert the new event into the 'saturday' table
    $insertStmt = $pdo->prepare("INSERT INTO saturday (event, venue, time) VALUES (:newEvent, :newVenue, :newTime)");
    $insertStmt->bindParam(':newEvent', $newEvent, PDO::PARAM_STR);
    $insertStmt->bindParam(':newVenue', $newVenue, PDO::PARAM_STR);
    $insertStmt->bindParam(':newTime', $newTime, PDO::PARAM_STR);
    $insertStmt->execute();
}




if (isset($_POST['deleteid1'])) {
    $deleteId1 = $_POST['deleteid1'];

    // Delete the row with the provided ID from the table
    $deleteStmt1 = $pdo->prepare("DELETE FROM sunday WHERE id = :deleteId1");
    $deleteStmt1->bindParam(':deleteId1', $deleteId1, PDO::PARAM_INT);
    $deleteStmt1->execute();
}
if (isset($_POST['newEvent1']) && isset($_POST['newVenue1']) && isset($_POST['newTime1'])) {
    $newEvent1 = $_POST['newEvent1'];
    $newVenue1 = $_POST['newVenue1'];
    $newTime1 = $_POST['newTime1'];

    // Insert the new event into the 'saturday' table
    $insertStmt1 = $pdo->prepare("INSERT INTO sunday (event, venue, time) VALUES (:newEvent1, :newVenue1, :newTime1)");
    $insertStmt1->bindParam(':newEvent1', $newEvent1, PDO::PARAM_STR);
    $insertStmt1->bindParam(':newVenue1', $newVenue1, PDO::PARAM_STR);
    $insertStmt1->bindParam(':newTime1', $newTime1, PDO::PARAM_STR);
    $insertStmt1->execute();
}



if (isset($_POST['deleteid2'])) {
    $deleteId1 = $_POST['deleteid2'];

    // Delete the row with the provided ID from the table
    $deleteStmt2 = $pdo->prepare("DELETE FROM monday WHERE id = :deleteId2");
    $deleteStmt2->bindParam(':deleteId2', $deleteId2, PDO::PARAM_INT);
    $deleteStmt2->execute();
}
if (isset($_POST['newEvent2']) && isset($_POST['newVenue2']) && isset($_POST['newTime2'])) {
    $newEvent2 = $_POST['newEvent2'];
    $newVenue2 = $_POST['newVenue2'];
    $newTime2 = $_POST['newTime2'];

    // Insert the new event into the 'saturday' table
    $insertStmt2 = $pdo->prepare("INSERT INTO monday (event, venue, time) VALUES (:newEvent2, :newVenue2, :newTime2)");
    $insertStmt2->bindParam(':newEvent2', $newEvent2, PDO::PARAM_STR);
    $insertStmt2->bindParam(':newVenue2', $newVenue2, PDO::PARAM_STR);
    $insertStmt2->bindParam(':newTime2', $newTime2, PDO::PARAM_STR);
    $insertStmt2->execute();
}

if (isset($_POST['deleteid3'])) {
    $deleteId3 = $_POST['deleteid3'];

    // Delete the row with the provided ID from the table
    $deleteStmt3 = $pdo->prepare("DELETE FROM tuesday WHERE id = :deleteId3");
    $deleteStmt3->bindParam(':deleteId3', $deleteId3, PDO::PARAM_INT);
    $deleteStmt3->execute();
}
if (isset($_POST['newEvent3']) && isset($_POST['newVenue3']) && isset($_POST['newTime3'])) {
    $newEvent3 = $_POST['newEvent3'];
    $newVenue3 = $_POST['newVenue3'];
    $newTime3 = $_POST['newTime3'];

    // Insert the new event into the 'saturday' table
    $insertStmt3 = $pdo->prepare("INSERT INTO tuesday (event, venue, time) VALUES (:newEvent3, :newVenue3, :newTime3)");
    $insertStmt3->bindParam(':newEvent3', $newEvent3, PDO::PARAM_STR);
    $insertStmt3->bindParam(':newVenue3', $newVenue3, PDO::PARAM_STR);
    $insertStmt3->bindParam(':newTime3', $newTime3, PDO::PARAM_STR);
    $insertStmt3->execute();
}



if (isset($_POST['deleteid4'])) {
    $deleteId4 = $_POST['deleteid4'];

    // Delete the row with the provided ID from the table
    $deleteStmt4 = $pdo->prepare("DELETE FROM wednesday WHERE id = :deleteId4");
    $deleteStmt4->bindParam(':deleteId4', $deleteId4, PDO::PARAM_INT);
    $deleteStmt4->execute();
}
if (isset($_POST['newEvent4']) && isset($_POST['newVenue4']) && isset($_POST['newTime4'])) {
    $newEvent4 = $_POST['newEvent4'];
    $newVenue4 = $_POST['newVenue4'];
    $newTime4 = $_POST['newTime4'];

    // Insert the new event into the 'saturday' table
    $insertStmt4 = $pdo->prepare("INSERT INTO wednesday (event, venue, time) VALUES (:newEvent4, :newVenue4, :newTime4)");
    $insertStmt4->bindParam(':newEvent4', $newEvent4, PDO::PARAM_STR);
    $insertStmt4->bindParam(':newVenue4', $newVenue4, PDO::PARAM_STR);
    $insertStmt4->bindParam(':newTime4', $newTime4, PDO::PARAM_STR);
    $insertStmt4->execute();
}



if (isset($_POST['deleteid5'])) {
    $deleteId5 = $_POST['deleteid5'];

    // Delete the row with the provided ID from the table
    $deleteStmt5 = $pdo->prepare("DELETE FROM thursday WHERE id = :deleteId5");
    $deleteStmt5->bindParam(':deleteId5', $deleteId5, PDO::PARAM_INT);
    $deleteStmt5->execute();
}
if (isset($_POST['newEvent5']) && isset($_POST['newVenue5']) && isset($_POST['newTime5'])) {
    $newEvent5 = $_POST['newEvent5'];
    $newVenue5 = $_POST['newVenue5'];
    $newTime5 = $_POST['newTime5'];

    // Insert the new event into the 'saturday' table
    $insertStmt5 = $pdo->prepare("INSERT INTO thursday (event, venue, time) VALUES (:newEvent5, :newVenue5, :newTime5)");
    $insertStmt5->bindParam(':newEvent5', $newEvent5, PDO::PARAM_STR);
    $insertStmt5->bindParam(':newVenue5', $newVenue5, PDO::PARAM_STR);
    $insertStmt5->bindParam(':newTime5', $newTime5, PDO::PARAM_STR);
    $insertStmt5->execute();
}

if (isset($_POST['deleteid6'])) {
    $deleteId6 = $_POST['deleteid6'];

    // Delete the row with the provided ID from the table
    $deleteStmt6 = $pdo->prepare("DELETE FROM friday WHERE id = :deleteId6");
    $deleteStmt6->bindParam(':deleteId6', $deleteId6, PDO::PARAM_INT);
    $deleteStmt6->execute();
}
if (isset($_POST['newEvent6']) && isset($_POST['newVenue6']) && isset($_POST['newTime6'])) {
    $newEvent6 = $_POST['newEvent6'];
    $newVenue6 = $_POST['newVenue6'];
    $newTime6 = $_POST['newTime6'];

    // Insert the new event into the 'saturday' table
    $insertStmt6 = $pdo->prepare("INSERT INTO friday (event, venue, time) VALUES (:newEvent6, :newVenue6, :newTime6)");
    $insertStmt6->bindParam(':newEvent6', $newEvent6, PDO::PARAM_STR);
    $insertStmt6->bindParam(':newVenue6', $newVenue6, PDO::PARAM_STR);
    $insertStmt6->bindParam(':newTime6', $newTime6, PDO::PARAM_STR);
    $insertStmt6->execute();
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

 <!-- Class Timetable Start -->
  <div class="container-fluid p-5"></div>
      <div class="mb-5 text-center">
        <h1 class="text-primary text-uppercase">Event Update</h1>
      </div>
      <div class="tab-class text-center">
        <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase rounded-pill mb-5">
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-1">Saturday</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white " data-bs-toggle="pill" href="#tab-2">Sunday</a>
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
           
    <div id="tab-1" class="tab-pane fade show p-0 active">

    <div class="row g-5">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid">ID</label>
                    <input type="text" class="form-control" id="deleteid" name="deleteid" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent">Event</label>
                    <input type="text" class="form-control" id="newEvent" name="newEvent" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue">Venue</label>
                    <input type="text" class="form-control" id="newVenue" name="newVenue" required>
                </div>
                <div class="mb-3">
                    <label for="newTime">Time</label>
                    <input type="text" class="form-control" id="newTime" name="newTime" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
        </div>
    </div>
</div>


    <div id="tab-2" class="tab-pane fade">


        <div class="row g-5">


            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmtsunday->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid1">ID</label>
                    <input type="text" class="form-control" id="deleteid1" name="deleteid1" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent1">Event</label>
                    <input type="text" class="form-control" id="newEvent1" name="newEvent1" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue1">Venue</label>
                    <input type="text" class="form-control" id="newVenue1" name="newVenue1" required>
                </div>
                <div class="mb-3">
                    <label for="newTime1">Time</label>
                    <input type="text" class="form-control" id="newTime1" name="newTime1" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
        </div>

              

            </div>
    </div>

    <div id="tab-3" class="tab-pane fade">
        <div class="row g-5">


            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmtmonday->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid2">ID</label>
                    <input type="text" class="form-control" id="deleteid2" name="deleteid2" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent2">Event</label>
                    <input type="text" class="form-control" id="newEvent2" name="newEvent2" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue2">Venue</label>
                    <input type="text" class="form-control" id="newVenue2" name="newVenue2" required>
                </div>
                <div class="mb-3">
                    <label for="newTime2">Time</label>
                    <input type="text" class="form-control" id="newTime2" name="newTime2" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
        </div>



            
            
            </div>
    </div>
    <div id="tab-4" class="tab-pane fade">
        <div class="row g-5">


            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmttuesday->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid3">ID</label>
                    <input type="text" class="form-control" id="deleteid3" name="deleteid3" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent3">Event</label>
                    <input type="text" class="form-control" id="newEvent3" name="newEvent3" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue3">Venue</label>
                    <input type="text" class="form-control" id="newVenue3" name="newVenue3" required>
                </div>
                <div class="mb-3">
                    <label for="newTime3">Time</label>
                    <input type="text" class="form-control" id="newTime3" name="newTime3" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
        </div>


            </div>
    </div>

    <div id="tab-5" class="tab-pane fade">
        <div class="row g-5">



            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmtwednesday->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid4">ID</label>
                    <input type="text" class="form-control" id="deleteid4" name="deleteid4" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent4">Event</label>
                    <input type="text" class="form-control" id="newEvent4" name="newEvent4" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue4">Venue</label>
                    <input type="text" class="form-control" id="newVenue4" name="newVenue4" required>
                </div>
                <div class="mb-3">
                    <label for="newTime4">Time</label>
                    <input type="text" class="form-control" id="newTime4" name="newTime4" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
        </div>
            
            
            </div>
    </div>
    <div id="tab-6" class="tab-pane fade">
        <div class="row g-5">


            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmtthursday->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid5">ID</label>
                    <input type="text" class="form-control" id="deleteid5" name="deleteid5" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent5">Event</label>
                    <input type="text" class="form-control" id="newEvent5" name="newEvent5" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue5">Venue</label>
                    <input type="text" class="form-control" id="newVenue5" name="newVenue5" required>
                </div>
                <div class="mb-3">
                    <label for="newTime5">Time</label>
                    <input type="text" class="form-control" id="newTime5" name="newTime5" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
        </div>
            

            </div>
            

    </div>

    <div id="tab-7" class="tab-pane fade">
        <div class="row g-5">


            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($event = $stmtfriday->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$event['id']}</td>
                                <td>{$event['event']}</td>
                                <td>{$event['venue']}</td>
                                <td>{$event['time']}</td>
                                
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="mb-3">
                    <label for="deleteid6">ID</label>
                    <input type="text" class="form-control" id="deleteid6" name="deleteid6" required>
                </div>
                <button type='submit' class='btn btn-danger' name='cancelButton'>Cancel</button>

            </form>
            
        </div>
        

    </div>
     <div class="row">
        <div class="col-md-12">
            <form method="post">
                
                
                <div class="mb-3">
                    <label for="newEvent6">Event</label>
                    <input type="text" class="form-control" id="newEvent6" name="newEvent6" required>
                </div>
                <div class="mb-3">
                    <label for="newVenue6">Venue</label>
                    <input type="text" class="form-control" id="newVenue6" name="newVenue6" required>
                </div>
                <div class="mb-3">
                    <label for="newTime6">Time</label>
                    <input type="text" class="form-control" id="newTime6" name="newTime6" required>
                </div>
                <button type="submit" class="btn btn-success" name="insertButton">Insert Event</button>
            </form>
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

      </body>
      </html>

