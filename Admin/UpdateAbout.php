a<?php
if (isset($_POST["btn"])) {
  


include_once("../connection.php");
$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];






$run = mysqli_query($conn, "UPDATE `about` 
SET `title`='$a',`description`='$b'  WHERE id = $id");
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
                text: "About us updated successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "ShowAbout.php";
            });
        </script>
    </body>
    </html>';
}

?>