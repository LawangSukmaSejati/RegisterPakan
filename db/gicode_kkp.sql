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
(1, 'welcome',  'module',   NULL,   '2012-11-12 12:07:26',  NULL),
(2, 'authorize',    'module',   NULL,   '2012-11-12 04:00:23',  NULL),
(3, 'authorize/login',  'controller',   2,  '2012-11-12 12:43:42',  '2012-11-12 12:44:06'),
(4, 'authorize/logout', 'controller',   2,  '2012-11-12 12:43:56',  NULL),
(5, 'authorize/user',   'controller',   2,  '2012-11-12 04:07:59',  '2012-11-12 08:29:29'),
(6, 'acl',  'module',   NULL,   '2012-02-02 13:47:43',  NULL),
(7, 'acl/resource', 'controller',   6,  '2012-02-02 13:47:57',  NULL),
(8, 'acl/resource/index',   'action',   7,  '2012-02-02 13:48:21',  NULL),
(9, 'acl/resource/add', 'action',   7,  '2012-02-02 13:48:35',  '2012-10-16 17:26:12'),
(10,    'acl/resource/edit',    'action',   7,  '2012-02-02 13:48:50',  '2012-07-09 18:44:38'),
(11,    'acl/resource/delete',  'action',   7,  '2012-02-02 13:49:06',  NULL),
(12,    'acl/role', 'controller',   6,  '2012-07-12 17:54:16',  NULL),
(13,    'acl/role/index',   'action',   12, '2012-07-12 17:55:29',  NULL),
(14,    'acl/role/add', 'action',   12, '2012-07-12 17:56:00',  NULL),
(15,    'acl/role/edit',    'action',   12, '2012-07-12 17:56:19',  NULL),
(16,    'acl/role/delete',  'action',   12, '2012-07-12 17:56:55',  NULL),
(17,    'acl/rule', 'controller',   6,  '2012-07-12 17:53:04',  NULL),
(18,    'acl/rule/edit',    'action',   17, '2012-07-12 17:53:25',  NULL),
(24,    'setup',    'module',   NULL,   '2015-06-20 14:07:00',  NULL),
(25,    'setup/menu',   'controller',   24, '2015-06-20 14:07:47',  NULL),
(26,    'setup/menu/index', 'action',   25, '2015-06-20 14:08:14',  NULL),
(27,    'setup/menu/add',   'action',   25, '2015-06-20 14:08:30',  '2015-06-20 14:08:50'),
(28,    'setup/menu/edit',  'action',   25, '2015-06-20 14:09:39',  NULL),
(29,    'setup/menu/delete',    'action',   25, '2015-06-20 14:10:33',  NULL),
(34,    'setup/koperasi',   'controller',   24, '2015-06-21 10:26:03',  NULL),
(52,    'registrasi',   'module',   NULL,   '2015-11-11 15:58:40',  NULL),
(53,    'crud', 'module',   NULL,   '2015-11-11 15:59:16',  NULL),
(54,    'execute',  'module',   NULL,   '2015-11-11 16:34:22',  NULL),
(55,    'registrasi/permohonan',    'controller',   52, '2015-11-17 19:27:52',  '2015-11-17 19:29:15'),
(56,    'registrasi/dokumen',   'controller',   52, '2015-11-17 19:28:40',  NULL),
(57,    'registrasi/suratjawab',    'controller',   52, '2015-11-17 19:29:05',  NULL),
(58,    'lab',  'module',   NULL,   '2015-11-17 19:34:37',  NULL);

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
(1, 'Administrator',    '2011-12-27 12:00:00',  NULL),
(2, 'Guest',    '2011-12-27 12:00:00',  NULL),
(3, 'Staf', '2012-11-12 04:30:02',  '2015-06-20 18:37:02'),
(4, 'Manager',  '2012-11-12 04:30:24',  NULL),
(5, 'Users',    NULL,   NULL);

