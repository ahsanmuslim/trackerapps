-- --------------------------------------------------------
-- Host:                         116.206.197.0
-- Server version:               5.6.48-log - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table jurnal_security.controller
DROP TABLE IF EXISTS `controller`;
CREATE TABLE IF NOT EXISTS `controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_menu` smallint(1) NOT NULL,
  `is_active` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.controller: ~13 rows (approximately)
DELETE FROM `controller`;
INSERT INTO `controller` (`id`, `title`, `url`, `icon`, `is_menu`, `is_active`) VALUES
	(1, 'Home', 'home', 'fas fa-home fa-fw', 1, 1),
	(2, 'Users', 'user', 'fas fa-users-cog fa-fw', 1, 1),
	(3, 'Transaksi', 'transaksi', 'fas fa-qrcode fa-fw', 0, 1),
	(4, 'Kendaraan', 'kendaraan', 'fas fa-car fa-fw', 1, 1),
	(5, 'Report', 'report', 'fas fa-book fa-fw', 1, 1),
	(6, 'Profile', 'profile', 'fas fa-fw fa-user-circle', 0, 1),
	(7, 'Divisi', 'divisi', 'fas fa-industry fa-fw', 1, 1),
	(8, 'Role Access', 'role', 'fas fa-cogs fa-fw', 1, 1),
	(9, 'Operator', 'operator', 'fas fa-user fa-fw', 1, 1),
	(10, 'Menu', 'controller', 'fas fa-globe fa-fw', 1, 1),
	(11, 'Status', 'status', 'fas fa-clipboard-list fa-fw', 1, 1),
	(12, 'History', 'history', 'fas fa-book-open fa-fw', 1, 1),
	(13, 'Log', 'log', 'fas fa-file-archive fa-fw', 0, 1);


-- Dumping structure for table jurnal_security.divisi
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(5) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(50) NOT NULL,
  `alias` varchar(5) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.divisi: ~4 rows (approximately)
DELETE FROM `divisi`;
INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `alias`) VALUES
	(1, 'General Affair', 'GA'),
	(2, 'Warehouse', 'WH'),
	(3, 'Security', 'SC'),
	(5, 'Teknisi', 'TK');

