<?php
if (isset($_GET["id"])) {
    include_once("../connection.php");
    $id = $_GET["id"];

    $run = mysqli_query($conn, "UPDATE `addcourier` SET `status`='On the way' WHERE id = $id");

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
                    text: "On the way successfully!",
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
