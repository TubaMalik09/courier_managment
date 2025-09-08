<?php
if (isset($_POST["btn"])) {
  


include_once("../connection.php");
$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];








$run = mysqli_query($conn, "UPDATE `addcourier` SET `sender-name`='$a',`receiver-name`='$b',`total`='$c',`trackingno`='$d' WHERE id = $id");
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
                window.location.href = "ShowCourier.php";
            });
        </script>
    </body>
    </html>';
}

?>