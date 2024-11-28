<?php
// Konfigurasi koneksi ke database
$servername = "localhost"; // Host database
$username = "root";        // Username database
$password = "";            // Password database
$dbname = "19019_psas";    // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses penyimpanan data (jika ada request POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    if (!empty($nama) && !empty($tanggal) && !empty($status)) {
        $sql = "INSERT INTO absensi (nama, tanggal, status) VALUES ('$nama', '$tanggal', '$status')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Data absen berhasil disimpan.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p>Semua field harus diisi!</p>";
    }
}

// Menampilkan data absen
$sql = "SELECT * FROM absensi ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absen Siswa</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #4facfe, #00f2fe) !important;
            color: #fff !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            background: rgba(0, 0, 0, 0.6) !important;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff !important;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff !important;
            color: #333 !important;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4facfe !important;
            color: #fff !important;
            font-size: 1.1rem;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            font-size: 1rem;
        }

        .action-btn {
            padding: 8px 15px;
            font-size: 0.9rem;
            font-weight: bold;
            color: #fff !important;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin: 2px;
            transition: all 0.3s ease;
        }

        .edit-btn {
            background: #4caf50;
        }

        .edit-btn:hover {
            background: #45a049;
        }

        .delete-btn {
            background: #ff4b5c;
        }

        .delete-btn:hover {
            background: #ff3b4c;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff !important;
            background: #ff416c;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: #ff4b2b;
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }

            .container {
                padding: 15px;
                width: 100%;
                max-width: 100%;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Absen Siswa</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Menampilkan setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data absen.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="back-btn">Kembali ke Form Absen</a>
    </div>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
