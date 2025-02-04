# ************************************************************
# Sequel Ace SQL dump
# Version 20078
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.44)
# Database: pharmaapi
# Generation Time: 2025-01-31 19:47:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cache
# ------------------------------------------------------------

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;

INSERT INTO `cache` (`key`, `value`, `expiration`)
VALUES
	('210233545720aae0ec6a8ade04fedb0a24245420','i:1;',1732913153),
	('210233545720aae0ec6a8ade04fedb0a24245420:timer','i:1732913153;',1732913153),
	('50f19d799069115d316a59f3a363ba69b466ea3c','i:2;',1736945774),
	('50f19d799069115d316a59f3a363ba69b466ea3c:timer','i:1736945774;',1736945774),
	('e247c57a8473ae8d54fd3f2a1b54ec22325fdd23','i:1;',1732909808),
	('e247c57a8473ae8d54fd3f2a1b54ec22325fdd23:timer','i:1732909808;',1732909808);

/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cache_locks
# ------------------------------------------------------------

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table component_laboratory
# ------------------------------------------------------------

CREATE TABLE `component_laboratory` (
  `laboratory_id` bigint(20) unsigned NOT NULL,
  `component_id` bigint(20) unsigned NOT NULL,
  KEY `component_laboratory_laboratory_id_foreign` (`laboratory_id`),
  KEY `component_laboratory_component_id_foreign` (`component_id`),
  CONSTRAINT `component_laboratory_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `component_laboratory_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `component_laboratory` WRITE;
/*!40000 ALTER TABLE `component_laboratory` DISABLE KEYS */;

INSERT INTO `component_laboratory` (`laboratory_id`, `component_id`)
VALUES
	(1,1),
	(2,1),
	(2,2),
	(2,3),
	(2,4),
	(2,16),
	(2,17),
	(2,18),
	(2,19),
	(2,20),
	(2,21),
	(2,22),
	(2,23),
	(2,24),
	(2,25),
	(2,26),
	(2,27),
	(2,28),
	(2,29),
	(2,30),
	(2,32),
	(2,33),
	(2,34),
	(2,35),
	(2,36),
	(2,37),
	(2,38),
	(2,39),
	(2,40),
	(2,41),
	(2,42),
	(1,2),
	(1,3),
	(1,4),
	(1,16),
	(1,17),
	(1,18),
	(1,19),
	(1,20),
	(1,21),
	(1,22),
	(1,23),
	(1,24),
	(1,25),
	(1,26),
	(1,27),
	(1,28),
	(1,29),
	(1,30),
	(1,43),
	(1,44);

/*!40000 ALTER TABLE `component_laboratory` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table components
# ------------------------------------------------------------

CREATE TABLE `components` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Назавние',
  `value` decimal(8,4) DEFAULT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Короткое название',
  `padding_top` decimal(5,3) NOT NULL DEFAULT '0.000' COMMENT 'Отступ сверху',
  `padding_right` decimal(5,3) NOT NULL DEFAULT '0.000' COMMENT 'Отступ справа',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Изображение',
  `type` enum('Loose','Liquid') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'type',
  `on_scales_place` enum('onScalesLeftBox','onScalesRightBox','onScalesBottomBox') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_mix_place` enum('inMixBoxOne','inMixBoxTwo','inMixBoxThree') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(4,2) NOT NULL DEFAULT '0.00',
  `ph_meter_able` tinyint(1) NOT NULL DEFAULT '0',
  `ph_meter_value` decimal(7,4) NOT NULL DEFAULT '0.0000',
  `mixer_able` tinyint(1) NOT NULL DEFAULT '0',
  `bath_able` tinyint(1) NOT NULL DEFAULT '0',
  `filtration_able` tinyint(1) NOT NULL DEFAULT '0',
  `mix_able` tinyint(1) NOT NULL DEFAULT '0',
  `is_example` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;

INSERT INTO `components` (`id`, `name`, `value`, `short_name`, `padding_top`, `padding_right`, `description`, `image`, `type`, `on_scales_place`, `on_mix_place`, `weight`, `ph_meter_able`, `ph_meter_value`, `mixer_able`, `bath_able`, `filtration_able`, `mix_able`, `is_example`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Шпатель',NULL,'Шпатель',82.424,23.020,'Шпатель','storage_components/Y4AMZFTxbCeWzIVYadkshIOXWkKOVHSZI15I6FNw.png','Loose','onScalesBottomBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-11-29 23:45:00'),
	(2,'Воронка средняя',NULL,'Воронка средняя',78.585,19.062,'Воронка средняя','storage_components/0aZuLT2rY59O8GSGPhy0IhoP4xxb9DllgCJSUBjl.png','Liquid','onScalesBottomBox','inMixBoxTwo',0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:31:19'),
	(3,'Мерный целиндр 1л',NULL,'Мерный целиндр ',56.565,26.354,'Посуда для точного взвешивания выбранных веществ','storage_components/6m8LdO40AVDRz9L5Zqf4Nov1wLSR47B6mdbuPu0b.png','Liquid','onScalesLeftBox',NULL,10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-11-29 23:22:29'),
	(4,'Мерная колба 1л',NULL,'Мерная колба',56.565,17.500,'Мерная колба 1л','storage_components/ELGsYpV1UbgZJsjsc9zH3PrXl0YOr2RIS20N3lzA.png','Liquid','onScalesLeftBox','inMixBoxThree',10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:31:44'),
	(5,'Образец 2',NULL,'Образец 2',21.111,20.677,'Посуда для точного взвешивания выбранных веществ','storage_components/boric_acid.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:08:30'),
	(6,'Образец 1',NULL,'Образец 1',20.303,24.739,'Посуда для точного взвешивания выбранных веществ','storage_components/wqW5ctTWSapPNkRWg8wKT9Sv0CH248zt0AsDWN6v.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:08:09'),
	(7,'Образец 3',NULL,'Образец 3',21.111,17.083,'Посуда для точного взвешивания выбранных веществ','storage_components/Uyx1TnSRYe8J2GAV2bMpkWgBaCdRtnlc42dy7YNo.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:07:47'),
	(8,'Образец 4',NULL,'Образец 4',22.727,13.645,'реактив','storage_components/58SBQyWI6oERqbbMkgk8AlJJADbusDpSoF76iMzO.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:14:39'),
	(9,'Образец 8',NULL,'Образец 8',25.252,10.937,'Реактив 5','storage_components/poOENHMo36ObquNgXjuiX11XqfYKga4Hs2NwWSHM.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:15:31'),
	(10,'Образец 9',NULL,'Образец 9',25.252,8.020,'Реактив 6','storage_components/pbflH33mUU5FcFERXXqlgyjfhgdzRA9L5Lqqsx4D.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:17:27'),
	(11,'Образец 10',NULL,'Образец 10',25.252,5.729,'Реактив 7','storage_components/a7T9kcGNkV4W9uD22k0BQByMwRWemAU6F0O6Lz9w.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:18:20'),
	(12,'Образец 11',NULL,'Образец 11',25.252,2.968,'Реактив 8','storage_components/lCsRTpmVuQ1TnKTKrfAKcOIWeLUQNGxjhXQmjsPL.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:19:04'),
	(13,'Образец 5',NULL,'Образец 5',28.080,20.885,'Посуда для точного взвешивания выбранных веществ','storage_components/M45VNIqMuBguMianEDZw6QhOSY6oCQnXYiHE6Fyy.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:10:05'),
	(14,'Образец 6',NULL,'Образец 6',28.080,16.927,'Посуда для точного взвешивания выбранных веществ','storage_components/9SAE24zL9E8oJnOZ2jrCajP9KKbhGI2fjb7p1Bj3.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:16:08'),
	(15,'Образец 7',NULL,'Образец 7',28.080,13.750,'Посуда для точного взвешивания выбранных веществ','storage_components/n9GbXGcfsE299ib7EWsibkA3tpXIyed8Z3bdG7jM.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,1,NULL,'2024-11-29 22:20:51','2024-11-29 23:12:16'),
	(16,'Мерный целиндр 0,75',NULL,'Мерный целиндр ',56.565,23.333,'Мерный целиндр 0,75','storage_components/Sm9OM8DrV7IgaGdckrckKxeh54ukaV5ma2ll7x6Q.png','Liquid','onScalesLeftBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-11-29 23:23:14'),
	(17,'Мерный целиндр 0,25',NULL,'Мерный целиндр ',56.565,20.885,'Мерный целиндр 0,25','storage_components/jdoO4zEdqsY77xesyCZ5he6Q6BCOUZ3bWM801Viy.png','Liquid','onScalesLeftBox',NULL,10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-12-15 08:30:00'),
	(18,'Мерная колба 0,75л',NULL,'Мерная колба ',56.565,13.750,'Мерная колба 0,75л','storage_components/oVlJFxAFRF5Lko41uDQIb8J9SlbXwnvdKC6WVzNV.png','Liquid','onScalesLeftBox','inMixBoxThree',10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:33:01'),
	(19,'Мерная колба 0,5л',NULL,'Мерная колба ',56.565,10.000,'Мерная колба 0,5л','storage_components/oHEbKdKUSXxVc3PDXil0vEsm1UhnJGKqDUa3LSvs.png','Liquid','onScalesLeftBox','inMixBoxThree',10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:33:07'),
	(20,'Мерная колба 0,33л',NULL,'Мерная колба ',56.565,7.031,'Мерная колба 0,33л','storage_components/6RUWWT7ms3harD7kiNHSe6hEv5bR9Ohd0wtlI7zE.png','Liquid','onScalesLeftBox','inMixBoxThree',10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:33:12'),
	(21,'Мерная колба 0,25л',NULL,'Мерная колба ',56.565,4.791,'Мерная колба 0,25л','storage_components/1NyWJxAMeRFqlf4iVWfJWmzVd5efJ4Z0MFPjbqhA.png','Liquid','onScalesLeftBox','inMixBoxThree',10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:33:17'),
	(22,'Мерная колба УФ',NULL,'Мерная колба УФ',56.565,2.760,'Посуда для точного взвешивания выбранных веществ','storage_components/244tXx56b5V9Rf3ASXSpi16fqo3NK2R7Uvjz9OAp.png','Liquid','onScalesLeftBox','inMixBoxThree',10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:33:23'),
	(23,'Химический стакан',NULL,'Химический стак',77.777,26.354,'Химический стакан','storage_components/KCm1I9SeWbyFAjK2K0VVVYSfIEFhqwpGCKpx33pK.png','Liquid','onScalesLeftBox',NULL,10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-12-15 08:29:36'),
	(24,'Воронка Большая',NULL,'Воронка Б',77.777,22.395,'Воронка Большая','storage_components/kFIGHJ9f1hP3eneR9PpJk032mfM74uUk6wK5Mtal.png','Liquid','onScalesBottomBox','inMixBoxTwo',0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:34:33'),
	(25,'Химический стакан (м)',NULL,'Химический стак',78.585,13.802,'Химический стакан (м)','storage_components/MqFX6K3NjcgKpR2RsM6PcCUfWOQOEwgLJzPtdpEb.png','Liquid','onScalesLeftBox',NULL,10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-12-15 08:29:29'),
	(26,'Бюкс',NULL,'Бюкс',78.585,11.666,'Бюкс','storage_components/dC8QKgmQ02aBKQqzFri82Tc0GMT79DuvMNko0Ywn.png','Loose','onScalesLeftBox',NULL,10.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-12-13 10:56:50'),
	(27,'Дестилированная вода',NULL,'дест. вода',75.151,9.010,'дестилированная вода','storage_components/RvoMtNYmagiiyCzimD03r7ID8uciWdJNcNIVWRb0.png','Liquid','onScalesRightBox','inMixBoxOne',0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:30:55'),
	(28,'Шланги',NULL,'Шланги',78.585,4.062,'Шланги','storage_components/5.jpg','Liquid','onScalesBottomBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-11-29 23:46:53'),
	(29,'Шприц ',NULL,'Шприц ',82.424,17.239,'Шприц ','storage_components/C2U75m67kmn7oBUoZkolZP4ppzRpZUENtejCOZ7T.png','Liquid','onScalesBottomBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-11-29 23:45:10'),
	(30,'Шприц',NULL,'Шприц ',81.616,9.739,'Шприц с фильтром','storage_components/i9nV7rjcVgevSKSsbRIwhv0Rri97VCIEM3y733AQ.png','Liquid','onScalesBottomBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2024-11-29 23:45:18'),
	(32,'Фосфорная кислота',NULL,'Фосфорная кисло',20.303,24.739,'Фосфорная кислота','storage_components/wqW5ctTWSapPNkRWg8wKT9Sv0CH248zt0AsDWN6v.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:01:43','2025-01-20 14:01:59'),
	(33,'Калия дигидрофосфат',NULL,'дигидрофосфат',21.111,20.677,'Калия дигидрофосфат','storage_components/boric_acid.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:02:28','2025-01-20 14:03:05'),
	(34,'Калия дигидрофосфат безв',NULL,'Калия дигидрофо',21.111,17.083,'Калия дигидрофосфат безв','storage_components/Uyx1TnSRYe8J2GAV2bMpkWgBaCdRtnlc42dy7YNo.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:04:01','2025-01-20 14:04:24'),
	(35,'Дарунавир СО',NULL,'Дарунавир СО',22.727,13.645,' Дарунавир СО','storage_components/58SBQyWI6oERqbbMkgk8AlJJADbusDpSoF76iMzO.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:05:21','2025-01-20 14:05:40'),
	(36,'Молнупиравир СО',NULL,'Молнупиравир СО',28.080,20.885,'Молнупиравир СО','storage_components/M45VNIqMuBguMianEDZw6QhOSY6oCQnXYiHE6Fyy.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:06:23','2025-01-20 14:06:35'),
	(37,'Бикалутамид, субстанция',NULL,'Бикалутамид',28.080,16.927,' Бикалутамид, субстанция','storage_components/9SAE24zL9E8oJnOZ2jrCajP9KKbhGI2fjb7p1Bj3.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:07:20','2025-01-20 14:07:48'),
	(38,'Бикалутамид СО',NULL,'Бикалутамид СО',28.080,13.750,'Посуда для точного взвешивания выбранных веществ','storage_components/n9GbXGcfsE299ib7EWsibkA3tpXIyed8Z3bdG7jM.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:08:37','2025-01-20 14:09:02'),
	(39,'Дарунавир СО',NULL,'Дарунавир СО',25.252,10.937,'Дарунавир СО','storage_components/poOENHMo36ObquNgXjuiX11XqfYKga4Hs2NwWSHM.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:09:23','2025-01-20 14:09:32'),
	(40,'Хлористоводородная  кислота',NULL,'Хлористоводород',25.252,8.020,'Хлористоводородная  кислота','storage_components/pbflH33mUU5FcFERXXqlgyjfhgdzRA9L5Lqqsx4D.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:10:07','2025-01-20 14:10:15'),
	(41,'Трифторуксусная кислота',NULL,'Трифторуксусная',25.252,5.729,'Трифторуксусная кислота','storage_components/a7T9kcGNkV4W9uD22k0BQByMwRWemAU6F0O6Lz9w.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:10:37','2025-01-20 14:10:44'),
	(42,'Ацетонитрил',NULL,'Ацетонитрил',25.252,2.968,'Ацетонитрил','storage_components/lCsRTpmVuQ1TnKTKrfAKcOIWeLUQNGxjhXQmjsPL.png','Liquid','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:11:00','2025-01-20 14:11:08'),
	(43,'Аминосалициловая кислота СО',NULL,'Аминосалицилова',20.303,24.739,'Аминосалициловая кислота СО','storage_components/wqW5ctTWSapPNkRWg8wKT9Sv0CH248zt0AsDWN6v.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:19:56','2025-01-20 14:20:16'),
	(44,'Метанол технический',NULL,'Метанол технич',21.111,20.677,' Метанол технический','storage_components/boric_acid.png','Loose','onScalesRightBox',NULL,0.00,1,99.9999,1,1,1,0,0,NULL,'2025-01-20 14:20:25','2025-01-20 14:20:41'),
	(45,'Воронка малая',NULL,'Воронка малая',79.085,16.362,'Воронка малая','storage_components/0aZuLT2rY59O8GSGPhy0IhoP4xxb9DllgCJSUBjl.png','Liquid','onScalesBottomBox','inMixBoxTwo',0.00,1,99.9999,1,1,1,0,0,NULL,'2024-11-29 22:20:51','2025-01-16 16:31:19');

/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table departments
# ------------------------------------------------------------

CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Avis Gibson','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(2,'Daphnee Kuhic','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(3,'Prof. Fabian Schuppe','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(4,'Mrs. Cleta Veum PhD','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(5,'Mr. Reese Dibbert III','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(6,'Iliana Reichel','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(7,'Ashly Jakubowski','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(8,'Jabari Reinger','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(9,'Arvilla Rogahn III','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(10,'Torey Hand','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(11,'Malcolm Grimes','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(12,'Miss Beulah Lubowitz I','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(13,'Kale Batz','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(14,'Prof. Sigrid Quitzon DDS','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(15,'Ms. Emmy Mosciski','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(16,'Cristal Crona','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(17,'Nikolas Satterfield','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(18,'Justus Schmeler','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(19,'Karl Smitham','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(20,'Garnett Kuhn','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(21,'Jodie O\'Conner','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(22,'Earnest Bayer','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(23,'Bianka Kuphal II','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(24,'Krystina Rippin II','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(25,'Enos Nitzsche','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(26,'Karina Waelchi','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(27,'Nicolette Keeling','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(28,'Dedrick Jacobson','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(29,'Isac Jerde','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(30,'Mr. Jalon Schiller','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(31,'Tommie Johns','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(32,'Miss Leta Larson','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(33,'Glennie Parker V','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(34,'Hailey Weimann','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(35,'Kylee Nolan','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(36,'Mya Graham','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(37,'Gianni Von','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(38,'Matilde Reichert','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(39,'Sigrid Luettgen IV','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(40,'Paolo Huels','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(41,'Prof. Rick Aufderhar PhD','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(42,'Dr. Tessie DuBuque IV','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(43,'Jeanne Heathcote','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(44,'Ramona Kilback','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(45,'Dr. Jovani Lang II','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(46,'Trisha Lynch','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(47,'Trycia Huel','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(48,'Cecelia Stamm','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(49,'Alisha Howell MD','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(50,'Fermin DuBuque','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(51,'Alivia Terry','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(52,'Oswaldo Feeney I','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(53,'Mrs. Elta Bailey','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(54,'Pierce Herzog','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(55,'Manuel Simonis','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(56,'Alexys Schuster','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(57,'Madisyn Jast','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(58,'Henriette Kub','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(59,'Nya Kautzer','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(60,'Blaise Turcotte','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(61,'Brielle Bergnaum','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(62,'Mr. Garnet Terry','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(63,'Whitney Morissette','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(64,'Simeon Dicki II','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(65,'Wade Dibbert','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(66,'Prof. Peggie Jaskolski I','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(67,'Christa Jenkins','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(68,'Mr. Marley Hane Sr.','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(69,'Chanel Gerlach I','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(70,'Samanta Rosenbaum IV','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(71,'Tia Gutkowski','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(72,'August Hermann','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(73,'Dr. Unique Quigley Sr.','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(74,'Kyra Kub','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(75,'Hilario Bogisich','2024-11-29 19:20:51','2024-11-29 19:20:51');

/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table group_students
# ------------------------------------------------------------

CREATE TABLE `group_students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `student_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_students_group_id_student_id_unique` (`group_id`,`student_id`),
  KEY `group_students_student_id_foreign` (`student_id`),
  CONSTRAINT `group_students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `group_students` WRITE;
/*!40000 ALTER TABLE `group_students` DISABLE KEYS */;

INSERT INTO `group_students` (`id`, `group_id`, `student_id`, `created_at`)
VALUES
	(1,1,58,'2024-11-29 19:20:50'),
	(2,1,59,'2024-11-29 19:20:50'),
	(3,1,60,'2024-11-29 19:20:50'),
	(4,1,61,'2024-11-29 19:20:50'),
	(5,2,63,'2024-11-29 19:20:50'),
	(6,2,64,'2024-11-29 19:20:50'),
	(7,2,65,'2024-11-29 19:20:50'),
	(8,2,66,'2024-11-29 19:20:50'),
	(9,3,70,'2024-11-29 19:20:50'),
	(10,3,71,'2024-11-29 19:20:50'),
	(11,3,72,'2024-11-29 19:20:50'),
	(12,3,73,'2024-11-29 19:20:50'),
	(13,4,76,'2024-11-29 19:20:51'),
	(14,4,77,'2024-11-29 19:20:51'),
	(15,4,78,'2024-11-29 19:20:51'),
	(16,4,79,'2024-11-29 19:20:51'),
	(17,5,82,'2024-11-29 19:20:51'),
	(18,5,83,'2024-11-29 19:20:51'),
	(19,5,84,'2024-11-29 19:20:51'),
	(20,5,85,'2024-11-29 19:20:51'),
	(21,6,90,'2024-11-29 19:20:51'),
	(22,6,91,'2024-11-29 19:20:51'),
	(23,6,92,'2024-11-29 19:20:51'),
	(24,6,93,'2024-11-29 19:20:51'),
	(25,7,96,'2024-11-29 19:20:51'),
	(26,7,97,'2024-11-29 19:20:51'),
	(27,7,98,'2024-11-29 19:20:51'),
	(28,7,99,'2024-11-29 19:20:51'),
	(29,8,102,'2024-11-29 19:20:51'),
	(30,8,103,'2024-11-29 19:20:51'),
	(31,8,104,'2024-11-29 19:20:51'),
	(32,8,105,'2024-11-29 19:20:51'),
	(33,9,107,'2024-11-29 19:20:51'),
	(34,9,108,'2024-11-29 19:20:51'),
	(35,9,109,'2024-11-29 19:20:51'),
	(36,9,110,'2024-11-29 19:20:51'),
	(37,10,113,'2024-11-29 19:20:51'),
	(38,10,114,'2024-11-29 19:20:51'),
	(39,10,115,'2024-11-29 19:20:51'),
	(40,10,116,'2024-11-29 19:20:51');

/*!40000 ALTER TABLE `group_students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название группы',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание группы',
  `teacher_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Назначение преподавателя',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `groups_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `description`, `teacher_id`, `created_at`, `updated_at`)
VALUES
	(1,'Group 197820','Half-past one, time for dinner!\' (\'I only wish it was,\' he said. \'Fifteenth,\' said the Queen, who was trembling down to look about her repeating \'YOU ARE OLD, FATHER WILLIAM,\"\' said the Lory. Alice replied in an offended tone. And the muscular strength, which it gave to my right size: the next moment she felt that there was mouth enough for it flashed across her mind that she could not answer without a great letter, nearly as large as himself, and this was his first remark, \'It was the cat.) \'I hope they\'ll remember her saucer of milk at tea-time. Dinah my dear! I wish you could draw treacle out of sight: then it watched the Queen put on his knee, and looking anxiously about as it can be,\' said the Hatter, \'you wouldn\'t talk about wasting IT. It\'s HIM.\' \'I don\'t know the way I want to go! Let me see--how IS it to annoy, Because he knows it teases.\' CHORUS. (In which the cook tulip-roots instead of onions.\' Seven flung down his face, as long as it spoke. \'As wet as ever,\' said Alice loudly. \'The idea of having the sentence first!\' \'Hold your tongue!\' said the Hatter. He had been broken to pieces. \'Please, then,\' said Alice, in a tone of this rope--Will the roof bear?--Mind that loose slate--Oh, it\'s coming down! Heads.',48,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(2,'Group 133519','Hatter added as an explanation. \'Oh, you\'re sure to happen,\' she said to the jury. \'Not yet, not yet!\' the Rabbit came up to the law, And argued each case with MINE,\' said the Dormouse; \'VERY ill.\' Alice tried to look about her any more HERE.\' \'But then,\' thought Alice, and, after waiting till she had expected: before she came upon a little snappishly. \'You\'re enough to try the thing yourself, some winter day, I will just explain to you never even introduced to a lobster--\' (Alice began to tremble. Alice looked at it, and burning with curiosity, she ran off at once took up the other, and growing sometimes taller and sometimes she scolded herself so severely as to go down--Here, Bill! the master says you\'re to go near the door of which was lit up by two guinea-pigs, who were giving it a violent shake at the bottom of a procession,\' thought she, \'if people had all to lie down upon their faces, so that altogether, for the Duchess by this time). \'Don\'t grunt,\' said Alice; \'but when you come to the jury. They were just beginning to write out a race-course, in a loud, indignant voice, but she could not remember the simple rules their friends had taught them: such as, \'Sure, I don\'t understand. Where did they draw the treacle from?\' \'You can draw water out of his shrill little voice, the name \'W. RABBIT\' engraved upon it. She felt very lonely and low-spirited. In a little irritated at the other ladder?--Why, I hadn\'t cried so much!\' said Alice, who was a little wider. \'Come.',49,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(3,'Group 728848','I\'ve got to the three gardeners who were giving it a minute or two, which gave the Pigeon in a low trembling voice, \'--and I hadn\'t cried so much!\' said Alice, \'I\'ve often seen a cat without a grin,\' thought Alice; \'I must be getting home; the night-air doesn\'t suit my throat!\' and a crash of broken glass. \'What a curious croquet-ground in her life before, and she crossed her hands up to the Cheshire Cat, she was walking by the hand, it hurried off, without waiting for turns, quarrelling all the players, except the King, the Queen, pointing to Alice again. \'No, I didn\'t,\' said Alice: \'besides, that\'s not a moment like a candle. I wonder if I\'ve kept her eyes anxiously fixed on it, for she was walking hand in hand, in couples: they were IN the well,\' Alice said nothing; she had quite forgotten the words.\' So they began running about in all directions, \'just like a stalk out of its mouth and yawned once or twice she had known them all her wonderful Adventures, till she had asked it aloud; and in a trembling voice:-- \'I passed by his garden, and I never was so large in the lap of her head down to them, and then I\'ll tell you what year it is?\' \'Of course not,\' said the Mouse replied rather impatiently: \'any shrimp.',50,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(4,'Group 191029','The Cat\'s head began fading away the time. Alice had got its head impatiently, and walked two and two, as the soldiers did. After these came the guests, mostly Kings and Queens, and among them Alice recognised the White Rabbit, with a sigh: \'he taught Laughing and Grief, they used to it!\' pleaded poor Alice began in a more subdued tone, and added \'It isn\'t a letter, written by the fire, licking her paws and washing her face--and she is of yours.\"\' \'Oh, I BEG your pardon!\' cried Alice (she was rather glad there WAS no one else seemed inclined to say than his first speech. \'You should learn not to be in a low curtain she had a vague sort of use in saying anything more till the puppy\'s bark sounded quite faint in the pool, and the beak-- Pray how did you begin?\' The Hatter opened his eyes very wide on hearing this; but all he SAID was, \'Why is a long hookah, and taking not the smallest notice of her going, though she felt that it made no mark; but he could go. Alice took up the other, saying, in a low, timid voice, \'If you didn\'t sign it,\' said Alice very humbly: \'you had got to the porpoise, \"Keep back, please: we don\'t want YOU with us!\"\' \'They were obliged to have lessons to learn! No, I\'ve made up my mind.',51,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(5,'Group 387512','Alice; \'I can\'t explain it,\' said Alice. \'Of course twinkling begins with a soldier on each side, and opened their eyes and mouths so VERY much out of their hearing her; and when Alice had begun to repeat it, when a sharp hiss made her draw back in a Little Bill It was so full of the goldfish kept running in her life, and had come to the conclusion that it would be grand, certainly,\' said Alice indignantly, and she was quite pleased to have wondered at this, but at any rate it would not join the dance. Would not, could not, would not, could not help thinking there MUST be more to be sure; but I can\'t see you?\' She was looking down with one finger; and the little golden key in the morning, just time to see if she meant to take the roof of the ground.\' So she called softly after it, and kept doubling itself up and beg for its dinner, and all would change to dull reality--the grass would be grand, certainly,\' said Alice hastily; \'but I\'m not the same, the next thing is, to get out again. Suddenly she came upon a little scream of laughter. \'Oh.',52,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(6,'Group 565779','First, she dreamed of little Alice was not here before,\' said Alice,) and round goes the clock in a minute, nurse! But I\'ve got to?\' (Alice had no reason to be sure! However, everything is queer to-day.\' Just then she remembered trying to fix on one, the cook till his eyes were nearly out of a tree a few minutes it puffed away without being invited,\' said the King, \'that saves a world of trouble, you know, with oh, such long curly brown hair! And it\'ll fetch things when you throw them, and just as she could have told you that.\' \'If I\'d been the whiting,\' said Alice, \'and why it is all the rats and--oh dear!\' cried Alice (she was so large a house, that she was nine feet high, and her eyes anxiously fixed on it, (\'which certainly was not much larger than a real Turtle.\' These words were followed by a row of lodging houses, and behind them a new pair of the edge of the trees behind him. \'--or next day, maybe,\' the Footman continued in the other: the Duchess said to the shore. CHAPTER III. A Caucus-Race and a fall, and a bright brass plate with the tarts, you know--\' (pointing with his head!\"\' \'How dreadfully savage!\' exclaimed Alice. \'And where HAVE my shoulders got to? And oh, I wish I could say if I know all the children she knew, who might do very well without--Maybe it\'s always pepper that had fallen into the garden at once; but, alas for poor Alice! when she had accidentally upset the milk-jug into his plate. Alice did not at all comfortable, and it set to work shaking him and punching him in the after-time, be herself a grown woman; and how she would feel with all their simple joys, remembering her own child-life, and the whole she thought it had come back in their mouths--and they\'re all over with diamonds, and walked a little faster?\" said a whiting before.\' \'I can tell you his history,\' As they walked off together. Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a great hurry. An.',53,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(7,'Group 134716','I will just explain to you to learn?\' \'Well, there was a dead silence instantly, and neither of the garden: the roses growing on it except a little timidly, \'why you are very dull!\' \'You ought to be a letter, after all: it\'s a set of verses.\' \'Are they in the direction in which case it would like the tone of great curiosity. \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'allow me to sell you a couple?\' \'You are not the smallest idea how to get in?\' asked Alice again, in a long, low hall, which was lit up by two guinea-pigs, who were giving it a bit, if you want to see anything; then she looked down, was an old woman--but then--always to have wondered at this, but at last turned sulky, and would only say, \'I am older than you, and don\'t speak a word till I\'ve finished.\' So they began running about in all directions, \'just like a snout than a rat-hole: she knelt down and make one quite giddy.\' \'All right,\' said the Duchess. \'I make you dry enough!\' They all sat down again very sadly and quietly, and looked along the sea-shore--\' \'Two lines!\' cried the Mock Turtle went on, yawning and rubbing its eyes, for it now, I suppose, by being drowned in my life!\' Just as she went on just as she did not venture to go and take it away!\' There was a table in the same as the March Hare said in a solemn tone, only changing the order of the evening, beautiful Soup! Beau--ootiful Soo--oop! Soo--oop of the window, I only wish they WOULD not remember ever having heard of.',54,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(8,'Group 998797','Hatter. He came in with the grin, which remained some time with the game,\' the Queen left off, quite out of the Shark, But, when the race was over. However, when they met in the trial one way of nursing it, (which was to find that she was small enough to get in at the bottom of a muchness\"--did you ever eat a bat?\' when suddenly, thump! thump! down she came upon a low voice, \'Why the fact is, you ARE a simpleton.\' Alice did not appear, and after a pause: \'the reason is, that there\'s any one left alive!\' She was a child,\' said the Gryphon, before Alice could think of any that do,\' Alice hastily replied; \'at least--at least I mean what I like\"!\' \'You might just as well as she ran; but the wise little Alice herself, and nibbled a little bottle on it, or at any rate: go and live in that ridiculous fashion.\' And he added in an angry tone, \'Why, Mary Ann, what ARE you talking to?\' said one of the month is it?\' Alice panted as she could, \'If you didn\'t like cats.\' \'Not like cats!\' cried the Mock Turtle yet?\' \'No,\' said the Queen, \'and take this child away with me,\' thought Alice, and looking at the door-- Pray, what is the capital of Paris, and Paris is the use of a tree a few minutes that she looked down at her as hard as she could, for the hot day made her feel very sleepy and stupid), whether the pleasure of making a daisy-chain would be four thousand miles down, I think--\' (she was so much surprised, that for the moment she appeared; but she felt certain it must make me smaller, I can kick a little!\' She drew her foot as far as they all moved off, and Alice was beginning to grow to my jaw, Has lasted the rest of the day; and this he handed over to the door, she ran across the field after it, and found quite a long hookah, and taking not the smallest idea how confusing it is.',55,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(9,'Group 41781','I\'m not particular as to the King, and he checked himself suddenly: the others all joined in chorus, \'Yes, please do!\' pleaded Alice. \'And be quick about it,\' added the Dormouse, and repeated her question. \'Why did they live at the proposal. \'Then the words \'DRINK ME,\' but nevertheless she uncorked it and put it more clearly,\' Alice replied thoughtfully. \'They have their tails fast in their mouths--and they\'re all over with William the Conqueror.\' (For, with all speed back to them, they were all in bed!\' On various pretexts they all crowded round her, calling out in a hurry. \'No, I\'ll look first,\' she said, by way of nursing it, (which was to eat the comfits: this caused some noise and confusion, as the Caterpillar seemed to quiver all over their heads. She felt very glad to get rather sleepy, and went on in the air. This time there could be NO mistake about it: it was a dead silence instantly, and Alice looked up, but it all seemed quite dull and stupid for life to go and live in that poky little house, and the small ones choked and had to ask any more HERE.\' \'But then,\' thought she, \'what would become of you? I gave her one, they gave him two, You gave us three or more; They all sat down again in a great deal of thought, and rightly too, that very few little girls eat eggs quite as much as serpents do, you know.\' He was an uncomfortably sharp chin. However, she soon made out what she was beginning to see some meaning in it,\' said Alice, as she listened, or seemed to listen, the.',56,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(10,'Group 952795','Oh, my dear Dinah! I wonder what they\'ll do next! If they had at the Queen, tossing her head made her next remark. \'Then the words \'DRINK ME,\' but nevertheless she uncorked it and put back into the roof bear?--Mind that loose slate--Oh, it\'s coming down! Heads below!\' (a loud crash)--\'Now, who did that?--It was Bill, the Lizard) could not possibly reach it: she could guess, she was now more than Alice could speak again. In a little while, however, she went on, looking anxiously round to see some meaning in it, \'and what is the capital of Rome, and Rome--no, THAT\'S all wrong, I\'m certain! I must have been changed several times since then.\' \'What do you know about this business?\' the King said gravely, \'and go on crying in this affair, He trusts to you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, who felt ready to talk nonsense. The Queen\'s Croquet-Ground A large rose-tree stood near the door and found in it about four inches deep and reaching half down the middle, being held up by wild beasts and other unpleasant things, all because they WOULD go with the next verse,\' the Gryphon never learnt it.\' \'Hadn\'t time,\' said the King: \'however, it may kiss my hand if it thought that it was.',57,'2024-11-29 19:20:51','2024-11-29 19:20:51');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_batches
# ------------------------------------------------------------

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table jobs
# ------------------------------------------------------------

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table laboratories
# ------------------------------------------------------------

CREATE TABLE `laboratories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacological_article_id` bigint(20) unsigned DEFAULT NULL,
  `check_values` json DEFAULT NULL,
  `before_storage_video_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Видео перед складом',
  `before_weighting_video_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Видео перед весовой',
  `before_cooking_video_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Видео перед вытяжной',
  `before_chromatograph_page_video_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Видео перед Хроматограф (оборудование)',
  `before_chromatograph_app_video_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Видео перед Хроматограф (программа)',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratories_pharmacological_article_id_foreign` (`pharmacological_article_id`),
  KEY `laboratories_before_storage_video_id_foreign` (`before_storage_video_id`),
  KEY `laboratories_before_weighting_video_id_foreign` (`before_weighting_video_id`),
  KEY `laboratories_before_cooking_video_id_foreign` (`before_cooking_video_id`),
  KEY `laboratories_before_chromatograph_page_video_id_foreign` (`before_chromatograph_page_video_id`),
  KEY `laboratories_before_chromatograph_app_video_id_foreign` (`before_chromatograph_app_video_id`),
  CONSTRAINT `laboratories_before_chromatograph_app_video_id_foreign` FOREIGN KEY (`before_chromatograph_app_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratories_before_chromatograph_page_video_id_foreign` FOREIGN KEY (`before_chromatograph_page_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratories_before_cooking_video_id_foreign` FOREIGN KEY (`before_cooking_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratories_before_storage_video_id_foreign` FOREIGN KEY (`before_storage_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratories_before_weighting_video_id_foreign` FOREIGN KEY (`before_weighting_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratories_pharmacological_article_id_foreign` FOREIGN KEY (`pharmacological_article_id`) REFERENCES `pharmacological_articles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `laboratories` WRITE;
/*!40000 ALTER TABLE `laboratories` DISABLE KEYS */;

INSERT INTO `laboratories` (`id`, `name`, `description`, `pharmacological_article_id`, `check_values`, `before_storage_video_id`, `before_weighting_video_id`, `before_cooking_video_id`, `before_chromatograph_page_video_id`, `before_chromatograph_app_video_id`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Аминосалициловая кислота Легкий','Аминосалициловая кислота Легкий',1,'{\"check_value_one_to\": \"2\", \"check_value_two_to\": \"4\", \"check_value_one_from\": \"1\", \"check_value_two_from\": \"3\"}',1,1,1,1,1,NULL,'2024-11-29 19:20:51','2025-01-20 14:17:56'),
	(2,'Бикалутамид - легкий','Бикалутамид - легкий',1,'{\"check_value_one_to\": \"2\", \"check_value_two_to\": \"4\", \"check_value_one_from\": \"1\", \"check_value_two_from\": \"3\"}',1,1,1,1,1,NULL,'2025-01-20 12:57:42','2025-01-20 14:17:49');

/*!40000 ALTER TABLE `laboratories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laboratory_mobile_phases
# ------------------------------------------------------------

CREATE TABLE `laboratory_mobile_phases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratory_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_component_id` bigint(20) unsigned NOT NULL,
  `second_component_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratory_mobile_phases_laboratory_id_foreign` (`laboratory_id`),
  KEY `laboratory_mobile_phases_first_component_id_foreign` (`first_component_id`),
  KEY `laboratory_mobile_phases_second_component_id_foreign` (`second_component_id`),
  CONSTRAINT `laboratory_mobile_phases_first_component_id_foreign` FOREIGN KEY (`first_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_mobile_phases_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_mobile_phases_second_component_id_foreign` FOREIGN KEY (`second_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `laboratory_mobile_phases` WRITE;
/*!40000 ALTER TABLE `laboratory_mobile_phases` DISABLE KEYS */;

INSERT INTO `laboratory_mobile_phases` (`id`, `laboratory_id`, `name`, `first_component_id`, `second_component_id`, `created_at`, `updated_at`)
VALUES
	(1,2,'ПФА',27,41,'2025-01-29 12:46:11','2025-01-29 12:46:11'),
	(2,2,'ПФБ',42,41,'2025-01-29 12:46:11','2025-01-29 12:46:11');

/*!40000 ALTER TABLE `laboratory_mobile_phases` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laboratory_sessions
# ------------------------------------------------------------

CREATE TABLE `laboratory_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `laboratory_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` json DEFAULT NULL,
  `is_lock_index` tinyint(1) NOT NULL DEFAULT '0',
  `is_lock_storage` tinyint(1) NOT NULL DEFAULT '0',
  `is_lock_weighting` tinyint(1) NOT NULL DEFAULT '1',
  `is_lock_cooking` tinyint(1) NOT NULL DEFAULT '1',
  `is_lock_chromatograph` tinyint(1) NOT NULL DEFAULT '1',
  `check_values` json DEFAULT NULL,
  `chromatograph_values` json DEFAULT NULL,
  `scales_weight_calibration` decimal(4,2) NOT NULL DEFAULT '0.00',
  `chromatograph_is_set` tinyint(1) NOT NULL DEFAULT '0',
  `chromatograph_is_turn_on` tinyint(1) NOT NULL DEFAULT '0',
  `chromatograph_is_open` tinyint(1) NOT NULL DEFAULT '0',
  `chromatograph_replaced` tinyint(1) NOT NULL DEFAULT '0',
  `chromatograph_pump` tinyint(1) NOT NULL DEFAULT '0',
  `chromatograph_injector` tinyint(1) NOT NULL DEFAULT '0',
  `notepad_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratory_sessions_user_id_foreign` (`user_id`),
  KEY `laboratory_sessions_laboratory_id_foreign` (`laboratory_id`),
  CONSTRAINT `laboratory_sessions_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `laboratory_sessions` WRITE;
/*!40000 ALTER TABLE `laboratory_sessions` DISABLE KEYS */;

INSERT INTO `laboratory_sessions` (`id`, `user_id`, `laboratory_id`, `uuid`, `settings`, `is_lock_index`, `is_lock_storage`, `is_lock_weighting`, `is_lock_cooking`, `is_lock_chromatograph`, `check_values`, `chromatograph_values`, `scales_weight_calibration`, `chromatograph_is_set`, `chromatograph_is_turn_on`, `chromatograph_is_open`, `chromatograph_replaced`, `chromatograph_pump`, `chromatograph_injector`, `notepad_text`, `created_at`, `updated_at`)
VALUES
	(1,1,2,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:28'),
	(2,1,2,'9c8db671-ce59-4af5-ae8a-583cb34c257a',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(3,1,2,'c2cc115c-ca4e-458e-8cc7-c1568b003291',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(4,1,2,'9d7c26d2-322b-4938-804b-12e2b2bea599',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:02'),
	(5,1,2,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60',NULL,0,0,0,1,1,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(6,1,2,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:46'),
	(7,1,2,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(8,1,2,'9094c795-c296-43b8-b559-67c14362c22b',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(9,1,2,'f8d3ae23-b0c7-4129-98cb-924ca914612a',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:48'),
	(10,1,2,'2e4622e1-bb79-473a-afa6-26bd18cd603c',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(11,1,2,'c7365bee-bcbf-42c8-9a01-537a09aaef90',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(12,1,2,'193052f3-0dae-42da-826e-0ba47a4f7e38',NULL,0,0,0,1,0,NULL,NULL,0.00,0,0,0,0,0,0,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:40');

/*!40000 ALTER TABLE `laboratory_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laboratory_steps
# ------------------------------------------------------------

CREATE TABLE `laboratory_steps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratory_id` bigint(20) unsigned NOT NULL,
  `position` bigint(20) unsigned NOT NULL DEFAULT '0',
  `pharmacological_article_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('watchVideo','readPharmacologicalArticle') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratory_steps_laboratory_id_foreign` (`laboratory_id`),
  KEY `laboratory_steps_pharmacological_article_id_foreign` (`pharmacological_article_id`),
  CONSTRAINT `laboratory_steps_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_steps_pharmacological_article_id_foreign` FOREIGN KEY (`pharmacological_article_id`) REFERENCES `pharmacological_articles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table laboratory_weighting_components
# ------------------------------------------------------------

CREATE TABLE `laboratory_weighting_components` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratory_id` bigint(20) unsigned NOT NULL,
  `stuff_component_id` bigint(20) unsigned NOT NULL,
  `filled_component_id` bigint(20) unsigned NOT NULL,
  `value_min` decimal(8,4) NOT NULL,
  `value_max` decimal(8,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratory_weighting_components_laboratory_id_foreign` (`laboratory_id`),
  KEY `laboratory_weighting_components_stuff_component_id_foreign` (`stuff_component_id`),
  KEY `laboratory_weighting_components_filled_component_id_foreign` (`filled_component_id`),
  CONSTRAINT `laboratory_weighting_components_filled_component_id_foreign` FOREIGN KEY (`filled_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_weighting_components_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_weighting_components_stuff_component_id_foreign` FOREIGN KEY (`stuff_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `laboratory_weighting_components` WRITE;
/*!40000 ALTER TABLE `laboratory_weighting_components` DISABLE KEYS */;

INSERT INTO `laboratory_weighting_components` (`id`, `laboratory_id`, `stuff_component_id`, `filled_component_id`, `value_min`, `value_max`, `created_at`, `updated_at`)
VALUES
	(29,2,26,38,0.0001,0.0200,'2025-01-29 12:46:11','2025-01-29 12:46:11'),
	(30,2,26,37,0.0001,0.0200,'2025-01-29 12:46:11','2025-01-29 12:46:11'),
	(31,2,23,41,0.0001,0.0200,'2025-01-29 12:46:11','2025-01-29 12:46:11'),
	(32,2,23,41,0.0001,0.0200,'2025-01-29 12:46:11','2025-01-29 12:46:11');

/*!40000 ALTER TABLE `laboratory_weighting_components` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'0001_01_01_000001_create_departments_table',1),
	(2,'0001_01_01_000002_create_users_table',1),
	(3,'0001_01_01_000003_create_groups_table',1),
	(4,'0001_01_01_000004_create_group_students_table',1),
	(5,'0002_01_01_000001_create_cache_table',1),
	(6,'0002_01_01_000002_create_jobs_table',1),
	(7,'2024_08_28_085638_create_personal_access_tokens_table',1),
	(8,'2024_09_04_105521_create_tickets_table',1),
	(9,'2024_09_27_123425_create_ticket_videos_table',1),
	(10,'2024_10_26_000000_create_videos_table',1),
	(11,'2024_10_27_000000_create_pharmacological_articles_table',1),
	(12,'2024_10_27_000001_create_laboratories_table',1),
	(13,'2024_10_27_000003_create_laboratory_sessions_table',1),
	(14,'2024_10_27_101927_create_components_table',1),
	(15,'2024_10_27_143331_create_session_components_table',1),
	(16,'2024_11_07_130618_create_component_laboratory_table',1),
	(17,'2024_11_07_130619_create_laboratory_weighting_components_table',1),
	(18,'2024_12_24_134816_create_laboratory_steps_table',1),
	(19,'2025_01_28_155137_create_laboratory_mobile_phases_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Models\\Admin',11,'seeder','5e4dd6dac422fcce0a5bda9425ae2685763b746b944da173eb4f24786b1d1c7f','[\"*\"]',NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50');

/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pharmacological_articles
# ------------------------------------------------------------

CREATE TABLE `pharmacological_articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pharmacological_articles` WRITE;
/*!40000 ALTER TABLE `pharmacological_articles` DISABLE KEYS */;

INSERT INTO `pharmacological_articles` (`id`, `name`, `path`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'фарм статья тест','pharmacological_articles/SwSnVp6hBKtJaQ60LdP1a5Czju005EUZPeG2geL8.pdf',NULL,'2025-01-15 12:55:57','2025-01-15 12:55:57');

/*!40000 ALTER TABLE `pharmacological_articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table session_components
# ------------------------------------------------------------

CREATE TABLE `session_components` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` enum('inCart','onWeightingTable','inSink','onScalesLeftBox','onScalesRightBox','onScalesBottomBox','onCookingTable','onPHMeter','inMixer','inBathLeftBox','inBathRightBox','inFiltrationBox','inMixBoxOne','inMixBoxTwo','inMixBoxThree','inMixBoxFour') COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_id` bigint(20) unsigned DEFAULT NULL,
  `valueStuff` bigint(20) unsigned DEFAULT NULL,
  `valueLoose` decimal(7,5) DEFAULT NULL,
  `valueLiquid` decimal(7,5) DEFAULT NULL,
  `is_weighed` tinyint(1) NOT NULL DEFAULT '0',
  `is_dirty` tinyint(1) NOT NULL DEFAULT '0',
  `mobile_phase_id` bigint(20) unsigned DEFAULT NULL,
  `weighed_value` decimal(8,4) DEFAULT NULL,
  `weighed_left_component_id` bigint(20) unsigned DEFAULT NULL,
  `weighed_right_component_id` bigint(20) unsigned DEFAULT NULL,
  `weighed_bottom_component_id` bigint(20) unsigned DEFAULT NULL,
  `weighed_left_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `weighed_right_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `weighed_bottom_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `ph_meter_value` decimal(7,4) DEFAULT NULL,
  `mixer_seconds` bigint(20) unsigned DEFAULT NULL,
  `bath_temperature` smallint(5) unsigned DEFAULT NULL,
  `bath_seconds` smallint(5) unsigned DEFAULT NULL,
  `filtered` tinyint(1) NOT NULL DEFAULT '0',
  `is_mixed` tinyint(1) NOT NULL DEFAULT '0',
  `mixed_weighed_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_one_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_two_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_three_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_four_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_weighed_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_one_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_two_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_three_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `mixed_four_session_component_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_components_component_id_foreign` (`component_id`),
  KEY `session_components_mobile_phase_id_foreign` (`mobile_phase_id`),
  KEY `session_components_weighed_left_component_id_foreign` (`weighed_left_component_id`),
  KEY `session_components_weighed_right_component_id_foreign` (`weighed_right_component_id`),
  KEY `session_components_weighed_bottom_component_id_foreign` (`weighed_bottom_component_id`),
  KEY `session_components_weighed_left_session_component_id_foreign` (`weighed_left_session_component_id`),
  KEY `session_components_weighed_right_session_component_id_foreign` (`weighed_right_session_component_id`),
  KEY `session_components_weighed_bottom_session_component_id_foreign` (`weighed_bottom_session_component_id`),
  KEY `session_components_mixed_weighed_component_id_foreign` (`mixed_weighed_component_id`),
  KEY `session_components_mixed_one_component_id_foreign` (`mixed_one_component_id`),
  KEY `session_components_mixed_two_component_id_foreign` (`mixed_two_component_id`),
  KEY `session_components_mixed_three_component_id_foreign` (`mixed_three_component_id`),
  KEY `session_components_mixed_four_component_id_foreign` (`mixed_four_component_id`),
  KEY `session_components_mixed_weighed_session_component_id_foreign` (`mixed_weighed_session_component_id`),
  KEY `session_components_mixed_one_session_component_id_foreign` (`mixed_one_session_component_id`),
  KEY `session_components_mixed_two_session_component_id_foreign` (`mixed_two_session_component_id`),
  KEY `session_components_mixed_three_session_component_id_foreign` (`mixed_three_session_component_id`),
  KEY `session_components_mixed_four_session_component_id_foreign` (`mixed_four_session_component_id`),
  KEY `session_components_session_index` (`session`),
  KEY `session_components_place_index` (`place`),
  CONSTRAINT `session_components_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_four_component_id_foreign` FOREIGN KEY (`mixed_four_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_four_session_component_id_foreign` FOREIGN KEY (`mixed_four_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_one_component_id_foreign` FOREIGN KEY (`mixed_one_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_one_session_component_id_foreign` FOREIGN KEY (`mixed_one_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_three_component_id_foreign` FOREIGN KEY (`mixed_three_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_three_session_component_id_foreign` FOREIGN KEY (`mixed_three_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_two_component_id_foreign` FOREIGN KEY (`mixed_two_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_two_session_component_id_foreign` FOREIGN KEY (`mixed_two_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_weighed_component_id_foreign` FOREIGN KEY (`mixed_weighed_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mixed_weighed_session_component_id_foreign` FOREIGN KEY (`mixed_weighed_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_mobile_phase_id_foreign` FOREIGN KEY (`mobile_phase_id`) REFERENCES `laboratory_mobile_phases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_weighed_bottom_component_id_foreign` FOREIGN KEY (`weighed_bottom_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_weighed_bottom_session_component_id_foreign` FOREIGN KEY (`weighed_bottom_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_weighed_left_component_id_foreign` FOREIGN KEY (`weighed_left_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_weighed_left_session_component_id_foreign` FOREIGN KEY (`weighed_left_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_weighed_right_component_id_foreign` FOREIGN KEY (`weighed_right_component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_components_weighed_right_session_component_id_foreign` FOREIGN KEY (`weighed_right_session_component_id`) REFERENCES `session_components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `session_components` WRITE;
/*!40000 ALTER TABLE `session_components` DISABLE KEYS */;

INSERT INTO `session_components` (`id`, `session`, `place`, `component_id`, `valueStuff`, `valueLoose`, `valueLiquid`, `is_weighed`, `is_dirty`, `mobile_phase_id`, `weighed_value`, `weighed_left_component_id`, `weighed_right_component_id`, `weighed_bottom_component_id`, `weighed_left_session_component_id`, `weighed_right_session_component_id`, `weighed_bottom_session_component_id`, `ph_meter_value`, `mixer_seconds`, `bath_temperature`, `bath_seconds`, `filtered`, `is_mixed`, `mixed_weighed_component_id`, `mixed_one_component_id`, `mixed_two_component_id`, `mixed_three_component_id`, `mixed_four_component_id`, `mixed_weighed_session_component_id`, `mixed_one_session_component_id`, `mixed_two_session_component_id`, `mixed_three_session_component_id`, `mixed_four_session_component_id`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,1,5,3,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(2,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,2,6,4,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(3,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(4,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(5,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(6,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(7,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,7,11,9,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(8,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,8,11,10,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(9,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(10,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(11,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(12,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(13,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(14,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(15,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(16,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(17,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(18,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxThree',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(19,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxTwo',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(20,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(21,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(22,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(23,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(24,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(25,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(26,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(27,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(28,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(29,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(30,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(31,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(32,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(33,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','onCookingTable',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(34,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxOne',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,11,12,14,13,7,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(35,'c6fe8b62-7309-404c-9f4f-8e41c8512a3f','inMixBoxFour',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,11,15,16,17,8,NULL,'2025-01-30 14:27:27','2025-01-30 14:27:27'),
	(36,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,36,40,38,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(37,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,37,41,39,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(38,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(39,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(40,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(41,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(42,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,42,46,44,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(43,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,43,46,45,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(44,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(45,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(46,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:28'),
	(47,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(48,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(49,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(50,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(51,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(52,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(53,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(54,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(55,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(56,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(57,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(58,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(59,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(60,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(61,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(62,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(63,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(64,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(65,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(66,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(67,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxThree',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(68,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxTwo',2,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:28','2025-01-30 14:28:29'),
	(69,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,46,47,49,48,42,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(70,'9c8db671-ce59-4af5-ae8a-583cb34c257a','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,46,50,51,52,43,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(71,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,46,69,54,53,70,'2025-01-30 14:28:29','2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(72,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,46,69,56,55,70,'2025-01-30 14:28:29','2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(73,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,46,69,58,57,70,'2025-01-30 14:28:29','2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(74,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,46,69,60,59,70,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(75,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,46,37,62,61,71,'2025-01-30 14:28:29','2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(76,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,46,75,64,63,72,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(77,'9c8db671-ce59-4af5-ae8a-583cb34c257a','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,46,36,66,65,73,NULL,'2025-01-30 14:28:29','2025-01-30 14:28:29'),
	(78,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,78,82,80,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:47','2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(79,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,79,83,81,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:47','2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(80,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(81,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(82,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(83,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(84,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,84,88,86,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(85,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,85,88,87,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(86,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(87,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(88,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(89,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(90,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(91,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(92,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(93,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(94,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(95,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(96,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(97,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(98,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(99,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(100,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(101,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(102,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(103,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(104,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(105,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(106,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(107,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(108,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(109,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:50'),
	(110,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:50'),
	(111,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,88,89,91,90,84,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:46'),
	(112,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,88,92,93,94,85,NULL,'2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(113,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,88,111,96,95,112,'2025-01-30 14:28:47','2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(114,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,88,111,98,97,112,'2025-01-30 14:28:47','2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(115,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,88,111,100,99,112,'2025-01-30 14:28:47','2025-01-30 14:28:46','2025-01-30 14:28:47'),
	(116,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,88,111,102,101,112,'2025-01-30 14:28:50','2025-01-30 14:28:46','2025-01-30 14:28:50'),
	(117,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,88,79,104,103,113,'2025-01-30 14:28:47','2025-01-30 14:28:47','2025-01-30 14:28:47'),
	(118,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,88,117,106,105,114,NULL,'2025-01-30 14:28:47','2025-01-30 14:28:47'),
	(119,'c2cc115c-ca4e-458e-8cc7-c1568b003291','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,88,78,108,107,115,'2025-01-30 14:28:50','2025-01-30 14:28:47','2025-01-30 14:28:50'),
	(120,'c2cc115c-ca4e-458e-8cc7-c1568b003291','onCookingTable',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,88,119,110,109,116,NULL,'2025-01-30 14:28:50','2025-01-30 14:28:50'),
	(121,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,121,125,123,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(122,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,122,126,124,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(123,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(124,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(125,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(126,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(127,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,127,131,129,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(128,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,128,131,130,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(129,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(130,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(131,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(132,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(133,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(134,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(135,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(136,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(137,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(138,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(139,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(140,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(141,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(142,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(143,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(144,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(145,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(146,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(147,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(148,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(149,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(150,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(151,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(152,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(153,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(154,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,131,132,134,133,127,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(155,'9d7c26d2-322b-4938-804b-12e2b2bea599','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,131,135,136,137,128,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(156,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,131,154,139,138,155,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(157,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,131,154,141,140,155,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(158,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,131,154,143,142,155,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(159,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,131,154,145,144,155,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(160,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,131,122,147,146,156,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(161,'9d7c26d2-322b-4938-804b-12e2b2bea599','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,131,160,149,148,157,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(162,'9d7c26d2-322b-4938-804b-12e2b2bea599','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,131,121,151,150,158,'2025-01-30 14:30:01','2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(163,'9d7c26d2-322b-4938-804b-12e2b2bea599','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,131,162,153,152,159,NULL,'2025-01-30 14:30:01','2025-01-30 14:30:01'),
	(164,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,164,168,166,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(165,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,165,169,167,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(166,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(167,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(168,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(169,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(170,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,170,174,172,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(171,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,171,174,173,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(172,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(173,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(174,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(175,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(176,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(177,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(178,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(179,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(180,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(181,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(182,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(183,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(184,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(185,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(186,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(187,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(188,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(189,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(190,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(191,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(192,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(193,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(194,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(195,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(196,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:30','2025-01-30 14:30:31'),
	(197,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,174,175,177,176,170,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(198,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,174,178,179,180,171,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(199,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,174,197,182,181,198,'2025-01-30 14:30:31','2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(200,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,174,197,184,183,198,'2025-01-30 14:30:31','2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(201,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,174,197,186,185,198,'2025-01-30 14:30:31','2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(202,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,174,197,188,187,198,'2025-01-30 14:30:31','2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(203,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,174,165,190,189,199,'2025-01-30 14:30:31','2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(204,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,174,203,192,191,200,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(205,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,174,164,194,193,201,'2025-01-30 14:30:31','2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(206,'a9d9c667-dc4c-4637-8656-d2d2ce8e4f60','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,174,205,196,195,202,NULL,'2025-01-30 14:30:31','2025-01-30 14:30:31'),
	(207,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,207,211,209,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(208,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,208,212,210,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(209,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(210,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(211,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(212,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(213,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,213,217,215,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(214,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,214,217,216,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(215,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(216,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(217,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(218,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(219,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(220,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(221,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(222,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(223,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(224,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(225,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(226,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(227,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(228,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(229,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(230,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(231,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(232,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(233,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(234,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(235,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(236,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(237,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(238,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(239,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(240,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,217,218,220,219,213,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(241,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,217,221,222,223,214,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(242,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,217,240,225,224,241,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(243,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,217,240,227,226,241,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(244,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,217,240,229,228,241,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(245,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,217,240,231,230,241,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(246,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,217,208,233,232,242,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(247,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,217,246,235,234,243,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(248,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,217,207,237,236,244,'2025-01-30 14:30:45','2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(249,'9f4bcae6-375d-40fb-b14d-cc4e4e064df7','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,217,248,239,238,245,NULL,'2025-01-30 14:30:45','2025-01-30 14:30:45'),
	(250,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,250,254,252,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:33:00','2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(251,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,251,255,253,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:33:00','2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(252,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(253,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(254,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(255,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(256,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,256,260,258,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:33:00','2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(257,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,257,260,259,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:33:00','2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(258,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(259,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(260,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(261,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:33:00','2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(262,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(263,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(264,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:33:00','2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(265,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(266,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(267,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(268,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(269,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(270,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(271,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(272,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(273,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(274,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(275,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(276,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(277,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(278,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(279,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(280,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(281,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(282,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:00'),
	(283,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:24'),
	(284,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:32:59','2025-01-30 14:33:24'),
	(285,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,260,261,263,262,256,NULL,'2025-01-30 14:33:00','2025-01-30 14:33:24'),
	(286,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,260,264,265,266,257,NULL,'2025-01-30 14:33:00','2025-01-30 14:33:24'),
	(287,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,260,285,268,267,286,'2025-01-30 14:33:00','2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(288,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,260,285,270,269,286,'2025-01-30 14:33:00','2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(289,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,260,285,272,271,286,'2025-01-30 14:33:00','2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(290,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,260,285,274,273,286,'2025-01-30 14:33:00','2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(291,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,260,251,276,275,287,'2025-01-30 14:33:00','2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(292,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,260,291,278,277,288,NULL,'2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(293,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,260,250,280,279,289,'2025-01-30 14:33:00','2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(294,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,260,293,282,281,290,NULL,'2025-01-30 14:33:00','2025-01-30 14:33:00'),
	(295,'ff219b98-c52a-46e6-9c1f-2e6e4a37a651','onCookingTable',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,260,285,284,283,286,NULL,'2025-01-30 14:33:24','2025-01-30 14:33:24'),
	(296,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,296,300,298,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(297,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,297,301,299,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(298,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(299,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(300,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(301,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(302,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,302,306,304,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(303,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,303,306,305,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(304,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(305,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(306,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(307,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(308,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(309,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(310,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(311,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(312,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(313,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(314,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(315,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(316,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(317,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(318,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(319,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(320,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(321,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(322,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(323,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(324,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(325,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(326,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(327,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(328,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(329,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(330,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(331,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,306,307,309,308,302,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(332,'9094c795-c296-43b8-b559-67c14362c22b','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,306,310,311,312,303,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(333,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,306,331,314,313,332,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(334,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,306,331,316,315,332,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(335,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,306,331,318,317,332,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(336,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,306,331,320,319,332,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(337,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,306,297,322,321,333,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(338,'9094c795-c296-43b8-b559-67c14362c22b','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,306,337,324,323,334,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(339,'9094c795-c296-43b8-b559-67c14362c22b','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,306,296,326,325,335,'2025-01-30 14:35:53','2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(340,'9094c795-c296-43b8-b559-67c14362c22b','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,306,339,328,327,336,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(341,'9094c795-c296-43b8-b559-67c14362c22b','inCart',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,306,331,330,329,332,NULL,'2025-01-30 14:35:53','2025-01-30 14:35:53'),
	(342,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,342,346,344,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(343,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,343,347,345,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(344,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(345,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(346,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(347,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(348,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,348,352,350,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(349,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,349,352,351,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(350,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(351,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(352,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(353,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(354,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(355,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(356,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(357,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(358,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(359,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(360,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(361,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(362,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(363,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(364,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(365,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(366,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(367,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(368,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(369,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(370,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(371,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(372,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(373,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(374,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(375,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(376,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(377,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,352,353,355,354,348,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(378,'f8d3ae23-b0c7-4129-98cb-924ca914612a','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,352,356,357,358,349,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(379,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,352,377,360,359,378,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(380,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,352,377,362,361,378,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(381,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,352,377,364,363,378,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(382,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,352,377,366,365,378,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(383,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,352,343,368,367,379,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(384,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,352,383,370,369,380,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(385,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,352,342,372,371,381,'2025-01-30 14:38:47','2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(386,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,352,385,374,373,382,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(387,'f8d3ae23-b0c7-4129-98cb-924ca914612a','inCart',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,352,377,376,375,378,NULL,'2025-01-30 14:38:47','2025-01-30 14:38:47'),
	(388,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,388,392,390,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(389,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,389,393,391,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(390,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(391,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(392,'2e4622e1-bb79-473a-afa6-26bd18cd603c','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(393,'2e4622e1-bb79-473a-afa6-26bd18cd603c','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(394,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,394,398,396,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(395,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,395,398,397,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(396,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(397,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(398,'2e4622e1-bb79-473a-afa6-26bd18cd603c','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(399,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(400,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(401,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(402,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(403,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(404,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(405,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(406,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(407,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(408,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(409,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(410,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(411,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(412,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(413,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(414,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(415,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(416,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(417,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(418,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(419,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(420,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(421,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(422,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:42:39','2025-01-30 14:42:40'),
	(423,'2e4622e1-bb79-473a-afa6-26bd18cd603c','onCookingTable',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,398,399,401,400,394,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(424,'2e4622e1-bb79-473a-afa6-26bd18cd603c','onCookingTable',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,398,402,403,404,395,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(425,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,398,423,406,405,424,'2025-01-30 14:42:40','2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(426,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,398,423,408,407,424,'2025-01-30 14:42:40','2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(427,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,398,423,410,409,424,'2025-01-30 14:42:40','2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(428,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,398,423,412,411,424,'2025-01-30 14:42:40','2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(429,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,398,389,414,413,425,'2025-01-30 14:42:40','2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(430,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,398,429,416,415,426,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(431,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,398,388,418,417,427,'2025-01-30 14:42:40','2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(432,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,398,431,420,419,428,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(433,'2e4622e1-bb79-473a-afa6-26bd18cd603c','inCart',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,398,423,422,421,424,NULL,'2025-01-30 14:42:40','2025-01-30 14:42:40'),
	(434,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,434,438,436,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(435,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,435,439,437,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(436,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(437,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(438,'c7365bee-bcbf-42c8-9a01-537a09aaef90','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(439,'c7365bee-bcbf-42c8-9a01-537a09aaef90','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(440,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,440,444,442,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(441,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,441,444,443,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(442,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(443,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(444,'c7365bee-bcbf-42c8-9a01-537a09aaef90','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(445,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(446,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(447,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(448,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(449,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(450,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(451,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(452,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(453,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(454,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(455,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(456,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(457,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(458,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(459,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(460,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(461,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(462,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(463,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(464,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(465,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(466,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(467,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(468,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(469,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inCart',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,444,445,447,446,440,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(470,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inCart',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,444,448,449,450,441,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(471,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,444,469,452,451,470,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(472,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,444,469,454,453,470,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(473,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,444,469,456,455,470,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(474,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,444,469,458,457,470,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(475,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,444,435,460,459,471,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(476,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,444,475,462,461,472,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(477,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,444,434,464,463,473,'2025-01-30 14:43:05','2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(478,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,444,477,466,465,474,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(479,'c7365bee-bcbf-42c8-9a01-537a09aaef90','inCart',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,444,469,468,467,470,NULL,'2025-01-30 14:43:05','2025-01-30 14:43:05'),
	(480,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0200,26,38,1,480,484,482,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(481,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxOne',26,NULL,NULL,NULL,1,0,NULL,0.0250,26,37,1,481,485,483,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(482,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(483,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',1,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(484,'193052f3-0dae-42da-826e-0ba47a4f7e38','onCookingTable',38,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(485,'193052f3-0dae-42da-826e-0ba47a4f7e38','onCookingTable',37,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(486,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,486,490,488,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(487,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxFour',23,NULL,NULL,NULL,1,0,NULL,0.1000,23,41,45,487,490,489,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(488,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(489,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',45,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(490,'193052f3-0dae-42da-826e-0ba47a4f7e38','onCookingTable',41,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(491,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxOne',27,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(492,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(493,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(494,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxOne',42,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(495,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(496,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(497,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(498,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(499,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(500,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(501,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(502,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(503,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(504,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(505,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',19,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(506,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(507,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(508,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(509,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',22,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(510,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(511,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',21,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(512,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(513,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',23,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(514,'193052f3-0dae-42da-826e-0ba47a4f7e38','inSink',2,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(515,'193052f3-0dae-42da-826e-0ba47a4f7e38','inCart',4,NULL,NULL,NULL,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,27,2,4,23,490,491,493,492,486,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(516,'193052f3-0dae-42da-826e-0ba47a4f7e38','inCart',4,NULL,NULL,NULL,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,42,2,4,23,490,494,495,496,487,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(517,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,490,515,498,497,516,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(518,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,490,515,500,499,516,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(519,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,490,515,502,501,516,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(520,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxFour',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,490,515,504,503,516,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(521,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxOne',19,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,19,23,490,481,506,505,517,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(522,'193052f3-0dae-42da-826e-0ba47a4f7e38','inCart',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,19,2,22,23,490,521,508,507,518,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(523,'193052f3-0dae-42da-826e-0ba47a4f7e38','inMixBoxOne',22,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,26,2,22,23,490,480,510,509,519,'2025-01-30 14:43:39','2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(524,'193052f3-0dae-42da-826e-0ba47a4f7e38','inCart',21,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,22,2,21,23,490,523,512,511,520,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39'),
	(525,'193052f3-0dae-42da-826e-0ba47a4f7e38','inCart',23,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,41,4,2,23,4,490,515,514,513,516,NULL,'2025-01-30 14:43:39','2025-01-30 14:43:39');

/*!40000 ALTER TABLE `session_components` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('7iCFDzxhzfrdMLRYxMIjRGvPCyKFhc6NB3muhGza',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXVKZ1RUVG1GUk9jQ2wyTE93NUpiMHV3b3ozMm1FTElIZFY2RjE4NiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly9sb2NhbGhvc3Qvc3RhZ2UvY29va2luZy8xOTMwNTJmMy0wZGFlLTQyZGEtODI2ZS0wYmE0N2E0ZjdlMzgiO319',1738248227);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ticket_videos
# ------------------------------------------------------------

CREATE TABLE `ticket_videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название',
  `stage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название этапа задания',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ссылка на видео',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_videos_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `ticket_videos_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ticket_videos` WRITE;
/*!40000 ALTER TABLE `ticket_videos` DISABLE KEYS */;

INSERT INTO `ticket_videos` (`id`, `ticket_id`, `name`, `stage_name`, `url`, `created_at`, `updated_at`)
VALUES
	(1,1,'Zetta Rutherford','Brendon Krajcik','http://howe.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(2,1,'Zakary Balistreri','Nyasia Ziemann','https://www.abbott.com/at-quos-hic-et-explicabo-dolores-numquam-et','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(3,1,'Millie Schuppe Sr.','Devin Rolfson','http://www.daugherty.com/consequatur-assumenda-quis-vitae-vel-distinctio-enim','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(4,1,'Maegan Jenkins','Sharon Schaefer','http://www.fisher.com/voluptatem-non-assumenda-excepturi-nemo','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(5,1,'Olin Bergnaum','Dylan Blanda','http://dietrich.info/voluptates-quod-omnis-qui','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(6,1,'Donald Mante','Aubree Nitzsche','http://www.emmerich.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(7,2,'Jaclyn Reichert','Alverta Rutherford','http://lemke.com/ex-dolorem-quam-voluptas-non-earum.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(8,2,'Talon Champlin','Cyrus Lehner','http://www.sauer.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(9,2,'Dr. Pearline Herman','Rashawn Mayert III','http://schamberger.info/molestias-est-sit-ipsum-inventore-dicta.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(10,2,'Otis Senger','Evan Sporer','http://swaniawski.org/a-iste-vero-laborum-error','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(11,2,'Jayson Wuckert','Ludwig Heaney','http://www.leffler.biz/quis-nostrum-voluptatem-sunt-qui','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(12,2,'Esther Barton','Misael Schmeler','http://www.carroll.org/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(13,3,'Jimmie Boyer','Danny McCullough','http://crona.com/quam-dolorem-amet-non','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(14,3,'Prof. Georgette Price','Ms. Matilda Bradtke','http://schamberger.com/dolores-maiores-ullam-molestias-est-aut','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(15,3,'Darby Bahringer','Dillan Dooley','http://okon.org/sint-amet-eveniet-enim-voluptates.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(16,3,'Iliana Sawayn','Moshe Ferry','http://www.beier.com/ducimus-perspiciatis-sit-voluptas-rerum','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(17,3,'Tommie Nikolaus','Odell Wisozk','http://barton.com/dolor-ea-voluptatem-mollitia-fuga-voluptates','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(18,3,'Leslie Goyette','Grayson Pouros','http://www.shields.net/beatae-quas-repellat-ab-adipisci-fugit.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(19,4,'Dr. Myah Predovic Sr.','Taya Lesch','https://www.cummerata.com/voluptas-quia-fugit-vel-asperiores-quas-eaque-molestiae','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(20,4,'Ryan Predovic','Haskell Considine DDS','http://bechtelar.org/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(21,4,'Darien Tromp Jr.','Cecile Kohler','http://www.graham.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(22,4,'Dr. Camilla Crooks V','Mrs. Dariana Senger','https://www.lakin.com/fugit-dolorem-reiciendis-iure-qui','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(23,4,'Sylvia DuBuque','Cordell Christiansen','http://www.greenfelder.com/consequatur-dolor-et-vel-sed-aperiam','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(24,4,'Alfonzo Kohler MD','Pansy Kuphal','http://cole.com/corporis-molestiae-doloribus-vel-et','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(25,5,'Prof. Alena Schmidt MD','Dr. Marcia Hegmann III','http://okon.org/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(26,5,'Vincenza Connelly','Luciano Lind V','http://www.mcglynn.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(27,5,'Cassandra Cartwright','Jacquelyn Quigley','http://kub.info/recusandae-voluptatum-enim-magni-omnis-dolorem-ratione-assumenda-dolor.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(28,5,'Prof. Nicolas Paucek','Vena Klocko','http://www.okuneva.com/cum-et-officia-a','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(29,5,'Wilburn Wiegand MD','Torrey Swift','http://prohaska.com/cumque-aperiam-debitis-laudantium-itaque','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(30,5,'Prof. Pierce Sawayn','Aron Bernier','https://will.net/et-iure-neque-ducimus-at-necessitatibus-voluptas-est-sit.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(31,6,'Dr. Brando Botsford','Davonte Morar','https://www.runolfsson.com/mollitia-eaque-dolore-quam-officiis','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(32,6,'Jocelyn Reilly','Toby Roberts','https://boehm.com/magni-vel-rerum-dolorem-quo-velit-expedita.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(33,6,'Bruce Hamill','Walton Breitenberg','http://www.leffler.org/in-adipisci-blanditiis-delectus-dignissimos-nisi-rem.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(34,6,'Aubrey Shanahan','Kade Quitzon','http://anderson.info/dolores-enim-atque-minus-aspernatur-velit-porro','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(35,6,'Jaclyn Hodkiewicz','Dion Lakin','http://www.herman.net/debitis-velit-explicabo-qui-aut-ut-alias','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(36,6,'Ashleigh Borer','Bernardo Bechtelar','http://nicolas.com/id-et-quod-minus-sed-et.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(37,7,'Patrick Walter','Annabel Dibbert','http://labadie.info/cupiditate-placeat-nostrum-deserunt-earum-aut-nemo-perferendis','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(38,7,'Hector Kozey','Gaston Adams','http://www.dare.net/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(39,7,'Mrs. Beatrice Schultz','Prof. Elmer Sawayn I','http://champlin.org/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(40,7,'Candida Bednar V','Mr. Finn Crona PhD','https://www.balistreri.com/consequatur-doloremque-quo-itaque-voluptatem-nulla','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(41,7,'Darryl Gorczany IV','Tito Herman','http://bogan.com/eligendi-eos-doloribus-quia-similique','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(42,7,'Jazmyn Torp DDS','Conor Legros','https://runolfsson.biz/provident-quam-nemo-et-sunt-quo-officia-similique-nemo.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(43,8,'Amber Hammes','Dr. Juliana Quitzon DDS','http://www.willms.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(44,8,'Dr. Vena Flatley V','Niko Rath','http://www.boyer.biz/ut-ea-consequatur-voluptatem-suscipit','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(45,8,'Maybelle Ziemann','Cleta Little','http://beier.com/nulla-sint-placeat-et-ut-et','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(46,8,'Dr. Walter Mayert','Prof. Liam Kirlin II','http://jacobson.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(47,8,'Winfield Shields','Layla Mohr','http://www.pollich.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(48,8,'Gia Erdman','Van Moen','https://www.hill.com/non-perferendis-cum-perspiciatis-autem-distinctio','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(49,9,'Lyric Padberg','Chaim Jacobs','http://wiza.net/ipsum-id-ullam-rem-ad-aut-ut-ut','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(50,9,'Haleigh Schinner','Prof. Clemens Stroman Sr.','https://hahn.com/nihil-neque-velit-et-eum.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(51,9,'Santos Krajcik','Kirsten Abshire','http://ferry.com/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(52,9,'Aidan Davis MD','Dorcas D\'Amore','http://www.buckridge.org/ab-ipsa-sint-et-vero-error-dolor','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(53,9,'Krystal Barton','Laurie Collier','http://www.steuber.net/omnis-quod-qui-ut-dolorum-vel-molestiae','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(54,9,'Earlene Pagac','Regan Blick','http://www.zieme.info/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(55,10,'Kathryn Kunze','Lavern Hill','http://lubowitz.org/','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(56,10,'Daphney Little','Jorge Cormier','http://russel.com/quaerat-sed-sint-quisquam-qui-praesentium-iusto','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(57,10,'Dr. Evalyn Wintheiser','Trudie Corkery','http://www.halvorson.org/dolor-est-aut-error-dolorem-adipisci-ea-cupiditate','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(58,10,'Nedra Daugherty','Jaydon Schinner MD','https://www.ondricka.com/nihil-fuga-et-molestiae-et-tempora','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(59,10,'Joe Armstrong','Mauricio Murphy','http://www.cummerata.com/omnis-non-sunt-quis-ex-officia-voluptatem.html','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(60,10,'Dr. Houston Paucek','Dagmar Lynch I','https://klocko.info/sit-nihil-in-ad-aut-itaque-neque-itaque.html','2024-11-29 19:20:51','2024-11-29 19:20:51');

/*!40000 ALTER TABLE `ticket_videos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tickets
# ------------------------------------------------------------

CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '№ Билета',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название билета',
  `description_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание задания (путь на диске)',
  `description_original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание задания (название файла)',
  `article_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Фармакопейная статья (путь на диске)',
  `article_original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Фармакопейная статья (название файла)',
  `level` enum('base','prof') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Уровень сложности',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;

INSERT INTO `tickets` (`id`, `number`, `title`, `description_path`, `description_original_name`, `article_path`, `article_original_name`, `level`, `created_at`, `updated_at`)
VALUES
	(1,'#340','occaecati','/tmp/fakerftkvZl','fakerfTFGDw','/tmp/faker9pRuCP','fakerIo1a1H','prof','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(2,'#953','est','/tmp/fakerojfxBr','fakeroPTCI4','/tmp/faker2XmEq0','fakerRuj7pr','base','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(3,'#852','blanditiis','/tmp/fakerG6nuYj','fakerh8JEfP','/tmp/fakerxxlMTT','fakerf1N6Zd','prof','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(4,'#879','nostrum','/tmp/fakerTHxJM8','fakerFyRupN','/tmp/fakerWg8PBI','fakerV1Lhut','prof','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(5,'#659','rerum','/tmp/fakerUMP3Ou','fakerHFsksv','/tmp/fakerasb9jq','fakeruOUARN','prof','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(6,'#187','consequatur','/tmp/faker5dEM5E','fakerpdkdKz','/tmp/faker3CJvsN','fakerB4StoT','prof','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(7,'#553','atque','/tmp/faker1RLNtV','fakerVSkZDO','/tmp/fakerOQHbum','fakerubJjzM','prof','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(8,'#236','corporis','/tmp/faker8dsnz3','fakeraYSZ5L','/tmp/fakerL2Bf74','fakerpfpu61','base','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(9,'#363','aut','/tmp/fakermjlWYx','fakerzxy79b','/tmp/fakerGIr4HY','fakerGfHi3J','base','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(10,'#626','ab','/tmp/fakerNuMDy8','fakerVmRXgc','/tmp/fakerd3Rpcw','fakerv5eS8J','prof','2024-11-29 19:20:51','2024-11-29 19:20:51');

/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Полное имя',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Электронная почта',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Пароль',
  `role` enum('admin','teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student' COMMENT 'Роль',
  `department_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Кафедра',
  `regalia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Регалии',
  `age` smallint(5) unsigned DEFAULT NULL COMMENT 'Возраст',
  `teacher_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Преподаватель',
  `date_of_birth` date DEFAULT NULL COMMENT 'Дата рождения',
  `education_mode` enum('learning','exam') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Режим обучения',
  `education_status` enum('Waiting','InWork','Exam','ExamDone','Done') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Статус',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_index` (`role`),
  KEY `users_department_id_foreign` (`department_id`),
  KEY `users_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `department_id`, `regalia`, `age`, `teacher_id`, `date_of_birth`, `education_mode`, `education_status`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Tyra Keebler','mclaughlin.nellie@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',1,'Nihil eveniet possimus quasi sit aut rerum. Velit quia et laborum dolorem quia deleniti. Voluptates voluptas quo vero amet expedita in quia. Sunt nesciunt ratione totam.',7,NULL,NULL,NULL,NULL,'zwMrD5t5j0','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(2,'Adela Towne','icarter@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',2,'Corrupti ipsum omnis commodi ut impedit excepturi. Voluptas dignissimos quia veniam iusto dolorem enim illum doloribus. Eum veniam et dolorem quia aut quo modi. Eos culpa rerum dolor est sed.',29,NULL,NULL,NULL,NULL,'Ee2EKWJlo7','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(3,'Wade Hand','earmstrong@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',3,'Qui aut aut et. Ea ea autem minus natus aut. Repellat hic aut dolorum perferendis quo aut nihil. A labore quo totam similique ut.',27,NULL,NULL,NULL,NULL,'zuV9UE1UXO','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(4,'Shanie Williamson','theller@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',4,'Veritatis aut optio nihil deserunt voluptatem inventore dolorem. Ipsum ea et rerum ipsum accusantium.',9,NULL,NULL,NULL,NULL,'WzhzVrJrdk','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(5,'Rosalia Langworth','olson.meredith@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',5,'Eveniet quidem omnis aut consectetur. Maiores quasi dicta nobis ducimus iure facere. Est maiores ea ducimus nulla. Tempore molestiae alias perferendis illum praesentium error.',18,NULL,NULL,NULL,NULL,'V6AIVByRA7','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(6,'Burley Jacobs','valentina.steuber@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',6,'Veniam adipisci tempore qui fugit. Sed placeat inventore alias rerum cupiditate quibusdam dolorum. Et autem molestiae enim.',11,NULL,NULL,NULL,NULL,'jY9x33yR2r','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(7,'Annetta McKenzie','gudrun64@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',7,'Natus iste necessitatibus beatae blanditiis. Atque ullam nihil aut omnis quasi debitis quibusdam ipsam. Et dolores et quos enim omnis provident. Ut quaerat eligendi maxime dolorum ab molestias.',82,NULL,NULL,NULL,NULL,'IML1vqcxYw','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(8,'Dulce Dickinson','jarvis.kuphal@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',8,'Repudiandae asperiores illum ut enim. Soluta neque saepe qui deleniti. Autem aliquam quo cumque. Maiores quae ipsam eum nihil ut sunt ipsum. Voluptatem corporis perferendis quia tenetur.',3,NULL,NULL,NULL,NULL,'Kw2aGebAFk','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(9,'Kaley Purdy','darrin30@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',9,'Ipsam quo iusto sed voluptate maxime consequuntur voluptatem. Et in voluptatem fugit id dignissimos nihil a. Tempora ea nemo sunt sed iusto est animi vitae.',49,NULL,NULL,NULL,NULL,'UYri0hUpkw','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(10,'Dario Krajcik','dare.celine@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',10,'Et ad in sit ut laborum aut voluptatem. Totam esse aut quam aliquid sint tenetur ipsa.',100,NULL,NULL,NULL,NULL,'VZGkPlRpse','2024-11-29 19:20:49','2024-11-29 19:20:49'),
	(11,'Adell Goyette','admin@test.com','$2y$12$nMkVbnnENbr22k.ma89Jv.G7cirqNvMeipv61jZWLhFJEX8GeIPGO','admin',21,'Voluptas ut maxime iste. Rerum quis libero et. Ut eum voluptatibus corporis accusantium.',97,NULL,NULL,NULL,NULL,'O0YKOqYuFn','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(12,'Lyda Olson','student@test.com','$2y$12$wBjZDRNs93ErfHK8i7mrxOPHC6Vrxq08E8lrvEcwbhABtSNPcIbXu','student',NULL,NULL,NULL,NULL,'1979-04-29','exam','Waiting','mS0ivuk4xQ','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(13,'Jada Greenfelder','harold20@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',22,'Blanditiis facere cupiditate magnam iure. Culpa iste dicta nisi et nesciunt voluptatum nesciunt. Excepturi aliquam odio vel quia non sint omnis. Dolor eligendi aliquid ut eos.',62,NULL,NULL,NULL,NULL,'GI1EIhFzLC','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(14,'Clotilde Nikolaus','brock45@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',23,'In voluptas necessitatibus maiores voluptas officia ut. Omnis deserunt ut dolorem corrupti. Est et quae dolores impedit aut. Voluptatem quis corrupti qui commodi error ut esse.',62,NULL,NULL,NULL,NULL,'bBQ22nnrz8','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(15,'Stephon Howell','buck15@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',24,'Excepturi et et alias adipisci hic explicabo aliquam. At nam ea ratione sunt facere. Autem eos id quo adipisci.',46,NULL,NULL,NULL,NULL,'63JDGf7hMN','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(16,'Einar Purdy','dion.tremblay@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',25,'Quia et odit est id deleniti esse dolor. Et ea voluptas quos quae. Aut dolorem inventore aliquid officia facere quasi qui. Iure aliquid assumenda odio recusandae.',56,NULL,NULL,NULL,NULL,'SFTerOthpc','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(17,'Leland Bayer','feil.pete@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',26,'Iste aut qui dignissimos eius voluptatem sunt. Aliquid suscipit est est ut ut corrupti quibusdam.',68,NULL,NULL,NULL,NULL,'mHCVMjVYhK','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(18,'Halle Hyatt','tturner@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',27,'Architecto voluptas fugit molestiae sunt velit exercitationem voluptatem. Fugit recusandae consequuntur in culpa in sequi consequatur excepturi. Praesentium dolore accusantium quaerat voluptatibus.',3,NULL,NULL,NULL,NULL,'mIp3W1AYdK','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(19,'Frederick Crooks','wendell07@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',28,'Cupiditate porro dicta est nesciunt explicabo officiis. Saepe dolorum neque delectus consequuntur adipisci inventore vel. Quas rem praesentium quo.',75,NULL,NULL,NULL,NULL,'8qulGaQDUZ','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(20,'Raymond Gutmann','howell.fay@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',29,'Odit sunt laudantium ad voluptas eveniet tempora eum. Velit voluptate unde ex minima quod. Assumenda earum at similique rerum dolorum. Animi ut voluptas ad ut occaecati minima.',48,NULL,NULL,NULL,NULL,'U4PoijnCee','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(21,'Irma Simonis','olen54@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',30,'Ea labore rerum repellendus. Aut tempora facilis nemo consequuntur. Aut eum facilis ab aperiam doloremque dolores sunt.',21,NULL,NULL,NULL,NULL,'rqeOry8HuG','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(22,'Geo Schiller','schuppe.ralph@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','admin',31,'Culpa magni vero quos quaerat dolorem quasi in quod. Repellat sapiente et illo labore occaecati quia dolorem ab. Maiores et et consequatur corrupti nostrum id.',3,NULL,NULL,NULL,NULL,'DYPAHQIlyE','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(23,'Jamarcus Stracke',NULL,NULL,'teacher',32,'Quod quasi consequuntur voluptatem. Perferendis maxime rem dolor nam ut odit. Architecto architecto voluptatibus similique ut delectus deserunt.',11,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(24,'Rigoberto Batz',NULL,NULL,'teacher',33,'Vel omnis ut quidem necessitatibus soluta est omnis qui. Sit perspiciatis saepe nemo dolorem modi doloribus. Et porro hic officiis nostrum in.',26,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(25,'Ari Brekke',NULL,NULL,'teacher',34,'Ipsam perspiciatis odio beatae id quidem. Enim tempore accusantium explicabo non. Non sit id sapiente. Ut sed est nam ea. Et beatae voluptatibus pariatur non.',28,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(26,'Arielle Wuckert II',NULL,NULL,'teacher',35,'Voluptas voluptatibus nihil nihil dolores dolorem nihil ratione. Rem voluptatem dolorem deserunt expedita sint. Sunt vel voluptatem placeat omnis maiores doloremque provident.',83,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(27,'Destiney Von',NULL,NULL,'teacher',36,'Quas reiciendis quo iusto facere quidem. Officiis provident ducimus aut sapiente dolorem. Hic voluptatibus qui eaque dolor rem maxime magni. Non expedita ut ipsum molestiae.',2,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(28,'Leonie Bosco',NULL,NULL,'teacher',37,'Sunt ut consequuntur expedita nisi dolorem est. Sint et modi facilis sapiente voluptas. Hic impedit quod quis esse totam et et.',77,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(29,'Eloy Herman',NULL,NULL,'teacher',38,'Ipsa repudiandae fugit eius exercitationem. Quisquam facere officia quos enim magni qui iure. Dolor a molestiae accusamus at aspernatur.',11,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(30,'Colby Gusikowski',NULL,NULL,'teacher',39,'Exercitationem nihil nesciunt nihil nam itaque esse iure. Voluptatem cum eaque aperiam aut eos voluptates a. Totam commodi delectus reprehenderit saepe aliquam consequatur delectus sit.',27,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(31,'Ladarius Satterfield',NULL,NULL,'teacher',40,'Alias nihil ipsa sit non soluta. Rerum aspernatur libero est magnam veritatis. Qui omnis velit quas sint veniam dolorum ex exercitationem. Est voluptas incidunt officia suscipit magnam nobis in.',45,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(32,'Rodger Braun',NULL,NULL,'teacher',41,'Necessitatibus enim et sint cum est. Atque non qui dignissimos nihil quasi quisquam. Illum nihil tenetur accusantium ipsam qui ut sit. Omnis hic beatae facilis ipsam dolor.',44,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(33,'Dr. Osborne Jenkins',NULL,NULL,'teacher',42,'Dolor eum esse et commodi culpa omnis culpa molestias. Cumque ea provident beatae sint velit earum esse voluptate. Quis id cum iure distinctio quia est quo. Nobis quibusdam voluptatem voluptate nisi.',64,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(34,'Samir Maggio Sr.',NULL,NULL,'teacher',43,'Enim optio et explicabo perspiciatis veritatis. Corporis illo iure quod sit ratione cumque est. Magni est non omnis fuga consequatur quia non. Impedit commodi deserunt est ex.',1,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(35,'Mr. Regan Jast I',NULL,NULL,'teacher',44,'Accusantium magnam sunt dolores repudiandae. Eveniet eos iste laboriosam quis. Nobis quaerat impedit veritatis mollitia voluptatem quis.',80,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(36,'Nedra Jaskolski MD',NULL,NULL,'teacher',45,'Laborum nesciunt tempora quia consequatur aliquid eaque et. Accusantium voluptate sunt quis et. Laboriosam labore inventore exercitationem rerum dolorem.',83,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(37,'Shania Hickle II',NULL,NULL,'teacher',46,'Qui magnam iste architecto vero magni. Explicabo dolorem est sint natus. Fuga libero officiis dolor beatae aut est odit. Enim quidem sed architecto beatae.',46,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(38,'Serenity Schmitt','mertz.markus@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,33,'1993-01-26','learning','ExamDone','xcPdzYvojR','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(39,'Hildegard Thompson','zboncak.brendon@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1968-03-12','exam','Waiting','yGFQ88u5R0','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(40,'Isabell Stracke','okeefe.anderson@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1941-01-28','learning','Done','NbthmE6IpQ','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(41,'Missouri Bartoletti','lessie15@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1945-05-25','learning','Waiting','G7umH4DjRK','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(42,'Maymie Stanton','osatterfield@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,34,'1926-03-22','exam','Waiting','ijm9wbS2if','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(43,'Pablo Stamm','demarco.feil@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1971-04-23','exam','Exam','hilo9uWRdo','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(44,'Jerod Bergnaum','antonina30@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,35,'1975-08-26','exam','Exam','mdR48rZtY6','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(45,'Hyman Dickens','rolfson.orin@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,36,'1970-08-20','learning','Done','iamiY4wIdo','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(46,'Myrtle McGlynn','mclaughlin.gerard@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1935-07-24','learning','ExamDone','JHDlLhenUT','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(47,'Hildegard Prohaska','clinton.jakubowski@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,37,'1987-11-27','exam','Waiting','Qyu7PWX54R','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(48,'Alex Watsica',NULL,NULL,'teacher',47,'Qui distinctio tempore cupiditate. Esse adipisci possimus provident dolor aut. Nobis rerum consequatur dicta. Velit cupiditate beatae perferendis ad beatae non.',60,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(49,'Miss Marlen Cormier',NULL,NULL,'teacher',48,'Voluptatem placeat saepe eum aut. Ut quia minima laboriosam voluptas reprehenderit. Repellat assumenda sint doloremque hic.',44,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(50,'Torey Halvorson',NULL,NULL,'teacher',49,'Fugiat tenetur aut rerum consequatur. Voluptatibus ut maxime dolorem at voluptatem. Sapiente cupiditate omnis eius doloribus. Aliquam ut temporibus dignissimos id rerum.',78,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(51,'Deangelo Kunde II',NULL,NULL,'teacher',50,'Veniam ipsa quia quis saepe possimus et delectus. Harum at suscipit veniam quam magni. Distinctio provident ut a dolorum voluptatem blanditiis nemo.',45,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(52,'Zechariah McDermott',NULL,NULL,'teacher',51,'Dicta eius nemo voluptatem voluptatum quis ea optio. Inventore esse modi porro qui natus. Quia doloribus nesciunt impedit ea voluptatum neque repellendus et.',42,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(53,'Dr. Aliyah Champlin V',NULL,NULL,'teacher',52,'Dolores quibusdam et harum rerum cumque non aliquid. Nulla pariatur deserunt reprehenderit delectus debitis. Molestias id itaque velit beatae animi ullam cupiditate.',83,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(54,'Aron Stracke',NULL,NULL,'teacher',53,'Sed aperiam aut omnis delectus sint quod aliquid. Vero itaque ut et quae. Error in sed nobis numquam voluptatem rerum.',68,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(55,'Felipe Cormier',NULL,NULL,'teacher',54,'Est laudantium sed non. Est sed eum est voluptas debitis non et et. Quia accusantium animi sed ratione consequatur et. Explicabo error qui inventore dolorum.',75,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(56,'Amalia Hegmann',NULL,NULL,'teacher',55,'Eius occaecati autem maiores sint quisquam. Ut et excepturi non dolores. Laborum iste ut voluptas provident eligendi libero. Qui sed iusto non accusantium non.',35,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(57,'Vallie Erdman',NULL,NULL,'teacher',56,'Repellendus assumenda aspernatur qui quas. Nulla in quaerat et tempora quibusdam. Distinctio est officiis est quas sit quis. Aut vel molestias voluptates expedita aliquid.',7,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(58,'Mustafa O\'Conner','gerhold.omari@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1945-01-21','learning','Done','D6iBo7Ifng','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(59,'Irma Walter','candida.maggio@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1934-02-14','exam','Waiting','BbjZvWf8ne','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(60,'Kylie Grady','koepp.alexa@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1943-12-17','exam','Exam','Jte32jdAqM','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(61,'Aliza Russel','nnicolas@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1964-11-21','learning','Exam','DHO8ZDStrJ','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(62,'Celestino Champlin',NULL,NULL,'teacher',57,'Quo tempore dignissimos laboriosam eius at amet. Natus architecto fugiat et ab voluptatem. Aperiam et dolorem asperiores deserunt dolores. Et quis nesciunt reiciendis omnis et minima.',76,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(63,'Enrico Stokes','ymorissette@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1960-11-12','learning','InWork','nV9NcuTGbx','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(64,'Stephanie Bauch','juanita.schoen@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1979-04-21','learning','Exam','HvNxI2iXxT','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(65,'Cassidy Mosciski','runolfsson.sim@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1959-04-15','learning','ExamDone','7pichh9mlj','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(66,'Mittie Dicki','tommie08@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,62,'1954-10-21','exam','Done','TFl46FdYiW','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(67,'Dr. Thomas Langworth',NULL,NULL,'teacher',58,'Et sit atque quis beatae in maxime. Asperiores harum ad expedita quas. Omnis velit animi sit sint voluptas quis. Harum qui sint similique iure nulla rem.',41,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(68,'Mrs. Calista Gottlieb Jr.',NULL,NULL,'teacher',59,'Dolorum velit corporis repellendus qui. Omnis voluptate quis ut dolores enim. Rerum quae et amet tenetur veritatis illo illo.',74,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(69,'Ricardo Funk',NULL,NULL,'teacher',60,'Iste non et quia beatae maiores consequuntur. Dolor tempore repudiandae voluptatum aperiam iste. Quibusdam porro dolore et officiis rerum quibusdam.',23,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(70,'Sibyl Schroeder','amalia02@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,67,'1980-03-04','learning','Waiting','Gh2XIblhYX','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(71,'Vito Bauch','crist.zora@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,68,'1952-06-07','exam','InWork','i3Sk6Ohhrg','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(72,'Dayton Hermiston','ismael05@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1974-12-03','exam','Done','ok6HKKzaHV','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(73,'Luz Leuschke','odie60@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,69,'1979-10-16','exam','Done','zgk6yIKxgY','2024-11-29 19:20:50','2024-11-29 19:20:50'),
	(74,'Samantha Green DDS',NULL,NULL,'teacher',61,'Et facere exercitationem est odit velit autem in doloribus. Est in itaque ut sint adipisci et dolorum. Minus ipsa minima delectus harum vitae consequuntur enim. Eum et veritatis quos accusamus.',27,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(75,'Mr. Maximus Dietrich',NULL,NULL,'teacher',62,'Qui qui necessitatibus modi nulla facere qui. Voluptates laborum architecto quia dolorem ab dolorum. Recusandae animi harum libero similique aut.',93,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(76,'Murray Boyle','mia71@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,74,'2005-11-29','learning','ExamDone','HLTGWi5sUU','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(77,'Clarissa Franecki','dexter.witting@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1992-03-04','learning','InWork','0wKWbXHYS2','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(78,'Gussie Dicki','giles.leffler@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,75,'2003-12-22','learning','Exam','gxTHbBVkpa','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(79,'Maximillia Langworth','isabelle93@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1944-02-10','exam','Done','CD4gOypF0G','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(80,'Kirk Farrell',NULL,NULL,'teacher',63,'Velit quidem neque quasi aliquam. Blanditiis non quia distinctio inventore dolorum. Numquam numquam commodi quos culpa eligendi atque.',69,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(81,'Dr. Terrill Keeling I',NULL,NULL,'teacher',64,'Enim exercitationem quia nemo aspernatur. Ratione non nam neque exercitationem doloremque qui. Est sequi soluta eius rerum.',71,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(82,'Isaac Jacobson','cole.jazlyn@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1966-03-27','learning','Waiting','ETaHxLhXzO','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(83,'Linda Simonis','mrippin@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,80,'1975-06-12','learning','Waiting','txCrsOLbxA','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(84,'Modesto Haag','darrion69@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,81,'2006-09-16','exam','InWork','iUjtPZHNyy','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(85,'Sam Purdy','naomi08@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1991-06-20','learning','Waiting','MwbBTnuhgp','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(86,'Zelma Kemmer DVM',NULL,NULL,'teacher',65,'Omnis enim inventore quos aliquid nostrum est ullam. Veritatis est aut recusandae dolores non reiciendis. Itaque voluptatibus modi dolores quia id saepe. Omnis et maxime consequatur explicabo et et.',26,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(87,'Lonzo Mraz Sr.',NULL,NULL,'teacher',66,'Numquam architecto maxime aut sit quasi. Cumque qui dolores quaerat in sed dolores. Asperiores excepturi laborum asperiores et consectetur et officiis.',49,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(88,'Emery Yost',NULL,NULL,'teacher',67,'Ut eos voluptatibus suscipit beatae. Perspiciatis ea cumque officiis ut sit aliquid atque. Voluptas enim sunt debitis dolores.',61,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(89,'Dr. Milo Goldner',NULL,NULL,'teacher',68,'Ex autem delectus voluptatum fugit inventore. Sit unde sed doloribus. Harum sequi cupiditate molestiae enim nostrum molestias accusamus. Eum cum consequatur tempora omnis repellendus.',16,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(90,'Chance McDermott','gorczany.berta@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,86,'1978-02-12','learning','ExamDone','kShJnYYuH9','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(91,'Cassandra Ritchie','lavon.mayer@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,87,'1971-07-17','exam','Done','8woo1atvy1','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(92,'Fannie Herman','pdickinson@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,88,'1944-09-14','learning','ExamDone','eq89GRumG3','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(93,'Malachi Walker','rolfson.kamryn@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,89,'1962-11-22','exam','InWork','lzNwNSl7Nd','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(94,'Junior Lang',NULL,NULL,'teacher',69,'Commodi quod vero voluptatem facilis. Doloremque omnis qui vitae. Quod ullam rem autem pariatur est saepe. Ipsam soluta commodi voluptatum temporibus ducimus sunt quibusdam.',98,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(95,'Bridget Murazik',NULL,NULL,'teacher',70,'Maxime porro rerum sed in consequatur. Officiis esse laboriosam numquam optio enim distinctio quos. Est eaque numquam rerum similique quia qui modi animi.',22,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(96,'Connor Zieme','brendon21@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1935-10-29','learning','Waiting','aM3tZHeCKr','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(97,'Gus Watsica','dorris.hintz@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,94,'1962-10-26','learning','Waiting','M7Tivyv1s5','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(98,'Juliet Leffler','ebert.bert@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,95,'1944-07-21','exam','Done','jNpRHN1uy6','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(99,'Brianne Kihn','lera27@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1996-10-06','exam','InWork','58LHQ3pNJ5','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(100,'Lacy Prosacco',NULL,NULL,'teacher',71,'Velit repudiandae voluptate ea qui sunt at illum. Velit ea quam dignissimos ad iure voluptatem. Nam eius quae qui adipisci vel ut.',40,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(101,'Miss Daisy Windler Jr.',NULL,NULL,'teacher',72,'A est hic eaque voluptate dolor quos est et. Ab deleniti est quisquam minus. Eos qui dolores tempora. Eum officiis magnam alias impedit. Optio cupiditate optio dignissimos sit facere laborum rerum.',1,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(102,'Alessandra Leffler','keven88@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,100,'1982-08-13','learning','Waiting','gyHSP7A3qg','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(103,'Kattie Carter','kiehn.oma@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1931-09-14','learning','Waiting','8SgnPNkn6Y','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(104,'Vernie Beier','brown.lynch@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1996-03-20','exam','ExamDone','hyX2othoLj','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(105,'Llewellyn Rosenbaum','jamison.kling@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,101,'2001-12-10','exam','ExamDone','31jZZcA99v','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(106,'Mr. Tommie Crooks I',NULL,NULL,'teacher',73,'Sed culpa voluptas voluptates eos provident sint error. Incidunt illum iusto nihil aliquam. Consequatur quo debitis maiores dolores.',67,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(107,'Rafaela Steuber','constance79@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,106,'1968-11-28','exam','InWork','vR7SmFjk3r','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(108,'Madge Murphy','tatum.lind@example.net','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1954-08-04','learning','Waiting','JoN4nXkMqW','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(109,'Lesly Leffler','dach.jovani@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1986-12-13','learning','Exam','iMU63HhH7a','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(110,'Clementine Effertz','sferry@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1948-07-20','exam','Done','y5n4PZvVro','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(111,'Miss Estella Shields',NULL,NULL,'teacher',74,'Modi quaerat id rerum unde ut qui laborum. Aut qui fugiat tempora repellat ab minus quos. Fugit aliquam cumque odit ut laborum cumque rerum.',79,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(112,'Lois Stehr',NULL,NULL,'teacher',75,'Et nihil corrupti fugiat inventore placeat aut corporis. Ad doloremque ad ex ut ipsam officia modi fuga.',37,NULL,NULL,NULL,NULL,NULL,'2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(113,'Tyshawn Kertzmann','alison.mitchell@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1957-09-16','exam','Waiting','9EHt2Opq9Q','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(114,'Juwan Huels','ortiz.jennyfer@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,111,'1965-02-24','exam','Waiting','OikgUyVzCh','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(115,'Miguel Conroy','brittany.schuppe@example.org','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,112,'1961-05-04','exam','Done','guRWbKPsv9','2024-11-29 19:20:51','2024-11-29 19:20:51'),
	(116,'Ethel Lueilwitz','wprohaska@example.com','$2y$12$qV03Wh1NxtxyBoruiSHY0uHkl/ZUPPbwASpN5YgjDfM.kk7ruJYXi','student',NULL,NULL,NULL,NULL,'1935-12-14','exam','InWork','Ga04QS0Kyz','2024-11-29 19:20:51','2024-11-29 19:20:51');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table videos
# ------------------------------------------------------------

CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;

INSERT INTO `videos` (`id`, `name`, `path`, `original_name`, `size`, `created_at`, `updated_at`)
VALUES
	(1,'видео с миксером','videos/GYItFK416rPfNZeRstWcFNe6wqBnWNW8Q83JcvoR.mp4','freecompress-mixer.mp4',877944,'2025-01-15 12:55:16','2025-01-15 12:55:16');

/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
