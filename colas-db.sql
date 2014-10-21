-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2014 at 02:18 AM
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
('52b12a4c25800aa5cde1616a8ada248f', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465', 1413330801, ''),
('f3d3383faaf177957f3662580b8383e6', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.25 (KHTML, like Gecko) Version/8.0 Safari/600.1.25', 1413332221, 'a:2:{s:9:"user_data";s:0:"";s:12:"current_user";s:475:"O:4:"User":16:{s:7:"user_id";s:1:"1";s:8:"nickname";s:4:"miki";s:9:"full_name";s:15:"Kovács Miklós";s:5:"email";s:19:"kovmiki88@gmail.com";s:12:"phone_number";s:12:"+36308680838";s:8:"password";s:4:"miki";s:9:"is_active";s:1:"1";s:9:"avatar_id";s:1:"1";s:10:"last_login";s:10:"1413328474";s:8:"reg_date";s:1:"0";s:11:"is_economic";s:1:"1";s:10:"is_foreman";s:1:"1";s:13:"is_super_user";s:1:"1";s:9:"is_locked";b:0;s:9:"last_path";s:8:"/summary";s:15:"is_user_manager";b:0;}";}');

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
  `waybill_identifier` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `daily_reports`
--

INSERT INTO `daily_reports` (`id`, `project_id`, `user_id`, `created_time`, `debit_day_time`, `waybill_identifier`) VALUES
(3, 1, 1, 1412111433, 1412111433, 'szl/fasd/1001'),
(4, 1, 1, 1413321889, 1413321889, ''),
(5, 1, 2, 1413325260, 1413325260, 'adfasfdsa'),
(6, 1, 1, 1413331867, 1413331867, 'fdfdsafdsafdsa');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `subcontractor_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subcontractor_id`, `unit_id`, `product_name`) VALUES
(1, 1, 1, 'c-12 beton'),
(2, 1, 1, 'c-8 beton'),
(3, 1, 2, 'járdalap 30x30'),
(4, 1, 2, 'gyeprácskő 60x40'),
(5, 1, 3, 'szegélykő 100-as'),
(6, 1, 3, 'cső 10-es átmérő '),
(7, 2, 1, 'gyorskötésű c-12 es beton'),
(8, 2, 1, 'homok'),
(9, 2, 1, 'homokos kavics'),
(10, 2, 4, 'csatorna fedél');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `created_time`) VALUES
(1, 'Mórahalmi elkerülő', 1411594560);

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

--
-- Dumping data for table `project_products`
--

INSERT INTO `project_products` (`project_id`, `product_id`, `unit_price`, `total_amount`) VALUES
(1, 1, 8400, 100),
(1, 3, 5000, 300),
(1, 4, 500, 200),
(1, 5, 3000, 120),
(1, 9, 2333, 12),
(1, 10, 66666, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `report_details`
--

CREATE TABLE IF NOT EXISTS `report_details` (
`id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `report_details`
--

INSERT INTO `report_details` (`id`, `report_id`, `quantity`, `product_id`) VALUES
(1, 3, 12021, 1),
(2, 3, 100, 5),
(3, 4, 0, 9),
(4, 4, 0, 9),
(5, 5, 10, 9),
(6, 5, 100, 9),
(7, 6, 200, 10),
(8, 6, 200, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subcontractors`
--

CREATE TABLE IF NOT EXISTS `subcontractors` (
`id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subcontractors`
--

INSERT INTO `subcontractors` (`id`, `company_name`, `short_name`) VALUES
(1, 'Első Beton Kft.', 'EB'),
(2, 'Második Beton ZRt.', 'MB '),
(3, 'Csatorna Gyár Kft', 'CsatGyár'),
(4, 'Humbuk Bt.', 'Humbuk');

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
(1, 'miki', 'Kovács Miklós', 'kovmiki88@gmail.com', '+36308680838', 'miki', 0, 1413331286, 1, 1),
(2, 'muvezeto', 'Művezető János', 'muvezeto@colas.hu', '+36301234567', 'muvezeto', 1410904201, 1413322127, 1, 6),
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
 ADD PRIMARY KEY (`id`), ADD KEY `project_id` (`project_id`,`user_id`);

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
-- Indexes for table `report_details`
--
ALTER TABLE `report_details`
 ADD PRIMARY KEY (`id`), ADD KEY `report_id` (`report_id`,`product_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `report_details`
--
ALTER TABLE `report_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subcontractors`
--
ALTER TABLE `subcontractors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
