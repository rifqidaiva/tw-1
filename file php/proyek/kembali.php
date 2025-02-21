<?php
session_start();
if (!isset($_SESSION['username']) && !($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')) {
    header('Location: masuk.php?login=belum_login');
    exit();
}
include "koneksi.php";

$id_buku = $_GET['kembalikan'];

if ($_SESSION['role'] == 'user') {
    $query = "UPDATE peminjaman SET user_pengembalian = 'True' WHERE id_buku='$id_buku'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:rak.php?&pengembalian=berhasil");
    } else {
        header("location:rak.php?&pengembalian=gagal");
    }
}

if ($_SESSION['role'] == 'admin') {
    $query = "UPDATE peminjaman SET admin_konfirmasi = 'True' WHERE id_buku='$id_buku'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:admin_rak.php?&pengembalian=berhasil");
    } else {
        header("location:admin_rak.php?&pengembalian=gagal");
    }
}

$query1 = "SELECT * FROM peminjaman WHERE id_buku='$id_buku'";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result1);

if ($result1) {
    if ($row1['user_pengembalian'] == "True") {
        if ($row1['user_pengembalian'] == "True" && $row1['admin_konfirmasi'] == "True") {
            $query2 = "DELETE FROM peminjaman WHERE id_buku='$id_buku'";
            $result2 = mysqli_query($connection, $query2);

            $query3 = "UPDATE buku SET statuss = 'Tersedia' WHERE id_buku = '$id_buku';";
            $result3 = mysqli_query($connection, $query3);

            if ($result3) {
                if ($_SESSION['role'] == 'user') {
                    header("location:rak.php?&status_pengembalian_berhasil");
                } elseif ($_SESSION['role'] == 'admin') {
                    header("location:admin.php?&status=pengembalian_berhasil");
                }
            } else {
                if ($_SESSION['role'] == 'user') {
                    header("location:rak.php?&status_pengembalian_gagal");
                } elseif ($_SESSION['role'] == 'admin') {
                    header("location:admin.php?&status=pengembalian_gagal");
                }
            }

        } else {
            header("location:rak.php?");
        }
    } else {
        header("location:rak.php");
    }
} else {
    header("location:rak.php?&status=unfound");
}
?>