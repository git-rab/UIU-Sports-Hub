<?php
// Replace with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "uiu sports hub";

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['tableName'])) {
        $tableName = $_POST['tableName'];

        // Create the table
        $sql = "CREATE TABLE $tableName (
            red_team VARCHAR(20),
            green_team VARCHAR(20)
        )";
        $pdo->exec($sql);

        // Insert initial rows
        for ($i = 1; $i <= 11; $i++) {
            $pdo->exec("INSERT INTO $tableName (red_team, green_team) VALUES ('', '')");
        }

        echo "Table created and populated with initial rows successfully.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Create Team</title>
    <style>
        /* Add your CSS styles here */
        /* Styling for the popup buttons */
        .create-button-popup {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            color: #ffffff;
            background-color: #FF6F61;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            margin-left: 80px;
        }

        .create-button-popup:hover {
            background-color: #ffffff;
            transform: scale(1.05);
        }

        /* Confirmation Dialog */
        .confirmation-dialog {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .confirm-button,
        .cancel-button {
            margin: 10px;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-button {
            background-color: #1abc9c;
            color: #121110;
        }

        .cancel-button {
            background-color: #e74c3c;
            color: #121110;
        }

        .confirm-button:hover,
        .cancel-button:hover {
            background-color: #ffffff;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <!-- Confirmation Dialog -->
    <div id="confirmationDialog" class="confirmation-dialog">
        <form id="tableForm" method="post">
            <p>Enter a table name:</p>
            <input type="text" id="tableName" name="tableName" required>
            <button id="confirmButton" class="confirm-button">Confirm</button>
            <button id="cancelButton" class="cancel-button">Cancel</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>

</html>
