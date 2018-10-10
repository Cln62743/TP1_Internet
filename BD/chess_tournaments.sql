-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 10 Octobre 2018 à 23:51
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chess_tournaments`
--

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `created`, `modified`) VALUES
(2, 'club-2', '2018-09-07', '2018-09-07'),
(3, 'Club 3', '2018-10-09', '2018-10-09');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'A.png', 'Files/', '2018-10-10', '2018-10-10', 1),
(2, 'B.png', 'Files/', '2018-10-10', '2018-10-10', 1),
(3, 'C.png', 'Files/', '2018-10-10', '2018-10-10', 1),
(4, 'D.png', 'Files/', '2018-10-10', '2018-10-10', 1),
(5, 'E.png', 'Files/', '2018-10-10', '2018-10-10', 1),
(6, 'G.png', 'Files/', '2018-10-10', '2018-10-10', 0),
(7, 'A.png', 'Files/', '2018-10-10', '2018-10-10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
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
-- Contenu de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Tournaments', 1, 'name', 'Tournoi 1');

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `tournament_id` int(11) NOT NULL,
  `player_id_1` int(11) NOT NULL,
  `player_id_2` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `result_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `players`
--

INSERT INTO `players` (`id`, `club_id`, `created`, `modified`) VALUES
(16, 3, '2018-10-09', '2018-10-10'),
(17, 3, '2018-10-09', '2018-10-09'),
(19, 3, '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Structure de la table `player_tournament_participations`
--

CREATE TABLE IF NOT EXISTS `player_tournament_participations` (
  `player_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ref_results`
--

CREATE TABLE IF NOT EXISTS `ref_results` (
  `id` int(11) NOT NULL,
  `result_description` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tournaments`
--

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `start_date`, `end_date`, `created`, `modified`) VALUES
(1, 'Tournament 1', '2018-10-24', '2018-10-26', '2018-10-07', '2018-10-10'),
(2, 'Tournament 2', '2018-11-12', '2018-11-15', '2018-10-09', '2018-10-09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `last_name`, `email`, `password`, `role`, `player_id`, `created`, `modified`) VALUES
(17, 'Admin', 'Admin', 'Admin', 'Admin@hotmail.com', '$2y$10$otFP/riOSRvZ.RzqLKbesensWlfQQWV3VgwJm8h91prr56q7NYg8a', 'admin', NULL, '2018-10-09', '2018-10-10'),
(18, 'Yvan', '', 'Nom de famille', 'Yvan@hotmail.com', '$2y$10$P.Ttdp8w4ui.Sy5bGSdKuu9aBfex.cC0.KXzhy2xOaUiuJnHiRC5W', 'player', 16, '2018-10-09', '2018-10-10'),
(19, 'Joseph', 'Deuxieme prenom', 'Nom de famille', 'Joseph@hotmail.com', '$2y$10$9gJTeLYjJTTDhEUehlANz.tDR1QkDi3BlsGnIZVB8o.ZChRFCwJjy', 'player', 17, '2018-10-09', '2018-10-09'),
(21, 'Arianne', 'Deuxieme prenom', 'Nom de famille', 'Arianne@hotmail.com', '$2y$10$Oora40t0FhVxVFC1BlO1S.5Q/kTH4JrUWGO5s1RR7Xra9nH76DHzO', 'player', 19, '2018-10-10', '2018-10-10');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`tournament_id`,`player_id_1`,`player_id_2`,`start_time`),
  ADD KEY `player1_key` (`player_id_1`),
  ADD KEY `result_key` (`result_id`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Index pour la table `player_tournament_participations`
--
ALTER TABLE `player_tournament_participations`
  ADD PRIMARY KEY (`player_id`,`tournament_id`),
  ADD KEY `player_tournament_participations_ibfk_2` (`tournament_id`);

--
-- Index pour la table `ref_results`
--
ALTER TABLE `ref_results`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `ref_results`
--
ALTER TABLE `ref_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`player_id_1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`result_id`) REFERENCES `ref_results` (`id`);

--
-- Contraintes pour la table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `FK_ClubsPlayers` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `player_tournament_participations`
--
ALTER TABLE `player_tournament_participations`
  ADD CONSTRAINT `player_tournament_participations_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_tournament_participations_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_players_users` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