-- Dumping structure for table jurnal_security.kendaraan
DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_mobil` varchar(150) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `no_stnk` varchar(50) NOT NULL,
  `nama_stnk` varchar(100) NOT NULL,
  `no_mesin` varchar(50) NOT NULL,
  `no_rangka` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `cc` int(6) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `bbm` varchar(30) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `operasional` varchar(50) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `masa_pakai` tinyint(4) NOT NULL,
  `km` int(8) DEFAULT NULL,
  `status` enum('IN','OUT') DEFAULT NULL,
  `jam` datetime DEFAULT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.kendaraan: ~4 rows (approximately)
DELETE FROM `kendaraan`;
INSERT INTO `kendaraan` (`id_mobil`, `no_polisi`, `no_stnk`, `nama_stnk`, `no_mesin`, `no_rangka`, `type`, `merk`, `jenis`, `model`, `tahun`, `cc`, `warna`, `lokasi`, `bbm`, `masa_berlaku`, `operasional`, `dept`, `masa_pakai`, `km`, `status`, `jam`) VALUES
	('34bba701f73703dcaf8c3c502a89c0ee', 'B 25698 CVX', '12358745896', 'Ahmad Susanto', '55658745896', '55658555896', 'Avanza Veloz', 'Toyota', 'Penumpang', 'MPV', 2020, 1200, 'Merah', 'HQ', 'Pertalite', '2025-12-21', 'Antar Jemput', 'Warehouse', 2, 3000, 'IN', '2022-12-23 23:04:37'),
	('64d6d7095f3cf8ace99a7b7575ee831b', 'B 1235 NNO', '12358745898', 'Anisa', '55658745898', '55658555898', 'Ertiga', 'Suzuki', 'Penumpang', 'MPV', 2021, 1250, 'Hitam', 'HQ', 'Pertalite', '2026-08-18', 'Antar Jemput', 'Warehouse', 1, 2500, 'OUT', '2022-12-23 23:17:01'),
	('d5196846d204721c8607a5fd48f0e2d3', 'B 9874 OPI', '12358745899', 'Syarifuddin', '55658745899', '55658555899', 'Rush', 'Toyota', 'Penumpang', 'SUV', 2018, 1000, 'Hitam', 'HQ', 'Pertalite', '2026-12-16', 'Antar Jemput', 'Warehouse', 4, NULL, NULL, NULL),
	('fee98ab09389ba4d392d4ff99824ec84', 'B 7845 VCF', '12358745900', 'Adithia', '55658745900', '55658555900', 'Confero', 'Wulling', 'Penumpang', 'SUV', 2021, 1200, 'Merah', 'HQ', 'Pertalite', '2027-04-15', 'Dinas', 'Warehouse', 3, 200, 'IN', '2022-12-23 13:10:16');

-- Dumping structure for table jurnal_security.logactivity
DROP TABLE IF EXISTS `logactivity`;
CREATE TABLE IF NOT EXISTS `logactivity` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  `id_user` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.logactivity: ~0 rows (approximately)
DELETE FROM `logactivity`;

-- Dumping structure for table jurnal_security.operator
DROP TABLE IF EXISTS `operator`;
CREATE TABLE IF NOT EXISTS `operator` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Sopir','Kenek') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `jam` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.operator: ~4 rows (approximately)
DELETE FROM `operator`;
INSERT INTO `operator` (`id`, `nama`, `jenis`, `keterangan`, `is_active`, `status`, `jam`) VALUES
	('04eee49aa79964da', 'Amir', 'Kenek', 'Karyawan', 1, 'IN', '2022-12-23 23:04:37'),
	('198db983f9ac51db', 'Rahman', 'Sopir', 'Karyawan', 1, 'OUT', '2022-12-23 23:17:01'),
	('3e8db5e4949c8066', 'Sofian', 'Sopir', 'Karyawan', 1, NULL, NULL),
	('b85f1eeda17813e2', 'Mustofa', 'Kenek', 'Karyawan', 1, 'OUT', '2022-12-23 23:17:01');

-- Dumping structure for table jurnal_security.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.role: ~4 rows (approximately)
DELETE FROM `role`;
INSERT INTO `role` (`id`, `role`) VALUES
	(1, 'admin'),
	(2, 'user'),
	(3, 'adminga'),
	(4, 'direktur');

-- Dumping structure for table jurnal_security.transaksi
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `nomor` varchar(50) NOT NULL,
  `id_mobil` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` datetime NOT NULL,
  `km` int(8) NOT NULL,
  `sopir` varchar(100) NOT NULL,
  `kenek` varchar(100) NOT NULL,
  `divisi` int(5) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `id_user` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`nomor`),
  KEY `id_mobil` (`id_mobil`),
  KEY `divisi` (`divisi`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_transaksi_divisi` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON UPDATE CASCADE,
  CONSTRAINT `FK_transaksi_kendaraan` FOREIGN KEY (`id_mobil`) REFERENCES `kendaraan` (`id_mobil`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table jurnal_security.transaksi: ~3 rows (approximately)
DELETE FROM `transaksi`;
INSERT INTO `transaksi` (`nomor`, `id_mobil`, `tanggal`, `jam`, `km`, `sopir`, `kenek`, `divisi`, `keterangan`, `status`, `id_user`) VALUES
	('WHSCR231222-0001', 'fee98ab09389ba4d392d4ff99824ec84', '2022-12-23', '2022-12-23 13:10:16', 200, 'Rahman', 'Mustofa', 2, '', 'IN', '5a9d5c1c802ff5c5'),
	('WHSCR231222-0002', '34bba701f73703dcaf8c3c502a89c0ee', '2022-12-23', '2022-12-23 23:04:37', 3000, 'Rahman', 'Amir', 2, '', 'IN', '5a9d5c1c802ff5c5'),
	('WHSCR231222-0003', '64d6d7095f3cf8ace99a7b7575ee831b', '2022-12-23', '2022-12-23 23:17:01', 2500, 'Rahman', 'Mustofa', 2, '', 'OUT', '5a9d5c1c802ff5c5');

-- Dumping structure for table jurnal_security.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alias` varchar(10) DEFAULT NULL,
  `role` int(3) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_register` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `profile` varchar(30) NOT NULL,
  `jwt` varchar(200) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role` (`role`),
  CONSTRAINT `FK_user_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table jurnal_security.user: ~4 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `username`, `nama_user`, `alias`, `role`, `password`, `tgl_register`, `profile`, `jwt`, `is_active`, `last_activity`) VALUES
	('577f67592d24fc21', 'musohi', 'Musohi', 'MSH', 3, '464b60f36fd2c847e559f5365fa1f2caab67167f', '2022-12-23 06:08:49.803230', 'default.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6Im11c29oaSIsInJvbGUiOiIzIiwiaWRfbG9naW4iOiJjYjFkOWM1OGE1MzhhYWE0YjkxZDk4YWNhMjI4ODVlNiJ9.0xJ-oPYbcn1RZIreqC6dFPfwSuxxbpsId8iBQWDAB54', 1, NULL),
	('5a9d5c1c802ff5c5', 'security', 'security', 'SCR', 2, '464b60f36fd2c847e559f5365fa1f2caab67167f', '2022-12-23 16:16:41.257427', 'default.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InNlY3VyaXR5Iiwicm9sZSI6IjIiLCJpZF9sb2dpbiI6ImZiZDAzMmNkODVlMGU2ZjZkYmVmODQxYjYxNWFkMDY1In0._WhSqBd79zzO-XYZ8NjcxiwOsknvy13DMhf9JlEJIjY', 0, NULL),
	('e295f90a775c7241', 'susanto', 'Susanto', 'SAN', 1, '464b60f36fd2c847e559f5365fa1f2caab67167f', '2022-12-25 05:39:58.976962', 'default.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InN1c2FudG8iLCJyb2xlIjoiMSIsImlkX2xvZ2luIjoiODRiN2I1ZmVjOWY0OWQ2NDYwYjg0YTQ1OTczOTU3NGEifQ.S3nWOUljA8c6N5Wq_0LrKMp00NBfcddXG7uQxLbCSsw', 1, NULL),
	('ec26ab0ccb1c27a4', 'indra', 'Indra', 'IND', 4, '464b60f36fd2c847e559f5365fa1f2caab67167f', '2022-12-23 07:19:15.902788', 'default.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImluZHJhIiwicm9sZSI6IjQiLCJpZF9sb2dpbiI6ImM0OTg3NTY2NTliYmMxNjYxYzQ1NTlkMzNhZTZhOWU4In0.Hr89gC7Pn6EmArLmUZK5iDtz_wypVbhHm7eZUHCHDMY', 1, NULL);


-- Dumping structure for table jurnal_security.user_acces
DROP TABLE IF EXISTS `user_acces`;
CREATE TABLE IF NOT EXISTS `user_acces` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role` int(3) NOT NULL,
  `controller` int(3) NOT NULL,
  `create_data` tinyint(4) DEFAULT NULL,
  `update_data` tinyint(4) DEFAULT NULL,
  `delete_data` tinyint(4) DEFAULT NULL,
  `print_data` tinyint(4) DEFAULT NULL,
  `import_data` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_role` (`role`),
  KEY `id_menu` (`controller`),
  CONSTRAINT `user_acces_ibfk_1` FOREIGN KEY (`controller`) REFERENCES `controller` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `user_acces_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2010 DEFAULT CHARSET=latin1;

-- Dumping data for table jurnal_security.user_acces: ~31 rows (approximately)
DELETE FROM `user_acces`;
INSERT INTO `user_acces` (`id`, `role`, `controller`, `create_data`, `update_data`, `delete_data`, `print_data`, `import_data`) VALUES
	(1978, 1, 1, NULL, NULL, NULL, NULL, NULL),
	(1979, 1, 2, NULL, NULL, NULL, NULL, NULL),
	(1980, 1, 3, NULL, NULL, NULL, NULL, NULL),
	(1981, 1, 4, NULL, NULL, NULL, NULL, NULL),
	(1982, 1, 5, NULL, NULL, NULL, NULL, NULL),
	(1983, 1, 6, NULL, NULL, NULL, NULL, NULL),
	(1984, 1, 7, NULL, NULL, NULL, NULL, NULL),
	(1985, 1, 8, NULL, NULL, NULL, NULL, NULL),
	(1986, 1, 9, NULL, NULL, NULL, NULL, NULL),
	(1987, 1, 10, NULL, NULL, NULL, NULL, NULL),
	(1988, 1, 11, NULL, NULL, NULL, NULL, NULL),
	(1989, 1, 12, NULL, NULL, NULL, NULL, NULL),
	(1990, 1, 13, NULL, NULL, NULL, NULL, NULL),
	(1991, 2, 1, NULL, NULL, NULL, NULL, NULL),
	(1992, 2, 3, NULL, NULL, NULL, NULL, NULL),
	(1993, 2, 12, NULL, NULL, NULL, NULL, NULL),
	(1994, 3, 1, NULL, NULL, NULL, NULL, NULL),
	(1995, 3, 2, NULL, NULL, NULL, NULL, NULL),
	(1996, 3, 3, NULL, NULL, NULL, NULL, NULL),
	(1997, 3, 4, NULL, NULL, NULL, NULL, NULL),
	(1998, 3, 5, NULL, NULL, NULL, NULL, NULL),
	(1999, 3, 7, NULL, NULL, NULL, NULL, NULL),
	(2000, 3, 9, NULL, NULL, NULL, NULL, NULL),
	(2001, 3, 11, NULL, NULL, NULL, NULL, NULL),
	(2002, 4, 1, NULL, NULL, NULL, NULL, NULL),
	(2003, 4, 2, NULL, NULL, NULL, NULL, NULL),
	(2004, 4, 3, NULL, NULL, NULL, NULL, NULL),
	(2005, 4, 4, NULL, NULL, NULL, NULL, NULL),
	(2006, 4, 5, NULL, NULL, NULL, NULL, NULL),
	(2007, 4, 7, NULL, NULL, NULL, NULL, NULL),
	(2008, 4, 9, NULL, NULL, NULL, NULL, NULL),
	(2009, 4, 11, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
