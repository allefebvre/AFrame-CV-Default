-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2017 at 04:24 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AFrame-CV-Default`
--

CREATE DATABASE IF NOT EXISTS `AFrame-CV-Default` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `AFrame-CV-Default`;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `ID` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`ID`, `title`) VALUES
(1, 'Informations'),
(2, 'Education'),
(3, 'Work Experience'),
(4, 'Skill'),
(5, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `ID` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `content` text,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`ID`, `date_creation`, `date_modification`, `content`, `section_id`) VALUES
(1, '2017-12-13', '2017-12-13', '<h3 style=\"text-align: center\">Status</h3>\n<div id=\"leftInfo\">\n<p><b>Firstname <span style=\"text-transform: uppercase\">Name</span></b></p>\n<p>Age</p>\n<p>Address</p>\n<p>Phone</p>\n<p>Mail</p>\n</div>\n<div id=\"rightInfo\">\n<img id=\"profilPhoto\" src=\"resources/images/profilPhoto.jpeg\" alt=\"profil\">\n</div>', 1),
(2, '2017-12-13', '2017-12-13', '<h1>Education</h1>\n<table>\n<tr>\n<td class=\"leftPlane\"><b>Date</b></td>\n<td class=\"rightPlane\">Education</td>\n</tr>\n</table>', 2),
(3, '2017-12-13', '2017-12-13', '<h1>Work Experience</h1>\n<table>\n<tr>\n<td class=\"leftPlane\"><b>Date</b></td>\n<td class=\"rightPlane\">Work Experience</td>\n</tr>\n</table>', 3),
(4, '2017-12-13', '2017-12-13', '<h1>Skills</h1>\n<table>\n<tr>\n<td class=\"leftPlane\"><b>Category</b></td>\n<td class=\"rightPlane\">Details</td>\n</tr>\n</table>', 4),
(5, '2017-12-13', '2017-12-13', '<h1>Miscellaneous</h1>\n<p>Activity 1</p>\n<p>Activity 2</p>\n<p>Sport</p>\n<p>Driving Licence</p>', 5);

-- --------------------------------------------------------
--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` int(11) NOT NULL auto_increment,
  `name_fr` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `name_fr`, `name_en`) VALUES
(1, 'Journaux Nationaux et Internationaux', 'International Journals'),
(2, 'Conférences nationales et internationales', 'International and national conferences '),
(3, 'Documentation technique', 'Technical documentation'),
(4, 'Thèses', 'Thesis'),
(5, 'Divers', 'Miscellaneous');

-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE IF NOT EXISTS `Publication` (
  `ID` int(11) NOT NULL auto_increment,
  `reference` text NOT NULL,
  `authors` text NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
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
  `categorie_id` int(5) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `categorie_id`) VALUES
