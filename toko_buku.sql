-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 04:18 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` char(10) NOT NULL,
  `nama_bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
('B01', 'BCA'),
('B02', 'BRI'),
('B03', 'CIMB'),
('B04', 'Bank Jabar'),
('B05', 'Mandiri'),
('B06', 'Danamon'),
('B07', 'BTN');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `noisbn` char(20) NOT NULL,
  `id_penerbit` char(10) NOT NULL,
  `id_jenis` char(10) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `sinopsis` text NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`noisbn`, `id_penerbit`, `id_jenis`, `judul`, `sinopsis`, `penulis`, `tahun_terbit`, `stok`, `harga_jual`, `gambar`, `gambar2`, `gambar3`) VALUES
('1110098209', 'PT01', 'JS03', 'Kabayan Ngala Nangka', 'Aya Hiji Jalma Ngala Nangka', 'Tarsim M', 2010, 3, 20000, '375091_527306200659541_2028925955_n.jpg', '67087_485277941529034_373251904_n.jpg', '196352_479887852068043_1056966322_n.jpg'),
('111009872', 'PT02', 'JS01', 'Cinta Dan Cita-cita', 'Wajahmu sangat menawan... LOVE UUU', 'Asep Kobra', 2001, 98, 50000, 'cover buku---- Anak Sejuta Bintang.jpg', '522278_385365198214034_1411355502_n.jpg', 'conan3.jpg'),
('11100998000', 'PT05', 'JS03', '5 cm', 'Jangan Nonton 5 cm, matak bolor', 'Ijah hat', 2018, 894, 55000, 'ÃŒÂ²ÃŒÂ³_ÃŒÅ  ~RIO_).jpg', 'ÃŒÂ²ÃŒÂ³_ÃŒÅ .jpg', 'Ã¢Å’Â£ÃŒÅ Ã¢â€Ë†ÃŒÂ¥-ÃŒÂ¶ÃŒÂ¯ÃÂ¡Ã¢â„¢Ë†ÃŒÂ·ÃŒÂ´Ã…Å¾Ã¢â‚¬Å½Ã¢â‚¬â€¹Ãˆâ€¹lvÃ¢Ëœâ€šÃ¢â„¢Ë†ÃŒÂ·ÃŒÂ´Ã‚Â·ÃŒÂµÃŒÅ’ÃŒÂ­Ã‚Â«ÃŒÂ¶Ã¢Å’Â£.jpg'),
('1110099838', 'PT03', 'JS03', 'Elektronika', 'Good Bye Hard', 'Juned', 2004, 93, 20000, 'EKONOMI INDUSTRI.jpg', 'the_sailor_man_meets_sailor_moon_by_tr3forever-d5hpche.jpg', 'the gosho boys.jpg'),
('1110099840', 'PT04', 'JS02', 'Antara Ada Dan Tiada', 'TAMAT', 'Juned', 2020, 100, 25000, '1384012_593123810744446_1006212353_n.jpg', '67087_485277941529034_373251904_n.jpg', '196352_479887852068043_1056966322_n.jpg'),
('1110099844', 'PT04', 'JS02', 'Teruntuk Mantan', 'Sesosok makhluk yg menghantui kehidupan yg damai', 'Tarya', 2000, 126, 25000, 'Face .jpg', 'girl.gif', 'Picture.jpg'),
('1110099851', 'PT05', 'JS02', 'Gue Ingin Berkarya', 'Biarkan aku menjadi sesuatu yg berarti bagimu meskipun hanya sesaat', 'Komala', 2020, 20, 75000, 'IMG_20141024_1405451.jpg', 'IMG_20141029_1411551.jpg', 'IMG_20141106_1618571.jpg'),
('1113464', 'PT02', 'JS02', 'Cinta Kupling Tengkep', 'Ada sebuah rumah yg dihuni para jomblo.... TAMAT', 'Syukur Mahmud', 2000, 23, 35000, 'cover-cerpenfm.jpg', '$T2eC16N,!y0E9s2S5u+QBQW3v(2RBQ~~60_35.JPG', '206526_106531559430734_5878093_n.jpg'),
('111909292', 'PT01', 'JS01', 'Cahaya dan Bayangan', 'Ketika Cahaya dan Bayangan membuat keliru', 'Tatsu Maki', 2005, 89, 35000, 'Kukila.jpg', 'shinichi.jpg', 'shinichi and ran.jpg'),
('11198972', 'PT05', 'JS01', 'Jaringan Komputer', 'Jaringan is so very very easy maybe', 'Andri Kristanto', 2009, 147, 45000, 'sdtel.jpg', 'sakura.jpg', 'sakyura.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` char(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
('JS01', 'Dongeng'),
('JS02', 'Pendidikan'),
('JS03', 'Pengalaman');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_bayar`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_bayar` (
  `id_konfirm` int(11) NOT NULL,
  `idp` char(10) NOT NULL,
  `norek` int(11) NOT NULL,
  `narek` varchar(30) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_bank` char(20) NOT NULL,
  `tgl_transfer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bukti_bayar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_bayar`
--

INSERT INTO `konfirmasi_bayar` (`id_konfirm`, `idp`, `norek`, `narek`, `nominal`, `id_bank`, `tgl_transfer`, `bukti_bayar`) VALUES
(1, 'J01', 11100098, 'Juli', 50000, 'B07', '2017-02-28 07:32:44', 'Anime.jpg'),
(2, 'J02', 111000877, 'Depi Putria', 100000, 'B05', '2017-02-28 07:32:44', 'Expressions.jpg'),
(3, 'J03', 231193884, 'Uyat Suhidin', 50000, 'B02', '2017-02-28 07:32:44', 'Drawing nose.jpg'),
(5, 'J04', 111000870, 'Dimas A', 80000, 'B05', '2017-02-28 07:32:44', 'C360_2014-04-26-11-11-10-373.jpg'),
(7, 'J05', 11100093, 'Abdul Manaf', 80000, 'B04', '2017-02-28 07:32:44', 'IMG_1964 (533x800).jpg'),
(8, 'J06', 111000909, 'Jauhari Anwar', 200000, 'B02', '2017-02-28 07:32:44', 'Screenshot_2015-10-16-17-03-02.png'),
(9, 'J07', 1110008744, 'Gandi Sugandi', 100000, 'B05', '2017-02-28 07:32:44', 'IMG_20141106_1618571 - Copy.jpg'),
(10, 'J08', 111000877, 'Gandi Sugandi', 100000, 'B03', '2017-02-28 07:32:44', 'â€Žâ€‹ShÏ±Ä­L âˆ•Ì´Ì¸Æ– Ros.jpg'),
(11, 'J09', 111000987, 'Eef Taoufik Hidayat', 150000, 'B06', '2017-02-28 07:32:44', 'Screenshot_2015-10-15-03-58-53.png'),
(12, 'J10', 111000877, 'atn@yahoo.com', 50003, 'B02', '2017-02-28 07:32:44', '02.jpg'),
(13, 'J11', 111000877, 'Abdul Manaf', 100000, 'B02', '2017-02-27 20:07:11', '9da2cb710c058e31cf533dddb709d4e5.jpg'),
(14, 'J12', 11100098, 'Gandi Sugandi', 100000, 'B05', '2017-02-27 22:38:59', 'nota_bayar.pdf'),
(15, 'J13', 111000877, 'Dimas Adi', 50000, 'B03', '2017-02-27 23:48:07', 'nota_bayar.pdf'),
(16, 'J14', 1110009809, 'Uyat Suhidin', 270000, 'B04', '2017-03-01 00:33:17', 'nota_bayar.pdf'),
(17, '', 2147483647, 'Panji Alam', 120000, 'B05', '2017-03-01 01:14:21', 'jiji.pdf'),
(18, 'J15', 111000877, 'Panji Alam', 100000, 'B01', '2017-03-01 01:45:37', 'oo.pdf'),
(19, 'J16', 111000877, 'Panji Alam', 100000, 'B02', '2017-03-01 03:19:52', 'lll.pdf'),
(20, 'J17', 2147483647, 'Panji Alam', 60000, 'B05', '2017-02-28 19:45:56', 'mmmm.pdf'),
(21, 'J18', 1110008772, 'Uyat Suhidin', 50000, 'B06', '2017-02-28 23:56:30', 'v.pdf'),
(22, 'J19', 43, 'vvv', 4444444, 'B01', '2017-03-01 02:38:27', 'Penguins.jpg'),
(23, 'J20', 111000877, 'Uyat Suhidin', 50000, 'B02', '2017-03-02 00:07:51', 'nota_bayar.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `idk` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `telp` char(15) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` enum('admin','gudang','operator') NOT NULL,
  `stat` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idk`, `nama`, `foto`, `alamat`, `telp`, `jk`, `username`, `password`, `akses`, `stat`) VALUES
('K01', 'Ariel Teguh Nurahman', 'conan1.jpg', 'Jl. Gelap Yg Kau Pilih No.20', '089662391933', 'Laki-laki', 'real@real', 'good', 'admin', 'aktif'),
('K02', 'Slamet Riyadhi', 'jquery-autocomplete.jpg', 'Empang Sari', '02293000310', 'Laki-laki', 'imetzz@imetzz', 'imetzz12', 'gudang', 'aktif'),
('K03', 'Kokom Bashori', 'Desert.jpg', 'Manglayang Regency', '089662191933', 'Perempuan', 'kompor@kompor', 'kompor123', 'gudang', 'aktif'),
('K04', 'Asep Astahiam', '14 - 1.jpg', 'Ciguruwik Indah Blok C', '085722798116', 'Laki-laki', 'sepdur@sepdur', 'sepdur123', 'operator', 'aktif'),
('K06', 'Shyla Stylez', 'Jellyfish.jpg', 'Las Vegas', '01988393', 'Perempuan', 'shyla@shyla', 'shyla123', 'operator', 'aktif'),
('K08', 'Unknow', 'Penguins.jpg', '404 Not Found', 'Not Available', '', 'Anounimus@Anounimus', 'Anounimus', 'operator', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `idpem` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `telp` char(15) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`idpem`, `nama`, `foto`, `alamat`, `telp`, `jk`, `email`, `pass`, `tgl_daftar`) VALUES
('P01', 'Bah Gandi', '67087_485277941529034_373251904_n.jpg', '         Jl.Sukabumi No.38          ', '089662391934', 'Laki-laki', 'atn@yahoo.com', 'good', '2017-02-23'),
('P02', 'Uyat', 'Kartun.jpg', ' Jl. Kumbang No.90 ', '08380988913', 'Laki-laki', 'uyat@uyat.com', 'uyat123', '0000-00-00'),
('P03', 'devi pw', '13108_497324560324372_1550814095_n.jpg', 'cimuncang', '02293000310', 'Perempuan', 'dede123@depi', 'depi123', '2017-02-11'),
('P04', 'Dimas Adi Andrea', 'Koala.jpg', 'Cipacing', '0817852689', 'Laki-laki', 'dimasadiandrea@gmail.com', 'password', '2017-02-17'),
('P05', 'Abdul', 'Anime.jpg', 'Jauh', '08992339929', 'Laki-laki', 'dul@dul', 'duluan', '2017-02-19'),
('P06', 'Johari', 'cats.jpg', 'Jl. Kenangan No.90', '08900088828', 'Laki-laki', 'johari@johari', 'johari', '2017-02-26'),
('P07', 'Eef Taopik', '1458866035429.jpg', 'Jauh', '0883277380999', 'Perempuan', 'eef@eef', 'eef123', '2017-02-27'),
('P08', 'Panjul', '208726_106533989430491_3571556_n.jpg', 'Ciborelang ', '088327738099', 'Laki-laki', 'jul@jul', 'julan', '2017-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `id_penerbit` char(10) NOT NULL,
  `nm_p` varchar(30) NOT NULL,
  `almt_p` text NOT NULL,
  `tlp_p` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nm_p`, `almt_p`, `tlp_p`) VALUES
('PT01', 'Gajah Duduk', 'Jl. Kita Beda No.99', '02293000312'),
('PT02', 'Graha Mulya', 'Jl. Masih Teramat Jauh No.8', '02179187676'),
('PT03', 'Sinar Dunia', 'Jl. Gelap Yg Kau Pilih', '089722798116'),
('PT04', 'Kunci Mas', 'Jauh', '022930003109'),
('PT05', 'Kaki Gajah', 'Jauh', '08098876665');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_penerbit` char(10) NOT NULL,
  `noisbn` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_penerbit`, `noisbn`, `jumlah`, `tgl`) VALUES
