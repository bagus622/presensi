<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        /* Desain untuk seluruh body */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            overflow: hidden;
        }

        /* Kontainer untuk login */
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Gaya untuk logo */
        .logo {
            width: 80px; /* Sesuaikan dengan ukuran logo Anda */
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #fff;
        }

        /* Styling untuk input */
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: 0.3s ease;
        }

        /* Fokus pada input */
        input:focus {
            border: 2px solid #ff416c;
            box-shadow: 0 0 8px rgba(255, 65, 108, 0.6);
        }

        /* Tombol login */
        .btn {
            background: #ff416c;
            color: #fff;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Hover efek pada tombol */
        .btn:hover {
            background: #ff4b2b;
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
            transform: translateY(-2px);
        }

        /* Styling untuk pesan error */
        .error {
            color: #ff4b5c;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .login-container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 1.8rem;
            }

            .logo {
                width: 60px; /* Menyesuaikan ukuran logo di perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo di atas form login -->
        <img src="img/1707014577662.png" alt="Logo" class="logo">

        <h1>Login Admin</h1>

        <!-- Cek apakah ada pesan error yang ditampilkan -->
        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<p class='error'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }
        ?>

        <form action="ferivikasiadmin.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</body>
</html>
