-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 10:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espark`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `contact` varchar(15) NOT NULL,
  `ssc_board` varchar(255) NOT NULL,
  `ssc_year` varchar(255) NOT NULL,
  `sss_grade` varchar(255) NOT NULL,
  `hsc_board` varchar(255) DEFAULT NULL,
  `hsc_year` varchar(255) DEFAULT NULL,
  `hsc_grade` varchar(255) DEFAULT NULL,
  `graduation_board` varchar(255) DEFAULT NULL,
  `graduation_year` varchar(255) DEFAULT NULL,
  `graduation_grade` varchar(255) DEFAULT NULL,
  `degree_board` varchar(255) DEFAULT NULL,
  `degree_year` varchar(255) DEFAULT NULL,
  `degree_grade` varchar(255) DEFAULT NULL,
  `experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `languages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `technology` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `ectc` varchar(255) NOT NULL,
  `cctc` varchar(255) NOT NULL,
  `notice_period` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `email`, `address`, `gender`, `contact`, `ssc_board`, `ssc_year`, `sss_grade`, `hsc_board`, `hsc_year`, `hsc_grade`, `graduation_board`, `graduation_year`, `graduation_grade`, `degree_board`, `degree_year`, `degree_grade`, `experience`, `languages`, `technology`, `location`, `ectc`, `cctc`, `notice_period`, `created_at`, `updated_at`) VALUES
(15, 'Ankit', 'tptankit@gmail.com', 'Gopinath Pride, Society, Parshwanath Township, Krishnanagar, Nava Naroda, Ahmedabad, Gujarat, India', 'male', '9913771007', 'shreji', '2008', '66%', 'shiavam', '2010', '89%', 'RTU', '2014', '6.5', NULL, NULL, NULL, '[{\"company_name\":\"Softqube\",\"designation\":\"Sr DEveloper\",\"from\":\"2021-02-05\",\"to\":\"2021-03-05\"},{\"company_name\":\"Rutuja\",\"designation\":\"jr develop[er\",\"from\":\"2021-02-05\",\"to\":\"2021-02-27\"}]', '{\"hindi\":[\"Read\",\"Write\"],\"gujarati\":[\"Read\",\"Write\"]}', '{\"PHP\":\"Beginner\",\"MySQL\":\"Expert\",\"Laravel\":\"Mediator\"}', 'Gandhinagar', '60000', '234234', '60days', '2021-02-15 03:56:43', '2021-02-15 03:56:43'),
(16, 'Ankit JOgani', 'test@gmail.com', 'Gopinath Pride, Society, Parshwanath Township, Krishnanagar, Nava Naroda, Ahmedabad, Gujarat, India', 'male', '9913771007', 'shreeji', '2008', '66', 'shiavam', '2010', '96', 'rtu', '2014', '3.3', NULL, NULL, NULL, '[{\"company_name\":\"a compay\",\"designation\":\"Sr DEveloper\",\"from\":\"2021-02-01\",\"to\":\"2021-03-14\"},{\"company_name\":\"espark\",\"designation\":\"team leader\",\"from\":\"2021-02-04\",\"to\":\"2021-02-19\"}]', '{\"hindi\":[\"Read\",\"Write\",\"Speak\"],\"English\":[\"Read\",\"Write\"]}', '{\"PHP\":\"Beginner\",\"MySQL\":\"Expert\"}', 'Ahmedabad', '60000', '12312', '60days', '2021-02-15 03:59:33', '2021-02-15 04:00:48');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

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
  `role_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$gR269SUbLtU/cR5rJhK.GuVU7PyEZ/N.eTCsb2DKx7ylnmN9s3CeO', 'Admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
