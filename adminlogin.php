<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #2c3e50, #3498db);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      transition: 0.3s ease;
    }

    .input-group input:focus {
      border-color: #3498db;
      outline: none;
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-btn:hover {
      background-color: #2980b9;
    }

    .bottom-text {
      text-align: center;
      margin-top: 15px;
      color: #555;
    }

    .bottom-text a {
      color: #3498db;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2>Login</h2>
    <form action="" method="POST">
      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
      </div>

      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password">
      </div>

      <button type="submit" class="login-btn" name ="btn">Login</button>

      <div class="bottom-text">
        I am Agent? <a href="agentlogin.php">Login</a>
      </div>
    </form>
  </div>





<?php 
include_once("connection.php");
session_start();
if(isset($_POST["btn"])){
    $e = $_POST["email"];
    $p = $_POST["password"];

$query ="select * from user where Email = '$e' and Password = '$p' and Role='admin'";
$run = mysqli_query($conn, $query);
if(mysqli_num_rows($run) == 1){
    $data = mysqli_fetch_array($run);
    $_SESSION["userId"] = $data[0];
    $_SESSION["userName"] = $data[1];
   echo" <script>
    alert('login Successful');
    window.location.href=' admin/index.php';
    </script>";

}
  echo"<script>
alert('Invlid Credentials')
</script>";


}

?>




</body>
</html>
