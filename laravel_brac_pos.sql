-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 06:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_brac_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `mobile`, `username`, `password`, `image`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kamruzzaman', 'kajol', 'admin@gmail.com', '01646735100', 'admin', '$2y$10$bJF.DrZvBKDqlDP3fjyWMOPc.5Da25Z4QBqy8ahnTzrFsP4SskrSW', 'public/uploads/profile_image/icon-5359553_1280.webp', 1, 1, NULL, NULL),
(3, 'manager', 'rahman', 'manager@gmail.com', NULL, 'manager', '$2y$10$M9fOI6JTehdUE/GvszfBvugBImbYWYv92SV5f4OhjKU/BEtD7ey3q', 'public/uploads/profile_image/kousar.jpg', 2, 1, '2020-02-10 09:13:07', '2020-02-10 09:13:07'),
(4, 'Monzu', 'Automobiles', 'monzuautomobiles89@yahoo.com', '01711563272', 'monzuautomobiles', '$2y$10$7hPwVPofIQHCoHMWBXxHcOouKsU6/E.IIs1cs4QFbeUEwfJRhwsYS', NULL, 1, 1, '2020-02-24 09:03:54', '2020-02-24 09:03:54'),
(5, 'Ashfaq', 'Rahman', 'ashfaq@gmail.com', NULL, 'ashfaq', '$2y$10$wN.nbAaPu.dpaL4N8h52Get5GMyoHWZ.KE31/vfiLPMqQ.4i7LW9S', NULL, 1, 1, '2020-03-05 13:07:33', '2020-03-05 13:07:33'),
(11, 'BRAC SDP', 'Abdullapur', 'abdullahpur.bracsdp@gmail.com', NULL, 'BRAC SDP (Abdullahpur)', '$2y$10$VCB1kK1uSht5wQWSN5Qrfe/BFYC9x0J/fprV7vOS6alX/HZ8/WMZa', NULL, 2, 1, '2022-12-13 11:12:34', '2022-12-13 11:18:53'),
(12, 'BRAC SDP', 'Mohammadpur', 'mohammadpur.bracsdp@gmail.com', NULL, 'BRAC SDP (Mohammadpur)', '$2y$10$/HI0oC6RQ3PZzy2rZlHsGuLESFQoSHoqDl5s9Dk6sIVtctrGg3NsO', NULL, 2, 1, '2022-12-13 11:13:49', '2022-12-13 11:19:01'),
(13, 'Brac SDP', 'Jatrabari', 'jatrabari.bracsdp@gmail.com', '01641290907', 'Brac SDP (Jatrabari)', '$2y$10$Cb0XahYhsVlv574NzOCvXuMJvxNPZbHSVkj9o2ysYNxROfgc8kuU2', 'public/uploads/profile_image/FB_IMG_1614684517054.jpg', 2, 1, '2022-12-13 11:15:02', '2022-12-13 11:15:02'),
(14, 'Brac SDP', 'Sylhet', 'sylhet.bracsdp@gmail.com', NULL, 'Brac SDP (Sylhet)', '$2y$10$3HgRN8keCb.FzpW/vEhSOeaoD67w95x8XFVXdA7dvXNz4m2rhPFk6', NULL, 2, 1, '2022-12-13 11:19:43', '2022-12-13 11:19:43'),
(15, 'Brac SDP', 'Khulna', 'khulna.bracsdp@gmail.com', NULL, 'Brac SDP (Khulna)', '$2y$10$UpHpqJZ0CTuxfzYq9l/uuueQPzQ.CFKgVqRyChEHd.VqNbna.WyJe', NULL, 2, 1, '2022-12-13 11:21:19', '2022-12-13 11:21:53'),
(16, 'Brac SDP', 'Chattogram', 'chattogram.bracsdp@gmail.com', NULL, 'Brac SDP (Chattogram)', '$2y$10$M0jFbLWmfWJK4zJxYQ.FaeVPME3vzpWKtfRuFBr8jiUADh7UBXKuy', NULL, 2, 1, '2022-12-13 11:22:54', '2022-12-13 11:22:54'),
(17, 'BRAC SDP', '(M)', 'brac_sdp_m@gmail.com', NULL, 'BRAC SDP(M)', '$2y$10$CE0.KIeBLJ3yIDN8YLzx5ecu5tS2c2G698oSmXh6JAYCk9xZIbesW', NULL, 1, 1, '2022-12-13 11:24:33', '2022-12-13 11:24:33'),
(18, 'Shakil', 'Ahmed', 'shakil@gmail.com', '01680419920', 'shakil001', '$2y$10$l.SiyIYQ/uVttnRkF2OzyOCoB4aMEoc7k5m43iXfzeYBk6yfs3X1K', NULL, 1, 1, '2023-08-15 15:28:32', '2023-08-15 15:28:32'),
(19, 'Md.Hasibur Rahman', NULL, 'admin123@gmail.com', NULL, 'admin123@gmail.com', '$2y$10$ngjetEIi/rMzae6pAWMEFu4bNQf7C.aLTxZDiyeq/YQhfiMPIRLM6', NULL, 1, 1, '2024-03-13 10:04:03', '2024-03-13 10:04:03'),
(20, 'Md. Hasibur', 'Rahman', 'shajid.hasibur1996@gmail.com', NULL, 'shajid@super.com', '$2y$10$9tTrwh6/5fCgxtS6E3YH9ew0Ijuy0S5sEOVRDWOG7exEwk4BhLDay', NULL, 1, 1, '2024-03-18 08:50:53', '2024-03-18 08:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` int(50) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `starting_date` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `name`, `emp_id`, `starting_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Selma Robbins', '21', '1986-05-13', 1, '2022-08-25 07:17:58', '2022-08-25 07:17:58'),
(2, 'shakil', '0112', '2023-08-16', 1, '2023-08-16 05:13:15', '2023-08-16 05:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE `billers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `invoice_footer` text DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`id`, `name`, `logo`, `email`, `phone`, `address`, `city`, `invoice_footer`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 'shahadat Hossain', NULL, NULL, '01813-600979', '46 new eskaton road, Banglamotor', 'Dhaka', NULL, NULL, '2020-02-25 13:27:48', '2020-02-25 13:27:48'),
(2, 'kashem', NULL, 'kashem@kashem.com', '01', 'borishal', 'kawarchor', 'Borishal Launch', '1230', '2022-08-03 07:16:48', '2022-08-03 07:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `code`, `slug`, `description`, `image`, `company`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lifebuoy', 'BC-1', 'formula1', NULL, 'uploads/brand_image/lifeboy.jpg', 'Unilever', 1, '2020-02-25 13:05:26', '2020-02-25 13:05:26'),
(2, 'Clear', 'BC-2', 'toyota', NULL, 'uploads/brand_image/clear.png', 'Unilever', 1, '2020-03-05 15:22:37', '2020-03-05 15:22:37'),
(3, 'MUM', 'BC-3', 'rbi', NULL, 'uploads/brand_image/mum.jpg', 'Partex', 1, '2020-03-05 15:22:52', '2020-03-05 15:22:52'),
(4, 'Frutika', 'BC-4', 'stop', NULL, 'uploads/brand_image/frutika.jpg', 'Akij Food & Bevarage', 1, '2020-03-05 15:23:03', '2020-03-05 15:23:03'),
(5, 'LUX', 'BC-5', 'denso', NULL, 'uploads/brand_image/LUX_(soap)_logo.png', 'Unilever', 1, '2020-03-05 15:23:15', '2020-03-05 15:23:15'),
(6, 'Alltime', 'BC-6', 'osk', NULL, 'uploads/brand_image/alltime.png', 'Pran-RFL', 1, '2020-03-05 15:23:24', '2020-03-05 15:23:24'),
(7, 'Ruchi', 'BC-7', 'advios', NULL, 'uploads/brand_image/Ruchi-Logo.webp', 'Partex', 1, '2020-03-05 15:23:38', '2020-03-05 15:23:38'),
(8, 'pepsodent', 'BC-8', 'gunk', NULL, 'uploads/brand_image/pepsodent.png', 'Unilever', 1, '2020-03-05 15:23:47', '2020-03-05 15:23:47'),
(9, 'Ponds', 'BC-9', 'seger', NULL, 'uploads/brand_image/ponds.jpg', 'Unilever', 1, '2020-03-05 15:23:58', '2020-03-05 15:23:58'),
(23, 'ACI', 'BC-10', 'aci', 'ddd', NULL, 'Martina', 1, '2022-09-19 10:38:19', '2022-09-19 10:38:19'),
(24, 'Mahmud and Co.', 'BC-11', 'mahmud-and-co', 'fgfghg', NULL, 'Square', 1, '2022-09-20 10:35:57', '2022-09-20 10:35:57'),
(25, 'Yollo', 'BC-12', 'yollo', 'Hello', NULL, 'Yollo', 1, '2022-12-05 04:20:51', '2022-12-05 04:20:51'),
(26, 'azad', 'BC-13', 'azad', 'hi', NULL, 'azad2', 1, '2022-12-05 04:47:21', '2022-12-05 04:47:21'),
(27, 'Coke', 'BC-14', 'coke', NULL, NULL, NULL, 1, '2022-12-19 04:34:03', '2022-12-19 04:34:03'),
(28, 'Close up', 'BC-15', 'close-up', '250gm', NULL, 'Unilever', 1, '2023-01-03 04:51:45', '2023-01-03 04:51:45'),
(29, 'Samsung', 'BC-16', 'samsung', 'sfdgfdgfdg', 'uploads/brand_image/c2.png', 'Samsung', 1, '2024-03-20 09:51:57', '2024-03-20 09:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `parentId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `code`, `description`, `slug`, `status`, `parentId`, `created_at`, `updated_at`) VALUES
(1, 'Chal', 'uploads/category_image/chal.jpg', 'CC-1', NULL, 'car-wax', 1, NULL, '2020-02-25 13:00:43', '2020-02-25 13:00:43'),
(2, 'Daal', 'uploads/category_image/daal.jpeg', 'CC-2', NULL, 'auto-parts', 1, NULL, '2020-03-08 13:04:17', '2020-03-08 13:04:17'),
(4, 'Soyabin Oil', 'uploads/category_image/soyabin_oil.png', 'CC-3', NULL, 'lube', 1, NULL, '2022-05-12 09:09:21', '2022-05-12 09:09:21'),
(5, 'shoe', NULL, 'CC-4', 'fddjygh', 'shoe', 1, NULL, '2022-09-11 11:11:38', '2022-09-11 11:11:38'),
(6, 'Hand Rub', NULL, 'CC-5', 'Its better than anything', 'hand-rub', 1, NULL, '2022-09-19 10:36:46', '2022-09-19 10:36:46'),
(7, 'Air Freshner', NULL, 'CC-6', 'chhjhjk', 'air-freshner', 1, NULL, '2022-09-20 10:34:06', '2022-09-20 10:34:06'),
(8, 'Men', NULL, 'CC-7', 'Hello', 'men', 1, NULL, '2022-12-05 04:19:25', '2022-12-05 04:19:25'),
(9, 'Soft Drinks', NULL, 'CC-8', NULL, 'soft-drinks', 1, NULL, '2022-12-19 04:31:24', '2022-12-19 04:31:24'),
(10, 'Toothpaste', NULL, 'CC-9', 'unilever', 'toothpaste', 1, NULL, '2023-01-03 04:49:53', '2023-01-03 04:49:53'),
(11, 'Shampoo', 'uploads/category_image/c4.png', 'CC-10', 'Shampoo', 'shampoo', 1, NULL, '2024-03-20 09:24:23', '2024-03-20 09:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_infos`
--

CREATE TABLE `cheque_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cheque_infos`
--

INSERT INTO `cheque_infos` (`id`, `reference`, `cheque_number`, `bank_name`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, '33', NULL, 'NCC BANK', '30', 'sale', '2020-03-09 21:05:00', '2020-03-09 21:05:00'),
(2, '77', '12000*4', 'premier bank', '55', 'sale', '2020-03-19 19:50:29', '2020-03-19 19:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `start_balance` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `group`, `name`, `mobile`, `mobile2`, `email`, `company`, `address`, `start_balance`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hamidur Rahman', '01773340092', NULL, 'hamidur89@yahhho.com', NULL, NULL, NULL, 1, NULL, '2020-02-24 09:18:18', '2020-02-24 09:18:18'),
(2, 1, 'Kaderuzzaman', '01852819772', NULL, 'kader32zz@gmail.com', NULL, NULL, NULL, 1, NULL, '2020-02-25 13:13:37', '2020-02-25 13:13:37'),
(3, 1, 'Ahmed Alam', '01720544556', NULL, 'ahmed24_alam@gmail.com', NULL, 'Mohakali', NULL, 1, NULL, '2020-03-03 20:04:59', '2020-03-03 20:04:59'),
(4, 1, 'Imran Ahmed', '01734496400', '01711905608', 'imran_4098@gmail.com', NULL, NULL, NULL, 1, NULL, '2020-03-03 20:29:00', '2020-03-03 20:29:00'),
(5, 1, 'Jalaluddin', '01917793969', NULL, 'jalalduddin99@gmail.com', NULL, 'Baridhara', NULL, 1, NULL, '2020-03-03 20:44:00', '2020-03-03 20:44:00'),
(6, 1, 'Uzzal Miah', '01711872799', NULL, 'uzzal_2k22@gmail.com', NULL, 'jessore', NULL, 1, NULL, '2020-03-04 09:40:21', '2020-03-04 09:40:21'),
(7, 1, 'Saiful Ahmed', '01712194718', '02-58155618', 'saiful22_ahmed@yahoo.com', NULL, NULL, NULL, 1, NULL, '2020-03-04 09:41:20', '2020-03-04 09:41:20'),
(8, 1, 'Hanif Khan', '01816732934', NULL, 'khan_hanif01@gmail.com', NULL, 'Katabon', NULL, 1, NULL, '2020-03-04 11:49:04', '2020-03-04 11:49:04'),
(9, 1, 'Bahar Miah', '01817600116', NULL, 'bahar_20@gmail.com', NULL, NULL, NULL, 1, NULL, '2020-03-04 17:58:25', '2020-03-04 17:58:25'),
(10, 1, 'Jahid Sheikh', '01826170005', NULL, 'sheikh.jahid00@gmail.com', NULL, 'chawkbazar,chittagong', NULL, 1, NULL, '2020-03-05 15:40:54', '2020-03-05 15:40:54'),
(147, 1, 'aCustomer', '11', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-07-17 05:35:57', '2022-07-17 05:35:57'),
(148, 1, 'mike', '01', NULL, 'mike@gmail.com', 'mike corp.', 'dhaka', 1000, 1, NULL, '2022-07-17 06:41:15', '2022-07-17 06:41:15'),
(149, 1, 'Chanda Deb Nath', '012365489732', NULL, 'chhonda9@gmail.com', 'dfhjj', 'tyyfg', NULL, 1, NULL, '2022-09-11 10:55:50', '2022-09-11 10:55:50'),
(150, 1, 'Pranto', '9177656456', NULL, 'mdhbfgydag@gmail.com', 'dgftg', 'gfse4', NULL, 1, NULL, '2022-09-11 11:16:19', '2022-09-11 11:16:19'),
(151, 1, 'mahabuba', '1234', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-09-18 07:38:40', '2022-09-18 07:38:40'),
(152, 1, 'mahabub', '018', NULL, 'test@gamil.com', 'hjgsdf', 'dfagf', NULL, 1, NULL, '2022-09-19 10:23:22', '2022-09-19 10:23:22'),
(153, 1, 'bangla', '156', NULL, 'bangla@bangla.com', 'asdfkjdf', 'dfasf', NULL, 1, NULL, '2022-09-20 10:19:48', '2022-09-20 10:19:48'),
(154, 1, 'Mizanur Rahman', '01534369500', NULL, NULL, NULL, 'Jatrabari', NULL, 1, NULL, '2022-09-20 10:45:22', '2022-09-20 10:45:22'),
(155, 1, 'shoheli', '01717990179', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-11-26 06:16:30', '2022-11-26 06:16:30'),
(156, 1, 'md asaduzzaman', '01719729365', NULL, 'admin@gmail.com', 'azad2', 'dafnsadfjh', NULL, 1, NULL, '2022-12-05 04:54:22', '2022-12-05 04:54:22'),
(157, 3, 'osman goni', '0211111', NULL, 'admin@gmail.com', 'brac', 'Uttara', NULL, 1, NULL, '2022-12-31 08:05:27', '2022-12-31 08:05:27'),
(158, 2, 'osman goni', '01745557786', NULL, 'the.king.brand7@gmail.com', 'brac', 'Uttara', NULL, 1, NULL, '2022-12-31 08:15:14', '2022-12-31 08:15:14'),
(159, 1, 'Mahera Begum', '0157694206', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-18 11:31:21', '2023-01-18 11:31:21'),
(160, 1, 'Monojit Roy', '01826064167', NULL, 'monojits62@gmail.com', NULL, NULL, NULL, 1, NULL, '2023-01-19 03:23:29', '2023-01-19 03:23:29'),
(161, 1, 'Nasrin Akter', '01733756649', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-25 04:54:55', '2023-01-25 04:54:55'),
(162, 1, 'NAYEM', '01825656712', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-25 05:53:25', '2023-01-25 05:53:25'),
(163, 1, 'anamika', '01863260221', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-26 04:22:40', '2023-01-26 04:22:40'),
(164, 1, 'riza', '01849573181', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-26 05:52:45', '2023-01-26 05:52:45'),
(165, 1, 'namira', '01770344546', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-26 06:35:04', '2023-01-26 06:35:04'),
(166, 1, 'sadiya', '01883123206', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-26 06:47:52', '2023-01-26 06:47:52'),
(167, 1, 'Mostakim', '01640014609', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-02 05:02:29', '2023-02-02 05:02:29'),
(168, 1, 'Kader Ali', '01716256987', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-06 07:03:20', '2023-02-06 07:03:20'),
(169, 1, 'Shamim', '01794233385', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-06 07:12:58', '2023-02-06 07:12:58'),
(170, 1, 'nazmin', '01762204307', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-06 07:20:20', '2023-02-06 07:20:20'),
(171, 1, 'Adil Ali', '071900006988', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-06 07:27:06', '2023-02-06 07:27:06'),
(172, 1, 'koly', '01766391231', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-06 07:58:56', '2023-02-06 07:58:56'),
(173, 1, 'Emam Uddin', '01878815766', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 04:25:44', '2023-03-04 04:25:44'),
(174, 1, 'sukkur', '01859978043', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 04:44:49', '2023-03-04 04:44:49'),
(175, 1, 'Juli', '01407144060', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 05:35:45', '2023-03-04 05:35:45'),
(176, 1, 'Amlan', '01788738532', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 06:19:38', '2023-03-04 06:19:38'),
(177, 1, 'Sadia', '01753500586', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 06:28:55', '2023-03-04 06:28:55'),
(178, 1, 'sokina', '01878896511', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 06:36:35', '2023-03-04 06:36:35'),
(179, 1, 'Srabon', '01641223992', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-11 04:57:05', '2023-03-11 04:57:05'),
(180, 1, 'Sahedul Islam', '0184937207', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-04 06:08:59', '2023-04-04 06:08:59'),
(181, 1, 'Mr. Rahim', '01464566366', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-04 06:10:08', '2023-04-04 06:10:08'),
(182, 1, 'Shaiful Alam', '01842759372', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-04 07:02:58', '2023-04-04 07:02:58'),
(183, 1, 'serajam monira', '018111111111', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-05 06:50:20', '2023-04-05 06:50:20'),
(184, 2, 'RASHEDA', '01635112747', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-06 05:28:43', '2023-04-06 05:28:43'),
(185, 1, 'SI Swapon', '0123654789', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-13 06:43:48', '2023-04-13 06:43:48'),
(186, 1, 'Rimon', '01759842354', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-13 07:16:15', '2023-04-13 07:16:15'),
(187, 1, 'tania', '0175296845', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-13 07:29:02', '2023-04-13 07:29:02'),
(188, 1, 'suny', '01315654854', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-13 07:45:48', '2023-04-13 07:45:48'),
(189, 1, 'poli', '016354745736', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-13 07:58:13', '2023-04-13 07:58:13'),
(190, 1, 'imran', '01596357412', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-16 03:54:53', '2023-04-16 03:54:53'),
(191, 1, 'maju', '01703619565', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-16 04:26:27', '2023-04-16 04:26:27'),
(192, 1, 'istiak ahmod shourov', '01794075805', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-16 04:42:55', '2023-04-16 04:42:55'),
(193, 1, 'Hasan shuvo', '01458777544', NULL, 'hasan.shuvo@gmail.com', 'toto company', 'uganda', NULL, 1, NULL, '2023-04-17 04:47:18', '2023-04-17 04:47:18'),
(194, 1, 'jamal', '0125698743', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-09 05:56:02', '2023-05-09 05:56:02'),
(195, 1, 'karim', '8753567886', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-09 06:14:24', '2023-05-09 06:14:24'),
(196, 1, 'abul', '90765356878', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 04:57:21', '2023-05-13 04:57:21'),
(197, 1, 'masum', '6458255', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 05:16:23', '2023-05-13 05:16:23'),
(198, 1, 'Ayesa', '24745487845487', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 05:22:47', '2023-05-13 05:22:47'),
(199, 1, 'abul', '18222314', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 05:29:09', '2023-05-13 05:29:09'),
(200, 1, 'taluk dar masum ahmed', '01645464', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 05:32:56', '2023-05-13 05:32:56'),
(201, 1, 'shahed', '0175867588', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 05:42:13', '2023-05-13 05:42:13'),
(202, 1, 'iqbal', '1584976548', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 05:45:28', '2023-05-13 05:45:28'),
(203, 1, 'foyej', '67544455545', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 06:44:48', '2023-05-13 06:44:48'),
(204, 1, 'rumkew', '123456', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 06:55:24', '2023-05-13 06:55:24'),
(205, 1, 'mina', '098765434', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 06:59:06', '2023-05-13 06:59:06'),
(206, 1, 'joyosree', '0234567', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:04:28', '2023-05-13 07:04:28'),
(207, 1, 'akhi', '012345', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:14:33', '2023-05-13 07:14:33'),
(208, 1, 'missy', '212458', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:19:41', '2023-05-13 07:19:41'),
(209, 1, 'missy', '0147', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:24:19', '2023-05-13 07:24:19'),
(210, 1, 'tahmina', '01766554', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:28:08', '2023-05-13 07:28:08'),
(211, 1, 'erin12345', '12345566', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:32:26', '2023-05-13 07:32:26'),
(212, 1, 'moriom', '9876', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:39:38', '2023-05-13 07:39:38'),
(213, 1, 'koly', '085', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-13 07:48:42', '2023-05-13 07:48:42'),
(214, 1, 'Tania', '01961641731', NULL, 'aktarahila2011@gmail.com', 'XYZ', 'BOSUPARA BASHTOLA', NULL, 1, NULL, '2023-06-25 07:37:28', '2023-06-25 07:37:28'),
(215, 1, 'Farzana Akter', '01812162680', NULL, 'farzana045@gmail.com', 'Teribazar', 'Kalamia bazar', 6, 1, NULL, '2023-07-05 06:25:19', '2023-07-05 06:25:19'),
(216, 1, 'Tanjina Islam', '01812162602', NULL, 'Tanjina123@gmail.com', NULL, 'kotwali', NULL, 1, NULL, '2023-07-05 06:59:32', '2023-07-05 06:59:32'),
(217, 1, 'Sanjida Akhter Borsha', '0177777777', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-05 07:39:02', '2023-07-05 07:39:02'),
(218, 1, 'Jahanara Akter', '0166666666', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-06 04:05:56', '2023-07-06 04:05:56'),
(219, 1, 'jahid', '014566555', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-06 04:18:42', '2023-07-06 04:18:42'),
(220, 1, 'rohit', '01556773808', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-06 04:26:23', '2023-07-06 04:26:23'),
(221, 1, 'nahid', '01830561970', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-06 06:30:04', '2023-07-06 06:30:04'),
(222, 1, 'shahed', '01745602421', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-06 06:40:49', '2023-07-06 06:40:49'),
(223, 1, 'Rabbi Hasan', '01909316755', NULL, 'khulna.bracsdp@gmail.com', 'X', 'Tootpara', NULL, 1, NULL, '2023-07-11 04:10:57', '2023-07-11 04:10:57'),
(224, 1, 'galib', '013456789', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-11 05:21:54', '2023-07-11 05:21:54'),
(225, 1, 'Mahmud', '01641290907', NULL, 'mahmud6808@gmail.com', 'BRAC', NULL, 0, 1, NULL, '2023-07-11 05:55:31', '2023-07-11 05:55:31'),
(226, 1, 'Mr. Donald Trump', '017333333333', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-13 04:04:27', '2023-07-13 04:04:27'),
(227, 1, 'Mr. Bladimir Putin', '018888888', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-13 06:37:00', '2023-07-13 06:37:00'),
(228, 1, 'Mr.  Barak Obama', '013888888', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-15 04:44:25', '2023-07-15 04:44:25'),
(229, 1, 'jony', '12365475', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-17 07:26:30', '2023-07-17 07:26:30'),
(230, 1, 'Monojit Roy', '01826064161', NULL, 'monojits62@gmail.com', 'Ashit Baran Roy', 'House#11/2, Road#12', NULL, 1, NULL, '2023-07-17 07:48:11', '2023-07-17 07:48:11'),
(231, 1, 'raju', '0162711225', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-17 07:52:31', '2023-07-17 07:52:31'),
(232, 1, 'co shakib', '112459876', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-17 08:03:16', '2023-07-17 08:03:16'),
(233, 1, 'Md.Hasibur Rahman', '01680419920', NULL, 'demo@demo.com', 'Codetree', 'Uttara, Dhaka, Bangladesh', NULL, 1, 'uploads/customer_image/p-10.png', '2023-08-22 06:16:11', '2023-08-22 06:16:11'),
(234, 2, 'Asif Mia', '01254578696', NULL, 'asif@gmail.com', 'Gonzalez and Price Traders', 'Uttara, Dhaka, Bangladesh', 10000, 1, NULL, '2024-03-21 09:17:25', '2024-03-21 09:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `name`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General', 0, 1, '2020-01-18 03:08:02', '2020-01-18 03:08:02'),
(2, 'Reseller', 5, 1, '2020-01-18 03:09:14', '2020-01-18 03:09:14'),
(3, 'Nahin Khan', 10, 1, '2022-05-12 09:01:12', '2022-05-12 09:01:12'),
(4, 'Shopno', 5, 1, '2024-03-20 08:29:45', '2024-03-20 08:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `eDate` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `code`, `store_id`, `reference`, `document`, `category`, `note`, `eDate`, `cost`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'EX-1', NULL, NULL, NULL, 1, NULL, '2020-03-05', 10000, 4, '2020-03-08 16:22:10', '2020-03-08 16:22:10'),
(2, 'EX-2', NULL, 'Salary', NULL, 1, 'Sumon Driver = 18000\r\nRakib             = 8000\r\nSharif               = 10500', '2020-03-08', 36500, 4, '2020-03-11 20:06:06', '2020-03-11 20:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Store Expense', 'CIMSEC-1', 'this is store expense', 1, '2020-01-18 01:42:51', '2020-01-18 01:42:51'),
(2, 'Other Expense', 'EC-2', 'asdf', 1, '2022-05-12 09:23:53', '2022-05-12 09:23:53');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_02_062848_create_admins_table', 2),
(8, '2020_01_16_064532_create_categories_table', 3),
(11, '2020_01_16_100509_create_brands_table', 4),
(12, '2020_01_17_131743_create_units_table', 5),
(13, '2020_01_18_065556_create_expense_categories_table', 6),
(14, '2020_01_18_082636_create_customer_groups_table', 7),
(15, '2020_01_18_095909_create_suppliers_table', 8),
(16, '2020_01_19_062947_create_customers_table', 9),
(17, '2020_01_19_094738_create_products_table', 10),
(18, '2020_01_20_061718_create_systems_table', 11),
(21, '2020_01_21_093546_create_expenses_table', 12),
(22, '2020_01_22_085039_create_stocks_table', 13),
(27, '2020_01_23_061832_create_sub_categories_table', 15),
(28, '2020_01_27_074328_create_stores_table', 16),
(29, '2020_01_28_111501_create_billers_table', 17),
(30, '2020_01_22_085144_create_purchases_table', 18),
(31, '2020_01_31_135530_create_purchase_product_lists_table', 18),
(32, '2020_02_02_063636_create_sales_table', 19),
(34, '2020_02_02_063954_create_sales_products_table', 20),
(35, '2020_02_10_120724_create_permission_tables', 21),
(36, '2020_02_23_153138_create_cheque_infos_table', 22),
(37, '2020_02_24_121326_create_sales_due_returns_table', 23),
(38, '2020_03_03_145228_create_payments_table', 24),
(39, '2020_09_10_140001_create_webcategories_table', 24),
(40, '2020_09_10_140959_create_webproducts_table', 24),
(41, '2020_09_10_161813_create_webcats_table', 25),
(42, '2020_09_10_161842_create_webpros_table', 25),
(43, '2023_08_21_162403_create_store_attendences_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 1),
(1, 'App\\Admin', 4),
(1, 'App\\Admin', 5),
(1, 'App\\Admin', 6),
(1, 'App\\Admin', 17),
(1, 'App\\Admin', 18),
(1, 'App\\Admin', 20),
(2, 'App\\Admin', 3),
(2, 'App\\Admin', 7),
(2, 'App\\Admin', 8),
(2, 'App\\Admin', 9),
(2, 'App\\Admin', 10),
(2, 'App\\Admin', 11),
(2, 'App\\Admin', 12),
(2, 'App\\Admin', 13),
(2, 'App\\Admin', 14),
(2, 'App\\Admin', 15),
(2, 'App\\Admin', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `salereference` varchar(255) DEFAULT NULL,
  `purchasereference` varchar(255) DEFAULT NULL,
  `paidBy` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `pDate` varchar(255) NOT NULL,
  `transectionBy` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reference`, `salereference`, `purchasereference`, `paidBy`, `amount`, `type`, `pDate`, `transectionBy`, `created_at`, `updated_at`) VALUES
(1, 'PAY-2022-05-11/1', 'IC-00000092', NULL, 'cash', 500, 'Received', '2022-05-11', '1', '2022-05-11 10:23:15', '2022-05-11 10:23:15'),
(2, 'PAY-2022-05-11/2', 'IC-00000092', NULL, 'cash', 500, 'Received', '2022-05-11', '1', '2022-05-11 10:28:59', '2022-05-11 10:28:59'),
(4, 'PAY-2022-05-12/3', 'IC-00000092', NULL, 'cash', 500, 'Received', '2022-05-12', '1', '2022-05-12 08:18:31', '2022-05-12 08:18:31'),
(6, 'PAY-2022-05-12/4', NULL, 'PUC-1', 'cash', 500, 'paid', '2022-05-12', '1', '2022-05-12 08:28:52', '2022-05-12 08:28:52'),
(7, 'PAY-2022-05-12/5', NULL, 'EX-3', 'cash', 500, 'paid', '2022-05-12', '1', '2022-05-12 08:30:03', '2022-05-12 08:30:03'),
(8, 'PAY-2022-06-20/6', 'IC-00000093', NULL, 'cash', 0, 'Received', '2022-06-20', '1', '2022-06-20 06:07:22', '2022-06-20 06:07:22'),
(9, 'PAY-2022-06-20/7', 'IC-00000094', NULL, 'cash', 400, 'Received', '2022-06-20', '1', '2022-06-20 06:36:14', '2022-06-20 06:36:14'),
(10, 'PAY-2022-06-26/8', 'IC-00000095', NULL, 'cash', 500, 'Received', '2022-06-26', '1', '2022-06-26 14:08:19', '2022-06-26 14:08:19'),
(11, 'PAY-2022-06-26/9', 'IC-00000096', NULL, 'cash', 1000, 'Received', '2022-06-26', '1', '2022-06-26 14:10:20', '2022-06-26 14:10:20'),
(12, 'PAY-2022-06-26/10', 'IC-00000097', NULL, 'cash', 1000, 'Received', '2022-06-26', '1', '2022-06-26 14:13:55', '2022-06-26 14:13:55'),
(13, 'PAY-2022-07-17/11', 'IC-00000010', NULL, 'cash', 1000, 'Received', '2022-07-17', '1', '2022-07-17 05:35:19', '2022-07-17 05:35:19'),
(14, 'PAY-2022-07-17/12', 'IC-00000010', NULL, 'cash', 500, 'Received', '2022-07-17', '1', '2022-07-17 05:37:00', '2022-07-17 05:37:00'),
(15, 'PAY-2022-07-17/13', 'IC-00000010', NULL, 'cash', 600, 'Received', '2022-07-17', '1', '2022-07-17 05:39:43', '2022-07-17 05:39:43'),
(16, 'PAY-2022-07-17/14', 'IC-00000011', NULL, 'cash', 0, 'Received', '2022-07-17', '1', '2022-07-17 05:42:34', '2022-07-17 05:42:34'),
(17, 'PAY-2022-07-17/15', NULL, 'PUC-2', 'cash', 5000, 'paid', '2022-07-13', '1', '2022-07-17 05:45:03', '2022-07-17 05:45:03'),
(18, 'PAY-2022-07-17/16', 'IC-00000012', NULL, 'cash', 0, 'Received', '2022-07-17', '1', '2022-07-17 08:57:47', '2022-07-17 08:57:47'),
(19, 'PAY-2022-07-17/17', 'IC-00000013', NULL, 'cash', 0, 'Received', '2022-07-17', '1', '2022-07-17 08:58:48', '2022-07-17 08:58:48'),
(20, 'PAY-2022-07-18/18', 'IC-00000014', NULL, 'cash', 0, 'Received', '2022-07-18', '1', '2022-07-18 12:40:30', '2022-07-18 12:40:30'),
(21, 'PAY-2022-07-31/19', 'IC-00000015', NULL, 'cash', 520, 'Received', '2022-07-31', '1', '2022-07-31 09:59:45', '2022-07-31 09:59:45'),
(22, 'PAY-2022-07-31/20', 'IC-00000016', NULL, 'cash', 100, 'Received', '2022-07-31', '1', '2022-07-31 10:07:41', '2022-07-31 10:07:41'),
(23, 'PAY-2022-08-07/21', 'IC-00000017', NULL, 'cash', 1000, 'Received', '2022-08-07', '1', '2022-08-07 05:34:20', '2022-08-07 05:34:20'),
(24, 'PAY-2022-08-07/22', 'IC-00000018', NULL, 'cash', 520, 'Received', '2022-08-07', '1', '2022-08-07 05:35:43', '2022-08-07 05:35:43'),
(25, 'PAY-2022-08-25/23', 'IC-00000019', NULL, 'cash', 250, 'Received', '2022-08-25', '9', '2022-08-25 08:34:50', '2022-08-25 08:34:50'),
(26, 'PAY-2022-09-04/24', 'IC-00000020', NULL, 'cash', 0, 'Received', '2022-09-04', '1', '2022-09-04 09:49:28', '2022-09-04 09:49:28'),
(27, 'PAY-2022-09-07/25', 'IC-00000021', NULL, 'cash', 0, 'Received', '2022-09-07', '1', '2022-09-07 12:14:48', '2022-09-07 12:14:48'),
(28, 'PAY-2022-09-11/26', 'IC-00000022', NULL, 'cash', 0, 'Received', '2022-09-11', '1', '2022-09-11 08:56:14', '2022-09-11 08:56:14'),
(30, 'PAY-2022-09-11/28', 'IC-00000024', NULL, 'cash', 1300, 'Received', '2022-09-11', '1', '2022-09-11 09:36:53', '2022-09-11 09:36:53'),
(31, 'PAY-2022-09-11/28', 'IC-00000024', NULL, 'cash', 520, 'Received', '2022-09-11', '1', '2022-09-11 10:38:36', '2022-09-11 10:38:36'),
(32, 'PAY-2022-09-11/29', 'IC-00000025', NULL, 'cash', 10400, 'Received', '2022-09-11', '1', '2022-09-11 10:57:17', '2022-09-11 10:57:17'),
(33, 'PAY-2022-09-11/30', 'IC-00000026', NULL, 'cash', 4416, 'Received', '2022-09-11', '1', '2022-09-11 11:08:52', '2022-09-11 11:08:52'),
(34, 'PAY-2022-09-11/31', 'IC-00000027', NULL, 'cash', 5810, 'Received', '2022-09-11', '1', '2022-09-11 11:17:38', '2022-09-11 11:17:38'),
(35, 'PAY-2022-09-15/32', 'IC-00000027', NULL, 'cash', 5890, 'Received', '2022-09-15', '1', '2022-09-15 11:20:59', '2022-09-15 11:20:59'),
(36, 'PAY-2022-09-18/33', 'IC-00000028', NULL, 'cash', 18128, 'Received', '2022-09-18', '1', '2022-09-18 06:53:42', '2022-09-18 06:53:42'),
(37, 'PAY-2022-09-18/34', 'IC-00000029', NULL, 'cash', 300, 'Received', '2022-09-18', '1', '2022-09-18 07:43:41', '2022-09-18 07:43:41'),
(38, 'PAY-2022-09-18/35', 'IC-00000030', NULL, 'cash', 0, 'Received', '2022-09-18', '1', '2022-09-18 08:03:22', '2022-09-18 08:03:22'),
(39, 'PAY-2022-09-19/36', 'IC-00000031', NULL, 'cash', 900, 'Received', '2022-09-19', '1', '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(40, 'PAY-2022-09-19/37', 'IC-00000032', NULL, 'cash', 10032, 'Received', '2022-09-19', '1', '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(41, 'PAY-2022-09-19/38', 'IC-00000033', NULL, 'cash', 546, 'Received', '2022-09-19', '1', '2022-09-19 08:20:43', '2022-09-19 08:20:43'),
(42, 'PAY-2022-09-19/39', 'IC-00000034', NULL, 'cash', 3552, 'Received', '2022-09-19', '1', '2022-09-19 09:57:43', '2022-09-19 09:57:43'),
(43, 'PAY-2022-09-19/40', 'IC-00000035', NULL, 'cash', 2419.2, 'Received', '2022-09-19', '1', '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(44, 'PAY-2022-09-19/41', 'IC-00000036', NULL, 'cash', 1500, 'Received', '2022-09-19', '1', '2022-09-19 10:47:15', '2022-09-19 10:47:15'),
(45, 'PAY-2022-09-20/42', 'IC-00000037', NULL, 'cash', 1370, 'Received', '2022-09-20', '1', '2022-09-20 08:41:57', '2022-09-20 08:41:57'),
(46, 'PAY-2022-09-20/43', 'IC-00000038', NULL, 'cash', 520, 'Received', '2022-09-20', '1', '2022-09-20 08:58:41', '2022-09-20 08:58:41'),
(47, 'PAY-2022-09-20/44', 'IC-00000039', NULL, 'cash', 2636, 'Received', '2022-09-20', '1', '2022-09-20 10:04:59', '2022-09-20 10:04:59'),
(48, 'PAY-2022-09-20/45', 'IC-00000040', NULL, 'cash', 4131.7, 'Received', '2022-09-20', '1', '2022-09-20 10:23:50', '2022-09-20 10:23:50'),
(49, 'PAY-2022-09-20/46', 'IC-00000040', NULL, 'cash', 1524.96, 'Received', '2022-09-20', '1', '2022-09-20 10:24:44', '2022-09-20 10:24:44'),
(50, 'PAY-2022-09-20/47', 'IC-00000041', NULL, 'cash', 2285.85, 'Received', '2022-09-20', '1', '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(51, 'PAY-2022-09-20/48', 'IC-00000042', NULL, 'cash', 15385, 'Received', '2022-09-20', '1', '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(52, 'PAY-2022-09-20/49', 'IC-00000043', NULL, 'cash', 0, 'Received', '2022-09-20', '1', '2022-09-20 10:51:50', '2022-09-20 10:51:50'),
(53, 'PAY-2022-09-20/50', 'IC-00000044', NULL, 'cash', 0, 'Received', '2022-09-20', '1', '2022-09-20 10:57:05', '2022-09-20 10:57:05'),
(54, 'PAY-2022-09-27/51', 'IC-00000045', NULL, 'cash', 1890, 'Received', '2022-09-27', '1', '2022-09-27 10:25:35', '2022-09-27 10:25:35'),
(55, 'PAY-2022-09-29/52', 'IC-00000046', NULL, 'cash', 0, 'Received', '2022-09-29', '1', '2022-09-29 06:12:11', '2022-09-29 06:12:11'),
(56, 'PAY-2022-09-29/53', 'IC-00000047', NULL, 'cash', 894, 'Received', '2022-09-29', '1', '2022-09-29 08:23:43', '2022-09-29 08:23:43'),
(57, 'PAY-2022-09-29/54', 'IC-00000048', NULL, 'cash', 520, 'Received', '2022-09-29', '1', '2022-09-29 09:50:20', '2022-09-29 09:50:20'),
(58, 'PAY-2022-11-14/55', 'IC-00000049', NULL, 'cash', 136, 'Received', '2022-11-14', '1', '2022-11-14 08:46:38', '2022-11-14 08:46:38'),
(59, 'PAY-2022-11-23/56', 'IC-00000050', NULL, 'cash', 0, 'Received', '2022-11-23', '1', '2022-11-23 04:35:22', '2022-11-23 04:35:22'),
(60, 'PAY-2022-11-23/57', 'IC-00000051', NULL, 'cash', 0, 'Received', '2022-11-23', '1', '2022-11-23 05:22:38', '2022-11-23 05:22:38'),
(61, 'PAY-2022-11-23/58', 'IC-00000052', NULL, 'cash', 0, 'Received', '2022-11-23', '1', '2022-11-23 08:01:50', '2022-11-23 08:01:50'),
(62, 'PAY-2022-11-23/59', 'IC-00000053', NULL, 'cash', 714, 'Received', '2022-11-23', '1', '2022-11-23 08:51:42', '2022-11-23 08:51:42'),
(63, 'PAY-2022-11-26/60', 'IC-00000054', NULL, 'cash', 0, 'Received', '2022-11-26', '1', '2022-11-26 05:12:44', '2022-11-26 05:12:44'),
(64, 'PAY-2022-11-26/61', 'IC-00000055', NULL, 'cash', 10195, 'Received', '2022-11-26', '1', '2022-11-26 06:05:39', '2022-11-26 06:05:39'),
(65, 'PAY-2022-11-26/62', 'IC-00000055', NULL, 'cash', 0, 'Received', '2022-11-26', '1', '2022-11-26 06:08:49', '2022-11-26 06:08:49'),
(66, 'PAY-2022-11-26/63', 'IC-00000055', NULL, 'cash', 1000, 'Received', '2022-11-26', '1', '2022-11-26 06:17:35', '2022-11-26 06:17:35'),
(67, 'PAY-2022-11-26/64', 'IC-00000056', NULL, 'cash', 2050, 'Received', '2022-11-26', '1', '2022-11-26 06:25:32', '2022-11-26 06:25:32'),
(68, 'PAY-2022-11-27/65', 'IC-00000057', NULL, 'cash', 0, 'Received', '2022-11-27', '1', '2022-11-27 09:39:39', '2022-11-27 09:39:39'),
(69, 'PAY-2022-12-05/66', 'IC-00000058', NULL, 'cash', 0, 'Received', '2022-12-05', '1', '2022-12-05 03:14:34', '2022-12-05 03:14:34'),
(70, 'PAY-2022-12-05/67', 'IC-00000059', NULL, 'cash', 160, 'Received', '2022-12-05', '1', '2022-12-05 03:21:41', '2022-12-05 03:21:41'),
(71, 'PAY-2022-12-05/68', 'IC-00000060', NULL, 'cash', 0, 'Received', '2022-12-05', '1', '2022-12-05 04:02:31', '2022-12-05 04:02:31'),
(72, 'PAY-2022-12-05/69', 'IC-00000061', NULL, 'cash', 1260, 'Received', '2022-12-05', '1', '2022-12-05 04:33:12', '2022-12-05 04:33:12'),
(73, 'PAY-2022-12-05/70', 'IC-00000061', NULL, 'cash', 120, 'Received', '2022-12-05', '1', '2022-12-05 04:35:06', '2022-12-05 04:35:06'),
(74, 'PAY-2022-12-05/71', 'IC-00000062', NULL, 'cash', 122, 'Received', '2022-12-05', '1', '2022-12-05 04:37:56', '2022-12-05 04:37:56'),
(75, 'PAY-2022-12-05/72', 'IC-00000063', NULL, 'cash', 0, 'Received', '2022-12-05', '1', '2022-12-05 04:43:53', '2022-12-05 04:43:53'),
(76, 'PAY-2022-12-05/73', 'IC-00000064', NULL, 'cash', 163, 'Received', '2022-12-05', '1', '2022-12-05 04:55:49', '2022-12-05 04:55:49'),
(77, 'PAY-2022-12-08/74', 'IC-00000065', NULL, 'cash', 0, 'Received', '2022-12-08', '1', '2022-12-08 10:21:10', '2022-12-08 10:21:10'),
(78, 'PAY-2022-12-08/75', 'IC-00000066', NULL, 'cash', 0, 'Received', '2022-12-08', '1', '2022-12-08 10:58:45', '2022-12-08 10:58:45'),
(79, 'PAY-2022-12-08/76', 'IC-00000067', NULL, 'cash', 283, 'Received', '2022-12-08', '1', '2022-12-08 11:35:05', '2022-12-08 11:35:05'),
(80, 'PAY-2022-12-08/77', 'IC-00000068', NULL, 'cash', 2000, 'Received', '2022-12-08', '1', '2022-12-08 11:42:53', '2022-12-08 11:42:53'),
(81, 'PAY-2022-12-08/78', 'IC-00000069', NULL, 'cash', 800, 'Received', '2022-12-08', '1', '2022-12-08 11:50:47', '2022-12-08 11:50:47'),
(82, 'PAY-2022-12-14/79', NULL, 'PUC-3', 'cash', NULL, 'paid', '2022-12-14', '13', '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(83, 'PAY-2022-12-14/80', 'IC-00000070', NULL, 'cash', 0, 'Received', '2022-12-14', '13', '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(84, 'PAY-2022-12-18/81', 'IC-00000071', NULL, 'cash', 560, 'Received', '2022-12-18', '14', '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(85, 'PAY-2022-12-19/82', 'IC-00000072', NULL, 'cash', 2000, 'Received', '2022-12-19', '14', '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(86, 'PAY-2022-12-19/83', 'IC-00000073', NULL, 'cash', 2100, 'Received', '2022-12-19', '14', '2022-12-19 05:08:12', '2022-12-19 05:08:12'),
(87, 'PAY-2022-12-24/84', NULL, 'PUC-4', 'cash', NULL, 'paid', '2022-12-24', '13', '2022-12-24 05:59:05', '2022-12-24 05:59:05'),
(88, 'PAY-2022-12-24/85', 'IC-00000074', NULL, 'cash', 0, 'Received', '2022-12-24', '13', '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(89, 'PAY-2022-12-24/86', 'IC-00000075', NULL, 'cash', 600, 'Received', '2022-12-24', '14', '2022-12-24 06:57:44', '2022-12-24 06:57:44'),
(90, 'PAY-2022-12-24/87', 'IC-00000076', NULL, 'cash', 520, 'Received', '2022-12-24', '14', '2022-12-24 07:01:45', '2022-12-24 07:01:45'),
(91, 'PAY-2022-12-24/88', 'IC-00000077', NULL, 'cash', 100, 'Received', '2022-12-24', '14', '2022-12-24 07:07:05', '2022-12-24 07:07:05'),
(92, 'PAY-2022-12-31/89', 'IC-00000078', NULL, 'cash', 700, 'Received', '2022-12-31', '11', '2022-12-31 08:01:01', '2022-12-31 08:01:01'),
(93, 'PAY-2022-12-31/90', 'IC-00000078', NULL, 'cash', 1000, 'Received', '2022-12-31', '11', '2022-12-31 08:05:47', '2022-12-31 08:05:47'),
(94, 'PAY-2022-12-31/91', 'IC-00000079', NULL, 'cash', 1000, 'Received', '2022-12-31', '11', '2022-12-31 08:07:20', '2022-12-31 08:07:20'),
(95, 'PAY-2022-12-31/92', 'IC-00000080', NULL, 'cash', 100, 'Received', '2022-12-31', '11', '2022-12-31 08:16:02', '2022-12-31 08:16:02'),
(96, 'PAY-2022-12-31/93', 'IC-00000081', NULL, 'cash', 500, 'Received', '2022-12-31', '11', '2022-12-31 08:19:05', '2022-12-31 08:19:05'),
(97, 'PAY-2022-12-31/94', 'IC-00000082', NULL, 'cash', 500, 'Received', '2022-12-31', '11', '2022-12-31 08:30:12', '2022-12-31 08:30:12'),
(98, 'PAY-2022-12-31/95', 'IC-00000083', NULL, 'cash', 20, 'Received', '2022-12-31', '11', '2022-12-31 08:31:54', '2022-12-31 08:31:54'),
(99, 'PAY-2022-12-31/96', 'IC-00000084', NULL, 'cash', 1250, 'Received', '2022-12-31', '11', '2022-12-31 08:35:36', '2022-12-31 08:35:36'),
(100, 'PAY-2022-12-31/97', 'IC-00000085', NULL, 'cash', 0, 'Received', '2022-12-31', '11', '2022-12-31 08:38:08', '2022-12-31 08:38:08'),
(101, 'PAY-2022-12-31/98', 'IC-00000086', NULL, 'card', 1500, 'Received', '2022-12-31', '11', '2022-12-31 08:41:01', '2022-12-31 08:41:01'),
(102, 'PAY-2022-12-31/99', 'IC-00000087', NULL, 'cash', 270, 'Received', '2022-12-31', '11', '2022-12-31 08:42:48', '2022-12-31 08:42:48'),
(103, 'PAY-2022-12-31/100', 'IC-00000088', NULL, 'cash', 0, 'Received', '2022-12-31', '11', '2022-12-31 08:44:43', '2022-12-31 08:44:43'),
(104, 'PAY-2022-12-31/101', 'IC-00000089', NULL, 'cash', 1500, 'Received', '2022-12-31', '11', '2022-12-31 08:45:02', '2022-12-31 08:45:02'),
(105, 'PAY-2022-12-31/102', 'IC-00000090', NULL, 'cash', 1650, 'Received', '2022-12-31', '11', '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(106, 'PAY-2023-01-18/103', 'IC-00000091', NULL, 'cash', 1100, 'Received', '2023-01-18', '14', '2023-01-18 11:32:07', '2023-01-18 11:32:07'),
(107, 'PAY-2023-01-19/104', 'IC-00000092', NULL, 'cash', 1000, 'Received', '2023-01-19', '14', '2023-01-19 03:23:45', '2023-01-19 03:23:45'),
(108, 'PAY-2023-01-19/105', 'IC-00000093', NULL, 'cash', 600, 'Received', '2023-01-19', '14', '2023-01-19 03:46:04', '2023-01-19 03:46:04'),
(109, 'PAY-2023-01-19/106', 'IC-00000094', NULL, 'cash', 0, 'Received', '2023-01-19', '14', '2023-01-19 03:47:09', '2023-01-19 03:47:09'),
(110, 'PAY-2023-01-19/107', 'IC-00000095', NULL, 'cash', 600, 'Received', '2023-01-19', '14', '2023-01-19 03:50:13', '2023-01-19 03:50:13'),
(111, 'PAY-2023-01-19/108', 'IC-00000096', NULL, 'cash', 600, 'Received', '2023-01-19', '14', '2023-01-19 03:58:27', '2023-01-19 03:58:27'),
(112, 'PAY-2023-01-25/109', 'IC-00000097', NULL, 'cash', 12, 'Received', '2023-01-25', '16', '2023-01-25 03:50:33', '2023-01-25 03:50:33'),
(113, 'PAY-2023-01-25/110', 'IC-00000098', NULL, 'cash', 30, 'Received', '2023-01-25', '16', '2023-01-25 03:53:57', '2023-01-25 03:53:57'),
(114, 'PAY-2023-01-25/111', 'IC-00000099', NULL, 'cash', 580, 'Received', '2023-01-25', '16', '2023-01-25 05:02:50', '2023-01-25 05:02:50'),
(115, 'PAY-2023-01-25/112', 'IC-00000100', NULL, 'cash', 11, 'Received', '2023-01-25', '16', '2023-01-25 05:12:55', '2023-01-25 05:12:55'),
(116, 'PAY-2023-01-25/113', 'IC-00000101', NULL, 'cash', 522.5, 'Received', '2023-01-25', '16', '2023-01-25 05:33:50', '2023-01-25 05:33:50'),
(117, 'PAY-2023-01-25/114', 'IC-00000102', NULL, 'cash', 1425, 'Received', '2023-01-25', '16', '2023-01-25 05:45:31', '2023-01-25 05:45:31'),
(118, 'PAY-2023-01-26/115', 'IC-00000103', NULL, 'cash', 500, 'Received', '2023-01-26', '16', '2023-01-26 04:08:20', '2023-01-26 04:08:20'),
(119, 'PAY-2023-01-26/116', 'IC-00000104', NULL, 'cash', 32, 'Received', '2023-01-26', '16', '2023-01-26 04:24:40', '2023-01-26 04:24:40'),
(120, 'PAY-2023-01-26/117', 'IC-00000105', NULL, 'cash', 74, 'Received', '2023-01-26', '16', '2023-01-26 04:36:56', '2023-01-26 04:36:56'),
(121, 'PAY-2023-01-26/118', 'IC-00000106', NULL, 'cash', 336, 'Received', '2023-01-26', '16', '2023-01-26 04:42:42', '2023-01-26 04:42:42'),
(122, 'PAY-2023-01-26/119', 'IC-00000107', NULL, 'cash', 210, 'Received', '2023-01-26', '16', '2023-01-26 05:24:29', '2023-01-26 05:24:29'),
(123, 'PAY-2023-01-26/120', 'IC-00000108', NULL, 'cash', 300, 'Received', '2023-01-26', '16', '2023-01-26 05:31:57', '2023-01-26 05:31:57'),
(124, 'PAY-2023-01-26/121', 'IC-00000109', NULL, 'cash', 11, 'Received', '2023-01-26', '16', '2023-01-26 05:45:38', '2023-01-26 05:45:38'),
(125, 'PAY-2023-01-26/122', 'IC-00000110', NULL, 'cash', 50, 'Received', '2023-01-26', '16', '2023-01-26 05:54:16', '2023-01-26 05:54:16'),
(126, 'PAY-2023-01-26/123', 'IC-00000111', NULL, 'cash', 137, 'Received', '2023-01-26', '16', '2023-01-26 06:01:34', '2023-01-26 06:01:34'),
(127, 'PAY-2023-01-26/124', 'IC-00000112', NULL, 'cash', 250, 'Received', '2023-01-26', '16', '2023-01-26 06:11:54', '2023-01-26 06:11:54'),
(128, 'PAY-2023-01-26/125', 'IC-00000113', NULL, 'cash', 123, 'Received', '2023-01-26', '16', '2023-01-26 06:18:41', '2023-01-26 06:18:41'),
(129, 'PAY-2023-01-26/126', 'IC-00000114', NULL, 'cash', 297000, 'Received', '2023-01-26', '16', '2023-01-26 06:24:55', '2023-01-26 06:24:55'),
(130, 'PAY-2023-01-26/127', 'IC-00000115', NULL, 'cash', 32, 'Received', '2023-01-26', '16', '2023-01-26 06:29:44', '2023-01-26 06:29:44'),
(131, 'PAY-2023-01-26/128', 'IC-00000116', NULL, 'cash', 6, 'Received', '2023-01-26', '16', '2023-01-26 06:36:35', '2023-01-26 06:36:35'),
(132, 'PAY-2023-01-26/129', 'IC-00000117', NULL, 'cash', 33, 'Received', '2023-01-26', '16', '2023-01-26 06:49:10', '2023-01-26 06:49:10'),
(133, 'PAY-2023-01-26/130', 'IC-00000118', NULL, 'cash', 16, 'Received', '2023-01-26', '16', '2023-01-26 07:06:55', '2023-01-26 07:06:55'),
(134, 'PAY-2023-01-26/131', 'IC-00000119', NULL, 'cash', 350, 'Received', '2023-01-26', '16', '2023-01-26 07:17:06', '2023-01-26 07:17:06'),
(135, 'PAY-2023-01-26/132', 'IC-00000120', NULL, 'cash', 69, 'Received', '2023-01-26', '16', '2023-01-26 07:26:09', '2023-01-26 07:26:09'),
(136, 'PAY-2023-01-26/133', 'IC-00000121', NULL, 'cash', 315, 'Received', '2023-01-26', '16', '2023-01-26 07:34:09', '2023-01-26 07:34:09'),
(137, 'PAY-2023-01-29/134', 'IC-00000122', NULL, 'cash', 16800, 'Received', '2023-01-29', '16', '2023-01-29 06:29:19', '2023-01-29 06:29:19'),
(138, 'PAY-2023-01-29/135', 'IC-00000123', NULL, 'cash', 84, 'Received', '2023-01-29', '16', '2023-01-29 06:40:31', '2023-01-29 06:40:31'),
(139, 'PAY-2023-01-29/136', 'IC-00000124', NULL, 'cash', 90, 'Received', '2023-01-29', '16', '2023-01-29 06:52:50', '2023-01-29 06:52:50'),
(140, 'PAY-2023-01-29/137', 'IC-00000125', NULL, 'cash', 120, 'Received', '2023-01-29', '16', '2023-01-29 07:01:14', '2023-01-29 07:01:14'),
(141, 'PAY-2023-01-29/138', 'IC-00000126', NULL, 'cash', 378, 'Received', '2023-01-29', '16', '2023-01-29 07:11:41', '2023-01-29 07:11:41'),
(142, 'PAY-2023-01-29/139', 'IC-00000127', NULL, 'cash', 525, 'Received', '2023-01-29', '16', '2023-01-29 07:16:24', '2023-01-29 07:16:24'),
(143, 'PAY-2023-01-29/140', 'IC-00000128', NULL, 'cash', 100, 'Received', '2023-01-29', '16', '2023-01-29 07:22:15', '2023-01-29 07:22:15'),
(144, 'PAY-2023-01-29/141', 'IC-00000129', NULL, 'cash', 120, 'Received', '2023-01-29', '16', '2023-01-29 07:29:40', '2023-01-29 07:29:40'),
(145, 'PAY-2023-02-02/142', 'IC-00000130', NULL, 'cash', 6500, 'Received', '2023-02-02', '14', '2023-02-02 05:11:27', '2023-02-02 05:11:27'),
(146, 'PAY-2023-02-02/143', 'IC-00000131', NULL, 'cash', 3000, 'Received', '2023-02-02', '14', '2023-02-02 05:17:02', '2023-02-02 05:17:02'),
(147, 'PAY-2023-02-02/144', 'IC-00000132', NULL, 'cash', 2100, 'Received', '2023-02-02', '14', '2023-02-02 07:15:58', '2023-02-02 07:15:58'),
(148, 'PAY-2023-02-06/145', 'IC-00000133', NULL, 'cash', 500, 'Received', '2023-02-06', '14', '2023-02-06 07:06:03', '2023-02-06 07:06:03'),
(149, 'PAY-2023-02-06/146', 'IC-00000134', NULL, 'cash', 1000, 'Received', '2023-02-06', '14', '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(150, 'PAY-2023-02-06/147', 'IC-00000135', NULL, 'cash', 400, 'Received', '2023-02-06', '14', '2023-02-06 07:23:11', '2023-02-06 07:23:11'),
(151, 'PAY-2023-02-06/148', 'IC-00000136', NULL, 'cash', 1100, 'Received', '2023-02-06', '14', '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(152, 'PAY-2023-02-06/149', 'IC-00000137', NULL, 'cash', 760, 'Received', '2023-02-06', '14', '2023-02-06 08:01:39', '2023-02-06 08:01:39'),
(153, 'PAY-2023-02-09/150', 'IC-00000138', NULL, 'cash', 11, 'Received', '2023-02-09', '16', '2023-02-09 07:00:56', '2023-02-09 07:00:56'),
(154, 'PAY-2023-03-04/151', 'IC-00000139', NULL, 'cash', 3188, 'Received', '2023-03-04', '16', '2023-03-04 04:34:39', '2023-03-04 04:34:39'),
(155, 'PAY-2023-03-04/152', 'IC-00000140', NULL, 'cash', 1500, 'Received', '2023-03-04', '16', '2023-03-04 04:46:13', '2023-03-04 04:46:13'),
(156, 'PAY-2023-03-04/153', 'IC-00000141', NULL, 'cash', 2550, 'Received', '2023-03-04', '16', '2023-03-04 05:38:26', '2023-03-04 05:38:26'),
(157, 'PAY-2023-03-04/154', 'IC-00000142', NULL, 'cash', 1000, 'Received', '2023-03-04', '16', '2023-03-04 05:47:42', '2023-03-04 05:47:42'),
(158, 'PAY-2023-03-04/155', 'IC-00000143', NULL, 'cash', 0, 'Received', '2023-03-04', '16', '2023-03-04 05:57:44', '2023-03-04 05:57:44'),
(159, 'PAY-2023-03-04/156', 'IC-00000144', NULL, 'cash', 3000, 'Received', '2023-03-04', '16', '2023-03-04 06:07:38', '2023-03-04 06:07:38'),
(160, 'PAY-2023-03-04/157', 'IC-00000145', NULL, 'cash', 2000, 'Received', '2023-03-04', '16', '2023-03-04 06:15:04', '2023-03-04 06:15:04'),
(161, 'PAY-2023-03-04/158', 'IC-00000146', NULL, 'cash', 300000, 'Received', '2023-03-04', '16', '2023-03-04 06:20:32', '2023-03-04 06:20:32'),
(162, 'PAY-2023-03-04/159', 'IC-00000147', NULL, 'cash', 400, 'Received', '2023-03-04', '16', '2023-03-04 06:30:19', '2023-03-04 06:30:19'),
(163, 'PAY-2023-03-04/160', 'IC-00000148', NULL, 'cash', 100, 'Received', '2023-03-04', '16', '2023-03-04 06:36:55', '2023-03-04 06:36:55'),
(164, 'PAY-2023-03-04/161', 'IC-00000149', NULL, 'cash', 80, 'Received', '2023-03-04', '16', '2023-03-04 06:50:40', '2023-03-04 06:50:40'),
(165, 'PAY-2023-03-04/162', 'IC-00000150', NULL, 'cash', 10000, 'Received', '2023-03-04', '16', '2023-03-04 06:57:19', '2023-03-04 06:57:19'),
(166, 'PAY-2023-03-04/163', 'IC-00000151', NULL, 'cash', 12000, 'Received', '2023-03-04', '16', '2023-03-04 06:58:13', '2023-03-04 06:58:13'),
(167, 'PAY-2023-03-04/164', 'IC-00000152', NULL, 'cash', 3000, 'Received', '2023-03-04', '11', '2023-03-04 09:36:07', '2023-03-04 09:36:07'),
(168, 'PAY-2023-03-11/165', 'IC-00000153', NULL, 'cash', 1000, 'Received', '2023-03-11', '14', '2023-03-11 05:02:43', '2023-03-11 05:02:43'),
(169, 'PAY-2023-04-03/166', 'IC-00000154', NULL, 'cash', 520, 'Received', '2023-04-03', '16', '2023-04-03 08:52:55', '2023-04-03 08:52:55'),
(170, 'PAY-2023-04-03/167', 'IC-00000155', NULL, 'cash', 520, 'Received', '2023-04-03', '16', '2023-04-03 10:23:05', '2023-04-03 10:23:05'),
(171, 'PAY-2023-04-04/168', 'IC-00000156', NULL, 'cash', 100, 'Received', '2023-04-04', '16', '2023-04-04 06:13:08', '2023-04-04 06:13:08'),
(172, 'PAY-2023-04-04/169', 'IC-00000157', NULL, 'card', 520, 'Received', '2023-04-04', '16', '2023-04-04 06:15:59', '2023-04-04 06:15:59'),
(173, 'PAY-2023-04-04/170', 'IC-00000158', NULL, 'cash', 50, 'Received', '2023-04-04', '16', '2023-04-04 06:16:40', '2023-04-04 06:16:40'),
(174, 'PAY-2023-04-04/171', 'IC-00000159', NULL, 'cash', 120, 'Received', '2023-04-04', '16', '2023-04-04 06:52:30', '2023-04-04 06:52:30'),
(175, 'PAY-2023-04-04/172', 'IC-00000160', NULL, 'cash', 100, 'Received', '2023-04-04', '16', '2023-04-04 06:53:25', '2023-04-04 06:53:25'),
(176, 'PAY-2023-04-04/173', 'IC-00000161', NULL, 'cash', 57.75, 'Received', '2023-04-04', '16', '2023-04-04 06:59:50', '2023-04-04 06:59:50'),
(177, 'PAY-2023-04-04/174', 'IC-00000162', NULL, 'cash', 2000, 'Received', '2023-04-04', '16', '2023-04-04 07:05:29', '2023-04-04 07:05:29'),
(178, 'PAY-2023-04-04/175', 'IC-00000163', NULL, 'cash', 800, 'Received', '2023-04-04', '16', '2023-04-04 07:10:42', '2023-04-04 07:10:42'),
(179, 'PAY-2023-04-04/176', 'IC-00000164', NULL, 'cash', 32000, 'Received', '2023-04-04', '16', '2023-04-04 07:26:54', '2023-04-04 07:26:54'),
(180, 'PAY-2023-04-04/177', 'IC-00000165', NULL, 'cash', 6, 'Received', '2023-04-04', '16', '2023-04-04 07:27:32', '2023-04-04 07:27:32'),
(181, 'PAY-2023-04-05/178', 'IC-00000166', NULL, 'cash', 600, 'Received', '2023-04-05', '16', '2023-04-05 06:34:29', '2023-04-05 06:34:29'),
(182, 'PAY-2023-04-05/179', 'IC-00000167', NULL, 'cash', 50, 'Received', '2023-04-05', '16', '2023-04-05 06:43:12', '2023-04-05 06:43:12'),
(183, 'PAY-2023-04-05/180', 'IC-00000168', NULL, 'cash', 30, 'Received', '2023-04-05', '16', '2023-04-05 06:47:40', '2023-04-05 06:47:40'),
(184, 'PAY-2023-04-05/181', 'IC-00000169', NULL, 'cash', 200, 'Received', '2023-04-05', '16', '2023-04-05 06:50:53', '2023-04-05 06:50:53'),
(185, 'PAY-2023-04-05/182', 'IC-00000170', NULL, 'cash', 130, 'Received', '2023-04-05', '16', '2023-04-05 06:54:32', '2023-04-05 06:54:32'),
(186, 'PAY-2023-04-05/183', 'IC-00000171', NULL, 'cash', 130, 'Received', '2023-04-05', '16', '2023-04-05 06:54:35', '2023-04-05 06:54:35'),
(187, 'PAY-2023-04-05/184', 'IC-00000172', NULL, 'cash', 200, 'Received', '2023-04-05', '16', '2023-04-05 06:57:13', '2023-04-05 06:57:13'),
(188, 'PAY-2023-04-05/185', 'IC-00000173', NULL, 'cash', 50, 'Received', '2023-04-05', '16', '2023-04-05 07:01:48', '2023-04-05 07:01:48'),
(189, 'PAY-2023-04-05/186', 'IC-00000174', NULL, 'cash', 546, 'Received', '2023-04-05', '16', '2023-04-05 07:06:00', '2023-04-05 07:06:00'),
(190, 'PAY-2023-04-05/187', 'IC-00000175', NULL, 'cash', 40, 'Received', '2023-04-05', '16', '2023-04-05 07:09:43', '2023-04-05 07:09:43'),
(191, 'PAY-2023-04-05/188', 'IC-00000176', NULL, 'cash', 50, 'Received', '2023-04-05', '16', '2023-04-05 07:13:04', '2023-04-05 07:13:04'),
(192, 'PAY-2023-04-05/189', 'IC-00000177', NULL, 'cash', 200, 'Received', '2023-04-05', '16', '2023-04-05 07:19:08', '2023-04-05 07:19:08'),
(193, 'PAY-2023-04-05/190', 'IC-00000178', NULL, 'cash', 500, 'Received', '2023-04-05', '16', '2023-04-05 07:22:54', '2023-04-05 07:22:54'),
(194, 'PAY-2023-04-05/191', 'IC-00000179', NULL, 'cash', 100, 'Received', '2023-04-05', '16', '2023-04-05 07:23:28', '2023-04-05 07:23:28'),
(195, 'PAY-2023-04-05/192', 'IC-00000180', NULL, 'cash', 50, 'Received', '2023-04-05', '16', '2023-04-05 07:28:15', '2023-04-05 07:28:15'),
(196, 'PAY-2023-04-05/193', 'IC-00000181', NULL, 'cash', 900, 'Received', '2023-04-05', '16', '2023-04-05 07:28:18', '2023-04-05 07:28:18'),
(197, 'PAY-2023-04-06/194', 'IC-00000182', NULL, 'cash', 300, 'Received', '2023-04-06', '16', '2023-04-06 04:13:08', '2023-04-06 04:13:08'),
(198, 'PAY-2023-04-06/195', 'IC-00000182', NULL, 'cash', 30, 'Received', '2023-04-06', '16', '2023-04-06 04:44:06', '2023-04-06 04:44:06'),
(199, 'PAY-2023-04-06/196', 'IC-00000183', NULL, 'cash', 130, 'Received', '2023-04-06', '16', '2023-04-06 04:49:30', '2023-04-06 04:49:30'),
(200, 'PAY-2023-04-06/197', 'IC-00000184', NULL, 'cash', 50, 'Received', '2023-04-06', '16', '2023-04-06 05:00:04', '2023-04-06 05:00:04'),
(201, 'PAY-2023-04-06/198', 'IC-00000185', NULL, 'cash', 2000, 'Received', '2023-04-06', '16', '2023-04-06 05:12:09', '2023-04-06 05:12:09'),
(202, 'PAY-2023-04-06/199', 'IC-00000186', NULL, 'cash', 500, 'Received', '2023-04-06', '16', '2023-04-06 05:29:40', '2023-04-06 05:29:40'),
(203, 'PAY-2023-04-06/200', 'IC-00000187', NULL, 'cash', 500, 'Received', '2023-04-06', '16', '2023-04-06 06:07:33', '2023-04-06 06:07:33'),
(204, 'PAY-2023-04-06/201', 'IC-00000188', NULL, 'cash', 50, 'Received', '2023-04-06', '16', '2023-04-06 06:15:34', '2023-04-06 06:15:34'),
(205, 'PAY-2023-04-06/202', 'IC-00000189', NULL, 'cash', 200, 'Received', '2023-04-06', '16', '2023-04-06 06:23:52', '2023-04-06 06:23:52'),
(206, 'PAY-2023-04-13/203', 'IC-00000190', NULL, 'cash', 9000, 'Received', '2023-04-13', '14', '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(207, 'PAY-2023-04-13/204', 'IC-00000191', NULL, 'cash', 7000, 'Received', '2023-04-13', '14', '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(208, 'PAY-2023-04-13/205', 'IC-00000192', NULL, 'cash', 1250, 'Received', '2023-04-13', '14', '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(209, 'PAY-2023-04-13/206', 'IC-00000193', NULL, 'cash', 1000, 'Received', '2023-04-13', '14', '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(210, 'PAY-2023-04-13/207', 'IC-00000194', NULL, 'cash', 500, 'Received', '2023-04-13', '14', '2023-04-13 07:48:31', '2023-04-13 07:48:31'),
(211, 'PAY-2023-04-13/208', 'IC-00000195', NULL, 'cash', 98000, 'Received', '2023-04-13', '14', '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(212, 'PAY-2023-04-16/209', 'IC-00000196', NULL, 'cash', 1000, 'Received', '2023-04-16', '14', '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(213, 'PAY-2023-04-16/210', 'IC-00000197', NULL, 'cash', 500, 'Received', '2023-04-16', '14', '2023-04-16 04:12:11', '2023-04-16 04:12:11'),
(214, 'PAY-2023-04-16/211', 'IC-00000198', NULL, 'cash', 900, 'Received', '2023-04-16', '14', '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(215, 'PAY-2023-04-16/212', 'IC-00000199', NULL, 'cash', 400, 'Received', '2023-04-16', '14', '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(216, 'PAY-2023-04-16/213', 'IC-00000200', NULL, 'cash', 118000, 'Received', '2023-04-16', '14', '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(217, 'PAY-2023-04-17/214', 'IC-00000201', NULL, 'cash', 3500, 'Received', '2023-04-17', '11', '2023-04-17 04:49:26', '2023-04-17 04:49:26'),
(218, 'PAY-2023-04-17/215', 'IC-00000202', NULL, 'cash', 500, 'Received', '2023-04-17', '11', '2023-04-17 05:00:09', '2023-04-17 05:00:09'),
(219, 'PAY-2023-04-18/216', 'IC-00000203', NULL, 'cash', 500, 'Received', '2023-04-18', '11', '2023-04-18 04:32:37', '2023-04-18 04:32:37'),
(220, 'PAY-2023-04-30/217', 'IC-00000204', NULL, 'cash', 1000, 'Received', '2023-04-30', '11', '2023-04-30 07:06:44', '2023-04-30 07:06:44'),
(221, 'PAY-2023-05-06/218', 'IC-00000205', NULL, 'cash', 300, 'Received', '2023-05-06', '11', '2023-05-06 07:23:41', '2023-05-06 07:23:41'),
(222, 'PAY-2023-05-09/219', 'IC-00000206', NULL, 'cash', 500, 'Received', '2023-05-09', '14', '2023-05-09 05:59:13', '2023-05-09 05:59:13'),
(223, 'PAY-2023-05-09/220', 'IC-00000207', NULL, 'cash', 500, 'Received', '2023-05-09', '14', '2023-05-09 06:16:28', '2023-05-09 06:16:28'),
(224, 'PAY-2023-05-09/221', 'IC-00000208', NULL, 'cash', 520, 'Received', '2023-05-09', '15', '2023-05-09 11:12:09', '2023-05-09 11:12:09'),
(225, 'PAY-2023-05-13/222', 'IC-00000209', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 05:05:16', '2023-05-13 05:05:16'),
(226, 'PAY-2023-05-13/223', 'IC-00000210', NULL, 'cash', 0, 'Received', '2023-05-13', '14', '2023-05-13 05:19:28', '2023-05-13 05:19:28'),
(227, 'PAY-2023-05-13/224', 'IC-00000211', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 05:26:56', '2023-05-13 05:26:56'),
(228, 'PAY-2023-05-13/225', 'IC-00000212', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 05:30:11', '2023-05-13 05:30:11'),
(229, 'PAY-2023-05-13/226', 'IC-00000213', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 05:34:02', '2023-05-13 05:34:02'),
(230, 'PAY-2023-05-13/227', 'IC-00000214', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 05:43:10', '2023-05-13 05:43:10'),
(231, 'PAY-2023-05-13/228', 'IC-00000215', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 05:47:18', '2023-05-13 05:47:18'),
(232, 'PAY-2023-05-13/229', 'IC-00000216', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 06:46:01', '2023-05-13 06:46:01'),
(233, 'PAY-2023-05-13/230', 'IC-00000217', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 06:56:17', '2023-05-13 06:56:17'),
(234, 'PAY-2023-05-13/231', 'IC-00000218', NULL, 'cash', 1500, 'Received', '2023-05-13', '14', '2023-05-13 07:00:43', '2023-05-13 07:00:43'),
(235, 'PAY-2023-05-13/232', 'IC-00000219', NULL, 'cash', 1100, 'Received', '2023-05-13', '14', '2023-05-13 07:05:49', '2023-05-13 07:05:49'),
(236, 'PAY-2023-05-13/233', 'IC-00000220', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 07:15:44', '2023-05-13 07:15:44'),
(237, 'PAY-2023-05-13/234', 'IC-00000221', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 07:25:45', '2023-05-13 07:25:45'),
(238, 'PAY-2023-05-13/235', 'IC-00000222', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 07:28:57', '2023-05-13 07:28:57'),
(239, 'PAY-2023-05-13/236', 'IC-00000223', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 07:33:40', '2023-05-13 07:33:40'),
(240, 'PAY-2023-05-13/237', 'IC-00000224', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 07:41:01', '2023-05-13 07:41:01'),
(241, 'PAY-2023-05-13/238', 'IC-00000225', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 07:50:17', '2023-05-13 07:50:17'),
(242, 'PAY-2023-05-13/239', 'IC-00000226', NULL, 'cash', 0, 'Received', '2023-05-13', '14', '2023-05-13 07:55:49', '2023-05-13 07:55:49'),
(243, 'PAY-2023-05-13/240', 'IC-00000227', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 07:59:06', '2023-05-13 07:59:06'),
(244, 'PAY-2023-05-13/241', 'IC-00000228', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 08:04:15', '2023-05-13 08:04:15'),
(245, 'PAY-2023-05-13/242', 'IC-00000229', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 08:11:36', '2023-05-13 08:11:36'),
(246, 'PAY-2023-05-13/243', 'IC-00000230', NULL, 'cash', 1000, 'Received', '2023-05-13', '14', '2023-05-13 08:18:02', '2023-05-13 08:18:02'),
(247, 'PAY-2023-05-13/244', 'IC-00000231', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 08:24:27', '2023-05-13 08:24:27'),
(248, 'PAY-2023-05-13/245', 'IC-00000232', NULL, 'cash', 500, 'Received', '2023-05-13', '14', '2023-05-13 08:29:10', '2023-05-13 08:29:10'),
(249, 'PAY-2023-06-17/246', 'IC-00000233', NULL, 'cash', 520, 'Received', '2023-06-17', '16', '2023-06-17 04:07:26', '2023-06-17 04:07:26'),
(250, 'PAY-2023-06-17/247', 'IC-00000234', NULL, 'cash', 2500, 'Received', '2023-06-17', '16', '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(251, 'PAY-2023-06-17/248', 'IC-00000235', NULL, 'cash', 5000, 'Received', '2023-06-17', '16', '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(252, 'PAY-2023-06-17/249', 'IC-00000236', NULL, 'cash', 5000, 'Received', '2023-06-17', '16', '2023-06-17 06:56:17', '2023-06-17 06:56:17'),
(253, 'PAY-2023-06-17/250', 'IC-00000237', NULL, 'cash', 136000, 'Received', '2023-06-17', '16', '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(254, 'PAY-2023-06-17/251', 'IC-00000238', NULL, 'cash', 3000, 'Received', '2023-06-17', '16', '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(255, 'PAY-2023-06-17/252', 'IC-00000239', NULL, 'cash', 40000, 'Received', '2023-06-17', '16', '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(256, 'PAY-2023-06-17/253', 'IC-00000240', NULL, 'cash', 11000, 'Received', '2023-06-17', '16', '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(257, 'PAY-2023-06-25/254', 'IC-00000241', NULL, 'cash', 60, 'Received', '2023-06-25', '15', '2023-06-25 07:38:53', '2023-06-25 07:38:53'),
(258, 'PAY-2023-07-04/255', 'IC-00000242', NULL, 'cash', 1000, 'Received', '2023-07-04', '14', '2023-07-04 09:48:45', '2023-07-04 09:48:45'),
(259, 'PAY-2023-07-05/256', 'IC-00000243', NULL, 'cash', 1000, 'Received', '2023-07-05', '14', '2023-07-05 05:58:46', '2023-07-05 05:58:46'),
(260, 'PAY-2023-07-05/257', 'IC-00000244', NULL, 'cash', 160, 'Received', '2023-07-05', '14', '2023-07-05 06:53:08', '2023-07-05 06:53:08'),
(261, 'PAY-2023-07-05/258', 'IC-00000245', NULL, 'cash', 1700, 'Received', '2023-07-05', '14', '2023-07-05 07:14:09', '2023-07-05 07:14:09'),
(262, 'PAY-2023-07-05/259', 'IC-00000246', NULL, 'cash', 1700, 'Received', '2023-07-05', '14', '2023-07-05 07:14:11', '2023-07-05 07:14:11'),
(263, 'PAY-2023-07-05/260', 'IC-00000247', NULL, 'cash', 0, 'Received', '2023-07-05', '14', '2023-07-05 07:16:10', '2023-07-05 07:16:10'),
(264, 'PAY-2023-07-05/261', 'IC-00000248', NULL, 'cash', 0, 'Received', '2023-07-05', '14', '2023-07-05 07:18:25', '2023-07-05 07:18:25'),
(265, 'PAY-2023-07-05/262', 'IC-00000249', NULL, 'cash', 1000, 'Received', '2023-07-05', '14', '2023-07-05 07:23:51', '2023-07-05 07:23:51'),
(266, 'PAY-2023-07-05/263', 'IC-00000250', NULL, 'cash', 1200, 'Received', '2023-07-05', '14', '2023-07-05 07:41:19', '2023-07-05 07:41:19'),
(267, 'PAY-2023-07-05/264', 'IC-00000251', NULL, 'cash', 5280, 'Received', '2023-07-05', '14', '2023-07-05 07:43:39', '2023-07-05 07:43:39'),
(268, 'PAY-2023-07-05/265', 'IC-00000252', NULL, 'cash', 5280, 'Received', '2023-07-05', '14', '2023-07-05 07:43:40', '2023-07-05 07:43:40'),
(269, 'PAY-2023-07-05/266', 'IC-00000253', NULL, 'cash', 500, 'Received', '2023-07-05', '16', '2023-07-05 07:45:31', '2023-07-05 07:45:31'),
(270, 'PAY-2023-07-05/267', 'IC-00000254', NULL, 'cash', 1350, 'Received', '2023-07-05', '14', '2023-07-05 07:51:45', '2023-07-05 07:51:45'),
(271, 'PAY-2023-07-05/268', 'IC-00000255', NULL, 'cash', 30, 'Received', '2023-07-05', '16', '2023-07-05 07:55:53', '2023-07-05 07:55:53'),
(272, 'PAY-2023-07-05/269', 'IC-00000256', NULL, 'cash', 150, 'Received', '2023-07-05', '14', '2023-07-05 07:56:17', '2023-07-05 07:56:17'),
(273, 'PAY-2023-07-06/270', 'IC-00000257', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 03:09:56', '2023-07-06 03:09:56'),
(274, 'PAY-2023-07-06/271', 'IC-00000258', NULL, 'cash', 50, 'Received', '2023-07-06', '16', '2023-07-06 04:08:24', '2023-07-06 04:08:24'),
(275, 'PAY-2023-07-06/272', 'IC-00000259', NULL, 'cash', 100, 'Received', '2023-07-06', '16', '2023-07-06 04:21:20', '2023-07-06 04:21:20'),
(276, 'PAY-2023-07-06/273', 'IC-00000260', NULL, 'cash', 200, 'Received', '2023-07-06', '16', '2023-07-06 04:28:03', '2023-07-06 04:28:03'),
(277, 'PAY-2023-07-06/274', 'IC-00000261', NULL, 'cash', 150, 'Received', '2023-07-06', '16', '2023-07-06 04:33:03', '2023-07-06 04:33:03'),
(278, 'PAY-2023-07-06/275', 'IC-00000262', NULL, 'cash', 500, 'Received', '2023-07-06', '16', '2023-07-06 04:42:31', '2023-07-06 04:42:31'),
(279, 'PAY-2023-07-06/276', 'IC-00000263', NULL, 'cash', 50, 'Received', '2023-07-06', '16', '2023-07-06 04:44:02', '2023-07-06 04:44:02'),
(280, 'PAY-2023-07-06/277', 'IC-00000264', NULL, 'cash', 50, 'Received', '2023-07-06', '16', '2023-07-06 04:47:32', '2023-07-06 04:47:32'),
(281, 'PAY-2023-07-06/278', 'IC-00000265', NULL, 'cash', 50, 'Received', '2023-07-06', '16', '2023-07-06 04:48:10', '2023-07-06 04:48:10'),
(282, 'PAY-2023-07-06/279', 'IC-00000266', NULL, 'cash', 200, 'Received', '2023-07-06', '16', '2023-07-06 04:50:31', '2023-07-06 04:50:31'),
(283, 'PAY-2023-07-06/280', 'IC-00000267', NULL, 'cash', 40, 'Received', '2023-07-06', '16', '2023-07-06 04:55:31', '2023-07-06 04:55:31'),
(284, 'PAY-2023-07-06/281', 'IC-00000268', NULL, 'cash', 200, 'Received', '2023-07-06', '16', '2023-07-06 04:58:26', '2023-07-06 04:58:26'),
(285, 'PAY-2023-07-06/282', 'IC-00000269', NULL, 'cash', 550, 'Received', '2023-07-06', '16', '2023-07-06 04:59:54', '2023-07-06 04:59:54'),
(286, 'PAY-2023-07-06/283', 'IC-00000270', NULL, 'cash', 200, 'Received', '2023-07-06', '16', '2023-07-06 05:01:27', '2023-07-06 05:01:27'),
(287, 'PAY-2023-07-06/284', 'IC-00000271', NULL, 'card', 600, 'Received', '2023-07-06', '16', '2023-07-06 06:05:41', '2023-07-06 06:05:41'),
(288, 'PAY-2023-07-06/285', 'IC-00000272', NULL, 'cash', 2000, 'Received', '2023-07-06', '16', '2023-07-06 06:07:11', '2023-07-06 06:07:11'),
(289, 'PAY-2023-07-06/286', 'IC-00000273', NULL, 'cash', 550, 'Received', '2023-07-06', '16', '2023-07-06 06:10:54', '2023-07-06 06:10:54'),
(290, 'PAY-2023-07-06/287', 'IC-00000274', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 06:12:26', '2023-07-06 06:12:26'),
(291, 'PAY-2023-07-06/288', 'IC-00000274', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 06:13:22', '2023-07-06 06:13:22'),
(292, 'PAY-2023-07-06/289', 'IC-00000275', NULL, 'cash', 600, 'Received', '2023-07-06', '16', '2023-07-06 06:16:01', '2023-07-06 06:16:01'),
(293, 'PAY-2023-07-06/290', 'IC-00000276', NULL, 'cash', 0, 'Received', '2023-07-06', '16', '2023-07-06 06:17:24', '2023-07-06 06:17:24'),
(294, 'PAY-2023-07-06/291', 'IC-00000277', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 06:19:29', '2023-07-06 06:19:29'),
(295, 'PAY-2023-07-06/292', 'IC-00000278', NULL, 'cash', 600, 'Received', '2023-07-06', '16', '2023-07-06 06:21:17', '2023-07-06 06:21:17'),
(296, 'PAY-2023-07-06/293', 'IC-00000279', NULL, 'cash', 600, 'Received', '2023-07-06', '16', '2023-07-06 06:27:30', '2023-07-06 06:27:30'),
(297, 'PAY-2023-07-06/294', 'IC-00000280', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 06:31:56', '2023-07-06 06:31:56'),
(298, 'PAY-2023-07-06/295', 'IC-00000281', NULL, 'cash', 500, 'Received', '2023-07-06', '16', '2023-07-06 06:31:58', '2023-07-06 06:31:58'),
(299, 'PAY-2023-07-06/296', 'IC-00000282', NULL, 'cash', 500, 'Received', '2023-07-06', '16', '2023-07-06 06:34:14', '2023-07-06 06:34:14'),
(300, 'PAY-2023-07-06/297', 'IC-00000283', NULL, 'cash', 50, 'Received', '2023-07-06', '16', '2023-07-06 06:39:00', '2023-07-06 06:39:00'),
(301, 'PAY-2023-07-06/298', 'IC-00000284', NULL, 'cash', 500, 'Received', '2023-07-06', '16', '2023-07-06 06:39:24', '2023-07-06 06:39:24'),
(302, 'PAY-2023-07-06/299', 'IC-00000285', NULL, 'cash', 500, 'Received', '2023-07-06', '16', '2023-07-06 06:42:10', '2023-07-06 06:42:10'),
(303, 'PAY-2023-07-06/300', 'IC-00000286', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 06:44:45', '2023-07-06 06:44:45'),
(304, 'PAY-2023-07-06/301', 'IC-00000287', NULL, 'cash', 600, 'Received', '2023-07-06', '16', '2023-07-06 06:45:58', '2023-07-06 06:45:58'),
(305, 'PAY-2023-07-06/302', 'IC-00000288', NULL, 'cash', 700, 'Received', '2023-07-06', '16', '2023-07-06 06:49:50', '2023-07-06 06:49:50'),
(306, 'PAY-2023-07-06/303', 'IC-00000289', NULL, 'cash', 22, 'Received', '2023-07-06', '16', '2023-07-06 06:52:00', '2023-07-06 06:52:00'),
(307, 'PAY-2023-07-06/304', 'IC-00000290', NULL, 'cash', 550, 'Received', '2023-07-06', '16', '2023-07-06 06:55:21', '2023-07-06 06:55:21'),
(308, 'PAY-2023-07-06/305', 'IC-00000291', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 07:03:01', '2023-07-06 07:03:01'),
(309, 'PAY-2023-07-06/306', 'IC-00000292', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 07:10:45', '2023-07-06 07:10:45'),
(310, 'PAY-2023-07-06/307', 'IC-00000293', NULL, 'cash', 1000, 'Received', '2023-07-06', '16', '2023-07-06 07:16:37', '2023-07-06 07:16:37'),
(311, 'PAY-2023-07-06/308', 'IC-00000294', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 07:24:43', '2023-07-06 07:24:43'),
(312, 'PAY-2023-07-06/309', 'IC-00000295', NULL, 'cash', 20, 'Received', '2023-07-06', '16', '2023-07-06 07:29:30', '2023-07-06 07:29:30'),
(313, 'PAY-2023-07-11/310', 'IC-00000296', NULL, 'cash', 20, 'Received', '2023-07-11', '15', '2023-07-11 04:12:08', '2023-07-11 04:12:08'),
(314, 'PAY-2023-07-11/311', 'IC-00000297', NULL, 'cash', 500, 'Received', '2023-07-11', '14', '2023-07-11 05:27:20', '2023-07-11 05:27:20'),
(315, 'PAY-2023-07-11/312', 'IC-00000298', NULL, 'cash', 0, 'Received', '2023-07-11', '13', '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(316, 'PAY-2023-07-13/313', 'IC-00000299', NULL, 'card', 2500, 'Received', '2023-07-13', '16', '2023-07-13 04:06:38', '2023-07-13 04:06:38'),
(317, 'PAY-2023-07-13/314', 'IC-00000300', NULL, 'card', 2000, 'Received', '2023-07-13', '16', '2023-07-13 06:40:19', '2023-07-13 06:40:19'),
(318, 'PAY-2023-07-15/315', 'IC-00000301', NULL, 'cash', 1100, 'Received', '2023-07-15', '16', '2023-07-15 04:46:50', '2023-07-15 04:46:50'),
(319, 'PAY-2023-07-17/316', 'IC-00000302', NULL, 'cash', 4000, 'Received', '2023-07-17', '14', '2023-07-17 07:31:50', '2023-07-17 07:31:50'),
(320, 'PAY-2023-07-17/317', 'IC-00000303', NULL, 'cash', 1500, 'Received', '2023-07-17', '14', '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(321, 'PAY-2023-07-17/318', 'IC-00000304', NULL, 'cash', 500, 'Received', '2023-07-17', '14', '2023-07-17 08:06:19', '2023-07-17 08:06:19'),
(322, 'PAY-2023-08-22/319', 'IC-00000305', NULL, 'cash', 1000, 'Received', '2023-08-22', '18', '2023-08-22 06:17:31', '2023-08-22 06:17:31'),
(323, 'PAY-2024-03-17/320', 'IC-00000305', NULL, 'cash', 1450, 'Received', '2024-03-17', '18', '2024-03-17 06:52:53', '2024-03-17 06:52:53'),
(324, 'PAY-2024-03-19/321', 'IC-00000306', NULL, 'card', 5000, 'Received', '2024-03-19', '20', '2024-03-19 05:12:20', '2024-03-19 05:12:20'),
(325, 'PAY-2024-03-19/322', 'IC-00000307', NULL, 'cash', 5000, 'Received', '2024-03-19', '20', '2024-03-19 05:17:09', '2024-03-19 05:17:09'),
(327, 'PAY-2024-03-19/323', NULL, 'PUC-5', 'cash', 500, 'paid', '2024-03-19', '20', '2024-03-19 08:08:15', '2024-03-19 08:08:15'),
(328, 'PAY-2024-03-21/324', 'IC-00000308', NULL, 'cash', 0, 'Received', '2024-03-21', '20', '2024-03-21 08:16:58', '2024-03-21 08:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add product', 'admin', '2020-02-10 07:44:16', '2020-02-10 07:44:16'),
(3, 'edit product', 'admin', '2020-02-11 10:01:40', '2020-02-11 10:01:40'),
(4, 'product list', 'admin', '2020-02-11 10:01:57', '2020-02-11 10:01:57'),
(5, 'print barcode', 'admin', '2020-02-11 10:02:32', '2020-02-11 10:02:32'),
(6, 'pos module', 'admin', '2020-02-11 10:03:41', '2020-02-11 10:03:41'),
(7, 'purchase list', 'admin', '2020-02-11 10:04:34', '2020-02-11 10:04:34'),
(8, 'add purchase', 'admin', '2020-02-11 10:04:34', '2020-02-11 10:04:34'),
(9, 'edit purchase', 'admin', '2020-02-11 10:04:34', '2020-02-11 10:04:34'),
(10, 'Add sale', 'admin', '2020-02-11 10:05:35', '2020-02-11 10:05:35'),
(11, 'sales list', 'admin', '2020-02-11 10:05:35', '2020-02-11 10:05:35'),
(12, 'edit sale', 'admin', '2020-02-11 10:05:35', '2020-02-11 10:05:35'),
(13, 'sale list', 'admin', '2020-02-11 10:06:36', '2020-02-11 10:06:36'),
(14, 'Add expense', 'admin', '2020-02-11 10:07:10', '2020-02-11 10:07:10'),
(15, 'edit expense', 'admin', '2020-02-11 10:07:10', '2020-02-11 10:07:10'),
(16, 'expense list', 'admin', '2020-02-11 10:08:59', '2020-02-11 10:08:59'),
(17, 'add customer', 'admin', '2020-02-11 10:08:59', '2020-02-11 10:08:59'),
(18, 'delete customer', 'admin', '2020-02-11 10:08:59', '2020-02-11 10:08:59'),
(19, 'edit customer', 'admin', '2020-02-11 10:08:59', '2020-02-11 10:08:59'),
(20, 'customer list', 'admin', '2020-02-11 10:10:10', '2020-02-11 10:10:10'),
(21, 'add supplier', 'admin', '2020-02-11 10:10:10', '2020-02-11 10:10:10'),
(22, 'delete supplier', 'admin', '2020-02-11 10:10:10', '2020-02-11 10:10:10'),
(23, 'edit supplier', 'admin', '2020-02-11 10:10:10', '2020-02-11 10:10:10'),
(24, 'supplier list', 'admin', '2020-02-11 10:10:10', '2020-02-11 10:10:10'),
(25, 'add biller', 'admin', '2020-02-11 10:14:07', '2020-02-11 10:14:07'),
(26, 'delete biller', 'admin', '2020-02-11 10:14:07', '2020-02-11 10:14:07'),
(27, 'edit biller', 'admin', '2020-02-11 10:14:07', '2020-02-11 10:14:07'),
(28, 'biller list', 'admin', '2020-02-11 10:14:07', '2020-02-11 10:14:07'),
(29, 'add user', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(30, 'delete user', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(31, 'edit user', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(32, 'user list', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(33, 'chnage permission', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(34, 'permission list', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(35, 'add user role', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(36, 'user role list', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(37, 'delete user role', 'admin', '2020-02-11 10:16:35', '2020-02-11 10:16:35'),
(38, 'system setting', 'admin', '2020-02-11 10:17:13', '2020-02-11 10:17:13'),
(39, 'delete product', 'admin', '2020-03-05 14:30:44', '2020-03-05 14:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `supplier` int(11) DEFAULT NULL,
  `codeSymbology` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `purchase_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `whole_sell` double DEFAULT 0,
  `start_inventory` int(10) DEFAULT 0,
  `start_cost` double NOT NULL DEFAULT 0,
  `alert_qty` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `slug`, `supplier`, `codeSymbology`, `category`, `subcategory`, `unit`, `brand`, `purchase_price`, `sell_price`, `whole_sell`, `start_inventory`, `start_cost`, `alert_qty`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(221, 'Pran Chinigura', 'PC-221', 'pran-chinigura', 1, NULL, 1, NULL, 4, NULL, 500, 520, 500, 20, 0, NULL, 'uploads/product_image/pran rice50kg.png', NULL, 1, '2022-07-14 05:28:34', '2022-07-14 05:28:34'),
(222, 'Teer Soyabin Oil 5L', 'PC-222', 'teer-soyabin-oil-5l', 1, NULL, 4, 1, 4, 6, 800, 850, 800, NULL, 0, NULL, 'uploads/product_image/teer.jpg', NULL, 1, '2022-07-14 05:43:08', '2022-07-14 05:43:08'),
(223, 'MUM 330 ML', 'PC-223', 'mum-330-ml', 1, NULL, 4, 1, 12, 3, 15, 12, 15, NULL, 0, NULL, 'uploads/product_image/mum_330ml.jpg', NULL, 1, '2022-07-14 05:47:04', '2022-07-14 05:47:04'),
(224, 'Alltime Fruit Cake', 'PC-224', 'alltime-fruid-cake', 1, NULL, 1, NULL, 8, 6, 26, 30, 30, NULL, 0, NULL, 'uploads/product_image/alltime_cake.jpg', NULL, 1, '2022-07-14 05:49:05', '2022-07-14 05:49:05'),
(225, 'Clear MEN 270ml', 'PC-225', 'clear-men-270ml', 1, NULL, 4, 1, 12, 2, 270, 280, 270, NULL, 0, NULL, 'uploads/product_image/clear_men.jpg', NULL, 1, '2022-07-14 05:50:32', '2022-07-14 05:50:32'),
(226, 'LUX 150gm', 'PC-226', 'lux-150gm', 1, NULL, 4, 1, 4, 5, 70, 80, 70, NULL, 0, NULL, 'uploads/product_image/lux 150g.jpg', NULL, 1, '2022-07-14 05:51:52', '2022-07-14 05:51:52'),
(227, 'Pepsodent 70gm', 'PC-227', 'pepsodent-70gm', 1, NULL, 4, 1, 4, 8, 80, 90, 80, NULL, 0, NULL, 'uploads/product_image/pepsodent.jpg', NULL, 1, '2022-07-14 05:52:55', '2022-07-14 05:52:55'),
(228, 'RUCHI JHAL Chanachur 300gm', 'PC-228', 'ruchi-jhal-chanachur-300gm', 1, NULL, 2, NULL, 4, 7, 50, 60, 50, NULL, 0, NULL, 'uploads/product_image/ruchi_chanachur_hot_front_ad52c7fe-b026-4fe5-a439-8d9129f3cfd5_1400x.webp', NULL, 1, '2022-07-14 05:54:09', '2022-07-14 05:54:09'),
(229, 'PONDS Cream 35gm', 'PC-229', 'ponds-cream-35gm', 1, NULL, 4, 1, 4, 9, 110, 120, 110, NULL, 0, NULL, 'uploads/product_image/ponds.jpeg', NULL, 1, '2022-07-14 05:55:19', '2022-07-14 05:55:19'),
(230, 'Alltime Roma 60gm', 'PC-230', 'alltime-roma-60gm', 1, NULL, 2, NULL, 4, 6, 70, 80, 70, NULL, 0, NULL, 'uploads/product_image/7-roma-product-image-750x750px-min.png', NULL, 1, '2022-07-14 05:56:11', '2022-07-14 05:56:11'),
(231, 'Lifebuoy 100gm', 'PC-231', 'lifebuoy-100gm', 1, NULL, 4, 1, 4, NULL, 70, 80, 70, NULL, 0, NULL, 'uploads/product_image/lifebuoy_soap_bar_total_100g.png', NULL, 1, '2022-07-14 05:59:53', '2022-07-14 05:59:53'),
(232, 'Lifebuoy Handwash 500gm', 'PC-232', 'lifebuoy-handwash-500gm', 1, NULL, 4, 1, 4, 1, 85, 90, 85, NULL, 0, NULL, 'uploads/product_image/lifeboy_handwash.jpg', NULL, 1, '2022-07-14 06:00:42', '2022-07-14 06:00:42'),
(233, 'Frutika Mango Juice 1L', 'PC-233', 'frutika-mango-juice-1l', 1, NULL, 4, 1, 12, 4, 60, 70, 60, NULL, 0, NULL, 'uploads/product_image/frutika-mango-juice-1-ltr.jpg', NULL, 1, '2022-07-14 06:02:30', '2022-07-14 06:02:30'),
(234, 'Frutika Grape Juice 250ml', 'PC-234', 'frutika-grape-juice-250ml', 1, NULL, 4, 1, 12, 4, 25, 30, 25, 10, 250, NULL, 'uploads/product_image/frutika-grape-juice-250ml.jpg', NULL, 1, '2022-07-14 06:07:41', '2022-07-14 06:07:41'),
(235, 'Alltime Sweet Toast', 'PC-235', 'alltime-sweet-toast', 1, NULL, 4, 1, 4, 6, 55, 60, 60, 10, 550, NULL, 'uploads/product_image/0279404_all-time-sweet-toast-350gm.webp', NULL, 1, '2022-07-14 06:11:01', '2022-07-14 06:11:01'),
(236, 'Alltime Chocolate Cake 60gm', 'PC-236', 'alltime-chocolate-cake-60gm', 1, NULL, 4, 1, 4, 6, 55, 65, 55, NULL, 0, NULL, 'uploads/product_image/alltime_chocolate_cake.png', NULL, 1, '2022-07-14 06:11:42', '2022-07-14 06:11:42'),
(237, 'Alltime Honeycomb 20gm', 'PC-237', 'alltime-honeycomb-20gm', 1, NULL, 4, 1, 4, 6, 12, 15, 12, 20, 240, NULL, 'uploads/product_image/alltime_honeycomb.png', NULL, 1, '2022-07-14 06:13:34', '2022-07-14 06:13:34'),
(238, 'Pran Drinko Mango 250ml', 'PC-238', 'pran-drinko-mango-250ml', 1, NULL, 4, NULL, 4, 6, 20, 30, 20, 20, 400, NULL, 'uploads/product_image/drinko mango.jpg', NULL, 1, '2022-07-14 06:17:23', '2022-07-14 06:17:23'),
(239, 'Pran Drinko Litchi 250ml', 'PC-239', 'pran-drinko-litchi-250ml', 1, NULL, 4, 1, 4, 6, 20, 30, 20, NULL, 0, NULL, 'uploads/product_image/drinko_litchi.jpg', NULL, 1, '2022-07-14 06:17:50', '2022-07-14 06:17:50'),
(240, 'Pran Drinko Strawberry 250ml', 'PC-240', 'pran-drinko-strawberry-250ml', 1, NULL, 4, 1, 4, 6, 20, 30, 20, NULL, 0, NULL, 'uploads/product_image/drinko strawberry.jpg', NULL, 1, '2022-07-14 06:18:43', '2022-07-14 06:18:43'),
(241, 'Pran Drinko Pineapple 250ml', 'PC-241', 'pran-drinko-pineapple-250ml', 1, NULL, 4, 1, 4, 6, 20, 30, 20, NULL, 0, NULL, 'uploads/product_image/Pran-Drinko-Pineapple-Juice-250-ml-510x510.jpg', NULL, 1, '2022-07-14 06:19:29', '2022-07-14 06:19:29'),
(242, 'Pran Potata 250gm', 'PC-242', 'pran-potata-250gm', 1, NULL, 2, NULL, 4, 6, 12, 20, 12, 200, 2400, NULL, 'uploads/product_image/pran potata.jpg', NULL, 1, '2022-07-14 06:20:26', '2022-07-14 06:20:26'),
(243, 'Pran Milk 1L', 'PC-243', 'pran-milk-1l', 1, NULL, 2, NULL, 12, 6, 80, 90, 80, 50, 4000, NULL, 'uploads/product_image/pran milk.png', NULL, 1, '2022-07-14 06:21:11', '2022-07-14 06:21:11'),
(244, 'Teer ATA 2kg', 'PC-244', 'teer-ata-2kg', 1, NULL, 1, NULL, 4, 7, 180, 200, 180, 50, 9000, NULL, 'uploads/product_image/teer-flour-atta-2-kg.jpg', NULL, 1, '2022-07-14 06:41:50', '2022-07-14 06:41:50'),
(245, 'Teer Moida 2kg', 'PC-245', 'teer-moida-2kg', 1, NULL, 1, NULL, 4, 7, 190, 200, 190, 50, 9500, NULL, 'uploads/product_image/teer-white-flour-maida-2-kg.jpg', NULL, 1, '2022-07-14 06:42:31', '2022-07-14 06:42:31'),
(246, 'Teer Sugar 1kg', 'PC-246', 'teer-sugar-1kg', 1, NULL, 1, NULL, 4, 7, 90, 100, 90, 50, 4500, NULL, 'uploads/product_image/Teer-sugar-refined.webp', NULL, 1, '2022-07-14 06:43:15', '2022-07-14 06:43:15'),
(247, 'Teer Salt 1kg', 'PC-247', 'teer-salt-1kg', 1, NULL, 1, NULL, 4, 7, 60, 70, 60, 50, 3000, NULL, 'uploads/product_image/teer salt.jpg', NULL, 1, '2022-07-14 06:43:59', '2022-07-14 06:43:59'),
(248, 'Ruchi Mixed Pickle 400gm', 'PC-248', 'ruchi-mixed-pickle-400gm', 1, NULL, 4, 1, 4, 7, 75, 80, 75, 50, 3750, NULL, 'uploads/product_image/43.-Ruchi-Mixed-Pickle-400gm-130tk.webp', NULL, 1, '2022-07-14 06:44:48', '2022-07-14 06:44:48'),
(249, 'fff', 'PC-249', 'fff', 1, NULL, 1, NULL, 10, 2, 2344, 3455, 1456, 55, 128920, 10, 'uploads/product_image/teer salt.jpg', 'wryjukl', 1, '2022-07-18 12:24:56', '2022-07-18 12:24:56'),
(250, 'test', 'PC-250', 'test', 2, NULL, 2, NULL, 7, 4, 123, 250, 200, 2131, 262113, 11, 'uploads/product_image/$$ (2).png', 'dfdffggg', 1, '2022-08-25 08:27:01', '2022-08-25 08:27:01'),
(251, 'efasdf', 'PC-251', 'efasdf', 2, NULL, 1, NULL, 7, 4, 1231, 123, 1231, 123, 151413, 12, NULL, 'fdafd', 1, '2022-08-31 08:56:16', '2022-08-31 08:56:16'),
(253, 'test2', 'PC-252', 'test2', 1, NULL, 2, NULL, 7, 2, 1200, 1300, 1000, 10, 12000, 10, 'uploads/product_image/download.jpg', 'ertert', 1, '2022-09-11 10:48:18', '2022-09-11 10:48:18'),
(254, 'shoe', 'PC-254', 'shoe', 2, NULL, 5, NULL, 8, 2, 2500, 2700, 2600, 25, 62500, 10, NULL, 'gsgfsahuds', 1, '2022-09-11 11:13:10', '2022-09-11 11:13:10'),
(255, 'Cocacola', 'PC-255', 'cocacola', 1, NULL, 4, 1, 12, 4, 100, 110, 105, 200, 20000, 50, 'uploads/product_image/$$-2 (2).png', 'Cocacola Regular 2l', 1, '2022-09-18 06:51:13', '2022-09-18 06:51:13'),
(256, 'Napa', 'PC-256', 'napa', 2, NULL, 4, 1, 8, 1, 2, 2, 1.9, 200, 360, 40, NULL, NULL, 1, '2022-09-18 07:36:20', '2022-09-18 07:36:20'),
(257, 'test4', 'PC-257', 'test4', 2, NULL, 4, 1, 8, 3, 120, 130, 125, 200, 24000, 150, 'uploads/product_image/App. Batch 5, Class 1.1.jpeg', 'fajhffshg', 1, '2022-09-19 10:12:42', '2022-09-19 10:12:42'),
(258, 'hexisol', 'PC-258', 'hexisol', 5, NULL, 6, 2, 8, 23, 150, 165, 160, 10, 1500, 8, NULL, 'adsas', 1, '2022-09-19 10:40:13', '2022-09-19 10:40:13'),
(259, 'mum', 'PC-259', 'mum', 3, NULL, 4, 1, 4, 5, 12, 15, 13, 10, 120, 8, NULL, 'fjbfjhsfm', 1, '2022-09-20 10:15:11', '2022-09-20 10:15:11'),
(260, 'Angelic', 'PC-260', 'angelic', 1, NULL, 7, 3, 12, 24, 240, 245, 243, 500, 120000, 50, NULL, 'fgjuhkiu', 1, '2022-09-20 10:38:10', '2022-09-20 10:38:10'),
(261, 'SS Cricket Bat', 'PC-261', 'ss-cricket-bat', 3, NULL, 1, NULL, 8, 24, 5000, 7000, 6000, 2, 10000, 1, NULL, NULL, 1, '2022-09-20 10:50:03', '2022-09-20 10:50:03'),
(263, 'helokkols', 'PC-262', 'helokkols', 2, NULL, 1, NULL, 8, 6, 1200, 1250, 1230, 12, 14400, 6, NULL, 'fhfghdfgh', 1, '2022-11-26 05:56:22', '2022-11-26 05:56:22'),
(264, 'Horlics', 'PC-264', 'horlics', 2, NULL, 4, 1, 12, 23, 1000, 1100, 1050, 5, 5000, 3, NULL, 'hjgfdgkl', 1, '2022-11-26 06:21:12', '2022-11-26 06:21:12'),
(265, 'Shirt', 'PC-265', 'shirt', 6, NULL, 8, 4, 8, 25, 100, 120, 115, 20, 2000, 10, NULL, 'Heloo', 1, '2022-12-05 04:23:38', '2022-12-05 04:23:38'),
(267, 'shoe02', 'PC-266', 'shoe02', 6, NULL, 8, 5, 8, 26, 120, 150, 135, 2, 240, 1, NULL, NULL, 1, '2022-12-05 04:51:05', '2022-12-05 04:51:05'),
(268, 'bodna', 'PC-268', 'bodna', 2, NULL, 4, 1, 8, 3, 50, 55, 53, 100, 5000, 10, NULL, 'gsfbkfajf bsdfhnasdf', 1, '2022-12-08 11:24:37', '2022-12-08 11:24:37'),
(269, 'Mishuk', 'PC-269', 'mishuk', 1, NULL, 8, 4, 12, 9, 1200, 1500, 1350, 15, 18000, 5, NULL, 'Product of Moheshkhali', 1, '2022-12-08 11:39:40', '2022-12-08 11:39:40'),
(270, 'Balti', 'PC-270', 'balti', 3, NULL, 8, 4, 8, 6, 200, 270, 230, 50, 10000, 10, NULL, 'Dame kom Mane Valo', 1, '2022-12-08 11:46:06', '2022-12-08 11:46:06'),
(271, 'Angelic Air Freshener', 'PC-271', 'angelic-air-freshener', 1, NULL, 7, 3, 5, 24, 200, 240, 220, 10, 2000, NULL, NULL, NULL, 1, '2022-12-14 12:31:16', '2022-12-14 12:31:16'),
(272, 'mosur Daal', 'PC-272', 'mosur-daal', 1, NULL, 2, NULL, 4, 26, 135, 140, 1500, 30, 0, 5, NULL, NULL, 1, '2022-12-18 03:09:52', '2022-12-18 03:09:52'),
(276, 'nimki buiscuit', 'PC-273', 'nimki-buiscuit', 1, NULL, 1, NULL, 8, 7, 20, 25, 23, 5, 100, 2, NULL, NULL, 1, '2022-12-24 06:52:37', '2022-12-24 06:52:37'),
(278, 'Tibbot', 'PC-277', 'tibbot', 6, NULL, 9, NULL, 8, 9, 325, 332, 329.5, 50, 16250, 5, NULL, NULL, 1, '2022-12-31 08:26:01', '2022-12-31 08:26:01'),
(279, 'Close up', 'PC-279', 'close-up', 7, NULL, 10, NULL, 8, 28, 45, 60, 50, 40, 1800, 10, NULL, 'pakhi vai akhon toothpaste sell kore', 1, '2023-01-03 04:55:34', '2023-01-03 04:55:34'),
(280, 'osman goni', 'PC-280', 'osman-goni', 1, NULL, 8, 4, 5, 28, 325, 332, 329.5, 1, 325, 5, NULL, NULL, 1, '2023-01-18 02:25:14', '2023-01-18 02:25:14'),
(281, 'Mizanur Rahman', 'PC-281', 'mizanur-rahman', 1, NULL, 4, 1, 5, 2, 325, 332, 329.5, 2, 650, 5, NULL, NULL, 1, '2023-01-18 02:32:03', '2023-01-18 02:32:03'),
(282, 'kjhgj', 'PC-282', 'kjhgj', 2, NULL, 2, NULL, 4, 7, 50, 55, 52, 4, 200, 2, NULL, NULL, 1, '2023-01-18 11:27:21', '2023-01-18 11:27:21'),
(283, 'Green Tea', 'PC-283', 'green-tea', 6, NULL, 8, 4, 4, 23, 250, 300, 280, 200, 50000, 10, NULL, 'Good Quality Green Samin Tea', 1, '2023-01-25 04:27:28', '2023-01-25 04:27:28'),
(285, 'Bucket', 'PC-284', 'bucket', 1, NULL, 8, 4, 8, 2, 200, 280, 250, 100, 20000, 10, NULL, 'Good', 1, '2023-01-25 04:37:39', '2023-01-25 04:37:39'),
(286, 'PRIDE Cola', 'PC-286', 'pride-cola', 1, NULL, 9, NULL, 8, 24, 15, 20, 17, 100, 1500, 50, NULL, 'Very good quality product', 1, '2023-01-25 04:58:29', '2023-01-25 04:58:29'),
(287, 'pen', 'PC-287', 'pen', 4, NULL, 8, 4, 8, 6, 5, 10, 8, 100, 500, 10, NULL, NULL, 1, '2023-01-25 05:10:02', '2023-01-25 05:10:02'),
(288, 'Karim T-Shirt', 'PC-288', 'karim-t-shirt', 1, NULL, 8, 4, 8, 26, 450, 550, 500, 24, 10800, 2, NULL, NULL, 1, '2023-01-25 05:25:23', '2023-01-25 05:25:23'),
(289, 'battery', 'PC-289', 'battery', 1, NULL, 6, 2, 8, 23, 1250, 1500, 1350, 50, 62500, 2, NULL, 'Good quality Battery', 1, '2023-01-25 05:40:28', '2023-01-25 05:40:28'),
(290, 'MILK', 'PC-290', 'milk', 6, NULL, 9, NULL, 4, 5, 200, 250, NULL, 10, 2000, NULL, NULL, NULL, 1, '2023-01-25 05:58:43', '2023-01-25 05:58:43'),
(291, 'Dust Pan', 'PC-291', 'dust-pan', 1, NULL, 7, 3, 8, 23, 80, 110, 90, 50, 4000, 5, NULL, NULL, 1, '2023-01-26 03:52:12', '2023-01-26 03:52:12'),
(292, 'Pride 250ml', 'PC-292', 'pride-250ml', 1, NULL, 9, NULL, 8, NULL, 20, 30, 25, 100, 2000, 10, NULL, NULL, 1, '2023-01-26 04:19:01', '2023-01-26 04:19:01'),
(293, 'Pot', 'PC-293', 'pot', 1, NULL, 6, 2, 8, 6, 50, 70, 60, 100, 5000, 5, NULL, NULL, 1, '2023-01-26 04:31:44', '2023-01-26 04:31:44'),
(294, 'Black Tea', 'PC-294', 'black-tea', 7, NULL, 8, 4, 8, 23, 280, 320, 290, 100, 28000, 10, NULL, NULL, 1, '2023-01-26 04:40:35', '2023-01-26 04:40:35'),
(295, 'Ball', 'PC-295', 'ball', 1, NULL, 2, NULL, 8, 6, 150, 200, 170, 50, 7500, 5, NULL, NULL, 1, '2023-01-26 05:18:50', '2023-01-26 05:18:50'),
(296, 'NAYEM', 'PC-296', 'nayem', 1, NULL, 6, 2, 12, 23, 200, 300, 220, NULL, 0, 5, NULL, NULL, 1, '2023-01-26 05:27:15', '2023-01-26 05:27:15'),
(297, 'Pencil', 'PC-297', 'pencil', 1, NULL, 8, 4, 8, NULL, 5, 10, 8, 30, 150, 10, NULL, NULL, 1, '2023-01-26 05:41:07', '2023-01-26 05:41:07'),
(298, 'chocolate', 'PC-298', 'chocolate', 1, NULL, 7, 3, 8, 23, 40, 45, 42, 50, 2000, 10, NULL, NULL, 1, '2023-01-26 05:49:30', '2023-01-26 05:49:30'),
(299, 'Dove', 'PC-299', 'dove', 1, NULL, 6, 2, 8, NULL, 120, 130, 125, 100, 12000, 10, NULL, NULL, 1, '2023-01-26 05:58:46', '2023-01-26 05:58:46'),
(300, 'KFC', 'PC-300', 'kfc', 1, NULL, 9, NULL, 12, 23, 200, 250, 230, 30, 6000, 10, NULL, NULL, 1, '2023-01-26 06:07:09', '2023-01-26 06:07:09'),
(301, 'Bin', 'PC-301', 'bin', 1, NULL, 6, 2, 8, 25, 100, 130, 115, 50, 5000, 10, NULL, NULL, 1, '2023-01-26 06:15:52', '2023-01-26 06:15:52'),
(302, 'galaxy s 22 ultra', 'PC-302', 'galaxy-s-22-ultra', 1, NULL, 8, 4, 8, 23, 120000, 130000, 125000, 200, 24000000, 20, NULL, NULL, 1, '2023-01-26 06:21:15', '2023-01-26 06:21:15'),
(303, 'kitkat', 'PC-303', 'kitkat', 1, NULL, 8, 4, 8, 24, 20, 30, 25, 30, 600, 10, NULL, NULL, 1, '2023-01-26 06:27:35', '2023-01-26 06:27:35'),
(304, 'lollypop', 'PC-304', 'lollypop', 1, NULL, 8, 4, 8, 25, 10, 15, 8, 50, 500, 1, NULL, NULL, 1, '2023-01-26 06:33:01', '2023-01-26 06:33:01'),
(306, 'Salt', 'PC-305', 'salt', 2, NULL, 8, 4, 4, 23, 15, 15, NULL, NULL, 0, NULL, NULL, NULL, 1, '2023-01-26 06:56:06', '2023-01-26 06:56:06'),
(307, 'Hijab', 'PC-307', 'hijab', 1, NULL, 4, 1, 8, 6, 300, 350, 320, NULL, 0, 10, NULL, NULL, 1, '2023-01-26 07:13:06', '2023-01-26 07:13:06'),
(308, 'Baking Powder', 'PC-308', 'baking-powder', 1, NULL, 8, 4, 8, 23, 60, 70, 55, 50, 3000, 10, NULL, NULL, 1, '2023-01-26 07:21:52', '2023-01-26 07:21:52'),
(309, 'Bag', 'PC-309', 'bag', 2, NULL, 8, 4, 8, 24, 250, 300, 280, 100, 25000, 10, NULL, NULL, 1, '2023-01-26 07:30:42', '2023-01-26 07:30:42'),
(310, 'Nahid Blezer', 'PC-310', 'nahid-blezer', 4, NULL, 8, 4, 8, 26, 6000, 8000, 7000, 500, 3000000, 50, NULL, 'Premium Quality Suit', 1, '2023-01-29 06:21:16', '2023-01-29 06:21:16'),
(311, 'lux mini', 'PC-311', 'lux-mini', 7, NULL, 8, 4, 8, 5, 10, 15, 12, 100, 1000, 10, NULL, 'good quality', 1, '2023-01-29 06:36:08', '2023-01-29 06:36:08'),
(312, 'key', 'PC-312', 'key', 2, NULL, 8, 5, 8, 7, 20, 30, 25, 10, 200, 5, NULL, 'good product', 1, '2023-01-29 06:49:15', '2023-01-29 06:49:15'),
(313, 'colour pen', 'PC-313', 'colour-pen', 6, NULL, 6, 2, 8, 3, 4, 6, 5, 100, 400, 15, NULL, 'good quality', 1, '2023-01-29 06:57:59', '2023-01-29 06:57:59'),
(314, 'lamp', 'PC-314', 'lamp', 6, NULL, 8, 4, 8, 23, 250, 360, 280, 120, 30000, 30, NULL, NULL, 1, '2023-01-29 07:08:16', '2023-01-29 07:08:16'),
(315, 'pant', 'PC-315', 'pant', 2, NULL, 8, 4, 8, 9, 400, 500, 450, 100, 40000, 20, NULL, NULL, 1, '2023-01-29 07:13:57', '2023-01-29 07:13:57'),
(316, 'odonil', 'PC-316', 'odonil', 1, NULL, 7, 3, 8, 23, 40, 50, 45, 150, 6000, 30, NULL, NULL, 1, '2023-01-29 07:18:34', '2023-01-29 07:18:34'),
(317, 'I PHONE 15 PRO MAX', 'PC-317', 'i-phone-15-pro-max', 1, NULL, 8, 4, 8, 23, 120000, 150000, 140000, 1000, 120000000, 50, NULL, NULL, 1, '2023-02-05 04:48:31', '2023-02-05 04:48:31'),
(319, 'Sneaker', 'PC-318', 'sneaker', 2, NULL, 5, NULL, 8, 26, 1500, 1700, 48000, 30, 45000, 5, NULL, NULL, 1, '2023-02-06 06:05:21', '2023-02-06 06:05:21'),
(321, 'aci chal', 'PC-320', 'aci-chal', 1, NULL, 1, NULL, 4, 23, 2500, 3000, 2700, 50, 125000, 5, NULL, NULL, 1, '2023-02-22 04:52:31', '2023-02-22 04:52:31'),
(322, 'Panjabi', 'PC-322', 'panjabi', 7, NULL, 8, 4, 8, 28, 550, 1250, 1050, 150, 82500, 5, NULL, 'Good Quality Emam Khadi Panjabi', 1, '2023-03-04 04:15:06', '2023-03-04 04:15:06'),
(323, 'Amlan', 'PC-323', 'amlan', 4, NULL, 8, 4, 8, 9, 750, 1450, 1200, 100, 75000, 10, NULL, NULL, 1, '2023-03-04 04:42:37', '2023-03-04 04:42:37'),
(324, 'Shari', 'PC-324', 'shari', 6, NULL, 1, NULL, 8, 25, 600, 1200, 1000, 50, 30000, 10, NULL, NULL, 1, '2023-03-04 05:32:43', '2023-03-04 05:32:43'),
(325, 'cotton hijab', 'PC-325', 'cotton-hijab', 3, NULL, 4, 1, 8, 5, 250, 400, 350, 100, 25000, 10, NULL, NULL, 1, '2023-03-04 05:42:35', '2023-03-04 05:42:35'),
(326, 'Mask', 'PC-326', 'mask', 1, NULL, 8, 4, 8, 25, 30, 60, 40, 500, 15000, 10, NULL, NULL, 1, '2023-03-04 05:52:36', '2023-03-04 05:52:36'),
(327, 'Borka', 'PC-327', 'borka', 2, NULL, 8, 4, 8, 24, 500, 1000, 700, 100, 50000, 10, NULL, NULL, 1, '2023-03-04 06:02:23', '2023-03-04 06:02:23'),
(328, 'Maroned', 'PC-328', 'maroned', 4, NULL, 8, 4, 8, 25, 700, 1400, 1000, 100, 70000, 5, NULL, NULL, 1, '2023-03-04 06:12:22', '2023-03-04 06:12:22'),
(329, 'Rolex watch', 'PC-329', 'rolex-watch', 3, NULL, 8, 4, 8, 6, 150000, 250000, 200000, 150, 22500000, 2, NULL, NULL, 1, '2023-03-04 06:17:49', '2023-03-04 06:17:49'),
(330, 'Book', 'PC-330', 'book', 4, NULL, 8, 4, 8, 24, 250, 360, 300, 150, 37500, 10, NULL, NULL, 1, '2023-03-04 06:25:47', '2023-03-04 06:25:47'),
(331, 'note book', 'PC-331', 'note-book', 1, NULL, 2, NULL, 8, 23, 50, 75, 70, 100, 5000, 5, NULL, NULL, 1, '2023-03-04 06:48:20', '2023-03-04 06:48:20'),
(332, 'gucci flora', 'PC-332', 'gucci-flora', 7, NULL, 8, 4, 8, 5, 6500, 11000, 9000, 100, 650000, 10, NULL, NULL, 1, '2023-03-04 06:54:35', '2023-03-04 06:54:35'),
(333, 'Coca Cola', 'PC-333', 'coca-cola', 7, NULL, 9, NULL, 8, 27, 25, 30, 27, 10, 250, 3, NULL, NULL, 1, '2023-03-04 09:29:03', '2023-03-04 09:29:03'),
(334, 'Betaseptic Hand Rub', 'PC-334', 'betaseptic-hand-rub', 1, NULL, 6, 2, 4, 23, 120, 130, 125, NULL, 0, NULL, NULL, 'Contains 0.5% w/v chlorhexidine gluconate', 1, '2023-03-27 08:53:37', '2023-03-27 08:53:37'),
(335, 'Dry Cake', 'PC-335', 'dry-cake', 6, NULL, 8, 4, 8, 23, 8, 10, 9, 100, 800, 20, NULL, 'Good Dry Cake', 1, '2023-04-04 06:00:34', '2023-04-04 06:00:34'),
(336, 'Modern Laban', 'PC-336', 'modern-laban', 1, NULL, 9, NULL, 8, 24, 30, 50, 45, 100, 3000, 20, NULL, 'Very Healthy Product', 1, '2023-04-04 06:05:32', '2023-04-04 06:05:32'),
(337, 'Meggi', 'PC-337', 'meggi', 2, NULL, 2, NULL, 8, 7, 50, 55, 52, 100, 5000, 10, NULL, NULL, 1, '2023-04-04 06:49:03', '2023-04-04 06:49:03'),
(338, '7up', 'PC-338', '7up', 4, NULL, 9, NULL, 8, 3, 30, 55, 40, 600, 18000, 50, NULL, NULL, 1, '2023-04-04 06:55:58', '2023-04-04 06:55:58'),
(339, 'Men T-Shirt (Red)', 'PC-339', 'men-t-shirt-red', 1, NULL, 8, 4, 8, 25, 1500, 1750, 1650, 100, 150000, 5, NULL, NULL, 1, '2023-04-04 06:59:15', '2023-04-04 06:59:15'),
(340, 'ayshi', 'PC-340', 'ayshi', 5, NULL, 10, NULL, 5, NULL, 50, 705, NULL, 300, 15000, 50, NULL, NULL, 1, '2023-04-04 07:05:19', '2023-04-04 07:05:19'),
(350, 'Redmi note 11 pro', 'PC-341', 'redmi-note-11-pro', 1, NULL, 8, 4, 8, 2, 25000, 30000, 23000, 50, 1250000, 10, NULL, NULL, 1, '2023-04-04 07:20:43', '2023-04-04 07:20:43'),
(351, 'matador', 'PC-351', 'matador', 2, NULL, 10, NULL, 8, 25, 4, 5, 4.5, 500, 1750, 100, NULL, NULL, 1, '2023-04-04 07:24:49', '2023-04-04 07:24:49'),
(352, 'lamon', 'PC-352', 'lamon', 3, NULL, 9, NULL, 8, 27, 20, 30, 25, 100, 2000, NULL, NULL, NULL, 1, '2023-04-05 06:39:00', '2023-04-05 06:39:00'),
(353, 'Mojo', 'PC-353', 'mojo', 3, NULL, 9, NULL, 8, 27, 20, 25, 23, 100, 2000, 10, NULL, 'Best Non-Alcoholic Drinks', 1, '2023-04-05 06:44:48', '2023-04-05 06:44:48'),
(354, 'Apple', 'PC-354', 'apple', 2, NULL, 9, NULL, 4, 4, 120, 150, 130, 30, 3600, 10, NULL, NULL, 1, '2023-04-05 06:47:06', '2023-04-05 06:47:06'),
(355, 'smi salt', 'PC-355', 'smi-salt', 1, NULL, 2, NULL, 4, 23, 120, 150, 140, 100, 12000, 50, NULL, NULL, 1, '2023-04-05 06:49:10', '2023-04-05 06:49:10'),
(356, 'radhuni moshla', 'PC-356', 'radhuni-moshla', 4, NULL, 2, NULL, 4, 6, 110, 125, 115, NULL, 0, 60, NULL, 'Good product', 1, '2023-04-05 06:53:03', '2023-04-05 06:53:03'),
(357, 'lux soap', 'PC-357', 'lux-soap', 3, NULL, 6, 2, 8, 5, 30, 40, 35, 50, 1500, 20, NULL, NULL, 1, '2023-04-05 06:59:27', '2023-04-05 06:59:27'),
(358, 'all time bon', 'PC-358', 'all-time-bon', 7, NULL, 1, NULL, 8, 6, 30, 40, 35, 100, 3000, 20, NULL, NULL, 1, '2023-04-05 07:06:41', '2023-04-05 07:06:41'),
(359, 'dairy milk', 'PC-359', 'dairy-milk', 2, NULL, 6, 2, 8, 25, 120, 150, 130, 50, 6000, 10, NULL, NULL, 1, '2023-04-05 07:10:31', '2023-04-05 07:10:31'),
(360, 'oil', 'PC-360', 'oil', 4, NULL, 4, 1, 4, 25, 170, 180, 175, 180, 30600, 20, NULL, NULL, 1, '2023-04-05 07:12:26', '2023-04-05 07:12:26'),
(363, 'fanta', 'PC-361', 'fanta', 4, NULL, 9, NULL, 4, 27, 20, 25, 18, 100, 2000, 10, NULL, NULL, 1, '2023-04-05 07:21:56', '2023-04-05 07:21:56'),
(364, 'coca cola xy', 'PC-364', 'coca-cola-xy', 4, NULL, 9, NULL, 8, 3, 30, 40, 35, 100, 3000, 10, NULL, 'cold', 1, '2023-04-05 07:25:36', '2023-04-05 07:25:36'),
(365, 'sharee', 'PC-365', 'sharee', 2, NULL, 6, 2, 8, 5, 200, 250, 230, 100, 20000, 20, NULL, 'good', 1, '2023-04-06 04:06:45', '2023-04-06 04:06:45'),
(368, 'COCA COLA LEMON', 'PC-366', 'coca-cola-lemon', 3, NULL, 9, NULL, 8, 27, 25, 30, 27, 100, 2500, 20, NULL, NULL, 1, '2023-04-06 04:40:42', '2023-04-06 04:40:42'),
(369, 'GLOW AND LOVELY', 'PC-369', 'glow-and-lovely', 3, NULL, 7, 3, 8, 1, 120, 130, 110, 100, 12000, NULL, NULL, NULL, 1, '2023-04-06 04:47:25', '2023-04-06 04:47:25'),
(370, 'CHOCOLATE JUICE', 'PC-370', 'chocolate-juice', 2, NULL, 9, NULL, 8, 27, 20, 30, 29, 100, 2000, 10, NULL, NULL, 1, '2023-04-06 04:54:38', '2023-04-06 04:54:38'),
(372, 'JAMDANI THREE PIECE', 'PC-371', 'jamdani-three-piece', 4, NULL, 7, 3, 8, 25, 1500, 2000, 1700, 250, 375000, 50, NULL, 'COTTON DRESS', 1, '2023-04-06 05:09:34', '2023-04-06 05:09:34'),
(373, 'ALOVARA GEL', 'PC-373', 'alovara-gel', 2, NULL, 10, NULL, 8, 9, 200, 400, 230, 400, 80000, 50, NULL, 'UNRISEC', 1, '2023-04-06 05:24:34', '2023-04-06 05:24:34'),
(374, 'HEINEKEN 500ML', 'PC-374', 'heineken-500ml', 3, NULL, 9, NULL, 8, 6, 350, 415, 380, 200, 70000, 20, NULL, 'ENERGY DRINKS', 1, '2023-04-06 06:04:52', '2023-04-06 06:04:52'),
(375, 'FRUTIKA PRAN', 'PC-375', 'frutika-pran', 3, NULL, 9, NULL, 8, 27, 40, 45, 42, 100, 4000, 50, NULL, NULL, 1, '2023-04-06 06:11:17', '2023-04-06 06:11:17'),
(376, 'MIRINDA', 'PC-376', 'mirinda', 6, NULL, 9, NULL, 8, 27, 65, 70, 66, NULL, 0, 10, NULL, NULL, 1, '2023-04-06 06:19:47', '2023-04-06 06:19:47'),
(377, 'Dim', 'PC-377', 'dim', 6, NULL, 1, NULL, 8, 23, 9, 13, 10, 4, 36, 2, NULL, NULL, 1, '2023-04-08 04:35:38', '2023-04-08 04:35:38'),
(378, 'Jamdani Shari', 'PC-378', 'jamdani-shari', 1, NULL, 1, NULL, 8, 25, 1500, 3000, 2500, 25, 37500, 5, NULL, NULL, 1, '2023-04-15 04:53:20', '2023-04-15 04:53:20'),
(379, 'Dairy Milk(Dark)', 'PC-379', 'dairy-milkdark', 3, NULL, 9, NULL, 11, 6, 35, 50, 48, 200, 7000, 10, NULL, NULL, 1, '2023-04-17 04:34:40', '2023-04-17 04:34:40'),
(380, 'body spry', 'PC-380', 'body-spry', 7, NULL, 8, 4, 8, 25, 240, 350, 290, 120, 28800, 10, NULL, NULL, 1, '2023-04-17 04:54:06', '2023-04-17 04:54:06'),
(381, 'borka(abaya)', 'PC-381', 'borkaabaya', 3, NULL, 7, 3, 8, NULL, 1500, 2000, 1600, 200, 300000, 10, NULL, NULL, 1, '2023-04-18 04:05:37', '2023-04-18 04:05:37'),
(382, 'books', 'PC-382', 'books', 5, NULL, 8, 4, 8, 25, 400, 500, 440, 300, 120000, 15, NULL, NULL, 1, '2023-04-18 04:12:18', '2023-04-18 04:12:18'),
(383, 'hejab', 'PC-383', 'hejab', 1, NULL, 8, 4, 8, 23, 200, 300, 250, 200, 40000, 10, NULL, NULL, 1, '2023-04-18 04:18:47', '2023-04-18 04:18:47'),
(384, 'mobile', 'PC-384', 'mobile', 1, NULL, 5, NULL, 8, 25, 15000, 25000, 20000, 100, 1500000, 20, NULL, NULL, 1, '2023-04-18 04:28:06', '2023-04-18 04:28:06'),
(386, 'lungi', 'PC-385', 'lungi', 6, NULL, 8, 4, 8, 26, 35, 300, 290, 10, 350, 5, NULL, '100% cotton', 1, '2023-04-30 07:00:27', '2023-04-30 07:00:27'),
(387, 'Angelic Fresh', 'PC-387', 'angelic-fresh', 3, NULL, 7, 3, 8, 23, 240, 250, 245, 50, 12000, 5, NULL, NULL, 1, '2023-05-06 07:02:53', '2023-05-06 07:02:53'),
(388, 'Pepsi 500ml', 'PC-388', 'pepsi-500ml', 4, NULL, 9, NULL, 8, 27, 30, 45, 40, 100, 3000, 10, NULL, NULL, 1, '2023-06-17 06:29:49', '2023-06-17 06:29:49'),
(389, 'pepsi 250 ml', 'PC-389', 'pepsi-250-ml', 3, NULL, 9, NULL, 8, 27, 15, 25, 20, 100, 1500, 5, NULL, NULL, 1, '2023-06-17 06:52:52', '2023-06-17 06:52:52'),
(390, 'lexux', 'PC-390', 'lexux', 2, NULL, 6, 2, 8, 6, 60, 80, 70, 50, 3000, 10, NULL, NULL, 1, '2023-06-17 07:04:55', '2023-06-17 07:04:55'),
(391, 'vivo', 'PC-391', 'vivo', 5, NULL, 8, 4, 5, 24, 450, 560, 520, 200, 90000, 15, NULL, NULL, 1, '2023-06-17 07:16:14', '2023-06-17 07:16:14'),
(392, 'oppo', 'PC-392', 'oppo', 5, NULL, 8, 4, 8, 24, 15000, 18000, 17000, 20, 300000, 5, NULL, NULL, 1, '2023-06-17 07:27:36', '2023-06-17 07:27:36'),
(393, 'tom tailor', 'PC-393', 'tom-tailor', 4, NULL, 5, NULL, 8, 25, 1500, 2000, 1600, 120, 180000, 10, NULL, NULL, 1, '2023-06-17 07:39:19', '2023-06-17 07:39:19'),
(394, 'Pusti Drinking Water', 'PC-394', 'pusti-drinking-water', 2, NULL, 9, NULL, 8, 3, 10, 15, 15, 24, 240, 8, NULL, 'Pusti Drinking Water 500ml', 1, '2023-06-25 07:24:32', '2023-06-25 07:24:32'),
(398, 'apex shoe', 'PC-395', 'apex-shoe', 2, NULL, 5, NULL, 8, 24, 500, 600, 590, 110, 55000, 50, NULL, 'formal black \r\nladies\r\n36', 1, '2023-06-25 07:56:16', '2023-06-25 07:56:16'),
(400, 'soap', 'PC-399', 'soap', 4, NULL, 6, 2, 8, 1, 250, 300, 280, 2, 500, NULL, NULL, NULL, 1, '2023-07-05 07:07:55', '2023-07-05 07:07:55'),
(401, 'Pride Fresh', 'PC-401', 'pride-fresh', 7, NULL, 7, 3, 8, 23, 300, 350, 340, 100, 30000, 30, NULL, 'Very well fragrance and feel so nice', 1, '2023-07-05 07:29:02', '2023-07-05 07:29:02'),
(402, 'soup', 'PC-402', 'soup', 3, NULL, 6, 2, 8, 5, 35, 60, 40, 33, 1155, 15, NULL, NULL, 1, '2023-07-05 07:35:39', '2023-07-05 07:35:39'),
(403, 'sesa', 'PC-403', 'sesa', 3, NULL, 1, NULL, 8, 5, 35, 55, 50, 120, 4200, 15, NULL, NULL, 1, '2023-07-05 07:48:43', '2023-07-05 07:48:43'),
(404, 'Drinko 11A', 'PC-404', 'drinko-11a', 4, NULL, 9, NULL, 8, 23, 20, 25, 21, 100, 2000, 20, NULL, NULL, 1, '2023-07-05 07:51:50', '2023-07-05 07:51:50'),
(405, '0il', 'PC-405', '0il', 2, NULL, 4, 1, 12, 23, 165, 180, 175, 21, 3465, 5, NULL, NULL, 1, '2023-07-05 08:00:54', '2023-07-05 08:00:54'),
(410, 'Sun', 'PC-406', 'sun', 4, NULL, 6, 2, 8, 7, 15, 20, 18, 100, 1500, 35, NULL, NULL, 1, '2023-07-06 04:01:39', '2023-07-06 04:01:39'),
(411, 'red paste', 'PC-411', 'red-paste', 2, NULL, 10, NULL, 8, 8, 40, 50, 45, 50, 2000, 30, NULL, 'very good', 1, '2023-07-06 04:16:43', '2023-07-06 04:16:43'),
(412, 'comfort', 'PC-412', 'comfort', 8, NULL, 7, 3, 8, 6, 140, 150, 145, 20, 2800, 20, NULL, 'smell wel', 1, '2023-07-06 04:23:48', '2023-07-06 04:23:48'),
(413, 'Dry cake  limon', 'PC-413', 'dry-cake-limon', 7, NULL, 2, NULL, 9, 23, 200, 250, 240, 100, 20000, 20, NULL, NULL, 1, '2023-07-06 04:35:06', '2023-07-06 04:35:06'),
(414, 'pride drink', 'PC-414', 'pride-drink', 7, NULL, 9, NULL, 8, 23, 25, 30, 28, 100, 2500, 30, NULL, NULL, 1, '2023-07-06 04:45:25', '2023-07-06 04:45:25'),
(415, 'dark cocholate', 'PC-415', 'dark-cocholate', 3, NULL, 9, NULL, 9, 23, 500, 550, 540, 200, 100000, 50, NULL, 'sweet', 1, '2023-07-06 04:55:30', '2023-07-06 04:55:30'),
(416, 'Panjabi raj', 'PC-416', 'panjabi-raj', 3, NULL, 8, 4, 8, 25, 800, 1500, 1200, 100, 80000, 15, NULL, NULL, 1, '2023-07-06 06:02:47', '2023-07-06 06:02:47'),
(417, 'panjabi sj', 'PC-417', 'panjabi-sj', 2, NULL, 8, 4, 4, NULL, 1700, 2200, 2100, 999, 1698300, 20, NULL, NULL, 1, '2023-07-06 06:09:42', '2023-07-06 06:09:42'),
(418, 'shampoo', 'PC-418', 'shampoo', 3, NULL, 5, NULL, 8, 5, 200, 250, 230, 300, 60000, 5, NULL, NULL, 1, '2023-07-06 06:17:35', '2023-07-06 06:17:35'),
(419, 'sampoo  c', 'PC-419', 'sampoo-c', 8, NULL, 6, 2, 8, 24, 200, 250, 230, 100, 20000, 50, NULL, NULL, 1, '2023-07-06 06:26:26', '2023-07-06 06:26:26'),
(420, 'oil o', 'PC-420', 'oil-o', 6, NULL, 4, 1, 12, 24, 200, 250, 220, 50, 10000, 10, NULL, NULL, 1, '2023-07-06 06:36:10', '2023-07-06 06:36:10'),
(421, 'soap d', 'PC-421', 'soap-d', 2, NULL, 8, 4, 8, 5, 50, 70, 60, 100, 5000, 15, NULL, NULL, 1, '2023-07-06 06:41:53', '2023-07-06 06:41:53'),
(422, 'selim rise', 'PC-422', 'selim-rise', 2, NULL, 1, NULL, 4, 3, 40, 60, 45, 20, 800, 7, NULL, NULL, 1, '2023-07-06 06:48:35', '2023-07-06 06:48:35'),
(423, 'chocolat', 'PC-423', 'chocolat', 6, NULL, 6, 2, 8, 4, 20, 40, 35, 200, 4000, 10, NULL, NULL, 1, '2023-07-06 07:06:49', '2023-07-06 07:06:49'),
(425, 'gown', 'PC-424', 'gown', 5, NULL, 8, 4, 8, 25, 1000, 1500, 1200, 50, 50000, 10, NULL, NULL, 1, '2023-07-06 07:19:58', '2023-07-06 07:19:58'),
(426, 'jacket', 'PC-426', 'jacket', 4, NULL, 8, 4, 8, 25, 800, 1500, 120, 100, 80000, 5, NULL, NULL, 1, '2023-07-06 07:26:23', '2023-07-06 07:26:23'),
(427, 'Frutika Juice 250 ml', 'PC-427', 'frutika-juice-250-ml', 3, NULL, 9, NULL, 8, 4, 16, 20, 17, 10, 160, 2, NULL, 'Frutika mango Juice 250 ml packet', 1, '2023-07-11 04:04:52', '2023-07-11 04:04:52'),
(428, 'Angelic Air Freashner', 'PC-428', 'angelic-air-freashner', 1, NULL, 7, 3, 8, 23, 240, 280, NULL, NULL, 0, NULL, '', NULL, 1, '2023-07-11 05:53:03', '2023-07-11 05:53:03'),
(429, 'T shirt', 'PC-429', 't-shirt', 1, NULL, 8, 4, 8, 25, 500, 1800, 1500, 20, 10000, 5, NULL, NULL, 1, '2023-07-11 07:24:00', '2023-07-11 07:24:00'),
(430, 'Khadi Fatua', 'PC-430', 'khadi-fatua', 8, NULL, 8, 4, 8, 26, 500, 700, 650, 1000, 500000, 50, NULL, 'Very soft cotton dress', 1, '2023-07-13 03:54:24', '2023-07-13 03:54:24'),
(431, 'Pure Khadi Panjabi', 'PC-431', 'pure-khadi-panjabi', 8, NULL, 8, 4, 8, 24, 1200, 1500, 1400, 1000, 1200000, 100, NULL, 'Very soft cotton panjabi. Washable....', 1, '2023-07-13 06:29:26', '2023-07-13 06:29:26'),
(432, 'Pure khadi Chador', 'PC-432', 'pure-khadi-chador', 8, NULL, 8, 4, 8, 24, 700, 1000, 900, 1000, 700000, 50, NULL, 'Very Soft Cotton Chador', 1, '2023-07-15 04:27:11', '2023-07-15 04:27:11'),
(434, 'Ispi Orange', 'PC-433', 'ispi-orange', 1, NULL, 9, NULL, 4, 7, 100, 150, 120, 100, 10000, 5, 'uploads/product_image/c4.png', 'bbvbbbbbv', 1, '2024-03-21 06:12:27', '2024-03-21 06:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `promocode_start_duration` varchar(255) NOT NULL,
  `promocode_end_duration` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `name`, `discount`, `promocode_start_duration`, `promocode_end_duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Iris Robertson', '27', '1982-11-10', '2015-04-11', 'Active', '2022-08-25 06:23:15', '2022-08-25 06:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `promotion_category_name` varchar(20) NOT NULL,
  `promotion_subcategory_name` varchar(20) NOT NULL,
  `promotion_start_duration` datetime NOT NULL,
  `promotion_end_duration` datetime NOT NULL,
  `promotion_ammount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive',
  `Promotion_product` varchar(200) NOT NULL,
  `Promotion_product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `grand_total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `note` text DEFAULT NULL,
  `documents` varchar(255) DEFAULT NULL,
  `import_by` int(11) DEFAULT NULL,
  `is_received` int(11) NOT NULL DEFAULT 0,
  `reference` varchar(255) DEFAULT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `supplier_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `code`, `biller_id`, `store_id`, `grand_total`, `discount`, `tax`, `paid_amount`, `due`, `note`, `documents`, `import_by`, `is_received`, `reference`, `purchase_date`, `supplier_id`, `created_at`, `updated_at`) VALUES
(2, 'PUC-1', NULL, 1, 190, 10, NULL, 500, -320, '<p>asdasf</p>', NULL, 1, 1, 'rajshahi', '2022-05-12', '2', '2022-05-12 08:28:52', '2022-05-12 08:28:52'),
(3, 'PUC-2', NULL, 1, 0, NULL, NULL, 5000, -5000, '5kg', NULL, 1, 1, NULL, '2022-07-13', '1', '2022-07-17 05:45:03', '2022-07-17 05:45:03'),
(4, 'PUC-3', NULL, 1, 1565, NULL, NULL, NULL, 1565, NULL, NULL, 13, 1, NULL, '2022-12-14', '1', '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(5, 'PUC-4', NULL, 1, 1540, NULL, NULL, NULL, 1540, NULL, NULL, 13, 1, NULL, '2022-12-24', '1', '2022-12-24 05:59:05', '2022-12-24 05:59:05'),
(7, 'PUC-5', NULL, 1, 0, 20, NULL, 500, -520, 'cx', NULL, 20, 1, 'Shajid', '2024-03-19', '1', '2024-03-19 08:08:15', '2024-03-19 08:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_lists`
--

CREATE TABLE `purchase_product_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_lists`
--

INSERT INTO `purchase_product_lists` (`id`, `purchase_id`, `pro_id`, `unit_price`, `qty`, `subtotal`, `store_id`, `created_at`, `updated_at`) VALUES
(2, 2, 6, 190, 1, 190, 1, '2022-05-12 08:28:52', '2022-05-12 08:28:52'),
(3, 4, 221, 500, 1, 500, 1, '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(4, 4, 227, 80, 1, 80, 1, '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(5, 4, 222, 800, 1, 800, 1, '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(6, 4, 232, 85, 1, 85, 1, '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(7, 4, 234, 25, 4, 100, 1, '2022-12-14 12:36:58', '2022-12-14 12:36:58'),
(8, 5, 221, 500, 1, 500, 1, '2022-12-24 05:59:05', '2022-12-24 05:59:05'),
(9, 5, 222, 800, 1, 800, 1, '2022-12-24 05:59:05', '2022-12-24 05:59:05'),
(10, 5, 260, 240, 1, 240, 1, '2022-12-24 05:59:05', '2022-12-24 05:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'admin', '2020-02-10 06:33:38', '2020-02-10 06:33:38'),
(2, 'manager', 'admin', '2020-02-10 07:37:44', '2020-02-10 07:37:44'),
(3, 'customer', 'admin', '2020-09-10 07:54:24', '2020-09-10 07:54:24'),
(4, 'Demo', 'admin', '2024-03-24 05:43:57', '2024-03-24 05:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(15, 1),
(16, 1),
(16, 4),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(20, 1),
(20, 4),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(24, 4),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(28, 4),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(34, 4),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_date` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `grand_total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `due_return` float DEFAULT 0,
  `payment_type` varchar(110) NOT NULL,
  `payment_note` text DEFAULT NULL,
  `cateated_by` int(11) NOT NULL,
  `sales_type` varchar(110) DEFAULT NULL,
  `customer_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sales_date`, `code`, `biller_id`, `store_id`, `grand_total`, `discount`, `tax`, `paid_amount`, `due`, `due_return`, `payment_type`, `payment_note`, `cateated_by`, `sales_type`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, '2020-02-25', 'IC-00000001', 1, 1, 391, 50, 21, 300, 91, 91, 'cash', 'he ll pay on 3.3.20', 4, 'g', '2', '2020-02-25 13:35:44', '2020-02-25 13:35:44'),
(2, '2020-03-03', 'IC-00000002', 1, 1, 12850, 0, 0, 0, 12850, 0, 'cash', NULL, 4, 'g', '3', '2020-03-03 20:11:16', '2020-03-03 20:11:16'),
(3, '2020-03-03', 'IC-00000003', 1, 1, 9700, 100, 0, 0, 9700, 9700, 'cash', NULL, 4, 'g', '4', '2020-03-03 20:36:16', '2020-03-03 20:36:16'),
(4, '2020-03-03', 'IC-00000004', 1, 1, 237500, 2500, 0, 0, 237500, 237500, 'cash', NULL, 4, 'g', '5', '2020-03-03 20:45:13', '2020-03-03 20:45:13'),
(5, '2020-03-04', 'IC-00000005', 1, 1, 48000, 1000, 0, 0, 48000, 48000, 'cash', NULL, 4, 'g', '7', '2020-03-04 09:49:44', '2020-03-04 09:49:44'),
(6, '2020-03-04', 'IC-00000006', 1, 1, 240000, 5000, 0, 0, 240000, 90000, 'cash', NULL, 4, 'g', '6', '2020-03-04 10:15:02', '2020-03-04 10:15:02'),
(7, '2020-03-04', 'IC-00000007', 1, 1, 19000, 600, 0, 0, 19000, 19000, 'cash', NULL, 4, 'g', '8', '2020-03-04 11:52:46', '2020-03-04 11:52:46'),
(9, '2020-03-04', 'IC-00000009', 1, 1, 48000, 1000, 0, 0, 48000, 48000, 'cash', NULL, 4, 'g', '9', '2020-03-04 17:59:35', '2020-03-04 17:59:35'),
(10, '2020-03-05', 'IC-00000009', 1, 1, 48000, 2400, 0, 0, 48000, 48000, 'cash', 'ucb bank', 4, 'g', '10', '2020-03-05 15:42:14', '2020-03-05 15:42:14'),
(104, '2022-07-17', 'IC-00000010', 1, 1, 615, 0, 0, 600, 15, 0, 'cash', NULL, 1, '1', '147', '2022-07-17 05:39:43', '2022-07-17 05:39:43'),
(105, '2022-07-17', 'IC-00000011', 1, 1, 120, 0, 0, 0, 120, 0, 'cash', NULL, 1, '1', '1', '2022-07-17 05:42:34', '2022-07-17 05:42:34'),
(106, '2022-07-17', 'IC-00000012', 1, 1, 286, 0, 26, 0, 286, 0, 'cash', NULL, 1, '1', '1', '2022-07-17 08:57:47', '2022-07-17 08:57:47'),
(107, '2022-07-17', 'IC-00000013', 1, 1, 720, 0, 0, 0, 720, 0, 'cash', NULL, 1, '1', '1', '2022-07-17 08:58:48', '2022-07-17 08:58:48'),
(108, '2022-07-18', 'IC-00000014', 1, 1, 320, 0, 0, 0, 320, 0, 'cash', 'agfd', 1, 'g', '5', '2022-07-18 12:40:30', '2022-07-18 12:40:30'),
(109, '2022-07-31', 'IC-00000015', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 1, '1', '1', '2022-07-31 09:59:45', '2022-07-31 09:59:45'),
(110, '2022-07-31', 'IC-00000016', 1, 1, 82, 50, 0, 100, -18, 0, 'cash', NULL, 1, '1', '1', '2022-07-31 10:07:41', '2022-07-31 10:07:41'),
(111, '2022-08-07', 'IC-00000017', 1, 1, 988, 104, 52, 1000, -12, 0, 'cash', NULL, 1, '1', '1', '2022-08-07 05:34:20', '2022-08-07 05:34:20'),
(112, '2022-08-07', 'IC-00000018', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 1, '1', '2', '2022-08-07 05:35:43', '2022-08-07 05:35:43'),
(113, '2022-08-25', 'IC-00000019', 1, 1, 250, 0, 0, 250, 0, 0, 'cash', NULL, 9, '1', '1', '2022-08-25 08:34:50', '2022-08-25 08:34:50'),
(114, '2022-09-04', 'IC-00000020', 1, 1, 210, 0, 0, 0, 210, 0, 'cash', NULL, 1, '1', '1', '2022-09-04 09:49:28', '2022-09-04 09:49:28'),
(115, '2022-09-07', 'IC-00000021', 1, 1, 1400, 0, 0, 0, 1400, 0, 'cash', NULL, 1, '1', '1', '2022-09-07 12:14:48', '2022-09-07 12:14:48'),
(116, '2022-09-11', 'IC-00000022', 1, 1, 200, 0, 0, 0, 200, 0, 'cash', NULL, 1, '1', '1', '2022-09-11 08:56:14', '2022-09-11 08:56:14'),
(118, '2022-09-11', 'IC-00000024', 1, 1, 1300, 0, 0, 1300, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-11 09:36:53', '2022-09-11 09:36:53'),
(119, '2022-09-11', 'IC-00000024', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-11 10:38:36', '2022-09-11 10:38:36'),
(120, '2022-09-11', 'IC-00000025', 1, 1, 10400, 410, 1410, 10400, 0, 0, 'cash', NULL, 1, '1', '149', '2022-09-11 10:57:17', '2022-09-11 10:57:17'),
(121, '2022-09-11', 'IC-00000026', 1, 1, 4416, 0, 576, 4416, 0, 0, 'cash', 'jugvunjnjhk', 1, '1', '2', '2022-09-11 11:08:52', '2022-09-11 11:08:52'),
(123, '2022-09-15', 'IC-00000027', 1, 1, 5890, 0, 0, 5890, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-15 11:20:59', '2022-09-15 11:20:59'),
(124, '2022-09-18', 'IC-00000028', 1, 1, 18128, 352, 880, 18128, 0, 0, 'cash', 'thank you', 1, '1', '1', '2022-09-18 06:53:42', '2022-09-18 06:53:42'),
(125, '2022-09-18', 'IC-00000029', 1, 1, 300, 40, 0, 300, 0, 0, 'cash', NULL, 1, '1', '151', '2022-09-18 07:43:41', '2022-09-18 07:43:41'),
(126, '2022-09-18', 'IC-00000030', 1, 1, 520, 0, 0, 0, 520, 0, 'cash', NULL, 1, 'g', '1', '2022-09-18 08:03:22', '2022-09-18 08:03:22'),
(127, '2022-09-19', 'IC-00000031', 1, 1, 900, 0, 0, 900, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(128, '2022-09-19', 'IC-00000032', 1, 1, 10032, 0, 0, 10032, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(129, '2022-09-19', 'IC-00000033', 1, 1, 546, 26, 52, 546, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-19 08:20:43', '2022-09-19 08:20:43'),
(130, '2022-09-19', 'IC-00000034', 1, 1, 3552, 100, 332, 3552, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-19 09:57:43', '2022-09-19 09:57:43'),
(131, '2022-09-19', 'IC-00000035', 1, 1, 2419.2, 44.8, 224, 2419.2, 0, 0, 'cash', NULL, 1, '1', '152', '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(132, '2022-09-19', 'IC-00000036', 1, 1, 1075.9, 40.6, 101.5, 1500, -424.0999999999999, 0, 'cash', 'paid', 1, '1', '1', '2022-09-19 10:47:15', '2022-09-19 10:47:15'),
(133, '2022-09-20', 'IC-00000037', 1, 1, 1370, 0, 0, 1370, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-20 08:41:57', '2022-09-20 08:41:57'),
(134, '2022-09-20', 'IC-00000038', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-20 08:58:41', '2022-09-20 08:58:41'),
(135, '2022-09-20', 'IC-00000039', 1, 1, 2636, 0, 0, 2636, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-20 10:04:59', '2022-09-20 10:04:59'),
(137, '2022-09-20', 'IC-00000040', 1, 1, 1524.96, 28.24, 141.2, 1524.96, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-20 10:24:44', '2022-09-20 10:24:44'),
(138, '2022-09-20', 'IC-00000041', 1, 1, 2285.85, 108.85, 217.7, 2285.85, 0, 0, 'cash', 'gkukh', 1, '1', '1', '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(139, '2022-09-20', 'IC-00000042', 1, 1, 15385, 0, 0, 15385, 0, 0, 'cash', 'fgfjh', 1, '1', '154', '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(140, '2022-09-20', 'IC-00000043', 1, 1, 8040, 10, 1050, 0, 8040, 0, 'cash', NULL, 1, '1', '2', '2022-09-20 10:51:50', '2022-09-20 10:51:50'),
(141, '2022-09-20', 'IC-00000044', 1, 1, 245, 0, 0, 0, 245, 0, 'cash', NULL, 1, '1', '2', '2022-09-20 10:57:05', '2022-09-20 10:57:05'),
(142, '2022-09-27', 'IC-00000045', 1, 1, 1890, 0, 0, 1890, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-27 10:25:35', '2022-09-27 10:25:35'),
(143, '2022-09-29', 'IC-00000046', 1, 1, 60, 0, 0, 0, 60, 0, 'cash', NULL, 1, '1', '1', '2022-09-29 06:12:11', '2022-09-29 06:12:11'),
(144, '2022-09-29', 'IC-00000047', 1, 1, 894, 745, 149, 894, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-29 08:23:43', '2022-09-29 08:23:43'),
(145, '2022-09-29', 'IC-00000048', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 1, '1', '1', '2022-09-29 09:50:20', '2022-09-29 09:50:20'),
(146, '2022-11-14', 'IC-00000049', 1, 1, 136, 32, 8, 136, 0, 0, 'cash', NULL, 1, '1', '1', '2022-11-14 08:46:38', '2022-11-14 08:46:38'),
(147, '2022-11-23', 'IC-00000050', 1, 1, 520, 0, 0, 0, 520, 0, 'cash', NULL, 1, '1', '1', '2022-11-23 04:35:22', '2022-11-23 04:35:22'),
(148, '2022-11-23', 'IC-00000051', 1, 1, 1560, 0, 0, 0, 1560, 0, 'cash', NULL, 1, '1', '1', '2022-11-23 05:22:38', '2022-11-23 05:22:38'),
(149, '2022-11-23', 'IC-00000052', 1, 1, 170, 0, 0, 0, 170, 0, 'cash', NULL, 1, '1', '1', '2022-11-23 08:01:50', '2022-11-23 08:01:50'),
(150, '2022-11-23', 'IC-00000053', 1, 1, 714, 68, 102, 714, 0, 0, 'cash', NULL, 1, '1', '1', '2022-11-23 08:51:42', '2022-11-23 08:51:42'),
(151, '2022-11-26', 'IC-00000054', 1, 1, 520, 0, 0, 0, 520, 0, 'cash', NULL, 1, '1', '1', '2022-11-26 05:12:44', '2022-11-26 05:12:44'),
(154, '2022-11-26', 'IC-00000055', 1, 1, 874, 0, 114, 1000, -126, 0, 'cash', NULL, 1, '1', '155', '2022-11-26 06:17:35', '2022-11-26 06:17:35'),
(155, '2022-11-26', 'IC-00000056', 1, 1, 2047.5, 0, 97.5, 2050, -2.5, 0, 'cash', NULL, 1, '1', '155', '2022-11-26 06:25:32', '2022-11-26 06:25:32'),
(156, '2022-11-27', 'IC-00000057', 1, 1, 520, 0, 0, 0, 520, 0, 'cash', NULL, 1, '1', '1', '2022-11-27 09:39:39', '2022-11-27 09:39:39'),
(157, '2022-12-05', 'IC-00000058', 1, 1, 2910, 0, 0, 0, 2910, 0, 'cash', NULL, 1, '1', '1', '2022-12-05 03:14:34', '2022-12-05 03:14:34'),
(158, '2022-12-05', 'IC-00000059', 1, 1, 160, 0, 0, 160, 0, 0, 'cash', NULL, 1, '1', '1', '2022-12-05 03:21:41', '2022-12-05 03:21:41'),
(159, '2022-12-05', 'IC-00000060', 1, 1, 320, 0, 0, 0, 320, 0, 'cash', NULL, 1, '1', '1', '2022-12-05 04:02:31', '2022-12-05 04:02:31'),
(161, '2022-12-05', 'IC-00000061', 1, 1, 120, 0, 0, 120, 0, 0, 'cash', 'fdsgf', 1, '1', '1', '2022-12-05 04:35:06', '2022-12-05 04:35:06'),
(162, '2022-12-05', 'IC-00000062', 1, 1, 122, 10, 12, 122, 0, 0, 'cash', NULL, 1, '1', '1', '2022-12-05 04:37:56', '2022-12-05 04:37:56'),
(163, '2022-12-05', 'IC-00000063', 1, 1, 80, 0, 0, 0, 80, 0, 'cash', NULL, 1, '1', '1', '2022-12-05 04:43:53', '2022-12-05 04:43:53'),
(164, '2022-12-05', 'IC-00000064', 2, 1, 163.5, 1.5, 15, 163, 0.5, 0, 'cash', NULL, 1, '1', '156', '2022-12-05 04:55:49', '2022-12-05 04:55:49'),
(165, '2022-12-08', 'IC-00000065', 1, 1, 150, 0, 0, 0, 150, 0, 'cash', NULL, 1, '1', '1', '2022-12-08 10:21:10', '2022-12-08 10:21:10'),
(166, '2022-12-08', 'IC-00000066', 1, 1, 270, 0, 0, 0, 270, 0, 'cash', NULL, 1, '1', '1', '2022-12-08 10:58:45', '2022-12-08 10:58:45'),
(167, '2022-12-08', 'IC-00000067', 1, 1, 283.25, 5.5, 13.75, 283, 0.25, 0, 'cash', 'wyfgfdg', 1, '1', '1', '2022-12-08 11:35:05', '2022-12-08 11:35:05'),
(168, '2022-12-08', 'IC-00000068', 1, 1, 1725, 0, 225, 2000, -275, 0, 'cash', 'Customer is very happy', 1, '1', '1', '2022-12-08 11:42:53', '2022-12-08 11:42:53'),
(169, '2022-12-08', 'IC-00000069', 1, 1, 800.5, 50, 40.5, 800, 0.5, 0, 'cash', 'Good Payment', 1, '1', '2', '2022-12-08 11:50:47', '2022-12-08 11:50:47'),
(170, '2022-12-14', 'IC-00000070', 2, 1, 1732, 0, 0, 0, 1732, 0, 'cash', NULL, 13, 'g', '1', '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(171, '2022-12-18', 'IC-00000071', 1, 1, 560, 0, 0, 560, 0, 0, 'cash', NULL, 14, '1', '1', '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(172, '2022-12-19', 'IC-00000072', 2, 1, 1558, 164, 82, 2000, -442, 0, 'cash', NULL, 14, '1', '1', '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(173, '2022-12-19', 'IC-00000073', 1, 1, 2066, 0, 0, 2100, -34, 0, 'cash', NULL, 14, '1', '2', '2022-12-19 05:08:12', '2022-12-19 05:08:12'),
(174, '2022-12-24', 'IC-00000074', 1, 1, 945, 0, 0, 0, 945, 0, 'cash', NULL, 13, 'g', '4', '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(175, '2022-12-24', 'IC-00000075', 1, 1, 520, 0, 0, 600, -80, 0, 'cash', NULL, 14, '1', '1', '2022-12-24 06:57:44', '2022-12-24 06:57:44'),
(176, '2022-12-24', 'IC-00000076', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 14, '1', '2', '2022-12-24 07:01:45', '2022-12-24 07:01:45'),
(177, '2022-12-24', 'IC-00000077', 1, 1, 80, 0, 0, 100, -20, 0, 'cash', NULL, 14, '1', '1', '2022-12-24 07:07:05', '2022-12-24 07:07:05'),
(179, '2022-12-31', 'IC-00000078', 1, 1, 520, 0, 0, 1000, -480, 0, 'cash', NULL, 11, '1', '157', '2022-12-31 08:05:47', '2022-12-31 08:05:47'),
(180, '2022-12-31', 'IC-00000079', 1, 1, 995, 0, 0, 1000, -5, 0, 'cash', NULL, 11, '1', '2', '2022-12-31 08:07:20', '2022-12-31 08:07:20'),
(181, '2022-12-31', 'IC-00000080', 2, 1, 30, 3, 3, 100, -70, 0, 'cash', NULL, 11, '1', '158', '2022-12-31 08:16:02', '2022-12-31 08:16:02'),
(182, '2022-12-31', 'IC-00000081', 1, 1, 200, 0, 0, 500, -300, 0, 'cash', 'by sakib', 11, '1', '2', '2022-12-31 08:19:05', '2022-12-31 08:19:05'),
(183, '2022-12-31', 'IC-00000082', 1, 1, 240, 0, 0, 500, -260, 0, 'cash', NULL, 11, '1', '2', '2022-12-31 08:30:12', '2022-12-31 08:30:12'),
(184, '2022-12-31', 'IC-00000083', 1, 1, 12, 0, 0, 20, -8, 0, 'cash', NULL, 11, '1', '8', '2022-12-31 08:31:54', '2022-12-31 08:31:54'),
(185, '2022-12-31', 'IC-00000084', 1, 1, 320, 0, 0, 1250, -930, 0, 'cash', NULL, 11, '1', '7', '2022-12-31 08:35:36', '2022-12-31 08:35:36'),
(186, '2022-12-31', 'IC-00000085', 1, 1, 30, 0, 0, 0, 30, 0, 'cash', NULL, 11, '1', '10', '2022-12-31 08:38:08', '2022-12-31 08:38:08'),
(187, '2022-12-31', 'IC-00000086', 1, 1, 1404, 26, 130, 1500, -96, 0, 'card', NULL, 11, '1', '158', '2022-12-31 08:41:01', '2022-12-31 08:41:01'),
(188, '2022-12-31', 'IC-00000087', 2, 1, 270, 0, 0, 270, 0, 0, 'cash', NULL, 11, 'w', '1', '2022-12-31 08:42:48', '2022-12-31 08:42:48'),
(189, '2022-12-31', 'IC-00000088', 1, 1, 320, 0, 0, 0, 320, 0, 'cash', NULL, 11, '1', '147', '2022-12-31 08:44:43', '2022-12-31 08:44:43'),
(190, '2022-12-31', 'IC-00000089', 1, 1, 850, 0, 0, 1500, -650, 0, 'cash', NULL, 11, '1', '153', '2022-12-31 08:45:02', '2022-12-31 08:45:02'),
(191, '2022-12-31', 'IC-00000090', 1, 1, 1620, 0, 0, 1650, -30, 0, 'cash', NULL, 11, '1', '2', '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(192, '2023-01-18', 'IC-00000091', 1, 1, 1040, 0, 0, 1100, -60, 0, 'cash', NULL, 14, '1', '159', '2023-01-18 11:32:07', '2023-01-18 11:32:07'),
(193, '2023-01-19', 'IC-00000092', 1, 1, 930, 0, 0, 1000, -70, 0, 'cash', NULL, 14, '1', '160', '2023-01-19 03:23:45', '2023-01-19 03:23:45'),
(194, '2023-01-19', 'IC-00000093', 1, 1, 520, 0, 0, 600, -80, 0, 'cash', NULL, 14, '1', '1', '2023-01-19 03:46:04', '2023-01-19 03:46:04'),
(195, '2023-01-19', 'IC-00000094', 1, 1, 0, 0, 0, 0, 0, 0, 'cash', NULL, 14, '1', '1', '2023-01-19 03:47:09', '2023-01-19 03:47:09'),
(196, '2023-01-19', 'IC-00000095', 1, 1, 520, 0, 0, 600, -80, 0, 'cash', NULL, 14, '1', '1', '2023-01-19 03:50:13', '2023-01-19 03:50:13'),
(197, '2023-01-19', 'IC-00000096', 1, 1, 520, 0, 0, 600, -80, 0, 'cash', NULL, 14, '1', '1', '2023-01-19 03:58:27', '2023-01-19 03:58:27'),
(198, '2023-01-25', 'IC-00000097', 1, 1, 12, 0, 0, 12, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-25 03:50:33', '2023-01-25 03:50:33'),
(199, '2023-01-25', 'IC-00000098', 1, 1, 30, 0, 0, 30, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-25 03:53:57', '2023-01-25 03:53:57'),
(200, '2023-01-25', 'IC-00000099', 1, 1, 580, 50, 30, 580, 0, 0, 'cash', NULL, 16, '1', '161', '2023-01-25 05:02:50', '2023-01-25 05:02:50'),
(201, '2023-01-25', 'IC-00000100', 1, 1, 10.5, 0, 0.5, 11, -0.5, 0, 'cash', NULL, 16, '1', '161', '2023-01-25 05:12:55', '2023-01-25 05:12:55'),
(202, '2023-01-25', 'IC-00000101', 1, 1, 522.5, 55, 27.5, 522.5, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-25 05:33:50', '2023-01-25 05:33:50'),
(203, '2023-01-25', 'IC-00000102', 1, 1, 1425, 150, 75, 1425, 0, 0, 'cash', NULL, 16, '1', '8', '2023-01-25 05:45:31', '2023-01-25 05:45:31'),
(204, '2023-01-26', 'IC-00000103', 1, 1, 211, 20, 11, 500, -289, 0, 'cash', NULL, 16, '1', '162', '2023-01-26 04:08:20', '2023-01-26 04:08:20'),
(205, '2023-01-26', 'IC-00000104', 1, 1, 31.5, 0, 1.5, 32, -0.5, 0, 'cash', NULL, 16, '1', '163', '2023-01-26 04:24:40', '2023-01-26 04:24:40'),
(206, '2023-01-26', 'IC-00000105', 1, 1, 73.5, 0, 3.5, 74, -0.5, 0, 'cash', NULL, 16, '1', '1', '2023-01-26 04:36:56', '2023-01-26 04:36:56'),
(207, '2023-01-26', 'IC-00000106', 1, 1, 336, 0, 16, 336, 0, 0, 'cash', NULL, 16, '1', '5', '2023-01-26 04:42:42', '2023-01-26 04:42:42'),
(208, '2023-01-26', 'IC-00000107', 1, 1, 210, 0, 10, 210, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-26 05:24:29', '2023-01-26 05:24:29'),
(209, '2023-01-26', 'IC-00000108', 1, 1, 300, 15, 15, 300, 0, 0, 'cash', NULL, 16, '1', '7', '2023-01-26 05:31:57', '2023-01-26 05:31:57'),
(210, '2023-01-26', 'IC-00000109', 1, 1, 10.5, 0, 0.5, 11, -0.5, 0, 'cash', NULL, 16, '1', '1', '2023-01-26 05:45:38', '2023-01-26 05:45:38'),
(211, '2023-01-26', 'IC-00000110', 1, 1, 47.25, 0, 2.25, 50, -2.75, 0, 'cash', NULL, 16, '1', '164', '2023-01-26 05:54:16', '2023-01-26 05:54:16'),
(212, '2023-01-26', 'IC-00000111', 1, 1, 136.5, 0, 6.5, 137, -0.5, 0, 'cash', NULL, 16, '1', '2', '2023-01-26 06:01:34', '2023-01-26 06:01:34'),
(213, '2023-01-26', 'IC-00000112', 1, 1, 250, 12.5, 12.5, 250, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-26 06:11:54', '2023-01-26 06:11:54'),
(214, '2023-01-26', 'IC-00000113', 1, 1, 123, 20, 13, 123, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-26 06:18:41', '2023-01-26 06:18:41'),
(215, '2023-01-26', 'IC-00000114', 1, 1, 297000, 2000, 39000, 297000, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-26 06:24:55', '2023-01-26 06:24:55'),
(216, '2023-01-26', 'IC-00000115', 1, 1, 31.5, 0, 1.5, 32, -0.5, 0, 'cash', NULL, 16, '1', '1', '2023-01-26 06:29:44', '2023-01-26 06:29:44'),
(217, '2023-01-26', 'IC-00000116', 1, 1, 5.75, 10, 0.75, 6, -0.25, 0, 'cash', NULL, 16, '1', '165', '2023-01-26 06:36:35', '2023-01-26 06:36:35'),
(218, '2023-01-26', 'IC-00000117', 1, 1, 33, 0, 3, 33, 0, 0, 'cash', NULL, 16, '1', '166', '2023-01-26 06:49:10', '2023-01-26 06:49:10'),
(219, '2023-01-26', 'IC-00000118', 1, 1, 15.75, 0, 0.75, 16, -0.25, 0, 'cash', NULL, 16, '1', '1', '2023-01-26 07:06:55', '2023-01-26 07:06:55'),
(220, '2023-01-26', 'IC-00000119', 1, 1, 350, 35, 35, 350, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-26 07:17:06', '2023-01-26 07:17:06'),
(221, '2023-01-26', 'IC-00000120', 1, 1, 68.5, 5, 3.5, 69, -0.5, 0, 'cash', NULL, 16, '1', '1', '2023-01-26 07:26:09', '2023-01-26 07:26:09'),
(222, '2023-01-26', 'IC-00000121', 1, 1, 315, 0, 15, 315, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-26 07:34:09', '2023-01-26 07:34:09'),
(223, '2023-01-29', 'IC-00000122', 1, 1, 16800, 1600, 2400, 16800, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-29 06:29:19', '2023-01-29 06:29:19'),
(224, '2023-01-29', 'IC-00000123', 1, 1, 84, 0, 4, 84, 0, 0, 'cash', NULL, 16, '1', '161', '2023-01-29 06:40:31', '2023-01-29 06:40:31'),
(225, '2023-01-29', 'IC-00000124', 1, 1, 90, 4.5, 4.5, 90, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-29 06:52:50', '2023-01-29 06:52:50'),
(226, '2023-01-29', 'IC-00000125', 1, 1, 120, 0, 0, 120, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-29 07:01:14', '2023-01-29 07:01:14'),
(227, '2023-01-29', 'IC-00000126', 1, 1, 378, 0, 18, 378, 0, 0, 'cash', NULL, 16, '1', '8', '2023-01-29 07:11:41', '2023-01-29 07:11:41'),
(228, '2023-01-29', 'IC-00000127', 1, 1, 525, 0, 25, 525, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-29 07:16:24', '2023-01-29 07:16:24'),
(229, '2023-01-29', 'IC-00000128', 1, 1, 100, 0, 0, 100, 0, 0, 'cash', NULL, 16, '1', '1', '2023-01-29 07:22:15', '2023-01-29 07:22:15'),
(230, '2023-01-29', 'IC-00000129', 1, 1, 120, 0, 0, 120, 0, 0, 'cash', NULL, 16, '1', '2', '2023-01-29 07:29:40', '2023-01-29 07:29:40'),
(231, '2023-02-02', 'IC-00000130', 1, 1, 6180, 0, 0, 6500, -320, 0, 'cash', NULL, 14, '1', '167', '2023-02-02 05:11:27', '2023-02-02 05:11:27'),
(232, '2023-02-02', 'IC-00000131', 1, 1, 2907, 306, 153, 3000, -93, 0, 'cash', NULL, 14, '1', '2', '2023-02-02 05:17:02', '2023-02-02 05:17:02'),
(233, '2023-02-02', 'IC-00000132', 2, 1, 2071, 50, 101, 2100, -29, 0, 'cash', 'Urgent', 14, '1', '1', '2023-02-02 07:15:58', '2023-02-02 07:15:58'),
(234, '2023-02-06', 'IC-00000133', 1, 1, 471.19999999999993, 49.6, 24.8, 500, -28.800000000000068, 0, 'cash', NULL, 14, '1', '168', '2023-02-06 07:06:03', '2023-02-06 07:06:03'),
(235, '2023-02-06', 'IC-00000134', 1, 1, 931, 147, 98, 1000, -69, 0, 'cash', NULL, 14, '1', '169', '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(236, '2023-02-06', 'IC-00000135', 1, 1, 325.2, 15, 16.2, 400, -74.80000000000001, 0, 'cash', NULL, 14, '1', '170', '2023-02-06 07:23:11', '2023-02-06 07:23:11'),
(237, '2023-02-06', 'IC-00000136', 1, 1, 1052, 105.2, 105.2, 1100, -48, 0, 'cash', NULL, 14, '1', '171', '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(238, '2023-02-06', 'IC-00000137', 1, 1, 760, 80, 40, 760, 0, 0, 'cash', NULL, 14, '1', '172', '2023-02-06 08:01:39', '2023-02-06 08:01:39'),
(239, '2023-02-09', 'IC-00000138', 1, 1, 10.75, 5, 0.75, 11, -0.25, 0, 'cash', NULL, 16, '1', '8', '2023-02-09 07:00:56', '2023-02-09 07:00:56'),
(240, '2023-03-04', 'IC-00000139', 1, 1, 3187.5, 750, 187.5, 3188, -0.5, 0, 'cash', NULL, 16, '1', '173', '2023-03-04 04:34:39', '2023-03-04 04:34:39'),
(241, '2023-03-04', 'IC-00000140', 1, 1, 1015, 435, 0, 1500, -485, 0, 'cash', NULL, 16, '1', '174', '2023-03-04 04:46:13', '2023-03-04 04:46:13'),
(242, '2023-03-04', 'IC-00000141', 1, 1, 2520, 0, 120, 2550, -30, 0, 'cash', NULL, 16, '1', '175', '2023-03-04 05:38:26', '2023-03-04 05:38:26'),
(243, '2023-03-04', 'IC-00000142', 1, 1, 800, 0, 0, 1000, -200, 0, 'cash', NULL, 16, '1', '161', '2023-03-04 05:47:42', '2023-03-04 05:47:42'),
(244, '2023-03-04', 'IC-00000143', 1, 1, 120, 0, 0, 0, 120, 0, 'cash', NULL, 16, '1', '1', '2023-03-04 05:57:44', '2023-03-04 05:57:44'),
(245, '2023-03-04', 'IC-00000144', 1, 1, 3000, 0, 0, 3000, 0, 0, 'cash', NULL, 16, '1', '1', '2023-03-04 06:07:38', '2023-03-04 06:07:38'),
(246, '2023-03-04', 'IC-00000145', 1, 1, 1470, 0, 70, 2000, -530, 0, 'cash', NULL, 16, '1', '1', '2023-03-04 06:15:04', '2023-03-04 06:15:04'),
(247, '2023-03-04', 'IC-00000146', 1, 1, 287500, 0, 37500, 300000, -12500, 0, 'cash', NULL, 16, '1', '176', '2023-03-04 06:20:32', '2023-03-04 06:20:32'),
(248, '2023-03-04', 'IC-00000147', 1, 1, 360, 0, 0, 400, -40, 0, 'cash', NULL, 16, '1', '177', '2023-03-04 06:30:19', '2023-03-04 06:30:19'),
(249, '2023-03-04', 'IC-00000148', 1, 1, 30, 0, 0, 100, -70, 0, 'cash', NULL, 16, '1', '178', '2023-03-04 06:36:55', '2023-03-04 06:36:55'),
(250, '2023-03-04', 'IC-00000149', 1, 1, 71.25, 3.75, 0, 80, -8.75, 0, 'cash', NULL, 16, '1', '3', '2023-03-04 06:50:40', '2023-03-04 06:50:40'),
(251, '2023-03-04', 'IC-00000150', 1, 1, 9900, 2200, 1100, 10000, -100, 0, 'cash', NULL, 16, '1', '2', '2023-03-04 06:57:19', '2023-03-04 06:57:19'),
(252, '2023-03-04', 'IC-00000151', 1, 1, 11000, 0, 0, 12000, -1000, 0, 'cash', NULL, 16, '1', '1', '2023-03-04 06:58:13', '2023-03-04 06:58:13'),
(253, '2023-03-04', 'IC-00000152', 1, 1, 2730, 0, 0, 3000, -270, 0, 'cash', NULL, 11, '1', '1', '2023-03-04 09:36:07', '2023-03-04 09:36:07'),
(254, '2023-03-11', 'IC-00000153', 1, 1, 762, 15, 37, 1000, -238, 0, 'cash', NULL, 14, '1', '179', '2023-03-11 05:02:43', '2023-03-11 05:02:43'),
(255, '2023-04-03', 'IC-00000154', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 16, '1', '1', '2023-04-03 08:52:55', '2023-04-03 08:52:55'),
(256, '2023-04-03', 'IC-00000155', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 16, '1', '1', '2023-04-03 10:23:05', '2023-04-03 10:23:05'),
(257, '2023-04-04', 'IC-00000156', 1, 1, 95, 10, 5, 100, -5, 0, 'cash', NULL, 16, '1', '181', '2023-04-04 06:13:08', '2023-04-04 06:13:08'),
(258, '2023-04-04', 'IC-00000157', 1, 1, 520, 0, 0, 520, 0, 0, 'card', NULL, 16, '1', '1', '2023-04-04 06:15:59', '2023-04-04 06:15:59'),
(259, '2023-04-04', 'IC-00000158', 1, 1, 16, 5, 1, 50, -34, 0, 'cash', NULL, 16, '1', '180', '2023-04-04 06:16:40', '2023-04-04 06:16:40'),
(260, '2023-04-04', 'IC-00000159', 1, 1, 110, 5.5, 5.5, 120, -10, 0, 'cash', 'bappi', 16, '1', '1', '2023-04-04 06:52:30', '2023-04-04 06:52:30'),
(261, '2023-04-04', 'IC-00000160', 1, 1, 55, 2.75, 2.75, 100, -45, 0, 'cash', NULL, 16, '1', '4', '2023-04-04 06:53:25', '2023-04-04 06:53:25'),
(262, '2023-04-04', 'IC-00000161', 1, 1, 57.75, 0, 2.75, 57.75, 0, 0, 'cash', NULL, 16, '1', '7', '2023-04-04 06:59:50', '2023-04-04 06:59:50'),
(263, '2023-04-04', 'IC-00000162', 1, 1, 1787.5, 50, 87.5, 2000, -212.5, 0, 'cash', NULL, 16, '1', '182', '2023-04-04 07:05:29', '2023-04-04 07:05:29'),
(264, '2023-04-04', 'IC-00000163', 1, 1, 705, 0, 0, 800, -95, 0, 'cash', NULL, 16, '1', '1', '2023-04-04 07:10:42', '2023-04-04 07:10:42'),
(265, '2023-04-04', 'IC-00000164', 1, 1, 32000, 1000, 3000, 32000, 0, 0, 'cash', NULL, 16, '1', '2', '2023-04-04 07:26:54', '2023-04-04 07:26:54'),
(266, '2023-04-04', 'IC-00000165', 1, 1, 5.25, 0, 0.25, 6, -0.75, 0, 'cash', NULL, 16, '1', '1', '2023-04-04 07:27:32', '2023-04-04 07:27:32'),
(267, '2023-04-05', 'IC-00000166', 1, 1, 520, 0, 0, 600, -80, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 06:34:29', '2023-04-05 06:34:29'),
(268, '2023-04-05', 'IC-00000167', 1, 1, 30, 0, 0, 50, -20, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 06:43:12', '2023-04-05 06:43:12'),
(269, '2023-04-05', 'IC-00000168', 1, 1, 25, 0, 0, 30, -5, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 06:47:40', '2023-04-05 06:47:40'),
(270, '2023-04-05', 'IC-00000169', 1, 1, 150, 0, 0, 200, -50, 0, 'cash', NULL, 16, '1', '183', '2023-04-05 06:50:53', '2023-04-05 06:50:53'),
(271, '2023-04-05', 'IC-00000170', 2, 1, 125, 0, 0, 130, -5, 0, 'cash', 'Thank you', 16, '1', '2', '2023-04-05 06:54:32', '2023-04-05 06:54:32'),
(272, '2023-04-05', 'IC-00000171', 2, 1, 0, 0, 0, 130, -130, 0, 'cash', 'Thank you', 16, '1', '2', '2023-04-05 06:54:35', '2023-04-05 06:54:35'),
(273, '2023-04-05', 'IC-00000172', 1, 1, 150, 7.5, 7.5, 200, -50, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 06:57:13', '2023-04-05 06:57:13'),
(274, '2023-04-05', 'IC-00000173', 1, 1, 40, 0, 0, 50, -10, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 07:01:48', '2023-04-05 07:01:48'),
(275, '2023-04-05', 'IC-00000174', 1, 1, 546, 0, 26, 546, 0, 0, 'cash', NULL, 16, '1', '148', '2023-04-05 07:06:00', '2023-04-05 07:06:00'),
(276, '2023-04-05', 'IC-00000175', 1, 1, 40, 0, 0, 40, 0, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 07:09:43', '2023-04-05 07:09:43'),
(277, '2023-04-05', 'IC-00000176', 1, 1, 31.5, 0, 1.5, 50, -18.5, 0, 'cash', NULL, 16, '1', '2', '2023-04-05 07:13:04', '2023-04-05 07:13:04'),
(278, '2023-04-05', 'IC-00000177', 1, 1, 180, 0, 0, 200, -20, 0, 'cash', NULL, 16, '1', '183', '2023-04-05 07:19:08', '2023-04-05 07:19:08'),
(279, '2023-04-05', 'IC-00000178', 1, 1, 300, 15, 15, 500, -200, 0, 'cash', NULL, 16, '1', '10', '2023-04-05 07:22:54', '2023-04-05 07:22:54'),
(280, '2023-04-05', 'IC-00000179', 1, 1, 50, 0, 0, 100, -50, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 07:23:28', '2023-04-05 07:23:28'),
(281, '2023-04-05', 'IC-00000180', 1, 1, 40, 0, 0, 50, -10, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 07:28:15', '2023-04-05 07:28:15'),
(282, '2023-04-05', 'IC-00000181', 1, 1, 882.5, 10, 42.5, 900, -17.5, 0, 'cash', NULL, 16, '1', '1', '2023-04-05 07:28:18', '2023-04-05 07:28:18'),
(284, '2023-04-06', 'IC-00000182', 1, 1, 30, 0, 0, 30, 0, 0, 'cash', NULL, 16, '1', '1', '2023-04-06 04:44:06', '2023-04-06 04:44:06'),
(285, '2023-04-06', 'IC-00000183', 1, 1, 130, 0, 0, 130, 0, 0, 'cash', NULL, 16, '1', '1', '2023-04-06 04:49:30', '2023-04-06 04:49:30'),
(286, '2023-04-06', 'IC-00000184', 1, 1, 30, 0, 0, 50, -20, 0, 'cash', NULL, 16, '1', '1', '2023-04-06 05:00:04', '2023-04-06 05:00:04'),
(287, '2023-04-06', 'IC-00000185', 1, 1, 2000, 0, 0, 2000, 0, 0, 'cash', NULL, 16, '1', '5', '2023-04-06 05:12:09', '2023-04-06 05:12:09'),
(288, '2023-04-06', 'IC-00000186', 1, 1, 420, 0, 20, 500, -80, 0, 'cash', 'THANK YOU  MAM', 16, '1', '184', '2023-04-06 05:29:40', '2023-04-06 05:29:40'),
(289, '2023-04-06', 'IC-00000187', 1, 1, 415, 0, 0, 500, -85, 0, 'cash', NULL, 16, '1', '10', '2023-04-06 06:07:33', '2023-04-06 06:07:33'),
(290, '2023-04-06', 'IC-00000188', 1, 1, 45, 0, 0, 50, -5, 0, 'cash', NULL, 16, '1', '1', '2023-04-06 06:15:34', '2023-04-06 06:15:34'),
(291, '2023-04-06', 'IC-00000189', 1, 1, 140, 0, 0, 200, -60, 0, 'cash', NULL, 16, '1', '2', '2023-04-06 06:23:52', '2023-04-06 06:23:52'),
(292, '2023-04-13', 'IC-00000190', 2, 1, 8810, 0, 0, 9000, -190, 0, 'cash', NULL, 14, '1', '185', '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(293, '2023-04-13', 'IC-00000191', 1, 1, 6752.7, 1125.45, 375.15, 7000, -247.30000000000018, 0, 'cash', NULL, 14, '1', '185', '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(294, '2023-04-13', 'IC-00000192', 1, 1, 1173, 34.5, 57.5, 1250, -77, 0, 'cash', NULL, 14, '1', '186', '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(295, '2023-04-13', 'IC-00000193', 1, 1, 598.5, 63, 31.5, 1000, -401.5, 0, 'cash', NULL, 14, '1', '187', '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(296, '2023-04-13', 'IC-00000194', 1, 1, 357.25, 15.5, 17.75, 500, -142.75, 0, 'cash', NULL, 14, '1', '188', '2023-04-13 07:48:31', '2023-04-13 07:48:31'),
(297, '2023-04-13', 'IC-00000195', 1, 1, 97834.75, 75257.5, 22577.25, 98000, -165.25, 0, 'cash', NULL, 14, '1', '189', '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(298, '2023-04-16', 'IC-00000196', 1, 1, 978.5, 103, 51.5, 1000, -21.5, 0, 'cash', NULL, 14, '1', '190', '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(299, '2023-04-16', 'IC-00000197', 1, 1, 460, 46, 46, 500, -40, 0, 'cash', NULL, 14, '1', '1', '2023-04-16 04:12:11', '2023-04-16 04:12:11'),
(300, '2023-04-16', 'IC-00000198', 1, 1, 878.25, 30, 43.25, 900, -21.75, 0, 'cash', NULL, 14, '1', '191', '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(301, '2023-04-16', 'IC-00000199', 1, 1, 365.75, 38.5, 19.25, 400, -34.25, 0, 'cash', NULL, 14, '1', '1', '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(302, '2023-04-16', 'IC-00000200', 1, 1, 117451.75, 90347.5, 27104.25, 118000, -548.25, 0, 'cash', NULL, 14, '1', '192', '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(303, '2023-04-17', 'IC-00000201', 1, 1, 3422.5, 152.5, 325, 3500, -77.5, 0, 'cash', NULL, 11, '1', '193', '2023-04-17 04:49:26', '2023-04-17 04:49:26'),
(304, '2023-04-17', 'IC-00000202', 1, 1, 385, 17.5, 52.5, 500, -115, 0, 'cash', NULL, 11, '1', '193', '2023-04-17 05:00:09', '2023-04-17 05:00:09'),
(305, '2023-04-18', 'IC-00000203', 1, 1, 300, 15, 15, 500, -200, 0, 'cash', NULL, 11, '1', '1', '2023-04-18 04:32:37', '2023-04-18 04:32:37'),
(306, '2023-04-30', 'IC-00000204', 1, 1, 927, 18, 45, 1000, -73, 0, 'cash', NULL, 11, 'g', '1', '2023-04-30 07:06:44', '2023-04-30 07:06:44'),
(307, '2023-05-06', 'IC-00000205', 1, 1, 257.5, 5, 12.5, 300, -42.5, 0, 'cash', NULL, 11, '1', '1', '2023-05-06 07:23:41', '2023-05-06 07:23:41'),
(308, '2023-05-09', 'IC-00000206', 2, 1, 239.7, 7.05, 11.75, 500, -260.3, 0, 'cash', NULL, 14, '1', '194', '2023-05-09 05:59:13', '2023-05-09 05:59:13'),
(309, '2023-05-09', 'IC-00000207', 1, 1, 350, 17.5, 17.5, 500, -150, 0, 'cash', NULL, 14, '1', '195', '2023-05-09 06:16:28', '2023-05-09 06:16:28'),
(310, '2023-05-09', 'IC-00000208', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 15, '1', '1', '2023-05-09 11:12:09', '2023-05-09 11:12:09'),
(311, '2023-05-13', 'IC-00000209', 1, 1, 864.5, 91, 45.5, 1000, -135.5, 0, 'cash', '1000', 14, '1', '196', '2023-05-13 05:05:16', '2023-05-13 05:05:16'),
(312, '2023-05-13', 'IC-00000210', 1, 1, 918, 153, 51, 0, 918, 0, 'cash', '1500', 14, '1', '197', '2023-05-13 05:19:28', '2023-05-13 05:19:28'),
(313, '2023-05-13', 'IC-00000211', 1, 1, 294.5, 31, 15.5, 1000, -705.5, 0, 'cash', NULL, 14, '1', '198', '2023-05-13 05:26:56', '2023-05-13 05:26:56'),
(314, '2023-05-13', 'IC-00000212', 1, 1, 544.5, 90.75, 30.25, 1000, -455.5, 0, 'cash', NULL, 14, '1', '199', '2023-05-13 05:30:11', '2023-05-13 05:30:11'),
(315, '2023-05-13', 'IC-00000213', 1, 1, 0, 0, 0, 500, -500, 0, 'cash', NULL, 14, '1', '200', '2023-05-13 05:34:02', '2023-05-13 05:34:02'),
(316, '2023-05-13', 'IC-00000214', 1, 1, 520, 26, 26, 500, 20, 0, 'cash', NULL, 14, '1', '201', '2023-05-13 05:43:10', '2023-05-13 05:43:10'),
(317, '2023-05-13', 'IC-00000215', 1, 1, 72, 12, 4, 500, -428, 0, 'cash', NULL, 14, '1', '202', '2023-05-13 05:47:18', '2023-05-13 05:47:18'),
(318, '2023-05-13', 'IC-00000216', 1, 1, 807.5, 127.5, 85, 1000, -192.5, 0, 'cash', '1000', 14, '1', '203', '2023-05-13 06:46:01', '2023-05-13 06:46:01'),
(319, '2023-05-13', 'IC-00000217', 1, 1, 0, 0, 0, 500, -500, 0, 'cash', NULL, 14, '1', '204', '2023-05-13 06:56:17', '2023-05-13 06:56:17'),
(320, '2023-05-13', 'IC-00000218', 1, 1, 114, 12, 6, 1500, -1386, 0, 'cash', '1000', 14, '1', '205', '2023-05-13 07:00:43', '2023-05-13 07:00:43'),
(321, '2023-05-13', 'IC-00000219', 1, 1, 1007, 106, 53, 1100, -93, 0, 'cash', NULL, 14, '1', '206', '2023-05-13 07:05:49', '2023-05-13 07:05:49'),
(322, '2023-05-13', 'IC-00000220', 1, 1, 244.8, 7.2, 12, 500, -255.2, 0, 'cash', NULL, 14, '1', '207', '2023-05-13 07:15:44', '2023-05-13 07:15:44'),
(323, '2023-05-13', 'IC-00000221', 1, 1, 22.799999999999997, 3.6, 2.4, 1000, -977.2, 0, 'cash', NULL, 14, '1', '209', '2023-05-13 07:25:45', '2023-05-13 07:25:45'),
(324, '2023-05-13', 'IC-00000222', 1, 1, 81, 13.5, 4.5, 1000, -919, 0, 'cash', NULL, 14, '1', '210', '2023-05-13 07:28:57', '2023-05-13 07:28:57'),
(325, '2023-05-13', 'IC-00000223', 1, 1, 57, 6, 3, 1000, -943, 0, 'cash', NULL, 14, '1', '211', '2023-05-13 07:33:40', '2023-05-13 07:33:40'),
(326, '2023-05-13', 'IC-00000224', 1, 1, 0, 0, 0, 500, -500, 0, 'cash', NULL, 14, '1', '212', '2023-05-13 07:41:01', '2023-05-13 07:41:01'),
(327, '2023-05-13', 'IC-00000225', 1, 1, 0, 0, 0, 1000, -1000, 0, 'cash', NULL, 14, '1', '213', '2023-05-13 07:50:17', '2023-05-13 07:50:17'),
(328, '2023-05-13', 'IC-00000226', 1, 1, 41.2, 4.8, 6, 0, 41.2, 0, 'cash', '100', 14, '1', '1', '2023-05-13 07:55:49', '2023-05-13 07:55:49'),
(329, '2023-05-13', 'IC-00000227', 1, 1, 468, 78, 26, 500, -32, 0, 'cash', NULL, 14, '1', '1', '2023-05-13 07:59:06', '2023-05-13 07:59:06'),
(330, '2023-05-13', 'IC-00000228', 1, 1, 66.5, 7, 3.5, 500, -433.5, 0, 'cash', NULL, 14, '1', '1', '2023-05-13 08:04:15', '2023-05-13 08:04:15'),
(331, '2023-05-13', 'IC-00000229', 1, 1, 79.5, 15, 4.5, 1000, -920.5, 0, 'cash', NULL, 14, '1', '1', '2023-05-13 08:11:36', '2023-05-13 08:11:36'),
(332, '2023-05-13', 'IC-00000230', 1, 1, 66.5, 7, 3.5, 1000, -933.5, 0, 'cash', NULL, 14, '1', '1', '2023-05-13 08:18:02', '2023-05-13 08:18:02'),
(333, '2023-05-13', 'IC-00000231', 1, 1, 110, 11, 11, 500, -390, 0, 'cash', NULL, 14, '1', '1', '2023-05-13 08:24:27', '2023-05-13 08:24:27'),
(334, '2023-05-13', 'IC-00000232', 1, 1, 90, 15, 5, 500, -410, 0, 'cash', NULL, 14, '1', '1', '2023-05-13 08:29:10', '2023-05-13 08:29:10'),
(335, '2023-06-17', 'IC-00000233', 1, 1, 520, 0, 0, 520, 0, 0, 'cash', NULL, 16, '1', '1', '2023-06-17 04:07:26', '2023-06-17 04:07:26'),
(336, '2023-06-17', 'IC-00000234', 1, 1, 2162.75, 100, 107.75, 2500, -337.25, 0, 'cash', NULL, 16, '1', '3', '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(337, '2023-06-17', 'IC-00000235', 1, 1, 4379.5, 461, 230.5, 5000, -620.5, 0, 'cash', NULL, 16, '1', '4', '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(338, '2023-06-17', 'IC-00000236', 1, 1, 0, 0, 0, 5000, -5000, 0, 'cash', NULL, 16, '1', '4', '2023-06-17 06:56:17', '2023-06-17 06:56:17'),
(339, '2023-06-17', 'IC-00000237', 1, 1, 135727.19999999998, 30161.6, 15080.8, 136000, -272.80000000001746, 0, 'cash', NULL, 16, '1', '2', '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(340, '2023-06-17', 'IC-00000238', 1, 1, 2806.75, 54.5, 136.25, 3000, -193.25, 0, 'cash', NULL, 16, '1', '2', '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(341, '2023-06-17', 'IC-00000239', 1, 1, 38925.6, 0, 1853.6, 40000, -1074.4000000000015, 0, 'cash', NULL, 16, '1', '1', '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(342, '2023-06-17', 'IC-00000240', 1, 1, 10089.5, 2967.5, 1187, 11000, -910.5, 0, 'cash', NULL, 16, '1', '7', '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(343, '2023-06-25', 'IC-00000241', 1, 1, 60, 0, 0, 60, 0, 0, 'cash', NULL, 15, '1', '214', '2023-06-25 07:38:53', '2023-06-25 07:38:53'),
(344, '2023-07-04', 'IC-00000242', 1, 1, 850, 0, 0, 1000, -150, 0, 'cash', NULL, 14, 'g', '1', '2023-07-04 09:48:45', '2023-07-04 09:48:45'),
(345, '2023-07-05', 'IC-00000243', 1, 1, 520, 0, 0, 1000, -480, 0, 'cash', NULL, 14, 'g', '1', '2023-07-05 05:58:46', '2023-07-05 05:58:46'),
(346, '2023-07-05', 'IC-00000244', 2, 1, 160, 0, 0, 160, 0, 0, 'cash', NULL, 14, 'g', '6', '2023-07-05 06:53:08', '2023-07-05 06:53:08'),
(347, '2023-07-05', 'IC-00000245', 1, 1, 1700, 0, 0, 1700, 0, 0, 'cash', NULL, 14, 'g', '4', '2023-07-05 07:14:09', '2023-07-05 07:14:09'),
(348, '2023-07-05', 'IC-00000246', 1, 1, 0, 0, 0, 1700, -1700, 0, 'cash', NULL, 14, 'g', '4', '2023-07-05 07:14:11', '2023-07-05 07:14:11'),
(349, '2023-07-05', 'IC-00000247', 1, 1, 1200, 0, 0, 0, 1200, 0, 'cash', NULL, 14, 'g', '1', '2023-07-05 07:16:10', '2023-07-05 07:16:10'),
(350, '2023-07-05', 'IC-00000248', 1, 1, 2400, 0, 0, 0, 2400, 0, 'cash', NULL, 14, 'g', '1', '2023-07-05 07:18:25', '2023-07-05 07:18:25'),
(351, '2023-07-05', 'IC-00000249', 1, 1, 1470, 0, 0, 1000, 470, 0, 'cash', NULL, 14, 'g', '1', '2023-07-05 07:23:51', '2023-07-05 07:23:51'),
(352, '2023-07-05', 'IC-00000250', 1, 1, 1200, 0, 0, 1200, 0, 0, 'cash', NULL, 14, 'g', '1', '2023-07-05 07:41:19', '2023-07-05 07:41:19'),
(353, '2023-07-05', 'IC-00000251', 1, 1, 5280, 0, 0, 5280, 0, 0, 'cash', NULL, 14, 'g', '3', '2023-07-05 07:43:39', '2023-07-05 07:43:39'),
(354, '2023-07-05', 'IC-00000252', 1, 1, 0, 0, 0, 5280, -5280, 0, 'cash', NULL, 14, 'g', '3', '2023-07-05 07:43:40', '2023-07-05 07:43:40'),
(355, '2023-07-05', 'IC-00000253', 1, 1, 350, 17.5, 17.5, 500, -150, 0, 'cash', NULL, 16, '1', '217', '2023-07-05 07:45:31', '2023-07-05 07:45:31'),
(356, '2023-07-05', 'IC-00000254', 1, 1, 1350, 0, 0, 1350, 0, 0, 'cash', NULL, 14, 'g', '5', '2023-07-05 07:51:45', '2023-07-05 07:51:45'),
(357, '2023-07-05', 'IC-00000255', 1, 1, 26.25, 1.25, 2.5, 30, -3.75, 0, 'cash', NULL, 16, '1', '1', '2023-07-05 07:55:53', '2023-07-05 07:55:53'),
(358, '2023-07-05', 'IC-00000256', 1, 1, 150, 0, 0, 150, 0, 0, 'cash', NULL, 14, 'g', '3', '2023-07-05 07:56:17', '2023-07-05 07:56:17'),
(359, '2023-07-06', 'IC-00000257', 1, 1, 15.45, 0.3, 0.75, 20, -4.550000000000001, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 03:09:56', '2023-07-06 03:09:56'),
(360, '2023-07-06', 'IC-00000258', 1, 1, 20.6, 0.4, 1, 50, -29.4, 0, 'cash', NULL, 16, '1', '218', '2023-07-06 04:08:24', '2023-07-06 04:08:24'),
(361, '2023-07-06', 'IC-00000259', 1, 1, 51, 1.5, 2.5, 100, -49, 0, 'cash', NULL, 16, '1', '219', '2023-07-06 04:21:20', '2023-07-06 04:21:20'),
(362, '2023-07-06', 'IC-00000260', 1, 1, 150, 7.5, 7.5, 200, -50, 0, 'cash', NULL, 16, '1', '220', '2023-07-06 04:28:03', '2023-07-06 04:28:03'),
(363, '2023-07-06', 'IC-00000261', 1, 1, 120, 6, 6, 150, -30, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 04:33:03', '2023-07-06 04:33:03'),
(364, '2023-07-06', 'IC-00000262', 1, 1, 250, 12.5, 12.5, 500, -250, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 04:42:31', '2023-07-06 04:42:31'),
(365, '2023-07-06', 'IC-00000263', 1, 1, 30.9, 0.6, 1.5, 50, -19.1, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 04:44:02', '2023-07-06 04:44:02'),
(366, '2023-07-06', 'IC-00000264', 1, 1, 30.3, 1.2, 1.5, 50, -19.7, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 04:47:32', '2023-07-06 04:47:32'),
(367, '2023-07-06', 'IC-00000265', 1, 1, 33, 0, 3, 50, -17, 0, 'cash', NULL, 16, '1', '4', '2023-07-06 04:48:10', '2023-07-06 04:48:10'),
(368, '2023-07-06', 'IC-00000266', 1, 1, 126, 6, 12, 200, -74, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 04:50:31', '2023-07-06 04:50:31'),
(369, '2023-07-06', 'IC-00000267', 1, 1, 30.9, 0.6, 1.5, 40, -9.100000000000001, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 04:55:31', '2023-07-06 04:55:31'),
(370, '2023-07-06', 'IC-00000268', 1, 1, 123.6, 2.4, 6, 200, -76.4, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 04:58:26', '2023-07-06 04:58:26'),
(371, '2023-07-06', 'IC-00000269', 1, 1, 550, 27.5, 27.5, 550, 0, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 04:59:54', '2023-07-06 04:59:54'),
(372, '2023-07-06', 'IC-00000270', 1, 1, 120, 0, 0, 200, -80, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 05:01:27', '2023-07-06 05:01:27'),
(373, '2023-07-06', 'IC-00000271', 1, 1, 546, 0, 26, 600, -54, 0, 'card', NULL, 16, '1', '1', '2023-07-06 06:05:41', '2023-07-06 06:05:41'),
(374, '2023-07-06', 'IC-00000272', 1, 1, 1500, 150, 150, 2000, -500, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 06:07:11', '2023-07-06 06:07:11'),
(375, '2023-07-06', 'IC-00000273', 1, 1, 520, 0, 0, 550, -30, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:10:54', '2023-07-06 06:10:54'),
(377, '2023-07-06', 'IC-00000274', 1, 1, 14.7, 1.05, 0.75, 20, -5.300000000000001, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 06:13:22', '2023-07-06 06:13:22'),
(378, '2023-07-06', 'IC-00000275', 1, 1, 546, 0, 26, 600, -54, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:16:01', '2023-07-06 06:16:01'),
(379, '2023-07-06', 'IC-00000276', 1, 1, 520, 0, 0, 0, 520, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 06:17:24', '2023-07-06 06:17:24'),
(380, '2023-07-06', 'IC-00000277', 1, 1, 15.3, 0.45, 0.75, 20, -4.699999999999999, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:19:29', '2023-07-06 06:19:29'),
(381, '2023-07-06', 'IC-00000278', 1, 1, 530.4, 15.6, 26, 600, -69.60000000000002, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:21:17', '2023-07-06 06:21:17'),
(382, '2023-07-06', 'IC-00000279', 1, 1, 530.4, 15.6, 26, 600, -69.60000000000002, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:27:30', '2023-07-06 06:27:30'),
(383, '2023-07-06', 'IC-00000280', 1, 1, 15, 0.75, 0.75, 20, -5, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:31:56', '2023-07-06 06:31:56'),
(384, '2023-07-06', 'IC-00000281', 1, 1, 494, 52, 26, 500, -6, 0, 'cash', NULL, 16, '1', '221', '2023-07-06 06:31:58', '2023-07-06 06:31:58'),
(385, '2023-07-06', 'IC-00000282', 1, 1, 483.6, 62.4, 26, 500, -16.399999999999977, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:34:14', '2023-07-06 06:34:14'),
(386, '2023-07-06', 'IC-00000283', 1, 1, 31.5, 3, 4.5, 50, -18.5, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:39:00', '2023-07-06 06:39:00'),
(387, '2023-07-06', 'IC-00000284', 1, 1, 520, 26, 26, 500, 20, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:39:24', '2023-07-06 06:39:24'),
(388, '2023-07-06', 'IC-00000285', 1, 1, 338, 260, 78, 500, -162, 0, 'cash', NULL, 16, '1', '222', '2023-07-06 06:42:10', '2023-07-06 06:42:10'),
(389, '2023-07-06', 'IC-00000286', 1, 1, 15.75, 0, 0.75, 20, -4.25, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:44:45', '2023-07-06 06:44:45'),
(390, '2023-07-06', 'IC-00000287', 1, 1, 520, 0, 0, 600, -80, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 06:45:58', '2023-07-06 06:45:58'),
(391, '2023-07-06', 'IC-00000288', 1, 1, 587.6, 10.4, 78, 700, -112.39999999999998, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 06:49:50', '2023-07-06 06:49:50'),
(392, '2023-07-06', 'IC-00000289', 1, 1, 15.75, 0, 0.75, 22, -6.25, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:52:00', '2023-07-06 06:52:00'),
(393, '2023-07-06', 'IC-00000290', 1, 1, 509.6, 10.4, 0, 550, -40.39999999999998, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 06:55:21', '2023-07-06 06:55:21'),
(394, '2023-07-06', 'IC-00000291', 1, 1, 16.5, 0, 1.5, 20, -3.5, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 07:03:01', '2023-07-06 07:03:01'),
(395, '2023-07-06', 'IC-00000292', 1, 1, 15.15, 0.6, 0.75, 20, -4.85, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 07:10:45', '2023-07-06 07:10:45'),
(396, '2023-07-06', 'IC-00000293', 1, 1, 865, 0.75, 0.75, 1000, -135, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 07:16:37', '2023-07-06 07:16:37'),
(397, '2023-07-06', 'IC-00000294', 1, 1, 15.75, 0.75, 1.5, 20, -4.25, 0, 'cash', NULL, 16, '1', '2', '2023-07-06 07:24:43', '2023-07-06 07:24:43'),
(398, '2023-07-06', 'IC-00000295', 1, 1, 15.75, 0.75, 1.5, 20, -4.25, 0, 'cash', NULL, 16, '1', '1', '2023-07-06 07:29:30', '2023-07-06 07:29:30'),
(399, '2023-07-11', 'IC-00000296', 1, 1, 20, 0, 0, 20, 0, 0, 'cash', NULL, 15, '1', '223', '2023-07-11 04:12:08', '2023-07-11 04:12:08'),
(400, '2023-07-11', 'IC-00000297', 2, 1, 403.75, 42.5, 21.25, 500, -96.25, 0, 'cash', NULL, 14, '1', '224', '2023-07-11 05:27:20', '2023-07-11 05:27:20'),
(401, '2023-07-11', 'IC-00000298', 2, 1, 1800, 0, 0, 0, 1800, 0, 'cash', NULL, 13, 'g', '1', '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(402, '2023-07-13', 'IC-00000299', 1, 1, 2163, 42, 105, 2500, -337, 0, 'card', NULL, 16, '1', '226', '2023-07-13 04:06:38', '2023-07-13 04:06:38'),
(403, '2023-07-13', 'IC-00000300', 1, 1, 1545, 30, 75, 2000, -455, 0, 'card', NULL, 16, '1', '227', '2023-07-13 06:40:19', '2023-07-13 06:40:19'),
(404, '2023-07-15', 'IC-00000301', 1, 1, 1030, 20, 50, 1100, -70, 0, 'cash', NULL, 16, '1', '228', '2023-07-15 04:46:50', '2023-07-15 04:46:50'),
(405, '2023-07-17', 'IC-00000302', 1, 1, 3980.5, 20, 190.5, 4000, -19.5, 0, 'cash', NULL, 14, '1', '229', '2023-07-17 07:31:50', '2023-07-17 07:31:50'),
(406, '2023-07-17', 'IC-00000303', 1, 1, 1133, 22, 55, 1500, -367, 0, 'cash', NULL, 14, '1', '231', '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(407, '2023-07-17', 'IC-00000304', 1, 1, 273.5, 10, 13.5, 500, -226.5, 0, 'cash', NULL, 14, '1', '232', '2023-07-17 08:06:19', '2023-07-17 08:06:19'),
(409, '2024-03-17', 'IC-00000305', 1, 1, 1450, 0, 0, 1450, 0, 0, 'cash', 'paid', 18, '1', '1', '2024-03-17 06:52:53', '2024-03-17 06:52:53'),
(410, '2024-03-19', 'IC-00000306', 1, 1, 3536, 832, 208, 5000, -1464, 0, 'card', 'tttttttttt', 20, '1', '1', '2024-03-19 05:12:20', '2024-03-19 05:12:20'),
(411, '2024-03-19', 'IC-00000307', 1, 1, 1772, 0, 0, 5000, -3228, 0, 'cash', NULL, 20, '1', '2', '2024-03-19 05:17:09', '2024-03-19 05:17:09'),
(412, '2024-03-21', 'IC-00000308', 1, 1, 800, 0, 0, 0, 800, 0, 'cash', 'ffgfgfg', 20, 'w', '2', '2024-03-21 08:16:58', '2024-03-21 08:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `sales_due_returns`
--

CREATE TABLE `sales_due_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `current_due` double NOT NULL,
  `balance` double NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `paid_date` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_due_returns`
--

INSERT INTO `sales_due_returns` (`id`, `customer_id`, `paid_amount`, `current_due`, `balance`, `payment_method`, `payment_note`, `paid_date`, `created_at`, `updated_at`) VALUES
(1, 8, 19000, 19000, 0, 'cash', NULL, '2020-03-03', '2020-03-04 12:05:07', '2020-03-04 12:05:07'),
(2, 4, 9700, 9700, 0, 'cash', NULL, '2020-03-04', '2020-03-04 14:00:00', '2020-03-04 14:00:00'),
(3, 1, 10800, 10800, 0, 'cash', NULL, '2020-03-04', '2020-03-04 14:15:10', '2020-03-04 14:15:10'),
(4, 5, 237500, 237500, 0, 'cash', NULL, '2020-03-04', '2020-03-04 17:43:00', '2020-03-04 17:43:00'),
(5, 7, 48000, 48000, 0, 'cash', NULL, '2020-03-04', '2020-03-04 17:43:38', '2020-03-04 17:43:38'),
(7, 2, 91, 91, 0, 'cash', NULL, '2020-03-05', '2020-03-05 14:15:39', '2020-03-05 14:15:39'),
(8, 10, 48000, 48000, 0, 'cash', NULL, '2020-03-05', '2020-03-06 10:52:40', '2020-03-06 10:52:40'),
(9, 9, 48000, 48000, 0, 'cash', NULL, '2020-03-05', '2020-03-06 10:53:18', '2020-03-06 10:53:18'),
(10, 12, 460000, 465000, 5000, 'cash', NULL, '2020-03-03', '2020-03-06 11:10:28', '2020-03-06 11:10:28'),
(11, 12, 3000, 5000, 2000, 'cash', NULL, '2020-03-05', '2020-03-06 11:10:53', '2020-03-06 11:10:53'),
(12, 12, 2000, 2000, 0, 'cash', 'EiD Bonus', '2020-03-05', '2020-03-06 11:12:09', '2020-03-06 11:12:09'),
(13, 13, 9000, 165500, 156500, 'cash', NULL, '2020-03-05', '2020-03-08 16:35:33', '2020-03-08 16:35:33'),
(14, 14, 1200, 49200, 48000, 'cash', NULL, '2020-03-08', '2020-03-08 16:44:35', '2020-03-08 16:44:35'),
(15, 14, 48000, 48000, 0, 'cash', 'cheq uttra bank 15/3/20', '2020-03-15', '2020-03-09 16:33:43', '2020-03-09 16:33:43'),
(16, 27, 26700, 26700, 0, 'cash', NULL, '2020-03-04', '2020-03-09 18:08:29', '2020-03-09 18:08:29'),
(17, 21, 24000, 24000, 0, 'cash', NULL, '2020-03-09', '2020-03-09 20:17:24', '2020-03-09 20:17:24'),
(18, 11, 14400, 14400, 0, 'cash', NULL, '2020-03-09', '2020-03-10 18:29:18', '2020-03-10 18:29:18'),
(19, 31, 24000, 24000, 0, 'cash', NULL, '2020-03-24', '2020-03-11 17:14:34', '2020-03-11 17:14:34'),
(20, 29, 173000, 11383371, 11210371, 'cash', 'adjustment payment', '2020-03-12', '2020-03-12 20:02:35', '2020-03-12 20:02:35'),
(21, 40, 50000, 441500, 391500, 'cash', 'Exim bank 2004', '2020-03-12', '2020-03-12 20:16:53', '2020-03-12 20:16:53'),
(22, 37, 30000, 57600, 27600, 'cash', NULL, '2020-03-14', '2020-03-14 09:34:50', '2020-03-14 09:34:50'),
(23, 34, 22850, 22850, 0, 'cash', 'chq paid for mobil', '2020-03-17', '2020-03-14 16:59:08', '2020-03-14 16:59:08'),
(24, 40, 50000, 391500, 341500, 'cash', NULL, '2020-03-14', '2020-03-14 17:16:02', '2020-03-14 17:16:02'),
(25, 32, 38700, 163080, 124380, 'cash', 'chq paid', '2020-03-20', '2020-03-15 19:06:38', '2020-03-15 19:06:38'),
(26, 32, 50000, 124380, 74380, 'cash', 'chq paid', '2020-03-30', '2020-03-15 19:07:05', '2020-03-15 19:07:05'),
(27, 6, 50000, 240000, 190000, 'cash', NULL, '2020-03-16', '2020-03-16 12:45:28', '2020-03-16 12:45:28'),
(28, 2, 20000, 44400, 24400, 'cash', 'standard bank', '2020-03-16', '2020-03-16 14:11:44', '2020-03-16 14:11:44'),
(29, 38, 24000, 24000, 0, 'cash', 'chq paid (Ripon)', '2020-03-25', '2020-03-16 14:14:54', '2020-03-16 14:14:54'),
(30, 44, 3560, 10730, 7170, 'cash', 'mobil', '2020-03-17', '2020-03-17 10:36:54', '2020-03-17 10:36:54'),
(31, 36, 48000, 48000, 0, 'cash', NULL, '2020-03-20', '2020-03-17 11:30:42', '2020-03-17 11:30:42'),
(32, 1, 2700, 752600, 749900, 'cash', 'shahid motor paiid by goods', '2020-03-18', '2020-03-18 15:17:51', '2020-03-18 15:17:51'),
(33, 50, 106700, 106700, 0, 'cash', 'chq paid', '2020-04-06', '2020-03-18 18:30:25', '2020-03-18 18:30:25'),
(34, 47, 19200, 19200, 0, 'cash', NULL, '2020-03-16', '2020-03-18 18:39:26', '2020-03-18 18:39:26'),
(35, 49, 20000, 46080, 26080, 'cash', 'standard bank', '2020-03-18', '2020-03-18 18:41:44', '2020-03-18 18:41:44'),
(36, 26, 50000, 73500, 23500, 'cash', 'chq paid', '2020-03-25', '2020-03-19 18:28:09', '2020-03-19 18:28:09'),
(37, 62, 25000, 323990, 298990, 'cash', 'chq', '2020-02-17', '2020-03-21 12:26:35', '2020-03-21 12:26:35'),
(38, 62, 25000, 298990, 273990, 'cash', 'chq', '2020-03-01', '2020-03-21 12:27:02', '2020-03-21 12:27:02'),
(39, 62, 25000, 273990, 248990, 'cash', 'chq', '2020-03-16', '2020-03-21 12:27:34', '2020-03-21 12:27:34'),
(40, 52, 94410, 140500, 46090, 'cash', NULL, '2020-03-08', '2020-03-21 13:04:31', '2020-03-21 13:04:31'),
(41, 70, 30000, 111365, 81365, 'cash', NULL, '2020-03-10', '2020-03-21 15:09:44', '2020-03-21 15:09:44'),
(42, 74, 30000, 72640, 42640, 'cash', NULL, '2020-03-05', '2020-03-21 15:22:21', '2020-03-21 15:22:21'),
(43, 79, 5000, 27310, 22310, 'cash', NULL, '2020-03-25', '2020-03-21 15:39:13', '2020-03-21 15:39:13'),
(44, 87, 15000, 32510, 17510, 'cash', NULL, '2020-03-08', '2020-03-21 15:56:09', '2020-03-21 15:56:09'),
(45, 134, 11000, 12050, 1050, 'cash', NULL, '2020-01-21', '2020-03-21 17:46:07', '2020-03-21 17:46:07'),
(46, 144, 100000, 89110, -10890, 'cash', NULL, '2020-02-28', '2020-03-21 18:05:11', '2020-03-21 18:05:11'),
(47, 53, 5000, 7600, 2600, 'cash', NULL, '2020-03-19', '2020-03-21 18:07:55', '2020-03-21 18:07:55'),
(48, 13, 50000, 156500, 106500, 'cash', 'chq', '2020-03-22', '2020-03-21 19:48:36', '2020-03-21 19:48:36'),
(49, 23, 5000, 34820, 29820, 'cash', 'adjustment', '2020-03-22', '2020-03-22 18:35:52', '2020-03-22 18:35:52'),
(50, 145, 7300, 14200, 6900, 'cash', 'CHQ', '2020-03-25', '2020-03-22 19:15:10', '2020-03-22 19:15:10'),
(51, 145, 6900, 6900, 0, 'cash', 'CHQ', '2020-04-05', '2020-03-22 19:15:39', '2020-03-22 19:15:39'),
(52, 23, 29800, 29820, 20, 'cash', 'chq 23/3/20', '2020-03-23', '2020-03-23 12:02:06', '2020-03-23 12:02:06'),
(53, 6, 40000, 430000, 390000, 'cash', NULL, '2020-03-23', '2020-03-23 15:43:50', '2020-03-23 15:43:50'),
(54, 44, 7170, 7170, 0, 'cash', NULL, '2020-09-03', '2020-09-07 10:37:59', '2020-09-07 10:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_date` varchar(255) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `unit_cost` double NOT NULL,
  `unit_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `product_revenue` double NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `sales_date`, `sale_id`, `pro_id`, `unit_cost`, `unit_price`, `qty`, `subtotal`, `product_revenue`, `store_id`, `created_at`, `updated_at`) VALUES
(1, '2020-02-25', 1, 1, 390, 420, 1, 420, 30, 1, '2020-02-25 13:35:44', '2020-02-25 13:35:44'),
(2, '2020-03-03', 2, 1, 4600, 4900, 1, 4900, 300, 1, '2020-03-03 20:11:16', '2020-03-03 20:11:16'),
(3, '2020-03-03', 2, 4, 3800, 4100, 1, 4100, 300, 1, '2020-03-03 20:11:16', '2020-03-03 20:11:16'),
(4, '2020-03-03', 2, 9, 730, 770, 5, 3850, 200, 1, '2020-03-03 20:11:16', '2020-03-03 20:11:16'),
(5, '2020-03-03', 3, 3, 4600, 4900, 2, 9800, 600, 1, '2020-03-03 20:36:16', '2020-03-03 20:36:16'),
(6, '2020-03-03', 4, 1, 4600, 4800, 50, 240000, 10000, 1, '2020-03-03 20:45:14', '2020-03-03 20:45:14'),
(7, '2020-03-04', 5, 3, 4600, 4900, 10, 49000, 3000, 1, '2020-03-04 09:49:44', '2020-03-04 09:49:44'),
(8, '2020-03-04', 6, 1, 4600, 4900, 50, 245000, 15000, 1, '2020-03-04 10:15:02', '2020-03-04 10:15:02'),
(9, '2020-03-04', 7, 1, 4600, 4900, 4, 19600, 1200, 1, '2020-03-04 11:52:46', '2020-03-04 11:52:46'),
(11, '2020-03-04', 9, 3, 4600, 4900, 10, 49000, 3000, 1, '2020-03-04 17:59:35', '2020-03-04 17:59:35'),
(12, '2020-03-05', 10, 3, 380, 420, 120, 50400, 4800, 1, '2020-03-05 15:42:14', '2020-03-05 15:42:14'),
(13, '2020-03-05', 11, 3, 380, 420, 36, 15120, 1440, 1, '2020-03-05 18:13:57', '2020-03-05 18:13:57'),
(14, '2020-03-03', 12, 3, 380, 420, 1200, 504000, 48000, 1, '2020-03-06 11:09:37', '2020-03-06 11:09:37'),
(15, '2020-03-03', 13, 3, 380, 420, 600, 252000, 24000, 1, '2020-03-06 11:36:12', '2020-03-06 11:36:12'),
(16, '2020-03-03', 14, 3, 380, 420, 120, 50400, 4800, 1, '2020-03-06 11:43:36', '2020-03-06 11:43:36'),
(17, '2020-03-05', 15, 3, 380, 420, 6, 2520, 240, 1, '2020-03-08 16:31:07', '2020-03-08 16:31:07'),
(19, '2020-03-03', 17, 3, 380, 420, 24, 10080, 960, 1, '2020-03-08 17:00:25', '2020-03-08 17:00:25'),
(20, '2020-03-03', 17, 4, 310, 350, 12, 4200, 480, 1, '2020-03-08 17:00:25', '2020-03-08 17:00:25'),
(21, '2020-03-03', 18, 3, 380, 420, 1200, 504000, 48000, 1, '2020-03-08 17:04:27', '2020-03-08 17:04:27'),
(22, '2020-03-03', 18, 4, 310, 350, 600, 210000, 24000, 1, '2020-03-08 17:04:27', '2020-03-08 17:04:27'),
(23, '2020-03-03', 19, 3, 380, 420, 1200, 504000, 48000, 1, '2020-03-08 17:06:12', '2020-03-08 17:06:12'),
(24, '2020-03-03', 19, 4, 310, 350, 600, 210000, 24000, 1, '2020-03-08 17:06:12', '2020-03-08 17:06:12'),
(25, '2020-03-08', 20, 4, 310, 350, 60, 21000, 2400, 1, '2020-03-08 19:00:14', '2020-03-08 19:00:14'),
(26, '2020-03-04', 21, 3, 380, 400, 600, 240000, 12000, 1, '2020-03-08 19:30:12', '2020-03-08 19:30:12'),
(29, '2020-03-08', 23, 3, 380, 400, 180, 72000, 3600, 1, '2020-03-08 20:05:39', '2020-03-08 20:05:39'),
(30, '2020-03-08', 23, 4, 310, 350, 60, 21000, 2400, 1, '2020-03-08 20:05:39', '2020-03-08 20:05:39'),
(31, '2020-03-09', 24, 3, 380, 400, 60, 24000, 1200, 1, '2020-03-09 13:21:21', '2020-03-09 13:21:21'),
(32, '2020-03-03', 25, 3, 380, 400, 60, 24000, 1200, 1, '2020-03-09 17:36:46', '2020-03-09 17:36:46'),
(33, '2020-03-03', 26, 3, 380, 420, 12, 5040, 480, 1, '2020-03-09 17:39:51', '2020-03-09 17:39:51'),
(34, '2020-03-03', 27, 3, 380, 400, 12, 4800, 240, 1, '2020-03-09 17:45:40', '2020-03-09 17:45:40'),
(35, '2020-03-03', 27, 4, 310, 350, 12, 4200, 480, 1, '2020-03-09 17:45:40', '2020-03-09 17:45:40'),
(36, '2020-03-03', 28, 3, 380, 400, 120, 48000, 2400, 1, '2020-03-09 17:57:58', '2020-03-09 17:57:58'),
(37, '2020-03-03', 29, 3, 380, 420, 180, 75600, 7200, 1, '2020-03-09 18:04:45', '2020-03-09 18:04:45'),
(38, '2020-03-04', 30, 3, 380, 400, 60, 24000, 1200, 1, '2020-03-09 18:07:52', '2020-03-09 18:07:52'),
(39, '2020-03-04', 30, 6, 190, 230, 12, 2760, 480, 1, '2020-03-09 18:07:52', '2020-03-09 18:07:52'),
(40, '2020-03-04', 31, 3, 380, 400, 24, 9600, 480, 1, '2020-03-09 18:16:15', '2020-03-09 18:16:15'),
(41, '2020-03-04', 31, 4, 310, 325, 48, 15600, 720, 1, '2020-03-09 18:16:15', '2020-03-09 18:16:15'),
(42, '2020-03-08', 32, 3, 380, 420, 240, 100800, 9600, 1, '2020-03-09 20:53:27', '2020-03-09 20:53:27'),
(43, '2020-03-08', 32, 4, 310, 350, 240, 84000, 9600, 1, '2020-03-09 20:53:27', '2020-03-09 20:53:27'),
(44, '2020-03-03', 33, 3, 380, 400, 360, 144000, 7200, 1, '2020-03-09 21:05:00', '2020-03-09 21:05:00'),
(45, '2020-03-03', 33, 4, 310, 350, 240, 84000, 9600, 1, '2020-03-09 21:05:00', '2020-03-09 21:05:00'),
(46, '2020-03-03', 33, 23, 180, 210, 120, 25200, 3600, 1, '2020-03-09 21:05:00', '2020-03-09 21:05:00'),
(47, '2020-03-03', 33, 5, 250, 290, 60, 17400, 2400, 1, '2020-03-09 21:05:00', '2020-03-09 21:05:00'),
(48, '2020-03-10', 34, 3, 380, 400, 60, 24000, 1200, 1, '2020-03-10 10:07:38', '2020-03-10 10:07:38'),
(49, '2020-03-10', 35, 28, 1340, 1350, 4, 5400, 40, 1, '2020-03-10 14:07:08', '2020-03-10 14:07:08'),
(50, '2020-03-10', 35, 30, 2100, 2110, 4, 8440, 40, 1, '2020-03-10 14:07:08', '2020-03-10 14:07:08'),
(51, '2020-03-10', 35, 25, 1280, 1300, 1, 1300, 20, 1, '2020-03-10 14:07:08', '2020-03-10 14:07:08'),
(52, '2020-03-10', 35, 29, 1050, 1070, 1, 1070, 20, 1, '2020-03-10 14:07:08', '2020-03-10 14:07:08'),
(53, '2020-03-10', 35, 19, 1242, 1380, 1, 1380, 138, 1, '2020-03-10 14:07:08', '2020-03-10 14:07:08'),
(54, '2020-03-10', 36, 3, 380, 400, 36, 14400, 720, 1, '2020-03-10 16:27:53', '2020-03-10 16:27:53'),
(55, '2020-03-10', 36, 4, 310, 340, 36, 12240, 1080, 1, '2020-03-10 16:27:53', '2020-03-10 16:27:53'),
(56, '2020-03-10', 36, 6, 190, 230, 24, 5520, 960, 1, '2020-03-10 16:27:53', '2020-03-10 16:27:53'),
(57, '2020-03-10', 36, 5, 250, 300, 48, 14400, 2400, 1, '2020-03-10 16:27:53', '2020-03-10 16:27:53'),
(58, '2020-03-10', 37, 4, 310, 325, 240, 78000, 3600, 1, '2020-03-10 16:29:52', '2020-03-10 16:29:52'),
(59, '2020-03-10', 38, 28, 1340, 1350, 4, 5400, 40, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(60, '2020-03-10', 38, 26, 1230, 1250, 4, 5000, 80, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(61, '2020-03-10', 38, 34, 324, 340, 5, 1700, 80, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(62, '2020-03-10', 38, 35, 324, 340, 5, 1700, 80, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(63, '2020-03-10', 38, 36, 324, 340, 5, 1700, 80, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(64, '2020-03-10', 38, 33, 440, 450, 5, 2250, 50, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(65, '2020-03-10', 38, 29, 1050, 1070, 4, 4280, 80, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(66, '2020-03-10', 38, 37, 800, 820, 1, 820, 20, 1, '2020-03-10 20:10:48', '2020-03-10 20:10:48'),
(67, '2020-03-03', 39, 3, 380, 400, 120, 48000, 2400, 1, '2020-03-12 19:34:47', '2020-03-12 19:34:47'),
(68, '2020-03-12', 40, 3, 380, 400, 120, 48000, 2400, 1, '2020-03-12 19:35:31', '2020-03-12 19:35:31'),
(69, '2020-03-04', 41, 3, 380, 400, 144, 57600, 2880, 1, '2020-03-12 19:38:25', '2020-03-12 19:38:25'),
(70, '2020-03-12', 42, 3, 380, 400, 60, 24000, 1200, 1, '2020-03-12 19:40:44', '2020-03-12 19:40:44'),
(71, '2020-03-12', 43, 3, 380, 400, 72, 28800, 1440, 1, '2020-03-12 19:50:28', '2020-03-12 19:50:28'),
(72, '2020-03-12', 44, 80, 100, 100, 112104, 11210400, 0, 1, '2020-03-12 20:01:20', '2020-03-12 20:01:20'),
(73, '2020-03-02', 45, 6, 190, 210, 120, 25200, 2400, 1, '2020-03-14 16:53:10', '2020-03-14 16:53:10'),
(74, '2020-03-14', 46, 19, 1242, 1450, 1, 1450, 208, 1, '2020-03-14 18:23:20', '2020-03-14 18:23:20'),
(75, '2020-03-14', 46, 37, 800, 900, 1, 900, 100, 1, '2020-03-14 18:23:20', '2020-03-14 18:23:20'),
(76, '2020-03-14', 47, 28, 1340, 1350, 4, 5400, 40, 1, '2020-03-14 20:24:07', '2020-03-14 20:24:07'),
(77, '2020-03-15', 48, 19, 1242, 1400, 1, 1400, 158, 1, '2020-03-15 18:19:22', '2020-03-15 18:19:22'),
(78, '2020-03-15', 48, 20, 1980, 2200, 1, 2200, 220, 1, '2020-03-15 18:19:22', '2020-03-15 18:19:22'),
(79, '2020-03-10', 49, 73, 40, 50, 40, 2000, 400, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(80, '2020-03-10', 49, 72, 40, 50, 40, 2000, 400, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(81, '2020-03-10', 49, 60, 1140, 1180, 2, 2360, 80, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(82, '2020-03-10', 49, 58, 1140, 1180, 2, 2360, 80, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(83, '2020-03-10', 49, 95, 3700, 3800, 1, 3800, 100, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(84, '2020-03-10', 49, 94, 3000, 3020, 1, 3020, 20, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(85, '2020-03-10', 49, 98, 2100, 2150, 1, 2150, 50, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(86, '2020-03-10', 49, 99, 1285, 1350, 1, 1350, 65, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(87, '2020-03-10', 49, 82, 1200, 1250, 1, 1250, 50, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(88, '2020-03-10', 49, 97, 200, 220, 10, 2200, 200, 1, '2020-03-15 19:05:21', '2020-03-15 19:05:21'),
(89, '2020-03-15', 50, 104, 2720, 2850, 2, 5700, 260, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(90, '2020-03-15', 50, 106, 1530, 1630, 2, 3260, 200, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(91, '2020-03-15', 50, 105, 2210, 2300, 2, 4600, 180, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(92, '2020-03-15', 50, 108, 210, 230, 5, 1150, 100, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(93, '2020-03-15', 50, 109, 252, 265, 5, 1325, 65, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(94, '2020-03-15', 50, 95, 3700, 3800, 2, 7600, 200, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(95, '2020-03-15', 50, 112, 1955, 2050, 2, 4100, 190, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(96, '2020-03-15', 50, 102, 3515, 3600, 3, 10800, 255, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(97, '2020-03-15', 50, 103, 3325, 3450, 2, 6900, 250, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(98, '2020-03-15', 50, 110, 820, 850, 5, 4250, 150, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(99, '2020-03-15', 50, 111, 810, 820, 10, 8200, 100, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(100, '2020-03-15', 50, 100, 2600, 2700, 5, 13500, 500, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(101, '2020-03-15', 50, 101, 2500, 2600, 5, 13000, 500, 1, '2020-03-15 20:56:46', '2020-03-15 20:56:46'),
(102, '2020-03-15', 51, 107, 2710, 2800, 2, 5600, 180, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(103, '2020-03-15', 51, 113, 3700, 3250, 2, 6500, -900, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(104, '2020-03-15', 51, 93, 3000, 3050, 3, 9150, 150, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(105, '2020-03-15', 51, 96, 2100, 2175, 5, 10875, 375, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(106, '2020-03-15', 51, 94, 3000, 3050, 5, 15250, 250, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(107, '2020-03-15', 51, 98, 2100, 2150, 5, 10750, 250, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(108, '2020-03-15', 51, 75, 1300, 1500, 5, 7500, 1000, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(109, '2020-03-15', 51, 114, 1000, 1200, 4, 4800, 800, 1, '2020-03-16 11:15:00', '2020-03-16 11:15:00'),
(110, '2020-03-16', 52, 19, 1242, 1380, 4, 5520, 552, 1, '2020-03-16 13:07:56', '2020-03-16 13:07:56'),
(111, '2020-03-16', 52, 20, 1980, 2200, 1, 2200, 220, 1, '2020-03-16 13:07:56', '2020-03-16 13:07:56'),
(112, '2020-03-16', 52, 22, 1575, 1750, 2, 3500, 350, 1, '2020-03-16 13:07:56', '2020-03-16 13:07:56'),
(113, '2020-03-16', 53, 19, 1242, 1350, 1, 1350, 108, 1, '2020-03-16 13:12:38', '2020-03-16 13:12:38'),
(114, '2020-03-16', 53, 21, 2430, 2750, 1, 2750, 320, 1, '2020-03-16 13:12:38', '2020-03-16 13:12:38'),
(115, '2020-03-16', 53, 22, 1575, 1700, 1, 1700, 125, 1, '2020-03-16 13:12:38', '2020-03-16 13:12:38'),
(116, '2020-03-11', 54, 33, 440, 440, 2, 880, 0, 1, '2020-03-16 14:03:38', '2020-03-16 14:03:38'),
(117, '2020-03-11', 54, 28, 1340, 1340, 2, 2680, 0, 1, '2020-03-16 14:03:38', '2020-03-16 14:03:38'),
(118, '2020-03-16', 55, 19, 1242, 1380, 1, 1380, 138, 1, '2020-03-16 14:04:37', '2020-03-16 14:04:37'),
(119, '2020-03-16', 55, 20, 1980, 2200, 1, 2200, 220, 1, '2020-03-16 14:04:37', '2020-03-16 14:04:37'),
(120, '2020-03-14', 56, 37, 800, 900, 1, 900, 100, 1, '2020-03-16 14:05:50', '2020-03-16 14:05:50'),
(121, '2020-03-16', 57, 19, 1242, 1400, 1, 1400, 158, 1, '2020-03-16 14:10:00', '2020-03-16 14:10:00'),
(122, '2020-03-16', 58, 116, 740, 760, 6, 4560, 120, 1, '2020-03-16 17:55:01', '2020-03-16 17:55:01'),
(123, '2020-03-16', 58, 115, 950, 970, 5, 4850, 100, 1, '2020-03-16 17:55:01', '2020-03-16 17:55:01'),
(124, '2020-03-16', 59, 3, 380, 400, 48, 19200, 960, 1, '2020-03-16 18:09:54', '2020-03-16 18:09:54'),
(125, '2020-03-15', 60, 8, 800, 900, 3, 2700, 300, 1, '2020-03-16 18:21:39', '2020-03-16 18:21:39'),
(126, '2020-03-15', 60, 3, 380, 409, 12, 4908, 348, 1, '2020-03-16 18:21:39', '2020-03-16 18:21:39'),
(127, '2020-03-15', 60, 4, 310, 342, 24, 8208, 768, 1, '2020-03-16 18:21:39', '2020-03-16 18:21:39'),
(128, '2020-03-15', 60, 5, 250, 300, 12, 3600, 600, 1, '2020-03-16 18:21:39', '2020-03-16 18:21:39'),
(129, '2020-03-15', 60, 6, 190, 230, 12, 2760, 480, 1, '2020-03-16 18:21:39', '2020-03-16 18:21:39'),
(130, '2020-03-15', 60, 7, 270, 300, 12, 3600, 360, 1, '2020-03-16 18:21:39', '2020-03-16 18:21:39'),
(131, '2020-03-16', 61, 125, 1870, 1950, 10, 19500, 800, 1, '2020-03-16 18:46:06', '2020-03-16 18:46:06'),
(132, '2020-03-03', 62, 24, 180, 220, 12, 2640, 480, 1, '2020-03-17 10:28:56', '2020-03-17 10:28:56'),
(133, '2020-03-03', 62, 6, 190, 220, 12, 2640, 360, 1, '2020-03-17 10:28:56', '2020-03-17 10:28:56'),
(134, '2020-03-03', 62, 7, 270, 300, 12, 3600, 360, 1, '2020-03-17 10:28:56', '2020-03-17 10:28:56'),
(135, '2020-03-03', 62, 3, 380, 400, 36, 14400, 720, 1, '2020-03-17 10:28:56', '2020-03-17 10:28:56'),
(136, '2020-03-03', 62, 4, 310, 350, 36, 12600, 1440, 1, '2020-03-17 10:28:56', '2020-03-17 10:28:56'),
(137, '2020-03-03', 62, 5, 250, 300, 36, 10800, 1800, 1, '2020-03-17 10:28:56', '2020-03-17 10:28:56'),
(138, '2020-03-03', 63, 3, 380, 400, 240, 96000, 4800, 1, '2020-03-17 10:40:07', '2020-03-17 10:40:07'),
(139, '2020-03-03', 63, 5, 250, 300, 6, 1800, 300, 1, '2020-03-17 10:40:07', '2020-03-17 10:40:07'),
(140, '2020-03-03', 63, 4, 310, 350, 24, 8400, 960, 1, '2020-03-17 10:40:07', '2020-03-17 10:40:07'),
(141, '2020-03-04', 64, 3, 380, 400, 60, 24000, 1200, 1, '2020-03-17 10:43:24', '2020-03-17 10:43:24'),
(142, '2020-03-05', 65, 126, 140, 180, 5, 900, 200, 1, '2020-03-17 10:48:51', '2020-03-17 10:48:51'),
(143, '2020-03-08', 66, 4, 310, 350, 240, 84000, 9600, 1, '2020-03-17 10:54:14', '2020-03-17 10:54:14'),
(144, '2020-03-08', 67, 4, 310, 350, 120, 42000, 4800, 1, '2020-03-17 11:03:58', '2020-03-17 11:03:58'),
(145, '2020-03-17', 68, 19, 1242, 1400, 1, 1400, 158, 1, '2020-03-17 12:26:34', '2020-03-17 12:26:34'),
(146, '2020-03-14', 69, 9, 730, 760, 10, 7600, 300, 1, '2020-03-17 12:44:57', '2020-03-17 12:44:57'),
(147, '2020-03-18', 70, 28, 1340, 1350, 2, 2700, 20, 1, '2020-03-18 15:16:54', '2020-03-18 15:16:54'),
(148, '2020-03-19', 71, 48, 930, 980, 3, 2940, 150, 1, '2020-03-19 11:12:40', '2020-03-19 11:12:40'),
(149, '2020-03-19', 71, 161, 31, 45, 20, 900, 280, 1, '2020-03-19 11:12:40', '2020-03-19 11:12:40'),
(150, '2020-03-19', 71, 162, 31, 45, 40, 1800, 560, 1, '2020-03-19 11:12:40', '2020-03-19 11:12:40'),
(151, '2020-03-14', 72, 31, 155, 170, 20, 3400, 300, 1, '2020-03-19 11:26:51', '2020-03-19 11:26:51'),
(152, '2020-03-14', 72, 12, 500, 530, 10, 5300, 300, 1, '2020-03-19 11:26:51', '2020-03-19 11:26:51'),
(153, '2020-03-14', 72, 10, 620, 650, 5, 3250, 150, 1, '2020-03-19 11:26:51', '2020-03-19 11:26:51'),
(154, '2020-03-14', 72, 9, 730, 770, 5, 3850, 200, 1, '2020-03-19 11:26:51', '2020-03-19 11:26:51'),
(155, '2020-03-14', 72, 66, 141, 150, 10, 1500, 90, 1, '2020-03-19 11:26:51', '2020-03-19 11:26:51'),
(156, '2020-03-14', 72, 167, 38, 45, 10, 450, 70, 1, '2020-03-19 11:26:51', '2020-03-19 11:26:51'),
(157, '2020-03-19', 73, 126, 140, 180, 6, 1080, 240, 1, '2020-03-19 16:44:23', '2020-03-19 16:44:23'),
(158, '2020-03-19', 74, 165, 100, 120, 10, 1200, 200, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(159, '2020-03-19', 74, 128, 280, 300, 3, 900, 60, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(160, '2020-03-19', 74, 168, 250, 280, 3, 840, 90, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(161, '2020-03-19', 74, 138, 220, 240, 3, 720, 60, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(162, '2020-03-19', 74, 140, 150, 170, 3, 510, 60, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(163, '2020-03-19', 74, 73, 40, 50, 10, 500, 100, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(164, '2020-03-19', 74, 10, 620, 630, 5, 3150, 50, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(165, '2020-03-19', 74, 12, 500, 530, 10, 5300, 300, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(166, '2020-03-19', 74, 3, 380, 400, 24, 9600, 480, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(167, '2020-03-19', 74, 169, 450, 550, 2, 1100, 200, 1, '2020-03-19 18:16:23', '2020-03-19 18:16:23'),
(168, '2020-03-03', 75, 3, 380, 400, 120, 48000, 2400, 1, '2020-03-19 19:48:28', '2020-03-19 19:48:28'),
(169, '2020-03-18', 77, 3, 380, 400, 120, 48000, 2400, 1, '2020-03-19 19:50:29', '2020-03-19 19:50:29'),
(170, '2020-03-21', 78, 3, 380, 400, 48, 19200, 960, 1, '2020-03-21 09:34:43', '2020-03-21 09:34:43'),
(171, '2020-03-21', 79, 171, 950, 1100, 6, 6600, 900, 1, '2020-03-21 10:10:07', '2020-03-21 10:10:07'),
(172, '2020-03-21', 79, 81, 1000, 1030, 4, 4120, 120, 1, '2020-03-21 10:10:07', '2020-03-21 10:10:07'),
(173, '2020-03-21', 79, 83, 1045, 1080, 4, 4320, 140, 1, '2020-03-21 10:10:07', '2020-03-21 10:10:07'),
(174, '2020-03-21', 81, 39, 705, 740, 10, 7400, 350, 1, '2020-03-21 10:40:56', '2020-03-21 10:40:56'),
(175, '2020-03-21', 81, 48, 930, 980, 8, 7840, 400, 1, '2020-03-21 10:40:56', '2020-03-21 10:40:56'),
(176, '2020-03-21', 81, 42, 646, 680, 10, 6800, 340, 1, '2020-03-21 10:40:56', '2020-03-21 10:40:56'),
(177, '2020-03-21', 81, 40, 760, 800, 10, 8000, 400, 1, '2020-03-21 10:40:56', '2020-03-21 10:40:56'),
(178, '2020-03-21', 81, 153, 1500, 1550, 2, 3100, 100, 1, '2020-03-21 10:40:56', '2020-03-21 10:40:56'),
(179, '2020-03-21', 82, 165, 100, 120, 10, 1200, 200, 1, '2020-03-21 10:53:56', '2020-03-21 10:53:56'),
(180, '2020-03-21', 82, 74, 1300, 3500, 1, 3500, 2200, 1, '2020-03-21 10:53:56', '2020-03-21 10:53:56'),
(181, '2020-03-21', 82, 164, 150, 200, 10, 2000, 500, 1, '2020-03-21 10:53:56', '2020-03-21 10:53:56'),
(182, '2020-03-21', 82, 63, 450, 550, 3, 1650, 300, 1, '2020-03-21 10:53:56', '2020-03-21 10:53:56'),
(183, '2020-03-21', 83, 3, 380, 400, 600, 240000, 12000, 1, '2020-03-21 12:02:17', '2020-03-21 12:02:17'),
(184, '2020-03-21', 84, 3, 380, 400, 120, 48000, 2400, 1, '2020-03-21 12:24:42', '2020-03-21 12:24:42'),
(185, '2020-03-21', 84, 5, 250, 300, 12, 3600, 600, 1, '2020-03-21 12:24:42', '2020-03-21 12:24:42'),
(186, '2020-03-21', 85, 3, 380, 420, 3, 1260, 120, 1, '2020-03-21 19:04:06', '2020-03-21 19:04:06'),
(187, '2020-03-21', 85, 4, 310, 340, 3, 1020, 90, 1, '2020-03-21 19:04:06', '2020-03-21 19:04:06'),
(188, '2020-03-21', 85, 87, 2200, 2600, 1, 2600, 400, 1, '2020-03-21 19:04:06', '2020-03-21 19:04:06'),
(189, '2020-03-21', 85, 76, 1200, 1250, 2, 2500, 100, 1, '2020-03-21 19:04:06', '2020-03-21 19:04:06'),
(190, '2020-03-21', 85, 39, 705, 740, 3, 2220, 105, 1, '2020-03-21 19:04:06', '2020-03-21 19:04:06'),
(191, '2020-03-21', 85, 41, 547, 580, 3, 1740, 99, 1, '2020-03-21 19:04:06', '2020-03-21 19:04:06'),
(192, '2020-03-21', 86, 63, 450, 600, 50, 30000, 7500, 1, '2020-03-21 19:14:27', '2020-03-21 19:14:27'),
(193, '2020-03-21', 86, 73, 40, 55, 120, 6600, 1800, 1, '2020-03-21 19:14:27', '2020-03-21 19:14:27'),
(194, '2020-03-21', 86, 54, 2050, 2150, 4, 8600, 400, 1, '2020-03-21 19:14:27', '2020-03-21 19:14:27'),
(195, '2020-03-21', 86, 55, 1490, 1550, 4, 6200, 240, 1, '2020-03-21 19:14:27', '2020-03-21 19:14:27'),
(196, '2020-03-21', 86, 177, 1450, 1500, 4, 6000, 200, 1, '2020-03-21 19:14:27', '2020-03-21 19:14:27'),
(197, '2020-03-10', 87, 17, 340, 380, 5, 1900, 200, 1, '2020-03-22 11:18:01', '2020-03-22 11:18:01'),
(198, '2020-03-10', 87, 18, 340, 380, 5, 1900, 200, 1, '2020-03-22 11:18:01', '2020-03-22 11:18:01'),
(199, '2020-03-10', 87, 12, 500, 530, 5, 2650, 150, 1, '2020-03-22 11:18:01', '2020-03-22 11:18:01'),
(200, '2020-03-10', 87, 10, 620, 640, 5, 3200, 100, 1, '2020-03-22 11:18:01', '2020-03-22 11:18:01'),
(201, '2020-03-10', 87, 194, 150, 170, 10, 1700, 200, 1, '2020-03-22 11:18:01', '2020-03-22 11:18:01'),
(202, '2020-03-10', 87, 193, 150, 170, 10, 1700, 200, 1, '2020-03-22 11:18:01', '2020-03-22 11:18:01'),
(203, '2020-03-22', 89, 3, 380, 420, 4, 1680, 160, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(204, '2020-03-22', 89, 4, 310, 340, 6, 2040, 180, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(205, '2020-03-22', 89, 12, 500, 530, 2, 1060, 60, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(206, '2020-03-22', 89, 10, 620, 640, 2, 1280, 40, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(207, '2020-03-22', 89, 11, 730, 770, 2, 1540, 80, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(208, '2020-03-22', 89, 209, 350, 380, 4, 1520, 120, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(209, '2020-03-22', 89, 210, 400, 430, 2, 860, 60, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(210, '2020-03-22', 89, 215, 95, 110, 10, 1100, 150, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(211, '2020-03-22', 89, 6, 190, 230, 4, 920, 160, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(212, '2020-03-22', 89, 7, 270, 320, 2, 640, 100, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(213, '2020-03-22', 89, 162, 31, 45, 5, 225, 70, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(214, '2020-03-22', 89, 161, 31, 45, 5, 225, 70, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(215, '2020-03-22', 89, 72, 40, 55, 5, 275, 75, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(216, '2020-03-22', 89, 73, 40, 55, 5, 275, 75, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(217, '2020-03-22', 89, 216, 220, 140, 4, 560, -320, 1, '2020-03-22 17:17:26', '2020-03-22 17:17:26'),
(218, '2020-03-23', 90, 218, 130, 160, 2500, 400000, 75000, 1, '2020-03-23 11:08:52', '2020-03-23 11:08:52'),
(219, '2020-08-19', 91, 3, 380, 410, 36, 14760, 1080, 1, '2020-09-04 05:13:52', '2020-09-04 05:13:52'),
(220, '2020-08-19', 91, 4, 310, 335, 24, 8040, 600, 1, '2020-09-04 05:13:52', '2020-09-04 05:13:52'),
(221, '2020-08-19', 91, 5, 250, 325, 48, 15600, 3600, 1, '2020-09-04 05:13:52', '2020-09-04 05:13:52'),
(222, '2020-08-19', 91, 6, 190, 230, 24, 5520, 960, 1, '2020-09-04 05:13:52', '2020-09-04 05:13:52'),
(223, '2020-09-09', 92, 38, 2520, 2800, 4, 11200, 1120, 1, '2020-09-09 05:40:20', '2020-09-09 05:40:20'),
(224, '2020-09-09', 92, 21, 2430, 2700, 4, 10800, 1080, 1, '2020-09-09 05:40:20', '2020-09-09 05:40:20'),
(225, '2020-09-09', 92, 22, 1575, 1750, 10, 17500, 1750, 1, '2020-09-09 05:40:20', '2020-09-09 05:40:20'),
(227, '2022-05-11', 94, 6, 190, 230, 1, 230, 40, 1, '2022-05-11 10:28:59', '2022-05-11 10:28:59'),
(229, '2022-05-12', 96, 3, 380, 400, 1, 400, 20, 1, '2022-05-12 08:18:31', '2022-05-12 08:18:31'),
(230, '2022-05-12', 96, 4, 310, 350, 1, 350, 40, 1, '2022-05-12 08:18:31', '2022-05-12 08:18:31'),
(231, '2022-06-20', 97, 3, 380, 400, 1, 400, 20, 1, '2022-06-20 06:07:22', '2022-06-20 06:07:22'),
(232, '2022-06-20', 98, 3, 380, 400, 1, 400, 20, 1, '2022-06-20 06:36:14', '2022-06-20 06:36:14'),
(233, '2022-06-26', 99, 4, 310, 350, 1, 350, 40, 1, '2022-06-26 14:08:19', '2022-06-26 14:08:19'),
(234, '2022-06-26', 100, 8, 800, 950, 1, 950, 150, 1, '2022-06-26 14:10:20', '2022-06-26 14:10:20'),
(235, '2022-06-26', 101, 3, 380, 400, 1, 400, 20, 1, '2022-06-26 14:13:55', '2022-06-26 14:13:55'),
(243, '2022-07-17', 104, 243, 80, 90, 2, 180, 20, 1, '2022-07-17 05:39:43', '2022-07-17 05:39:43'),
(244, '2022-07-17', 104, 244, 180, 200, 2, 400, 40, 1, '2022-07-17 05:39:43', '2022-07-17 05:39:43'),
(245, '2022-07-17', 104, 237, 12, 15, 1, 15, 3, 1, '2022-07-17 05:39:43', '2022-07-17 05:39:43'),
(246, '2022-07-17', 104, 242, 12, 20, 1, 20, 8, 1, '2022-07-17 05:39:43', '2022-07-17 05:39:43'),
(247, '2022-07-17', 105, 232, 85, 90, 1, 90, 5, 1, '2022-07-17 05:42:34', '2022-07-17 05:42:34'),
(248, '2022-07-17', 105, 238, 20, 30, 1, 30, 10, 1, '2022-07-17 05:42:34', '2022-07-17 05:42:34'),
(249, '2022-07-17', 106, 229, 110, 120, 1, 120, 10, 1, '2022-07-17 08:57:47', '2022-07-17 08:57:47'),
(250, '2022-07-17', 106, 230, 70, 80, 1, 80, 10, 1, '2022-07-17 08:57:47', '2022-07-17 08:57:47'),
(251, '2022-07-17', 106, 239, 20, 30, 1, 30, 10, 1, '2022-07-17 08:57:47', '2022-07-17 08:57:47'),
(252, '2022-07-17', 106, 238, 20, 30, 1, 30, 10, 1, '2022-07-17 08:57:47', '2022-07-17 08:57:47'),
(253, '2022-07-17', 107, 221, 500, 520, 1, 520, 20, 1, '2022-07-17 08:58:48', '2022-07-17 08:58:48'),
(254, '2022-07-17', 107, 229, 110, 120, 1, 120, 10, 1, '2022-07-17 08:58:48', '2022-07-17 08:58:48'),
(255, '2022-07-17', 107, 230, 70, 80, 1, 80, 10, 1, '2022-07-17 08:58:48', '2022-07-17 08:58:48'),
(256, '2022-07-18', 108, 228, 50, 60, 2, 120, 20, 1, '2022-07-18 12:40:30', '2022-07-18 12:40:30'),
(257, '2022-07-18', 108, 229, 110, 120, 1, 120, 10, 1, '2022-07-18 12:40:30', '2022-07-18 12:40:30'),
(258, '2022-07-18', 108, 230, 70, 80, 1, 80, 10, 1, '2022-07-18 12:40:30', '2022-07-18 12:40:30'),
(259, '2022-07-31', 109, 221, 500, 520, 1, 520, 20, 1, '2022-07-31 09:59:45', '2022-07-31 09:59:45'),
(260, '2022-07-31', 110, 229, 110, 120, 1, 120, 10, 1, '2022-07-31 10:07:41', '2022-07-31 10:07:41'),
(261, '2022-07-31', 110, 223, 15, 12, 1, 12, -3, 1, '2022-07-31 10:07:41', '2022-07-31 10:07:41'),
(262, '2022-08-07', 111, 221, 500, 520, 2, 1040, 40, 1, '2022-08-07 05:34:20', '2022-08-07 05:34:20'),
(263, '2022-08-07', 112, 221, 500, 520, 1, 520, 20, 1, '2022-08-07 05:35:43', '2022-08-07 05:35:43'),
(264, '2022-08-25', 113, 250, 123, 250, 1, 250, 127, 1, '2022-08-25 08:34:50', '2022-08-25 08:34:50'),
(265, '2022-09-04', 114, 228, 50, 60, 1, 60, 10, 1, '2022-09-04 09:49:28', '2022-09-04 09:49:28'),
(266, '2022-09-04', 114, 230, 70, 80, 1, 80, 10, 1, '2022-09-04 09:49:28', '2022-09-04 09:49:28'),
(267, '2022-09-04', 114, 233, 60, 70, 1, 70, 10, 1, '2022-09-04 09:49:28', '2022-09-04 09:49:28'),
(268, '2022-09-07', 115, 221, 500, 520, 1, 520, 20, 1, '2022-09-07 12:14:48', '2022-09-07 12:14:48'),
(269, '2022-09-07', 115, 222, 800, 850, 1, 850, 50, 1, '2022-09-07 12:14:48', '2022-09-07 12:14:48'),
(270, '2022-09-07', 115, 224, 26, 30, 1, 30, 4, 1, '2022-09-07 12:14:48', '2022-09-07 12:14:48'),
(271, '2022-09-11', 116, 230, 70, 80, 1, 80, 10, 1, '2022-09-11 08:56:14', '2022-09-11 08:56:14'),
(272, '2022-09-11', 116, 229, 110, 120, 1, 120, 10, 1, '2022-09-11 08:56:14', '2022-09-11 08:56:14'),
(274, '2022-09-11', 118, 236, 55, 65, 4, 260, 40, 1, '2022-09-11 09:36:53', '2022-09-11 09:36:53'),
(275, '2022-09-11', 118, 221, 500, 520, 2, 1040, 40, 1, '2022-09-11 09:36:53', '2022-09-11 09:36:53'),
(276, '2022-09-11', 119, 221, 500, 520, 1, 520, 20, 1, '2022-09-11 10:38:36', '2022-09-11 10:38:36'),
(277, '2022-09-11', 120, 253, 1200, 1300, 3, 3900, 300, 1, '2022-09-11 10:57:17', '2022-09-11 10:57:17'),
(278, '2022-09-11', 120, 244, 180, 200, 8, 1600, 160, 1, '2022-09-11 10:57:17', '2022-09-11 10:57:17'),
(279, '2022-09-11', 120, 236, 55, 65, 4, 260, 40, 1, '2022-09-11 10:57:17', '2022-09-11 10:57:17'),
(280, '2022-09-11', 120, 221, 500, 520, 7, 3640, 140, 1, '2022-09-11 10:57:17', '2022-09-11 10:57:17'),
(281, '2022-09-11', 121, 244, 180, 200, 1, 200, 20, 1, '2022-09-11 11:08:52', '2022-09-11 11:08:52'),
(282, '2022-09-11', 121, 253, 1200, 1300, 2, 2600, 200, 1, '2022-09-11 11:08:52', '2022-09-11 11:08:52'),
(283, '2022-09-11', 121, 221, 500, 520, 2, 1040, 40, 1, '2022-09-11 11:08:52', '2022-09-11 11:08:52'),
(285, '2022-09-15', 123, 221, 500, 520, 11, 5720, 220, 1, '2022-09-15 11:20:59', '2022-09-15 11:20:59'),
(286, '2022-09-15', 123, 238, 20, 30, 2, 60, 20, 1, '2022-09-15 11:20:59', '2022-09-15 11:20:59'),
(287, '2022-09-15', 123, 242, 12, 20, 1, 20, 8, 1, '2022-09-15 11:20:59', '2022-09-15 11:20:59'),
(288, '2022-09-15', 123, 243, 80, 90, 1, 90, 10, 1, '2022-09-15 11:20:59', '2022-09-15 11:20:59'),
(289, '2022-09-18', 124, 255, 100, 110, 160, 17600, 1600, 1, '2022-09-18 06:53:42', '2022-09-18 06:53:42'),
(290, '2022-09-18', 125, 256, 2, 2, 170, 340, 0, 1, '2022-09-18 07:43:41', '2022-09-18 07:43:41'),
(291, '2022-09-18', 126, 221, 500, 520, 1, 520, 20, 1, '2022-09-18 08:03:22', '2022-09-18 08:03:22'),
(292, '2022-09-19', 127, 221, 500, 520, 1, 520, 20, 1, '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(293, '2022-09-19', 127, 229, 110, 120, 1, 120, 10, 1, '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(294, '2022-09-19', 127, 228, 50, 60, 1, 60, 10, 1, '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(295, '2022-09-19', 127, 230, 70, 80, 1, 80, 10, 1, '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(296, '2022-09-19', 127, 232, 85, 90, 1, 90, 5, 1, '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(297, '2022-09-19', 127, 238, 20, 30, 1, 30, 10, 1, '2022-09-19 08:12:09', '2022-09-19 08:12:09'),
(298, '2022-09-19', 128, 230, 70, 80, 2, 160, 20, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(299, '2022-09-19', 128, 221, 500, 520, 1, 520, 20, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(300, '2022-09-19', 128, 222, 800, 850, 1, 850, 50, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(301, '2022-09-19', 128, 223, 15, 12, 1, 12, -3, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(302, '2022-09-19', 128, 224, 26, 30, 1, 30, 4, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(303, '2022-09-19', 128, 225, 270, 280, 1, 280, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(304, '2022-09-19', 128, 226, 70, 80, 1, 80, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(305, '2022-09-19', 128, 227, 80, 90, 1, 90, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(306, '2022-09-19', 128, 228, 50, 60, 1, 60, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(307, '2022-09-19', 128, 229, 110, 120, 1, 120, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(308, '2022-09-19', 128, 231, 70, 80, 1, 80, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(309, '2022-09-19', 128, 232, 85, 90, 1, 90, 5, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(310, '2022-09-19', 128, 233, 60, 70, 1, 70, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(311, '2022-09-19', 128, 234, 25, 30, 1, 30, 5, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(312, '2022-09-19', 128, 241, 20, 30, 1, 30, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(313, '2022-09-19', 128, 240, 20, 30, 1, 30, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(314, '2022-09-19', 128, 239, 20, 30, 1, 30, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(315, '2022-09-19', 128, 238, 20, 30, 1, 30, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(316, '2022-09-19', 128, 237, 12, 15, 1, 15, 3, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(317, '2022-09-19', 128, 235, 55, 60, 1, 60, 5, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(318, '2022-09-19', 128, 242, 12, 20, 1, 20, 8, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(319, '2022-09-19', 128, 243, 80, 90, 1, 90, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(320, '2022-09-19', 128, 236, 55, 65, 1, 65, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(321, '2022-09-19', 128, 244, 180, 200, 1, 200, 20, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(322, '2022-09-19', 128, 245, 190, 200, 1, 200, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(323, '2022-09-19', 128, 247, 60, 70, 1, 70, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(324, '2022-09-19', 128, 248, 75, 80, 1, 80, 5, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(325, '2022-09-19', 128, 256, 2, 2, 1, 2, 0, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(326, '2022-09-19', 128, 255, 100, 110, 1, 110, 10, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(327, '2022-09-19', 128, 254, 2500, 2700, 1, 2700, 200, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(328, '2022-09-19', 128, 251, 1231, 123, 1, 123, -1108, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(329, '2022-09-19', 128, 250, 123, 250, 1, 250, 127, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(330, '2022-09-19', 128, 249, 2344, 3455, 1, 3455, 1111, 1, '2022-09-19 08:14:48', '2022-09-19 08:14:48'),
(331, '2022-09-19', 129, 221, 500, 520, 1, 520, 20, 1, '2022-09-19 08:20:43', '2022-09-19 08:20:43'),
(332, '2022-09-19', 130, 221, 500, 520, 5, 2600, 100, 1, '2022-09-19 09:57:43', '2022-09-19 09:57:43'),
(333, '2022-09-19', 130, 244, 180, 200, 3, 600, 60, 1, '2022-09-19 09:57:43', '2022-09-19 09:57:43'),
(334, '2022-09-19', 130, 228, 50, 60, 2, 120, 20, 1, '2022-09-19 09:57:43', '2022-09-19 09:57:43'),
(335, '2022-09-19', 131, 257, 120, 130, 3, 390, 30, 1, '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(336, '2022-09-19', 131, 228, 50, 60, 1, 60, 10, 1, '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(337, '2022-09-19', 131, 244, 180, 200, 1, 200, 20, 1, '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(338, '2022-09-19', 131, 221, 500, 520, 3, 1560, 60, 1, '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(339, '2022-09-19', 131, 238, 20, 30, 1, 30, 10, 1, '2022-09-19 10:24:23', '2022-09-19 10:24:23'),
(340, '2022-09-19', 132, 258, 150, 165, 3, 495, 45, 1, '2022-09-19 10:47:15', '2022-09-19 10:47:15'),
(341, '2022-09-19', 132, 221, 500, 520, 1, 520, 20, 1, '2022-09-19 10:47:15', '2022-09-19 10:47:15'),
(342, '2022-09-20', 133, 222, 800, 850, 1, 850, 50, 1, '2022-09-20 08:41:57', '2022-09-20 08:41:57'),
(343, '2022-09-20', 133, 221, 500, 520, 1, 520, 20, 1, '2022-09-20 08:41:57', '2022-09-20 08:41:57'),
(344, '2022-09-20', 134, 221, 500, 520, 1, 520, 20, 1, '2022-09-20 08:58:41', '2022-09-20 08:58:41'),
(345, '2022-09-20', 135, 221, 500, 520, 5, 2600, 100, 1, '2022-09-20 10:04:59', '2022-09-20 10:04:59'),
(346, '2022-09-20', 135, 223, 15, 12, 3, 36, -9, 1, '2022-09-20 10:04:59', '2022-09-20 10:04:59'),
(351, '2022-09-20', 137, 221, 500, 520, 1, 520, 20, 1, '2022-09-20 10:24:44', '2022-09-20 10:24:44'),
(352, '2022-09-20', 137, 222, 800, 850, 1, 850, 50, 1, '2022-09-20 10:24:44', '2022-09-20 10:24:44'),
(353, '2022-09-20', 137, 223, 15, 12, 1, 12, -3, 1, '2022-09-20 10:24:44', '2022-09-20 10:24:44'),
(354, '2022-09-20', 137, 224, 26, 30, 1, 30, 4, 1, '2022-09-20 10:24:44', '2022-09-20 10:24:44'),
(355, '2022-09-20', 138, 221, 500, 520, 2, 1040, 40, 1, '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(356, '2022-09-20', 138, 222, 800, 850, 1, 850, 50, 1, '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(357, '2022-09-20', 138, 223, 15, 12, 1, 12, -3, 1, '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(358, '2022-09-20', 138, 224, 26, 30, 1, 30, 4, 1, '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(359, '2022-09-20', 138, 260, 240, 245, 1, 245, 5, 1, '2022-09-20 10:43:06', '2022-09-20 10:43:06'),
(360, '2022-09-20', 139, 249, 2344, 3455, 2, 6910, 2222, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(361, '2022-09-20', 139, 228, 50, 60, 2, 120, 20, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(362, '2022-09-20', 139, 229, 110, 120, 1, 120, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(363, '2022-09-20', 139, 248, 75, 80, 2, 160, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(364, '2022-09-20', 139, 221, 500, 520, 1, 520, 20, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(365, '2022-09-20', 139, 222, 800, 850, 1, 850, 50, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(366, '2022-09-20', 139, 225, 270, 280, 1, 280, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(367, '2022-09-20', 139, 226, 70, 80, 1, 80, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(368, '2022-09-20', 139, 227, 80, 90, 1, 90, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(369, '2022-09-20', 139, 238, 20, 30, 1, 30, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(370, '2022-09-20', 139, 237, 12, 15, 1, 15, 3, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(371, '2022-09-20', 139, 236, 55, 65, 1, 65, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(372, '2022-09-20', 139, 234, 25, 30, 1, 30, 5, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(373, '2022-09-20', 139, 233, 60, 70, 1, 70, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(374, '2022-09-20', 139, 232, 85, 90, 1, 90, 5, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(375, '2022-09-20', 139, 231, 70, 80, 1, 80, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(376, '2022-09-20', 139, 230, 70, 80, 1, 80, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(377, '2022-09-20', 139, 239, 20, 30, 1, 30, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(378, '2022-09-20', 139, 240, 20, 30, 1, 30, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(379, '2022-09-20', 139, 241, 20, 30, 1, 30, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(380, '2022-09-20', 139, 242, 12, 20, 1, 20, 8, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(381, '2022-09-20', 139, 243, 80, 90, 1, 90, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(382, '2022-09-20', 139, 244, 180, 200, 1, 200, 20, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(383, '2022-09-20', 139, 245, 190, 200, 1, 200, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(384, '2022-09-20', 139, 246, 90, 100, 1, 100, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(385, '2022-09-20', 139, 247, 60, 70, 1, 70, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(386, '2022-09-20', 139, 257, 120, 130, 1, 130, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(387, '2022-09-20', 139, 256, 2, 2, 1, 2, 0, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(388, '2022-09-20', 139, 255, 100, 110, 1, 110, 10, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(389, '2022-09-20', 139, 254, 2500, 2700, 1, 2700, 200, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(390, '2022-09-20', 139, 253, 1200, 1300, 1, 1300, 100, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(391, '2022-09-20', 139, 251, 1231, 123, 1, 123, -1108, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(392, '2022-09-20', 139, 250, 123, 250, 1, 250, 127, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(393, '2022-09-20', 139, 258, 150, 165, 1, 165, 15, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(394, '2022-09-20', 139, 260, 240, 245, 1, 245, 5, 1, '2022-09-20 10:46:59', '2022-09-20 10:46:59'),
(395, '2022-09-20', 140, 261, 5000, 7000, 1, 7000, 2000, 1, '2022-09-20 10:51:50', '2022-09-20 10:51:50'),
(396, '2022-09-20', 141, 260, 240, 245, 1, 245, 5, 1, '2022-09-20 10:57:05', '2022-09-20 10:57:05'),
(397, '2022-09-27', 142, 221, 500, 520, 2, 1040, 40, 1, '2022-09-27 10:25:35', '2022-09-27 10:25:35'),
(398, '2022-09-27', 142, 222, 800, 850, 1, 850, 50, 1, '2022-09-27 10:25:35', '2022-09-27 10:25:35'),
(399, '2022-09-29', 143, 228, 50, 60, 1, 60, 10, 1, '2022-09-29 06:12:11', '2022-09-29 06:12:11'),
(400, '2022-09-29', 144, 221, 500, 520, 1, 520, 20, 1, '2022-09-29 08:23:43', '2022-09-29 08:23:43'),
(401, '2022-09-29', 144, 222, 800, 850, 1, 850, 50, 1, '2022-09-29 08:23:43', '2022-09-29 08:23:43'),
(402, '2022-09-29', 144, 229, 110, 120, 1, 120, 10, 1, '2022-09-29 08:23:43', '2022-09-29 08:23:43'),
(403, '2022-09-29', 145, 221, 500, 520, 1, 520, 20, 1, '2022-09-29 09:50:20', '2022-09-29 09:50:20'),
(404, '2022-11-14', 146, 230, 70, 80, 1, 80, 10, 1, '2022-11-14 08:46:39', '2022-11-14 08:46:39'),
(405, '2022-11-14', 146, 231, 70, 80, 1, 80, 10, 1, '2022-11-14 08:46:39', '2022-11-14 08:46:39'),
(406, '2022-11-23', 147, 221, 500, 520, 1, 520, 20, 1, '2022-11-23 04:35:22', '2022-11-23 04:35:22'),
(407, '2022-11-23', 148, 221, 500, 520, 3, 1560, 60, 1, '2022-11-23 05:22:38', '2022-11-23 05:22:38'),
(408, '2022-11-23', 149, 226, 70, 80, 1, 80, 10, 1, '2022-11-23 08:01:50', '2022-11-23 08:01:50'),
(409, '2022-11-23', 149, 227, 80, 90, 1, 90, 10, 1, '2022-11-23 08:01:50', '2022-11-23 08:01:50'),
(410, '2022-11-23', 150, 232, 85, 90, 1, 90, 5, 1, '2022-11-23 08:51:42', '2022-11-23 08:51:42'),
(411, '2022-11-23', 150, 233, 60, 70, 1, 70, 10, 1, '2022-11-23 08:51:42', '2022-11-23 08:51:42'),
(412, '2022-11-23', 150, 221, 500, 520, 1, 520, 20, 1, '2022-11-23 08:51:42', '2022-11-23 08:51:42'),
(413, '2022-11-26', 151, 221, 500, 520, 1, 520, 20, 1, '2022-11-26 05:12:44', '2022-11-26 05:12:44'),
(418, '2022-11-26', 154, 229, 110, 120, 2, 240, 20, 1, '2022-11-26 06:17:35', '2022-11-26 06:17:35'),
(419, '2022-11-26', 154, 221, 500, 520, 1, 520, 20, 1, '2022-11-26 06:17:35', '2022-11-26 06:17:35'),
(420, '2022-11-26', 155, 222, 800, 850, 1, 850, 50, 1, '2022-11-26 06:25:32', '2022-11-26 06:25:32'),
(421, '2022-11-26', 155, 264, 1000, 1100, 1, 1100, 100, 1, '2022-11-26 06:25:32', '2022-11-26 06:25:32'),
(422, '2022-11-27', 156, 221, 500, 520, 1, 520, 20, 1, '2022-11-27 09:39:39', '2022-11-27 09:39:39'),
(423, '2022-12-05', 157, 221, 500, 520, 5, 2600, 100, 1, '2022-12-05 03:14:34', '2022-12-05 03:14:34'),
(424, '2022-12-05', 157, 240, 20, 30, 1, 30, 10, 1, '2022-12-05 03:14:34', '2022-12-05 03:14:34'),
(425, '2022-12-05', 157, 241, 20, 30, 1, 30, 10, 1, '2022-12-05 03:14:34', '2022-12-05 03:14:34'),
(426, '2022-12-05', 157, 250, 123, 250, 1, 250, 127, 1, '2022-12-05 03:14:34', '2022-12-05 03:14:34'),
(427, '2022-12-05', 158, 226, 70, 80, 2, 160, 20, 1, '2022-12-05 03:21:41', '2022-12-05 03:21:41'),
(428, '2022-12-05', 159, 227, 80, 90, 2, 180, 20, 1, '2022-12-05 04:02:31', '2022-12-05 04:02:31'),
(429, '2022-12-05', 159, 233, 60, 70, 2, 140, 20, 1, '2022-12-05 04:02:31', '2022-12-05 04:02:31'),
(431, '2022-12-05', 161, 265, 100, 120, 1, 120, 20, 1, '2022-12-05 04:35:06', '2022-12-05 04:35:06'),
(432, '2022-12-05', 162, 265, 100, 120, 1, 120, 20, 1, '2022-12-05 04:37:56', '2022-12-05 04:37:56'),
(433, '2022-12-05', 163, 230, 70, 80, 1, 80, 10, 1, '2022-12-05 04:43:53', '2022-12-05 04:43:53'),
(434, '2022-12-05', 164, 267, 120, 150, 1, 150, 30, 1, '2022-12-05 04:55:49', '2022-12-05 04:55:49'),
(435, '2022-12-08', 165, 229, 110, 120, 1, 120, 10, 1, '2022-12-08 10:21:10', '2022-12-08 10:21:10'),
(436, '2022-12-08', 165, 238, 20, 30, 1, 30, 10, 1, '2022-12-08 10:21:10', '2022-12-08 10:21:10'),
(437, '2022-12-08', 166, 227, 80, 90, 1, 90, 10, 1, '2022-12-08 10:58:45', '2022-12-08 10:58:45'),
(438, '2022-12-08', 166, 228, 50, 60, 1, 60, 10, 1, '2022-12-08 10:58:45', '2022-12-08 10:58:45'),
(439, '2022-12-08', 166, 229, 110, 120, 1, 120, 10, 1, '2022-12-08 10:58:45', '2022-12-08 10:58:45'),
(440, '2022-12-08', 167, 268, 50, 55, 5, 275, 25, 1, '2022-12-08 11:35:05', '2022-12-08 11:35:05'),
(441, '2022-12-08', 168, 269, 1200, 1500, 1, 1500, 300, 1, '2022-12-08 11:42:53', '2022-12-08 11:42:53'),
(442, '2022-12-08', 169, 270, 200, 270, 3, 810, 210, 1, '2022-12-08 11:50:47', '2022-12-08 11:50:47'),
(443, '2022-12-14', 170, 226, 70, 80, 1, 80, 10, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(444, '2022-12-14', 170, 221, 500, 520, 1, 520, 20, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(445, '2022-12-14', 170, 223, 15, 12, 1, 12, -3, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(446, '2022-12-14', 170, 228, 50, 60, 1, 60, 10, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(447, '2022-12-14', 170, 227, 80, 90, 1, 90, 10, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(448, '2022-12-14', 170, 229, 110, 120, 1, 120, 10, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(449, '2022-12-14', 170, 222, 800, 850, 1, 850, 50, 1, '2022-12-14 12:40:33', '2022-12-14 12:40:33'),
(450, '2022-12-18', 171, 272, 135, 140, 1, 140, 5, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(451, '2022-12-18', 171, 229, 110, 120, 1, 120, 10, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(452, '2022-12-18', 171, 231, 70, 80, 1, 80, 10, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(453, '2022-12-18', 171, 232, 85, 90, 1, 90, 5, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(454, '2022-12-18', 171, 233, 60, 70, 1, 70, 10, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(455, '2022-12-18', 171, 240, 20, 30, 1, 30, 10, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(456, '2022-12-18', 171, 239, 20, 30, 1, 30, 10, 1, '2022-12-18 03:23:09', '2022-12-18 03:23:09'),
(457, '2022-12-19', 172, 228, 50, 60, 6, 360, 60, 1, '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(458, '2022-12-19', 172, 272, 135, 140, 4, 560, 20, 1, '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(459, '2022-12-19', 172, 229, 110, 120, 1, 120, 10, 1, '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(460, '2022-12-19', 172, 231, 70, 80, 1, 80, 10, 1, '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(461, '2022-12-19', 172, 221, 500, 520, 1, 520, 20, 1, '2022-12-19 04:59:10', '2022-12-19 04:59:10'),
(462, '2022-12-19', 173, 222, 800, 850, 2, 1700, 100, 1, '2022-12-19 05:08:12', '2022-12-19 05:08:12'),
(463, '2022-12-19', 173, 223, 15, 12, 3, 36, -9, 1, '2022-12-19 05:08:12', '2022-12-19 05:08:12'),
(464, '2022-12-19', 173, 224, 26, 30, 3, 90, 12, 1, '2022-12-19 05:08:12', '2022-12-19 05:08:12'),
(465, '2022-12-19', 173, 231, 70, 80, 3, 240, 30, 1, '2022-12-19 05:08:12', '2022-12-19 05:08:12'),
(466, '2022-12-24', 174, 221, 500, 520, 1, 520, 20, 1, '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(467, '2022-12-24', 174, 224, 26, 30, 1, 30, 4, 1, '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(468, '2022-12-24', 174, 227, 80, 90, 1, 90, 10, 1, '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(469, '2022-12-24', 174, 260, 240, 245, 1, 245, 5, 1, '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(470, '2022-12-24', 174, 228, 50, 60, 1, 60, 10, 1, '2022-12-24 06:02:39', '2022-12-24 06:02:39'),
(471, '2022-12-24', 175, 221, 500, 520, 1, 520, 20, 1, '2022-12-24 06:57:44', '2022-12-24 06:57:44'),
(472, '2022-12-24', 176, 221, 500, 520, 1, 520, 20, 1, '2022-12-24 07:01:45', '2022-12-24 07:01:45'),
(473, '2022-12-24', 177, 226, 70, 80, 1, 80, 10, 1, '2022-12-24 07:07:05', '2022-12-24 07:07:05'),
(476, '2022-12-31', 179, 221, 500, 520, 1, 520, 20, 1, '2022-12-31 08:05:47', '2022-12-31 08:05:47'),
(477, '2022-12-31', 180, 222, 800, 850, 1, 850, 50, 1, '2022-12-31 08:07:20', '2022-12-31 08:07:20'),
(478, '2022-12-31', 180, 230, 70, 80, 1, 80, 10, 1, '2022-12-31 08:07:20', '2022-12-31 08:07:20'),
(479, '2022-12-31', 180, 236, 55, 65, 1, 65, 10, 1, '2022-12-31 08:07:20', '2022-12-31 08:07:20'),
(480, '2022-12-31', 181, 238, 20, 30, 1, 30, 10, 1, '2022-12-31 08:16:02', '2022-12-31 08:16:02'),
(481, '2022-12-31', 182, 245, 190, 200, 1, 200, 10, 1, '2022-12-31 08:19:05', '2022-12-31 08:19:05'),
(482, '2022-12-31', 183, 229, 110, 120, 2, 240, 20, 1, '2022-12-31 08:30:12', '2022-12-31 08:30:12'),
(483, '2022-12-31', 184, 223, 15, 12, 1, 12, -3, 1, '2022-12-31 08:31:54', '2022-12-31 08:31:54'),
(484, '2022-12-31', 185, 228, 50, 60, 2, 120, 20, 1, '2022-12-31 08:35:36', '2022-12-31 08:35:36'),
(485, '2022-12-31', 185, 244, 180, 200, 1, 200, 20, 1, '2022-12-31 08:35:36', '2022-12-31 08:35:36'),
(486, '2022-12-31', 186, 238, 20, 30, 1, 30, 10, 1, '2022-12-31 08:38:08', '2022-12-31 08:38:08'),
(487, '2022-12-31', 187, 253, 1200, 1300, 1, 1300, 100, 1, '2022-12-31 08:41:01', '2022-12-31 08:41:01'),
(488, '2022-12-31', 188, 225, 270, 270, 1, 270, 0, 1, '2022-12-31 08:42:48', '2022-12-31 08:42:48'),
(489, '2022-12-31', 189, 233, 60, 70, 1, 70, 10, 1, '2022-12-31 08:44:43', '2022-12-31 08:44:43'),
(490, '2022-12-31', 189, 250, 123, 250, 1, 250, 127, 1, '2022-12-31 08:44:43', '2022-12-31 08:44:43'),
(491, '2022-12-31', 190, 222, 800, 850, 1, 850, 50, 1, '2022-12-31 08:45:02', '2022-12-31 08:45:02'),
(492, '2022-12-31', 191, 229, 110, 120, 1, 120, 10, 1, '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(493, '2022-12-31', 191, 238, 20, 30, 1, 30, 10, 1, '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(494, '2022-12-31', 191, 246, 90, 100, 1, 100, 10, 1, '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(495, '2022-12-31', 191, 247, 60, 70, 1, 70, 10, 1, '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(496, '2022-12-31', 191, 253, 1200, 1300, 1, 1300, 100, 1, '2022-12-31 08:51:16', '2022-12-31 08:51:16'),
(497, '2023-01-18', 192, 221, 500, 520, 2, 1040, 40, 1, '2023-01-18 11:32:07', '2023-01-18 11:32:07'),
(498, '2023-01-19', 193, 222, 800, 850, 1, 850, 50, 1, '2023-01-19 03:23:45', '2023-01-19 03:23:45'),
(499, '2023-01-19', 193, 230, 70, 80, 1, 80, 10, 1, '2023-01-19 03:23:45', '2023-01-19 03:23:45'),
(500, '2023-01-19', 194, 221, 500, 520, 1, 520, 20, 1, '2023-01-19 03:46:04', '2023-01-19 03:46:04'),
(501, '2023-01-19', 196, 221, 500, 520, 1, 520, 20, 1, '2023-01-19 03:50:13', '2023-01-19 03:50:13'),
(502, '2023-01-19', 197, 221, 500, 520, 1, 520, 20, 1, '2023-01-19 03:58:27', '2023-01-19 03:58:27'),
(503, '2023-01-25', 198, 223, 15, 12, 1, 12, -3, 1, '2023-01-25 03:50:33', '2023-01-25 03:50:33'),
(504, '2023-01-25', 199, 224, 26, 30, 1, 30, 4, 1, '2023-01-25 03:53:57', '2023-01-25 03:53:57'),
(505, '2023-01-25', 200, 283, 250, 300, 2, 600, 100, 1, '2023-01-25 05:02:50', '2023-01-25 05:02:50'),
(506, '2023-01-25', 201, 287, 5, 10, 1, 10, 5, 1, '2023-01-25 05:12:55', '2023-01-25 05:12:55'),
(507, '2023-01-25', 202, 288, 450, 550, 1, 550, 100, 1, '2023-01-25 05:33:50', '2023-01-25 05:33:50'),
(508, '2023-01-25', 203, 289, 1250, 1500, 1, 1500, 250, 1, '2023-01-25 05:45:31', '2023-01-25 05:45:31'),
(509, '2023-01-26', 204, 291, 80, 110, 2, 220, 60, 1, '2023-01-26 04:08:20', '2023-01-26 04:08:20'),
(510, '2023-01-26', 205, 292, 20, 30, 1, 30, 10, 1, '2023-01-26 04:24:40', '2023-01-26 04:24:40'),
(511, '2023-01-26', 206, 293, 50, 70, 1, 70, 20, 1, '2023-01-26 04:36:56', '2023-01-26 04:36:56'),
(512, '2023-01-26', 207, 294, 280, 320, 1, 320, 40, 1, '2023-01-26 04:42:42', '2023-01-26 04:42:42'),
(513, '2023-01-26', 208, 295, 150, 200, 1, 200, 50, 1, '2023-01-26 05:24:29', '2023-01-26 05:24:29'),
(514, '2023-01-26', 209, 296, 200, 300, 1, 300, 100, 1, '2023-01-26 05:31:57', '2023-01-26 05:31:57'),
(515, '2023-01-26', 210, 297, 5, 10, 1, 10, 5, 1, '2023-01-26 05:45:38', '2023-01-26 05:45:38'),
(516, '2023-01-26', 211, 298, 40, 45, 1, 45, 5, 1, '2023-01-26 05:54:16', '2023-01-26 05:54:16'),
(517, '2023-01-26', 212, 299, 120, 130, 1, 130, 10, 1, '2023-01-26 06:01:34', '2023-01-26 06:01:34'),
(518, '2023-01-26', 213, 300, 200, 250, 1, 250, 50, 1, '2023-01-26 06:11:54', '2023-01-26 06:11:54'),
(519, '2023-01-26', 214, 301, 100, 130, 1, 130, 30, 1, '2023-01-26 06:18:41', '2023-01-26 06:18:41'),
(520, '2023-01-26', 215, 302, 120000, 130000, 2, 260000, 20000, 1, '2023-01-26 06:24:55', '2023-01-26 06:24:55'),
(521, '2023-01-26', 216, 303, 20, 30, 1, 30, 10, 1, '2023-01-26 06:29:44', '2023-01-26 06:29:44'),
(522, '2023-01-26', 217, 304, 10, 15, 1, 15, 5, 1, '2023-01-26 06:36:35', '2023-01-26 06:36:35'),
(523, '2023-01-26', 218, 292, 20, 30, 1, 30, 10, 1, '2023-01-26 06:49:10', '2023-01-26 06:49:10'),
(524, '2023-01-26', 219, 306, 15, 15, 1, 15, 0, 1, '2023-01-26 07:06:55', '2023-01-26 07:06:55'),
(525, '2023-01-26', 220, 307, 300, 350, 1, 350, 50, 1, '2023-01-26 07:17:06', '2023-01-26 07:17:06');
INSERT INTO `sales_products` (`id`, `sales_date`, `sale_id`, `pro_id`, `unit_cost`, `unit_price`, `qty`, `subtotal`, `product_revenue`, `store_id`, `created_at`, `updated_at`) VALUES
(526, '2023-01-26', 221, 308, 60, 70, 1, 70, 10, 1, '2023-01-26 07:26:09', '2023-01-26 07:26:09'),
(527, '2023-01-26', 222, 309, 250, 300, 1, 300, 50, 1, '2023-01-26 07:34:09', '2023-01-26 07:34:09'),
(528, '2023-01-29', 223, 310, 6000, 8000, 2, 16000, 4000, 1, '2023-01-29 06:29:19', '2023-01-29 06:29:19'),
(529, '2023-01-29', 224, 231, 70, 80, 1, 80, 10, 1, '2023-01-29 06:40:31', '2023-01-29 06:40:31'),
(530, '2023-01-29', 225, 243, 80, 90, 1, 90, 10, 1, '2023-01-29 06:52:50', '2023-01-29 06:52:50'),
(531, '2023-01-29', 226, 313, 4, 6, 20, 120, 40, 1, '2023-01-29 07:01:14', '2023-01-29 07:01:14'),
(532, '2023-01-29', 227, 314, 250, 360, 1, 360, 110, 1, '2023-01-29 07:11:41', '2023-01-29 07:11:41'),
(533, '2023-01-29', 228, 315, 400, 500, 1, 500, 100, 1, '2023-01-29 07:16:24', '2023-01-29 07:16:24'),
(534, '2023-01-29', 229, 316, 40, 50, 2, 100, 20, 1, '2023-01-29 07:22:15', '2023-01-29 07:22:15'),
(535, '2023-01-29', 230, 228, 50, 60, 2, 120, 20, 1, '2023-01-29 07:29:40', '2023-01-29 07:29:40'),
(536, '2023-02-02', 231, 222, 800, 850, 6, 5100, 300, 1, '2023-02-02 05:11:27', '2023-02-02 05:11:27'),
(537, '2023-02-02', 231, 225, 270, 280, 3, 840, 30, 1, '2023-02-02 05:11:27', '2023-02-02 05:11:27'),
(538, '2023-02-02', 231, 231, 70, 80, 3, 240, 30, 1, '2023-02-02 05:11:27', '2023-02-02 05:11:27'),
(539, '2023-02-02', 232, 222, 800, 850, 3, 2550, 150, 1, '2023-02-02 05:17:02', '2023-02-02 05:17:02'),
(540, '2023-02-02', 232, 224, 26, 30, 5, 150, 20, 1, '2023-02-02 05:17:02', '2023-02-02 05:17:02'),
(541, '2023-02-02', 232, 227, 80, 90, 2, 180, 20, 1, '2023-02-02 05:17:02', '2023-02-02 05:17:02'),
(542, '2023-02-02', 232, 228, 50, 60, 3, 180, 30, 1, '2023-02-02 05:17:02', '2023-02-02 05:17:02'),
(543, '2023-02-02', 233, 222, 800, 850, 2, 1700, 100, 1, '2023-02-02 07:15:58', '2023-02-02 07:15:58'),
(544, '2023-02-02', 233, 226, 70, 80, 4, 320, 40, 1, '2023-02-02 07:15:58', '2023-02-02 07:15:58'),
(545, '2023-02-06', 234, 223, 15, 12, 3, 36, -9, 1, '2023-02-06 07:06:03', '2023-02-06 07:06:03'),
(546, '2023-02-06', 234, 228, 50, 60, 1, 60, 10, 1, '2023-02-06 07:06:03', '2023-02-06 07:06:03'),
(547, '2023-02-06', 234, 244, 180, 200, 2, 400, 40, 1, '2023-02-06 07:06:03', '2023-02-06 07:06:03'),
(548, '2023-02-06', 235, 233, 60, 70, 2, 140, 20, 1, '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(549, '2023-02-06', 235, 229, 110, 120, 2, 240, 20, 1, '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(550, '2023-02-06', 235, 230, 70, 80, 3, 240, 30, 1, '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(551, '2023-02-06', 235, 248, 75, 80, 1, 80, 5, 1, '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(552, '2023-02-06', 235, 225, 270, 280, 1, 280, 10, 1, '2023-02-06 07:15:31', '2023-02-06 07:15:31'),
(553, '2023-02-06', 236, 226, 70, 80, 2, 160, 20, 1, '2023-02-06 07:23:11', '2023-02-06 07:23:11'),
(554, '2023-02-06', 236, 223, 15, 12, 2, 24, -6, 1, '2023-02-06 07:23:11', '2023-02-06 07:23:11'),
(555, '2023-02-06', 236, 233, 60, 70, 2, 140, 20, 1, '2023-02-06 07:23:11', '2023-02-06 07:23:11'),
(556, '2023-02-06', 237, 225, 270, 280, 1, 280, 10, 1, '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(557, '2023-02-06', 237, 226, 70, 80, 1, 80, 10, 1, '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(558, '2023-02-06', 237, 223, 15, 12, 1, 12, -3, 1, '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(559, '2023-02-06', 237, 233, 60, 70, 1, 70, 10, 1, '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(560, '2023-02-06', 237, 221, 500, 520, 1, 520, 20, 1, '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(561, '2023-02-06', 237, 232, 85, 90, 1, 90, 5, 1, '2023-02-06 07:29:48', '2023-02-06 07:29:48'),
(562, '2023-02-06', 238, 230, 70, 80, 1, 80, 10, 1, '2023-02-06 08:01:39', '2023-02-06 08:01:39'),
(563, '2023-02-06', 238, 226, 70, 80, 1, 80, 10, 1, '2023-02-06 08:01:39', '2023-02-06 08:01:39'),
(564, '2023-02-06', 238, 221, 500, 520, 1, 520, 20, 1, '2023-02-06 08:01:39', '2023-02-06 08:01:39'),
(565, '2023-02-06', 238, 229, 110, 120, 1, 120, 10, 1, '2023-02-06 08:01:39', '2023-02-06 08:01:39'),
(566, '2023-02-09', 239, 237, 12, 15, 1, 15, 3, 1, '2023-02-09 07:00:56', '2023-02-09 07:00:56'),
(567, '2023-03-04', 240, 322, 550, 1250, 3, 3750, 2100, 1, '2023-03-04 04:34:39', '2023-03-04 04:34:39'),
(568, '2023-03-04', 241, 323, 750, 1450, 1, 1450, 700, 1, '2023-03-04 04:46:13', '2023-03-04 04:46:13'),
(569, '2023-03-04', 242, 324, 600, 1200, 2, 2400, 1200, 1, '2023-03-04 05:38:26', '2023-03-04 05:38:26'),
(570, '2023-03-04', 243, 325, 250, 400, 2, 800, 300, 1, '2023-03-04 05:47:42', '2023-03-04 05:47:42'),
(571, '2023-03-04', 244, 326, 30, 60, 2, 120, 60, 1, '2023-03-04 05:57:44', '2023-03-04 05:57:44'),
(572, '2023-03-04', 245, 327, 500, 1000, 3, 3000, 1500, 1, '2023-03-04 06:07:38', '2023-03-04 06:07:38'),
(573, '2023-03-04', 246, 328, 700, 1400, 1, 1400, 700, 1, '2023-03-04 06:15:04', '2023-03-04 06:15:04'),
(574, '2023-03-04', 247, 329, 150000, 250000, 1, 250000, 100000, 1, '2023-03-04 06:20:32', '2023-03-04 06:20:32'),
(575, '2023-03-04', 248, 330, 250, 360, 1, 360, 110, 1, '2023-03-04 06:30:19', '2023-03-04 06:30:19'),
(576, '2023-03-04', 249, 239, 20, 30, 1, 30, 10, 1, '2023-03-04 06:36:55', '2023-03-04 06:36:55'),
(577, '2023-03-04', 250, 331, 50, 75, 1, 75, 25, 1, '2023-03-04 06:50:40', '2023-03-04 06:50:40'),
(578, '2023-03-04', 251, 332, 6500, 11000, 1, 11000, 4500, 1, '2023-03-04 06:57:19', '2023-03-04 06:57:19'),
(579, '2023-03-04', 252, 332, 6500, 11000, 1, 11000, 4500, 1, '2023-03-04 06:58:13', '2023-03-04 06:58:13'),
(580, '2023-03-04', 253, 333, 25, 30, 1, 30, 5, 1, '2023-03-04 09:36:07', '2023-03-04 09:36:07'),
(581, '2023-03-04', 253, 254, 2500, 2700, 1, 2700, 200, 1, '2023-03-04 09:36:07', '2023-03-04 09:36:07'),
(582, '2023-03-11', 254, 237, 12, 15, 2, 30, 6, 1, '2023-03-11 05:02:43', '2023-03-11 05:02:43'),
(583, '2023-03-11', 254, 225, 270, 280, 2, 560, 20, 1, '2023-03-11 05:02:43', '2023-03-11 05:02:43'),
(584, '2023-03-11', 254, 228, 50, 60, 1, 60, 10, 1, '2023-03-11 05:02:43', '2023-03-11 05:02:43'),
(585, '2023-03-11', 254, 232, 85, 90, 1, 90, 5, 1, '2023-03-11 05:02:43', '2023-03-11 05:02:43'),
(586, '2023-04-03', 255, 221, 500, 520, 1, 520, 20, 1, '2023-04-03 08:52:55', '2023-04-03 08:52:55'),
(587, '2023-04-03', 256, 221, 500, 520, 1, 520, 20, 1, '2023-04-03 10:23:05', '2023-04-03 10:23:05'),
(588, '2023-04-04', 257, 336, 30, 50, 2, 100, 40, 1, '2023-04-04 06:13:08', '2023-04-04 06:13:08'),
(589, '2023-04-04', 258, 221, 500, 520, 1, 520, 20, 1, '2023-04-04 06:15:59', '2023-04-04 06:15:59'),
(590, '2023-04-04', 259, 335, 8, 10, 2, 20, 4, 1, '2023-04-04 06:16:40', '2023-04-04 06:16:40'),
(591, '2023-04-04', 260, 255, 100, 110, 1, 110, 10, 1, '2023-04-04 06:52:30', '2023-04-04 06:52:30'),
(592, '2023-04-04', 261, 337, 50, 55, 1, 55, 5, 1, '2023-04-04 06:53:25', '2023-04-04 06:53:25'),
(593, '2023-04-04', 262, 338, 30, 55, 1, 55, 25, 1, '2023-04-04 06:59:50', '2023-04-04 06:59:50'),
(594, '2023-04-04', 263, 339, 1500, 1750, 1, 1750, 250, 1, '2023-04-04 07:05:29', '2023-04-04 07:05:29'),
(595, '2023-04-04', 264, 340, 50, 705, 1, 705, 655, 1, '2023-04-04 07:10:42', '2023-04-04 07:10:42'),
(596, '2023-04-04', 265, 350, 25000, 30000, 1, 30000, 5000, 1, '2023-04-04 07:26:54', '2023-04-04 07:26:54'),
(597, '2023-04-04', 266, 351, 4, 5, 1, 5, 1, 1, '2023-04-04 07:27:32', '2023-04-04 07:27:32'),
(598, '2023-04-05', 267, 221, 500, 520, 1, 520, 20, 1, '2023-04-05 06:34:29', '2023-04-05 06:34:29'),
(599, '2023-04-05', 268, 352, 20, 30, 1, 30, 10, 1, '2023-04-05 06:43:12', '2023-04-05 06:43:12'),
(600, '2023-04-05', 269, 353, 20, 25, 1, 25, 5, 1, '2023-04-05 06:47:40', '2023-04-05 06:47:40'),
(601, '2023-04-05', 270, 355, 120, 150, 1, 150, 30, 1, '2023-04-05 06:50:53', '2023-04-05 06:50:53'),
(602, '2023-04-05', 271, 356, 110, 125, 1, 125, 15, 1, '2023-04-05 06:54:32', '2023-04-05 06:54:32'),
(603, '2023-04-05', 273, 354, 120, 150, 1, 150, 30, 1, '2023-04-05 06:57:13', '2023-04-05 06:57:13'),
(604, '2023-04-05', 274, 357, 30, 40, 1, 40, 10, 1, '2023-04-05 07:01:48', '2023-04-05 07:01:48'),
(605, '2023-04-05', 275, 221, 500, 520, 1, 520, 20, 1, '2023-04-05 07:06:00', '2023-04-05 07:06:00'),
(606, '2023-04-05', 276, 358, 30, 40, 1, 40, 10, 1, '2023-04-05 07:09:43', '2023-04-05 07:09:43'),
(607, '2023-04-05', 277, 224, 26, 30, 1, 30, 4, 1, '2023-04-05 07:13:04', '2023-04-05 07:13:04'),
(608, '2023-04-05', 278, 360, 170, 180, 1, 180, 10, 1, '2023-04-05 07:19:08', '2023-04-05 07:19:08'),
(609, '2023-04-05', 279, 309, 250, 300, 1, 300, 50, 1, '2023-04-05 07:22:54', '2023-04-05 07:22:54'),
(610, '2023-04-05', 280, 363, 20, 25, 2, 50, 10, 1, '2023-04-05 07:23:28', '2023-04-05 07:23:28'),
(611, '2023-04-05', 281, 364, 30, 40, 1, 40, 10, 1, '2023-04-05 07:28:15', '2023-04-05 07:28:15'),
(612, '2023-04-05', 282, 222, 800, 850, 1, 850, 50, 1, '2023-04-05 07:28:18', '2023-04-05 07:28:18'),
(614, '2023-04-06', 284, 368, 25, 30, 1, 30, 5, 1, '2023-04-06 04:44:06', '2023-04-06 04:44:06'),
(615, '2023-04-06', 285, 369, 120, 130, 1, 130, 10, 1, '2023-04-06 04:49:30', '2023-04-06 04:49:30'),
(616, '2023-04-06', 286, 370, 20, 30, 1, 30, 10, 1, '2023-04-06 05:00:04', '2023-04-06 05:00:04'),
(617, '2023-04-06', 287, 372, 1500, 2000, 1, 2000, 500, 1, '2023-04-06 05:12:09', '2023-04-06 05:12:09'),
(618, '2023-04-06', 288, 373, 200, 400, 1, 400, 200, 1, '2023-04-06 05:29:40', '2023-04-06 05:29:40'),
(619, '2023-04-06', 289, 374, 350, 415, 1, 415, 65, 1, '2023-04-06 06:07:33', '2023-04-06 06:07:33'),
(620, '2023-04-06', 290, 375, 40, 45, 1, 45, 5, 1, '2023-04-06 06:15:34', '2023-04-06 06:15:34'),
(621, '2023-04-06', 291, 376, 65, 70, 2, 140, 10, 1, '2023-04-06 06:23:52', '2023-04-06 06:23:52'),
(622, '2023-04-13', 292, 322, 550, 1250, 6, 7500, 4200, 1, '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(623, '2023-04-13', 292, 229, 110, 120, 1, 120, 10, 1, '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(624, '2023-04-13', 292, 244, 180, 200, 1, 200, 20, 1, '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(625, '2023-04-13', 292, 222, 800, 850, 1, 850, 50, 1, '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(626, '2023-04-13', 292, 247, 60, 70, 2, 140, 20, 1, '2023-04-13 06:49:04', '2023-04-13 06:49:04'),
(627, '2023-04-13', 293, 322, 550, 1250, 4, 5000, 2800, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(628, '2023-04-13', 293, 228, 50, 60, 1, 60, 10, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(629, '2023-04-13', 293, 230, 70, 80, 1, 80, 10, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(630, '2023-04-13', 293, 231, 70, 80, 1, 80, 10, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(631, '2023-04-13', 293, 232, 85, 90, 1, 90, 5, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(632, '2023-04-13', 293, 247, 60, 70, 1, 70, 10, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(633, '2023-04-13', 293, 279, 45, 60, 1, 60, 15, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(634, '2023-04-13', 293, 288, 450, 550, 1, 550, 100, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(635, '2023-04-13', 293, 289, 1250, 1500, 1, 1500, 250, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(636, '2023-04-13', 293, 377, 9, 13, 1, 13, 4, 1, '2023-04-13 06:54:22', '2023-04-13 06:54:22'),
(637, '2023-04-13', 294, 229, 110, 120, 1, 120, 10, 1, '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(638, '2023-04-13', 294, 238, 20, 30, 1, 30, 10, 1, '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(639, '2023-04-13', 294, 243, 80, 90, 1, 90, 10, 1, '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(640, '2023-04-13', 294, 222, 800, 850, 1, 850, 50, 1, '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(641, '2023-04-13', 294, 228, 50, 60, 1, 60, 10, 1, '2023-04-13 07:18:46', '2023-04-13 07:18:46'),
(642, '2023-04-13', 295, 239, 20, 30, 3, 90, 30, 1, '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(643, '2023-04-13', 295, 226, 70, 80, 1, 80, 10, 1, '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(644, '2023-04-13', 295, 232, 85, 90, 1, 90, 5, 1, '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(645, '2023-04-13', 295, 233, 60, 70, 3, 210, 30, 1, '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(646, '2023-04-13', 295, 230, 70, 80, 2, 160, 20, 1, '2023-04-13 07:33:40', '2023-04-13 07:33:40'),
(647, '2023-04-13', 296, 232, 85, 90, 2, 180, 10, 1, '2023-04-13 07:48:31', '2023-04-13 07:48:31'),
(648, '2023-04-13', 296, 226, 70, 80, 1, 80, 10, 1, '2023-04-13 07:48:31', '2023-04-13 07:48:31'),
(649, '2023-04-13', 296, 230, 70, 80, 1, 80, 10, 1, '2023-04-13 07:48:31', '2023-04-13 07:48:31'),
(650, '2023-04-13', 296, 237, 12, 15, 1, 15, 3, 1, '2023-04-13 07:48:31', '2023-04-13 07:48:31'),
(651, '2023-04-13', 297, 232, 85, 90, 1, 90, 5, 1, '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(652, '2023-04-13', 297, 230, 70, 80, 1, 80, 10, 1, '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(653, '2023-04-13', 297, 236, 55, 65, 1, 65, 10, 1, '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(654, '2023-04-13', 297, 225, 270, 280, 1, 280, 10, 1, '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(655, '2023-04-13', 297, 317, 120000, 150000, 1, 150000, 30000, 1, '2023-04-13 08:01:12', '2023-04-13 08:01:12'),
(656, '2023-04-16', 298, 279, 45, 60, 3, 180, 45, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(657, '2023-04-16', 298, 231, 70, 80, 1, 80, 10, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(658, '2023-04-16', 298, 247, 60, 70, 1, 70, 10, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(659, '2023-04-16', 298, 248, 75, 80, 1, 80, 5, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(660, '2023-04-16', 298, 245, 190, 200, 1, 200, 10, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(661, '2023-04-16', 298, 242, 12, 20, 1, 20, 8, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(662, '2023-04-16', 298, 333, 25, 30, 1, 30, 5, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(663, '2023-04-16', 298, 335, 8, 10, 1, 10, 2, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(664, '2023-04-16', 298, 330, 250, 360, 1, 360, 110, 1, '2023-04-16 03:59:22', '2023-04-16 03:59:22'),
(665, '2023-04-16', 299, 232, 85, 90, 2, 180, 10, 1, '2023-04-16 04:12:11', '2023-04-16 04:12:11'),
(666, '2023-04-16', 299, 226, 70, 80, 1, 80, 10, 1, '2023-04-16 04:12:11', '2023-04-16 04:12:11'),
(667, '2023-04-16', 299, 231, 70, 80, 1, 80, 10, 1, '2023-04-16 04:12:11', '2023-04-16 04:12:11'),
(668, '2023-04-16', 299, 229, 110, 120, 1, 120, 10, 1, '2023-04-16 04:12:11', '2023-04-16 04:12:11'),
(669, '2023-04-16', 300, 236, 55, 65, 1, 65, 10, 1, '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(670, '2023-04-16', 300, 229, 110, 120, 2, 240, 20, 1, '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(671, '2023-04-16', 300, 232, 85, 90, 1, 90, 5, 1, '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(672, '2023-04-16', 300, 307, 300, 350, 1, 350, 50, 1, '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(673, '2023-04-16', 300, 265, 100, 120, 1, 120, 20, 1, '2023-04-16 04:29:46', '2023-04-16 04:29:46'),
(674, '2023-04-16', 301, 234, 25, 30, 1, 30, 5, 1, '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(675, '2023-04-16', 301, 236, 55, 65, 1, 65, 10, 1, '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(676, '2023-04-16', 301, 231, 70, 80, 1, 80, 10, 1, '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(677, '2023-04-16', 301, 226, 70, 80, 1, 80, 10, 1, '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(678, '2023-04-16', 301, 369, 120, 130, 1, 130, 10, 1, '2023-04-16 04:37:47', '2023-04-16 04:37:47'),
(679, '2023-04-16', 302, 350, 25000, 30000, 1, 30000, 5000, 1, '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(680, '2023-04-16', 302, 231, 70, 80, 1, 80, 10, 1, '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(681, '2023-04-16', 302, 236, 55, 65, 1, 65, 10, 1, '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(682, '2023-04-16', 302, 288, 450, 550, 1, 550, 100, 1, '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(683, '2023-04-16', 302, 317, 120000, 150000, 1, 150000, 30000, 1, '2023-04-16 04:45:04', '2023-04-16 04:45:04'),
(684, '2023-04-17', 303, 379, 35, 50, 5, 250, 75, 1, '2023-04-17 04:49:26', '2023-04-17 04:49:26'),
(685, '2023-04-17', 303, 378, 1500, 3000, 1, 3000, 1500, 1, '2023-04-17 04:49:26', '2023-04-17 04:49:26'),
(686, '2023-04-17', 304, 380, 240, 350, 1, 350, 110, 1, '2023-04-17 05:00:09', '2023-04-17 05:00:09'),
(687, '2023-04-18', 305, 383, 200, 300, 1, 300, 100, 1, '2023-04-18 04:32:37', '2023-04-18 04:32:37'),
(688, '2023-04-30', 306, 386, 35, 300, 3, 900, 795, 1, '2023-04-30 07:06:44', '2023-04-30 07:06:44'),
(689, '2023-05-06', 307, 387, 240, 250, 1, 250, 10, 1, '2023-05-06 07:23:41', '2023-05-06 07:23:41'),
(690, '2023-05-09', 308, 228, 50, 60, 2, 120, 20, 1, '2023-05-09 05:59:13', '2023-05-09 05:59:13'),
(691, '2023-05-09', 308, 246, 90, 100, 1, 100, 10, 1, '2023-05-09 05:59:13', '2023-05-09 05:59:13'),
(692, '2023-05-09', 308, 237, 12, 15, 1, 15, 3, 1, '2023-05-09 05:59:13', '2023-05-09 05:59:13'),
(693, '2023-05-09', 309, 225, 270, 280, 1, 280, 10, 1, '2023-05-09 06:16:28', '2023-05-09 06:16:28'),
(694, '2023-05-09', 309, 233, 60, 70, 1, 70, 10, 1, '2023-05-09 06:16:28', '2023-05-09 06:16:28'),
(695, '2023-05-09', 310, 221, 500, 520, 1, 520, 20, 1, '2023-05-09 11:12:09', '2023-05-09 11:12:09'),
(696, '2023-05-13', 311, 222, 800, 850, 1, 850, 50, 1, '2023-05-13 05:05:16', '2023-05-13 05:05:16'),
(697, '2023-05-13', 311, 235, 55, 60, 1, 60, 5, 1, '2023-05-13 05:05:16', '2023-05-13 05:05:16'),
(698, '2023-05-13', 312, 226, 70, 80, 1, 80, 10, 1, '2023-05-13 05:19:28', '2023-05-13 05:19:28'),
(699, '2023-05-13', 312, 222, 800, 850, 1, 850, 50, 1, '2023-05-13 05:19:28', '2023-05-13 05:19:28'),
(700, '2023-05-13', 312, 232, 85, 90, 1, 90, 5, 1, '2023-05-13 05:19:28', '2023-05-13 05:19:28'),
(701, '2023-05-13', 313, 230, 70, 80, 1, 80, 10, 1, '2023-05-13 05:26:56', '2023-05-13 05:26:56'),
(702, '2023-05-13', 313, 240, 20, 30, 1, 30, 10, 1, '2023-05-13 05:26:56', '2023-05-13 05:26:56'),
(703, '2023-05-13', 313, 244, 180, 200, 1, 200, 20, 1, '2023-05-13 05:26:56', '2023-05-13 05:26:56'),
(704, '2023-05-13', 314, 221, 500, 520, 1, 520, 20, 1, '2023-05-13 05:30:11', '2023-05-13 05:30:11'),
(705, '2023-05-13', 314, 237, 12, 15, 1, 15, 3, 1, '2023-05-13 05:30:11', '2023-05-13 05:30:11'),
(706, '2023-05-13', 314, 247, 60, 70, 1, 70, 10, 1, '2023-05-13 05:30:11', '2023-05-13 05:30:11'),
(707, '2023-05-13', 316, 221, 500, 520, 1, 520, 20, 1, '2023-05-13 05:43:10', '2023-05-13 05:43:10'),
(708, '2023-05-13', 317, 226, 70, 80, 1, 80, 10, 1, '2023-05-13 05:47:18', '2023-05-13 05:47:18'),
(709, '2023-05-13', 318, 222, 800, 850, 1, 850, 50, 1, '2023-05-13 06:46:01', '2023-05-13 06:46:01'),
(710, '2023-05-13', 320, 229, 110, 120, 1, 120, 10, 1, '2023-05-13 07:00:43', '2023-05-13 07:00:43'),
(711, '2023-05-13', 321, 232, 85, 90, 1, 90, 5, 1, '2023-05-13 07:05:49', '2023-05-13 07:05:49'),
(712, '2023-05-13', 321, 229, 110, 120, 1, 120, 10, 1, '2023-05-13 07:05:49', '2023-05-13 07:05:49'),
(713, '2023-05-13', 321, 222, 800, 850, 1, 850, 50, 1, '2023-05-13 07:05:49', '2023-05-13 07:05:49'),
(714, '2023-05-13', 322, 229, 110, 120, 2, 240, 20, 1, '2023-05-13 07:15:44', '2023-05-13 07:15:44'),
(715, '2023-05-13', 323, 223, 15, 12, 2, 24, -6, 1, '2023-05-13 07:25:45', '2023-05-13 07:25:45'),
(716, '2023-05-13', 324, 232, 85, 90, 1, 90, 5, 1, '2023-05-13 07:28:57', '2023-05-13 07:28:57'),
(717, '2023-05-13', 325, 239, 20, 30, 2, 60, 20, 1, '2023-05-13 07:33:40', '2023-05-13 07:33:40'),
(718, '2023-05-13', 328, 364, 30, 40, 1, 40, 10, 1, '2023-05-13 07:55:49', '2023-05-13 07:55:49'),
(719, '2023-05-13', 329, 221, 500, 520, 1, 520, 20, 1, '2023-05-13 07:59:06', '2023-05-13 07:59:06'),
(720, '2023-05-13', 330, 233, 60, 70, 1, 70, 10, 1, '2023-05-13 08:04:15', '2023-05-13 08:04:15'),
(721, '2023-05-13', 331, 227, 80, 90, 1, 90, 10, 1, '2023-05-13 08:11:36', '2023-05-13 08:11:36'),
(722, '2023-05-13', 332, 233, 60, 70, 1, 70, 10, 1, '2023-05-13 08:18:02', '2023-05-13 08:18:02'),
(723, '2023-05-13', 333, 255, 100, 110, 1, 110, 10, 1, '2023-05-13 08:24:27', '2023-05-13 08:24:27'),
(724, '2023-05-13', 334, 246, 90, 100, 1, 100, 10, 1, '2023-05-13 08:29:10', '2023-05-13 08:29:10'),
(725, '2023-06-17', 335, 221, 500, 520, 1, 520, 20, 1, '2023-06-17 04:07:26', '2023-06-17 04:07:26'),
(726, '2023-06-17', 336, 221, 500, 520, 2, 1040, 40, 1, '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(727, '2023-06-17', 336, 222, 800, 850, 1, 850, 50, 1, '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(728, '2023-06-17', 336, 248, 75, 80, 1, 80, 5, 1, '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(729, '2023-06-17', 336, 247, 60, 70, 2, 140, 20, 1, '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(730, '2023-06-17', 336, 388, 30, 45, 1, 45, 15, 1, '2023-06-17 06:46:30', '2023-06-17 06:46:30'),
(731, '2023-06-17', 337, 221, 500, 520, 5, 2600, 100, 1, '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(732, '2023-06-17', 337, 228, 50, 60, 1, 60, 10, 1, '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(733, '2023-06-17', 337, 222, 800, 850, 2, 1700, 100, 1, '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(734, '2023-06-17', 337, 242, 12, 20, 3, 60, 24, 1, '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(735, '2023-06-17', 337, 248, 75, 80, 1, 80, 5, 1, '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(736, '2023-06-17', 337, 291, 80, 110, 1, 110, 30, 1, '2023-06-17 06:56:16', '2023-06-17 06:56:16'),
(737, '2023-06-17', 339, 390, 60, 80, 1, 80, 20, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(738, '2023-06-17', 339, 228, 50, 60, 2, 120, 20, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(739, '2023-06-17', 339, 240, 20, 30, 3, 90, 30, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(740, '2023-06-17', 339, 248, 75, 80, 2, 160, 10, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(741, '2023-06-17', 339, 317, 120000, 150000, 1, 150000, 30000, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(742, '2023-06-17', 339, 333, 25, 30, 1, 30, 5, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(743, '2023-06-17', 339, 377, 9, 13, 6, 78, 24, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(744, '2023-06-17', 339, 387, 240, 250, 1, 250, 10, 1, '2023-06-17 07:12:29', '2023-06-17 07:12:29'),
(745, '2023-06-17', 340, 222, 800, 850, 1, 850, 50, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(746, '2023-06-17', 340, 223, 15, 12, 1, 12, -3, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(747, '2023-06-17', 340, 243, 80, 90, 1, 90, 10, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(748, '2023-06-17', 340, 244, 180, 200, 1, 200, 20, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(749, '2023-06-17', 340, 248, 75, 80, 1, 80, 5, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(750, '2023-06-17', 340, 247, 60, 70, 1, 70, 10, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(751, '2023-06-17', 340, 246, 90, 100, 1, 100, 10, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(752, '2023-06-17', 340, 241, 20, 30, 1, 30, 10, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(753, '2023-06-17', 340, 391, 450, 560, 2, 1120, 220, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(754, '2023-06-17', 340, 377, 9, 13, 1, 13, 4, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(755, '2023-06-17', 340, 333, 25, 30, 1, 30, 5, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(756, '2023-06-17', 340, 334, 120, 130, 1, 130, 10, 1, '2023-06-17 07:18:18', '2023-06-17 07:18:18'),
(757, '2023-06-17', 341, 223, 15, 12, 1, 12, -3, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(758, '2023-06-17', 341, 392, 15000, 18000, 2, 36000, 6000, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(759, '2023-06-17', 341, 379, 35, 50, 2, 100, 30, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(760, '2023-06-17', 341, 334, 120, 130, 2, 260, 20, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(761, '2023-06-17', 341, 330, 250, 360, 1, 360, 110, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(762, '2023-06-17', 341, 242, 12, 20, 1, 20, 8, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(763, '2023-06-17', 341, 238, 20, 30, 1, 30, 10, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(764, '2023-06-17', 341, 244, 180, 200, 1, 200, 20, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(765, '2023-06-17', 341, 232, 85, 90, 1, 90, 5, 1, '2023-06-17 07:32:58', '2023-06-17 07:32:58'),
(766, '2023-06-17', 342, 249, 2344, 3455, 2, 6910, 2222, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(767, '2023-06-17', 342, 260, 240, 245, 1, 245, 5, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(768, '2023-06-17', 342, 393, 1500, 2000, 2, 4000, 1000, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(769, '2023-06-17', 342, 387, 240, 250, 1, 250, 10, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(770, '2023-06-17', 342, 238, 20, 30, 1, 30, 10, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(771, '2023-06-17', 342, 235, 55, 60, 1, 60, 5, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(772, '2023-06-17', 342, 232, 85, 90, 1, 90, 5, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(773, '2023-06-17', 342, 236, 55, 65, 1, 65, 10, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(774, '2023-06-17', 342, 243, 80, 90, 1, 90, 10, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(775, '2023-06-17', 342, 242, 12, 20, 1, 20, 8, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(776, '2023-06-17', 342, 255, 100, 110, 1, 110, 10, 1, '2023-06-17 07:42:43', '2023-06-17 07:42:43'),
(777, '2023-06-25', 343, 394, 10, 15, 4, 60, 20, 1, '2023-06-25 07:38:53', '2023-06-25 07:38:53'),
(778, '2023-07-04', 344, 222, 800, 850, 1, 850, 50, 1, '2023-07-04 09:48:45', '2023-07-04 09:48:45'),
(779, '2023-07-05', 345, 221, 500, 520, 1, 520, 20, 1, '2023-07-05 05:58:46', '2023-07-05 05:58:46'),
(780, '2023-07-05', 346, 226, 70, 80, 2, 160, 20, 1, '2023-07-05 06:53:08', '2023-07-05 06:53:08'),
(781, '2023-07-05', 347, 222, 800, 850, 2, 1700, 100, 1, '2023-07-05 07:14:09', '2023-07-05 07:14:09'),
(782, '2023-07-05', 349, 228, 50, 60, 20, 1200, 200, 1, '2023-07-05 07:16:10', '2023-07-05 07:16:10'),
(783, '2023-07-05', 350, 229, 110, 120, 20, 2400, 200, 1, '2023-07-05 07:18:25', '2023-07-05 07:18:25'),
(784, '2023-07-05', 351, 233, 60, 70, 21, 1470, 210, 1, '2023-07-05 07:23:51', '2023-07-05 07:23:51'),
(785, '2023-07-05', 352, 226, 70, 80, 15, 1200, 150, 1, '2023-07-05 07:41:19', '2023-07-05 07:41:19'),
(786, '2023-07-05', 353, 229, 110, 120, 44, 5280, 440, 1, '2023-07-05 07:43:39', '2023-07-05 07:43:39'),
(787, '2023-07-05', 355, 401, 300, 350, 1, 350, 50, 1, '2023-07-05 07:45:31', '2023-07-05 07:45:31'),
(788, '2023-07-05', 356, 224, 26, 30, 45, 1350, 180, 1, '2023-07-05 07:51:45', '2023-07-05 07:51:45'),
(789, '2023-07-05', 357, 404, 20, 25, 1, 25, 5, 1, '2023-07-05 07:55:53', '2023-07-05 07:55:53'),
(790, '2023-07-05', 358, 224, 26, 30, 5, 150, 20, 1, '2023-07-05 07:56:17', '2023-07-05 07:56:17'),
(791, '2023-07-06', 359, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 03:09:56', '2023-07-06 03:09:56'),
(792, '2023-07-06', 360, 410, 15, 20, 1, 20, 5, 1, '2023-07-06 04:08:24', '2023-07-06 04:08:24'),
(793, '2023-07-06', 361, 411, 40, 50, 1, 50, 10, 1, '2023-07-06 04:21:20', '2023-07-06 04:21:20'),
(794, '2023-07-06', 362, 412, 140, 150, 1, 150, 10, 1, '2023-07-06 04:28:03', '2023-07-06 04:28:03'),
(795, '2023-07-06', 363, 229, 110, 120, 1, 120, 10, 1, '2023-07-06 04:33:03', '2023-07-06 04:33:03'),
(796, '2023-07-06', 364, 413, 200, 250, 1, 250, 50, 1, '2023-07-06 04:42:31', '2023-07-06 04:42:31'),
(797, '2023-07-06', 365, 234, 25, 30, 1, 30, 5, 1, '2023-07-06 04:44:02', '2023-07-06 04:44:02'),
(798, '2023-07-06', 366, 234, 25, 30, 1, 30, 5, 1, '2023-07-06 04:47:32', '2023-07-06 04:47:32'),
(799, '2023-07-06', 367, 414, 25, 30, 1, 30, 5, 1, '2023-07-06 04:48:10', '2023-07-06 04:48:10'),
(800, '2023-07-06', 368, 229, 110, 120, 1, 120, 10, 1, '2023-07-06 04:50:31', '2023-07-06 04:50:31'),
(801, '2023-07-06', 369, 234, 25, 30, 1, 30, 5, 1, '2023-07-06 04:55:31', '2023-07-06 04:55:31'),
(802, '2023-07-06', 370, 229, 110, 120, 1, 120, 10, 1, '2023-07-06 04:58:26', '2023-07-06 04:58:26'),
(803, '2023-07-06', 371, 415, 500, 550, 1, 550, 50, 1, '2023-07-06 04:59:54', '2023-07-06 04:59:54'),
(804, '2023-07-06', 372, 229, 110, 120, 1, 120, 10, 1, '2023-07-06 05:01:27', '2023-07-06 05:01:27'),
(805, '2023-07-06', 373, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:05:41', '2023-07-06 06:05:41'),
(806, '2023-07-06', 374, 416, 800, 1500, 1, 1500, 700, 1, '2023-07-06 06:07:11', '2023-07-06 06:07:11'),
(807, '2023-07-06', 375, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:10:54', '2023-07-06 06:10:54'),
(809, '2023-07-06', 377, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 06:13:22', '2023-07-06 06:13:22'),
(810, '2023-07-06', 378, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:16:01', '2023-07-06 06:16:01'),
(811, '2023-07-06', 379, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:17:24', '2023-07-06 06:17:24'),
(812, '2023-07-06', 380, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 06:19:29', '2023-07-06 06:19:29'),
(813, '2023-07-06', 381, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:21:17', '2023-07-06 06:21:17'),
(814, '2023-07-06', 382, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:27:30', '2023-07-06 06:27:30'),
(815, '2023-07-06', 383, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 06:31:56', '2023-07-06 06:31:56'),
(816, '2023-07-06', 384, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:31:58', '2023-07-06 06:31:58'),
(817, '2023-07-06', 385, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:34:14', '2023-07-06 06:34:14'),
(818, '2023-07-06', 386, 237, 12, 15, 2, 30, 6, 1, '2023-07-06 06:39:00', '2023-07-06 06:39:00'),
(819, '2023-07-06', 387, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:39:24', '2023-07-06 06:39:24'),
(820, '2023-07-06', 388, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:42:10', '2023-07-06 06:42:10'),
(821, '2023-07-06', 389, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 06:44:45', '2023-07-06 06:44:45'),
(822, '2023-07-06', 390, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:45:58', '2023-07-06 06:45:58'),
(823, '2023-07-06', 391, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:49:50', '2023-07-06 06:49:50'),
(824, '2023-07-06', 392, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 06:52:00', '2023-07-06 06:52:00'),
(825, '2023-07-06', 393, 221, 500, 520, 1, 520, 20, 1, '2023-07-06 06:55:21', '2023-07-06 06:55:21'),
(826, '2023-07-06', 394, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 07:03:01', '2023-07-06 07:03:01'),
(827, '2023-07-06', 395, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 07:10:45', '2023-07-06 07:10:45'),
(828, '2023-07-06', 396, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 07:16:37', '2023-07-06 07:16:37'),
(829, '2023-07-06', 396, 222, 800, 850, 1, 850, 50, 1, '2023-07-06 07:16:37', '2023-07-06 07:16:37'),
(830, '2023-07-06', 397, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 07:24:43', '2023-07-06 07:24:43'),
(831, '2023-07-06', 398, 237, 12, 15, 1, 15, 3, 1, '2023-07-06 07:29:30', '2023-07-06 07:29:30'),
(832, '2023-07-11', 399, 427, 16, 20, 1, 20, 4, 1, '2023-07-11 04:12:08', '2023-07-11 04:12:08'),
(833, '2023-07-11', 400, 226, 70, 80, 3, 240, 30, 1, '2023-07-11 05:27:20', '2023-07-11 05:27:20'),
(834, '2023-07-11', 400, 237, 12, 15, 3, 45, 9, 1, '2023-07-11 05:27:20', '2023-07-11 05:27:20'),
(835, '2023-07-11', 400, 239, 20, 30, 2, 60, 20, 1, '2023-07-11 05:27:20', '2023-07-11 05:27:20'),
(836, '2023-07-11', 400, 242, 12, 20, 4, 80, 32, 1, '2023-07-11 05:27:20', '2023-07-11 05:27:20'),
(837, '2023-07-11', 401, 221, 500, 520, 1, 520, 20, 1, '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(838, '2023-07-11', 401, 222, 800, 850, 1, 850, 50, 1, '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(839, '2023-07-11', 401, 225, 270, 280, 1, 280, 10, 1, '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(840, '2023-07-11', 401, 229, 110, 120, 1, 120, 10, 1, '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(841, '2023-07-11', 401, 234, 25, 30, 1, 30, 5, 1, '2023-07-11 06:09:05', '2023-07-11 06:09:05'),
(842, '2023-07-13', 402, 430, 500, 700, 3, 2100, 600, 1, '2023-07-13 04:06:38', '2023-07-13 04:06:38'),
(843, '2023-07-13', 403, 431, 1200, 1500, 1, 1500, 300, 1, '2023-07-13 06:40:19', '2023-07-13 06:40:19'),
(844, '2023-07-15', 404, 432, 700, 1000, 1, 1000, 300, 1, '2023-07-15 04:46:50', '2023-07-15 04:46:50'),
(845, '2023-07-17', 405, 382, 400, 500, 3, 1500, 300, 1, '2023-07-17 07:31:50', '2023-07-17 07:31:50'),
(846, '2023-07-17', 405, 221, 500, 520, 1, 520, 20, 1, '2023-07-17 07:31:50', '2023-07-17 07:31:50'),
(847, '2023-07-17', 405, 222, 800, 850, 2, 1700, 100, 1, '2023-07-17 07:31:50', '2023-07-17 07:31:50'),
(848, '2023-07-17', 405, 240, 20, 30, 3, 90, 30, 1, '2023-07-17 07:31:50', '2023-07-17 07:31:50'),
(849, '2023-07-17', 406, 224, 26, 30, 2, 60, 8, 1, '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(850, '2023-07-17', 406, 234, 25, 30, 1, 30, 5, 1, '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(851, '2023-07-17', 406, 226, 70, 80, 1, 80, 10, 1, '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(852, '2023-07-17', 406, 231, 70, 80, 1, 80, 10, 1, '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(853, '2023-07-17', 406, 250, 123, 250, 1, 250, 127, 1, '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(854, '2023-07-17', 406, 228, 50, 60, 10, 600, 100, 1, '2023-07-17 07:53:06', '2023-07-17 07:53:06'),
(855, '2023-07-17', 407, 240, 20, 30, 1, 30, 10, 1, '2023-07-17 08:06:19', '2023-07-17 08:06:19'),
(856, '2023-07-17', 407, 234, 25, 30, 1, 30, 5, 1, '2023-07-17 08:06:19', '2023-07-17 08:06:19'),
(857, '2023-07-17', 407, 229, 110, 120, 1, 120, 10, 1, '2023-07-17 08:06:19', '2023-07-17 08:06:19'),
(858, '2023-07-17', 407, 232, 85, 90, 1, 90, 5, 1, '2023-07-17 08:06:19', '2023-07-17 08:06:19'),
(862, '2024-03-17', 409, 221, 500, 520, 1, 520, 20, 1, '2024-03-17 06:52:53', '2024-03-17 06:52:53'),
(863, '2024-03-17', 409, 222, 800, 850, 1, 850, 50, 1, '2024-03-17 06:52:53', '2024-03-17 06:52:53'),
(864, '2024-03-17', 409, 231, 70, 80, 1, 80, 10, 1, '2024-03-17 06:52:53', '2024-03-17 06:52:53'),
(865, '2024-03-19', 410, 221, 500, 520, 8, 4160, 160, 1, '2024-03-19 05:12:20', '2024-03-19 05:12:20'),
(866, '2024-03-19', 411, 221, 500, 520, 1, 520, 20, 1, '2024-03-19 05:17:09', '2024-03-19 05:17:09'),
(867, '2024-03-19', 411, 222, 800, 850, 1, 850, 50, 1, '2024-03-19 05:17:09', '2024-03-19 05:17:09'),
(868, '2024-03-19', 411, 223, 15, 12, 1, 12, -3, 1, '2024-03-19 05:17:09', '2024-03-19 05:17:09'),
(869, '2024-03-19', 411, 224, 26, 30, 1, 30, 4, 1, '2024-03-19 05:17:09', '2024-03-19 05:17:09'),
(870, '2024-03-19', 411, 225, 270, 280, 1, 280, 10, 1, '2024-03-19 05:17:10', '2024-03-19 05:17:10'),
(871, '2024-03-19', 411, 226, 70, 80, 1, 80, 10, 1, '2024-03-19 05:17:10', '2024-03-19 05:17:10'),
(872, '2024-03-21', 412, 222, 800, 800, 1, 800, 0, 1, '2024-03-21 08:16:58', '2024-03-21 08:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `store` int(11) DEFAULT NULL,
  `start_stock` int(11) DEFAULT NULL,
  `last_import` int(11) DEFAULT NULL,
  `last_export` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `pro_id`, `stock`, `store`, `start_stock`, `last_import`, `last_export`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, NULL, NULL, NULL, '2020-02-24 15:34:10', '2020-02-24 15:34:10'),
(2, 1, 0, NULL, NULL, NULL, NULL, '2020-02-24 16:53:04', '2020-02-24 16:53:04'),
(3, 2, 0, NULL, NULL, NULL, NULL, '2020-02-24 16:55:33', '2020-02-24 16:55:33'),
(4, 4, 0, NULL, NULL, NULL, NULL, '2020-02-24 17:00:09', '2020-02-24 17:00:09'),
(5, 5, 0, NULL, NULL, NULL, NULL, '2020-02-24 17:00:37', '2020-02-24 17:00:37'),
(6, 6, 0, NULL, NULL, NULL, NULL, '2020-02-24 17:02:27', '2020-02-24 17:02:27'),
(7, 1, 0, NULL, NULL, NULL, NULL, '2020-02-25 13:09:43', '2020-02-25 13:09:43'),
(8, 2, 0, NULL, NULL, NULL, NULL, '2020-02-25 14:03:59', '2020-02-25 14:03:59'),
(9, 3, 0, NULL, NULL, NULL, NULL, '2020-03-03 16:29:16', '2020-03-03 16:29:16'),
(10, 4, 0, NULL, NULL, NULL, NULL, '2020-03-03 16:31:53', '2020-03-03 16:31:53'),
(11, 5, 0, NULL, NULL, NULL, NULL, '2020-03-03 16:40:26', '2020-03-03 16:40:26'),
(12, 6, 0, NULL, NULL, NULL, NULL, '2020-03-03 18:18:15', '2020-03-03 18:18:15'),
(13, 7, 0, NULL, NULL, NULL, NULL, '2020-03-03 18:30:11', '2020-03-03 18:30:11'),
(14, 8, 0, NULL, NULL, NULL, NULL, '2020-03-03 19:28:10', '2020-03-03 19:28:10'),
(15, 9, 0, NULL, NULL, NULL, NULL, '2020-03-03 20:03:58', '2020-03-03 20:03:58'),
(16, 10, 0, NULL, NULL, NULL, NULL, '2020-03-08 15:59:46', '2020-03-08 15:59:46'),
(17, 11, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:02:39', '2020-03-08 16:02:39'),
(18, 12, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:08:12', '2020-03-08 16:08:12'),
(19, 13, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:10:05', '2020-03-08 16:10:05'),
(20, 14, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:11:40', '2020-03-08 16:11:40'),
(21, 15, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:12:57', '2020-03-08 16:12:57'),
(22, 16, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:14:31', '2020-03-08 16:14:31'),
(23, 17, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:19:20', '2020-03-08 16:19:20'),
(24, 18, 0, NULL, NULL, NULL, NULL, '2020-03-08 16:20:15', '2020-03-08 16:20:15'),
(25, 19, 0, NULL, NULL, NULL, NULL, '2020-03-09 16:44:14', '2020-03-09 16:44:14'),
(26, 20, 0, NULL, NULL, NULL, NULL, '2020-03-09 16:47:42', '2020-03-09 16:47:42'),
(27, 21, 0, NULL, NULL, NULL, NULL, '2020-03-09 16:55:47', '2020-03-09 16:55:47'),
(28, 22, 0, NULL, NULL, NULL, NULL, '2020-03-09 16:59:24', '2020-03-09 16:59:24'),
(29, 23, 0, NULL, NULL, NULL, NULL, '2020-03-09 18:38:26', '2020-03-09 18:38:26'),
(30, 24, 0, NULL, NULL, NULL, NULL, '2020-03-09 18:39:44', '2020-03-09 18:39:44'),
(31, 25, 0, NULL, NULL, NULL, NULL, '2020-03-10 13:43:52', '2020-03-10 13:43:52'),
(32, 26, 0, NULL, NULL, NULL, NULL, '2020-03-10 13:48:26', '2020-03-10 13:48:26'),
(33, 27, 0, NULL, NULL, NULL, NULL, '2020-03-10 13:50:34', '2020-03-10 13:50:34'),
(34, 28, 0, NULL, NULL, NULL, NULL, '2020-03-10 13:52:28', '2020-03-10 13:52:28'),
(35, 29, 0, NULL, NULL, NULL, NULL, '2020-03-10 13:54:03', '2020-03-10 13:54:03'),
(36, 30, 0, NULL, NULL, NULL, NULL, '2020-03-10 14:02:12', '2020-03-10 14:02:12'),
(37, 31, 0, NULL, NULL, NULL, NULL, '2020-03-10 16:36:50', '2020-03-10 16:36:50'),
(38, 32, 0, NULL, NULL, NULL, NULL, '2020-03-10 16:38:05', '2020-03-10 16:38:05'),
(39, 33, 0, NULL, NULL, NULL, NULL, '2020-03-10 17:44:10', '2020-03-10 17:44:10'),
(40, 34, 0, NULL, NULL, NULL, NULL, '2020-03-10 17:46:10', '2020-03-10 17:46:10'),
(41, 35, 0, NULL, NULL, NULL, NULL, '2020-03-10 17:50:27', '2020-03-10 17:50:27'),
(42, 36, 0, NULL, NULL, NULL, NULL, '2020-03-10 17:55:26', '2020-03-10 17:55:26'),
(43, 37, 0, NULL, NULL, NULL, NULL, '2020-03-10 20:02:39', '2020-03-10 20:02:39'),
(44, 38, 0, NULL, NULL, NULL, NULL, '2020-03-11 18:59:49', '2020-03-11 18:59:49'),
(45, 39, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:28:08', '2020-03-12 11:28:08'),
(46, 40, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:29:16', '2020-03-12 11:29:16'),
(47, 41, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:33:27', '2020-03-12 11:33:27'),
(48, 42, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:35:26', '2020-03-12 11:35:26'),
(49, 43, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:53:08', '2020-03-12 11:53:08'),
(50, 44, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:57:28', '2020-03-12 11:57:28'),
(51, 45, 0, NULL, NULL, NULL, NULL, '2020-03-12 11:59:12', '2020-03-12 11:59:12'),
(52, 46, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:00:49', '2020-03-12 12:00:49'),
(53, 47, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:01:45', '2020-03-12 12:01:45'),
(54, 48, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:03:46', '2020-03-12 12:03:46'),
(55, 49, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:06:19', '2020-03-12 12:06:19'),
(56, 50, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:08:52', '2020-03-12 12:08:52'),
(57, 51, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:12:38', '2020-03-12 12:12:38'),
(58, 52, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:15:08', '2020-03-12 12:15:08'),
(59, 53, 0, NULL, NULL, NULL, NULL, '2020-03-12 12:16:06', '2020-03-12 12:16:06'),
(60, 54, 0, NULL, NULL, NULL, NULL, '2020-03-12 15:55:56', '2020-03-12 15:55:56'),
(61, 55, 0, NULL, NULL, NULL, NULL, '2020-03-12 15:57:45', '2020-03-12 15:57:45'),
(62, 56, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:00:35', '2020-03-12 16:00:35'),
(63, 57, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:02:30', '2020-03-12 16:02:30'),
(64, 58, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:03:22', '2020-03-12 16:03:22'),
(65, 59, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:04:44', '2020-03-12 16:04:44'),
(66, 60, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:05:38', '2020-03-12 16:05:38'),
(67, 61, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:06:19', '2020-03-12 16:06:19'),
(68, 62, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:07:33', '2020-03-12 16:07:33'),
(69, 63, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:13:47', '2020-03-12 16:13:47'),
(70, 64, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:22:33', '2020-03-12 16:22:33'),
(71, 65, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:24:16', '2020-03-12 16:24:16'),
(72, 66, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:25:21', '2020-03-12 16:25:21'),
(73, 67, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:27:08', '2020-03-12 16:27:08'),
(74, 68, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:28:51', '2020-03-12 16:28:51'),
(75, 69, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:29:57', '2020-03-12 16:29:57'),
(76, 70, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:31:08', '2020-03-12 16:31:08'),
(77, 71, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:31:57', '2020-03-12 16:31:57'),
(78, 72, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:34:51', '2020-03-12 16:34:51'),
(79, 73, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:36:00', '2020-03-12 16:36:00'),
(80, 74, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:38:25', '2020-03-12 16:38:25'),
(81, 75, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:39:40', '2020-03-12 16:39:40'),
(82, 76, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:42:05', '2020-03-12 16:42:05'),
(83, 77, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:43:08', '2020-03-12 16:43:08'),
(84, 78, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:45:47', '2020-03-12 16:45:47'),
(85, 79, 0, NULL, NULL, NULL, NULL, '2020-03-12 16:46:34', '2020-03-12 16:46:34'),
(86, 80, 0, NULL, NULL, NULL, NULL, '2020-03-12 19:59:08', '2020-03-12 19:59:08'),
(87, 81, 0, NULL, NULL, NULL, NULL, '2020-03-14 12:10:41', '2020-03-14 12:10:41'),
(88, 82, 0, NULL, NULL, NULL, NULL, '2020-03-14 15:45:00', '2020-03-14 15:45:00'),
(89, 83, 0, NULL, NULL, NULL, NULL, '2020-03-14 15:46:03', '2020-03-14 15:46:03'),
(90, 84, 0, NULL, NULL, NULL, NULL, '2020-03-14 15:47:04', '2020-03-14 15:47:04'),
(91, 85, 0, NULL, NULL, NULL, NULL, '2020-03-14 16:24:04', '2020-03-14 16:24:04'),
(92, 86, 0, NULL, NULL, NULL, NULL, '2020-03-14 16:25:12', '2020-03-14 16:25:12'),
(93, 87, 0, NULL, NULL, NULL, NULL, '2020-03-14 16:26:04', '2020-03-14 16:26:04'),
(94, 88, 0, NULL, NULL, NULL, NULL, '2020-03-14 16:26:52', '2020-03-14 16:26:52'),
(95, 89, 0, NULL, NULL, NULL, NULL, '2020-03-14 17:23:33', '2020-03-14 17:23:33'),
(96, 90, 0, NULL, NULL, NULL, NULL, '2020-03-14 17:24:29', '2020-03-14 17:24:29'),
(97, 91, 0, NULL, NULL, NULL, NULL, '2020-03-14 17:25:12', '2020-03-14 17:25:12'),
(98, 92, 0, NULL, NULL, NULL, NULL, '2020-03-14 17:26:42', '2020-03-14 17:26:42'),
(99, 93, 0, NULL, NULL, NULL, NULL, '2020-03-15 18:29:03', '2020-03-15 18:29:03'),
(100, 94, 0, NULL, NULL, NULL, NULL, '2020-03-15 18:32:31', '2020-03-15 18:32:31'),
(101, 95, 0, NULL, NULL, NULL, NULL, '2020-03-15 18:33:26', '2020-03-15 18:33:26'),
(102, 96, 0, NULL, NULL, NULL, NULL, '2020-03-15 18:37:22', '2020-03-15 18:37:22'),
(103, 97, 0, NULL, NULL, NULL, NULL, '2020-03-15 18:42:23', '2020-03-15 18:42:23'),
(104, 98, 0, NULL, NULL, NULL, NULL, '2020-03-15 19:01:30', '2020-03-15 19:01:30'),
(105, 99, 0, NULL, NULL, NULL, NULL, '2020-03-15 19:03:42', '2020-03-15 19:03:42'),
(106, 100, 0, NULL, NULL, NULL, NULL, '2020-03-15 19:14:00', '2020-03-15 19:14:00'),
(107, 101, 0, NULL, NULL, NULL, NULL, '2020-03-15 19:16:09', '2020-03-15 19:16:09'),
(108, 102, 0, NULL, NULL, NULL, NULL, '2020-03-15 19:19:58', '2020-03-15 19:19:58'),
(109, 103, 0, NULL, NULL, NULL, NULL, '2020-03-15 19:21:15', '2020-03-15 19:21:15'),
(110, 104, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:13:22', '2020-03-15 20:13:22'),
(111, 105, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:15:45', '2020-03-15 20:15:45'),
(112, 106, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:17:51', '2020-03-15 20:17:51'),
(113, 107, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:37:56', '2020-03-15 20:37:56'),
(114, 108, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:39:53', '2020-03-15 20:39:53'),
(115, 109, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:41:12', '2020-03-15 20:41:12'),
(116, 110, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:44:14', '2020-03-15 20:44:14'),
(117, 111, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:45:22', '2020-03-15 20:45:22'),
(118, 112, 0, NULL, NULL, NULL, NULL, '2020-03-15 20:51:12', '2020-03-15 20:51:12'),
(119, 113, 0, NULL, NULL, NULL, NULL, '2020-03-16 10:27:59', '2020-03-16 10:27:59'),
(120, 114, 0, NULL, NULL, NULL, NULL, '2020-03-16 10:45:25', '2020-03-16 10:45:25'),
(121, 115, 0, NULL, NULL, NULL, NULL, '2020-03-16 11:22:51', '2020-03-16 11:22:51'),
(122, 116, 0, NULL, NULL, NULL, NULL, '2020-03-16 11:23:39', '2020-03-16 11:23:39'),
(123, 117, 0, NULL, NULL, NULL, NULL, '2020-03-16 17:56:58', '2020-03-16 17:56:58'),
(124, 118, 0, NULL, NULL, NULL, NULL, '2020-03-16 17:57:50', '2020-03-16 17:57:50'),
(125, 119, 0, NULL, NULL, NULL, NULL, '2020-03-16 17:59:03', '2020-03-16 17:59:03'),
(126, 120, 0, NULL, NULL, NULL, NULL, '2020-03-16 17:59:40', '2020-03-16 17:59:40'),
(127, 121, 0, NULL, NULL, NULL, NULL, '2020-03-16 18:00:27', '2020-03-16 18:00:27'),
(128, 122, 0, NULL, NULL, NULL, NULL, '2020-03-16 18:01:22', '2020-03-16 18:01:22'),
(129, 123, 0, NULL, NULL, NULL, NULL, '2020-03-16 18:02:53', '2020-03-16 18:02:53'),
(130, 124, 0, NULL, NULL, NULL, NULL, '2020-03-16 18:05:23', '2020-03-16 18:05:23'),
(131, 125, 0, NULL, NULL, NULL, NULL, '2020-03-16 18:45:03', '2020-03-16 18:45:03'),
(132, 126, 0, NULL, NULL, NULL, NULL, '2020-03-17 10:47:54', '2020-03-17 10:47:54'),
(133, 127, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:35:59', '2020-03-18 15:35:59'),
(134, 128, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:41:07', '2020-03-18 15:41:07'),
(135, 129, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:44:13', '2020-03-18 15:44:13'),
(136, 130, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:51:32', '2020-03-18 15:51:32'),
(137, 131, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:53:18', '2020-03-18 15:53:18'),
(138, 132, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:54:03', '2020-03-18 15:54:03'),
(139, 133, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:55:28', '2020-03-18 15:55:28'),
(140, 134, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:56:08', '2020-03-18 15:56:08'),
(141, 135, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:57:50', '2020-03-18 15:57:50'),
(142, 136, 0, NULL, NULL, NULL, NULL, '2020-03-18 15:59:41', '2020-03-18 15:59:41'),
(143, 137, 0, NULL, NULL, NULL, NULL, '2020-03-18 16:09:34', '2020-03-18 16:09:34'),
(144, 138, 0, NULL, NULL, NULL, NULL, '2020-03-18 16:10:34', '2020-03-18 16:10:34'),
(145, 139, 0, NULL, NULL, NULL, NULL, '2020-03-18 16:11:28', '2020-03-18 16:11:28'),
(146, 140, 0, NULL, NULL, NULL, NULL, '2020-03-18 16:12:36', '2020-03-18 16:12:36'),
(147, 141, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:31:09', '2020-03-18 19:31:09'),
(148, 142, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:31:52', '2020-03-18 19:31:52'),
(149, 143, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:32:57', '2020-03-18 19:32:57'),
(150, 144, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:33:44', '2020-03-18 19:33:44'),
(151, 145, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:37:15', '2020-03-18 19:37:15'),
(152, 146, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:38:57', '2020-03-18 19:38:57'),
(153, 147, 0, NULL, NULL, NULL, NULL, '2020-03-18 19:41:19', '2020-03-18 19:41:19'),
(154, 148, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:10:19', '2020-03-19 10:10:19'),
(155, 149, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:10:58', '2020-03-19 10:10:58'),
(156, 151, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:13:54', '2020-03-19 10:13:54'),
(157, 152, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:14:34', '2020-03-19 10:14:34'),
(158, 153, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:15:15', '2020-03-19 10:15:15'),
(159, 154, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:17:28', '2020-03-19 10:17:28'),
(160, 155, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:18:07', '2020-03-19 10:18:07'),
(161, 156, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:19:17', '2020-03-19 10:19:17'),
(162, 157, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:20:12', '2020-03-19 10:20:12'),
(163, 158, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:21:18', '2020-03-19 10:21:18'),
(164, 159, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:22:13', '2020-03-19 10:22:13'),
(165, 160, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:29:13', '2020-03-19 10:29:13'),
(166, 161, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:58:39', '2020-03-19 10:58:39'),
(167, 162, 0, NULL, NULL, NULL, NULL, '2020-03-19 10:59:22', '2020-03-19 10:59:22'),
(168, 163, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:01:34', '2020-03-19 11:01:34'),
(169, 164, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:02:33', '2020-03-19 11:02:33'),
(170, 165, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:03:18', '2020-03-19 11:03:18'),
(171, 166, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:04:16', '2020-03-19 11:04:16'),
(172, 167, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:24:23', '2020-03-19 11:24:23'),
(173, 168, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:34:03', '2020-03-19 11:34:03'),
(174, 169, 0, NULL, NULL, NULL, NULL, '2020-03-19 11:48:06', '2020-03-19 11:48:06'),
(175, 170, 0, NULL, NULL, NULL, NULL, '2020-03-21 10:02:10', '2020-03-21 10:02:10'),
(176, 171, 0, NULL, NULL, NULL, NULL, '2020-03-21 10:04:48', '2020-03-21 10:04:48'),
(177, 172, 0, NULL, NULL, NULL, NULL, '2020-03-21 10:05:55', '2020-03-21 10:05:55'),
(178, 173, 0, NULL, NULL, NULL, NULL, '2020-03-21 10:07:55', '2020-03-21 10:07:55'),
(179, 174, 0, NULL, NULL, NULL, NULL, '2020-03-21 11:32:57', '2020-03-21 11:32:57'),
(180, 175, 0, NULL, NULL, NULL, NULL, '2020-03-21 11:34:41', '2020-03-21 11:34:41'),
(181, 176, 0, NULL, NULL, NULL, NULL, '2020-03-21 11:35:31', '2020-03-21 11:35:31'),
(182, 177, 0, NULL, NULL, NULL, NULL, '2020-03-21 19:12:11', '2020-03-21 19:12:11'),
(183, 178, 0, NULL, NULL, NULL, NULL, '2020-03-22 09:52:41', '2020-03-22 09:52:41'),
(184, 179, 0, NULL, NULL, NULL, NULL, '2020-03-22 09:55:00', '2020-03-22 09:55:00'),
(185, 180, 0, NULL, NULL, NULL, NULL, '2020-03-22 09:56:24', '2020-03-22 09:56:24'),
(186, 181, 0, NULL, NULL, NULL, NULL, '2020-03-22 09:58:00', '2020-03-22 09:58:00'),
(187, 182, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:38:45', '2020-03-22 10:38:45'),
(188, 183, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:40:20', '2020-03-22 10:40:20'),
(189, 184, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:41:38', '2020-03-22 10:41:38'),
(190, 185, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:44:24', '2020-03-22 10:44:24'),
(191, 186, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:46:07', '2020-03-22 10:46:07'),
(192, 187, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:48:20', '2020-03-22 10:48:20'),
(193, 188, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:50:04', '2020-03-22 10:50:04'),
(194, 189, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:52:46', '2020-03-22 10:52:46'),
(195, 190, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:54:01', '2020-03-22 10:54:01'),
(196, 191, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:55:02', '2020-03-22 10:55:02'),
(197, 192, 0, NULL, NULL, NULL, NULL, '2020-03-22 10:55:44', '2020-03-22 10:55:44'),
(198, 193, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:09:27', '2020-03-22 11:09:27'),
(199, 194, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:15:57', '2020-03-22 11:15:57'),
(200, 195, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:27:04', '2020-03-22 11:27:04'),
(201, 196, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:27:47', '2020-03-22 11:27:47'),
(202, 197, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:28:28', '2020-03-22 11:28:28'),
(203, 198, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:29:26', '2020-03-22 11:29:26'),
(204, 199, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:30:13', '2020-03-22 11:30:13'),
(205, 200, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:33:33', '2020-03-22 11:33:33'),
(206, 201, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:34:58', '2020-03-22 11:34:58'),
(207, 202, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:35:47', '2020-03-22 11:35:47'),
(208, 203, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:39:36', '2020-03-22 11:39:36'),
(209, 204, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:40:45', '2020-03-22 11:40:45'),
(210, 205, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:47:06', '2020-03-22 11:47:06'),
(211, 207, 0, NULL, NULL, NULL, NULL, '2020-03-22 11:58:05', '2020-03-22 11:58:05'),
(212, 208, 0, NULL, NULL, NULL, NULL, '2020-03-22 12:08:07', '2020-03-22 12:08:07'),
(213, 209, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:42:30', '2020-03-22 16:42:30'),
(214, 210, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:43:43', '2020-03-22 16:43:43'),
(215, 211, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:50:00', '2020-03-22 16:50:00'),
(216, 213, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:51:35', '2020-03-22 16:51:35'),
(217, 214, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:52:54', '2020-03-22 16:52:54'),
(218, 215, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:54:33', '2020-03-22 16:54:33'),
(219, 216, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:55:27', '2020-03-22 16:55:27'),
(220, 217, 0, NULL, NULL, NULL, NULL, '2020-03-22 16:56:10', '2020-03-22 16:56:10'),
(221, 218, 0, NULL, NULL, NULL, NULL, '2020-03-22 17:04:53', '2020-03-22 17:04:53'),
(222, 219, 0, NULL, NULL, NULL, NULL, '2020-09-06 10:24:51', '2020-09-06 10:24:51'),
(223, 220, 0, NULL, NULL, NULL, NULL, '2020-09-07 15:18:36', '2020-09-07 15:18:36'),
(224, 221, 0, NULL, NULL, NULL, NULL, '2020-09-10 11:17:06', '2020-09-10 11:17:06'),
(225, 221, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:28:34', '2022-07-14 05:28:34'),
(226, 222, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:43:09', '2022-07-14 05:43:09'),
(227, 223, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:47:04', '2022-07-14 05:47:04'),
(228, 224, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:49:05', '2022-07-14 05:49:05'),
(229, 225, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:50:32', '2022-07-14 05:50:32'),
(230, 226, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:51:52', '2022-07-14 05:51:52'),
(231, 227, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:52:55', '2022-07-14 05:52:55'),
(232, 228, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:54:09', '2022-07-14 05:54:09'),
(233, 229, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:55:19', '2022-07-14 05:55:19'),
(234, 230, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:56:11', '2022-07-14 05:56:11'),
(235, 231, 0, NULL, NULL, NULL, NULL, '2022-07-14 05:59:53', '2022-07-14 05:59:53'),
(236, 232, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:00:42', '2022-07-14 06:00:42'),
(237, 233, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:02:30', '2022-07-14 06:02:30'),
(238, 234, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:07:41', '2022-07-14 06:07:41'),
(239, 235, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:11:01', '2022-07-14 06:11:01'),
(240, 236, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:11:42', '2022-07-14 06:11:42'),
(241, 237, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:13:34', '2022-07-14 06:13:34'),
(242, 238, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:17:23', '2022-07-14 06:17:23'),
(243, 239, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:17:50', '2022-07-14 06:17:50'),
(244, 240, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:18:43', '2022-07-14 06:18:43'),
(245, 241, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:19:29', '2022-07-14 06:19:29'),
(246, 242, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:20:26', '2022-07-14 06:20:26'),
(247, 243, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:21:11', '2022-07-14 06:21:11'),
(248, 244, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:41:50', '2022-07-14 06:41:50'),
(249, 245, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:42:31', '2022-07-14 06:42:31'),
(250, 246, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:43:15', '2022-07-14 06:43:15'),
(251, 247, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:43:59', '2022-07-14 06:43:59'),
(252, 248, 0, NULL, NULL, NULL, NULL, '2022-07-14 06:44:48', '2022-07-14 06:44:48'),
(253, 249, 0, NULL, NULL, NULL, NULL, '2022-07-18 12:24:56', '2022-07-18 12:24:56'),
(254, 250, 0, NULL, NULL, NULL, NULL, '2022-08-25 08:27:01', '2022-08-25 08:27:01'),
(255, 251, 0, NULL, NULL, NULL, NULL, '2022-08-31 08:56:16', '2022-08-31 08:56:16'),
(256, 253, 0, NULL, NULL, NULL, NULL, '2022-09-11 10:48:18', '2022-09-11 10:48:18'),
(257, 254, 0, NULL, NULL, NULL, NULL, '2022-09-11 11:13:10', '2022-09-11 11:13:10'),
(258, 255, 0, NULL, NULL, NULL, NULL, '2022-09-18 06:51:13', '2022-09-18 06:51:13'),
(259, 256, 0, NULL, NULL, NULL, NULL, '2022-09-18 07:36:20', '2022-09-18 07:36:20'),
(260, 257, 0, NULL, NULL, NULL, NULL, '2022-09-19 10:12:42', '2022-09-19 10:12:42'),
(261, 258, 0, NULL, NULL, NULL, NULL, '2022-09-19 10:40:13', '2022-09-19 10:40:13'),
(262, 259, 0, NULL, NULL, NULL, NULL, '2022-09-20 10:15:12', '2022-09-20 10:15:12'),
(263, 260, 0, NULL, NULL, NULL, NULL, '2022-09-20 10:38:10', '2022-09-20 10:38:10'),
(264, 261, 0, NULL, NULL, NULL, NULL, '2022-09-20 10:50:03', '2022-09-20 10:50:03'),
(265, 263, 0, NULL, NULL, NULL, NULL, '2022-11-26 05:56:22', '2022-11-26 05:56:22'),
(266, 264, 0, NULL, NULL, NULL, NULL, '2022-11-26 06:21:12', '2022-11-26 06:21:12'),
(267, 265, 0, NULL, NULL, NULL, NULL, '2022-12-05 04:23:38', '2022-12-05 04:23:38'),
(268, 267, 0, NULL, NULL, NULL, NULL, '2022-12-05 04:51:05', '2022-12-05 04:51:05'),
(269, 268, 0, NULL, NULL, NULL, NULL, '2022-12-08 11:24:37', '2022-12-08 11:24:37'),
(270, 269, 0, NULL, NULL, NULL, NULL, '2022-12-08 11:39:40', '2022-12-08 11:39:40'),
(271, 270, 0, NULL, NULL, NULL, NULL, '2022-12-08 11:46:06', '2022-12-08 11:46:06'),
(272, 271, 0, NULL, NULL, NULL, NULL, '2022-12-14 12:31:16', '2022-12-14 12:31:16'),
(273, 272, 0, NULL, NULL, NULL, NULL, '2022-12-18 03:09:52', '2022-12-18 03:09:52'),
(274, 276, 0, NULL, NULL, NULL, NULL, '2022-12-24 06:52:37', '2022-12-24 06:52:37'),
(275, 278, 0, NULL, NULL, NULL, NULL, '2022-12-31 08:26:01', '2022-12-31 08:26:01'),
(276, 279, 0, NULL, NULL, NULL, NULL, '2023-01-03 04:55:34', '2023-01-03 04:55:34'),
(277, 280, 0, NULL, NULL, NULL, NULL, '2023-01-18 02:25:14', '2023-01-18 02:25:14'),
(278, 281, 0, NULL, NULL, NULL, NULL, '2023-01-18 02:32:03', '2023-01-18 02:32:03'),
(279, 282, 0, NULL, NULL, NULL, NULL, '2023-01-18 11:27:21', '2023-01-18 11:27:21'),
(280, 283, 0, NULL, NULL, NULL, NULL, '2023-01-25 04:27:28', '2023-01-25 04:27:28'),
(281, 285, 0, NULL, NULL, NULL, NULL, '2023-01-25 04:37:39', '2023-01-25 04:37:39'),
(282, 286, 0, NULL, NULL, NULL, NULL, '2023-01-25 04:58:29', '2023-01-25 04:58:29'),
(283, 287, 0, NULL, NULL, NULL, NULL, '2023-01-25 05:10:02', '2023-01-25 05:10:02'),
(284, 288, 0, NULL, NULL, NULL, NULL, '2023-01-25 05:25:23', '2023-01-25 05:25:23'),
(285, 289, 0, NULL, NULL, NULL, NULL, '2023-01-25 05:40:28', '2023-01-25 05:40:28'),
(286, 290, 0, NULL, NULL, NULL, NULL, '2023-01-25 05:58:43', '2023-01-25 05:58:43'),
(287, 291, 0, NULL, NULL, NULL, NULL, '2023-01-26 03:52:12', '2023-01-26 03:52:12'),
(288, 292, 0, NULL, NULL, NULL, NULL, '2023-01-26 04:19:01', '2023-01-26 04:19:01'),
(289, 293, 0, NULL, NULL, NULL, NULL, '2023-01-26 04:31:44', '2023-01-26 04:31:44'),
(290, 294, 0, NULL, NULL, NULL, NULL, '2023-01-26 04:40:35', '2023-01-26 04:40:35'),
(291, 295, 0, NULL, NULL, NULL, NULL, '2023-01-26 05:18:50', '2023-01-26 05:18:50'),
(292, 296, 0, NULL, NULL, NULL, NULL, '2023-01-26 05:27:15', '2023-01-26 05:27:15'),
(293, 297, 0, NULL, NULL, NULL, NULL, '2023-01-26 05:41:07', '2023-01-26 05:41:07'),
(294, 298, 0, NULL, NULL, NULL, NULL, '2023-01-26 05:49:30', '2023-01-26 05:49:30'),
(295, 299, 0, NULL, NULL, NULL, NULL, '2023-01-26 05:58:46', '2023-01-26 05:58:46'),
(296, 300, 0, NULL, NULL, NULL, NULL, '2023-01-26 06:07:09', '2023-01-26 06:07:09'),
(297, 301, 0, NULL, NULL, NULL, NULL, '2023-01-26 06:15:52', '2023-01-26 06:15:52'),
(298, 302, 0, NULL, NULL, NULL, NULL, '2023-01-26 06:21:15', '2023-01-26 06:21:15'),
(299, 303, 0, NULL, NULL, NULL, NULL, '2023-01-26 06:27:35', '2023-01-26 06:27:35'),
(300, 304, 0, NULL, NULL, NULL, NULL, '2023-01-26 06:33:01', '2023-01-26 06:33:01'),
(301, 306, 0, NULL, NULL, NULL, NULL, '2023-01-26 06:56:06', '2023-01-26 06:56:06'),
(302, 307, 0, NULL, NULL, NULL, NULL, '2023-01-26 07:13:06', '2023-01-26 07:13:06'),
(303, 308, 0, NULL, NULL, NULL, NULL, '2023-01-26 07:21:52', '2023-01-26 07:21:52'),
(304, 309, 0, NULL, NULL, NULL, NULL, '2023-01-26 07:30:42', '2023-01-26 07:30:42'),
(305, 310, 0, NULL, NULL, NULL, NULL, '2023-01-29 06:21:16', '2023-01-29 06:21:16'),
(306, 311, 0, NULL, NULL, NULL, NULL, '2023-01-29 06:36:08', '2023-01-29 06:36:08'),
(307, 312, 0, NULL, NULL, NULL, NULL, '2023-01-29 06:49:15', '2023-01-29 06:49:15'),
(308, 313, 0, NULL, NULL, NULL, NULL, '2023-01-29 06:57:59', '2023-01-29 06:57:59'),
(309, 314, 0, NULL, NULL, NULL, NULL, '2023-01-29 07:08:16', '2023-01-29 07:08:16'),
(310, 315, 0, NULL, NULL, NULL, NULL, '2023-01-29 07:13:57', '2023-01-29 07:13:57'),
(311, 316, 0, NULL, NULL, NULL, NULL, '2023-01-29 07:18:34', '2023-01-29 07:18:34'),
(312, 317, 0, NULL, NULL, NULL, NULL, '2023-02-05 04:48:31', '2023-02-05 04:48:31'),
(313, 319, 0, NULL, NULL, NULL, NULL, '2023-02-06 06:05:21', '2023-02-06 06:05:21'),
(314, 321, 0, NULL, NULL, NULL, NULL, '2023-02-22 04:52:31', '2023-02-22 04:52:31'),
(315, 322, 0, NULL, NULL, NULL, NULL, '2023-03-04 04:15:06', '2023-03-04 04:15:06'),
(316, 323, 0, NULL, NULL, NULL, NULL, '2023-03-04 04:42:37', '2023-03-04 04:42:37'),
(317, 324, 0, NULL, NULL, NULL, NULL, '2023-03-04 05:32:43', '2023-03-04 05:32:43'),
(318, 325, 0, NULL, NULL, NULL, NULL, '2023-03-04 05:42:35', '2023-03-04 05:42:35'),
(319, 326, 0, NULL, NULL, NULL, NULL, '2023-03-04 05:52:36', '2023-03-04 05:52:36'),
(320, 327, 0, NULL, NULL, NULL, NULL, '2023-03-04 06:02:23', '2023-03-04 06:02:23'),
(321, 328, 0, NULL, NULL, NULL, NULL, '2023-03-04 06:12:22', '2023-03-04 06:12:22'),
(322, 329, 0, NULL, NULL, NULL, NULL, '2023-03-04 06:17:49', '2023-03-04 06:17:49'),
(323, 330, 0, NULL, NULL, NULL, NULL, '2023-03-04 06:25:47', '2023-03-04 06:25:47'),
(324, 331, 0, NULL, NULL, NULL, NULL, '2023-03-04 06:48:20', '2023-03-04 06:48:20'),
(325, 332, 0, NULL, NULL, NULL, NULL, '2023-03-04 06:54:35', '2023-03-04 06:54:35'),
(326, 333, 0, NULL, NULL, NULL, NULL, '2023-03-04 09:29:03', '2023-03-04 09:29:03'),
(327, 334, 0, NULL, NULL, NULL, NULL, '2023-03-27 08:53:37', '2023-03-27 08:53:37'),
(328, 335, 0, NULL, NULL, NULL, NULL, '2023-04-04 06:00:34', '2023-04-04 06:00:34'),
(329, 336, 0, NULL, NULL, NULL, NULL, '2023-04-04 06:05:32', '2023-04-04 06:05:32'),
(330, 337, 0, NULL, NULL, NULL, NULL, '2023-04-04 06:49:03', '2023-04-04 06:49:03'),
(331, 338, 0, NULL, NULL, NULL, NULL, '2023-04-04 06:55:58', '2023-04-04 06:55:58'),
(332, 339, 0, NULL, NULL, NULL, NULL, '2023-04-04 06:59:15', '2023-04-04 06:59:15'),
(333, 340, 0, NULL, NULL, NULL, NULL, '2023-04-04 07:05:19', '2023-04-04 07:05:19'),
(334, 350, 0, NULL, NULL, NULL, NULL, '2023-04-04 07:20:43', '2023-04-04 07:20:43'),
(335, 351, 0, NULL, NULL, NULL, NULL, '2023-04-04 07:24:49', '2023-04-04 07:24:49'),
(336, 352, 0, NULL, NULL, NULL, NULL, '2023-04-05 06:39:00', '2023-04-05 06:39:00'),
(337, 353, 0, NULL, NULL, NULL, NULL, '2023-04-05 06:44:48', '2023-04-05 06:44:48'),
(338, 354, 0, NULL, NULL, NULL, NULL, '2023-04-05 06:47:06', '2023-04-05 06:47:06'),
(339, 355, 0, NULL, NULL, NULL, NULL, '2023-04-05 06:49:10', '2023-04-05 06:49:10'),
(340, 356, 0, NULL, NULL, NULL, NULL, '2023-04-05 06:53:03', '2023-04-05 06:53:03'),
(341, 357, 0, NULL, NULL, NULL, NULL, '2023-04-05 06:59:27', '2023-04-05 06:59:27'),
(342, 358, 0, NULL, NULL, NULL, NULL, '2023-04-05 07:06:41', '2023-04-05 07:06:41'),
(343, 359, 0, NULL, NULL, NULL, NULL, '2023-04-05 07:10:31', '2023-04-05 07:10:31'),
(344, 360, 0, NULL, NULL, NULL, NULL, '2023-04-05 07:12:26', '2023-04-05 07:12:26'),
(345, 363, 0, NULL, NULL, NULL, NULL, '2023-04-05 07:21:56', '2023-04-05 07:21:56'),
(346, 364, 0, NULL, NULL, NULL, NULL, '2023-04-05 07:25:36', '2023-04-05 07:25:36'),
(347, 365, 0, NULL, NULL, NULL, NULL, '2023-04-06 04:06:45', '2023-04-06 04:06:45'),
(348, 368, 0, NULL, NULL, NULL, NULL, '2023-04-06 04:40:42', '2023-04-06 04:40:42'),
(349, 369, 0, NULL, NULL, NULL, NULL, '2023-04-06 04:47:25', '2023-04-06 04:47:25'),
(350, 370, 0, NULL, NULL, NULL, NULL, '2023-04-06 04:54:38', '2023-04-06 04:54:38'),
(351, 372, 0, NULL, NULL, NULL, NULL, '2023-04-06 05:09:34', '2023-04-06 05:09:34'),
(352, 373, 0, NULL, NULL, NULL, NULL, '2023-04-06 05:24:34', '2023-04-06 05:24:34'),
(353, 374, 0, NULL, NULL, NULL, NULL, '2023-04-06 06:04:52', '2023-04-06 06:04:52'),
(354, 375, 0, NULL, NULL, NULL, NULL, '2023-04-06 06:11:17', '2023-04-06 06:11:17'),
(355, 376, 0, NULL, NULL, NULL, NULL, '2023-04-06 06:19:47', '2023-04-06 06:19:47'),
(356, 377, 0, NULL, NULL, NULL, NULL, '2023-04-08 04:35:38', '2023-04-08 04:35:38'),
(357, 378, 0, NULL, NULL, NULL, NULL, '2023-04-15 04:53:20', '2023-04-15 04:53:20'),
(358, 379, 0, NULL, NULL, NULL, NULL, '2023-04-17 04:34:40', '2023-04-17 04:34:40'),
(359, 380, 0, NULL, NULL, NULL, NULL, '2023-04-17 04:54:06', '2023-04-17 04:54:06'),
(360, 381, 0, NULL, NULL, NULL, NULL, '2023-04-18 04:05:37', '2023-04-18 04:05:37'),
(361, 382, 0, NULL, NULL, NULL, NULL, '2023-04-18 04:12:18', '2023-04-18 04:12:18'),
(362, 383, 0, NULL, NULL, NULL, NULL, '2023-04-18 04:18:47', '2023-04-18 04:18:47'),
(363, 384, 0, NULL, NULL, NULL, NULL, '2023-04-18 04:28:06', '2023-04-18 04:28:06'),
(364, 386, 0, NULL, NULL, NULL, NULL, '2023-04-30 07:00:27', '2023-04-30 07:00:27'),
(365, 387, 0, NULL, NULL, NULL, NULL, '2023-05-06 07:02:53', '2023-05-06 07:02:53'),
(366, 388, 0, NULL, NULL, NULL, NULL, '2023-06-17 06:29:49', '2023-06-17 06:29:49'),
(367, 389, 0, NULL, NULL, NULL, NULL, '2023-06-17 06:52:52', '2023-06-17 06:52:52'),
(368, 390, 0, NULL, NULL, NULL, NULL, '2023-06-17 07:04:55', '2023-06-17 07:04:55'),
(369, 391, 0, NULL, NULL, NULL, NULL, '2023-06-17 07:16:14', '2023-06-17 07:16:14'),
(370, 392, 0, NULL, NULL, NULL, NULL, '2023-06-17 07:27:36', '2023-06-17 07:27:36'),
(371, 393, 0, NULL, NULL, NULL, NULL, '2023-06-17 07:39:19', '2023-06-17 07:39:19'),
(372, 394, 0, NULL, NULL, NULL, NULL, '2023-06-25 07:24:32', '2023-06-25 07:24:32'),
(373, 398, 0, NULL, NULL, NULL, NULL, '2023-06-25 07:56:16', '2023-06-25 07:56:16'),
(374, 400, 0, NULL, NULL, NULL, NULL, '2023-07-05 07:07:55', '2023-07-05 07:07:55'),
(375, 401, 0, NULL, NULL, NULL, NULL, '2023-07-05 07:29:02', '2023-07-05 07:29:02'),
(376, 402, 0, NULL, NULL, NULL, NULL, '2023-07-05 07:35:39', '2023-07-05 07:35:39'),
(377, 403, 0, NULL, NULL, NULL, NULL, '2023-07-05 07:48:43', '2023-07-05 07:48:43'),
(378, 404, 0, NULL, NULL, NULL, NULL, '2023-07-05 07:51:50', '2023-07-05 07:51:50'),
(379, 405, 0, NULL, NULL, NULL, NULL, '2023-07-05 08:00:54', '2023-07-05 08:00:54'),
(380, 410, 0, NULL, NULL, NULL, NULL, '2023-07-06 04:01:39', '2023-07-06 04:01:39'),
(381, 411, 0, NULL, NULL, NULL, NULL, '2023-07-06 04:16:43', '2023-07-06 04:16:43'),
(382, 412, 0, NULL, NULL, NULL, NULL, '2023-07-06 04:23:48', '2023-07-06 04:23:48'),
(383, 413, 0, NULL, NULL, NULL, NULL, '2023-07-06 04:35:06', '2023-07-06 04:35:06'),
(384, 414, 0, NULL, NULL, NULL, NULL, '2023-07-06 04:45:25', '2023-07-06 04:45:25'),
(385, 415, 0, NULL, NULL, NULL, NULL, '2023-07-06 04:55:30', '2023-07-06 04:55:30'),
(386, 416, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:02:47', '2023-07-06 06:02:47'),
(387, 417, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:09:42', '2023-07-06 06:09:42'),
(388, 418, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:17:35', '2023-07-06 06:17:35'),
(389, 419, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:26:26', '2023-07-06 06:26:26'),
(390, 420, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:36:10', '2023-07-06 06:36:10'),
(391, 421, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:41:53', '2023-07-06 06:41:53'),
(392, 422, 0, NULL, NULL, NULL, NULL, '2023-07-06 06:48:35', '2023-07-06 06:48:35'),
(393, 423, 0, NULL, NULL, NULL, NULL, '2023-07-06 07:06:49', '2023-07-06 07:06:49'),
(394, 425, 0, NULL, NULL, NULL, NULL, '2023-07-06 07:19:58', '2023-07-06 07:19:58'),
(395, 426, 0, NULL, NULL, NULL, NULL, '2023-07-06 07:26:23', '2023-07-06 07:26:23'),
(396, 427, 0, NULL, NULL, NULL, NULL, '2023-07-11 04:04:52', '2023-07-11 04:04:52'),
(397, 428, 0, NULL, NULL, NULL, NULL, '2023-07-11 05:53:03', '2023-07-11 05:53:03'),
(398, 429, 0, NULL, NULL, NULL, NULL, '2023-07-11 07:24:00', '2023-07-11 07:24:00'),
(399, 430, 0, NULL, NULL, NULL, NULL, '2023-07-13 03:54:24', '2023-07-13 03:54:24'),
(400, 431, 0, NULL, NULL, NULL, NULL, '2023-07-13 06:29:26', '2023-07-13 06:29:26'),
(401, 432, 0, NULL, NULL, NULL, NULL, '2023-07-15 04:27:11', '2023-07-15 04:27:11'),
(402, 433, 0, NULL, NULL, NULL, NULL, '2023-08-15 16:01:02', '2023-08-15 16:01:02'),
(403, 434, 0, NULL, NULL, NULL, NULL, '2024-03-21 06:12:27', '2024-03-21 06:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `email`, `phone`, `address`, `code`, `document`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grocery Store', 'monzuautomobiles89@yahhho.com', '01773340092', 'Bangla Motor', 'SC-1', NULL, 1, '2020-02-24 09:09:28', '2020-02-24 09:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `store_attendences`
--

CREATE TABLE `store_attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendence_owner` int(40) NOT NULL DEFAULT 0,
  `employee_name` varchar(255) NOT NULL,
  `employee_id` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '1: Present\r\n0: Absent',
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_attendences`
--

INSERT INTO `store_attendences` (`id`, `attendence_owner`, `employee_name`, `employee_id`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 18, 'Selma Robbins', 21, 1, '22/08/2023', '2023-08-22 16:14:07', '2023-08-22 16:14:07'),
(2, 18, 'shakil', 112, 1, '22/08/2023', '2023-08-22 16:14:07', '2023-08-22 16:14:07'),
(3, 18, 'Selma Robbins', 21, 1, '23/08/2023', '2023-08-22 18:05:17', '2023-08-22 18:05:17'),
(4, 18, 'shakil', 112, 1, '23/08/2023', '2023-08-22 18:05:17', '2023-08-22 18:05:17'),
(5, 20, 'Selma Robbins', 21, 1, '20/03/2024', '2024-03-20 06:53:16', '2024-03-20 06:53:16'),
(6, 20, 'shakil', 112, 1, '20/03/2024', '2024-03-20 06:53:16', '2024-03-20 06:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `parentId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `image`, `code`, `description`, `slug`, `status`, `parentId`, `created_at`, `updated_at`) VALUES
(1, 'Olympia', NULL, 'SCC-1', NULL, 'olympia', 1, 4, '2022-05-12 09:10:50', '2022-05-12 09:10:50'),
(2, '250', NULL, 'SCC-2', 'ddddd', '250', 1, 6, '2022-09-19 10:37:43', '2022-09-19 10:37:43'),
(3, 'Lemon', NULL, 'SCC-3', 'jhkk;j', 'lemon', 1, 7, '2022-09-20 10:34:54', '2022-09-20 10:34:54'),
(4, 'T-shirt', NULL, 'SCC-4', 'Hello', 't-shirt', 1, 8, '2022-12-05 04:20:12', '2022-12-05 04:20:12'),
(5, 'shoe', NULL, 'SCC-5', NULL, 'shoe', 1, 8, '2022-12-05 04:48:44', '2022-12-05 04:48:44'),
(6, 'Herbal Shampoo', 'uploads/subcategory_image/c3.png', 'SCC-6', 'Herbal Shampoo', 'herbal-shampoo', 1, 10, '2024-03-20 09:44:43', '2024-03-20 09:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `start_balance` double DEFAULT NULL,
  `custom1` varchar(255) DEFAULT NULL,
  `custom2` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company`, `mobile`, `name`, `email`, `city`, `country`, `postal_code`, `address`, `start_balance`, `custom1`, `custom2`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'S/S Enterprise', '01817783135', 'sayed', 'tashfaautos@gmail.com', 'Dhaka', 'Bangladesh', NULL, 'Rampura , Banasree', 108800, NULL, NULL, 1, NULL, '2020-03-11 11:51:01', '2020-03-11 11:51:01'),
(2, 'Badal Limited', '029352273', 'Badal', 'badal_03@gmail.com', 'Dhaka', 'Bangladesh', NULL, 'Fantasia ac market , Banglamotor', NULL, NULL, NULL, 1, NULL, '2020-03-15 19:10:30', '2020-03-15 19:10:30'),
(3, 'Modern Dairy', '01711881983', 'shiblu', 'shibly.ahmed003@gmail.com', 'Dhaka', 'Bangladesh', NULL, 'Banglabazar', 94410, NULL, NULL, 1, NULL, '2020-03-17 10:58:13', '2020-03-17 10:58:13'),
(4, 'Nahid Enterprise', '01312010704', 'Nahin Khan', 'nahin_khan@outlook.com', 'Dhaka', 'Bangladesh', '1217', '50/3, Beside Ananda Bhaban Community Centre, Shantinagar', 100, NULL, NULL, 1, NULL, '2022-05-12 08:56:27', '2022-05-12 08:56:27'),
(5, 'adel', '0155', 'martina', 'martinatripura@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-09-19 10:35:15', '2022-09-19 10:35:15'),
(6, 'Brac', '0199999999', 'Sajid', 'sajid@gmail.com', 'nasd', 'asfsdfa', '12323', 'dafnsadfjh', 10000, NULL, NULL, 1, NULL, '2022-12-05 04:15:29', '2022-12-05 04:15:29'),
(7, 'Unilever', '01917955119', 'Pakhi', 'pakhi@gmail.com', 'Dhaka', 'Bangladesh', '1212', 'mohammadpur', NULL, NULL, NULL, 1, NULL, '2023-01-03 04:35:20', '2023-01-03 04:35:20'),
(8, 'khadi Ghor', '0157694206', 'Farzana Akter', 'farzana045@gmail.com', 'Chattogram', 'Bangladesh', '4002', 'Boddarhat', NULL, NULL, NULL, 1, NULL, '2023-07-05 06:33:14', '2023-07-05 06:33:14'),
(9, 'sj junaid', '01830208588', 'josim', 'sadibjunaid3088@gmail.com', 'Chattogram', 'Bangladesh', '4002', 'kolpolok', NULL, NULL, NULL, 1, NULL, '2023-07-05 07:02:47', '2023-07-05 07:02:47'),
(10, 'sj junaid', '01830208588', 'josim', 'sadibjunaid3088@gmail.com', 'Chattogram', 'Bangladesh', '4002', 'kolpolok', NULL, NULL, NULL, 1, NULL, '2023-07-05 07:02:47', '2023-07-05 07:02:47'),
(11, 'Gonzalez and Price Traders', '515645454', 'Md.Hasibur Rahman', 'shajid.hasibur1996@gmail.com', 'Uttara', 'Bangladesh', '1230', 'Uttara, Dhaka, Bangladesh', 10000, NULL, NULL, 1, 'uploads/supplier_image/p-5.jpg', '2024-03-18 09:04:52', '2024-03-18 09:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siteName` varchar(255) NOT NULL,
  `siteEmail` varchar(255) NOT NULL,
  `siteLogo` varchar(255) DEFAULT NULL,
  `sitePhone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `moto` text DEFAULT NULL,
  `unitCode` varchar(255) NOT NULL,
  `expenseCategoryUnit` varchar(255) NOT NULL,
  `brandCode` varchar(255) NOT NULL,
  `categoryCode` varchar(255) NOT NULL,
  `subCategoryCode` varchar(255) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `invoiceCode` varchar(255) NOT NULL,
  `purchaseCode` varchar(255) NOT NULL,
  `storeCode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `siteName`, `siteEmail`, `siteLogo`, `sitePhone`, `address`, `mobile`, `moto`, `unitCode`, `expenseCategoryUnit`, `brandCode`, `categoryCode`, `subCategoryCode`, `productCode`, `invoiceCode`, `purchaseCode`, `storeCode`, `created_at`, `updated_at`) VALUES
(1, 'BRAC POS SOFTWARE', 'brac@info.com', 'logo', '029351492/ 01813600979', '87 new esktaon road, Home town ac market , Banglamotor, Dhaka-1000', '01711563272', 'we ensure the best quality', 'pc', 'EC', 'BC', 'CC', 'SCC', 'PC', 'IC', 'PUC', 'SC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `base_unit` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `operation_value` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `code`, `name`, `base_unit`, `operator`, `operation_value`, `status`, `created_at`, `updated_at`) VALUES
(4, 'CIMSU-1', 'KG', NULL, NULL, NULL, 1, '2020-01-18 00:51:47', '2020-01-18 00:51:47'),
(5, 'CIMSU-2', 'PIC', NULL, NULL, NULL, 1, '2020-01-18 00:51:55', '2020-01-18 00:51:55'),
(7, 'CIMSU-3', 'Samll Carton', 'PIC', '*', '10', 1, '2020-01-18 00:53:24', '2020-01-18 00:53:24'),
(8, 'pc-4', 'pcs', NULL, NULL, NULL, 1, '2020-03-03 15:28:11', '2020-03-03 15:28:11'),
(9, 'pc-5', 'carton', NULL, NULL, NULL, 1, '2020-03-03 15:28:46', '2020-03-03 15:28:46'),
(10, 'pc-6', 'set', NULL, NULL, NULL, 1, '2020-03-03 15:28:59', '2020-03-03 15:28:59'),
(11, 'pc-7', 'Can', NULL, NULL, NULL, 1, '2020-03-09 17:12:53', '2020-03-09 17:12:53'),
(12, 'pc-8', 'Litre', NULL, NULL, NULL, 1, '2022-05-12 09:23:19', '2022-05-12 09:23:19');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shakil', 'shakil@gmail.com', NULL, '$2y$10$dtidSHHeJb5DffiLqrXYieinao97TdBOz3gHWBbyxBFOKs29cJCFS', 1, 0, NULL, '2023-08-15 06:17:54', '2023-08-15 06:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `webcats`
--

CREATE TABLE `webcats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webcats`
--

INSERT INTO `webcats` (`id`, `cname`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 'AIR  FILTER', 'public/uploads/image_400x400.png', 'store', 1, '2020-09-10 11:38:06', '2020-09-10 11:38:06'),
(9, 'WHEEL-BEARINGS', 'public/uploads/image2_400x400.png', 'WHEEL-BEARINGS', 1, '2020-09-10 11:40:06', '2020-09-10 11:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `webpros`
--

CREATE TABLE `webpros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webpros`
--

INSERT INTO `webpros` (`id`, `c_id`, `name`, `brand`, `condition`, `price`, `image`, `image1`, `image2`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, '7', 'HONDA 17220-5K0-A00 GENUINE AIR CLEANER FILTER', 'HONDA', 'New', 2000, 'public/uploads/HONDA-17220-5K0-A00-GENUINE-AIR-CLEANER-FILTER--600x400.jpg', 'public/uploads/HONDA-17220-5K0-A00-GENUINE-AIR-CLEANER-FILTER-600x332.jpg', 'public/uploads/HONDA-17220-5K0-A00-GENUINE-AIR-CLEANER-FILTER--600x400.jpg', '<p>good</p>', 1, '2020-09-12 06:13:39', '2020-09-12 06:13:39'),
(3, '7', 'HONDA 17220-R6A-J00 GENUINE AIR CLEANER FILTER', 'HONDA', 'New', 2200, 'public/uploads/HONDA-17220-R6A-J00-GENUINE-AIR-CLEANER-FILTER-600x400.jpg', 'public/uploads/HONDA-17220-R6A-J00-GENUINE-AIR-CLEANER-FILTER-600x400.jpg', 'public/uploads/HONDA-17220-R6A-J00-GENUINE-AIR-CLEANER-FILTER-600x400.jpg', '<p>best</p>', 1, '2020-09-12 06:15:38', '2020-09-12 06:15:38'),
(4, '7', 'HONDA 17220-RZA-000 GENUINE AIR CLEANER FILTER', 'HONDA', 'New', 2300, 'public/uploads/HONDA-17220-RZA-000-GENUINE-AIR-CLEANER-FILTER-600x892.jpg', 'public/uploads/HONDA-17220-RZA-000-GENUINE-AIR-CLEANER-FILTER-600x892.jpg', 'public/uploads/HONDA-17220-RZA-000-GENUINE-AIR-CLEANER-FILTER-600x892.jpg', '<p>best</p>', 1, '2020-09-12 06:17:09', '2020-09-12 06:17:09'),
(5, '9', 'KOYO DAC3870W-7CS66 FRONT AXLE WHEEL HUBS BEARING', 'KOYO', 'New', 4600, 'public/uploads/KOYO-DAC3870W-7CS66-FRONT-AXLE-WHEEL-HUBS-BEARING-600x400.jpg', 'public/uploads/KOYO-DAC3870W-7CS66-FRONT-AXLE-WHEEL-HUBS-BEARING-600x400.jpg', 'public/uploads/KOYO-DAC3870W-7CS66-FRONT-AXLE-WHEEL-HUBS-BEARING-600x400.jpg', '<p>good</p>', 1, '2020-09-12 06:19:48', '2020-09-12 06:19:48'),
(6, '9', 'KOYO TOYOTA FRONT AXLE WHEEL HUB BEARING', 'KOYO', 'New', 3500, 'public/uploads/bearings_online_koyo_dac4074w3cs80_toyotacorollafront_wheel_bearing.png', 'public/uploads/DAC4074W3CS80-768x576.jpg', 'public/uploads/bearings_online_koyo_dac4074w3cs80_toyotacorollafront_wheel_bearing.png', '<p>Good</p>', 1, '2020-09-12 06:20:57', '2020-09-12 06:20:57'),
(7, '9', 'MITSUBISHI MR418068 REAR AXLE WHEEL HUBS ASSY', 'MITSUBISHI', 'New', 4000, 'public/uploads/MITSUBISHI-MR418068-REAR-AXLE-WHEEL-HUBS-ASSY-600x400.jpg', 'public/uploads/MITSUBISHI-MR418068-REAR-AXLE-WHEEL-HUBS-ASSY-600x400.jpg', 'public/uploads/MITSUBISHI-MR418068-REAR-AXLE-WHEEL-HUBS-ASSY-600x400.jpg', '<p>good</p>', 1, '2020-09-12 06:21:54', '2020-09-12 06:21:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billers`
--
ALTER TABLE `billers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_code_unique` (`code`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_code_unique` (`code`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cheque_infos`
--
ALTER TABLE `cheque_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product_lists`
--
ALTER TABLE `purchase_product_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_due_returns`
--
ALTER TABLE `sales_due_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_attendences`
--
ALTER TABLE `store_attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_code_unique` (`code`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webcats`
--
ALTER TABLE `webcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webpros`
--
ALTER TABLE `webpros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billers`
--
ALTER TABLE `billers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cheque_infos`
--
ALTER TABLE `cheque_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_product_lists`
--
ALTER TABLE `purchase_product_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `sales_due_returns`
--
ALTER TABLE `sales_due_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=873;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_attendences`
--
ALTER TABLE `store_attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `webcats`
--
ALTER TABLE `webcats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `webpros`
--
ALTER TABLE `webpros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