(1, 'SF04', 'S. Salva and H. Fouchal', 'Testability Analysis for Timed Systems', '2004-05-01', 'International Journal of Computers and Their Applications (IJCTA)', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(2, 'BFPS01', 'S. Bloch and H. Fouchal and E. Petitjean and  S. Salva', 'Some Issues on Testing Real-Time Systems', '2001-12-01', 'International Journal in Computer Information Science (IJCIS)', '2', '4', '', '', '', '', '', '', 'ACIS', '', '', '', 1),
(3, 'RS09', 'A. Rollet and S. Salva', 'Testing robustness of communicating systems using ioco-based approach', '2009-07-05', 'Proceedings of In 1st IEEE Workshop on Performance evaluation of communications in distributed systems and Web based service architectures, in conjunction with IEEE ISCC 2009', '', '1530-1346 ', '67-72', '', '', '', '', 'Sousse, Tunisia', 'IEEE', '', 'useruploads/files/RS09.pdf', 'July 5 - 8, 2009', 2),
(4, 'RS08', 'A. Rollet and S. Salva', 'Two complementary approaches to test robustness of reactive systems (Invited paper)', '2008-05-22', '17th IEEE International Conference on Automation, Quality and Testing, Robotics AQTR 2010', '', '', '47--53', '', '', '', '', 'Cluj-Napoca, Romania', 'IEEE Computer Society Press', '', 'useruploads/files/RS08.pdf', 'May 22-25 2008', 2),
(5, 'SALV0', 'S. Salva', 'seminaire Testabilité RGE', '2000-10-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SALV0.pdf', 'oct, 2000', 5),
(6, 'SALV02', 'S. Salva', 'Séminaire LIFC, Strasbourg: Etude de  la qualité de test des systèmes temporisés', '2002-03-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SALV02.pdf', 'march, 2002', 5),
(7, 'RR02', 'S. Salva and H. Fouchal', 'Research report: The influence of time in timed systems testing', '2002-01-01', '', '', '', '', '', '', '', '', '', 'LERI-Resycom', '', 'useruploads/files/RR02.pdf', '2002', 3),
(8, 'RR03', 'S. Salva and J. Toussain', 'Research report: Description d?un outil de génération de cas de test sur des systèmes réactifs temporisés', '2003-01-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/RR03.pdf', '2003', 3),
(9, 'S12c', 'Sébastien Salva', 'HDR (Habilitation à diriger des recherches), Étude sur le test basé modèle de systèmes temporisés et d''applications à base de composants.', '2012-05-18', 'Université d''Auvergne', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/hdr.pdf', '2012, may', 4),
(10, 'SALV01', 'S. Salva', 'Thèse: Étude de la qualité de test des systèmes temporisés', '2001-12-01', '', '', '', '', 'Le coût de la validation d un système dépasse souvent 70% du coût total de son développement,\net ne cesse de croître de par la complexité de plus en plus accrue de ces systèmes\net l ajout de concepts tel que le temps. Il est par conséquent nécessaire de proposer des\nméthodes permettant de réduire ce coût tout en obtenant des systèmes pouvant être\ncomplètement testés. Pour ce faire, il est nécessaire d évaluer ce coût et d évaluer les parties\ndu système qui pourront être testées. Cette évaluation est appelée la Qualité de test.\n\nCette thèse a pour but de répondre aux problèmes de coût et de qualité.\nUne première partie concerne l étude de la qualité de test des automates temporisés d Alur et Dill et des graphes des régions. Cette évaluation s effectue à travers des paramètres de testabilité. Nous montrons comment modifier les systèmes en vue d obtenir une\nmeilleure qualité, et donc en vue de réduire les coûts de test et d améliorer la détection des erreurs.\nUne seconde partie a pour but de montrer comment réduire le coût du test, en proposant\nde nouvelles méthodes de test. La première est une méthode orientée Objectif de\ntest. Cette méthode permet de vérifier n importe quelle propriété sur l implantation. La seconde méthode est  basée sur la caractérisation d états de graphe des régions. L originalité de cette méthode est de caractériser des états temporisés sans apporter aucune modification sur la spécification.\nUne dernière partie propose une approche au problème de la génération du graphe des régions : la méthode décrite, permet de minimiser les automates temporisés en graphe des régions\n', '', 'conformance testing, timed systems, testability', '', 'reims, france', '', '', 'useruploads/files/SALV01.PDF', 'dec, 2001', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Login` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Login`, `Password`) VALUES
('root', '$2y$10$qGI5ymA1CL5A6IKktQ4c4OhqZasbHJNUDbSF1VbYL1bJnxV/1foBS');

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
-- Dumping data for table `Parameter`
--

INSERT INTO `Parameter` (`ID`, `name`, `display`, `section`, `scroll`) VALUES
(1, 'Front', 'TRUE', 'Informations', 'FALSE'),
(2, 'Left1', 'TRUE', 'Education', 'FALSE'),
(3, 'Left2', 'TRUE', 'Work Experience', 'FALSE'),
(4, 'Right1', 'TRUE', 'Skill', 'FALSE'),
(5, 'Right2', 'TRUE', 'Miscellaneous', 'FALSE'),
(6, 'Middle1', 'FALSE', NULL, 'FALSE'),
(7, 'Middle2', 'FALSE', NULL, 'FALSE'),
(8, 'Middle3', 'FALSE', NULL, 'FALSE'),
(9, 'Middle4', 'FALSE', NULL, 'FALSE'),
(10, 'Publications', 'TRUE', NULL, 'FALSE'),
(11, 'obj3D', 'FALSE', NULL, 'FALSE'),
(12, 'spotlight', 'TRUE', NULL, 'FALSE'),
(13, 'light', 'TRUE', NULL, 'FALSE'),
(14, 'door', 'TRUE', NULL, 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `Token`
--

CREATE TABLE `Token` (
  `Token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`Login`);

--
-- Indexes for table `Parameter`
--
ALTER TABLE `Parameter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Token`
--
ALTER TABLE `Token`
  ADD PRIMARY KEY (`Token`),
  ADD UNIQUE KEY `Token` (`Token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `Parameter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
