-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2018 at 12:21 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chess_tournaments`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Montreal', '2018-11-04', '2018-11-13'),
(2, 'Laval', '2018-11-05', '2018-11-05'),
(3, 'Quebec', '2018-11-05', '2018-11-05'),
(5, 'Rosemere', '2018-11-13', '2018-11-13'),
(9, 'Blainville', '2018-11-13', '2018-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL,
  `club_name` varchar(50) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `icon_dir` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `created`, `modified`, `icon`, `icon_dir`) VALUES
(2, 'club-2', '2018-09-07', '2018-09-07', '', ''),
(3, 'Club 3', '2018-10-09', '2018-11-01', 'Files/Z.png', ''),
(4, 'Club 4', '2018-10-31', '2018-11-01', 'Files/Z.png', ''),
(19, 'Club 5', '2018-11-01', '2018-11-01', 'Files/A.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Tournaments', 1, 'name', 'Tournoi 1');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `club_id`, `created`, `modified`) VALUES
(16, 3, '2018-10-09', '2018-10-10'),
(17, 3, '2018-10-09', '2018-10-09'),
(19, 3, '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `player_tournament_participations`
--

CREATE TABLE IF NOT EXISTS `player_tournament_participations` (
  `player_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_tournament_participations`
--

INSERT INTO `player_tournament_participations` (`player_id`, `tournament_id`, `created`, `modified`) VALUES
(16, 1, '2018-11-14', '2018-11-14'),
(17, 1, NULL, '2018-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `city_id`, `created`, `modified`) VALUES
(1, 'Académie De Roberval', 1, '2018-11-04', '2018-11-04'),
(2, 'École secondaire Chomedey-De Maisonneuve', 1, '2018-11-04', '2018-11-04'),
(3, 'École secondaire Curé-Antoine-Labelle', 2, '2018-11-05', '2018-11-05'),
(4, 'École secondaire Georges-Vanier', 2, '2018-11-05', '2018-11-05'),
(5, 'École secondaire Cardinal-Roy', 3, '2018-11-05', '2018-11-05'),
(6, 'École secondaire Jean-de-Brébeuf', 3, '2018-11-05', '2018-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `start_date`, `end_date`, `created`, `modified`, `city_id`, `school_id`) VALUES
(1, 'Tournament 1', '2018-10-24', '2018-10-26', '2018-10-07', '2018-10-10', 1, 1),
(2, 'Tournament 2', '2018-11-12', '2018-11-15', '2018-10-09', '2018-10-09', 1, 2),
(3, 'Tournoi 3', '2018-11-04', '2018-11-04', '2018-11-04', '2018-11-04', 1, 2),
(4, 'Tournoi 4', '2018-11-13', '2018-11-13', '2018-11-13', '2018-11-13', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'player',
  `player_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `last_name`, `email`, `password`, `role`, `player_id`, `created`, `modified`) VALUES
(17, 'Admin', 'Admin', 'Admin', 'Admin@hotmail.com', '$2y$10$otFP/riOSRvZ.RzqLKbesensWlfQQWV3VgwJm8h91prr56q7NYg8a', 'admin', NULL, '2018-10-09', '2018-10-10'),
(18, 'Yvan', '', 'Nom de famille', 'Yvan@hotmail.com', '$2y$10$P.Ttdp8w4ui.Sy5bGSdKuu9aBfex.cC0.KXzhy2xOaUiuJnHiRC5W', 'player', 16, '2018-10-09', '2018-10-10'),
(19, 'Joseph', 'Deuxieme prenom', 'Nom de famille', 'Joseph@hotmail.com', '$2y$10$9gJTeLYjJTTDhEUehlANz.tDR1QkDi3BlsGnIZVB8o.ZChRFCwJjy', 'player', 17, '2018-10-09', '2018-10-09'),
(21, 'Arianne', 'Deuxieme prenom', 'Nom de famille', 'Arianne@hotmail.com', '$2y$10$Oora40t0FhVxVFC1BlO1S.5Q/kTH4JrUWGO5s1RR7Xra9nH76DHzO', 'player', 19, '2018-10-10', '2018-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`club_name`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `player_tournament_participations`
--
ALTER TABLE `player_tournament_participations`
  ADD PRIMARY KEY (`player_id`,`tournament_id`),
  ADD KEY `player_tournament_participations_ibfk_2` (`tournament_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_name` (`name`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `FK_ClubsPlayers` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_tournament_participations`
--
ALTER TABLE `player_tournament_participations`
  ADD CONSTRAINT `player_tournament_participations_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_tournament_participations_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `fk_Schools_Cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `fk_Tournaments_Cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Tournaments_Schools` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_players_users` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
