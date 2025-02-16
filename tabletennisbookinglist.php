<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "uiu sports hub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch booking details for Table Tennis
$sql = "SELECT id, name, quantity, start_date, end_date FROM booking_list WHERE item = 'Table Tennis'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Tennis Booking List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Reset default margin and padding */
        body, h1, h2, h3, p, table {
            margin: 0;
            padding: 0;
        }

        /* Set background and font */
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        /* Container styling */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #FF6F61;
            color: #ffffff;
        }

        /* Table row hover effect */
        tr:hover {
            background-color: #f5f5f5;
        }

        /* No bookings message */
        .no-bookings {
            color: #888;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #FF6F61;">Table Tennis Booking List</h2>
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Booked Quantity</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="no-bookings">No bookings for table tennis yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>


<?php
mysqli_close($conn);
?>
