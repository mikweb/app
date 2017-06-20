-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2017 at 02:55 AM
-- Server version: 10.0.30-MariaDB-0+deb8u2
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c0rat`
--

-- --------------------------------------------------------

--
-- Table structure for table `nova_options`
--

CREATE TABLE IF NOT EXISTS `nova_options` (
`id` int(11) NOT NULL,
  `group` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nova_pages`
--

CREATE TABLE IF NOT EXISTS `nova_pages` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `language` varchar(3) NOT NULL,
  `visible` varchar(3) DEFAULT 'Yes',
  `front` varchar(3) NOT NULL DEFAULT 'Yes',
  `published_date` datetime DEFAULT NULL,
  `head_title` varchar(255) DEFAULT NULL,
  `head_description` text,
  `head_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_pages`
--

INSERT INTO `nova_pages` (`id`, `user_id`, `type`, `title`, `slug`, `content`, `image`, `language`, `visible`, `front`, `published_date`, `head_title`, `head_description`, `head_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 1, 'product', 'chopper', 'chopper', '<p>\r\nPellentesque eget vehicula justo. Nulla facilisi. Quisque vel porta \r\nodio. Praesent semper eu nunc a faucibus. In augue ligula, vehicula sit \r\namet nibh id, sodales faucibus lacus. Sed placerat et diam ut \r\nconsectetur. Ut sollicitudin, purus rhoncus dapibus elementum, neque \r\norci tristique orci, a congue est nulla nec justo. Phasellus tincidunt \r\nmetus eget dui volutpat, nec accumsan risus convallis. Interdum et \r\nmalesuada fames ac ante ipsum primis in faucibus. Aliquam id vestibulum \r\nerat, vel volutpat felis. Nullam sed purus sodales, malesuada elit eu, \r\nmollis velit.\r\n</p>\r\n<p>\r\nProin volutpat arcu ut mauris vulputate consequat. Cras placerat semper \r\nnulla sit amet accumsan. Duis ultrices lorem ut vulputate ultricies. Sed\r\n laoreet risus posuere, tristique purus porta, pulvinar massa. \r\nPellentesque fermentum lorem nisi, nec viverra leo ultrices eget. \r\nVestibulum id ultrices metus, id consectetur nunc. In enim dolor, \r\nelementum a nulla sit amet, vehicula auctor augue. Donec blandit id \r\nrisus non porta. Phasellus ac vehicula augue, vel sollicitudin risus.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421b1b08800-chopper.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:25:23', '', '', NULL, '2017-06-15 04:28:59', '2017-06-15 04:28:59', NULL),
(15, 1, 'product', 'nami', 'nami', '<p>\r\nSed molestie sapien quis nunc ullamcorper pretium. Nulla ornare ex nec \r\nnunc imperdiet, condimentum interdum arcu gravida. Maecenas at urna \r\nscelerisque, posuere magna non, euismod ipsum. Nam vitae sapien \r\nhendrerit, laoreet odio at, tempor turpis. Donec pharetra ipsum non \r\nlibero tempus, eu ullamcorper nunc eleifend. Etiam aliquam, nisi sit \r\namet lacinia rutrum, nibh nunc interdum urna, eu ullamcorper mi neque in\r\n urna. Aenean commodo lacus ac libero accumsan tempus vitae vitae elit. \r\nVivamus suscipit condimentum tellus at interdum. Etiam sed sem in nunc \r\nultricies pharetra. Morbi suscipit accumsan leo, id fermentum elit. \r\nProin iaculis elit nibh, ut malesuada orci dapibus at. Nunc lacus nulla,\r\n viverra vitae aliquet aliquam, molestie eu dui. Vestibulum interdum \r\nvelit quis neque efficitur bibendum. Proin bibendum condimentum urna \r\neget posuere.\r\n</p>\r\n<p>\r\nPraesent rutrum quam eu dolor consequat, quis auctor lacus vestibulum. \r\nPellentesque non tristique nisi, iaculis molestie purus. In hac \r\nhabitasse platea dictumst. Ut ullamcorper enim eu consequat pretium. Sed\r\n quis volutpat tortor. Maecenas vel euismod purus. Quisque vitae \r\npellentesque neque.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421b4f67863-nami.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:29:19', '', '', NULL, '2017-06-15 04:29:51', '2017-06-15 04:29:51', NULL),
(16, 1, 'product', 'usopp', 'usopp', '<p>\r\nVestibulum feugiat lacus sit amet purus efficitur, ac congue ipsum \r\nsodales. Donec sit amet nunc quis purus fermentum fringilla. \r\nPellentesque fringilla lectus faucibus, rhoncus diam at, commodo lectus.\r\n Cras ac velit faucibus augue molestie mattis. Etiam vitae dapibus erat,\r\n eu rhoncus ex. Interdum et malesuada fames ac ante ipsum primis in \r\nfaucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nPellentesque habitant morbi tristique senectus et netus et malesuada \r\nfames ac turpis egestas. Praesent eget convallis enim. Morbi facilisis \r\naccumsan sem, quis pharetra sem egestas eget. Fusce in dapibus urna.\r\n</p>\r\n<p>\r\nAliquam erat volutpat. Phasellus sit amet congue erat. Aenean ipsum \r\nturpis, ultricies non iaculis et, auctor ac ligula. Maecenas molestie, \r\naugue in convallis congue, velit dolor interdum lectus, a venenatis \r\ndolor ipsum sed arcu. Fusce id nisi sapien. Cras at porttitor ante. \r\nProin sodales orci consectetur magna tristique, quis venenatis felis \r\nelementum. Mauris et congue lacus. Nam dictum tincidunt lacus vel \r\nconvallis. Sed gravida mauris quis luctus interdum. Nullam bibendum vel \r\nmassa ut commodo. Sed sed feugiat quam. Mauris at sodales mauris, \r\ntincidunt maximus quam. Duis lacinia ultrices libero, et tempus purus \r\ntempus at. Phasellus sit amet convallis erat, a auctor felis.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421b9a8b9a8-usopp.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:29:56', '', '', NULL, '2017-06-15 04:31:06', '2017-06-15 04:31:06', NULL),
(17, 1, 'product', 'sanji', 'sanji', '<p>\r\nAenean maximus eget enim et dignissim. Sed maximus justo consequat \r\naliquet ultricies. Nam ultrices nisi non eros porttitor, non maximus \r\nvelit volutpat. Vivamus efficitur blandit pharetra. Ut cursus velit nec \r\naliquet volutpat. Nulla placerat justo non blandit hendrerit. Donec \r\ndapibus dapibus ipsum, et dapibus lacus aliquet non. Integer at \r\nvenenatis ipsum.\r\n</p>\r\n<p>\r\nNullam et efficitur dolor. Vivamus ac arcu sodales, euismod justo ut, \r\nvulputate est. Ut ut bibendum erat. Ut interdum justo eget sollicitudin \r\nporta. Suspendisse ipsum metus, rhoncus id pulvinar non, tristique nec \r\npurus. Nam ut dignissim augue. Duis faucibus nunc eu purus sollicitudin \r\nconsequat. Donec pretium tristique arcu, non pretium nisi tempor et. Nam\r\n posuere commodo tortor sit amet porttitor. Aliquam ultrices finibus \r\ndiam, non blandit dui faucibus vitae. In hac habitasse platea dictumst. \r\nSuspendisse semper tristique enim, vel hendrerit ex commodo quis. Fusce \r\nsed est commodo, suscipit dolor vitae, gravida felis.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421bc3bdf92-sanji.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:31:14', '', '', NULL, '2017-06-15 04:31:47', '2017-06-15 04:31:47', NULL),
(18, 1, 'product', 'zoro', 'zoro', '<p>\r\nFusce ullamcorper nunc imperdiet orci feugiat, ut tristique ante \r\nconvallis. Integer bibendum ipsum nisl, non tempus tellus mattis sit \r\namet. Suspendisse potenti. Mauris ut lacinia nisl. Nulla facilisi. Sed \r\npulvinar ante nulla, in ultricies ex rhoncus eget. Sed non aliquet \r\nlacus, sed commodo nisi. Cras aliquam, metus ac lacinia fermentum, purus\r\n elit feugiat arcu, id tempor leo lacus vitae nisl. Phasellus pretium \r\ninterdum placerat. Integer ac dui in felis mollis vestibulum. Praesent \r\nsed pharetra leo. Praesent sed nisi non quam feugiat scelerisque et \r\nvitae mauris. Ut felis turpis, commodo ac felis ut, eleifend pretium \r\nrisus. Phasellus ex ipsum, lobortis vitae elit eget, ultrices convallis \r\nmassa.\r\n</p>\r\n<p>\r\nDonec venenatis ornare neque, non dictum quam condimentum nec. Sed \r\ndictum nisi risus, non facilisis quam congue id. Maecenas cursus tempor \r\nurna ac dapibus. Aliquam sit amet felis a augue varius fringilla et vel \r\naugue. Phasellus hendrerit eget quam vel commodo. Mauris aliquet auctor \r\nlorem, vitae dictum ante molestie vel. Cras sit amet purus enim. Nam id \r\nhendrerit nisi. Morbi sodales, dui et viverra vestibulum, arcu nibh \r\nfacilisis augue, vitae molestie ligula felis eget augue. Cras vitae \r\nblandit lectus. Morbi eu libero sit amet dui ultrices aliquam sit amet \r\nvestibulum magna. Maecenas vel sodales mauris. Ut id gravida ex.\r\n</p>\r\n<p>\r\nAenean tincidunt orci augue, quis aliquet ex tincidunt ac. Ut \r\npellentesque sed arcu non ornare. Vestibulum rutrum risus lorem, sit \r\namet luctus lacus ullamcorper id. Sed egestas, ipsum et tempus pulvinar,\r\n enim nulla sollicitudin orci, nec eleifend odio justo ut neque. Duis \r\neget lacus placerat ex mollis dapibus. Lorem ipsum dolor sit amet, \r\nconsectetur adipiscing elit. Etiam tempor, purus varius eleifend \r\nscelerisque, metus felis mattis ex, dapibus ornare ipsum tellus vitae \r\narcu. Sed at felis et nisl consequat fermentum a et risus. Suspendisse \r\net est odio. Proin eget mollis metus. Duis elit nisi, viverra ut egestas\r\n id, semper ut arcu. Donec convallis rutrum lectus, vitae rhoncus metus \r\nconsectetur tincidunt. Vivamus semper pellentesque eros, at bibendum mi \r\nhendrerit ac. Curabitur eleifend elit ipsum, id sagittis sapien \r\ncondimentum eu. Mauris auctor leo ac magna placerat, vitae aliquet justo\r\n ornare.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421bfaa6212-zoro.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:32:05', '', '', NULL, '2017-06-15 04:32:42', '2017-06-15 04:32:42', NULL),
(19, 1, 'product', 'luffy', 'luffy', '<p>\r\nSuspendisse laoreet augue ante, non rutrum odio imperdiet ac. \r\nPellentesque habitant morbi tristique senectus et netus et malesuada \r\nfames ac turpis egestas. Etiam fermentum blandit libero, vulputate \r\nlacinia dolor ultricies vitae. Quisque id quam sit amet felis sodales \r\ncondimentum. Vestibulum ornare odio et ligula feugiat, in volutpat metus\r\n sollicitudin. Fusce scelerisque vitae mi non feugiat. Donec sed \r\nhendrerit magna, et viverra sem. Quisque eget metus vitae ex tincidunt \r\naccumsan sit amet ut risus. In ornare massa in tortor mattis, mattis \r\nbibendum nisi mollis. Quisque finibus non ex sagittis gravida. \r\nPellentesque fringilla blandit tortor, ut interdum dui scelerisque quis.\r\n Aliquam et nulla ligula. Mauris interdum leo sit amet ornare blandit.\r\n</p>\r\n<p>\r\nPraesent quis blandit mi. Vivamus nec quam eget tortor fermentum semper \r\nid convallis velit. Sed blandit ut urna a maximus. Orci varius natoque \r\npenatibus et magnis dis parturient montes, nascetur ridiculus mus. \r\nVivamus quis nulla egestas, consequat turpis eget, faucibus neque. In \r\nblandit, purus at efficitur efficitur, lectus dui suscipit enim, vel \r\nfacilisis urna mi id augue. Vivamus sed tincidunt neque.\r\n</p>\r\n<p>\r\nCurabitur fringilla felis a est mollis cursus. Sed a ipsum erat. Etiam \r\nmollis ligula ut lacus rhoncus vehicula. Donec nec nisl nibh. Etiam sed \r\nfelis ornare, malesuada dolor quis, eleifend mauris. Quisque vestibulum \r\ncondimentum nunc, pellentesque suscipit lacus sagittis vel. Ut non odio \r\nmauris. Donec eu felis eros. Aliquam quis efficitur quam. Donec bibendum\r\n tempor nisl nec fermentum. Etiam et ipsum in felis vulputate imperdiet \r\nquis semper urna.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421c1d2f611-luffy.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:32:07', '', '', NULL, '2017-06-15 04:33:17', '2017-06-15 04:33:17', NULL),
(20, 1, 'product', 'one piece', 'one-piece', '<p>\r\nCras tincidunt hendrerit egestas. Nam sem ipsum, euismod dignissim \r\neuismod et, varius et enim. Aliquam erat volutpat. Phasellus tincidunt \r\ntellus leo, at gravida ipsum porta a. Aenean consectetur sem eget ante \r\nimperdiet hendrerit. Morbi tristique sodales massa eget tempus. In \r\nlectus metus, fringilla eu ornare vel, iaculis ac erat. Proin euismod \r\nante sit amet mi congue euismod. Donec eget urna eget justo sagittis \r\nsuscipit vitae in dolor. Proin vehicula ipsum ipsum, id porttitor felis \r\nblandit vel. Nam aliquam tincidunt enim vitae feugiat. Pellentesque \r\naliquam ex quis ipsum lacinia hendrerit. Donec ullamcorper quis nunc \r\nposuere sollicitudin. Sed volutpat nulla eget turpis vestibulum \r\ntincidunt. Nulla facilisi.\r\n</p>\r\n<p>\r\nVestibulum feugiat lacus sit amet purus efficitur, ac congue ipsum \r\nsodales. Donec sit amet nunc quis purus fermentum fringilla. \r\nPellentesque fringilla lectus faucibus, rhoncus diam at, commodo lectus.\r\n Cras ac velit faucibus augue molestie mattis. Etiam vitae dapibus erat,\r\n eu rhoncus ex. Interdum et malesuada fames ac ante ipsum primis in \r\nfaucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nPellentesque habitant morbi tristique senectus et netus et malesuada \r\nfames ac turpis egestas. Praesent eget convallis enim. Morbi facilisis \r\naccumsan sem, quis pharetra sem egestas eget. Fusce in dapibus urna.\r\n</p>\r\n<p>\r\nAliquam erat volutpat. Phasellus sit amet congue erat. Aenean ipsum \r\nturpis, ultricies non iaculis et, auctor ac ligula. Maecenas molestie, \r\naugue in convallis congue, velit dolor interdum lectus, a venenatis \r\ndolor ipsum sed arcu. Fusce id nisi sapien. Cras at porttitor ante. \r\nProin sodales orci consectetur magna tristique, quis venenatis felis \r\nelementum. Mauris et congue lacus. Nam dictum tincidunt lacus vel \r\nconvallis. Sed gravida mauris quis luctus interdum. Nullam bibendum vel \r\nmassa ut commodo. Sed sed feugiat quam. Mauris at sodales mauris, \r\ntincidunt maximus quam. Duis lacinia ultrices libero, et tempus purus \r\ntempus at. Phasellus sit amet convallis erat, a auctor felis.\r\n</p>\r\n<p>\r\nEtiam dictum, ex in finibus sagittis, velit elit ullamcorper risus, ut \r\nsuscipit nibh risus a turpis. Etiam egestas eros sed hendrerit \r\nconsequat. Nunc congue velit enim, at faucibus neque maximus non. Donec \r\ndapibus luctus est, id congue nisl rhoncus nec. Morbi arcu dui, \r\ncondimentum at sollicitudin quis, malesuada eu leo. Maecenas ligula \r\nipsum, euismod ultrices mauris quis, volutpat gravida metus. Quisque \r\nquis enim volutpat, semper dui in, volutpat leo. Donec et augue vel quam\r\n porttitor consequat sed in erat. Pellentesque enim metus, cursus non \r\naliquet ac, consequat id sem. Proin congue nisi elementum arcu dictum \r\nblandit. Vivamus pretium ipsum vitae dapibus efficitur. Nulla quis \r\naliquam magna, tincidunt mollis arcu. Nam tempus dignissim lacus. Etiam \r\nvitae lorem a lacus euismod gravida. Praesent ut nibh id dui tempus \r\ndictum.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/59421c62e6b93-all.jpg', 'en', 'Yes', 'Yes', '2017-06-15 06:33:36', '', '', NULL, '2017-06-15 04:34:26', '2017-06-15 04:34:26', NULL),
(21, 1, 'article', 'Nova page', 'nova-page', '<p>\r\nAliquam erat volutpat. Phasellus sit amet congue erat. Aenean ipsum \r\nturpis, ultricies non iaculis et, auctor ac ligula. Maecenas molestie, \r\naugue in convallis congue, velit dolor interdum lectus, a venenatis \r\ndolor ipsum sed arcu. Fusce id nisi sapien. Cras at porttitor ante. \r\nProin sodales orci consectetur magna tristique, quis venenatis felis \r\nelementum. Mauris et congue lacus. Nam dictum tincidunt lacus vel \r\nconvallis. Sed gravida mauris quis luctus interdum. Nullam bibendum vel \r\nmassa ut commodo. Sed sed feugiat quam. Mauris at sodales mauris, \r\ntincidunt maximus quam. Duis lacinia ultrices libero, et tempus purus \r\ntempus at. Phasellus sit amet convallis erat, a auctor felis.\r\n</p>\r\n<p>\r\nEtiam dictum, ex in finibus sagittis, velit elit ullamcorper risus, ut \r\nsuscipit nibh risus a turpis. Etiam egestas eros sed hendrerit \r\nconsequat. Nunc congue velit enim, at faucibus neque maximus non. Donec \r\ndapibus luctus est, id congue nisl rhoncus nec. Morbi arcu dui, \r\ncondimentum at sollicitudin quis, malesuada eu leo. Maecenas ligula \r\nipsum, euismod ultrices mauris quis, volutpat gravida metus. Quisque \r\nquis enim volutpat, semper dui in, volutpat leo. Donec et augue vel quam\r\n porttitor consequat sed in erat. Pellentesque enim metus, cursus non \r\naliquet ac, consequat id sem. Proin congue nisi elementum arcu dictum \r\nblandit. Vivamus pretium ipsum vitae dapibus efficitur. Nulla quis \r\naliquam magna, tincidunt mollis arcu. Nam tempus dignissim lacus. Etiam \r\nvitae lorem a lacus euismod gravida. Praesent ut nibh id dui tempus \r\ndictum.\r\n</p>', '/var/www/clients/client0/web8/private/assets/images/pages/5942b70a10332-nova.png', 'en', 'Yes', 'Yes', '2017-06-15 17:33:05', '', '', NULL, '2017-06-15 15:34:18', '2017-06-15 15:34:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nova_password_reminders`
--

CREATE TABLE IF NOT EXISTS `nova_password_reminders` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nova_roles`
--

CREATE TABLE IF NOT EXISTS `nova_roles` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_roles`
--

INSERT INTO `nova_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(2, 'Administrator', 'administrator', 'Full access to create, edit, and update companies, and orders.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(3, 'Manager', 'manager', 'Ability to create new companies and orders, or edit and update any existing ones.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(4, 'Company Manager', 'company-manager', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(5, 'User', 'user', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-06-05 01:48:00', '2016-06-05 01:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `nova_sessions`
--

CREATE TABLE IF NOT EXISTS `nova_sessions` (
  `id` varchar(255) NOT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nova_users`
--

CREATE TABLE IF NOT EXISTS `nova_users` (
`id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activated` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_users`
--

INSERT INTO `nova_users` (`id`, `role_id`, `username`, `password`, `realname`, `email`, `activated`, `image`, `activation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Administrator', 'admin@novaframework.dev', 1, NULL, NULL, 'JVGqyYQL8YxHZfGMquGniJ881Ncc6lOW8GW8fhgxrviaq1jN4NUaNwwYA8Rv', '2016-06-03 10:15:00', '2017-06-18 05:53:04'),
(2, 2, 'marcus', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Marcus Spears', 'marcus@novaframework.dev', 1, NULL, NULL, NULL, '2016-06-03 10:19:00', '2016-06-03 10:19:00'),
(3, 3, 'michael', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Michael White', 'michael@novaframework.dev', 1, NULL, NULL, NULL, '2016-06-03 10:20:00', '2016-06-05 14:22:19'),
(4, 5, 'john', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'John Kennedy', 'john@novaframework.dev', 1, '/var/www/clients/client0/web8/private/assets/images/users/593cb4c1d3da6-luffy.jpg', NULL, 'lPDH0ltCr2QhJWCwUb7oNTVJjvmt5rSzA46PPovwX1ZhZ5zfwdBZ0PQZIkQS', '2016-06-03 10:21:00', '2017-06-11 02:18:24'),
(5, 5, 'mark', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Mark Black', 'mark@novaframework.dev', 1, NULL, NULL, 'Thy1Qch4HAsrFSovmXphvxPk2L56w4v5xuJPHt3t1HMU3JDWFzl6a8pbGRkL', '2016-06-03 10:22:00', '2017-06-18 06:02:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nova_options`
--
ALTER TABLE `nova_options`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_pages`
--
ALTER TABLE `nova_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_password_reminders`
--
ALTER TABLE `nova_password_reminders`
 ADD KEY `email` (`email`), ADD KEY `token` (`token`);

--
-- Indexes for table `nova_roles`
--
ALTER TABLE `nova_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_sessions`
--
ALTER TABLE `nova_sessions`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nova_users`
--
ALTER TABLE `nova_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nova_options`
--
ALTER TABLE `nova_options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nova_pages`
--
ALTER TABLE `nova_pages`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `nova_roles`
--
ALTER TABLE `nova_roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nova_users`
--
ALTER TABLE `nova_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
