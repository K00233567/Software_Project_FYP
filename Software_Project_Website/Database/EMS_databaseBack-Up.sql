-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: event_management_system
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `pinA` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `emailA` varchar(45) NOT NULL,
  `LoggedIn` int(2) NOT NULL,
  `UserType` varchar(45) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  UNIQUE KEY `emailA_UNIQUE` (`emailA`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (7,'1234','Keith','Keith@gmail.com',1,'Admin'),(14,'1234','Laura','Laura@gmail.com',0,'Admin'),(17,'a7aa0187c4c7159a5f06147bc3bb8e49dec2f861','Brian','Brian@gmail.com',0,'Admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `idBusiness` int(11) NOT NULL,
  PRIMARY KEY (`bookingID`,`idCustomer`,`idBusiness`),
  UNIQUE KEY `bookingID_UNIQUE` (`bookingID`),
  KEY `fk_Booking_Business1_idx` (`idBusiness`),
  KEY `fk_Booking_Customer1_idx` (`idCustomer`) USING BTREE,
  CONSTRAINT `fk_Booking_Business1` FOREIGN KEY (`idBusiness`) REFERENCES `business` (`businessID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Booking_Customer1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,'2018-04-23','',20,94),(5,'2018-05-04','',20,64),(6,'2018-04-27','',20,61),(7,'2018-04-18','',16,96),(9,'2018-04-18','',16,64),(10,'2018-04-30','',20,96),(11,'2019-05-20','',23,61),(12,'2019-05-20','',23,64),(13,'2019-05-20','',16,97);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `businessID` int(11) NOT NULL AUTO_INCREMENT,
  `nameB` varchar(45) NOT NULL,
  `emailB` varchar(45) NOT NULL,
  `pinB` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `telephone` int(10) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `Usertype` varchar(11) NOT NULL,
  `LoggedIn` int(1) NOT NULL,
  PRIMARY KEY (`businessID`),
  UNIQUE KEY `businessID_UNIQUE` (`businessID`),
  UNIQUE KEY `emailB_UNIQUE` (`emailB`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (61,'Keith','this@example.com','','Restaurant','New st.',NULL,25,0,52.674419,-8.648215,'',0),(64,'Fleur','Eaxample@.com','','Florist','Canal Rd.',NULL,120,0,52.672493,-8.668145,'',0),(76,'Nathan','Nathan@gmail.com','0df7229e66599b427dbc779ddc5dd4c77ee8c7f2','Hotel','Moylish',NULL,240,87123456,52.674786,-8.648040,'User',0),(77,'Best Bar Ever','BestBar@gmail.com','','bar','123 Main St',NULL,10,87123451,-37.123451,122.123451,'User',0),(94,'Al','Al@gmail.com','72c8f811a74616b5bf52f8deb27a0375db04ced4','Bar','Mountcollins, Abbeyfeale',NULL,150,87217443,52.319454,-9.235180,'User',1),(96,'UpperCuts','Uppercuts@gmail.com','a943dd0b0c7ce5c2e86cc16bf3a0219f51b8469a','Hairdresser','Plassey Park Rd.',NULL,13.5,353,52.671192,-8.555302,'User',1),(97,'make up by ann','Mua@abbey1@gmail','a1f5837035251e98bab6ddfab57ed505de2a87ee','Makeup artist','college road',NULL,1200,667145673,52.233894,-9.457864,'User',0);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `nameC` varchar(45) NOT NULL,
  `emailC` varchar(45) NOT NULL,
  `pinC` varchar(45) NOT NULL,
  `UserType` varchar(11) NOT NULL,
  `LoggedIn` int(1) NOT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `email_UNIQUE` (`emailC`),
  UNIQUE KEY `customerID_UNIQUE` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,' Keith ','keithabix007@gmail.com','7','',0),(11,'Brian','Brian@gmail.com','8d7ac0890921128d382ab5739ca9fca7cbbe8461','',1),(16,'Keith','Keith@gmail.com','2a9bd18dda48b3ee49042cbed828a7b4d230c9cf','User',0),(17,'Emma','Emma@gmail.com','a3ce704597bd8d929dee2a94d8a1b61b762913b8','User',0),(18,'Ava','Ava@gmail.com','830840a404e946013490850dea984d528d32abc0','User',0),(20,'Al','Al@gmail.com','72c8f811a74616b5bf52f8deb27a0375db04ced4','User',0),(22,'Test','Test@gmail.com','271789c50a60f83740189056003e09c4ec835156','User',0),(23,'ann marie murphy','am1968@gmail.com','aa4115e27de62ea1388cec1f221ef64f152cba80','User',0);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `star` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `idBusiness` int(11) NOT NULL,
  PRIMARY KEY (`ratingID`,`idCustomer`,`idBusiness`),
  UNIQUE KEY `ratingID_UNIQUE` (`ratingID`),
  KEY `fk_Rating_Customer1_idx` (`idCustomer`),
  KEY `fk_Rating_Business1_idx` (`idBusiness`),
  CONSTRAINT `fk_Rating_Business1` FOREIGN KEY (`idBusiness`) REFERENCES `business` (`businessID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rating_Customer1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'event_management_system'
--
/*!50003 DROP PROCEDURE IF EXISTS `admin_logged_in` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `admin_logged_in`(IN `email` VARCHAR(45))
BEGIN
UPDATE admin SET LoggedIn = 1 WHERE emailA = email;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `booking_business` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `booking_business`(IN `Date` VARCHAR(50), IN `customerID` VARCHAR(45), IN `businessID` VARCHAR(45))
BEGIN

INSERT INTO booking(date,idCustomer,idBusiness) VALUES ('Date','customerID','businessID');

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `business_logged_in` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `business_logged_in`(IN `email` VARCHAR(45))
BEGIN
UPDATE business SET LoggedIn = 1 WHERE emailB = email;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `business_map_details` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `business_map_details`(IN `email` VARCHAR(45))
BEGIN

SELECT address,telephone,type,price FROM business WHERE emailB= email;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `customer_logged_in` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_logged_in`(IN `email` VARCHAR(45))
BEGIN
UPDATE customer SET LoggedIn = 1 WHERE emailC = email;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `register_admin` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `register_admin`(IN `nameA` VARCHAR(45), IN `emailA` VARCHAR(45), IN `Pass` VARCHAR(200), IN `usertype` VARCHAR(45))
BEGIN

INSERT INTO admin(name,emailA,pinA,UserType) VALUES (nameA,emailA,Pass,usertype);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `register_business` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `register_business`(IN `nameB` VARCHAR(45), IN `emailB` VARCHAR(45), IN `pinB` VARCHAR(200), IN `Usertype` VARCHAR(45))
BEGIN
	INSERT INTO business (nameB,emailB,pinB,Usertype) VALUES (nameB,emailB,pinB,Usertype);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `register_customer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `register_customer`(IN `nameC` VARCHAR(45), IN `email` VARCHAR(45), IN `pin` VARCHAR(200), IN `UserType` VARCHAR(45))
BEGIN
	INSERT INTO customer(nameC,emailC,pinC,UserType) VALUES (nameC,email,pin,UserType);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-19  9:40:50
