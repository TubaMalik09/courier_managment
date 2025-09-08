<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../adminlogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

.btn-warning {
  background: #f6c23e;
  color: #fff;
}

.btn-warning:hover {
  background: #dda20a;
}

.btn-danger {
  background: #e74a3b;
  color: #fff;
}

.btn-danger:hover {
  background: #c0392b;
}

.btn-secondary {
  background: #858796;
  color: #fff;
}

.btn-secondary:hover {
  background: #6c757d;
}

.btn-primary {
  background: #4e73df;
  color: #fff;
}

.btn-primary:hover {
  background: #2e59d9;
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

.modal-body label {
  display: block;
  margin: 10px 0 5px;
  font-weight: 500;
  color: #444;
}

.modal-body input,
.modal-body select {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #d1d3e2;
  border-radius: 6px;
  margin-bottom: 15px;
  font-size: 14px;
  outline: none;
  transition: border 0.2s ease;
}

.modal-body input:focus,
.modal-body select:focus {
  border-color: #4e73df;
  box-shadow: 0 0 0 2px rgba(78,115,223,0.15);
}

/* No Data */
.no-data {
  text-align: center;
  padding: 20px;
  color: #999;
  font-style: italic;
}
</style>
<body>
    <?php
    include_once("navbar.php")
    ?>
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header">
            About us
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle"  id="a">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $run = mysqli_query($conn, "SELECT * FROM about");
                    if ($run && mysqli_num_rows($run) > 0) {
                        while ($row = mysqli_fetch_array($run)) {
                            ?>
                            <tr>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td> 
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>
                            </tr>

                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit About us </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="UpdateAbout.php" method="POST">
            <input type="hidden" name="id" id="" value="<?php echo $row[0] ?>">
            <label for="name">Name</label>
            <input type="text" placeholder="name" class="form-control" value="<?php echo $row[1] ?>" name="a">
            <label for="desc">Description</label>
            <input type="text" placeholder="description" class="form-control" value="<?php echo $row[2] ?>" name="b">
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn" >Save changes</button>
      </div>




        </form>
      </div>
   
    </div>
  </div>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="6" class="no-data">No data found</td></tr>';
                    }

                    
                    ?>
                    <!-- Button trigger modal -->


</div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    include_once("footer.php")
    ?>
</body>
</html>