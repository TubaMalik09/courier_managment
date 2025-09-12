<?php
session_start(); // Start the session at the very beginning

// Database connection details
$servername = "localhost";
$username_db = "root"; // Your database username
$password_db = "";     // Your database password (leave empty if no password)
$dbname = "cms";       // Your database name

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log the error instead of displaying to users in production
    error_log("Database Connection failed: " . $conn->connect_error);
    $_SESSION['error_message'] = "A server error occurred. Please try again later.";
    header("Location: agentlogin.php");
    exit();
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Use ENT_QUOTES for better security
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);
  


    // Input validation (server-side)
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Please enter both username and password.";
        header("Location: agentlogin.php");
        exit();
    }

    // Prepare a SQL statement to prevent SQL injection
    // Select id, name, and password from the database
    $stmt = $conn->prepare("SELECT id, name, password FROM agent WHERE name = ?");

    if (!$stmt) {
        error_log("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        $_SESSION['error_message'] = "A server error occurred during query preparation.";
        header("Location: agentlogin.php");
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // DIRECT PLAIN TEXT PASSWORD COMPARISON (LESS SECURE)
        // You should really use password_verify() here after hashing passwords with password_hash()
        if ($password === $row['password']) { // Compare the submitted password directly with the stored plain text password
            // Password is correct, set session variables
            $_SESSION['agent_id'] = $row['id'];
            $_SESSION['userName'] = $row['name']; 
            $_SESSION['logged_in'] = true;
            $_SESSION["role"] ="agent";

            // Redirect to a dashboard or success page
            header("Location: Admin/index.php"); // Create a dashboard.php file or point to your actual admin page
            exit();
        } else {
            // Invalid password
            $_SESSION['error_message'] = "Invalid username or password.";
            header("Location: agentlogin.php"); // Redirect back to login page with error
            exit();
        }
    } else {
        // No user found with that username
        $_SESSION['error_message'] = "Invalid username or password.";
        header("Location: agentlogin.php"); // Redirect back to login page with error
        exit();
    }

    $stmt->close();
} else {
    // If someone tries to access this page directly without POST method
    header("Location: agentlogin.php");
    exit();
}

$conn->close();
?>