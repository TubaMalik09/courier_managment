<?php
ini_set('display_errors', 0); // Disable display of errors for security in production
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // Log all errors to the server error log

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'An unexpected error occurred.'
];

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $response['message'] = "Database connection failed: " . $conn->connect_error;
    error_log("Database connection failed: " . $conn->connect_error); // Log the error
    echo json_encode($response);
    exit(); // Exit if DB connection fails
}

// Proceed only if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get data from POST request
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // 2. Server-side Validation
    $errors = [];
    if (empty($name)) { $errors[] = "Name is required."; }
    if (empty($email)) { $errors[] = "Email is required."; }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Invalid email format."; }
    // Add more validation rules as needed

    if (!empty($errors)) {
        $response['message'] = implode("\n", $errors); // Use \n for SweetAlert newlines
        echo json_encode($response);
        $conn->close(); // Close DB connection before exiting
        exit();
    }

    // 3. Sanitize and escape data for database insertion
    $name = $conn->real_escape_string(htmlspecialchars(strip_tags($name)));
    $email = $conn->real_escape_string(htmlspecialchars(strip_tags($email)));
    $phone = $conn->real_escape_string(htmlspecialchars(strip_tags($phone)));
    $subject = $conn->real_escape_string(htmlspecialchars(strip_tags($subject)));
    $message = $conn->real_escape_string(htmlspecialchars(strip_tags($message)));

    // 4. Prepare and execute the SQL INSERT statement using prepared statements
    // Make sure 'submission_date' column is of type DATETIME or TIMESTAMP
    $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, subject, message, submission_date) VALUES (?, ?, ?, ?, ?, NOW())");

    if ($stmt === false) {
        $response['message'] = "Database statement preparation failed: " . $conn->error;
        error_log("Database statement preparation failed: " . $conn->error);
        echo json_encode($response);
        $conn->close();
        exit();
    }

    // "sssss" indicates five string parameters
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Your message has been sent successfully!";

        // --- START PHPMailer Integration ---
        // IMPORTANT: Adjust these paths based on your actual file structure
        // If submit_contact.php is in 'courier_managment/usertheme/'
        // and 'vendor' is in 'courier_managment/', then go up one level.
        require_once __DIR__ . '/../vendor/PHPMailer/src/Exception.php';
        require_once __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php';
        require_once __DIR__ . '/../vendor/PHPMailer/src/SMTP.php';

        // ... inside the if ($stmt->execute()) block ...
        // ... inside the if ($stmt->execute()) block ...

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true); // Enable exceptions

try {
    // Enable detailed SMTP debugging to the server error log (optional, but good for initial setup)
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = function($str, $level) {
        error_log("PHPMailer DEBUG ($level): " . $str);
    };

    // Server settings for MailHog
    $mail->isSMTP();
    $mail->Host       = 'localhost';    // MailHog runs on localhost
    $mail->SMTPAuth   = false;          // MailHog typically doesn't require authentication
    $mail->Username   = '';             // Not needed for MailHog
    $mail->Password   = '';             // Not needed for MailHog
    $mail->SMTPSecure = false;          // Not needed for MailHog (or use PHPMailer::ENCRYPTION_STARTTLS if MailHog supports it on 587, but usually not needed for local)
    $mail->Port       = 1025;           // MailHog's SMTP port

    // Recipients (these don't have to be real emails when using MailHog)
    $mail->setFrom('no-reply@courierx.com', 'CourierX Contact Form'); // Use a generic no-reply address
    $mail->addAddress('admin@example.com', 'Admin'); // MailHog will catch this
    $mail->addReplyTo($email, $name); // Still useful for reply-to headers

    // Content
    $mail->isHTML(false);
    $mail->Subject = "New Contact Form Submission: " . $subject;
    $mail->Body    = "You have received a new message from your website contact form.\n\n" .
                     "Here are the details:\n\n" .
                     "Name: " . $name . "\n" .
                     "Email: " . $email . "\n" .
                     "Phone: " . (!empty($phone) ? $phone : 'N/A') . "\n" .
                     "Subject: " . $subject . "\n" .
                     "Message:\n" . $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients.';

    $mail->send();
    // $response['message'] is already set to success, no need to change it here.
    // You might want to remove the "(Note: Admin email notification failed.)" part
    // from the catch block, or only show it if not in development.

} catch (Exception $e) {
    error_log("PHPMailer EXCEPTION (MailHog): " . $e->getMessage() . " | Mailer Error Info: " . $mail->ErrorInfo);
    // Optionally, inform the user if the local email failed (less common with MailHog)
    // $response['message'] .= "\n(Note: Local email notification failed.)";
}
$mail->SMTPDebug = 0; // Always turn off debugging in production or when not actively debugging
// --- END PHPMailer Integration ---
// --- END PHPMailer Integration ---
    } else {
        $response['message'] = "Error inserting data: " . $stmt->error;
        error_log("Error executing database statement: " . $stmt->error);
    }

    $stmt->close(); // Close the prepared statement
} else {
    // If it's not a POST request
    $response['message'] = "Invalid request method. This script only accepts POST requests.";
}

$conn->close(); // Close the database connection
echo json_encode($response); // Send the JSON response
exit(); // Ensure no further output
?>