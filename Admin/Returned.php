<?php
if (isset($_GET["id"])) {
    include_once("../connection.php");
    $id = $_GET["id"];

    $run = mysqli_query($conn, "UPDATE `addcourier` SET `status`='Returned' WHERE id = $id");

    if ($run) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: "Success!",
                    text: "Returned successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "ShowCourier.php";
                });
            </script>
        </body>
        </html>';
    }
}
?>
