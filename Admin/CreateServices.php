<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        /* Form styling */
        #form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
            width: 100%;
        }

        /* Label styling */
        label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        /* Input for title (name) */
        #name {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease-in-out;
        }

        /* Input for description (desc) */
        #desc {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease-in-out;
        }

        /* Focus effect for inputs */
        #name:focus, #desc:focus {
            border-color: #3498db;
            outline: none;
        }

        /* Button styling */
        #btn {
            width: 100%;
            padding: 12px;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #btn:hover {
            background-color: #2980b9;
        }


    </style>
<body>
    <?php
    include_once("navbar.php")
    ?>
 <form method="POST" id="form">
        <label for="Title">Service Title</label>
        <input type="text" placeholder="Service Title" name="a" id="name" class="form-control">

        <label for="desc">Service Description</label>
        <textarea placeholder="Service Description" name="b" id="desc" class="form-control"></textarea>

        <label for="Price">Service Price</label>
        <input type="text" placeholder="Service Price" name="c" id="Price" class="form-control">
<br>
  






        
        <button type="submit" id="btn" name="btn" class="btn btn-primary">Create Service</button>
    </form>

    <?php
    if (isset($_POST["btn"])) {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];



        $run = mysqli_query($conn, "INSERT INTO `service`(`Title`, `Description`, `Price`) VALUES ('$a','$b','$c')");
    
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
                    text: "Service Created successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "ShowServices.php";
                });
            </script>
        </body>
        </html>';

     } }
    ?>  
<?php
    include_once("footer.php")
    ?>
</body>
</html>