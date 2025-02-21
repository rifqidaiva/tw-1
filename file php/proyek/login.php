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

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);

// Periksa login
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    if ($row['role'] == 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: user.php');
    }
} else {
    header('location: masuk.php?login=gagal');
    exit();
}
?>