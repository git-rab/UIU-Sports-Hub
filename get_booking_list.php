<?php
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID from the AJAX request
$userID = $_POST['id'];

// Prepare and execute a SQL query to retrieve booking information
$query = "SELECT name, id, item, quantity, start_date, end_date FROM booking_list WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userID);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the results and store them in an array
$bookingList = array();
while ($row = $result->fetch_assoc()) {
    $bookingList[] = $row;
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the booking list as JSON data
echo json_encode($bookingList);
?>


