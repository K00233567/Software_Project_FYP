CREATE DATABASE  IF NOT EXISTS `event_management_system` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `event_management_system`;
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
  `idAdmin` int(11) NOT NULL,
  `pinA` int(11) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `idBusiness` int(11) NOT NULL,
  PRIMARY KEY (`bookingID`,`idCustomer`,`idBusiness`),
  UNIQUE KEY `bookingID_UNIQUE` (`bookingID`),
  KEY `fk_Booking_Customer1_idx` (`idCustomer`),
  KEY `fk_Booking_Business1_idx` (`idBusiness`),
  CONSTRAINT `fk_Booking_Business1` FOREIGN KEY (`idBusiness`) REFERENCES `business` (`businessID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Booking_Customer1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `businessID` int(11) NOT NULL,
  `nameB` varchar(45) NOT NULL,
  `emailB` varchar(45) NOT NULL,
  `pinB` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `locationB` float NOT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`businessID`),
  UNIQUE KEY `businessID_UNIQUE` (`businessID`),
  UNIQUE KEY `emailB_UNIQUE` (`emailB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `nameC` varchar(45) NOT NULL,
  `emailC` varchar(45) NOT NULL,
  `pinC` int(11) NOT NULL,
  `locationC` float NOT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `email_UNIQUE` (`emailC`),
  UNIQUE KEY `customerID_UNIQUE` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (123,'Keith','96Kmurphy@gmail.com',0,52.3451),(365,'Ann marie Murphy','murphyannmarie@gmail.com',1111,52.3451);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `ratingID` int(11) NOT NULL,
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-10 20:16:12
