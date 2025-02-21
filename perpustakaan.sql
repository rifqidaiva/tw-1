-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 11:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `buku`
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
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `foto`, `penerbit`, `bahasa`, `id_kategori`, `id_genre`, `deskripsi`, `statuss`) VALUES
(17, 'PUEBI', 'bukuPUEBI.jpg', 'Gramedia', 'Indonesia', '1201', '1101', 'Buku Pedoman Umum Ejaan Bahasa Indonesia (PUEBI) adalah panduan resmi yang mengatur tata cara penulisan dalam bahasa Indonesia. Buku ini mencakup aturan ejaan, penggunaan huruf, kata, tanda baca, serta penulisan unsur serapan. PUEBI diterbitkan oleh Badan Pengembangan dan Pembinaan Bahasa, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia, sebagai standar baku dalam penulisan bahasa Indonesia yang baik dan benar.  Buku ini sangat penting bagi pelajar, mahasiswa, penulis, editor, dan siapa saja yang ingin menggunakan bahasa Indonesia secara tepat dalam komunikasi tertulis. Dengan mengikuti pedoman ini, pengguna dapat menulis dengan lebih jelas, efektif, dan sesuai dengan kaidah kebahasaan yang berlaku.', 'Tersedia'),
(18, 'ULUMULQURAN', 'bukuULUMULQURAN.jpg', 'PT Remaja Rosdakarya', 'Indonesia', '1201', '1101', 'Buku Ulumul Qur’an membahas ilmu-ilmu yang berkaitan dengan Al-Qur’an, termasuk sejarah turunnya wahyu, kodifikasi, tafsir, qira\'at, asbabun nuzul (sebab-sebab turunnya ayat), serta makna dan tujuan dari kitab suci Islam ini. Buku ini sering digunakan sebagai referensi dalam studi Islam, khususnya dalam memahami bagaimana Al-Qur’an diturunkan, ditulis, dan dipelajari sepanjang sejarah.  Buku Ulumul Qur’an sangat bermanfaat bagi mahasiswa ilmu keislaman, para penghafal Al-Qur’an, ulama, dan siapa saja yang ingin memperdalam wawasan tentang kitab suci ini. Dengan memahami ilmu-ilmu dalam Ulumul Qur’an, pembaca dapat lebih menghayati isi Al-Qur’an dan menerapkannya dalam kehidupan sehari-hari.', 'Tersedia'),
(19, 'Loner Life in Another World Vol. 1', 'bukuLonerLIFE.jpg', 'Airship', 'Inggris', '1203', '1103', 'High school student Haruka has always been a content loner. One day, he and his class are abruptly transported to another world and given skill points to use when choosing from an assortment of abilities and magical powers. Unfortunately, Haruka arrives last, and he can only use his points on the seemingly impractical abilities the others had no interest in. Although he is on his own again and must adjust to his new life by himself, he much prefers it that way.  However, Haruka\'s peaceful solitude is short-lived, as he runs into some of his classmates. Weak to their pleas for help, he ends up sheltering and helping them reunite with the others. But the different cliques struggle to see eye to eye, forcing Haruka to find a way to end the infighting and restore harmony between them to survive the unfamiliar world.', 'Tersedia'),
(20, 'Ensiklopedia Sejarah Nasional dan Dunia', 'Ensiklopedia_Sejarah_Nasional_Dan_Dunia_FULLCOLOR.jpg', 'Gramedia', 'Indonesia', '1201', '1104', 'Buku Ensiklopedia Sejarah Nasional dan Dunia merupakan kumpulan informasi komprehensif tentang peristiwa-peristiwa bersejarah, tokoh-tokoh penting, serta perkembangan peradaban dari masa ke masa, baik di tingkat nasional maupun global. Buku ini menyajikan kronologi sejarah dengan sistematis, mulai dari zaman kuno, abad pertengahan, hingga era modern.  Ensiklopedia ini sangat bermanfaat bagi pelajar, mahasiswa, peneliti, dan masyarakat umum yang ingin memahami perjalanan sejarah bangsa Indonesia serta peristiwa-peristiwa penting dunia. Dengan bahasa yang informatif dan mudah dipahami, buku ini menjadi referensi utama bagi siapa saja yang ingin menggali wawasan sejarah secara mendalam.', 'Tersedia'),
(22, 'Umar', 'UMAR.jpg', 'Gagas Media', 'Indonesia', '1203', '1104', 'Buku The Great Figure of Umar bin Khattab mengisahkan kehidupan dan kepemimpinan salah satu khalifah terbesar dalam sejarah Islam, Umar bin Khattab. Dikenal sebagai pemimpin yang adil, tegas, dan bijaksana, Umar memainkan peran penting dalam memperluas wilayah Islam serta menegakkan keadilan dan kesejahteraan bagi rakyatnya.  Buku ini menggambarkan bagaimana Umar bin Khattab menjalankan pemerintahannya, kebijakannya dalam hukum dan ekonomi, serta kontribusinya dalam perkembangan peradaban Islam. Dengan pendekatan yang historis dan analitis, buku ini sangat cocok bagi mereka yang ingin memahami lebih dalam tentang kepemimpinan Islam dan inspirasi dari sosok Umar bin Khattab.', 'Tersedia'),
(23, 'Marvel Super Heroes Secret Wars', 'marvel.jpg', 'Elex Media Komputindo', 'Inggris', '1202', '1102', 'Buku Marvel Super Heroes Secret Wars adalah salah satu komik crossover paling ikonik dari Marvel Comics, pertama kali diterbitkan pada tahun 1984–1985. Kisah ini menampilkan pertempuran epik antara para pahlawan dan penjahat Marvel di sebuah dunia misterius yang disebut Battleworld, yang diciptakan oleh entitas kosmik bernama Beyonder.  Dalam cerita ini, tokoh-tokoh legendaris seperti Spider-Man, Iron Man, Captain America, Hulk, Thor, serta X-Men harus menghadapi musuh-musuh kuat seperti Doctor Doom, Magneto, Ultron, dan lainnya. Selain pertempuran yang spektakuler, Secret Wars juga memperkenalkan elemen penting dalam sejarah Marvel, seperti kostum hitam Spider-Man yang kemudian menjadi Venom.  Buku ini sangat direkomendasikan bagi penggemar Marvel yang ingin menikmati salah satu kisah klasik yang membentuk dunia superhero hingga saat ini.', 'Tersedia'),
(24, 'One Piece Vol. 105', 'wanpis105.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1103', 'One Piece Vol. 105 berjudul \"Luffy\'s Dream\" adalah bagian dari seri manga populer karya Eiichiro Oda. Volume ini mencakup bab 1056 hingga 1065 dan pertama kali diterbitkan di Jepang pada 3 Maret 2023. Dalam volume ini, setelah kekalahan Kaido dan penyelamatan Wano, Luffy dan kru Topi Jerami bersiap untuk petualangan berikutnya. Sementara itu, perubahan besar terjadi di seluruh dunia, termasuk penunjukan beberapa Kaisar Laut yang baru. Sampul volume ini menampilkan Luffy dalam bentuk Gear 5 bersama dengan Blackbeard di depan, dengan latar belakang Shanks, Buggy, dan Carrot. Desain ini merupakan penghormatan terhadap sampul Volume 25, dengan pembaruan pada desain karakter. Bagi penggemar One Piece, Volume 105 menawarkan kelanjutan cerita yang mendebarkan dan ilustrasi yang memukau, seiring kru Topi Jerami melanjutkan petualangan mereka di dunia yang terus berkembang.', 'Tersedia'),
(25, 'Why? Cuaca', 'Why.jpg', 'Gramedia', 'Indonesia', '1201', '1101', 'Buku Why? Cuaca adalah bagian dari seri komik edukasi Why? yang dirancang untuk memperkenalkan konsep ilmiah kepada anak-anak dan remaja dengan cara yang menarik dan mudah dipahami. Buku ini membahas berbagai fenomena cuaca seperti hujan, salju, angin, badai, dan perubahan iklim dengan ilustrasi yang menarik serta penjelasan yang sederhana namun informatif.  Melalui kisah dan karakter yang menyenangkan, pembaca diajak untuk memahami bagaimana cuaca terbentuk, faktor-faktor yang memengaruhinya, serta dampaknya terhadap kehidupan sehari-hari. Buku ini sangat cocok bagi anak-anak yang ingin belajar sains dengan cara yang lebih menyenangkan dan visual.', 'Tersedia'),
(26, 'Kisah Tanah Jawa : Tikungan Maut', 'Cover_tikungan_maut_1-min.jpg', 'Gramedia', 'Indonesia', '1203', '1105', 'Kisah Tanah Jawa: Tikungan Maut adalah buku kelima dalam seri Kisah Tanah Jawa yang ditulis oleh @kisahtanahjawa dan diterbitkan oleh Gagas Media pada tahun 2020. Buku ini mengangkat tragedi kecelakaan bus yang terjadi pada Rabu malam, 8 Oktober 2003, di dekat pintu PLTU Paiton, Jawa Timur. Kecelakaan tersebut menewaskan seluruh penumpang bus yang merupakan siswa-siswi yang baru kembali dari studi tour ke Bali. Dalam buku ini, penulis menyajikan perspektif unik dengan menghadirkan sudut pandang korban yang telah meninggal, khususnya Wati, yang merupakan saudara kembar Wita. Melalui narasi ini, pembaca diajak memahami kronologi kejadian, mulai dari perjalanan rombongan, firasat buruk yang dirasakan, hingga detik-detik kecelakaan tragis tersebut. Selain itu, buku ini juga mengungkap adanya makhluk gaib yang diduga berperan dalam insiden tersebut, memberikan dimensi horor yang khas dalam seri Kisah Tanah Jawa. Buku ini terdiri dari 160 halaman dengan ilustrasi yang mendukung suasana cerita, menjadikannya bacaan menarik bagi penggemar kisah horor dan misteri yang berlatar belakang kejadian nyata di Indonesia.', 'Tersedia'),
(27, 'The Night', 'thenight.jpg', 'POSTERMYALL', 'Inggris', '1203', '1105', '', 'Tersedia'),
(28, 'Harry Potter dan Batu Bertuah', 'harrypotter.jpg', 'Gramedia', 'Indonesia', '1203', '1102', 'Harry Potter, seorang anak yatim piatu yang tinggal bersama paman, bibi, dan sepupunya yang kejam, menemukan bahwa ia sebenarnya seorang penyihir. Pada ulang tahunnya yang ke-11, ia mendapat undangan untuk bersekolah di Hogwarts School of Witchcraft and Wizardry.  Di Hogwarts, Harry berteman dengan Ron Weasley dan Hermione Granger, serta menghadapi berbagai petualangan, termasuk mengungkap misteri Batu Bertuah, sebuah artefak ajaib yang dapat memberikan kehidupan abadi. Ia juga mulai memahami masa lalunya, termasuk keterkaitan dengan penyihir jahat Lord Voldemort, yang telah membunuh orang tuanya.  Buku ini merupakan awal dari seri Harry Potter dan memperkenalkan dunia sihir yang penuh dengan keajaiban, petualangan, serta pertempuran antara kebaikan dan kejahatan.', 'Tersedia'),
(29, 'A Darkness of Dragons', 'a_darkness_of_dragons.jpg', 'TheSchoolRun', 'Inggris', '1203', '1103', 'Buku A Darkness of Dragons adalah novel fantasi karya S.A. Patrick, yang merupakan buku pertama dalam seri Songs of Magic. Novel ini terinspirasi dari legenda The Pied Piper of Hamelin (Peniup Seruling dari Hamelin) dan menawarkan dunia sihir, naga, serta petualangan yang mendebarkan.  Kisah ini mengikuti Patch Brightwater, seorang peniup seruling muda (piper) yang dihukum karena melanggar aturan sihir. Saat dipenjara, ia menemukan konspirasi berbahaya yang melibatkan peniup seruling jahat legendaris yang pernah menghancurkan kota Hamelyn. Dengan bantuan seorang gadis terkutuk bernama Wren, yang dikutuk menjadi seekor tikus, serta seorang naga muda bernama Barver, Patch memulai perjalanan epik untuk mengungkap kebenaran dan menghentikan kejahatan besar yang mengancam dunia.  Buku ini menawarkan kisah penuh aksi, misteri, dan persahabatan yang cocok bagi penggemar Harry Potter dan Percy Jackson. Dengan alur yang menarik dan karakter yang kuat, A Darkness of Dragons adalah pilihan tepat bagi pembaca yang menyukai petualangan fantasi yang unik dan menegangkan.', 'Tersedia'),
(30, 'World War 2', 'ww2.jpg', 'PAPERBACK', 'Inggris', '1201', '1104', 'World War 2 History: True Stories of the Wehrmacht War Crimes and Atrocities adalah buku karya Cyrus J. Zachary yang mengulas berbagai kejahatan perang dan kekejaman yang dilakukan oleh Wehrmacht, angkatan bersenjata Jerman, selama Perang Dunia II. Buku ini menyajikan kisah nyata yang mengungkap sisi kelam dari operasi militer Jerman, menyoroti tindakan brutal terhadap tawanan perang dan penduduk sipil di berbagai negara yang diduduki.  Melalui penelusuran mendalam, Zachary membahas peristiwa-peristiwa seperti pembantaian massal, penyiksaan, dan pelanggaran hak asasi manusia lainnya yang dilakukan oleh pasukan Wehrmacht. Buku ini bertujuan untuk memberikan pemahaman yang lebih jelas tentang dampak mengerikan dari ideologi Nazi dan pentingnya mengingat sejarah kelam tersebut agar tidak terulang di masa depan.  Buku ini tersedia dalam format digital dan dapat diakses melalui platform seperti Apple Books.', 'Tersedia'),
(31, 'Dr. Stone Vol 1', 'manga-dr.-stone-volume-1-cover-viu.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1102', 'Kisah Dr. Stone dimulai ketika sebuah fenomena misterius menyebabkan seluruh umat manusia berubah menjadi batu selama ribuan tahun. Setelah 3.700 tahun, seorang jenius sains bernama Senku Ishigami tiba-tiba terbangun dan bertekad untuk membangun kembali peradaban manusia dari nol menggunakan ilmu pengetahuan. Ia segera membangkitkan sahabatnya, Taiju Oki, seorang pemuda kuat yang penuh semangat. Bersama-sama, mereka mulai meneliti cara untuk menghidupkan kembali manusia yang masih membatu dan mencari tahu penyebab dari bencana ini.  Namun, perjalanan mereka tidak mudah. Ketika mereka berhasil menghidupkan kembali seorang petarung tangguh, Tsukasa Shishio, perbedaan ideologi mulai muncul. Tsukasa ingin menciptakan dunia baru tanpa pengaruh orang-orang tua yang dianggap korup, sementara Senku ingin membangun kembali peradaban dengan kemajuan sains.', 'Tersedia'),
(32, 'Setan Urban', 'setanurban.jpg', 'Gramedia', 'Indonesia', '1202', '1105', 'Komik Horor Nusantara: Setan Urban adalah karya Bae Dong-sun dengan ilustrasi oleh Lee Tae-soo, diterbitkan oleh Indi Go Press pada 9 Maret 2020. Buku ini menyajikan 20 cerita horor yang mengangkat legenda urban dari berbagai daerah di Indonesia. Setiap cerita menggambarkan pertemuan mencekam dengan makhluk-makhluk gaib yang dikenal dalam budaya lokal, seperti suanggi dari Papua, wewe gombel dari Jawa, dan jurig bonge dari Sunda. Melalui ilustrasi yang mendetail dan narasi yang menegangkan, pembaca diajak untuk merasakan kengerian dari setiap kisah yang diceritakan.  Buku ini tersedia dalam format cetak dan dapat ditemukan di berbagai toko buku, termasuk Gramedia. Selain itu, versi digitalnya dapat diakses melalui platform seperti Google Play Books.  PLAY.GOOGLE.COM  Bagi penggemar cerita horor dan legenda urban, Komik Horor Nusantara: Setan Urban menawarkan pengalaman membaca yang mendebarkan sekaligus memperkaya wawasan tentang mitos dan cerita rakyat Indonesia.', 'Tersedia'),
(33, 'Crayon Shinchan : Sains Itu Menarik!', 'sinchan.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1101', 'Crayon Shinchan: Sains Itu Menarik! adalah buku edukatif yang menggabungkan humor khas Crayon Shinchan dengan penjelasan ilmiah yang sederhana dan menarik. Ditulis oleh Yoshito Usui, buku ini diterbitkan oleh Elex Media Komputindo pada 19 Januari 2015.', 'Tersedia'),
(34, 'The Crusades', 'the-crusades-9781471196430_hr.jpg', 'Sunday Times', 'Inggris', '1203', '1104', '', 'Tersedia'),
(35, 'The First Crusade', 'the-first-crusade-9781849837699_hr.jpg', 'Sunday Times', 'Inggris', '1203', '1104', '', 'Tersedia'),
(36, 'Hunter X Hunter Vol 6', '9786020230436_Hunter-X-Hunter-06.jpg', 'Gramedia', 'Indonesia', '1202', '1103', '', 'Tersedia'),
(37, 'Bumi', '9786020332956_Bumi-New-Cover.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(38, 'Bulan', '9786020332949_Bulan-New-Cover.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(39, 'Matahari', 'MATAHARI-TERE-LIYE.jpg', 'Gramedia', 'Indonesia', '1203', '1102', '', 'Tersedia'),
(40, 'Mushoku Tensei : Jobless Reincarnation', 'mt.jpg', 'Chruncy Roll', 'Inggris', '1203', '1103', '', 'Tersedia'),
(41, 'Naruto Vol 63', 'naruto.jpg', 'Gramedia', 'Indonesia', '1202', '1103', '', 'Tersedia'),
(42, 'Vinland Saga Vol 1', 'Vinland_Saga_volume_01_cover.jpg', 'Elex Media Komputindo', 'Indonesia', '1202', '1103', '', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` varchar(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
('1101', 'pengetahuan umum'),
('1102', 'sci-fi'),
('1103', 'petualangan'),
('1104', 'sejarah'),
('1105', 'horror');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('1201', 'ensiklopedia'),
('1202', 'komik'),
('1203', 'novel'),
('1204', 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
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

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_user`, `id_buku`, `rating`) VALUES
(1, 10, 17, 3),
(2, 11, 17, 4),
(3, 11, 25, 5),
(4, 11, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin'),
(6, 'aiken', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(7, 'wahyu', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(8, 'Dwiki', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(9, 'Rifqi', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'user'),
(10, 'ahmad', '123', 'user'),
(11, 'ujang', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_kategori` (`id_kategori`),
  ADD KEY `fk_genre` (`id_genre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
