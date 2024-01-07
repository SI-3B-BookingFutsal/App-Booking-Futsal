<?php
// Lakukan koneksi ke database
$host = "localhost"; // Sesuaikan dengan host Anda
$username = "root"; // Sesuaikan dengan username Anda
$password = ""; // Sesuaikan dengan password Anda
$database = "futsal"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tangkap data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lindungi dari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query untuk mencari user di database
$query = "SELECT * FROM adm WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

// Periksa apakah user ditemukan
if ($result->num_rows == 1) {
    // Berhasil login
    session_start();
    $_SESSION['username'] = $username;
    header("Location: dashboard-admin.php"); // Ganti dengan halaman setelah login
} else {
    // Gagal login
    echo '<script>alert("Username atau Password salah!");</script>';
    echo '<script>window.location.href = "login-admin.php";</script>';
}

// Tutup koneksi
$conn->close();
?>
