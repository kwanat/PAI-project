/*
Navicat MySQL Data Transfer

Source Server         : project_db
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : baza_motocykle

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-01-02 11:20:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ARCHI_UZYTK`
-- ----------------------------
DROP TABLE IF EXISTS `ARCHI_UZYTK`;
CREATE TABLE `ARCHI_UZYTK` (
  `Id_uzytkownika` int(3) NOT NULL,
  `login` varchar(15) CHARACTER SET utf8 NOT NULL,
  `haslo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `e_mail` varchar(30) CHARACTER SET utf8 NOT NULL,
  `imie` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `nazwisko` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `motocykl` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `data_rejestracji` datetime NOT NULL,
  `operacja` varchar(1) CHARACTER SET utf8 NOT NULL,
  `data_zmiany` timestamp NOT NULL DEFAULT '2011-10-10 00:00:00',
  KEY `poziom_uprawnien` (`operacja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
/*!50100 PARTITION BY RANGE (unix_timestamp(data_zmiany))
(PARTITION p0 VALUES LESS THAN (1483225200) ENGINE = InnoDB,
 PARTITION p1 VALUES LESS THAN (1514761200) ENGINE = InnoDB,
 PARTITION p2 VALUES LESS THAN MAXVALUE ENGINE = InnoDB) */;

