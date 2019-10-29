-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 07:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

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
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 5, '[]', '{\"first_name\":\"Jaypee\",\"last_name\":\"Dala\",\"email\":\"jaypeedala31@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"3ba1fbe3-2036-44b1-a5d5-d68dcdeb3858\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', NULL, '2019-09-12 22:25:52', '2019-09-12 22:25:52'),
(11, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-13 05:30:23\"}', '{\"last_login_at\":\"2019-09-16 13:15:50\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:15:51', '2019-09-16 05:15:51'),
(12, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:32:19', '2019-09-16 05:32:19'),
(13, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '{\"last_login_at\":\"2019-09-12 13:43:55\"}', '{\"last_login_at\":\"2019-09-16 13:32:41\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:32:42', '2019-09-16 05:32:42'),
(14, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:33:01', '2019-09-16 05:33:01'),
(15, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 6, '[]', '{\"first_name\":\"test\",\"last_name\":\"test\",\"email\":\"test@test.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"1156efce-521f-4e1d-a73f-40fb08e434db\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:35:31', '2019-09-16 05:35:31'),
(16, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-16 13:15:50\"}', '{\"last_login_at\":\"2019-09-16 13:36:21\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:36:22', '2019-09-16 05:36:22'),
(17, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:40:36', '2019-09-16 05:40:36'),
(18, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '{\"last_login_at\":\"2019-09-16 13:32:41\"}', '{\"last_login_at\":\"2019-09-16 13:41:00\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:41:00', '2019-09-16 05:41:00'),
(19, 'App\\Models\\Auth\\User', 3, 'updated', 'App\\Models\\Auth\\User', 3, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:41:49', '2019-09-16 05:41:49'),
(20, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-16 13:36:21\"}', '{\"last_login_at\":\"2019-09-16 13:42:01\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-16 05:42:01', '2019-09-16 05:42:01'),
(21, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 5, '{\"first_name\":\"Jaypee\",\"last_name\":\"Dala\",\"email\":\"jaypeedala31@gmail.com\"}', '{\"first_name\":\"Daryl paul\",\"last_name\":\"Cinco\",\"email\":\"darylcinco02@gmail.com\"}', 'http://localhost/ortiz-clinic/public/admin/auth/user/5', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 03:01:55', '2019-09-18 03:01:55'),
(22, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:20:18', '2019-09-18 04:20:18'),
(23, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 7, '[]', '{\"first_name\":\"Ryan Jason\",\"last_name\":\"Lagradilla\",\"email\":\"rlagradilla77@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"ad65a590-0cff-4cbc-ba7d-6976fc4119af\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:21:36', '2019-09-18 04:21:36'),
(24, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:22:16', '2019-09-18 04:22:16'),
(25, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-18 12:22:16\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:22:17', '2019-09-18 04:22:17'),
(26, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:22:30', '2019-09-18 04:22:30'),
(27, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-16 13:42:01\"}', '{\"last_login_at\":\"2019-09-18 12:22:42\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:22:43', '2019-09-18 04:22:43'),
(28, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:28:16', '2019-09-18 04:28:16'),
(29, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-09-18 12:22:16\"}', '{\"last_login_at\":\"2019-09-18 12:28:49\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-18 04:28:51', '2019-09-18 04:28:51'),
(30, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 05:04:37', '2019-09-20 05:04:37'),
(31, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-09-18 12:28:49\"}', '{\"last_login_at\":\"2019-09-20 15:12:13\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 07:12:15', '2019-09-20 07:12:15'),
(32, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 07:14:07', '2019-09-20 07:14:07'),
(33, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-18 12:22:42\"}', '{\"last_login_at\":\"2019-09-20 15:14:23\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 07:14:23', '2019-09-20 07:14:23'),
(34, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 07:22:43', '2019-09-20 07:22:43'),
(35, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-20 15:14:23\"}', '{\"last_login_at\":\"2019-09-20 15:22:54\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 07:22:55', '2019-09-20 07:22:55'),
(36, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-20 07:24:05', '2019-09-20 07:24:05'),
(37, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-20 15:22:54\"}', '{\"last_login_at\":\"2019-09-27 14:51:03\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:51:06', '2019-09-27 06:51:06'),
(38, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:52:05', '2019-09-27 06:52:05'),
(39, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:52:43', '2019-09-27 06:52:43'),
(40, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-27 14:52:43\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:52:51', '2019-09-27 06:52:51'),
(41, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:53:45', '2019-09-27 06:53:45'),
(42, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 14:51:03\"}', '{\"last_login_at\":\"2019-09-27 14:54:44\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:54:45', '2019-09-27 06:54:45'),
(43, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:55:39', '2019-09-27 06:55:39'),
(44, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 8, '[]', '{\"first_name\":\"Alecz\",\"last_name\":\"Dhea\",\"email\":\"aleczdhea@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"485da3da-ce43-4e81-b0e9-74003337549f\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:58:30', '2019-09-27 06:58:30'),
(45, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 14:54:44\"}', '{\"last_login_at\":\"2019-09-27 14:58:53\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 06:58:53', '2019-09-27 06:58:53'),
(46, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:00:42', '2019-09-27 07:00:42'),
(47, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '{\"last_login_at\":\"2019-09-27 14:52:43\"}', '{\"last_login_at\":\"2019-09-27 15:00:55\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:00:55', '2019-09-27 07:00:55'),
(48, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:01:23', '2019-09-27 07:01:23'),
(49, 'App\\Models\\Auth\\User', 8, 'updated', 'App\\Models\\Auth\\User', 8, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:02:41', '2019-09-27 07:02:41'),
(50, 'App\\Models\\Auth\\User', 8, 'updated', 'App\\Models\\Auth\\User', 8, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-27 15:02:41\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:02:41', '2019-09-27 07:02:41'),
(51, 'App\\Models\\Auth\\User', 8, 'updated', 'App\\Models\\Auth\\User', 8, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:02:56', '2019-09-27 07:02:56'),
(52, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 14:58:53\"}', '{\"last_login_at\":\"2019-09-27 15:16:06\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:16:07', '2019-09-27 07:16:07'),
(53, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:16:18', '2019-09-27 07:16:18'),
(54, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '{\"last_login_at\":\"2019-09-27 15:00:55\"}', '{\"last_login_at\":\"2019-09-27 15:16:35\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:16:35', '2019-09-27 07:16:35'),
(55, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:16:49', '2019-09-27 07:16:49'),
(56, 'App\\Models\\Auth\\User', 8, 'updated', 'App\\Models\\Auth\\User', 8, '{\"last_login_at\":\"2019-09-27 15:02:41\"}', '{\"last_login_at\":\"2019-09-27 15:17:17\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:17:17', '2019-09-27 07:17:17'),
(57, 'App\\Models\\Auth\\User', 8, 'updated', 'App\\Models\\Auth\\User', 8, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:17:25', '2019-09-27 07:17:25'),
(58, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 15:16:06\"}', '{\"last_login_at\":\"2019-09-27 15:17:49\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:17:49', '2019-09-27 07:17:49'),
(59, 'App\\Models\\Auth\\User', 1, 'created', 'App\\Models\\Auth\\User', 9, '[]', '{\"first_name\":\"Justine\",\"last_name\":\"Saracho\",\"email\":\"justine.saracho0105@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"9153d2a0-4aa5-4419-bcdf-76896b909791\"}', 'http://localhost/ortiz-clinic/public/admin/auth/user', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:19:02', '2019-09-27 07:19:02'),
(60, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:20:15', '2019-09-27 07:20:15'),
(61, 'App\\Models\\Auth\\User', 9, 'updated', 'App\\Models\\Auth\\User', 9, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:20:27', '2019-09-27 07:20:27'),
(62, 'App\\Models\\Auth\\User', 9, 'updated', 'App\\Models\\Auth\\User', 9, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-27 15:20:27\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:20:31', '2019-09-27 07:20:31'),
(63, 'App\\Models\\Auth\\User', 9, 'updated', 'App\\Models\\Auth\\User', 9, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:20:45', '2019-09-27 07:20:45'),
(64, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-09-20 15:12:13\"}', '{\"last_login_at\":\"2019-09-27 15:21:20\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:21:20', '2019-09-27 07:21:20'),
(65, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:22:09', '2019-09-27 07:22:09'),
(66, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 15:17:49\"}', '{\"last_login_at\":\"2019-09-27 15:22:23\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:22:23', '2019-09-27 07:22:23'),
(67, 'App\\Models\\Auth\\User', 1, 'deleted', 'App\\Models\\Auth\\User', 9, '{\"uuid\":\"9153d2a0-4aa5-4419-bcdf-76896b909791\",\"first_name\":\"Justine\",\"last_name\":\"Saracho\",\"email\":\"justine.saracho0105@gmail.com\",\"avatar_type\":\"gravatar\",\"avatar_location\":null,\"password_changed_at\":null,\"active\":1,\"confirmed\":1,\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-27 15:20:27\",\"last_login_ip\":\"::1\",\"to_be_logged_out\":0}', '[]', 'http://localhost/ortiz-clinic/public/admin/auth/user/9', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:22:36', '2019-09-27 07:22:36'),
(68, 'App\\Models\\Auth\\User', 1, 'deleted', 'App\\Models\\Auth\\User', 9, '{\"uuid\":\"9153d2a0-4aa5-4419-bcdf-76896b909791\",\"first_name\":\"Justine\",\"last_name\":\"Saracho\",\"email\":\"justine.saracho0105@gmail.com\",\"avatar_type\":\"gravatar\",\"avatar_location\":null,\"password_changed_at\":null,\"active\":1,\"confirmed\":1,\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-09-27 15:20:27\",\"last_login_ip\":\"::1\",\"to_be_logged_out\":0}', '[]', 'http://localhost/ortiz-clinic/public/admin/auth/user/9/delete', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:22:45', '2019-09-27 07:22:45'),
(69, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:28:35', '2019-09-27 07:28:35'),
(70, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '{\"last_login_at\":\"2019-09-27 15:16:35\"}', '{\"last_login_at\":\"2019-09-27 15:28:49\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:28:49', '2019-09-27 07:28:49'),
(71, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:29:19', '2019-09-27 07:29:19'),
(72, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 15:22:23\"}', '{\"last_login_at\":\"2019-09-27 15:29:26\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:29:26', '2019-09-27 07:29:26'),
(73, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 07:30:34', '2019-09-27 07:30:34'),
(74, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 15:29:26\"}', '{\"last_login_at\":\"2019-09-27 16:01:51\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:01:51', '2019-09-27 08:01:51'),
(75, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:10:56', '2019-09-27 08:10:56'),
(76, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 16:01:51\"}', '{\"last_login_at\":\"2019-09-27 16:11:07\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:11:07', '2019-09-27 08:11:07'),
(77, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:11:36', '2019-09-27 08:11:36'),
(78, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '{\"last_login_at\":\"2019-09-27 15:28:49\"}', '{\"last_login_at\":\"2019-09-27 16:11:47\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:11:48', '2019-09-27 08:11:48'),
(79, 'App\\Models\\Auth\\User', 2, 'updated', 'App\\Models\\Auth\\User', 2, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:11:54', '2019-09-27 08:11:54'),
(80, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-09-27 15:21:20\"}', '{\"last_login_at\":\"2019-09-27 16:12:05\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:12:06', '2019-09-27 08:12:06'),
(81, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:12:11', '2019-09-27 08:12:11'),
(82, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 10, '[]', '{\"first_name\":\"jonathan\",\"last_name\":\"redula\",\"email\":\"jredula@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"8d8ddfde-bd18-4d2b-9c17-8c50ae41dfef\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:13:31', '2019-09-27 08:13:31'),
(83, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 16:11:07\"}', '{\"last_login_at\":\"2019-09-27 16:14:05\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:14:05', '2019-09-27 08:14:05'),
(84, 'App\\Models\\Auth\\User', 1, 'created', 'App\\Models\\Auth\\User', 11, '[]', '{\"first_name\":\"ryan\",\"last_name\":\"lagradilla\",\"email\":\"rlagradilla@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"3f151607-883f-4d41-a8db-d5b60682317a\"}', 'http://localhost/ortiz-clinic/public/admin/auth/user', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:15:09', '2019-09-27 08:15:09'),
(85, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_name\":\"Istrator\"}', '{\"last_name\":\"Istrator123\"}', 'http://localhost/ortiz-clinic/public/admin/auth/user/1', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:15:36', '2019-09-27 08:15:36'),
(86, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:16:12', '2019-09-27 08:16:12'),
(87, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 16:14:05\"}', '{\"last_login_at\":\"2019-09-27 16:16:19\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:16:20', '2019-09-27 08:16:20'),
(88, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:17:27', '2019-09-27 08:17:27'),
(89, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 16:16:19\"}', '{\"last_login_at\":\"2019-09-27 16:23:29\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:23:29', '2019-09-27 08:23:29'),
(90, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, '2019-09-27 08:24:13', '2019-09-27 08:24:13'),
(91, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-09-27 16:23:29\"}', '{\"last_login_at\":\"2019-10-01 18:28:24\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-01 10:28:26', '2019-10-01 10:28:26'),
(92, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-01 10:29:20', '2019-10-01 10:29:20'),
(93, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-01 18:28:24\"}', '{\"last_login_at\":\"2019-10-01 18:30:32\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-01 10:30:32', '2019-10-01 10:30:32'),
(94, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 05:52:05', '2019-10-10 05:52:05'),
(99, NULL, NULL, 'created', 'App\\Models\\Auth\\User', 16, '[]', '{\"first_name\":\"Angela Paula\",\"last_name\":\"Angeles\",\"email\":\"jaypeedala1999@gmail.com\",\"active\":true,\"confirmed\":false,\"uuid\":\"008c0a3a-7dbf-44b5-bdb1-48e44494a9b3\"}', 'http://localhost/ortiz-clinic/public/register', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:02:25', '2019-10-10 06:02:25'),
(100, NULL, NULL, 'updated', 'App\\Models\\Auth\\User', 16, '{\"confirmed\":0}', '{\"confirmed\":true}', 'http://localhost/ortiz-clinic/public/account/confirm/8c1c6606c55673b1e9a2b1c02a245d3d', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:04:32', '2019-10-10 06:04:32'),
(101, 'App\\Models\\Auth\\User', 16, 'updated', 'App\\Models\\Auth\\User', 16, '[]', '[]', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:05:20', '2019-10-10 06:05:20'),
(102, 'App\\Models\\Auth\\User', 16, 'updated', 'App\\Models\\Auth\\User', 16, '{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}', '{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2019-10-10 14:05:20\",\"last_login_ip\":\"::1\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:05:21', '2019-10-10 06:05:21'),
(103, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-01 18:30:32\"}', '{\"last_login_at\":\"2019-10-10 14:08:33\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:08:33', '2019-10-10 06:08:33'),
(104, 'App\\Models\\Auth\\User', 16, 'updated', 'App\\Models\\Auth\\User', 16, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:18:12', '2019-10-10 06:18:12'),
(105, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-10 14:08:33\"}', '{\"last_login_at\":\"2019-10-10 14:19:47\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:19:48', '2019-10-10 06:19:48'),
(106, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_name\":\"Istrator123\"}', '{\"last_name\":\"Istrator\"}', 'http://localhost/ortiz-clinic/public/admin/auth/user/1', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:22:52', '2019-10-10 06:22:52'),
(107, 'App\\Models\\Auth\\User', 1, 'created', 'App\\Models\\Auth\\User', 17, '[]', '{\"first_name\":\"Admin\",\"last_name\":\"Admin\",\"email\":\"administrator00@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"428aec71-425d-4fe4-bbd5-b8af85659b56\"}', 'http://localhost/ortiz-clinic/public/admin/auth/user', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:26:34', '2019-10-10 06:26:34'),
(108, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:31:15', '2019-10-10 06:31:15'),
(109, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-10 14:19:47\"}', '{\"last_login_at\":\"2019-10-10 14:31:40\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:31:40', '2019-10-10 06:31:40'),
(110, 'App\\Models\\Auth\\User', 1, 'deleted', 'App\\Models\\Auth\\User', 10, '{\"uuid\":\"8d8ddfde-bd18-4d2b-9c17-8c50ae41dfef\",\"first_name\":\"jonathan\",\"last_name\":\"redula\",\"email\":\"jredula@gmail.com\",\"avatar_type\":\"gravatar\",\"avatar_location\":null,\"password_changed_at\":null,\"active\":1,\"confirmed\":1,\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null,\"to_be_logged_out\":0}', '[]', 'http://localhost/ortiz-clinic/public/admin/auth/user/10', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:32:22', '2019-10-10 06:32:22'),
(111, 'App\\Models\\Auth\\User', 1, 'deleted', 'App\\Models\\Auth\\User', 10, '{\"uuid\":\"8d8ddfde-bd18-4d2b-9c17-8c50ae41dfef\",\"first_name\":\"jonathan\",\"last_name\":\"redula\",\"email\":\"jredula@gmail.com\",\"avatar_type\":\"gravatar\",\"avatar_location\":null,\"password_changed_at\":null,\"active\":1,\"confirmed\":1,\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null,\"to_be_logged_out\":0}', '[]', 'http://localhost/ortiz-clinic/public/admin/auth/user/10/delete', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:32:31', '2019-10-10 06:32:31'),
(112, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:33:20', '2019-10-10 06:33:20'),
(113, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-09-27 16:12:05\"}', '{\"last_login_at\":\"2019-10-10 14:34:03\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:34:04', '2019-10-10 06:34:04'),
(114, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 06:38:56', '2019-10-10 06:38:56'),
(115, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-10 14:34:03\"}', '{\"last_login_at\":\"2019-10-10 15:05:30\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 07:05:31', '2019-10-10 07:05:31'),
(116, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 08:44:26', '2019-10-10 08:44:26'),
(117, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-10 14:31:40\"}', '{\"last_login_at\":\"2019-10-10 16:56:58\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 08:56:58', '2019-10-10 08:56:58'),
(118, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', NULL, '2019-10-10 09:03:14', '2019-10-10 09:03:14'),
(119, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-10 16:56:58\"}', '{\"last_login_at\":\"2019-10-17 09:09:38\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 01:09:43', '2019-10-17 01:09:43'),
(120, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"password_changed_at\":null}', '{\"password_changed_at\":\"2019-10-17 09:10:28\"}', 'http://localhost/ortiz-clinic/public/password/expired', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 01:10:29', '2019-10-17 01:10:29'),
(121, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/account', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 01:10:30', '2019-10-17 01:10:30'),
(122, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-17 09:09:38\"}', '{\"last_login_at\":\"2019-10-17 09:10:39\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 01:10:40', '2019-10-17 01:10:40'),
(123, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 04:03:18', '2019-10-17 04:03:18'),
(124, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-10 15:05:30\"}', '{\"last_login_at\":\"2019-10-17 12:04:08\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 04:04:09', '2019-10-17 04:04:09'),
(125, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"password_changed_at\":null}', '{\"password_changed_at\":\"2019-10-17 12:06:22\"}', 'http://localhost/ortiz-clinic/public/password/expired', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 04:06:23', '2019-10-17 04:06:23'),
(126, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/account', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 04:06:24', '2019-10-17 04:06:24'),
(127, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-17 12:04:08\"}', '{\"last_login_at\":\"2019-10-17 12:06:35\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 04:06:39', '2019-10-17 04:06:39'),
(128, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 04:07:32', '2019-10-17 04:07:32'),
(129, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-17 12:06:35\"}', '{\"last_login_at\":\"2019-10-17 14:42:02\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 06:42:03', '2019-10-17 06:42:03'),
(130, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-17 09:10:39\"}', '{\"last_login_at\":\"2019-10-17 14:47:51\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 06:47:52', '2019-10-17 06:47:52'),
(131, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 07:06:33', '2019-10-17 07:06:33'),
(132, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-17 14:47:51\"}', '{\"last_login_at\":\"2019-10-17 15:06:48\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 07:06:48', '2019-10-17 07:06:48'),
(133, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 07:17:57', '2019-10-17 07:17:57'),
(134, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-17 14:42:02\"}', '{\"last_login_at\":\"2019-10-17 16:00:16\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 08:00:17', '2019-10-17 08:00:17'),
(135, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 08:08:14', '2019-10-17 08:08:14'),
(136, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-17 15:06:48\"}', '{\"last_login_at\":\"2019-10-17 16:08:36\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 08:08:37', '2019-10-17 08:08:37'),
(137, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 08:38:27', '2019-10-17 08:38:27');
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(138, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-17 16:00:16\"}', '{\"last_login_at\":\"2019-10-18 07:52:46\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 23:52:48', '2019-10-17 23:52:48'),
(139, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 23:55:39', '2019-10-17 23:55:39'),
(140, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-17 16:08:36\"}', '{\"last_login_at\":\"2019-10-18 07:55:53\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 23:55:53', '2019-10-17 23:55:53'),
(141, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 23:58:43', '2019-10-17 23:58:43'),
(142, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-18 07:52:46\"}', '{\"last_login_at\":\"2019-10-18 07:59:15\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-17 23:59:15', '2019-10-17 23:59:15'),
(143, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-18 00:04:40', '2019-10-18 00:04:40'),
(144, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-18 07:55:53\"}', '{\"last_login_at\":\"2019-10-24 15:57:18\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 07:57:21', '2019-10-24 07:57:21'),
(145, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 08:19:16', '2019-10-24 08:19:16'),
(146, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-18 07:59:15\"}', '{\"last_login_at\":\"2019-10-24 16:19:30\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 08:19:31', '2019-10-24 08:19:31'),
(147, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 08:20:52', '2019-10-24 08:20:52'),
(148, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-24 15:57:18\"}', '{\"last_login_at\":\"2019-10-24 16:21:04\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 08:21:04', '2019-10-24 08:21:04'),
(149, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:08:23', '2019-10-24 09:08:23'),
(150, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-24 16:19:30\"}', '{\"last_login_at\":\"2019-10-24 17:08:44\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:08:45', '2019-10-24 09:08:45'),
(151, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:10:55', '2019-10-24 09:10:55'),
(152, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '{\"last_login_at\":\"2019-10-24 17:08:44\"}', '{\"last_login_at\":\"2019-10-24 17:11:09\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:11:10', '2019-10-24 09:11:10'),
(153, 'App\\Models\\Auth\\User', 6, 'updated', 'App\\Models\\Auth\\User', 6, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:11:49', '2019-10-24 09:11:49'),
(154, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-24 16:21:04\"}', '{\"last_login_at\":\"2019-10-24 17:12:25\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:12:28', '2019-10-24 09:12:28'),
(155, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '[]', '[]', 'http://localhost/ortiz-clinic/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-24 09:12:50', '2019-10-24 09:12:50'),
(156, 'App\\Models\\Auth\\User', 1, 'updated', 'App\\Models\\Auth\\User', 1, '{\"last_login_at\":\"2019-10-24 17:12:25\"}', '{\"last_login_at\":\"2019-10-27 15:44:24\"}', 'http://localhost/ortiz-clinic/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', NULL, '2019-10-27 07:44:26', '2019-10-27 07:44:26');

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
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `branches`
--

TRUNCATE TABLE `branches`;
--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `contact_number`, `tel_number`, `location`, `city`, `barangay`, `province`, `country`, `address_line_1`, `open_time`, `close_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makati Branch', '(0929) 533-4012', '(02) 546-7861', NULL, 'Makati', 'Palanan', 'Metro Manila', 'philippines', '21 Sen Gil Puyat Ave.', NULL, NULL, 1, '2019-09-10 23:53:56', '2019-09-11 14:37:47', NULL),
(2, 'Laguna Branch', '(0947) 977-5988', NULL, NULL, 'Calamba', 'Uno Crossing', 'Laguna', 'philippines', 'G/F Alcasid Realty Bldg.', NULL, NULL, 1, '2019-09-11 05:29:44', '2019-09-11 05:29:44', NULL),
(3, 'Antipolo Branch', '(0915) 610-0663', '(02) 535-0959', NULL, 'Antipolo', 'Brgy. San Roque', 'Rizal', 'philippines', 'Lorez Plaza', NULL, NULL, 1, '2019-09-18 03:14:51', '2019-09-18 03:14:51', NULL),
(4, 'Caloocan Branch', '(0915) 593-5306', '(02) 442-4385', NULL, 'Caloocan', '2nd Ave', 'Metro Manila', 'philippines', 'Unit C15 Jade Tower', NULL, NULL, 1, '2019-09-18 03:18:34', '2019-09-18 03:18:34', NULL),
(5, 'Puregold Cubao (Araneta Center) Branch', '(0921) 519-3724', NULL, NULL, 'Quezon City', 'Cubao', 'Metro Manila', 'philippines', 'Puregold Cubao, 3rd Floor', NULL, NULL, 1, '2019-09-18 03:20:16', '2019-09-18 03:20:16', NULL),
(6, 'Quezon Avenue Branch', '(0916) 280-2145', '(02) 668-4175', NULL, 'Quezon City', 'Brgy. Sta Cruz', 'Metro Manila', 'philippines', 'Ground Floor Cecilleville Building', NULL, NULL, 1, '2019-09-18 03:23:34', '2019-09-18 03:23:34', NULL),
(7, 'P Tuazon Cubao Branch', '(0906) 235-3281', '(02) 332-0396', NULL, 'Quezon City', 'Brgy. Pinagkaisa', 'Metro Manila', 'philippines', 'Metrolane Complex, 20th Avenue cor P Tuazon', NULL, NULL, 1, '2019-09-18 03:26:18', '2019-09-18 03:26:18', NULL),
(8, 'FEU TECH', '09231312311', '434989', NULL, 'Manila', '242', 'Metro Manila', 'philippines', 'Nicanor Reyes vghf', NULL, NULL, 1, '2019-09-27 07:23:46', '2019-09-27 07:24:27', '2019-09-27 07:24:27');

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
(2, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(2, 5),
(4, 5),
(6, 5),
(7, 5),
(4, 6),
(6, 6),
(1, 8),
(4, 8),
(6, 8),
(7, 8),
(1, 28),
(3, 28),
(4, 28),
(5, 28),
(6, 28),
(7, 28),
(1, 27),
(3, 27),
(4, 27),
(5, 27),
(6, 27),
(7, 27),
(1, 26),
(2, 26),
(3, 26),
(4, 26),
(5, 26),
(6, 26),
(7, 26),
(3, 25),
(4, 25),
(5, 25),
(6, 25),
(7, 25),
(1, 24),
(2, 24),
(3, 24),
(4, 24),
(5, 24),
(6, 24),
(7, 24),
(1, 23),
(2, 23),
(4, 23),
(5, 23),
(6, 23),
(7, 23),
(1, 22),
(2, 22),
(3, 22),
(4, 22),
(5, 22),
(6, 22),
(7, 22),
(1, 21),
(2, 21),
(3, 21),
(4, 21),
(5, 21),
(6, 21),
(7, 21),
(1, 20),
(2, 20),
(3, 20),
(4, 20),
(5, 20),
(6, 20),
(7, 20),
(1, 19),
(2, 19),
(3, 19),
(4, 19),
(5, 19),
(6, 19),
(7, 19),
(6, 18),
(7, 18),
(1, 17),
(2, 17),
(3, 17),
(4, 17),
(5, 17),
(6, 17),
(7, 17),
(2, 28),
(1, 18),
(3, 18),
(4, 18),
(5, 18),
(2, 18),
(1, 16),
(3, 16),
(4, 16),
(5, 16),
(6, 16),
(7, 16),
(1, 15),
(2, 15),
(3, 15),
(4, 15),
(5, 15),
(6, 15),
(7, 15),
(1, 14),
(2, 14),
(3, 14),
(4, 14),
(5, 14),
(6, 14),
(7, 14),
(1, 13),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(6, 13),
(7, 13),
(1, 12),
(2, 12),
(3, 12),
(4, 12),
(5, 12),
(6, 12),
(7, 12),
(1, 11),
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(6, 11),
(7, 11),
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(2, 8),
(3, 8),
(5, 8),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(1, 6),
(2, 6),
(3, 6),
(5, 6),
(7, 6),
(1, 5),
(3, 5),
(5, 5),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1);

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
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 1, 'Beverages', 'Test', 1, '2019-09-12 21:31:09', '2019-09-12 21:31:09', NULL),
(4, 1, 'sampkeadada', 'ajdkjkaljld', 1, '2019-09-27 07:26:01', '2019-09-27 07:26:26', '2019-09-27 07:26:26');

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
(3, 2),
(1, 3),
(2, 4),
(1, 5),
(2, 5),
(1, 6),
(2, 6),
(1, 7),
(2, 7),
(1, 8),
(2, 8),
(2, 9),
(1, 10),
(2, 10),
(1, 11),
(1, 12),
(2, 12),
(1, 13),
(2, 13),
(1, 14),
(2, 14),
(3, 14),
(1, 15),
(2, 15),
(1, 16),
(2, 16),
(1, 17),
(2, 17),
(1, 18),
(2, 18),
(1, 19),
(2, 19),
(1, 20),
(2, 20),
(1, 21),
(2, 21),
(3, 21);

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
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `place_of_birth` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `status` tinyint(4) DEFAULT 1,
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2019_09_12_131825_create_table_category_product', 7),
(21, '2019_09_26_180954_create_table_orders', 8),
(22, '2019_09_26_183940_create_table_order_product', 8),
(23, '2019_09_26_184927_create_table_reservations', 8),
(24, '2019_09_26_185844_create_table_rooms', 8),
(25, '2019_09_26_191540_add_table_column_from_order', 8),
(26, '2019_09_26_222001_add_table_column_from_order_product', 8),
(27, '2019_09_27_145947_add_table_column_from_products', 8),
(28, '2019_09_27_150127_add_table_column_from_services', 8),
(29, '2019_10_08_181925_add_table_column_from_reservation', 9),
(30, '2019_10_08_201242_add_table_column_from_branches', 9),
(31, '2019_10_10_081516_add_table_column_from_reservations', 9),
(32, '2019_10_10_081631_add_table_column_from_services', 9),
(33, '2019_10_16_160842_create_table_reservation_service', 10),
(34, '2019_10_17_125642_add_table_column_from_reservations', 11),
(35, '2019_10_24_104015_create_table_from_symptoms', 11),
(36, '2019_10_24_110759_create_table_from_service_symptom', 11);

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
(1, 'App\\Models\\Auth\\User', 17),
(2, 'App\\Models\\Auth\\User', 2),
(2, 'App\\Models\\Auth\\User', 11),
(3, 'App\\Models\\Auth\\User', 3),
(3, 'App\\Models\\Auth\\User', 5),
(3, 'App\\Models\\Auth\\User', 6),
(3, 'App\\Models\\Auth\\User', 7),
(3, 'App\\Models\\Auth\\User', 8),
(3, 'App\\Models\\Auth\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_orders` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `payment_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `orders`
--

TRUNCATE TABLE `orders`;
--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `reference_number`, `total_orders`, `total_amount`, `payment_location`, `payment_status`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 16, 'R7YTFISGQ5HQ6VUU9LLA', 1, 15000, 'uploads/order/0VXoivT8BfPoFGPBpegKxUkAsiO0Nu9UL2b1v1qT.png', 2, 1, '2019-10-10 06:06:06', '2019-10-10 06:11:19', NULL),
(2, 6, 'YTM2BIBPR7SDS4VWMHRF', 1, 5000, NULL, 0, 1, '2019-10-17 23:54:56', '2019-10-17 23:54:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  KEY `order_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `order_product`
--

TRUNCATE TABLE `order_product`;
--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 2, 12, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, 5, '$2y$10$yVtvW4Z1PS0ozW0tXlngBuTj7WsVHYR/tBgqtIoafcfmtvnbXSTuu', '2019-09-12 22:25:52', '2019-09-12 22:25:52'),
(6, 6, '$2y$10$YvpnbUG9VvD0UGBQe59M0uZft.iiFdaKxeu.eQI4b3g4agzcxpee2', '2019-09-16 05:35:31', '2019-09-16 05:35:31'),
(7, 7, '$2y$10$qWnO62nlYnBwYLrhGj7KM.7GQ4qyxIcxTRP5lwaGvHtrOzjNVoRUe', '2019-09-18 04:21:37', '2019-09-18 04:21:37'),
(8, 8, '$2y$10$y4G0Cl42IYvUTMkog9/qI.gXyXt7Muq9xd9S9/8QcFrc6DhDnlFzW', '2019-09-27 06:58:30', '2019-09-27 06:58:30'),
(11, 11, '$2y$10$WrgI76H1lIHxlD1iyBB85O.WUauT3ugEQYJCgxtLpQ18Fbd3RnEf2', '2019-09-27 08:15:09', '2019-09-27 08:15:09'),
(16, 16, '$2y$10$IELbH/ZszphpfclNAU/HbOFGApYNYlrAmBf2z1aFEujtwAQsRY7Pq', '2019-10-10 06:02:25', '2019-10-10 06:02:25'),
(17, 17, '$2y$10$mzfXL86av5JZ/M1T/Q2ROOvVGuePNeZQRydH6PLaMbGukDMoqGLoS', '2019-10-10 06:26:34', '2019-10-10 06:26:34'),
(18, 1, '$2y$10$OyGskctfytX4nWuhlhCTgeaYgOIRNtRiNXJryXrQNS5SEHOwlg9Z2', '2019-10-17 01:10:29', '2019-10-17 01:10:29'),
(19, 6, '$2y$10$fICNtZHJbKmEVvHKzAHSe.SaLlyx3hd6G0CMMSqYeR/iueMOw9ovC', '2019-10-17 04:06:23', '2019-10-17 04:06:23');

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
  `image_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `image_location`, `description`, `price`, `unit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Adan Genesis Package', NULL, 'Adan Genesis Package\r\nPhp5K++ \r\n\r\nNo Description yet!\r\n\r\nyet 1', 5000, 'package', 1, '2019-09-12 02:26:57', '2019-09-12 05:16:51', NULL),
(2, 1, 'Test', NULL, '12312', 123, 'kg', 1, '2019-09-12 21:45:10', '2019-10-17 02:57:17', '2019-10-17 02:57:17'),
(3, 1, 'jweettttttttt', NULL, 'emlsdmlm', 17, '23', 1, '2019-09-27 07:26:56', '2019-09-27 07:27:22', '2019-09-27 07:27:22'),
(4, 1, 'Sample Product', 'uploads/product/HOfTmWSvWBmrVvjYRxDdK45eAR6cp86xux6aV4UJ.jpeg', 'Test', 300, 'kg', 1, '2019-10-10 05:49:29', '2019-10-17 02:57:10', '2019-10-17 02:57:10'),
(5, 1, 'Post Korean BB Glow', 'uploads/product/IqnLeHAoCERx7oJd6ZWhF0RMQPvHgJCRDSUY2MDy.jpeg', 'Foam Wash 1000\r\nSun Block 500\r\nVitamin C Cream 500\r\nSkin Glow 500\r\nMiracle Serum 1000\r\nCollagen Elastin 2800', 6800, 'Package', 1, '2019-10-17 03:03:31', '2019-10-17 03:03:31', NULL),
(6, 1, 'Skin Rejuvenation', 'uploads/product/ICyCK9NK7inQIMtlQ1ggpowqkLYd4FRJ9huFUO7g.jpeg', 'Foam Wash 1000\r\nSun Block 500\r\nSkin Glow 500\r\nCollagen Elastin 2800\r\nMiracle Serum 1500', 6300, 'Package', 1, '2019-10-17 03:06:31', '2019-10-17 03:06:31', NULL),
(7, 1, 'Whitening Treatment Products', 'uploads/product/Fz2m7kTSVuo2cKmGrworQkO3FgbWxB9KoZY6Jhsj.jpeg', 'Glycolic Soap 150\r\nBleaching Mask 1500\r\nMiracle Serum 1500\r\nWhitening Lotion 500\r\nGlow In White 1000', 4650, 'Package', 1, '2019-10-17 03:10:42', '2019-10-17 03:10:42', NULL),
(8, 1, 'Panda Eye (Dark Under Eye)', 'uploads/product/Lnub0UGBVSxdJeVkMbxsLi0VraLTf2VfJ6wXO38r.jpeg', 'Sunblock 500\r\nVitamin C Cream 500\r\nMiracle Serum 1500', 2500, 'Package', 1, '2019-10-17 03:13:48', '2019-10-17 03:13:48', NULL),
(9, 1, 'Collagen Tablets', 'uploads/product/bsT7eK2uMWWbKdpaSIicDVJyJ1exDxOZkX1QLGSB.jpeg', 'For all kinds of skin disorder or repair.', 6000, 'package', 1, '2019-10-17 03:16:21', '2019-10-17 03:16:21', NULL),
(10, 1, 'Dermaroller Treatment / Vampire Procedure', 'uploads/product/Dw1a3EF5eNE0UPx9UwfWW0zonsXDzLfsK7b4URAt.jpeg', 'Foam Wash 1000\r\nSun Block 500\r\nSkin Glow 500\r\nMiracle Serum 1500\r\nCollagen Elastin 2800', 6300, 'Package', 1, '2019-10-17 03:18:36', '2019-10-17 03:18:36', NULL),
(11, 1, 'Underarm Excessive Sweating', 'uploads/product/MHUq1p6EsPXOMjfPNiQ5I6nOSjQktGoKr3E56ADg.jpeg', 'Anti perspirant.', 500, '1', 1, '2019-10-17 03:21:29', '2019-10-17 03:21:29', NULL),
(12, 1, 'Anti-Dandruff', 'uploads/product/Yb9DLiBBJCT1okAVeiGpeKLOcjmD7roZPZH4M7q5.jpeg', 'Baby Fresh Oil 1000\r\nMiracle Serum 1000', 2500, '2', 1, '2019-10-17 03:23:50', '2019-10-17 03:23:50', NULL),
(13, 1, 'Itchiness', 'uploads/product/b9ldGhgoFvsQ8DsdL1Dxkqn2Kv3uQExvOli0rMxh.jpeg', 'T3 Soap/Hypo Soap 150\r\nBeta + Ery 500\r\nHydrocort 500\r\nMupirocin 500\r\nTriamcinolone 500\r\nDexa Lotion 500', 2650, 'Package', 1, '2019-10-17 03:30:03', '2019-10-17 03:30:03', NULL),
(14, 1, 'Warts/ Syringoma / Mole / Fat Deposit', 'uploads/product/3XZrCJDUzhZsDWqeLRuHzLNuENHJLWes87uaDHC2.jpeg', 'T3 Soap 150\r\nSun Block 500\r\nBeta + Ery 500\r\nSkin Glow 500\r\nMiracle Serum 1500', 3150, 'Package', 1, '2019-10-17 03:33:51', '2019-10-17 03:33:51', NULL),
(15, 1, 'Acne Kit', 'uploads/product/nZeQXWUvrgApfc3s0fIi21UbE5IuimQ7YVg9p9w8.jpeg', 'Foam Wash 1000\r\nCleanser 500\r\nTreatment Toner 500\r\nAnti-Acne Solution 500\r\nAnti-Acne Cream 500\r\nor\r\nPink Lotion 500\r\nMiracle Serum 1500', 5000, 'Package', 1, '2019-10-17 03:37:01', '2019-10-17 03:37:01', NULL),
(16, 1, 'Post Fraxel/NDYAG/Stretchmark/Acne Scar', 'uploads/product/FbC0CJxB1ih6WT4TXoMBvZEmGlDEJybCu21gPWKp.jpeg', 'Foam Wash 1000\r\nSunblock 500\r\nSkin Rejuvenation 500\r\nSkin Glow 500\r\nCollagen Elastin 2800\r\nMiracle Serum 1500', 6800, 'Package', 1, '2019-10-17 03:40:41', '2019-10-17 03:40:41', NULL),
(17, 1, 'Pigmentation', 'uploads/product/JmacHeWUueQ8c1aSwkVfudVgU4yuE1gR7k02ltKj.jpeg', 'Foam Wash 1000\r\nSun Block 500\r\nSkin Rejuvenation 500\r\nSkin Glow 500\r\nBleaching Mask 1500\r\nMiracle Serum 1500', 5500, 'Package', 1, '2019-10-17 03:42:29', '2019-10-17 03:42:29', NULL),
(18, 1, 'Post Keloid Injection', 'uploads/product/EDbOybm8911qibGozMLV0W8qm19lR8ulAsegT4vR.jpeg', 'Skin Glow 500\r\nMiracle Serum 1500\r\nCollagen Elastin 2800', 4800, 'Package', 1, '2019-10-17 03:44:58', '2019-10-17 03:44:58', NULL),
(19, 1, 'Slimming Procedure', 'uploads/product/v4WkjflbNveBslC1gulaxbFE7qFZkdBXswYB18si.jpeg', 'PPC Cream 1500 (s) 6000(b)\r\nDermaheal 2500\r\nMesotherapy 1800', 10299, 'Package', 1, '2019-10-17 03:48:47', '2019-10-17 03:48:47', NULL),
(20, 1, 'Dry Skin', 'uploads/product/mncX3esFUQIHpRpTDKQPRgKOxVZ4hSPwfj6c9bh3.jpeg', 'Foam Wash 1000\r\nMiracle Serum 1500', 2500, 'Package', 1, '2019-10-17 03:50:21', '2019-10-17 03:50:21', NULL),
(21, 1, 'Sensitive Skin', 'uploads/product/wq8KP74ehLVnuABf8UtI2iNXivPdpZZRfDzgZ5hB.jpeg', 'Foam Wash 1000\r\nSkin Glow 500\r\nSun Block 500\r\nVitamin C Cream 500\r\nMiracle Serum 1500', 4000, 'Package', 1, '2019-10-17 03:53:18', '2019-10-17 03:53:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
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
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_services` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `payment_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `reservations`
--

TRUNCATE TABLE `reservations`;
--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `employee_id`, `service_id`, `branch_id`, `room_id`, `reference_number`, `reservation_date`, `start_time`, `end_time`, `total_amount`, `total_services`, `duration`, `payment_location`, `payment_status`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 16, 11, 5, 1, 3, '8AORTXTYATNLKQSJORLX', '2019-10-12', '15:00:00', NULL, 499, NULL, NULL, 'uploads/reservation/nkIrn5WyMtQpYvlVASeRH6hyWva8TEghwOwMyl3W.jpeg', 1, 1, '2019-10-10 06:12:44', '2019-10-10 06:16:19', NULL),
(2, 6, NULL, 3, 6, NULL, 'CAAXZJHF9NKEBQCTUMYZ', '2019-10-11', '13:00:00', NULL, 499, NULL, NULL, '', 0, 1, '2019-10-10 06:36:07', '2019-10-10 06:36:07', NULL),
(3, 6, NULL, 5, 1, NULL, 'SH0N4FSFB6TSVP5PWYXC', '2019-10-11', '12:00:00', NULL, 499, NULL, NULL, '', 0, 1, '2019-10-10 07:06:20', '2019-10-10 07:06:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_service`
--

DROP TABLE IF EXISTS `reservation_service`;
CREATE TABLE IF NOT EXISTS `reservation_service` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `reservation_service`
--

TRUNCATE TABLE `reservation_service`;
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
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `rooms`
--

TRUNCATE TABLE `rooms`;
--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `branch_id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Room 1', 1, '2019-10-10 05:27:08', '2019-10-17 07:13:00', NULL),
(2, 7, 'Room 1', 1, '2019-10-10 05:51:52', '2019-10-10 05:51:52', NULL),
(3, 1, 'Room 1', 1, '2019-10-10 06:15:59', '2019-10-10 06:15:59', NULL),
(4, 3, 'Room 1', 1, '2019-10-17 07:13:24', '2019-10-17 07:13:24', NULL),
(5, 2, 'Room 1', 1, '2019-10-17 07:13:42', '2019-10-17 07:13:42', NULL),
(6, 6, 'Room 1', 1, '2019-10-17 07:13:59', '2019-10-17 07:13:59', NULL),
(7, 5, 'Room 1', 1, '2019-10-17 07:14:22', '2019-10-17 07:14:22', NULL),
(8, 1, 'Room 2', 1, '2019-10-17 07:14:41', '2019-10-17 07:14:41', NULL),
(9, 2, 'Room 2', 1, '2019-10-17 07:14:53', '2019-10-17 07:14:53', NULL),
(10, 3, 'Room 2', 1, '2019-10-17 07:15:10', '2019-10-17 07:15:10', NULL),
(11, 4, 'Room 2', 1, '2019-10-17 07:15:22', '2019-10-17 07:15:22', NULL),
(12, 5, 'Room 2', 1, '2019-10-17 07:15:32', '2019-10-17 07:15:32', NULL),
(13, 6, 'Room 2', 1, '2019-10-17 07:15:54', '2019-10-17 07:15:54', NULL),
(14, 7, 'Room 2', 1, '2019-10-17 07:16:10', '2019-10-17 07:16:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `services`
--

TRUNCATE TABLE `services`;
--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `image_location`, `price`, `duration`, `unit`, `description`, `filename`, `location`, `type`, `size`, `hash`, `ip_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Wartz Removal', 'uploads/service/Cj7BCDdnavOjfVej6cvRYvHUORTRZFvbjnCupRCB.jpeg', 999, 50, '1', 'The principle of warts removal by electrocautery, which utilize electricity to generate heat thru the needle, that touches the verrucous skin lesions. The verruca will burn and carbonized. Electrocautery can also be used to remove other growths on your skin including ano-genital areas.', 'Warts Removal.jpg', 'uploads/service/Cj7BCDdnavOjfVej6cvRYvHUORTRZFvbjnCupRCB.jpeg', 'service', 25883, 'b56c216a5dd4f8fef1995dfde582c0e187993feb', '::1', 1, '2019-09-11 04:48:20', '2019-10-17 01:51:27', NULL),
(2, 1, 'Omega Light', 'uploads/service/uwLM6Y4mOY5F858IeZlIXpXZIm414SPOG4CL94cY.jpeg', 299, 29, '1', 'P299 / per 15 mins \r\n\r\nIs a non-surgical skin renewal machine that reverses the signs of ageing by utilizing the proven healing power of light. Suitable for skin healing, wrinkle removal, scar reduction, acne treatment and more. It contains four different colored therapy lights that emits different wavelength of photo energy, combined for treatment.', 'Omega Light.jpg', 'uploads/service/uwLM6Y4mOY5F858IeZlIXpXZIm414SPOG4CL94cY.jpeg', 'service', 19506, '264e02ea24e851e7f7f5e62773bb901955d4655b', '::1', 1, '2019-09-11 04:57:34', '2019-10-17 01:48:48', NULL),
(3, 1, 'Diamond Peel', 'uploads/service/ZkAA6fZ8k6HCRa0eHqLyrxuScoFt7rmSLTimf1LL.jpeg', 499, 40, '1', 'P499.00/AREA \r\n\r\nThe diamond peel process will also minimize the appearance of acne scars,\r\nstretch marks, and pigmentations. Removes blackheads. The pores are also tightened and\r\nblackheads will be removed. Improves skin conditions.', 'Diamond Peel.jpg', 'uploads/service/ZkAA6fZ8k6HCRa0eHqLyrxuScoFt7rmSLTimf1LL.jpeg', 'service', 20936, '76dda83db834c926896a77066093af1ca02e6f65', '::1', 1, '2019-09-11 05:32:35', '2019-10-17 01:46:23', NULL),
(4, 1, 'CO2 Fractional Laser', 'uploads/service/r9lIkfw6750MbQEnmkWBrpR7L3suG5Tw9Fr8vHfA.jpeg', 3500, 60, '1', 'P3,500/Session \r\n\r\nIs a laser technology to help restore your skin to its original, perfect texture and achieves smoother, fresher, younger looking skin, improved tone and texture, smaller pores, erasing of unwanted brown spots, acne scars, and surgical scars, and reduces fine lines. It has longer downtime, but optimum results.', 'CO2 Fractional Laser.jpg', 'uploads/service/r9lIkfw6750MbQEnmkWBrpR7L3suG5Tw9Fr8vHfA.jpeg', 'service', 21755, '1c4847b2e31b461e1fdecdae2f2f9037f1e68f13', '::1', 1, '2019-09-11 22:00:09', '2019-10-17 01:44:49', NULL),
(5, 1, 'Acne Treatment', 'uploads/service/6MmjpGIaFjQEFOr8OESIGvyXnidUtRvFTNfRgYde.jpeg', 499, 40, '1', 'Is a form of Facial Treatment that effectively treats acne by scrubbing steaming, pricking, and uses glycolic cream and facial mask. Final step uses cryotherapy to close the pores.', 'Acne Treatment.jpg', 'uploads/service/6MmjpGIaFjQEFOr8OESIGvyXnidUtRvFTNfRgYde.jpeg', 'service', 11247, '9218771e497879b6084adb6c569e87e950b9d5ae', '::1', 1, '2019-09-18 03:36:49', '2019-10-17 01:39:55', NULL),
(6, 1, 'IPL Hair Reducer', 'uploads/service/OLu4vkwuGCcWyiuIVwXoffDTpOufL1ckuZjUGe2c.jpeg', 499, 40, '1', 'Is a popular hair reducer treatment that delays hair growth. IPL does not use a laser light source but instead uses a broad spectrum high-intensity light that emits light at multiple wavelengths that sets in pre determined scheduled time visitations of clients and patients, eventually vanishes hair growth by shortening their phases of growth.', 'IPL Hair Reducer.jpg', 'uploads/service/OLu4vkwuGCcWyiuIVwXoffDTpOufL1ckuZjUGe2c.jpeg', 'service', 24299, '65a1e9982fe8fbb442168a148c20e1eb24c02ebe', '::1', 1, '2019-09-18 03:42:41', '2019-10-17 01:36:13', NULL),
(7, 1, 'Ultrasound Lift (Ultherapy MERZ)', 'uploads/service/ZynnFHjOqMPS1Celxvs6Ezso7OL3cICIuXizVGsV.jpeg', 500, 60, '1', 'Is the only non-invasive procedure US FDA-cleared to lift skin on different parts of your face, neck, under the chin. It uses time-tested layer specific ultrasound energy to life and tighten the skin without surgery or downtime. It helps to improve the appearance of lines and wrinkles on the decolletage.', 'Ultrasound Lift.jpg', 'uploads/service/ZynnFHjOqMPS1Celxvs6Ezso7OL3cICIuXizVGsV.jpeg', 'service', 31282, '9b6d123d9fd6cd691502be8f45120530777cb1e2', '::1', 1, '2019-09-18 03:45:33', '2019-10-17 01:29:05', NULL),
(8, 1, 'Radio Frequency', 'uploads/service/TwU0hXQH65qCowVmzrMBp5bTyyotKVYOUsORipDc.jpeg', 399, 29, '1', 'Is an aesthetic technique that uses RF energy to heat tissue and stimulate subdermal collagen production in order to reduce the appearance of fine lines and loose skin. By manipulating skin cooling during treatment, RF can also be used for heating and reduction of fat.', 'Radio Frequency.jpg', 'uploads/service/TwU0hXQH65qCowVmzrMBp5bTyyotKVYOUsORipDc.jpeg', 'service', 20816, '7753a2fef07ebdb5c90321db1e5b12cea7d71579', '::1', 1, '2019-09-18 03:46:50', '2019-10-17 01:22:29', NULL),
(9, 1, 'dddddddddddddddddd', NULL, 13, NULL, '1', 'alkdjlajd', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-09-27 07:25:06', '2019-09-27 07:25:38', '2019-09-27 07:25:38'),
(10, 1, 'Lipo Cavitation', 'uploads/service/HTZjJA2iX9GaL0mUm8Jd6zeqaeBnvqawcyRVa3NK.jpeg', 299, 15, NULL, 'Is a form of fat reduction treatment that is gaining in popularity because of its notable advantages over other fat loss and fat reduction treatments. It does not require any surgery therefore it is non-invasive and it is by far a safer alternative to other means of fat removal.', 'Lipo Cavitation.jpg', 'uploads/service/HTZjJA2iX9GaL0mUm8Jd6zeqaeBnvqawcyRVa3NK.jpeg', 'service', 22915, '57f5d15262c596f68ce0a983031696440c55d423', '::1', 1, '2019-10-17 01:19:11', '2019-10-17 01:19:11', NULL),
(11, 1, 'Red Light', 'uploads/service/ZhrOe1tyc5qQY0Eh0k0jvctNnWMq1GhvkmCIU93h.jpeg', 299, 15, NULL, 'The Red LED light works like a laser, targeting cells beneath the skin\'s surface and stimulating them so that they produce new collagen and fight off breakout causing bacteria. It accelerate blood circulation, Relieve acne scars, Atopy, Athlete\'s Foot, Psoriasis and used fort Pain relief.', 'Red Light.jpg', 'uploads/service/ZhrOe1tyc5qQY0Eh0k0jvctNnWMq1GhvkmCIU93h.jpeg', 'service', 42789, '2aa7d1d493a443f776d3a32326fb0ea4541bc452', '::1', 1, '2019-10-17 01:55:11', '2019-10-17 01:55:11', NULL),
(12, 1, 'Skin Peeling', 'uploads/service/MAV2ykWFSn61gknaX2qjyRKK8MpUoHVJLdJKHseK.jpeg', 499, 60, NULL, 'Uses Glycolic peel solution, it is a type of chemical peel, is one of the most popular solutions for anyone who suffers from common skin conditions. These conditions, such as acne, wrinkles, age spots or uneven colouration and tone, can all be treated.', 'Skin Peeling.jpg', 'uploads/service/MAV2ykWFSn61gknaX2qjyRKK8MpUoHVJLdJKHseK.jpeg', 'service', 35538, '327c82a5d9f10ddf022e65b12c866a5529dc256d', '::1', 1, '2019-10-17 01:57:34', '2019-10-17 01:57:34', NULL),
(13, 1, 'Whitening Treatment', 'uploads/service/ygwmTBzKSq5jn3bd0nBOhLjRdqa3eC71C6mXx9n2.jpeg', 499, 15, NULL, 'Uses bleaching mask per area. For Optimum bleaching, it can be applied and let it dry for 15mins or overnight.', 'Whitening Treatment.jpg', 'uploads/service/ygwmTBzKSq5jn3bd0nBOhLjRdqa3eC71C6mXx9n2.jpeg', 'service', 16686, '286d862236c2d8e07fa8abc9794dcf3deb562c27', '::1', 1, '2019-10-17 01:59:25', '2019-10-17 01:59:25', NULL),
(14, 1, 'Eyebrow Tattoo - Microblading', 'uploads/service/h8xc2w70Dw6YSNQe7OxBB527ChH91fipQXZgM2ZX.jpeg', 11999, 120, NULL, 'Microblading is a semi-permanent make up treatment that helps create fuller looking eyebrows.', 'Eyebrow Tattoo.jpg', 'uploads/service/h8xc2w70Dw6YSNQe7OxBB527ChH91fipQXZgM2ZX.jpeg', 'service', 28392, '1cf1a0541e56dae93435accb6cebf31cd6f14f4f', '::1', 1, '2019-10-17 02:02:37', '2019-10-17 02:02:37', NULL),
(15, 1, 'N - Dyag Laser (Alpha Laser)', 'uploads/service/EzNQ0yPObJix93yAzU2CqLMMxG2RJw1b9QKYCMHV.jpeg', 3500, 60, NULL, 'Is a form of cosmetic laser commonly used for anti-aging skin treatments. It resurfaces your skin to remove moderate facial wrinkles, surface scars, or skin discolorations. Best for pore minimizing, pigmentation, oily skin, freckles, and fine lines.', 'N - Dyag Laser.jpg', 'uploads/service/EzNQ0yPObJix93yAzU2CqLMMxG2RJw1b9QKYCMHV.jpeg', 'service', 26927, '08eb5c94e5aa6485dedd11eeb4db5dd110b76acb', '::1', 1, '2019-10-17 02:05:31', '2019-10-17 02:05:31', NULL),
(16, 1, 'Victory Face Lift', 'uploads/service/JU3A3PCxsi4ayGuVyxQwXkn0xCDv1uB70EyNderL.jpeg', 15000, 120, NULL, 'Perfected by Dr. Jennifer M. Ortiz for her exclusive number of patients who enjoy and maintain the craft mastered. V - Lift 0-1 is a non invasive facial lift theory that harmonizes Horizontal Fascial Focused Ultrasound, Thread Lifting and concoctions of biosera with selective density collagen formula conducted by our dermatologist in her opera according to patient\'s condition and clinical presentation.', 'Victory Face Lift.jpg', 'uploads/service/JU3A3PCxsi4ayGuVyxQwXkn0xCDv1uB70EyNderL.jpeg', 'service', 18938, 'ebd3a5eff1f0322797a5bf026c67ddfe2db8eee3', '::1', 1, '2019-10-17 02:10:00', '2019-10-17 02:10:00', NULL),
(17, 1, 'Dermaroller', 'uploads/service/DEvOWVNCb5wyVku3plNLkNiKWDn8Rdtez4fqRQhO.jpeg', 2500, 60, NULL, 'Is an aseptic procedure under local anaesthesia that uses small needles in a roller to prick the skin. The purpose of treatment is to generate new collagen and skin tissue for smoother, firmer, more toned skin by producing inflammatory reactions. Microneedling is use on the face and elsewhere to treat various scars, wrinkles, and large pores.', 'Dermaroller.jpg', 'uploads/service/DEvOWVNCb5wyVku3plNLkNiKWDn8Rdtez4fqRQhO.jpeg', 'service', 19348, '4d6f832534cf008ae4a73d403b37eb04c06a5f20', '::1', 1, '2019-10-17 02:14:19', '2019-10-17 02:14:19', NULL),
(18, 1, 'Vampire Facial Procedure', 'uploads/service/XVcKjui3Ubo384G1eUaw6JOlwvxb59hEM5DsCMeT.jpeg', 10000, 100, NULL, 'A Vampire Facial is a combination of micro-needling and Platelet Rich Plasma (PRP). PRP is a concentrate portion of that fluid derived after uncoagualted whole blood has been processed by pre determined spin time in a temperature controlled clinical laboratory centrifuge to remove other red and nucleated cells.', 'Vampire Facial.jpg', 'uploads/service/XVcKjui3Ubo384G1eUaw6JOlwvxb59hEM5DsCMeT.jpeg', 'service', 14392, 'dce71e83b2213cacd79bfd29e35ebae07ddf0ecd', '::1', 1, '2019-10-17 02:21:04', '2019-10-17 04:02:56', NULL),
(19, 1, 'Botolinum Toxin (Euronox)', 'uploads/service/b8GIFOZLIJOsdDhuKM7zaUMTDRLXt6idve7xKvgc.jpeg', 5000, 50, NULL, 'A Botolinum Toxin injection is a minor procedure that treats lines and wrinkles of the face and neck. An injection contains botulinum toxin, a neurotoxin that relaxes muscles to smooth out lines and wrinkles. Euronox temporarily creates a more youthful and fresh appearance.', 'Botolinum Toxin.jpg', 'uploads/service/b8GIFOZLIJOsdDhuKM7zaUMTDRLXt6idve7xKvgc.jpeg', 'service', 21595, '3a9b7486526b63094efb2e0eead6eb009b4b6ae8', '::1', 1, '2019-10-17 02:24:47', '2019-10-17 02:24:47', NULL),
(20, 1, 'Derma Fillers', 'uploads/service/4ZzaeGfBv8Amp1DO9d1wdbRsL9vdqOKj2mJOw71L.jpeg', 20000, 120, NULL, 'Densified Collagen Dermal Fillers in different molecular weights, may help to plump up any skin region. It is sometimes called soft tissue fillers. These are substance designed to be injected beneath the surface of the skin to add volume and fullness and to  fill in or soften static wrinkles, especially on the lower face. Treatment is done using a fine needle under local anaesthesia if applicable.', 'Derma Fillers.jpg', 'uploads/service/4ZzaeGfBv8Amp1DO9d1wdbRsL9vdqOKj2mJOw71L.jpeg', 'service', 23576, 'f5718e0921f89101b91c1915ea89c612752c7abe', '::1', 1, '2019-10-17 02:27:32', '2019-10-17 02:27:32', NULL),
(21, 1, 'Sclerotherapy', 'uploads/service/o1pdX96UM90tRXJ9Na5TkP2ShXBU9cuylyJY3R1H.jpeg', 2500, 50, NULL, 'Sclerotherapy is a dermatology procedure in clinic used to eliminate varicose veins and spider veins permanently. Sclerotherapy involves shrinking the vein. The solution interacts with the inner lining of the blood vessel, causing it to decrease its lumen.', 'Sclerotherapy.jpg', 'uploads/service/o1pdX96UM90tRXJ9Na5TkP2ShXBU9cuylyJY3R1H.jpeg', 'service', 16644, 'ac44a78efbe2516b5a7141b4ec94ffbac2e27024', '::1', 1, '2019-10-17 02:29:35', '2019-10-17 02:29:35', NULL),
(22, 1, 'Galvanic Stem Cell', 'uploads/service/bt6LedWzMxFODGLeydEpDGn2xx7kKEHZLpcNG2wp.jpeg', 1499, 60, NULL, 'The micro massage treatments stimulate deep under the skin\'s surface, so the treated area will not be aggravated in any way. It can be used to heal acne scars, anti-aging, skin tightening, eliminate wrinkles and fine lines, buff and tone up the skin and reduce puffy eye bags appearance and dark circles.', 'Galvanic Stem Cell.jpg', 'uploads/service/bt6LedWzMxFODGLeydEpDGn2xx7kKEHZLpcNG2wp.jpeg', 'service', 26314, '1112c9841fead6b385a298353287f9f35e63c03a', '::1', 1, '2019-10-17 02:31:43', '2019-10-17 02:31:43', NULL),
(23, 1, 'IV Drip Injection', 'uploads/service/rEZD2YEGiPjvUqLd2IEF59fwMR2UxuP4rPa3M1yr.jpeg', 3500, 60, NULL, 'Intravenous procedure that involves infusion thru IV drip of glutathione, collagen, and/or vitamin C. Likewise, a cocktail drip are also available in wide array of IV drips mixture of rejuvenating fluids suitable with your health status and medical conditions extending to amino acids and even immunomodulators.', 'IV Drip Injection.jpg', 'uploads/service/rEZD2YEGiPjvUqLd2IEF59fwMR2UxuP4rPa3M1yr.jpeg', 'service', 12468, '752824b498a0cb4af2ffdb23bbe0fe2bf7afac06', '::1', 1, '2019-10-17 02:35:41', '2019-10-17 02:35:41', NULL),
(24, 1, 'Korean BB Glow Treatment', 'uploads/service/EucQMN7um8FA6GhucG10crn3jnYRcVR4WZ97JRgm.jpeg', 5000, 60, NULL, 'A form of facial that uses natural facial peels and radiance boosting serum and creams to brighten and even out skin tone. Natural enzymes and botanical extracts melt away dull skin cells and stimulate cell renewal for a supple, refreshed and radiant appearance. It is recommended for people with dark skin tone and also for reduction the appearance of freckles and skin discoloration caused by acne and photo-aging process.', 'Korean BB Glow.jpg', 'uploads/service/EucQMN7um8FA6GhucG10crn3jnYRcVR4WZ97JRgm.jpeg', 'service', 39125, 'bcaa136d076e7c5cdafeed18a76ef72c3f6a1494', '::1', 1, '2019-10-17 02:43:28', '2019-10-17 02:43:28', NULL),
(25, 1, 'Mesotherapy', 'uploads/service/Za5IKDkW5abBH47UBS2mSVlvqIbe6eyuJNzdAdj8.jpeg', 1500, 50, NULL, 'Mesotherapy is a technique that uses injections of organic extracts to rejuvenate and tighten skin, as well as remove excess fat.  It is used to remove fat in areas like the stomach, thighs, buttocks, hips, legs, arms, and face, reduce cellulite, fade wrinkle and lines, tighten loose skin and recontour the body.', 'Mesotherapy.jpg', 'uploads/service/Za5IKDkW5abBH47UBS2mSVlvqIbe6eyuJNzdAdj8.jpeg', 'service', 16858, '35061ff78e3dcc07f174e42c4963e553a1c9d8b5', '::1', 1, '2019-10-17 02:47:33', '2019-10-17 02:47:33', NULL),
(26, 1, 'Signature Facial', 'uploads/service/C43v5gX1e7BhijCmXTx9cDGFBd4MpphycA58olMk.jpeg', 999, 50, NULL, 'Our Special Signature facial is a combination of facial cleaning, pricking with anti-biotic, whitening mask, diamond peel, galvanic treatment, cryotherapy and vitamin c serum application.', 'Signature Facial.jpg', 'uploads/service/C43v5gX1e7BhijCmXTx9cDGFBd4MpphycA58olMk.jpeg', 'service', 17542, 'c5d3d11100e3ea7de2598d1e4ebda93d73fef0c9', '::1', 1, '2019-10-17 02:51:23', '2019-10-17 02:51:23', NULL),
(27, 1, 'Hydra Facial', 'uploads/service/DyGrsFgibkARMMlWo1cylYnltuwqeo4MW4KjokM2.jpeg', 1499, 60, NULL, 'Our HYDRA facial is commonly known as Oxygen facial. A combination of cleaning, suction and galvanic treatment with an option of Cryo or Radio Frequency. Final step is the application Hydro Solution. Results that makes your skin glow to the fullest.', 'Oxygen Facial.jpg', 'uploads/service/DyGrsFgibkARMMlWo1cylYnltuwqeo4MW4KjokM2.jpeg', 'service', 22442, 'd592d2c33d88cfe0aa9b643622a4c5d70be2c0cb', '::1', 1, '2019-10-17 02:52:12', '2019-10-17 02:52:12', NULL),
(28, 1, 'Slimming Ion', 'uploads/service/DSSksXKggmbSy9p4wpT0rs3WbRgezMQzWtUf2d8m.jpeg', 499, 15, NULL, 'Slimming ION-  15 minute procedure per body area of your choice. It tones the muscles you\'ve already built in shape, while at the same time decreasing deposits of fat. To achieve a sexy and toned body with this treatment.', 'Slimming Ion.jpg', 'uploads/service/DSSksXKggmbSy9p4wpT0rs3WbRgezMQzWtUf2d8m.jpeg', 'service', 10068, '64964c45c5907d11a62a6bb0b8a27adf1f3aeaca', '::1', 1, '2019-10-17 02:52:55', '2019-10-17 02:52:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_symptom`
--

DROP TABLE IF EXISTS `service_symptom`;
CREATE TABLE IF NOT EXISTS `service_symptom` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `symptom_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_symptom_service_id_foreign` (`service_id`),
  KEY `service_symptom_symptom_id_foreign` (`symptom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `service_symptom`
--

TRUNCATE TABLE `service_symptom`;
--
-- Dumping data for table `service_symptom`
--

INSERT INTO `service_symptom` (`id`, `service_id`, `symptom_id`) VALUES
(1, 5, 1),
(2, 27, 1),
(3, 27, 2),
(4, 26, 2),
(5, 12, 2),
(6, 4, 3),
(7, 27, 3),
(8, 8, 3),
(9, 1, 4),
(10, 27, 5),
(11, 25, 5),
(12, 26, 5),
(13, 17, 6),
(14, 3, 6),
(15, 27, 6),
(16, 15, 6),
(17, 3, 7),
(18, 27, 7),
(19, 8, 7),
(20, 11, 7),
(21, 26, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `symptoms`
--

DROP TABLE IF EXISTS `symptoms`;
CREATE TABLE IF NOT EXISTS `symptoms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `symptoms`
--

TRUNCATE TABLE `symptoms`;
--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Acne', 'Acne is a chronic, inflammatory skin condition that causes spots and pimples, especially on the face, shoulders, back, neck, chest, and upper arms.', 1, '2019-10-24 08:01:34', '2019-10-24 08:01:34', NULL),
(2, 'Eczema', 'Eczema is a condition where patches of skin become inflamed, itchy, red, cracked, and rough. Blisters may sometimes occur.', 1, '2019-10-24 08:07:17', '2019-10-24 08:07:17', NULL),
(3, 'Hives', 'Hives is an outbreak of swollen, pale red bumps or plaques (wheals) on the skin that appear suddenly either as a result of the body\'s reaction to certain allergens, or for unknown reasons.', 1, '2019-10-24 08:09:54', '2019-10-24 08:09:54', NULL),
(4, 'Wartz', 'These small, noncancerous growths appear when your skin is infected with one of the many viruses of the human papillomavirus (HPV) family. The virus triggers extra cell growth, which makes the outer layer of skin thick and hard in that spot.', 1, '2019-10-24 08:11:46', '2019-10-24 08:11:46', NULL),
(5, 'Latex Allergy', 'Rash may occur within minutes to hours after exposure to a latex product. Warm, itchy, red wheals at the site of contact that may take on a dry crusted appearance with repeated exposure to latex.', 1, '2019-10-24 08:14:26', '2019-10-24 08:14:26', NULL),
(6, 'Psoriasis', 'Scaly, silvery, sharply defined skin patches. Commonly located on the scalp, elbows, knees, and lower back. May be itchy or asymptomatic.', 1, '2019-10-24 08:15:55', '2019-10-24 08:15:55', NULL),
(7, 'Contact Dermatitis', 'Sometimes, when certain chemicals in makeups and lotions are exposed to the sun, it causes a reaction on the skin. Even certain types of jewellery can be a problem if you have an allergic reaction to them.', 1, '2019-10-24 08:18:12', '2019-10-24 08:18:12', NULL);

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
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `last_login_at`, `last_login_ip`, `to_be_logged_out`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9581aa4f-4782-45de-bfcf-68e5ad42edaa', 'Admin', 'Istrator', 'admin@admin.com', 'gravatar', NULL, '$2y$10$OyGskctfytX4nWuhlhCTgeaYgOIRNtRiNXJryXrQNS5SEHOwlg9Z2', '2019-10-17 01:10:28', 1, 'f38ac6e17991c4f367b624ba5140597e', 1, 'America/New_York', '2019-10-27 07:44:24', '::1', 0, 'vfTEqo1RWHdiO7UKquPfC1iFn7ZNAW9stLBLvwWNWrHMtbd82OX6FZwZk0NV', '2019-09-10 19:41:11', '2019-10-27 07:44:25', NULL),
(2, '6446f4c3-6d41-4c01-954a-2e191ed38305', 'Backend', 'User', 'executive@executive.com', 'gravatar', NULL, '$2y$10$ZZIrsMyVpkwtMC5vTcY9vuXZ75VuvyyOsI2ERzXtpd8aGnwnRSKZi', NULL, 1, 'e68b83568a9fa0fa75cf0c85e0821dec', 1, 'America/New_York', '2019-09-27 08:11:47', '::1', 0, 'Dh6AO8NVs9lEME7mBP594w2xygr5lQEVke2cDRYNICB42XildvtYWs5w4ySs', '2019-09-10 19:41:11', '2019-09-27 08:11:48', NULL),
(3, '246cb91a-669e-4f1e-a586-15972aa6a06e', 'Default', 'User', 'user@user.com', 'gravatar', NULL, '$2y$10$ZiDma9oVrV739D4dSxj5vuIl7LoA/FtwgUwezjoO.fD6YuAdxD8Ym', NULL, 1, 'da9fdc3b605e40dee9dfa7eeb602d183', 1, 'America/New_York', '2019-09-16 05:41:00', '::1', 0, 'HWZ8rTqSYyOnSCo0QejC7ePih9paht4R9XL7JpTXOQH6V2VkKVwFHIpPHdk0', '2019-09-10 19:41:11', '2019-09-16 05:41:00', NULL),
(5, '3ba1fbe3-2036-44b1-a5d5-d68dcdeb3858', 'Daryl paul', 'Cinco', 'darylcinco02@gmail.com', 'gravatar', NULL, '$2y$10$yVtvW4Z1PS0ozW0tXlngBuTj7WsVHYR/tBgqtIoafcfmtvnbXSTuu', NULL, 1, '0f1fa4380c7aa43ce94ece0257c318b1', 1, NULL, NULL, NULL, 0, NULL, '2019-09-12 22:25:52', '2019-09-18 03:01:55', NULL),
(6, '1156efce-521f-4e1d-a73f-40fb08e434db', 'test', 'test', 'test@test.com', 'gravatar', NULL, '$2y$10$fICNtZHJbKmEVvHKzAHSe.SaLlyx3hd6G0CMMSqYeR/iueMOw9ovC', '2019-10-17 04:06:22', 1, '3a02d466e0d43ee708b61d70ec7adf18', 1, 'America/New_York', '2019-10-24 09:11:09', '::1', 0, 'WKxS4QMnCiiMIhXk3OSrLvUoMeBBLGOteVW9Nl5H1PcevsVGioMbGc1xsvTC', '2019-09-16 05:35:31', '2019-10-24 09:11:09', NULL),
(7, 'ad65a590-0cff-4cbc-ba7d-6976fc4119af', 'Ryan Jason', 'Lagradilla', 'rlagradilla77@gmail.com', 'gravatar', NULL, '$2y$10$qWnO62nlYnBwYLrhGj7KM.7GQ4qyxIcxTRP5lwaGvHtrOzjNVoRUe', NULL, 1, 'e671c1eaa605249223a6a20f440153bf', 1, NULL, NULL, NULL, 0, NULL, '2019-09-18 04:21:36', '2019-09-18 04:21:36', NULL),
(8, '485da3da-ce43-4e81-b0e9-74003337549f', 'Alecz', 'Dhea', 'aleczdhea@gmail.com', 'gravatar', NULL, '$2y$10$y4G0Cl42IYvUTMkog9/qI.gXyXt7Muq9xd9S9/8QcFrc6DhDnlFzW', NULL, 1, '1d3a7f6cdb5e7026dc79fd272a3a01cd', 1, 'America/New_York', '2019-09-27 07:17:17', '::1', 0, '6pmWGStSZJL8avVYIzLUSqe0lH3sSlrrFf8yEzfPASwK1G8TwjG0mgJ2xgQl', '2019-09-27 06:58:30', '2019-09-27 07:17:17', NULL),
(11, '3f151607-883f-4d41-a8db-d5b60682317a', 'ryan', 'lagradilla', 'rlagradilla@gmail.com', 'gravatar', NULL, '$2y$10$WrgI76H1lIHxlD1iyBB85O.WUauT3ugEQYJCgxtLpQ18Fbd3RnEf2', NULL, 1, '1738f18e1bb039fe4d5611a622fa75be', 1, NULL, NULL, NULL, 0, NULL, '2019-09-27 08:15:09', '2019-09-27 08:15:09', NULL),
(16, '008c0a3a-7dbf-44b5-bdb1-48e44494a9b3', 'Angela Paula', 'Angeles', 'jaypeedala1999@gmail.com', 'gravatar', NULL, '$2y$10$IELbH/ZszphpfclNAU/HbOFGApYNYlrAmBf2z1aFEujtwAQsRY7Pq', NULL, 1, '8c1c6606c55673b1e9a2b1c02a245d3d', 1, 'America/New_York', '2019-10-10 06:05:20', '::1', 0, '23VxkjscOWPdplfXI2EIgUjGsQ2AUp8fpPBwhV66JRCbSrxrM0DjOWJMI66d', '2019-10-10 06:02:25', '2019-10-10 06:05:20', NULL),
(17, '428aec71-425d-4fe4-bbd5-b8af85659b56', 'Admin', 'Admin', 'administrator00@gmail.com', 'gravatar', NULL, '$2y$10$mzfXL86av5JZ/M1T/Q2ROOvVGuePNeZQRydH6PLaMbGukDMoqGLoS', NULL, 1, '4d7b8e75a13363049e3e46bf3faee20a', 1, NULL, NULL, NULL, 0, NULL, '2019-10-10 06:26:34', '2019-10-10 06:26:34', NULL);

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
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
-- Constraints for table `service_symptom`
--
ALTER TABLE `service_symptom`
  ADD CONSTRAINT `service_symptom_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `service_symptom_symptom_id_foreign` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`);

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
