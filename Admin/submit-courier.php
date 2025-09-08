<?php
// Make sure this path is correct for your setup
include 'connection.php';

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Retrieve form data
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $sender_phone = $_POST['sender_phone'];
    $sender_address = $_POST['sender_address'];

    $receiver_name = $_POST['receiver_name'];
    $receiver_email = $_POST['receiver_email'];
    $receiver_phone = $_POST['receiver_phone'];
    $receiver_address = $_POST['receiver_address'];

    $parcel_info = $_POST['parcel_info'];
    $service_type = $_POST['service_type']; 
    $branch =(int) $_POST['Branch']; // This will be 'by_weight' or a service ID
    // This will be 'by_weight' or a service ID
    $weight = null; // Initialize weight as null

    // 2. Determine the actual service_id to store and handle weight
    $service_id_to_store = null;
    if ($service_type === 'by_weight') {
        // IMPORTANT: Replace '5' with the actual ID for your "By Weight" service from your `service` table
        $service_id_to_store = 5; // Example: if service 'By Weight' has ID 5
        
        // If 'by_weight' is selected, get the weight value
        if (isset($_POST['weight']) && $_POST['weight'] !== '') {
            $weight = (double)$_POST['weight']; // Cast to double for numerical storage
        }
    } else {
        $service_id_to_store = (int)$service_type; // Cast to int as it's a service ID
    }
    
    // 3. SQL query to insert data into the 'addcourier' table
    // Ensure column names here match your database table exactly (case-sensitive if your DB is)
// 3. SQL query with placeholders
$sql = "INSERT INTO addcourier (
    `sender-name`, `sender-email`, `sender-phone`, `sender-address`,
    `receiver-name`, `receiver-email`, `receiver-phone`, `receiver-address`,
    `parcel-info`, `service-id`, `weight`, `branch`
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 // 11 placeholders for 11 columns

    // 4. Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // 5. Bind parameters (s = string, i = integer, d = double)
        // The order and types must match the placeholders in your SQL query and the variables
      

        if ($stmt) {
            $stmt->bind_param(
                "ssssssssssdi", // 10 strings, 1 double (weight), 1 int (branch)
                $sender_name, $sender_email, $sender_phone, $sender_address,
                $receiver_name, $receiver_email, $receiver_phone, $receiver_address,
                $parcel_info, $service_id_to_store, $weight, $branch
            );
        

        // 6. Execute the statement
        if ($stmt->execute()) {
            // Data inserted successfully
            echo "
                <script>
                    alert('Courier record inserted successfully!');
                    window.location.href = 'CreateCourier.php'; // Redirect back to the form
                </script>
            ";
        } else {
            // Error inserting data
            echo "Error: " . $stmt->error;
        }

        // 7. Close the statement
        $stmt->close();
    } else {
        // Error preparing the statement
        echo "Error preparing statement: " . $conn->error;
    }

    // 8. Close the database connection
    $conn->close();

} else {
    // If accessed directly without a POST request
    echo "Access denied. Please submit the form.";
}
?>