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
  `auteurs` text NOT NULL,
  `titre` text NOT NULL,
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

INSERT INTO `Publication` (`ID`, `reference`, `auteurs`, `titre`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `categorie_id`) VALUES
(1, 'SR08a', 'S. Salva and A. Rollet', 'Testabilité des services web', '2008-06-01', 'Revue Ingénierie des Systèmes d''Information RSTI série ISI, numéro spécial Objets, composants et modèles dans l ingénierie des SI', '13', '3', '35--58', 'Usually, Web service compositions are tested by assuming\nthat these ones are executed inside an open environment where all\nthe messages exchanged between the services participating to the\ncomposition are observable. Nevertheless, when services are\ndeployed in partially open environments e.g., Clouds, this\nassumption cannot be sustained. This paper proposes a method to\ncheck whether a service composition is conform to its\nspecification according to the ioco test relation, by considering\nthat the internal messages exchanged between the services are\nhidden but that we can invoke each service directly (or an exact\ncopy). Specifications are modelled with Symbolic Transition\nSystems (STS) that we specialize in Web services with some\nannotations and functions. Our approach consists in decomposing an\nexisting test case set according to the operation interleaving\nthat we formalize with a factor denoted the dependency degree.\nThen, while executing the new test case set, we recover fragments\nof traces (observable reactions) that are reassembled. With the\nfinal traces, we are able to check whether the implemented\ncomposition is ioco-conform to its specification. We illustrate\nour approach with an example derived from the application of\nElectronic Health Record externalization for both patients and\npractitioners, currently in development by the Orange Business Service company.', '', 'composition; partially open environment; ioco test relation; conformance testing; trace reconstruction', '', '', 'Hermes, Lavoisier', '', '', '2008', 1),
(2, 'SF04', 'S. Salva and H. Fouchal', 'Testability Analysis for Timed Systems', '2004-05-01', 'International Journal of Computers and Their Applications (IJCTA)', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(3, 'BFPS01', 'S. Bloch and H. Fouchal and E. Petitjean and  S. Salva', 'Some Issues on Testing Real-Time Systems', '2001-12-01', 'International Journal in Computer Information Science (IJCIS)', '2', '4', '', '', '', '', '', '', 'ACIS', '', '', '', 1),
(4, 'RS09', 'A. Rollet and S. Salva', 'Testing robustness of communicating systems using ioco-based approach', '2009-07-05', 'Proceedings of In 1st IEEE Workshop on Performance evaluation of communications in distributed systems and Web based service architectures, in conjunction with IEEE ISCC 2009', '', '1530-1346 ', '67-72', '', '', '', '', 'Sousse, Tunisia', 'IEEE', '', 'useruploads/files/RS09.pdf', 'July 5 - 8, 2009', 2),
(6, 'SR09b', 'S. Salva and I. Rabhi', 'Automatic web service robustness testing from WSDL descriptions', '2009-05-14', '12th European Workshop on Dependable Computing, EWDC 2009', '', '', '', 'Web Services fall under the so-called emerging technologies\ncategory and are getting more and more used for Internet\napplications or business transactions. Since web services are used\nin large and heterogeneous applications, they need to be reliable.\nSo, we propose in this paper, a robustness testing method which\ngenerates and executes test cases automatically from WSDL\ndescriptions. We analyze the web service observability to find the\nrelevant hazards which may be used for testing and those which are\nalways blocked by SOAP processors. We show that few hazards can be\nreally handled. By reducing them, we reduce the test cost too. We\nimprove the robustness issue detection by separating the SOAP\nprocessor behavior to the web service one. With an academic tool,\nwe show that many web services have robustness issues and that our\nmethod is able to detect them.', '', 'robustness testing, web services, test framework', '', 'Toulouse, France ', '', '', 'useruploads/files/SR09b.pdf', 'may 2009', 2),
(7, 'SL09', 'S. Salva and P. Laurençot', 'Automatic Ajax application testing', '2009-05-24', 'Fourth International Conference on Internet and Web Applications and Services, ICIW 2009', '', '', '229-234', 'Asynchronous javascript and XML (AJAX) is a recent group of\ntechnologies used to develop dynamic web pages. Ajax applications\nare wisely used nowadays and need to be tested to ensure their\nreliability.  This paper introduces a method and an architecture\nfor automatic AJAX application testing. We use STS automata for\ndescribing the application and for generating test cases. We\nperform an improved random testing using some predefined values\nand also test purpose based testing for verifying specific properties.\nThe testing framework is composed of several testers which control and monitor the test\nexecution to give a test verdict. The Google map search\napplication is used as an example to illustrate the method', '', 'conformance testing, Ajax application, test architecture', '', 'Venice/Mestre, Italy', 'IEEE Computer Society Press', '', 'useruploads/files/SL09.pdf', 'may 2009', 2),
(8, 'SR08', 'S. Salva and A. Rollet', 'Automatic web service testing from WSDL Descriptions', '2008-06-16', '8th International Conference on Innovative Internet Community Systems I2CS 2008', '2011', '', '', '', '', '', 'Lecture Notes in Informatics (LNI)', 'Schoelcher, Martinique', 'Gesellschaft für Informatik (GI)', '', 'useruploads/files/SR08.pdf', 'June 16-18, 2008,', 2),
(9, 'RS08', 'A. Rollet and S. Salva', 'Two complementary approaches to test robustness of reactive systems (Invited paper)', '2008-05-22', '17th IEEE International Conference on Automation, Quality and Testing, Robotics AQTR 2010', '', '', '47--53', '', '', '', '', 'Cluj-Napoca, Romania', 'IEEE Computer Society Press', '', 'useruploads/files/RS08.pdf', 'May 22-25 2008', 2),
(56, 'SBD07', 'S. Salva and C. Bastoul and C. Delamare', 'Web Service Call Parallelization Using OpenMP', '2007-06-20', '3rd INTERNATIONAL WORKSHOP on OpenMP (IWOMP) 2007', '4935/2008', '', '185-194', '', '', '', 'LNCS', 'Tsinghua University, Beijing, China', 'Springer Verlag', '', '', '2007', 2),
(49, 'S11c', 'Sébastien Salva', 'An Approach For Testing Web Service Compositions When Internal Messages Are Unobservable', '2011-09-01', 'International Journal of Electronic Business Management (IJEBM), Special Issue on New web technologies for collaborative product and process commerce and concurrent engineering', '9', '4', '334-344', 'Usually, Web service compositions are tested by assuming that all the messages ex-changed between the services, participating to the composition, are observable. Nev-ertheless, when services are deployed in an infrastructure which restricts access or when they are deployed on Clouds, this assumption cannot be sustained. Indeed, these environments do not allow extracting the observable reactions of a composition under test (impossibility to install testers or sniffer based tools in the environment). So, this paper proposes a method to check whether a service composition conforms its speci-fication with reference to the ioco test relation, by considering that the internal mes-sages exchanged between the services are hidden but that we can invoke each service one by one (or an exact copy). We propose a method which decomposes an existing test case set according to the operation interleaving that we formalize with a factor denoted the dependency degree. Then, while executing the new test case set, we re-cover fragments of traces (observable reactions) that are reassembled. With the final traces, we are able to check whether the implemented composition is ioco-conform to its specification in the real environment where is deployed the composition.', 'submitted: 2011 january\naccepted: 2011 may\n', 'Web service composition, ioco test relation, conformance testing, trace reconstruction  ', '', '', 'Electronic Business Management Society', '', '', 'nov, 2011', 1),
(11, 'SL07', 'S. Salva and P. Laurençot', 'Generation of tests for real-time systems with test purposes', '2007-03-29', '15th International Conference on Real-Time and Network Systems RTNS07', '', '', '35-44', '', '', '', '', 'Nancy, France ', '', '', '', 'march, 2007', 2),
(12, 'SL05', 'S. Salva and P. Laurençot', 'Génération automatique d objectifs de test pour systèmes temporisés', '2005-04-29', 'Colloque Francophone de l ingénierie des Protocoles (CFIP)', '', '', '', '', '', '', '', 'Bordeaux, France', 'lavoisier', '', '', 'abril, 2005', 2),
(13, 'SL04', 'P. Laurençot and S. Salva', 'Testing mobile and distributed systems : method and experimentation', '2004-12-01', 'Principles of Distributed Systems, 8th International Conference, {OPODIS}', '3544', '', '37--51', '', 'Revised Selected Papers', '', 'Lecture Notes in Computer Science', 'Grenoble, France', 'springer', 'Teruo Higashino', '', 'dec, 2004', 2),
(14, 'SL03a', 'S. Salva and P. Laurençot', 'A Testing Tool using the State Characterization Approach for Timed Systems', '2003-09-01', 'WRTES, satellite workshop of FME symposium', '', '', '', '', '', '', '', 'Pisa, Italy', '', '', '', 'sept 2003', 2),
(15, 'SL03b', 'S. Salva and P. Laurençot', 'Génération de tests temporisés orientée caractérisation d états', '2003-12-01', 'Colloque Francophone de l ingénierie des Protocoles (CFIP)', '', '', '', '', '', '', '', 'Paris, France', 'lavoisier', '', '', 'dec 2003', 2),
(16, 'SF02', 'S. Salva and H. Fouchal', 'Une méthode de test des systèmes temporisés orientée objectif de test', '2002-04-01', 'RENPAR14', '', '', '', '', '', '', '', 'Hamamet, Tunisie', '', '', '', 'abr 2002', 2),
(17, 'S02', 'S. Salva', 'Testing temporal and behavior events on timed systems with timed test purposes', '2002-12-01', '6th International Conference on Distribued Systems (OPODIS)', '', '', '73--84 ', '', '', '', '', 'Reims, France', 'Studia Informatica Universalis', '', '', 'dec 2002', 2),
(18, 'SRF02', 'S. Salva and A. Rollet and H. Fouchal', 'Temporal and Behavior Characterization of States in Timed Systems', '2002-08-01', '23rd ACIS Annual International Conference on Computer and Information Science (ICIS02)', '', '', '', '', '', '', '', 'Seoul, South Korea', '', '', '', 'aug 2002', 2),
(19, 'FPS01', 'H. Fouchal and E. Petitjean and S. Salva', 'A User-Oriented Testing of Real Time Systems', '2001-12-01', 'IEEE/IEE Real-Time Embedded Systems Workshop (RTES), satellite of RTSS', '', '', '', '', '', '', '', 'London, UK', 'IEEE Computer Society 2001', '', '', 'dec, 2001', 2),
(20, 'SF01a', 'S. Salva and H. Fouchal', 'Some Parameters for Timed System Testability', '2001-06-01', 'ACS/IEEE International Conference on Computer System and Applications (AICCS01 )', '', '', '335-', '', '', '', '', 'Beirut, Lebanon', 'IEEE Computer Society', '', '', 'june, 2001', 2),
(21, 'SF01c', 'S. Salva and H. Fouchal', 'Timed Test Execution and TTCN generation', '2001-08-01', '2nd International Conference on Software Engineering applied to Networking and Parallel/Distributed Computing (SNPD02)', '', '', '', '', '', '', '', 'Nagoya, Japon', 'ACIS', '', '', 'aug 2001', 2),
(22, 'SF01d', 'S. Salva and E. Petitjean and H. Fouchal', 'A Simple Approach for Timed System Testing', '2001-08-01', 'Formal Approaches to Testing of Software (FATES01), A Satellite Workshop of CONCUR01', '', '', '', '', '', '', '', 'Aalborg, Denmark', '', '', '', 'aug 2001', 2),
(23, 'S01', 'S. Salva', 'La qualité du test de conformité des systèmes temps réels', '2001-04-01', '3eme Colloque sur la Modélisation et Simulation des Systèmes (MOSIM01)', '', '', '', '', '', '', '', 'Troyes, France', '', '', '', 'abr 2001', 2),
(24, 'FPS00', 'H. Fouchal and E. Petitjean and S. Salva', 'Timed testing using test purposes', '2000-12-01', '7th IEEE International Conference on Real-Time Computing Systems and Applications (RTCSA00)', '', '', '166-171', '', '', '', '', 'Cheju Island, South Korea', 'IEEE Computer Society', '', '', 'dec 2000', 2),
(25, 'SFB00', 'S. Salva and H. Fouchal and S. Bloch', 'Metrics for Timed Systems Testing', '2000-12-01', '4th International Conference on Distribued Systems (OPODIS)', '', '', '', '', '', '', '', 'Paris, France', '', '', '', 'dec 2000', 2),
(26, 'SALV01', 'S. Salva', 'Thèse: Étude de la qualité de test des systèmes temporisés', '2001-12-01', '', '', '', '', 'Le coût de la validation d un système dépasse souvent 70% du coût total de son développement,\net ne cesse de croître de par la complexité de plus en plus accrue de ces systèmes\net l ajout de concepts tel que le temps. Il est par conséquent nécessaire de proposer des\nméthodes permettant de réduire ce coût tout en obtenant des systèmes pouvant être\ncomplètement testés. Pour ce faire, il est nécessaire d évaluer ce coût et d évaluer les parties\ndu système qui pourront être testées. Cette évaluation est appelée la Qualité de test.\n\nCette thèse a pour but de répondre aux problèmes de coût et de qualité.\nUne première partie concerne l étude de la qualité de test des automates temporisés d Alur et Dill et des graphes des régions. Cette évaluation s effectue à travers des paramètres de testabilité. Nous montrons comment modifier les systèmes en vue d obtenir une\nmeilleure qualité, et donc en vue de réduire les coûts de test et d améliorer la détection des erreurs.\nUne seconde partie a pour but de montrer comment réduire le coût du test, en proposant\nde nouvelles méthodes de test. La première est une méthode orientée Objectif de\ntest. Cette méthode permet de vérifier n importe quelle propriété sur l implantation. La seconde méthode est  basée sur la caractérisation d états de graphe des régions. L originalité de cette méthode est de caractériser des états temporisés sans apporter aucune modification sur la spécification.\nUne dernière partie propose une approche au problème de la génération du graphe des régions : la méthode décrite, permet de minimiser les automates temporisés en graphe des régions\n', '', 'conformance testing, timed systems, testability', '', 'reims, france', '', '', 'useruploads/files/SALV01.PDF', 'dec, 2001', 4),
(27, 'SALV0', 'S. Salva', 'seminaire Testabilité RGE', '2000-10-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SALV0.pdf', 'oct, 2000', 5),
(28, 'SALV02', 'S. Salva', 'Séminaire LIFC, Strasbourg: Etude de  la qualité de test des systèmes temporisés', '2002-03-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SALV02.pdf', 'march, 2002', 5),
(29, 'RR02', 'S. Salva and H. Fouchal', 'Research report: The influence of time in timed systems testing', '2002-01-01', '', '', '', '', '', '', '', '', '', 'LERI-Resycom', '', 'useruploads/files/RR02.pdf', '2002', 3),
(30, 'RR03', 'S. Salva and J. Toussain', 'Research report: Description d?un outil de génération de cas de test sur des systèmes réactifs temporisés', '2003-01-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/RR03.pdf', '2003', 3),
(31, 'SALV07a', 'S. Salva', 'Séminaire Labri Bordeaux', '2007-01-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SALV07a.pdf', '2007', 5),
(32, 'SALV07b', 'S. Salva', 'Séminaire Llaic clermont ferrand: Etude du test de conformité de systèmes', '2007-01-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SALV07b.pdf', '2007', 5),
(33, 'RR09', 'Salva Sebastien and Issam Rabhi', 'research report: Statefull web service robustness, extended paper', '2009-09-01', '', '', '', '', '', 'http://www.isima.fr/limos/publi/RR-09-09.pdf', '', '', '', '', '', '', '2009', 3),
(39, 'SR10', 'S. Salva and I. rabhi', 'Statefull web service robustness', '2010-05-09', 'The Fifth International Conference on Internet and Web Applications and Services, ICIW10', '', '', '167-173 ', 'Web Services fall under the so-called emerging technologies\ncategory and are getting more and more used for Internet\napplications or business transactions. Since Web Services are\noften the foundation of large applications, they need to be\nreliable and robust. So, we propose in this paper, a robustness\ntesting method of stateful Web Services, modeled with Symbolic\nTransition Systems \\cite{FTW05}. We analyze the Web Service\nobservability and the hazard effectiveness in a SOAP environment\n\\cite{SOAP}. Then, we propose a test case generation method based\non the two hazards "Using unusual values" and "Replacing /Adding\noperation names", which are the only ones that can be applied. The\nAmazon E-commerce Web Service is taken as example', '', 'Robustness testing, stateful Web Services, STS, test architecture', '', 'Barcelona, Spain', 'IEEE Computer Society Press', '', 'useruploads/files/SR10.pdf', 'May 9 - 15, 2010 ', 2),
(42, 'SLR10', 'Sebastien Salva and Patrice Laurencot and Issam Rabhi', 'An Approach Dedicated for Web Service Security Testing', '2010-08-22', '5th International Conference on Software Engineering Advances, International Conference, ICSEA10', '', '', '494-500', 'Web Services are more and more used in designing and building\nsystems in open and dynamic distributed environments. The security\nof these transactions is becoming a critical issue. This paper\nproposes a security testing method for stateful Web Services. We\ndefine some specific security rules with the Nomad language. Then,\nwe construct test cases from a symbolic specification and test\npurposes derived from the previous rules. We present some\nexperimentation results based on roughly 100 Web Services and we\nshow that 11 percent have vulnerabilities, using the rules introduce in the article.', '', 'Web Services; Security rules; Test purposes; Test generation', '', 'Nice, France', 'IEEE Computer Society', '', 'useruploads/files/SLR10.pdf', 'August 22-27, 2010', 2),
(41, 'SR10c', 'S. Salva and I. Rabhi', 'A BPEL observability enhancement method', '2010-07-05', 'Proceedings of the 2010 8th IEEE International Conference on Web Services, ICWS 2010', '', '', '638--639', '', '', 'BPEL, testability, observability, enhancement methods', 'ICWS ''10', 'Miami, USA', 'IEEE Computer Society ', '', '', 'july, 5-10, 2010', 2),
(40, 'SR10b', 'S. Salva and I. Rabhi', 'A preliminary study on BPEL process testability', '2010-04-01', 'QuomBat2010, ICST Workshop on Quality of Model-Based Testing, Co-located with  ICST  2010, Third International Conference on Software Testing, Verification, and Validation Workshops (ICSTW), 2010 Third International Conference on Software Testing, Verification, and Validation Workshops (ICSTW), 2010', '', '', '62-71', '', '', '', '', 'Paris, France', 'IEEE Computer Society', '', 'useruploads/files/SR10b.pdf', 'April 10, 2010', 2),
(43, 'CZ10', 'Cavalli, A.  Tien-Dung Cao  Mallouli, W.  Martins, E.  Sadovykh, A.  Salva, S.  Zaidi, F.', 'WebMov: A Dedicated Framework for the Modelling and Testing of Web Services Composition', '2010-07-22', 'ICWS 2010 - 8th IEEE International Conference on Web Services', '', '', '377-384', '', '', '', '', 'Miami, USA', 'IEEE Computer Society', '', '', 'July 2010', 2),
(44, 'SR09', 'S. Salva, A. Rollet', 'Test purpose generation for timed protocol testing', '2009-07-20', 'Proceedings of the 2009 Second International Conference on Communication Theory, Reliability, and Quality of Service, CTRQ 2009', '', '', '8--14', '', '', '', '', 'Colmar, France', 'IEEE Computer Society Press ', '', 'useruploads/files/SR09.pdf', 'July 20-25, 2009 ', 2),
(45, 'SR10d', 'S. Salva and I. Rabhi', 'Robustesse des Services Web persistants', '2010-05-01', 'MOSIM10, 8ème ENIM IFAC Conférence Internationale de Modélisation et Simulation', '', '', '', '', '', '', '', 'Hammanet, Tunisy', '', '', '', 'may, 2010', 2),
(52, 'S11d', 'Sébastien Salva', 'Passive testing with proxy tester', '2011-10-01', 'International Journal of  Software Engineering and Its Applications (IJSEIA)', '5', '4', '1--16', 'Passive testing is an alternative testing approach whose purpose\nis to passively analyze an implementation behaviour without\ndisturbing it. Usually, passive testing methods extract traces by\nmeans of sniffer-based tools, running in the same environment as\nthe implementation. Nevertheless, many implementation environments\nprevent from setting a sniffer-based tool for security or\ntechnical reasons. We propose a passive testing method based on\nthe notion of proxy-tester which represents an intermediary\nbetween client applications and the implementation. We define a\nproxy-tester as a product between the specification and its\ncanonical tester, which is able to receive the client traffic and\nto forward it to the implementation and vice versa. It also aims\nto analyze the implementation traces to detect faults. We define a\nnon conformance relation between the implementation, its\nspecification and the external environment from which is received\nthe client traffic. We also provide some preliminary results on\nthe Amazon E-commerce Web service and discuss about the\nproxy-tester benefits.\n', 'submitted: 2011 june\naccepted 2011 august\npublished 2011 october', 'passive testing; proxy-tester; STS; conformance relation.', '', '', 'Science & Engineering Research Support soCiety  (SERSC)', '', '', 'october 2011', 1),
(53, 'S12b', 'Sébastien Salva', 'Modelling and testing of service compositions in partially open environments', '2012-05-01', 'Studia Unformatica Universalis, special issue on "Modélisation informatique et mathématique des systèmes  complexes : avancées méthodologiques"', '10', '1', '155-185 ', '', 'submitted: 2011 march\naccepted: 2011 september\n', '', '', '', 'HERMANN', '', 'useruploads/files/S12b.pdf', 'may 2012', 1),
(54, 'S12f', 'S. SALVA and A. Rollet', 'A pragmatic approach for testing stateless and stateful Web Service Robustness', '2012-10-01', 'Studia Informatica Universalis', '10', '2', '139-179', 'The interest in testing methodologies dedicated to Web\nServices is soaring as much as the massive use of these\ncomponents. Since Web Services are heterogeneous in nature and\ntake part in complex Business processes, robustness testing which\nis the topic of this paper, is an important step to build them\nwith confidence. Firstly, we focus on the SOAP environment which\nis used to call Web Service operations in an XML format. We show\nthat SOAP must be taken into account in testing methods because it\nsubstantially modifies the Web Service observable behaviour and\nblocks many classical hazards used for testing. Then, we propose\ntwo approaches: the first one aims to test stateless Web Services,\nrepresented by relational models. The second approach is dedicated\nto stateful ones modelled with Symbolic Transition Systems. For\nboth methods, the SOAP environment is taken into account by\nfiltering the messages or by completing the specification. These\nmethods have been experimented with an academic tool on many Web\nServices deployed on the Internet. This experimentation shows that\nseveral ones have robustness issues and that our methods are able\nto detect them.', '', 'Robustness testing; stateless, stateful Web Services; testing framework', '', '', 'Hermann', '', '', '2012', 1),
(46, 'S11', 'S. Salva', 'An observability enhancement method of ABPEL specifications', '2011-03-27', 'The 2nd International Conference on    Engineering and Meta-Engineering: ICEME 2011   ', '', '', '1--6', '', '', '', '', 'Orlando, Florida USA', 'IIIS', '', 'useruploads/files/S11.pdf', 'March 27-30, 2011 ', 2),
(47, 'S11b', 'S. Salva', 'Automatic test purpose generation for Web services', '2011-06-20', 'International Conference on Electric and Electronics (EEIC 2011) ', '99', '1876-1100', '721--728', '', '', '', 'Lecture Notes in Electrical Engineering', 'Nanchang University, China ', 'Springer Berlin Heidelberg', 'Wang, Xiaofeng', 'useruploads/files/S11b.pdf', 'june 20-22, 2011', 2),
(55, 'SR11', 'S. SALVA and I. Rabhi', 'A Test Purpose and Test Case Generation Approach for SOAP Web Services', '2011-10-23', 'The Sixth International Conference on Software Engineering Advances  ICSEA 2011', '', '', '35-42', '', '', '', '', 'barcelona, spain', 'XPS (Xpert Publishing Services)', '', 'useruploads/files/SR11.pdf', '2011, October 23-29', 2),
(57, 'S12a', 'Sébastien Salva', 'A Guided Web Service Security Testing Method', '2012-04-20', 'Book: Emerging Informatics - Innovative Concepts and Applications, Chapter 11', '', '', '195-222', 'http://www.intechopen.com/books/emerging-informatics-innovative-concepts-and-applications/a-guided-web-service-security-testing-method', '', '', '', '', 'Intech', 'Shah Jahan (Ed.)', '', '2012-04-20', 1),
(59, 'S12c', 'Sébastien Salva', 'HDR (Habilitation à diriger des recherches), Étude sur le test basé modèle de systèmes temporisés et d''applications à base de composants.', '2012-05-18', 'Université d''Auvergne', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/hdr.pdf', '2012, may', 4),
(63, 'SR11b', 'Sébastien Salva, Antoine Rollet', 'Automatic web service testing from wsdl descriptions. ', '2011-06-01', 'In 11th International Conference on Innovative Internet Community Services (I2CS 2011)', '186', '', '217--226', '(late publication of [SR08])', '', '', '', 'Berlin, Germany', '', 'Lecture Notes in Informatics', '', '2011 june', 2),
(61, 'ZSP12', 'Stassia R. Zafimiharisoa and S. Salva and P. Laurençot', 'An Automatic Security Testing approach of Android Applications', '2012-11-18', 'The Seventh International Conference on Software Engineering Advances (ICSEA 2012)', '', '', '643-646', '', '', '', '', 'Lisbon, Portugal', 'XPS (Xpert Publishing Services),', '', 'useruploads/files/ZSP12.pdf', '2012 nov.', 2),
(62, 'RR-13-04', 'Sébastien Salva', 'A Model-based testing approach combining passive testing and runtime verification. Application to Web service composition testing in Clouds, Reseach report RR13-04', '2013-04-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/RR-13-04.pdf', '2013, abril', 3),
(64, 'S12e', 'Sébastien Salva', 'Passive Testing of Symbolic Systems. A IOCO Proxy-Tester Based Approach', '2012-07-01', 'International Review on Computers and Software (IRECOS)', '7', '4', '', '', '', '', '', '', '', 'praise worthy prize', '', '2012 july', 1),
(65, 'S12d', 'Sébastien Salva', 'An approach for testing passively Web service compositions in Clouds', '2012-07-01', 'SERP''12, The 2012 International Conference on Software Engineering Research and Practice, WorlComp''12', '', '', '', '', '', '', '', '', '', '', '', '2012 july', 2),
(66, 'SC13', ' Sébastien Salva, Tien-Dung Cao ', 'Combining Passive Conformance Testing and Runtime Verification: Application to Web Service Compositions Deployed in Clouds', '2013-08-01', 'Software Engineering Research, Management and Applications', '496', '', '99-116', 'This paper proposes a model-based testing approach which combines two monitoring methods, runtime verification and passive testing. Starting from ioSTS (input output Symbolic Transition System) models, this approach generates monitors to check whether an implementation is conforming to its specification and meets safety properties. This paper also tackles the trace extraction problem by reusing the notion of proxy to collect traces from environments whose access rights are restricted. Instead of using a classical proxy to collect traces, we propose to generate a formal model from the specification, called Proxy-monitor, which acts as a proxy and which can directly detect implementation errors. We apply and specialise this approach on Web service compositions deployed in PaaS environments.', '(selected publication of  the 11th International Conference on Software Engineering Research(SERA), Management and Applications August 7-8, 2013, Prague, Czech Republic)', '          Passive Testing         Runtime Verification         Proxy         ioco         Web services         Clouds', 'Studies in Computational Intelligence', '', 'Lee, Roger', 'Springer International Publishing', 'useruploads/files/SC13.pdf', '2013 july', 1),
(67, 'SZ13', 'Sébastien Salva, Stassia R. Zafimiharisoa', 'Data vulnerability detection by security testing for Android applications', '2013-08-01', '2013 Information Security for South Africa, Johannesburg,                South Africa (ISSA), August 14-16', '', '', '1-8', '', '?The Android intent messaging is a mechanism that ties components together to build Mobile applications. Intents are kinds of messages composed of actions and data, sent by a component to another component to perform sev- eral operations, e.g., launching a user interface. The intent mechanism eases the writing of Mobile applications, but it might also be used as an entry point for security attacks. The latter can be easily sent with intents to components, that can indirectly forward attacks to other components and so on. In this context, this paper proposes a Model-based security testing approach to attempt to detect data vulnerabilities in Android applications. In other words, this approach generates test cases to check whether components are vulnerable to attacks, sent through intents, that expose personal data. Our method takes Android applications and intent-based vulnerabilities formally expressed with models called vulnerability patterns. Then, and this is the originality of our approach, partial speci?cations are automatically generated from con?guration ?les and component codes. Test cases are then automatically generated from vulnerability patterns and the previous speci?- cations. A tool, called APSET, is presented and evaluated with experimentations on some Android applications. ', 'Security testing, Android applications, Model- based testing, Mobile device security', '', 'Johannesburg, South Africa', '', '', 'useruploads/files/SZ13.pdf', 'aug 2013', 2),
(68, 'SZL13', 'Sébastien Salva, Stassia R. Zafimiharisoa, Patrice Laurençot}', 'Intent Security Testing - An Approach to Testing the Intent-based                Vulnerability of Android Components', '2013-07-01', 'SECRYPT 2013 - Proceedings of the 10th International Conference on Security and Cryptography', '', '', '355-362', '', 'The intent mechanism is a powerful feature of the Android platform that helps compose existing components together to build a Mobile application. However, hackers can leverage the intent messaging to extract personal data or to call components without credentials by sending malicious intents to components. This paper tackles this issue by proposing a security testing method which aims at detecting whether the components of an Android application are vulnerable to malicious intents. Our method takes Android projects and intent-based vulnerabilities formally represented with models called vulnerability patterns. The originality of our approach resides in the generation of partial specifications from configuration files and component codes to generate test cases. A tool, called APSET, is presented and evaluated with experimentations on some Android applications.', ' Security Testing; Android Applications; Model-Based Testing ', '', 'Reykjavík, Iceland', ' SciTePress 2013 ISBN 978-989-8565-73-0', '', 'useruploads/files/SZL13.pdf', 'july 2013', 2),
(69, 'SP14', 'Sébastien Salva and Patrice Laurençot', 'Conformance Testing with ioco Proxy-Testers: Application to Web service compositions deployed in Clouds', '2015-08-01', 'International Journal of Computer Aided Engineering and Technology (IJCAET)', '7', '3', '321--347', '', ' This paper describes a conformance testing method which aims\n at passively testing the conformance of component-based systems. The paper\n addresses the problem of reaction sequence observation in implementation\n environments where the installation of testing tools is not possible. The\n originality of the method resides in the definition of a Proxy-tester model from a\n specification and in the reformulation of the\n ioco\n test relation with Proxy-tester\n properties. Initially, we define the Proxy-tester model and we give the theoretical\n background to automatically generate Proxy-testers from specifications modelled\n with IOSTSs (input output Symbolic Transition System). The second part of\n the paper describes the application of this method on Web service compositions\n deployed in Clouds. We provide algorithms and passive tester architectures to\n collect traces from several concurrent composition instances running in parallel.\n Finally, we present the testing tool Cloud Paste and experiment results on two\n Clouds, Google AppEngine and Windows Azure', 'Passive testing; Proxy; Ioco; Google AppEngine; Windows Azure ', '', '', 'Inderscience', '', 'useruploads/files/SP14.pdf', '2015', 1),
(70, 'SZ15', 'Sébastien Salva and Stassia R. Zafimiharisoa', 'APSET, an Android aPplication SEcurity Testing tool for detecting intent-based vulnerabilities', '2015-01-04', 'International Journal on Software Tools for Technology Transfer (STTT)', '17', '2', '201-221', 'The Android messaging system, called in-\n tent, is a mechanism that ties comp onents together to\n build applications for smartphones. Intents are kinds of\n messages comp osed of actions and data, sent by a com-\n p onent to another comp onent to p erform several op era-\n tions, e.g., launching a user interface. The intent mech-\n anism o?er a lot of exibility for developing Android\n applications, but it might also b e used as an entry p oint\n for security attacks. The latter can b e easily sent with\n intents to comp onents, that can indirectly forward at-\n tacks to other comp onents and so on. In this context, this\n pap er prop oses APSET, a to ol for Android aPplication\n SEcurity Testing, which aims at detecting intent-based\n vulnerabilities. It takes as inputs Android applications\n and intent-based vulnerabilities formally expressed with\n mo dels called vulnerability patterns. Then, and this is\n the originality of our approach, class diagrams and par-\n tial sp eci cations are automatically generated from ap-\n plications with algorithms re ecting some knowledge of\n the Android do cumentation. These partial sp eci cations\n avoid false p ositives and re ne the test result with sp e-\n cial verdicts notifying that a comp onent is not compli-\n ant to its sp eci cation. Furthermore, we prop ose a test\n case execution framework which supp orts the receipt\n of any exception, the detection of application crashes,\n and provides a nal XML test rep ort detailing the test\n case verdicts. The vulnerability detection effectiveness of\n APSET is evaluated with exp erimentations on randomly\n chosen Android applications of the Android Market', '', ' Android Application Development; Model-Based Testing; Security Testing ', '', '', 'Springer Berlin Heidelberg', '', 'useruploads/files/SZ14.pdf', '2015', 1),
(71, 'SZ13b', 'S. Salva and Stassia R. Zafimiharisoa', 'Detection of intent-based vulnerabilities in Android applications, chapter 24', '2013-12-01', 'Book ICT: Emerging Trends in Information and Communication Technologies Security', '', '24', '', '', '', ' Security; Android Application Development; intent mechanism', '', '', 'Elsevier', '', 'useruploads/files/ICT143.zip', '2013', 1),
(72, 'DS14', 'William Durand and Sébastien Salva', 'Inference de modeles dirigee par la logique metier', '2014-06-11', 'AFADL (Approches Formelles dans l''Assistance au Développement de Logiciels)', '', '', '', '', '', ' IOSTS; test automatique; inférence de modèles', '', 'paris, France', '', '', 'useruploads/files/DS14.pdf', 'juin 2014', 2),
(73, 'S14', 'Sébastien Salva', 'Séminaire Lirmm', '2014-04-02', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/semmontp.zip', 'avril 2014', 5),
(74, 'SZ14b', 'Sébastien Salva and Stassia R. Zafimiharisoa', 'Model reverse-engineering of Mobile applications with exploration strategies', '2014-10-12', 'The Ninth International Conference on Software Engineering Advances, ICSEA 2014', '', '', '396-403', 'Best Paper Award', 'This paper presents a model reverse-engineering approach for mobile applications that belong to the GUI application category. This approach covers the interfaces of an application with automatic testing to incrementally infer a formal model expressing the navigational paths and states of the application. We propose the definition of a specialised GUI application model which stores the discovered interfaces and helps limit the application exploration. Then, we present an algorithm based upon the Ant Colony Optimisation technique which offers the possibility to parallelise the exploration and to conceive any application exploration strategy. Finally, our approach is experimented on Android applications and compared to other tools available in the literature.', ' model generation; Automatic testing;  Android application', '', 'Nice, France', '', '', 'useruploads/files/SZ14b.pdf', '2014, october', 2),
(75, 'SC14', 'Sébastien Salva and Tien-Dung Cao', 'Proxy-Monitor: An integration of runtime verification with passive conformance testing.', '2014-09-01', 'International Journal of Software Innovation (IJSI)', '2', '3', '20--42', 'extension of Sera''13', 'This paper proposes a conformance testing method combining two well-known testing approaches, runtime verification and passive testing. Runtime verification addresses the monitoring of a system under test to check whether formal properties hold, while passive testing aims at checking the conformance of the system in the long-term. The method, proposed in this paper, checks whether an implementation conforms to its specification with reference to the ioco test relation. While passively checking if ioco holds, it also checks whether the implementation meets safety properties, which informally state that ?nothing bad ever happens?. This paper also tackles the trace extraction problem, which is common to both runtime verification and passive testing. We define the notion of Proxy-monitors for collecting traces even when the implementation environment access rights are restricted. Then, we apply and specialise this approach on Web service compositions. A Web service composition deployed in different Clouds is experimented to assess the feasibility of the method.', 'Conformance testing, Passive Testing, Runtime Verification, Proxy-Tester, ioco, Monitoring, Service Composition, Clouds. ', '', '', 'IGI Global', '', 'useruploads/files/SC14.pdf', '2014', 1),
(76, 'SD14', 'Sébastien Salva and William Durand', 'Domain-Driven Model Inference Applied To Web Applications.', '2014-07-21', 'The 2014 International Conference on Software Engineering Research and Practice (SERP14)', '', '', '1--7', '', 'Model inference methods are attracting increased attention from industrials and researchers since they can be used to generate models for software comprehension, for test case generation, or for helping devise a complete model (or documentation). In this context, this paper presents an original inference model approach which recovers models from Web application HTTP traces. This approach combines formal model inference with domain-driven expert systems. Our framework, whose purpose is to simulate this human behaviour, is composed of inference rules, translating the domain expert knowledge, organised into layers. Each yields partial IOSTSs (Input Output Symbolic Transition System), which become more and more abstract and intelligible.', '?Model inference, formal model, IOSTS, rule- based system', '', 'Las Vegas, USA', '', '', 'useruploads/files/SD14.pdf', '2014 july, ', 2),
(77, 'DS14b', 'William Durand and Sébastien Salva', 'Inferring models with rule-based expert systems ', '2014-12-04', 'Proceedings of the Fifth Symposium on Information and Communication Technology, SoICT ''14,', '', '', '92--101', 'Many works related to software engineering rely upon for- mal models, e.g., to perform model-checking or automatic test case generation. Nonetheless, producing such mod- els is usually tedious and error-prone. Model inference is a research field helping in producing models by generating partial models from documentation or execution traces (ob- served action sequences). This paper presents a new model generation method combining model inference and expert systems. It appears that an engineer is able to recognise the functional behaviours of an application from its traces by applying deduction rules. We propose a framework, applied to Web applications, simulating this reasoning mechanism, with inference rules organised into layers. Each yields par- tial IOSTSs (Input Output Symbolic Transition Systems), which become more and more abstract and understandable.', '', 'Model inference, automatic testing, IOSTS, expert system', '', 'Hanoi, Vietnam', 'ACM', 'Nguyen Trong Giang and  Huynh Quyet Thang and Ismal Khalil and Son Hong Ngo and                Yves Deville and Marc Bui', 'useruploads/files/DS14b.pdf', '2014, dec', 2),
(78, 'SP15', 'Sébastien Salva and Patrice Laurençot', 'Model Inference and Automatic Testing of Mobile Applications', '2015-06-01', 'International Journal On Advances in Software', '8', '1,2', '', '', '', '', '', '', 'Iaria', '', 'useruploads/files/SP15.pdf', 'june 2015', 1),
(79, 'SPZ16', 'Sébastien Salva and Patrice Laurençot and Stassia R. Zafimiharisoa', 'Chapter Model inference of Mobile Applications with dynamic state abstraction', '2016-01-01', 'Studies in Computational Intelligence (SCI)', '612', '13', '177-193', '', '', '', 'Studies Comp.Intelligence', '', 'Springer International Publishing', '', 'useruploads/files/SPZ16.pdf', '2016', 1),
(80, 'DS15a', 'William Durand and Sébastien Salva', 'Autofunk: An Inference-Based Formal Model Generation Framework for Production Systems', '2015-06-24', 'Proceedings FM 2015: Formal Methods - 20th International Symposium ', '9109', '', '577--580', '', '', '', 'Lecture Notes in Computer Science', 'Oslo, Norway', 'Springer', '', 'useruploads/files/DS15a.pdf', 'June 2015', 2),
(81, 'SD15', 'Sébastien Salva and William Durand', 'Autofunk, a fast and scalable framework for building formal models from production systems', '2015-07-01', '9th ACM International Conference on Distributed Event-Based Systems (DEBS''15)', '', '', '', '', '', '', '', 'Oslo, Norway', 'ACM', '', 'useruploads/files/SD15.pdf', 'july 2015', 2),
(82, 'RBS15', 'Loukmen Regainia and Cédric Bouhours and Sébastien Salva', 'Une démarche pour l?assistance à l?utilisation des patrons de sécurité', '2015-05-09', '4ème Conférence en IngénieriE du Logiciel (CIEL)', '', '', '', '', '', '', '', 'Bordeaux, France', '', '', 'useruploads/files/RBS15.pdf', 'june 2015', 2),
(83, 'DS15b', 'William Durand and Sébastien Salva', 'Passive testing of production systems based on model inference', '2015-09-21', 'ACM/IEEE International Conference on Formal Methods and Models                for Codesign, MEMOCODE 2015, Austin, TX, USA,', '', '', '138--147', '', '', '', '', 'Austin, Texas, USA', 'ACM', '', 'useruploads/files/DS15b.pdf', 'September 21-23, 2015', 2),
(84, 'SLZ15', 'Sébastien Salva, Patrice Laurençot and Stassia R. Zafimiharisoa', 'Model inference of Mobile Applications with dynamic state abstraction', '2015-09-01', '13th IEEE/ACIS International Conference on Software Engineering Research, Management and Applications  (SERA 2015) ', '', '', '', '', '', '', '', 'Toulouse, France', 'IEEE/ACIS ', '', '', 'sept. 2015', 2),
(85, 'RBS16', 'Loukmen Reigaigna and Cédric Bouhours and Sébastien Salva', 'A systematic approach to assist designers in security pattern integration', '2016-02-21', 'The Second International Conference on Advances and Trends in Software Engineering  (SOFTENG 2016)', '', '', '', '', 'Acceptance rate: 29% ', '', '', 'Lisbon, Portugal', '', '', 'useruploads/files/RBS16.pdf', '21-25 feb. 2016', 2),
(86, 'RSB16a', 'L. Regainia and S. Salva and C. Bouhours,', 'Une démarche pour l''assistance a l?utilisation des patrons de sécurité', '2016-12-01', 'Technique et Science Informatiques (TSI)', '', '', '', '', '', '', '', '', 'Lavoisier', '', 'useruploads/files/RSB16a.pdf', 'dec 2016', 1),
(90, 'RS17', 'L. Regainia and S. Salva', 'A methodology of security pattern classification and of Attack-Defense Tree generation', '2017-02-01', 'Proceedings of the 3nd International Conference on Information Systems                Security and Privacy {(ICISSP} 2017', '', '', '', '', '', '', '', 'Porto, Portugal', 'SciTePress', 'Olivier Camp and Steven Furnell and Paolo Mori', 'useruploads/files/RS17.pdf', '19-21 feb. 2017 ', 2),
(88, 'RSB16b', 'L. Regainia and S. Salva and C. Bouhours', 'A classification methodology for security patterns to help fix software weaknesses', '2016-11-29', '13th ACS/IEEE International Conference on Computer Systems and Applications AICCSA 2016', '', '', '', '', 'acceptance rate: 26%', '', '', 'Agadir, Morocco', 'IEEE Computer Society', '', 'useruploads/files/RSB16b.pdf', 'dec. 2016', 2),
(89, 'S16', 'S. Salva', 'Keynote: Testing in the clouds', '2016-07-04', '12th TAROT Summer School 2016 on Software Testing, Verification & Validation ', '', '', '', '', 'http://tarot2016.wp.telecom-sudparis.eu/speakers/', '', '', 'Paris, France', '', '', '', 'July 4-8th, 2016', 5),
(91, 'RR-17-03', 'Sébastien Salva and William Durand', 'Research report RR-17-03: Combining model generation and passive testing in the same framework to test industrial systems', '2017-03-01', '', '', '', '', '', '', '', '', '', '', '', 'useruploads/files/SD17a.pdf', 'march 2017', 3),
(92, 'RBS17', 'L. Regainia and C. Bouhours and S. Salva', 'Un Data-Store pour la Génération de Cas de Tests', '2017-06-13', '', '', '', '41--48', '', '', '', '', 'Montpellier, France', '16th AFADL Approches Formelles dans l''Assistance au Développement de Logiciels, journées du GDR GPL', '', 'useruploads/files/RBS17.pdf', 'june 2017', 2),
(93, 'SD17', 'Sébastien Salva and William Durand', 'Combining Model Inference and Passive Testing in the Same Framework to Test Industrial Systems', '2017-11-01', 'International Journal of Information System Modeling and Design (IJISMD)', '8', '1', '', 'Special Issue Submission: Model-driven Development of Enterprise Software Systems', '', '', '', '', 'IGI Global', '', 'useruploads/files/SD17.pdf', 'nov, 2017', 1),
(94, 'SR17b', 'Sébastien Salva and Loukmen Regainia', 'Using Data Integration for Security Testing', '2017-10-10', 'Testing Software and Systems - 29th {IFIP} {WG} 6.1 International Conference, {ICTSS} 2017, St. Petersburg, Russia, October 9-11, 2017, Proceedings', '', '10533', '178--194', '', '', '', 'Lecture Notes in Computer Science', '', 'Springer', 'Nina Yevtushenko and Ana Rosa Cavalli and H{\\"{u}}sn{\\"{u}} Yenig{\\"{u}}n', 'useruploads/files/SR17b.pdf', 'oct. 2017', 2);

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
-- Indexes for table `Conference`
--
ALTER TABLE `Conference`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `Token`
--
ALTER TABLE `Token`
  ADD PRIMARY KEY (`Token`),
  ADD UNIQUE KEY `Token` (`Token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Conference`
--
ALTER TABLE `Conference`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

ALTER TABLE `Parameter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
