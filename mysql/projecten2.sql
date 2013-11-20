-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 nov 2013 om 22:51
-- Serverversie: 5.5.24-log
-- PHP-versie: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `projecten2`
--

CREATE Database `projecten2`;
USE `projecten2`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `idAdministrators` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAdministrators`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `administrators`
--

INSERT INTO `administrators` (`idAdministrators`, `Name`, `Email`, `password`) VALUES
(1, 'Wouter Lambrechts', 'wouter.lambrechts@kahosl.be', '150992'),
(2, 'tim', 'tim.bauwens1@kahosl.be', 'test'),
(3, 'Jens Mortier', 'jens.mortier@kahosl.be', 'Azerty123');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `idCourses` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(45) DEFAULT NULL,
  `OPO` bit(1) DEFAULT NULL,
  `OLA` bit(1) DEFAULT NULL,
  `Jaar` int(11) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `Studiepunten` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCourses`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Gegevens worden uitgevoerd voor tabel `courses`
--

INSERT INTO `courses` (`idCourses`, `Naam`, `OPO`, `OLA`, `Jaar`, `Semester`, `Studiepunten`) VALUES
(1, 'Computertechnologie 1', b'1', b'0', 1, 1, 4),
(2, 'Theorie Computertechnologie 1 ', b'0', b'1', 1, 1, 2),
(3, 'Labo Computertechnologie 1', b'0', b'1', 1, 1, 2),
(4, 'Computertechnologie 2', b'1', b'0', 1, 2, 7),
(5, 'PC-architectuur', b'0', b'1', 1, 2, 2),
(6, 'Labo PC-architectuur', b'0', b'1', 1, 2, 2),
(7, 'Processorarchitectuur', b'0', b'1', 1, 2, 3),
(8, 'Datanetwerken 1', b'1', b'0', 1, 1, 4),
(9, 'Datanetwerken 2', b'1', b'0', 1, 2, 3),
(10, 'Digitaaltechniek', b'1', b'0', 1, 2, 7),
(11, 'Theorie Digitaaltechniek', b'0', b'1', 1, 2, 4),
(12, 'Labo Digitaaltechniek', b'0', b'1', 1, 2, 3),
(13, 'Elektriciteit', b'1', b'0', 1, 1, 5),
(14, 'Theorie Elektriciteit', b'0', b'1', 1, 1, 2),
(15, 'Labo Elektriciteit', b'0', b'1', 1, 1, 3),
(16, 'Gegevensbanken 1', b'1', b'0', 1, 2, 4),
(17, 'Theorie Gegevensbanken 1', b'0', b'1', 1, 2, 1),
(18, 'Labo Gegevensbanken 1', b'0', b'1', 1, 2, 3),
(19, 'Programmeren 1', b'1', b'0', 1, 1, 5),
(20, 'Theorie Java Basisconcepten ', b'0', b'1', 1, 1, 1),
(21, 'Labo Java Basisconcepten ', b'0', b'1', 1, 1, 4),
(22, 'Programmeren 2', b'1', b'0', 1, 2, 5),
(23, 'Theorie Java OO Programmeren ', b'0', b'1', 1, 2, 1),
(24, 'Labo Java OO Programmeren ', b'0', b'1', 1, 2, 4),
(25, 'Systeembeheer 1', b'1', b'0', 1, 1, 3),
(26, 'Labo Windows', b'0', b'1', 1, 1, 2),
(27, 'Labo Linux', b'0', b'1', 1, 1, 1),
(28, 'Web Design and Usability 1', b'1', b'0', 1, 1, 4),
(29, 'Theorie Webdesign and Usability 1', b'0', b'1', 1, 1, 2),
(30, 'Labo Webdesign and Usability 1', b'0', b'1', 1, 1, 2),
(31, 'Webtechnieken', b'1', b'0', 1, 2, 5),
(32, 'Labo Webtechnieken', b'0', b'1', 1, 2, 3),
(33, 'Theorie Webtechnieken', b'0', b'1', 1, 2, 3),
(34, 'Wiskunde voor ICT', b'1', b'0', 1, 1, 4),
(35, 'Theorie Wiskunde voor ICT', b'0', b'1', 1, 1, 3),
(36, 'Oefeningen Wiskunde voor ICT', b'0', b'1', 1, 1, 2),
(37, 'Communicatieve vorming 1', b'1', b'0', 2, 2, 4),
(38, 'Frans 1', b'0', b'1', 2, 1, 2),
(39, 'Engels 1', b'0', b'1', 2, 1, 2),
(40, 'Computertechnologie 3', b'1', b'0', 2, 2, 3),
(41, 'interfacing and microcontrollers', b'0', b'1', 2, 2, 1),
(42, 'labo microcontrollers', b'0', b'1', 2, 2, 2),
(43, 'Elektronica', b'1', b'0', 2, 1, 5),
(44, 'theorie Elektronica', b'0', b'1', 2, 1, 2),
(45, 'Labo Elektronica', b'0', b'1', 2, 1, 3),
(46, 'Filosofie-Ethiek-RZL 1', b'1', b'0', 2, 1, 4),
(47, 'Netwerken 2', b'1', b'0', 2, 1, 3),
(48, 'Netwerken 3', b'1', b'0', 2, 2, 3),
(49, 'Programmeren 3', b'1', b'0', 2, 1, 5),
(50, 'C# OO programmeren', b'0', b'1', 2, 1, 1),
(51, 'Labo C# OO programmeren', b'0', b'1', 2, 1, 2),
(52, 'Multimediatechnologie', b'0', b'1', 2, 1, 2),
(53, 'Programmeren 4', b'1', b'0', 2, 2, 7),
(54, 'C# DB programmeren', b'0', b'1', 2, 2, 1),
(55, 'labo C# DB programmeren', b'0', b'1', 2, 2, 3),
(56, 'Multimediatechnologie 2', b'0', b'1', 2, 2, 3),
(57, 'Projecten 1', b'1', b'0', 2, 2, 5),
(58, 'Systeembeheer 2', b'1', b'0', 2, 1, 3),
(59, 'Besturingsystemen', b'0', b'1', 2, 1, 1),
(60, 'Labo Linux 2', b'0', b'1', 2, 1, 2),
(61, 'Systeembeheer 3', b'1', b'0', 2, 2, 4),
(62, 'Basis Systeembeheer', b'0', b'1', 2, 2, 1),
(63, 'Labo Basis Systeembeheer', b'0', b'1', 2, 2, 3),
(64, 'Webdesign and Usability 2 ', b'1', b'0', 2, 1, 5),
(65, 'Theorie Webdesign and Usability 2 ', b'0', b'1', 2, 1, 3),
(66, 'Labo Webdesign and Usability 2 ', b'0', b'1', 2, 1, 3),
(67, 'Webscripten 1', b'1', b'0', 2, 1, 6),
(68, 'Clientside webscripten 1', b'0', b'1', 2, 1, 2),
(69, 'Serverside webscripten 1', b'0', b'1', 2, 1, 2),
(70, 'Labo Serverside webscripten 1', b'0', b'1', 2, 1, 2),
(71, 'Labo Clientside webscripten 1', b'0', b'1', 2, 1, 2),
(72, 'Webscripten 2', b'1', b'0', 2, 2, 3),
(73, 'Geavanceerd Webscripten 2', b'0', b'1', 2, 2, 2),
(74, 'Labo Geavanceerd Webscripten 2', b'0', b'1', 2, 2, 2),
(75, 'Bedrijfskunde', b'1', b'0', 3, 1, 4),
(76, 'Bedrijfsbeheer', b'0', b'1', 3, 1, 2),
(77, 'Kwaliteitskunde', b'0', b'1', 3, 1, 2),
(78, 'Communicatieve vorming 2', b'1', b'0', 3, 1, 4),
(79, 'Frans 2', b'0', b'1', 3, 1, 2),
(80, 'Engels 2', b'0', b'1', 3, 1, 2),
(81, 'Computerbeveiliging', b'1', b'0', 3, 1, 3),
(82, 'Theorie Computerbeveiliging', b'0', b'1', 3, 1, 2),
(83, 'Labo Computerbeveiliging', b'0', b'1', 3, 1, 1),
(84, 'Ethiek 2', b'1', b'0', 3, 1, 3),
(85, 'Netwerken 4', b'1', b'0', 3, 1, 3),
(86, 'Datacommunicatie', b'0', b'1', 3, 1, 1),
(87, 'Accessing the WAN', b'0', b'1', 3, 1, 2),
(88, 'Projecten 2', b'1', b'0', 3, 1, 4),
(89, 'Programmeren 5', b'1', b'0', 3, 1, 3),
(90, 'theorie Geavanceerd programmeren', b'0', b'1', 3, 1, 1),
(91, 'Labo Geavanceerd programmeren', b'0', b'1', 3, 1, 2),
(92, 'Webprogrammatie ', b'1', b'0', 3, 1, 5),
(93, 'Systeembeheer 4', b'1', b'0', 3, 1, 4),
(94, 'Labo Geavanceerd Systeembeheer', b'0', b'1', 3, 1, 3),
(95, 'Theorie Geavanceerd Systeembeheer', b'0', b'1', 3, 1, 1),
(96, 'Stage', b'1', b'0', 3, 2, 11),
(97, 'Bachelorproef', b'1', b'0', 3, 2, 9),
(98, 'Software Ingenieurstechnieken', b'1', b'0', 3, 2, 7),
(99, 'Theorie Software Ingenieurstechnieken', b'0', b'1', 3, 2, 3),
(100, 'Labo Software Ingenieurstechnieken', b'0', b'1', 3, 2, 4),
(101, 'Advanced Networking Technology', b'1', b'0', 3, 2, 7),
(102, 'Theorie Advanced Networking Technology', b'0', b'1', 3, 2, 3),
(103, 'Labo Advanced Networking Technology', b'0', b'1', 3, 2, 3),
(104, 'Web and Mobile Development', b'1', b'0', 3, 2, 7),
(105, 'Theorie Web and Mobile Development', b'0', b'1', 3, 2, 4),
(106, 'Labo Web and Mobile Development', b'0', b'1', 3, 2, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `isp_aanvraag`
--

CREATE TABLE IF NOT EXISTS `isp_aanvraag` (
  `idISP_aanvraag` int(11) NOT NULL AUTO_INCREMENT,
  `students_idStudents` int(11) NOT NULL,
  `Schooljaar` int(11) DEFAULT NULL,
  `studiepunten` int(11) DEFAULT NULL,
  `toestand` enum('bevestigd','Niet bevestigd','Afgekeurd') DEFAULT NULL,
  `Commentaar` varchar(45) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  PRIMARY KEY (`idISP_aanvraag`),
  KEY `fk_ISP_aanvraag_students1_idx` (`students_idStudents`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Gegevens worden uitgevoerd voor tabel `isp_aanvraag`
--

INSERT INTO `isp_aanvraag` (`idISP_aanvraag`, `students_idStudents`, `Schooljaar`, `studiepunten`, `toestand`, `Commentaar`, `datum`) VALUES
(35, 4, 2013, 0, 'Niet bevestigd', 'Commentaar: niet aanwezig', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `isp_lesrooster`
--

CREATE TABLE IF NOT EXISTS `isp_lesrooster` (
  `idISP_lesrooster` int(11) NOT NULL AUTO_INCREMENT,
  `lesrooster_idlesrooster` int(11) NOT NULL,
  `students_idStudents` int(11) NOT NULL,
  PRIMARY KEY (`idISP_lesrooster`),
  KEY `fk_ISP_lesrooster_lesrooster1_idx` (`lesrooster_idlesrooster`),
  KEY `fk_ISP_lesrooster_students1_idx` (`students_idStudents`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `isp_vakken`
--

CREATE TABLE IF NOT EXISTS `isp_vakken` (
  `idISP_vakken` int(11) NOT NULL AUTO_INCREMENT,
  `ISP_aanvraag` int(11) NOT NULL,
  `idCourses` int(11) NOT NULL,
  PRIMARY KEY (`idISP_vakken`),
  KEY `fk_ISP_vakken_ISP_aanvraag1_idx` (`ISP_aanvraag`),
  KEY `fk_ISP_vakken_courses1_idx` (`idCourses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klasgroep`
--

CREATE TABLE IF NOT EXISTS `klasgroep` (
  `idklasgroep` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(45) DEFAULT NULL,
  `jaar` int(11) NOT NULL,
  `max_student` int(11) DEFAULT NULL,
  PRIMARY KEY (`idklasgroep`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `klasgroep`
--

INSERT INTO `klasgroep` (`idklasgroep`, `Naam`, `jaar`, `max_student`) VALUES
(1, '1ICT1', 1, 25),
(2, '1ICT2', 1, 25),
(3, '1ICT3', 1, 25),
(4, '1ICT4', 1, 25);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesrooster`
--

CREATE TABLE IF NOT EXISTS `lesrooster` (
  `idlesrooster` int(11) NOT NULL AUTO_INCREMENT,
  `courses_idCourses` int(11) NOT NULL,
  `les` int(11) DEFAULT NULL,
  `Dag` int(11) DEFAULT NULL,
  `max_student` int(11) DEFAULT NULL,
  `klasgroep_idklasgroep` int(11) NOT NULL,
  PRIMARY KEY (`idlesrooster`),
  KEY `fk_lesrooster_courses1_idx` (`courses_idCourses`),
  KEY `fk_lesrooster_klasgroep1_idx` (`klasgroep_idklasgroep`),
  KEY `les` (`les`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Gegevens worden uitgevoerd voor tabel `lesrooster`
--

INSERT INTO `lesrooster` (`idlesrooster`, `courses_idCourses`, `les`, `Dag`, `max_student`, `klasgroep_idklasgroep`) VALUES
(1, 20, 1, 1, NULL, 1),
(2, 29, 2, 1, NULL, 1),
(3, 35, 3, 1, NULL, 1),
(4, 36, 4, 1, 25, 1),
(5, 14, 2, 2, NULL, 1),
(6, 2, 3, 2, NULL, 1),
(7, 30, 1, 3, 25, 1),
(8, 30, 2, 3, 25, 1),
(9, 8, 3, 3, NULL, 1),
(10, 21, 1, 4, 25, 1),
(11, 21, 2, 4, 25, 1),
(12, 15, 3, 4, 25, 1),
(13, 15, 4, 4, 25, 1),
(14, 27, 1, 5, 25, 1),
(15, 26, 3, 5, 25, 1),
(16, 3, 2, 5, 25, 1),
(17, 11, 1, 1, NULL, 1),
(18, 33, 2, 1, NULL, 1),
(19, 33, 3, 1, 25, 1),
(20, 32, 4, 1, 25, 1),
(21, 32, 5, 1, 25, 1),
(22, 9, 1, 2, NULL, 1),
(23, 5, 2, 2, NULL, 1),
(24, 12, 1, 3, 25, 1),
(25, 12, 2, 3, 25, 1),
(26, 18, 3, 3, 25, 1),
(27, 24, 4, 3, 25, 1),
(28, 17, 2, 4, 25, 1),
(29, 23, 3, 4, 25, 1),
(30, 11, 4, 4, 25, 1),
(31, 5, 3, 5, NULL, 1),
(32, 7, 4, 5, NULL, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesuren`
--

CREATE TABLE IF NOT EXISTS `lesuren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `lesuren`
--

INSERT INTO `lesuren` (`id`, `uur`) VALUES
(1, '8u10 - 9u35'),
(2, '9u45 -11u10'),
(3, '11u10 - 12u45'),
(4, '13u30 - 14u55'),
(5, '15u05 - 16u30'),
(6, '16u30 - 18u00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opo`
--

CREATE TABLE IF NOT EXISTS `opo` (
  `idOpo` int(11) NOT NULL AUTO_INCREMENT,
  `id_OPO` int(11) NOT NULL,
  `id_OLA` int(11) NOT NULL,
  PRIMARY KEY (`idOpo`),
  KEY `fk_opo_courses1_idx` (`id_OPO`),
  KEY `fk_opo_courses2_idx` (`id_OLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Gegevens worden uitgevoerd voor tabel `opo`
--

INSERT INTO `opo` (`idOpo`, `id_OPO`, `id_OLA`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 4, 5),
(4, 4, 6),
(5, 4, 7),
(6, 10, 11),
(7, 10, 12),
(8, 13, 14),
(9, 13, 15),
(10, 16, 17),
(11, 16, 18),
(12, 19, 20),
(13, 19, 21),
(14, 22, 23),
(15, 22, 24),
(16, 25, 26),
(17, 25, 27),
(18, 28, 29),
(19, 28, 30),
(20, 31, 32),
(21, 31, 33),
(22, 34, 35),
(23, 34, 36),
(24, 37, 38),
(25, 37, 39),
(26, 40, 41),
(27, 40, 42),
(28, 43, 44),
(29, 43, 45),
(30, 49, 50),
(31, 49, 51),
(32, 49, 52),
(33, 53, 54),
(34, 53, 55),
(35, 53, 56),
(36, 58, 59),
(37, 58, 60),
(38, 61, 62),
(39, 61, 63),
(40, 64, 65),
(41, 64, 66),
(42, 67, 68),
(43, 67, 69),
(44, 67, 70),
(45, 67, 71),
(46, 67, 71),
(47, 72, 73),
(48, 72, 74),
(49, 75, 76),
(50, 75, 77),
(51, 78, 79),
(52, 78, 80),
(53, 81, 82),
(54, 81, 83),
(55, 85, 86),
(56, 85, 87),
(57, 89, 90),
(58, 89, 91),
(59, 93, 94),
(60, 93, 95),
(61, 98, 99),
(62, 98, 100),
(63, 101, 102),
(64, 101, 103),
(65, 104, 105),
(66, 104, 106);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `idPoints` int(255) NOT NULL AUTO_INCREMENT,
  `score` enum('success','unsuccess') DEFAULT NULL,
  `students_idStudents` int(11) NOT NULL,
  `courses_idCourses` int(11) NOT NULL,
  PRIMARY KEY (`idPoints`),
  KEY `fk_points_students_idx` (`students_idStudents`),
  KEY `fk_points_courses1_idx` (`courses_idCourses`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Gegevens worden uitgevoerd voor tabel `points`
--

INSERT INTO `points` (`idPoints`, `score`, `students_idStudents`, `courses_idCourses`) VALUES
(88, 'success', 4, 1),
(89, 'unsuccess', 4, 4),
(90, 'success', 4, 8),
(91, 'unsuccess', 4, 9),
(92, 'success', 4, 10),
(93, 'success', 4, 13),
(94, 'success', 4, 16),
(95, 'success', 4, 19),
(96, 'success', 4, 22),
(97, 'success', 4, 25),
(98, 'success', 4, 28),
(99, 'success', 4, 31),
(100, 'success', 4, 34);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `idStudents` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `id_Klasgroep` int(11) DEFAULT NULL,
  `vorige_klasgroep` varchar(255) DEFAULT NULL,
  `student` enum('model','isp') DEFAULT NULL,
  PRIMARY KEY (`idStudents`),
  KEY `id_Klasgroep` (`id_Klasgroep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `students`
--

INSERT INTO `students` (`idStudents`, `Name`, `Email`, `password`, `id_Klasgroep`, `vorige_klasgroep`, `student`) VALUES
(4, 'Wouter Lambrechts', 'wouter.lambrechts@kahosl.be', '150992', 1, '1ICT2', 'isp'),
(5, 'Jens Mortier', 'jens.mortier@kahosl.be', 'Azerty123', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `volgtijdelijkheden`
--

CREATE TABLE IF NOT EXISTS `volgtijdelijkheden` (
  `idVolgtijdelijkheden` int(11) NOT NULL AUTO_INCREMENT,
  `id_Vak` int(11) NOT NULL,
  `id_GeslaagdVak` int(11) NOT NULL,
  PRIMARY KEY (`idVolgtijdelijkheden`),
  KEY `fk_volgtijdelijkheden_courses1_idx` (`id_Vak`),
  KEY `fk_volgtijdelijkheden_courses2_idx` (`id_GeslaagdVak`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Gegevens worden uitgevoerd voor tabel `volgtijdelijkheden`
--

INSERT INTO `volgtijdelijkheden` (`idVolgtijdelijkheden`, `id_Vak`, `id_GeslaagdVak`) VALUES
(1, 72, 28),
(2, 64, 31),
(3, 47, 8),
(4, 48, 8),
(5, 81, 58),
(6, 81, 47),
(7, 81, 48),
(8, 85, 48),
(9, 85, 47),
(10, 58, 4),
(11, 61, 8),
(12, 75, 58),
(13, 101, 61),
(14, 49, 34),
(15, 75, 22),
(16, 53, 16),
(17, 92, 53),
(18, 67, 16),
(19, 67, 22),
(20, 64, 31),
(21, 72, 28),
(22, 104, 72),
(23, 104, 64),
(24, 88, 37),
(25, 97, 1),
(26, 97, 4),
(27, 97, 34),
(28, 97, 40),
(29, 97, 58),
(30, 97, 61),
(31, 97, 25),
(32, 97, 16),
(33, 97, 19),
(34, 97, 22),
(35, 97, 49),
(36, 97, 53),
(37, 97, 67),
(38, 97, 31),
(39, 97, 28),
(40, 97, 72),
(41, 97, 47),
(42, 97, 48),
(43, 97, 37),
(44, 97, 57),
(45, 89, 19),
(46, 89, 22),
(47, 89, 49),
(48, 89, 53),
(49, 96, 1),
(50, 96, 4),
(51, 96, 34),
(52, 96, 40),
(53, 96, 58),
(54, 96, 61),
(55, 96, 25),
(56, 96, 16),
(57, 96, 19),
(58, 96, 22),
(59, 96, 49),
(60, 96, 53),
(61, 96, 67),
(62, 96, 31),
(63, 96, 28),
(64, 96, 72),
(65, 96, 47),
(66, 96, 48),
(67, 96, 37),
(68, 96, 57),
(69, 47, 8),
(70, 47, 9),
(71, 48, 9),
(72, 48, 8);

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `isp_aanvraag`
--
ALTER TABLE `isp_aanvraag`
  ADD CONSTRAINT `fk_ISP_aanvraag_students1` FOREIGN KEY (`students_idStudents`) REFERENCES `students` (`idStudents`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `isp_lesrooster`
--
ALTER TABLE `isp_lesrooster`
  ADD CONSTRAINT `fk_ISP_lesrooster_lesrooster1` FOREIGN KEY (`lesrooster_idlesrooster`) REFERENCES `lesrooster` (`idlesrooster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ISP_lesrooster_students1` FOREIGN KEY (`students_idStudents`) REFERENCES `students` (`idStudents`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `isp_vakken`
--
ALTER TABLE `isp_vakken`
  ADD CONSTRAINT `fk_ISP_vakken_courses1` FOREIGN KEY (`idCourses`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ISP_vakken_ISP_aanvraag1` FOREIGN KEY (`ISP_aanvraag`) REFERENCES `isp_aanvraag` (`idISP_aanvraag`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `lesrooster`
--
ALTER TABLE `lesrooster`
  ADD CONSTRAINT `fk_lesrooster_courses1` FOREIGN KEY (`courses_idCourses`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lesrooster_klasgroep1` FOREIGN KEY (`klasgroep_idklasgroep`) REFERENCES `klasgroep` (`idklasgroep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lesrooster_ibfk_1` FOREIGN KEY (`les`) REFERENCES `lesuren` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `opo`
--
ALTER TABLE `opo`
  ADD CONSTRAINT `fk_opo_courses1` FOREIGN KEY (`id_OPO`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_opo_courses2` FOREIGN KEY (`id_OLA`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `fk_points_courses1` FOREIGN KEY (`courses_idCourses`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_points_students` FOREIGN KEY (`students_idStudents`) REFERENCES `students` (`idStudents`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_Klasgroep`) REFERENCES `klasgroep` (`idklasgroep`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `volgtijdelijkheden`
--
ALTER TABLE `volgtijdelijkheden`
  ADD CONSTRAINT `fk_volgtijdelijkheden_courses1` FOREIGN KEY (`id_Vak`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_volgtijdelijkheden_courses2` FOREIGN KEY (`id_GeslaagdVak`) REFERENCES `courses` (`idCourses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
