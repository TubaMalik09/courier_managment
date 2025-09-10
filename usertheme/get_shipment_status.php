<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allow requests from any origin (for development, restrict in production)

$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "cms"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$trackingNo = $_GET['consignment'] ?? '';

if (empty($trackingNo)) {
    echo json_encode(["error" => "Tracking number is required."]);
    exit();
}

$stmt = $conn->prepare("SELECT * FROM addcourier WHERE trackingno = ?");
$stmt->bind_param("s", $trackingNo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Consignment not found."]);
}

$stmt->close();
$conn->close();
?>