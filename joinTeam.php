<?php
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "uiu sports hub"; // Make sure the database name is correct

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $teamChoice = $_POST["teamChoice"];

    // You should perform proper validation and sanitation on user inputs before using them in a query
    // This is a simple example and should not be used in a production environment

    $sql = "INSERT INTO team_match (" . ($teamChoice == "red_team" ? "Red Team" : "Green Team") . ") VALUES ('$userId')";

    if ($conn->query($sql) === TRUE) {
        echo "Joined the team successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Join Team</title>
</head>

<body>

    <h2>Join a Team</h2>
    <form method="post">
        <label for="userId">Your ID:</label>
        <input type="text" id="userId" name="userId" required><br>

        <label for="teamChoice">Choose Team:</label>
        <select id="teamChoice" name="teamChoice" required>
            <option value="red_team">Red Team</option>
            <option value="green_team">Green Team</option>
        </select><br>

        <button type="submit">Join Team</button>
    </form>

</body>

</html>
