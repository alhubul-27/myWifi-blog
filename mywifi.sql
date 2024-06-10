-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.34 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mywifi
CREATE DATABASE IF NOT EXISTS `mywifi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mywifi`;

-- Dumping structure for table mywifi.area_layanan
CREATE TABLE IF NOT EXISTS `area_layanan` (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `kota` varchar(50) NOT NULL DEFAULT '0',
  `provinsi` varchar(50) NOT NULL DEFAULT '0',
  `kode_pos` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.area_layanan: ~2 rows (approximately)
INSERT INTO `area_layanan` (`id_area`, `kota`, `provinsi`, `kode_pos`) VALUES
	(1, 'Magetan', 'Jawa Timur', '63383'),
	(2, 'Madiun', 'Jawa Timur', '63721'),
	(3, 'Ponorogo', 'Jawa Timur', '63722');

-- Dumping structure for table mywifi.layanan
CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `harga` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.layanan: ~6 rows (approximately)
INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `deskripsi`, `harga`) VALUES
	(1, 'Wifi', '30 Mbps', 235000),
	(2, 'Wifi', '50 Mbps', 250000),
	(3, 'Wifi', '100 Mbps', 350000),
	(4, 'TV', '70 Channel', 310000),
	(5, 'TV', '75 Channel', 385000),
	(6, 'TV', '80 Channel', 410000);

-- Dumping structure for table mywifi.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_pesanan` int DEFAULT NULL,
  `tanggal_pembayaran` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_pesanan` (`id_pesanan`),
  CONSTRAINT `FK_payment_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.payment: ~0 rows (approximately)

-- Dumping structure for table mywifi.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_layanan` int DEFAULT NULL,
  `id_area` int NOT NULL,
  `tanggal_pesanan` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_layanan` (`id_layanan`),
  KEY `id_user` (`id_user`),
  KEY `id_area` (`id_area`),
  CONSTRAINT `FK_pesanan_area_layanan` FOREIGN KEY (`id_area`) REFERENCES `area_layanan` (`id_area`),
  CONSTRAINT `FK_pesanan_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  CONSTRAINT `FK_pesanan_user` FOREIGN KEY (`id_user`) REFERENCES `register` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.pesanan: ~2 rows (approximately)
INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_layanan`, `id_area`, `tanggal_pesanan`, `status`) VALUES
	(1, 1, 3, 1, '2024-06-06 00:52:43', 'Pending'),
	(2, 1, 1, 1, '2024-06-06 10:14:08', 'Pending'),
	(3, 3, 1, 1, '2024-06-06 20:22:11', 'Pending');

-- Dumping structure for table mywifi.pesanan_teknisi
CREATE TABLE IF NOT EXISTS `pesanan_teknisi` (
  `id_pesanan_teknisi` int NOT NULL,
  `id_pesanan` int DEFAULT NULL,
  `id_teknisi` int DEFAULT NULL,
  PRIMARY KEY (`id_pesanan_teknisi`),
  KEY `id_teknisi` (`id_teknisi`),
  KEY `id_pesanan` (`id_pesanan`),
  CONSTRAINT `FK_pesanan_teknisi_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  CONSTRAINT `FK_pesanan_teknisi_teknisi` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.pesanan_teknisi: ~0 rows (approximately)

-- Dumping structure for table mywifi.register
CREATE TABLE IF NOT EXISTS `register` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `nm_lengkap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `no_hp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `alamat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.register: ~4 rows (approximately)
INSERT INTO `register` (`id_user`, `username`, `password`, `nm_lengkap`, `email`, `no_hp`, `alamat`, `level`) VALUES
	(1, 'alhubul', '123', 'ALHUBUL AUSTAD RAMADAN', '220605110003@student.uin-malang.ac.id', '089619573741', 'ds kepuh', 'user'),
	(2, 'admin', 'admin', 'admin al', 'al.ramadan.39@gmail.com', '089619573741', 'ds kepuh', 'admin'),
	(3, 'vijay', '123', 'Vijay', 'vijay@gmail.com', '081325892587', 'Mekkah', 'user'),
	(4, 'firman', '123', 'Firman', 'firman@gmail.com', '081345634569', 'Madinah', 'user'),
	(5, 'admin2', 'admin2', 'admin b', 'admin@gmail.com', '081322226666', 'Yaman', 'admin');

-- Dumping structure for table mywifi.status_layanan
CREATE TABLE IF NOT EXISTS `status_layanan` (
  `id_status_layanan` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id_status_layanan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_status_layanan_user` FOREIGN KEY (`id_user`) REFERENCES `register` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.status_layanan: ~0 rows (approximately)

-- Dumping structure for table mywifi.teknisi
CREATE TABLE IF NOT EXISTS `teknisi` (
  `id_teknisi` int NOT NULL AUTO_INCREMENT,
  `nama_teknisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_teknisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keahlian` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_teknisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.teknisi: ~0 rows (approximately)

-- Dumping structure for table mywifi.teknisi_area
CREATE TABLE IF NOT EXISTS `teknisi_area` (
  `id_teknisi_area` int NOT NULL AUTO_INCREMENT,
  `id_teknisi` int NOT NULL DEFAULT '0',
  `id_area` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_teknisi_area`),
  KEY `id_teknisi` (`id_teknisi`),
  KEY `id_area` (`id_area`),
  CONSTRAINT `FK_teknisi_area_area_layanan` FOREIGN KEY (`id_area`) REFERENCES `area_layanan` (`id_area`),
  CONSTRAINT `FK_teknisi_area_teknisi` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.teknisi_area: ~0 rows (approximately)

-- Dumping structure for table mywifi.ulasan
CREATE TABLE IF NOT EXISTS `ulasan` (
  `id_ulasan` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_layanan` int DEFAULT NULL,
  `penilaian` int DEFAULT NULL,
  `komentar` text,
  `tanggal_ulasan` text,
  PRIMARY KEY (`id_ulasan`),
  KEY `id_layanan` (`id_layanan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_ulasan_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `register` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mywifi.ulasan: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
