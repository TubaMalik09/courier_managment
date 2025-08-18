<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</head>
<body>
    <?php
    include_once("navbar.php")
    ?>
    <form method="POST" id="form">
        <label for="name">Title</label>
        <input type="text" placeholder="Title" name="title" id="name" class="form-control">
        
        <label for="desc">Description</label>
        <input type="text" placeholder="Description" name="desc" id="desc" class="form-control">
        
        <button type="submit" id="btn" name="btn" class="btn btn-primary">Create About</button>
    </form>

    <?php
    if (isset($_POST["btn"])) {
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        $run = mysqli_query($conn, "INSERT INTO `about`(`title`, `description`) VALUES ('$title','$desc')");
    
    if($run){
        ?>
    <script>
        alert('Successfully added about us!');
        window.location.href = 'CreateAbout.php';
    </script>
    <?php } }
    ?>
    <?php
    include_once("footer.php")
    ?>
</body>
</html>
