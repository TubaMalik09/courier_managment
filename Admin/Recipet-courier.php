<?php
include_once("../connection.php"); // apna db connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_name   = $_POST['sender_name'];
    $receiver_name = $_POST['receiver_name'];
    $service_type  = $_POST['service_type'];
    $weight        = isset($_POST['weight']) ? $_POST['weight'] : null;

    // Sirf selected service ki detail fetch karo
    $sql = "SELECT * FROM service WHERE Id = '$service_type'";
    $result = $conn->query($sql);
    $service = $result->fetch_array();

    $service_title = $service[1];
    $service_price = $service[3];

    // Agar service "By Weight" hai to price calculate karo
    if (strtolower($service_title) === "by weight") {
        if ($weight != null && is_numeric($weight)) {
            $service_price = $service_price * $weight; // price × kg
        } else {
            $service_price = 0; // agar weight na ho to 0
        }
    }

    // Tax Calculation (16%)
    $tax_rate   = 0.16;
    $tax_amount = $service_price * $tax_rate;
    $grand_total = $service_price + $tax_amount;

    // Invoice number (random unique)
    $invoice_no = "INV-" . rand(1000,9999);
    $date = date("d M, Y");
     // 1. Retrieve form data
    
     $sender_email = $_POST['sender_email'];
     $sender_phone = $_POST['sender_phone'];
     $sender_address = $_POST['sender_address'];
 
   
     $receiver_email = $_POST['receiver_email'];
     $receiver_phone = $_POST['receiver_phone'];
     $receiver_address = $_POST['receiver_address'];
     $branch = $_POST['Branch'];

 
     $parcel_info = $_POST['parcel_info'];
  
 
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
     $sql = "INSERT INTO addcourier (
        `sender-name`, `sender-email`, `sender-phone`, `sender-address`,
        `receiver-name`, `receiver-email`, `receiver-phone`, `receiver-address`,
        `parcel-info`, `service-id`, `weight`, `price`, `tax`, `total`,`branch`
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param(
            "sssssssssididdd",
            $sender_name,     // s
            $sender_email,    // s
            $sender_phone,    // s
            $sender_address,  // s
            $receiver_name,   // s
            $receiver_email,  // s
            $receiver_phone,  // s
            $receiver_address,// s
            $parcel_info,     // s
            $service_type,    // i
            $weight,          // d
            $service_price,   // i
            $tax_amount,      // d
            $grand_total  ,
            $branch    // d
        );
    
        if ($stmt->execute()) {
            echo "Courier inserted successfully!";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 40px; }
        .invoice {
            max-width: 700px; margin: auto; background: #fff; padding: 30px; border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #007bff; }
        .header p { margin: 5px 0; color: #555; }
        .info { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .info div { width: 48%; }
        .info h3 { margin-bottom: 10px; color: #333; }
        .info p { margin: 5px 0; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table th, table td {
            border: 1px solid #ddd; padding: 12px; text-align: left; font-size: 15px;
        }
        table th { background: #007bff; color: #fff; text-transform: uppercase; }
        .totals { margin-top: 20px; }
        .totals p { font-size: 16px; margin: 5px 0; text-align: right; }
        .totals p strong { font-size: 18px; color: #007bff; }
        .footer { text-align: center; margin-top: 20px; font-size: 14px; color: #777; }
        button {
            margin-top: 20px; padding: 12px 25px; font-size: 16px;
            background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;
        }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Courier Service</h1>
            <p>Invoice Receipt</p>
        </div>

        <div class="info">
            <div>
                <h3>Sender Details</h3>
                <p><b>Name:</b> <?php echo $sender_name; ?></p>
            </div>
            <div>
                <h3>Receiver Details</h3>
                <p><b>Name:</b> <?php echo $receiver_name; ?></p>
            </div>
        </div>

        <div class="info">
            <div><p><b>Invoice No:</b> <?php echo $invoice_no; ?></p></div>
            <div style="text-align:right;"><p><b>Date:</b> <?php echo $date; ?></p></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Service</th>
                    <?php if(strtolower($service_title) === "by weight"): ?>
                        <th>Weight (kg)</th>
                    <?php endif; ?>
                    <th>Base Price (Rs)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $service_title; ?></td>
                    <?php if(strtolower($service_title) === "by weight"): ?>
                        <td><?php echo $weight; ?></td>
                    <?php endif; ?>
                    <td><?php echo number_format($service_price, 2); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="totals">
            <p>Tax (16%): Rs. <?php echo number_format($tax_amount, 2); ?></p>
            <p><strong>Grand Total: Rs. <?php echo number_format($grand_total, 2); ?></strong></p>
        </div>

        <div style="text-align:center;">
            <button onclick="window.print()">Print Invoice</button>
        </div>

        <div class="footer">
            <p>&copy; 2025 Courier Service | All Rights Reserved</p>
        </div>
    </div>
</body>
</html>
