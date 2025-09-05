<?php
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'An unexpected error occurred.'
];

// Database credentials - !! MAKE SURE THESE ARE CORRECT !!
$servername = "localhost";
$username = "root"; // Your actual MySQL username
$password = "";     // Your actual MySQL password (often empty for root on local setup)
$dbname = "cms";    // Your actual database name where 'contact' table resides

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $response['message'] = "Database connection failed: " . $conn->connect_error;
    error_log("Database connection failed: " . $conn->connect_error); // Log error for debugging
    echo json_encode($response);
    exit();
}

// 1. Receive data (check if POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // 2. Server-side Validation
    $errors = [];
    if (empty($name) || strlen($name) < 2) {
        $errors[] = "Name is required and must be at least 2 characters.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }
    if (empty($message) || strlen($message) < 10) { // Enforcing a minimum message length
        $errors[] = "Message is required and must be at least 10 characters.";
    }
    // Phone is optional in client-side validation, so we'll allow it to be empty.
    // If you want to strictly validate phone on server, uncomment this:
    /*
    if (!empty($phone) && !preg_match("/^[\+]?[1-9][\d]{0,15}$|^[\+]?[(]?[\d]{1,4}[)]?[-\s\.]?[\d]{1,15}$/", $phone)) {
        $errors[] = "Please enter a valid phone number.";
    }
    */

    if (!empty($errors)) {
        $response['message'] = implode("<br>", $errors); // Join errors for client display
        echo json_encode($response);
        exit();
    }

    // 3. Sanitize data
    $name = $conn->real_escape_string(htmlspecialchars(strip_tags($name)));
    $email = $conn->real_escape_string(htmlspecialchars(strip_tags($email)));
    $phone = $conn->real_escape_string(htmlspecialchars(strip_tags($phone))); // Sanitize phone as well
    $subject = $conn->real_escape_string(htmlspecialchars(strip_tags($subject)));
    $message = $conn->real_escape_string(htmlspecialchars(strip_tags($message)));

    // 4. Store data in MySQL - !! UPDATED TABLE NAME AND COLUMNS !!
    // Ensure the number of 's' matches the number of parameters and their types (all strings here)
    $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        $response['message'] = "Prepare failed: " . $conn->error;
        error_log("Prepare failed: " . $conn->error);
        echo json_encode($response);
        exit();
    }
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message); // 5 's' for 5 string params

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Message sent successfully! We will get back to you soon.";

        // 5. Send Email Notification (Optional - Uncomment and configure if needed)
        /*
        $to = "your_email@example.com"; // Your email address
        $email_subject = "New Contact Form Submission: " . $subject;
        $email_body = "You have received a new message from your website contact form.\n\n" .
                      "Here are the details:\n\n" .
                      "Name: " . $name . "\n" .
                      "Email: " . $email . "\n" .
                      "Phone: " . (!empty($phone) ? $phone : 'N/A') . "\n" . // Include phone if available
                      "Subject: " . $subject . "\n" .
                      "Message:\n" . $message;
        $headers = "From: webmaster@yourdomain.com\r\n"; // Replace with your domain email
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (!mail($to, $email_subject, $email_body, $headers)) {
            error_log("Failed to send email notification for contact form from " . $email);
        }
        */

    } else {
        $response['message'] = "Error executing statement: " . $stmt->error;
        error_log("Error executing statement: " . $stmt->error);
    }

    $stmt->close();
} else {
    $response['message'] = "Invalid request method.";
}

$conn->close();

// 6. Respond with JSON
echo json_encode($response);
?>