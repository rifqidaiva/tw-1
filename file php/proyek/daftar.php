<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['role'] == 'user') {
    header('Location: user.php');
    exit();
} elseif (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
    header('Location: admin.php');
    exit();
}

include 'koneksi.php';

// Ambil data dari form daftar akun
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);

// Cek apakah username sudah ada dalam database
$query = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "Username sudah terdaftar. Silakan gunakan username lain.";
} else {
    // Tambahkan akun ke database
    $query = "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('Location: masuk.php?daftar=suksess');
    } else {
        header('Location: masuk.php?daftar=gagal');
    }
}

mysqli_close($connection);
?>