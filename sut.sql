/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : sut

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 27/08/2019 20:35:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perusahaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_perusahaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` decimal(13, 0) NULL DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'PRIYAMBODO', 'PT MASPRIYAMBODO', 'JL RAYA PENGGILINGAN', 89620132008, 'maspriyambodo@gmail.com');
INSERT INTO `customers` VALUES (2, 'PRIYAMBODO', 'PT MASPRIYAMBODO', 'JL RAYA PENGGILINGAN', 89620132007, 'maspriyambodo@gmail.com');
INSERT INTO `customers` VALUES (3, 'GALANG', 'PT MEGAKARYA MAKMUR SENTOSA', 'Jl. Raya Ragunan', 2122837646, 'seliashari@gmail.com');

-- ----------------------------
-- Table structure for dokumen_pendukung
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_pendukung`;
CREATE TABLE `dokumen_pendukung`  (
  `id` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `path` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice`  (
  `id_invoice` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_po` int(11) NULL DEFAULT NULL,
  `tgl_invoice` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_invoice`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'admin');
INSERT INTO `jabatan` VALUES (2, 'customer');
INSERT INTO `jabatan` VALUES (3, 'direktur');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` int(1) NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` int(11) NULL DEFAULT NULL,
  `tanggal_masuk` date NULL DEFAULT NULL,
  `lokasi_kerja` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif',
  `reason` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `penpok` bigint(20) NULL DEFAULT NULL,
  `syscreateuser` int(11) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for msg_po
-- ----------------------------
DROP TABLE IF EXISTS `msg_po`;
CREATE TABLE `msg_po`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `syscreateuser` int(11) NULL DEFAULT NULL COMMENT 'di dapat dari session login, user id !',
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of msg_po
-- ----------------------------
INSERT INTO `msg_po` VALUES (1, '01000539100', '\n    <img src=\"http://localhost/sut/assets/images/Logo/SANINDO_.jpg\" style=\"width:150px;\">\n    <p>Head Office: Jl. Tebet Barat XI No.8-9, Jakarta Selatan 12810</p>\n    <p>Phone: (021) 22837646, Email: generaladmin@sanindo.co.id</p><p><br></p><p align=\"center\">VISI Menjadikan distributor PT. Sanindo Utama Traktor sebagai salah satu sarana yang dapat diandalkan dan dipercaya mitra</p><p align=\"center\">MISI Menjadikan PT. Sanindo Utama Traktor Perusahaan yang dapat bersaing dan terpercaya</p>\n', 1, '2019-08-18 09:33:40', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for penawaran
-- ----------------------------
DROP TABLE IF EXISTS `penawaran`;
CREATE TABLE `penawaran`  (
  `id_penawaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_penawaran` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_po` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` datetime(0) NULL DEFAULT NULL,
  `status_quotation` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_penawaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of penawaran
-- ----------------------------
INSERT INTO `penawaran` VALUES (1, '201908171', '01000539100', '2019-08-17 22:07:12', 1);
INSERT INTO `penawaran` VALUES (2, '201908192', '01000539101', '2019-08-19 06:51:18', 1);
INSERT INTO `penawaran` VALUES (3, '201908193', '01000539100', '2019-08-19 20:08:45', NULL);
INSERT INTO `penawaran` VALUES (4, '201908194', '01000539101', '2019-08-19 21:11:21', NULL);
INSERT INTO `penawaran` VALUES (5, '201908245', '2019082314', '2019-08-24 21:15:50', NULL);
INSERT INTO `penawaran` VALUES (6, '201908246', '2019082387', '2019-08-24 21:16:53', NULL);
INSERT INTO `penawaran` VALUES (7, '201908247', '2019082423', '2019-08-24 22:58:36', NULL);

-- ----------------------------
-- Table structure for preorder
-- ----------------------------
DROP TABLE IF EXISTS `preorder`;
CREATE TABLE `preorder`  (
  `id_po` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NULL DEFAULT NULL,
  `no_po` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_penawaran` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_po` date NULL DEFAULT NULL,
  `nama_barang` int(11) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `status_po` int(11) NULL DEFAULT NULL COMMENT '1. unproccess, 2. processed',
  PRIMARY KEY (`id_po`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of preorder
-- ----------------------------
INSERT INTO `preorder` VALUES (1, 1, '2019082314', '201908245', '2019-08-23', 4, 6, 2);
INSERT INTO `preorder` VALUES (2, 1, '2019082314', '201908245', '2019-08-23', 6, 5, 2);
INSERT INTO `preorder` VALUES (3, 1, '2019082314', '201908245', '2019-08-23', 3, 3, 2);
INSERT INTO `preorder` VALUES (4, 1, '2019082314', '201908245', '2019-08-23', 5, NULL, 2);
INSERT INTO `preorder` VALUES (5, 2, '2019082387', '201908246', '2019-08-23', 4, 6, 2);
INSERT INTO `preorder` VALUES (6, 2, '2019082387', '201908246', '2019-08-23', 6, 5, 2);
INSERT INTO `preorder` VALUES (7, 2, '2019082387', '201908246', '2019-08-23', 3, 3, 2);
INSERT INTO `preorder` VALUES (8, 2, '2019082387', '201908246', '2019-08-23', 5, NULL, 2);
INSERT INTO `preorder` VALUES (9, 3, '2019082423', '201908247', '2019-08-24', 7, 3, 2);
INSERT INTO `preorder` VALUES (10, 3, '2019082423', '201908247', '2019-08-24', 2, 1, 2);
INSERT INTO `preorder` VALUES (11, 3, '2019082423', '201908247', '2019-08-24', 1, 1, 2);
INSERT INTO `preorder` VALUES (12, 3, '2019082423', '201908247', '2019-08-24', 5, 2, 2);
INSERT INTO `preorder` VALUES (13, 3, '2019082423', '201908247', '2019-08-24', 6, 4, 2);

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `partnumber` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stock` int(11) NULL DEFAULT NULL,
  `price` int(15) NULL DEFAULT NULL,
  `stat` decimal(15, 0) NULL DEFAULT NULL,
  `syscreateuser` int(11) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'Water Separator', 'wsp9034', 12, 270000, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (2, 'Fuel Filter', 'fftr34', 12, 110000, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (3, 'Wheel Bolt RR', '12', 10, 180000, 1, 0, '0000-00-00 00:00:00', 1, '2019-08-19 20:07:55', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (4, 'Wheel Nut RR', '', 10, 80000, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (5, 'Wheel Bolt FRT', 'pcsf342', 10, 175000, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (6, 'Wheel Nut FRT', '', 10, 80000, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (7, 'Air Cleaner', '', 12, 1470000, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (8, ' Mortar Pump', 'p816s', 102, 2147483647, 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (9, ' Mortar Pump', 'p816s', 102, 2147483647, 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (10, ' Mortar Pump', 'p816s', 102, 2147483647, 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (11, 'Hopper Capacity', 'p816s', 5, 129765000, 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
INSERT INTO `product` VALUES (12, 'Oil pipe', 'olp234', 19, 1500000, 1, 1, '2019-08-19 21:05:57', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_penawaran` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_pembayaran` date NULL DEFAULT NULL,
  `id_dokumenpendukung` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_login
-- ----------------------------
DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `level` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_login
-- ----------------------------
INSERT INTO `user_login` VALUES (1, 'bodo', '65547A478D66F0CF7B33C6BCF3654D214B3DB295', 1);
INSERT INTO `user_login` VALUES (2, 'seli', '65547A478D66F0CF7B33C6BCF3654D214B3DB295', 2);
INSERT INTO `user_login` VALUES (3, 'amel', '65547A478D66F0CF7B33C6BCF3654D214B3DB295', 3);
INSERT INTO `user_login` VALUES (7, 'maspriyambodo@gmail.com', '9aad6115f4fcde8fc511e0d7b88c1bb1b5bca914', 2);
INSERT INTO `user_login` VALUES (9, 'seliashari@gmail.com', '3e30ac1dce0a91a73d8a0ef596090afbaad846bd', 2);

SET FOREIGN_KEY_CHECKS = 1;
