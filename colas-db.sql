-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2014 at 12:56 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `colas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7b37128fbd9db026756c677e9e4bc3b8', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.22 (KHTML, like Gecko) Version/8.0 Safari/600.1.22', 1411426236, 'a:2:{s:9:"user_data";s:0:"";s:12:"current_user";s:478:"O:4:"User":16:{s:7:"user_id";s:1:"1";s:8:"nickname";s:4:"miki";s:9:"full_name";s:15:"Kovács Miklós";s:5:"email";s:19:"kovmiki88@gmail.com";s:12:"phone_number";s:12:"+36308680838";s:8:"password";s:4:"miki";s:9:"is_active";s:1:"1";s:9:"avatar_id";s:1:"1";s:10:"last_login";s:10:"1410904437";s:8:"reg_date";s:1:"0";s:11:"is_economic";s:1:"1";s:10:"is_foreman";s:1:"1";s:13:"is_super_user";s:1:"1";s:9:"is_locked";b:0;s:9:"last_path";s:10:"/dashboard";s:15:"is_user_manager";b:0;}";}');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE IF NOT EXISTS `daily_reports` (
`id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `debit_day_time` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `waybill_identifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `subcontractor_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_products`
--

CREATE TABLE IF NOT EXISTS `project_products` (
  `project_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcontractors`
--

CREATE TABLE IF NOT EXISTS `subcontractors` (
`id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
`id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, 'm3'),
(2, 'm2'),
(3, 'm'),
(4, 'db');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nickname` text NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `reg_date` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `avatar_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `full_name`, `email`, `phone_number`, `password`, `reg_date`, `last_login`, `is_active`, `avatar_id`) VALUES
(1, 'miki', 'Kovács Miklós', 'kovmiki88@gmail.com', '+36308680838', 'miki', 0, 1411418038, 1, 1),
(2, 'muvezeto', 'Művezető János', 'muvezeto@colas.hu', '+36301234567', 'muvezeto', 1410904201, 1410904274, 1, 6),
(3, 'gazdasagi', 'Gazdasági Margit', 'gazdasagi@colas.hu', '+36307654321', 'gazdasagi', 1410904259, 1410904288, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_base_authority`
--

CREATE TABLE IF NOT EXISTS `user_base_authority` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_foreman` tinyint(1) NOT NULL,
  `is_economic` tinyint(1) NOT NULL,
  `is_super_user` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_base_authority`
--

INSERT INTO `user_base_authority` (`id`, `user_id`, `is_foreman`, `is_economic`, `is_super_user`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 0, 0),
(3, 3, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `daily_reports`
--
ALTER TABLE `daily_reports`
 ADD PRIMARY KEY (`id`), ADD KEY `project_id` (`project_id`,`user_id`,`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_products`
--
ALTER TABLE `project_products`
 ADD KEY `project_id` (`project_id`,`product_id`);

--
-- Indexes for table `subcontractors`
--
ALTER TABLE `subcontractors`
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
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_base_authority`
--
ALTER TABLE `user_base_authority`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcontractors`
--
ALTER TABLE `subcontractors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_base_authority`
--
ALTER TABLE `user_base_authority`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
