<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Simpan data di cookie (berlaku selama 30 hari)
    setcookie('user_data', json_encode(['username' => $username, 'email' => $email, 'password' => $password]), time() + (86400 * 30), "/");

    echo"<script>
            alert('Registrasi berhasil!');
            window.location = 'HOME.html';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER - MOBILE LEGENDS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image:url('BEAR.jfif');
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .register-form h2 {
            text-align: center;
            color: #004466;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"] {
            width: 90%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .register-form button.register-button {
            width: 100%;
            padding: 10px;
            background-color: #000000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-form button.register-button:hover {
            background-color: #2f00ff;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form action="#" method="POST" class="register-form">
            <h2>REGISTRASI</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="register-button">BUAT</button>
        </form>
    </div>
</body>
</html>
