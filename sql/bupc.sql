-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 11:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bupc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `type`) VALUES
(1, 'root', '$2y$10$.qslK2Jg5eU9AG71zqemuOkcQr0Cj/jJm0NRxP2B3vV5a83PDbl4K', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form1_list`
--

CREATE TABLE `form1_list` (
  `id` int(11) NOT NULL,
  `respondent_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `school_year_id` int(10) NOT NULL,
  `radio_1` int(10) NOT NULL,
  `radio_2` int(10) NOT NULL,
  `radio_3` int(10) NOT NULL,
  `radio_4` int(10) NOT NULL,
  `radio_5` int(10) NOT NULL,
  `radio_6` int(10) NOT NULL,
  `radio_7` int(10) NOT NULL,
  `radio_8` int(10) NOT NULL,
  `radio_9` int(10) NOT NULL,
  `radio_10` int(10) NOT NULL,
  `radio_11` int(10) NOT NULL,
  `radio_12` int(10) NOT NULL,
  `radio_13` int(10) NOT NULL,
  `radio_14` int(10) NOT NULL,
  `radio_15` int(10) NOT NULL,
  `radio_16` int(10) NOT NULL,
  `radio_17` int(10) NOT NULL,
  `radio_18` int(10) NOT NULL,
  `radio_19` int(10) NOT NULL,
  `radio_20` int(10) NOT NULL,
  `radio_21` int(10) NOT NULL,
  `remarks_1` varchar(255) NOT NULL,
  `remarks_2` varchar(255) NOT NULL,
  `remarks_3` varchar(255) NOT NULL,
  `remarks_4` varchar(255) NOT NULL,
  `remarks_5` varchar(255) NOT NULL,
  `remarks_6` varchar(255) NOT NULL,
  `remarks_7` varchar(255) NOT NULL,
  `remarks_8` varchar(255) NOT NULL,
  `remarks_9` varchar(255) NOT NULL,
  `remarks_10` varchar(255) NOT NULL,
  `remarks_11` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `respondents`
--

CREATE TABLE `respondents` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_year` varchar(255) NOT NULL,
  `school_year_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `survey_form_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `admin_id`, `survey_form_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_list`
--

CREATE TABLE `survey_list` (
  `id` int(11) NOT NULL,
  `survey_form_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form1_list`
--
ALTER TABLE `form1_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respondents`
--
ALTER TABLE `respondents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_list`
--
ALTER TABLE `survey_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form1_list`
--
ALTER TABLE `form1_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `respondents`
--
ALTER TABLE `respondents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_list`
--
ALTER TABLE `survey_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
