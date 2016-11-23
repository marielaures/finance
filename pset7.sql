-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `symbol` varchar(20) NOT NULL,
  `share` int(11) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,32,'BUY','2016-09-10 19:22:22','FREE',3,0.00),(2,32,'BUY','2016-09-10 19:37:33','MSFT',3,0.00),(3,32,'SELL','2016-09-10 19:37:47','FB',1,0.00),(4,32,'BUY','2016-09-10 19:40:46','FB',2,0.00),(5,32,'BUY','2016-09-10 20:10:22','FB',1,0.00),(6,32,'BUY','2016-09-10 20:13:01','FREE',3,1.00),(7,32,'BUY','2016-09-10 20:15:25','FB',1,127.10),(8,32,'SELL','2016-09-10 20:16:35','MSFT',3,0.00),(9,32,'SELL','2016-09-10 20:23:35','FREE',3,1.15),(10,32,'SELL','2016-09-10 20:23:51','FB',4,127.10),(11,32,'BUY','2016-09-10 20:24:19','AAPL',30,103.13),(12,32,'BUY','2016-09-10 20:24:46','GOOG',3,759.66),(13,32,'BUY','2016-09-10 20:24:59','GOOG',3,759.66),(14,32,'BUY','2016-09-10 20:25:09','FB',12,127.10),(15,32,'BUY','2016-09-10 20:25:25','MSFT',3,56.21),(16,32,'BUY','2016-09-10 20:25:33','MSFT',2,56.21),(17,32,'BUY','2016-09-10 20:25:44','MSFT',1,56.21),(18,32,'BUY','2016-09-10 20:26:06','AAPL',1,103.13),(19,35,'BUY','2016-11-04 22:42:43','FB',1,120.75),(20,35,'BUY','2016-11-04 22:42:50','ABC',1,70.47),(21,35,'BUY','2016-11-04 22:43:00','FB',2,120.75);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`,`symbol`),
  KEY `user_id` (`user_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,1,'AAPL',73),(2,1,'MSFT',283),(3,26,'FB',29),(4,26,'GBR',298),(5,27,'PCMI',62),(6,31,'BAC',86),(11,9,'FREE',10),(15,32,'GOOG',7),(19,32,'AAPL',33),(20,31,'AAPL',24),(31,32,'FB',12),(32,32,'MSFT',6),(33,35,'FB',3),(34,35,'ABC',1);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe',10000.0000),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000),(9,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK',10000.0000),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000),(26,'marielaure','$2y$10$GrGeyj9ttheJwCodL.f1aeDmAh92G6R3OwYFBcmhOOdEzSLw56Hg6',10000.0000),(27,'yoyo','$2y$10$DMPns6u1FqxnemapKoP/JueAnhtYR4VJiyZs2s/9syeQzO4yarnzy',10000.0000),(28,'pikachu','$2y$10$h0UhuBPEjhS.Qi8Y2F1RiOz1.vXxPbj4KxW8befEY392V/9uAbyXC',10000.0000),(29,'Rondoudou','$2y$10$j9S/ojGjyS3.C/zS6EwS7O7Wspf33ZLlso//GKNSBRI0a9wt1K7v2',10000.0000),(30,'Aussie','$2y$10$SiRPDVCqma7yw5JUpoJHIOhCWFXd8yOZmYvkV8rHy1cb392RwtXTC',10000.0000),(31,'fleojr','$2y$10$1ml6Avhf5Lz3j7H1V.WvqeEGX2TaEmmTh2n1BoLSDQoUg/N1uGGKS',6229.4500),(32,'marielaure22','$2y$10$u9K/3iy3o3IxNxykrkonHuSgJK.YycYOF37oH20LqT0YC/LGX85da',78.1500),(34,'yoyodam','$2y$10$FSnYB2GuXa6jxDUZtWTpQ.P211I9W.kpe5M6x61Dj2lRswV2fNZEW',10253.0200),(35,'loulou','$2y$10$I5yVQ3uAKS04ajUa3VNyfO66jonHOJPNz.nt3Osggnp2kCoao7SKa',1000033.4000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-04 23:00:21
