-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 04:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_katalog`
--

CREATE TABLE `tb_katalog` (
  `buku_id` int(5) NOT NULL,
  `buku_judul` varchar(100) NOT NULL,
  `buku_penulis` varchar(50) NOT NULL,
  `buku_jenis` varchar(25) NOT NULL,
  `buku_cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_katalog`
--

INSERT INTO `tb_katalog` (`buku_id`, `buku_judul`, `buku_penulis`, `buku_jenis`, `buku_cover`) VALUES
(1, 'Sapiens: Riwayat Singkat Umat Manusia', 'Yuval Noah Harari', 'Nonfiksi', 'sapiens.jpg'),
(2, 'Cantik Itu Luka', 'Eka Kurniawan', 'Fiksi', 'cantik-itu-luka.jpg'),
(3, 'Bumi yang Tak Dapat Dihuni', 'David Wallace-Wells', 'Nonfiksi', 'bumi-tak-dapat-dihuni.jpg'),
(4, 'Sayap-Sayap Patah', 'Kahlil Gibran', 'Fiksi', 'sayap-patah.jpg'),
(5, 'Mencintai Sepakbola Indonesia Meski Kusut', 'Miftakhul FS', 'Nonfiksi', 'mencintai-sepak-bola.jpg'),
(6, 'Kosmos', 'Carl Sagan', 'Nonfiksi', 'kosmos.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_katalog`
--
ALTER TABLE `tb_katalog`
  ADD PRIMARY KEY (`buku_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_katalog`
--
ALTER TABLE `tb_katalog`
  MODIFY `buku_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
