-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 11:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `user_id`, `created_at`, `updated_at`) VALUES
(49, 'Electronics', 55, '2025-03-16 11:15:02', '2025-03-16 11:15:02'),
(50, 'Clothing', 55, '2025-03-16 11:15:11', '2025-03-16 11:15:11'),
(51, 'Shoes', 55, '2025-03-16 11:15:19', '2025-03-16 11:15:19'),
(52, 'Jewelry', 55, '2025-03-16 11:15:28', '2025-03-16 11:15:28'),
(53, 'Home and Kitchen', 55, '2025-03-16 11:15:37', '2025-03-16 11:15:37'),
(54, 'Beauty and Personal Care', 55, '2025-03-16 11:15:48', '2025-03-16 11:15:48'),
(55, 'Books', 55, '2025-03-16 11:15:57', '2025-03-16 11:15:57'),
(56, 'Sports and Outdoors', 55, '2025-03-16 11:16:17', '2025-03-16 11:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Miracle DuBuque', 'lehner.reina@example.com', '+8801975803068', '235 Geraldine Cliffs Suite 281\nNew Marina, WI 12897-7238', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(2, 'Mr. Dedrick Mante', 'akirlin@example.net', '+8801758348879', '321 Rogahn Meadow Suite 720\nKathryneshire, AL 65410', 55, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(3, 'Jane Muller', 'katelyn.farrell@example.net', '+8801376137414', '3687 Ayla Throughway\nEast Frederick, NE 75422-0793', 57, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(4, 'Abby O\'Hara', 'robel.deonte@example.org', '+88019856848', '4188 Tromp Locks Suite 205\nLake Adeline, CT 12456', 55, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(5, 'Mr. Hazle Waters IV', 'xsawayn@example.com', '+8801388583043', '58527 Eliseo Glen\nEast Jazminton, AR 20078-5184', 54, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(6, 'Lorena Krajcik', 'stehr.kathryn@example.org', '+8801686614996', '7470 Abernathy Highway Suite 309\nMichaelabury, OR 30996-2034', 57, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(7, 'Ms. Elenora Mueller', 'jdach@example.com', '+8801577364220', '20230 Wilderman Rapids Suite 463\nNorbertomouth, WV 54185', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(8, 'Maritza Murphy', 'steuber.domenic@example.net', '+8801927918533', '1702 Francisca Stream Suite 573\nManuelatown, LA 70261-0143', 57, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(9, 'Dr. Kim Leannon MD', 'considine.lou@example.org', '+8801489684948', '6930 Mertz Orchard Apt. 713\nLake Dante, IL 47537', 57, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(10, 'Saul Champlin Sr.', 'jones.shawn@example.net', '+880137974072', '47726 Sammy Alley\nNew Kennedyhaven, WV 69980', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(11, 'Luisa Huel', 'ramona16@example.net', '+8801396586773', '99783 Armstrong Canyon Apt. 689\nJacintotown, KY 74476-2681', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(12, 'Assunta Hermiston', 'ryan.winona@example.net', '+8801727924481', '892 Watsica Track\nNew Zariaborough, OK 01396-9815', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(13, 'Dr. Johnathon Pfeffer', 'lbogisich@example.com', '+8801728849869', '419 Rex Divide\nWest Dewayne, CA 52427-0979', 54, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(14, 'Kenny White', 'kaleigh.cremin@example.com', '+8801550318554', '6893 Bartoletti Valleys Suite 632\nLake Erika, WV 29618', 57, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(15, 'Dr. Eden Fahey', 'terrence.metz@example.org', '+8801474343481', '8287 Schaden Cape\nNorth Sydnieshire, MI 10758-0421', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(16, 'Vincent Lind', 'kstanton@example.org', '+880197091927', '635 Hauck Fords Apt. 901\nWest Donavonmouth, HI 42952', 57, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(17, 'Lilian Gutkowski', 'magnolia.hansen@example.net', '+8801498064389', '678 Kertzmann Bypass\nLaurelland, DC 89879-4893', 55, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(18, 'Ethelyn Medhurst', 'heaney.dominic@example.org', '+8801423797165', '6800 Goyette Prairie Suite 515\nTomasfort, CT 53493-4418', 55, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(19, 'Herbert Gutkowski', 'nova.roob@example.com', '+8801765130459', '265 Savanna Point\nNew Kaia, RI 26437', 54, '2025-03-16 11:23:40', '2025-03-16 11:23:40'),
(20, 'Carole Lubowitz Jr.', 'chelsie39@example.org', '+8801510777637', '344 Jessie Mountain Apt. 822\nSouth Alessandratown, ME 16295', 56, '2025-03-16 11:23:40', '2025-03-16 11:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `payable` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `total`, `discount`, `vat`, `payable`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(6, 1250.00, 250.00, 150.00, 1100.00, 55, 1, '2025-03-16 13:31:10', '2025-03-16 13:31:10'),
(8, 2250.00, 250.00, 150.00, 2100.00, 55, 2, '2025-03-16 14:37:48', '2025-03-16 14:37:48'),
(15, 109709.92, 0.00, 5485.50, 115195.42, 55, 2, '2025-03-22 14:46:40', '2025-03-22 14:46:40'),
(16, 90494.00, 0.00, 4524.70, 95018.70, 55, 7, '2025-03-22 15:34:38', '2025-03-22 15:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `product_id`, `user_id`, `quantity`, `sale_price`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 55, 2, 625.00, '2025-03-16 13:31:10', '2025-03-16 13:31:10'),
(4, 8, 6, 55, 2, 1125.00, '2025-03-16 14:37:48', '2025-03-16 14:37:48'),
(12, 15, 70, 55, 2, 16590.62, '2025-03-22 14:46:40', '2025-03-22 14:46:40'),
(13, 15, 73, 55, 2, 15145.64, '2025-03-22 14:46:40', '2025-03-22 14:46:40'),
(14, 15, 22, 55, 1, 77973.66, '2025-03-22 14:46:40', '2025-03-22 14:46:40'),
(15, 16, 11, 55, 2, 7822.00, '2025-03-22 15:34:38', '2025-03-22 15:34:38'),
(16, 16, 1, 55, 1, 73456.00, '2025-03-22 15:34:38', '2025-03-22 15:34:38'),
(17, 16, 13, 55, 1, 9216.00, '2025-03-22 15:34:38', '2025-03-22 15:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_09_07_110845_create_users', 1),
(3, '2023_11_17_104239_create_categories', 1),
(5, '2025_03_04_233808_modify_password_column_in_users_table', 2),
(11, '2025_03_05_125748_add_image_to_users_table', 3),
(12, '2025_03_05_162952_add_address_to_users_table', 3),
(13, '2025_03_06_193437_create_customers_table', 3),
(14, '2025_03_08_205654_create_products_table', 3),
(15, '2025_03_09_214522_create_invoices_table', 3),
(16, '2025_03_09_214604_create_invoice_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `description`, `price`, `unit`, `image`, `created_at`, `updated_at`) VALUES
(1, 55, 49, 'Computer', 'Autem commodi inventore recusandae consequatur.', 73456.00, 589, 'https://via.placeholder.com/640x480.png/006688?text=quo', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(2, 56, 49, 'Smart TV', 'Esse animi rerum excepturi rem non expedita.', 77459.00, 186, 'https://via.placeholder.com/640x480.png/00ffdd?text=deserunt', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(4, 54, 49, 'Computer', 'Sunt facilis vitae harum optio molestias.', 70060.93, 910, 'https://via.placeholder.com/640x480.png/001166?text=magnam', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(5, 56, 49, 'Mobile phone', 'Neque ex dolore earum velit.', 46115.41, 233, 'https://via.placeholder.com/640x480.png/008877?text=et', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(6, 56, 49, 'Smartwatch', 'Alias aut aut voluptatibus iste.', 34644.37, 402, 'https://via.placeholder.com/640x480.png/008811?text=accusamus', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(7, 57, 49, 'Computer', 'Natus quos officia consequatur recusandae et ut iste.', 56428.08, 805, 'https://via.placeholder.com/640x480.png/0044cc?text=placeat', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(8, 54, 49, 'Smart wrist device', 'Sit blanditiis fuga eligendi fugiat.', 77709.94, 255, 'https://via.placeholder.com/640x480.png/00cc66?text=earum', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(9, 57, 49, 'Computer', 'Enim quisquam vitae quae et dolor totam.', 3381.99, 786, 'https://via.placeholder.com/640x480.png/005566?text=accusamus', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(10, 56, 49, 'Smart TV', 'Rerum rerum est quia tenetur vel.', 14344.68, 643, 'https://via.placeholder.com/640x480.png/0022cc?text=dignissimos', '2025-03-16 11:54:51', '2025-03-16 11:54:51'),
(11, 55, 50, 'Shirt', 'Reprehenderit voluptas veritatis doloribus voluptatibus itaque in.', 3911.00, 854, 'https://via.placeholder.com/640x480.png/0033cc?text=porro', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(12, 57, 50, 'Salwar Suit', 'Repudiandae qui eveniet odio libero.', 96664.04, 567, 'https://via.placeholder.com/640x480.png/00dd77?text=ad', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(13, 55, 50, ' Jacket', 'Voluptate quibusdam commodi quia ea expedita autem sunt.', 9216.00, 746, 'https://via.placeholder.com/640x480.png/0088bb?text=delectus', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(14, 57, 50, 'Denim', 'Natus explicabo quas consequatur vero eligendi maiores est autem.', 48671.81, 899, 'https://via.placeholder.com/640x480.png/00dd44?text=non', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(15, 57, 50, 'Palazzo', 'Amet harum blanditiis rerum culpa itaque in dolorem.', 25197.45, 752, 'https://via.placeholder.com/640x480.png/0022dd?text=qui', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(16, 54, 50, 'Night dresses (Sleep wear)', 'Voluptas laudantium eligendi saepe mollitia odio.', 28289.89, 558, 'https://via.placeholder.com/640x480.png/00ff77?text=voluptatem', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(17, 57, 50, 'Blouse', 'Incidunt at facere magnam architecto illum illum.', 24361.63, 319, 'https://via.placeholder.com/640x480.png/00aa66?text=ad', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(18, 54, 50, 'Swim wear', 'Quaerat voluptates enim est eveniet et.', 41539.10, 894, 'https://via.placeholder.com/640x480.png/0033bb?text=repellat', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(19, 56, 50, 'Jeans', 'Animi iure quia suscipit officia ut doloribus.', 25507.20, 514, 'https://via.placeholder.com/640x480.png/004411?text=aperiam', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(20, 55, 50, 'Jeans', 'Et suscipit placeat tempore.', 14112.26, 707, 'https://via.placeholder.com/640x480.png/005511?text=mollitia', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(21, 55, 50, 'Kurti', 'Iure et architecto voluptas qui.', 82238.14, 1000, 'https://via.placeholder.com/640x480.png/0044ee?text=magnam', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(22, 55, 50, ' Jacket', 'Molestiae optio dolor itaque qui architecto veritatis et culpa.', 77973.66, 489, 'https://via.placeholder.com/640x480.png/0066ee?text=molestiae', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(23, 54, 50, 'Blazer', 'Aperiam necessitatibus quo incidunt odio ea nesciunt.', 78863.73, 722, 'https://via.placeholder.com/640x480.png/0000cc?text=enim', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(24, 55, 50, 'Denim', 'Earum neque quia velit ut aliquid magnam aut.', 47529.96, 979, 'https://via.placeholder.com/640x480.png/0088ee?text=aspernatur', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(25, 57, 50, 'Palazzo', 'Sed at odit quia harum id nesciunt est tempora.', 65695.21, 815, 'https://via.placeholder.com/640x480.png/00ccff?text=tempora', '2025-03-16 12:01:59', '2025-03-16 12:01:59'),
(26, 54, 51, 'sports shoe Navy', 'Voluptatem debitis delectus aliquam illo ut culpa asperiores.', 47672.57, 137, 'https://via.placeholder.com/640x480.png/00dd88?text=exercitationem', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(27, 54, 51, 'Canvas', 'Omnis dolor cum tempora est totam delectus at occaecati.', 68768.25, 638, 'https://via.placeholder.com/640x480.png/00bb33?text=voluptas', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(28, 56, 51, 'sports shoe Navy', 'Assumenda officiis repudiandae distinctio nihil recusandae optio et.', 82387.07, 556, 'https://via.placeholder.com/640x480.png/0033ff?text=totam', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(29, 57, 51, 'Sandal', 'Aliquam adipisci sint quis ut autem necessitatibus soluta sint.', 34889.66, 283, 'https://via.placeholder.com/640x480.png/0055cc?text=amet', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(30, 54, 51, 'sports shoe Navy', 'Vitae non minima quas laudantium.', 98413.71, 442, 'https://via.placeholder.com/640x480.png/00cc77?text=vel', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(31, 57, 51, 'Sandal', 'Qui consequatur ullam consectetur molestiae cumque.', 44891.47, 61, 'https://via.placeholder.com/640x480.png/00eedd?text=accusamus', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(32, 56, 51, 'Sandal', 'Enim earum omnis architecto deleniti.', 20682.92, 588, 'https://via.placeholder.com/640x480.png/009955?text=quisquam', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(33, 54, 51, 'sports shoe olive CKD', 'Tempore rerum et odit.', 59327.52, 705, 'https://via.placeholder.com/640x480.png/0000aa?text=voluptatibus', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(34, 55, 51, 'Sandal', 'Fuga rerum sint iure.', 27366.28, 391, 'https://via.placeholder.com/640x480.png/006633?text=distinctio', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(35, 55, 51, 'Canvas', 'Dolores ex laudantium quod fugiat commodi amet accusamus.', 50080.31, 115, 'https://via.placeholder.com/640x480.png/00ff99?text=et', '2025-03-16 12:05:50', '2025-03-16 12:05:50'),
(36, 56, 53, 'Chef Knife', 'Sapiente perferendis corrupti ea itaque consequatur ut minus.', 8684.60, 956, 'https://via.placeholder.com/640x480.png/002244?text=nulla', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(37, 56, 53, 'Saucepan', 'Perferendis est est neque ab.', 2947.18, 92, 'https://via.placeholder.com/640x480.png/007788?text=repudiandae', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(38, 57, 53, 'Can Opener', 'Ea sapiente ab quis officiis quibusdam est.', 2842.12, 854, 'https://via.placeholder.com/640x480.png/00aadd?text=eaque', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(39, 55, 53, 'Chef Knife', 'Enim dicta maiores consequuntur.', 2721.42, 3, 'https://via.placeholder.com/640x480.png/0055dd?text=velit', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(40, 55, 53, 'Can Opener', 'Necessitatibus sit porro quibusdam velit assumenda ipsam.', 8129.47, 897, 'https://via.placeholder.com/640x480.png/002222?text=cupiditate', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(41, 57, 53, 'Cutting Board', 'Unde et reprehenderit doloribus et porro debitis excepturi aut.', 2005.07, 594, 'https://via.placeholder.com/640x480.png/00ff77?text=dolorem', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(42, 56, 53, 'Shears', 'Repellendus qui et quo est voluptates rerum ut.', 1741.84, 289, 'https://via.placeholder.com/640x480.png/00ff99?text=enim', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(43, 56, 53, 'Pot', 'Inventore sed et tempore officia.', 7766.06, 997, 'https://via.placeholder.com/640x480.png/008811?text=recusandae', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(44, 55, 53, 'Salad Spinner', 'Id vel quisquam ipsa.', 8093.42, 868, 'https://via.placeholder.com/640x480.png/00ffbb?text=non', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(45, 57, 53, 'Can Opener', 'In nostrum asperiores corrupti quos sunt iste odit.', 828.84, 689, 'https://via.placeholder.com/640x480.png/001122?text=odit', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(46, 57, 53, 'Grater', 'Dolor dicta neque molestiae aut.', 4278.58, 400, 'https://via.placeholder.com/640x480.png/00ddff?text=iure', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(47, 55, 53, 'Colander', 'Laudantium in dicta minima ex.', 805.38, 212, 'https://via.placeholder.com/640x480.png/00aa11?text=sit', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(48, 55, 53, 'Shears', 'Hic provident aliquid ex facilis voluptas dolorem labore est.', 3226.39, 584, 'https://via.placeholder.com/640x480.png/0077aa?text=nobis', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(49, 56, 53, 'Bowls', 'Molestias dignissimos nisi animi esse harum.', 7116.20, 709, 'https://via.placeholder.com/640x480.png/0099aa?text=dolor', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(50, 55, 53, 'Chef Knife', 'A dolores repellat quia assumenda.', 6659.15, 990, 'https://via.placeholder.com/640x480.png/0044bb?text=sit', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(51, 57, 53, 'Cutting Board', 'Inventore id earum ea ad.', 9599.26, 465, 'https://via.placeholder.com/640x480.png/000077?text=recusandae', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(52, 57, 53, 'Shears', 'Impedit molestiae consequuntur consequatur et.', 3635.11, 561, 'https://via.placeholder.com/640x480.png/0044aa?text=vel', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(53, 56, 53, 'Can Opener', 'Sint commodi dolorum ut omnis in vitae aperiam.', 1056.96, 48, 'https://via.placeholder.com/640x480.png/009999?text=illum', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(54, 54, 53, 'Saucepan', 'Id voluptatem ut rerum in mollitia.', 5604.27, 161, 'https://via.placeholder.com/640x480.png/00ddaa?text=dignissimos', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(55, 55, 53, 'Cutting Board', 'Molestiae quo minus quis praesentium maiores aut voluptatem illum.', 7458.27, 460, 'https://via.placeholder.com/640x480.png/00aaaa?text=omnis', '2025-03-16 12:09:43', '2025-03-16 12:09:43'),
(56, 54, 54, 'Eye liner', 'Quis excepturi voluptatem quod ut.', 6223.83, 910, 'https://via.placeholder.com/640x480.png/001188?text=architecto', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(57, 56, 54, 'Eye shadow', 'Cupiditate assumenda aut perspiciatis labore dolorem in.', 8499.29, 24, 'https://via.placeholder.com/640x480.png/0011dd?text=reiciendis', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(58, 57, 54, 'Foundation', 'Pariatur recusandae doloribus excepturi ea inventore debitis qui minus.', 7742.09, 254, 'https://via.placeholder.com/640x480.png/0022dd?text=tenetur', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(59, 57, 54, 'Eye shadow', 'Unde vero enim perspiciatis laudantium aut deleniti incidunt.', 7389.66, 137, 'https://via.placeholder.com/640x480.png/00ee00?text=autem', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(60, 57, 54, 'Mascara', 'Aut accusantium eaque officiis aut velit esse.', 5304.90, 610, 'https://via.placeholder.com/640x480.png/00ff33?text=quos', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(61, 54, 54, 'Eye shadow', 'Labore totam itaque in ut et reiciendis.', 1949.42, 88, 'https://via.placeholder.com/640x480.png/005500?text=unde', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(62, 55, 54, 'Face mask', 'Omnis vero vel nisi nihil.', 7386.41, 932, 'https://via.placeholder.com/640x480.png/00dd44?text=atque', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(63, 55, 54, 'Eye pencil', 'Id omnis qui dolorem ut repudiandae voluptatum.', 3449.58, 968, 'https://via.placeholder.com/640x480.png/006633?text=vel', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(64, 54, 54, 'Foundation', 'Omnis in voluptatem qui doloribus qui pariatur numquam.', 7594.88, 741, 'https://via.placeholder.com/640x480.png/00cc00?text=eos', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(65, 56, 54, 'Face mask', 'Veritatis voluptatem suscipit voluptatem molestias.', 6531.41, 947, 'https://via.placeholder.com/640x480.png/001144?text=fugit', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(66, 56, 54, 'Eye shadow', 'Id quia nisi reprehenderit qui molestias dolor.', 9583.88, 136, 'https://via.placeholder.com/640x480.png/00eedd?text=aut', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(67, 57, 54, 'make-up products ', 'Et voluptatibus maxime rerum aut.', 5290.85, 390, 'https://via.placeholder.com/640x480.png/006688?text=ad', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(68, 54, 54, 'Face mask', 'Quis ut culpa consequatur.', 7393.45, 948, 'https://via.placeholder.com/640x480.png/0055cc?text=rerum', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(69, 56, 54, 'Face mask', 'Eius deserunt est nobis sed.', 46.61, 127, 'https://via.placeholder.com/640x480.png/007722?text=sit', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(70, 54, 54, 'Soap ', 'Consectetur recusandae quae dolorum nihil sit cum eius.', 8295.31, 6, 'https://via.placeholder.com/640x480.png/00aa88?text=eos', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(71, 57, 54, ' Hair relaxer', 'Nostrum voluptate sed quis molestias veritatis.', 1051.21, 53, 'https://via.placeholder.com/640x480.png/003333?text=temporibus', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(72, 57, 54, 'Eye liner', 'Qui iste pariatur deleniti optio corporis.', 7359.42, 836, 'https://via.placeholder.com/640x480.png/00cccc?text=et', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(73, 57, 54, 'Nail bleach', 'Eum ducimus rerum provident qui architecto quis voluptas.', 7572.82, 95, 'https://via.placeholder.com/640x480.png/0033cc?text=aut', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(74, 54, 54, 'make-up products ', 'Ea quos harum quod dicta porro vel rerum.', 9721.68, 109, 'https://via.placeholder.com/640x480.png/007744?text=dolore', '2025-03-16 12:14:50', '2025-03-16 12:14:50'),
(75, 57, 54, 'Concealer', 'Inventore rem aliquam ut non ad ab.', 38.44, 604, 'https://via.placeholder.com/640x480.png/008888?text=et', '2025-03-16 12:14:50', '2025-03-16 12:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `otp`, `image`, `created_at`, `updated_at`) VALUES
(54, 'ABU', 'LABIB', 'siddiq1907108@stud.kuet.ac.bd', '01720843651', 'Islamia College Road', '$2y$10$lop.JUP4R32yzS4ejSg7beyoVIqk4Gbpekdxw3jZA2e5DIFjQhqfq', '0', NULL, '2025-03-12 12:27:39', '2025-03-12 12:27:39'),
(55, 'SHEIKH', 'LABIB', 'labib1907108@gmail.com', '01720843651', 'Khulna', '$2y$10$3mBYGCfhuJ8ioT9skQ0.U.KU.rs60.LiAWwmtbklwDPQJs8cYPwQ6', '0', NULL, '2025-03-12 12:29:47', '2025-03-22 15:23:32'),
(56, 'BACKKAR', 'SIDDIQ', 'sheikhabubackkar@gmail.com', '01720843651', 'Khulna', '$2y$10$mlFFKtRdAkmRj2b0TFA6deG91gTD7/53g92bpSjuRDY9z4.ZcE3gy', '0', NULL, '2025-03-12 12:32:23', '2025-03-12 12:32:23'),
(57, 'SHEIKH ABU BACKKAR', 'SIDDIQ', 'abubuckkersiddikh@gmail.com', '01720843651', 'Khulna', '$2y$10$PGMhCDWRWE6Cf.ElJvDmMuG1vW12QYV6x6wYurr96aykTmv0cYtMm', '0', NULL, '2025-03-12 12:35:14', '2025-03-12 12:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_products_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_products_product_id_foreign` (`product_id`),
  ADD KEY `invoice_products_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD CONSTRAINT `invoice_products_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
