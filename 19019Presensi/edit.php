<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "19019_psas";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM absensi WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "UPDATE absensi SET nama = '$nama', tanggal = '$tanggal', status = '$status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href='dataabsen_admin.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Absen</title>
    <style>
        /* Root styling untuk warna dan font */
        :root {
            --primary-color: #1F75FE;
            --secondary-color: #2D2D2D;
            --accent-color: #0FF0FC;
            --text-color: #fff;
            --bg-color: #282828;
            --form-bg-color: rgba(0, 0, 0, 0.7);
            --border-radius: 10px;
        }

        /* Global styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #4facfe, #00f2fe);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container form styling */
        .container {
            width: 90%;
            max-width: 600px;
            background: var(--form-bg-color);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        label {
            font-size: 1rem;
            margin-bottom: 5px;
            display: block;
            color: var(--text-color);
        }

        input, select {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background: #333;
            color: var(--text-color);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            border: none;
            color: var(--text-color);
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: var(--accent-color);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Absen</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
            
            <label>Tanggal:</label>
            <input type="datetime-local" name="tanggal" value="<?php echo date('Y-m-d\TH:i', strtotime($row['tanggal'])); ?>" required><br>
            
            <label>Status:</label>
            <select name="status" required>
                <option value="Hadir" <?php if ($row['status'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                <option value="Sakit" <?php if ($row['status'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
                <option value="Izin" <?php if ($row['status'] == 'Izin') echo 'selected'; ?>>Izin</option>
                <option value="Alfa" <?php if ($row['status'] == 'Alfa') echo 'selected'; ?>>Alfa</option>
            </select><br>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
