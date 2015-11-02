/*
SQLyog Ultimate v10.42 
MySQL - 5.5.38-log : Database - pearl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `secondName` varchar(255) NOT NULL,
  `thirdName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phoneHome` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`firstName`,`secondName`,`thirdName`,`phone`,`phoneHome`,`fullName`) values (1,'Филиппов','Александр','Михайлович','+7 (926) 342-78-84','','Филиппов Александр Михайлович');

/*Table structure for table `managers` */

DROP TABLE IF EXISTS `managers`;

CREATE TABLE `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `managerName` varchar(255) NOT NULL,
  `managerPhone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `managers` */

insert  into `managers`(`id`,`managerName`,`managerPhone`,`email`,`password`,`access`) values (1,'Администратор','','admin@','123456',100),(2,'Филиппов','123','fill@','123456',10);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1442227820),('m130524_201442_init',1442227825);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientId` int(11) DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `number` int(11) DEFAULT NULL,
  `typeId` int(11) DEFAULT NULL,
  `pointId` int(11) DEFAULT NULL,
  `managerId` int(11) DEFAULT NULL,
  `statusId` int(11) DEFAULT NULL,
  `outDate` date DEFAULT NULL,
  `costTotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`clientId`,`cost`,`paid`,`date`,`number`,`typeId`,`pointId`,`managerId`,`statusId`,`outDate`,`costTotal`) values (1,1,900.00,0.00,'2015-11-01',8,1,4,1,1,'2015-11-01',630.00),(2,1,123.00,123.00,'2015-11-01',8898,1,1,1,1,'2015-11-01',123.00);

/*Table structure for table `point` */

DROP TABLE IF EXISTS `point`;

CREATE TABLE `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `point` */

insert  into `point`(`id`,`label`,`discount`) values (1,'Промагро основной',0),(2,'Дружба Старый Оскол',25),(3,'Княжна Губкин',30),(4,'Чернянка',30);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `status` */

insert  into `status`(`id`,`label`) values (1,'Вещь в цеху'),(2,'Вещь на выдаче'),(3,'Завершено');

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `type` */

insert  into `type`(`id`,`label`) values (1,'Костюмная группа'),(2,'Пальтовая группа'),(3,'Текстильная группа'),(4,'Чистка кожи и меха'),(5,'Подушки и одеяла'),(6,'Покраска кожи'),(7,'Чистка Ковров'),(8,'Чистка мебели');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullUsername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyId` int(11) DEFAULT NULL,
  `managerId` int(11) DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`,`fullUsername`,`companyId`,`managerId`,`access`,`name`) values (1,'admin@','Z53X-rw_-gsUwUKqB-69oigUMS_Ku6Ks','$2y$13$WLmBJmdTnv6pbt7JHdViEum1LFgtS6/sMNO3MAae7fJOT.sWC0vKK',NULL,'admin@',10,1445343845,1445365045,'Администратор','Администратор',NULL,1,100,NULL),(10,'ilona.r@orosmedical.ru','Y3QZ2SlgjKouhfeEhToLH7XPo4GSVHzu','$2y$13$29mLM8l/CLljPKzxNfHfAuWAcMG4o3R0WiD.LL08Y32SBLN9YM8da',NULL,'ilona.r@orosmedical.ru',10,1445427477,1445428894,'Менеджер','Репрынцева Илона Александровна',NULL,3,10,NULL),(11,'pustovalov@orosmedical.ru','V9ZV6Etp7aA3JxTX6-dja7VBvJjSLXUJ','$2y$13$/gbkfAugkQ.TCwe1udrmuegDE1jZEEmm8YTqjS1XYbWwc/FbMe2dG',NULL,'pustovalov@orosmedical.ru',10,1445429007,1445429007,'Менеджер','Пустовалов Павел Игоревич',NULL,4,10,NULL),(12,'kamenev@orosmedical.ru','CM0K8yivJbrPaE390Y6K07a2d1JtaW50','$2y$13$BSKJdyVKj.TRL5gfzu3aiudl8KFwoVvd2Cs2k2ZWnOVwVTSLP2JsG',NULL,'kamenev@orosmedical.ru',10,1445445885,1445445885,'Менеджер','Каменев Александр',NULL,5,10,NULL),(13,'ххх','h8ZJbJ9i7yZcXckHyTinoxubH9u5tIcH','$2y$13$KJG0qYAR/TdW1EZpvmp4kuRgVajSL8tuDjw7pTOCVRaYQ5sm1Y5YO',NULL,'ххх',10,1445446208,1445446208,'Пользователь','',3,NULL,0,NULL),(14,'ччч','xW9NtgwDH3SaQ-ZSq28WO2o5ayNrMg_d','$2y$13$iblHNjVPEFRRmfnpYjWftO5MKMFO6RU.ME8AVkAEle415AL4/7dfC',NULL,'ччч',10,1445455102,1445455102,'Пользователь','',4,NULL,0,NULL),(15,'homeclinics','a01Q2RBN0FF3P2K79O9doXhD9YC-x1a_','$2y$13$J2thzX4UDGRZKQi56sVon.LSiuDpQIkqtXee3oUKgoAktBO2lOc6C',NULL,'homeclinics',10,1445509727,1445509727,'Пользователь','',5,NULL,0,NULL),(16,'Aksis','qO6vZZWK-DzGFl6oBa5X-s181FlheYqF','$2y$13$ADhroSo7gCsOHRcJp4QZvOsKW7FwVMoKaez2AgP96QYnOM1YzIy/e',NULL,'Aksis',10,1445512201,1445512201,'Пользователь','',6,NULL,0,NULL),(17,'fill@','ZdFjvLvsRLv_INWVKpOROAREgHYft-L7','$2y$13$LHbvrLNPHu9rwY8vK/ms9epCGc/gnFq4k5lvIjAzJgGWqmSVTSH6y',NULL,'fill@',10,1446321349,1446321349,'Менеджер','Филиппов',NULL,2,10,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
