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
        <label for="name">Branch name</label>
        <input type="text" placeholder="Branch Name" name="name" id="name" class="form-control">

        <label for="city">Branch City</label>
        <input type="text" placeholder="Branch City" name="city" id="city" class="form-control">
<br>
        <label for="phnum">Branch Phone Number</label>
        <input type="text" placeholder="Branch Phone number" name="phnum" id="phnum" class="form-control">
<br>
        <label for="email">Branch Email</label>
        <input type="email" placeholder="Branch Email" name="email" id="email" class="form-control">
<br>
        <label for="address">Branch Address</label>
        <input type="text" placeholder="Branch Address" name="address" id="address" class="form-control">
<br>






        
        <button type="submit" id="btn" name="btn" class="btn btn-primary">Create Branch</button>
    </form>

    <?php
    if (isset($_POST["btn"])) {
        $name = $_POST["name"];
        $city = $_POST["city"];
        $phnum = $_POST["phnum"];
        $email = $_POST["email"];
        $address = $_POST["address"];


        $run = mysqli_query($conn, "INSERT INTO `branch`(`BranchName`, `BranchCity`, `BranchPhnum`, `BranchEmail`, `BranchAddress`) 
        VALUES ('$name','$city','$phnum','$email','$address')");
    
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
                    text: "Branch Created successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "ShowBranch.php";
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