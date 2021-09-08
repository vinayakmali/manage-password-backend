-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 08, 2021 at 12:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_action_button`
--

DROP TABLE IF EXISTS `business_action_button`;
CREATE TABLE IF NOT EXISTS `business_action_button` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_action_button` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_action_button`
--

INSERT INTO `business_action_button` (`id`, `business_action_button`, `created_at`, `updated_at`) VALUES
(1, 'book_a_service', NULL, NULL),
(2, 'get_a_free_quote', NULL, NULL),
(3, 'have_us_call_you_back', NULL, NULL),
(4, 'book_an_appointment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

DROP TABLE IF EXISTS `business_details`;
CREATE TABLE IF NOT EXISTS `business_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` int(11) DEFAULT NULL,
  `business_action_button` int(11) DEFAULT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_description` text COLLATE utf8mb4_unicode_ci,
  `address_line` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `business_name`, `business_type`, `business_action_button`, `service_id`, `business_description`, `address_line`, `area`, `city`, `state`, `country`, `cover_photo`, `slug`, `working_hours`, `created_at`, `updated_at`) VALUES
(1, 1, 'dfdfd', 1, 1, '3', 'sassa', 'SB Road', 'Wanaworie', 'Pune', 'Maharashtra', 'IN', NULL, 'dfdfd', '0', '2021-09-01 05:40:51', '2021-09-07 09:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `business_service`
--

DROP TABLE IF EXISTS `business_service`;
CREATE TABLE IF NOT EXISTS `business_service` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `timeline` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_service`
--

INSERT INTO `business_service` (`id`, `name`, `category`, `timeline`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(2, 'kkk', 2, 15, 200, 'per_campaign', '2021-09-01 00:32:48', '2021-09-01 00:38:15'),
(3, 'vinayak', 1, 2, 3434, 'per_campaign', '2021-09-01 00:32:48', '2021-09-01 00:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `business_service_category`
--

DROP TABLE IF EXISTS `business_service_category`;
CREATE TABLE IF NOT EXISTS `business_service_category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_service_category`
--

INSERT INTO `business_service_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'alpine trekkers1', '2021-08-31 07:32:44', '2021-08-31 07:34:49'),
(2, 'sdsds', '2021-08-31 07:36:49', '2021-08-31 07:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

DROP TABLE IF EXISTS `business_type`;
CREATE TABLE IF NOT EXISTS `business_type` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'default', '2021-08-26 11:18:54', NULL),
(2, 'plumber', '2021-08-26 11:19:02', NULL),
(3, 'salon', '2021-08-26 11:19:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `selected_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `business_id`, `service_id`, `user_id`, `selected_date`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 8, '2021-09-02 10:14:00', '2021-09-02 04:53:27', '2021-09-02 04:53:27'),
(2, '3', 2, 9, '2021-09-02 10:27:00', '2021-09-02 04:57:16', '2021-09-02 04:57:16'),
(3, '3', 2, 10, '2021-09-02 11:02:00', '2021-09-02 05:32:45', '2021-09-02 05:32:45'),
(4, '3', 3, 11, '2021-09-02 11:03:00', '2021-09-02 05:33:41', '2021-09-02 05:33:41'),
(5, '3', 2, 9, '2021-09-02 11:07:00', '2021-09-02 05:37:11', '2021-09-02 05:37:11'),
(6, '3', 3, 12, '2021-09-02 11:10:00', '2021-09-02 05:40:33', '2021-09-02 05:40:33'),
(7, '3', 3, 13, '2021-09-02 11:14:00', '2021-09-02 05:44:39', '2021-09-02 05:44:39'),
(8, '1', 3, 15, '2021-09-08 10:32:00', '2021-09-08 05:02:37', '2021-09-08 05:02:37'),
(9, '1', 3, 2, '2021-09-08 12:18:00', '2021-09-08 06:49:11', '2021-09-08 06:49:11'),
(10, '1', 3, 2, '2021-09-08 12:18:00', '2021-09-08 06:49:30', '2021-09-08 06:49:30'),
(11, '1', 3, 2, '2021-09-08 12:18:00', '2021-09-08 06:50:17', '2021-09-08 06:50:17'),
(12, '1', 3, 16, '2021-09-08 12:18:00', '2021-09-08 06:50:49', '2021-09-08 06:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_08_222716_create_projects_table', 1),
(5, '2021_08_25_165631_create_business_details_tbl', 2),
(6, '2021_08_26_100816_create_business_details_tbl', 3),
(7, '2021_08_26_110933_create_business_type_tbl', 4),
(8, '2021_08_26_124716_create_business_action_button_tbl', 5),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 6),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(11, '2021_08_27_085226_create_sessions_table', 6),
(12, '2021_08_26_100817_create_business_details_tbl', 7),
(13, '2021_08_26_100818_create_business_details_tbl', 8),
(14, '2021_08_31_123827_business_service', 9),
(15, '2021_08_31_124557_business_service_category', 10),
(16, '2021_08_26_100819_create_business_details_tbl', 11),
(17, '2021_09_02_064526_enquiry', 12),
(18, '2021_08_31_123655_create_services_table', 13),
(19, '2021_08_31_125032_create_categories_table', 13);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(22,2) DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `introduction`, `location`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'nmnm', 'mnmnjkjkj', 'jkjkj', '99.00', '2021-08-26 06:19:41', '2021-08-26 06:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zwJVHcPuSyTqizzItblayUhR8ji6CbbJd6CPHG0g', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib1FBUWtJNmVQeUlyeHlPTlZtUGxwMmJGVFRjZ0dlSHBtclVhR0lEdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbWFpbC92ZXJpZnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYnVzaW5lc3MvY3JlYXRlIjt9fQ==', 1631102908),
('FPvtpktZskg0niOtg960FGnQNZYcTA3M5BpndXaB', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVUFMaDdPY1RVR1BVWU5sTHRreVRBdXNZeHdXSFhMNzRZUDBPQ0tZZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy92aWV3L2RmZGZkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTQ7fQ==', 1631027583),
('bQl6hooGgkNLbWax3S8S8U2xKUfbemnJHd07Fp83', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMFFYQ1c0ZmpRcTZCdk8xaGFWc3l2VUg1WElrTThpOWdiSXFJUE1KTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbWFpbC92ZXJpZnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYnVzaW5lc3MvY3JlYXRlIjt9fQ==', 1631102858),
('k4pfxQLM0k3D434ROOUgZ7XYrEOU0mDBNmsTbPPD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienFCZ2dQVjNZV1UzVThaSGdNMkt2ZlZZbkZQemhQb1Z4YlJFcVp2dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1631024550),
('T9eVDSONM1u8G2CVdqYkvHXO8VI9uR0d7hbhYusD', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib0w4aUhLRHcwM3REV3JRcVJLSVNzYm5tcGpyUXFOQ1lTeGJ5T0FaViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy9lbnF1aXJ5L2RmZGZkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2J1c2luZXNzL2NyZWF0ZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE2O30=', 1631103656);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Vinayak.Mali', 'Vinayak.Mali@harbingergroup.com', NULL, '$2y$10$X/HYQBMk9gC6xLxR4EnSAu/W9PcHFmSd7DMsteEOPy51ZYiRO6hb2', NULL, NULL, NULL, '2021-08-26 07:56:12', '2021-08-26 07:56:12'),
(3, 'Vinayak.Mali1', 'Vinayak.Mali1@harbingergroup.com', NULL, '$2y$10$gU61BDmNgnV5EvNT8jyI.ujpbEzv9yEPvybikAtUkVwdjEAswp.G2', NULL, NULL, NULL, '2021-08-26 08:00:00', '2021-08-26 08:00:00'),
(4, 'vinayak.mali159', 'vinayak.mali159@hotmail.com', NULL, '$2y$10$a.cxYBEHFMPKTnNXvccuDOPIWaRUGXTmWb2mQYapIlg0yUpy4mkVG', NULL, NULL, NULL, '2021-08-27 02:23:20', '2021-08-27 02:23:20'),
(5, 'Vinayak.Maliwww', 'Vinayak.Maliwww@harbingergroup.com', NULL, '$2y$10$4a8jZf.1yJ38EMJaVqKNsOABfPJpPYjkK3BwdeqZAOm.esXmpTRHm', NULL, NULL, NULL, '2021-08-27 02:26:28', '2021-08-27 02:26:28'),
(6, 'qqvinayak.mali', 'qqvinayak.mali@harbingergroup.com', NULL, '$2y$10$nXuWNd/lQn9DlbpyLsMSgO7eUxVAlX5Qv18hT2KjM4CALWLZkxq5m', NULL, NULL, NULL, '2021-08-27 02:27:30', '2021-08-27 02:27:30'),
(7, 'vinayakmali123', 'vinayakmali123@gmail.com', NULL, '$2y$10$tCkHAj2m1Ny1A0UOJK9F8u.xy6far5o1mbMFcbsGl7W3pTbVMjFGC', NULL, NULL, NULL, '2021-08-27 06:34:52', '2021-08-27 06:34:52'),
(8, 'cc', 'dsds', NULL, '$2y$10$USwYR3j53zptmOXeyCr0C.DejY67j.RDUn7Ooq/k8PMkvRASo2v4m', NULL, NULL, NULL, '2021-09-02 04:50:37', '2021-09-02 04:50:37'),
(9, 'dsds', 'dsd', NULL, '$2y$10$9OMxmfvLOnuPhCSdn//Arur73YFmbDjTggG0dQCVhmNRtJRXrAwdK', NULL, NULL, NULL, '2021-09-02 04:57:16', '2021-09-02 04:57:16'),
(10, '', 'cc', NULL, '$2y$10$RTscx8vrj7ZHQx19TQxLIe5LDLGlB8/Wh2UJSlVETMU2USh4Ob8re', NULL, NULL, NULL, '2021-09-02 05:32:45', '2021-09-02 05:32:45'),
(11, '', 'ds', NULL, '$2y$10$TFaPSi5cG.mQP748sSaw6eIVW3Pu9Jc74u8tiZQTialZWsOZzchF.', NULL, NULL, NULL, '2021-09-02 05:33:41', '2021-09-02 05:33:41'),
(12, '', 'cxcx', NULL, '$2y$10$SP88t4jO0V26iUAWnl7qWu03sd7Isqe5R0qOhLXdcDVrymoLFtcD.', NULL, NULL, NULL, '2021-09-02 05:40:33', '2021-09-02 05:40:33'),
(13, 'ds', 'dsd@dsdsd.com', NULL, '$2y$10$R8kHwacXsdYUiaBTnAuoUusH5WX8vtZEhxvwC88A3hFUddeElRIsi', NULL, NULL, NULL, '2021-09-02 05:44:39', '2021-09-02 05:44:39'),
(14, 'Vinayak', 'vinayakmali2021@gmail.com', NULL, '$2y$10$3rhX1WEgcgHuPm4LCZ/uBewMhk..OF6tG7p8RLNgcpk6XyyMivHym', NULL, NULL, NULL, '2021-09-07 08:39:15', '2021-09-07 08:39:15'),
(15, 'dsds', 'dsds@dsds.com', NULL, '$2y$10$kB1UaO5nNHfA.mXo9ss2K.HollLKw0GtkbBPleaoRHdtC15JVhG6G', NULL, NULL, NULL, '2021-09-08 05:02:37', '2021-09-08 05:02:37'),
(16, 'Vinayak', 'vinayakmali2019@gmail.com', NULL, '$2y$10$IydnCz.rAwWXy1cP6iddm.wQdy.6XAIYW9VJ.7tKIWGtzrwnSgoBq', NULL, NULL, NULL, '2021-09-08 06:39:58', '2021-09-08 06:39:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
