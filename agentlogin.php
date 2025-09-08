<?php
session_start(); // Start the session at the very beginning
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Login Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Your existing CSS goes here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo i {
            font-size: 42px;
            color: #4A90E2;
            margin-bottom: 15px;
        }
        
        .logo h1 {
            font-size: 28px;
            color: #333;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .logo p {
            color: #777;
            margin-top: 8px;
            font-size: 15px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 35px; /* Increased to accommodate error messages */
        }
        
        .input-group i.fa-user, .input-group i.fa-lock {
            position: absolute;
            left: 15px;
            top: 15px; /* Fixed position relative to input */
            color: #4A90E2;
            font-size: 18px;
            z-index: 2;
        }
        
        .input-group input {
            width: 100%;
            padding: 15px 45px 15px 45px;
            border: 2px solid #eaeaea;
            border-radius: 10px;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
            outline: none;
            background: #fafafa;
            position: relative;
        }
        
        .input-group input:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 10px rgba(74, 144, 226, 0.2);
            background: #fff;
        }
        
        .input-group input::placeholder {
            color: #aaa;
        }
        
        .input-error {
            border-color: #ff4757 !important;
        }
        
        .error-message {
            color: #ff4757;
            font-size: 14px;
            margin-top: 5px;
            display: none;
            position: absolute;
            bottom: -22px;
            left: 0;
        }
        
        .btn-login {
            width: 100%;
            padding: 15px;
            background: #4A90E2;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            background: #3a80d2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }
        
        .forgot-password a {
            color: #4A90E2;
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s ease;
            position: relative;
            font-weight: 500;
        }
        
        .forgot-password a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #4A90E2;
            transition: width 0.3s ease;
        }
        
        .forgot-password a:hover::after {
            width: 100%;
        }
        
        @media (max-width: 500px) {
            .login-container {
                padding: 30px 20px;
            }
            
            .logo h1 {
                font-size: 24px;
            }
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 15px; /* Fixed position relative to input */
            cursor: pointer;
            color: #4A90E2;
            z-index: 2;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #3a80d2;
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transform: translateX(150%);
            transition: transform 0.4s ease;
            z-index: 1000;
            border-left: 4px solid #4CAF50; /* Default success */
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification.error {
            border-left: 4px solid #F44336; /* Error color */
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <i class="fas fa-user-shield"></i>
            <h1>AGENT LOGIN</h1>
            <p>Access your control panel</p>
        </div>
        
        <!-- Form now submits to login_process.php -->
        <form id="loginForm" action="login_process.php" method="POST"> 
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                <div class="error-message" id="username-error">Please enter your username</div>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password">
                <span class="password-toggle" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
                <div class="error-message" id="password-error">Please enter your password</div>
            </div>
            
            <button type="submit" class="btn-login">LOGIN</button>
        </form>
        
        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
    </div>
    
    <div class="notification" id="notification">
        <span id="notification-message"></span>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password'); // Renamed to avoid conflict

        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Show notification function (unchanged)
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const messageElement = document.getElementById('notification-message');
            
            messageElement.textContent = message;
            notification.className = 'notification ' + type;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
        
        // Form validation (client-side, unchanged)
        function validateForm() {
            let isValid = true;
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const usernameError = document.getElementById('username-error');
            const passwordError = document.getElementById('password-error');
            
            // Reset previous error states
            username.classList.remove('input-error');
            password.classList.remove('input-error');
            usernameError.style.display = 'none';
            passwordError.style.display = 'none';
            
            // Validate username
            if (!username.value.trim()) {
                username.classList.add('input-error');
                usernameError.style.display = 'block';
                isValid = false;
            }
            
            // Validate password
            if (!password.value.trim()) {
                password.classList.add('input-error');
                passwordError.style.display = 'block';
                isValid = false;
            }
            
            return isValid;
        }
        
        // Form submission handler
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            // Only prevent default if client-side validation fails
            if (!validateForm()) {
                e.preventDefault(); // Stop form submission
                showNotification('Please fill in all required fields', 'error');
                return;
            }
            
            // If client-side validation passes, the form will submit normally to login_process.php
            // The PHP will then handle authentication and redirection.
            
            // Optionally, you can show a loading state on the button here,
            // but the browser will handle the redirect once PHP is done.
            const btn = document.querySelector('.btn-login');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> AUTHENTICATING...';
            btn.disabled = true;
        });
        
        // Clear error when user starts typing (unchanged)
        document.getElementById('username').addEventListener('input', function() {
            this.classList.remove('input-error');
            document.getElementById('username-error').style.display = 'none';
        });
        
        document.getElementById('password').addEventListener('input', function() {
            this.classList.remove('input-error');
            document.getElementById('password-error').style.display = 'none';
        });

        // PHP error message display
        <?php
        if (isset($_SESSION['error_message'])) {
            echo "document.addEventListener('DOMContentLoaded', function() {";
            echo "  showNotification('" . addslashes($_SESSION['error_message']) . "', 'error');";
            echo "});";
            unset($_SESSION['error_message']); // Clear the message after displaying
        }
        ?>
    </script>
</body>
</html>