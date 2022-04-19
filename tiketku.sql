-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Apr 2022 pada 10.21
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `pk_login_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`pk_login_id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `pk_transaksi_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `tempat_wisata` int(11) DEFAULT NULL,
  `tanggal_kunjungan` varchar(50) DEFAULT NULL,
  `dewasa` varchar(50) DEFAULT NULL,
  `anak` varchar(50) DEFAULT NULL,
  `qrcode` varchar(25) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`pk_transaksi_id`, `nama_lengkap`, `no_identitas`, `no_hp`, `tempat_wisata`, `tanggal_kunjungan`, `dewasa`, `anak`, `qrcode`, `created_date`, `status`) VALUES
(3, 'Andri', '989', '989', 1, '2022-04-17', '1', '1', NULL, '2022-04-17', 'Y'),
(9, 'Dini', '121231321231', '089614729915', 2, '2022-04-17', '1', '2', NULL, '2022-04-17', 'Y'),
(21, 'rema', '453', '345432', 1, '2022-04-18', '3453', '234', '333745003.png', '2022-04-18', 'N'),
(22, 'Risma', '08378672376239', '085834663856', 5, '2022-04-20', '2', '1', '108436401.png', '2022-04-18', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `wisata_id` int(11) NOT NULL,
  `nama_tempat` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `tiket_dewasa` int(11) DEFAULT NULL,
  `tiket_anak` int(11) DEFAULT NULL,
  `embed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`wisata_id`, `nama_tempat`, `lokasi`, `deskripsi`, `foto`, `tiket_dewasa`, `tiket_anak`, `embed`) VALUES
(1, 'Nusa Dua', 'Bali', 'Pulau Seribu Dewa satu ini memang tidak perlu diragukan lagi terkait keindahan dan pesonanya dalam memikat para wisatawan dalam negeri maupun mancanegara. Di Bali, ada satu tempat wisata yang begitu cantik, yakni Nusa Dua. Objek wisata pantai ini memiliki pasir putih yang lembut dan air laut yang berwarna biru jernih. Kamu akan dimanjakan dengan berbagai fasilitas saat berkunjung ke tempat satu ini. Mulai dari penginapan dan resort yang berkelas, restoran, pusat perbelanjaan, hingga aktivitas berselancar di pantainya.', 'https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2020/06/Nusa-Dua-Bali.jpg', 50000, 25000, 'https://www.youtube.com/embed/FFr-JNgk794'),
(2, 'Gunung Rinjani', 'Lombok, NTB', 'Gunung Rinjani memiliki pemandangan terindah se-Asia dengan hamparan bunga edelweis dan Danau Segara Anak. Di tempat ini juga bisa menjadi spot menarik bagi para pendaki untuk mendirikan tenda, mandi air hangat, maupun memancing ikan. Namun sebelum itu, buatlah persiapan yang matang sebelum memutuskan untuk mendaki. Kamu juga perlu menyiapkan bekal mental dan stamina agar tidak menyerah di tengah jalan.', 'https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2020/06/gunung-rinjani.jpg', 25000, 12500, 'https://www.youtube.com/embed/oc0LV2_6MSE'),
(5, 'Danau Toba', 'Sumatra Utara', 'Danau dengan keindahan yang tidak tertandingi ini merupakan danau vulkanik terbesar di Asia Tenggara dan terbesar kedua di dunia setelah Danau Victoria.\r\n\r\nDanau Toba sudah lama terkenal sebagai salah satu objek wisata Indonesia favorit yang sering dikunjungi sejak tahun 1980-an lho!\r\n\r\nObjek wisata Indonesia yang terkenal di dunia ini memiliki luas 1.145 kilometer persegi. Di tengah danau terdapat Pulau Samosir yang luasnya hampir sebanding dengan negara Singapura. Bisa bayangin kan Toppers, betapa megahnya Danau Toba ini?\r\n\r\nSelain terluas, danau ini juga termasuk salah satu danau terdalam di dunia dengan kedalaman sekitar 450 meter.\r\n\r\nBuat Toppers yang sedang atau ingin berkunjung ke Sumatera Utara, sempatkan mampir untuk menikmati keindahan Danau Toba, ya.', 'https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2018/11/danau-toba.jpg', 30000, 15000, 'https://www.youtube.com/embed/Za2zEoGcfmU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`pk_login_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`pk_transaksi_id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`wisata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `pk_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `pk_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `wisata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