-- ----------------------------
-- Records of ARCHI_UZYTK
-- ----------------------------
INSERT INTO `ARCHI_UZYTK` VALUES ('1', 'admin', 'dvdd', 'admin@wp.pl', '', '', '', '2016-10-24 10:05:10', 'u', '2016-11-12 00:00:00');
INSERT INTO `ARCHI_UZYTK` VALUES ('2', 'aergreg', 'dfagadfg', 'g', 'g', 'reg', 'erg', '2016-10-18 10:06:16', 'd', '2016-11-12 00:00:00');
INSERT INTO `ARCHI_UZYTK` VALUES ('4', 'kwanat', '398d6f53f5b562a7a9769d96ac5dba90f1908a35', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-11-12 17:44:06', 'd', '2016-11-12 00:00:00');
INSERT INTO `ARCHI_UZYTK` VALUES ('1', 'kwanat', 'dvd', 'vf', 'vfd', 'vf', 'fdv', '2016-10-24 10:05:10', 'u', '2016-11-12 00:00:00');
INSERT INTO `ARCHI_UZYTK` VALUES ('1', 'kwanat', 'dvdd', 'vf', 'vfd', 'vf', 'fdv', '2016-10-24 10:05:10', 'u', '2016-11-12 00:00:00');
INSERT INTO `ARCHI_UZYTK` VALUES ('3', 'kwanat123', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa@wp.pl', '', '', '', '2016-11-12 17:14:18', 'd', '2016-11-12 00:00:00');
INSERT INTO `ARCHI_UZYTK` VALUES ('6', 'kwanat', '398d6f53f5b562a7a9769d96ac5dba90f1908a35', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-11-12 17:49:40', 'd', '2016-12-08 23:26:53');
INSERT INTO `ARCHI_UZYTK` VALUES ('7', 'miwierz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'asdf@wp.pl', 'MIchał', 'Wierzbiński', '', '2016-11-14 09:59:05', 'd', '2016-12-08 23:26:58');
INSERT INTO `ARCHI_UZYTK` VALUES ('14', 'abcd', '81fe8bfe87576c3ecb22426f8e57847382917acf', 'abcd@wo', '', '', '', '2016-11-28 10:22:05', 'd', '2016-12-08 23:27:09');
INSERT INTO `ARCHI_UZYTK` VALUES ('13', 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'ka@wp', '', '', '', '2016-11-28 10:02:16', 'd', '2016-12-08 23:27:09');
INSERT INTO `ARCHI_UZYTK` VALUES ('11', ':\":dfg', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aws@wp.pl', '', '', '', '2016-11-14 10:42:10', 'd', '2016-12-08 23:27:09');
INSERT INTO `ARCHI_UZYTK` VALUES ('10', '&#039;;lgfhfx', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa@wp.pl', '', '', '', '2016-11-14 10:39:27', 'd', '2016-12-08 23:27:09');
INSERT INTO `ARCHI_UZYTK` VALUES ('9', 'student1', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '123@wp.pl', '', '', '', '2016-11-14 10:36:02', 'd', '2016-12-08 23:27:09');
INSERT INTO `ARCHI_UZYTK` VALUES ('8', 'student', 'bf9661defa3daecacfde5bde0214c4a439351d4d', 'student@student.pl', 'student1', '', '', '2016-11-14 10:26:50', 'd', '2016-12-08 23:27:09');
INSERT INTO `ARCHI_UZYTK` VALUES ('15', 'michalW', '507e061196a30d2c153bf13bdad1fc0ad7f1aab1', 'MICHAL@GMAIL.COM', 'MICHAL', 'WIERZBINSKI', 'HAYABUSA', '2016-11-28 10:38:59', 'd', '2016-12-08 23:27:24');
INSERT INTO `ARCHI_UZYTK` VALUES ('16', 'adminek', '8550ed8b9c70afed607e65460f2878851b957f36', 'adminek@wp.pl', '', '', '', '2016-12-05 10:50:25', 'd', '2016-12-08 23:31:08');
INSERT INTO `ARCHI_UZYTK` VALUES ('1', 'admin', '398d6f53f5b562a7a9769d96ac5dba90f1908a35', 'admin@wp.pl', '', '', '', '2016-10-24 10:05:10', 'd', '2016-12-27 23:47:27');
INSERT INTO `ARCHI_UZYTK` VALUES ('18', 'admin', '866f01287a836284c62cf0ca62a8d78772774bfd', 'admin@admin.pl', '', '', '', '2016-12-27 23:48:01', 'u', '2016-12-30 22:04:52');
INSERT INTO `ARCHI_UZYTK` VALUES ('17', 'kwanat', '55cedde951a44d02da2481275f885e9f42d8683e', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-08 23:32:14', 'd', '2016-12-31 13:15:04');
INSERT INTO `ARCHI_UZYTK` VALUES ('21', '', 'c0c5b564776b3c7f59de44c8edcdb2df35faa7ae', '', '', '', '', '2016-12-31 14:15:35', 'd', '2016-12-31 14:18:54');
INSERT INTO `ARCHI_UZYTK` VALUES ('22', 'odwiedzajacy', 'd54ac9d832c59cb8c0cbe2cd1f1fbd23061d0ff3', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:19:35', 'd', '2016-12-31 14:23:22');
INSERT INTO `ARCHI_UZYTK` VALUES ('23', 'odwiedzajacy', '2c414ad27adaea5e8fb46185ec1ea2bc2da67f93', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:23:36', 'd', '2016-12-31 14:30:11');
INSERT INTO `ARCHI_UZYTK` VALUES ('24', 'odwiedzajacy', 'e9d7af402cc67b07b6d1eccf93119b3631a772b8', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:30:29', 'd', '2016-12-31 14:33:58');
INSERT INTO `ARCHI_UZYTK` VALUES ('25', 'odwiedzajacy', 'b7a579571a1b3d556e688a88077ae20e784a82d9', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:34:14', 'u', '2016-12-31 14:41:13');
INSERT INTO `ARCHI_UZYTK` VALUES ('25', 'odwiedzajacy', 'b7a579571a1b3d556e688a88077ae20e784a82d9', 'odwiedzajacy@odw.pl', 'Odwiedzaęźćżjący', 'Odw', '', '2016-12-31 14:34:14', 'u', '2016-12-31 14:41:36');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 20:50:11');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 20:53:57');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow VT125', '2016-12-31 13:21:37', 'u', '2017-01-01 20:54:08');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '2b212994cb67a4bb794bf11f672aadefebda59a2', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 21:44:15');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '7c3f094526fdfbe5e98d909e6c887d27b70e7c97', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 21:45:18');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', 'bd05897b1dc50b4253b46bdf680db65d730d5ac9', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 21:50:39');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', 'bd05897b1dc50b4253b46bdf680db65d730d5ac9', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 21:51:17');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '2c7d8fb27dc4040a3ca0f888575b8c4ff936d30e', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 21:51:51');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '0841dec17a13ba4ffdb4fa3569880097a9cbf224', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-01 22:02:56');
INSERT INTO `ARCHI_UZYTK` VALUES ('20', 'kwanat', '9fd454247ef01503811ea862a89dd7e2b17c35ef', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37', 'u', '2017-01-02 11:01:03');

-- ----------------------------
-- Table structure for `CYLINDER`
-- ----------------------------
DROP TABLE IF EXISTS `CYLINDER`;
CREATE TABLE `CYLINDER` (
  `Id_cylindra` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_cylindrow` int(2) NOT NULL,
  PRIMARY KEY (`Id_cylindra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of CYLINDER
-- ----------------------------
INSERT INTO `CYLINDER` VALUES ('1', '1');
INSERT INTO `CYLINDER` VALUES ('2', '2');
INSERT INTO `CYLINDER` VALUES ('3', '4');

-- ----------------------------
-- Table structure for `KOMENTARZ`
-- ----------------------------
DROP TABLE IF EXISTS `KOMENTARZ`;
CREATE TABLE `KOMENTARZ` (
  `Id_komentarza` int(3) NOT NULL AUTO_INCREMENT,
  `Id_motocykla` int(4) NOT NULL,
  `Id_uzytkownika` int(3) NOT NULL,
  `Id_komenatrza_fk` int(3) DEFAULT NULL,
  `tresc` varchar(2000) NOT NULL,
  PRIMARY KEY (`Id_komentarza`),
  KEY `motocykl_fk` (`Id_motocykla`),
  KEY `uzytk_fk` (`Id_uzytkownika`),
  KEY `kom_fk` (`Id_komenatrza_fk`),
  CONSTRAINT `kom_fk` FOREIGN KEY (`Id_komenatrza_fk`) REFERENCES `KOMENTARZ` (`Id_komentarza`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `motocykl_fk` FOREIGN KEY (`Id_motocykla`) REFERENCES `MOTOCYKL` (`Id_motocykla`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `uzytk_fk` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of KOMENTARZ
-- ----------------------------

-- ----------------------------
-- Table structure for `MARKA`
-- ----------------------------
DROP TABLE IF EXISTS `MARKA`;
CREATE TABLE `MARKA` (
  `Id_marki` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_marki` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_marki`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MARKA
-- ----------------------------
INSERT INTO `MARKA` VALUES ('1', 'Yamaha');
INSERT INTO `MARKA` VALUES ('2', 'Honda');
INSERT INTO `MARKA` VALUES ('3', 'Kawasaki');
INSERT INTO `MARKA` VALUES ('4', 'Suzuki');
INSERT INTO `MARKA` VALUES ('5', 'KTM');

-- ----------------------------
-- Table structure for `MOTOCYKL`
-- ----------------------------
DROP TABLE IF EXISTS `MOTOCYKL`;
CREATE TABLE `MOTOCYKL` (
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
  KEY `naped_fk` (`Id_napedu`),
  CONSTRAINT `cylinder_fk` FOREIGN KEY (`Id_cylindra`) REFERENCES `CYLINDER` (`Id_cylindra`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `marka_fk` FOREIGN KEY (`Id_marki`) REFERENCES `MARKA` (`Id_marki`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `naped_fk` FOREIGN KEY (`Id_napedu`) REFERENCES `NAPED` (`Id_napedu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `poj_fk` FOREIGN KEY (`Id_pojemnosci`) REFERENCES `POJ_SILNIKA` (`Id_pojemnosci`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `rok_prod_fk` FOREIGN KEY (`Id_roku`) REFERENCES `ROK_PROD` (`Id_roku`) ON UPDATE CASCADE,
  CONSTRAINT `suw_fk` FOREIGN KEY (`Id_suwu`) REFERENCES `SUW` (`Id_suwu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `typ_fk` FOREIGN KEY (`Id_typu`) REFERENCES `TYP_MOTOCYKLA` (`Id_typu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `uzytkownik_fk` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MOTOCYKL
-- ----------------------------
INSERT INTO `MOTOCYKL` VALUES ('2', '1', 'R1', '26', '2', '1', '5', '2', '3', 'zdfdfasfas', 'zdjecia/2014-R1.jpg', '19');

-- ----------------------------
-- Table structure for `NAPED`
-- ----------------------------
DROP TABLE IF EXISTS `NAPED`;
CREATE TABLE `NAPED` (
  `Id_napedu` int(2) NOT NULL AUTO_INCREMENT,
  `rodzaj_napedu` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_napedu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of NAPED
-- ----------------------------
INSERT INTO `NAPED` VALUES ('1', 'pasek');
INSERT INTO `NAPED` VALUES ('2', 'łańcuch');

-- ----------------------------
-- Table structure for `PARAMETR`
-- ----------------------------
DROP TABLE IF EXISTS `PARAMETR`;
CREATE TABLE `PARAMETR` (
  `Id_parametru` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_parametru` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_parametru`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of PARAMETR
-- ----------------------------
INSERT INTO `PARAMETR` VALUES ('1', 'Światła');
INSERT INTO `PARAMETR` VALUES ('2', 'Kontrola trakcji');

-- ----------------------------
-- Table structure for `POJ_SILNIKA`
-- ----------------------------
DROP TABLE IF EXISTS `POJ_SILNIKA`;
CREATE TABLE `POJ_SILNIKA` (
  `Id_pojemnosci` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_ccm` int(4) NOT NULL,
  PRIMARY KEY (`Id_pojemnosci`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of POJ_SILNIKA
-- ----------------------------
INSERT INTO `POJ_SILNIKA` VALUES ('1', '50');
INSERT INTO `POJ_SILNIKA` VALUES ('2', '125');
INSERT INTO `POJ_SILNIKA` VALUES ('3', '250');
INSERT INTO `POJ_SILNIKA` VALUES ('4', '500');
INSERT INTO `POJ_SILNIKA` VALUES ('5', '600');
INSERT INTO `POJ_SILNIKA` VALUES ('6', '900');
INSERT INTO `POJ_SILNIKA` VALUES ('7', '1000');

-- ----------------------------
-- Table structure for `POZIOM_UPRAWNIEN`
-- ----------------------------
DROP TABLE IF EXISTS `POZIOM_UPRAWNIEN`;
CREATE TABLE `POZIOM_UPRAWNIEN` (
  `ID_poziomu_uprawnien` int(3) NOT NULL AUTO_INCREMENT,
  `Nazwa_uprawnienia` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_poziomu_uprawnien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of POZIOM_UPRAWNIEN
-- ----------------------------
INSERT INTO `POZIOM_UPRAWNIEN` VALUES ('1', 'Administrator');
INSERT INTO `POZIOM_UPRAWNIEN` VALUES ('2', 'Moderator');
INSERT INTO `POZIOM_UPRAWNIEN` VALUES ('3', 'Odwiedzający');

-- ----------------------------
-- Table structure for `ROK_PROD`
-- ----------------------------
DROP TABLE IF EXISTS `ROK_PROD`;
CREATE TABLE `ROK_PROD` (
  `Id_roku` int(4) NOT NULL AUTO_INCREMENT,
  `rok` int(4) NOT NULL,
  PRIMARY KEY (`Id_roku`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ROK_PROD
-- ----------------------------
INSERT INTO `ROK_PROD` VALUES ('1', '1990');
INSERT INTO `ROK_PROD` VALUES ('2', '1991');
INSERT INTO `ROK_PROD` VALUES ('3', '1992');
INSERT INTO `ROK_PROD` VALUES ('4', '1993');
INSERT INTO `ROK_PROD` VALUES ('5', '1994');
INSERT INTO `ROK_PROD` VALUES ('6', '1995');
INSERT INTO `ROK_PROD` VALUES ('7', '1996');
INSERT INTO `ROK_PROD` VALUES ('8', '1997');
INSERT INTO `ROK_PROD` VALUES ('9', '1998');
INSERT INTO `ROK_PROD` VALUES ('10', '1999');
INSERT INTO `ROK_PROD` VALUES ('11', '2000');
INSERT INTO `ROK_PROD` VALUES ('12', '2001');
INSERT INTO `ROK_PROD` VALUES ('13', '2002');
INSERT INTO `ROK_PROD` VALUES ('14', '2003');
INSERT INTO `ROK_PROD` VALUES ('15', '2004');
INSERT INTO `ROK_PROD` VALUES ('16', '2005');
INSERT INTO `ROK_PROD` VALUES ('17', '2006');
INSERT INTO `ROK_PROD` VALUES ('18', '2007');
INSERT INTO `ROK_PROD` VALUES ('19', '2008');
INSERT INTO `ROK_PROD` VALUES ('20', '2009');
INSERT INTO `ROK_PROD` VALUES ('21', '2010');
INSERT INTO `ROK_PROD` VALUES ('22', '2011');
INSERT INTO `ROK_PROD` VALUES ('23', '2012');
INSERT INTO `ROK_PROD` VALUES ('24', '2013');
INSERT INTO `ROK_PROD` VALUES ('25', '2014');
INSERT INTO `ROK_PROD` VALUES ('26', '2015');
INSERT INTO `ROK_PROD` VALUES ('27', '2016');

-- ----------------------------
-- Table structure for `SESJA`
-- ----------------------------
DROP TABLE IF EXISTS `SESJA`;
CREATE TABLE `SESJA` (
  `ID_sesja` int(10) NOT NULL AUTO_INCREMENT,
  `Id_uzytkownika` int(10) NOT NULL,
  `id` varchar(255) COLLATE utf8_bin NOT NULL,
  `ip` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'NULL',
  `web` varchar(255) COLLATE utf8_bin DEFAULT 'NULL',
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_sesja`),
  KEY `fkIDu` (`Id_uzytkownika`),
  CONSTRAINT `fkIDu` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of SESJA
-- ----------------------------
INSERT INTO `SESJA` VALUES ('35', '25', 'b5227bbb944cecaf8b9d8a3c5e03129645ce1977ccb5c7fd7385c7931f8d926f', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-12-31 15:24:42', '0wzn!we060');
INSERT INTO `SESJA` VALUES ('39', '19', '7af518726ffbf36a772898d2739472bd87802e4ec12afd3642489c6042ec6854', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0', '2016-12-31 17:32:02', 'm2c4?ahg6a');
INSERT INTO `SESJA` VALUES ('46', '18', 'ae7ca5ac8c953ff82e13c439e8717915fae1889c07c0064a7e01504b851502b1', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36', '2017-01-01 20:10:31', 'kyeob6kixi');
INSERT INTO `SESJA` VALUES ('49', '20', '024a856c5bf68bc42dd6f500fec11fbe47273462012a437a984ea90a73e2ff85', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0', '2017-01-02 11:19:10', '1dk6b?hewd');

-- ----------------------------
-- Table structure for `SUW`
-- ----------------------------
DROP TABLE IF EXISTS `SUW`;
CREATE TABLE `SUW` (
  `Id_suwu` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_suwów` int(1) NOT NULL,
  PRIMARY KEY (`Id_suwu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of SUW
-- ----------------------------
INSERT INTO `SUW` VALUES ('1', '2');
INSERT INTO `SUW` VALUES ('2', '4');

-- ----------------------------
-- Table structure for `TYP_MOTOCYKLA`
-- ----------------------------
DROP TABLE IF EXISTS `TYP_MOTOCYKLA`;
CREATE TABLE `TYP_MOTOCYKLA` (
  `Id_typu` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_typu` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_typu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of TYP_MOTOCYKLA
-- ----------------------------
INSERT INTO `TYP_MOTOCYKLA` VALUES ('1', 'Sportowy');
INSERT INTO `TYP_MOTOCYKLA` VALUES ('2', 'Turystyczny');
INSERT INTO `TYP_MOTOCYKLA` VALUES ('3', 'Cruiser');
INSERT INTO `TYP_MOTOCYKLA` VALUES ('4', 'Szosowo-turystyczny');

-- ----------------------------
-- Table structure for `UP`
-- ----------------------------
DROP TABLE IF EXISTS `UP`;
CREATE TABLE `UP` (
  `Id_uzytkownika` int(3) NOT NULL,
  `ID_poziomu_uprawnien` int(3) NOT NULL,
  KEY `uzytkownik_fk_up` (`Id_uzytkownika`),
  KEY `uprawnienie_fk_up` (`ID_poziomu_uprawnien`),
  CONSTRAINT `uprawnienie_fk_up` FOREIGN KEY (`ID_poziomu_uprawnien`) REFERENCES `POZIOM_UPRAWNIEN` (`ID_poziomu_uprawnien`) ON UPDATE CASCADE,
  CONSTRAINT `uzytkownik_fk_up` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of UP
-- ----------------------------
INSERT INTO `UP` VALUES ('18', '1');
INSERT INTO `UP` VALUES ('19', '2');
INSERT INTO `UP` VALUES ('20', '1');
INSERT INTO `UP` VALUES ('18', '3');
INSERT INTO `UP` VALUES ('19', '3');
INSERT INTO `UP` VALUES ('20', '3');
INSERT INTO `UP` VALUES ('20', '2');
INSERT INTO `UP` VALUES ('25', '3');

-- ----------------------------
-- Table structure for `UZYTKOWNIK`
-- ----------------------------
DROP TABLE IF EXISTS `UZYTKOWNIK`;
CREATE TABLE `UZYTKOWNIK` (
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of UZYTKOWNIK
-- ----------------------------
INSERT INTO `UZYTKOWNIK` VALUES ('18', 'admin', '866f01287a836284c62cf0ca62a8d78772774bfd', 'ixtb37!nlo', 'admin@admin.pl', 'Admin', 'Adm', '', '2016-12-27 23:48:01');
INSERT INTO `UZYTKOWNIK` VALUES ('19', 'moderator', '2c537510dbe6f9104d3eb9c0bc9a09dcbe93e0e4', 'jp77n7hrp8', 'moderator@moderator.com', 'Moderator', 'Mod', 'brak', '2016-12-30 19:59:02');
INSERT INTO `UZYTKOWNIK` VALUES ('20', 'kwanat', '650dd31849711f58b1b91e8ca9b8bb1db6cec08b', 'w5inv5?0id', 'wanat.kamil@wp.pl', 'Kamil', 'Wanat', 'Honda Shadow 125', '2016-12-31 13:21:37');
INSERT INTO `UZYTKOWNIK` VALUES ('25', 'odwiedzajacy', 'b7a579571a1b3d556e688a88077ae20e784a82d9', 'r76zifoxvk', 'odwiedzajacy@odw.pl', 'Odwiedzający', 'Odw', '', '2016-12-31 14:34:14');

-- ----------------------------
-- Table structure for `WART_PARAMETRU`
-- ----------------------------
DROP TABLE IF EXISTS `WART_PARAMETRU`;
CREATE TABLE `WART_PARAMETRU` (
  `Id_motocykla` int(3) NOT NULL,
  `Id_parametru` int(3) NOT NULL,
  `wartosc_parametru` varchar(30) NOT NULL,
  KEY `motocykl` (`Id_motocykla`),
  KEY `parametr` (`Id_parametru`),
  CONSTRAINT `motocykl` FOREIGN KEY (`Id_motocykla`) REFERENCES `MOTOCYKL` (`Id_motocykla`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `parametr` FOREIGN KEY (`Id_parametru`) REFERENCES `PARAMETR` (`Id_parametru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of WART_PARAMETRU
-- ----------------------------
INSERT INTO `WART_PARAMETRU` VALUES ('2', '1', 'ksenonowe');
INSERT INTO `WART_PARAMETRU` VALUES ('2', '2', '6-stopniowa');

-- ----------------------------
-- View structure for `dane_motocykl`
-- ----------------------------
DROP VIEW IF EXISTS `dane_motocykl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dane_motocykl` AS select `MOTOCYKL`.`Id_motocykla` AS `Id_motocykla`,`MARKA`.`nazwa_marki` AS `Marka`,`MOTOCYKL`.`Model` AS `Model`,`ROK_PROD`.`rok` AS `Rok_produkcji`,`NAPED`.`rodzaj_napedu` AS `Rodzaj_napedu`,`TYP_MOTOCYKLA`.`nazwa_typu` AS `Typ_motocykla`,`POJ_SILNIKA`.`liczba_ccm` AS `Pojemność_silnika`,`SUW`.`liczba_suwów` AS `Liczba_suwów`,`CYLINDER`.`liczba_cylindrow` AS `Liczba_cylindrow`,`MOTOCYKL`.`opis` AS `Opis`,`MOTOCYKL`.`zdjecie` AS `Zdjecie` from (((((((`MOTOCYKL` join `CYLINDER` on((`MOTOCYKL`.`Id_cylindra` = `CYLINDER`.`Id_cylindra`))) join `MARKA` on((`MOTOCYKL`.`Id_marki` = `MARKA`.`Id_marki`))) join `ROK_PROD` on((`MOTOCYKL`.`Id_roku` = `ROK_PROD`.`Id_roku`))) join `NAPED` on((`MOTOCYKL`.`Id_napedu` = `NAPED`.`Id_napedu`))) join `TYP_MOTOCYKLA` on((`MOTOCYKL`.`Id_typu` = `TYP_MOTOCYKLA`.`Id_typu`))) join `POJ_SILNIKA` on((`MOTOCYKL`.`Id_pojemnosci` = `POJ_SILNIKA`.`Id_pojemnosci`))) join `SUW` on((`MOTOCYKL`.`Id_suwu` = `SUW`.`Id_suwu`))) ;

-- ----------------------------
-- View structure for `wyswietl_adminow`
-- ----------------------------
DROP VIEW IF EXISTS `wyswietl_adminow`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wyswietl_adminow` AS select `UP`.`Id_uzytkownika` AS `Id_uzytkownika`,`UP`.`ID_poziomu_uprawnien` AS `Id_poziomu_uprawnien` from `UP` where (`UP`.`ID_poziomu_uprawnien` = 1) ;

-- ----------------------------
-- Event structure for `USUWANIE_STARYCH_DANYCH`
-- ----------------------------
DROP EVENT IF EXISTS `USUWANIE_STARYCH_DANYCH`;
DELIMITER ;;
CREATE DEFINER=`kwanat`@`%` EVENT `USUWANIE_STARYCH_DANYCH` ON SCHEDULE EVERY 1 DAY STARTS '2016-10-24 10:40:13' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM ARCHI_UZYTK WHERE DATEDIFF(SYSDATE(),data_zmiany)>31
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `archiwum_uzytkownicy_update`;
DELIMITER ;;
CREATE TRIGGER `archiwum_uzytkownicy_update` AFTER UPDATE ON `UZYTKOWNIK` FOR EACH ROW INSERT INTO ARCHI_UZYTK (Id_uzytkownika,login,haslo,imie,nazwisko,e_mail,motocykl,data_rejestracji,data_zmiany,operacja)
VALUES(old.Id_uzytkownika,old.login,old.haslo,old.imie,old.nazwisko,old.e_mail,old.motocykl,old.data_rejestracji,SYSDATE(),'u')
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `archiwum_uzytkownicy_delete`;
DELIMITER ;;
CREATE TRIGGER `archiwum_uzytkownicy_delete` AFTER DELETE ON `UZYTKOWNIK` FOR EACH ROW INSERT INTO ARCHI_UZYTK (Id_uzytkownika,login,haslo,imie,nazwisko,e_mail,motocykl,data_rejestracji,data_zmiany,operacja)
VALUES(old.Id_uzytkownika,old.login,old.haslo,old.imie,old.nazwisko,old.e_mail,old.motocykl,old.data_rejestracji,SYSDATE(),'d')
;;
DELIMITER ;
