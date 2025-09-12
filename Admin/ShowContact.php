<?php
session_start();


?>

<?php
include_once("navbar.php"); // Assuming navbar.php includes database connection ($conn)

// Include database connection if not already in navbar.php
if (!isset($conn)) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Contact Messages</title>
    <!-- Bootstrap CSS - make sure you have it linked in your navbar.php or here -->
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        /* Container & Card */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 15px;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: white !important;
            text-align: center;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        .table thead {
            background: #f1f3f6;
        }

        .table th {
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            color: #444;
            border-bottom: 2px solid #e0e6ed;
        }

        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9edf3;
            transition: background 0.2s ease;
            max-width: 250px; /* Limit width for message/subject */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .table tbody tr:hover {
            background: #f9fbfd;
        }

        /* Buttons */
        .btn {
            padding: 6px 14px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-info {
            background: #36b9cc;
            color: #fff;
        }

        .btn-info:hover {
            background: #258f9f;
        }

        .btn-danger {
            background: #e74a3b;
            color: #fff;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        /* Modal */
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: #f8f9fc;
            border-bottom: 1px solid #e0e6ed;
            padding: 12px 20px;
        }

        .modal-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-body p {
            margin-bottom: 10px;
        }

        .modal-body strong {
            color: #444;
        }

        /* No Data */
        .no-data {
            text-align: center;
            padding: 20px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header">
                Contact Messages
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Submission Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $run = mysqli_query($conn, "SELECT * FROM contact ORDER BY submission_date DESC");
                        if ($run && mysqli_num_rows($run) > 0) {
                            while ($row = mysqli_fetch_array($run)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo date('Y-m-d H:i:s', $row['submission_date']); ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewMessageModal<?php echo $row['id']; ?>">View</button>
                                        <a href="DeleteContact.php?id=<?php echo $row['id']; ?>"></a>
                                    </td>
                                </tr>

                                <!-- View Message Modal -->
                                <div class="modal fade" id="viewMessageModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewMessageModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewMessageModalLabel<?php echo $row['id']; ?>">Message from <?php echo $row['name']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                                <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                                                <p><strong>Subject:</strong> <?php echo $row['subject']; ?></p>
                                                <p><strong>Message:</strong></p>
                                                <p style="white-space: pre-wrap; word-wrap: break-word;"><?php echo $row['message']; ?></p>
                                                <p><strong>Submitted On:</strong> <?php echo date('Y-m-d H:i:s', $row['submission_date']); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="8" class="no-data">No contact messages found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include_once("footer.php"); ?>
</body>
</html>