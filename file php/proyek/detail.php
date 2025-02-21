<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?pesan=bukan_admin');
    exit();
}

include "koneksi.php";

$id = $_GET['id_buku'];
$query = "SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.id_buku = buku.id_buku INNER JOIN users ON peminjaman.id_user = users.id_user INNER JOIN genre ON buku.id_genre = genre.id_genre INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE peminjaman.id_buku = '$id';";
$sql = mysqli_query($connection, $query);
$result = mysqli_fetch_array($sql);

$stat_btn = "disabled";
$txt_btn = "User belum melakukan pengembalian";
if($result['user_pengembalian'] == "True"){
    $stat_btn = "";
    $txt_btn = "Konfirmasi";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div>
                <img src="logo.png" width="100" height="100">
                <a class="navbar-brand text-light" href="#">ARC</a>
            </div>

            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pencarian"
                    aria-controls="pencarian" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><img src="search.png" width="30" height="30"></span>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="icon.jpg" width="30" height="30"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pusat Akun
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="logout.php" role="button">Logout <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#8f8f8f}</style><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="syarat.php">Syarat & Ketentuan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="progress-bar">
        <div id="progress-bar-fill"></div>
    </div>

    <h3 class="mt-4" style="text-align:center">Detail Peminjaman</h3><br><br>
    <div class="container">
        <div class="card col-sm-12">
        <div class="card-body">
            <h4>Nama User : <?php echo $result['username']?></h4>
            <table class="table" id="tb1">
                <thead>
                    <tr>
                        <th>ID Peminjaman</th>
                        <th>ID User</th>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Kategori</th>
                        <th>Tanggal Pinjam</th>
                        <th>Konfirmasi pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $result['id_peminjaman']?></td>
                        <td><?php echo $result['id_user']?></td>
                        <td><?php echo $result['id_buku']?></td>
                        <td><?php echo $result['judul']?></td>
                        <td><?php echo $result['genre']?></td>
                        <td><?php echo $result['kategori']?></td>
                        <td><?php echo $result['tgl_pinjam']?></td>
                        <td><a href="kembali.php?kembalikan=<?php echo $result['id_buku'] ?> " class="btn btn-success <?php echo $stat_btn ?>"> <?php echo $txt_btn ?></a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </div>
    </div>
    <br><br>
    <center>
        <div class="mx-3 mb-4" style="min-height:120px;">
            <a class="btn btn-dark " href="admin.php?search=" role="button">kembali</a>
        </div>
    </center>

    <?php include 'footer.php' ?>
  <script src="javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>