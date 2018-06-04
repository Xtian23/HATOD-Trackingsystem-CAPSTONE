-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 09:07 AM
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
(23, '322423432', '342', 'Opra Cebu City', '1992-12-21', '09255034824', 'kaindoycx@gmail.com', '2018-05-31 00:47:15', '2018-05-31 23:12:14', '2018-05-31 23:12:14'),
(24, 'Jane', 'Igot', 'Basak-Cagodoy-Bankal-Buaya Road Bankal, Lapu-Lapu City', '1990-09-10', '09255034824', 'Jane.Igot@gmail.com', '2018-05-31 23:13:00', '2018-05-31 23:13:00', NULL),
(25, 'Rex', 'Linao', 'Blk4 DaisySt. Camella Homes Lapu-Lapu City', '1990-05-09', '09223345522', 'linaorex33@gmail.com', '2018-05-31 23:14:08', '2018-05-31 23:14:08', NULL),
(26, 'Sarah', 'David', 'Casanta Soong Lapu-Lapu City', '1954-03-09', '09152249921', 'sarahdavid@yahoo.com', '2018-05-31 23:14:56', '2018-05-31 23:14:56', NULL),
(27, 'John', 'Nacorda', '2ndSt.Door3Bf Townhomes Pajac Lapu-Lapu City', '1995-07-01', '09352293399', 'nacordaJ@gmail.com', '2018-05-31 23:15:50', '2018-05-31 23:15:50', NULL),
(28, 'Tino', 'Gimbao', 'Blk7 Dama de Noche Camella Homes Lapu-Lapu City', '1997-05-09', '09432239994', 'Gimbao.Tino@gmail.com', '2018-05-31 23:16:42', '2018-05-31 23:16:42', NULL),
(29, 'Lexter', 'Silo', 'Blok23DecaHomes Mactan Lapu-Lapu City', '1988-04-01', '09224329223', 'Lexter.S@gmail.com', '2018-05-31 23:17:35', '2018-05-31 23:17:35', NULL),
(30, 'Nina', 'Diko', 'Ticgahon, Bankal Road, Lapu-Lapu City', '1999-07-10', '09252281199', NULL, '2018-05-31 23:18:19', '2018-05-31 23:18:19', NULL),
(31, 'Jino', 'Montano', 'Sitio Guisi Fuentes Rd', '1988-09-10', '09223228484', 'JinoMontano@gmail.com', '2018-05-31 23:19:11', '2018-05-31 23:19:11', NULL),
(32, 'Dodong', 'Sy', 'Agus Barangay Hall, Lapu-Lapu City', '1990-03-14', '09152929993', 'dodong21@gmail.com', '2018-05-31 23:19:54', '2018-05-31 23:19:54', NULL),
(33, 'Mary', 'Jaculbe', 'Mactan Circumferential,Marigondon Lapu-Lapu City', '1998-03-18', '09231229492', 'Mary.J@yahoo.com', '2018-05-31 23:20:39', '2018-05-31 23:20:39', NULL),
(34, 'Lino', 'Dy', 'Guerillero Lapu-Lapu City', '1995-06-25', '09233228821', 'DyL@gmail.com', '2018-05-31 23:21:14', '2018-05-31 23:21:14', NULL),
(35, 'Lito', 'Atienza', 'Sitio Ylaya, Bonghanoy Lapu-Lapu City', '1990-07-10', '09338319939', 'LitoAtienza@gmail.com', '2018-05-31 23:21:57', '2018-05-31 23:21:57', NULL);

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
(47, '2018_05_26_120011_add_color_at_column_to_personnels_table', 8),
(48, '2018_05_29_174644_add_name_title_at_column_to_products_table', 9),
(49, '2018_05_29_175009_add_name_title_at_column_to_products_table', 10),
(50, '2018_06_02_114145_add_userimage_at_column_to_users_table', 11),
(51, '2018_06_02_114552_add_title_at_column_to_users_table', 12);

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
(27, 31, '2018-06-03', 'pending', 'cod', 30, 23, '2018-06-03 00:27:41', '2018-06-03 07:40:28', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(91, 27, 34, '2.00', '50.00', '2018-06-03 07:40:28', '2018-06-03 07:40:28', NULL),
(92, 27, 47, '2.00', '11.00', '2018-06-03 07:40:28', '2018-06-03 07:40:28', NULL);

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
(19, 'Mikee', 'Pangatungan', 'Abuno, Pajac Lapu-Lapu City', '1992-01-21', '0987654321', 'Clerk', '#000000', '2018-05-31 00:55:12', '2018-05-31 23:23:00', '2018-05-31 23:23:00'),
(20, 'Michael', 'Castro', 'Cebu City', '1990-10-29', '0925324212', 'Clerk', '#000000', '2018-05-31 00:56:41', '2018-05-31 00:56:54', '2018-05-31 00:56:54'),
(21, 'Michael', 'Castro', 'Opra Cebu City', '1983-12-01', '09876', 'Delivery', '#000000', '2018-05-31 00:57:48', '2018-05-31 00:59:21', '2018-05-31 00:59:21'),
(22, 'Robert', 'Bartolome', 'castro@gmail.com', '1986-10-21', '09876521211', 'Delivery', '#000000', '2018-05-31 02:44:16', '2018-05-31 23:22:56', NULL),
(23, 'James', 'Mitos', 'Basak Lapu-Lapu City', '1990-09-10', '09159801102', 'Delivery', '#000000', '2018-05-31 23:24:03', '2018-05-31 23:24:03', NULL),
(24, 'Ian', 'Igot', 'Tamiya Lapu-Lapu City', '1988-02-15', '09225091199', 'Delivery', '#000000', '2018-05-31 23:25:26', '2018-05-31 23:25:26', NULL),
(25, 'Gian', 'David', 'Bankal Lapu-Lapu City', '1990-10-09', '09434662437', 'Delivery', '#000000', '2018-05-31 23:26:21', '2018-05-31 23:26:21', NULL),
(26, 'Gino', 'Matias', 'Jannsen Village Lapu-Lapu City', '1999-12-19', '09251045676', 'Delivery', '#000000', '2018-05-31 23:27:20', '2018-05-31 23:27:20', NULL),
(27, 'Eunice', 'Husto', 'Casanta Soong Lapu-Lapu City', '1990-05-10', '09159901100', 'Clerk', '#000000', '2018-05-31 23:28:16', '2018-05-31 23:28:16', NULL),
(28, 'Nida', 'Lee', 'Marigondon Lapu-Lapu City', '1990-07-15', '09156223882', 'Clerk', '#000000', '2018-05-31 23:29:06', '2018-05-31 23:29:06', NULL),
(29, 'Jana', 'Mastanos', 'Abuno, Pajac Lapu-Lapu City', '1994-06-19', '09151102289', 'Clerk', '#000000', '2018-05-31 23:30:10', '2018-05-31 23:30:10', NULL);

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
  `itemimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` decimal(13,2) NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `itemimage`, `itemname`, `unit`, `unitprice`, `item_description`, `created_at`, `updated_at`, `deleted_at`, `name`, `title`) VALUES
