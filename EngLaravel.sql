-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2020 at 02:34 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EngLaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MXT2K', 'someemail@gmail.com', NULL, NULL, 1, '$2y$10$MaDnsOC4Y.EJ.icURZ.40Ohob0BI1hTCsOe3RmnP/8ARWXUqoy5zO', 'EAcI0hsi7MEQHQMet2rDMKoGI3DGG952PNAt8dMsEJCwKvwZ9PsdiNphPcvA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cate_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_slug`, `cate_avatar`, `created_at`, `updated_at`, `cate_active`) VALUES
(1, 'Công nghệ thông tin', 'cong-nghe-thong-tin', '2019-12-27__cong-nghe-thong-tin.jpg', '2019-12-26 22:51:27', '2020-01-01 12:25:09', 0),
(2, 'Du lịch', 'du-lich', '2020-01-01__du-lich.jpg', '2020-01-01 06:26:19', '2020-01-01 12:25:08', 0),
(3, 'Y học', 'y-hoc', '2020-01-01__y-hoc.jpg', '2020-01-01 06:27:04', '2020-01-01 06:27:04', 0),
(4, 'Kinh tế', 'kinh-te', '2020-01-01__kinh-te.jpg', '2020-01-01 06:27:37', '2020-01-01 06:27:37', 0),
(5, 'Kiến trúc', 'kien-truc', '2020-01-01__kien-truc.jpg', '2020-01-01 06:28:23', '2020-01-01 06:28:23', 0),
(6, 'Ngoại ngữ', 'ngoai-ngu', '2020-01-01__ngaoi-ngu.jpg', '2020-01-01 06:37:50', '2020-01-01 06:37:50', 0),
(7, 'Kĩ thuật', 'ki-thuat', '2020-01-01__ky-thuat.jpg', '2020-01-01 06:41:41', '2020-01-01 06:41:41', 0),
(8, 'Khoa học xã hội', 'khoa-hoc-xa-hoi', '2020-01-01__nganh-khoa-hoc-xa-hoi.jpg', '2020-01-01 12:25:02', '2020-01-01 12:25:02', 0),
(9, 'Nông - Lâm - Ngư nghiệp', 'nong-lam-ngu-nghiep', '2020-01-01__nong-lam-ngu-nghep.jpg', '2020-01-01 12:27:18', '2020-01-01 12:27:18', 0),
(10, 'Văn hóa nghệ thuật', 'van-hoa-nghe-thuat', '2020-01-01__vhnt.png', '2020-01-01 12:31:50', '2020-01-01 12:31:50', 0),
(11, 'Khoa học tự nhiên', 'khoa-hoc-tu-nhien', '2020-01-01__khoa-hoc-tu-nhien.png', '2020-01-01 12:33:08', '2020-01-01 12:33:08', 0);

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
(3, '2019_12_23_175046_create_categories_table', 1),
(4, '2019_12_23_175322_create_sub_categories_table', 1),
(5, '2019_12_23_180428_create_vocabularies_table', 1),
(6, '2019_12_23_184256_create_my_libraries_table', 1),
(7, '2019_12_23_185959_create_my_sub_categories_table', 1),
(8, '2019_12_23_190012_create_my_categories_table', 1),
(9, '2019_12_26_024249_create_table_admin', 2),
(10, '2019_12_27_051317_alter_column_cate_active_in_table_categories', 3),
(11, '2019_12_27_181208_alter_column_subcate_active_in_table_sub_categories', 4),
(12, '2019_12_27_183812_alter_column_cate_id_in_table_sub_categories', 5),
(13, '2019_12_28_152018_alter_table_users', 6),
(14, '2019_12_28_160504_alter_column_active_table_users', 7),
(15, '2019_12_29_142121_alter_column_user_id_in_table_my_categories', 8),
(16, '2019_12_29_144313_alter_column_cate_id_in_table_vocabularies', 8),
(17, '2019_12_29_144341_alter_column_subcate_id_in_table_vocabularies', 8),
(18, '2019_12_29_145004_rename_table_my_libraries_to_table_my_vocabularies', 8),
(19, '2019_12_31_184412_alter_column_my_category_id_in_table_my_sub_categories', 8);

-- --------------------------------------------------------

--
-- Table structure for table `my_categories`
--

CREATE TABLE `my_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `my_cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_cate_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_categories`
--

INSERT INTO `my_categories` (`id`, `my_cate_name`, `my_cate_slug`, `my_cate_avatar`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'CNTT2', 'cntt2', '2020-01-01__cong-nghe-thong-tin.jpg', '2019-12-31 19:42:00', '2019-12-31 19:43:06', 16),
(2, 'Test', 'test', '2020-01-01__ngaoi-ngu.jpg', '2020-01-01 12:42:54', '2020-01-01 12:42:54', 16);

-- --------------------------------------------------------

--
-- Table structure for table `my_sub_categories`
--

CREATE TABLE `my_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `my_subcate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_subcate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_subcate_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `my_category_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_sub_categories`
--

