
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiu sports hub"; // Update with your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the booking form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["user_id"];
    $quantity = $_POST["quantity"];
    $startYear = $_POST["start_year"];
    $startMonth = $_POST["start_month"];
    $startDate = $startYear . "-" . $startMonth . "-" . $_POST["start_day"];
    $endYear = $_POST["end_year"];
    $endMonth = $_POST["end_month"];
    $endDate = $endYear . "-" . $endMonth . "-" . $_POST["end_day"];

    // Fetch user's name based on the provided user ID
    $sqlGetName = "SELECT Name FROM login_info WHERE ID = ?";
    $stmtGetName = mysqli_prepare($conn, $sqlGetName);
    mysqli_stmt_bind_param($stmtGetName, "s", $userId);
    mysqli_stmt_execute($stmtGetName);
    mysqli_stmt_bind_result($stmtGetName, $userName);
    mysqli_stmt_fetch($stmtGetName);
    mysqli_stmt_close($stmtGetName);

    $itemName = "Basketball"; // Name of the item being booked

    // Check available inventory
    $sqlCheckInventory = "SELECT basketball FROM inventory"; // Assuming 'basketball' column in the inventory table
    $resultCheckInventory = mysqli_query($conn, $sqlCheckInventory);
    $rowCheckInventory = mysqli_fetch_assoc($resultCheckInventory);
    $availableInventory = $rowCheckInventory["basketball"];

    if ($quantity <= $availableInventory) {
        $sqlInsertBooking = "INSERT INTO booking_list (id, name, quantity, item, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsertBooking = mysqli_prepare($conn, $sqlInsertBooking);
        mysqli_stmt_bind_param($stmtInsertBooking, "ssssss", $userId, $userName, $quantity, $itemName, $startDate, $endDate);

        if (mysqli_stmt_execute($stmtInsertBooking)) {
            // Update inventory
            $newInventory = $availableInventory - $quantity;
            $sqlUpdateInventory = "UPDATE inventory SET basketball = ?";
            $stmtUpdateInventory = mysqli_prepare($conn, $sqlUpdateInventory);
            mysqli_stmt_bind_param($stmtUpdateInventory, "i", $newInventory);
            mysqli_stmt_execute($stmtUpdateInventory);
            mysqli_stmt_close($stmtUpdateInventory);

            $bookingSuccessMessage = "Booking successful! Thank you.";
        } else {
            $bookingError = "Booking failed. Please try again.";
        }

        mysqli_stmt_close($stmtInsertBooking);
    } else {
        $bookingError = "Not enough inventory available for booking.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Basketball</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 30px;
    background-color: #ffffff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s;
}

input:focus, select:focus {
    border-color: #FF6F61;
    outline: none;
}

select {
    height: 40px;
    appearance: none;
    background: transparent url('down-arrow.svg') no-repeat right center;
    background-size: 20px;
    padding-right: 40px;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #FF6F61;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #FFA500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }
}

    </style>
</head>
<body>
    <h1>Book Basketball</h1>
    <?php
    if (isset($bookingSuccessMessage)) {
        echo "<p style='color: green;'>$bookingSuccessMessage</p>";
    } elseif (isset($bookingError)) {
        echo "<p style='color: red;'>$bookingError</p>";
    }
    ?>
    <!-- Booking form -->
    <form method="post" action="bookbasketball.php">
    
       <input type="text" name="user_id" placeholder="User ID">
        <input type="number" name="quantity" placeholder="Quantity">
        <label>Start Date:</label>
        <select name="start_year">
            <?php
            $currentYear = date("Y");
            for ($year = 2015; $year <= $currentYear; $year++) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        <select name="start_month">
            <?php
            for ($month = 1; $month <= 12; $month++) {
                echo "<option value='$month'>$month</option>";
            }
            ?>
        </select>
        <select name="start_day">
            <?php
            for ($day = 1; $day <= 31; $day++) {
                echo "<option value='$day'>$day</option>";
            }
            ?>
        </select>
        <label>End Date:</label>
        <select name="end_year">
            <?php
            for ($year = 2015; $year <= $currentYear; $year++) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        <select name="end_month">
            <?php
            for ($month = 1; $month <= 12; $month++) {
                echo "<option value='$month'>$month</option>";
            }
            ?>
        </select>
        <select name="end_day">
            <?php
            for ($day = 1; $day <= 31; $day++) {
                echo "<option value='$day'>$day</option>";
            }
            ?>
        </select>
        <button type="submit">Submit Booking</button>
    </form>

    <!-- Your HTML content here -->

</body>
</html>

