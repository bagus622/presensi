<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "19019_psas";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM absensi WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href='dataabsen_admin.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
