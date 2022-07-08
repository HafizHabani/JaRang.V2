-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 06:48 PM
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
-- Database: `jarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `jumlah`, `berat`, `kondisi`) VALUES
('2022070862c84fc82c199', 'Laptop', 2, '6 kg', 'Dalam Box'),
('2022070862c851d763fba', 'laptop', 2, '20kg', 'Dalam Box');

-- --------------------------------------------------------

--
-- Table structure for table `ceklist`
--

CREATE TABLE `ceklist` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(55) NOT NULL,
  `id_pengirim` varchar(55) NOT NULL,
  `id_penerima` varchar(55) NOT NULL,
  `statuscek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ceklist`
--

INSERT INTO `ceklist` (`id`, `id_barang`, `id_pengirim`, `id_penerima`, `statuscek`) VALUES
(34, '2022070862c84fc82c199', '2022070862c84fc82c199', '2022070862c84fc82c199', 'Tervalidasi'),
(35, '2022070862c851d763fba', '2022070862c851d763fba', '2022070862c851d763fba', 'Tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_pengemasan` int(11) NOT NULL,
  `id_penerima` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `alamat`, `tanggal`, `id_pengemasan`, `id_penerima`) VALUES
(20, 'Jl. Celestia no.33', '2022-07-08', 14, '2022070862c84fc82c199'),
(21, 'Jl. Celestia no.33', '2022-07-08', 15, '2022070862c851d763fba');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_ceklist` int(11) NOT NULL,
  `kwitansi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `statuspem` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_ceklist`, `kwitansi`, `harga`, `statuspem`) VALUES
(27, 34, '65000', 2022070862, 'Sudah Diba'),
(28, 35, '2091', 2022070862, 'Sudah Diba');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id`, `nama`, `alamat`, `hp`) VALUES
('2022070862c84fc82c199', 'Aether', 'Jl. Celestia no.33', '0812998877'),
('2022070862c851d763fba', 'Elon Musk', 'Jl. Celestia no.33', '0812391231');

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan`
--

CREATE TABLE `pengemasan` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengemasan`
--

INSERT INTO `pengemasan` (`id`, `id_pembayaran`, `jumlah`, `berat`) VALUES
(14, 27, 1, 6),
(15, 28, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `id` varchar(55) NOT NULL,
  `nama_k` varchar(255) NOT NULL,
  `alamat_k` text NOT NULL,
  `hp_k` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`id`, `nama_k`, `alamat_k`, `hp_k`) VALUES
('2022070862c84fc82c199', 'Kazuha', 'Jl. Inazuma no.12', '081122334455'),
('2022070862c851d763fba', 'Kazuha', 'Jl. Inazuma no.12', '08123123132');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceklist`
--
ALTER TABLE `ceklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pengirim` (`id_pengirim`),
  ADD KEY `idx_barang` (`id_barang`),
  ADD KEY `id_pernerima` (`id_penerima`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penerima` (`id_penerima`),
  ADD KEY `id_pengemasan` (`id_pengemasan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ceklist` (`id_ceklist`) USING BTREE;

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan`
--
ALTER TABLE `pengemasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceklist`
--
ALTER TABLE `ceklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengemasan`
--
ALTER TABLE `pengemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ceklist`
--
ALTER TABLE `ceklist`
  ADD CONSTRAINT `ceklist_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ceklist_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirim` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ceklist_ibfk_3` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`id_pengemasan`) REFERENCES `pengemasan` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_ceklist`) REFERENCES `ceklist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengemasan`
--
ALTER TABLE `pengemasan`
  ADD CONSTRAINT `pengemasan_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
