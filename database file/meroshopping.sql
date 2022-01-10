-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2021 at 07:19 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `meroshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `first_address` varchar(255) NOT NULL,
  `second_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `final_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `firstname`, `lastname`, `company_name`, `first_address`, `second_address`, `city`, `state`, `zip`, `user_email`, `user_phone`, `final_cost`) VALUES
(7, 'demba', 'afw', 'ewtew', 'Kapan', 'ewtwet', 'Kathmandu', '2', '00977', 'pemba.nuru59@gmail.com', '9842819652', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `cart_by` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `photo_id`, `cart_by`, `quantity`) VALUES
(1, 8, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2020_10_22_071323_add_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tenzin123@gmail.com', '$2y$10$evSpG9aSRIhM2GLU.ZWAx.eJLpZRqxYfPC8soxRn5bk8iOmYLBLI.', '2020-11-19 23:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `product_id`, `photo`) VALUES
(8, 7, 'pexels-photo-1027130.jpeg'),
(9, 7, 'pexels-photo-2529148.jpeg'),
(10, 8, 'pexels-photo-1159670.jpeg'),
(11, 7, 'pexels-photo-1280064.jpeg'),
(13, 8, 'pexels-photo-1904769.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inserted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `brand`, `price`, `inserted_by`) VALUES
(7, 'Nemesis', 'Shoe', 'Adidas', '200', 1),
(8, 'Vans', 'Casual', 'Vans Of the wall', '200', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `address`, `contact`, `remember_token`, `created_at`, `updated_at`, `role`, `social`) VALUES
(1, 'demba', 'pemba.nuru59@gmail.com', '2020-11-18 00:42:47', '$2y$10$7.pMIqmZUsdjT0IHIltCyO6aQHzxL6IAuNDguy5GaorAtczzMicLq', 'myimg.jpg', 'Kapan', '9842819652', '4bTCSAxPUIkUyJtTi0UDT3NkzLHLCjDfeE2oOcqOsSkFQGhJlakHjWiNI3iK', '2020-10-26 01:01:21', '2020-11-19 23:59:02', 'seller', NULL),
(2, 'Sykes', 'sykes123@gmail.com', '2020-11-18 00:52:30', '$2y$10$aqDsJrRQmHEJYpSVyZsMKe6VywIJGmczr25JSy56nmQaRCyz4cVbi', NULL, 'Sukhedhara', '9842819652', NULL, '2020-11-02 23:00:48', '2020-11-18 00:52:30', 'admin', NULL),
(3, 'Tenzin2', 'tenzin123@gmail.com', '2020-11-18 00:54:59', '$2y$10$CLtBiMRsOXbB0MJoDiyGLuSxjwUi5vJjkBOzT0zUsfb5Rnp2od6TW', 'pexels-photo-3621521.jpeg', 'Boudha', '9842819652', '65Mf9sLys9qzXKPsiJkuJ09PLX2uNtK37jVr90WkBUxqJlPdfkTsoAgi7baR', '2020-11-02 23:45:37', '2020-11-19 23:44:47', 'customer', NULL),
(4, 'Rajan', 'rb123@gmail.com', '2020-11-20 00:20:24', '$2y$10$I7WMksvrLjAK9qd64Xi40etS5QK0qKZ853XTPWIv0qutqh2egkzQ2', NULL, 'Galfutar', '9842819652', 'a06vhuZ3Bd5Y0NC2q4sKw4Kqa2UlPMv5kvDTToMT0Me78R4yn2x4oufRYYeA', '2020-11-02 23:46:52', '2020-11-20 00:20:24', 'seller', NULL),
(9, 'kami sherpa', 'kamisherpa352@gmail.com', '2020-11-23 01:58:07', '$2y$10$6/pFA1ld6dm6G9SsCGygS.YD76xtesmlllQfckYE.ssbikXkdCMPS', 'https://lh3.googleusercontent.com/a-/AOh14Gi_sDZ-jKEACFXlAsx-LCHpYJLaP9OrMSGTbZ_qJA=s96-c', 'Kapan', '9842819652', NULL, '2020-11-23 01:58:07', '2020-11-23 01:58:07', 'customer', '110045396171079872100'),
(10, 'Pemba Sherpa', 'nuru_pemba59@yahoo.com', '2020-11-24 23:38:47', '$2y$10$78t0aK2MZbmyU2Hg0nZOf.xHYUzZAVr1TOa7lJJZE1.GD4zcB2LaO', 'https://graph.facebook.com/v3.3/3840152542683872/picture?access_token=EAACxKI1kPAIBAFGsQSRw6C2QVW7ZCsxDmaJj7NxnqcsYTwQlE91xlyNtd3ZCv0l1ZCgJwD6aePXkmttYQMgrEsCctazEVa9pDiKtiIkOwCPUmrI3kPIEBGwm8jZAVWZCAZC87jkmhZATSSOpMjmhZCZC5m8l0ZAKt8SmB0ZCZC8He4HWgwZDZD&t', 'Kapan', '9842819652', NULL, '2020-11-24 23:38:47', '2020-11-24 23:38:47', 'customer', '3840152542683872');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
