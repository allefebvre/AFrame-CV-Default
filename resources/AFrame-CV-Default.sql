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
-- Table structure for table `ByDate`
--

CREATE TABLE `ByDate` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `reference` text CHARACTER SET latin1 NOT NULL,
  `authors` text CHARACTER SET latin1 NOT NULL,
  `title` text CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
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
-- Table structure for table `Conference`
--

CREATE TABLE `Conference` (
  `ID` int(11) NOT NULL,
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
  `category_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Conference`
--

INSERT INTO `Conference` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) VALUES
(1, 'A17', 'Author', 'Title', '2017-01-01', 'Conference Title', 'volume', 'number', 'pages', 'note', 'abstract', 'key words', 'series', 'localite', 'publisher', 'edithor', 'pdf', 'date_display', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Diverse`
--

CREATE TABLE `Diverse` (
  `ID` int(11) NOT NULL,
  `diverse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Diverse`
--

INSERT INTO `Diverse` (`ID`, `diverse`) VALUES
(1, 'Activity 1\r\n'),
(2, 'Activity 2\r\n'),
(3, 'Sport'),
(4, 'Driving Licence\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `Education`
--

CREATE TABLE `Education` (
  `ID` int(11) NOT NULL,
  `date` text NOT NULL,
  `education` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Education`
--

INSERT INTO `Education` (`ID`, `date`, `education`) VALUES
(1, 'Date', 'Education\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `Information`
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
-- Dumping data for table `Information`
--

INSERT INTO `Information` (`ID`, `status`, `name`, `firstName`, `photo`, `age`, `address`, `phone`, `mail`) VALUES
(1, 'Status\r\n', 'Name', 'Firstname', 'resources/images/profilPhoto.jpeg\r\n', 'Age', 'Address\r\n', '07 00 00 00 00', 'mail@mail.fr');

-- --------------------------------------------------------

--
-- Table structure for table `Journal`
--

CREATE TABLE `Journal` (
  `ID` int(11) NOT NULL,
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
  `category_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Journal`
--

INSERT INTO `Journal` (`ID`, `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) VALUES
(1, 'A17', 'Author', 'Title', '2017-01-01', 'Journal Title', 'volume', 'number', 'pages', 'note', 'abstract', 'key words', 'series', 'localite', 'publisher', 'edithor', 'pdf', 'date_display', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Login`, `Password`) VALUES
('root', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `Other`
--

CREATE TABLE `Other` (
  `ID` int(11) NOT NULL,
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
  `category_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Other`
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
-- Dumping data for table `Parameter`
--

INSERT INTO `Parameter` (`ID`, `name`, `display`, `section`, `scroll`) VALUES
(1, 'Front', 'TRUE', 'Informations', 'FALSE'),
(2, 'Left1', 'TRUE', 'Education', 'FALSE'),
(3, 'Left2', 'TRUE', 'Work Experience', 'FALSE'),
(4, 'Right1', 'TRUE', 'Skills', 'FALSE'),
(5, 'Right2', 'TRUE', 'Diverse', 'FALSE'),
(6, 'Middle1', 'FALSE', NULL, 'FALSE'),
(7, 'Middle2', 'FALSE', NULL, 'FALSE'),
(8, 'Middle3', 'FALSE', NULL, 'FALSE'),
(9, 'Middle4', 'FALSE', NULL, 'FALSE'),
(10, 'Publications', 'TRUE', NULL, 'FALSE'),
(11, 'obj3D', 'FALSE', NULL, 'FALSE'),
(12, 'spotlight', 'TRUE', NULL, 'FALSE'),
(13, 'light', 'TRUE', NULL, 'FALSE'),
(14, 'fly', 'FALSE', NULL, 'FALSE'),
(15, 'door', 'TRUE', NULL, 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `Skill`
--

CREATE TABLE `Skill` (
  `ID` int(11) NOT NULL,
  `category` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Skill`
--

INSERT INTO `Skill` (`ID`, `category`, `details`) VALUES
(1, 'Category\r\n', 'Details\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `Token`
--

CREATE TABLE `Token` (
  `Token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `WorkExp`
--

CREATE TABLE `WorkExp` (
  `ID` int(11) NOT NULL,
  `date` text NOT NULL,
  `workExp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `WorkExp`
--

INSERT INTO `WorkExp` (`ID`, `date`, `workExp`) VALUES
(1, 'Date\r\n', 'Work Experience\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Conference`
--
ALTER TABLE `Conference`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Diverse`
--
ALTER TABLE `Diverse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Education`
--
ALTER TABLE `Education`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Information`
--
ALTER TABLE `Information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Journal`
--
ALTER TABLE `Journal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`Login`);

--
-- Indexes for table `Other`
--
ALTER TABLE `Other`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Parameter`
--
ALTER TABLE `Parameter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Skill`
--
ALTER TABLE `Skill`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Token`
--
ALTER TABLE `Token`
  ADD PRIMARY KEY (`Token`),
  ADD UNIQUE KEY `Token` (`Token`);

--
-- Indexes for table `WorkExp`
--
ALTER TABLE `WorkExp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Conference`
--
ALTER TABLE `Conference`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Diverse`
--
ALTER TABLE `Diverse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Education`
--
ALTER TABLE `Education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Information`
--
ALTER TABLE `Information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Journal`
--
ALTER TABLE `Journal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Other`
--
ALTER TABLE `Other`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Skill`
--
ALTER TABLE `Skill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `WorkExp`
--
ALTER TABLE `WorkExp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
