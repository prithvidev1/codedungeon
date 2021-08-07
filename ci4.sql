/*
 Navicat MySQL Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : ci4

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 07/08/2021 09:02:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients`  (
  `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`client_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES (1, 'Prithvi', 'tuladharprithvi@gmail.com', 'Pokhara', '2021-08-01 00:30:24', '2021-08-01 00:30:24', NULL, 'admin123', '$2y$10$XSwt4qPQ6VbzWE1vWcvoEeLpkG.Sm9noxOjgAI6W72k');
INSERT INTO `clients` VALUES (2, 'Ghanshyam 12', 'kamaljirel@gmail.com', 'Dhangadi,Kailali', '2021-08-02 01:22:30', '2021-08-02 02:55:14', NULL, 'passwordinv', '$2y$10$YrZ3agfsHixmgCmNUOLsOOEGqLECNSCIpHDsfQ6gb.itRpetiqGme');
INSERT INTO `clients` VALUES (3, 'Bad Cops', 'cops@nowhere.com', 'Bunga,Lalitpur', '2021-08-03 04:29:26', '2021-08-03 04:29:26', NULL, 'copsnowhere', '$2y$10$Qqrv3MAm5vg9nSQVL5ycRecGORB97UnHKQCyv1mVvS/bkbCaVUxhe');

-- ----------------------------
-- Table structure for expenses
-- ----------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses`  (
  `exp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exp_heading` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `amount` float(10, 2) NOT NULL,
  `client_id` int(10) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `week` int(2) NOT NULL,
  PRIMARY KEY (`exp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expenses
-- ----------------------------
INSERT INTO `expenses` VALUES (1, 'DegradeAble', '2021-08-05', 5201.50, 3, '2021-08-06 21:01:03', '2021-08-06 21:04:07', NULL, 31);

-- ----------------------------
-- Table structure for incomes
-- ----------------------------
DROP TABLE IF EXISTS `incomes`;
CREATE TABLE `incomes`  (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `income_heading` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(10, 2) NOT NULL,
  `client_id` int(10) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `date` date NOT NULL,
  `week` int(2) NOT NULL,
  PRIMARY KEY (`income_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of incomes
-- ----------------------------
INSERT INTO `incomes` VALUES (1, 'Black Money', 3400.50, 3, '2021-08-05 22:34:59', '2021-08-05 22:34:59', NULL, '2021-08-03', 31);
INSERT INTO `incomes` VALUES (2, 'White Money', 3400.00, 3, '2021-08-05 22:36:13', '2021-08-05 22:36:13', NULL, '2021-08-06', 31);
INSERT INTO `incomes` VALUES (3, 'Green Money', 4500.00, 3, '2021-08-05 22:36:33', '2021-08-05 22:36:33', NULL, '2021-08-12', 32);
INSERT INTO `incomes` VALUES (4, 'Some Income', 4500.50, 2, '2021-08-06 21:21:52', '2021-08-06 21:21:52', NULL, '2021-08-04', 31);
INSERT INTO `incomes` VALUES (5, 'Herione Regga', 2300.00, 2, '2021-08-06 21:22:20', '2021-08-06 21:22:20', NULL, '2021-07-28', 30);
INSERT INTO `incomes` VALUES (6, 'White Money', 5000.00, 2, '2021-08-06 21:23:11', '2021-08-06 21:23:11', NULL, '2020-06-10', 24);

SET FOREIGN_KEY_CHECKS = 1;
