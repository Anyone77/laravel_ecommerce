-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 01:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `product_name`, `price`, `quantity`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`, `address`) VALUES
(43, 'admin', 'admin@gmail.com', '090', 'Shoe', '3600', '4', '20221214061538.jpg', '5', '2', '2022-12-30 09:58:08', '2022-12-30 09:58:37', 'lkadsj'),
(44, 'admin', 'admin@gmail.com', '090', 'Shirt', '7200', '4', '20221214061608.jpg', '6', '2', '2022-12-30 09:58:22', '2022-12-30 09:58:22', 'lkadsj'),
(55, 'user', 'user@gmail.com', '0980', 'Macbook', '200000', '2', '20221214062117.jpg', '8', '1', '2023-01-01 09:03:10', '2023-01-01 09:03:14', 'fdjlkaj'),
(56, 'user', 'user@gmail.com', '0980', 'Shoe', '1800', '2', '20221214061538.jpg', '5', '1', '2023-01-01 09:06:34', '2023-01-01 09:06:34', 'fdjlkaj'),
(57, 'user', 'user@gmail.com', '0980', 'Shirt', '10800', '6', '20221214061608.jpg', '6', '1', '2023-01-01 09:06:54', '2023-01-01 09:06:54', 'fdjlkaj');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(6, 'Clothes', '2022-12-13 00:15:06', '2022-12-13 00:21:41'),
(7, 'Mobile Phone', '2022-12-13 01:09:47', '2022-12-13 01:09:47'),
(8, 'Laptop', '2022-12-13 23:47:46', '2022-12-13 23:47:46'),
(9, 'Tv', '2022-12-13 23:48:05', '2022-12-13 23:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'user', 'first comment', '1', '2022-12-28 02:02:55', '2022-12-28 02:02:55'),
(5, 'user', 'second comment', '1', '2022-12-28 02:03:43', '2022-12-28 02:03:43'),
(6, 'admin', 'admin comment', '2', '2022-12-28 02:29:57', '2022-12-28 02:29:57'),
(7, 'Khant', 'khant add comment', '4', '2022-12-30 02:58:05', '2022-12-30 02:58:05'),
(8, 'admin', 'appe', '2', '2022-12-30 07:32:57', '2022-12-30 07:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_12_023349_create_sessions_table', 1),
(7, '2022_12_12_163226_create_categories_table', 1),
(8, '2022_12_13_080653_create_products_table', 2),
(9, '2022_12_13_090828_create_products_table', 3),
(10, '2022_12_14_161642_create_carts_table', 4),
(11, '2022_12_14_164943_add_address_to_carts_table', 5),
(12, '2022_12_14_165122_add_address_to_carts_table', 6),
(13, '2022_12_15_131432_create_orders_table', 7),
(14, '2022_12_16_155546_add_price_to_orders_table', 8),
(15, '2022_12_17_153207_create_notifications_table', 9),
(16, '2022_12_28_073841_create_comments_table', 10),
(17, '2022_12_28_074014_create_replies_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_name`, `quantity`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`, `price`) VALUES
(20, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Iphone', '1', '20221214062148.jpg', '9', 'cash on delivery', 'You cancel your order', '2022-12-18 04:33:38', '2022-12-18 06:21:45', '20000'),
(21, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Macbook', '1', '20221214062117.jpg', '8', 'cash on delivery', 'You cancel your order', '2022-12-18 04:33:38', '2022-12-18 06:21:53', '100000'),
(22, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Iphone', '1', '20221214062148.jpg', '9', 'cash on delivery', 'processing', '2022-12-18 04:34:19', '2022-12-18 04:34:19', '20000'),
(23, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Shoe', '2', '20221214061538.jpg', '5', 'cash on delivery', 'processing', '2022-12-18 04:45:33', '2022-12-18 04:45:33', '900'),
(24, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Shirt', '2', '20221214061608.jpg', '6', 'cash on delivery', 'processing', '2022-12-18 04:45:33', '2022-12-18 04:45:33', '1800'),
(25, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Shoe', '1', '20221214061538.jpg', '5', 'cash on delivery', 'processing', '2022-12-30 07:34:48', '2022-12-30 07:34:48', '900'),
(26, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Shirt', '1', '20221214061608.jpg', '6', 'cash on delivery', 'processing', '2022-12-30 07:34:48', '2022-12-30 07:34:48', '1800'),
(27, 'admin', 'admin@gmail.com', '090', 'lkadsj', '2', 'Shoe', '1', '20221214061538.jpg', '5', 'cash on delivery', 'processing', '2022-12-30 07:34:48', '2022-12-30 07:34:48', '900');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `category_id`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(5, 'Shoe', 'Find the best athletic shoes, sneakers and more at DSW. Free shipping, great deals and VIP perks. Shop the latest shoes online or at your nearest shoe store.', '20221214061538.jpg', 6, '100', '1000', '900', '2022-12-13 23:45:38', '2022-12-14 10:03:56'),
(6, 'Shirt', 'D2 Shirt', '20221214061608.jpg', 6, '59', '2000', '1800', '2022-12-13 23:46:08', '2022-12-14 10:03:47'),
(7, 'Jens', 'Lee Jens', '20221214061732.jpg', 6, '300', '2000', NULL, '2022-12-13 23:47:32', '2022-12-14 10:03:39'),
(8, 'Macbook', 'Apple Macbook', '20221214062117.jpg', 8, '6', '100000', NULL, '2022-12-13 23:51:17', '2022-12-14 10:03:30'),
(9, 'Iphone', 'Apple Iphone', '20221214062148.jpg', 7, '5', '20000', NULL, '2022-12-13 23:51:48', '2022-12-14 10:03:20'),
(10, 'Samsung Tv', 'Samsung Tv', '20221214062223.jpg', 9, '20', '40000', '39000', '2022-12-13 23:52:23', '2022-12-14 10:02:49'),
(11, 'Iwatch', 'apple iwatch', '20221214155854.jpg', 7, '10', '3000', '2900', '2022-12-14 09:28:54', '2022-12-14 09:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'admin', '4', 'frist reply', '2', '2022-12-28 04:33:12', '2022-12-28 04:33:12'),
(3, 'admin', '4', NULL, '2', '2022-12-28 04:43:26', '2022-12-28 04:43:26'),
(4, 'admin', '5', NULL, '2', '2022-12-30 02:31:11', '2022-12-30 02:31:11'),
(5, 'admin', '5', 'admin reply to user', '2', '2022-12-30 02:31:30', '2022-12-30 02:31:30'),
(6, 'Khant', '7', 'reply to user khant', '4', '2022-12-30 02:58:17', '2022-12-30 02:58:17'),
(7, 'Khant', '6', 'hello', '4', '2022-12-30 03:02:04', '2022-12-30 03:02:04'),
(8, 'user', '6', NULL, '1', '2023-01-14 05:51:48', '2023-01-14 05:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1Kz4helvfSvu57yKOFUrNEoylJXw9OlnIakbuWEa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibE5QZEU5SlZoM2JXVE1uS1dsR1Y3Z0JoTGJUSmV6VDBoNnRWS2pkVCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NToiYWxlcnQiO2E6MDp7fX0=', 1672587465),
('ZNNNKM1bfGF2yo8zov804KiIUypGEPm7kPFsJSgS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU3lSM0owWWRTTVZwazkwNlFqUUdGRzV6aWwzcTRWcVNhVW5zZjJxNCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1673698908);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '0', '0980', 'fdjlkaj', NULL, '$2y$10$V8o4K8aWnj5Iew.gg42G2.pRQRtuJsy80B3AS6oXga16q4OMprnbS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 10:15:55', '2022-12-12 10:15:55'),
(2, 'admin', 'admin@gmail.com', '1', '090', 'lkadsj', NULL, '$2y$10$1EBAM2SA0Urya0GiGkJi1.TsWnp4wBovv2./BdjE428MJzRCuI5Se', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 10:16:24', '2022-12-12 10:16:24'),
(3, 'khant', 'khantminthant2001@gmail.com', '1\r\n', '09405370573', 'Nay Pyi Taw', '2022-12-17 02:49:28', '$2y$10$vOsZNmHodOAewv5v53woxO/BoMfSRj6ZUGnEqd4mZIpRUklOBLhKu', NULL, NULL, NULL, 'EIjLXFsxaFkgkBGjeGWFfKxoXsK2yj0DQrotMT2HvrrBRzDntNXlAikXldh3', NULL, NULL, '2022-12-17 02:48:43', '2022-12-17 02:49:28'),
(4, 'Khant', 'trust@gmail.com', '0', '09405370573', 'magway', NULL, '$2y$10$RhetI/T0RWhzGL9jk6sDs.Q5d9ve7/i5Wt/e8eFa3d/OCX5Il2xsO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-30 02:54:40', '2022-12-30 02:54:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
