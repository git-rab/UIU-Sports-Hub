<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["cancel_booking"])) {
    $userId = $_POST["user_id"];

    // Check if booking exists for the provided user ID and badminton item
    $sqlCheckBooking = "SELECT quantity FROM booking_list WHERE item = 'badminton' AND id = ?";
    $stmtCheckBooking = mysqli_prepare($conn, $sqlCheckBooking);
    mysqli_stmt_bind_param($stmtCheckBooking, "s", $userId);
    mysqli_stmt_execute($stmtCheckBooking);
    mysqli_stmt_store_result($stmtCheckBooking);

    if (mysqli_stmt_num_rows($stmtCheckBooking) > 0) {
        // Fetch the booked quantity
        mysqli_stmt_bind_result($stmtCheckBooking, $bookedQuantity);
        mysqli_stmt_fetch($stmtCheckBooking);

        // Delete the booking from booking_list
        $sqlDeleteBooking = "DELETE FROM booking_list WHERE item = 'badminton' AND id = ?";
        $stmtDeleteBooking = mysqli_prepare($conn, $sqlDeleteBooking);
        mysqli_stmt_bind_param($stmtDeleteBooking, "s", $userId);
        mysqli_stmt_execute($stmtDeleteBooking);
        mysqli_stmt_close($stmtDeleteBooking);

        // Update the inventory by adding back the canceled quantity
        $sqlUpdateInventory = "UPDATE inventory SET badminton = badminton + ?";
        $stmtUpdateInventory = mysqli_prepare($conn, $sqlUpdateInventory);
        mysqli_stmt_bind_param($stmtUpdateInventory, "i", $bookedQuantity);
        mysqli_stmt_execute($stmtUpdateInventory);
        mysqli_stmt_close($stmtUpdateInventory);

        echo "Booking canceled successfully. Quantity added back to inventory.";
    } else {
        echo "No booking found for the provided ID.";
    }

    mysqli_stmt_close($stmtCheckBooking);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Badminton Booking</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 15px;
            color: #555;
            font-size: 14px;
            text-transform: uppercase;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #ff6f61;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff8f81;
        }

        .message {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .success {
            color: #4caf50;
        }

        .error {
            color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cancel Badminton Booking</h2>
        <form method="post" action="">
            <label for="user_id">Enter Your ID:</label>
            <input type="text" id="user_id" name="user_id" required>
            <button type="submit" name="cancel_booking">Cancel Booking</button>
        </form>
        <div class="message <?php echo isset($successMessage) ? 'success' : 'error'; ?>">
            <?php echo isset($successMessage) ? $successMessage : (isset($errorMessage) ? $errorMessage : ''); ?>
        </div>
    </div>
</body>
</html>

