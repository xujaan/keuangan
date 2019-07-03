/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `keuangan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `keuangan`;

CREATE TABLE IF NOT EXISTS `detail_pengeluaran` (
  `id_det_in` int(10) NOT NULL AUTO_INCREMENT,
  `kode_in` varchar(50) DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `nominal` bigint(25) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `reg` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_det_in`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `detail_pengeluaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pengeluaran` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pemasukan` (
  `id_in` int(10) NOT NULL AUTO_INCREMENT,
  `kode_in` varchar(50) DEFAULT NULL,
  `sumber_in` text DEFAULT NULL,
  `nominal_in` bigint(25) DEFAULT NULL,
  `tgl_in` date DEFAULT NULL,
  `user_in` varchar(50) DEFAULT NULL,
  `reg_in` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_in`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pemasukan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemasukan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id_out` int(10) NOT NULL AUTO_INCREMENT,
  `kode_out` varchar(50) DEFAULT NULL,
  `keperluan_out` text DEFAULT NULL,
  `nominal_out` bigint(25) DEFAULT NULL,
  `tgl_out` date DEFAULT NULL,
  `user_out` varchar(50) DEFAULT NULL,
  `reg_out` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_out`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pengeluaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengeluaran` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `riwayat` (
  `id` int(10) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `aksi` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `reg` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `riwayat` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `saldo` (
  `id_saldo` int(10) NOT NULL AUTO_INCREMENT,
  `saldo` bigint(25) DEFAULT NULL,
  `in` bigint(25) DEFAULT NULL,
  `out` bigint(25) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `reg` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_saldo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `saldo` DISABLE KEYS */;
/*!40000 ALTER TABLE `saldo` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` char(128) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `karyawan` varchar(10) DEFAULT NULL,
  `reg` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `level`, `karyawan`, `reg`) VALUES
	(1, 'admin', 'D7EC786F3155F94121DF9658AFA2C3DBB7FDB07D526B73C615045EADA4F552B9C56CA4D53C9B66CE072E0F193B7A7A6F2534470EECC1A475D5FD7D74DBCE57A9', 'admin', 'K001', '2019-07-02 14:50:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
