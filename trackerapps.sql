-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
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

-- Dumping structure for table trackerapps.controller
DROP TABLE IF EXISTS `controller`;
CREATE TABLE IF NOT EXISTS `controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_menu` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table trackerapps.controller: ~8 rows (approximately)
DELETE FROM `controller`;
INSERT INTO `controller` (`id`, `title`, `url`, `icon`, `is_menu`) VALUES
	(1, 'Home', 'home', 'fas fa-home fa-fw', 1),
	(2, 'Users', 'user', 'fas fa-users-cog fa-fw', 1),
	(3, 'Scan', 'transaksi', 'fas fa-qrcode fa-fw', 0),
	(4, 'Kendaraan', 'kendaraan', 'fas fa-car fa-fw', 1),
	(5, 'Report', 'report', 'fas fa-book fa-fw', 1),
	(6, 'Profile', 'profile', 'fas fa-fw fa-user-circle', 1),
	(7, 'Divisi', 'divisi', 'fas fa-industry fa-fw', 1),
	(8, 'Role Access', 'role', 'fas fa-cogs fa-fw', 1),
	(10, 'Controller', 'controller', 'fas fa-globe fa-fw', 1);

-- Dumping structure for table trackerapps.divisi
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(5) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(50) NOT NULL,
  `alias` varchar(5) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table trackerapps.divisi: ~5 rows (approximately)
DELETE FROM `divisi`;
INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `alias`) VALUES
	(1, 'General Affair', 'GA'),
	(2, 'Warehouse', 'WH'),
	(3, 'Security', 'SC'),
	(4, 'Kurir', 'KR'),
	(5, 'Teknisi', 'TK');

-- Dumping structure for table trackerapps.kendaraan
DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_mobil` varchar(255) NOT NULL,
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

-- Dumping data for table trackerapps.kendaraan: ~7 rows (approximately)
DELETE FROM `kendaraan`;
INSERT INTO `kendaraan` (`id_mobil`, `no_polisi`, `no_stnk`, `nama_stnk`, `no_mesin`, `no_rangka`, `type`, `merk`, `jenis`, `model`, `tahun`, `cc`, `warna`, `lokasi`, `bbm`, `masa_berlaku`, `operasional`, `dept`, `masa_pakai`, `km`, `status`, `jam`) VALUES
	('8b578200-795a-11ed-89dc-98e7f48a9bd0', 'B 2345 BAX', '25489663333', 'PT Firman Indonesia', '55588751245', '12589745222', 'Daihatsu Xenia', 'Daihatsu', 'Veloz', 'Penumpang', 2020, 127, 'Silver', 'HQ', 'Pertalite', '2025-12-31', 'Dinas Keluar Kantor', 'Warehouse', 2, 1209, 'IN', '2022-12-19 00:54:14'),
	('8c8900-795a-11ed-89dc-98e7amituo99cc4', 'B 7845 VCF', '12358745900', 'Adithia', '55658745900', '55658555900', 'Confero', 'Wulling', 'Penumpang', 'SUV', 2021, 127, 'Merah', 'HQ', 'Pertalite', '2027-04-15', 'Dinas', 'Warehouse', 1, NULL, NULL, NULL),
	('8xc568900-795a-11ed-89dc-98e7f48a9cc0', 'B 25698 CVX', '12358745896', 'Ahmad Susanto', '55658745896', '55658555896', 'Avanza Veloz', 'Toyota', 'Penumpang', 'MPV', 2020, 127, 'Merah', 'HQ', 'Pertalite', '2025-12-21', 'Antar Jemput', 'Warehouse', 2, NULL, NULL, NULL),
	('d1e9a43c-795a-11ed-a250-98e7f48a9bd0', 'B 3456 NBV', '25489663333', 'PT Firman Indonesia', '55588751245', '12589745222', 'Toyota Luxio', 'Toyota', 'Avanza Veloz', 'Penumpang', 2021, 1200, 'Hitam', 'HQ', 'Pertalite', '2027-12-31', 'Walimah', 'Warehouse', 1, 300, 'IN', '2022-12-19 00:56:55'),
	('k8xc568900-795a-11ed-89dc-98fsdfds9cc2', 'B 1235 NNO', '12358745898', 'Anisa', '55658745898', '55658555898', 'Ertiga', 'Suzuki', 'Penumpang', 'MPV', 2021, 127, 'Hitam', 'HQ', 'Pertalite', '2026-08-18', 'Antar Jemput', 'Warehouse', 1, NULL, NULL, NULL),
	('xc568900-795a-11ed-89dc-458asfafsa1258', 'B 9874 OPI', '12358745899', 'Syarifuddin', '55658745899', '55658555899', 'Rush', 'Toyota', 'Penumpang', 'SUV', 2018, 127, 'Hitam', 'HQ', 'Pertalite', '2026-12-16', 'Antar Jemput', 'Warehouse', 4, NULL, NULL, NULL),
	('xc568900-795a-11ed-89dc-98e7fdsfds9cc1', 'B 9685 MNB', '12358745897', 'Amira', '55658745897', '55658555897', 'Sigra', 'Daihatsu', 'Penumpang', 'SUV', 2019, 127, 'Putih', 'HQ', 'Pertalite', '2026-04-20', 'Dinas', 'Warehouse', 3, NULL, NULL, NULL);

-- Dumping structure for table trackerapps.logactivity
DROP TABLE IF EXISTS `logactivity`;
CREATE TABLE IF NOT EXISTS `logactivity` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  `id_user` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table trackerapps.logactivity: ~0 rows (approximately)
DELETE FROM `logactivity`;

-- Dumping structure for table trackerapps.operator
DROP TABLE IF EXISTS `operator`;
CREATE TABLE IF NOT EXISTS `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Sopir','Kenek') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table trackerapps.operator: ~2 rows (approximately)
DELETE FROM `operator`;
INSERT INTO `operator` (`id`, `nama`, `jenis`, `keterangan`, `is_active`) VALUES
	(1, 'Ahmad Kusnadi', 'Sopir', 'Karyawan', 0),
	(2, 'Susanto', 'Kenek', 'OKOK', 0);

