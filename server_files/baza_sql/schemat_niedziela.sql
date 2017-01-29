-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: baza_motocykle
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ARCHI_UZYTK`
--

DROP TABLE IF EXISTS `ARCHI_UZYTK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ARCHI_UZYTK` (
  `Id_uzytkownika` int(3) NOT NULL,
  `login` varchar(15) CHARACTER SET utf8 NOT NULL,
  `haslo` varchar(40) CHARACTER SET utf8 NOT NULL,
  `e_mail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `imie` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nazwisko` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `motocykl` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `data_rejestracji` datetime NOT NULL,
  `operacja` varchar(1) CHARACTER SET utf8 NOT NULL,
  `data_zmiany` timestamp NOT NULL DEFAULT '2011-10-10 04:00:00',
  KEY `poziom_uprawnien` (`operacja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
/*!50100 PARTITION BY RANGE (unix_timestamp(data_zmiany))
(PARTITION p0 VALUES LESS THAN (1483225200) ENGINE = InnoDB,
 PARTITION p1 VALUES LESS THAN (1514761200) ENGINE = InnoDB,
 PARTITION p2 VALUES LESS THAN MAXVALUE ENGINE = InnoDB) */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ARCHI_UZYTK`
--

LOCK TABLES `ARCHI_UZYTK` WRITE;
/*!40000 ALTER TABLE `ARCHI_UZYTK` DISABLE KEYS */;
INSERT INTO `ARCHI_UZYTK` VALUES (1,'admin','dvdd','admin@wp.pl','','','','2016-10-24 10:05:10','u','2016-11-12 05:00:00'),(2,'aergreg','dfagadfg','g','g','reg','erg','2016-10-18 10:06:16','d','2016-11-12 05:00:00'),(4,'kwanat','398d6f53f5b562a7a9769d96ac5dba90f1908a35','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-11-12 17:44:06','d','2016-11-12 05:00:00'),(1,'kwanat','dvd','vf','vfd','vf','fdv','2016-10-24 10:05:10','u','2016-11-12 05:00:00'),(1,'kwanat','dvdd','vf','vfd','vf','fdv','2016-10-24 10:05:10','u','2016-11-12 05:00:00'),(3,'kwanat123','7e240de74fb1ed08fa08d38063f6a6a91462a815','aaa@wp.pl','','','','2016-11-12 17:14:18','d','2016-11-12 05:00:00'),(6,'kwanat','398d6f53f5b562a7a9769d96ac5dba90f1908a35','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-11-12 17:49:40','d','2016-12-09 04:26:53'),(7,'miwierz','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','asdf@wp.pl','MIchał','Wierzbiński','','2016-11-14 09:59:05','d','2016-12-09 04:26:58'),(14,'abcd','81fe8bfe87576c3ecb22426f8e57847382917acf','abcd@wo','','','','2016-11-28 10:22:05','d','2016-12-09 04:27:09'),(13,'abc','a9993e364706816aba3e25717850c26c9cd0d89d','ka@wp','','','','2016-11-28 10:02:16','d','2016-12-09 04:27:09'),(11,':\":dfg','7e240de74fb1ed08fa08d38063f6a6a91462a815','aws@wp.pl','','','','2016-11-14 10:42:10','d','2016-12-09 04:27:09'),(10,'&#039;;lgfhfx','7e240de74fb1ed08fa08d38063f6a6a91462a815','aaa@wp.pl','','','','2016-11-14 10:39:27','d','2016-12-09 04:27:09'),(9,'student1','6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2','123@wp.pl','','','','2016-11-14 10:36:02','d','2016-12-09 04:27:09'),(8,'student','bf9661defa3daecacfde5bde0214c4a439351d4d','student@student.pl','student1','','','2016-11-14 10:26:50','d','2016-12-09 04:27:09'),(15,'michalW','507e061196a30d2c153bf13bdad1fc0ad7f1aab1','MICHAL@GMAIL.COM','MICHAL','WIERZBINSKI','HAYABUSA','2016-11-28 10:38:59','d','2016-12-09 04:27:24'),(16,'adminek','8550ed8b9c70afed607e65460f2878851b957f36','adminek@wp.pl','','','','2016-12-05 10:50:25','d','2016-12-09 04:31:08'),(1,'admin','398d6f53f5b562a7a9769d96ac5dba90f1908a35','admin@wp.pl','','','','2016-10-24 10:05:10','d','2016-12-28 04:47:27'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','','','','2016-12-27 23:48:01','u','2016-12-31 03:04:52'),(17,'kwanat','55cedde951a44d02da2481275f885e9f42d8683e','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-08 23:32:14','d','2016-12-31 18:15:04'),(21,'','c0c5b564776b3c7f59de44c8edcdb2df35faa7ae','','','','','2016-12-31 14:15:35','d','2016-12-31 19:18:54'),(22,'odwiedzajacy','d54ac9d832c59cb8c0cbe2cd1f1fbd23061d0ff3','odwiedzajacy@odw.pl','Odwiedzający','Odw','','2016-12-31 14:19:35','d','2016-12-31 19:23:22'),(23,'odwiedzajacy','2c414ad27adaea5e8fb46185ec1ea2bc2da67f93','odwiedzajacy@odw.pl','Odwiedzający','Odw','','2016-12-31 14:23:36','d','2016-12-31 19:30:11'),(24,'odwiedzajacy','e9d7af402cc67b07b6d1eccf93119b3631a772b8','odwiedzajacy@odw.pl','Odwiedzający','Odw','','2016-12-31 14:30:29','d','2016-12-31 19:33:58'),(25,'odwiedzajacy','b7a579571a1b3d556e688a88077ae20e784a82d9','odwiedzajacy@odw.pl','Odwiedzający','Odw','','2016-12-31 14:34:14','u','2016-12-31 19:41:13'),(25,'odwiedzajacy','b7a579571a1b3d556e688a88077ae20e784a82d9','odwiedzajacy@odw.pl','Odwiedzaęźćżjący','Odw','','2016-12-31 14:34:14','u','2016-12-31 19:41:36'),(20,'kwanat','2b212994cb67a4bb794bf11f672aadefebda59a2','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 01:50:11'),(20,'kwanat','2b212994cb67a4bb794bf11f672aadefebda59a2','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 01:53:57'),(20,'kwanat','2b212994cb67a4bb794bf11f672aadefebda59a2','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow VT125','2016-12-31 13:21:37','u','2017-01-02 01:54:08'),(20,'kwanat','2b212994cb67a4bb794bf11f672aadefebda59a2','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 02:44:15'),(20,'kwanat','7c3f094526fdfbe5e98d909e6c887d27b70e7c97','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 02:45:18'),(20,'kwanat','bd05897b1dc50b4253b46bdf680db65d730d5ac9','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 02:50:39'),(20,'kwanat','bd05897b1dc50b4253b46bdf680db65d730d5ac9','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 02:51:17'),(20,'kwanat','2c7d8fb27dc4040a3ca0f888575b8c4ff936d30e','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 02:51:51'),(20,'kwanat','0841dec17a13ba4ffdb4fa3569880097a9cbf224','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 03:02:56'),(20,'kwanat','9fd454247ef01503811ea862a89dd7e2b17c35ef','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-02 16:01:03'),(20,'kwanat','650dd31849711f58b1b91e8ca9b8bb1db6cec08b','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-04 20:01:51'),(20,'kwanat','650dd31849711f58b1b91e8ca9b8bb1db6cec08b','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-05 21:30:05'),(19,'moderator','2c537510dbe6f9104d3eb9c0bc9a09dcbe93e0e4','moderator@moderator.com','Moderator','Mod','brak','2016-12-30 19:59:02','u','2017-01-21 15:34:09'),(33,'aniewiarowski','41562b7c44ae6a291db7489fcc84ce2d3683c213','aniewiarowski@pk.edu.pl','Artur','Niewiarowski','moto','2017-01-23 03:34:58','u','2017-01-23 08:52:10'),(33,'aniewiarowski','f3844c418dcf24dc0c0fcd08a9cf958aa2be8842','aniewiarowski@pk.edu.pl','Artur','Niewiarowski','moto','2017-01-23 03:34:58','u','2017-01-23 08:52:34'),(34,'krysia','wfhifhw4hwiuhfiw','krysia@wp.pl','krysia','marysia','jawohl','2017-01-23 20:02:27','d','2017-01-24 01:03:09'),(35,'krysia','31b1b779a13ac2677bea43406f04b97e336ffc7f','krysia@wp.pl','krysia','marysia','fajny','2017-01-23 20:07:12','d','2017-01-24 01:07:59'),(36,'krysia','87957b10c4e93471e2cdc3743cd8fc89d2ea0c67','krysia@wp.pl','krysia','marysia','mom','2017-01-23 20:17:01','d','2017-01-24 01:23:29'),(25,'odwiedzajacy','b7a579571a1b3d556e688a88077ae20e784a82d9','odwiedzajacy@odw.pl','Odwiedzający','Odw','','2016-12-31 14:34:14','d','2017-01-25 21:05:24'),(40,'<noscript>','b9795e453fcab491cc3c246ae46d4ece01b79f7c','kamil@kamil.pl','kamil','kamil','$#%^T&*UIJKL','2017-01-25 17:12:46','d','2017-01-26 00:02:37'),(41,'<noscript>2','0327744b1d57982366520b4aa6f3fe8d0ee53120','adsad@p.ppl','sadsad','asdasd','<noscript>','2017-01-25 17:14:55','d','2017-01-26 00:02:37'),(42,'<noscript>3','7629df905208189a204046178593c9c184a6fdc4','adasd@wp.pl','adasd','adasd','adasd','2017-01-25 17:16:00','d','2017-01-26 00:02:37'),(43,'<noscript>6','9fe673e379f5588ae3c4c175401d3069fbbe94d9','adad@wp.pl','adasd','asdsad','adasd','2017-01-25 17:18:01','d','2017-01-26 00:02:37'),(20,'kwanat','650dd31849711f58b1b91e8ca9b8bb1db6cec08b','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-26 00:31:14'),(20,'kwanat','650dd31849711f58b1b91e8ca9b8bb1db6cec08b','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-26 00:31:36'),(45,';;;\\\'\\\'\\\'\\\"\\\"','e1092de6f3a1c4f24bfd1719c8e9cd40169fba85','kamil.wanat007@wp.pl','ka\\\"l;\\\'','ahdb\\\"\\\';','','2017-01-25 19:34:31','d','2017-01-26 00:40:25'),(46,';;;\\\'\\\'\\\'\\\"\\\"','0dbc4c2fbb0610e8cafbab2d68b31c7bbc089d4c','ka@wp.pl',';\\\';',';\\\'\\\';','','2017-01-25 19:41:15','d','2017-01-26 00:52:45'),(49,'login124','1d580f6a7978b8115404b303d92ec295b6952206','kamil.wanat007@wp.pl','Kamil','Wanat','','2017-01-28 14:23:05','d','2017-01-28 19:23:30'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 13:54:45'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 13:57:36'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 13:58:24'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 13:58:30'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 13:58:46'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 13:58:52'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:02:29'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:02:59'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:04:59'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:07:56'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:09:21'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:09:28'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:09:34'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:09:39'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:09:44'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:12:20'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:12:24'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:13:44'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:23:10'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:33:19'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:33:21'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:33:24'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:33:26'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:33:29'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:41:13'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:50:49'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:51:53'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:52:43'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 14:53:09'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 14:53:28'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 15:06:43'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:21:06'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:21:29'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:26:41'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:29:12'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:29:32'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:29:48'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:38:39'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:39:09'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:39:38'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:39:59'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:40:14'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:40:32'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:40:51'),(18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01','u','2017-01-29 19:41:05'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:41:23'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:42:11'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:42:32'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:47:34'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:51:56'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:52:30'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 19:52:51'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34','u','2017-01-29 21:10:05'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 21:31:42'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37','u','2017-01-29 22:37:45');
/*!40000 ALTER TABLE `ARCHI_UZYTK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CYLINDER`
--

DROP TABLE IF EXISTS `CYLINDER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CYLINDER` (
  `Id_cylindra` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_cylindrow` int(2) NOT NULL,
  PRIMARY KEY (`Id_cylindra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CYLINDER`
--

LOCK TABLES `CYLINDER` WRITE;
/*!40000 ALTER TABLE `CYLINDER` DISABLE KEYS */;
INSERT INTO `CYLINDER` VALUES (1,1),(2,2),(3,4);
/*!40000 ALTER TABLE `CYLINDER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `KOMENTARZ`
--

DROP TABLE IF EXISTS `KOMENTARZ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `KOMENTARZ` (
  `Id_komentarza` int(3) NOT NULL AUTO_INCREMENT,
  `Id_motocykla` int(4) NOT NULL,
  `Id_uzytkownika` int(3) NOT NULL,
  `Id_komentarza_fk` int(3) DEFAULT NULL,
  `tresc` varchar(2000) NOT NULL,
  PRIMARY KEY (`Id_komentarza`),
  KEY `motocykl_fk` (`Id_motocykla`),
  KEY `uzytk_fk` (`Id_uzytkownika`),
  KEY `kom_fk` (`Id_komentarza_fk`),
  CONSTRAINT `kom_fk` FOREIGN KEY (`Id_komentarza_fk`) REFERENCES `KOMENTARZ` (`Id_komentarza`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `motocykl_fk` FOREIGN KEY (`Id_motocykla`) REFERENCES `MOTOCYKL` (`Id_motocykla`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `uzytk_fk` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `KOMENTARZ`
--

LOCK TABLES `KOMENTARZ` WRITE;
/*!40000 ALTER TABLE `KOMENTARZ` DISABLE KEYS */;
INSERT INTO `KOMENTARZ` VALUES (1,4,20,NULL,'fajne moto'),(2,4,18,1,'mosz rechst'),(3,4,30,1,'ja, pieruńsko fajno maszina'),(4,4,31,NULL,'ano, ano'),(5,4,20,NULL,'test dodawania kom'),(6,4,20,NULL,'<noscript>'),(7,4,20,NULL,'test2'),(8,4,20,NULL,'test3'),(9,4,20,NULL,'test idmot'),(10,4,20,6,'Dodaj komentarz'),(11,4,20,7,'<noscript>'),(12,4,20,7,'Dodaj komentarz'),(13,5,20,NULL,'test1\n'),(14,5,20,13,'\'svsd\''),(15,5,20,NULL,'Dodaj komentarz'),(16,9,31,NULL,'<noscript>'),(17,9,31,16,'<b>Brawo</b>'),(18,4,30,NULL,'ala\' -lala'),(19,2,20,NULL,'komentarz\n'),(20,31,18,NULL,'<noscript>'),(21,31,18,20,'<noscript>'),(22,31,18,20,'S^*^G&(*\\43\\grf\negv\\te\nB]4t\nbgr\\\ndvb\\t4r\'dg\nv'),(23,31,18,20,'!@#$%^&*()_+_)(*&^%$#@#$%^&*()_)(*&^%$#@!#$%^&*()_)(*&^%$#@#$%^&*()_)(*&^%$#@#$%^&*()_'),(24,31,18,20,'\\\"\\\"\\#\\$\\%'),(28,5,30,NULL,'Fajna zabawa, nie?'),(29,5,19,NULL,'zabawia jest przednia :)'),(30,5,30,NULL,'Tylko tak trochę, autor strony na wnerwionego wygląda'),(31,3,20,NULL,'\"\"\"\'\';;;'),(32,3,20,NULL,'\' \" ; : / + ? = ) ( _ # ! :-)'),(33,3,20,32,'kgksdgci'),(34,2,20,NULL,'bvcg\n'),(35,10,19,NULL,'sa'),(36,10,19,NULL,'dada'),(37,10,19,NULL,'das'),(38,10,19,NULL,'da'),(39,10,19,NULL,'da'),(40,10,19,NULL,'das'),(41,10,19,NULL,'da'),(42,10,19,NULL,'dadas'),(43,10,19,NULL,''),(44,10,19,NULL,''),(45,10,19,NULL,''),(46,10,19,NULL,''),(47,10,19,NULL,''),(48,10,19,NULL,''),(49,2,20,NULL,'\'\';lkjhgfd<noscript>'),(50,2,20,NULL,'\'\';lkjhgfd<noscript>'),(51,8,20,NULL,''),(52,8,20,NULL,''),(53,8,20,51,''),(54,8,20,51,''),(55,8,30,NULL,''),(56,43,20,NULL,''),(57,31,30,NULL,''),(58,45,20,NULL,'sjgf'),(59,42,20,NULL,'asdf'),(60,42,20,NULL,'asdfghj'),(61,42,20,60,'xcvbn'),(62,31,30,NULL,';');
/*!40000 ALTER TABLE `KOMENTARZ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MARKA`
--

DROP TABLE IF EXISTS `MARKA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MARKA` (
  `Id_marki` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_marki` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_marki`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MARKA`
--

LOCK TABLES `MARKA` WRITE;
/*!40000 ALTER TABLE `MARKA` DISABLE KEYS */;
INSERT INTO `MARKA` VALUES (1,'Yamaha'),(2,'Honda'),(3,'Kawasaki'),(4,'Suzuki'),(5,'KTM'),(6,'Chopper'),(7,'ATakaSobie'),(8,'</select>'),(9,'<noscript>');
/*!40000 ALTER TABLE `MARKA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTOCYKL`
--

DROP TABLE IF EXISTS `MOTOCYKL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTOCYKL` (
  `Id_motocykla` int(4) NOT NULL AUTO_INCREMENT,
  `Id_marki` int(3) NOT NULL,
  `Model` varchar(100) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTOCYKL`
--

LOCK TABLES `MOTOCYKL` WRITE;
/*!40000 ALTER TABLE `MOTOCYKL` DISABLE KEYS */;
INSERT INTO `MOTOCYKL` VALUES (2,1,'R1',26,2,1,7,2,3,'sdgrsdg\\r\\nrdagdr\\r\\ngrda','zdjecia/2.jpeg',20),(3,1,'R6',28,2,1,5,2,3,'rgergrgrg rdgdrgdrg drg drgdrgdr gdr gdrgrdgrdg drg drgdrgdrgrdgrg serger wrhwrhthrthrtsh strhrth rsthtrshrtshtrhrtsh srthrth trhrts hsr hrsthsrt hrsth rth rshsrh rst hsrt hsrthrth','zdjecia/3.jpg',20),(4,2,'VT Shadow',11,2,6,2,2,2,'Największy z chopperów w klasie 125.\\r\\nIdealny dla młodych \\\"riderów\\\".','zdjecia/4.jpg',20),(5,1,'DT 125',18,2,5,2,1,1,'Pierwszy crossowy motocykl Yamahy.','zdjecia/5.jpg',30),(7,1,'XJ 600N',8,2,4,5,2,3,'Najlepsza motorynka dla początkujących na świecie!','zdjecia/7.jpg',19),(8,4,'Bandit 650 s',18,2,4,8,2,3,'Bandziooor ! :-)','zdjecia/8.jpg',20),(9,7,'<b>Fajny</b>',30,2,4,1,1,1,'<b>no to sprawdźmy czy można xss\'a zrobić</b><br />można czy nie?','zdjecia/9.jpg',30),(10,1,'ت مرکزلرین‌دن بیری اولان ',1,1,1,1,1,1,'ت مرکزلرین‌دن بیری اولان ','zdjecia/10.jpg',19),(13,8,'<noscript>',1,3,7,1,1,1,'<noscript>','zdjecia/13.jpg',20),(30,1,';;;;;;;;;;',11,1,1,1,1,1,'jagfyarg','zdjecia/30.jpg',30),(31,1,'nowy',1,1,1,1,1,1,'sdhgfy','zdjecia/31.jpg',30),(41,3,'ZX10R',18,2,1,7,2,3,'Najpopularniejszy \\\"przecinak\\\" stajni Kawasaki.','zdjecia/41.png',20),(42,1,'gfjg',1,1,1,1,1,1,'nnbvghv','zdjecia/42.jpeg',20),(43,1,'ghjkhjmhgfdaz\\\';',32,1,1,1,1,1,'\\\';lkjhgv','zdjecia/43.jpg',20),(44,4,'GS',16,2,4,4,2,2,'Niezawodny i popularny motocykl.','zdjecia/44.jpg',20),(45,1,'testmarki',1,1,1,1,1,1,'jkhdsfhs','zdjecia/45.jpg',20),(48,1,'knlk',1,1,1,1,1,1,'','zdjecia/48.jpeg',20),(49,1,'dfghjkl',1,1,1,1,1,1,'','zdjecia/49.jpg',20),(51,1,'cvbnm',1,1,1,1,1,1,'','zdjecia/51.jpg',20),(52,1,'asdfghjk',1,1,1,1,1,1,'qwertyuiop','zdjecia/52.jpg',20);
/*!40000 ALTER TABLE `MOTOCYKL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NAPED`
--

DROP TABLE IF EXISTS `NAPED`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NAPED` (
  `Id_napedu` int(2) NOT NULL AUTO_INCREMENT,
  `rodzaj_napedu` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_napedu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NAPED`
--

LOCK TABLES `NAPED` WRITE;
/*!40000 ALTER TABLE `NAPED` DISABLE KEYS */;
INSERT INTO `NAPED` VALUES (1,'pasek'),(2,'łańcuch'),(3,'<noscript>');
/*!40000 ALTER TABLE `NAPED` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PARAMETR`
--

DROP TABLE IF EXISTS `PARAMETR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PARAMETR` (
  `Id_parametru` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_parametru` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_parametru`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARAMETR`
--

LOCK TABLES `PARAMETR` WRITE;
/*!40000 ALTER TABLE `PARAMETR` DISABLE KEYS */;
INSERT INTO `PARAMETR` VALUES (1,'Światła'),(2,'Kontrola trakcji'),(3,'Opony'),(4,'<noscript>'),(5,'Skrzynia biegów'),(8,'Koła przód'),(9,'Akumulator'),(10,'grytuio'),(11,'aWFEGRHTYGMHGCX'),(12,'ASDGGJH BFZ'),(13,'ASDFBNBFV '),(14,'Hamulce');
/*!40000 ALTER TABLE `PARAMETR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `POJ_SILNIKA`
--

DROP TABLE IF EXISTS `POJ_SILNIKA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `POJ_SILNIKA` (
  `Id_pojemnosci` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_ccm` int(4) NOT NULL,
  PRIMARY KEY (`Id_pojemnosci`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `POJ_SILNIKA`
--

LOCK TABLES `POJ_SILNIKA` WRITE;
/*!40000 ALTER TABLE `POJ_SILNIKA` DISABLE KEYS */;
INSERT INTO `POJ_SILNIKA` VALUES (1,50),(2,125),(3,250),(4,500),(5,600),(6,900),(7,1000),(8,650);
/*!40000 ALTER TABLE `POJ_SILNIKA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `POZIOM_UPRAWNIEN`
--

DROP TABLE IF EXISTS `POZIOM_UPRAWNIEN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `POZIOM_UPRAWNIEN` (
  `ID_poziomu_uprawnien` int(3) NOT NULL AUTO_INCREMENT,
  `Nazwa_uprawnienia` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_poziomu_uprawnien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `POZIOM_UPRAWNIEN`
--

LOCK TABLES `POZIOM_UPRAWNIEN` WRITE;
/*!40000 ALTER TABLE `POZIOM_UPRAWNIEN` DISABLE KEYS */;
INSERT INTO `POZIOM_UPRAWNIEN` VALUES (1,'Administrator'),(2,'Moderator'),(3,'Odwiedzający');
/*!40000 ALTER TABLE `POZIOM_UPRAWNIEN` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ROK_PROD`
--

DROP TABLE IF EXISTS `ROK_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ROK_PROD` (
  `Id_roku` int(4) NOT NULL AUTO_INCREMENT,
  `rok` int(4) NOT NULL,
  PRIMARY KEY (`Id_roku`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ROK_PROD`
--

LOCK TABLES `ROK_PROD` WRITE;
/*!40000 ALTER TABLE `ROK_PROD` DISABLE KEYS */;
INSERT INTO `ROK_PROD` VALUES (1,1990),(2,1991),(3,1992),(4,1993),(5,1994),(6,1995),(7,1996),(8,1997),(9,1998),(10,1999),(11,2000),(12,2001),(13,2002),(14,2003),(15,2004),(16,2005),(17,2006),(18,2007),(19,2008),(20,2009),(21,2010),(22,2011),(23,2012),(24,2013),(25,2014),(26,2015),(27,2016),(28,2017),(29,2000),(30,2017),(31,45),(32,8888);
/*!40000 ALTER TABLE `ROK_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SESJA`
--

DROP TABLE IF EXISTS `SESJA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SESJA`
--

LOCK TABLES `SESJA` WRITE;
/*!40000 ALTER TABLE `SESJA` DISABLE KEYS */;
INSERT INTO `SESJA` VALUES (290,19,'7a9b60c2c4bf7529f7f46a07fe4293901a284f18fd56c043bf2bbd860740fab1','89.64.6.62','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36','2017-01-29 10:35:15','2e7fh?yznv'),(329,30,'f71b5ea0e3ae4d05e79d8fd39e14569702f79ba1b4a769f6bcb46bf236384319','89.70.160.203','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0','2017-01-29 21:10:22','5znl3cx58o'),(331,20,'1da82340df6e524cf314b91cbbfa3c13c7ba57b95bfa618cc0255274229cb61a','89.64.6.62','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0','2017-01-29 22:37:45','d!zntyzcfu');
/*!40000 ALTER TABLE `SESJA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUW`
--

DROP TABLE IF EXISTS `SUW`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUW` (
  `Id_suwu` int(3) NOT NULL AUTO_INCREMENT,
  `liczba_suwów` int(1) NOT NULL,
  PRIMARY KEY (`Id_suwu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUW`
--

LOCK TABLES `SUW` WRITE;
/*!40000 ALTER TABLE `SUW` DISABLE KEYS */;
INSERT INTO `SUW` VALUES (1,2),(2,4);
/*!40000 ALTER TABLE `SUW` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TYP_MOTOCYKLA`
--

DROP TABLE IF EXISTS `TYP_MOTOCYKLA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TYP_MOTOCYKLA` (
  `Id_typu` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa_typu` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_typu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TYP_MOTOCYKLA`
--

LOCK TABLES `TYP_MOTOCYKLA` WRITE;
/*!40000 ALTER TABLE `TYP_MOTOCYKLA` DISABLE KEYS */;
INSERT INTO `TYP_MOTOCYKLA` VALUES (1,'Sportowy'),(2,'Turystyczny'),(3,'Cruiser'),(4,'Szosowo-turystyczny'),(5,'Cross'),(6,'Chopper'),(7,'<textarea>');
/*!40000 ALTER TABLE `TYP_MOTOCYKLA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UP`
--

DROP TABLE IF EXISTS `UP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UP` (
  `Id_uzytkownika` int(3) NOT NULL,
  `ID_poziomu_uprawnien` int(3) NOT NULL,
  KEY `uzytkownik_fk_up` (`Id_uzytkownika`),
  KEY `uprawnienie_fk_up` (`ID_poziomu_uprawnien`),
  CONSTRAINT `uprawnienie_fk_up` FOREIGN KEY (`ID_poziomu_uprawnien`) REFERENCES `POZIOM_UPRAWNIEN` (`ID_poziomu_uprawnien`) ON UPDATE CASCADE,
  CONSTRAINT `uzytkownik_fk_up` FOREIGN KEY (`Id_uzytkownika`) REFERENCES `UZYTKOWNIK` (`Id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UP`
--

LOCK TABLES `UP` WRITE;
/*!40000 ALTER TABLE `UP` DISABLE KEYS */;
INSERT INTO `UP` VALUES (19,2),(20,1),(18,3),(19,3),(20,3),(20,2),(18,1),(27,3),(29,3),(29,2),(30,3),(30,2),(31,3),(30,1),(33,3),(33,1),(33,2),(27,1),(27,2),(47,3),(48,3);
/*!40000 ALTER TABLE `UP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UZYTKOWNIK`
--

DROP TABLE IF EXISTS `UZYTKOWNIK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UZYTKOWNIK` (
  `Id_uzytkownika` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) COLLATE utf8_bin NOT NULL,
  `haslo` varchar(40) COLLATE utf8_bin NOT NULL,
  `sol` varchar(255) COLLATE utf8_bin NOT NULL,
  `e_mail` varchar(100) COLLATE utf8_bin NOT NULL,
  `imie` varchar(100) COLLATE utf8_bin NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_bin NOT NULL,
  `motocykl` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `data_rejestracji` datetime NOT NULL,
  `bledne_logowania` int(1) NOT NULL,
  `data_blednego_logowania` datetime NOT NULL,
  PRIMARY KEY (`Id_uzytkownika`),
  UNIQUE KEY `loginunique` (`login`) USING BTREE,
  UNIQUE KEY `e_mailunique` (`e_mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UZYTKOWNIK`
--

LOCK TABLES `UZYTKOWNIK` WRITE;
/*!40000 ALTER TABLE `UZYTKOWNIK` DISABLE KEYS */;
INSERT INTO `UZYTKOWNIK` VALUES (18,'admin','866f01287a836284c62cf0ca62a8d78772774bfd','ixtb37!nlo','admin@admin.pl','Admin','Adm','','2016-12-27 23:48:01',1,'0000-00-00 00:00:00'),(19,'moderator','2c537510dbe6f9104d3eb9c0bc9a09dcbe93e0e4','jp77n7hrp8','moderator@moderator.com','Moderator','Mod','<noscript>','2016-12-30 19:59:02',0,'0000-00-00 00:00:00'),(20,'kwanat','b26c8db6fcc30bb9e66bb3971528a7df809d009c','83lld3578i','wanat.kamil@wp.pl','Kamil','Wanat','Honda Shadow 125','2016-12-31 13:21:37',1,'2017-01-29 14:51:56'),(27,'kamil','1c1cd68cfe28be25b0ee284895bc1603e6d23044','21g0iv1j8n','kamil@p.pl','kamil','kapka','jamacha','2017-01-06 18:56:24',0,'0000-00-00 00:00:00'),(29,'mmaarpol','44b3e4d49c2d07ef565dd3f47506a166f9e99f5c','kcs2z6uovk','mmaarpol@gmail.com','sfsfef','sefsf','yamaha xj600n','2017-01-07 06:33:02',0,'0000-00-00 00:00:00'),(30,'ta_wredna','a7df9f8582ae878270cd512093e05b30f48b49b8','?d16nh8o2p','vegoria@gmail.com','Zgadnij','Sam','','2017-01-09 08:09:34',1,'2017-01-29 09:33:19'),(31,'test_zwyklego','56dc83ee6fbe798bc6339f9207d69723c085befa','tdowrur4fr','zwykly@zwykly.pl','Zwykly','Zwykly','','2017-01-14 16:04:36',0,'0000-00-00 00:00:00'),(33,'aniewiarowski','f3844c418dcf24dc0c0fcd08a9cf958aa2be8842','ckmyble62c','aniewiarowski@pk.edu.pl','Artur','Niewiarowski','moto','2017-01-23 03:34:58',0,'0000-00-00 00:00:00'),(47,'kamil007','14230fe35cc94d1a53c2214c52880537219bb27d','s7kp2cj6a2','ka@wp.pl','kamil','qwerty','','2017-01-26 02:08:49',0,'0000-00-00 00:00:00'),(48,'ala123','b631157e63ea9a40567575413bd6dae070f7fa40','ke9iuairc?','ala123@wp.pl','ala','ala','<noscript>','2017-01-26 02:40:14',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `UZYTKOWNIK` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`wanat`@`localhost`*/ /*!50003 TRIGGER `archiwum_uzytkownicy_update` AFTER UPDATE ON `UZYTKOWNIK` FOR EACH ROW INSERT INTO ARCHI_UZYTK (Id_uzytkownika,login,haslo,imie,nazwisko,e_mail,motocykl,data_rejestracji,data_zmiany,operacja)
VALUES(old.Id_uzytkownika,old.login,old.haslo,old.imie,old.nazwisko,old.e_mail,old.motocykl,old.data_rejestracji,SYSDATE(),'u') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`wanat`@`localhost`*/ /*!50003 TRIGGER `archiwum_uzytkownicy_delete` AFTER DELETE ON `UZYTKOWNIK` FOR EACH ROW INSERT INTO ARCHI_UZYTK (Id_uzytkownika,login,haslo,imie,nazwisko,e_mail,motocykl,data_rejestracji,data_zmiany,operacja)
VALUES(old.Id_uzytkownika,old.login,old.haslo,old.imie,old.nazwisko,old.e_mail,old.motocykl,old.data_rejestracji,SYSDATE(),'d') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `WART_PARAMETRU`
--

DROP TABLE IF EXISTS `WART_PARAMETRU`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WART_PARAMETRU` (
  `Id_motocykla` int(3) NOT NULL,
  `Id_parametru` int(3) NOT NULL,
  `wartosc_parametru` varchar(30) NOT NULL,
  KEY `motocykl` (`Id_motocykla`),
  KEY `parametr` (`Id_parametru`),
  CONSTRAINT `motocykl` FOREIGN KEY (`Id_motocykla`) REFERENCES `MOTOCYKL` (`Id_motocykla`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `parametr` FOREIGN KEY (`Id_parametru`) REFERENCES `PARAMETR` (`Id_parametru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WART_PARAMETRU`
--

LOCK TABLES `WART_PARAMETRU` WRITE;
/*!40000 ALTER TABLE `WART_PARAMETRU` DISABLE KEYS */;
INSERT INTO `WART_PARAMETRU` VALUES (5,1,'H4'),(3,2,'brak'),(41,1,'H4'),(4,5,'4-biegowa'),(4,9,'żelowy'),(42,10,'shdfkushf'),(43,11,'UMTDSZ'),(43,12,'JGHFDZ'),(43,13,'   CCC'),(44,14,'tarcza');
/*!40000 ALTER TABLE `WART_PARAMETRU` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `dane_motocykl`
--

DROP TABLE IF EXISTS `dane_motocykl`;
/*!50001 DROP VIEW IF EXISTS `dane_motocykl`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `dane_motocykl` AS SELECT 
 1 AS `Id_motocykla`,
 1 AS `Marka`,
 1 AS `Model`,
 1 AS `Rok_produkcji`,
 1 AS `Rodzaj_napedu`,
 1 AS `Typ_motocykla`,
 1 AS `Pojemność_silnika`,
 1 AS `Liczba_suwów`,
 1 AS `Liczba_cylindrow`,
 1 AS `Opis`,
 1 AS `Zdjecie`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `komentarze`
--

DROP TABLE IF EXISTS `komentarze`;
/*!50001 DROP VIEW IF EXISTS `komentarze`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `komentarze` AS SELECT 
 1 AS `Id_motocykla`,
 1 AS `Id_komentarza`,
 1 AS `login`,
 1 AS `Id_komentarza_fk`,
 1 AS `tresc`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `wyswietl_adminow`
--

DROP TABLE IF EXISTS `wyswietl_adminow`;
/*!50001 DROP VIEW IF EXISTS `wyswietl_adminow`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `wyswietl_adminow` AS SELECT 
 1 AS `Id_uzytkownika`,
 1 AS `Id_poziomu_uprawnien`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `dane_motocykl`
--

/*!50001 DROP VIEW IF EXISTS `dane_motocykl`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `dane_motocykl` AS select `MOTOCYKL`.`Id_motocykla` AS `Id_motocykla`,`MARKA`.`nazwa_marki` AS `Marka`,`MOTOCYKL`.`Model` AS `Model`,`ROK_PROD`.`rok` AS `Rok_produkcji`,`NAPED`.`rodzaj_napedu` AS `Rodzaj_napedu`,`TYP_MOTOCYKLA`.`nazwa_typu` AS `Typ_motocykla`,`POJ_SILNIKA`.`liczba_ccm` AS `Pojemność_silnika`,`SUW`.`liczba_suwów` AS `Liczba_suwów`,`CYLINDER`.`liczba_cylindrow` AS `Liczba_cylindrow`,`MOTOCYKL`.`opis` AS `Opis`,`MOTOCYKL`.`zdjecie` AS `Zdjecie` from (((((((`MOTOCYKL` join `CYLINDER` on((`MOTOCYKL`.`Id_cylindra` = `CYLINDER`.`Id_cylindra`))) join `MARKA` on((`MOTOCYKL`.`Id_marki` = `MARKA`.`Id_marki`))) join `ROK_PROD` on((`MOTOCYKL`.`Id_roku` = `ROK_PROD`.`Id_roku`))) join `NAPED` on((`MOTOCYKL`.`Id_napedu` = `NAPED`.`Id_napedu`))) join `TYP_MOTOCYKLA` on((`MOTOCYKL`.`Id_typu` = `TYP_MOTOCYKLA`.`Id_typu`))) join `POJ_SILNIKA` on((`MOTOCYKL`.`Id_pojemnosci` = `POJ_SILNIKA`.`Id_pojemnosci`))) join `SUW` on((`MOTOCYKL`.`Id_suwu` = `SUW`.`Id_suwu`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `komentarze`
--

/*!50001 DROP VIEW IF EXISTS `komentarze`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`wanat`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `komentarze` AS select `KOMENTARZ`.`Id_motocykla` AS `Id_motocykla`,`KOMENTARZ`.`Id_komentarza` AS `Id_komentarza`,`UZYTKOWNIK`.`login` AS `login`,`KOMENTARZ`.`Id_komentarza_fk` AS `Id_komentarza_fk`,`KOMENTARZ`.`tresc` AS `tresc` from (`KOMENTARZ` join `UZYTKOWNIK` on((`KOMENTARZ`.`Id_uzytkownika` = `UZYTKOWNIK`.`Id_uzytkownika`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `wyswietl_adminow`
--

/*!50001 DROP VIEW IF EXISTS `wyswietl_adminow`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `wyswietl_adminow` AS select `UP`.`Id_uzytkownika` AS `Id_uzytkownika`,`UP`.`ID_poziomu_uprawnien` AS `Id_poziomu_uprawnien` from `UP` where (`UP`.`ID_poziomu_uprawnien` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-29 17:39:39
