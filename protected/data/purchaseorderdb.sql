CREATE DATABASE  IF NOT EXISTS `purchaseorderdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `purchaseorderdb`;
-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: purchaseorderdb
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB-1~precise-log

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
-- Table structure for table `purchaseorder`
--

DROP TABLE IF EXISTS `purchaseorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchaseorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountid` int(11) DEFAULT NULL,
  `providerid` int(11) NOT NULL,
  `taxrate` decimal(10,2) NOT NULL DEFAULT '0.07',
  `tax` decimal(10,2) NOT NULL DEFAULT '0.07',
  `subtotal` decimal(10,2) DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `billto_name` varchar(100) CHARACTER SET big5 COLLATE big5_bin NOT NULL,
  `billto_company` varchar(100) DEFAULT NULL,
  `billto_address` text NOT NULL,
  `billto_phone` varchar(45) NOT NULL,
  `billto_city` varchar(45) NOT NULL,
  `billto_state` varchar(45) NOT NULL,
  `billto_country` varchar(45) NOT NULL,
  `billto_zipcode` varchar(10) DEFAULT '00000',
  `shipto_name` varchar(100) NOT NULL,
  `shipto_company` varchar(100) NOT NULL,
  `shipto_address` text NOT NULL,
  `shipto_phone` varchar(45) NOT NULL,
  `shipto_city` varchar(45) NOT NULL,
  `shipto_state` varchar(45) NOT NULL,
  `shipto_country` varchar(45) NOT NULL,
  `shipto_zipcode` varchar(10) NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchaseorder` (`accountid`),
  KEY `fk_purchaseorder_trader` (`providerid`),
  KEY `fk_purchaseorder_provider` (`providerid`),
  KEY `fk_purchaseorder_account` (`accountid`),
  CONSTRAINT `fk_purchaseorder_provider` FOREIGN KEY (`providerid`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorder`
--

LOCK TABLES `purchaseorder` WRITE;
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchaseorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productcode` varchar(50) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `displayable` smallint(6) NOT NULL DEFAULT '1',
  `providerid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `taxable` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `productcode_UNIQUE` (`productcode`),
  KEY `fk_product` (`providerid`),
  CONSTRAINT `fk_product` FOREIGN KEY (`providerid`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'L00023','LAPTOP ASUS','Computer laptop with 4GB of RAM, 100TB HD, 15\'\' wide screen',1250.99,1,1,'COMPUTURES','laptop_asus.jpg',1),(2,'KX-TGJ310SP','Telefono Inalambrico Digital','Telefono inalambrico con bateria de gran duracion, permites conversaciones de hasta  de 15 horas.',200.00,1,1,'TELEFONOS','telefono_inalambrico.jpg',1),(3,'P89030','OMEGA 6','Omega 6, Acidos grasos para mejor salud arterial ',25.99,1,2,'HEALTH','omega6.jpeg',1),(4,'P505000','USB Device','This is a test please ignore this.',25.99,1,3,'Electronic','default.jpg',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'test1','pass1','test1@example.com'),(2,'test2','pass2','test2@example.com'),(3,'test3','pass3','test3@example.com'),(4,'test4','pass4','test4@example.com'),(5,'test5','pass5','test5@example.com'),(6,'test6','pass6','test6@example.com'),(7,'test7','pass7','test7@example.com'),(8,'test8','pass8','test8@example.com'),(9,'test9','pass9','test9@example.com'),(10,'test10','pass10','test10@example.com'),(11,'test11','pass11','test11@example.com'),(12,'test12','pass12','test12@example.com'),(13,'test13','pass13','test13@example.com'),(14,'test14','pass14','test14@example.com'),(15,'test15','pass15','test15@example.com'),(16,'test16','pass16','test16@example.com'),(17,'test17','pass17','test17@example.com'),(18,'test18','pass18','test18@example.com'),(19,'test19','pass19','test19@example.com'),(20,'test20','pass20','test20@example.com'),(21,'test21','pass21','test21@example.com');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchaseorder_items`
--

DROP TABLE IF EXISTS `purchaseorder_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchaseorder_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseorderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_purchaseorder_items` (`purchaseorderid`),
  CONSTRAINT `fk_purchaseorder_items` FOREIGN KEY (`purchaseorderid`) REFERENCES `purchaseorder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorder_items`
--

LOCK TABLES `purchaseorder_items` WRITE;
/*!40000 ALTER TABLE `purchaseorder_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchaseorder_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ruc` varchar(60) NOT NULL,
  `dv` smallint(6) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contactname` varchar(50) NOT NULL,
  `managing_director` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `ruc_UNIQUE` (`ruc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` VALUES (1,'PA-ELECTRONIC','PANASONIC','102023',59,'3982000','carlos.escobar@eliorcorp.com','Ave. Transismica, Building 100','S. Gutierrez','XXXXX'),(2,'NSSA','Natural Store, S.A','40300',200,'00105040404','cescobarabdiel@gmail.com','20th street, Ave. 500','Steven T.',''),(3,'P6060','Pineapplet Tecnologies','R003033',50,'507605050','miariana@pineappletc.com','test','Mariana','Miguel');
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'purchaseorderdb'
--

--
-- Dumping routines for database 'purchaseorderdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-15  2:49:18
