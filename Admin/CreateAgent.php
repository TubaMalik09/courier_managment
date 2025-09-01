<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("navbar.php")
    ?>
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
        <label for="name">Agent Name</label>
        <input type="text" placeholder="Agent Name" name="name" id="name" class="form-control">

        <label for="email">Agent Email</label>
        <input type="text" placeholder="Agent Email" name="email" id="email" class="form-control">
<br>
        <label for="password">Agent Password</label>
        <input type="text" placeholder="Agent Password" name="password" id="password" class="form-control">
<br>
<label for="gender">Agent Gender</label>
        <div class="gender-options">
            <input type="radio" name="gender" value="Male" id="male"> Male 
            <input type="radio" name="gender" value="Female" id="female"> Female 
            <input type="radio" name="gender" value="Other" id="other"> Other 
<br><br>
        <label for="phnum">Agent Phone Number</label>
        <input type="text" placeholder="Agent Phone Number" name="phnum" id="phnum" class="form-control">
<br>
        <label for="branch_id">Branch Id</label>
            <select name="branch_id" id="branch_id" class="form-control">
                <option value="" disabled>Select branch</option>
                <?php
                $_fetchbranch = mysqli_query($conn, "select * from branch order by record_time desc"); 
                while($row= mysqli_fetch_array($_fetchbranch)){?>
                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php    }
                ?>
            </select>
<br>




        
        <button type="submit" id="btn" name="btn" class="btn btn-primary">Create Branch</button>
    </form>

    <?php
    if (isset($_POST["btn"])) {
        $a = $_POST["name"];
        $b = $_POST["email"];
        $c = $_POST["password"];
        $d = $_POST["gender"];
        $e = $_POST["phnum"];
        $f = $_POST["branch_id"];
        


        $run = mysqli_query($conn, "INSERT INTO `agent`(`name`, `email`, `password`, `gender`, `phone number`, `branch_id`) 
        VALUES ('$a','$b','$c','$d','$e','$f')");
    
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
                    window.location.href = "ShowAgent.php";
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

</body>
</html>