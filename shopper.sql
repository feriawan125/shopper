-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 06:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KodeBarang` int(11) NOT NULL,
  `NamaBarang` varchar(100) NOT NULL,
  `StokBarang` int(11) NOT NULL DEFAULT '0',
  `HargaBeli` double NOT NULL,
  `HargaJual` double NOT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `Slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KodeBarang`, `NamaBarang`, `StokBarang`, `HargaBeli`, `HargaJual`, `CreatedAt`, `UpdatedAt`, `Slug`) VALUES
(10, 'Le Minerale 600ML ', -1, 2500, 3000, '2020-11-28 02:36:19', '2020-11-28 05:48:44', 'minerale600'),
(12, 'Aqua 600ML', -2, 2000, 3000, '2020-11-29 06:32:44', '2020-11-29 06:32:44', 'aqua600'),
(16, 'abcd', -1, 12, 15, '2021-01-10 03:50:49', NULL, 'ewewq'),
(18, 'qwewqe', 1, 123232, 21321, '2021-01-10 04:01:41', NULL, 'wqewqewqe');

-- --------------------------------------------------------

--
-- Table structure for table `dbeli`
--

CREATE TABLE `dbeli` (
  `KodeBeli` int(11) NOT NULL,
  `KodeBarang` int(11) NOT NULL,
  `Kuantitas` int(11) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `Subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbeli`
--

INSERT INTO `dbeli` (`KodeBeli`, `KodeBarang`, `Kuantitas`, `HargaBeli`, `Subtotal`) VALUES
(202101164, 16, 1, 12, 12),
(202101167, 10, 1, 2500, 2500),
(202101168, 10, 1, 2500, 2500),
(202101164, 16, 1, 12, 12),
(202101171, 12, 1, 2000, 2000),
(202101171, 18, 1, 123232, 123232);

--
-- Triggers `dbeli`
--
DELIMITER $$
CREATE TRIGGER `AfterDeleteDBeli` AFTER DELETE ON `dbeli` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang - old.Kuantitas where KodeBarang = old.KodeBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterInsertDBeli` AFTER INSERT ON `dbeli` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang + new.Kuantitas WHERE KodeBarang = new.KodeBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterUpdateDBeli` AFTER UPDATE ON `dbeli` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang - old.Kuantitas WHERE KodeBarang = old.KodeBarang;
    
    UPDATE barang SET StokBarang = StokBarang + new.Kuantitas WHERE KodeBarang = new.KodeBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `djual`
--

CREATE TABLE `djual` (
  `KodeJual` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `KodeBarang` int(11) NOT NULL,
  `Kuantitas` int(11) NOT NULL,
  `Subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `djual`
--
DELIMITER $$
CREATE TRIGGER `AfterDeleteDJual` AFTER DELETE ON `djual` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang + old.Kuantitas where KodeBarang = old.KodeBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterInsertDJual` AFTER INSERT ON `djual` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang - new.Kuantitas WHERE KodeBarang = new.KodeBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dretur`
--

