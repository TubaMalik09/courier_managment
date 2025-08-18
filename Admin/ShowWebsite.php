<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Info</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Segoe UI", Tahoma, sans-serif;
            color: #333;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            background-color: #fff;
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            font-size: 1.25rem;
            font-weight: 600;
            color: #212529;
            padding: 0.75rem 1rem;
        }

        .table {
            margin-bottom: 0;
            font-size: 0.95rem;
            width: 100%;
        }

        .table thead {
            background-color: #f1f3f5;
        }

        .table thead th {
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.2s ease-in-out;
        }

        .table td, .table th {
            vertical-align: middle;
            padding: 0.75rem;
        }

        .no-data {
            text-align: center;
            padding: 1rem;
            color: #6c757d;
        }

        /* Only responsive addition */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>
<body>

<?php include_once("navbar.php") ?>

<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header">
            Website Information
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $run = mysqli_query($conn, "SELECT * FROM websiteinfo");
                    if ($run && mysqli_num_rows($run) > 0) {
                        while ($row = mysqli_fetch_array($run)) {
                            ?>
                            <tr>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td><?php echo $row[4]; ?></td>
                                <td><button class="btn btn-warning">Edit</button></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="6" class="no-data">No data found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>

</body>
</html>