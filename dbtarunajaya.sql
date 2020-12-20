/*
Navicat MySQL Data Transfer

Source Server         : lokal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbtarunajaya

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-12-20 21:30:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbadmin`
-- ----------------------------
DROP TABLE IF EXISTS `tbadmin`;
CREATE TABLE `tbadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(12) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbadmin
-- ----------------------------
INSERT INTO `tbadmin` VALUES ('1', 'Reynaldi', 'admin', 'reynaldi@gmail.com', 'admin12345');
INSERT INTO `tbadmin` VALUES ('2', 'Cicilia', 'admin1', 'cicilia@gmail.com', 'admin67890');

-- ----------------------------
-- Table structure for `tbcalonsiswa`
-- ----------------------------
DROP TABLE IF EXISTS `tbcalonsiswa`;
CREATE TABLE `tbcalonsiswa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `provinsi` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kelurahan` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  PRIMARY KEY (`nisn`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbcalonsiswa
-- ----------------------------
INSERT INTO `tbcalonsiswa` VALUES ('8', '', '0', '0000-00-00', 'Laki-Laki', '', '', '', '', '', '', '');
INSERT INTO `tbcalonsiswa` VALUES ('4', 'bambang', '12345', '0000-00-00', 'on', 'jl.kenanga', 'tanaman', 'bunga', 'kembang', 'smp 1', '2020', 'Budha');
INSERT INTO `tbcalonsiswa` VALUES ('5', 'bambang', '12345', '0000-00-00', 'Laki-Laki', 'jl.kenanga', 'tanaman', 'bunga', 'kembang', 'smp 1', '2020', 'Hindu');
INSERT INTO `tbcalonsiswa` VALUES ('6', 'bamang', '321456', '0000-00-00', 'Laki-Laki', 'jl.kenanga', 'tanaman', 'bunga', 'kembang', 'smp 1', '2020', 'Budha');
INSERT INTO `tbcalonsiswa` VALUES ('7', 'bambang sutaryo', '1245890', '2010-04-30', 'Laki-Laki', 'jl.kenanga', 'tanaman', 'bunga', 'kembang', 'smp 1', '2020', 'Hindu');
INSERT INTO `tbcalonsiswa` VALUES ('9', 'bambang', '1234567890', '2015-01-12', 'Laki-Laki', 'jl.kenanga', 'tanaman', 'bunga', 'kembang', 'smp 1', '2020', '');

-- ----------------------------
-- Table structure for `tbguru`
-- ----------------------------
DROP TABLE IF EXISTS `tbguru`;
CREATE TABLE `tbguru` (
  `nip` int(11) DEFAULT NULL,
  `nama_guru` varchar(30) DEFAULT NULL,
  `kode_guru` int(6) NOT NULL,
  PRIMARY KEY (`kode_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbguru
-- ----------------------------
INSERT INTO `tbguru` VALUES ('1034', 'Siwi', '10034');
INSERT INTO `tbguru` VALUES ('1035', 'Dian', '10035');
INSERT INTO `tbguru` VALUES ('1036', 'Tomi', '10036');

-- ----------------------------
-- Table structure for `tbkelas`
-- ----------------------------
DROP TABLE IF EXISTS `tbkelas`;
CREATE TABLE `tbkelas` (
  `kode_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  `kode_guru` int(6) NOT NULL,
  PRIMARY KEY (`kode_kelas`,`kode_guru`),
  KEY `kode_guru` (`kode_guru`),
  CONSTRAINT `tbkelas_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `tbguru` (`kode_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbkelas
-- ----------------------------
INSERT INTO `tbkelas` VALUES ('10001', 'X', '10034');
INSERT INTO `tbkelas` VALUES ('10002', 'XI', '10035');
INSERT INTO `tbkelas` VALUES ('10003', 'XII', '10036');

-- ----------------------------
-- Table structure for `tbkomentar`
-- ----------------------------
DROP TABLE IF EXISTS `tbkomentar`;
CREATE TABLE `tbkomentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `kritik_dan_saran` text NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbkomentar
-- ----------------------------
INSERT INTO `tbkomentar` VALUES ('1', 'haloo');

-- ----------------------------
-- Table structure for `tbmengajar`
-- ----------------------------
DROP TABLE IF EXISTS `tbmengajar`;
CREATE TABLE `tbmengajar` (
  `kode_kelas` int(11) NOT NULL,
  `kode_guru` int(6) NOT NULL,
  `thn_ajaran` date DEFAULT NULL,
  `kode_pel` int(7) NOT NULL,
  PRIMARY KEY (`kode_kelas`,`kode_guru`,`kode_pel`),
  KEY `kode_guru` (`kode_guru`),
  KEY `kode_pel` (`kode_pel`),
  CONSTRAINT `tbmengajar_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `tbkelas` (`kode_kelas`),
  CONSTRAINT `tbmengajar_ibfk_2` FOREIGN KEY (`kode_guru`) REFERENCES `tbguru` (`kode_guru`),
  CONSTRAINT `tbmengajar_ibfk_3` FOREIGN KEY (`kode_pel`) REFERENCES `tbpelajaran` (`kode_pel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbmengajar
-- ----------------------------
INSERT INTO `tbmengajar` VALUES ('10001', '10034', '2017-06-23', '20023');
INSERT INTO `tbmengajar` VALUES ('10002', '10035', '2017-06-24', '20024');
INSERT INTO `tbmengajar` VALUES ('10003', '10036', '2017-06-23', '20026');

-- ----------------------------
-- Table structure for `tbnilai`
-- ----------------------------
DROP TABLE IF EXISTS `tbnilai`;
CREATE TABLE `tbnilai` (
  `nisn` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_pel` int(7) NOT NULL,
  `thn_ajaran` date DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  PRIMARY KEY (`nisn`,`kode_kelas`,`kode_pel`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `kode_pel` (`kode_pel`),
  CONSTRAINT `tbnilai_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `tbkelas` (`kode_kelas`),
  CONSTRAINT `tbnilai_ibfk_2` FOREIGN KEY (`kode_pel`) REFERENCES `tbpelajaran` (`kode_pel`),
  CONSTRAINT `tbnilai_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `tbcalonsiswa` (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbnilai
-- ----------------------------
INSERT INTO `tbnilai` VALUES ('12345', '10001', '20023', '2017-06-20', '1');
INSERT INTO `tbnilai` VALUES ('321456', '10002', '20025', '2017-06-21', '2');

-- ----------------------------
-- Table structure for `tbpelajaran`
-- ----------------------------
DROP TABLE IF EXISTS `tbpelajaran`;
CREATE TABLE `tbpelajaran` (
  `kode_pel` int(7) NOT NULL,
  `nama_pel` varchar(20) DEFAULT NULL,
  `ketuntasan` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`kode_pel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbpelajaran
-- ----------------------------
INSERT INTO `tbpelajaran` VALUES ('20023', 'Matematika', '65');
INSERT INTO `tbpelajaran` VALUES ('20024', 'Bahasa Indonesia', '65');
INSERT INTO `tbpelajaran` VALUES ('20025', 'Bahasa Inggris', '60');
INSERT INTO `tbpelajaran` VALUES ('20026', 'Kimia', '65');
