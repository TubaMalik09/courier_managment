<?php
if (isset($_POST["btn"])) {
  


include_once("../connection.php");
$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];






$run = mysqli_query($conn, "UPDATE `websiteinfo` 
SET `name`='$a',`description`='$b',`email`='$c',`phnum`='$d'  WHERE id = $id");
} 
if($run){
    echo "<script>alert('Updated successfully!');
    window.location.href= 'ShowWebsite.php';
    </script>";
}

?>