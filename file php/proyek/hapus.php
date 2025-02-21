<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?pesan=bukan_admin');
    exit();
}
include 'koneksi.php';
$id_buku = $_GET['hapus'];

$queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$sqlShow = mysqli_query($connection, $queryShow);
$result1 = mysqli_fetch_assoc($sqlShow);

unlink("img/" . $result1['foto']);

$query = "DELETE FROM buku WHERE id_buku='$id_buku'";
$result = mysqli_query($connection, $query);
if (!$result) {
    header("location:admin.php?search=&status=hapus_gagal");
} else {
    header("location:admin.php?search=&status=hapus_berhasil");
}
?>