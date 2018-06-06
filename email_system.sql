-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 12:24 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `delivery_id` int(11) NOT NULL,
  `user_email` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1-success,0-faild',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_id` int(100) NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(100) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `return_path` varchar(100) NOT NULL,
  `test_mail` varchar(100) NOT NULL,
  `url_domain` varchar(500) NOT NULL,
  `track_id` varchar(100) NOT NULL,
  `mta_name` varchar(100) NOT NULL,
  `ip` varchar(1000) NOT NULL,
  `header_type` int(1) NOT NULL,
  `mta` int(1) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `check_process` int(1) NOT NULL,
  `interval` int(10) NOT NULL,
  `count` int(10) NOT NULL,
  `header` longtext NOT NULL,
  `header_name` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `job_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer_unsubscribe`
--

CREATE TABLE `offer_unsubscribe` (
  `unsub_id` int(10) NOT NULL,
  `unsub_offer_id` int(100) NOT NULL,
  `unsub_email` int(100) NOT NULL,
  `unsub_email_type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_unsubscribe`
--

CREATE TABLE `system_unsubscribe` (
  `sys_unsub_id` int(10) NOT NULL,
  `sys_unsub_email` int(100) NOT NULL,
  `sys_unsub_email_type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `track_click`
--

CREATE TABLE `track_click` (
  `id` int(10) NOT NULL,
  `offer_id` int(100) NOT NULL,
  `mail` int(100) NOT NULL,
  `click_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL,
  `admin_status` int(1) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `offer_unsubscribe`
--
ALTER TABLE `offer_unsubscribe`
  ADD PRIMARY KEY (`unsub_id`);

--
-- Indexes for table `system_unsubscribe`
--
ALTER TABLE `system_unsubscribe`
  ADD PRIMARY KEY (`sys_unsub_id`);

--
-- Indexes for table `track_click`
--
ALTER TABLE `track_click`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_unsubscribe`
--
ALTER TABLE `offer_unsubscribe`
  MODIFY `unsub_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_unsubscribe`
--
ALTER TABLE `system_unsubscribe`
  MODIFY `sys_unsub_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_click`
--
ALTER TABLE `track_click`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
