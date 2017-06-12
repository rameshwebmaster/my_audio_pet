/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.17 : Database - db_jonny
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_jonny` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_jonny`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id`,`username`,`password`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `over_18` enum('Y','N') NOT NULL DEFAULT 'N',
  `under_18` enum('Y','N') NOT NULL DEFAULT 'N',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `have_pet` varchar(100) DEFAULT NULL,
  `pet_name` varchar(50) DEFAULT NULL,
  `line_1` varchar(255) DEFAULT NULL,
  `line_2` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(80) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `is_subscribed` enum('Y','N') DEFAULT 'N',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`over_18`,`under_18`,`first_name`,`last_name`,`have_pet`,`pet_name`,`line_1`,`line_2`,`city`,`state`,`zip_code`,`country`,`email_address`,`phone_number`,`is_subscribed`,`created_at`) values (1,'N','Y','Amin','Shah','Boom Bear','Puppy','testing address line 1','','Berlin','NYC','654855','United States','nyc@google.com','65465','Y','2017-02-07 06:59:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
