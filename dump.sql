/*
SQLyog Ultimate v10.42 
MySQL - 5.5.41-log : Database - pearl
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=335 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`firstName`,`secondName`,`thirdName`,`phone`) values (3,'Петров','Игорь','Александрович','+7(934)578-88-23'),(4,'Гусев','Алекесей','Михайлович','+7(934)578-88-24'),(5,'Ляпунов','Александр','Владимирович','+79345788825'),(6,'Варламов','Виталий','Генадьевич','+79345788826'),(7,'Рудакво','Степан','Алексеевич','+79345788827'),(9,'Смирнов','Абрам','Александрович','+79162220000'),(10,'Иванов','Авдей','Адамович','+79162220003'),(11,'Кузнецов','Аггей','Анатольевич','+79162220006'),(12,'Соколов','Аким','Аркадьевич','+79162220009'),(13,'Попов','Альфред','Алексеевич','+79162220012'),(14,'Лебедев','Ананий','Андреевич','+79162220015'),(15,'Козлов','Андрей','Артемович','+79162220018'),(16,'Новиков','Аристарх','Альбертович','+79162220021'),(17,'Морозов','Арсений','Антонович','+79162220024'),(18,'Петров','Аскольд','Богданович','+79162220027'),(19,'Волков','Бежен','Богуславович','+79162220030'),(20,'Соловьёв','Богдан','Борисович','+79162220033'),(21,'Васильев','Вадим','Вадимович','+79162220036'),(22,'Зайцев','Василий','Васильевич','+79162220039'),(23,'Павлов','Викентий','Владимирович','+79162220042'),(24,'Семёнов','Виталий','Валентинович','+79162220045'),(25,'Голубев','Володар','Вениаминович','+79162220048'),(26,'Виноградов','Галактион','Вячеславович','+79162220051'),(27,'Богданов','Геннадий','Валерьевич','+79162220054'),(28,'Воробьёв','Герман','Викторович','+79162220057'),(29,'Фёдоров','Градимир','Геннадиевич','+79162220060'),(30,'Михайлов','Дамир','Георгиевич','+79162220063'),(31,'Беляев','Денис','Геннадьевич','+79162220066'),(32,'Тарасов','Дорофей','Григорьевич','+79162220069'),(33,'Белов','Евстафий','Давидович','+79162220072'),(34,'Комаров','Еремей','Денисович','+79162220075'),(35,'Орлов','Жан','Геннадьевич','+79162220078'),(36,'Киселёв','Иван','Данилович','+79162220081'),(37,'Макаров','Иннокентий','Дмитриевич','+79162220084'),(38,'Андреев','Клим','Евгеньевич','+79162220087'),(39,'Ковалёв','Лавр','Егорович','+79162220090'),(40,'Ильин','Леопольд','Ефимович','+79162220093'),(41,'Гусев','Марат','Иванович','+79162220096'),(42,'Титов','Митрофан','Ильич','+79162220099'),(43,'Кузьмин','Назар','Игоревич','+79162220102'),(44,'Кудрявцев','Никанор','Иосифович','+79162220105'),(45,'Баранов','Нифонт','Кириллович','+79162220108'),(46,'Куликов','Олесь','Константинович','+79162220111'),(47,'Алексеев','Павел','Леонидович','+79162220114'),(48,'Степанов','Ринат','Львович','+79162220117'),(49,'Яковлев','Роман','Макарович','+79162220120'),(50,'Сорокин','Семён','Максович','+79162220123'),(51,'Сергеев','Тигран','Миронович','+79162220126'),(52,'Романов','Устин','Максимович','+79162220129'),(53,'Захаров','Феодосий','Матвеевич','+79162220132'),(54,'Борисов','Флор','Михайлович','+79162220135'),(55,'Королёв','Фуад','Натанович','+79162220138'),(56,'Герасимов','Эдгар','Наумович','+79162220141'),(57,'Пономарёв','Эрик','Николаевич','+79162220144'),(58,'Григорьев','Юхим','Олегович','+79162220147'),(59,'Лазарев','Яромир','Оскарович','+79162220150'),(60,'Медведев','Аваз','Павлович','+79162220153'),(61,'Ершов','Авраам','Петрович','+79162220156'),(62,'Никитин','Адам','Олегович','+79162220159'),(63,'Соболев','Алан','Платонович','+79162220162'),(64,'Рябов','Амадей','Робертович','+79162220165'),(65,'Поляков','Анастасий','Ростиславович','+79162220168'),(66,'Цветков','Аникита','Рудольфович','+79162220171'),(67,'Данилов','Аркадий','Романович','+79162220174'),(68,'Жуков','Артем','Рубенович','+79162220177'),(69,'Фролов','Афанасий','Русланович','+79162220180'),(70,'Журавлёв','Бенедикт','Святославович','+79162220183'),(71,'Николаев','Болеслав','Сергеевич','+79162220186'),(72,'Крылов','Валентин','Степанович','+79162220189'),(73,'Максимов','Вацлав','Семенович','+79162220192'),(74,'Сидоров','Виктор','Станиславович','+79162220195'),(75,'Осипов','Витольд','Тарасович','+79162220198'),(76,'Белоусов','Вольдемар','Тимофеевич','+79162220201'),(77,'Федотов','Гарри','Тимурович','+79162220204'),(78,'Дорофеев','Генрих','Федорович','+79162220207'),(79,'Егоров','Глеб','Феликсович','+79162220210'),(80,'Матвеев','Григорий','Филиппович','+79162220213'),(81,'Бобров','Даниил','Харитонович','+79162220216'),(82,'Дмитриев','Джордан','Эдуардович','+79162220219'),(83,'Калинин','Евгений','Эмануилович','+79162220222'),(84,'Анисимов','Егор','Эльдарович','+79162220225'),(85,'Петухов','Ермолай','Юрьевич','+79162220228'),(86,'Антонов','Ждан','Юхимович','+79162220231'),(87,'Тимофеев','Игнатий','Яковлевич','+79162220234'),(88,'Никифоров','Иосиф','Ярославович','+79162220237'),(89,'Веселов','Кондрат','Александрович','+79162220240'),(90,'Филиппов','Лаврентий','Адамович','+79162220243'),(91,'Марков','Лука','Анатольевич','+79162220246'),(92,'Большаков','Марк','Аркадьевич','+79162220249'),(93,'Суханов','Михаил','Алексеевич','+79162220252'),(94,'Миронов','Назарий','Андреевич','+79162220255'),(95,'Ширяев','Никита','Артемович','+79162220258'),(96,'Александров','Норман','Альбертович','+79162220261'),(97,'Коновалов','Онисим','Антонович','+79162220264'),(98,'Шестаков','Петр','Богданович','+79162220267'),(99,'Казаков','Ричард','Богуславович','+79162220270'),(100,'Ефимов','Ростислав','Борисович','+79162220273'),(101,'Денисов','Серафим','Вадимович','+79162220276'),(102,'Громов','Тимофей','Васильевич','+79162220279'),(103,'Фомин','Фаддей','Владимирович','+79162220282'),(104,'Давыдов','Фердинанд','Валентинович','+79162220285'),(105,'Мельников','Флорентий','Вениаминович','+79162220288'),(106,'Щербаков','Харитон','Вячеславович','+79162220291'),(107,'Блинов','Эдуард','Валерьевич','+79162220294'),(108,'Колесников','Эрнест','Викторович','+79162220297'),(109,'Карпов','Яким','Геннадиевич','+79162220300'),(110,'Афанасьев','Ярослав','Георгиевич','+79162220303'),(111,'Власов','Аввакум','Геннадьевич','+79162220306'),(112,'Маслов','Автандил','Григорьевич','+79162220309'),(113,'Исаков','Адис','Давидович','+79162220312'),(114,'Тихонов','Александр','Денисович','+79162220315'),(115,'Аксёнов','Амадеус','Федорович','+79162220318'),(116,'Гаврилов','Анатолий','Данилович','+79162220321'),(117,'Родионов','Антон','Дмитриевич','+79162220324'),(118,'Котов','Арно','Евгеньевич','+79162220327'),(119,'Горбунов','Артемий','Егорович','+79162220330'),(120,'Кудряшов','Ахмет','Ефимович','+79162220333'),(121,'Быков','Берек','Иванович','+79162220336'),(122,'Зуев','Борис','Ильич','+79162220339'),(123,'Третьяков','Валерий','Игоревич','+79162220342'),(124,'Савельев','Велизар','Иосифович','+79162220345'),(125,'Панов','Вилли','Кириллович','+79162220348'),(126,'Рыбаков','Владимир','Константинович','+79162220351'),(127,'Суворов','Всеволод','Леонидович','+79162220354'),(128,'Абрамов222','Гастон','Львович','+7 (916) 222-03-57'),(129,'Воронов','Георгий','Макарович','+79162220360'),(130,'Мухин','Гордей','Максович','+79162220363'),(131,'Архипов','Гурий','Миронович','+79162220366'),(132,'Трофимов','Дементий','Максимович','+79162220369'),(133,'Мартынов','Дмитрий','Матвеевич','+79162220372'),(134,'Емельянов','Евграф','Михайлович','+79162220375'),(135,'Горшков','Елеазар','Натанович','+79162220378'),(136,'Чернов','Ерофей','Наумович','+79162220381'),(137,'Овчинников','Жорж','Николаевич','+79162220384'),(138,'Селезнёв','Игорь','Олегович','+79162220387'),(139,'Панфилов','Ипполит','Оскарович','+79162220390'),(140,'Копылов','Константин','Павлович','+79162220393'),(141,'Михеев','Лев','Петрович','+79162220396'),(142,'Галкин','Лукьян','Оскарович','+79162220399'),(143,'Назаров','Мартин','Платонович','+79162220402'),(144,'Лобанов','Михей','Робертович','+79162220405'),(145,'Лукин','Натан','Ростиславович','+79162220408'),(146,'Беляков','Никифор','Рудольфович','+79162220411'),(147,'Потапов','Овидий','Романович','+79162220414'),(148,'Некрасов','Орест','Рубенович','+79162220417'),(149,'Хохлов','Платон','Русланович','+79162220420'),(150,'Жданов','Роберт','Святославович','+79162220423'),(151,'Наумов','Рудольф','Сергеевич','+79162220426'),(152,'Шилов','Сергей','Степанович','+79162220429'),(153,'Воронцов','Тимур','Семенович','+79162220432'),(154,'Ермаков','Федор','Станиславович','+79162220435'),(155,'Дроздов','Фидель','Тарасович','+79162220438'),(156,'Игнатьев','Фома','Тимофеевич','+79162220441'),(157,'Савин','Христиан','Тимурович','+79162220444'),(158,'Логинов','Эльдар','Федорович','+79162220447'),(159,'Сафонов','Юлиан','Феликсович','+79162220450'),(160,'Капустин','Яков','Филиппович','+79162220453'),(161,'Кириллов','Ясон','Харитонович','+79162220456'),(162,'Моисеев','Август','Эдуардович','+79162220459'),(163,'Елисеев','Агап','Эмануилович','+79162220462'),(164,'Кошелев','Адольф','Эльдарович','+79162220465'),(165,'Костин','Алексей','Юрьевич','+79162220468'),(166,'Горбачёв','Амаяк','Юхимович','+79162220471'),(167,'Орехов','Ангел','Яковлевич','+79162220474'),(168,'Ефремов','Арам','Ярославович','+79162220477'),(169,'Исаев','Арнольд','Филиппович','+79162220480'),(170,'Евдокимов','Артур','Александрович','+79162220483'),(171,'Калашников','Ашот','Адамович','+79162220486'),(172,'Кабанов','Бернард','Анатольевич','+79162220489'),(173,'Носков','Бронислав','Аркадьевич','+79162220492'),(174,'Юдин','Вальтер','Алексеевич','+79162220495'),(175,'Кулагин','Венедикт','Андреевич','+79162220498'),(176,'Лапин','Вильгельм','Артемович','+79162220501'),(177,'Прохоров','Владислав','Альбертович','+79162220504'),(178,'Нестеров','Вячеслав','Антонович','+79162220507'),(179,'Харитонов','Гаяс','Богданович','+79162220510'),(180,'Агафонов','Геральд','Богуславович','+79162220513'),(181,'Муравьёв','Гордон','Борисович','+79162220516'),(182,'Ларионов','Густав','Вадимович','+79162220519'),(183,'Федосеев','Демид','Васильевич','+79162220522'),(184,'Зимин','Дональд','Владимирович','+79162220525'),(185,'Пахомов','Евдоким','Валентинович','+79162220528'),(186,'Шубин','Елисей','Вениаминович','+79162220531'),(187,'Игнатов','Ефим','Вячеславович','+79162220534'),(188,'Филатов','Захар','Валерьевич','+79162220537'),(189,'Крюков','Илларион','Викторович','+79162220540'),(190,'Рогов','Карл','Геннадиевич','+79162220543'),(191,'Кулаков','Корней','Георгиевич','+79162220546'),(192,'Терентьев','Леонид','Геннадьевич','+79162220549'),(193,'Молчанов','Макар','Григорьевич','+79162220552'),(194,'Владимиров','Матвей','Давидович','+79162220555'),(195,'Артемьев','Мстислав','Денисович','+79162220558'),(196,'Гурьев','Наум','Геннадьевич','+79162220561'),(197,'Зиновьев','Николай','Данилович','+79162220564'),(198,'Гришин','Олан','Дмитриевич','+79162220567'),(199,'Кононов','Осип','Евгеньевич','+79162220570'),(200,'Дементьев','Прохор','Егорович','+79162220573'),(201,'Ситников','Родион','Ефимович','+79162220576'),(202,'Симонов','Савва','Иванович','+79162220579'),(203,'Мишин','Степан','Ильич','+79162220582'),(204,'Фадеев','Тихон','Игоревич','+79162220585'),(205,'Комиссаров','Федот','Иосифович','+79162220588'),(206,'Мамонтов','Филимон','Кириллович','+79162220591'),(207,'Носов','Франц','Константинович','+79162220594'),(208,'Гуляев','Христос','Леонидович','+79162220597'),(209,'Шаров','Эмиль','Львович','+79162220600'),(210,'Устинов','Юлий','Макарович','+79162220603'),(211,'Вишняков','Ян','Максович','+79162220606'),(212,'Евсеев','Дементий','Миронович','+79162220609'),(213,'Лаврентьев','Дмитрий','Максимович','+79162220612'),(214,'Брагин','Евграф','Матвеевич','+79162220615'),(215,'Константинов','Елеазар','Михайлович','+79162220618'),(216,'Корнилов','Ерофей','Натанович','+79162220621'),(217,'Авдеев','Жорж','Наумович','+79162220624'),(218,'Зыков','Игорь','Николаевич','+79162220627'),(219,'Бирюков','Ипполит','Олегович','+79162220630'),(220,'Шарапов','Константин','Оскарович','+79162220633'),(221,'Никонов','Лев','Павлович','+79162220636'),(222,'Щукин','Лукьян','Петрович','+79162220639'),(223,'Дьячков','Мартин','Олегович','+79162220642'),(224,'Одинцов','Михей','Платонович','+79162220645'),(225,'Сазонов','Натан','Робертович','+7(916)222-06-48'),(226,'Якушев','Никифор','Ростиславович','+79162220651'),(227,'Красильников','Овидий','Рудольфович','+7 (926) 342-78-84'),(228,'Гордеев','Орест','Романович','+79162220657'),(229,'Самойлов','Платон','Рубенович','+79162220660'),(230,'Князев','Роберт','Русланович','+79162220663'),(231,'Беспалов','Рудольф','Святославович','+79162220666'),(232,'Уваров','Сергей','Сергеевич','+79162220669'),(233,'Шашков','Тимур','Степанович','+79162220672'),(234,'Бобылёв','Федор','Семенович','+79162220675'),(235,'Доронин','Фидель','Станиславович','+79162220678'),(236,'Белозёров','Фома','Тарасович','+79162220681'),(237,'Рожков','Христиан','Тимофеевич','+79162220684'),(238,'Самсонов','Эльдар','Тимурович','+79162220687'),(239,'Мясников','Юлиан','Федорович','+79162220690'),(240,'Лихачёв','Яков','Феликсович','+79162220693'),(241,'Буров','Ясон','Филиппович','+79162220696'),(242,'Сысоев','Август','Харитонович','+79162220699'),(243,'Фомичёв','Агап','Эдуардович','+79162220702'),(244,'Русаков','Адольф','Эмануилович','+79162220705'),(245,'Стрелков','Алексей','Эльдарович','+79162220708'),(246,'Гущин','Амаяк','Юрьевич','+79162220711'),(247,'Тетерин','Ангел','Юхимович','+79162220714'),(248,'Колобов','Арам','Яковлевич','+79162220717'),(249,'Субботин','Арнольд','Ярославович','+79162220720'),(250,'Фокин','Артур','Александрович','+79162220723'),(251,'Блохин','Ашот','Адамович','+79162220726'),(252,'Селиверстов','Бернард','Анатольевич','+79162220729'),(253,'Пестов','Бронислав','Аркадьевич','+79162220732'),(254,'Кондратьев','Вальтер','Алексеевич','+79162220735'),(255,'Силин','Венедикт','Андреевич','+79162220738'),(256,'Меркушев','Вильгельм','Артемович','+79162220741'),(257,'Лыткин','Владислав','Альбертович','+79162220744'),(258,'Туров','Вячеслав','Антонович','+79162220747'),(331,'Филиппов','Александр','Михайлович','+79273427884'),(332,'Филиппов','Александр','Михайлович','+79273427884'),(333,'Филиппов','123','123','123'),(334,'Филиппов','Александр','Александрович','+79263427884');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `managers` */

