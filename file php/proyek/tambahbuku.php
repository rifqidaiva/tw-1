<?php
session_start();

// Periksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?pesan=bukan_admin');
    exit();
}

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'perpustakaan';

$connection = mysqli_connect($host, $username, $password, $database);
mysqli_select_db($connection, $database);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form tambah buku
$id_buku = '';
$judul = $_POST['judul'];
$foto = $_FILES['foto_buku']['name'];
$penerbit = $_POST['penerbit'];
$bahasa = $_POST['bahasa'];
$genre = $_POST['genre'];
$kategori = $_POST['kategori'];
$statuss = 'Tersedia';

$dir = "img/";
$tmpFile = $_FILES['foto_buku']['tmp_name'];

move_uploaded_file($tmpFile, $dir . $foto);

// Tambahkan data ke database

$query = "INSERT INTO buku VALUES('$id_buku', '$judul', '$foto', '$penerbit', '$bahasa', '$kategori', '$genre', '$statuss')";
$sql = mysqli_query($connection, $query);

if ($sql) {
    header("location:admin.php?search=&status=tambah_berhasil");
} else {
    header("location:admin.php?search=&status=tambah_gagal");
}

mysqli_close($connection);
?>