-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Apr 2015 pada 02.58
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_paper`
--

CREATE TABLE IF NOT EXISTS `comment_paper` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `user_id` int(64) NOT NULL,
  `paper_id` int(64) NOT NULL,
  `content` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`user_id`),
  KEY `paper_id` (`paper_id`),
  KEY `user_id` (`user_id`),
  KEY `paper_id_2` (`paper_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `comment_paper`
--

INSERT INTO `comment_paper` (`id`, `user_id`, `paper_id`, `content`) VALUES
(1, 1, 8, 'pertama'),
(2, 1, 9, 'kedua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `web` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `accomodation` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `cost`
--

INSERT INTO `cost` (`id`, `accomodation`, `register`) VALUES
(3, 'jalan jalan yok', '50.000'),
(4, 'pergi', 'kemana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_accumulation`
--

CREATE TABLE IF NOT EXISTS `cost_accumulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `paper_id` int(64) NOT NULL,
  `cost_id` int(64) NOT NULL,
  `item` varchar(64) NOT NULL,
  `item_cost` varchar(64) NOT NULL,
  `total` varchar(64) NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cost_id` (`cost_id`),
  KEY `member_id` (`user_id`),
  KEY `paper_id` (`paper_id`),
  KEY `user_id` (`user_id`),
  KEY `paper_id_2` (`paper_id`),
  KEY `cost_id_2` (`cost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1428399367),
('m130524_201442_init', 1428399374);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `user_id` int(64) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(64) NOT NULL,
  `tanggal_penting` date NOT NULL,
  `judul_tanggal_penting` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `post_news` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `user_id`, `date`, `title`, `tanggal_penting`, `judul_tanggal_penting`, `content`, `post_news`) VALUES
(12, 1, '2015-11-11', 'Mouse Gaming Canggih ini Bisa Dipakai untuk Deteksi Tingkat Stre', '2015-11-09', 'Simulasi', '\r\nBagi seorang gamer, waktu bermain game merupakan momen yang menyenangkan dan bahkan bisa membuat lupa waktu. Tak jarang seorang gamer pun mengalami gangguan kesehatan karena terlalu banyak bermain game. Dan untuk mengatasi hal ini, sebuah perusahaan bernama Mionix pun mempunyai produk yang bisa membantu, yakni mouse gaming bernama NAOS QG.\r\n\r\nMouse ini diklaim bisa dipakai untuk mendeteksi tingkat stress seorang gamer. Untuk melakukan hal tersebut, mouse ini memanfaatkan keringat yang selanjutnya dipakai untuk mengetahui tingkat stress. Dengan begitu, maka gamer pun bisa mengetahui harus beristirahat pada saat asyik bermain game.\r\nCEO Mionix Carl Silbersky mengungkapkan kalau dengan adanya data tersebut, maka seorang gamer bisa mengetahui bagaimana reaksi yang dilakukan oleh tubuh. Bahkan jika bermain bersama teman, seorang gamer pun bisa secara langsung melihat reaksi rekannya.\r\n\r\nMouse ini sendiri merupakan salah satu proyek crowdfunding Kickstarter yang berhasil terwujud. Saat ini, NAOS QG tengah dalam proses produksi dan menurut rencana akan mulai dikirimkan kepada para penyandang dana pada bulan Agustus, dan selanjutnya bakal mulai dijual bebas pada bulan September mendatang.', ''),
(13, 1, '2015-04-22', '90 Persen Koneksi Internet WiFi Gratis bakal Tersedia di Bandung', '2015-11-05', 'Pendaftaran Rakorwil dan Seminar', '\r\nWalikota Bandung Ridwan Kamil mempunyai ambisi untuk membuat kota yang dipimpinnya tersebut sebagai smart city. Dan untuk menunjang konsep smart city di kota Bandung, pemerintah setempat pun bakal menyediakan hotspot WiFi di berbagai tempat di kota kembang tersebut.\r\n\r\nDikutip dari Detik, pria yang kerap disebut dengan panggilan Kang Emil itu tidak mengungkapkan seberapa banyak hotspot WiFi yang bakal tersedia di kota Bandung. Namun dia meyakinkan kalau 90 persen dari hotspot WiFi yang ada bakal bisa digunakan secara gratis. Dengan begitu, masyarakat bisa terhubung dengan internet tanpa bayar dan bisa dilakukan di manapun.\r\nSebagai tambahan, saat ini pihaknya juga tengah menyiapkan sebuah aplikasi yang disebut dengan nama Panic Button. Aplikasi ini pun bakal bisa digunakan oleh para pengguna smartphone di kota Bandung. Dengan adanya aplikasi ini, masyarakat tinggal menekan tombol kalau-kalau menjadi salah satu korban kejahatan.', ''),
(14, 1, '2015-04-22', 'ZTE Tuduh Kamera Smartphone Huawei P8 Melanggar Hak Paten Milikn', '2015-04-22', 'Pelaksanaan Rakorwil & Seminar', 'Huawei baru saja meluncurkan ponsel andalannya yakni Huawei P8 dan P8 Max. Dan belum dipasarkan secara resmi, handphone Huawei P8 sudah mendapatkan ganjalan dari seteru Huawei sesama perusahaan dari Cina, yakni ZTE.\r\n\r\nMenurut laporan dari Gizmochina, ZTE telah mengajukan tuntutan hukum kepada Huawei karena masalah pelanggaran hak paten. Dalam laporan tersebut, ZTE menganggap kalau teknologi kamera yang digunakan oleh Huawei P8 dan MediaPad X2 menggunakan hak paten miliknya.\r\nPaten teknologi yang dimaksud disebut ‘Slow Shutter and Capture’ serta ‘Imaging and Mobile Terminal Tech’. Teknologi ini memungkinkan smartphone Huawei P8 untuk bisa memperoleh gambar yang bagus meski digunakan pada kondisi pencahayaan kurang. Bahkan pihak Huawei sempat mengklaim kalau kamera P8 mempunyai kualitas setara kamera DSLR.\r\n\r\nPihak ZTE pun sudah mengirimkan notifikasi terkait tuntutan hukum pelanggaran hak paten ini kepada Huawei. Dan terkait hal tersebut, ZTE pun meminta agar Huawei menghentikan proses produksi serta penjualan kedua ponsel tersebut. Namun pihak Huawei belum memberikan keterangannya terkait permasalahan ini.', 'Tanpa terasa kita sudah akan bertemu lagi dalam acara tahunan APTIKOM Wilayah I yaitu Rapat Koordinasi Wilayah I (Rakorwil I). Sejalan dengan Rakorwil I ini akan diadakan juga seminar nasional teknologi informasi dan komunikasi (SNIKOM 2014).Untuk tahun 2014 ini, Institut Teknologi Del (IT Del) mendapat kehormatan untuk menjadi tuan rumah. Untuk itu segenap sivitas akademika IT Del mengucapkan terima kasih banyak kepada pengurus APTIKOM atas kepercayaan ini. Sebagai tuan rumah, IT Del akan berusaha semaksimal mungkin agar acara yang demikian penting ini dapat berjalan sesuai dengan yang diharapkan.Melalui Rakorwil I ini tentu akan diambil keputusan-keputusan strategis yang dapat memicu kemajuan bersama di wilayah ini sehingga semua anggotanya mampu bersaing di tingkat nasional maupun internasional. Demikian juga dalam SNIKOM dapat berbagi hasil hasil penelitian yang sudah dilakukan masing-masing anggota APTIKOM dan diharapkan dapat menjalin kejasama penelitian.Mari kita dukung bersama agar Rakorwil I dan SNIKOM 2014 dapat berjalan dengan sukses.Salam'),
(56, 1, '2015-12-12', 'Samsung Resmi Perkenalkan Dua Tablet Galaxy Tab A Series Terbaru', '2015-05-02', 'Submission paper', 'Dua buah tablet yang masuk dalam seri Galaxy Tab A baru saja diperkenalkan oleh Samsung. Dua tablet tersebut adalah Samsung Galaxy Tab A8 dan Galaxy Tab A 9.7. Kedua perangkat Android ini lebih ditujukan untuk segmen menengah ke bawah dengan spesifikasi dan harga yang tak terlalu tinggi.\r\n\r\nDua tablet Android Lollipop 5.0 ini juga hadir dengan spesifikasi yang identik. Hanya terdapat perbedaan pada bagian ukuran layar. Selain itu, kedua tablet ini juga hadir dengan aspek rasio 4:3, berbeda dengan produk-produk tablet sebelumnya yang menggunakan rasio layar 16:9 atau 16:10.\r\nLayar kedua tablet ini sama-sama menggunakan resolusi 1024 x 768 piksel. Di bagian dalamnya, tersemat prosesor quad core Snapragon 410 1,2GHz dengan RAM 1,5GB dan memory internal 16GB. Ada dukungan slot microSD hingga 128GB.\r\n\r\nSelanjutnya, perangkat ini mempunyai dual kamera 5MP di bagian belakang serta 2MP di bagian depan. Untuk Galaxy Tab A 8, dibekali dengan baterai berkapasitas 4.200 mAh, sementara Galaxy Tab A 9.7 mempunyai baterai berkapasitas 6.000 mAh. Harga kedua tablet ini masing-masing adalah 229 USD dan 299 USD.', ''),
(58, 1, '2015-10-11', 'Tablet Raksasa Panasonic Toughpad 4K kini Hadir dengan Prosesor ', '2015-03-03', 'Review paper', 'Tahun lalu Panasonic secara mengejutkan mempunyai produk tablet raksasa berukuran 20 inci yang mempunyai resolusi tinggi 4K 3840 x 2560 piksel. Pada saat itu, tablet tersebut hadir dengan prosesor Intel Ivy Bridge serta grafis NVIDIA. Dan kini, perusahaan asal Jepang itu memutuskan untuk mendatangkan Toughpad dengan spesifikasi yang lebih baru.\r\n\r\nPanasonic Toughpad 4K terbaru ini hadir dengan prosesor Intel Core i5 Broadwell. Tablet ini tetap menggunakan OS Windows yang dilengkapi dengan Intel vPro, HDMI 2.0, mini DisplayPort, USB 3.0, WiFi 802.11ac, Bluetooth 4.0 serta Ethernet.\r\nTerdapat dua versi tablet Panasonic Toughpad 4K dihadirkan dalam dua model. Model standar dengan banderol sebesar 2.999 USD menggunakan grafis Intel HD. Sementara untuk versi yang lebih mahal menggunakan grafis NVIDIA dan dilengkapi pen digital. Selanjutnya, tablet ini menggunakan layar IPS dengan rasio 15:10, wide view serta ditujukan untuk para profesional.', ''),
(59, 1, '2015-03-03', 'ZTE Tuduh Kamera Smartphone Huawei P8 Melanggar Hak Paten Milikn', '2015-04-04', 'Pengumuman penerimaan makalah', 'Huawei baru saja meluncurkan ponsel andalannya yakni Huawei P8 dan P8 Max. Dan belum dipasarkan secara resmi, handphone Huawei P8 sudah mendapatkan ganjalan dari seteru Huawei sesama perusahaan dari Cina, yakni ZTE.\r\n', ''),
(60, 1, '0000-00-00', 'Jalan-Jalan setelah Seminar', '2015-09-09', 'Final paper', 'setelah seminar selesai , akan di adakan Jalan - Jalan keliling Samosir\r\nbagi peserta yang ingin ikut  dapat daftar disini : >>', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paper`
--

CREATE TABLE IF NOT EXISTS `paper` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `user_id` int(64) NOT NULL,
  `pre_paper` varchar(64) NOT NULL,
  `final_paper` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `modified_time` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `paper`
--

INSERT INTO `paper` (`id`, `user_id`, `pre_paper`, `final_paper`, `status`, `modified_time`) VALUES
(8, 1, 'Form_IB_4242_2.pdf', '', 'belum bayar', '2015-04-23'),
(9, 1, 'Form_IB_4242_2.pdf', '', 'belum bayar', '2015-04-23'),
(11, 1, '', '', 'belum bayar', '2015-04-24'),
(12, 1, 'codekitin.pdf', '', 'belum bayar', '2015-04-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `phone` int(64) NOT NULL,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `last_name`, `gender`, `birth`, `phone`, `image`) VALUES
(1, 'witri', 'jY87H-RmDZ9LYV9jA3P-vi0nJlcLoX6s', '$2y$13$UjgSIFTG57ubNXQmgXkFsOLspstgsQ7QFxeQDQwOLg0xG2Nb4BSOy', NULL, 'witrizakia@gmail.com', 10, 1428399418, 1428399418, '', '', '', '0000-00-00', 0, ''),
(3, 'tamy', 'nZK0M8zO-z7ZM1jIXBL-U2ve96TnBclF', '$2y$13$ZlI7IvcAQL5GfXfTFbo5pOb1ZbhAIDJKHtuMV7TUqBrYbaoxS0cZe', NULL, 'tamy@gmail.com', 10, 1429170946, 1429170946, 'tamy', 'sihotang', 'Perempuan', '0000-00-00', 99876543, 'upload/tamy.jpg'),
(4, 'bima', 'xK2eFnn7w-gzr1FWbws858g3Sy_bEp1n', '$2y$13$5B2ULgjzQjFinWAILLH7OOXH4e3yN94CdBllMql/17KEHOL.xlnJq', NULL, 'retnowulan521@gmail.com', 10, 1429171890, 1429171890, 'Retno', 'Tambunan', 'Perempuan', '0000-00-00', 2147483647, 'upload/bima.jpg'),
(5, 'sinaga', 'qfvGmyTsaDb3zAptbCKbVloXGOK0gKAE', '$2y$13$pp0aR0DHsNKiyQeoeMHj2OXVmgSdRvmbRWIbArcPDmABMuaQU.zOC', NULL, 'sinaga@gmail.com', 10, 1429847285, 1429847285, 'sinaga', 'bima', 'pria', '0000-00-00', 2147483647, 'upload/sinaga.png'),
(6, 'rony', '9nasOvffcBDWv1bSIAqaTCAkKa-JNdJw', '$2y$13$QVnd8Kkmsw3MElHLD8Z/5OsxMFxrleDeNejLAV6Hy12cb2Rdytitq', NULL, 'rony@gmail.com', 10, 1429847900, 1429847900, 'rony', 'sinurat', 'pria', '2015-04-24', 2147483647, 'rony.png'),
(7, 'bimbim', 'uddWm1mvArgdPL1N_TdJBrUZjM0NtVCW', '$2y$13$2yfp2VrWUI.WztdJiy3MwekmrllbBYUT/dmP1PX1G7dSqNrfz9Bfy', NULL, 'bima1@gmail.com', 10, 1429848936, 1429848936, 'bimbim', 'sinaga', 'pria', '2015-03-21', 2147483647, 'bimbim.png');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment_paper`
--
ALTER TABLE `comment_paper`
  ADD CONSTRAINT `comment_paper_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`id`),
  ADD CONSTRAINT `comment_paper_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `cost_accumulation`
--
ALTER TABLE `cost_accumulation`
  ADD CONSTRAINT `cost_accumulation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cost_accumulation_ibfk_2` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`id`),
  ADD CONSTRAINT `cost_accumulation_ibfk_3` FOREIGN KEY (`cost_id`) REFERENCES `cost` (`id`);

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `paper_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
