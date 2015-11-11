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
(47,	'smsgateway',	'module',	NULL,	'2015-11-04 04:25:07',	NULL),
(48,	'smsgateway/messages',	'controller',	47,	'2015-11-04 04:27:00',	NULL),
(49,	'smsgateway/contact',	'controller',	47,	'2015-11-04 04:32:25',	NULL),
(50,	'smsgateway/setting',	'controller',	47,	'2015-11-04 04:32:45',	NULL),
(51,	'smsgateway/contact/phonebook',	'action',	49,	'2015-11-04 16:43:02',	NULL),
(52,	'smsgateway/contact/phonegroup',	'action',	49,	'2015-11-04 16:43:43',	NULL),
(53,	'smsgateway/messages/inbox',	'action',	48,	'2015-11-05 07:42:31',	NULL),
(54,	'smsgateway/messages/outbox',	'action',	48,	'2015-11-05 07:43:06',	NULL),
(55,	'smsgateway/messages/autoreplay',	'action',	48,	'2015-11-07 01:17:46',	NULL);

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

DROP TABLE IF EXISTS `autoreplay`;
CREATE TABLE `autoreplay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `format` varchar(50) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `autoreplay` (`id`, `format`, `content`) VALUES
(1,	'REG',	'Terimakasih Nomor Anda Sudah Terdaftar di Sistem Kami.'),
(2,	'INFO',	NULL);

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
('3a197e6759471c155b8af6cff7f41ba3',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',	1446884331,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:5:\"Guest\";}'),
('99855dc9e78bb3935f9cd2801893ab8a',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',	1446861496,	'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:13:\"Administrator\";s:9:\"auth_user\";s:1:\"1\";s:13:\"auth_loggedin\";b:1;s:4:\"lang\";s:2:\"en\";s:7:\"role_id\";s:1:\"1\";}'),
('f6498a6e3c978d620189f7af6fae107f',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36',	1446884332,	'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:13:\"Administrator\";s:9:\"auth_user\";s:1:\"1\";s:13:\"auth_loggedin\";b:1;s:4:\"lang\";s:2:\"en\";s:7:\"role_id\";s:1:\"1\";}');

DROP TABLE IF EXISTS `daemons`;
CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `gammu`;
CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `gammu` (`Version`) VALUES
(13);

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2015-11-07 01:45:51',	'2015-11-07 01:25:01',	'005400650073',	'+6283815421625',	'Default_No_Compression',	'',	'+628315000032',	-1,	'REG',	45,	'MyPhone1',	'true');

DELIMITER ;;

CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox` FOR EACH ROW
BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `outbox`;
CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `outbox` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `SendBefore`, `SendAfter`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES
('2015-11-07 08:30:13',	'2015-11-07 08:30:13',	'2015-11-07 08:30:13',	'23:59:59',	'00:00:00',	NULL,	'083815421625',	'Default_No_Compression',	NULL,	-1,	'test',	75,	'false',	-1,	'MyPhone1',	'2015-11-07 08:30:13',	'default',	'Gammu 1.28.90'),
('2015-11-07 01:58:34',	'2015-11-07 01:58:34',	'2015-11-07 01:58:34',	'23:59:59',	'00:00:00',	NULL,	'083815421525',	'Default_No_Compression',	NULL,	-1,	'ini dari 3',	72,	'false',	-1,	'MyPhone2',	'2015-11-07 01:58:34',	'default',	''),
('2015-11-06 15:15:51',	'2015-11-06 15:15:51',	'2015-11-06 15:15:51',	'23:59:59',	'00:00:00',	NULL,	'083815421625',	'Default_No_Compression',	NULL,	-1,	'test',	64,	'false',	-1,	'MyPhone2',	'2015-11-06 15:15:51',	'default',	'');

DELIMITER ;;

CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox` FOR EACH ROW
BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `outbox_multipart`;
CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pbk`;
CREATE TABLE `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pbk_groups`;
CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('MyPhone1',	'2015-11-07 01:25:08',	'2015-11-06 15:13:14',	'2015-11-07 01:25:18',	'yes',	'yes',	'012345678901234',	'Gammu 1.33.0, Windows Server 2007 SP1, GCC 4.7, MinGW 3.11',	0,	60,	0,	1);

DELIMITER ;;

CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones` FOR EACH ROW
BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `sentitems`;
CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2015-11-05 18:24:42',	'2015-11-05 18:24:08',	'2015-11-05 18:24:42',	NULL,	'00480069002C00200049006E00690020006100640061006C0061006800200052006F0062006F007400200053004D00530020004D0075006C007400690070006C0065002E002000470049002D0043006F006400650020005400650061006D002E',	'083815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Hi, Ini adalah Robot SMS Multiple. GI-Code Team.',	5,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	7,	255,	''),
('2015-11-05 18:24:38',	'2015-11-05 18:24:08',	'2015-11-05 18:24:38',	NULL,	'00480069002C00200049006E00690020006100640061006C0061006800200052006F0062006F007400200053004D00530020004D0075006C007400690070006C0065002E002000470049002D0043006F006400650020005400650061006D002E',	'081213431440',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Hi, Ini adalah Robot SMS Multiple. GI-Code Team.',	7,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	6,	255,	''),
('2015-11-05 18:24:46',	'2015-11-05 18:24:08',	'2015-11-05 18:24:46',	NULL,	'00480069002C00200049006E00690020006100640061006C0061006800200052006F0062006F007400200053004D00530020004D0075006C007400690070006C0065002E002000470049002D0043006F006400650020005400650061006D002E',	'085721473868',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Hi, Ini adalah Robot SMS Multiple. GI-Code Team.',	6,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	8,	255,	''),
('2015-11-06 00:12:45',	'2015-11-06 00:12:29',	'2015-11-06 00:12:45',	NULL,	'007400650073007400200053004D005300200047006100740065007700610079',	'083815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'test SMS Gateway',	8,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	9,	255,	''),
('2015-11-06 00:12:49',	'2015-11-06 00:12:29',	'2015-11-06 00:12:49',	NULL,	'007400650073007400200053004D005300200047006100740065007700610079',	'08976473520',	'Default_No_Compression',	'',	'+6281100000',	-1,	'test SMS Gateway',	9,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	10,	255,	''),
('2015-11-06 14:24:01',	'2015-11-06 14:23:28',	'2015-11-06 14:24:01',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Halo, ini balasan sms anda.',	23,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	11,	255,	''),
('2015-11-06 14:24:05',	'2015-11-06 14:23:28',	'2015-11-06 14:24:05',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Halo, ini balasan sms anda.',	22,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	12,	255,	''),
('2015-11-06 14:25:11',	'2015-11-06 14:24:55',	'2015-11-06 14:25:11',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+628989203111',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Halo, ini balasan sms anda.',	24,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	13,	255,	''),
('2015-11-06 14:51:26',	'2015-11-06 14:51:17',	'2015-11-06 14:51:26',	NULL,	'0064006100720069002000730069006D0070006100740069',	'083815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'dari simpati',	26,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	14,	255,	''),
('2015-11-06 14:57:51',	'2015-11-06 14:52:35',	'2015-11-06 14:57:51',	NULL,	'0074006500730074',	'083815421625',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'test',	27,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	2,	255,	''),
('2015-11-06 14:57:55',	'2015-11-06 14:57:42',	'2015-11-06 14:57:55',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	30,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	3,	255,	''),
('2015-11-06 14:58:00',	'2015-11-06 14:57:42',	'2015-11-06 14:58:00',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	29,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	4,	255,	''),
('2015-11-06 14:58:05',	'2015-11-06 14:57:43',	'2015-11-06 14:58:05',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	31,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	5,	255,	''),
('2015-11-06 14:58:10',	'2015-11-06 14:57:44',	'2015-11-06 14:58:10',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	33,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	6,	255,	''),
('2015-11-06 14:58:15',	'2015-11-06 14:57:44',	'2015-11-06 14:58:15',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	32,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	7,	255,	''),
('2015-11-06 14:58:21',	'2015-11-06 14:57:45',	'2015-11-06 14:58:21',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	34,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	8,	255,	''),
('2015-11-06 14:58:27',	'2015-11-06 14:58:02',	'2015-11-06 14:58:27',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	35,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	9,	255,	''),
('2015-11-06 14:58:31',	'2015-11-06 14:58:07',	'2015-11-06 14:58:31',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	36,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	10,	255,	''),
('2015-11-06 14:58:36',	'2015-11-06 14:58:12',	'2015-11-06 14:58:36',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	37,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	11,	255,	''),
('2015-11-06 14:58:41',	'2015-11-06 14:58:17',	'2015-11-06 14:58:41',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	38,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	12,	255,	''),
('2015-11-06 14:58:46',	'2015-11-06 14:58:23',	'2015-11-06 14:58:46',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	39,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	13,	255,	''),
('2015-11-06 14:58:52',	'2015-11-06 14:58:33',	'2015-11-06 14:58:52',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	40,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	14,	255,	''),
('2015-11-06 14:58:57',	'2015-11-06 14:58:38',	'2015-11-06 14:58:57',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	41,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	15,	255,	''),
('2015-11-06 14:59:19',	'2015-11-06 14:58:43',	'2015-11-06 14:59:19',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	42,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	16,	255,	''),
('2015-11-06 14:59:23',	'2015-11-06 14:58:48',	'2015-11-06 14:59:23',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	43,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	17,	255,	''),
('2015-11-06 14:59:28',	'2015-11-06 14:58:54',	'2015-11-06 14:59:28',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	44,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	18,	255,	''),
('2015-11-06 14:59:34',	'2015-11-06 14:59:01',	'2015-11-06 14:59:34',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	45,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	19,	255,	''),
('2015-11-06 14:59:41',	'2015-11-06 14:59:02',	'2015-11-06 14:59:41',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	46,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	20,	255,	''),
('2015-11-06 14:59:47',	'2015-11-06 14:59:25',	'2015-11-06 14:59:47',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	47,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	21,	255,	''),
('2015-11-06 14:59:52',	'2015-11-06 14:59:30',	'2015-11-06 14:59:52',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	48,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	22,	255,	''),
('2015-11-06 14:59:59',	'2015-11-06 14:59:49',	'2015-11-06 14:59:59',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	51,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	23,	255,	''),
('2015-11-06 15:00:04',	'2015-11-06 14:59:55',	'2015-11-06 15:00:04',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	52,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	24,	255,	''),
('2015-11-06 15:00:09',	'2015-11-06 15:00:01',	'2015-11-06 15:00:09',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	53,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	25,	255,	''),
('2015-11-06 15:00:15',	'2015-11-06 15:00:06',	'2015-11-06 15:00:15',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	54,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	26,	255,	''),
('2015-11-06 15:00:21',	'2015-11-06 15:00:11',	'2015-11-06 15:00:21',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	55,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	27,	255,	''),
('2015-11-06 15:00:27',	'2015-11-06 15:00:17',	'2015-11-06 15:00:27',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	56,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	28,	255,	''),
('2015-11-06 15:00:33',	'2015-11-06 15:00:23',	'2015-11-06 15:00:33',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	57,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	29,	255,	''),
('2015-11-06 15:00:39',	'2015-11-06 15:00:35',	'2015-11-06 15:00:39',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	59,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	30,	255,	''),
('2015-11-06 15:00:45',	'2015-11-06 15:00:41',	'2015-11-06 15:00:45',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+4444',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	60,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	31,	255,	''),
('2015-11-06 15:00:51',	'2015-11-06 15:00:47',	'2015-11-06 15:00:51',	NULL,	'00480061006C006F002C00200069006E0069002000620061006C006100730061006E00200073006D007300200061006E00640061002E',	'+3',	'Default_No_Compression',	'',	'+6289644000001',	-1,	'Halo, ini balasan sms anda.',	61,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	32,	255,	''),
('2015-11-07 01:32:28',	'2015-11-07 01:32:23',	'2015-11-07 01:32:28',	NULL,	'0054006500720069006D0061006B00610073006900680020004E006F006D006F007200200041006E006400610020005300750064006100680020005400650072006400610066007400610072002000640069002000530069007300740065006D0020004B0061006D0069002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Terimakasih Nomor Anda Sudah Terdaftar di Sistem Kami.',	65,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	15,	255,	''),
('2015-11-07 01:39:03',	'2015-11-07 01:38:31',	'2015-11-07 01:39:03',	NULL,	'0054006500720069006D0061006B00610073006900680020004E006F006D006F007200200041006E006400610020005300750064006100680020005400650072006400610066007400610072002000640069002000530069007300740065006D0020004B0061006D0069002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Terimakasih Nomor Anda Sudah Terdaftar di Sistem Kami.',	66,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	16,	255,	''),
('2015-11-07 01:39:06',	'2015-11-07 01:38:32',	'2015-11-07 01:39:06',	NULL,	'004D00610061006600200046006F0072006D00610074002000590061006E006700200041006E006400610020004D006100730075006B0061006E002000530061006C00610068',	'+6285244674029',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Maaf Format Yang Anda Masukan Salah',	67,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	17,	255,	''),
('2015-11-07 01:41:11',	'2015-11-07 01:40:53',	'2015-11-07 01:41:11',	NULL,	'0054006500720069006D0061006B00610073006900680020004E006F006D006F007200200041006E006400610020005300750064006100680020005400650072006400610066007400610072002000640069002000530069007300740065006D0020004B0061006D0069002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Terimakasih Nomor Anda Sudah Terdaftar di Sistem Kami.',	68,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	18,	255,	''),
('2015-11-07 01:43:16',	'2015-11-07 01:42:44',	'2015-11-07 01:43:16',	NULL,	'004D00610061006600200046006F0072006D00610074002000590061006E006700200041006E006400610020004D006100730075006B0061006E002000530061006C00610068',	'+6285244674029',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Maaf Format Yang Anda Masukan Salah',	70,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	19,	255,	''),
('2015-11-07 01:43:20',	'2015-11-07 01:42:44',	'2015-11-07 01:43:20',	NULL,	'0054006500720069006D0061006B00610073006900680020004E006F006D006F007200200041006E006400610020005300750064006100680020005400650072006400610066007400610072002000640069002000530069007300740065006D0020004B0061006D0069002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Terimakasih Nomor Anda Sudah Terdaftar di Sistem Kami.',	69,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	20,	255,	''),
('2015-11-07 01:45:56',	'2015-11-07 01:45:51',	'2015-11-07 01:45:56',	NULL,	'0054006500720069006D0061006B00610073006900680020004E006F006D006F007200200041006E006400610020005300750064006100680020005400650072006400610066007400610072002000640069002000530069007300740065006D0020004B0061006D0069002E',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'Terimakasih Nomor Anda Sudah Terdaftar di Sistem Kami.',	71,	'MyPhone1',	1,	'SendingError',	-1,	-1,	255,	''),
('2015-11-07 02:18:31',	'2015-11-07 02:18:11',	'2015-11-07 02:18:31',	NULL,	'0069006E006900200061006B0061006E002000640069002000620061006C00610073',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'ini akan di balas',	73,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	21,	255,	''),
('2015-11-07 02:19:05',	'2015-11-07 02:18:44',	'2015-11-07 02:19:05',	NULL,	'006100730064006600610073',	'+6283815421625',	'Default_No_Compression',	'',	'+6281100000',	-1,	'asdfas',	74,	'MyPhone1',	1,	'SendingOKNoReport',	-1,	22,	255,	'');

DELIMITER ;;

CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems` FOR EACH ROW
BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `tj_phone`;
CREATE TABLE `tj_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_phone` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
  `resource_id` int(11) DEFAULT '1',
  `active` int(11) DEFAULT '0',
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resource_id` (`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tr_menu` (`id`, `code`, `icon`, `label`, `name`, `descr`, `parent_id`, `resource_id`, `active`, `role_id`) VALUES
(1,	'SMS.GW',	NULL,	'SMS GATEWAY',	'SMS GATEWAY',	NULL,	0,	1,	0,	NULL),
(2,	'Messages',	NULL,	'Messages',	'Messages',	NULL,	1,	1,	0,	NULL),
(3,	'New SMS',	'',	'New SMS',	'New SMS',	'',	2,	48,	0,	NULL),
(4,	'Inbox',	'',	'Inbox',	'Inbox',	'',	2,	53,	0,	NULL),
(5,	'Outbox',	'',	'Outbox',	'',	'',	2,	54,	0,	NULL),
(7,	'Contact',	NULL,	'Contact',	'Contact',	NULL,	1,	1,	0,	NULL),
(8,	'PB',	'Phonebook',	'Phonebook',	'Phonebook',	'',	7,	51,	0,	NULL),
(9,	'PG',	'',	'Phonegroup',	'Phonegroup',	'',	7,	52,	0,	NULL),
(10,	'Setting',	'',	'Setting',	'Setting',	'',	1,	1,	1,	NULL),
(11,	'AR',	'',	'Auto Replay',	'Auto Replay',	'',	2,	55,	0,	NULL);

DROP TABLE IF EXISTS `tr_phone`;
CREATE TABLE `tr_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tr_phone` (`id`, `code`, `name`, `number`) VALUES
(1,	'',	'Jeff',	'+6283815421625');

DROP TABLE IF EXISTS `tr_phonegroup`;
CREATE TABLE `tr_phonegroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tr_phonegroup` (`id`, `code`, `name`) VALUES
(2,	'Change',	'Wilayah Kemang');

-- 2015-11-07 08:36:47
