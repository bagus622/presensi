<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <style>
        /* Gaya untuk seluruh halaman */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #4facfe, #00f2fe);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden; /* Hindari scrolling yang tidak perlu */
        }

        /* Gaya untuk kontainer utama */
        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Judul */
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        /* Gaya untuk logo */
        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        /* Gaya tombol */
        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background: #ff416c;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Gaya tombol saat hover */
        .button:hover {
            background: #ff4b2b;
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
            transform: translateY(-3px);
        }

        /* Gaya untuk tombol kedua */
        .button.secondary {
            background: #00d2ff;
        }

        .button.secondary:hover {
            background: #3a7bd5;
            box-shadow: 0 5px 15px rgba(0, 210, 255, 0.4);
            transform: translateY(-3px);
        }

        /* Gaya teks */
        .welcome-text {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo di atas kolom -->
        <img src="img/1707014577662.png" alt="Logo" class="logo">

        <!-- Teks Selamat Datang yang Berganti-ganti -->
        <div class="welcome-text">
            Selamat Datang di Sistem Absensi
        </div>

        <!-- Tombol Absen dan Login -->
        <a href="absen.php" class="button">Absen Sekarang</a>
        <a href="login.php" class="button secondary">Login Admin</a>
    </div>

    <!-- Script untuk animasi teks -->
    <script>
        // Animasi teks menggunakan JavaScript
        const welcomeText = document.querySelector('.welcome-text');
        const texts = [
            "Selamat Datang di Absensi SMKN 1 Bawang",
            "Absensi Mudah dan Cepat",
            "Terima Kasih Sudah Menggunakan Sistem Ini"
        ];

        let i = 0;
        setInterval(() => {
            welcomeText.textContent = texts[i];
            i = (i + 1) % texts.length;
        }, 5000); // Ganti teks setiap 5 detik
    </script>
</body>
</html>
