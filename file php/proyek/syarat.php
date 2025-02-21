<?php
session_start();
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
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="user.php">Peminjaman</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Pusat Akun
            </a>
            <ul class="dropdown-menu">
              <?php
              if (!isset($_SESSION['username'])) { ?>
                <li><a class="dropdown-item" href="daftarakun.html">Buat Akun <svg xmlns="http://www.w3.org/2000/svg"
                      height="1em" viewBox="0 0 448 512">
                      <style>
                        svg {
                          fill: #8f8f8f
                        }
                      </style>
                      <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></a></li>
                <li><a class="dropdown-item" href="masuk.php">Login Akun <svg xmlns="http://www.w3.org/2000/svg"
                      height="1em" viewBox="0 0 512 512">
                      <style>
                        svg {
                          fill: #8f8f8f
                        }
                      </style>
                      <path
                        d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                    </svg></a></li>
              <?php } else { ?>
                <li><a class="dropdown-item" href="logout.php" role="button">Logout <svg
                      xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                      <style>
                        svg {
                          fill: #8f8f8f
                        }
                      </style>
                      <path
                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                    </svg></a></li>
              <?php }
              ?>

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

  <p class=" mt-4" style="text-align: center; font-size:20px "><b>Syarat dan Ketentuan</b>
  <div class="container text-justify" style="min-height: 1lv;">
    <div class="row align-items-end">
      <div class="col border shadow p-3 bg-body-tertiary rounded">
        <div class="auto__item">
          <p> 1. Setiap anggota Perpustakaan diijinkan meminjam 2 atau lebih buku bahan pustaka. <br>
            2. Setiap kali peminjaman diberi waktu hanya satu minggu, dan peminjam harus mengembalikan bahan pustaka
            yang dipinjam sesuai tanggal pengembalian yang ditetapkan. <br>
            3. Apabila pengembalian melebihi tanggal yang ditetapkan, maka dikategorikan TERLAMBAT, dan setiap
            keterlambatan dikenakan sanksi. <br>
            4. Peminjaman buku perpusda dapat diperpanjang satu minggu melalui pendaftaran perpanjangan. <br>
            5. Setiap peminjam wajib memperlakukan buku / bahan pustaka dengan sebaik-baiknya, sehingga buku tidak kotor
            dan tidak rusak. <br>
            6. Apabila terjadi kerusakan/kehilangan buku / bahan pustaka yang dipinjam, maka peminjam wajib mengganti
            dengan buku / bahan pustaka yang sama. <br>
            7. Setiap peminjam tidak dibenarkan meminjamkan buku / bahan pustaka kepada orang lain yang tidak
            berhak.<br>
          </p>

        </div>
      </div>
      &nbsp; &nbsp;


    </div>
  </div>

  <div style="min-height: 200px"></div>
  <?php include 'footer.php' ?>

  <script src="javascript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>