<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: masuk.php?login=belum_login');
    exit();
}
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$query = "SELECT * FROM buku
          INNER JOIN genre ON buku.id_genre = genre.id_genre
          INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori 
          WHERE (buku.judul LIKE '%$search%' OR buku.foto LIKE '%$search%' OR buku.penerbit LIKE '%$search%' OR buku.bahasa LIKE '%$search%')
          AND (buku.id_genre LIKE '%$filter%' OR buku.id_kategori LIKE '%$filter%') ORDER BY buku.judul";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Error executing query: ' . mysqli_error($connection));
}

if (isset($_GET['pesan'])) {
    header("Refresh:5; url=user.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman User</title>
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="rak.php">Bookshelf</a>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Filter
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="user.php">Clear Filter</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <p class="dropdown-item text-center disabled m-0"><strong>Kategori</strong></p>
                            </li>
                            <?php
                            $query1 = "SELECT * FROM kategori";
                            $result1 = mysqli_query($connection, $query1);
                            if ($result1) {
                                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                    <li>
                                        <a class="dropdown-item" href="user.php?filter=<?php echo $row1['id_kategori'] ?>"><?php echo $row1['kategori'] ?></a>
                                    </li>
                                <?php }
                            }
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <p class="dropdown-item text-center disabled m-0"><strong>Genre</strong></p>
                            </li>
                            <?php
                            $query1 = "SELECT * FROM genre";
                            $result1 = mysqli_query($connection, $query1);
                            if ($result1) {
                                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                    <li>
                                        <a class="dropdown-item" href="user.php?filter=<?php echo $row1['id_genre'] ?>"><?php echo $row1['genre'] ?></a>
                                    </li>
                                <?php }
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <h5 class="nav-link text-center text-light"><strong>Selamat datang,
                                <?php echo $_SESSION['username']; ?>
                            </strong></h5>
                    </li>
                </ul>
                <ul class=" justify-content-end" id="pencarian">
                    <br>
                    <form class="d-flex text-light" role="search" action="user.php" method="GET">
                        <?php
                        if (isset($filter)) { ?>
                            <input style="display: none;" type="text" name="filter" value="<?php echo $filter ?>">
                        <?php }
                        ?>
                        <input class="form-control me-2" type="search" name="search" placeholder="Search"
                            aria-label="Search" size="50">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <div id="progress-bar">
        <div id="progress-bar-fill"></div>
    </div>
    <p class="mt-5" style="text-align: center; font-size:20px"><b>Daftar Buku</b></p>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'berhasil_pinjam') {
            echo "<div class='mx-4 alert alert-success text-center'><b>Berhasil melakukan peminjaman buku</b></div>";
        }
        if ($_GET['pesan'] == 'gagal_pinjam') {
            echo "<div class='mx-4 alert alert-danger text-center'><b>Terjadi kesalahan sistem. gagal meminjam buku</b></div>";
        }
    }
    ?>
    <div class="card bg-body-tertiary rounded shadow p-3 mx-4 mb-4">
        <?php
        if (mysqli_num_rows($result) === 0) {
            echo '<div class="mx-auto">Buku tidak ditemukan / belum tersedia</div>';
        }

        if (mysqli_num_rows($result) > 0) {
            ?>
            <div class="row p-1">
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-3 mb-3 flex d-flex justify-content-center">
                        <div class="card shadow p-2" style="width: 18rem;">
                            <center>
                                <?php
                                if ($row['statuss'] == 'Dipinjam') {
                                    ?>
                                    <h4><span class="badge bg-danger">Dipinjam</span></h4>
                                    <?php
                                } else if ($row['statuss'] == 'Tersedia') {
                                    ?>
                                        <h4><span class="badge bg-success">Tersedia</span></h4>
                                    <?php
                                } ?>
                                <hr class="m-1">
                                <img src="img/<?php echo $row["foto"] ?>" class="card-img-top"
                                    style="width: 100%; aspect-ratio: 3/4; object-fit: contain;">
                                <hr class="m-1">
                                <center>
                                    <div class="card-body" style="min-height: 80px;">
                                        <b class="card-text">
                                            <?php echo $row['judul'] ?>
                                        </b>
                                    </div>
                                    <div class="card-footer">
                                        <div class="container" style="min-height:170px;">
                                            <p class="card-text" style="text-align: left;">Penerbit buku :
                                                <?php echo $row['penerbit'] ?>
                                            </p>
                                            <p class="card-text" style="text-align: left;">Bahasa buku :
                                                <?php echo $row['bahasa'] ?>
                                            </p>
                                            <p class="card-text" style="text-align: left;">Kategori :
                                                <?php echo $row['kategori']; ?>
                                            </p>
                                            <p class="card-text" style="text-align: left;">Genre :
                                                <?php echo $row['genre']; ?>
                                            </p>
                                        </div>
                                        <br>
                                        <div>
                                            <?php
                                            if ($row['statuss'] == 'Dipinjam') {
                                                ?>
                                                <a style="text-align: center;"
                                                    href="peminjaman.php?id_buku=<?php echo $row['id_buku'] ?>"
                                                    class="btn btn-dark mb-2 disabled" tabindex="-1" role="button"
                                                    aria-disabled="true" disabled data-bs-toggle="modal"
                                                    data-bs-target="#pinjamModal" onclick="setPinjamUrl(this.getAttribute('href'))">
                                                    Pinjam
                                                </a>
                                                <?php
                                            } else if ($row['statuss'] == 'Tersedia') {
                                                ?>
                                                    <a style="text-align: center;"
                                                        href="peminjaman.php?id_buku=<?php echo $row['id_buku'] ?>"
                                                        class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#pinjamModal"
                                                        onclick="setPinjamUrl(this.getAttribute('href'))">
                                                        Pinjam
                                                    </a>
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <?php
                    if ($i % 4 == 0) {
                        echo '</div><div class="row">';
                    }
                    $i++;
                }
        } ?>
        </div>
    </div>

    <div style="min-height: 200px"></div>
    <?php include 'footer.php' ?>

    <div id="pinjamModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin meminjam buku yang ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="pinjam" class="btn btn-success" href="peminjaman.php">Konfirmasi</a>
                </div>
            </div>
        </div>
    </div>
    <span id='date-time' style="visibility: hidden"></span>

    <script src="javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        function setPinjamUrl(url) {
            document.getElementById('pinjam').setAttribute('href', url);
        }
    </script>
    <script>
        document.getElementById('pinjam').addEventListener('click', function () {
            window.location.href = this.getAttribute('href');
            var dt = new Date();
            document.getElementById('date-time').innerHTML = dt;

        });
    </script>
</body>

</html>