/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 8.0.22 : Database - gistsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gistsdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `gistsdb`;

/*Table structure for table `gist` */

DROP TABLE IF EXISTS `gist`;

CREATE TABLE `gist` (
  `gist_id` bigint NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `author_id` bigint NOT NULL,
  PRIMARY KEY (`gist_id`),
  KEY `AUTHOR_FK` (`author_id`),
  CONSTRAINT `AUTHOR_FK` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `gist` */

insert  into `gist`(`gist_id`,`url`,`filename`,`author_id`) values 
(1,'\"http://random.org/random/url/1\"','Prvi gist',1),
(3,'\"http://random.org/random/url/3\"','Treci gist',2),
(4,'\"\"http://random.org/random/url/4\"','4th gist',1),
(5,'\"\"http://random.org/random/url/5\"','Peti gist',2),
(6,'asdasdsad','asdasdasd',2);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`name`,`surname`,`username`) values 
(1,'Ognjen','Simic','oglisa99'),
(2,'Milan','Petrovic','mpetrovic');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
