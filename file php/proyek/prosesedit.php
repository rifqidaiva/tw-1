<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?pesan=bukan_admin');
    exit();
}

include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$bahasa = $_POST['bahasa'];
$genre = $_POST['genre'];
$kategori = $_POST['kategori'];

$queryShow = "SELECT * FROM buku WHERE id_buku = $id_buku;";
$sqlShow = mysqli_query($connection, $queryShow);
$result = mysqli_fetch_assoc($sqlShow);

if ($_FILES['foto_buku']['name'] == "") {
    $foto = $result['foto'];
} else {
    $foto = $_FILES['foto_buku']['name'];
    unlink("img/" . $result['foto']);

    $dir = "img/";
    $tmpFile = $_FILES['foto_buku']['tmp_name'];
    move_uploaded_file($tmpFile, $dir . $foto);
}

$query = "UPDATE buku SET judul = '$judul', foto = '$foto', penerbit = '$penerbit', bahasa = '$bahasa', id_kategori = '$kategori', id_genre = '$genre' WHERE id_buku = '$id_buku';";
$sql = mysqli_query($connection, $query);

if (!$sql) {
    header("location:admin.php?status=edit_gagal");
} else {
    header("location:admin.php?status=edit_berhasil");
}
?>