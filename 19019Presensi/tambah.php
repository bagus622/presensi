<?php
// Menghubungkan ke database
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];  // Mengganti absensi menjadi tanggal
    $status = $_POST['status'];

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO absensi (nama, tanggal, status) VALUES ('$nama', '$tanggal', '$status')";
    if (mysqli_query($kon, $query)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='dataabsen_admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data'); window.location='tambah.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Admin Guru</title>
    <style>
        /* Root styling untuk warna dan font */
        :root {
            --primary-color: #1F75FE;
            --secondary-color: #2D2D2D;
            --accent-color: #0FF0FC;
            --text-color: #f8f9fa;
            --bg-color: #1A1A1A;
            --card-bg: #282828;
            --border-radius: 10px;
        }

        /* Global styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: var(--card-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            color: var(--text-color);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        /* Styling untuk input fields */
        input[type="text"], input[type="datetime-local"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #333;
            color: var(--text-color);
        }

        /* Styling untuk tombol */
        button {
            background: var(--primary-color);
            color: var(--text-color);
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: var(--accent-color);
        }

        /* Styling untuk link kembali */
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: var(--primary-color);
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Data Siswa</h2>
        <form action="tambah.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Siswa" required>

            <!-- Input Tanggal -->
            <input type="datetime-local" name="tanggal" required>

            <!-- Dropdown untuk Status -->
            <select name="status" required>
                <option value="">Pilih Status</option>
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Izin">Alfa</option>
            </select>

            <button type="submit">Tambah Data</button>
        </form>
        <a href="dataabsen_admin.php" class="back-link">Kembali ke Beranda</a>
    </div>

</body>
</html>
