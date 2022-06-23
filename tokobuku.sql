/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - tokobuku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokobuku` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tokobuku`;

/*Table structure for table `auth_activation_attempts` */

DROP TABLE IF EXISTS `auth_activation_attempts`;

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_activation_attempts` */

/*Table structure for table `auth_groups` */

DROP TABLE IF EXISTS `auth_groups`;

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups` */

insert  into `auth_groups`(`id`,`name`,`description`) values 
(1,'Admin',''),
(2,'Karyawan','');

/*Table structure for table `auth_groups_permissions` */

DROP TABLE IF EXISTS `auth_groups_permissions`;

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_permissions` */

insert  into `auth_groups_permissions`(`group_id`,`permission_id`) values 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,12),
(1,13),
(1,14),
(2,1),
(2,2),
(2,4),
(2,9);

/*Table structure for table `auth_groups_users` */

DROP TABLE IF EXISTS `auth_groups_users`;

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_users` */

insert  into `auth_groups_users`(`group_id`,`user_id`) values 
(1,1),
(1,6),
(2,2),
(2,3),
(2,4),
(2,5);

/*Table structure for table `auth_logins` */

DROP TABLE IF EXISTS `auth_logins`;

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `auth_logins` */

insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values 
(1,'::1','admin@mail.com',1,'2022-04-09 12:19:20',1),
(2,'::1','admin@mail.com',1,'2022-04-12 10:17:58',1),
(3,'::1','kianom@mail.com',2,'2022-04-12 10:49:51',1),
(4,'::1','kianom@mail.com',2,'2022-04-12 10:57:58',1),
(5,'::1','admin@mail.com',1,'2022-04-12 10:58:16',1),
(6,'::1','kianom@mail.com',2,'2022-04-12 10:59:02',1),
(7,'::1','admin@mail.com',1,'2022-04-12 11:05:01',1),
(8,'::1','kianom@mail.com',2,'2022-04-12 11:10:03',1),
(9,'::1','dharma@mail.com',3,'2022-04-12 11:21:29',1),
(10,'::1','dharma@mail.com',3,'2022-04-12 11:23:34',1),
(11,'::1','dharma@mail.com',3,'2022-04-12 11:24:47',1),
(12,'::1','kianom@mail.com',2,'2022-04-12 11:25:17',1),
(13,'::1','dharma@mail.com',3,'2022-04-12 11:25:26',1),
(14,'::1','dharma@mail.com',3,'2022-04-12 11:26:56',1),
(15,'::1','kianom@mail.com',2,'2022-04-12 11:27:27',1),
(16,'::1','dharma@mail.com',3,'2022-04-12 11:28:50',1),
(17,'::1','admin@mail.com',1,'2022-04-13 09:57:53',1),
(18,'::1','admin@mail.com',1,'2022-04-13 10:34:32',1),
(19,'::1','minato@mail.com',5,'2022-04-13 11:19:59',1),
(20,'::1','agus@mail.com',4,'2022-04-13 11:20:21',1),
(21,'::1','admin@mail.com',1,'2022-04-13 11:20:34',1),
(22,'::1','admin@mail.com',1,'2022-04-13 11:22:54',1),
(23,'::1','naruto@mail.com',6,'2022-04-13 11:36:06',1),
(24,'::1','admin@mail.com',1,'2022-04-13 11:36:19',1),
(25,'::1','admin@mail.com',1,'2022-04-21 10:14:24',1),
(26,'::1','admin@mail.com',1,'2022-04-21 10:28:51',1),
(27,'::1','administrator@mail.com',1,'2022-04-21 12:14:34',1),
(28,'::1','administrator@mail.com',1,'2022-04-24 03:39:20',1),
(29,'::1','administrator@mail.com',1,'2022-04-24 03:42:41',1),
(30,'::1','administrator@mail.com',1,'2022-04-26 09:01:25',1),
(31,'::1','administrator@mail.com',1,'2022-04-27 08:24:41',1),
(32,'::1','administrator@mail.com',1,'2022-05-08 10:09:12',1),
(33,'::1','administrator@mail.com',1,'2022-05-08 10:24:50',1),
(34,'::1','administrator@mail.com',1,'2022-05-08 11:00:03',1),
(35,'::1','administrator@mail.com',1,'2022-05-09 09:44:15',1),
(36,'::1','administrator@mail.com',1,'2022-05-10 09:32:41',1);

/*Table structure for table `auth_permissions` */

DROP TABLE IF EXISTS `auth_permissions`;

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `auth_permissions` */

insert  into `auth_permissions`(`id`,`name`,`description`) values 
(1,'beranda','Menu Beranda'),
(2,'data-buku','Menu Data Buku'),
(3,'tambah-buku','Tambah Data Buku'),
(4,'detail-buku','Detail Data Buku'),
(5,'ubah-buku','Ubah Data Buku'),
(6,'hapus-buku','Hapus Data Buku'),
(7,'data-galeri','Menu Data Galeri'),
(8,'data-customer','Menu Data Customer'),
(9,'data-supplier','Menu Data Supplier'),
(10,'data-users','List Data Users'),
(11,'tambah-users','Tambah Data User'),
(12,'edit-users','Edit Data User'),
(13,'hapus-users','Hapus Data User'),
(14,'reset-password','Reset Password User');

