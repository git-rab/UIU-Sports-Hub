<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$id = $_POST['id'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$sql = "INSERT INTO booking_list (name, id, item, quantity, start_date, end_date) VALUES ('$name', '$id', '$item', '$quantity', '$start_date', '$end_date')";

if (mysqli_query($conn, $sql)) {
    echo "Booking data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
