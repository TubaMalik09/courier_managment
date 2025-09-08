<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            margin-top: 40px;
        }
        form {
            max-width: 800px;
            margin: auto;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        .section {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .submit-btn {
            margin-top: 30px;
            text-align: center;
        }
        button {
            padding: 10px 30px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <?php include_once("navbar.php") ;?>

    <!-- <form action="submit_courier.php" method="post">
        <h1>Courier Booking Form</h1>

       
        <div class="section">
            <h2>Sender Information</h2>
            <label for="sender_name">Name</label>
            <input type="text" id="sender_name" name="sender_name" required>

            <label for="sender_email">Email</label>
            <input type="email" id="sender_email" name="sender_email" required>

            <label for="sender_phone">Phone Number</label>
            <input type="tel" id="sender_phone" name="sender_phone" required>

            <label for="sender_address">Address</label>
            <textarea id="sender_address" name="sender_address" rows="3" required></textarea>
        </div>

        <div class="section">
            <h2>Receiver Information</h2>
            <label for="receiver_name">Name</label>
            <input type="text" id="receiver_name" name="receiver_name" required>

            <label for="receiver_email">Email</label>
            <input type="email" id="receiver_email" name="receiver_email" required>

            <label for="receiver_phone">Phone Number</label>
            <input type="tel" id="receiver_phone" name="receiver_phone" required>

            <label for="receiver_address">Address</label>
            <textarea id="receiver_address" name="receiver_address" rows="3" required></textarea>
        </div>
     <div class="section">
            <h2>Parcel Information</h2>
            <label for="parcel_info">Details</label>
            <textarea id="parcel_info" name="parcel_info" rows="3" required></textarea>

            <label for="service_type">Select Service</label>
            <select id="service_type" name="service_type" required>
                <option value="">-- Select Service --</option>
                <option value="by_weight">By Weight</option>
                <option value="overnight">Overnight Express</option>
                <option value="same_day">Same Day Delivery</option>
                <option value="documents">Documents</option>
            </select>
        </div>

     
        <div class="submit-btn">
            <button type="submit">Submit</button>
        </div>
    </form> -->

    <?php include_once("footer.php"); ?>
</body>
</html>
