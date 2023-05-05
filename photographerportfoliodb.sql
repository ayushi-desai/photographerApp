-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2023 at 03:23 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql9615840`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `album_image` text,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `album_date` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `photographerId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`Id`, `userId`, `title`, `description`, `album_image`, `featured`, `created_at`, `updated_at`, `album_date`) VALUES
(1, 1, 'Nandhaka Pieris', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://photographappimages.s3.ca-central-1.amazonaws.com/landscape1.jpeg', 1, '2023-05-02 14:12:33', '2023-05-02 14:12:33', '2015-05-01'),
(2, 1, 'New West Calgary', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://photographappimages.s3.ca-central-1.amazonaws.com/landscape2.jpeg', 0, '2023-05-02 14:12:33', '2023-05-02 14:12:33', '2016-05-01'),
(3, 1, 'Australian Landscape', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://photographappimages.s3.ca-central-1.amazonaws.com/landscape3.jpeg', 0, '2023-05-02 14:14:50', '2023-05-02 14:14:50', '2015-02-02'),
(4, 1, 'Halvergate Marsh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://photographappimages.s3.ca-central-1.amazonaws.com/landscape4.jpeg', 1, '2023-05-02 14:14:50', '2023-05-02 14:14:50', '2014-04-01'),
(5, 1, 'Rikkis Landscape', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://photographappimages.s3.ca-central-1.amazonaws.com/landscape5.jpeg', 0, '2023-05-02 14:14:50', '2023-05-02 14:14:50', '2010-09-01'),
(6, 1, 'Kiddi Kristjans Iceland', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://photographappimages.s3.ca-central-1.amazonaws.com/landscape6.jpeg', 1, '2023-05-02 14:14:50', '2023-05-02 14:14:50', '2015-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'nick.reynolds@domain1.co', 'kvInSyLCp9o3Wqs7ae7AE7ALBApVUIyUAQKmPPk2', '2023-05-01 07:25:49', '2023-05-01 07:25:49'),
(2, 'nick.reynolds@domain.co', 'XB84C373gC', '2023-05-01 07:31:01', '2023-05-01 07:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('USER','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `profile_picture` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `role`, `bio`, `profile_picture`) VALUES
(1, 'Nick Reynolds', 'nick.reynolds@domain.co', NULL, '$2y$10$lZS.zjfqeHOnxOGX7sOdHufmoAje6bmPfdM8OtXyhU15pvMATmOtO', NULL, '2023-04-26 17:45:57', '2023-05-01 07:32:06', '555-555-5555', 'USER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL),
(2, 'Nick Reynolds', 'nick.reynolds@domain1.co', NULL, '$2y$10$dvyD6agOXhZjYi249pV9Me7nLWnwJWcq2W5aaonszgc8wbDMq8qXG', NULL, '2023-04-27 17:28:43', '2023-04-27 17:28:43', NULL, 'USER', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
