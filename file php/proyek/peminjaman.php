<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: masuk.php?login=belum_login');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Peminjaman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                                <a class="dropdown-item" href="logout.php" role="button">Logout <svg
                                        xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <style>
                                            svg {
                                                fill: #8f8f8f
                                            }
                                        </style>
                                        <path
                                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                    </svg></a>
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
    </nav>

    <div id="progress-bar">
        <div id="progress-bar-fill"></div>
    </div>

    <p class="mt-5" style="text-align: center; font-size:20px"><b>Detail peminjaman: </b></p>
    <?php
    include 'koneksi.php';
    $tanggal_pinjam = date('Y-m-d');
    $pinjam = $_GET['id_buku'];
    $query = "SELECT * FROM buku WHERE id_buku LIKE '%$pinjam%'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); ?>
        <center>
            <div class="col-3 mb-5">
                <div class="card shadow p-2">
                    <center><img src="img/<?php echo $row["foto"] ?>" class="card-img-top" style="width: 100%;">
                        <center>
                            <div class="card-body">
                                <b class="card-text">Judul buku:
                                    <?php echo $row['judul'] ?>
                                </b>
                            </div>
                            <div class="card-footer">
                                <p class="card-text" style="text-align: left;">Penerbit buku :
                                    <?php echo $row['penerbit'] ?>
                                </p>
                                <p class="card-text" style="text-align: left;">Bahasa buku :
                                    <?php echo $row['bahasa'] ?>
                                </p>
                                <p class="card-text" style="text-align: left;">Peminjam :
                                    <?php echo $_SESSION['username'] ?>
                                </p>
                                <p class="card-text" style="text-align: left;">Tanggal peminjaman :
                                    <?php echo $tanggal_pinjam ?>
                                </p>
                                </p>
                            </div>
                </div>
            </div>
        </center>
        <?php
    } else {
        echo '<b class="text-danger">Terjadi kesalahan. Silakan coba lagi</b>';
    }
    ?>
    <center>
        <div class="mx-3 mb-4">
            <a class="btn btn-dark " href="user.php?search=" role="button">kembali</a>
            <a href="proses_pinjam.php?id_buku=<?php echo $pinjam ?>" class="btn btn-dark"
                onclick="setPinjamUrl(this.getAttribute('href'))">Pinjam</a>
        </div>
    </center>

    <div style="min-height: 80px"></div>
    <?php include 'footer.php' ?>

    <script src="javascript.js"></script>
    <script>
        function displayLocalTime() {
            var waktuLokal = new Date();
            var waktuString = waktuLokal.toLocaleString();

            document.getElementById("waktu").innerHTML = waktuString;
        }

        document.addEventListener("DOMContentLoaded", displayLocalTime);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>