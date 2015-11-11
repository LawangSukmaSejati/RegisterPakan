-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `acl_resources`;
CREATE TABLE `acl_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('module','controller','action','other') NOT NULL DEFAULT 'other',
  `parent` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `acl_resources` (`id`, `name`, `type`, `parent`, `created`, `modified`) VALUES
(1,	'welcome',	'module',	NULL,	'2012-11-12 12:07:26',	NULL),
(2,	'authorize',	'module',	NULL,	'2012-11-12 04:00:23',	NULL),
(3,	'authorize/login',	'controller',	2,	'2012-11-12 12:43:42',	'2012-11-12 12:44:06'),
(4,	'authorize/logout',	'controller',	2,	'2012-11-12 12:43:56',	NULL),
(5,	'authorize/user',	'controller',	2,	'2012-11-12 04:07:59',	'2012-11-12 08:29:29'),
(6,	'acl',	'module',	NULL,	'2012-02-02 13:47:43',	NULL),
(7,	'acl/resource',	'controller',	6,	'2012-02-02 13:47:57',	NULL),
(8,	'acl/resource/index',	'action',	7,	'2012-02-02 13:48:21',	NULL),
(9,	'acl/resource/add',	'action',	7,	'2012-02-02 13:48:35',	'2012-10-16 17:26:12'),
(10,	'acl/resource/edit',	'action',	7,	'2012-02-02 13:48:50',	'2012-07-09 18:44:38'),
(11,	'acl/resource/delete',	'action',	7,	'2012-02-02 13:49:06',	NULL),
(12,	'acl/role',	'controller',	6,	'2012-07-12 17:54:16',	NULL),
(13,	'acl/role/index',	'action',	12,	'2012-07-12 17:55:29',	NULL),
(14,	'acl/role/add',	'action',	12,	'2012-07-12 17:56:00',	NULL),
(15,	'acl/role/edit',	'action',	12,	'2012-07-12 17:56:19',	NULL),
(16,	'acl/role/delete',	'action',	12,	'2012-07-12 17:56:55',	NULL),
(17,	'acl/rule',	'controller',	6,	'2012-07-12 17:53:04',	NULL),
(18,	'acl/rule/edit',	'action',	17,	'2012-07-12 17:53:25',	NULL),
(24,	'setup',	'module',	NULL,	'2015-06-20 14:07:00',	NULL),
(25,	'setup/menu',	'controller',	24,	'2015-06-20 14:07:47',	NULL),
(26,	'setup/menu/index',	'action',	25,	'2015-06-20 14:08:14',	NULL),
(27,	'setup/menu/add',	'action',	25,	'2015-06-20 14:08:30',	'2015-06-20 14:08:50'),
(28,	'setup/menu/edit',	'action',	25,	'2015-06-20 14:09:39',	NULL),
(29,	'setup/menu/delete',	'action',	25,	'2015-06-20 14:10:33',	NULL),
(34,	'setup/koperasi',	'controller',	24,	'2015-06-21 10:26:03',	NULL),
(45,	'file',	'module',	NULL,	'2015-10-22 07:19:46',	NULL),
(46,	'file/registrasi',	'controller',	45,	'2015-10-22 07:20:03',	NULL);

DROP TABLE IF EXISTS `acl_roles`;
CREATE TABLE `acl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=26;

INSERT INTO `acl_roles` (`id`, `name`, `created`, `modified`) VALUES
(1,	'Administrator',	'2011-12-27 12:00:00',	NULL),
(2,	'Guest',	'2011-12-27 12:00:00',	NULL),
(3,	'Staf',	'2012-11-12 04:30:02',	'2015-06-20 18:37:02'),
(4,	'Manager',	'2012-11-12 04:30:24',	NULL);

