<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: masuk.php?login=belum_login');
    exit();
}
include 'koneksi.php';

$id_buku = $_GET['id_buku'];
$user = $_SESSION['username'];

$query1 = "SELECT * FROM users WHERE username LIKE '%$user%'";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result1);
$iduser = $row1['id_user'];

$query2 = "SELECT * FROM buku WHERE id_buku LIKE '%$id_buku%'";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_assoc($result2);
$bjudul = $row2['judul'];

$tanggal_pinjam = date('Y-m-d');
$kondisi = "False";
$query3 = "INSERT INTO peminjaman (id_user, id_buku, judul, tgl_pinjam, user_pengembalian, admin_konfirmasi) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $query3);
mysqli_stmt_bind_param($stmt, 'iissss', $iduser, $id_buku, $bjudul, $tanggal_pinjam, $kondisi, $kondisi);
$result3 = mysqli_stmt_execute($stmt);

$query4 = "UPDATE buku SET statuss = 'Dipinjam' WHERE id_buku = '$id_buku';";
$sql = mysqli_query($connection, $query4);

if ($result3) {
    header('location: user.php?pesan=berhasil_pinjam');
} else {
    header('location: user.php?pesan=gagal_pinjam');
}
?>