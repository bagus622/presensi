<?php
session_start();

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "19019_psas");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']); // Hash password agar cocok dengan database

// Query cek username dan password
$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika login berhasil
    $_SESSION['admin'] = $username; // Simpan sesi admin
    header("Location: tampilanadmin.php"); // Redirect ke halaman admin
    exit();
} else {
    // Jika login gagal
    echo "<script>
        alert('Username atau password salah!');
        window.location.href='login.php';
    </script>";
}

$conn->close();
?>
