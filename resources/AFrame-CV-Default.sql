-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 29 Novembre 2017 à 14:35
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `AFrame-CV-Default`
--

CREATE DATABASE IF NOT EXISTS `AFrame-CV-Default` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `AFrame-CV-Default`;
-- --------------------------------------------------------

--
-- Structure de la table `ByDate`
--

CREATE TABLE `ByDate` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `reference` text CHARACTER SET latin1 NOT NULL,
  `authors` text CHARACTER SET latin1 NOT NULL,
  `title` text CHARACTER SET latin1 NOT NULL,
  `date` text NOT NULL,
  `journal` text CHARACTER SET latin1,
  `volume` text CHARACTER SET latin1,
  `number` text CHARACTER SET latin1,
  `pages` text CHARACTER SET latin1,
  `note` text CHARACTER SET latin1,
  `abstract` text CHARACTER SET latin1,
  `keywords` text CHARACTER SET latin1,
  `series` text CHARACTER SET latin1,
  `localite` text CHARACTER SET latin1,
  `publisher` text CHARACTER SET latin1,
  `editor` text CHARACTER SET latin1,
  `pdf` text CHARACTER SET latin1,
  `date_display` text CHARACTER SET latin1,
  `category_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Conference`
--

CREATE TABLE `Conference` (
  `ID` int(11) NOT NULL,
  `reference` text NOT NULL,
  `authors` text NOT NULL,
  `title` text NOT NULL,
  `date` text NOT NULL,
  `journal` text,
  `volume` text,
  `number` text,
  `pages` text,
  `note` text,
  `abstract` text,
  `keywords` text,
  `series` text,
  `localite` text,
  `publisher` text,
  `editor` text,
  `pdf` text,
  `date_display` text,
  `category_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Conference`
--

INSERT INTO `Conference` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) VALUES
(126, 'A17', 'Author', 'Title', '2017-01-01', 'Conference Title', 'volume', 'number', 'pages', 'note', 'abstract', 'key words', 'series', 'localite', 'publisher', 'edithor', 'pdf', 'date_display', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Diverse`
--

CREATE TABLE `Diverse` (
  `ID` int(11) NOT NULL,
  `diverse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Diverse`
--

INSERT INTO `Diverse` (`ID`, `diverse`) VALUES
(1, 'Activity 1\r\n'),
(2, 'Activity 2\r\n'),
(3, 'Sport'),
(4, 'Driving Licence\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `Education`
--

CREATE TABLE `Education` (
  `ID` int(11) NOT NULL,
  `date` text NOT NULL,
  `education` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Education`
--

INSERT INTO `Education` (`ID`, `date`, `education`) VALUES
(1, 'Date', 'Education\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `Information`
--

CREATE TABLE `Information` (
  `ID` int(11) NOT NULL,
  `status` text NOT NULL,
  `name` text NOT NULL,
  `firstName` text NOT NULL,
  `photo` text,
  `age` text,
  `address` text,
  `phone` text,
  `mail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Information`
--

INSERT INTO `Information` (`ID`, `status`, `name`, `firstName`, `photo`, `age`, `address`, `phone`, `mail`) VALUES
(1, 'Status\r\n', 'Name', 'Firstname', 'resources/images/profilPhoto.jpeg\r\n', 'Age', 'Address\r\n', '07 00 00 00 00', 'mail@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `Journal`
--

CREATE TABLE `Journal` (
  `ID` int(11) NOT NULL,
  `reference` text NOT NULL,
  `authors` text NOT NULL,
  `title` text NOT NULL,
  `date` text NOT NULL,
  `journal` text,
  `volume` text,
  `number` text,
  `pages` text,
  `note` text,
  `abstract` text,
  `keywords` text,
  `series` text,
  `localite` text,
  `publisher` text,
  `editor` text,
  `pdf` text,
  `date_display` text,
  `category_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Journal`
--

INSERT INTO `Conference` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) VALUES
(1, 'A17', 'Author', 'Title', '2017-01-01', 'Conference Title', 'volume', 'number', 'pages', 'note', 'abstract', 'key words', 'series', 'localite', 'publisher', 'edithor', 'pdf', 'date_display', 0);


-- --------------------------------------------------------

--
-- Structure de la table `Login`
--

CREATE TABLE `Login` (
  `Login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Login`
--

INSERT INTO `Journal` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) VALUES
(1, 'A17', 'Author', 'Title', '2017-01-01', 'Journal Title', 'volume', 'number', 'pages', 'note', 'abstract', 'key words', 'series', 'localite', 'publisher', 'edithor', 'pdf', 'date_display', 0);


-- --------------------------------------------------------

--
-- Structure de la table `Other`
--

CREATE TABLE `Other` (
  `ID` int(11) NOT NULL,
  `reference` text NOT NULL,
  `authors` text NOT NULL,
  `title` text NOT NULL,
  `date` text NOT NULL,
  `journal` text,
  `volume` text,
  `number` text,
  `pages` text,
  `note` text,
  `abstract` text,
  `keywords` text,
  `series` text,
  `localite` text,
  `publisher` text,
  `editor` text,
  `pdf` text,
  `date_display` text,
  `category_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Other`
--

INSERT INTO `Other` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) VALUES
(1, 'A17', 'Author', 'Title', '2017-01-01', 'Other Title', 'volume', 'number', 'pages', 'note', 'abstract', 'key words', 'series', 'localite', 'publisher', 'edithor', 'pdf', 'date_display', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Parameter`
--

CREATE TABLE `Parameter` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `display` text NOT NULL,
  `section` text,
  `scroll` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Parameter`
--

INSERT INTO `Parameter` (`ID`, `name`, `display`, `section`, `scroll`) VALUES
(1, 'Front', 'TRUE', 'Informations', 'FALSE'),
(2, 'Left1', 'TRUE', 'Education', 'FALSE'),
(3, 'Left2', 'FALSE', NULL, 'FALSE'),
(4, 'Right1', 'TRUE', 'Skills', 'FALSE'),
(5, 'Right2', 'TRUE', 'Diverse', 'FALSE'),
(6, 'Middle1', 'FALSE', NULL, 'FALSE'),
(7, 'Middle2', 'TRUE', 'Informations', 'FALSE'),
(8, 'Middle3', 'FALSE', NULL, 'FALSE'),
(9, 'Middle4', 'FALSE', NULL, 'FALSE'),
(10, 'Publications', 'TRUE', NULL, 'FALSE');

-- --------------------------------------------------------

--
-- Structure de la table `Skill`
--

CREATE TABLE `Skill` (
  `ID` int(11) NOT NULL,
  `category` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Skill`
--

INSERT INTO `Skill` (`ID`, `category`, `details`) VALUES
(1, 'Category\r\n', 'Details\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `Token`
--

CREATE TABLE `Token` (
  `Token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `WorkExp`
--

CREATE TABLE `WorkExp` (
  `ID` int(11) NOT NULL,
  `date` text NOT NULL,
  `workExp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `WorkExp`
--

INSERT INTO `WorkExp` (`ID`, `date`, `workExp`) VALUES
(1, 'Date\r\n', 'Work Experience\r\n');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Conference`
--
ALTER TABLE `Conference`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Diverse`
--
ALTER TABLE `Diverse`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Education`
--
ALTER TABLE `Education`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Information`
--
ALTER TABLE `Information`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Journal`
--
ALTER TABLE `Journal`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Other`
--
ALTER TABLE `Other`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Parameter`
--
ALTER TABLE `Parameter`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Skill`
--
ALTER TABLE `Skill`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Token`
--
ALTER TABLE `Token`
  ADD UNIQUE KEY `Token` (`Token`);

--
-- Index pour la table `WorkExp`
--
ALTER TABLE `WorkExp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Diverse`
--
ALTER TABLE `Diverse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Education`
--
ALTER TABLE `Education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Information`
--
ALTER TABLE `Information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Skill`
--
ALTER TABLE `Skill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `WorkExp`
--
ALTER TABLE `WorkExp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `Conference`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `Other`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `Journal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
