-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 07:05 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ortizclinic`
--
CREATE DATABASE IF NOT EXISTS `ortizclinic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ortizclinic`;

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

DROP TABLE IF EXISTS `audits`;
CREATE TABLE IF NOT EXISTS `audits` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `audits`
--

TRUNCATE TABLE `audits`;
--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-10 19:41:17', '2019-09-10 19:41:17'),
(2, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-11 03:41:17\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-10 19:41:18', '2019-09-10 19:41:18'),
(3, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 05:43:48', '2019-09-12 05:43:48'),
(4, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 05:43:55', '2019-09-12 05:43:55'),
(5, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-12 13:43:55\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 05:43:56', '2019-09-12 05:43:56'),
(6, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 21:29:13', '2019-09-12 21:29:13'),
(7, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-11 03:41:17\"}', '{\"last_login_at\":\"2019-09-13 05:30:23\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 21:30:23', '2019-09-12 21:30:23'),
(8, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 22:24:58', '2019-09-12 22:24:58'),
(10, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 5, '[]', '{\"first_name\":\"Jaypee\",\"last_name\":\"Dala\",\"email\":\"jaypeedala31@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"3ba1fbe3-2036-44b1-a5d5-d68dcdeb3858\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 22:25:52', '2019-09-12 22:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `branches`
--

TRUNCATE TABLE `branches`;
--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `contact_number`, `tel_number`, `location`, `city`, `barangay`, `province`, `country`, `address_line_1`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makati Branch', '(0929) 533-4012', '(02) 546-7861', NULL, 'Makati', 'Palanan', 'Metro Manila', 'philippines', '21 Sen Gil Puyat Ave.', 1, '2019-09-10 23:53:56', '2019-09-11 14:37:47', NULL),
(2, 'Laguna Branch', '(0947) 977-5988', NULL, NULL, 'Calamba', 'Uno Crossing', 'Laguna', 'philippines', 'G/F Alcasid Realty Bldg.', 1, '2019-09-11 05:29:44', '2019-09-11 05:29:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_service`
--