(28, NULL, 'Deform Bars', 'Pieces', '200.00', 'Metal Bars', '2018-05-31 00:21:11', '2018-06-03 00:24:14', '2018-06-03 00:24:14', 'deformbars.jpg', 'Metal Bars'),
(29, NULL, 'GI Pipes', 'Pieces', '500.00', 'Metal Pipes', '2018-05-31 03:16:48', '2018-06-03 00:24:18', '2018-06-03 00:24:18', 'GIpipes.jpg', 'Metal Pipes'),
(30, 'C:\\xampp2\\tmp\\php3ED1.tmp', 'Lumber', 'Pieces', '150.00', 'Good Lumber', '2018-05-31 22:21:02', '2018-06-03 00:24:50', '2018-06-03 00:24:50', 'goodlumber.jpg', 'Good Lumber'),
(31, 'C:\\xampp2\\tmp\\php8B.tmp', 'Hollowblocks', 'Pieces', '40.00', 'Solid HollowBlock', '2018-05-31 22:21:51', '2018-06-03 00:24:46', '2018-06-03 00:24:46', 'hollowblocks.jpg', 'Solid HollowBlock'),
(32, 'C:\\xampp2\\tmp\\php9D01.tmp', 'Sand', 'Bag', '50.00', 'Washed Sand', '2018-05-31 22:24:42', '2018-06-03 00:25:13', '2018-06-03 00:25:13', 'sand.jpg', 'Washed Sand'),
(33, NULL, 'Bamboo Poles', 'Bag', '300.00', 'Apo Cement', '2018-05-31 22:31:40', '2018-06-02 03:31:23', '2018-06-02 03:31:23', 'apo.png', 'Apo Cement'),
(34, 'item-images/rmdfK3wzdzJK0LXT1MKmVFcFoXX4EauPss6xULTw.png', 'Bamboo Poles', 'Pieces', '50.00', 'Bamboo Poles 6\"', '2018-05-31 22:32:16', '2018-06-03 07:35:02', NULL, '  ', 'Bamboo Poles 6\"'),
(35, NULL, 'Bricks', 'Pieces', '40.00', 'Solid Bricks', '2018-05-31 22:33:16', '2018-06-03 00:24:10', '2018-06-03 00:24:10', '  ', 'Solid Bricks'),
(36, NULL, 'sample', 'Pieces', '1000.00', 'Corrugated Asphalt', '2018-05-31 22:59:31', '2018-06-03 00:25:09', '2018-06-03 00:25:09', 'corrugatedasphalt.jpg', 'Corrugated Asphalt'),
(37, 'C:\\xampp2\\tmp\\php6FD7.tmp', 'Gravel', 'Bag', '70.00', 'Small Rocks', '2018-05-31 23:01:39', '2018-06-03 00:24:42', '2018-06-03 00:24:42', 'gravel.jpg', 'Small Rocks'),
(38, 'C:\\xampp2\\tmp\\phpD21.tmp', 'Boysen Paint', 'Pieces', '850.00', 'Latex Paint', '2018-05-31 23:02:19', '2018-06-03 00:24:05', '2018-06-03 00:24:05', 'paint.jpg', 'Latex Paint'),
(39, 'C:\\xampp2\\tmp\\phpFC83.tmp', 'Tiles', 'Pieces', '70.00', 'Rose Tiles', '2018-05-31 23:03:20', '2018-06-03 00:25:16', '2018-06-03 00:25:16', 'tiles.jpg', 'Rose Tiles'),
(40, 'C:\\xampp2\\tmp\\phpA77A.tmp', 'Timber Wood', 'Pieces', '300.00', 'Wood', '2018-05-31 23:04:04', '2018-06-03 00:25:21', '2018-06-03 00:25:21', 'TimberWood.jpg', 'Wood'),
(41, 'C:\\xampp2\\tmp\\php299C.tmp', 'Hydrated Lime', 'Pieces', '800.00', 'Lime', '2018-05-31 23:04:38', '2018-06-03 00:24:54', '2018-06-03 00:24:54', 'hydrated lime.jpg', 'Lime'),
(42, 'C:\\xampp2\\tmp\\phpA417.tmp', 'Ondura', 'Pieces', '1500.00', 'Ondura Roof', '2018-05-31 23:06:14', '2018-06-03 00:24:58', '2018-06-03 00:24:58', 'ondura.jpg', 'Ondura Roof'),
(43, 'C:\\xampp2\\tmp\\php8996.tmp', 'Plywood', 'Pieces', '250.00', 'Plywood 3/4', '2018-05-31 23:07:13', '2018-06-03 00:25:01', '2018-06-03 00:25:01', 'threefourthply.jpg', 'Plywood 3/4'),
(44, 'C:\\xampp2\\tmp\\php1770.tmp', 'Wood Plank', 'Pieces', '350.00', 'Wooden Plank', '2018-05-31 23:07:50', '2018-06-03 00:25:25', '2018-06-03 00:25:25', 'wooden plank.jpg', 'Wooden Plank'),
(45, 'item-images/pHm5JjPZxT7nH1JADdOCO9LkU09GEgaLR9QcyEnS.jpeg', 'Asphalt Roof1', 'Kilo', '111.00', 'Schedule 401', '2018-06-02 23:57:32', '2018-06-02 23:59:22', '2018-06-02 23:59:22', '  ', 'Schedule 401'),
(46, 'item-images/ggZNxI9J0jaKUbhmuSntkSrTCCjYnib4OsQGcq5E.jpeg', 'Asphalt Roof11', 'Bag', '11.00', 'Schedule 4011', '2018-06-02 23:59:42', '2018-06-03 00:01:21', '2018-06-03 00:01:21', '  ', 'Schedule 4011'),
(47, 'item-images/YHtaXMDeEAiiXc46oNGQPcbsJ0VrYnoC8Ofr1OMV.jpeg', 'GI Pipes11', 'Bag', '11.00', 'Solid Bricks11', '2018-06-03 00:01:36', '2018-06-03 00:01:36', NULL, '  ', 'Solid Bricks11');

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
(14, 'Pieces', '2018-05-31 00:16:55', '2018-05-31 00:16:55', NULL),
(15, 'Bag', '2018-05-31 00:19:54', '2018-05-31 00:19:54', NULL),
(16, 'Length', '2018-05-31 00:20:14', '2018-05-31 00:20:14', NULL),
(17, 'Cubic', '2018-05-31 00:20:28', '2018-05-31 22:43:01', '2018-05-31 22:43:01'),
(18, 'Kilo', '2018-05-31 22:34:16', '2018-05-31 22:34:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`remember_token`, `id`, `username`, `userimage`, `title`, `fname`, `lname`, `birthdate`, `password`, `address`, `email_add`, `contact_no`, `created_at`, `updated_at`, `deleted_at`, `usertype`) VALUES
('e413POddTPwNPQlPfFBiHQGWyQiVnXjF1zjBbsjeTgMBUuKxpkMIbn8Oym0R', 30, 'mikee', '', '', 'Mikee', 'Pangatungan', '1992-01-21', '$2y$10$L27qru0H/rTgbvO3BFSPG.yAj/8BPHtST8COSojg3SI1VhchVKkjm', 'Abuno, Pajac Lapu-Lapu City', NULL, '0987654321', '2018-05-31 00:55:12', '2018-05-31 00:55:12', NULL, 'userclerk'),
('9UWy3eIa5D9fl3OjfeeFMjwJU7t7Az91qTK6h0Dlu57cAvGyZ5FgNMix7ScU', 33, 'michael', '', '', 'Michael', 'Castro', '1986-10-21', '$2y$10$Dx34ge6/vK.mBoIE3hr7NOroiVQD7xpMsErH3q8JPy1R8JqG.jBgq', 'castro@gmail.com', NULL, '09876521211', '2018-05-31 02:44:16', '2018-05-31 02:44:16', NULL, 'userclerk'),
(NULL, 34, 'james', '', '', 'James', 'Mitos', '1990-09-10', '$2y$10$9J5oUTtCne6orVB4IWqGe.1M5MYu1sMXw.QVQYD.bMITew3wKO166', 'Basak Lapu-Lapu City', NULL, '09159801102', '2018-05-31 23:24:03', '2018-05-31 23:24:03', NULL, 'userclerk'),
(NULL, 35, 'Ian', '', '', 'Ian', 'Igot', '1988-02-15', '$2y$10$hTGztmcWWO6RwC7epgDtVu6wnMRxOMzXF1.I2Rhya0TzgrGFr2cUG', 'Tamiya Lapu-Lapu City', NULL, '09225091199', '2018-05-31 23:25:26', '2018-05-31 23:25:26', NULL, 'userclerk'),
(NULL, 36, 'Gian', '', '', 'Gian', 'David', '1990-10-09', '$2y$10$9BUeHYNq.7hQWv4iKjmG3.oOTIm5W0zh8jWvQH4gt2sWAUaVm1HFm', 'Bankal Lapu-Lapu City', NULL, '09434662437', '2018-05-31 23:26:21', '2018-05-31 23:26:21', NULL, 'userclerk'),
(NULL, 37, 'Gino', '', '', 'Gino', 'Matias', '1999-12-19', '$2y$10$SVUzt6P0RtqXIy/NbRlWx..Ai7./N4Uk1IxEyFljmgIGmtGBX.1cq', 'Jannsen Village Lapu-Lapu City', NULL, '09251045676', '2018-05-31 23:27:20', '2018-05-31 23:27:20', NULL, 'userclerk'),
(NULL, 38, 'Eunice', '', '', 'Eunice', 'Husto', '1990-05-10', '$2y$10$bZWRN.TSRJWY7OfatVTd1uLNOKvFbxi270ZbF49eLMdstdm/fc30u', 'Casanta Soong Lapu-Lapu City', NULL, '09159901100', '2018-05-31 23:28:16', '2018-05-31 23:28:16', NULL, 'userclerk'),
(NULL, 39, 'Nida', '', '', 'Nida', 'Lee', '1990-07-15', '$2y$10$B3zIYdd6oRH1SH/bUtxwfez5SZ0FbGbhGKXY52biixPPEMEVMj/Qq', 'Marigondon Lapu-Lapu City', NULL, '09156223882', '2018-05-31 23:29:06', '2018-05-31 23:29:06', NULL, 'userclerk'),
(NULL, 40, 'Jana', '', '', 'Jana', 'Mastanos', '1994-06-19', '$2y$10$3AUVhAw8/Gj8XfUyU..CF.fuwgdcRXJpFgBj379NplZ9BxX.Ibq6W', 'Abuno, Pajac Lapu-Lapu City', NULL, '09151102289', '2018-05-31 23:30:10', '2018-05-31 23:30:10', NULL, 'userclerk'),
(NULL, 41, 'speederz', 'C:\\xampp2\\tmp\\phpF2B4.tmp', 'speederz', 'speederz', 'speederz', '1992-10-28', '$2y$10$gG.ZcoedAEdgjZ/oKKSsOOUv6V6SP4RS8UrBRZ0JJnZUtF/cXpJmG', 'speederz', 'speederz@gmail.com', '0987654321', '2018-06-02 04:21:50', '2018-06-02 04:21:50', NULL, 'admin'),
(NULL, 42, 'trackingsystem', 'C:\\xampp2\\tmp\\php3EE1.tmp', 'trackingsystem', 'trackingsystem', 'trackingsystem', '1993-10-29', '$2y$10$4lKOxeaNZqZKM4ENw.DyIOKBIWQHr0LQsVHkBD9hjY7qOyiSdE3Ca', 'trackingsystem', 'trackingsystem@gmail.com', '09876521211', '2018-06-02 04:29:48', '2018-06-02 04:29:48', NULL, 'admin'),
(NULL, 43, 'admin', 'user-images/mzYOLPvoUdcbVJOy7iScUQMmcFq6fSYd968eUQRz.jpeg', 'admin', 'Christian', 'Kaindoy', '1996-01-02', '$2y$10$fnmPqYD6VCgavOQuqL6i/elP1PtMhVROHq842usCJ98YJAsAnNgF6', 'Abuno, Pajac Lapu-Lapu City', 'kaindoycx@gmail.com', '09255034824', '2018-06-03 23:05:59', '2018-06-03 23:05:59', NULL, 'admin');

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
(15, 'VFR 991', '10 wheeler', 'asdad', 'Michael Roxas', '2018-05-31 03:12:04', '2018-05-31 23:33:36', '2018-05-31 23:33:36'),
(16, 'DSS 121', '10 wheeler', 'Mitsubishi', 'Robert Bartolome', '2018-05-31 23:32:11', '2018-05-31 23:33:22', NULL),
(17, 'CCD-021', '10 wheeler', 'Isuzu', 'Gian David', '2018-05-31 23:32:35', '2018-05-31 23:32:35', NULL),
(18, 'DSS-119', '10 wheeler', 'Isuzu', 'James Mitos', '2018-05-31 23:34:27', '2018-05-31 23:34:27', NULL),
(19, 'HJS-112', '3 wheeler', 'XRM125', 'Gino Matias', '2018-05-31 23:35:30', '2018-05-31 23:35:30', NULL),
(20, 'FDF-112', '4 wheeler', 'Suzuki125', 'Ian Igot', '2018-05-31 23:36:40', '2018-05-31 23:36:40', NULL);

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
(19, '4 wheeler', '2018-05-31 03:10:46', '2018-05-31 03:10:46', NULL),
(20, '10 wheeler', '2018-05-31 03:10:56', '2018-05-31 03:10:56', NULL),
(21, '3 wheeler', '2018-05-31 19:57:56', '2018-05-31 19:57:56', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_unit_idx` (`unit`(191));

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_unit_idx` (`unit`(191));

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `personnel_types`
--
ALTER TABLE `personnel_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
