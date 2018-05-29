-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 04:11 AM
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
  `birthdate` date NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_fname`, `customer_lname`, `address`, `birthdate`, `contact_no`, `email_add`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jino', 'Montano', 'Basak Lapu-Lapu City', '1990-09-19', '09234222432', 'Jino.Montano@gmail.com', '2018-05-28 00:17:04', '2018-05-28 00:17:04', NULL),
(2, 'Rea', 'Perez', '18th Camella Homes Dame De Noche Lapu-Lapu City', '1992-01-19', '09225272437', 'Rea.Perez@gmail.com', '2018-05-28 00:18:51', '2018-05-28 00:18:51', NULL),
(3, 'Dale', 'Brunos', 'Tamiya Lapu-Lapu City', '1989-04-19', '09153232110', 'Dale.Brunos@gmail.com', '2018-05-28 00:20:17', '2018-05-28 00:20:17', NULL),
(4, 'Sarah', 'Galicinao', 'Pajac Lapu-Lapu City', '1978-01-02', '09225072430', 'Sarah.Galiciano@gmail.com', '2018-05-28 00:21:52', '2018-05-28 00:21:52', NULL),
(5, 'James', 'Manos', 'Marigondon Lapu-Lapu City', '1990-05-01', '09334232432', 'James.Manos@gmail.com', '2018-05-28 00:26:11', '2018-05-28 00:26:11', NULL),
(6, 'Gino', 'Gaquing', 'Nasipit Talamban Cebu,City', '1990-03-11', '09254432435', 'Gino.Gaquing@gmail.com', '2018-05-28 00:27:48', '2018-05-28 00:27:48', NULL),
(7, 'Bert', 'Tagsip', 'Mandaue City', '1998-02-11', '09435561990', 'Bert.Tagsip@gmail.com', '2018-05-28 00:29:34', '2018-05-28 00:29:34', NULL),
(8, 'Rex', 'Mitos', 'Bf TownHomes Pajac Lapu-Lapu,City', '1990-01-18', '09256768900', 'Rex.Mitos@gmail.com', '2018-05-28 00:30:47', '2018-05-28 00:30:47', NULL),
(9, 'Mark', 'Menzo', 'As Fortuna Mandaue City', '1987-01-29', '09168891990', 'Mark.Menzo@gmail.com', '2018-05-28 00:32:38', '2018-05-28 00:32:38', NULL),
(10, 'Miko', 'Fugoso', 'Camella Homes Lapu-Lapu City', '1991-09-01', '09168768902', NULL, '2018-05-28 00:35:54', '2018-05-28 00:35:54', NULL),
(11, 'Rebicca', 'Galicinao', 'Babag,Lapu-Lapu City', '1999-04-19', '09251105753', 'Rebicca.Galicinao@gmail.com', '2018-05-28 00:37:55', '2018-05-28 00:37:55', NULL);

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
(17, '2018_05_20_183843_add_deleted_at_column_to_products_table', 1),
(22, '2018_05_26_080642_add_status_at_column_to_orders_table', 6),
(23, '2018_05_26_081012_add_status_at_column_to_orders_table', 7),
(26, '2018_01_13_074253_create_users_table', 8),
(27, '2018_02_10_031453_create_products_table', 8),
(28, '2018_02_10_122548_create_customers_table', 8),
(29, '2018_02_11_054854_create_vehicles_table', 8),
(30, '2018_02_16_124852_create_personnels_table', 8),
(31, '2018_05_02_071136_create_orders_table', 8),
(32, '2018_05_08_130310_create_units_table', 8),
(33, '2018_05_08_140343_create_vehicle_types_table', 8),
(34, '2018_05_12_173435_create_personnel_types_table', 8),
(35, '2018_05_20_071634_add_deleted_at_column_to_users_table', 8),
(36, '2018_05_20_073642_add_deleted_at_column_to_customers_table', 8),
(37, '2018_05_20_073809_add_deleted_at_column_to_orders_table', 8),
(38, '2018_05_20_074046_add_deleted_at_column_to_personnel_types_table', 8),
(39, '2018_05_20_074448_add_deleted_at_column_to_vehicle_types_table', 8),
(40, '2018_05_20_124903_add_usertype_at_column_to_users_table', 8),
(41, '2018_05_20_135016_create_order_lines_table', 8),
(42, '2018_05_22_040631_add_deleted_at_column_to_personnels_table', 8),
(43, '2018_05_22_040831_add_deleted_at_column_to_products_table', 8),
(44, '2018_05_22_040929_add_deleted_at_column_to_units_table', 8),
(45, '2018_05_22_041008_add_deleted_at_column_vehicles_table', 8),
(46, '2018_05_26_081343_add_status_at_column_to_orders_table', 8),
(47, '2018_05_26_120011_add_color_at_column_to_personnels_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `status` enum('pending','processed','delivered','received') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` enum('cod','cash','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `served_by` int(10) UNSIGNED NOT NULL,
  `delivered_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `status`, `payment_method`, `served_by`, `delivered_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2018-05-28', 'processed', 'cod', 13, 12, '2018-05-27 16:00:00', '2018-05-28 02:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` decimal(13,2) NOT NULL,
  `unit_price` decimal(13,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(5, 1, 6, '4.00', '80.00', '2018-05-28 02:32:51', '2018-05-28 02:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(10) UNSIGNED NOT NULL,
  `personnel_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personneltype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`id`, `personnel_fname`, `personnel_lname`, `address`, `birthdate`, `contact_no`, `personneltype`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Eunice', 'Tio', 'Datag Maribago Lapu-Lapu City', '1995-09-11', '09167291992', 'Clerk', '#000000', '2018-05-28 00:40:18', '2018-05-28 00:40:18', NULL),
(7, 'May', 'Timbo', 'Janssen Village,Lapu-Lapu City', '1990-03-11', '09436102431', 'Clerk', '#000000', '2018-05-28 00:42:06', '2018-05-28 00:42:06', NULL),
(8, 'Anton', 'Bartolome', 'Basak Lapu-Lapu City', '1990-01-11', '09250272437', 'Delivery', '#000000', '2018-05-28 00:43:22', '2018-05-28 00:43:22', NULL),
(9, 'Nilo', 'Manda', 'Pajac Lapu-Lapu City', '1997-09-19', '09421102437', 'Delivery', '#000000', '2018-05-28 00:44:42', '2018-05-28 00:44:42', NULL),
(10, 'Mila', 'Dambo', 'Marigondon Lapu-Lapu City', '1990-09-19', '09435661990', 'Clerk', '#000000', '2018-05-28 00:46:05', '2018-05-28 00:46:05', NULL),
(11, 'Bob', 'Popoy', 'Basak Lapu-Lapu City', '1988-01-09', '09227871109', 'Delivery', '#000000', '2018-05-28 00:47:15', '2018-05-28 00:47:15', NULL),
(12, 'Danielle', 'Macanda', '18th Camella Homes Dame De Noche Lapu-Lapu City', '1994-09-06', '09225272437', 'Delivery', '#000000', '2018-05-28 00:48:50', '2018-05-28 00:48:50', NULL),
(13, 'Dindo', 'Matos', 'Tamiya Lapu-Lapu City', '1990-05-10', '09229901122', 'Delivery', '#000000', '2018-05-28 00:50:35', '2018-05-28 02:22:33', NULL),
(14, 'Lito', 'Atienza', 'Marigondon Lapu-Lapu City', '1998-09-11', '09431189918', 'Delivery', '#000000', '2018-05-28 00:51:25', '2018-05-28 00:51:25', NULL),
(15, 'John', 'Paden', 'bab', '1990-01-11', '09154222430', 'Delivery', '#000000', '2018-05-28 00:52:38', '2018-05-28 00:52:38', NULL),
(16, 'Nino', 'Bacus', 'Pajac Lapu-Lapu City', '1990-09-11', '09155262430', 'Delivery', '#000000', '2018-05-28 00:53:22', '2018-05-28 00:53:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personnel_types`
--

CREATE TABLE `personnel_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `personneltype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personnel_types`
--

INSERT INTO `personnel_types` (`id`, `personneltype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clerk', '2018-05-28 00:38:36', '2018-05-28 00:38:36', NULL),
(2, 'Delivery', '2018-05-28 00:38:47', '2018-05-28 00:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` decimal(13,2) NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `itemimage`, `itemname`, `unit`, `unitprice`, `item_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'deformbars.jpg', 'deformbars', 'C:\\xampp2\\tmp\\php9964.tmp', 'Deform Bars 10mm', 'Pieces', '80.00', 'Metal Bars', '2018-05-28 00:13:18', '2018-05-28 00:13:18', NULL),
(7, 'GIpipes.jpg', 'GIpipes', 'C:\\xampp2\\tmp\\php3557.tmp', 'GI Pipes', 'Pieces', '500.00', 'Metal Tube Pipes', '2018-05-28 00:13:58', '2018-05-28 00:13:58', NULL),
(8, 'goodlumber.jpg', 'goodlumber', 'C:\\xampp2\\tmp\\phpBA08.tmp', 'Lumber', 'Pieces', '100.00', 'Good Lumber', '2018-05-28 00:14:32', '2018-05-28 00:14:32', NULL),
(9, 'hollowblocks.jpg', 'hollowblocks', 'C:\\xampp2\\tmp\\php71D0.tmp', 'HollowBlock', 'Pieces', '30.00', 'Solid HollowBlock', '2018-05-28 00:15:19', '2018-05-28 00:15:19', NULL),
(10, 'sand.jpg', 'sand', 'C:\\xampp2\\tmp\\phpF4FB.tmp', 'Washed Sand', 'Sack', '50.00', 'Sand', '2018-05-28 00:15:53', '2018-05-28 00:15:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Pieces', '2018-05-28 00:12:06', '2018-05-28 00:12:06', NULL),
(3, 'Length', '2018-05-28 00:12:16', '2018-05-28 00:12:16', NULL),
(4, 'Sack', '2018-05-28 00:12:27', '2018-05-28 00:12:27', NULL),
(5, 'Cubic', '2018-05-28 00:12:41', '2018-05-28 00:12:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `usertype` enum('admin','userclerk','userdelivery') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`remember_token`, `id`, `username`, `fname`, `lname`, `birthdate`, `password`, `address`, `email_add`, `contact_no`, `created_at`, `updated_at`, `deleted_at`, `usertype`) VALUES
('ARjODptU8o5mjSJbo88SLVQzEypl0AwkYfque1pR92p2sjeM0ehD63qXrpf0', 13, NULL, 'Dindo', 'Matos', '1990-05-10', '$2y$10$DWxlclwKuQFryovkFroosOipFqVkRqPa1Rule8UXDg6bBg9u6Ct4W', 'Tamiya Lapu-Lapu City', 'christian.kaindoy@gmail.con', '09229901122', '2018-05-28 00:09:56', '2018-05-28 02:22:33', NULL, 'userclerk'),
(NULL, 14, 'Eunice', 'Eunice', 'Tio', '1995-09-11', '$2y$10$0J31c62dwhUHL/xYcPHt7OS/PNiBlliBh13OGBa..LMk55oevMFi6', 'Datag Maribago Lapu-Lapu City', NULL, '09167291992', '2018-05-28 00:40:18', '2018-05-28 00:40:18', NULL, 'userclerk'),
(NULL, 15, 'may', 'May', 'Timbo', '1990-03-11', '$2y$10$lMEohiR6BQFcCHE8IbCl9uGWCnV4PknNQvhwqd189I9AUoEsyqvbC', 'Janssen Village,Lapu-Lapu City', NULL, '09436102431', '2018-05-28 00:42:06', '2018-05-28 00:42:06', NULL, 'userclerk'),
(NULL, 16, 'anton', 'Anton', 'Bartolome', '1990-01-11', '$2y$10$UlYJRYMx7ZEzThOTeL/QpeHAodeRF4mcubrQ.QqOTpWTpuM7J/aZy', 'Basak Lapu-Lapu City', NULL, '09250272437', '2018-05-28 00:43:22', '2018-05-28 00:43:22', NULL, 'userclerk'),
(NULL, 17, 'nilo', 'Nilo', 'Manda', '1997-09-19', '$2y$10$G34TnA2dsZWY3Nr/4Jg9Tu4Ias9CrBu1wjZFvVe64Wffodqjznvgm', 'Pajac Lapu-Lapu City', NULL, '09421102437', '2018-05-28 00:44:42', '2018-05-28 00:44:42', NULL, 'userclerk'),
(NULL, 18, 'mila', 'Mila', 'Dambo', '1990-09-19', '$2y$10$nge8fwp.3XyiIiS/FXr48OZtZwNOlCsUEYhlrS9Ib6AQ6/b/m38Vq', 'Marigondon Lapu-Lapu City', NULL, '09435661990', '2018-05-28 00:46:05', '2018-05-28 00:46:05', NULL, 'userclerk'),
(NULL, 19, 'bob', 'Bob', 'Popoy', '1988-01-09', '$2y$10$TOZm6u7eqzjCu4F25DsHAOAYErHnLCISBXIeor3ZNcFZ0YotsPIrW', 'Basak Lapu-Lapu City', NULL, '09227871109', '2018-05-28 00:47:15', '2018-05-28 00:47:15', NULL, 'userclerk'),
(NULL, 20, 'danielle', 'Danielle', 'Macanda', '1994-09-06', '$2y$10$/BetcfsJRz3B3tIFQ1yxHuy11s5BDwDGHXHSBoN05/ktfwlao8uny', '18th Camella Homes Dame De Noche Lapu-Lapu City', NULL, '09225272437', '2018-05-28 00:48:50', '2018-05-28 00:48:50', NULL, 'userclerk'),
(NULL, 21, 'dindo', 'Dindo', 'Matoss', '1990-05-10', '$2y$10$TNKwM4IrAOakU0DJnHFXiOvXInsKECQC5uX2zgiKrYDGd3OqgkpHu', 'Tamiya Lapu-Lapu City', NULL, '09229901122', '2018-05-28 00:50:35', '2018-05-28 00:50:35', NULL, 'userclerk'),
(NULL, 22, NULL, 'Lito', 'Atienza', '1998-09-11', '$2y$10$C/Eeqx7BIOg0oqS9xWkIne2Zjx4S1ixJLK/sIY3gs9YMbZhgCYWDG', 'Marigondon Lapu-Lapu City', NULL, '09431189918', '2018-05-28 00:51:25', '2018-05-28 00:51:25', NULL, 'userclerk'),
(NULL, 23, NULL, 'John', 'Paden', '1990-01-11', '$2y$10$xN03fPXg/jmjczLYqvKzR.2G4pinMPetY9eGFaEyjCJgvu4N7u.rG', 'bab', NULL, '09154222430', '2018-05-28 00:52:38', '2018-05-28 00:52:38', NULL, 'userclerk'),
(NULL, 24, NULL, 'Nino', 'Bacus', '1990-09-11', '$2y$10$vmfQVarpVjpg3suOCWAWrOIaDksTnIYsM5tlrRj3kYYKblzbx1oBG', 'Pajac Lapu-Lapu City', NULL, '09155262430', '2018-05-28 00:53:22', '2018-05-28 00:53:22', NULL, 'userclerk'),
('lFqTfDue8Tctj8jXkUlB44zwPPCM5sHLglwRzYbswmPzUx2H3eLXtEzNbuDP', 25, 'Admin', 'Christian', 'Kaindoy', '1994-01-02', '$2y$10$6JcASWM26e4DhIJxOGNiI.YSO1zUsS70Vp9P7jcGa15xWxIT2WU/K', 'Pajac Lapu-Lapu City', 'christian.kaindoy@gmail.com', '09168891990', '2018-05-28 02:37:57', '2018-05-28 02:37:57', NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicletype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `made` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_personnel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `license_plate`, `vehicletype`, `made`, `delivery_personnel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VFR-110', '2-wheeler', 'XRM125', 'Anton Bartolome', '2018-05-28 02:13:15', '2018-05-28 02:13:30', NULL),
(2, 'XDN-121', '2-wheeler', 'Mio125', 'Bob Popoy', '2018-05-28 02:13:53', '2018-05-28 02:13:53', NULL),
(3, 'BNN-090', '2-wheeler', 'XRM125', 'Lito Atienza', '2018-05-28 02:14:21', '2018-05-28 02:14:21', NULL),
(4, 'SXC-121', '2-wheeler', 'Mio125', 'Lito Atienza', '2018-05-28 02:14:51', '2018-05-28 02:14:51', NULL),
(5, 'BBN-119', '3-wheeler', 'XRM125', 'John Paden', '2018-05-28 02:15:20', '2018-05-28 02:15:20', NULL),
(6, 'NNO-141', '4-wheeler', 'Isuzu', 'Danielle Macanda', '2018-05-28 02:16:16', '2018-05-28 02:16:16', NULL),
(7, 'BNA-123', '4-wheeler', 'Canter', 'Lito Atienza', '2018-05-28 02:16:43', '2018-05-28 02:16:43', NULL),
(8, 'BNS-009', '4-wheeler', 'Isuzu', 'Nino Bacus', '2018-05-28 02:17:17', '2018-05-28 02:17:17', NULL),
(9, 'FVF-121', '4-wheeler', 'Isuzu', 'Bob Popoy', '2018-05-28 02:21:26', '2018-05-28 02:21:26', NULL),
(10, 'DFD-113', '3-wheeler', 'XRM125', 'Dindo Matoss', '2018-05-28 02:22:19', '2018-05-28 02:22:19', NULL),
(11, 'GTD-099', '2-wheeler', 'Mio125', 'Anton Bartolome', '2018-05-28 02:23:07', '2018-05-28 02:23:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicletype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicletype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2-wheeler', '2018-05-28 00:53:43', '2018-05-28 00:53:43', NULL),
(2, '3-wheeler', '2018-05-28 02:11:24', '2018-05-28 02:11:24', NULL),
(3, '4-wheeler', '2018-05-28 02:11:39', '2018-05-28 02:11:39', NULL);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_served_by_foreign` (`served_by`),
  ADD KEY `orders_delivered_by_foreign` (`delivered_by`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_lines_order_id_foreign` (`order_id`),
  ADD KEY `order_lines_product_id_foreign` (`product_id`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_types`
--
ALTER TABLE `personnel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `personnel_types`
--
ALTER TABLE `personnel_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_delivered_by_foreign` FOREIGN KEY (`delivered_by`) REFERENCES `personnels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_served_by_foreign` FOREIGN KEY (`served_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD CONSTRAINT `order_lines_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_lines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