DROP TABLE IF EXISTS `branch_service`;
CREATE TABLE IF NOT EXISTS `branch_service` (
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  KEY `branches_services_branches_id_foreign` (`branch_id`),
  KEY `branches_services_services_id_foreign` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `branch_service`
--

TRUNCATE TABLE `branch_service`;
--
-- Dumping data for table `branch_service`
--

INSERT INTO `branch_service` (`branch_id`, `service_id`) VALUES
(2, 2),
(1, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `cache`
--

TRUNCATE TABLE `cache`;
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Skin test', 'This is an example of Skin category.', 1, '2019-09-12 04:58:50', '2019-09-12 05:14:38', NULL),
(2, 1, 'Capsules', 'Capsule Test', 1, '2019-09-12 21:30:53', '2019-09-12 21:30:53', NULL),
(3, 1, 'Beverages', 'Test', 1, '2019-09-12 21:31:09', '2019-09-12 21:31:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  KEY `category_product_category_id_foreign` (`category_id`),
  KEY `category_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `category_product`
--

TRUNCATE TABLE `category_product`;
--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `civil_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagibig` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philhealth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hired_at` date DEFAULT NULL,
  `date_resigned` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_user_id_branch_id_index` (`user_id`,`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `employees`
--

TRUNCATE TABLE `employees`;
-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `jobs`
--

TRUNCATE TABLE `jobs`;
-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_03_144628_create_permission_tables', 1),
(4, '2017_09_11_174816_create_social_accounts_table', 1),
(5, '2017_09_26_140332_create_cache_table', 1),
(6, '2017_09_26_140528_create_sessions_table', 1),
(7, '2017_09_26_140609_create_jobs_table', 1),
(8, '2018_04_08_033256_create_password_histories_table', 1),
(9, '2019_03_26_000344_create_audits_table', 1),
(10, '2019_09_11_022242_create_table_branch', 1),
(11, '2019_09_11_023813_create_table_services', 1),
(12, '2019_09_11_025513_create_table_employees', 1),
(13, '2019_09_11_065630_add_table_columns_branch_1', 2),
(14, '2019_09_11_074419_create_table_provinces', 3),
(15, '2019_09_11_090541_create_table_branches_services', 4),
(16, '2019_09_11_120420_add_table_columns_services_1', 5),
(17, '2019_09_12_060233_add_table_column_service_2', 6),
(18, '2019_09_12_062159_create_table_categories', 6),
(19, '2019_09_12_062216_create_table_products', 6),
(20, '2019_09_12_131825_create_table_category_product', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `model_has_permissions`
--

TRUNCATE TABLE `model_has_permissions`;
-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `model_has_roles`
--

TRUNCATE TABLE `model_has_roles`;
--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Auth\\User', 1),
(2, 'App\\Models\\Auth\\User', 2),
(3, 'App\\Models\\Auth\\User', 3),
(3, 'App\\Models\\Auth\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_histories`
--

DROP TABLE IF EXISTS `password_histories`;
CREATE TABLE IF NOT EXISTS `password_histories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_histories_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `password_histories`
--

TRUNCATE TABLE `password_histories`;
--
-- Dumping data for table `password_histories`
--

INSERT INTO `password_histories` (`id`, `user_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, '$2y$10$EfdaSZ.b0WM5IfL..a1Xze2xTFQXCwo//ESAfE0.DD8nE0mpcRRrG', '2019-09-10 19:41:11', '2019-09-10 19:41:11'),
(2, 2, '$2y$10$ZZIrsMyVpkwtMC5vTcY9vuXZ75VuvyyOsI2ERzXtpd8aGnwnRSKZi', '2019-09-10 19:41:11', '2019-09-10 19:41:11'),
(3, 3, '$2y$10$ZiDma9oVrV739D4dSxj5vuIl7LoA/FtwgUwezjoO.fD6YuAdxD8Ym', '2019-09-10 19:41:11', '2019-09-10 19:41:11'),
(5, 5, '$2y$10$yVtvW4Z1PS0ozW0tXlngBuTj7WsVHYR/tBgqtIoafcfmtvnbXSTuu', '2019-09-12 22:25:52', '2019-09-12 22:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `permissions`
--

TRUNCATE TABLE `permissions`;
--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view backend', 'web', '2019-09-10 19:41:11', '2019-09-10 19:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double DEFAULT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `price`, `unit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Adan Genesis Package', 'Adan Genesis Package\r\nPhp5K++ \r\n\r\nNo Description yet!\r\n\r\nyet 1', 5000, 'package', 1, '2019-09-12 02:26:57', '2019-09-12 05:16:51', NULL),
(2, 1, 'Test', '12312', 123, 'kg', 1, '2019-09-12 21:45:10', '2019-09-12 21:45:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `provinces`
--

TRUNCATE TABLE `provinces`;
--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abra', 1, NULL, NULL, NULL),
(2, 'Agusan del Norte', 1, NULL, NULL, NULL),
(3, 'Agusan del Sur', 1, NULL, NULL, NULL),
(4, 'Aklan', 1, NULL, NULL, NULL),
(5, 'Albay', 1, NULL, NULL, NULL),
(6, 'Antique', 1, NULL, NULL, NULL),
(7, 'Apayao', 1, NULL, NULL, NULL),
(8, 'Aurora', 1, NULL, NULL, NULL),
(9, 'Basilan', 1, NULL, NULL, NULL),
(10, 'Bataan', 1, NULL, NULL, NULL),
(11, 'Batanes', 1, NULL, NULL, NULL),
(12, 'Batangas', 1, NULL, NULL, NULL),
(13, 'Benguet', 1, NULL, NULL, NULL),
(14, 'Biliran', 1, NULL, NULL, NULL),
(15, 'Bohol', 1, NULL, NULL, NULL),
(16, 'Bukidnon', 1, NULL, NULL, NULL),
(17, 'Bulacan', 1, NULL, NULL, NULL),
(18, 'Cagayan', 1, NULL, NULL, NULL),
(19, 'Camarines Norte', 1, NULL, NULL, NULL),
(20, 'Camarines Sur', 1, NULL, NULL, NULL),
(21, 'Camiguin', 1, NULL, NULL, NULL),
(22, 'Capiz', 1, NULL, NULL, NULL),
(23, 'Catanduanes', 1, NULL, NULL, NULL),
(24, 'Cavite', 1, NULL, NULL, NULL),
(25, 'Cebu', 1, NULL, NULL, NULL),
(26, 'Compostela Valley', 1, NULL, NULL, NULL),
(27, 'Cotabato', 1, NULL, NULL, NULL),
(28, 'Davao del Norte', 1, NULL, NULL, NULL),
(29, 'Davao del Sur', 1, NULL, NULL, NULL),
(30, 'Davao Oriental', 1, NULL, NULL, NULL),
(31, 'Eastern Samar', 1, NULL, NULL, NULL),
(32, 'Guimaras', 1, NULL, NULL, NULL),
(33, 'Ifugao', 1, NULL, NULL, NULL),
(34, 'Ilocos Norte', 1, NULL, NULL, NULL),
(35, 'Ilocos Sur', 1, NULL, NULL, NULL),
(36, 'Iloilo', 1, NULL, NULL, NULL),
(37, 'Isabela', 1, NULL, NULL, NULL),
(38, 'Kalinga', 1, NULL, NULL, NULL),
(39, 'La Union', 1, NULL, NULL, NULL),
(40, 'Laguna', 1, NULL, NULL, NULL),
(41, 'Lanao del Norte', 1, NULL, NULL, NULL),
(42, 'Lanao del Sur', 1, NULL, NULL, NULL),
(43, 'Leyte', 1, NULL, NULL, NULL),
(44, 'Maguindanao', 1, NULL, NULL, NULL),
(45, 'Marinduque', 1, NULL, NULL, NULL),
(46, 'Masbate', 1, NULL, NULL, NULL),
(47, 'Metro Manila', 1, NULL, NULL, NULL),
(48, 'Misamis Occidental', 1, NULL, NULL, NULL),
(49, 'Misamis Oriental', 1, NULL, NULL, NULL),
(50, 'Mountain Province', 1, NULL, NULL, NULL),
(51, 'Negros Occidental', 1, NULL, NULL, NULL),
(52, 'Negros Oriental', 1, NULL, NULL, NULL),
(53, 'Northern Samar', 1, NULL, NULL, NULL),
(54, 'Nueva Ecija', 1, NULL, NULL, NULL),
(55, 'Nueva Vizcaya', 1, NULL, NULL, NULL),
(56, 'Occidental Mindoro', 1, NULL, NULL, NULL),
(57, 'Oriental Mindoro', 1, NULL, NULL, NULL),
(58, 'Palawan', 1, NULL, NULL, NULL),
(59, 'Pampanga', 1, NULL, NULL, NULL),
(60, 'Pangasinan', 1, NULL, NULL, NULL),
(61, 'Quezon', 1, NULL, NULL, NULL),
(62, 'Quirino', 1, NULL, NULL, NULL),
(63, 'Rizal', 1, NULL, NULL, NULL),
(64, 'Romblon', 1, NULL, NULL, NULL),
(65, 'Samar', 1, NULL, NULL, NULL),
(66, 'Sarangani', 1, NULL, NULL, NULL),
(67, 'Siquijor', 1, NULL, NULL, NULL),
(68, 'Sorsogon', 1, NULL, NULL, NULL),
(69, 'South Cotabato', 1, NULL, NULL, NULL),
(70, 'Southern Leyte', 1, NULL, NULL, NULL),
(71, 'Sultan Kudarat', 1, NULL, NULL, NULL),
(72, 'Sulu', 1, NULL, NULL, NULL),
(73, 'Surigao del Norte', 1, NULL, NULL, NULL),
(74, 'Surigao del Sur', 1, NULL, NULL, NULL),
(75, 'Tarlac', 1, NULL, NULL, NULL),
(76, 'Tawi-Tawi', 1, NULL, NULL, NULL),
(77, 'Zambales', 1, NULL, NULL, NULL),
(78, 'Zamboanga del Norte', 1, NULL, NULL, NULL),
(79, 'Zamboanga del Sur', 1, NULL, NULL, NULL),
(80, 'Zamboanga Sibugay', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `roles`
--

TRUNCATE TABLE `roles`;
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2019-09-10 19:41:11', '2019-09-10 19:41:11'),
(2, 'employee', 'web', '2019-09-10 19:41:11', '2019-09-10 19:41:11'),
(3, 'user', 'web', '2019-09-10 19:41:11', '2019-09-10 19:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `role_has_permissions`
--

TRUNCATE TABLE `role_has_permissions`;
--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `services`
--

TRUNCATE TABLE `services`;
--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `price`, `unit`, `description`, `filename`, `location`, `type`, `size`, `hash`, `ip_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Wartz Removal', 999, NULL, 'The principle of warts removal by electrocautery, which utilize electricity to generate heat thru the needle, that touches the verrucous skin lesions. The verruca will burn and carbonized. Electrocautery can also be used to remove other growths on your skin including ano-genital areas.', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-09-11 04:48:20', '2019-09-11 14:39:32', NULL),
(2, 1, 'Omega Light', 299, NULL, 'P299 / per 15 mins \r\n\r\nIs a non-surgical skin renewal machine that reverses the signs of ageing by utilizing the proven healing power of light. Suitable for skin healing, wrinkle removal, scar reduction, acne treatment and more. It contains four different colored therapy lights that emits different wavelength of photo energy, combined for treatment.', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-09-11 04:57:34', '2019-09-11 15:41:47', NULL),
(3, 1, 'Diamond Peel', 499, NULL, 'P499.00/AREA \r\n\r\nThe diamond peel process will also minimize the appearance of acne scars,\r\nstretch marks, and pigmentations. Removes blackheads. The pores are also tightened and\r\nblackheads will be removed. Improves skin conditions.', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-09-11 05:32:35', '2019-09-11 05:32:35', NULL),
(4, 1, 'CO2 Fractional Laser', 3500, 'session', 'P3,500/Session \r\n\r\nIs a laser technology to help restore your skin to its original, perfect texture and achieves smoother, fresher, younger looking skin, improved tone and texture, smaller pores, erasing of unwanted brown spots, acne scars, and surgical scars, and reduces fine lines. It has longer downtime, but optimum results.', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-09-11 22:00:09', '2019-09-11 23:33:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `sessions`
--

TRUNCATE TABLE `sessions`;
-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `social_accounts`
--

TRUNCATE TABLE `social_accounts`;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `last_login_at`, `last_login_ip`, `to_be_logged_out`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9581aa4f-4782-45de-bfcf-68e5ad42edaa', 'Admin', 'Istrator', 'admin@admin.com', 'gravatar', NULL, '$2y$10$EfdaSZ.b0WM5IfL..a1Xze2xTFQXCwo//ESAfE0.DD8nE0mpcRRrG', NULL, 1, 'f38ac6e17991c4f367b624ba5140597e', 1, 'America/New_York', '2019-09-12 21:30:23', '::1', 0, 'W0yXqqDgFdn3ic9N3OjsnVMAvDQ58gIK47TNJ959OVtwLOIVWJ1oQunNBfod', '2019-09-10 19:41:11', '2019-09-12 21:30:23', NULL),
(2, '6446f4c3-6d41-4c01-954a-2e191ed38305', 'Backend', 'User', 'executive@executive.com', 'gravatar', NULL, '$2y$10$ZZIrsMyVpkwtMC5vTcY9vuXZ75VuvyyOsI2ERzXtpd8aGnwnRSKZi', NULL, 1, 'e68b83568a9fa0fa75cf0c85e0821dec', 1, NULL, NULL, NULL, 0, NULL, '2019-09-10 19:41:11', '2019-09-10 19:41:11', NULL),
(3, '246cb91a-669e-4f1e-a586-15972aa6a06e', 'Default', 'User', 'user@user.com', 'gravatar', NULL, '$2y$10$ZiDma9oVrV739D4dSxj5vuIl7LoA/FtwgUwezjoO.fD6YuAdxD8Ym', NULL, 1, 'da9fdc3b605e40dee9dfa7eeb602d183', 1, 'America/New_York', '2019-09-12 05:43:55', '::1', 0, 'swD1fdPdZOZnQECCeciClXoFuxiaQZhYUsWXWyo842lcxN2Qn6FIGCS7pgPC', '2019-09-10 19:41:11', '2019-09-12 05:43:56', NULL),
(5, '3ba1fbe3-2036-44b1-a5d5-d68dcdeb3858', 'Jaypee', 'Dala', 'jaypeedala31@gmail.com', 'gravatar', NULL, '$2y$10$yVtvW4Z1PS0ozW0tXlngBuTj7WsVHYR/tBgqtIoafcfmtvnbXSTuu', NULL, 1, '0f1fa4380c7aa43ce94ece0257c318b1', 1, NULL, NULL, NULL, 0, NULL, '2019-09-12 22:25:52', '2019-09-12 22:25:52', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch_service`
--
ALTER TABLE `branch_service`
  ADD CONSTRAINT `branches_services_branches_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `branches_services_services_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_histories`
--
ALTER TABLE `password_histories`
  ADD CONSTRAINT `password_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
