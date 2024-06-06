<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - MOBILE LEGENDS</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 5;
            background-image:url('WR.jpg') ;
            background-size:contain ;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background-color: #000000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            width: 350px;
        }

        .login-form h2 {
            text-align: center;
            color: #ffffff;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 90%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-form button.login-button {
            width: 100%;
            padding: 10px;
            background-color: #858585;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button.login-button:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="login-proses.php" method="POST" class="login-form">
            <h2>LOGIN</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button" name="login">LOGIN</button>
        </form>
    </div>
    <h4>&copy; AYAM SAYUR</h4>
</body>
</html>