CREATE TABLE `dretur` (
  `KodeRetur` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `KodeBeli` int(11) NOT NULL,
  `KodeBarang` int(11) NOT NULL,
  `Kuantitas` int(11) NOT NULL,
  `Subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `dretur`
--
DELIMITER $$
CREATE TRIGGER `AfterDeleteDRetur` AFTER DELETE ON `dretur` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang + old.Kuantitas where KodeBarang = old.KodeBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterInsertDRetur` AFTER INSERT ON `dretur` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang - new.Kuantitas WHERE KodeBarang = new.KodeBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterUpdateDRetur` AFTER UPDATE ON `dretur` FOR EACH ROW BEGIN 
	UPDATE barang SET StokBarang = StokBarang + old.Kuantitas WHERE KodeBarang = old.KodeBarang;
    
    UPDATE barang SET StokBarang = StokBarang - new.Kuantitas WHERE KodeBarang = new.KodeBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hbeli`
--

CREATE TABLE `hbeli` (
  `TanggalBeli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `KodeBeli` int(11) NOT NULL,
  `TotalBeli` double NOT NULL,
  `KodePengguna` int(11) NOT NULL,
  `KodePemasok` int(11) NOT NULL,
  `Refrensi` varchar(50) DEFAULT NULL,
  `void` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hbeli`
--

INSERT INTO `hbeli` (`TanggalBeli`, `KodeBeli`, `TotalBeli`, `KodePengguna`, `KodePemasok`, `Refrensi`, `void`) VALUES
('2021-01-16 14:37:21', 202101164, 12, 18, 1, '', 1),
('2021-01-16 15:05:17', 202101167, 2500, 16, 1, '', 0),
('2021-01-16 15:19:21', 202101168, 2500, 16, 1, '', 0),
('2021-01-16 17:47:50', 202101171, 125232, 18, 3, '', 0);

--
-- Triggers `hbeli`
--
DELIMITER $$
CREATE TRIGGER `BeforeDeleteHBeli` BEFORE DELETE ON `hbeli` FOR EACH ROW BEGIN
	DELETE FROM dbeli WHERE KodeBeli = old.KodeBeli;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hjual`
--

CREATE TABLE `hjual` (
  `TanggalJual` datetime NOT NULL,
  `KodeJual` int(11) NOT NULL,
  `TotalJual` double NOT NULL,
  `KodePengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `hjual`
--
DELIMITER $$
CREATE TRIGGER `BeforeDeleteHJual` BEFORE DELETE ON `hjual` FOR EACH ROW BEGIN
	DELETE FROM djual WHERE KodeJual = old.KodeJual;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hretur`
--

CREATE TABLE `hretur` (
  `TanggalRetur` date NOT NULL,
  `KodeRetur` int(11) NOT NULL,
  `KodeBeli` int(11) NOT NULL,
  `TotalRetur` int(11) NOT NULL,
  `KodePengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `hretur`
--
DELIMITER $$
CREATE TRIGGER `BeforeDeleteHRetur` BEFORE DELETE ON `hretur` FOR EACH ROW BEGIN
	DELETE FROM dretur WHERE KodeRetur = old.KodeRetur;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-11-29-125827', 'App\\Database\\Migrations\\Hbeli', 'default', 'App', 1606656527, 1),
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1608548416, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `KodePemasok` int(11) NOT NULL,
  `NamaPemasok` varchar(100) NOT NULL,
  `AlamatPemasok` varchar(255) NOT NULL,
  `TeleponPemasok` varchar(15) NOT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `Slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`KodePemasok`, `NamaPemasok`, `AlamatPemasok`, `TeleponPemasok`, `CreatedAt`, `UpdatedAt`, `Slug`) VALUES
(1, ' PT Indomarco Prismatama', 'Jl. Rungkut Industri Raya No.11A, Kendangsari, Kec. Tenggilis Mejoyo, Kota SBY, Jawa Timur 60292', '(031) 8435666', '2020-11-26 12:41:34', '2020-11-26 12:41:34', 'indomarco'),
(2, 'PT Sumber Cipta Multiniaga', 'Jl. Kedung Doro No.34, Sawahan, Kec. Sawahan, Kota SBY, Jawa Timur 60251', '(031) 5341951', NULL, NULL, 'sumbercipta'),
(3, 'PT Gudang Garam Tbk.', 'Jl. Letjend Sutoyo No.55, Bungur, Medaeng, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur 61256', '(031) 2985100', '2020-11-26 12:42:32', '2020-11-26 12:42:32', 'gudanggaram'),
(4, 'PT. ISM, Tbk. Bogasari Flour Mills Surabaya', 'Jalan Nilam Timur No.16, Perak Utara, Kec. Pabean Cantian, Kota SBY, Jawa Timur 60165', '(031) 3293081', '2020-11-26 12:44:44', '2020-11-26 12:44:44', 'ismbogasari');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'unauthorized',
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `role`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Dimas Febrian', 'dimas99fe@gmail.com', '0811332778', 'admin', 'dimas99fe', '$2y$10$5fBvsH3nUBVtqL2oTTgiE.nPe7S3jyQek3G2b7y8AAYIAqEn9.tlS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-21 07:27:46', '2020-12-21 07:27:46', NULL),
(18, 'Feriawan Taniwidjaja', 'ferimario6@gmail.com', '081283663278', 'admin', NULL, '$2y$10$1yQzBpI4yu5JMcJe2KwJW.H2csY9IhLFrCdnOotsHEFDzswIWwsrG', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL),
(20, 'abc', 'abc@abc.com', '123321123', 'admin', 'abc', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KodeBarang`),
  ADD UNIQUE KEY `Slug` (`Slug`);

--
-- Indexes for table `dbeli`
--
ALTER TABLE `dbeli`
  ADD KEY `KodeBarang` (`KodeBarang`),
  ADD KEY `KodeBeli` (`KodeBeli`);

--
-- Indexes for table `djual`
--
ALTER TABLE `djual`
  ADD PRIMARY KEY (`KodeJual`,`No`),
  ADD KEY `KodeJual` (`KodeJual`,`KodeBarang`),
  ADD KEY `KodeBarang` (`KodeBarang`);

--
-- Indexes for table `dretur`
--
ALTER TABLE `dretur`
  ADD PRIMARY KEY (`KodeRetur`,`No`),
  ADD KEY `KodeRetur` (`KodeRetur`,`KodeBeli`,`KodeBarang`),
  ADD KEY `KodeBeli` (`KodeBeli`),
  ADD KEY `KodeBarang` (`KodeBarang`);

--
-- Indexes for table `hbeli`
--
ALTER TABLE `hbeli`
  ADD PRIMARY KEY (`KodeBeli`),
  ADD KEY `KodePengguna` (`KodePengguna`),
  ADD KEY `KodePemasok` (`KodePemasok`);

--
-- Indexes for table `hjual`
--
ALTER TABLE `hjual`
  ADD PRIMARY KEY (`KodeJual`),
  ADD KEY `KodePengguna` (`KodePengguna`);

--
-- Indexes for table `hretur`
--
ALTER TABLE `hretur`
  ADD PRIMARY KEY (`KodeRetur`),
  ADD KEY `KodePengguna` (`KodePengguna`),
  ADD KEY `KodeBeli` (`KodeBeli`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`KodePemasok`),
  ADD UNIQUE KEY `Slug` (`Slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `KodeBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dretur`
--
ALTER TABLE `dretur`
  MODIFY `KodeRetur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hbeli`
--
ALTER TABLE `hbeli`
  MODIFY `KodeBeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202101172;

--
-- AUTO_INCREMENT for table `hjual`
--
ALTER TABLE `hjual`
  MODIFY `KodeJual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `KodePemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dbeli`
--
ALTER TABLE `dbeli`
  ADD CONSTRAINT `dbeli_ibfk_1` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`),
  ADD CONSTRAINT `dbeli_ibfk_3` FOREIGN KEY (`KodeBeli`) REFERENCES `hbeli` (`KodeBeli`);

--
-- Constraints for table `djual`
--
ALTER TABLE `djual`
  ADD CONSTRAINT `djual_ibfk_1` FOREIGN KEY (`KodeJual`) REFERENCES `hjual` (`KodeJual`),
  ADD CONSTRAINT `djual_ibfk_2` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`);

--
-- Constraints for table `dretur`
--
ALTER TABLE `dretur`
  ADD CONSTRAINT `dretur_ibfk_1` FOREIGN KEY (`KodeRetur`) REFERENCES `hjual` (`KodeJual`),
  ADD CONSTRAINT `dretur_ibfk_2` FOREIGN KEY (`KodeBeli`) REFERENCES `hbeli` (`KodeBeli`),
  ADD CONSTRAINT `dretur_ibfk_3` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`);

--
-- Constraints for table `hbeli`
--
ALTER TABLE `hbeli`
  ADD CONSTRAINT `hbeli_ibfk_1` FOREIGN KEY (`KodePengguna`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `hbeli_ibfk_2` FOREIGN KEY (`KodePemasok`) REFERENCES `pemasok` (`KodePemasok`);

--
-- Constraints for table `hjual`
--
ALTER TABLE `hjual`
  ADD CONSTRAINT `hjual_ibfk_1` FOREIGN KEY (`KodePengguna`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `hretur`
--
ALTER TABLE `hretur`
  ADD CONSTRAINT `hretur_ibfk_1` FOREIGN KEY (`KodePengguna`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `hretur_ibfk_2` FOREIGN KEY (`KodeBeli`) REFERENCES `hbeli` (`KodeBeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
