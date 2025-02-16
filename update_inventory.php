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

$itemName = $_POST['item'];
$remainingQuantity = $_POST['quantity'];

// Update the inventory in the database
$sql = "UPDATE inventory SET $itemName = $remainingQuantity";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Inventory updated successfully";
} else {
    echo "Error updating inventory: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
