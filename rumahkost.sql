/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rumahkost

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-18 10:06:54
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_biaya
-- ----------------------------
INSERT INTO `tbl_biaya` VALUES ('9', '30.000', '33000');
INSERT INTO `tbl_biaya` VALUES ('10', '50.000', '53000');
INSERT INTO `tbl_biaya` VALUES ('11', '80.000', '85000');

-- ----------------------------
-- Table structure for `tbl_fasilitas`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_fasilitas`;
CREATE TABLE `tbl_fasilitas` (
  `id_fasilitas` int(10) NOT NULL AUTO_INCREMENT,
  `nm_fasilitas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
  `id_fasilitas` int(10) NOT NULL,
  `tarif` double(10,0) NOT NULL,
  `status_kamar` enum('Terisi','Kosong') NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kamar
-- ----------------------------
INSERT INTO `tbl_kamar` VALUES ('35', 'K001', '1', '950000', 'Kosong');
INSERT INTO `tbl_kamar` VALUES ('36', 'K002', '2', '850000', 'Terisi');
INSERT INTO `tbl_kamar` VALUES ('37', 'K003', '3', '750000', 'Terisi');
INSERT INTO `tbl_kamar` VALUES ('38', 'K004', '4', '550000', 'Terisi');

-- ----------------------------
-- Table structure for `tbl_login`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '',
  `role` enum('user','admin') DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_login