/*Table structure for table `auth_reset_attempts` */

DROP TABLE IF EXISTS `auth_reset_attempts`;

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_reset_attempts` */

/*Table structure for table `auth_tokens` */

DROP TABLE IF EXISTS `auth_tokens`;

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_tokens` */

/*Table structure for table `auth_users_permissions` */

DROP TABLE IF EXISTS `auth_users_permissions`;

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_users_permissions` */

insert  into `auth_users_permissions`(`user_id`,`permission_id`) values 
(3,8);

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `release_year` smallint(4) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `book_category_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `book` */

insert  into `book`(`book_id`,`title`,`slug`,`release_year`,`author`,`price`,`discount`,`stock`,`cover`,`book_category_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mencari Cahaya 2','mencari-cahaya-2',2022,'Ki Anom',100000,12.00,996,'1647962713_b69a58daab84d41cb7da.jpg',1,'2022-03-10 16:14:00','2022-05-10 10:51:24',NULL),
(2,'Sang Pejuang','sang-pejuang',2015,'Anom Suroto',55000,0.00,50,'',1,'2022-03-10 16:17:18','2022-03-17 08:09:57','2022-03-17 08:09:57'),
(3,'Sejarah Indonesia','sejarah-indonesia',2010,'M. Yamin',100000,0.00,70,'',4,'2022-03-10 16:17:18','2022-03-17 08:07:40','2022-03-17 08:07:40'),
(4,'1','1',0,'1',1,1.00,1,'',0,'2022-03-13 04:04:05','2022-03-13 04:04:05',NULL),
(5,'2','2',0,'2',2,2.00,2,'',0,'2022-03-13 04:09:04','2022-03-13 04:09:04',NULL),
(6,'2','2',0,'2',2,2.00,2,'',0,'2022-03-13 04:09:40','2022-03-13 04:09:40',NULL),
(14,'Hujan Tanpa Pelangi','hujan-tanpa-pelangi',2006,'Suroto',105000,0.00,100,'1647962230_e40abdadf1ff256e9804.jpg',1,'2022-03-21 10:36:30','2022-03-22 10:23:33','2022-03-22 10:23:33'),
(15,'Habis gelap Terbitlah Terang','habis-gelap-terbitlah-terang',1995,'kartini',50000,0.00,97,'1DDFE633-2B85-468D-B28D05ADAE7D1AD8_source.webp',3,'2022-03-21 10:39:07','2022-05-10 10:51:24',NULL),
(16,'Naruto','naruto',2000,'Masasi Kisimoto',45000,10.00,997,'1647877278_8cacc637b9f367beaaf4.webp',2,'2022-03-21 10:41:18','2022-05-10 10:51:24',NULL),
(17,'Dragon Ball','dragon-ball',1995,'Masasi Kisimoto',20000,0.00,50,'1647877915_3bf6843f263b2c91d3be.png',2,'2022-03-21 10:51:55','2022-03-22 10:23:11','2022-03-22 10:23:11'),
(18,'Matematika','matematika',2013,'Kisman',100000,0.00,98,'default.png',3,'2022-03-21 10:52:48','2022-05-10 10:40:31',NULL),
(19,'','',1,'a',1,1.00,1,'default.png',3,'2022-03-28 08:09:08','2022-03-28 08:09:08',NULL),
(20,'3','3',0,'',0,0.00,0,'default.png',3,'2022-03-28 08:15:32','2022-03-28 08:15:32',NULL),
(21,'4','4',0,'',0,0.00,0,'default.png',3,'2022-03-28 08:20:46','2022-03-28 08:20:46',NULL);

/*Table structure for table `book_category` */

DROP TABLE IF EXISTS `book_category`;

CREATE TABLE `book_category` (
  `book_category_id` int(5) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(50) NOT NULL,
  PRIMARY KEY (`book_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `book_category` */

insert  into `book_category`(`book_category_id`,`name_category`) values 
(1,'Novel'),
(2,'Comik'),
(3,'Buku Pelajaran'),
(4,'Buku Sejarah'),
(5,'Majalah');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `no_customer` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`name`,`no_customer`,`gender`,`address`,`email`,`phone`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Almira Hafshah Widiastuti','8205516008939001','L','Dk. Padma No. 745, Tual 72919, Babel','farida.ghaliyati@gmail.com','027 2839 095','1986-09-14 22:45:50','1985-06-13 06:39:30',NULL),
(2,'Jefri Heryanto Wasita','9212982506026282','L','Dk. Sudiarto No. 483, Bogor 91155, NTB','apertiwi@gmail.co.id','0657 4382 505','1974-08-26 17:01:27','1976-10-12 17:27:48',NULL),
(3,'Soleh Nainggolan','1172006104069589','L','Psr. Baik No. 135, Metro 26888, Jatim','rsimbolon@tarihoran.web.id','(+62) 461 6674 875','1973-12-18 19:11:13','2010-11-16 06:03:01',NULL),
(4,'Irma Purnawati','1673744801988855','L','Kpg. Bagonwoto  No. 266, Pontianak 28972, Kepri','gamani55@gmail.com','(+62) 678 5555 542','2015-09-27 12:59:41','1987-05-20 00:55:30',NULL),
(5,'Anastasia Laksmiwati','3171852011102982','L','Kpg. Baranangsiang No. 112, Tanjungbalai 12333, Jatim','vsihombing@yahoo.co.id','0321 7526 879','1987-06-15 05:34:11','1991-08-01 22:19:55',NULL),
(6,'Taswir Tamba','5321821809152776','L','Psr. Wahid Hasyim No. 757, Mataram 34558, Jateng','dadi.hidayat@utami.web.id','0835 818 315','1990-01-18 10:21:25','2004-01-13 11:04:15',NULL),
(7,'Elma Gabriella Hasanah','3505735001095395','L','Psr. Sampangan No. 699, Samarinda 93154, Lampung','marsito.simanjuntak@yahoo.com','(+62) 279 2294 511','2006-06-09 13:49:23','1983-08-27 19:15:54',NULL),
(8,'Eka Mayasari S.Sos','5301886911067958','L','Ds. Baranang Siang No. 182, Prabumulih 18231, Kaltim','bsirait@yahoo.com','0507 7660 0115','1986-05-24 08:58:56','1972-05-21 00:26:11',NULL),
(9,'Hasta Permadi','3306383107117105','L','Jr. Rajawali Timur No. 506, Batu 49605, Sulbar','gasti.pradana@gmail.co.id','(+62) 669 6622 7146','2021-07-18 18:48:26','2018-01-05 09:51:39',NULL),
(10,'Prasetya Narpati','3301256312982374','L','Gg. Bakaru No. 533, Administrasi Jakarta Pusat 88819, Sulbar','martana.firgantoro@simanjuntak.in','0791 2759 819','2021-11-30 04:04:48','2008-11-21 09:17:24',NULL),
(11,'Jabal Cawisadi Adriansyah M.Pd','7206800710219117','L','Kpg. Basuki Rahmat  No. 359, Madiun 89928, Kaltim','jayeng86@hassanah.tv','0515 0517 862','2011-12-21 22:46:23','2019-05-08 17:22:13',NULL),
(12,'Silvia Nasyidah','7305107007953478','L','Dk. Cokroaminoto No. 377, Cilegon 28072, Aceh','kusmawati.putu@gmail.co.id','0595 4828 2910','1988-07-03 14:43:12','1986-11-30 14:09:21',NULL),
(13,'Warsita Ardianto','3571826512994026','L','Ki. Rumah Sakit No. 736, Surabaya 83936, Lampung','rahmawati.sarah@lailasari.id','0218 7689 470','2002-07-29 22:08:10','1998-07-09 11:36:30',NULL),
(14,'Puspa Riyanti','3201562201077491','L','Gg. Kyai Gede No. 782, Padangpanjang 67491, Kaltim','bella90@yahoo.co.id','0876 7603 400','1983-12-19 05:35:04','1982-02-28 21:20:22',NULL),
(15,'Citra Mandasari','9202222407042399','L','Jr. Thamrin No. 19, Sibolga 18344, Sultra','wulandari.fathonah@pradana.asia','0511 8577 3685','1995-04-18 05:52:05','2017-01-08 08:56:04',NULL),
(16,'Bakidin Putra','1409480512024536','L','Ki. Pattimura No. 33, Binjai 17555, Sultra','nadine49@iswahyudi.desa.id','0757 8207 7003','1991-04-04 21:08:21','1998-12-10 06:25:05',NULL),
(17,'Adiarja Pradana S.H.','1304490405215589','L','Ds. Babah No. 926, Bontang 98290, Pabar','kamaria44@gmail.com','(+62) 657 5653 1215','1994-06-29 07:42:18','1991-01-07 19:42:19',NULL),
(18,'Tiara Agustina S.H.','1812504105117770','L','Gg. Bakau Griya Utama No. 243, Probolinggo 62651, Kaltim','wibowo.umi@yahoo.co.id','0269 2977 8015','1976-11-23 18:44:57','1983-01-30 17:41:03',NULL),
(19,'Wirda Rahmawati','7315332512181605','L','Jr. S. Parman No. 461, Bau-Bau 89388, Sulut','umi82@yahoo.co.id','(+62) 703 8091 784','1987-12-16 01:26:05','1986-08-15 05:00:32',NULL),
(20,'Tania Sudiati','1222041009169923','L','Psr. W.R. Supratman No. 231, Tidore Kepulauan 36229, Kalsel','vino68@yahoo.co.id','(+62) 697 0809 3305','1999-12-15 08:58:20','1971-02-09 17:30:19',NULL),
(21,'Siti Pratiwi','7503026305018713','L','Dk. Barasak No. 360, Kediri 47290, Sultra','kuswandari.tantri@yahoo.co.id','0871 7213 0085','2019-10-01 18:16:43','1979-12-01 15:40:05',NULL),
(22,'Restu Rahayu S.Sos','1276462401116191','L','Kpg. Babah No. 96, Parepare 61351, Bengkulu','icha.prasetya@yahoo.co.id','(+62) 982 6495 4641','1990-03-28 10:48:11','1973-01-03 04:05:58',NULL),
(23,'Catur Sihombing','7313654311170642','L','Psr. Tentara Pelajar No. 61, Tegal 98984, Malut','ade.padmasari@yahoo.co.id','(+62) 820 3192 9942','1990-03-14 14:23:37','1993-10-30 13:23:15',NULL),
(24,'Gamanto Rendy Sihombing','7309731107206608','L','Psr. Sumpah Pemuda No. 180, Padangpanjang 55024, NTT','diana.irawan@yahoo.co.id','023 5628 7440','1992-08-18 04:15:59','1986-02-12 18:15:56',NULL),
(25,'Calista Hasanah','7314424807178563','L','Jr. Warga No. 552, Bitung 97094, Jateng','cahya.sihotang@gmail.com','(+62) 786 9347 1243','1975-11-24 11:52:35','2015-01-23 16:40:16',NULL),
(26,'Ciaobella Nasyidah','7404963101953444','L','Ki. Jamika No. 708, Balikpapan 73249, DKI','qwibisono@gmail.com','(+62) 796 3608 8819','1976-11-13 15:48:38','1972-04-28 06:01:57',NULL),
(27,'Devi Wastuti S.Ked','8102256608041707','L','Ki. Baranang Siang Indah No. 620, Tidore Kepulauan 81187, Sumsel','kani92@mandala.co.id','0365 8534 7807','2010-04-27 15:36:26','1999-09-04 09:36:20',NULL),
(28,'Kiandra Suryatmi M.Farm','3211366102199896','L','Jln. Basudewo No. 570, Tangerang Selatan 33861, Sumsel','namaga.waluyo@gmail.co.id','(+62) 802 779 690','1995-05-11 21:42:06','1982-07-14 08:30:01',NULL),
(29,'Aisyah Elma Hasanah S.H.','3315865609149252','L','Gg. Otista No. 384, Surabaya 27318, Sulsel','xsuwarno@mayasari.co','0969 3498 5509','2000-10-10 05:47:22','1989-02-09 13:25:32',NULL),
(30,'Queen Uyainah','2104661204172273','L','Gg. Untung Suropati No. 924, Kediri 91736, DIY','habibi.paulin@purnawati.co','(+62) 887 609 436','2018-09-26 08:49:13','1979-06-30 19:47:31',NULL),
(31,'Rama Wacana','5310096202949467','L','Dk. Casablanca No. 698, Payakumbuh 38127, Aceh','simanjuntak.zulfa@saputra.net','(+62) 214 7206 145','2013-08-07 03:10:38','1992-03-06 00:35:20',NULL),
(32,'Kenes Hutagalung M.Farm','8107051806090175','L','Jr. Gremet No. 859, Palangka Raya 42545, Malut','victoria48@gmail.co.id','(+62) 717 9304 309','1985-09-28 14:14:30','2006-04-11 23:23:48',NULL),
(33,'Puji Rahayu','3315075709117549','L','Jr. Bakti No. 315, Tanjung Pinang 12989, Aceh','cindy34@saptono.biz.id','(+62) 20 4204 110','2015-11-02 03:57:46','1991-09-18 14:56:01',NULL),
(34,'Queen Tiara Melani','7503070410137978','L','Ki. Gedebage Selatan No. 743, Denpasar 87472, NTT','saptono.kuncara@gmail.com','0344 0845 0612','1972-06-08 14:00:47','2014-04-24 06:31:00',NULL),
(35,'Wani Melani','9128232904070041','L','Kpg. Kali No. 794, Ternate 71104, Jatim','bsusanti@andriani.mil.id','(+62) 26 3972 791','2016-06-12 02:01:43','2017-08-20 15:40:59',NULL),
(36,'Shakila Sudiati','1225962811213851','L','Ki. Sutami No. 507, Manado 65622, Babel','jagapati.nainggolan@mandasari.org','(+62) 967 4515 862','2013-03-27 07:54:57','2007-08-19 13:42:33',NULL),
(37,'Aisyah Uyainah S.E.I','3301556605025302','L','Ki. Bakti No. 41, Denpasar 84165, Kalteng','raisa.rahimah@yahoo.co.id','(+62) 256 5084 886','2013-08-31 02:53:11','1994-10-13 20:46:11',NULL),
(38,'Ilsa Oktaviani','1225012911102953','L','Ds. Reksoninten No. 243, Jambi 76822, Kalsel','wahyudin.lala@gmail.com','0586 2719 513','1993-08-07 12:00:33','2020-04-30 02:53:37',NULL),
(39,'Naradi Prayoga M.Farm','1704970406074917','L','Dk. Cut Nyak Dien No. 508, Sungai Penuh 45831, Papua','ellis.yuliarti@agustina.sch.id','(+62) 583 1970 982','1978-05-23 17:18:28','1974-10-15 09:46:18',NULL),
(40,'Galiono Ardianto S.Ked','3215732209049951','L','Ds. Bank Dagang Negara No. 179, Bekasi 40614, Bali','dartono16@gmail.co.id','0799 3592 089','2012-02-03 09:27:57','1987-01-27 17:41:17',NULL),
(41,'Naradi Suryono','1603747005939824','L','Jr. Sentot Alibasa No. 761, Padangpanjang 97167, Papua','zulfa.zulaika@yahoo.com','(+62) 400 9929 9520','2022-04-17 13:09:30','2020-12-30 00:44:12',NULL),
(42,'Heru Dariati Wahyudin','3603230412009531','L','Ds. Thamrin No. 371, Yogyakarta 78569, Banten','nainggolan.nadine@astuti.co','(+62) 28 3426 627','2017-01-21 16:26:04','2017-07-11 10:27:50',NULL),
(43,'Kayla Puspasari','1709531903051133','L','Ki. Basket No. 950, Jayapura 53344, Sulut','hana.sudiati@palastri.asia','(+62) 361 5591 501','2021-09-20 14:13:06','2001-08-30 05:20:11',NULL),
(44,'Queen Agustina S.Pd','7203632403122441','L','Jln. Dago No. 828, Medan 48885, Aceh','nabila09@prabowo.name','0846 0106 0662','2006-11-16 05:23:06','2015-09-16 22:22:49',NULL),
(45,'Hilda Andriani','7372801604087420','L','Ds. Adisucipto No. 620, Jambi 49915, DIY','hidayanto.baktiadi@farida.org','0691 4621 7675','1979-01-03 21:11:39','1975-10-22 13:44:05',NULL),
(46,'Paris Melinda Sudiati','5309183001135016','L','Psr. Sutan Syahrir No. 480, Kendari 79625, Jabar','sihombing.sari@gmail.com','(+62) 24 4464 7302','1981-06-23 11:58:33','2011-04-15 10:13:32',NULL),
(47,'Ajimat Taufan Wahyudin','3275985911023573','L','Ki. Babadan No. 581, Makassar 24628, Lampung','sudiati.betania@gmail.co.id','(+62) 380 2564 832','1982-10-09 18:18:30','2005-01-24 20:38:24',NULL),
(48,'Sakura Lestari','6571644203984305','L','Ki. Ikan No. 292, Magelang 40981, NTT','asudiati@gmail.com','(+62) 27 7770 3334','2017-08-10 09:52:41','2009-07-29 14:13:35',NULL),
(49,'Gaiman Wacana','7313100912053574','L','Ki. Yoga No. 900, Kotamobagu 44465, Aceh','usirait@gmail.co.id','024 6493 478','1995-08-12 05:49:46','2017-11-20 14:57:19',NULL),
(50,'Dimas Latupono','7312921202091234','L','Gg. Laksamana No. 298, Bitung 92094, Kaltim','farah44@yahoo.com','0411 4208 534','2000-01-08 15:01:42','2005-07-13 13:11:52',NULL),
(51,'Prabowo Prayogo Adriansyah S.Ked','8108501102204057','L','Jr. Bagonwoto  No. 31, Cimahi 24963, DKI','rachel66@anggriawan.id','0758 7804 618','2007-05-03 02:54:15','1983-11-03 15:30:57',NULL),
(52,'Tari Wastuti M.Kom.','7605602206169427','L','Psr. Gotong Royong No. 883, Tidore Kepulauan 95483, Kalteng','elma35@gmail.com','0372 7647 3558','1986-05-06 23:48:15','1990-01-22 22:54:00',NULL),
(53,'Mustofa Pangestu','9103356712049245','L','Jr. Rajawali No. 991, Sawahlunto 30297, DIY','wulan42@gmail.com','(+62) 288 0336 695','2014-05-06 11:04:58','1973-09-14 21:22:38',NULL),
(54,'Paris Hariyah','6108133107029171','L','Ki. Bambon No. 106, Subulussalam 79813, Gorontalo','rmayasari@gmail.co.id','0754 8701 8275','1995-09-11 08:20:44','1976-05-06 13:18:33',NULL),
(55,'Kamidin Budiyanto','6411850905993625','L','Psr. Suharso No. 666, Bekasi 51550, Jambi','xmandasari@gmail.co.id','(+62) 485 1489 243','2019-04-27 05:22:37','2005-05-21 06:53:13',NULL),
(56,'Yance Hastuti','7208180609054221','L','Ki. K.H. Wahid Hasyim (Kopo) No. 916, Tangerang 42134, Kalteng','danu17@suryatmi.co.id','0819 762 251','1991-10-05 23:16:44','1991-06-14 17:52:26',NULL),
(57,'Ella Sudiati','7324261406945926','L','Ki. Baja No. 253, Kupang 57663, Kaltim','gabriella.widiastuti@januar.desa.id','(+62) 993 8999 5642','1981-01-07 21:27:16','2012-08-24 16:35:15',NULL),
(58,'Luhung Halim','1201046606983383','L','Jr. Rajawali No. 149, Tebing Tinggi 16326, Maluku','wnovitasari@gmail.co.id','(+62) 392 8253 514','1976-06-01 13:33:49','2009-02-23 04:19:30',NULL),
(59,'Estiawan Lazuardi S.Pd','3504945503100508','L','Ki. BKR No. 89, Palembang 93768, Sumbar','gwahyuni@yahoo.co.id','0327 7965 652','2010-01-22 08:08:27','1985-04-24 04:00:49',NULL),
(60,'Nova Sudiati','1604494602142353','L','Ki. Cihampelas No. 259, Banjarbaru 63021, Malut','ksamosir@gmail.com','(+62) 354 6600 4394','2010-05-27 12:45:32','1970-08-17 22:07:45',NULL),
(61,'Joko Aris Prasetyo','3502204412177563','L','Psr. PHH. Mustofa No. 374, Batu 53323, Sulsel','jagaraga63@simbolon.id','0300 2280 732','2014-10-17 18:37:52','1995-06-23 06:02:48',NULL),
(62,'Warsita Marsudi Dongoran','3504692103020590','L','Psr. S. Parman No. 929, Bitung 30941, Gorontalo','gambira85@anggraini.ac.id','(+62) 648 1975 2140','2004-01-01 20:40:05','1974-02-02 23:29:10',NULL),
(63,'Gamblang Mangunsong','7302431409957583','L','Jr. Padang No. 244, Salatiga 66987, DIY','laswi15@yahoo.co.id','(+62) 319 5778 865','2021-12-07 23:14:26','1991-11-23 23:23:24',NULL),
(64,'Labuh Mahmud Siregar','9128752506162660','L','Psr. Sentot Alibasa No. 16, Pematangsiantar 90140, Gorontalo','wsitompul@astuti.co','(+62) 219 1391 3001','1986-10-07 14:19:04','2000-12-20 00:48:37',NULL),
(65,'Maria Kusmawati S.Pd','3524501106215808','L','Jln. Surapati No. 357, Gorontalo 70135, Jateng','nsitompul@yahoo.co.id','(+62) 242 4519 364','1971-01-01 15:28:57','2019-03-18 22:49:12',NULL),
(66,'Ulya Kusmawati','3271615008003426','L','Dk. Casablanca No. 395, Tegal 88466, Aceh','hidayanto.tari@yahoo.co.id','(+62) 570 1250 8214','2000-05-01 16:09:22','1977-07-03 13:51:28',NULL),
(67,'Taufik Hardiansyah','9204645912952481','L','Psr. Bawal No. 237, Administrasi Jakarta Selatan 65341, Kepri','gmarpaung@gmail.co.id','(+62) 258 3645 6950','2019-04-13 09:09:43','2008-07-10 05:52:34',NULL),
(68,'Nasrullah Latupono','3571701609965700','L','Jln. Abdul No. 415, Bukittinggi 82228, Sulsel','intan71@jailani.org','(+62) 883 815 834','2012-02-04 10:02:40','1981-03-16 10:07:37',NULL),
(69,'Daryani Wahyudin S.E.I','3516894902124807','L','Ki. Hang No. 995, Gunungsitoli 67206, Kepri','gamani63@gmail.co.id','(+62) 984 1280 4843','1993-09-29 17:26:05','1993-08-15 08:46:19',NULL),
(70,'Gangsar Sihombing','7371046605045500','L','Psr. Bah Jaya No. 560, Palangka Raya 72278, Jabar','thalimah@suryatmi.biz.id','(+62) 310 6451 5809','1977-02-06 22:51:44','1972-07-09 01:26:00',NULL),
(71,'Rendy Dabukke','1209154806015678','L','Jr. Suniaraja No. 469, Singkawang 12518, Kalsel','rahayu81@gmail.com','(+62) 459 8761 672','1984-02-27 21:51:00','2004-05-10 19:14:40',NULL),
(72,'Kawaca Najmudin','6103685103063557','L','Kpg. Gajah No. 739, Denpasar 27903, Bali','lkusmawati@handayani.net','0884 228 381','2000-08-27 11:24:57','1995-11-20 01:05:39',NULL),
(73,'Leo Prasetya','1372176101963796','L','Ds. K.H. Wahid Hasyim (Kopo) No. 407, Padangsidempuan 37068, Aceh','maheswara.bella@hastuti.sch.id','0476 8421 087','1970-12-12 16:24:49','2007-08-05 08:43:38',NULL),
(74,'Gasti Indah Suryatmi','2103794502060563','L','Gg. Moch. Toha No. 931, Administrasi Jakarta Barat 68773, Sulsel','laksita.zaenab@lailasari.biz.id','0382 5522 4018','1996-08-30 01:18:39','1993-05-05 10:29:24',NULL),
(75,'Jais Hidayanto','8103246608074294','L','Dk. Laswi No. 439, Palu 92641, Sumut','johan37@gmail.co.id','0870 447 641','2018-10-11 01:58:10','2003-10-20 07:49:40',NULL),
(76,'Tari Laila Riyanti','1609664609139087','L','Kpg. Yos No. 43, Blitar 61978, Riau','intan.pratama@yahoo.co.id','(+62) 301 1354 060','2009-10-06 12:17:08','1977-03-23 15:32:39',NULL),
(77,'Vanesa Vanya Yuliarti','6171312310022342','L','Gg. Bakau Griya Utama No. 240, Serang 26901, Maluku','darman21@gmail.com','(+62) 787 6599 356','1972-04-26 01:04:12','2013-04-13 01:13:44',NULL),
(78,'Qori Purnawati','6304954610932389','L','Psr. Nangka No. 143, Balikpapan 98233, Kalbar','afirgantoro@nainggolan.in','0785 3929 062','2020-07-08 12:20:22','2017-04-27 16:35:01',NULL),
(79,'Harjasa Ardianto','1708331604022745','L','Ki. Cikapayang No. 229, Sawahlunto 29764, Sumut','purwanti.patricia@gunawan.com','(+62) 835 317 954','1993-08-05 09:50:05','1984-02-28 06:35:45',NULL),
(80,'Budi Raden Dabukke','6101160403960201','L','Ds. Ahmad Dahlan No. 896, Solok 73993, Jatim','maryanto.samosir@gmail.com','0693 3659 0898','1980-06-26 23:38:40','2007-08-02 23:03:07',NULL),
(81,'Purwanto Hutasoit','3510136602124965','L','Jr. Rajiman No. 741, Tidore Kepulauan 71437, Kalteng','winarsih.nabila@yahoo.co.id','0803 0619 3719','1996-05-04 05:37:28','1995-09-02 12:30:09',NULL),
(82,'Mustika Tampubolon','1410764101147904','L','Jln. Gajah Mada No. 990, Ambon 29330, Sumsel','kanda.halim@nurdiyanti.sch.id','(+62) 834 1878 440','2009-12-01 12:25:10','1972-06-30 20:20:02',NULL),
(83,'Unjani Nasyidah','6108381002135319','L','Jr. Imam Bonjol No. 47, Tomohon 28318, Sumut','malika23@halimah.mil.id','(+62) 706 2091 8340','1996-07-14 11:49:38','1988-12-14 10:55:02',NULL),
(84,'Garan Tri Pradipta','1809106607063375','L','Jln. Bank Dagang Negara No. 959, Surabaya 31377, Sultra','ewacana@gmail.co.id','(+62) 937 2942 722','1991-07-06 05:27:33','1979-05-12 23:41:04',NULL),
(85,'Faizah Palastri S.Pt','1502620911164254','L','Ki. Yos No. 942, Serang 46084, Kepri','pudjiastuti.elvin@nuraini.tv','0742 2334 1162','1989-11-16 16:07:27','2012-08-20 01:05:53',NULL),
(86,'Oliva Wulandari','3471441507071045','L','Jr. Baya Kali Bungur No. 85, Balikpapan 46579, Kaltara','lhastuti@andriani.co.id','0304 5356 3351','2004-10-29 20:03:29','1999-04-16 15:14:33',NULL),
(87,'Tari Handayani','7404891308947131','L','Ki. Gardujati No. 320, Makassar 71776, Kalteng','qwacana@yahoo.com','(+62) 291 7196 570','2004-02-28 10:53:44','1979-05-23 12:39:12',NULL),
(88,'Cayadi Saefullah','1812510511975152','L','Dk. Baranangsiang No. 657, Pangkal Pinang 91026, Babel','hyuniar@salahudin.name','(+62) 835 9807 0922','1988-09-15 04:50:25','2015-05-02 06:37:51',NULL),
(89,'Jaga Cakrajiya Widodo','1509291309108900','L','Ds. Gegerkalong Hilir No. 610, Sungai Penuh 67163, Pabar','awibisono@permata.my.id','(+62) 789 3629 9466','1999-01-05 11:20:05','2019-06-12 21:53:04',NULL),
(90,'Jaka Panji Nababan','1572945406156565','L','Gg. Supono No. 351, Sibolga 30973, Sulut','pangestu.jasmin@gmail.com','(+62) 20 6538 909','2004-04-19 02:24:05','1991-05-22 09:07:35',NULL),
(91,'Tomi Gunarto','7202592308167977','L','Gg. Dewi Sartika No. 373, Dumai 75907, Kepri','dhassanah@gmail.com','0428 2407 967','1975-04-08 09:18:23','1998-06-22 06:50:33',NULL),
(92,'Anom Luthfi Nababan','1223972411204023','L','Kpg. Bagonwoto  No. 465, Balikpapan 97207, Kaltim','yolanda.natalia@kuswandari.info','029 3564 6563','1976-06-25 09:42:41','2009-11-25 11:07:04',NULL),
(93,'Karma Thamrin S.H.','3502862806140327','L','Jln. Jayawijaya No. 803, Sibolga 90160, Malut','baktiono.santoso@gmail.com','020 8662 5276','2004-04-24 23:22:48','2013-03-14 07:57:38',NULL),
(94,'Aurora Nurdiyanti S.Sos','6105910208217822','L','Ds. Abdul Muis No. 908, Tebing Tinggi 11841, Bali','lasmono.rahmawati@uyainah.co','0642 0126 570','1984-08-03 02:01:09','1991-10-10 00:51:08',NULL),
(95,'Humaira Yolanda','2104311510128949','L','Gg. Bakaru No. 717, Probolinggo 94256, Jatim','hassanah.puti@wijaya.sch.id','(+62) 671 5480 541','1982-08-18 23:28:00','2013-06-02 16:58:32',NULL),
(96,'Calista Queen Lailasari','3372354509122825','L','Jln. Setia Budi No. 852, Banjarbaru 50183, Lampung','ajimat.putra@budiman.co','0678 7491 804','1997-04-25 20:08:33','1983-03-31 11:55:39',NULL),
(97,'Setya Jabal Tampubolon','1202201908084558','L','Gg. Kalimantan No. 505, Banjarmasin 64100, Sulteng','prastuti.ajimat@saragih.net','0817 151 022','2013-10-21 14:32:48','2017-06-16 03:02:35',NULL),
(98,'Elisa Hasna Yuliarti','3514562205101276','L','Jln. Cihampelas No. 476, Administrasi Jakarta Pusat 34947, Sultra','eli.dongoran@pradana.asia','020 9783 612','2007-07-24 23:03:42','1996-11-06 22:24:11',NULL),
(99,'Oliva Clara Mandasari S.Sos','8272642302015576','L','Psr. Pattimura No. 761, Administrasi Jakarta Pusat 27160, DKI','eva51@hidayanto.web.id','(+62) 681 4428 722','2014-10-08 06:38:22','2006-09-03 00:56:07',NULL),
(100,'Juli Novitasari','5105000706181544','L','Ds. Setia Budi No. 134, Cilegon 28359, Kepri','uhassanah@oktaviani.biz.id','0952 0433 774','2014-07-22 20:15:07','2009-11-06 10:23:11',NULL);

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(100) NOT NULL,
  `type_file` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`nama_file`,`type_file`,`path`,`size`) values 
