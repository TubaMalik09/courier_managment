<?php
if (isset($_POST["btn"])) {
  


include_once("../connection.php");
$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];








$run = mysqli_query($conn, "UPDATE `service` SET `Title`='$a',`Description`='$b',`Price`='$c' WHERE id = $id");
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
                text: "Service Updated successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "ShowServices.php";
            });
        </script>
    </body>
    </html>';
}

?>