-- ----------------------------
INSERT INTO `tbl_login` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');
INSERT INTO `tbl_login` VALUES ('2', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_penyewa
-- ----------------------------
INSERT INTO `tbl_penyewa` VALUES ('23', '172038', 'Muh.Ilham Pratama', 'L', 'PNS', '0812345678911', 'K002', '2019-11-16', '2019-12-16');
INSERT INTO `tbl_penyewa` VALUES ('24', '172039', 'Abel Ardhana S', 'L', 'Mahasiswa', '0878989899978', 'K003', '2019-11-17', '2019-12-17');
INSERT INTO `tbl_penyewa` VALUES ('27', '737111180770001', 'Muhammad Yasir', 'L', 'PNS', '081355967133', 'K004', '2019-11-15', '2019-12-15');

-- ----------------------------
-- Table structure for `tbl_transaksi_kamar`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi_kamar`;
CREATE TABLE `tbl_transaksi_kamar` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `no_transaksi` char(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `periode` varchar(20) NOT NULL,
  `id_penyewa` int(10) NOT NULL,
  `kode_kamar` char(10) NOT NULL,
  `tarif` double(10,0) NOT NULL,
  `status_bayar` enum('Lunas','Belum Lunas') NOT NULL,
  `arsip` int(1) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_transaksi_kamar
-- ----------------------------
INSERT INTO `tbl_transaksi_kamar` VALUES ('24', 'TK00001', '2019-11-15', 'Februari', '23', 'K002', '850000', 'Belum Lunas', '0');
INSERT INTO `tbl_transaksi_kamar` VALUES ('25', 'TK00002', '2019-11-15', 'November', '27', 'K004', '550000', 'Lunas', '1');

-- ----------------------------
-- Table structure for `tbl_transaksi_listrik`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi_listrik`;
CREATE TABLE `tbl_transaksi_listrik` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `no_transaksi` char(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_penyewa` int(10) NOT NULL,
  `id_biaya` int(10) NOT NULL,
  `jumlah_biaya` double(10,0) NOT NULL,
  `status_bayar` enum('Lunas','Belum Lunas') NOT NULL,
  `arsip` int(1) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_transaksi_listrik
-- ----------------------------
INSERT INTO `tbl_transaksi_listrik` VALUES ('25', 'TL00001', '2019-11-16', '23', '9', '33000', 'Belum Lunas', '0');

-- ----------------------------
-- View structure for `view_kamar`
-- ----------------------------
DROP VIEW IF EXISTS `view_kamar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kamar` AS select `tbl_kamar`.`id_kamar` AS `id_kamar`,`tbl_kamar`.`kode_kamar` AS `kode_kamar`,`tbl_kamar`.`id_fasilitas` AS `id_fasilitas`,`tbl_kamar`.`tarif` AS `tarif`,`tbl_fasilitas`.`nm_fasilitas` AS `nm_fasilitas`,`tbl_kamar`.`status_kamar` AS `status_kamar` from (`tbl_kamar` join `tbl_fasilitas` on(`tbl_kamar`.`id_fasilitas` = `tbl_fasilitas`.`id_fasilitas`)) ;

-- ----------------------------
-- View structure for `view_penyewa`
-- ----------------------------
DROP VIEW IF EXISTS `view_penyewa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penyewa` AS select `tbl_penyewa`.`id_penyewa` AS `id_penyewa`,`tbl_penyewa`.`no_ktp` AS `no_ktp`,`tbl_penyewa`.`nama` AS `nama`,`tbl_penyewa`.`jk` AS `jk`,`tbl_penyewa`.`pekerjaan` AS `pekerjaan`,`tbl_penyewa`.`no_handphone` AS `no_handphone`,`tbl_penyewa`.`kode_kamar` AS `kode_kamar`,`tbl_penyewa`.`tgl_masuk` AS `tgl_masuk`,`tbl_penyewa`.`tgl_expiresewa` AS `tgl_expiresewa`,`view_kamar`.`nm_fasilitas` AS `nm_fasilitas`,`view_kamar`.`tarif` AS `tarif` from (`tbl_penyewa` join `view_kamar` on(`view_kamar`.`kode_kamar` = `tbl_penyewa`.`kode_kamar`)) ;

-- ----------------------------
-- View structure for `view_transaksi_kamar`
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksi_kamar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_kamar` AS select `tbl_transaksi_kamar`.`id_transaksi` AS `id_transaksi`,`tbl_transaksi_kamar`.`no_transaksi` AS `no_transaksi`,`tbl_transaksi_kamar`.`tgl_transaksi` AS `tgl_transaksi`,`tbl_transaksi_kamar`.`periode` AS `periode`,`tbl_transaksi_kamar`.`id_penyewa` AS `id_penyewa`,`tbl_transaksi_kamar`.`status_bayar` AS `status_bayar`,`tbl_transaksi_kamar`.`arsip` AS `arsip`,`tbl_penyewa`.`nama` AS `nama`,`tbl_transaksi_kamar`.`kode_kamar` AS `kode_kamar`,`tbl_transaksi_kamar`.`tarif` AS `tarif` from (`tbl_transaksi_kamar` join `tbl_penyewa` on(`tbl_penyewa`.`id_penyewa` = `tbl_transaksi_kamar`.`id_penyewa`)) ;

-- ----------------------------
-- View structure for `view_transaksi_listrik`
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksi_listrik`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_listrik` AS select `tbl_transaksi_listrik`.`id_transaksi` AS `id_transaksi`,`tbl_transaksi_listrik`.`tgl_transaksi` AS `tgl_transaksi`,`tbl_transaksi_listrik`.`id_penyewa` AS `id_penyewa`,`tbl_transaksi_listrik`.`id_biaya` AS `id_biaya`,`tbl_transaksi_listrik`.`jumlah_biaya` AS `jumlah_biaya`,`tbl_transaksi_listrik`.`status_bayar` AS `status_bayar`,`tbl_penyewa`.`nama` AS `nama`,`tbl_transaksi_listrik`.`arsip` AS `arsip`,`tbl_biaya`.`token_listrik` AS `token_listrik`,`tbl_transaksi_listrik`.`no_transaksi` AS `no_transaksi` from ((`tbl_transaksi_listrik` join `tbl_penyewa` on(`tbl_transaksi_listrik`.`id_penyewa` = `tbl_penyewa`.`id_penyewa`)) join `tbl_biaya` on(`tbl_transaksi_listrik`.`id_biaya` = `tbl_biaya`.`id_biaya`)) ;
