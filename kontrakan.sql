-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: Dec 05, 2019 at 04:40 PM
-- Server version: 5.6.45-86.1
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_24458541_kontrakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontrakan` bigint(100) DEFAULT NULL,
  `bulanan` bigint(100) DEFAULT NULL,
  `maxkontrakan` bigint(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `kontrakan`, `bulanan`, `maxkontrakan`) VALUES
(1, 'Adam', 3700000, 400000, 3800000),
(2, 'Bayu', 3000000, 403000, 4200000),
(3, 'Fajri', 1700000, 300000, 4300000),
(4, 'Firly', 2200000, 400000, 3800000),
(5, 'Prasetyo', 2000000, 335000, 4200000),
(16, 'Malik', 1700000, 200000, 4300000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `arah` varchar(100) NOT NULL,
  `nominal` int(100) NOT NULL,
  `tanggal` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `arah`, `nominal`, `tanggal`) VALUES
(1, 'Adam', 'Income', 100000, 1564592400),
(2, 'Bayu', 'Income', 151000, 1564592400),
(3, 'Firly', 'Income', 159000, 1564592400),
(4, 'Pras', 'Income', 100000, 1564592400),
(5, 'Listrik', 'Spending', 23000, 1564592400),
(6, 'Listrik', 'Spending', 23000, 1564592400),
(7, 'Listrik', 'Spending', 53000, 1564592400),
(8, 'Listrik', 'Spending', 53000, 1564592400),
(9, 'Listrik', 'Spending', 53000, 1564592400),
(10, 'Logistik', 'Spending', 60000, 1564592400),
(11, 'Post IG', 'Spending', 100000, 1564592400),
(12, 'PDAM', 'Spending', 72000, 1564592400),
(13, 'Listrik', 'Spending', 53000, 1564592400),
(14, 'Pras', 'Income', 100000, 1564592400),
(15, 'Pras', 'Income', 15000, 1564592400),
(16, 'Logistik', 'Spending', 15000, 1564592400),
(17, 'Listrik', 'Spending', 52500, 1564592400),
(22, 'LPG', 'Spending', 10000, 1564592400),
(21, 'Adam', 'Income', 50000, 1564592400),
(20, 'Mama Lemon', 'Spending', 4000, 1564592400),
(23, 'Minyak', 'Spending', 20000, 1564592400),
(24, 'Listrik', 'Spending', 52500, 1564592400),
(25, 'Malik', 'Income', 100000, 1564592400),
(26, 'Listrik', 'Spending', 52500, 1564592400),
(27, 'Fajri', 'Income', 100000, 1564592400),
(28, 'PDAM', 'Spending', 168000, 1564592400),
(29, 'Bayu', 'Income', 52000, 1564592400),
(30, 'Listrik', 'Spending', 52000, 1564592400),
(31, 'Adam', 'Income', 150000, 1564592400),
(32, 'Listrik', 'Spending', 52500, 1564592400),
(33, 'Bayu', 'Income', 50000, 1564592400),
(34, 'Busa', 'Spending', 15500, 1564592400),
(35, 'Sunlight', 'Spending', 10500, 1564592400),
(38, 'Fajri', 'Income', 200000, 1564592400),
(39, 'Pras', 'Income', 100000, 1564592400),
(40, 'Listrik', 'Spending', 52500, 1564592400),
(41, 'Listrik', 'Spending', 52500, 1564592400),
(42, 'Wifi', 'Spending', 425000, 1564592400),
(43, 'Firly', 'Income', 241000, 1564592400),
(44, 'Malik', 'Income', 100000, 1564592400),
(45, 'PDAM', 'Spending', 209000, 1564592400),
(46, 'Bayu', 'Income', 50000, 1564592400),
(47, 'Listrik', 'Spending', 52500, 1564592400),
(48, 'LPG', 'Spending', 20000, 1564592400),
(49, 'Pras', 'Income', 20000, 1564592400),
(50, 'Listrik', 'Spending', 52500, 1564592400),
(51, 'Bayu', 'Income', 50000, 1564592400),
(52, 'Adam', 'Income', 100000, 1564592400),
(53, 'Bayu', 'Income', 50000, 1575175525),
(54, 'Minyak sania', 'Spending', 23500, 1575509094),
(55, 'Sunlight', 'Spending', 9500, 1575509127),
(56, 'Spons busa', 'Spending', 11000, 1575509144);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
