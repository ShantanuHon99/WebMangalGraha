<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Admin Panel</title>

    <style>

        .card1 {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin-left: 18vw;;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        input[type="password"] {
            font-family: 'Arial';
        }

        .submit-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
        }

        .container1 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f1f1f1;
        }

        .content {
            text-align: center;
        }

        .password-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-input-container i {
            position: absolute;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <img src="img\logo.png" alt="">
            
        </div>
        <br><br><br><br><br>
        <ul>
            <a href="dashboard.php"><li><span>Dashboard</span></li></a><br>
            <a href="subAdmin.html"><li><span>Sub-Admin</span></li></a><br>
            <a href="CheckRegi.php"><li><span>Check Registrations</span></li></a>
        </ul>
    </div>
    
    <div class="container1">
    
        <div class="content">
            
            <div class="card1">
                <h2>Admin Login</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" id="id" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="password-input-container">
                            <input type="password" id="password" name="password" required>
                            <i class='bx bx-low-vision' id="togglePassword"></i>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Submit</button>
                    
                </form>
            </div>
            
            <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            var passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        });
    </script>
            
            

        </div>
     
    </div>    
</body>
</html>
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your authentication logic here, e.g., checking against a database
    $adminId = $_POST["id"];
    $adminPassword = $_POST["password"];

    // Replace this with your actual authentication logic
    if ($adminId == "admin" && $adminPassword == "password") {
        // Authentication successful, set a session variable
        $_SESSION["admin_authenticated"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentication failed, handle accordingly
        echo "Invalid credentials";
    }
}
?>