(1, 'PT03', 1110098209, 900, '2017-02-08'),
(2, 'PT01', 1110099838, 999, '2017-02-01'),
(3, 'PT01', 2147483647, 900, '2017-02-26'),
(4, 'PT01', 1110098209, 390, '2017-02-13'),
(5, 'PT01', 1113464, 100, '2017-02-09'),
(6, 'PT05', 2147483647, 100, '2017-02-20'),
(7, 'PT02', 111009872, 50, '2017-02-11'),
(8, 'PT03', 1110099838, 30, '2017-02-03'),
(9, 'PT05', 1110099851, 40, '2017-02-07'),
(10, 'PT03', 1110099838, 50, '2017-02-09'),
(11, 'PT03', 1110099838, 24, '2017-02-12'),
(12, 'PT04', 1110099840, 100, '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `idp` char(10) NOT NULL,
  `idpem` char(10) NOT NULL,
  `idk` char(10) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('tunggu','berhasil','gagal') NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idp`, `idpem`, `idk`, `total`, `status`, `tgl`) VALUES
('J01', 'P01', 'K01', 50000, 'berhasil', '2017-02-23 11:20:02'),
('J02', 'P03', 'K01', 25000, 'berhasil', '2017-02-25 17:50:29'),
('J03', 'P02', 'K01', 45000, 'gagal', '2017-02-25 17:45:36'),
('J04', 'P04', 'K01', 65000, 'gagal', '2017-02-25 18:51:43'),
('J05', 'P05', 'K01', 65000, 'berhasil', '2017-02-26 09:53:04'),
('J06', 'P06', 'K01', 145000, 'berhasil', '2017-02-26 09:53:45'),
('J07', 'P01', 'K04', 60000, 'berhasil', '2017-02-26 19:15:35'),
('J08', 'P01', 'K04', 90000, 'gagal', '2017-02-27 07:17:59'),
('J09', 'P07', 'K06', 145000, 'berhasil', '2017-02-27 07:18:53'),
('J10', 'P01', 'K04', 20000, 'berhasil', '2017-03-01 00:31:10'),
('J11', 'P01', 'K04', 75000, 'gagal', '2017-02-28 20:01:36'),
('J12', 'P01', 'K04', 90000, 'gagal', '2017-03-01 00:30:35'),
('J13', 'P04', 'K04', 35000, 'gagal', '2017-02-28 19:59:42'),
('J14', 'P02', 'K04', 265000, 'gagal', '2017-03-01 00:42:45'),
('J15', 'P08', 'K06', 70000, 'berhasil', '2017-03-01 01:56:23'),
('J16', 'P08', 'K04', 75000, 'gagal', '2017-03-01 03:21:48'),
('J17', 'P08', 'K06', 55000, 'gagal', '2017-03-01 16:11:24'),
('J18', 'P02', 'K06', 50000, 'berhasil', '2017-03-01 16:11:34'),
('J19', 'P02', 'K06', 75000, 'berhasil', '2017-03-01 16:07:42'),
('J20', 'P02', 'K06', 20000, 'berhasil', '2017-03-02 00:16:31'),
('J21', 'P02', '', 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_jual`
--

CREATE TABLE IF NOT EXISTS `rincian_jual` (
  `id_rincian` int(11) NOT NULL,
  `idp` char(10) NOT NULL,
  `noisbn` char(20) NOT NULL,
  `jumlah` char(20) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian_jual`
--

INSERT INTO `rincian_jual` (`id_rincian`, `idp`, `noisbn`, `jumlah`, `subtotal`) VALUES
(25, 'J01', '111009872', '1', 50000),
(48, 'J02', '1110099844', '1', 25000),
(61, 'J03', '11198972', '1', 45000),
(70, 'J04', '1110099838', '1', 20000),
(71, 'J04', '11198972', '1', 45000),
(72, 'J05', '1110098209', '1', 20000),
(73, 'J05', '11198972', '1', 45000),
(74, 'J06', '1113464', '3', 105000),
(75, 'J06', '1110099838', '2', 40000),
(76, 'J07', '1110099844', '1', 25000),
(77, 'J07', '111909292', '1', 35000),
(79, 'J08', '111909292', '1', 35000),
(82, 'J08', '11100998000', '1', 55000),
(83, 'J09', '11100998000', '2', 110000),
(84, 'J09', '1113464', '1', 35000),
(85, 'J10', '1110098209', '1', 20000),
(87, 'J11', '11100998000', '1', 55000),
(88, 'J11', '1110099838', '1', 20000),
(89, 'J12', '1110099838', '1', 20000),
(91, 'J12', '111909292', '2', 70000),
(92, 'J13', '1113464', '1', 35000),
(97, 'J14', '1110099851', '2', 150000),
(98, 'J14', '11198972', '1', 45000),
(99, 'J14', '1113464', '2', 70000),
(102, 'J15', '1113464', '1', 35000),
(103, 'J15', '111909292', '1', 35000),
(105, 'J16', '1110099838', '1', 20000),
(106, 'J16', '11100998000', '1', 55000),
(109, 'J17', '1110098209', '1', 20000),
(110, 'J17', '111909292', '1', 35000),
(113, 'J18', '111009872', '1', 50000),
(114, 'J19', '11100998000', '1', 55000),
(115, 'J19', '1110099838', '1', 20000),
(116, 'J20', '1110099838', '1', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`noisbn`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  ADD PRIMARY KEY (`id_konfirm`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idpem`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `rincian_jual`
--
ALTER TABLE `rincian_jual`
  ADD PRIMARY KEY (`id_rincian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  MODIFY `id_konfirm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rincian_jual`
--
ALTER TABLE `rincian_jual`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
