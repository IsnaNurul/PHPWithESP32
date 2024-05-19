// Replace these values with your database credentials
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "monitoringdaya";
// Create connection 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the raw POST data
$postData = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($postData, true);

// Check if JSON decoding was successful
if ($data === null) {
    http_response_code(400);
    echo "Invalid JSON data";
    exit();
}

// Extract data from JSON
$temperature = $data['suhu'];
$humidity = $data['kelembaban'];

// Prepare and execute the SQL query
$sql = "INSERT INTO your_table_name (suhu, kelembaban) VALUES ('$suhu', '$kelembaban')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>