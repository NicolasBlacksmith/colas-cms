-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2014 at 11:33 PM
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
('b0e2e668e09c95c07c2dbae74b1ab562', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.22 (KHTML, like Gecko) Version/8.0 Safari/600.1.22', 1410903145, 'a:2:{s:9:"user_data";s:0:"";s:12:"current_user";s:492:"O:4:"User":17:{s:7:"user_id";s:1:"1";s:8:"nickname";s:4:"miki";s:9:"full_name";s:15:"Kovács Miklós";s:5:"email";s:19:"kovmiki88@gmail.com";s:12:"phone_number";s:12:"+36308680838";s:8:"password";s:4:"miki";s:9:"is_active";s:1:"1";s:9:"avatar_id";s:1:"1";s:10:"last_login";s:10:"1410901884";s:8:"reg_date";s:1:"0";s:11:"is_economic";N;s:10:"is_foreman";N;s:13:"is_super_user";s:1:"1";s:9:"is_locked";b:0;s:9:"last_path";s:18:"/users/edit_user/1";s:9:"is_lector";N;s:15:"is_user_manager";b:0;}";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `full_name`, `email`, `phone_number`, `password`, `reg_date`, `last_login`, `is_active`, `avatar_id`) VALUES
(1, 'miki', 'Kovács Miklós', 'kovmiki88@gmail.com', '+36308680838', 'miki', 0, 1410902029, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_base_authority`
--

INSERT INTO `user_base_authority` (`id`, `user_id`, `is_foreman`, `is_economic`, `is_super_user`) VALUES
(1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_base_authority`
--
ALTER TABLE `user_base_authority`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
