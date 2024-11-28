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
            background: linear-gradient(to bottom, #4facfe, #00f2fe);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff;
        }

        /* Styling untuk form pencarian */
        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            width: 300px;
            margin-right: 10px;
            background-color: #fff;
            color: #333;
        }

        .search-container button {
            padding: 10px 15px;
            font-size: 1rem;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            color: #333;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4facfe;
            color: #fff;
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
            color: #fff;
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
            color: #fff;
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
        /* Styling untuk tombol "Tambah Data" */
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            background: #4caf50;  /* Warna hijau untuk tombol "Tambah Data" */
            border: none;
            border-radius: 25px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #45a049;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
            transform: translateY(-3px);
        }

        .btn:active {
            background: #388e3c;
            transform: translateY(1px); /* Efek tombol saat diklik */
        }

        /* Responsive Design untuk tombol */
        @media (max-width: 768px) {
            .btn {
                font-size: 1rem;
                padding: 8px 20px;
        }
    }

    </style>
</head>
<body>
    <div class="container">
        <h1>Data Absen Siswa</h1>

        <!-- Form Pencarian -->
        <div class="search-container">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Cari." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit">Cari</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "19019_psas";
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                $search_query = "";
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = $conn->real_escape_string($_GET['search']);
                    $search_query = "WHERE nama LIKE '%$search%' OR status LIKE '%$search%' OR tanggal LIKE '%$search%'";
                }

                $sql = "SELECT * FROM absensi $search_query ORDER BY tanggal DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='action-btn edit-btn'>Edit</a>
                                <a href='hapus.php?id=" . $row['id'] . "' class='action-btn delete-btn' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data yang cocok dengan pencarian.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <a href="tampilanadmin.php" class="back-btn">Kembali ke Beranda</a>
        <a href="tambah.php" class="btn">Tambah Data</a>
    </div>
</body>
</html>
