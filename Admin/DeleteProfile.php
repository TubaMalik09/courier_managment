<?php
if (isset($_GET["id"])) {
    include_once("../connection.php");
    $id = $_GET["id"];

    $run = mysqli_query($conn, "DELETE FROM `user` WHERE id = $id");

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
                    text: "Profile deleted successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "Profile.php";
                });
            </script>
        </body>
        </html>';
    }
}
?>
