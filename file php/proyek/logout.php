<?php
// Hapus semua data sesi
session_start();
session_destroy();

// Kembalikan ke halaman login
header('Location: index.php');
exit();
?>
