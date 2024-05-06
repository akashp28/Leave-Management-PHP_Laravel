-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 12:32 PM
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
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leavelist`
--

CREATE TABLE `leavelist` (
  `leave_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leavelist`
--

INSERT INTO `leavelist` (`leave_id`, `user_id`, `name`, `designation`, `reason`, `content`, `start_date`, `end_date`, `no_of_days`, `status`, `created_at`, `updated_at`) VALUES
(33, 10, 'Example', 'HR', 'Fever', 'Fever', '2024-02-06', '2024-02-08', 2, 'Approved', '2024-02-05 03:33:03', '2024-02-05 03:36:26'),
(34, 10, 'Example', 'HR', 'Personal', 'Personal', '2024-02-22', '2024-02-25', 3, 'Rejected', '2024-02-05 03:33:23', '2024-02-06 05:47:06'),
(35, 11, 'Sample 1', 'Designer', 'Marriage', 'Marriage', '2024-02-03', '2024-02-04', 1, 'Approved', '2024-02-05 03:34:07', '2024-02-05 03:36:31'),
(36, 11, 'Sample 1', 'Designer', 'Tour', 'Tour', '2024-02-12', '2024-02-11', 1, 'Rejected', '2024-02-05 03:34:40', '2024-02-06 00:58:32'),
(37, 12, 'Test1', 'System Admin', 'Health issues', 'Health issues', '2024-02-05', '2024-02-08', 3, 'Approved', '2024-02-05 03:35:26', '2024-02-05 03:36:37'),
(38, 12, 'Test1', 'System Admin', 'Personal', 'Personal', '2024-02-26', '2024-02-28', 2, 'Pending', '2024-02-05 03:35:53', '2024-02-05 03:35:53'),
(40, 10, 'Example', 'HR', 'test', 'test', '2024-02-08', '2024-02-11', 3, 'Rejected', '2024-02-06 02:33:47', '2024-02-06 05:56:05');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_01_103929_create_users_table', 2),
(6, '2024_02_01_105253_create_leavelist_table', 3),
(7, '2024_02_02_050158_add_status_to_users', 4),
(8, '2024_02_05_044112_alter_table_password_reset', 5),
(9, '2024_02_05_065012_alter_table_add_image_column', 6),
(10, '2024_02_05_084556_modify_foreign_key', 7),
(11, '2024_02_05_084623_modify_foreign_key_contraints', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mob_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `designation`, `dob`, `mob_no`, `email`, `username`, `password`, `password_reset_token`, `role`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '1995-05-01', '9999999999', 'admin@admin.com', 'admin', '$2y$12$S/LqBrbn2LeSM1YfCsw3W.92VBlbCL1qYF0pGegUVVbSrvcXCidbS', NULL, 'admin', 'active', 'user_pic_1707123088.jpg', '2024-02-01 06:10:32', '2024-02-01 06:10:32'),
(9, 'Akash', 'Developer', '1999-10-28', '9090909090', 'akash.parikkal08@gmail.com', 'aksh', '$2y$12$rOdz4zcdNQgVFyM4d.vakOZ8Y6/6DeGyZyW7ygDPXmITXnj9zGm9u', 'NULL', 'user', 'active', 'user_pic_1707123088.jpg', '2024-02-05 03:21:29', '2024-02-05 05:41:18'),
(10, 'Example', 'HR', '1995-04-04', '8989898989', 'exam@admin.com', 'exam', '$2y$12$T3ROLytzwGCY9Vclt4sySOEty3TL1ijB.uYMm7qKj8x39FOIJciSa', NULL, 'user', 'active', 'user_pic_1707123321.jpg', '2024-02-05 03:25:21', '2024-02-05 03:30:27'),
(11, 'Sample 1', 'Designer', '2001-12-24', '7865419087', 'sample1@example.com', 'samp1', '$2y$12$LAz3BHmvsJNKblrWQCQtBOV8YrkdnOVNlAYi9awnrCmEM4U./8FxC', NULL, 'user', 'active', 'user_pic_1707123446.jpg', '2024-02-05 03:27:26', '2024-02-05 03:30:30'),
(12, 'Test1', 'System Admin', '1994-04-30', '7260986578', 'test1@admin.com', 'test1', '$2y$12$DhnRUrinOVfNZ39zxv9lBuPKlkl0Te5TELOsu8aBB.017ywNA1q6q', NULL, 'user', 'active', 'user_pic_1707123615.jpg', '2024-02-05 03:30:15', '2024-02-05 05:42:48'),
(13, 'Test 2', 'SEO', '1998-09-27', '7654898789', 'test2@admin.com', 'test2', '$2y$12$BRe.PxxtSRJbl9CgSA797uBDbvDdLC8tl/TaqmYfjhHk872O2TlV2', NULL, 'user', 'inactive', 'user_pic_1707123725.jpg', '2024-02-05 03:32:05', '2024-02-06 00:58:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leavelist`
--
ALTER TABLE `leavelist`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `leavelist_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leavelist`
--
ALTER TABLE `leavelist`
  MODIFY `leave_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leavelist`
--
ALTER TABLE `leavelist`
  ADD CONSTRAINT `leavelist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
