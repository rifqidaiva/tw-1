<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: masuk.php?pesan=belum_login');
    exit();
}
include "koneksi.php";

$name = $_SESSION['username'];
$q = "SELECT * FROM users WHERE username = '$name';";
$sql = mysqli_query($connection, $q);
$r = mysqli_fetch_array($sql);
$user = $r['id_user'];

$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM buku 
            INNER JOIN peminjaman ON buku.id_buku = peminjaman.id_buku 
            INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori 
            INNER JOIN genre ON buku.id_genre = genre.id_genre 
            WHERE peminjaman.id_user = $user 
            AND (buku.judul LIKE '%$search%' 
            OR buku.foto LIKE '%$search%' 
            OR buku.penerbit LIKE '%$search%' 
            OR buku.bahasa LIKE '%$search%' 
            OR kategori.kategori LIKE '%$search%' 
            OR genre.genre LIKE '%$search%') ORDER BY buku.judul;";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Error executing query: ' . mysqli_error($connection));
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
                        <a class="nav-link active text-light" aria-current="page" href="user.php">Dashboard</a>
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h5 class="nav-link text-center text-light"><strong>Selamat datang,
                            <?php echo $_SESSION['username']; ?>
                        </strong></h5>
                </li>
            </ul>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="pencarian">
                <br>
                <form class="d-flex text-light" role="search" action="rak.php" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search" size="50">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="progress-bar">
        <div id="progress-bar-fill"></div>
    </div>
    <div class="row my-4 mx-4 p-1">
        <div class="col-4">
            <p style="text-align: left; font-size:20px"><b>Rak Buku-ku:</b></p>
        </div>
        <div class="card bg-body-tertiary rounded shadow ms-auto">
            <table class="table table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Peminjaman</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Bahasa</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) === 0) {
                        echo '<tr><td colspan="9">Tidak ada data</td></tr>';
                    } else {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stat_btn = "";
                            $txt_btn = "Kembalikan";
                            if ($row['user_pengembalian'] == "True") {
                                $stat_btn = "disabled";
                                $txt_btn = "Mengkonfimasi...";
                            }
                            echo "<tr>";
                            echo "   <th scope=\"row\">" . $i . "</th>";
                            echo "   <td>" . $row['id_peminjaman'] . "</td>";
                            echo "   <td>" . $row['judul'] . "</td>";
                            echo "   <td>" . $row['penerbit'] . "</td>";
                            echo "   <td>" . $row['bahasa'] . "</td>";
                            echo "   <td>" . $row['genre'] . "</td>";
                            echo "   <td>" . $row['kategori'] . "</td>";
                            echo "   <td>" . $row['tgl_pinjam'] . "</td>";
                            echo '<td><a href="kembali.php?kembalikan=' . $row['id_buku'] . '" class="btn btn-dark ' . $stat_btn . '">' . $txt_btn . '</a></td>';
                            echo "</tr>";
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div style="min-height:100px;"></div>
    <?php include 'footer.php' ?>

    <script src="javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        function setDeleteUrl(url) {
            document.getElementById('deleteButton').setAttribute('href', url);
        }
    </script>
</body>

</html>