DROP TABLE IF EXISTS `acl_role_parents`;
CREATE TABLE `acl_role_parents` (
  `role_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`,`parent`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `acl_role_parents` (`role_id`, `parent`, `order`) VALUES
(4,	3,	0);

DROP TABLE IF EXISTS `acl_rules`;
CREATE TABLE `acl_rules` (
  `role_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `access` enum('allow','deny') NOT NULL DEFAULT 'deny',
  `priviledge` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`,`resource_id`),
  KEY `resource_id` (`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `acl_rules` (`role_id`, `resource_id`, `access`, `priviledge`) VALUES
(2,	1,	'allow',	NULL),
(2,	2,	'allow',	NULL),
(2,	3,	'allow',	NULL),
(2,	4,	'allow',	NULL),
(4,	2,	'allow',	NULL),
(4,	5,	'allow',	NULL);

DROP TABLE IF EXISTS `auth_autologin`;
CREATE TABLE `auth_autologin` (
  `user` int(11) NOT NULL,
  `series` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`user`,`series`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `auth_users`;
CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `registered` datetime NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `auth_users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `lang`, `registered`, `role_id`) VALUES
(1,	'Administrator ',	'Tea Change',	'admin',	'admin@koperasi.com',	'$2a$08$k8ExsWAe1qAyk2A/0tbvoeg/ahOb6DpQBnohcZvG79TNr28K5vNHe',	'en',	'2012-03-15 19:23:59',	1),
(2,	'Ardi',	'Soebrata',	'ardissoebrata',	'ardissoebrata@gmail.com',	'$2a$08$KZRME/RCMM.ikhJvS9IQtOD/qQcM/922akreUjQ7fgL6BanTAwsIm',	'en',	'2012-03-09 12:57:48',	4),
(3,	'Test',	'TestLast',	'test',	'test@test.com',	'test',	'en',	'2012-11-09 10:58:34',	2),
(4,	'Jafar',	'Jafar',	'Jafar',	'sidik@gmail.com',	'$2a$08$2bxOAffgRUPksG4Ay4j/Sew9dDsb6eU4iWZHIGJj54eoY6f8xobJe',	'en',	'2015-06-21 09:34:52',	4);

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ef7394ee0dec8a27ddffdb188cfc9e0f',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',	1445875565,	'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:13:\"Administrator\";s:9:\"auth_user\";s:1:\"1\";s:13:\"auth_loggedin\";b:1;s:4:\"lang\";s:2:\"en\";s:7:\"role_id\";s:1:\"1\";}'),
('fd71818dddcbb676d327c4b3c0658492',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',	1445875564,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:5:\"Guest\";}');

DROP TABLE IF EXISTS `tr_member`;
CREATE TABLE `tr_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tr_member` (`id`, `id_unit`, `nik`, `fullname`, `active`) VALUES
(1,	2,	'208700885',	'Jafar Sidik',	0),
(2,	3,	'12381928',	'',	0);

DROP TABLE IF EXISTS `tr_menu`;
CREATE TABLE `tr_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(40) DEFAULT NULL,
  `icon` varchar(40) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descr` text,
  `parent_id` int(11) DEFAULT '0',
  `resource_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resource_id` (`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tr_menu` (`id`, `code`, `icon`, `label`, `name`, `descr`, `parent_id`, `resource_id`, `active`, `role_id`) VALUES
(50,	'Phone Book',	'',	'Phone Book',	'Phone Book',	'',	0,	45,	0,	NULL),
(51,	'Phone Group',	'',	'Phone Group',	'Phone Group',	'',	50,	46,	0,	NULL),
(52,	'Contact',	'',	'Contact',	'Contact',	'',	50,	46,	0,	NULL),
(53,	'SMS',	'',	'SMS',	'SMS',	'',	0,	1,	0,	NULL),
(54,	'New SMS',	'',	'New SMS',	'New SMS',	'',	53,	1,	0,	NULL),
(55,	'Inbox',	'',	'Inbox',	'Inbox',	'',	53,	1,	0,	NULL),
(56,	'Outbox',	'',	'Outbox',	'Outbox',	'',	53,	1,	0,	NULL),
(57,	'Utility',	'',	'Utility',	'Utility',	'',	0,	1,	0,	NULL),
(58,	'AR',	'',	'Auto Replay',	'Auto Replay',	'',	57,	1,	0,	NULL),
(59,	'Scheduler',	'',	'Scheduler',	'Scheduler',	'',	57,	1,	0,	NULL),
(60,	'SMS Template',	'',	'SMS Template',	'SMS Template',	'',	57,	1,	0,	NULL),
(61,	'Setting',	'',	'Setting',	'Setting',	'',	0,	1,	0,	NULL),
(62,	'Operator',	'',	'Operator',	'Operator',	'',	61,	1,	0,	NULL),
(63,	'WA API',	'',	'Wahatsapp API',	'Wahatsapp API',	'',	61,	1,	0,	NULL),
(64,	'Forwarded',	'',	'Forwarded',	'Forwarded',	'',	57,	1,	0,	NULL),
(65,	'Email Forwarding',	'',	'Email Forwarding',	'Email Forwarding',	'',	57,	1,	0,	NULL),
(66,	'Delivery Report',	'',	'Delivery Report',	'Delivery Report',	'',	53,	1,	0,	NULL);

-- 2015-10-26 17:07:23