DROP TABLE IF EXISTS `acl_role_parents`;
CREATE TABLE `acl_role_parents` (
  `role_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`,`parent`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `acl_role_parents` (`role_id`, `parent`, `order`) VALUES
(4, 3,  0);

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
(2, 1,  'allow',    NULL),
(2, 2,  'allow',    NULL),
(2, 3,  'allow',    NULL),
(2, 4,  'allow',    NULL),
(2, 54, 'allow',    NULL),
(4, 2,  'allow',    NULL),
(4, 5,  'allow',    NULL);

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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `auth_users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `lang`, `registered`, `role_id`, `status`) VALUES
(1, 'Administrator ',   'Tea Change',   'admin',    'admin@koperasi.com',   '$2a$08$k8ExsWAe1qAyk2A/0tbvoeg/ahOb6DpQBnohcZvG79TNr28K5vNHe', 'en',   '2012-03-15 19:23:59',  1,  1),
(9, 'Sidik',    '', 'sidik',    'sidik@gmail.com',  '$2a$08$PpZ6RSBNvj94.NJOvH0oreISdV9k7cZooVEE9.ocZY.305IfPiWby', NULL,   '2015-11-25 00:00:00',  5,  1),
(10,    'Test', '', 'test', 'test@gmail.com',   '$2a$08$NeVE1Xv6ukjxbu3rT99ZA.mT1nLjuGa19nRCQUShJkqr1hXLmXhrW', NULL,   '2015-11-25 00:00:00',  5,  1),
(11,    'GI-Code',  '', 'gicode',   'gicode@gmail.com', '$2a$08$cHyx2kRg7IFPYyhgM/u54e.c/L4cDSHP2jgVaHonvBNN/T640CjcS', NULL,   '2015-11-30 00:00:00',  5,  1);

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
('3146c4476f3aa6c1bac09cb2a976c281',    '::1',  'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', 1448888871, 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:5:\"Users\";s:9:\"auth_user\";s:2:\"11\";s:13:\"auth_loggedin\";b:1;s:4:\"lang\";N;s:7:\"role_id\";s:1:\"5\";}'),
('d1c9ae43489990f2b475d0c93b50857d',    '::1',  'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', 1448888870, 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"role_name\";s:5:\"Guest\";}');

DROP TABLE IF EXISTS `p_berkas_upload`;
CREATE TABLE `p_berkas_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `p_form_identity` int(11) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `p_berkas_upload` (`id`, `users_id`, `p_form_identity`, `flag`, `filename`) VALUES
(5, 1,  15, 'fotocopy_penaggung_jawab', 'avatar1.jpg'),
(7, 1,  15, 'Fotocopy_Nomor_Pokok_Wajib_Pajak', 'avatar8.jpg'),
(8, 1,  15, 'Fotocopy_Surat_Izin_Usaha_Perdagangan',    'avatar7.jpg'),
(9, 1,  15, 'Fotocopy_Surat_Izin_Usaha',    'avatar6.jpg'),
(10,    1,  15, 'Fotocopy_Akte_Pendirian_Perusahaan',   'avatar5.jpg'),
(11,    1,  15, 'Surat_Keterangan_Domisili_Perusahaan', 'avatar4.jpg');

DROP TABLE IF EXISTS `p_form_a`;
CREATE TABLE `p_form_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_form_identity` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `merk_dagang` varchar(500) NOT NULL,
  `sifat` varchar(500) NOT NULL,
  `bentuk_jp` varchar(500) NOT NULL,
  `ukuran` varchar(500) NOT NULL,
  `kode` varchar(500) NOT NULL,
  `peruntukan` varchar(500) NOT NULL,
  `bentuk_kbb` varchar(500) NOT NULL,
  `volume` varchar(500) NOT NULL,
  `protein` varchar(500) NOT NULL,
  `air` varchar(500) NOT NULL,
  `abu` varchar(500) NOT NULL,
  `lemak` varchar(500) NOT NULL,
  `serat_kasar` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `p_form_a` (`id`, `p_form_identity`, `users_id`, `merk_dagang`, `sifat`, `bentuk_jp`, `ukuran`, `kode`, `peruntukan`, `bentuk_kbb`, `volume`, `protein`, `air`, `abu`, `lemak`, `serat_kasar`) VALUES
(6, 15, 1,  'GAMMA',    'tenggelam',    'pellet',   'Grower',   '999 G',    'Lele', 'Kertas berlapis plastik',  '40 Kg',    '28',   '12',   '13',   '5',    '8'),
(7, 16, 11, 'GAMMA',    'tenggelam',    'pellet',   'Grower',   '999 G',    'Lele', 'Kertas berlapis plastik',  '40 Kg',    '28',   '12',   '13',   '5',    '8');

DELIMITER ;;

CREATE TRIGGER `delete_form_a_b` AFTER DELETE ON `p_form_a` FOR EACH ROW
BEGIN
        
        DELETE FROM p_form_b_bahan_baku WHERE OLD.id = p_form_a ; 
        DELETE FROM p_form_b_bahan_pelengkap WHERE OLD.id = p_form_a ; 
    END;;

DELIMITER ;

DROP TABLE IF EXISTS `p_form_b_bahan_baku`;
CREATE TABLE `p_form_b_bahan_baku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_form_identity` int(11) DEFAULT NULL,
  `p_form_a` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `jenis_bahan_baku` varchar(300) DEFAULT NULL,
  `presentase_bahan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `p_form_b_bahan_baku` (`id`, `p_form_identity`, `p_form_a`, `users_id`, `jenis_bahan_baku`, `presentase_bahan`) VALUES
(10,    15, 6,  1,  'Fish Meal',    '30'),
(12,    15, 6,  1,  'Meal', '17'),
(13,    15, 6,  1,  'Soyabean ',    '17'),
(15,    15, 6,  1,  'Wheat Flour',  '13'),
(16,    15, 6,  1,  'Dedak',    '13'),
(17,    15, 6,  1,  'Corn Gluten ', '5'),
(18,    16, 7,  11, 'Fish Meal',    '30');

DROP TABLE IF EXISTS `p_form_b_bahan_pelengkap`;
CREATE TABLE `p_form_b_bahan_pelengkap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_form_identity` int(11) DEFAULT NULL,
  `p_form_a` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `jenis_bahan_pelengkap` varchar(300) DEFAULT NULL,
  `presentase_bahan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `p_form_b_bahan_pelengkap` (`id`, `p_form_identity`, `p_form_a`, `users_id`, `jenis_bahan_pelengkap`, `presentase_bahan`) VALUES
(9, 15, 6,  1,  'Dicalsium ',   '2'),
(10,    15, 6,  1,  'phosphat', '2'),
(11,    15, 6,  1,  'Aquamix',  ''),
(12,    16, 7,  11, 'phosphat', '3');

DROP TABLE IF EXISTS `p_form_c`;
CREATE TABLE `p_form_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_form_identity` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `p_form_c` (`id`, `p_form_identity`, `users_id`, `nomor`, `nama`, `jabatan`, `alamat`, `date`) VALUES
(2, 15, 1,  '12345',    'jafar',    'Direksi',  'Bandung',  '2015-11-30'),
(3, 16, 11, 'KKP201511302268',  'Jafar',    'Progremmar',   'Bandung',  '2015-11-30');

DROP TABLE IF EXISTS `p_form_identity`;
CREATE TABLE `p_form_identity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `nomor_pemohon` varchar(100) DEFAULT NULL,
  `tanggal_pemohon` varchar(100) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat_perusahaan` varchar(100) DEFAULT NULL,
  `nama_pimpinan_perusahaan` varchar(100) DEFAULT NULL,
  `nama_penanggung_jawab_perusahaan` varchar(100) DEFAULT NULL,
  `jabatan_perusahaan` varchar(100) DEFAULT NULL,
  `produsen_importir` enum('produsen','importir','distributor') DEFAULT NULL,
  `jumlah_merk` varchar(100) DEFAULT NULL,
  `tanggal_diterima_sekretariat` varchar(100) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `status` enum('open','diajukan','proses pengajuan','berkas lengkap') DEFAULT 'open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `p_form_identity` (`id`, `users_id`, `code`, `nomor_pemohon`, `tanggal_pemohon`, `nama_perusahaan`, `alamat_perusahaan`, `nama_pimpinan_perusahaan`, `nama_penanggung_jawab_perusahaan`, `jabatan_perusahaan`, `produsen_importir`, `jumlah_merk`, `tanggal_diterima_sekretariat`, `provinsi_id`, `kabupaten_id`, `kecamatan_id`, `desa_id`, `status`) VALUES
(15,    1,  'KKP201511303137',  '123/X/0812/2015',  '11/30/2015',   'Test', 'asdfasdf', 'Jafar Sidik',  'Dinar',    'Direktur', 'distributor',  '12',   '11/30/2015',   NULL,   NULL,   NULL,   NULL,   'open'),
(16,    11, 'KKP201511302268',  'GICODE/XI/12/08-XII',  '11/30/2015',   'PT. GI-CODE Lestari',  'Bandung',  'Eko Guno Cipto',   'Eko Guno Cipto',   'Direktur', 'produsen', '', '11/30/2015',   NULL,   NULL,   NULL,   NULL,   'open');

DELIMITER ;;

CREATE TRIGGER `delete_identity` AFTER DELETE ON `p_form_identity` FOR EACH ROW
BEGIN        
        DELETE FROM p_form_a WHERE OLD.id = p_form_identity ; 
        DELETE FROM p_form_b_bahan_baku WHERE OLD.id = p_form_identity ; 
        DELETE FROM p_form_b_bahan_pelengkap WHERE OLD.id = p_form_identity ; 
         DELETE FROM p_form_c WHERE OLD.id = p_form_identity ; 
    END;;

DELIMITER ;

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
(1, 2,  '208700885',    'Jafar Sidik',  0),
(2, 3,  '12381928', '', 0);

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
(76,    'PP',   '', 'Permohonan Pendaftaran',   'Permohonan Pendaftaran',   '', 0,  52, 0,  NULL),
(78,    'Pengujian dan Penilaian',  '', 'Pengujian dan Penilaian',  'Pengujian dan Penilaian',  '', 0,  1,  0,  NULL),
(87,    'FL 01 Permohonan', '', 'FL 01 Permohonan', 'FL 01 Permohonan', '', 76, 55, 0,  NULL),
(88,    'FL 02 Cek Dokumen',    '', 'FL 02 Cek Dokumen',    'FL 02 Cek Dokumen',    '', 76, 56, 0,  NULL),
(89,    'FL 03 Surat Jawab',    '', 'FL 03 Surat Jawab',    'FL 03 Surat Jawab',    '', 76, 57, 0,  NULL),
(90,    'FL 04 Penunjukan Uji Lab', '', 'FL 04 Penunjukan Uji Lab', 'FL 04 Penunjukan Uji Lab', '', 78, 1,  0,  NULL),
(91,    'FL 05 Surat Tugas',    '', 'FL 05 Surat Tugas',    'FL 05 Surat Tugas',    '', 78, 1,  0,  NULL);

DROP TABLE IF EXISTS `tr_status`;
CREATE TABLE `tr_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tr_status` (`id`, `name`) VALUES
(1, 'Created');

-- 2015-11-30 14:18:06