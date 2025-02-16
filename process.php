<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $playerName = $_POST["playerName"];
    $playerID = $_POST["playerID"];

    // Store data in a text file (you can customize this)
    $data = "$playerName - $playerID\n";
    file_put_contents("C:/xampp/htdocs/Sports Hub_html template/team_data.txt", $data, FILE_APPEND);

    echo "Data submitted successfully!";
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request.";
}
?>