-- Dumping structure for table trackerapps.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table trackerapps.role: ~4 rows (approximately)
DELETE FROM `role`;
INSERT INTO `role` (`id`, `role`) VALUES
	(1, 'admin'),
	(2, 'user'),
	(4, 'direktur'),
	(5, 'adminga');

-- Dumping structure for table trackerapps.transaksi
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `nomor` varchar(50) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` datetime NOT NULL,
  `km` int(8) NOT NULL,
  `sopir` varchar(100) NOT NULL,
  `kenek` varchar(100) NOT NULL,
  `divisi` int(5) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `id_user` int(5) NOT NULL,
  PRIMARY KEY (`nomor`),
  KEY `id_mobil` (`id_mobil`),
  KEY `divisi` (`divisi`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `kendaraan` (`id_mobil`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table trackerapps.transaksi: ~20 rows (approximately)
DELETE FROM `transaksi`;
INSERT INTO `transaksi` (`nomor`, `id_mobil`, `tanggal`, `jam`, `km`, `sopir`, `kenek`, `divisi`, `keterangan`, `status`, `id_user`) VALUES
	('GA171222-0001', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-17', '2022-12-17 07:52:27', 190, 'Ahmad Kusnadi', 'Susanto', 1, '', 'IN', 1),
	('GA181222-0001', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-18', '2022-12-18 22:58:07', 600, 'Ahmad Kusnadi', 'Susanto', 1, '', 'IN', 2),
	('SC1181222-0001', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-18', '2022-12-18 23:27:19', 600, 'Ahmad Kusnadi', 'Susanto', 3, '', 'OUT', 1),
	('SC181222-0001', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-18', '2022-12-18 01:06:02', 200, 'Ahmad Kusnadi', 'Susanto', 3, '', 'IN', 1),
	('SC181222-0002', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-18', '2022-12-18 01:06:27', 200, 'Ahmad Kusnadi', 'Susanto', 3, '', 'OUT', 1),
	('TKSS181222-0001', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-18', '2022-12-18 23:48:25', 1000, 'Ahmad Kusnadi', 'Susanto', 5, '', 'IN', 1),
	('WH131222-0001', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-13', '2022-12-13 21:12:47', 120, 'Ahmad Kusnadi', 'Susanto', 2, '', 'IN', 1),
	('WH131222-0002', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-13', '2022-12-13 21:13:25', 140, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 1),
	('WH141222-0001', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-14', '2022-12-14 20:14:07', 450, 'Ahmad Kusnadi', 'Susanto', 2, '', 'IN', 1),
	('WH141222-0003', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-14', '2022-12-14 20:09:56', 150, 'Ahmad Kusnadi', 'Susanto', 2, '', 'IN', 1),
	('WH141222-0004', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-14', '2022-12-14 20:10:57', 180, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 1),
	('WH151222-0002', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-15', '2022-12-15 00:44:44', 500, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 1),
	('WH171222-0003', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-17', '2022-12-17 07:54:14', 550, 'Ahmad Kusnadi', 'Susanto', 2, '', 'IN', 1),
	('WH181222-0004', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-18', '2022-12-18 22:56:23', 550, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 2),
	('WH181222-0005', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-18', '2022-12-18 01:05:38', 190, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 1),
	('WH181222-0006', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-18', '2022-12-18 08:07:51', 250, 'Ahmad Kusnadi', 'Susanto', 2, '', 'IN', 2),
	('WH181222-0007', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-18', '2022-12-18 16:48:56', 250, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 2),
	('WHWT191222-0005', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-19', '2022-12-19 00:47:49', 1000, 'Ahmad Kusnadi', 'Susanto', 2, '', 'OUT', 2),
	('WHWT191222-0006', '8b578200-795a-11ed-89dc-98e7f48a9bd0', '2022-12-19', '2022-12-19 00:54:14', 1209, 'Ahmad Kusnadi', 'Susanto', 2, '', 'IN', 2),
	('WHWT191222-0008', 'd1e9a43c-795a-11ed-a250-98e7f48a9bd0', '2022-12-19', '2022-12-19 00:56:55', 300, 'Ahmad Kusnadi', 'Susanto', 2, 'Ini', 'IN', 2);

-- Dumping structure for table trackerapps.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alias` varchar(10) DEFAULT NULL,
  `role` int(3) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_register` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `profile` varchar(30) NOT NULL,
  `jwt` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role` (`role`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Dumping data for table trackerapps.user: ~3 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `username`, `nama_user`, `alias`, `role`, `password`, `status`, `tgl_register`, `profile`, `jwt`, `is_active`, `last_activity`) VALUES
	(1, 'susanto', 'Susanto Ahsan', 'SS', 1, '8cb2237d0679ca88db6464eac60da96345513964', 1, '2022-12-18 16:47:16.358049', 'FOTO.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InN1c2FudG8iLCJyb2xlIjoxLCJpZF9sb2dpbiI6ImExMWQwOTM2LTdlZjMtMTFlZC1hZWY1LTk4ZTdmNDhhOWJkMCJ9.-qz0guupqPMZbx5AkaEb00_lsgZ1XPTM_V2ZfQpzeGw', 0, '2022-10-17 03:13:32'),
	(2, 'watno', 'Watno', 'WT', 1, '8cb2237d0679ca88db6464eac60da96345513964', 1, '2022-12-18 16:40:26.907771', 'default.jpg', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IndhdG5vIiwicm9sZSI6MSwiaWRfbG9naW4iOiJhZDBmZWI4OC03ZWYyLTExZWQtODVmZi05OGU3ZjQ4YTliZDAifQ.4eY6mhFKCOQrHVh_ujH55oGEyf4E2P4MvfN0BPnSxTk', 0, '2022-10-16 17:17:23'),
	(4, 'ardha', 'Ardha Dyota Ahimsa', 'AD', 2, '8cb2237d0679ca88db6464eac60da96345513964', 1, '2022-12-18 16:10:38.402501', 'icon.png', NULL, 0, '2022-05-25 02:15:51');

-- Dumping structure for table trackerapps.user_acces
DROP TABLE IF EXISTS `user_acces`;
CREATE TABLE IF NOT EXISTS `user_acces` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role` int(3) NOT NULL,
  `controller` int(3) NOT NULL,
  `create` int(1) DEFAULT NULL,
  `update` int(1) DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  `print` int(1) DEFAULT NULL,
  `import` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_role` (`role`),
  KEY `id_menu` (`controller`),
  CONSTRAINT `user_acces_ibfk_1` FOREIGN KEY (`controller`) REFERENCES `controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_acces_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1900 DEFAULT CHARSET=latin1;

-- Dumping data for table trackerapps.user_acces: ~11 rows (approximately)
DELETE FROM `user_acces`;
INSERT INTO `user_acces` (`id`, `role`, `controller`, `create`, `update`, `delete`, `print`, `import`) VALUES
	(1885, 2, 1, NULL, NULL, NULL, NULL, NULL),
	(1887, 1, 1, NULL, NULL, NULL, NULL, NULL),
	(1891, 1, 6, NULL, NULL, NULL, NULL, NULL),
	(1892, 2, 6, NULL, NULL, NULL, NULL, NULL),
	(1893, 1, 4, NULL, NULL, NULL, NULL, NULL),
	(1894, 2, 4, NULL, NULL, NULL, NULL, NULL),
	(1895, 1, 3, NULL, NULL, NULL, NULL, NULL),
	(1896, 1, 7, NULL, NULL, NULL, NULL, NULL),
	(1897, 1, 8, NULL, NULL, NULL, NULL, NULL),
	(1898, 1, 2, NULL, NULL, NULL, NULL, NULL),
	(1899, 1, 5, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
