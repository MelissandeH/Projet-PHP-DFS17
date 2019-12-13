-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2019 at 02:57 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.3.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_app_mh`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `title`, `description`, `img_name`, `time`) VALUES
(1, 'Rust', 'Rust is a multiplayer-only survival video game developed by Facepunch Studios. ', 'img/rust.jpg', '2019-12-13 10:20:04'),
(2, 'Black Desert Online', 'Black Desert Online is a sandbox-oriented fantasy massively multiplayer online role-playing game (MMORPG) developed by Korean company Pearl Abyss', 'img/bdo.jpg', '2019-12-13 10:20:04'),
(3, 'Fallout 3', 'Fallout 3 is a post-apocalyptic action role-playing open world video game developed by Bethesda Game Studios and published by Bethesda Softworks. ', 'img/fallout.jpeg', '2019-12-13 10:20:04'),
(4, 'Guild Wars 2', 'Guild Wars 2 is a massively multiplayer online role-playing game developed by ArenaNet and published by NCSOFT. Set in the fantasy world of Tyria, the game follows the re-emergence of Destiny\'s Edge', 'img/gw2.jpg', '2019-12-13 10:20:04'),
(13, 'FF7 Remake', 'Final Fantasy VII Remake[b] is an upcoming action role-playing game developed and published by Square Enix for the PlayStation 4. It is the first part of a series of multiple releases and is scheduled for 3 March 2020.', 'img/ff7.jpg', '2019-12-13 10:20:04'),
(22, 'New card', 'Card description.', 'img/lol.jpg', '2019-12-13 13:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `confirmpassword`, `role`) VALUES
(8, 'Test', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1),
(9, 'Mel', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 1),
(20, 'Test123', 'd553d148479a268914cecb77b2b88e6a', 'd553d148479a268914cecb77b2b88e6a', 1),
(21, 'MercrediMatin', '529080a2af5235941910d54d601a26e5', '529080a2af5235941910d54d601a26e5', 1),
(23, 'rootretest', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1),
(24, 'testmorning', 'c7c3169c21f1d92e9577871831d067c8', 'c7c3169c21f1d92e9577871831d067c8', 1),
(25, 'trigger', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1),
(27, 'Test123456', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 2),
(28, 'Pseudo', '6206b3e1027f382c3f0bf400f8e50a8c', '6206b3e1027f382c3f0bf400f8e50a8c', 1),
(30, 'JeSuisNouveau', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
