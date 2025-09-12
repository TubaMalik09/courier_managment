<?php
// track_shipment.php

// 1. Database Connection (Update with your credentials)
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password
$dbname = "cms";    // Your database name (from the screenshot, it's 'cms')

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$shipment = null;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['consignment'])) {
    $trackingNo = $conn->real_escape_string($_GET['consignment']);

    // 2. SQL Query to fetch shipment details
    $sql = "SELECT * FROM addcourier WHERE trackingno = '$trackingNo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Shipment found
        $shipment = $result->fetch_assoc();
    } else {
        // No shipment found with this tracking number
        $error_message = "No shipment found with tracking number: " . htmlspecialchars($trackingNo);
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Status - CourierX</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --white: #FFFFFF;
            --light-grey: #F5F5F5;
            --dark-grey: #333333;
            --medium-grey: #666666;
            --success: #4CAF50;
            --warning: #FF9800;
            --error: #F44336;
            --shadow: rgba(0, 0, 0, 0.1);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--light-grey);
            color: var(--dark-grey);
            min-height: 100vh;
            overflow-x: hidden;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease;
        }

        .status-hero {
            min-height: 40vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: var(--white);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .status-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.1' d='M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,224C672,235,768,181,864,160C960,139,1056,149,1152,138.7C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
        }

        .status-title {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .status-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .status-section {
            padding: 4rem 2rem;
            background: var(--white);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--dark-grey);
            font-size: 2.5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .status-card-container {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .status-card {
            background: var(--white);
            border-radius: 1rem;
            box-shadow: 0 5px 20px var(--shadow);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border-left: 5px solid var(--primary-color);
            animation: fadeIn 0.8s ease-out;
        }

        .status-card .icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .status-card h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--dark-grey);
        }

        .status-card p {
            font-size: 1rem;
            color: var(--medium-grey);
            margin-bottom: 0.5rem;
        }

        .status-highlight {
            font-weight: 600;
            color: var(--dark-grey);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            margin-top: 1rem;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .status-badge.pending {
            background-color: rgba(255, 152, 0, 0.1);
            color: var(--warning);
        }

        .status-badge.processing {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--primary-color);
        }

        .status-badge.shipped {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success);
        }

        .status-badge.delivered {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success);
        }

        .status-badge.cancelled {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--error);
        }

        .details-grid {
            margin-top: 2rem;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            text-align: left;
        }

        .detail-item {
            background: var(--light-grey);
            padding: 1rem;
            border-radius: 0.75rem;
            border-left: 3px solid var(--primary-color);
        }

        .detail-item strong {
            display: block;
            margin-bottom: 0.25rem;
            color: var(--dark-grey);
            font-size: 0.9rem;
        }

        .detail-item span {
            font-size: 1rem;
            color: var(--medium-grey);
        }

        .error-message {
            color: var(--error);
            font-weight: 600;
            margin-top: 2rem;
            font-size: 1.2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .status-title {
                font-size: 2rem;
            }
            .status-subtitle {
                font-size: 1rem;
            }
            .section-title {
                font-size: 2rem;
            }
            .status-card {
                padding: 1.5rem;
            }
            .status-card h3 {
                font-size: 1.5rem;
            }
            .details-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include_once("navbar.php"); ?>
    <section class="status-hero">
        <h2 class="status-title">Shipment Status</h2>
        <?php if ($shipment): ?>
            <p class="status-subtitle">Details for Consignment No: <span class="status-highlight"><?php echo htmlspecialchars($shipment['trackingno']); ?></span></p>
        <?php else: ?>
            <p class="status-subtitle">Enter your consignment number to check status</p>
        <?php endif; ?>
    </section>

    <section class="status-section">
        <div class="status-card-container">
            <?php if ($shipment): ?>
                <div class="status-card fade-in">
                    <div class="icon">
                        <?php
                            // Icon based on status
                            $status = strtolower($shipment['status']);
                            if ($status == 'pending') {
                                echo '<i class="fas fa-hourglass-start"></i>';
                            } elseif ($status == 'processing') {
                                echo '<i class="fas fa-box"></i>';
                            } elseif ($status == 'shipped') {
                                echo '<i class="fas fa-truck-moving"></i>';
                            } elseif ($status == 'delivered') {
                                echo '<i class="fas fa-box-open"></i>';
                            } elseif ($status == 'cancelled') {
                                echo '<i class="fas fa-times-circle"></i>';
                            } else {
                                echo '<i class="fas fa-info-circle"></i>'; // Default icon
                            }
                        ?>
                    </div>
                    <h3>Current Status: <span class="status-badge <?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars(ucfirst($shipment['status'])); ?></span></h3>
                    <p>Last Updated: <span class="status-highlight"><?php echo htmlspecialchars($shipment['time-record']); ?></span></p>

                    <div class="details-grid">
                        <div class="detail-item">
                            <strong>Sender Name:</strong>
                            <span><?php echo htmlspecialchars($shipment['sender-name']); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Sender Email:</strong>
                            <span><?php echo htmlspecialchars($shipment['sender-email']); ?></span>
                        </div>
                        <!-- Removed Sender Phone -->
                        <!-- Removed Sender Address -->
                        <div class="detail-item">
                            <strong>Receiver Name:</strong>
                            <span><?php echo htmlspecialchars($shipment['receiver-name']); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Receiver Email:</strong>
                            <span><?php echo htmlspecialchars($shipment['receiver-email']); ?></span>
                        </div>
                        <!-- Removed Receiver Phone -->
                        <!-- Removed Receiver Address -->
                        <div class="detail-item">
                            <strong>Parcel Info:</strong>
                            <span><?php echo htmlspecialchars($shipment['parcel-info']); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Weight:</strong>
                            <span><?php echo htmlspecialchars($shipment['weight']); ?> kg</span>
                        </div>
                        <div class="detail-item">
                            <strong>Price:</strong>
                            <span>$<?php echo htmlspecialchars(number_format($shipment['price'], 2)); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Tax:</strong>
                            <span>$<?php echo htmlspecialchars(number_format($shipment['tax'], 2)); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Total:</strong>
                            <span>$<?php echo htmlspecialchars(number_format($shipment['total'], 2)); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Service ID:</strong>
                            <span><?php echo htmlspecialchars($shipment['service-id']); ?></span>
                        </div>
                        <div class="detail-item">
                            <strong>Branch ID:</strong>
                            <span><?php echo htmlspecialchars($shipment['branch']); ?></span>
                        </div>
                    </div>
                </div>
            <?php elseif (!empty($error_message)): ?>
                <div class="status-card fade-in">
                    <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h3>Error</h3>
                    <p class="error-message"><?php echo $error_message; ?></p>
                    <p>Please double-check your tracking number and try again.</p>
                </div>
            <?php else: ?>
                <div class="status-card fade-in">
                    <div class="icon"><i class="fas fa-info-circle"></i></div>
                    <h3>Enter Tracking Number</h3>
                    <p>Use the search bar on the previous page or manually enter a consignment number in the URL (e.g., `track_shipment.php?consignment=CX123456789`) to view details.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php include_once("footer.php"); ?>
</body>
</html>