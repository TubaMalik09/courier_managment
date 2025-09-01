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







$run = mysqli_query($conn, "UPDATE `agent` SET `name`='$a',`email`='$b',`password`='$c',`gender`='$d',`phone number`='$e',`branch_id`='$f' WHERE id = $id");
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
                text: "Agent Updated successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "ShowAgent.php";
            });
        </script>
    </body>
    </html>';
}

?>