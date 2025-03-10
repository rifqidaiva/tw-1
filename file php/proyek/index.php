<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="custom.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <div>
        <img src="logo.png" width="100" height="100" />
        <a class="navbar-brand text-light" href="index.php">ARC</a>
      </div>

      <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><img src="icon.jpg" width="30" height="30" /></span>
        </button>
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
                <hr class="dropdown-divider" />
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

  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'bukan_admin') {
      echo "<div class='alert alert-danger text-center'><b>Anda Bukan Admin!</b></div>";
    }
    header("Refresh:5; url=index.php");
  }
  ?>
  <p class="mt-4" style="text-align: center; font-size: 20px">
    <b>Selamat datang di Perpustakaan Peminjaman Buku!</b>
  </p>
  <div class="container text-center">
    <div class="col border shadow p-3 mb-5 bg-body-tertiary rounded px-2" style="min-height: fit-content">
      <div class="row gx-5">
        <div class="col-6 col-md-4">
          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/bukuBRILLIANT.jpg" class="d-block w-100" alt="brilliant" />
              </div>
              <div class="carousel-item">
                <img src="img/bukuPUEBI.jpg" class="d-block w-100" alt="puebi" />
              </div>
              <div class="carousel-item">
                <img src="img/bukuULUMULQURAN.jpg" class="d-block w-100" alt="ulumul" />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-sm-6 col-md-8 align-self-center">
          <h2>Temukan dunia pengetahuan di ujung jari Anda.</h2>
          <p class="mt-4" style="text-align: justify">
            Selamat datang di website resmi Perpustakaan Peminjaman Buku,
            tempat di mana Anda dapat menjelajahi ragam buku, memperluas
            wawasan, dan menemukan petualangan baru. Kami bangga menjadi mitra
            perjalanan pengetahuan Anda, menyediakan akses cepat dan mudah ke
            koleksi buku yang kaya dan bervariasi. Mengapa memilih kami?
            Koleksi Buku yang Luas, Proses Peminjaman yang Mudah, Layanan
            Ramah Pengguna, Perpustakaan Online 24/7, dan juga Komunitas
            Pembelajaran.
            <br /><br />
            Jelajahi perpustakaan kami hari ini dan biarkan kami mengantarkan
            Anda ke dunia tak terbatas pengetahuan dan imajinasi.
            Bersama-sama, mari kita menemukan keajaiban yang disembunyikan
            dalam halaman-halaman buku! <br /><br />
            Selamat membaca!
          </p>
          <a type="button" class="btn btn-primary" style="
                  --bs-btn-font-weight: 600;
                  --bs-btn-color: var(--bs-white);
                  --bs-btn-bg: #2d1c5c;
                  --bs-btn-border-color: var(--bs-white);
                  --bs-btn-hover-border-color: var(--bd-violet-bg);
                  --bs-btn-hover-color: #2d1c5c;
                  --bs-btn-hover-bg: #{shade-color($bd-violet, 10%)};
                  --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                  --bs-btn-active-color: var(--bs-btn-hover-color);
                  --bs-btn-active-bg: #{shade-color($bd-violet, 20%)};
                  --bs-btn-active-border-color: #{shade-color($bd-violet, 20%)};" href="user.php">
            Cek sekarang
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <div class="col border shadow p-3 my-3 bg-body-tertiary rounded px-2">
      <div class="row gx-5">
        <div id="quote" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/quote1.jpg" class="d-block w-100" alt="..." />
              <div class="carousel-caption d-none d-md-block">
                <h5>
                  " Jika budaya kamu tidak menyukai orang-orang kutu buku,
                  kamu berada pada masalah yang serius."
                </h5>
                <p>- Bill Gates</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/quote2.jpg" class="d-block w-100" alt="..." />
              <div class="carousel-caption d-none d-md-block">
                <h5>
                  " Hal-hal yang ingin kutahu ada di dalam buku, sahabat
                  terbaik adalah orang yang akan memberikanku sebuah buku yang
                  belum aku ketahui."
                </h5>
                <p>- Abraham Lincoln</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/quote3.jpg" class="d-block w-100" alt="..." />
              <div class="carousel-caption d-none d-md-block">
                <h5>
                  " Membaca, belajar itu tidak ada batas usia. Meskipun kita
                  telah jambul wanen, sudah tua, belajar dan membaca selalu
                  bermanfaat."
                </h5>
                <p>- Soekarno</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#quote" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#quote" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
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