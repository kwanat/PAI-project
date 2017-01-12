-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2017 at 05:12 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.14-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_motocykle`
--
CREATE DATABASE IF NOT EXISTS `baza_motocykle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `baza_motocykle`;

-- --------------------------------------------------------

--
-- Table structure for table `ARCHI_UZYTK`
--

CREATE TABLE IF NOT EXISTS `ARCHI_UZYTK` (
  `Id_uzytkownika` int(3) NOT NULL,
  `login` varchar(15) CHARACTER SET utf8 NOT NULL,
  `haslo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `e_mail` varchar(30) CHARACTER SET utf8 NOT NULL,
  `imie` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `nazwisko` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `motocykl` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `data_rejestracji` datetime NOT NULL,
  `operacja` varchar(1) CHARACTER SET utf8 NOT NULL,
  `data_zmiany` timestamp NOT NULL DEFAULT '2011-10-10 04:00:00',
  KEY `poziom_uprawnien` (`operacja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
PARTITION BY RANGE (unix_timestamp(data_zmiany))
(
PARTITION p0 VALUES LESS THAN (1483225200)ENGINE=InnoDB,
PARTITION p1 VALUES LESS THAN (1514761200)ENGINE=InnoDB,
PARTITION p2 VALUES LESS THAN MAXVALUEENGINE=InnoDB
);

--
-- Dumping data for table `ARCHI_UZYTK`
--

INSERT INTO `ARCHI_UZYTK` (`Id_uzytkownika`, `login`, `haslo`, `e_mail`, `imie`, `nazwisko`, `motocykl`, `data_rejestracji`, `operacja`, `data_zmiany`) VALUES
(1, 'admin', 'dvdd', 'admin@wp.pl', '', '', '', '2016-10-24 10:05:10', 'u', '2016-11-12 05:00:00'),
(2, 'aergreg', 'dfagadfg', 'g', 'g', 'reg', 'erg', '2016-10-18 10:06:16', 'd', '2016-11-12 05:00:00'),
(4, 'kwanat', '398d6f53f5b562a7a9769d96ac5dba90f1908a35', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-11-12 17:44:06', 'd', '2016-11-12 05:00:00'),
(1, 'kwanat', 'dvd', 'vf', 'vfd', 'vf', 'fdv', '2016-10-24 10:05:10', 'u', '2016-11-12 05:00:00'),
(1, 'kwanat', 'dvdd', 'vf', 'vfd', 'vf', 'fdv', '2016-10-24 10:05:10', 'u', '2016-11-12 05:00:00'),
(3, 'kwanat123', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa@wp.pl', '', '', '', '2016-11-12 17:14:18', 'd', '2016-11-12 05:00:00'),
(6, 'kwanat', '398d6f53f5b562a7a9769d96ac5dba90f1908a35', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-11-12 17:49:40', 'd', '2016-12-09 04:26:53'),
(7, 'miwierz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'asdf@wp.pl', 'MIchał', 'Wierzbiński', '', '2016-11-14 09:59:05', 'd', '2016-12-09 04:26:58'),
(14, 'abcd', '81fe8bfe87576c3ecb22426f8e57847382917acf', 'abcd@wo', '', '', '', '2016-11-28 10:22:05', 'd', '2016-12-09 04:27:09'),
(13, 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'ka@wp', '', '', '', '2016-11-28 10:02:16', 'd', '2016-12-09 04:27:09'),
(11, ':":dfg', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aws@wp.pl', '', '', '', '2016-11-14 10:42:10', 'd', '2016-12-09 04:27:09'),
(10, '&#039;;lgfhfx', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa@wp.pl', '', '', '', '2016-11-14 10:39:27', 'd', '2016-12-09 04:27:09'),
(9, 'student1', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '123@wp.pl', '', '', '', '2016-11-14 10:36:02', 'd', '2016-12-09 04:27:09'),
(8, 'student', 'bf9661defa3daecacfde5bde0214c4a439351d4d', 'student@student.pl', 'student1', '', '', '2016-11-14 10:26:50', 'd', '2016-12-09 04:27:09'),
(15, 'michalW', '507e061196a30d2c153bf13bdad1fc0ad7f1aab1', 'MICHAL@GMAIL.COM', 'MICHAL', 'WIERZBINSKI', 'HAYABUSA', '2016-11-28 10:38:59', 'd', '2016-12-09 04:27:24'),
(16, 'adminek', '8550ed8b9c70afed607e65460f2878851b957f36', 'adminek@wp.pl', '', '', '', '2016-12-05 10:50:25', 'd', '2016-12-09 04:31:08'),
(1, 'admin', '398d6f53f5b562a7a9769d96ac5dba90f1908a35', 'admin@wp.pl', '', '', '', '2016-10-24 10:05:10', 'd', '2016-12-28 04:47:27'),
(18, 'admin', '866f01287a836284c62cf0ca62a8d78772774bfd', 'admin@admin.pl', '', '', '', '2016-12-27 23:48:01', 'u', '2016-12-31 03:04:52'),
(17, 'kwanat', '55cedde951a44d02da2481275f885e9f42d8683e', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-08 23:32:14', 'd', '2016-12-31 18:15:04'),
(21, '', 'c0c5b564776b3c7f59de44c8edcdb2df35faa7ae', '', '', '', '', '2016-12-31 14:15:35', 'd', '2016-12-31 19:18:54'),
(22, 'odwiedzajacy', 'd54ac9d832c59cb8c0cbe2cd1f1fbd23061d0ff3', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:19:35', 'd', '2016-12-31 19:23:22'),
(23, 'odwiedzajacy', '2c414ad27adaea5e8fb46185ec1ea2bc2da67f93', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:23:36', 'd', '2016-12-31 19:30:11'),
(24, 'odwiedzajacy', 'e9d7af402cc67b07b6d1eccf93119b3631a772b8', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:30:29', 'd', '2016-12-31 19:33:58'),
(25, 'odwiedzajacy', 'b7a579571a1b3d556e688a88077ae20e784a82d9', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:34:14', 'u', '2016-12-31 19:41:13'),
(25, 'odwiedzajacy', 'b7a579571a1b3d556e688a88077ae20e784a82d9', 'odwiedzajacy@odw.pl', 'Odwiedzaęźćżjący', 'Odw', '', '2016-12-31 14:34:14', 'u', '2016-12-31 19:41:36'),
(20, 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 01:50:11'),
(20, 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 01:53:57'),
(20, 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow VT125', '2016-12-31 13:21:37', 'u', '2017-01-02 01:54:08'),
(20, 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 02:44:15'),
(20, 'kwanat', '7c3f094526fdfbe5e98d909e6c887d27b70e7c97', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 02:45:18'),
(20, 'kwanat', 'bd05897b1dc50b4253b46bdf680db65d730d5ac9', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 02:50:39'),
(20, 'kwanat', 'bd05897b1dc50b4253b46bdf680db65d730d5ac9', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 02:51:17'),
(20, 'kwanat', '2c7d8fb27dc4040a3ca0f888575b8c4ff936d30e', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 02:51:51'),
(20, 'kwanat', '0841dec17a13ba4ffdb4fa3569880097a9cbf224', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 03:02:56'),
(20, 'kwanat', '9fd454247ef01503811ea862a89dd7e2b17c35ef', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 16:01:03'),
(20, 'kwanat', '650dd31849711f58b1b91e8ca9b8bb1db6cec08b', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-04 20:01:51'),
(20, 'kwanat', '650dd31849711f58b1b91e8ca9b8bb1db6cec08b', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-05 21:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `CYLINDER`
--

CREATE TABLE IF NOT EXISTS `CYLINDER` (
  `Id_cylindra` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_cylindrow` int(2) NOT NULL,
  PRIMARY KEY (`Id_cylindra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CYLINDER`
--

INSERT INTO `CYLINDER` (`Id_cylindra`, `liczba_cylindrow`) VALUES
(1, 1),
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `KOMENTARZ`
--

CREATE TABLE IF NOT EXISTS `KOMENTARZ` (
  `Id_komentarza` int(3) NOT NULL AUTO_INCREMENT,
  `Id_motocykla` int(4) NOT NULL,
  `Id_uzytkownika` int(3) NOT NULL,
  `Id_komenatrza_fk` int(3) DEFAULT NULL,
  `tresc` varchar(2000) NOT NULL,
  PRIMARY KEY (`Id_komentarza`),
  KEY `motocykl_fk` (`Id_motocykla`),
  KEY `uzytk_fk` (`Id_uzytkownika`),
  KEY `kom_fk` (`Id_komenatrza_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MARKA`
--

CREATE TABLE IF NOT EXISTS `MARKA` (
  `Id_marki` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_marki` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_marki`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MARKA`
--

INSERT INTO `MARKA` (`Id_marki`, `nazwa_marki`) VALUES
(1, 'Yamaha'),
(2, 'Honda'),
(3, 'Kawasaki'),
(4, 'Suzuki'),
(5, 'KTM'),
(6, 'Chopper');

-- --------------------------------------------------------

--
-- Table structure for table `MOTOCYKL`
--

CREATE TABLE IF NOT EXISTS `MOTOCYKL` (
  `Id_motocykla` int(4) NOT NULL AUTO_INCREMENT,
  `Id_marki` int(3) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `Id_roku` int(3) NOT NULL,
  `Id_napedu` int(2) DEFAULT NULL,
  `Id_typu` int(3) NOT NULL,
  `Id_pojemnosci` int(3) NOT NULL,
  `Id_suwu` int(3) NOT NULL,
  `Id_cylindra` int(3) NOT NULL,
  `opis` longtext NOT NULL,
  `zdjecie` varchar(2000) NOT NULL,
  `Id_uzytkownika` int(3) NOT NULL,
  PRIMARY KEY (`Id_motocykla`),
  KEY `marka_fk` (`Id_marki`),
  KEY `typ_fk` (`Id_typu`),
  KEY `poj_fk` (`Id_pojemnosci`),
  KEY `suw_fk` (`Id_suwu`),
  KEY `cylinder_fk` (`Id_cylindra`),
  KEY `uzytkownik_fk` (`Id_uzytkownika`),
  KEY `rok_prod_fk` (`Id_roku`),
  KEY `naped_fk` (`Id_napedu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MOTOCYKL`
--

INSERT INTO `MOTOCYKL` (`Id_motocykla`, `Id_marki`, `Model`, `Id_roku`, `Id_napedu`, `Id_typu`, `Id_pojemnosci`, `Id_suwu`, `Id_cylindra`, `opis`, `zdjecie`, `Id_uzytkownika`) VALUES
(2, 1, 'R1', 26, 2, 1, 7, 2, 3, 'zdfdfasfasdrgdrg rdgdrgdrgdrgrdg rgdgdrgdrgdrgrd grdgrdgrd grdg drgrdg drg rdgrdgrdgrd grdgdrgdrgrdg rdgdr grdgrd grdgrdgdr grd grdg drgrdgrdgdr grdg drgdrgrdg rdgdr gdrg drgdr gdrg rdgrd gdr gdr grdgrdgdr grdgrd gdrgdrgrdr grdgdr gdrg rgrdgrd rdg', 'zdjecia/2014-R1.jpg', 20),
(3, 1, 'R6', 28, 2, 1, 5, 2, 3, 'rgergrgrg rdgdrgdrg drg drgdrgdr gdr gdrgrdgrdg drg drgdrgdrgrdgrg serger wrhwrhthrthrtsh strhrth rsthtrshrtshtrhrtsh srthrth trhrts hsr hrsthsrt hrsth rth rshsrh rst hsrt hsrthrth', 'zdjecia/2017-R6.jpg', 20),
(4, 2, 'VT Shadow', 11, 2, 6, 2, 2, 2, 'Hania najpiękniejsza i najlepsza na świecie :)', 'zdjecia/3620-honda-shadow-125-2.jpg', 20),
(5, 1, 'DT 125 RE', 18, 2, 5, 2, 1, 1, 'Pierwszy crossowy motocykl Yamahy.', 'zdjecia/dt125r101.jpg', 20),
(7, 1, 'XJ 600N', 8, 2, 4, 5, 2, 3, 'Najlepsza motorynka dla początkujących na świecie!', 'zdjecia/yamaha-xj-600-n-08.jpg', 19),
(8, 4, 'Bandit 650 s', 18, 2, 4, 8, 2, 3, 'Bandziooor ! :-)', 'zdjecia/suzuki_bandit650s_2013.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `NAPED`
--

CREATE TABLE IF NOT EXISTS `NAPED` (
  `Id_napedu` int(2) NOT NULL AUTO_INCREMENT,
  `rodzaj_napedu` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_napedu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `NAPED`
--

INSERT INTO `NAPED` (`Id_napedu`, `rodzaj_napedu`) VALUES
(1, 'pasek'),
(2, 'łańcuch');

-- --------------------------------------------------------

--
-- Table structure for table `PARAMETR`
--

CREATE TABLE IF NOT EXISTS `PARAMETR` (
  `Id_parametru` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_parametru` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_parametru`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PARAMETR`
--

INSERT INTO `PARAMETR` (`Id_parametru`, `nazwa_parametru`) VALUES
(1, 'Światła'),
(2, 'Kontrola trakcji');

-- --------------------------------------------------------

--
-- Table structure for table `POJ_SILNIKA`
--

CREATE TABLE IF NOT EXISTS `POJ_SILNIKA` (
  `Id_pojemnosci` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_ccm` int(4) NOT NULL,
  PRIMARY KEY (`Id_pojemnosci`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `POJ_SILNIKA`
--

INSERT INTO `POJ_SILNIKA` (`Id_pojemnosci`, `liczba_ccm`) VALUES
(1, 50),
(2, 125),
(3, 250),
(4, 500),
(5, 600),
(6, 900),
(7, 1000),
(8, 650);

-- --------------------------------------------------------

--
-- Table structure for table `POZIOM_UPRAWNIEN`
--

CREATE TABLE IF NOT EXISTS `POZIOM_UPRAWNIEN` (
  `ID_poziomu_uprawnien` int(3) NOT NULL AUTO_INCREMENT,
  `Nazwa_uprawnienia` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_poziomu_uprawnien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `POZIOM_UPRAWNIEN`
--

INSERT INTO `POZIOM_UPRAWNIEN` (`ID_poziomu_uprawnien`, `Nazwa_uprawnienia`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Odwiedzający');

-- --------------------------------------------------------

--
-- Table structure for table `ROK_PROD`
--

CREATE TABLE IF NOT EXISTS `ROK_PROD` (
  `Id_roku` int(4) NOT NULL AUTO_INCREMENT,
  `rok` int(4) NOT NULL,
  PRIMARY KEY (`Id_roku`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ROK_PROD`
--

INSERT INTO `ROK_PROD` (`Id_roku`, `rok`) VALUES
(1, 1990),
(2, 1991),
(3, 1992),
(4, 1993),
(5, 1994),
(6, 1995),
(7, 1996),
(8, 1997),
(9, 1998),
(10, 1999),
(11, 2000),
(12, 2001),
(13, 2002),
(14, 2003),
(15, 2004),
(16, 2005),
(17, 2006),
(18, 2007),
(19, 2008),
(20, 2009),
(21, 2010),
(22, 2011),
(23, 2012),
(24, 2013),
(25, 2014),
(26, 2015),
(27, 2016),
(28, 2017),
(29, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `SESJA`
--

CREATE TABLE IF NOT EXISTS `SESJA` (
  `ID_sesja` int(10) NOT NULL AUTO_INCREMENT,
  `Id_uzytkownika` int(10) NOT NULL,
  `id` varchar(255) COLLATE utf8_bin NOT NULL,
  `ip` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'NULL',
  `web` varchar(255) COLLATE utf8_bin DEFAULT 'NULL',
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_sesja`),
  KEY `fkIDu` (`Id_uzytkownika`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `SESJA`
--

INSERT INTO `SESJA` (`ID_sesja`, `Id_uzytkownika`, `id`, `ip`, `web`, `time`, `token`) VALUES
(97, 27, 'd16eeb0f50a95b83c4420ae396da67b0fe507ff605a169416e9bacd8df06f5bf', '89.64.3.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '2017-01-07 00:03:43', '8f1eg4wxk3'),
(109, 29, '731f324e65ffdcb480f0c3feb47a5844f4ff931cc1421347243af36cd6dc1467', '89.22.209.156', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '2017-01-07 11:35:47', '!y7imob2wm'),
(118, 25, 'a9a86eabec99cb4413d6940a7f8d11ba440b9924da6d993ad9638eaed830dcc0', '89.64.1.173', 'Mozilla/5.0 (Linux; Android 6.0; ALE-L21 Build/HuaweiALE-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36', NULL, 'ovmz36id6e'),
(137, 19, 'a97083cf52d6ef514d6b1677ef590e6366adeb6e7b4db2c310dc79fa65d8358b', '89.64.7.207', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '2017-01-09 17:11:23', '6gls3nkbti'),
(142, 20, 'eb51954442f455d84871d0ecc70bceeaa3eed1a200edeb38e2ed0fa49ba612b7', '89.64.1.112', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0', '2017-01-12 21:52:09', 'ygupotx17r');

-- --------------------------------------------------------

--
-- Table structure for table `SUW`
--

CREATE TABLE IF NOT EXISTS `SUW` (
  `Id_suwu` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_suwów` int(1) NOT NULL,
  PRIMARY KEY (`Id_suwu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SUW`
--

INSERT INTO `SUW` (`Id_suwu`, `liczba_suwów`) VALUES
(1, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `TYP_MOTOCYKLA`
--

CREATE TABLE IF NOT EXISTS `TYP_MOTOCYKLA` (
  `Id_typu` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_typu` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_typu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TYP_MOTOCYKLA`
--

INSERT INTO `TYP_MOTOCYKLA` (`Id_typu`, `nazwa_typu`) VALUES
(1, 'Sportowy'),
(2, 'Turystyczny'),
(3, 'Cruiser'),
(4, 'Szosowo-turystyczny'),
(5, 'Cross'),
(6, 'Chopper');

-- --------------------------------------------------------

--
-- Table structure for table `UP`
--

CREATE TABLE IF NOT EXISTS `UP` (
  `Id_uzytkownika` int(3) NOT NULL,
  `ID_poziomu_uprawnien` int(3) NOT NULL,
  KEY `uzytkownik_fk_up` (`Id_uzytkownika`),
  KEY `uprawnienie_fk_up` (`ID_poziomu_uprawnien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UP`
--

INSERT INTO `UP` (`Id_uzytkownika`, `ID_poziomu_uprawnien`) VALUES
(19, 2),
(20, 1),
(18, 3),
(19, 3),
(20, 3),
(20, 2),
(25, 3),
(18, 1),
(27, 3),
(27, 1),
(27, 2),
(29, 3),
(29, 2),
(30, 3),
(30, 1),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `UZYTKOWNIK`
--

CREATE TABLE IF NOT EXISTS `UZYTKOWNIK` (
  `Id_uzytkownika` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) COLLATE utf8_bin NOT NULL,
  `haslo` varchar(50) COLLATE utf8_bin NOT NULL,
  `sol` varchar(255) COLLATE utf8_bin NOT NULL,
  `e_mail` varchar(30) COLLATE utf8_bin NOT NULL,
  `imie` varchar(20) COLLATE utf8_bin NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8_bin NOT NULL,
  `motocykl` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `data_rejestracji` datetime NOT NULL,
  PRIMARY KEY (`Id_uzytkownika`),
  UNIQUE KEY `loginunique` (`login`) USING BTREE,
  UNIQUE KEY `e_mailunique` (`e_mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `UZYTKOWNIK`
--

INSERT INTO `UZYTKOWNIK` (`Id_uzytkownika`, `login`, `haslo`, `sol`, `e_mail`, `imie`, `nazwisko`, `motocykl`, `data_rejestracji`) VALUES
(18, 'admin', '866f01287a836284c62cf0ca62a8d78772774bfd', 'ixtb37!nlo', 'admin@admin.pl', 'Admin', 'Adm', '', '2016-12-27 23:48:01'),
(19, 'moderator', '2c537510dbe6f9104d3eb9c0bc9a09dcbe93e0e4', 'jp77n7hrp8', 'moderator@moderator.com', 'Moderator', 'Mod', 'brak', '2016-12-30 19:59:02'),
(20, 'kwanat', '650dd31849711f58b1b91e8ca9b8bb1db6cec08b', 'w5inv5?0id', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37'),
(25, 'odwiedzajacy', 'b7a579571a1b3d556e688a88077ae20e784a82d9', 'r76zifoxvk', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:34:14'),
(27, 'kamil', '1c1cd68cfe28be25b0ee284895bc1603e6d23044', '21g0iv1j8n', 'kamil@p.pl', 'kamil', 'kapka', 'jamacha', '2017-01-06 18:56:24'),
(29, 'mmaarpol', '44b3e4d49c2d07ef565dd3f47506a166f9e99f5c', 'kcs2z6uovk', 'mmaarpol@gmail.com', 'sfsfef', 'sefsf', 'yamaha xj600n', '2017-01-07 06:33:02'),
(30, 'ta_wredna', 'a7df9f8582ae878270cd512093e05b30f48b49b8', '?d16nh8o2p', 'vegoria@gmail.com', 'Zgadnij', 'Sam', '', '2017-01-09 08:09:34');

--
-- Triggers `UZYTKOWNIK`
--
DELIMITER $$
CREATE TRIGGER `archiwum_uzytkownicy_delete` AFTER DELETE ON `UZYTKOWNIK` FOR EACH ROW INSERT INTO ARCHI_UZYTK (Id_uzytkownika,login,haslo,imie,nazwisko,e_mail,motocykl,data_rejestracji,data_zmiany,operacja)
VALUES(old.Id_uzytkownika,old.login,old.haslo,old.imie,old.nazwisko,old.e_mail,old.motocykl,old.data_rejestracji,SYSDATE(),'d')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `archiwum_uzytkownicy_update` AFTER UPDATE ON `UZYTKOWNIK` FOR EACH ROW INSERT INTO ARCHI_UZYTK (Id_uzytkownika,login,haslo,imie,nazwisko,e_mail,motocykl,data_rejestracji,data_zmiany,operacja)
VALUES(old.Id_uzytkownika,old.login,old.haslo,old.imie,old.nazwisko,old.e_mail,old.motocykl,old.data_rejestracji,SYSDATE(),'u')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `WART_PARAMETRU`
--

CREATE TABLE IF NOT EXISTS `WART_PARAMETRU` (
  `Id_motocykla` int(3) NOT NULL,
  `Id_parametru` int(3) NOT NULL,
  `wartosc_parametru` varchar(30) NOT NULL,
  KEY `motocykl` (`Id_motocykla`),
  KEY `parametr` (`Id_parametru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `WART_PARAMETRU`
--

INSERT INTO `WART_PARAMETRU` (`Id_motocykla`, `Id_parametru`, `wartosc_parametru`) VALUES
(2, 1, 'ksenonowe'),
(2, 2, '6-stopniowa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dane_motocykl`
--
CREATE TABLE IF NOT EXISTS `dane_motocykl` (
`Id_motocykla` int(4)
,`Marka` varchar(30)
,`Model` varchar(30)
,`Rok_produkcji` int(4)
,`Rodzaj_napedu` varchar(40)
,`Typ_motocykla` varchar(30)
,`Pojemność_silnika` int(4)
,`Liczba_suwów` int(1)
,`Liczba_cylindrow` int(2)
,`Opis` longtext
,`Zdjecie` varchar(2000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `wyswietl_adminow`
--
CREATE TABLE IF NOT EXISTS `wyswietl_adminow` (
`Id_uzytkownika` int(3)
,`Id_poziomu_uprawnien` int(3)
);

-- --------------------------------------------------------

--
-- Structure for view `dane_motocykl`
--
DROP TABLE IF EXISTS `dane_motocykl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dane_motocykl`  AS  select `MOTOCYKL`.`Id_motocykla` AS `Id_motocykla`,`MARKA`.`nazwa_marki` AS `Marka`,`MOTOCYKL`.`Model` AS `Model`,`ROK_PROD`.`rok` AS `Rok_produkcji`,`NAPED`.`rodzaj_napedu` AS `Rodzaj_napedu`,`TYP_MOTOCYKLA`.`nazwa_typu` AS `Typ_motocykla`,`POJ_SILNIKA`.`liczba_ccm` AS `Pojemność_silnika`,`SUW`.`liczba_suwów` AS `Liczba_suwów`,`CYLINDER`.`liczba_cylindrow` AS `Liczba_cylindrow`,`MOTOCYKL`.`opis` AS `Opis`,`MOTOCYKL`.`zdjecie` AS `Zdjecie` from (((((((`MOTOCYKL` join `CYLINDER` on((`MOTOCYKL`.`Id_cylindra` = `CYLINDER`.`Id_cylindra`))) join `MARKA` on((`MOTOCYKL`.`Id_marki` = `MARKA`.`Id_marki`))) join `ROK_PROD` on((`MOTOCYKL`.`Id_roku` = `ROK_PROD`.`Id_roku`))) join `NAPED` on((`MOTOCYKL`.`Id_napedu` = `NAPED`.`Id_napedu`))) join `TYP_MOTOCYKLA` on((`MOTOCYKL`.`Id_typu` = `TYP_MOTOCYKLA`.`Id_typu`))) join `POJ_SILNIKA` on((`MOTOCYKL`.`Id_pojemnosci` = `POJ_SILNIKA`.`Id_pojemnosci`))) join `SUW` on((`MOTOCYKL`.`Id_suwu` = `SUW`.`Id_suwu`))) ;

-- --------------------------------------------------------

--
-- Structure for view `wyswietl_adminow`
--
DROP TABLE IF EXISTS `wyswietl_adminow`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wyswietl_adminow`  AS  select `UP`.`Id_uzytkownika` AS `Id_uzytkownika`,`UP`.`ID_poziomu_uprawnien` AS `Id_poziomu_uprawnien` from `UP` where (`UP`.`ID_poziomu_uprawnien` = 1) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `KOMENTARZ`
--
ALTER TABLE `KOMENTARZ`
  ADD CONSTRAINT `kom_fk` FOREIGN KEY (`Id_komenatrza_fk`) REFERENCES `KOMENTARZ` (`Id_komentarza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motocykl_fk` FOREIGN KEY (`Id_motocykla`) REFERENCES `MOTOCYKL` (`Id_motocykla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uzytk_fk` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `MOTOCYKL`
--
ALTER TABLE `MOTOCYKL`
  ADD CONSTRAINT `cylinder_fk` FOREIGN KEY (`Id_cylindra`) REFERENCES `CYLINDER` (`Id_cylindra`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `marka_fk` FOREIGN KEY (`Id_marki`) REFERENCES `MARKA` (`Id_marki`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `naped_fk` FOREIGN KEY (`Id_napedu`) REFERENCES `NAPED` (`Id_napedu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `poj_fk` FOREIGN KEY (`Id_pojemnosci`) REFERENCES `POJ_SILNIKA` (`Id_pojemnosci`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rok_prod_fk` FOREIGN KEY (`Id_roku`) REFERENCES `ROK_PROD` (`Id_roku`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suw_fk` FOREIGN KEY (`Id_suwu`) REFERENCES `SUW` (`Id_suwu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `typ_fk` FOREIGN KEY (`Id_typu`) REFERENCES `TYP_MOTOCYKLA` (`Id_typu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `uzytkownik_fk` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `SESJA`
--
ALTER TABLE `SESJA`
  ADD CONSTRAINT `fkIDu` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UP`
--
ALTER TABLE `UP`
  ADD CONSTRAINT `uprawnienie_fk_up` FOREIGN KEY (`ID_poziomu_uprawnien`) REFERENCES `POZIOM_UPRAWNIEN` (`ID_poziomu_uprawnien`) ON UPDATE CASCADE,
  ADD CONSTRAINT `uzytkownik_fk_up` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `WART_PARAMETRU`
--
ALTER TABLE `WART_PARAMETRU`
  ADD CONSTRAINT `motocykl` FOREIGN KEY (`Id_motocykla`) REFERENCES `MOTOCYKL` (`Id_motocykla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parametr` FOREIGN KEY (`Id_parametru`) REFERENCES `PARAMETR` (`Id_parametru`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`kwanat`@`%` EVENT `USUWANIE_STARYCH_DANYCH` ON SCHEDULE EVERY 1 DAY STARTS '2016-10-24 10:40:13' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM ARCHI_UZYTK WHERE DATEDIFF(SYSDATE(),data_zmiany)>31$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
