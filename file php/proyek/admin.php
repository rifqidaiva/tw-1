<?php
session_start();

// Periksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?pesan=bukan_admin');
    exit();
}

include 'koneksi.php';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$query = "SELECT * FROM buku 
            INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori 
            INNER JOIN genre ON buku.id_genre = genre.id_genre 
            WHERE (buku.judul LIKE '%$search%' 
            OR buku.foto LIKE '%$search%' 
            OR buku.penerbit LIKE '%$search%' 
            OR buku.bahasa LIKE '%$search%' 
            OR kategori.kategori LIKE '%$search%' 
            OR genre.genre LIKE '%$search%')
            AND (buku.statuss LIKE '%$filter%') ORDER BY buku.judul;";
$result = mysqli_query($connection, $query);



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
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="admin.php?search=">Dashboard</a>
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
                                    <a class="dropdown-item" href="admin.php?filter=Tersedia">Tersedia</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="admin.php?filter=Dipinjam">Dipinjam</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="pencarian">
                <br>
                <form class="d-flex text-light" role="search" action="admin.php" method="GET">
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

    <h2 class="mt-4" style="text-align:center">Selamat datang, admin
        <?php echo $_SESSION['username'] ?>!
    </h2><br>
    <div class="row mt-4 mb-2 mx-4 p-1">
        <div class="col-4">
            <p style="text-align: left; font-size:20px"><b>Daftar Buku:</b></p>
        </div>
        <div class="col-4 text-center align-self-center">
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'edit_berhasil') {
                    echo '<b class="text-success text-center">Data berhasil diubah</b>';
                }
                if ($_GET['status'] == 'edit_gagal') {
                    echo '<b class="text-danger text-center">Terjadi kesalahan. Data gagal diubah</b>';
                }
                if ($_GET['status'] == 'hapus_berhasil') {
                    echo '<b class="text-success text-center">Data berhasil dihapus</b>';
                }
                if ($_GET['status'] == 'hapus_gagal') {
                    echo '<b class="text-danger text-center">Terjadi kesalahan. Data gagal dihapus</b>';
                }
                if ($_GET['status'] == 'tambah_berhasil') {
                    echo '<b class="text-success text-center">Data berhasil ditambah</b>';
                }
                if ($_GET['status'] == 'tambah_gagal') {
                    echo '<b class="text-danger text-center">Terjadi kesalahan. Data gagal ditambah</b>';
                }
                if ($_GET['status'] == 'pengembalian_berhasil') {
                    echo '<b class="text-success text-center">Pengembalian buku berhasil dilakukan</b>';
                }
                if ($_GET['status'] == 'pengembalian_gagal') {
                    echo '<b class="text-danger text-center">Terjadi kesalahan. sistem gagal melakukan pengembalian buku</b>';
                }
            }
            ?>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <div class="d-flex align-items-center">
                <a class="btn btn-outline-success" href="tambah.php">Tambah buku</a>
            </div>
        </div>
    </div>
    <div class="card bg-body-tertiary rounded shadow mx-4 p-3 mb-5">
        <table class="table table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col"><b>No</b></th>
                    <th scope="col">id_Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Bahasa</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col">Aksi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$result) {
                    die("Error: " . mysqli_error($connection));
                }
                if (mysqli_num_rows($result) === 0) {
                    echo "<tr>";
                    echo '   <td colspan="11"> Data tidak ditemukan </td>';
                    echo "</tr>";
                }
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <div class="row">
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "   <th scope=\"row\">" . $i . "</th>";
                            echo "   <td>" . $row['id_buku'] . "</td>";
                            echo "   <td>" . $row['judul'] . "</td>";
                            echo "   <td>" . $row['penerbit'] . "</td>";
                            echo "   <td>" . $row['bahasa'] . "</td>";
                            echo "   <td>" . $row['genre'] . "</td>";
                            echo "   <td>" . $row['kategori'] . "</td>";
                            if ($row['statuss'] == 'Dipinjam') {
                                ?>
                                <td>
                                    <h5><span class="badge bg-danger mt-1">Dipinjam</span></h5>
                                </td>
                                <?php
                            } else if ($row['statuss'] == 'Tersedia') {
                                ?>
                                    <td>
                                        <h5><span class="badge bg-success mt-1">Tersedia</span></h5>
                                    </td>
                                <?php
                            }
                            if ($row['statuss'] == 'Dipinjam') {
                                echo '<td><a href="detail.php?id_buku=' . $row['id_buku'] . '" class="btn btn-secondary">DETAIL</a></td>';
                            } else if ($row['statuss'] == 'Tersedia') {
                                echo '<td><a href="detail.php?id_buku=' . $row['id_buku'] . '" class="btn btn-secondary disabled" tabindex="-1" role="button" aria-disabled="true">DETAIL</a></td>';
                            }
                            echo '   <td><a href="edit.php?id_buku=' . $row['id_buku'] . '" class="btn btn-warning">EDIT</a></td>';
                            echo '   <td>
                                                <a href="hapus.php?hapus=' . $row['id_buku'] . '" class="btn btn-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                onclick="setDeleteUrl(this.getAttribute(\'href\'))">HAPUS</a>
                                            </td>';
                            echo "</tr>";
                            $i++;
                        }
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <div id="deleteModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus buku ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="deleteButton" class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        document.getElementById('deleteButton').addEventListener('click', function () {
            window.location.href = this.getAttribute('href');
            deleteButton.href;
        });
    </script>
</body>

</html>