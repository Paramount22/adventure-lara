-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dude_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `dude_id`, `user_id`, `text`, `created_at`, `updated_at`) VALUES
(2,	5,	1,	'Superb',	'2019-09-05 15:40:43',	'2019-09-07 15:07:23'),
(3,	5,	1,	'ascacacs',	'2019-09-05 15:45:44',	'2019-09-05 15:45:44'),
(5,	9,	1,	'Nice :-))',	'2019-09-07 10:27:53',	'2019-09-07 12:51:57'),
(6,	10,	1,	'Marceline',	'2019-09-07 12:55:03',	'2019-09-07 12:55:03'),
(7,	7,	1,	'Candy canes jelly gingerbread.',	'2019-09-08 05:23:02',	'2019-09-08 05:23:02');

DROP TABLE IF EXISTS `dudes`;
CREATE TABLE `dudes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `dudes` (`id`, `user_id`, `title`, `text`, `slug`, `created_at`, `updated_at`) VALUES
(5,	1,	'Jake the Dog',	'Jake (full title: Jake the Dog), the deuteragonist of Adventure Time, is a dog/shape-shifter hybrid, referred to by others as a \"magical dog,\" and Finn\'s constant companion, best friend, and adoptive brother. Jake has a unique set of abilities called Stretchy Powers that allow him to manipulate the shape and size of his body, coming in handy on innumerable occasions throughout his and Finn\'s adventures. Jake was 28 years old at his debut in \"magical dog years,\" and ages throughout the series, though he rarely acts mature.',	'jake-the-dog',	'2019-09-05 13:48:53',	'2019-09-05 13:48:53'),
(7,	1,	'Finn the Human',	'Finn was, for a long time, the only confirmed human in the Land of Ooo. The reason for this is revealed in the episode \"Her Parents,\" as Lady Rainicorn\'s dad believed that humans were extinct.\r\n\r\nUp until \"Susan Strong,\" Finn believes he has never met another human and becomes morose and \"soul-searchy\" when he thinks about it. However, Finn encounters Susan Strong a member of a tribe of mutants called Hyoomans.',	'finn-the-human',	'2019-09-06 16:18:14',	'2019-09-06 16:19:02'),
(8,	1,	'Ice King',	'Simon Petrikov, formerly known as the Ice King, is a major character conceived to be, but no longer acting as the main antagonist of Adventure Time. Originally depicted as a two-dimensional, humorously over-the-top villain trying to kidnap Princess Bubblegum on a regular basis, the character\'s personality was subsequently expanded, revealing him to be a kind-hearted but misunderstood old man with completely twisted senses of morality and social behavior, suffering from loneliness and memory loss.',	'ice-king',	'2019-09-06 16:20:51',	'2019-09-06 16:20:51'),
(9,	1,	'Princess Bubblegum',	'Princess Bonnibel \"Bonnie\" Bubblegum (often called PB and occasionally Peebles or P-Bubs)[10] is a main character in the series Adventure Time and first appeared in the animated short.\r\n\r\nPrincess Bubblegum is the current incarnation of the Candy Elemental, comparable to the inhabitants of the Candy Kingdom, who are all composed of types of desserts and candies.',	'princess-bubblegum',	'2019-09-06 16:21:42',	'2019-09-06 16:22:26'),
(10,	1,	'Marceline',	'Marceline (full title: Marceline the Vampire Queen) is one of the main characters in Adventure Time. Marceline is a fun-loving 1,000-year-old vampire queen. Unlike a traditional vampire, Marceline does not need to drink blood to survive; rather, she eats the color red. Marceline is also an avid musician who plays an electric bass that she made from her family\'s heirloom battle-axe.',	'marceline',	'2019-09-06 16:23:01',	'2019-09-06 16:23:01');

DROP TABLE IF EXISTS `dude_tag`;
CREATE TABLE `dude_tag` (
  `dude_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`dude_id`,`tag_id`),
  KEY `dude_id` (`dude_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dude_tag` (`dude_id`, `tag_id`) VALUES
(5,	1),
(5,	3),
(7,	2),
(7,	3),
(7,	5),
(9,	1),
(9,	2),
(9,	3),
(10,	4),
(10,	5),
(11,	3),
(11,	4);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tags` (`id`, `tag`) VALUES
(1,	'Cookie'),
(2,	'Donut'),
(3,	'Chocolate'),
(4,	'Candy'),
(5,	'Gingerbread');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Paramount',	'paramount@paramount.com',	NULL,	'$2y$10$dp9S2c6BHI5Aa7NXTI/Cc.2XPappO0LmZXQ9PV/Ge4vyd6MV7lT2O',	NULL,	'2019-09-03 16:42:26',	'2019-09-03 16:42:26'),
(2,	'Zabka',	'zabka@gmail.com',	NULL,	'$2y$10$s3rBkGcNO/xlUHXDd/BnqOsF7iHctQZD/fr85ImXR.RjW2Hlc6a5.',	NULL,	'2019-09-06 15:35:43',	'2019-09-06 15:35:43');

-- 2019-09-08 16:16:47