INSERT INTO `my_sub_categories` (`id`, `my_subcate_name`, `my_subcate_slug`, `my_subcate_avatar`, `created_at`, `updated_at`, `my_category_id`) VALUES
(1, 'Khoa hoc may tinh', 'khoa-hoc-may-tinh', '2020-01-01__cong-nghe-thong-tin.jpg', '2019-12-31 19:42:36', '2019-12-31 19:42:36', 1),
(2, 'KHMT', 'khmt', '2020-01-01__khoa-hoc-tu-nhien.png', '2020-01-01 12:56:20', '2020-01-01 12:56:20', 1),
(3, 'Thiet ke', 'thiet-ke', '2020-01-01__thiet-ke-do-hoa.jpg', '2020-01-01 12:57:12', '2020-01-01 12:57:12', 1),
(4, 'Phan mem', 'phan-mem', '2020-01-01__cong-nghe-phan-mem.jpg', '2020-01-01 12:57:38', '2020-01-01 12:57:38', 1),
(5, 'Mang MT', 'mang-mt', '2020-01-01__ki-thuat-mang.jpg', '2020-01-01 12:57:52', '2020-01-01 12:57:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_vocabularies`
--

CREATE TABLE `my_vocabularies` (
  `id` int(10) UNSIGNED NOT NULL,
  `my_voca_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_mean` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_spell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_example_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_example_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_voca_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcate_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcate_active` tinyint(4) NOT NULL DEFAULT 0,
  `cate_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcate_name`, `subcate_slug`, `subcate_avatar`, `created_at`, `updated_at`, `subcate_active`, `cate_id`) VALUES
(2, 'Khoa học máy tính', 'khoa-hoc-may-tinh', '2019-12-28__khoa-hoc-may-tinh.jpg', '2019-12-28 00:21:15', '2019-12-28 00:21:18', 1, 1),
(3, 'Kĩ thuật mạng', 'ki-thuat-mang', '2020-01-01__ki-thuat-mang.jpg', '2020-01-01 11:49:09', '2020-01-01 11:49:16', 1, 1),
(4, 'Công nghệ phần mềm', 'cong-nghe-phan-mem', '2020-01-01__cong-nghe-phan-mem.jpg', '2020-01-01 11:51:27', '2020-01-01 11:52:29', 1, 1),
(5, 'Hệ thống thông tin quản lý', 'he-thong-thong-tin-quan-ly', '2020-01-01__he-thong-thong-tin-quan-li.jpg', '2020-01-01 11:53:37', '2020-01-01 11:53:37', 0, 1),
(6, 'Big Data & Machine Learning', 'big-data-machine-learning', '2020-01-01__big-data-machine-learning.jpg', '2020-01-01 11:55:37', '2020-01-01 11:55:37', 0, 1),
(7, 'Thiết kế Đồ họa', 'thiet-ke-do-hoa', '2020-01-01__thiet-ke-do-hoa.jpg', '2020-01-01 11:56:18', '2020-01-01 12:34:08', 0, 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `code_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `avatar`, `active`, `address`, `about`, `code`, `time_code`, `code_active`, `time_active`) VALUES
(16, 'Mai Xuân Thưởng', 'nochonobiet@gmail.com', '$2y$10$lNmhmNcFXKQmdcXPAgiYSOaOmBPQ1zDyedUH2Ve5EyqJmoQJk9ZyC', NULL, '2019-12-28 09:58:29', '2019-12-28 09:58:29', '123456789', NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$o1Uk3vs5snYRDesgBF2T5.cLy3NyHvCvvcWe9hw0Gj1g938xVmZUG', '2019-12-28 09:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `vocabularies`
--

CREATE TABLE `vocabularies` (
  `id` int(10) UNSIGNED NOT NULL,
  `voca_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_mean` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_spell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_example_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_example_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voca_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cate_id` int(11) NOT NULL DEFAULT 0,
  `subcate_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_active_index` (`active`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_cate_active_index` (`cate_active`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_categories`
--
ALTER TABLE `my_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_categories_user_id_index` (`user_id`);

--
-- Indexes for table `my_sub_categories`
--
ALTER TABLE `my_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_sub_categories_my_category_id_index` (`my_category_id`);

--
-- Indexes for table `my_vocabularies`
--
ALTER TABLE `my_vocabularies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_subcate_active_index` (`subcate_active`),
  ADD KEY `sub_categories_cate_id_index` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_active_index` (`active`),
  ADD KEY `users_code_index` (`code`),
  ADD KEY `users_code_active_index` (`code_active`);

--
-- Indexes for table `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vocabularies_cate_id_index` (`cate_id`),
  ADD KEY `vocabularies_subcate_id_index` (`subcate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `my_categories`
--
ALTER TABLE `my_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `my_sub_categories`
--
ALTER TABLE `my_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `my_vocabularies`
--
ALTER TABLE `my_vocabularies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vocabularies`
--
ALTER TABLE `vocabularies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
