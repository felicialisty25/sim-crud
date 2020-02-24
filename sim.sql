-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 03:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_sims`
--

CREATE TABLE `data_sims` (
  `id_sim` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sim` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_sim` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tempat_pembuatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_sims`
--

INSERT INTO `data_sims` (`id_sim`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `no_sim`, `kategori_sim`, `foto`, `id_tempat_pembuatan`, `created_at`, `updated_at`) VALUES
(1, 'Robert Ali', 'Jl. Raya No 25', 'Yogyakarta', '1980-06-20', 'Wirausaha Ikan', '3592130512529', 'SIM C', '45_Al_Gore_3x4_1582481714.jpg', 2, '2020-02-23 08:07:09', '2020-02-23 11:15:14'),
(2, 'Andi Laksana', 'Jl. Pangeran No 11', 'Sidoarjo', '1977-09-26', 'Pebisnis', '3512987512554', 'SIM C', '451px-37_Lyndon_Johnson_3x4_1582472379.jpg', 1, '2020-02-23 08:39:39', '2020-02-23 08:39:39'),
(4, 'Budi Sugiarto', 'Jl. Wonokromo No 10', 'Sidoarjo', '1977-09-26', 'Mahasiswa', '3512987512554', 'SIM C', '451px-37_Lyndon_Johnson_3x4_1582472696.jpg', 4, '2020-02-23 08:44:56', '2020-02-24 05:30:01'),
(5, 'Charlie Resa', 'Jl. Nusa No 41', 'Malang', '1971-03-10', 'Wirausaha', '3592135322525', 'SIM B II', '45_Al_Gore_3x4_1582472805.jpg', 1, '2020-02-23 08:46:45', '2020-02-23 08:46:45'),
(6, 'Rusdi Sejahtera', 'Jl. Mawar No 39', 'Malang', '1971-03-10', 'Pegawai', '3592135322525', 'SIM B II', '45_Al_Gore_3x4_1582472870.jpg', 3, '2020-02-23 08:47:50', '2020-02-23 08:47:50'),
(7, 'Lala Bunga', 'Jl. Anggrek No 35', 'Surabaya', '1982-01-29', 'Pegawai', '3592130352525', 'SIM B I', '45_Al_Gore_3x4_1582472918.jpg', 1, '2020-02-23 08:48:38', '2020-02-23 08:48:38'),
(8, 'Danu Britani', 'Jl. Sepatu No 9', 'Jember', '1982-04-09', 'Mahasiswa', '3512987325554', 'SIM A', '45_Al_Gore_3x4_1582473089.jpg', 1, '2020-02-23 08:51:29', '2020-02-23 08:51:29'),
(11, 'Eric Tamunegara', 'Jl. Manggreani No 24', 'Jakarta', '1972-02-07', 'Wirausaha', '3512987535254', 'SIM D', '451px-37_Lyndon_Johnson_3x4_1582554780.jpg', 3, '2020-02-23 08:56:53', '2020-02-24 07:33:00'),
(12, 'Hari Budiono', 'Jl. Diponegoro No 10', 'Surabaya', '1985-05-21', 'Pegawai', '3592137532525', 'SIM A', '45_Al_Gore_3x4_1582553222.jpg', 4, '2020-02-24 07:07:02', '2020-02-24 07:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `kotas`
--

CREATE TABLE `kotas` (
  `id_kota` int(10) UNSIGNED NOT NULL,
  `nama_kota` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kotas`
--

INSERT INTO `kotas` (`id_kota`, `nama_kota`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', '2020-02-21 07:52:40', '2020-02-21 07:52:40'),
(2, 'Surabaya', '2020-02-21 07:52:52', '2020-02-21 07:52:52'),
(3, 'Sidoarjo', '2020-02-24 05:21:53', '2020-02-24 05:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_02_20_201017_create_data_sims_table', 1),
(5, '2020_02_20_202023_create_tempat_pembuatans_table', 1),
(6, '2020_02_20_202042_create_kotas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_pembuatans`
--

CREATE TABLE `tempat_pembuatans` (
  `id_tempat_pembuatan` int(10) UNSIGNED NOT NULL,
  `nama_tempat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tempat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempat_pembuatans`
--

INSERT INTO `tempat_pembuatans` (`id_tempat_pembuatan`, `nama_tempat`, `alamat_tempat`, `id_kota`, `created_at`, `updated_at`) VALUES
(1, 'Polres Kali', 'Jalan Kali Timur No 10', 2, '2020-02-21 08:20:33', '2020-02-21 08:20:33'),
(2, 'Satpas SIM Daan Mogot', 'Jl. Daan Mogot KM.11', 1, '2020-02-23 11:14:36', '2020-02-24 05:28:22'),
(3, 'Satpas Colombo Sim', 'Jl. Ikan Kerapu No 2-4', 2, '2020-02-24 05:24:20', '2020-02-24 05:24:20'),
(4, 'Polresta Sidoarjo', 'Jalan R. A. Kartini No. 88', 3, '2020-02-24 05:29:34', '2020-02-24 05:29:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_sims`
--
ALTER TABLE `data_sims`
  ADD PRIMARY KEY (`id_sim`);

--
-- Indexes for table `kotas`
--
ALTER TABLE `kotas`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_pembuatans`
--
ALTER TABLE `tempat_pembuatans`
  ADD PRIMARY KEY (`id_tempat_pembuatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_sims`
--
ALTER TABLE `data_sims`
  MODIFY `id_sim` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kotas`
--
ALTER TABLE `kotas`
  MODIFY `id_kota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempat_pembuatans`
--
ALTER TABLE `tempat_pembuatans`
  MODIFY `id_tempat_pembuatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
