-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 05:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gedebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passsword` varchar(20) NOT NULL,
  `jn_kelamin` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tggl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `passsword`, `jn_kelamin`, `alamat`, `email`, `tggl_lahir`) VALUES
('IDAD01', 'Muhammad Naufal T', 'Naufal', 'adminnaufal', 'Laki-laki', 'bogor barat', 'naufaalt18@gmail.com', '2003-03-18'),
('IDAD02', 'Meutia Quroti Ayun', 'Meutia', 'adminmeutia', 'Perempuan', 'Bekasi Timur', 'meutiaqurotiayun@gmail.com', '2003-03-18'),
('IDAD03', 'Jose Rizal ', 'josee', 'adminrizzz', 'Laki-laki', 'Cengkareng ', 'joserizal082627@gmail.com', '2003-04-27'),
('IDAD04', 'Abimanyu Priyatno', 'Abimanyu', 'adminabim', 'Laki-laki', 'Tanggerang ', 'abimanyupriyatno@gmail.com', '2003-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passsword` varchar(20) NOT NULL,
  `jn_kelamin` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tggl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `username`, `passsword`, `jn_kelamin`, `alamat`, `email`, `tggl_lahir`) VALUES
('IDAG01', 'Rizky Pratiwi', 'RizPrat', 'RizPrat0502', 'Perempuan', 'Jakarta Utara', 'rizkypratiwi@gmail.com', '2003-05-02'),
('IDAG02', 'Budi Santoso', 'BudiSan', 'Budisan0415', 'Laki-laki', 'Tanggerang Selatan', 'budisantoso@gmail.com', '2004-04-15'),
('IDAG03', 'Made Wijaya', 'MadeWija', 'Madewija0718', 'Laki-laki', 'Bogor', 'madewijaya@gmail.com', '2002-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` char(6) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `cover_buku` varchar(255) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stok` int(2) NOT NULL,
  `ketersediaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `cover_buku`, `pengarang`, `penerbit`, `tahun`, `stok`, `ketersediaan`) VALUES
('B001', 'Laskar Pelangi', 'fotobuku/laskar_pelangi.jpg', 'Andrea Hirata', 'Bentang Pustaka', 2005, 50, '2033-06-09'),
('B002', 'Bumi Manusia', 'fotobuku/bumi_manusia.jpg', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 1980, 80, '2033-06-09'),
('B003', 'Ayat-Ayat Cinta', 'fotobuku/ayat_ayat_cinta.jpg', 'Habiburrahman El Shirazy', 'Republika Penerbit', 2004, 90, '2033-06-09'),
('B004', 'Pulang', 'fotobuku/pulang.jpg', 'Tere Liye', 'Bentang Pustaka', 2015, 70, '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `penukaran`
--

CREATE TABLE `penukaran` (
  `id_penukaran` int(6) NOT NULL,
  `id_anggota` char(6) NOT NULL,
  `id_buku` char(6) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tggl_pinjam` date NOT NULL,
  `tggl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `req_tukarbuku`
--

CREATE TABLE `req_tukarbuku` (
  `id_reqbuku` int(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `penukaran`
--
ALTER TABLE `penukaran`
  ADD PRIMARY KEY (`id_penukaran`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `req_tukarbuku`
--
ALTER TABLE `req_tukarbuku`
  ADD PRIMARY KEY (`id_reqbuku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penukaran`
--
ALTER TABLE `penukaran`
  MODIFY `id_penukaran` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `req_tukarbuku`
--
ALTER TABLE `req_tukarbuku`
  MODIFY `id_reqbuku` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penukaran`
--
ALTER TABLE `penukaran`
  ADD CONSTRAINT `penukaran_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `penukaran_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