(1,'1648136382_58216cb6d895dabf2ed5.png','image/png','img/galeri/1648136382_58216cb6d895dabf2ed5.png',22620);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(4,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1649524093,1),
(5,'2022-03-28-150420','App\\Database\\Migrations\\Customer','default','App',1649524093,1);

/*Table structure for table `sale` */

DROP TABLE IF EXISTS `sale`;

CREATE TABLE `sale` (
  `sale_id` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sale` */

insert  into `sale`(`sale_id`,`user_id`,`customer_id`,`created_at`,`updated_at`) values 
('J1652196823',1,1,'2022-05-10 10:33:43','2022-05-10 10:33:43'),
('J1652197045',1,2,'2022-05-10 10:37:25','2022-05-10 10:37:25'),
('J1652197130',1,1,'2022-05-10 10:38:50','2022-05-10 10:38:50'),
('J1652197231',1,0,'2022-05-10 10:40:31','2022-05-10 10:40:31'),
('J1652197884',1,3,'2022-05-10 10:51:24','2022-05-10 10:51:24');

/*Table structure for table `sale_detail` */

DROP TABLE IF EXISTS `sale_detail`;

CREATE TABLE `sale_detail` (
  `sale_id` varchar(15) NOT NULL,
  `book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sale_detail` */

insert  into `sale_detail`(`sale_id`,`book_id`,`amount`,`price`,`discount`,`total_price`) values 
('J1652196823',1,2,100000,24000,176000),
('J1652197045',15,1,50000,0,50000),
('J1652197045',16,1,45000,4500,40500),
('J1652197130',1,1,100000,12000,88000),
('J1652197130',15,1,50000,0,50000),
('J1652197130',16,1,45000,4500,40500),
('J1652197231',18,2,100000,0,200000),
('J1652197884',1,1,100000,12000,88000),
('J1652197884',15,1,50000,0,50000),
('J1652197884',16,1,45000,4500,40500);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`supplier_id`,`name`,`address`,`email`,`phone`,`created_at`,`updated_at`) values 
(1,'Mangunsastro','Jrakah, Bayan','msastro@gmail.com','027455511','2022-03-27 10:35:32','2022-03-27 11:38:22'),
(2,'Neo Project','Yogyakarta','neoproject@mail.com','0274525','2022-03-27 10:57:27','2022-03-27 10:57:27'),
(4,'Wong Jogja','Jalan Janti 65','wongjogja@mail.com','02741122','2022-03-27 11:19:09','2022-03-27 11:19:09'),
(5,'Wongphoto','kutoarjo','wongphoto@mail.com','02751111','2022-03-27 11:42:07','2022-03-27 11:42:07');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`email`,`username`,`password_hash`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Administrator','Toko Buku','administrator@mail.com','admin','$2y$10$ygJNB9dB4nMIdrls2Ff7XOulr3LF3zf4lUefnBsp/sY8I3OoSzT26',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-09 12:18:51','2022-04-21 12:16:45',NULL),
(2,'ki','anom','kianom@mail.com','kianom','$2y$10$Tf9sXfywEwjAFxY/qARlo.tkdzs/cfLCnAl1sOSN4wqBI7vKuJZ9W',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-12 10:46:45','2022-04-12 10:46:45',NULL),
(3,'Dharma','Bekti','dharma@mail.com','dharma','$2y$10$qRfN3sievq.BijD8SYQKUe0QxSyfVdtH0xynt6n3zAYlZWP8KDACO',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-12 11:20:40','2022-04-12 11:20:40',NULL),
(4,'Agus','Waluyo','agus@mail.com','agus','$2y$10$.S4Lc2BqkSneQRVKf.AfQuL4g3mcChAsKEkudJolvtdU3K7L3FdtK',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-13 11:14:58','2022-04-13 11:14:58',NULL),
(5,'Minato','Namikaze','minato@mail.com','minato','$2y$10$bgsbfHGi7uS3nEpNGrdBt.j.58gZ.3AgveGcrpnaWDdoQ5zDGTMQa',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-13 11:19:16','2022-04-13 11:29:31','2022-04-13 11:29:31'),
(6,'Uzumaki','Naruto','naruto@mail.com','naruto','$2y$10$6COQiIwqBcWU762Ld7L2MeCh1yG820M8L09/cVwMHXDaxechU9B7G',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-13 11:23:19','2022-04-13 11:35:26',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
