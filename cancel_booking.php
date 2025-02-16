// cancel_booking.php
<?php
session_start();
$loggedInUserId = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$itemName = $_POST['item'];

// Fetch booked quantity for the canceled item from the booking_list table
$sql = "SELECT quantity FROM booking_list WHERE id = '$loggedInUserId' AND item = '$itemName'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $canceledQuantity = $row['quantity'];

    // Delete booking entry
    $deleteSql = "DELETE FROM booking_list WHERE id = '$loggedInUserId' AND item = '$itemName'";
    if (mysqli_query($conn, $deleteSql)) {
        // Update inventory count
        $updateSql = "UPDATE inventory SET $itemName = $itemName + $canceledQuantity";
        if (mysqli_query($conn, $updateSql)) {
            echo $canceledQuantity; // Send the canceled quantity back to JavaScript
        } else {
            echo "Error updating inventory: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting booking entry: " . mysqli_error($conn);
    }
} else {
    echo "Booking entry not found";
}

mysqli_close($conn);
?>
