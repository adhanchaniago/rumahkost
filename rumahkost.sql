/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rumahkost

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-10-28 11:40:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_biaya`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_biaya`;
CREATE TABLE `tbl_biaya` (
  `id_biaya` int(10) NOT NULL AUTO_INCREMENT,
  `token_listrik` varchar(50) NOT NULL,
  `jumlah_biaya` double(10,0) NOT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_biaya
-- ----------------------------
INSERT INTO `tbl_biaya` VALUES ('9', '30.000', '33000');
INSERT INTO `tbl_biaya` VALUES ('10', '50.000', '53000');
INSERT INTO `tbl_biaya` VALUES ('11', '80.000', '83000');
INSERT INTO `tbl_biaya` VALUES ('12', '100.000', '103000');

-- ----------------------------
-- Table structure for `tbl_fasilitas`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_fasilitas`;
CREATE TABLE `tbl_fasilitas` (
  `id_fasilitas` int(10) NOT NULL AUTO_INCREMENT,
  `nm_fasilitas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_fasilitas
-- ----------------------------
INSERT INTO `tbl_fasilitas` VALUES ('1', 'Ac, Rice Cooker, Tv, Dispenser');
INSERT INTO `tbl_fasilitas` VALUES ('2', 'Ac, Tv, Dispenser');
INSERT INTO `tbl_fasilitas` VALUES ('3', 'Kipas Angin, Tv, Dispenser');
INSERT INTO `tbl_fasilitas` VALUES ('4', 'Kipas Angin, dan Tv');

-- ----------------------------
-- Table structure for `tbl_kamar`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kamar`;
CREATE TABLE `tbl_kamar` (
  `id_kamar` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kamar` char(10) NOT NULL,
  `id_fasilitas` int(3) NOT NULL,
  `tarif` double(10,0) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kamar
-- ----------------------------
INSERT INTO `tbl_kamar` VALUES ('1', 'KA001', '1', '950000');
INSERT INTO `tbl_kamar` VALUES ('2', 'KA002', '2', '750000');
INSERT INTO `tbl_kamar` VALUES ('5', 'KA003', '3', '550000');
INSERT INTO `tbl_kamar` VALUES ('6', 'KA004', '4', '380000');

-- ----------------------------
-- Table structure for `tbl_loginuser`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_loginuser`;
CREATE TABLE `tbl_loginuser` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `id_penyewa` int(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_loginuser
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_penyewa`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penyewa`;
CREATE TABLE `tbl_penyewa` (
  `id_penyewa` int(10) NOT NULL AUTO_INCREMENT,
  `no_ktp` char(20) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `kode_kamar` char(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_expiresewa` date NOT NULL,
  PRIMARY KEY (`id_penyewa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_penyewa
-- ----------------------------
INSERT INTO `tbl_penyewa` VALUES ('7', '123456789', 'Muh.Fajar Putra Ramadhan', 'L', 'Mahasiswa', '08123456789', 'KA001', '2019-10-22', '2019-11-22');
INSERT INTO `tbl_penyewa` VALUES ('8', '1234567891', 'Abel Ardhana S', 'L', 'Mahasiswa', '0987654321', 'KA002', '2019-10-23', '2019-11-23');
INSERT INTO `tbl_penyewa` VALUES ('9', '1234567892', 'Mitra', 'L', 'Mahasiswa', '0878989899978', 'KA003', '2019-10-24', '2019-11-24');

-- ----------------------------
-- Table structure for `tbl_transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `no_transaksi` char(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_penyewa` int(10) NOT NULL,
  `total_transaksi` double(10,0) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_transaksi_listrik`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi_listrik`;
CREATE TABLE `tbl_transaksi_listrik` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date NOT NULL,
  `id_penyewa` int(10) NOT NULL,
  `id_biaya` int(10) NOT NULL,
  `jumlah_biaya` double(10,0) NOT NULL,
  `status_bayar` enum('Lunas','Belum Lunas') NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_transaksi_listrik
-- ----------------------------
INSERT INTO `tbl_transaksi_listrik` VALUES ('5', '2019-10-25', '9', '12', '103000', 'Lunas');
INSERT INTO `tbl_transaksi_listrik` VALUES ('6', '2019-10-25', '7', '10', '53000', 'Belum Lunas');
INSERT INTO `tbl_transaksi_listrik` VALUES ('7', '2019-10-25', '8', '11', '83000', 'Lunas');

-- ----------------------------
-- View structure for `view_kamar`
-- ----------------------------
DROP VIEW IF EXISTS `view_kamar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kamar` AS select `tbl_kamar`.`id_kamar` AS `id_kamar`,`tbl_kamar`.`kode_kamar` AS `kode_kamar`,`tbl_kamar`.`id_fasilitas` AS `id_fasilitas`,`tbl_kamar`.`tarif` AS `tarif`,`tbl_fasilitas`.`nm_fasilitas` AS `nm_fasilitas` from (`tbl_kamar` join `tbl_fasilitas` on(`tbl_kamar`.`id_fasilitas` = `tbl_fasilitas`.`id_fasilitas`)) ;

-- ----------------------------
-- View structure for `view_penyewa`
-- ----------------------------
DROP VIEW IF EXISTS `view_penyewa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penyewa` AS select `tbl_penyewa`.`id_penyewa` AS `id_penyewa`,`tbl_penyewa`.`no_ktp` AS `no_ktp`,`tbl_penyewa`.`nama` AS `nama`,`tbl_penyewa`.`jk` AS `jk`,`tbl_penyewa`.`pekerjaan` AS `pekerjaan`,`tbl_penyewa`.`no_handphone` AS `no_handphone`,`tbl_penyewa`.`kode_kamar` AS `kode_kamar`,`tbl_penyewa`.`tgl_masuk` AS `tgl_masuk`,`tbl_penyewa`.`tgl_expiresewa` AS `tgl_expiresewa`,`view_kamar`.`nm_fasilitas` AS `nm_fasilitas` from (`tbl_penyewa` join `view_kamar` on(`view_kamar`.`kode_kamar` = `tbl_penyewa`.`kode_kamar`)) ;

-- ----------------------------
-- View structure for `view_transaksi_listrik`
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksi_listrik`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_listrik` AS select `tbl_transaksi_listrik`.`id_transaksi` AS `id_transaksi`,`tbl_transaksi_listrik`.`tgl_transaksi` AS `tgl_transaksi`,`tbl_transaksi_listrik`.`id_penyewa` AS `id_penyewa`,`tbl_transaksi_listrik`.`id_biaya` AS `id_biaya`,`tbl_transaksi_listrik`.`jumlah_biaya` AS `jumlah_biaya`,`tbl_transaksi_listrik`.`status_bayar` AS `status_bayar`,`tbl_penyewa`.`nama` AS `nama`,`tbl_biaya`.`token_listrik` AS `token_listrik` from ((`tbl_transaksi_listrik` join `tbl_penyewa` on(`tbl_transaksi_listrik`.`id_penyewa` = `tbl_penyewa`.`id_penyewa`)) join `tbl_biaya` on(`tbl_transaksi_listrik`.`id_biaya` = `tbl_biaya`.`id_biaya`)) ;
