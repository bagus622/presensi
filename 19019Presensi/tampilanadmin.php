<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Guru - Ekstra Seas</title>
    <style>
        /* Root styling for colors and font */
        :root {
            --primary-color: #ff416c;
            --secondary-color: #2D2D2D;
            --accent-color: #0FF0FC;
            --logout-color: #ff4b2b; /* Warna tombol logout */
            --logout-hover: #ff6f61; /* Warna hover tombol logout */
            --text-color: #f8f9fa;
            --bg-color: #1A1A1A;
            --card-bg: rgba(0, 0, 0, 0.6);
            --border-radius: 15px;
        }

        /* Global styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: var(--text-color);
            text-align: center;
            overflow: hidden;
        }

        /* Kontainer utama */
        .container {
            background: var(--card-bg);
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Logo di atas */
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }

        /* Styling untuk tombol utama */
        .btn {
            background-color: var(--primary-color);
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn:hover {
            background-color: var(--accent-color);
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
            transform: translateY(-2px);
        }

        /* Styling khusus tombol logout */
        .btn-logout {
            background-color: var(--logout-color);
            padding: 12px 25px;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-logout:hover {
            background-color: var(--logout-hover);
            box-shadow: 0 5px 15px rgba(255, 75, 43, 0.4);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <!-- Kontainer utama -->
    <div class="container">
        <!-- Logo di tengah atas -->
        <img src="img/1707014577662.png" alt="Logo" class="logo">

        <h1>Selamat Datang, Admin Guru</h1>
        <p>Di sini Anda dapat mengelola data siswa dan absen.</p>

        <!-- Tombol untuk mengelola data absen -->
        <a href="dataabsen_admin.php" class="btn">Kelola Data Absen</a>

        <!-- Tombol Logout -->
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
</body>
</html>