insert  into `managers`(`id`,`managerName`,`managerPhone`,`email`,`password`,`access`) values (1,'Администратор','','admin@','123456',100);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`,`fullUsername`,`companyId`,`managerId`,`access`,`name`) values (1,'admin@','Z53X-rw_-gsUwUKqB-69oigUMS_Ku6Ks','$2y$13$WLmBJmdTnv6pbt7JHdViEum1LFgtS6/sMNO3MAae7fJOT.sWC0vKK',NULL,'admin@',10,1445343845,1445365045,'Администратор','Администратор',NULL,1,100,NULL),(10,'ilona.r@orosmedical.ru','Y3QZ2SlgjKouhfeEhToLH7XPo4GSVHzu','$2y$13$29mLM8l/CLljPKzxNfHfAuWAcMG4o3R0WiD.LL08Y32SBLN9YM8da',NULL,'ilona.r@orosmedical.ru',10,1445427477,1445428894,'Менеджер','Репрынцева Илона Александровна',NULL,3,10,NULL),(11,'pustovalov@orosmedical.ru','V9ZV6Etp7aA3JxTX6-dja7VBvJjSLXUJ','$2y$13$/gbkfAugkQ.TCwe1udrmuegDE1jZEEmm8YTqjS1XYbWwc/FbMe2dG',NULL,'pustovalov@orosmedical.ru',10,1445429007,1445429007,'Менеджер','Пустовалов Павел Игоревич',NULL,4,10,NULL),(12,'kamenev@orosmedical.ru','CM0K8yivJbrPaE390Y6K07a2d1JtaW50','$2y$13$BSKJdyVKj.TRL5gfzu3aiudl8KFwoVvd2Cs2k2ZWnOVwVTSLP2JsG',NULL,'kamenev@orosmedical.ru',10,1445445885,1445445885,'Менеджер','Каменев Александр',NULL,5,10,NULL),(13,'ххх','h8ZJbJ9i7yZcXckHyTinoxubH9u5tIcH','$2y$13$KJG0qYAR/TdW1EZpvmp4kuRgVajSL8tuDjw7pTOCVRaYQ5sm1Y5YO',NULL,'ххх',10,1445446208,1445446208,'Пользователь','',3,NULL,0,NULL),(14,'ччч','xW9NtgwDH3SaQ-ZSq28WO2o5ayNrMg_d','$2y$13$iblHNjVPEFRRmfnpYjWftO5MKMFO6RU.ME8AVkAEle415AL4/7dfC',NULL,'ччч',10,1445455102,1445455102,'Пользователь','',4,NULL,0,NULL),(15,'homeclinics','a01Q2RBN0FF3P2K79O9doXhD9YC-x1a_','$2y$13$J2thzX4UDGRZKQi56sVon.LSiuDpQIkqtXee3oUKgoAktBO2lOc6C',NULL,'homeclinics',10,1445509727,1445509727,'Пользователь','',5,NULL,0,NULL),(16,'Aksis','qO6vZZWK-DzGFl6oBa5X-s181FlheYqF','$2y$13$ADhroSo7gCsOHRcJp4QZvOsKW7FwVMoKaez2AgP96QYnOM1YzIy/e',NULL,'Aksis',10,1445512201,1445512201,'Пользователь','',6,NULL,0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
