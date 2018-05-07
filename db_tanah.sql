-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2018 at 09:18 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tanah`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `kredit_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `kredit_id`, `created_at`, `updated_at`) VALUES
(21, 19, '2018-04-08 22:21:48', '2018-04-08 22:21:48'),
(22, 20, '2018-04-08 22:22:19', '2018-04-08 22:22:19'),
(23, 21, '2018-04-23 02:18:38', '2018-04-23 02:18:38'),
(24, 22, '2018-04-25 22:34:33', '2018-04-25 22:34:33'),
(25, 23, '2018-04-25 22:34:41', '2018-04-25 22:34:41'),
(26, 24, '2018-04-25 22:34:49', '2018-04-25 22:34:49'),
(27, 25, '2018-04-25 22:34:59', '2018-04-25 22:34:59'),
(28, 26, '2018-04-25 22:35:06', '2018-04-25 22:35:06'),
(29, 27, '2018-04-25 22:35:13', '2018-04-25 22:35:13'),
(30, 28, '2018-04-25 22:35:20', '2018-04-25 22:35:20'),
(31, 29, '2018-04-25 22:35:25', '2018-04-25 22:35:25'),
(32, 30, '2018-04-25 22:35:32', '2018-04-25 22:35:32'),
(33, 31, '2018-04-25 22:35:40', '2018-04-25 22:35:40'),
(34, 32, '2018-04-25 22:37:05', '2018-04-25 22:37:05'),
(35, 33, '2018-04-25 22:37:12', '2018-04-25 22:37:12'),
(36, 34, '2018-04-25 22:37:20', '2018-04-25 22:37:20'),
(37, 35, '2018-04-25 22:37:27', '2018-04-25 22:37:27'),
(38, 36, '2018-04-25 22:37:34', '2018-04-25 22:37:34'),
(39, 37, '2018-04-25 22:37:42', '2018-04-25 22:37:42'),
(40, 38, '2018-04-25 22:37:49', '2018-04-25 22:37:49'),
(41, 39, '2018-04-25 22:37:55', '2018-04-25 22:37:55'),
(42, 40, '2018-04-25 22:38:01', '2018-04-25 22:38:01'),
(43, 41, '2018-04-25 22:38:07', '2018-04-25 22:38:07'),
(44, 42, '2018-04-25 22:45:41', '2018-04-25 22:45:41'),
(45, 43, '2018-04-25 22:45:53', '2018-04-25 22:45:53'),
(46, 44, '2018-04-25 22:46:00', '2018-04-25 22:46:00'),
(47, 45, '2018-04-25 22:46:05', '2018-04-25 22:46:05'),
(48, 46, '2018-04-25 22:46:11', '2018-04-25 22:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanah_id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `harga_item` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `tanah_id`, `cart_id`, `harga_item`, `created_at`, `updated_at`) VALUES
(30, 7, 21, 190000000, '2018-04-08 22:22:59', '2018-04-08 22:22:59'),
(31, 8, 21, 10000000, '2018-04-08 22:23:07', '2018-04-08 22:23:07'),
(32, 11, 22, 80000000, '2018-04-08 22:23:19', '2018-04-08 22:23:19'),
(33, 9, 22, 7000000, '2018-04-09 23:06:10', '2018-04-09 23:06:10'),
(34, 10, 22, 100000000, '2018-04-09 23:06:24', '2018-04-09 23:06:24'),
(35, 12, 23, 32000000, '2018-04-23 02:18:43', '2018-04-23 02:18:43'),
(36, 13, 24, 135000000, '2018-04-27 05:00:52', '2018-04-27 05:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `kasirs`
--

CREATE TABLE `kasirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembeli_id` int(10) UNSIGNED NOT NULL,
  `kredit_id` int(10) UNSIGNED NOT NULL,
  `tanggal_bayar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `sisa_cicilan` int(10) NOT NULL,
  `angsuran_ke` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasirs`
--

INSERT INTO `kasirs` (`id`, `pembeli_id`, `kredit_id`, `tanggal_bayar`, `sisa_angsuran`, `sisa_cicilan`, `angsuran_ke`, `created_at`, `updated_at`) VALUES
(1, 4, 19, '24 April 2018', 188100000, 99, 1, '2018-04-08 22:52:49', '2018-04-08 22:52:49'),
(2, 4, 19, '22 Mei 2018', 186200000, 98, 2, '2018-04-08 23:08:39', '2018-04-08 23:08:39'),
(3, 4, 20, '25 April 2018', 175230000, 99, 1, '2018-04-09 23:07:37', '2018-04-09 23:07:37'),
(4, 4, 20, '25 April 2018', 173460000, 98, 2, '2018-04-23 01:40:17', '2018-04-23 01:40:17'),
(5, 4, 20, '30 April 2018', 171690000, 97, 3, '2018-04-23 01:40:28', '2018-04-23 01:40:28'),
(6, 4, 20, '30 Mei 2018', 169920000, 96, 4, '2018-04-23 22:42:47', '2018-04-23 22:42:47'),
(7, 4, 20, '27 Juni 2018', 168150000, 95, 5, '2018-04-27 03:13:11', '2018-04-27 03:13:11'),
(8, 4, 20, '3 Juli 2018', 166380000, 94, 6, '2018-04-27 03:17:25', '2018-04-27 03:17:25'),
(9, 4, 21, '20 April 2018', 21780000, 99, 1, '2018-04-27 04:50:57', '2018-04-27 04:50:57'),
(10, 2, 22, '15 April 2018', 94050000, 99, 1, '2018-04-27 05:01:58', '2018-04-27 05:01:58'),
(11, 4, 21, '20 Mei 2018', 21560000, 98, 2, '2018-04-27 05:06:15', '2018-04-27 05:06:15'),
(12, 4, 20, '31 Agustus 2018', 164610000, 93, 7, '2018-04-27 05:06:44', '2018-04-27 05:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `kredits`
--

CREATE TABLE `kredits` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kredit` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembeli_id` int(10) UNSIGNED NOT NULL,
  `total_harga` int(10) NOT NULL DEFAULT '0',
  `uang_muka` int(10) NOT NULL DEFAULT '0',
  `sisa_angsuran` int(10) DEFAULT '0',
  `lama_angsuran` int(10) NOT NULL DEFAULT '0',
  `jumlah_angsur` int(11) DEFAULT '0',
  `angsuran_perbulan` int(10) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kredits`
--

INSERT INTO `kredits` (`id`, `id_kredit`, `pembeli_id`, `total_harga`, `uang_muka`, `sisa_angsuran`, `lama_angsuran`, `jumlah_angsur`, `angsuran_perbulan`, `status`, `created_at`, `updated_at`) VALUES
(19, 'K908', 4, 200000000, 10000000, 186200000, 98, 100, 1900000, 2, '2018-04-08 22:21:48', '2018-04-08 23:08:39'),
(20, 'K8000', 4, 187000000, 10000000, 164610000, 93, 100, 1770000, 2, '2018-04-08 22:22:19', '2018-04-27 05:06:44'),
(21, 'K3555', 4, 32000000, 10000000, 21560000, 98, 100, 220000, 2, '2018-04-23 02:18:38', '2018-04-27 05:06:15'),
(22, 'k1', 2, 135000000, 40000000, 94050000, 99, 100, 950000, 2, '2018-04-25 22:34:33', '2018-04-27 05:01:59'),
(23, 'k2', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:34:41', '2018-04-25 22:34:41'),
(24, 'k3', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:34:49', '2018-04-25 22:34:49'),
(25, 'k4', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:34:59', '2018-04-25 22:34:59'),
(26, 'k5', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:35:06', '2018-04-25 22:35:06'),
(27, 'k6', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:35:13', '2018-04-25 22:35:13'),
(28, 'k7', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:35:19', '2018-04-25 22:35:19'),
(29, 'k8', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:35:25', '2018-04-25 22:35:25'),
(30, 'k9', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:35:31', '2018-04-25 22:35:31'),
(31, 'k10', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:35:40', '2018-04-25 22:35:40'),
(32, 'k11', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:05', '2018-04-25 22:37:05'),
(33, 'k12', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:12', '2018-04-25 22:37:12'),
(34, 'k13', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:20', '2018-04-25 22:37:20'),
(35, 'k14', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:27', '2018-04-25 22:37:27'),
(36, 'k15', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:34', '2018-04-25 22:37:34'),
(37, 'k16', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:42', '2018-04-25 22:37:42'),
(38, 'k17', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:49', '2018-04-25 22:37:49'),
(39, 'k18', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:37:55', '2018-04-25 22:37:55'),
(40, 'k19', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:38:01', '2018-04-25 22:38:01'),
(41, 'k20', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:38:07', '2018-04-25 22:38:07'),
(42, 'k21', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:45:41', '2018-04-25 22:45:41'),
(43, 'k22', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:45:53', '2018-04-25 22:45:53'),
(44, 'k23', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:46:00', '2018-04-25 22:46:00'),
(45, 'k24', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:46:05', '2018-04-25 22:46:05'),
(46, 'k25', 2, 0, 0, 0, 0, 0, 0, 1, '2018-04-25 22:46:11', '2018-04-25 22:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_03_27_061534_create_tanahs_table', 2),
(10, '2018_03_27_074303_create_tags_table', 2),
(13, '2018_03_27_083338_create_tag_tanah_table', 3),
(27, '2018_03_27_114046_create_pembelis_table', 4),
(28, '2018_03_31_113635_create_kredits_table', 5),
(29, '2018_03_31_113943_create_carts_table', 6),
(30, '2018_03_31_114254_create_cart_item_table', 7),
(31, '2018_04_06_164634_create_kasirs_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelis`
--

CREATE TABLE `pembelis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pembeli` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pembeli` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pembeli` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelis`
--

INSERT INTO `pembelis` (`id`, `id_pembeli`, `nama_pembeli`, `alamat_pembeli`, `no_telpon`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'ID001', 'Alex Andreas', 'weww wewe wew ewe wew w wwwwewe', '0844444444', '', NULL, '2018-04-23 04:26:08'),
(2, 'ID002', 'Oden', 'wewe wew ewew ewe wew e', '09999777777', NULL, '2018-03-31 05:41:16', '2018-03-31 05:41:16'),
(3, 'id980', 'Anang', 'wewkewkewe ewewoeweowe wekweowekwoe', '09999999999', NULL, '2018-04-06 18:20:22', '2018-04-06 18:20:22'),
(4, 'ID9088', 'Udin Tampan', 'wwkwkwkw wwkwkwkwkwk', '0988888888', NULL, '2018-04-08 22:21:16', '2018-04-23 04:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tag` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `nama_tag`, `created_at`, `updated_at`) VALUES
(1, 'Tersedia', NULL, NULL),
(2, 'Terjual', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_tanah`
--

CREATE TABLE `tag_tanah` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanah_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_tanah`
--

INSERT INTO `tag_tanah` (`id`, `tanah_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(69, 7, 2, NULL, NULL),
(70, 8, 2, NULL, NULL),
(71, 11, 2, NULL, NULL),
(72, 9, 2, NULL, NULL),
(73, 10, 2, NULL, NULL),
(74, 12, 2, NULL, NULL),
(76, 13, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tanahs`
--

CREATE TABLE `tanahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_kavling` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kavling` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `harga_kavling` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanahs`
--

INSERT INTO `tanahs` (`id`, `no_kavling`, `slug_kavling`, `panjang`, `lebar`, `harga_kavling`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, '510', '510', 80, 90, 190000000, 'ewewewewew wewe wwewewe', '2018-03-27 20:20:09', '2018-04-23 03:09:53'),
(8, '670', '670', 90, 110, 10000000, 'wow ggg wekwekweow kwwekwekwkekwe ewe', '2018-03-27 20:21:41', '2018-03-27 20:21:41'),
(9, '780', '780', 10, 8, 7000000, 'ewewewewwe wewewe', '2018-03-31 01:18:15', '2018-03-31 01:18:15'),
(10, '911', '911', 9, 8, 100000000, 'GAUL GAUL GAUL', '2018-04-05 01:01:37', '2018-04-05 01:01:37'),
(11, '9880', '9880', 9, 999, 80000000, 'wewewe wewe wewe wewe wew ew ewew ew ewe', '2018-04-08 01:33:49', '2018-04-08 01:33:49'),
(12, '9800', '9800', 5, 10, 32000000, 'wlwkewkewoe woewoewkeowew weokwkeowe', '2018-04-08 22:20:04', '2018-04-08 22:20:04'),
(13, '8700', '8700', 800, 700, 135000000, 'Luas sekali bagus dan subur', '2018-04-23 03:28:19', '2018-04-23 03:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$lGYtPhrCjTfQWyyW77GDy.jW7qowF.1nr8623D1APRWtOXeZeMwvy', 'BeSgyxPwWq0U1wNuIHlNkeylmRbfZZYVlPJgfkI5HceSpgG2V2ZZcpg5Gxu0', 2, '2018-03-26 20:05:16', '2018-03-26 20:05:16'),
(2, 'tampan', 'tampan@test.com', '$2y$10$jcEK70BPdJWANOdXWPLdHexaCAU.vkwp04FzYQ7Ne04eyuP8KqX4C', '7ldcsoXXrKRGD3NAA6DmvKOdnR6nt6GCXboeTsJuevV6zulqdGs9RiXu07y6', 1, '2018-04-05 16:43:55', '2018-04-05 16:43:55'),
(3, 'Kasir', 'kasir@kasir.com', '$2y$10$JCRPne2N0ZDjQZq6e.iWZeckiAQxdW6qOTJ9DfsYTqziedJzIh9nC', '3Juc1zijPbPFZ1WUx8u48DUgsoSTSzERJBtDptIH9fXdnQwDtl2diENbhJtX', 1, '2018-04-06 06:09:17', '2018-04-06 06:09:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_kredit_id_foreign` (`kredit_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_tanah_id_foreign` (`tanah_id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `kasirs`
--
ALTER TABLE `kasirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kasirs_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `kasirs_kredit_id_foreign` (`kredit_id`);

--
-- Indexes for table `kredits`
--
ALTER TABLE `kredits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kredits_pembeli_id_foreign` (`pembeli_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembelis`
--
ALTER TABLE `pembelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_tanah`
--
ALTER TABLE `tag_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_tanah_tanah_id_foreign` (`tanah_id`),
  ADD KEY `tag_tanah_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tanahs`
--
ALTER TABLE `tanahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `kasirs`
--
ALTER TABLE `kasirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kredits`
--
ALTER TABLE `kredits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pembelis`
--
ALTER TABLE `pembelis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tag_tanah`
--
ALTER TABLE `tag_tanah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tanahs`
--
ALTER TABLE `tanahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_kredit_id_foreign` FOREIGN KEY (`kredit_id`) REFERENCES `kredits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_tanah_id_foreign` FOREIGN KEY (`tanah_id`) REFERENCES `tanahs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kasirs`
--
ALTER TABLE `kasirs`
  ADD CONSTRAINT `kasirs_kredit_id_foreign` FOREIGN KEY (`kredit_id`) REFERENCES `kredits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kasirs_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `pembelis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kredits`
--
ALTER TABLE `kredits`
  ADD CONSTRAINT `kredits_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `pembelis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_tanah`
--
ALTER TABLE `tag_tanah`
  ADD CONSTRAINT `tag_tanah_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_tanah_tanah_id_foreign` FOREIGN KEY (`tanah_id`) REFERENCES `tanahs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
