-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2021 at 08:22 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `manage_password`
--

CREATE TABLE `manage_password` (
  `id` bigint NOT NULL,
  `login_url` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `userids` longtext COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_password`
--

INSERT INTO `manage_password` (`id`, `login_url`, `username`, `password`, `userids`, `created_at`, `updated_at`) VALUES
(1, 'google.com', 'abc', '1Pass@23', '4,7', '2021-10-04 07:42:48', '2021-10-04 10:25:31'),
(4, 'google.com', 'abc', '1Pass@23', NULL, '2021-10-04 07:42:48', '2021-10-04 07:44:01'),
(5, 'google.com', 'abc', '1Pass@23', NULL, '2021-10-04 07:42:48', '2021-10-04 07:44:01'),
(7, 'ff.com', 'abc', '1Pass@23', NULL, '2021-10-04 07:42:48', '2021-10-04 07:44:01'),
(8, 'dddd', 'eee', 'fff', '2,3,4', '2021-10-04 07:44:17', '2021-10-04 10:20:09'),
(9, 'aaa', 'rrr', 'ttt', '2,3,4', '2021-10-04 08:36:26', '2021-10-04 10:19:34'),
(10, 'facebook.com', 'asds', 'ewerew', '3,4,5', '2021-10-04 10:29:02', '2021-10-04 10:29:02'),
(11, 'aaa', 'aaa', 'aaa', '2,4', NULL, '2021-10-04 14:36:42'),
(12, 'asdsa', 'aaa', 'dddd', '3,4', '2021-10-04 09:07:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('F8b232CQQmM5AdkdrcRUWiSBrmZ7P8vi5UhMsuR3', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkxxUTZCWlVCRWxJRk1xQ0NCbmE4SWxrZ1lWcDJlSTVoNDVmTFcweiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1633359019),
('dvCsMmqe8NfgDmKR0ZUDy0iYzJxHxFb5D1wRoklr', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialNKZlRLaEd2M2NOdU1xUGhKdWtPbHR0TXBHbXlISldlQklqSUJxTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1633351140);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_user` smallint NOT NULL DEFAULT '0',
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `external_user`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Vinayak.Mali', 'Vinayak.Mali@harbingergroup.com', NULL, '$2y$10$X/HYQBMk9gC6xLxR4EnSAu/W9PcHFmSd7DMsteEOPy51ZYiRO6hb2', 1, NULL, NULL, NULL, '2021-08-26 07:56:12', '2021-08-26 07:56:12'),
(3, 'Vinayak.Mali1', 'Vinayak.Mali1@harbingergroup.com', NULL, '$2y$10$gU61BDmNgnV5EvNT8jyI.ujpbEzv9yEPvybikAtUkVwdjEAswp.G2', 1, NULL, NULL, NULL, '2021-08-26 08:00:00', '2021-08-26 08:00:00'),
(4, 'vinayak.mali159', 'vinayak.mali159@hotmail.com', NULL, '$2y$10$a.cxYBEHFMPKTnNXvccuDOPIWaRUGXTmWb2mQYapIlg0yUpy4mkVG', 1, NULL, NULL, NULL, '2021-08-27 02:23:20', '2021-08-27 02:23:20'),
(5, 'Vinayak.Maliwww', 'Vinayak.Maliwww@harbingergroup.com', NULL, '$2y$10$4a8jZf.1yJ38EMJaVqKNsOABfPJpPYjkK3BwdeqZAOm.esXmpTRHm', 1, NULL, NULL, NULL, '2021-08-27 02:26:28', '2021-08-27 02:26:28'),
(6, 'qqvinayak.mali', 'qqvinayak.mali@harbingergroup.com', NULL, '$2y$10$nXuWNd/lQn9DlbpyLsMSgO7eUxVAlX5Qv18hT2KjM4CALWLZkxq5m', 1, NULL, NULL, NULL, '2021-08-27 02:27:30', '2021-08-27 02:27:30'),
(20, 'aaa', 'aa@22.aaq', NULL, 'f337d55233710b2f73e1b903cffd4efc', 1, NULL, NULL, NULL, '2021-10-04 08:51:20', NULL),
(17, 'Parthajeet', 'test@test.com', NULL, '$2y$10$YuQkGoSpG/JfNvD8eTgkse5biI0VLCbllo1KHZuxB2pSk0z6AfDbO', 0, NULL, NULL, NULL, '2021-09-30 08:10:40', '2021-09-30 08:10:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manage_password`
--
ALTER TABLE `manage_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `manage_password`
--
ALTER TABLE `manage_password`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
