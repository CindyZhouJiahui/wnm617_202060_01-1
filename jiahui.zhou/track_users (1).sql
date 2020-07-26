-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2020 at 11:18 PM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_track_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `track_users`
--

CREATE TABLE `track_users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date_create` datetime NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track_users`
--

INSERT INTO `track_users` (`id`, `name`, `username`, `email`, `password`, `date_create`, `img`) VALUES
(1, 'John Wang', 'user01', 'user01@gmail.com', 'wiwive', '2015-06-05 00:00:00', 'https://via.placeholder.com/400/320/fff/?text=user1'),
(2, 'Wendy Ross', 'user02', 'user02@gmail.com', 'wiwive', '2014-07-05 00:00:00', 'https://via.placeholder.com/400/600/fff/?text=user1'),
(3, 'Dolce Green', 'user03', 'user03@gmail.com', 'wiwive', '2018-11-05 05:06:01', 'https://via.placeholder.com/400/350/fff/?text=user1'),
(4, 'Vivi Royal', 'user04', 'user04@gmail.com', 'wiwive', '2018-10-05 04:03:20', 'https://via.placeholder.com/400/620/fff/?text=user1'),
(5, 'WOKA Liang', 'user5', 'user5@gmail.com', 'wiwive', '2020-07-16 02:03:30', 'https://via.placeholder.com/400/260/fff/?text=user1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
