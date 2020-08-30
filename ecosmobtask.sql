-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 01:56 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecosmobtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `followers_id` int(11) NOT NULL,
  `followed_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `following_id`, `followers_id`, `followed_at`) VALUES
(4, 3, 2, '2020-08-29 13:37:49'),
(6, 2, 1, '2020-08-29 16:13:52'),
(7, 1, 2, '2020-08-30 08:35:20'),
(8, 2, 3, '2020-08-30 08:36:45'),
(9, 1, 3, '2020-08-30 08:37:09'),
(10, 3, 4, '2020-08-30 08:40:10'),
(11, 1, 4, '2020-08-30 08:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(75, 2, 1, '2020-08-29 04:11:05', '2020-08-29 04:11:05'),
(76, 3, 1, '2020-08-29 04:12:26', '2020-08-29 04:12:26'),
(79, 3, 2, '2020-08-29 04:14:41', '2020-08-29 04:14:41'),
(80, 1, 2, '2020-08-29 04:29:06', '2020-08-29 04:29:06'),
(81, 2, 2, '2020-08-29 04:38:19', '2020-08-29 04:38:19'),
(82, 6, 2, '2020-08-29 04:49:04', '2020-08-29 04:49:04'),
(83, 1, 7, '2020-08-30 04:45:40', '2020-08-30 04:45:40'),
(84, 5, 7, '2020-08-30 04:45:47', '2020-08-30 04:45:47'),
(85, 4, 7, '2020-08-30 04:45:48', '2020-08-30 04:45:48'),
(86, 3, 7, '2020-08-30 04:45:53', '2020-08-30 04:45:53'),
(87, 2, 7, '2020-08-30 04:45:58', '2020-08-30 04:45:58'),
(88, 6, 7, '2020-08-30 04:46:17', '2020-08-30 04:46:17'),
(89, 1, 1, '2020-08-30 04:57:50', '2020-08-30 04:57:50'),
(91, 4, 1, '2020-08-30 05:04:09', '2020-08-30 05:04:09'),
(92, 5, 1, '2020-08-30 05:04:10', '2020-08-30 05:04:10'),
(93, 6, 3, '2020-08-30 08:36:33', '2020-08-30 08:36:33'),
(94, 3, 3, '2020-08-30 08:36:35', '2020-08-30 08:36:35'),
(95, 4, 3, '2020-08-30 08:36:56', '2020-08-30 08:36:56'),
(96, 5, 3, '2020-08-30 08:36:57', '2020-08-30 08:36:57'),
(97, 1, 3, '2020-08-30 08:37:01', '2020-08-30 08:37:01'),
(98, 7, 3, '2020-08-30 08:38:13', '2020-08-30 08:38:13'),
(99, 7, 1, '2020-08-30 08:42:14', '2020-08-30 08:42:14'),
(100, 6, 1, '2020-08-30 08:42:17', '2020-08-30 08:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Greater kashmir', 'The Higher Education Department (HED) on Tuesday announced winter vacation for Government Degree Colleges (GDCs) in Kashmir and in winter zones of Jammu.\r\n\r\nAs per the government order, all the GDCs in Kashmir and winter zones of Jammu would observe winter vacation from December 21 to February 7, 2020.', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-27 00:00:00', '2020-08-27 00:00:00'),
(2, 1, 'Winter vacation in Kashmir colleges from Dec 21', 'The Higher Education Department (HED) on Tuesday announced winter vacation for Government Degree Colleges (GDCs) in Kashmir and in winter zones of Jammu.\r\n\r\nAs per the government order, all the GDCs in Kashmir and winter zones of Jammu would observe winter vacation from December 21 to February 7, 2020.', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-26 17:22:03', '2020-08-26 17:22:03'),
(3, 1, 'new title', 'ertyu test box', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-26 17:35:00', '2020-08-28 09:30:49'),
(4, 1, 'Template-driven validation', 'jdsalk jalkd jkla dkkldakljjdj', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-28 07:05:38', '2020-08-28 07:05:38'),
(5, 1, 'Template-driven validationert', 'kdjalk kdajkdh  jkdjka  Rehaan', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-28 07:29:08', '2020-08-28 09:29:04'),
(6, 2, 'This is my Post', 'This is a test post', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-29 04:37:42', '2020-08-29 04:37:42'),
(7, 3, 'List group', 'List groups are a flexible and powerful component for displaying a series of content. Modify and extend them to support just about any content within.The most basic list group is an unordered list with list items and the proper classes. Build upon it with the options that follow, or with your own CSS as needed.', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', '2020-08-30 08:38:06', '2020-08-30 08:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin2', 'muzamilahmad729@gmail.com', 'http://localhost/EcosmobTask/public/img/125150-a.png', NULL, '$2y$10$TkpJtBkSGVfgeAb/m1XQtOu3WGMIDWFuSFDlE31wKG0frPnPdWH4m', 'Kz6Ep2pthgvYSiPqmObNU0IqQ934mhju5jVAjZ2zVxzh2uDyELiv2zRUKisP', '2020-08-25 11:49:53', '2020-08-25 11:49:53'),
(2, 'Muzamil2', 'muzamilahmad7292@gmail.com', 'http://localhost/EcosmobTask/public/img/125421-githubprofile.JPG', NULL, '$2y$10$LdfQS8UGHglYWcfyWxYnTOXdvqBzmjJxgdLbLc21gaUjLcew9SPo6', 'fgdZE1bgghLkmEhm3dNhGdp0Kuo79BdE5epxjzuGNzME7Z8GtpwxPOlRbgoK', '2020-08-28 04:16:02', '2020-08-28 04:16:02'),
(3, 'Muzamil Ahmad', 'muzamilahmad@gmail.com', 'http://localhost/EcosmobTask/public/img/083832-a.JPG', NULL, '$2y$10$fdd1mPF3Oddsw48zf64NU.aRG.ofzxwa.Zj7E2mxWQxhlcgHxg5/e', NULL, '2020-08-28 10:09:54', '2020-08-28 10:09:54'),
(4, 'Mudasir Ahmad', 'muzamilahmad78@gmail.com', 'http://localhost/EcosmobTask/public/img/083953-b.JPG', NULL, '$2y$10$Y1AHn.wt2PLF9Y7bvmtg2Od3ip4n/obhuAX1IPfE9qDsWJy5P4BOe', NULL, '2020-08-28 10:11:15', '2020-08-28 10:11:15'),
(5, 'Zubair', 'zubair@gmail.com', NULL, NULL, '$2y$10$yRnSul/5mhQOffo/9h927uHjsUQ7oV/fh4KThDcY7qDyoHj3Hhf.6', NULL, '2020-08-29 11:56:38', '2020-08-29 11:56:38'),
(6, 'zubair', 'zubair1@gmail.com', NULL, NULL, '$2y$10$.HZKKtqBcjiuWV61ferCHOYQMy5Qlx2.IEr53Ax.JnQAHba4U2JD.', NULL, '2020-08-29 11:57:58', '2020-08-29 11:57:58'),
(7, 'Zubair', 'zubairah@gmail.com', NULL, NULL, '$2y$10$mLT9bvCnSxhYL7QJWDrQguskF9yZt3AB8B4RvSnHdvj61nRQAY/.u', NULL, '2020-08-29 23:15:32', '2020-08-29 23:15:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
