-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 06:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'category1', 'category1 category1 category1 category1', '2019-04-17 11:10:23', '2019-04-17 11:10:23'),
(3, 'category2', 'category2 category2 category2 category2', '2019-04-17 11:10:35', '2019-04-17 11:10:35'),
(4, 'category3', 'category3category3category3category3', '2019-04-17 11:10:46', '2019-04-17 11:10:46'),
(5, 'category4', 'category4 category4 vcategory4', '2019-04-17 11:10:59', '2019-04-17 11:10:59'),
(6, 'category5', 'category5', '2019-04-17 11:11:09', '2019-04-17 11:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `body`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 6, 'comment for test', '2019-04-17 11:34:44', '2019-04-17 11:34:44', 3),
(2, 4, 'test commentjhf sjayduih dsaui', '2019-04-17 11:35:13', '2019-04-17 11:35:13', 3),
(3, 6, 'comment from saad', '2019-04-17 11:36:05', '2019-04-17 11:36:05', 7),
(4, 2, 'comment from saad here', '2019-04-17 11:36:28', '2019-04-17 11:36:28', 7);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `like`, `created_at`, `updated_at`) VALUES
(8, 3, 1, 1, '2019-04-16 20:57:49', '2019-04-16 20:57:49'),
(19, 1, 1, 0, '2019-04-16 23:36:06', '2019-04-16 23:36:06'),
(20, 1, 2, 1, '2019-04-17 11:28:31', '2019-04-17 11:28:31'),
(21, 1, 3, 0, '2019-04-17 11:28:33', '2019-04-17 11:28:33'),
(22, 1, 4, 1, '2019-04-17 11:28:36', '2019-04-17 11:28:36'),
(23, 1, 5, 0, '2019-04-17 11:28:38', '2019-04-17 11:28:38'),
(24, 1, 6, 1, '2019-04-17 11:28:40', '2019-04-17 11:28:40'),
(25, 3, 2, 1, '2019-04-17 11:31:32', '2019-04-17 11:31:32'),
(26, 3, 3, 1, '2019-04-17 11:31:35', '2019-04-17 11:31:35'),
(27, 3, 4, 0, '2019-04-17 11:31:37', '2019-04-17 11:31:37'),
(28, 3, 5, 1, '2019-04-17 11:31:38', '2019-04-17 11:31:38'),
(29, 3, 6, 1, '2019-04-17 11:31:41', '2019-04-17 11:31:41'),
(30, 7, 1, 1, '2019-04-17 11:35:40', '2019-04-17 11:35:40'),
(31, 7, 2, 0, '2019-04-17 11:35:42', '2019-04-17 11:35:42'),
(32, 7, 3, 1, '2019-04-17 11:35:44', '2019-04-17 11:35:44'),
(33, 7, 4, 1, '2019-04-17 11:35:47', '2019-04-17 11:35:47'),
(34, 7, 6, 1, '2019-04-17 11:35:51', '2019-04-17 11:35:51');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_10_184619_create_posts_table', 1),
(4, '2019_04_10_203202_add_url_to_posts', 1),
(5, '2019_04_11_043946_create_comments_table', 1),
(6, '2019_04_16_081745_create_categories_table', 1),
(7, '2019_04_16_082318_add_cat_id_to_post', 1),
(8, '2019_04_16_140408_create_roles_table', 1),
(9, '2019_04_16_142508_create_user_role_table', 1),
(10, '2019_04_16_202510_create_likes_table', 2),
(12, '2019_04_16_231843_add_user_id_to_comments', 3),
(13, '2019_04_16_235510_create_settings_table', 4);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `url`, `cat_id`) VALUES
(1, 'test post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', '2019-04-16 18:16:17', '2019-04-16 18:16:17', '1555445777.jpg', 1),
(2, 'post1', 'Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', '2019-04-17 11:20:31', '2019-04-17 11:20:31', '1555507231.jpg', 3),
(3, 'post2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', '2019-04-17 11:21:56', '2019-04-17 11:21:56', '1555507316.jpg', 4),
(4, 'post5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', '2019-04-17 11:24:37', '2019-04-17 11:24:37', '', 4),
(5, 'post5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', '2019-04-17 11:25:16', '2019-04-17 11:25:16', '', 4),
(6, 'post6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.', '2019-04-17 11:27:56', '2019-04-17 11:27:56', '1555507676.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'editor', 'editor', NULL, NULL),
(3, 'user', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `desc`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'stop_comment', '0', '', 1, NULL, NULL),
(2, 'stop_register', '0', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sam', 'sam@gmail.com', NULL, '$2y$10$9QJWUGT9xpVeihaI.u0qtOFkVV9scQOOzXQTod48BACAjNj3gyNfC', NULL, '2019-04-16 13:09:51', '2019-04-16 13:09:51'),
(2, 'etisam', 'ebtisam@gmail.com', NULL, '$2y$10$oac0msH/0iUOhp7BN4vpBufSnfaC8NcApbHM627.j59Nvo3TEVVA2', NULL, '2019-04-16 13:10:18', '2019-04-16 13:10:18'),
(3, 'aml', 'aml@gmail.com', NULL, '$2y$10$KfkdVSD.2JOxwSmJ.1piluuTuaUwTlFh0nO0MnIsdcuS6VDwJ9nzG', NULL, '2019-04-16 13:10:44', '2019-04-16 13:10:44'),
(4, 'dalia', 'dalia@gmail.com', NULL, '$2y$10$SJcq246sDdcmhGYlmb2zMOrczK9JqGL.L3l16cpaOsjuaHVHm9aci', NULL, '2019-04-16 14:14:56', '2019-04-16 14:14:56'),
(6, 'test', 'admin123@test.com', NULL, '$2y$10$6d8wsMh.6lT2TBuAEfHHIug.stuS3M.nAMia8T9vJ8UMuM0OEW6fi', NULL, '2019-04-16 14:22:55', '2019-04-16 14:22:55'),
(7, 'saad', 'saad@gmail.com', NULL, '$2y$10$rWD/.Zt4SAatYNyAsYBG4uuDN1PMmdQQHhCqoBZ0ePCVSlVcXLBXW', NULL, '2019-04-17 11:35:35', '2019-04-17 11:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 3, 3, NULL, NULL),
(4, 6, 3, NULL, NULL),
(5, 4, 3, NULL, NULL),
(8, 1, 3, NULL, NULL),
(9, 1, 2, NULL, NULL),
(10, 1, 1, NULL, NULL),
(16, 2, 3, NULL, NULL),
(17, 2, 2, NULL, NULL),
(18, 7, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
