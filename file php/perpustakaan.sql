-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2025 pada 20.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `id_genre` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `statuss` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `foto`, `penerbit`, `bahasa`, `id_kategori`, `id_genre`, `deskripsi`, `statuss`) VALUES
(17, 'PUEBI', 'bukuPUEBI.jpg', 'Gramedia', 'Indonesia', '1201', '1101', 'Buku Bahasa Indonesia', 'Tersedia'),
(18, 'ULUMULQURAN', 'bukuULUMULQURAN.jpg', 'PT Remaja Rosdakarya', 'Indonesia', '1201', '1101', '', 'Tersedia'),
(19, 'Loner Life in Another World Vol. 1', 'bukuLonerLIFE.jpg', 'Airship', 'Inggris', '1203', '1103', '', 'Tersedia'),
(20, 'Ensiklopedia Sejarah Nasional dan Dunia', 'Ensiklopedia_Sejarah_Nasional_Dan_Dunia_FULLCOLOR.jpg', 'Gramedia', 'Indonesia', '1201', '1104', '', 'Tersedia'),
(22, 'Amar', 'VPet_Rank.png', 'Gagas Media', 'Indonesia', '1203', '1104', '', 'Tersedia'),
(23, 'Marvel Super Heroes Secret Wars', 'marvel.jpg', 'Elex Media Komputindo', 'Inggris', '1202', '1102', '', 'Tersedia'),
(24, 'One Piece Vol. 105', 'wanpis105.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1103', '', 'Tersedia'),
(25, 'Why? Cuaca', 'Why.jpg', 'Gramedia', 'Indonesia', '1201', '1101', '', 'Tersedia'),
(26, 'Kisah Tanah Jawa : Tikungan Maut', 'Cover_tikungan_maut_1-min.jpg', 'Gramedia', 'Indonesia', '1203', '1105', '', 'Tersedia'),
(27, 'The Night', 'thenight.jpg', 'POSTERMYALL', 'Inggris', '1203', '1105', '', 'Tersedia'),
(28, 'Harry Potter dan Batu Bertuah', 'harrypotter.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(29, 'A Darkness of Dragons', 'a_darkness_of_dragons.jpg', 'TheSchoolRun', 'Inggris', '1203', '1103', '', 'Tersedia'),
(30, 'World War 2', 'ww2.jpg', 'PAPERBACK', 'Inggris', '1201', '1104', '', 'Tersedia'),
(31, 'Dr. Stone Vol 1', 'manga-dr.-stone-volume-1-cover-viu.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1102', '', 'Tersedia'),
(32, 'Setan Urban', 'setanurban.jpg', 'Gramedia', 'Indonesia', '1202', '1105', '', 'Tersedia'),
(33, 'Crayon Shinchan : Sains Itu Menarik!', 'sinchan.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1101', '', 'Tersedia'),
(34, 'The Crusades', 'the-crusades-9781471196430_hr.jpg', 'Sunday Times', 'Inggris', '1203', '1104', '', 'Tersedia'),
(35, 'The First Crusade', 'the-first-crusade-9781849837699_hr.jpg', 'Sunday Times', 'Inggris', '1203', '1104', '', 'Tersedia'),
(36, 'Hunter X Hunter Vol 6', '9786020230436_Hunter-X-Hunter-06.jpg', 'Gramedia', 'Indonesia', '1202', '1103', '', 'Tersedia'),
(37, 'Bumi', '9786020332956_Bumi-New-Cover.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(38, 'Bulan', '9786020332949_Bulan-New-Cover.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(39, 'Matahari', 'MATAHARI-TERE-LIYE.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(40, 'Mushoku Tensei : Jobless Reincarnation', 'mt.jpg', 'Chruncy Roll', 'Inggris', '1203', '1103', '', 'Tersedia'),
(41, 'Naruto Vol 63', 'naruto.jpg', 'Gramedia', 'Indonesia', '1202', '1103', '', 'Dipinjam'),
(42, 'Vinland Saga Vol 1', 'Vinland_Saga_volume_01_cover.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1103', '', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `user_pengembalian` varchar(50) NOT NULL,
  `admin_konfirmasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `judul`, `tgl_pinjam`, `user_pengembalian`, `admin_konfirmasi`) VALUES
(54, 7, 41, 'Naruto Vol 63', '2023-07-07', 'True', 'False');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin'),
(6, 'aiken', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(7, 'wahyu', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(8, 'Dwiki', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(9, 'Rifqi', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'user'),
(10, 'aaa', 'aaa', 'user'),
(11, 'adwad', 'adwadw', 'user'),
(12, 'viola', '123', 'user'),
(13, 'wahy', '126', 'admin'),
(20, 'abcde', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 'admin'),
(21, 'qwe', '8e35c2cd3bf6641bdb0e2050b76932cbb2e6034a0ddacc1d9bea82a6ba57f7cf', 'user'),
(22, 'juju', '123', 'admin'),
(23, '123', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
