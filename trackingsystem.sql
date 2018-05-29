-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 09:44 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_fname`, `customer_lname`, `address`, `age`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 'Christian Vincent', 'Igot', 'abuno,pajac lapu-lapu City', 22, '098765432', '2018-02-16 00:27:56', '2018-02-16 05:41:12');

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
(1, '2018_01_13_074253_create_users_table', 1),
(2, '2018_02_10_031453_create_products_table', 2),
(3, '2018_02_10_122548_create_customers_table', 3),
(4, '2018_02_11_054854_create_vehicles_table', 4),
(5, '2018_02_11_075035_create_personnels_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(10) UNSIGNED NOT NULL,
  `personnel_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_type` enum('clerk','delivery') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`id`, `personnel_fname`, `personnel_lname`, `address`, `age`, `contact_no`, `personnel_type`, `created_at`, `updated_at`) VALUES
(1, 'wasada', 'kaindoy', 'testing', 22, '098765432', 'clerk', '2018-02-16 05:09:27', '2018-02-16 06:08:58'),
(2, 'asd', 'dfghjkl;', 'fghjkl;', 98, 'ghjk', 'clerk', '2018-02-16 05:37:07', '2018-02-16 05:40:51'),
(3, 'asdffgh', 'asdgfgh', 'asdfghj', 45, '123456', 'delivery', '2018-02-16 05:52:51', '2018-02-16 05:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` decimal(13,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `itemname`, `unit`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, 'heywasa', 'pagsureoy', '1200.00', '2018-02-09 19:33:00', '2018-04-26 22:58:52'),
(2, 'sand', 'bag', '1200.00', '2018-02-09 19:34:20', '2018-02-09 19:34:20'),
(3, 'wasa', 'wasa', '123.00', '2018-02-09 19:34:49', '2018-02-09 19:34:49'),
(4, 'sad', 'asjdk', '400.00', '2018-02-09 19:35:15', '2018-02-09 19:35:15'),
(5, 'hjkl', 'hjk', '200.00', '2018-02-09 19:36:00', '2018-02-09 19:36:00'),
(6, 'nail', 'kilo', '75.00', '2018-02-10 21:45:41', '2018-02-10 21:45:41'),
(7, 'dsfg', 'asdzdxc', '32.00', '2018-02-11 05:49:18', '2018-02-11 05:49:18'),
(8, 'sadg', 'asdd', '234.00', '2018-02-11 05:49:35', '2018-02-11 05:49:35'),
(9, 'paint', 'gallon', '500.00', '2018-02-11 08:18:21', '2018-02-11 08:18:21'),
(10, 'xtian', 'sampl', '1234.00', '2018-02-14 21:02:51', '2018-02-14 21:02:51'),
(11, 'washed sand', 'cubi', '90.00', '2018-02-16 03:02:18', '2018-02-16 03:02:18'),
(12, 'heyoh', 'oh', '123.00', '2018-02-16 06:57:11', '2018-02-16 06:57:21'),
(13, 'bagos', 'bag', '230.00', '2018-03-03 04:31:14', '2018-03-03 04:33:26'),
(14, 'asd', 'asd', '123.00', '2018-03-03 05:06:23', '2018-03-03 05:06:23'),
(15, 'sample run', 'run', '123421.00', '2018-04-26 05:55:46', '2018-04-26 05:55:46'),
(16, 'samplefinal', 'pcs', '200.00', '2018-04-26 23:09:18', '2018-04-26 23:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `birthdate`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'adamin', '2013-01-29', '$2y$10$o5G64qNn13hbByv6bMNfoODhPBd.hdKIbitMtR6PpnOiqeCPSSXqW', '2018-03-02 21:37:06', '2018-03-02 21:37:06'),
(2, 'xtian', 'xtian', 'kaindoy', '2015-02-04', '$2y$10$xjPhf9LKQkCqfiR4/ITW9e0R9BBEXQZyX77jei.EL7QQdyywTmwpC', '2018-03-03 01:10:16', '2018-03-03 01:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` enum('4wheel Type','Tricycle Type') COLLATE utf8mb4_unicode_ci NOT NULL,
  `made` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_personnel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `license_plate`, `vehicle_type`, `made`, `delivery_personnel`, `created_at`, `updated_at`) VALUES
(1, '2345656', '4wheel Type', 'Mitsubishi Montero 2014', 'wasa', '2018-02-10 23:09:13', '2018-03-03 03:51:10'),
(2, 'VFX-123', '4wheel Type', 'kia', 'jerry', '2018-02-11 05:55:49', '2018-02-11 05:55:49'),
(3, 'asdfghj', '4wheel Type', 'sakura', 'ajsd', '2018-02-11 06:24:26', '2018-02-11 06:24:26'),
(4, 'sadfg', '4wheel Type', 'sdf', 'sd', '2018-02-11 06:24:38', '2018-02-11 06:24:38'),
(5, 'GEH-799', 'Tricycle Type', 'kia', 'ako', '2018-02-11 08:24:19', '2018-02-11 08:24:19'),
(6, 'sampl', '4wheel Type', 'sampl', 'sample', '2018-02-14 21:03:56', '2018-02-14 21:03:56'),
(7, 'sample', '4wheel Type', 'sample', 'sample', '2018-02-14 21:04:13', '2018-02-14 21:04:13'),
(8, 'HEY-871', '4wheel Type', 'Mitsubishi', 'Gerry', '2018-02-16 03:02:55', '2018-02-16 03:02:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
