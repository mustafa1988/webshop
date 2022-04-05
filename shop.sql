-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 20 feb 2020 kl 11:06
-- Serverversion: 5.7.26
-- PHP-version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `shop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Tabellstruktur `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'adimn@admin.com', 1582135829);

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `payment_firstname` varchar(32) NOT NULL,
  `payment_lastname` varchar(32) NOT NULL,
  `payment_company` varchar(60) NOT NULL,
  `payment_address_1` varchar(128) NOT NULL,
  `payment_address_2` varchar(128) NOT NULL,
  `payment_city` varchar(128) NOT NULL,
  `payment_postcode` varchar(10) NOT NULL,
  `payment_country` varchar(128) NOT NULL,
  `payment_custom_field` text NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `payment_code` varchar(128) NOT NULL,
  `shipping_firstname` varchar(32) NOT NULL,
  `shipping_lastname` varchar(32) NOT NULL,
  `shipping_company` varchar(40) NOT NULL,
  `shipping_address_1` varchar(128) NOT NULL,
  `shipping_address_2` varchar(128) NOT NULL,
  `shipping_city` varchar(128) NOT NULL,
  `shipping_postcode` varchar(10) NOT NULL,
  `shipping_country` varchar(128) NOT NULL,
  `shipping_method` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `order_status_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `firstname`, `lastname`, `email`, `telephone`, `payment_firstname`, `payment_lastname`, `payment_company`, `payment_address_1`, `payment_address_2`, `payment_city`, `payment_postcode`, `payment_country`, `payment_custom_field`, `payment_method`, `payment_code`, `shipping_firstname`, `shipping_lastname`, `shipping_company`, `shipping_address_1`, `shipping_address_2`, `shipping_city`, `shipping_postcode`, `shipping_country`, `shipping_method`, `comment`, `total`, `order_status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, '', '', '', '', 'mustafa', 'riyadh', '', 'lextorpsvägen', '', '46164', '46164', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 0, 0, '2020-02-19 23:30:57', '0000-00-00 00:00:00'),
(2, 0, '', '', '', '', 'mustafa', 'riyadh', '', 'lextorpsvägen', '', 'trollhättan', '46165', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 0, 0, '2020-02-19 23:37:51', '0000-00-00 00:00:00'),
(3, 0, '', '', '', '', 'Mustafa', 'Riyadh', '', 'lextorpsvägen 577', '', 'trollhättan', '46164', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 0, 0, '2020-02-20 10:25:46', '0000-00-00 00:00:00'),
(4, 0, '', '', '', '', 'test order', 'order', '', 'order', '', 'Göteborg', '1111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 0, 0, '2020-02-20 10:31:02', '0000-00-00 00:00:00'),
(5, 0, '', '', '', '', 'Peter', 'karlson', '', 'test', '', 'test', '11111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 0, 0, '2020-02-20 10:33:07', '0000-00-00 00:00:00'),
(6, 0, '', '', '', '', 'mustafa', 'riyadh', '', 'test', '', 'test', '111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 0, 0, '2020-02-20 10:34:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `order_rows`
--

DROP TABLE IF EXISTS `order_rows`;
CREATE TABLE IF NOT EXISTS `order_rows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `order_rows`
--

INSERT INTO `order_rows` (`id`, `order_id`, `qty`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 337, '12.0000', '2020-02-19 23:30:57', '0000-00-00 00:00:00'),
(2, 1, 1, 336, '12.0000', '2020-02-19 23:30:57', '0000-00-00 00:00:00'),
(3, 2, 12, 337, '12.0000', '2020-02-19 23:37:51', '0000-00-00 00:00:00'),
(4, 2, 1, 336, '12.0000', '2020-02-19 23:37:51', '0000-00-00 00:00:00'),
(5, 3, 12, 1, '149.0000', '2020-02-20 10:25:46', '0000-00-00 00:00:00'),
(6, 4, 2, 1, '149.0000', '2020-02-20 10:31:02', '0000-00-00 00:00:00'),
(7, 5, 1, 1, '149.0000', '2020-02-20 10:33:07', '0000-00-00 00:00:00'),
(8, 6, 3, 1, '149.0000', '2020-02-20 10:34:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `weight` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `length` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `width` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `height` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `image`, `price`, `weight`, `length`, `width`, `height`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Produkt 1', 82, 'https://www.redfeatherreleaf.com/wp-content/uploads/2019/08/test-product-not-for-sale-300x300.jpg', '149.0000', '200.00000000', '10.00000000', '10.00000000', '10.00000000', 0, '2020-02-20 10:24:44', '2020-02-20 10:34:05');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `salt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `salt`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1582193559, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
