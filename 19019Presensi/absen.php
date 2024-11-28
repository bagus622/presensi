<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absen Siswa</title>
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
        }

        /* Gaya untuk kontainer utama */
        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
        }

        /* Judul */
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        /* Gaya label dan input */
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        /* Gaya tombol */
        button {
            padding: 15px 30px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background: #ff416c;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        /* Gaya tombol saat hover */
        button:hover {
            background: #ff4b2b;
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
            transform: translateY(-3px);
        }

        /* Link kembali */
        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #00d2ff;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #3a7bd5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Absen Siswa</h1>
        <form action="dataabsen.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>

            <label for="tanggal">Tanggal:</label>
            <input type="datetime-local" id="tanggal" name="tanggal" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Alfa">Alfa</option>
            </select>

            <button type="submit">Submit</button>
        </form>
        <a href="index.php" class="back-link">Kembali ke Beranda</a>
    </div>
</body>
</html>
