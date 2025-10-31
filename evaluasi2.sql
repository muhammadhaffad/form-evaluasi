-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2025 at 09:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluasi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(255) NOT NULL,
  `namaInfra` varchar(255) NOT NULL,
  `lokasiInfra` varchar(255) NOT NULL,
  `nilaiKontrak` varchar(20) NOT NULL,
  `tahunMulai` varchar(255) NOT NULL,
  `tahunSelesai` varchar(25) NOT NULL,
  `evaluasi1_1` varchar(50) DEFAULT NULL,
  `evaluasi1_2` varchar(50) DEFAULT NULL,
  `evaluasi1_3` varchar(50) DEFAULT NULL,
  `evaluasi1_4` varchar(50) DEFAULT NULL,
  `evaluasi1_5` varchar(50) DEFAULT NULL,
  `evaluasi2_1` varchar(25) DEFAULT NULL,
  `evaluasi2_2` varchar(25) DEFAULT NULL,
  `evaluasi2_3` varchar(25) DEFAULT NULL,
  `evaluasi2_4` varchar(25) DEFAULT NULL,
  `evaluasi3_1` varchar(25) DEFAULT NULL,
  `evaluasi3_2` varchar(25) DEFAULT NULL,
  `evaluasi3_3` varchar(25) DEFAULT NULL,
  `evaluasi4_1` varchar(25) DEFAULT NULL,
  `evaluasi4_2` varchar(25) DEFAULT NULL,
  `evaluasi4_3` varchar(25) DEFAULT NULL,
  `evaluasi5_1` varchar(25) DEFAULT NULL,
  `evaluasi5_2` varchar(25) DEFAULT NULL,
  `evaluasi5_3` varchar(25) DEFAULT NULL,
  `evaluasi5_4` varchar(25) DEFAULT NULL,
  `evaluasi6_1` varchar(25) DEFAULT NULL,
  `evaluasi6_2` varchar(25) DEFAULT NULL,
  `evaluasi7_1` varchar(25) DEFAULT NULL,
  `evaluasi7_2` varchar(25) DEFAULT NULL,
  `evaluasi7_3` varchar(25) DEFAULT NULL,
  `evaluasi7_4` varchar(25) DEFAULT NULL,
  `nilaiAkhir` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `namaInfra`, `lokasiInfra`, `nilaiKontrak`, `tahunMulai`, `tahunSelesai`, `evaluasi1_1`, `evaluasi1_2`, `evaluasi1_3`, `evaluasi1_4`, `evaluasi1_5`, `evaluasi2_1`, `evaluasi2_2`, `evaluasi2_3`, `evaluasi2_4`, `evaluasi3_1`, `evaluasi3_2`, `evaluasi3_3`, `evaluasi4_1`, `evaluasi4_2`, `evaluasi4_3`, `evaluasi5_1`, `evaluasi5_2`, `evaluasi5_3`, `evaluasi5_4`, `evaluasi6_1`, `evaluasi6_2`, `evaluasi7_1`, `evaluasi7_2`, `evaluasi7_3`, `evaluasi7_4`, `nilaiAkhir`, `created_at`) VALUES
(1, 'Pasar Batu', 'Batu, Jawa Timur', '51300000000', '2020', '2023', 'Sangat baik', 'baik', 'baik', 'sangat baik', 'baik', 'baik', 'baik', 'kurang baik', 'kurang baik', 'sangat baik', 'sangat baik', 'baik', 'baik', 'baik', 'sangat baik', 'kurang baik', 'tidak baik', 'sangat baik', 'tidak baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', NULL, '2025-10-08 13:54:03'),
(39, 'Rumah 4', 'Pasuruan', '215551231251', '2023', '2022', 'kurang baik', 'tidak baik', 'baik', 'baik', 'baik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-12 03:42:40'),
(55, 'Penataan Kawasan Pantai Plengkung Kab. Banyuwangi', 'Kawasan Pantai Plengkung, Kab. Banyuwangi, Provinsi Jawa Timur', '9490229328', '2022', '2022', 'cukup baik', 'baik', 'sangat baik', 'sangat baik', 'sangat baik', 'baik', 'cukup baik', 'baik', 'baik', 'baik', 'kurang baik', 'baik', 'sangat baik', 'sangat baik', 'sangat baik', 'sangat baik', 'sangat baik', 'baik', 'baik', 'sangat baik', 'kurang baik', 'sangat baik', 'baik', 'baik', 'baik', '77', '2025-10-14 01:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
