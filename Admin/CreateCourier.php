<?php
include_once("../connection.php")
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Form</title>
    <style>
        /* Reset some default browser styles */
        body,
        h1,
        h2,
        p,
        label,
        input,
        select,
        textarea,
        button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .section {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
            font-weight: 600;
        }

        label {
            display: block;
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        select {
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            h1 {
                font-size: 28px;
            }

            .section {
                margin-bottom: 20px;
            }

            h2 {
                font-size: 20px;
            }

            label {
                font-size: 14px;
            }

            input,
            textarea,
            select {
                padding: 10px;
                font-size: 14px;
            }

            button {
                padding: 10px 25px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 24px;
            }

            form {
                padding: 15px;
            }

            .section {
                margin-bottom: 15px;
            }

            h2 {
                font-size: 18px;
            }

            label {
                font-size: 13px;
            }

            input,
            textarea,
            select {
                padding: 8px;
                font-size: 13px;
            }

            button {
                padding: 8px 20px;
                font-size: 13px;
            }
        }

        /* Custom style for the weight input */
        .weight-input {
            display: none;
            /* Hidden by default */
        }
    </style>
    <script>
        // JavaScript to show weight input field when "By Weight" is selected function toggleWeightInput() { var serviceType = document.getElementById("service_type").value; var weightInput = document.getElementById("weight_input"); // Debugging to check if function triggers console.log(serviceType); // Add this for debugging if (serviceType === "by_weight") { weightInput.style.display = "block"; // Show weight input } else { weightInput.style.display = "none"; // Hide weight input } } 
    </script>
</head>

<body> 
<form action="Recipet-courier.php" method="post">
        <h1>Courier Booking Form</h1> <!-- Sender Info -->
        <div class="section">
            <h2>Sender Information</h2> <label for="sender_name">Name</label> <input type="text" id="sender_name" name="sender_name" required> <label for="sender_email">Email</label> <input type="email" id="sender_email" name="sender_email" required> <label for="sender_phone">Phone Number</label> <input type="tel" id="sender_phone" name="sender_phone" required> <label for="sender_address">Address</label> <textarea id="sender_address" name="sender_address" rows="3" required></textarea>
        </div> <!-- Receiver Info -->
        <div class="section">
            <h2>Receiver Information</h2> <label for="receiver_name">Name</label> <input type="text" id="receiver_name" name="receiver_name" required> <label for="receiver_email">Email</label> <input type="email" id="receiver_email" name="receiver_email" required> <label for="receiver_phone">Phone Number</label> <input type="tel" id="receiver_phone" name="receiver_phone" required> <label for="receiver_address">Address</label> <textarea id="receiver_address" name="receiver_address" rows="3" required></textarea>
        </div> <!-- Parcel Info -->
        <div class="section">
            <h2>Parcel Information</h2> <label for="parcel_info">Details</label> <textarea id="parcel_info" name="parcel_info" rows="3" required></textarea> <label for="service_type">Select Service</label> <select id="service_type" name="service_type" required onchange="toggleWeightInput()">
                <option value="">-- Select Service --</option> <?php // Fetch services from the database 
                $sql = "SELECT * FROM service"; $result = $conn->query($sql); if ($result->num_rows > 0) 
                { // Loop through and display services 
                    while ($row = $result->fetch_assoc()) 
                    { $serviceId = $row['Id']; $serviceTitle = $row['Title']; echo "<option value='" . $serviceId . "' data-title='" . strtolower($serviceTitle) . "'>" . $serviceTitle . "</option>"; } } else { echo "<option value=''>No services available</option>"; } 
                                                                ?>
            </select> <label>Send from Branch</label> <select name="Branch" required>
                <option value="">-- Select Branch --</option> <?php // Fetch services from the database 
                $sql1 = "SELECT * FROM branch"; $result1 = mysqli_query($conn, $sql1); 
                if (mysqli_num_rows($result1) >0) { // Loop through and display services 
                    while ($row1 = mysqli_fetch_array($result1)) { echo "<option value='" . $row1[0] . "'>" . $row1[1] . "</option>"; } } else { echo "<option value=''>No Branch available</option>"; } 
                                                                ?>
            </select> <!-- Weight input (hidden by default) -->
            <div id="weight_input" class="weight-input"> <label for="weight">Enter Parcel Weight (kg)</label> <input type="number" id="weight" name="weight" step="0.01" min="0" placeholder="Enter weight in kilograms"> </div>
        </div> <!-- Submit Button -->
        <div class="submit-btn"> <button type="submit">Submit</button> </div>
    </form>
    <div class="form-footer">
        <p>&copy; 2025 Courier Service | All rights reserved</p>
    </div>
    <script>
        function toggleWeightInput() {
            var serviceType = document.getElementById("service_type");
            var selectedOption = serviceType.options[serviceType.selectedIndex];
            var weightInput = document.getElementById("weight_input");
            if (selectedOption.getAttribute("data-title") === "by weight") {
                weightInput.style.display = "block";
            } else {
                weightInput.style.display = "none";
            }
        }
    </script> <?php include_once("footer.php") ?>
</body>

</html>