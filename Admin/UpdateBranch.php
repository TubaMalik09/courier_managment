<?php
if (isset($_POST["btn"])) {
  


include_once("../connection.php");
$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];
$e = $_POST["e"];
$f = $_POST["f"];







$run = mysqli_query($conn, "UPDATE `branch` 
SET `BranchName`='$a',`BranchCity`='$b',`BranchPhnum`='$c',`BranchEmail`='$d',`BranchAddress`='$e',`status`='$f' WHERE id = $id");
} 
if($run){
    echo '<!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: "Success!",
                text: "Branch Updated successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "ShowBranch.php";
            });
        </script>
    </body>
    </html>';
}

?>