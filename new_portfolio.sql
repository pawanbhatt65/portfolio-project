-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 02:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `query_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `phone`, `email`, `subject`, `message`, `query_time`, `created_at`, `updated_at`) VALUES
(1, 'Pawan bhatt', '7351754927', 'pawan@etechdreams.com', 'Test Subject', 'Test Message', '2023-11-22 17:52:12', '2023-11-22 12:22:12', '2023-11-22 12:22:12'),
(2, 'superAdmin', '45234523453', 'teamsetech@gmail.com', 'sdfasdf', 'gdfsgdgfs', '2023-11-22 17:53:23', '2023-11-22 12:23:23', '2023-11-22 12:23:23'),
(3, 'superAdmin', '45234523453', 'teamsetech@gmail.com', 'sdfasdf', 'gdfsgdgfs', '2023-11-22 17:53:23', '2023-11-22 12:23:23', '2023-11-22 12:23:23'),
(4, 'pawan bhatt', '7351754927', '2712chandra@gmail.com', 'This is a demo subject!', 'This is demo message.', '2023-11-25 05:52:57', '2023-11-25 00:22:57', '2023-11-25 00:22:57'),
(5, 'sohan', '4563546354654', 'teamsetech@gmail.com', 'sdfasdf', 'xcvxcvx', '2023-11-25 05:57:57', '2023-11-25 00:27:57', '2023-11-25 00:27:57'),
(6, 'react', '35245243534', 'teamsetech@gmail.com', 'sdfasdf', 'dfsf srgfs df', '2023-11-25 06:02:32', '2023-11-25 00:32:32', '2023-11-25 00:32:32');

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
(5, '2023_11_22_171013_create_contact_table', 1),
(6, '2023_11_26_093057_create_user_registers_table', 2);

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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registers`
--

CREATE TABLE `user_registers` (
  `user_register_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verify` varchar(255) DEFAULT 'no',
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `added_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_registers`
--

INSERT INTO `user_registers` (`user_register_id`, `name`, `phone`, `email`, `email_verify`, `password`, `confirm_password`, `added_at`, `edited_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sohan', '+93752437823', 'pawanb@gmail.com', 'yes', '$2y$12$RMPpiz8aBB4enD.Y0VGsYeVEwGaZz19GBKtwES9tzxJt0ciTvjdrq', '$2y$12$.2kGsDnR1aU3Pc5MZX.hJ.kVkTxsld5ADEu4WUTi8vdmFXX/1LqKm', '2023-11-27 03:09:43', NULL, NULL, '2023-11-27 03:09:44', '2023-11-27 03:09:44'),
(2, 'Paawn', '+8489534985', 'ndc@gmail.com', 'no', '$2y$12$hhZgX7UsxiyvLqNENC9Pb.hM0Obzjco497ucgO9TcwXdc2wE5mzTG', '$2y$12$NYHKpYdByQKY66DZwXl.CuVBmI8VoGeEpJ6cb6te7Whs9FJI974RK', '2023-11-27 09:18:39', NULL, NULL, '2023-11-27 09:18:40', '2023-11-27 09:18:40'),
(3, 'Pawan', '+91683274132', 'pawaan@gmail.com', 'yes', '$2y$12$rQfn92IW8I9ODM2.FD1jVe9xMF3KGoXQ2hcnl2s8ODviK5/egWMhG', '$2y$12$rQ2XkNHAg5N/h75GzabD6eJaca2Skx.jB0ZwRFKxnu4/5sAjo.NI6', '2023-11-27 09:50:33', NULL, NULL, '2023-11-27 09:50:35', '2023-11-27 09:50:35'),
(4, 'Pawan', '+7351754927', 'pawan@gmail.com', 'yes', '$2y$12$Ag8ZLxOONHHAjXna0p1Y9emXW6spZPk3yL7BOKLcrpynTHKNy3kD.', '$2y$12$SOWb/TDErfxliCO8iGi6gu3RH0Ji0jOpw64MF2o.5DxrZK9.VTG7S', '2023-12-01 15:36:28', NULL, NULL, '2023-12-01 15:36:29', '2023-12-01 15:36:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_registers`
--
ALTER TABLE `user_registers`
  ADD PRIMARY KEY (`user_register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_registers`
--
ALTER TABLE `user_registers`
  MODIFY `user_register_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
