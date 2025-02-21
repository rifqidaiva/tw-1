<?php 
session_start();
if (isset($_SESSION['username']) && $_SESSION['role'] == 'user') {
    header('Location: user.php');
    exit();
} elseif (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="acc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="col-2">
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
                href="index.php">
                  Home
            </a>
        </div>
        <br>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php
            if (isset($_GET['login'])) {
                if ($_GET['login'] == 'gagal') {
                    echo "<div class='alert alert-danger text-center'><b>Login gagal! Username atau password salah!</b></div>";
                }
                if ($_GET['login'] == 'belum_login') {
                    echo "<div class='alert alert-danger text-center'><b>Anda harus login untuk melanjutkan. Silakan login terlebih dahulu</b></div>";
                }
                header("Refresh:5; url=masuk.php");
            }
            if (isset($_GET['daftar'])) {
                if ($_GET['daftar'] == 'suksess') {
                    echo "<div class='alert alert-success text-center'><b>Akun berhasil didaftarkan. Silakan login</b></div>";
                }
                if ($_GET['daftar'] == 'gagal') {
                    echo "<div class='alert alert-danger text-center'><b>Terjadi kesalahan. Silakan coba lagi</b></div>";
                }
                header("Refresh:5; url=masuk.php");
            }
            ?>
            <input type="submit" value="Login">
        </form>
        <br>
        <form action="daftarakun.php" method="POST">
            <input type="submit" value="Daftar Akun">
        </form>
    </div>
</body>

</html>