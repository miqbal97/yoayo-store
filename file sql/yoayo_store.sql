-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2018 at 02:27 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoayo_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `diblokir` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_bergabung` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_lengkap`, `email`, `password`, `foto`, `superadmin`, `diblokir`, `tanggal_bergabung`) VALUES
('ADM1809251', 'Muhammad Iqbal', 'miqbal.admin@email.com', '$2y$10$unsKNzWw/QYFD.dZXQtMd.gztNCpV4uHUiZXD7FsG17Kw5F7oZAS6', 'muhammad_iqbal.jpg', 1, 0, '2018-09-25 20:28:55'),
('ADM1810162', 'Dimas Wahyu Pamungkas', 'dimas.admin@email.com', '$2y$10$8V6rBo9CcgmLU6NJNUlZ5.vncUtl9Kg3kmD/FcI92bZkH8Or2ULKC', 'default.png', 0, 0, '2018-10-16 12:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_merk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_barang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` double NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `foto_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_merk`, `deskripsi_barang`, `berat_barang`, `harga_satuan`, `stok_barang`, `foto_barang`, `tanggal_masuk`) VALUES
('BRG1810131', 'Bola Basket Wilson Highlight Original', 'KTG1810131', 'MRK1810131', '<p>WILSON HIGHLIGHT ORIGINAL<br />\r\nWarna: Black/Gold<br />\r\nHarga Retail: IDR 399.000<br />\r\n=============================<br />\r\nHarga kami: 340.000 -Hemat 59.000<br />\r\n=============================<br />\r\nSize: 7<br />\r\nArt #WTB068523<br />\r\n100% Original<br />\r\nMade In China<br />\r\nDesciption: Composite Leather</p>', 1000, 340000, 100, 'BRG1810131.jpg', '2018-10-13 01:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pengguna`
--

CREATE TABLE `tbl_detail_pengguna` (
  `id_pengguna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` text COLLATE utf8mb4_unicode_ci,
  `no_telepon` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_detail_pengguna`
--

INSERT INTO `tbl_detail_pengguna` (`id_pengguna`, `nama_lengkap`, `jenis_kelamin`, `alamat_rumah`, `no_telepon`) VALUES
('PGN1809201', 'Muhammad Iqbal', 'Laki - Laki', 'Citayam, Jawabarat', '082298277709');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pesanan`
--

CREATE TABLE `tbl_detail_pesanan` (
  `id_pesanan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `subtotal_berat` double NOT NULL,
  `subtotal_biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_detail_pesanan`
--

INSERT INTO `tbl_detail_pesanan` (`id_pesanan`, `id_barang`, `jumlah_beli`, `subtotal_berat`, `subtotal_biaya`) VALUES
('PSN131011', 'BRG1810131', 2, 2000, 680000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG1810131', 'Bola Basket');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_pengguna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `subtotal_berat` double NOT NULL,
  `subtotal_biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lupa_password`
--

CREATE TABLE `tbl_lupa_password` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_dihapus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id_merk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_merk` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_merk`
--

INSERT INTO `tbl_merk` (`id_merk`, `nama_merk`) VALUES
('MRK1810131', 'Wilson');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pesanan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_bukti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` tinyint(1) DEFAULT '0',
  `batas_pembayaran` date NOT NULL,
  `tanggal_upload` datetime DEFAULT CURRENT_TIMESTAMP,
  `selesai` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pesanan`, `foto_bukti`, `status_pembayaran`, `batas_pembayaran`, `tanggal_upload`, `selesai`) VALUES
('PSN131011', 'PSN131011.jpg', 1, '2018-10-14', '2018-10-13 01:43:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bergabung` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `email`, `password`, `tanggal_bergabung`) VALUES
('PGN1809201', 'miqbal.pengguna@email.com', '$2y$10$g0/uyAsGtTSLepUs4iGbje74KRb5YPf2abGHjS1p/k2BBPVnMg3AK', '2018-09-20 19:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pengguna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `layanan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkos_kirim` double NOT NULL,
  `total_bayar` double NOT NULL,
  `no_resi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pesanan` tinyint(4) NOT NULL,
  `dibatalkan` tinyint(1) NOT NULL,
  `tanggal_dikirim` datetime DEFAULT NULL,
  `tanggal_diterima` datetime DEFAULT NULL,
  `tanggal_pesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_pengguna`, `nama_penerima`, `alamat_tujuan`, `no_telepon`, `keterangan`, `layanan`, `ongkos_kirim`, `total_bayar`, `no_resi`, `status_pesanan`, `dibatalkan`, `tanggal_dikirim`, `tanggal_diterima`, `tanggal_pesanan`) VALUES
('PSN131011', 'PGN1809201', 'Muhammad Iqbal', 'Citayam, Jawabarat', '1234567890', 'test pesanan', 'YES', 36000, 716000, 'JNEINIRESIPENGIRIMAN', 5, 0, '2018-10-16 12:10:56', NULL, '2018-10-13 01:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verifikasi_akun`
--

CREATE TABLE `tbl_verifikasi_akun` (
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_auth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `tbl_admin_email_unique` (`email`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `tbl_barang_id_kategori_index` (`id_kategori`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `tbl_detail_pengguna`
--
ALTER TABLE `tbl_detail_pengguna`
  ADD UNIQUE KEY `tbl_detail_pengguna_id_pengguna_unique` (`id_pengguna`);

--
-- Indexes for table `tbl_detail_pesanan`
--
ALTER TABLE `tbl_detail_pesanan`
  ADD KEY `tbl_detail_pesanan_id_barang_index` (`id_barang`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_lupa_password`
--
ALTER TABLE `tbl_lupa_password`
  ADD UNIQUE KEY `tbl_lupa_password_email_unique` (`email`);

--
-- Indexes for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD UNIQUE KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `tbl_pengguna_email_unique` (`email`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `tbl_pesanan_id_pengguna_index` (`id_pengguna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `tbl_merk` (`id_merk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_pengguna`
--
ALTER TABLE `tbl_detail_pengguna`
  ADD CONSTRAINT `tbl_detail_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_pesanan`
--
ALTER TABLE `tbl_detail_pesanan`
  ADD CONSTRAINT `tbl_detail_pesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_pesanan_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `tbl_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD CONSTRAINT `tbl_keranjang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_keranjang_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tbl_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
