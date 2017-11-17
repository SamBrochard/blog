-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 17 nov. 2017 à 13:26
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `Author`
--

CREATE TABLE `Author` (
  `Id` tinyint(3) UNSIGNED NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Author`
--

INSERT INTO `Author` (`Id`, `FirstName`, `LastName`) VALUES
(1, 'John', 'Doe');

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `Id` tinyint(3) UNSIGNED NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Category`
--

INSERT INTO `Category` (`Id`, `Name`) VALUES
(2, 'Jeux-Vidéos'),
(1, 'Voyages');

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `Id` mediumint(8) UNSIGNED NOT NULL,
  `NickName` varchar(30) DEFAULT NULL,
  `Contents` text NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `Post_Id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Comment`
--

INSERT INTO `Comment` (`Id`, `NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) VALUES
(2, 'Anonyme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2017-11-15 08:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `Id` smallint(5) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Contents` text NOT NULL,
  `Img` varchar(30) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `Author_Id` tinyint(3) UNSIGNED DEFAULT NULL,
  `Category_Id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Post`
--

INSERT INTO `Post` (`Id`, `Title`, `Contents`, `Img`, `CreationTimestamp`, `Author_Id`, `Category_Id`) VALUES
(1, 'lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'defaultImg', '2017-11-12 00:00:00', 1, 1),
(2, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'defaultImg', '2017-11-15 21:45:50', 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CreationTimestamp` (`CreationTimestamp`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Title` (`Title`),
  ADD KEY `CreationTimestamp` (`CreationTimestamp`),
  ADD KEY `Author_Id` (`Author_Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Author`
--
ALTER TABLE `Author`
  MODIFY `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `Category`
  MODIFY `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `Post` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`Author_Id`) REFERENCES `Author` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Post_ibfk_2` FOREIGN KEY (`Category_Id`) REFERENCES `Category` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
