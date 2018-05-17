-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 11:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bapdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_05_11_073005_create_properties_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listingname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agentemail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clientemail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propertyaddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` int(11) DEFAULT NULL,
  `twitter` int(11) DEFAULT NULL,
  `instagram` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `uid`, `listingname`, `agent`, `agentemail`, `clientemail`, `propertyaddress`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(21, 'BAP-05-17-2018-998', 'Sample listasdsad', 'sample agent', 'sampleagent@yahoo.com', 'sampleclient@yahoo.com', 'sample address', 1, 2, 3, '2018-05-17 01:18:39', '2018-05-17 01:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `propertydate`
--

CREATE TABLE `propertydate` (
  `property_uid` varchar(200) NOT NULL,
  `social_media` int(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `schedule_uid` varchar(200) NOT NULL,
  `date_created` date NOT NULL,
  `social_medianame` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propertydate`
--

INSERT INTO `propertydate` (`property_uid`, `social_media`, `start_date`, `end_date`, `schedule_uid`, `date_created`, `social_medianame`) VALUES
('BAP-05-17-2018-998', 2, '2018-05-17', '2018-05-19', 'SCHEDULE--4420-05-17-2018', '2018-05-17', 'twitter'),
('BAP-05-17-2018-998', 1, '2018-05-17', '2018-05-18', 'SCHEDULE--6030-05-17-2018', '2018-05-17', 'facebook'),
('BAP-05-17-2018-998', 3, '2018-05-17', '2018-05-20', 'SCHEDULE--6924-05-17-2018', '2018-05-17', 'instagram');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'toto', 'toto@yahoo.com', '$2y$10$6uYQ5Y9naV3AvnNyCMb6TeHeuWLC1whahONMs/lzI5YLa2y97iKs6', 'cE1Tk1khnyhQnscgn6uLefeSBqOQcobYBqGZWPyywmJd8PiDXZIKgpOvg6G6', '2018-05-10 23:42:49', '2018-05-10 23:42:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_uid_unique` (`uid`),
  ADD UNIQUE KEY `properties_agentemail_unique` (`agentemail`),
  ADD UNIQUE KEY `properties_clientemail_unique` (`clientemail`);

--
-- Indexes for table `propertydate`
--
ALTER TABLE `propertydate`
  ADD PRIMARY KEY (`schedule_uid`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
