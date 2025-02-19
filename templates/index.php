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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <div>
          <img src="{{logo.png}}" width="100" height="100" />
          <a class="navbar-brand text-light" href="#">ARC</a>
        </div>

        <div>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"
              ><img src="icon.jpg" width="30" height="30"
            /></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="index.php"
                >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="user.php?search=">Peminjaman</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-light"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Pusat Akun
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="daftarakun.php">Buat Akun</a>
                </li>
                <li>
                  <a class="dropdown-item" href="masuk.php">Login Akun</a>
                </li>
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
        echo '<p class="text-danger text-center"><b>Anda Bukan Admin!</b></p>';
        }
      }
    ?>
    <p class="mt-4" style="text-align: center; font-size: 20px">
      <b>Selamat datang di Perpustakaan Peminjaman Buku!</b>
    </p>
    <div class="container text-center">
      <div
        class="col border shadow p-3 mb-5 bg-body-tertiary rounded px-2"
        style="min-height: fit-content"
      >
        <div class="row gx-5">
          <div class="col-6 col-md-4">
            <div
              id="carouselExampleAutoplaying"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="img/bukuBRILLIANT.jpg"
                    class="d-block w-100"
                    alt="brilliant"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="img/bukuPUEBI.jpg"
                    class="d-block w-100"
                    alt="puebi"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="img/bukuULUMULQURAN.jpg"
                    class="d-block w-100"
                    alt="ulumul"
                  />
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
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
            <a type="button"class="btn btn-primary"style="
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
                  --bs-btn-active-border-color: #{shade-color($bd-violet, 20%)};"
                href="user.php?search=">
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
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
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
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#quote"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#quote"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div style="min-height: 200px"></div>
    <footer id="foot">
    <div class="container">
      <div class="row">
        <p class="text-center">Info Kelompok</p>
        <br>
        <div class="col-6">
            <center>          
                <p>Muhammad Azhar A. / 124220124</p>
                <div class="email">
                <span class="fas fa-envelope"> 124220124@student.upnyk.ac.id</span>
                </div>
            </center>
        </div>
        <div class="col-6">
            <center>
                <p>Rifqi Daiva Tri Nandhika / 124220131</p>
                <div class="email">
                    <span class="fas fa-envelope">124220131@student.upnyk.ac.id</span>
                </div>
            </center>
        </div>
      </div>
      <br>
      <p class="text-center">&copy; 2023 by ARC</p>
    </div>
  </footer>

    <script src="javascript.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
