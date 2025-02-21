<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'perpustakaan';

$connection = mysqli_connect($host, $username, $password, $database);

mysqli_select_db($connection, $database);
?>