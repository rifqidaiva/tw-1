<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?pesan=bukan_admin');
    exit();
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
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="syarat.php">Syarat & Ketentuan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="pencarian">
                <br>
                <form class="d-flex text-light" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="50">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="progress-bar">
        <div id="progress-bar-fill"></div>
    </div>

    <h3 class="mt-4" style="text-align:center">Tambahkan daftar buku:</h3>
    <div class="container card shadow p-4">
        <form action="tambahbuku.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" required><br><br>
                <div>
                    <div class="mb-3">
                        <label for="foto_buku" class="col-sm-2 col-form-label">Foto</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="foto_buku" id="foto_buku" accept="image/*">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div><br><br>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit"><br><br>
                    </div>
                    <div class="mb-3">
                        <label for="bahasa">Bahasa:</label>
                        <input type="text" class="form-control" id="bahasa" name="bahasa" required><br><br>
                    </div>
                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <div>
                            <select required class="form-select" aria-label="Default select example" name="kategori"
                                id="kategori">
                                <option></option>
                                <option value="1201">Ensiklopedia</option>
                                <option value="1202">Komik</option>
                                <option value="1203">Novel</option>
                                <option value="1204">Lainnya</option>
                            </select>
                        </div>
                        <br><br>
                    </div>
                    <div class="mb-3">
                        <label for="genre">Genre</label>
                        <div>
                            <select required class="form-select" aria-label="Default select example" name="genre"
                                id="genre">
                                <option></option>
                                <option value="1101">Pengetahuan Umum</option>
                                <option value="1102">Sci-fi</option>
                                <option value="1103">Petualangan</option>
                                <option value="1104">Sejarah</option>
                                <option value="1105">Horror</option>
                            </select>
                        </div>
                        <br><br>
                    </div>
                    <center class="flex d-flex justify-content-center">
                        <div class="mx-1 my-3">
                            <input type="submit" class="btn btn-dark" value="Tambahkan Buku">
                        </div>
                        <div class="mx-1 my-3">
                            <a class="btn btn-dark " href="admin.php" role="button">kembali</a>
                        </div>
                    </center>
                </div>
            </div>
        </form>
    </div>
    <div style="min-height:100px;"></div>
    <?php include 'footer.php' ?>

</body>

</html>