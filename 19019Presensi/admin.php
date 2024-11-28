<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Admin - Absen Siswa</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Data Absensi Siswa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM absensi");
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <th scope='row'>{$no}</th>
                            <td>{$row['nama']}</td>
                            <td>{$row['tanggal']}</td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>