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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
        </div>
    </nav>

    <div id="progress-bar">
        <div id="progress-bar-fill"></div>
    </div>

    <p class="my-4" style="text-align: center; font-size:20px"><b>Edit Data Buku</b>
    <div class="container text-center">
        <div class="row align-items-end">
            <div class="col border shadow p-3 mb-5 bg-body-tertiary rounded px-2">
                <div class="auto__item">
                    <div class="container px-4 text-center">
                        <?php
                        include 'koneksi.php';
                        $id_buku = $_GET['id_buku'];
                        $data = mysqli_query($connection, "SELECT * FROM buku WHERE id_buku='$id_buku'");
                        while ($hasil = mysqli_fetch_array($data)) {
                            ?>
                            <form method="POST" action="prosesedit.php" enctype="multipart/form-data">
                                <input type="hidden" name="id_buku" value="<?php echo $hasil['id_buku']; ?>">
                                <label for="judul" class="form-label">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?php echo $hasil['judul']; ?>"><br>
                                <label for="foto_buku" class="col-sm-2 col-form-label">Foto</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="foto_buku" id="foto_buku"
                                        accept="image/*">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div><br>
                                <label for="penerbit">Penerbit:</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit"
                                    value="<?php echo $hasil['penerbit']; ?>"><br>
                                <label for="bahasa">Bahasa:</label>
                                <input type="text" class="form-control" id="bahasa" name="bahasa"
                                    value="<?php echo $hasil['bahasa']; ?>"><br>
                                <label for="kategori">Kategori:</label>
                                <div>
                                    <select required class="form-select" aria-label="Default select example" name="kategori"
                                        id="kategori">
                                        <option <?php if ($hasil['id_kategori'] == '1201') {
                                            echo "selected";
                                        } ?> value="1201">
                                            Ensiklopedia</option>
                                        <option <?php if ($hasil['id_kategori'] == '1202') {
                                            echo "selected";
                                        } ?> value="1202">
                                            Komik</option>
                                        <option <?php if ($hasil['id_kategori'] == '1203') {
                                            echo "selected";
                                        } ?> value="1203">
                                            Novel</option>
                                        <option <?php if ($hasil['id_kategori'] == '1204') {
                                            echo "selected";
                                        } ?> value="1203">
                                            Lainnya</option>
                                    </select>
                                </div><br>
                                <label for="genre">Genre:</label>
                                <div>
                                    <select required class="form-select" aria-label="Default select example" name="genre"
                                        id="genre">
                                        <option <?php if ($hasil['id_genre'] == '1101') {
                                            echo "selected";
                                        } ?> value="1101">
                                            Pengetahuan Umum</option>
                                        <option <?php if ($hasil['id_genre'] == '1102') {
                                            echo "selected";
                                        } ?> value="1102">Sci-fi
                                        </option>
                                        <option <?php if ($hasil['id_genre'] == '1103') {
                                            echo "selected";
                                        } ?> value="1103">
                                            Petualangan</option>
                                        <option <?php if ($hasil['id_genre'] == '1104') {
                                            echo "selected";
                                        } ?> value="1104">
                                            Sejarah</option>
                                        <option <?php if ($hasil['id_genre'] == '1105') {
                                            echo "selected";
                                        } ?> value="1105">Horror
                                        </option>
                                    </select>
                                </div><br>
                                <center>
                                    <input type="submit" class="btn btn-dark" value="Konfirmasi">
                                    <a class="btn btn-dark " href="admin.php" role="button">kembali</a>
                                </center>
                            </form>
                        <?php } ?>
                    </div>

                </div>
            </div>
            &nbsp; &nbsp;


        </div>
    </div>
    <?php include 'footer.php' ?>

    <script src="javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>