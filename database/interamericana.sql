/*
 Navicat Premium Data Transfer

 Source Server         : uwamp
 Source Server Type    : MySQL
 Source Server Version : 50711
 Source Host           : localhost:3306
 Source Schema         : interamericana

 Target Server Type    : MySQL
 Target Server Version : 50711
 File Encoding         : 65001

 Date: 16/02/2020 20:45:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anos_lectivos
-- ----------------------------
DROP TABLE IF EXISTS `anos_lectivos`;
CREATE TABLE `anos_lectivos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_ctlg_estados` int(11) NOT NULL,
  `id_organizaciones` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `anos_lectivos_fk_1`(`id_ctlg_estados`) USING BTREE,
  INDEX `anos_lectivos_fk_2`(`id_organizaciones`) USING BTREE,
  CONSTRAINT `anos_lectivos_fk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `anos_lectivos_fk_2` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of anos_lectivos
-- ----------------------------
INSERT INTO `anos_lectivos` VALUES (1, '2019 - 2020', 1, 1, '2019-10-10 23:29:59', '2019-11-04 02:16:20', '2019-11-04 02:16:20');
INSERT INTO `anos_lectivos` VALUES (9, '2021 - 2022', 2, 1, '2019-10-13 01:44:05', '2019-11-04 02:08:06', '2019-11-04 02:08:06');
INSERT INTO `anos_lectivos` VALUES (15, '2019 - 2021', 2, 1, '2019-10-13 01:48:19', '2019-11-04 02:08:08', '2019-11-04 02:08:08');
INSERT INTO `anos_lectivos` VALUES (19, '2022 - 2023', 1, 1, '2019-11-03 02:58:39', '2019-11-04 02:08:57', '2019-11-04 02:08:57');
INSERT INTO `anos_lectivos` VALUES (20, '2015 - 2016', 1, 1, '2019-11-03 05:07:37', '2019-11-04 02:08:22', '2019-11-04 02:08:22');
INSERT INTO `anos_lectivos` VALUES (21, '2020 - 2021', 1, 1, '2019-11-04 02:10:12', '2019-11-04 02:10:15', '2019-11-04 02:10:15');
INSERT INTO `anos_lectivos` VALUES (23, '2020 - 2021', 1, 1, '2019-11-04 02:11:30', '2019-11-04 02:11:53', '2019-11-04 02:11:53');
INSERT INTO `anos_lectivos` VALUES (24, '2020 - 2021', 1, 1, '2019-11-04 02:14:47', NULL, NULL);
INSERT INTO `anos_lectivos` VALUES (25, '2020 - 2021', 1, 1, '2019-11-04 02:16:45', '2019-11-04 02:16:48', '2019-11-04 02:16:48');
INSERT INTO `anos_lectivos` VALUES (26, '2021 - 2022', 1, 1, '2019-11-04 02:17:10', '2019-11-04 02:17:13', '2019-11-04 02:17:13');
INSERT INTO `anos_lectivos` VALUES (27, '2023 - 2024', 1, 1, '2019-11-04 02:17:30', '2019-11-04 02:17:34', '2019-11-04 02:17:34');
INSERT INTO `anos_lectivos` VALUES (28, '2025 - 2026', 1, 1, '2019-11-04 02:18:49', '2019-11-04 02:19:00', '2019-11-04 02:19:00');
INSERT INTO `anos_lectivos` VALUES (29, '2026 - 2027', 1, 1, '2019-11-04 02:19:49', '2019-11-04 02:19:56', '2019-11-04 02:19:56');
INSERT INTO `anos_lectivos` VALUES (30, '2025 - 2026', 2, 1, '2019-11-04 02:32:47', '2019-11-04 02:32:54', '2019-11-04 02:32:54');
INSERT INTO `anos_lectivos` VALUES (31, '2025 - 2026', 2, 1, '2019-11-04 02:33:11', '2019-11-04 02:38:08', '2019-11-04 02:38:08');

-- ----------------------------
-- Table structure for aulas
-- ----------------------------
DROP TABLE IF EXISTS `aulas`;
CREATE TABLE `aulas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `id_edificios` int(255) NULL DEFAULT NULL,
  `id_organizaciones` int(255) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_edificios`(`id_edificios`) USING BTREE,
  CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `aulas_ibfk_2` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `aulas_ibfk_3` FOREIGN KEY (`id_edificios`) REFERENCES `edificios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aulas
-- ----------------------------
INSERT INTO `aulas` VALUES (1, '101', 10, 1, 1, '2019-10-13 05:13:05', '2019-11-03 03:46:45', NULL, 1);
INSERT INTO `aulas` VALUES (2, 'A2', 15, 1, 1, '2019-10-13 17:30:43', NULL, NULL, 1);
INSERT INTO `aulas` VALUES (3, 'dd', 100, 1, 1, '2019-11-03 05:10:05', NULL, NULL, 1);
INSERT INTO `aulas` VALUES (4, 'fhh', 100, 3, 1, '2019-11-04 02:48:56', '2019-11-04 02:50:33', '2019-11-04 02:50:33', 2);
INSERT INTO `aulas` VALUES (5, 'yhgfhgfh', 50, 3, 1, '2019-11-04 02:51:52', '2019-11-04 02:51:58', '2019-11-04 02:51:58', 2);
INSERT INTO `aulas` VALUES (6, 'A101', 100, 5, 1, '2019-11-04 03:45:15', '2019-11-04 04:27:12', '2019-11-04 04:27:12', 2);
INSERT INTO `aulas` VALUES (7, '6666', 45, 5, 1, '2019-11-04 04:27:48', '2019-11-04 05:35:26', NULL, 1);

-- ----------------------------
-- Table structure for aulas_jornadas
-- ----------------------------
DROP TABLE IF EXISTS `aulas_jornadas`;
CREATE TABLE `aulas_jornadas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jornadas` int(11) NOT NULL,
  `id_aulas` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `capacidad_actual` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_jornadas`(`id_jornadas`) USING BTREE,
  INDEX `id_aulas`(`id_aulas`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `aulas_jornadas_ibfk_1` FOREIGN KEY (`id_jornadas`) REFERENCES `jornadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `aulas_jornadas_ibfk_2` FOREIGN KEY (`id_aulas`) REFERENCES `aulas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `aulas_jornadas_ibfk_3` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aulas_jornadas
-- ----------------------------
INSERT INTO `aulas_jornadas` VALUES (1, 13, 1, '2019-11-03 04:39:03', '2019-11-03 05:04:24', '2019-11-03 05:04:24', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (2, 14, 1, '2019-11-03 04:57:04', '2019-11-03 05:04:24', '2019-11-03 05:04:24', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (3, 14, 1, '2019-11-03 04:57:21', '2019-11-03 05:04:24', '2019-11-03 05:04:24', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (4, 14, 1, '2019-11-03 04:58:46', '2019-11-03 05:04:24', '2019-11-03 05:04:24', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (5, 13, 1, '2019-11-03 05:04:19', '2019-11-03 05:04:24', '2019-11-03 05:04:24', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (6, 14, 1, '2019-11-03 05:04:24', NULL, NULL, 1, 0);
INSERT INTO `aulas_jornadas` VALUES (7, 16, 3, '2019-11-03 05:10:05', NULL, NULL, 1, 0);
INSERT INTO `aulas_jornadas` VALUES (8, 36, 4, '2019-11-04 02:48:56', NULL, NULL, 1, 0);
INSERT INTO `aulas_jornadas` VALUES (9, 35, 5, '2019-11-04 02:51:52', NULL, NULL, 1, 0);
INSERT INTO `aulas_jornadas` VALUES (10, 35, 6, '2019-11-04 03:45:15', '2019-11-04 04:27:12', '2019-11-04 04:27:12', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (11, 35, 7, '2019-11-04 04:27:48', '2019-11-04 05:35:26', '2019-11-04 05:35:26', 2, 0);
INSERT INTO `aulas_jornadas` VALUES (12, 35, 7, '2019-11-04 05:35:26', NULL, NULL, 1, 0);

-- ----------------------------
-- Table structure for ctlg_asignaturas
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_asignaturas`;
CREATE TABLE `ctlg_asignaturas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_asignaturas_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_asignaturas
-- ----------------------------
INSERT INTO `ctlg_asignaturas` VALUES (6, 'Lengua y Literatura', '2019-11-03 00:43:24', '2019-11-03 23:18:49', NULL, 1);
INSERT INTO `ctlg_asignaturas` VALUES (7, 'Inglés', '2019-11-03 00:43:36', NULL, NULL, 1);
INSERT INTO `ctlg_asignaturas` VALUES (8, 'Matemática', '2019-11-03 00:43:46', NULL, NULL, 1);
INSERT INTO `ctlg_asignaturas` VALUES (9, 'Ciencias Naturales', '2019-11-03 00:43:54', NULL, NULL, 1);
INSERT INTO `ctlg_asignaturas` VALUES (10, 'Estudios Sociales', '2019-11-03 00:44:03', NULL, NULL, 1);
INSERT INTO `ctlg_asignaturas` VALUES (11, 'Educación Física', '2019-11-03 00:44:09', NULL, NULL, 1);
INSERT INTO `ctlg_asignaturas` VALUES (12, 'Educación Cultural y Artística', '2019-11-03 00:44:16', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_cantones
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_cantones`;
CREATE TABLE `ctlg_cantones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_cantones_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 225 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_cantones
-- ----------------------------
INSERT INTO `ctlg_cantones` VALUES (1, '0101', 'CUENCA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (2, '0102', 'GIRON', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (3, '0103', 'GUALACEO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (4, '0104', 'NABON', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (5, '0105', 'PAUTE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (6, '0106', 'PUCARA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (7, '0107', 'SAN FERNANDO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (8, '0108', 'SANTA ISABEL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (9, '0109', 'SIGSIG', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (10, '0110', 'OÑA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (11, '0111', 'CHORDELEG', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (12, '0112', 'EL PAN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (13, '0113', 'SEVILLA DE ORO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (14, '0114', 'GUACHAPALA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (15, '0115', 'CAMILO PONCE ENRIQUEZ', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (16, '0201', 'GUARANDA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (17, '0202', 'CHILLANES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (18, '0203', 'CHIMBO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (19, '0204', 'ECHEANDIA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (20, '0205', 'SAN MIGUEL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (21, '0206', 'CALUMA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (22, '0207', 'LAS NAVES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (23, '0301', 'AZOGUES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (24, '0302', 'BIBLIAN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (25, '0303', 'CAÑAR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (26, '0304', 'LA TRONCAL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (27, '0305', 'EL TAMBO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (28, '0306', 'DELEG', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (29, '0307', 'SUSCAL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (30, '0401', 'TULCAN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (31, '0402', 'BOLIVAR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (32, '0403', 'ESPEJO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (33, '0404', 'MIRA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (34, '0405', 'MONTUFAR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (35, '0406', 'SAN PEDRO DE HUACA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (36, '0501', 'LATACUNGA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (37, '0502', 'LA MANA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (38, '0503', 'PANGUA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (39, '0504', 'PUJILI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (40, '0505', 'SALCEDO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (41, '0506', 'SAQUISILI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (42, '0507', 'SIGCHOS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (43, '0601', 'RIOBAMBA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (44, '0602', 'ALAUSI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (45, '0603', 'COLTA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (46, '0604', 'CHAMBO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (47, '0605', 'CHUNCHI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (48, '0606', 'GUAMOTE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (49, '0607', 'GUANO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (50, '0608', 'PALLATANGA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (51, '0609', 'PENIPE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (52, '0610', 'CUMANDA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (53, '0701', 'MACHALA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (54, '0702', 'ARENILLAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (55, '0703', 'ATAHUALPA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (56, '0704', 'BALSAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (57, '0705', 'CHILLA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (58, '0706', 'EL GUABO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (59, '0707', 'HUAQUILLAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (60, '0708', 'MARCABELI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (61, '0709', 'PASAJE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (62, '0710', 'PIÑAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (63, '0711', 'PORTOVELO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (64, '0712', 'SANTA ROSA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (65, '0713', 'ZARUMA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (66, '0714', 'LAS LAJAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (67, '0801', 'ESMERALDAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (68, '0802', 'ELOY ALFARO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (69, '0803', 'MUISNE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (70, '0804', 'QUININDE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (71, '0805', 'SAN LORENZO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (72, '0806', 'ATACAMES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (73, '0807', 'RIO VERDE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (74, '0901', 'GUAYAQUIL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (75, '0902', 'ALFREDO BAQUERIZO MORENO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (76, '0903', 'BALAO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (77, '0904', 'BALZAR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (78, '0905', 'COLIMES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (79, '0906', 'DAULE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (80, '0907', 'DURAN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (81, '0908', 'EL EMPALME', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (82, '0909', 'EL TRIUNFO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (83, '0910', 'MILAGRO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (84, '0911', 'NARANJAL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (85, '0912', 'NARANJITO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (86, '0913', 'PALESTINA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (87, '0914', 'PEDRO CARBO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (88, '0916', 'SAMBORONDON', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (89, '0918', 'SANTA LUCIA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (90, '0919', 'SALITRE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (91, '0920', 'SAN JACINTO DE YAGUACHI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (92, '0921', 'PLAYAS (GENERAL VILLAMIL)', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (93, '0922', 'SIMON BOLIVAR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (94, '0923', 'CORONEL MARCELINO MARIDUEÑA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (95, '0924', 'LOMAS DE SARGENTILLO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (96, '0925', 'NOBOL (VICENTE PIEDRAHITA)', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (97, '0927', 'GENERAL ANTONIO ELIZALDE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (98, '0928', 'ISIDRO AYORA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (99, '1001', 'IBARRA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (100, '1002', 'ANTONIO ANTE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (101, '1003', 'COTACACHI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (102, '1004', 'OTAVALO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (103, '1005', 'PIMAMPIRO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (104, '1006', 'SAN MIGUEL DE URCUQUI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (105, '1101', 'LOJA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (106, '1102', 'CALVAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (107, '1103', 'CATAMAYO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (108, '1104', 'CELICA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (109, '1105', 'CHAHUARPAMBA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (110, '1106', 'ESPINDOLA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (111, '1107', 'GONZANAMA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (112, '1108', 'MACARA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (113, '1109', 'PALTAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (114, '1110', 'PUYANGO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (115, '1111', 'SARAGURO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (116, '1112', 'SOZORANGA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (117, '1113', 'ZAPOTILLO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (118, '1114', 'PINDAL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (119, '1115', 'QUILANGA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (120, '1116', 'OLMEDO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (121, '1201', 'BABAHOYO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (122, '1202', 'BABA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (123, '1203', 'MONTALVO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (124, '1204', 'PUEBLO VIEJO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (125, '1205', 'QUEVEDO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (126, '1206', 'URDANETA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (127, '1207', 'VENTANAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (128, '1208', 'VINCES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (129, '1209', 'PALENQUE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (130, '1210', 'BUENA FE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (131, '1211', 'VALENCIA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (132, '1212', 'MOCACHE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (133, '1213', 'QUINSALOMA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (134, '1301', 'PORTOVIEJO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (135, '1302', 'BOLIVAR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (136, '1303', 'CHONE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (137, '1304', 'EL CARMEN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (138, '1305', 'FLAVIO ALFARO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (139, '1306', 'JIPIJAPA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (140, '1307', 'JUNIN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (141, '1308', 'MANTA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (142, '1309', 'MONTECRISTI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (143, '1310', 'PAJAN', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (144, '1311', 'PICHINCHA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (145, '1312', 'ROCAFUERTE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (146, '1313', 'SANTA ANA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (147, '1314', 'SUCRE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (148, '1315', 'TOSAGUA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (149, '1316', '24 DE MAYO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (150, '1317', 'PEDERNALES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (151, '1318', 'OLMEDO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (152, '1319', 'PUERTO LOPEZ', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (153, '1320', 'JAMA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (154, '1321', 'JARAMIJO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (155, '1322', 'SAN VICENTE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (156, '1401', 'MORONA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (157, '1402', 'GUALAQUIZA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (158, '1403', 'LIMON - INDANZA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (159, '1404', 'PALORA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (160, '1405', 'SANTIAGO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (161, '1406', 'SUCUA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (162, '1407', 'HUAMBOYA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (163, '1408', 'SAN JUAN BOSCO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (164, '1409', 'TAISHA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (165, '1410', 'LOGROÑO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (166, '1411', 'PABLO SEXTO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (167, '1412', 'TIWINTZA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (168, '1501', 'TENA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (169, '1503', 'ARCHIDONA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (170, '1504', 'EL CHACO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (171, '1507', 'QUIJOS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (172, '1509', 'CARLOS JULIO AROSEMENA T.', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (173, '1601', 'PASTAZA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (174, '1602', 'MERA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (175, '1603', 'SANTA CLARA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (176, '1604', 'ARAJUNO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (177, '1701', 'QUITO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (178, '1702', 'CAYAMBE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (179, '1703', 'MEJIA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (180, '1704', 'PEDRO MONCAYO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (181, '1705', 'RUMIÑAHUI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (182, '1707', 'SAN MIGUEL DE LOS BANCOS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (183, '1708', 'PEDRO VICENTE MALDONADO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (184, '1709', 'PUERTO QUITO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (185, '1801', 'AMBATO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (186, '1802', 'BAÑOS DE AGUA SANTA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (187, '1803', 'CEVALLOS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (188, '1804', 'MOCHA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (189, '1805', 'PATATE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (190, '1806', 'QUERO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (191, '1807', 'SAN PEDRO DE PELILEO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (192, '1808', 'SANTIAGO DE PILLARO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (193, '1809', 'TISALEO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (194, '1901', 'ZAMORA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (195, '1902', 'CHINCHIPE', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (196, '1903', 'NANGARITZA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (197, '1904', 'YACUAMBI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (198, '1905', 'YANTZAZA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (199, '1906', 'EL PANGUI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (200, '1907', 'CENTINELA DEL CONDOR', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (201, '1908', 'PALANDA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (202, '1909', 'PAQUISHA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (203, '2001', 'SAN CRISTOBAL', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (204, '2002', 'ISABELA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (205, '2003', 'SANTA CRUZ', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (206, '2101', 'LAGO AGRIO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (207, '2102', 'GONZALO PIZARRO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (208, '2103', 'PUTUMAYO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (209, '2104', 'SHUSHUFINDI', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (210, '2105', 'SUCUMBIOS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (211, '2106', 'CASCALES', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (212, '2107', 'CUYABENO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (213, '2201', 'FRANCISCO DE ORELLANA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (214, '2202', 'AGUARICO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (215, '2203', 'LA JOYA DE LOS SACHAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (216, '2204', 'LORETO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (217, '2301', 'SANTO DOMINGO', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (218, '2302', 'LA CONCORDIA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (219, '2401', 'SANTA ELENA', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (220, '2402', 'LA LIBERTAD', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (221, '2403', 'SALINAS', '2019-10-07 17:33:30', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (222, '9001', 'LAS GOLONDRINA', '2019-10-07 19:05:22', '2019-10-07 19:05:34', NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (223, '9003', 'MANGA DEL CURA ', '2019-10-07 19:06:29', NULL, NULL, 1);
INSERT INTO `ctlg_cantones` VALUES (224, '9004', 'EL PIEDRERO', '2019-10-07 19:07:01', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_cursos
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_cursos`;
CREATE TABLE `ctlg_cursos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_ctlg_etapas_educacion` int(255) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_etapas_educacion`(`id_ctlg_etapas_educacion`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_cursos_ibfk_1` FOREIGN KEY (`id_ctlg_etapas_educacion`) REFERENCES `ctlg_etapas_educacion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ctlg_cursos_ibfk_2` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_cursos
-- ----------------------------
INSERT INTO `ctlg_cursos` VALUES (1, 'Inicial 1', 1, '2019-10-12 20:31:25', '2019-10-13 02:08:49', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (2, 'Primero de Educación General Básica ', 2, '2019-10-12 20:31:57', '2019-10-13 02:08:57', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (3, 'Segundo de  Educación General Básica', 2, '2019-10-12 20:33:04', '2019-10-13 02:08:59', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (4, 'Tercero de Educación General Básica', 2, '2019-10-12 20:33:07', '2019-10-13 02:09:00', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (5, 'Cuarto de Educación General Básica', 2, '2019-10-12 20:33:17', '2019-10-13 02:09:01', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (6, 'Quinto de Educación General Básica', 2, '2019-10-12 20:33:26', '2019-10-13 02:09:02', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (7, 'Sexto de Educación General Básica', 2, '2019-10-12 20:33:35', '2019-10-13 02:09:03', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (8, 'Septimo de Educación General Básica', 2, '2019-10-12 20:33:47', '2019-10-13 02:09:04', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (9, 'Octavo de Educación General  Básica', 2, '2019-10-12 20:33:58', '2019-10-13 02:09:31', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (10, 'Noveno de Educación General Básica ', 2, '2019-10-12 20:34:09', '2019-10-13 02:09:33', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (11, 'Decimo de Educación General Básica ', 2, '2019-10-12 20:34:23', '2019-10-13 02:09:35', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (12, 'Primero de Bachillerato', 3, '2019-10-12 20:37:48', '2019-10-13 02:09:37', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (13, 'Secundo de Bachillerato', 3, '2019-10-12 20:38:01', '2019-10-13 02:09:38', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (14, 'Tercero de Bachillerato', 3, '2019-10-12 20:38:29', '2019-10-13 02:09:41', NULL, 1);
INSERT INTO `ctlg_cursos` VALUES (15, 'Inicial 2', 1, '2019-10-12 20:48:25', '2019-10-13 02:08:52', NULL, 1);

-- ----------------------------
-- Table structure for ctlg_estados
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_estados`;
CREATE TABLE `ctlg_estados`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_estados
-- ----------------------------
INSERT INTO `ctlg_estados` VALUES (1, 'Activo', '2019-10-10 02:26:20', '2019-10-10 23:03:50', NULL, 1);
INSERT INTO `ctlg_estados` VALUES (2, 'Inactivo', '2019-10-10 23:04:10', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_estados_civil
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_estados_civil`;
CREATE TABLE `ctlg_estados_civil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_estados_civil_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_estados_civil
-- ----------------------------
INSERT INTO `ctlg_estados_civil` VALUES (1, 'SOLTERO/A', '2019-10-07 18:19:18', NULL, NULL, 1);
INSERT INTO `ctlg_estados_civil` VALUES (2, 'CASADO/A', '2019-10-07 18:19:18', NULL, NULL, 1);
INSERT INTO `ctlg_estados_civil` VALUES (3, 'UNIÓN LIBRE / UNIÓN DE HECHO', '2019-10-07 18:19:18', NULL, NULL, 1);
INSERT INTO `ctlg_estados_civil` VALUES (4, 'DIVORCIADO/A', '2019-10-07 18:19:18', NULL, NULL, 1);
INSERT INTO `ctlg_estados_civil` VALUES (5, 'VIUDO/A', '2019-10-07 18:19:18', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_etapas_educacion
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_etapas_educacion`;
CREATE TABLE `ctlg_etapas_educacion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_etapas_educacion_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_etapas_educacion
-- ----------------------------
INSERT INTO `ctlg_etapas_educacion` VALUES (1, 'Preescolar', 1, '2019-10-12 20:26:42', '2019-10-12 20:51:07', NULL);
INSERT INTO `ctlg_etapas_educacion` VALUES (2, 'Primaria', 1, '2019-10-12 20:26:57', NULL, NULL);
INSERT INTO `ctlg_etapas_educacion` VALUES (3, 'Secundaria', 1, '2019-10-12 20:27:14', NULL, NULL);

-- ----------------------------
-- Table structure for ctlg_generos
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_generos`;
CREATE TABLE `ctlg_generos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_generos_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_generos
-- ----------------------------
INSERT INTO `ctlg_generos` VALUES (1, 'Masculino', '2019-10-10 23:49:46', NULL, 1, NULL);
INSERT INTO `ctlg_generos` VALUES (2, 'Femenino', '2019-10-10 23:49:55', NULL, 1, NULL);

-- ----------------------------
-- Table structure for ctlg_insumos
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_insumos`;
CREATE TABLE `ctlg_insumos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_insumos
-- ----------------------------
INSERT INTO `ctlg_insumos` VALUES (1, 'Tareas', '2019-11-04 06:11:22', NULL, NULL, 1);
INSERT INTO `ctlg_insumos` VALUES (2, 'Lecciones', '2019-11-04 06:12:14', NULL, NULL, 1);
INSERT INTO `ctlg_insumos` VALUES (3, 'Act. Individual', '2019-11-04 06:12:23', NULL, NULL, 1);
INSERT INTO `ctlg_insumos` VALUES (4, 'Act. Grupal', '2019-11-04 06:12:31', NULL, NULL, 1);
INSERT INTO `ctlg_insumos` VALUES (5, 'Evaluación Escrita', '2019-11-04 06:12:39', NULL, NULL, 1);
INSERT INTO `ctlg_insumos` VALUES (6, 'Examen', '2019-11-04 06:12:41', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_jornadas
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_jornadas`;
CREATE TABLE `ctlg_jornadas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_jornadas_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_jornadas
-- ----------------------------
INSERT INTO `ctlg_jornadas` VALUES (1, 'Matutina', '2019-10-12 20:55:12', NULL, NULL, 1);
INSERT INTO `ctlg_jornadas` VALUES (2, 'Vespertina', '2019-10-12 20:55:21', NULL, NULL, 1);
INSERT INTO `ctlg_jornadas` VALUES (3, 'Nocturna', '2019-10-12 20:55:43', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_paises
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_paises`;
CREATE TABLE `ctlg_paises`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `codigo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_paises_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 197 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_paises
-- ----------------------------
INSERT INTO `ctlg_paises` VALUES (1, 'Afganistán', 'AFG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (2, 'Albania', 'ALB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (3, 'Alemania', 'DEU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (4, 'Andorra', 'AND', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (5, 'Angola', 'AGO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (6, 'Antigua y Barbuda', 'ATG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (7, 'Arabia Saudita', 'SAU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (8, 'Argelia', 'DZA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (9, 'Argentina', 'ARG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (10, 'Armenia', 'ARM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (11, 'Australia', 'AUS', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (12, 'Austria', 'AUT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (13, 'Azerbaiyán', 'AZE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (14, 'Bahamas', 'BHS', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (15, 'Bahrein', 'BHR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (16, 'Bangladesh', 'BGD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (17, 'Barbados', 'BRB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (18, 'Belarús', 'BLR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (19, 'Belice', 'BLZ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (20, 'Benin', 'BEN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (21, 'Bhután', 'BTN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (22, 'Bolivia (Estado Plurinacional de)', 'BOL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (23, 'Bosnia y Herzegovina', 'BIH', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (24, 'Botswana', 'BWA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (25, 'Brasil', 'BRA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (26, 'Brunei Darussalam', 'BRN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (27, 'Bulgaria', 'BGR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (28, 'Burkina Faso', 'BFA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (29, 'Burundi', 'BDI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (30, 'Bélgica', 'BEL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (31, 'Cabo Verde', 'CPV', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (32, 'Camboya', 'KHM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (33, 'Camerún', 'CMR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (34, 'Canadá', 'CAN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (35, 'Chad', 'TCD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (36, 'Chequia', 'CZE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (37, 'Chile', 'CHL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (38, 'China', 'CHN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (39, 'Chipre', 'CYP', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (40, 'Colombia', 'COL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (41, 'Comoras', 'COM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (42, 'Congo', 'COG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (43, 'Costa Rica', 'CRI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (44, 'Croacia', 'HRV', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (45, 'Cuba', 'CUB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (46, 'Côte d\'Ivoire', 'CIV', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (47, 'Dinamarca', 'DNK', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (48, 'Djibouti', 'DJI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (49, 'Dominica', 'DMA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (50, 'Ecuador', 'ECU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (51, 'Egipto', 'EGY', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (52, 'El Salvador', 'SLV', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (53, 'Emiratos Árabes Unidos', 'ARE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (54, 'Eritrea', 'ERI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (55, 'Eslovaquia', 'SVK', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (56, 'Eslovenia', 'SVN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (57, 'España', 'ESP', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (58, 'Estados Unidos de América', 'USA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (59, 'Estonia', 'EST', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (60, 'Eswatini', 'SWZ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (61, 'Etiopía', 'ETH', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (62, 'Federación de Rusia', 'RUS', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (63, 'Fiji', 'FJI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (64, 'Filipinas', 'PHL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (65, 'Finlandia', 'FIN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (66, 'Francia', 'FRA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (67, 'Gabón', 'GAB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (68, 'Gambia', 'GMB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (69, 'Georgia', 'GEO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (70, 'Ghana', 'GHA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (71, 'Granada', 'GRD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (72, 'Grecia', 'GRC', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (73, 'Guatemala', 'GTM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (74, 'Guinea', 'GIN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (75, 'Guinea Ecuatorial', 'GNQ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (76, 'Guinea-Bissau', 'GNB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (77, 'Guyana', 'GUY', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (78, 'Haití', 'HTI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (79, 'Honduras', 'HND', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (80, 'Hungría', 'HUN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (81, 'India', 'IND', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (82, 'Indonesia', 'IDN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (83, 'Iraq', 'IRQ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (84, 'Irlanda', 'IRL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (85, 'Irán (República Islámica del)', 'IRN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (86, 'Islandia', 'ISL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (87, 'Islas Cook', 'COK', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (88, 'Islas Feroe', 'FRO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (89, 'Islas Marshall', 'MHL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (90, 'Islas Salomón', 'SLB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (91, 'Israel', 'ISR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (92, 'Italia', 'ITA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (93, 'Jamaica', 'JAM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (94, 'Japón', 'JPN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (95, 'Jordania', 'JOR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (96, 'Kazajstán', 'KAZ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (97, 'Kenya', 'KEN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (98, 'Kirguistán', 'KGZ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (99, 'Kiribati', 'KIR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (100, 'Kuwait', 'KWT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (101, 'Lesotho', 'LSO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (102, 'Letonia', 'LVA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (103, 'Liberia', 'LBR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (104, 'Libia', 'LBY', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (105, 'Lituania', 'LTU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (106, 'Luxemburgo', 'LUX', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (107, 'Líbano', 'LBN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (108, 'Macedonia del Norte', 'MKD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (109, 'Madagascar', 'MDG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (110, 'Malasia', 'MYS', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (111, 'Malawi', 'MWI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (112, 'Maldivas', 'MDV', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (113, 'Malta', 'MLT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (114, 'Malí', 'MLI', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (115, 'Marruecos', 'MAR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (116, 'Mauricio', 'MUS', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (117, 'Mauritania', 'MRT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (118, 'Micronesia (Estados Federados de)', 'FSM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (119, 'Mongolia', 'MNG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (120, 'Montenegro', 'MNE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (121, 'Mozambique', 'MOZ', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (122, 'Myanmar', 'MMR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (123, 'México', 'MEX', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (124, 'Mónaco', 'MCO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (125, 'Namibia', 'NAM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (126, 'Nauru', 'NRU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (127, 'Nepal', 'NPL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (128, 'Nicaragua', 'NIC', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (129, 'Nigeria', 'NGA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (130, 'Niue', 'NIU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (131, 'Noruega', 'NOR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (132, 'Nueva Zelandia', 'NZL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (133, 'Níger', 'NER', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (134, 'Omán', 'OMN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (135, 'Pakistán', 'PAK', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (136, 'Palau', 'PLW', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (137, 'Panamá', 'PAN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (138, 'Papua Nueva Guinea', 'PNG', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (139, 'Paraguay', 'PRY', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (140, 'Países Bajos', 'NLD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (141, 'Perú', 'PER', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (142, 'Polonia', 'POL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (143, 'Portugal', 'PRT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (144, 'Qatar', 'QAT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (145, 'Reino Unido de Gran Bretaña e Irlanda del Norte', 'GBR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (146, 'República Centroafricana', 'CAF', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (147, 'República Democrática Popular Lao', 'LAO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (148, 'República Democrática del Congo', 'COD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (149, 'República Dominicana', 'DOM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (150, 'República Popular Democrática de Corea', 'PRK', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (151, 'República Unida de Tanzanía', 'TZA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (152, 'República de Corea', 'KOR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (153, 'República de Moldova', 'MDA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (154, 'República Árabe Siria', 'SYR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (155, 'Rumania', 'ROU', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (156, 'Rwanda', 'RWA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (157, 'Saint Kitts y Nevis', 'KNA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (158, 'Samoa', 'WSM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (159, 'San Marino', 'SMR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (160, 'San Vicente y las Granadinas', 'VCT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (161, 'Santa Lucía', 'LCA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (162, 'Santo Tomé y Príncipe', 'STP', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (163, 'Senegal', 'SEN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (164, 'Serbia', 'SRB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (165, 'Seychelles', 'SYC', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (166, 'Sierra Leona', 'SLE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (167, 'Singapur', 'SGP', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (168, 'Somalia', 'SOM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (169, 'Sri Lanka', 'LKA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (170, 'Sudáfrica', 'ZAF', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (171, 'Sudán', 'SDN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (172, 'Sudán del Sur', 'SSD', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (173, 'Suecia', 'SWE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (174, 'Suiza', 'CHE', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (175, 'Suriname', 'SUR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (176, 'Tailandia', 'THA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (177, 'Tayikistán', 'TJK', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (178, 'Timor-Leste', 'TLS', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (179, 'Togo', 'TGO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (180, 'Tokelau', 'TKL', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (181, 'Tonga', 'TON', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (182, 'Trinidad y Tabago', 'TTO', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (183, 'Turkmenistán', 'TKM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (184, 'Turquía', 'TUR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (185, 'Tuvalu', 'TUV', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (186, 'Túnez', 'TUN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (187, 'Ucrania', 'UKR', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (188, 'Uganda', 'UGA', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (189, 'Uruguay', 'URY', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (190, 'Uzbekistán', 'UZB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (191, 'Vanuatu', 'VUT', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (192, 'Venezuela (República Bolivariana de)', 'VEN', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (193, 'Viet Nam', 'VNM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (194, 'Yemen', 'YEM', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (195, 'Zambia', 'ZMB', '2019-10-07 18:54:50', NULL, 1, NULL);
INSERT INTO `ctlg_paises` VALUES (196, 'Zimbabwe', 'ZWE', '2019-10-07 18:54:50', NULL, 1, NULL);

-- ----------------------------
-- Table structure for ctlg_parciales
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_parciales`;
CREATE TABLE `ctlg_parciales`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codigo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_parciales
-- ----------------------------
INSERT INTO `ctlg_parciales` VALUES (1, 'Primer Parcial', 'P1', '2019-11-04 06:08:41', NULL, NULL, 1);
INSERT INTO `ctlg_parciales` VALUES (2, 'Segundo Parcial', 'P2', '2019-11-04 06:08:52', '2019-11-04 06:08:57', NULL, 1);
INSERT INTO `ctlg_parciales` VALUES (3, 'Tercer Parcial', 'P3', '2019-11-04 06:09:07', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_parentescos
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_parentescos`;
CREATE TABLE `ctlg_parentescos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_parentescos_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_parentescos
-- ----------------------------
INSERT INTO `ctlg_parentescos` VALUES (1, 'PADRE', '2019-10-07 18:11:05', NULL, NULL, 1);
INSERT INTO `ctlg_parentescos` VALUES (2, 'MADRE', '2019-10-07 18:11:05', NULL, NULL, 1);
INSERT INTO `ctlg_parentescos` VALUES (3, 'HERMANO/A', '2019-10-07 18:11:05', NULL, NULL, 1);
INSERT INTO `ctlg_parentescos` VALUES (4, 'TIO/A', '2019-10-07 18:11:05', NULL, NULL, 1);
INSERT INTO `ctlg_parentescos` VALUES (5, 'ABUELO/A', '2019-10-07 18:11:05', NULL, NULL, 1);
INSERT INTO `ctlg_parentescos` VALUES (6, 'CUÑADO/A', '2019-10-07 18:11:05', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_parroquias
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_parroquias`;
CREATE TABLE `ctlg_parroquias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_parroquias_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1400 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_parroquias
-- ----------------------------
INSERT INTO `ctlg_parroquias` VALUES (1, 'BELLAVISTA', '010101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (2, 'CAÑARIBAMBA', '010102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (3, 'EL BATÁN', '010103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (4, 'EL SAGRARIO', '010104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (5, 'EL VECINO', '010105', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (6, 'GIL RAMÍREZ DÁVALOS', '010106', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (7, 'HUAYNACÁPAC', '010107', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (8, 'MACHÁNGARA', '010108', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (9, 'MONAY', '010109', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (10, 'SAN BLAS', '010110', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (11, 'SAN SEBASTIÁN', '010111', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (12, 'SUCRE', '010112', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (13, 'TOTORACOCHA', '010113', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (14, 'YANUNCAY', '010114', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (15, 'HERMANO MIGUEL', '010115', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (16, 'CUENCA', '010150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (17, 'BAÑOS', '010151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (18, 'CUMBE', '010152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (19, 'CHAUCHA', '010153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (20, 'CHECA (JIDCAY)', '010154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (21, 'CHIQUINTAD', '010155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (22, 'LLACAO', '010156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (23, 'MOLLETURO', '010157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (24, 'NULTI', '010158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (25, 'OCTAVIO CORDERO PALACIOS (SANTA ROSA)', '010159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (26, 'PACCHA', '010160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (27, 'QUINGEO', '010161', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (28, 'RICAURTE', '010162', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (29, 'SAN JOAQUÍN', '010163', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (30, 'SANTA ANA', '010164', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (31, 'SAYAUSÍ', '010165', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (32, 'SIDCAY', '010166', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (33, 'SININCAY', '010167', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (34, 'TARQUI', '010168', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (35, 'TURI', '010169', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (36, 'VALLE', '010170', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (37, 'VICTORIA DEL PORTETE (IRQUIS)', '010171', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (38, 'GIRÓN', '010250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (39, 'ASUNCIÓN', '010251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (40, 'SAN GERARDO', '010252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (41, 'GUALACEO', '010350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (42, 'CHORDELEG', '010351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (43, 'DANIEL CÓRDOVA TORAL (EL ORIENTE)', '010352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (44, 'JADÁN', '010353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (45, 'MARIANO MORENO', '010354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (46, 'PRINCIPAL', '010355', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (47, 'REMIGIO CRESPO TORAL (GÚLAG)', '010356', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (48, 'SAN JUAN', '010357', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (49, 'ZHIDMAD', '010358', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (50, 'LUIS CORDERO VEGA', '010359', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (51, 'SIMÓN BOLÍVAR (CAB. EN GAÑANZOL)', '010360', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (52, 'NABÓN', '010450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (53, 'COCHAPATA', '010451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (54, 'EL PROGRESO (CAB.EN ZHOTA)', '010452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (55, 'LAS NIEVES (CHAYA)', '010453', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (56, 'OÑA', '010454', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (57, 'PAUTE', '010550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (58, 'AMALUZA', '010551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (59, 'BULÁN (JOSÉ VÍCTOR IZQUIERDO)', '010552', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (60, 'CHICÁN (GUILLERMO ORTEGA)', '010553', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (61, 'EL CABO', '010554', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (62, 'GUACHAPALA', '010555', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (63, 'GUARAINAG', '010556', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (64, 'PALMAS', '010557', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (65, 'PAN', '010558', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (66, 'SAN CRISTÓBAL (CARLOS ORDÓÑEZ LAZO)', '010559', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (67, 'SEVILLA DE ORO', '010560', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (68, 'TOMEBAMBA', '010561', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (69, 'DUG DUG', '010562', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (70, 'PUCARÁ', '010650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (71, 'CAMILO PONCE ENRÍQUEZ (CAB. EN RÍO 7 DE MOLLEPONGO)', '010651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (72, 'SAN RAFAEL DE SHARUG', '010652', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (73, 'SAN FERNANDO', '010750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (74, 'CHUMBLÍN', '010751', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (75, 'SANTA ISABEL (CHAGUARURCO)', '010850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (76, 'ABDÓN CALDERÓN (LA UNIÓN)', '010851', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (77, 'EL CARMEN DE PIJILÍ', '010852', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (78, 'ZHAGLLI (SHAGLLI)', '010853', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (79, 'SAN SALVADOR DE CAÑARIBAMBA', '010854', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (80, 'SIGSIG', '010950', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (81, 'CUCHIL (CUTCHIL)', '010951', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (82, 'GIMA', '010952', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (83, 'GUEL', '010953', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (84, 'LUDO', '010954', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (85, 'SAN BARTOLOMÉ', '010955', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (86, 'SAN JOSÉ DE RARANGA', '010956', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (87, 'SAN FELIPE DE OÑA CABECERA CANTONAL', '011050', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (88, 'SUSUDEL', '011051', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (89, 'CHORDELEG', '011150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (90, 'PRINCIPAL', '011151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (91, 'LA UNIÓN', '011152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (92, 'LUIS GALARZA ORELLANA (CAB.EN DELEGSOL)', '011153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (93, 'SAN MARTÍN DE PUZHIO', '011154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (94, 'EL PAN', '011250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (95, 'AMALUZA', '011251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (96, 'PALMAS', '011252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (97, 'SAN VICENTE', '011253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (98, 'SEVILLA DE ORO', '011350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (99, 'AMALUZA', '011351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (100, 'PALMAS', '011352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (101, 'GUACHAPALA', '011450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (102, 'CAMILO PONCE ENRÍQUEZ', '011550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (103, 'EL CARMEN DE PIJILÍ', '011551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (104, 'ÁNGEL POLIBIO CHÁVES', '020101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (105, 'GABRIEL IGNACIO VEINTIMILLA', '020102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (106, 'GUANUJO', '020103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (107, 'GUARANDA', '020150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (108, 'FACUNDO VELA', '020151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (109, 'GUANUJO', '020152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (110, 'JULIO E. MORENO (CATANAHUÁN GRANDE)', '020153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (111, 'LAS NAVES', '020154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (112, 'SALINAS', '020155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (113, 'SAN LORENZO', '020156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (114, 'SAN SIMÓN (YACOTO)', '020157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (115, 'SANTA FÉ (SANTA FÉ)', '020158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (116, 'SIMIÁTUG', '020159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (117, 'SAN LUIS DE PAMBIL', '020160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (118, 'CHILLANES', '020250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (119, 'SAN JOSÉ DEL TAMBO (TAMBOPAMBA)', '020251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (120, 'SAN JOSÉ DE CHIMBO', '020350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (121, 'ASUNCIÓN (ASANCOTO)', '020351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (122, 'CALUMA', '020352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (123, 'MAGDALENA (CHAPACOTO)', '020353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (124, 'SAN SEBASTIÁN', '020354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (125, 'TELIMBELA', '020355', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (126, 'ECHEANDÍA', '020450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (127, 'SAN MIGUEL', '020550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (128, 'BALSAPAMBA', '020551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (129, 'BILOVÁN', '020552', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (130, 'RÉGULO DE MORA', '020553', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (131, 'SAN PABLO (SAN PABLO DE ATENAS)', '020554', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (132, 'SANTIAGO', '020555', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (133, 'SAN VICENTE', '020556', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (134, 'CALUMA', '020650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (135, 'LAS MERCEDES', '020701', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (136, 'LAS NAVES', '020702', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (137, 'LAS NAVES', '020750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (138, 'AURELIO BAYAS MARTÍNEZ', '030101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (139, 'AZOGUES', '030102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (140, 'BORRERO', '030103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (141, 'SAN FRANCISCO', '030104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (142, 'AZOGUES', '030150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (143, 'COJITAMBO', '030151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (144, 'DÉLEG', '030152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (145, 'GUAPÁN', '030153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (146, 'JAVIER LOYOLA (CHUQUIPATA)', '030154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (147, 'LUIS CORDERO', '030155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (148, 'PINDILIG', '030156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (149, 'RIVERA', '030157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (150, 'SAN MIGUEL', '030158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (151, 'SOLANO', '030159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (152, 'TADAY', '030160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (153, 'BIBLIÁN', '030250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (154, 'NAZÓN (CAB. EN PAMPA DE DOMÍNGUEZ)', '030251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (155, 'SAN FRANCISCO DE SAGEO', '030252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (156, 'TURUPAMBA', '030253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (157, 'JERUSALÉN', '030254', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (158, 'CAÑAR', '030350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (159, 'CHONTAMARCA', '030351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (160, 'CHOROCOPTE', '030352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (161, 'GENERAL MORALES (SOCARTE)', '030353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (162, 'GUALLETURO', '030354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (163, 'HONORATO VÁSQUEZ (TAMBO VIEJO)', '030355', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (164, 'INGAPIRCA', '030356', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (165, 'JUNCAL', '030357', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (166, 'SAN ANTONIO', '030358', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (167, 'SUSCAL', '030359', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (168, 'TAMBO', '030360', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (169, 'ZHUD', '030361', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (170, 'VENTURA', '030362', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (171, 'DUCUR', '030363', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (172, 'LA TRONCAL', '030450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (173, 'MANUEL J. CALLE', '030451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (174, 'PANCHO NEGRO', '030452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (175, 'EL TAMBO', '030550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (176, 'DÉLEG', '030650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (177, 'SOLANO', '030651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (178, 'SUSCAL', '030750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (179, 'GONZÁLEZ SUÁREZ', '040101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (180, 'TULCÁN', '040102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (181, 'TULCÁN', '040150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (182, 'EL CARMELO (EL PUN)', '040151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (183, 'HUACA', '040152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (184, 'JULIO ANDRADE (OREJUELA)', '040153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (185, 'MALDONADO', '040154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (186, 'PIOTER', '040155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (187, 'TOBAR DONOSO (LA BOCANA DE CAMUMBÍ)', '040156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (188, 'TUFIÑO', '040157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (189, 'URBINA (TAYA)', '040158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (190, 'EL CHICAL', '040159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (191, 'MARISCAL SUCRE', '040160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (192, 'SANTA MARTHA DE CUBA', '040161', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (193, 'BOLÍVAR', '040250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (194, 'GARCÍA MORENO', '040251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (195, 'LOS ANDES', '040252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (196, 'MONTE OLIVO', '040253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (197, 'SAN VICENTE DE PUSIR', '040254', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (198, 'SAN RAFAEL', '040255', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (199, 'EL ÁNGEL', '040301', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (200, '2019-09-27', '040302', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (201, 'EL ANGEL', '040350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (202, 'EL GOALTAL', '040351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (203, 'LA LIBERTAD (ALIZO)', '040352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (204, 'SAN ISIDRO', '040353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (205, 'MIRA (CHONTAHUASI)', '040450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (206, 'CONCEPCIÓN', '040451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (207, 'JIJÓN Y CAAMAÑO (CAB. EN RÍO BLANCO)', '040452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (208, 'JUAN MONTALVO (SAN IGNACIO DE QUIL)', '040453', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (209, 'GONZÁLEZ SUÁREZ', '040501', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (210, 'SAN JOSÉ', '040502', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (211, 'SAN GABRIEL', '040550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (212, 'CRISTÓBAL COLÓN', '040551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (213, 'CHITÁN DE NAVARRETE', '040552', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (214, 'FERNÁNDEZ SALVADOR', '040553', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (215, 'LA PAZ', '040554', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (216, 'PIARTAL', '040555', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (217, 'HUACA', '040650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (218, 'MARISCAL SUCRE', '040651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (219, 'ELOY ALFARO (SAN FELIPE)', '050101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (220, 'IGNACIO FLORES (PARQUE FLORES)', '050102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (221, 'JUAN MONTALVO (SAN SEBASTIÁN)', '050103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (222, 'LA MATRIZ', '050104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (223, 'SAN BUENAVENTURA', '050105', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (224, 'LATACUNGA', '050150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (225, 'ALAQUES (ALÁQUEZ)', '050151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (226, 'BELISARIO QUEVEDO (GUANAILÍN)', '050152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (227, 'GUAITACAMA (GUAYTACAMA)', '050153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (228, 'JOSEGUANGO BAJO', '050154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (229, 'LAS PAMPAS', '050155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (230, 'MULALÓ', '050156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (231, '11 DE NOVIEMBRE (ILINCHISI)', '050157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (232, 'POALÓ', '050158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (233, 'SAN JUAN DE PASTOCALLE', '050159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (234, 'SIGCHOS', '050160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (235, 'TANICUCHÍ', '050161', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (236, 'TOACASO', '050162', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (237, 'PALO QUEMADO', '050163', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (238, 'EL CARMEN', '050201', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (239, 'LA MANÁ', '050202', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (240, 'EL TRIUNFO', '050203', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (241, 'LA MANÁ', '050250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (242, 'GUASAGANDA (CAB.EN GUASAGANDA', '050251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (243, 'PUCAYACU', '050252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (244, 'EL CORAZÓN', '050350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (245, 'MORASPUNGO', '050351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (246, 'PINLLOPATA', '050352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (247, 'RAMÓN CAMPAÑA', '050353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (248, 'PUJILÍ', '050450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (249, 'ANGAMARCA', '050451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (250, 'CHUCCHILÁN (CHUGCHILÁN)', '050452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (251, 'GUANGAJE', '050453', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (252, 'ISINLIBÍ (ISINLIVÍ)', '050454', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (253, 'LA VICTORIA', '050455', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (254, 'PILALÓ', '050456', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (255, 'TINGO', '050457', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (256, 'ZUMBAHUA', '050458', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (257, 'SAN MIGUEL', '050550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (258, 'ANTONIO JOSÉ HOLGUÍN (SANTA LUCÍA)', '050551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (259, 'CUSUBAMBA', '050552', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (260, 'MULALILLO', '050553', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (261, 'MULLIQUINDIL (SANTA ANA)', '050554', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (262, 'PANSALEO', '050555', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (263, 'SAQUISILÍ', '050650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (264, 'CANCHAGUA', '050651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (265, 'CHANTILÍN', '050652', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (266, 'COCHAPAMBA', '050653', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (267, 'SIGCHOS', '050750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (268, 'CHUGCHILLÁN', '050751', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (269, 'ISINLIVÍ', '050752', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (270, 'LAS PAMPAS', '050753', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (271, 'PALO QUEMADO', '050754', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (272, 'LIZARZABURU', '060101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (273, 'MALDONADO', '060102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (274, 'VELASCO', '060103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (275, 'VELOZ', '060104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (276, 'YARUQUÍES', '060105', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (277, 'RIOBAMBA', '060150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (278, 'CACHA (CAB. EN MACHÁNGARA)', '060151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (279, 'CALPI', '060152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (280, 'CUBIJÍES', '060153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (281, 'FLORES', '060154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (282, 'LICÁN', '060155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (283, 'LICTO', '060156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (284, 'PUNGALÁ', '060157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (285, 'PUNÍN', '060158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (286, 'QUIMIAG', '060159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (287, 'SAN JUAN', '060160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (288, 'SAN LUIS', '060161', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (289, 'ALAUSÍ', '060250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (290, 'ACHUPALLAS', '060251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (291, 'CUMANDÁ', '060252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (292, 'GUASUNTOS', '060253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (293, 'HUIGRA', '060254', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (294, 'MULTITUD', '060255', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (295, 'PISTISHÍ (NARIZ DEL DIABLO)', '060256', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (296, 'PUMALLACTA', '060257', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (297, 'SEVILLA', '060258', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (298, 'SIBAMBE', '060259', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (299, 'TIXÁN', '060260', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (300, 'CAJABAMBA', '060301', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (301, 'SICALPA', '060302', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (302, 'VILLA LA UNIÓN (CAJABAMBA)', '060350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (303, 'CAÑI', '060351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (304, 'COLUMBE', '060352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (305, 'JUAN DE VELASCO (PANGOR)', '060353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (306, 'SANTIAGO DE QUITO (CAB. EN SAN ANTONIO DE QUITO)', '060354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (307, 'CHAMBO', '060450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (308, 'CHUNCHI', '060550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (309, 'CAPZOL', '060551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (310, 'COMPUD', '060552', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (311, 'GONZOL', '060553', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (312, 'LLAGOS', '060554', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (313, 'GUAMOTE', '060650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (314, 'CEBADAS', '060651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (315, 'PALMIRA', '060652', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (316, 'EL ROSARIO', '060701', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (317, 'LA MATRIZ', '060702', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (318, 'GUANO', '060750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (319, 'GUANANDO', '060751', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (320, 'ILAPO', '060752', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (321, 'LA PROVIDENCIA', '060753', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (322, 'SAN ANDRÉS', '060754', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (323, 'SAN GERARDO DE PACAICAGUÁN', '060755', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (324, 'SAN ISIDRO DE PATULÚ', '060756', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (325, 'SAN JOSÉ DEL CHAZO', '060757', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (326, 'SANTA FÉ DE GALÁN', '060758', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (327, 'VALPARAÍSO', '060759', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (328, 'PALLATANGA', '060850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (329, 'PENIPE', '060950', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (330, 'EL ALTAR', '060951', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (331, 'MATUS', '060952', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (332, 'PUELA', '060953', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (333, 'SAN ANTONIO DE BAYUSHIG', '060954', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (334, 'LA CANDELARIA', '060955', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (335, 'BILBAO (CAB.EN QUILLUYACU)', '060956', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (336, 'CUMANDÁ', '061050', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (337, 'LA PROVIDENCIA', '070101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (338, 'MACHALA', '070102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (339, 'PUERTO BOLÍVAR', '070103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (340, 'NUEVE DE MAYO', '070104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (341, 'EL CAMBIO', '070105', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (342, 'MACHALA', '070150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (343, 'EL CAMBIO', '070151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (344, 'EL RETIRO', '070152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (345, 'ARENILLAS', '070250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (346, 'CHACRAS', '070251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (347, 'LA LIBERTAD', '070252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (348, 'LAS LAJAS (CAB. EN LA VICTORIA)', '070253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (349, 'PALMALES', '070254', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (350, 'CARCABÓN', '070255', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (351, 'PACCHA', '070350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (352, 'AYAPAMBA', '070351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (353, 'CORDONCILLO', '070352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (354, 'MILAGRO', '070353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (355, 'SAN JOSÉ', '070354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (356, 'SAN JUAN DE CERRO AZUL', '070355', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (357, 'BALSAS', '070450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (358, 'BELLAMARÍA', '070451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (359, 'CHILLA', '070550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (360, 'EL GUABO', '070650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (361, 'BARBONES (SUCRE)', '070651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (362, 'LA IBERIA', '070652', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (363, 'TENDALES (CAB.EN PUERTO TENDALES)', '070653', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (364, 'RÍO BONITO', '070654', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (365, 'ECUADOR', '070701', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (366, 'EL PARAÍSO', '070702', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (367, 'HUALTACO', '070703', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (368, 'MILTON REYES', '070704', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (369, 'UNIÓN LOJANA', '070705', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (370, 'HUAQUILLAS', '070750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (371, 'MARCABELÍ', '070850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (372, 'EL INGENIO', '070851', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (373, 'BOLÍVAR', '070901', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (374, 'LOMA DE FRANCO', '070902', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (375, 'OCHOA LEÓN (MATRIZ)', '070903', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (376, 'TRES CERRITOS', '070904', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (377, 'PASAJE', '070950', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (378, 'BUENAVISTA', '070951', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (379, 'CASACAY', '070952', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (380, 'LA PEAÑA', '070953', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (381, 'PROGRESO', '070954', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (382, 'UZHCURRUMI', '070955', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (383, 'CAÑAQUEMADA', '070956', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (384, 'LA MATRIZ', '071001', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (385, 'LA SUSAYA', '071002', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (386, 'PIÑAS GRANDE', '071003', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (387, 'PIÑAS', '071050', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (388, 'CAPIRO (CAB. EN LA CAPILLA DE CAPIRO)', '071051', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (389, 'LA BOCANA', '071052', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (390, 'MOROMORO (CAB. EN EL VADO)', '071053', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (391, 'PIEDRAS', '071054', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (392, 'SAN ROQUE (AMBROSIO MALDONADO)', '071055', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (393, 'SARACAY', '071056', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (394, 'PORTOVELO', '071150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (395, 'CURTINCAPA', '071151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (396, 'MORALES', '071152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (397, 'SALATÍ', '071153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (398, 'SANTA ROSA', '071201', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (399, 'PUERTO JELÍ', '071202', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (400, 'BALNEARIO JAMBELÍ (SATÉLITE)', '071203', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (401, 'JUMÓN (SATÉLITE)', '071204', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (402, 'NUEVO SANTA ROSA', '071205', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (403, 'SANTA ROSA', '071250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (404, 'BELLAVISTA', '071251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (405, 'JAMBELÍ', '071252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (406, 'LA AVANZADA', '071253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (407, 'SAN ANTONIO', '071254', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (408, 'TORATA', '071255', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (409, 'VICTORIA', '071256', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (410, 'BELLAMARÍA', '071257', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (411, 'ZARUMA', '071350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (412, 'ABAÑÍN', '071351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (413, 'ARCAPAMBA', '071352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (414, 'GUANAZÁN', '071353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (415, 'GUIZHAGUIÑA', '071354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (416, 'HUERTAS', '071355', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (417, 'MALVAS', '071356', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (418, 'MULUNCAY GRANDE', '071357', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (419, 'SINSAO', '071358', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (420, 'SALVIAS', '071359', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (421, 'LA VICTORIA', '071401', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (422, 'PLATANILLOS', '071402', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (423, 'VALLE HERMOSO', '071403', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (424, 'LA VICTORIA', '071450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (425, 'LA LIBERTAD', '071451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (426, 'EL PARAÍSO', '071452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (427, 'SAN ISIDRO', '071453', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (428, 'BARTOLOMÉ RUIZ (CÉSAR FRANCO CARRIÓN)', '080101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (429, '2019-08-05', '080102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (430, 'ESMERALDAS', '080103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (431, 'LUIS TELLO (LAS PALMAS)', '080104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (432, 'SIMÓN PLATA TORRES', '080105', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (433, 'ESMERALDAS', '080150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (434, 'ATACAMES', '080151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (435, 'CAMARONES (CAB. EN SAN VICENTE)', '080152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (436, 'CRNEL. CARLOS CONCHA TORRES (CAB.EN HUELE)', '080153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (437, 'CHINCA', '080154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (438, 'CHONTADURO', '080155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (439, 'CHUMUNDÉ', '080156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (440, 'LAGARTO', '080157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (441, 'LA UNIÓN', '080158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (442, 'MAJUA', '080159', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (443, 'MONTALVO (CAB. EN HORQUETA)', '080160', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (444, 'RÍO VERDE', '080161', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (445, 'ROCAFUERTE', '080162', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (446, 'SAN MATEO', '080163', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (447, 'SÚA (CAB. EN LA BOCANA)', '080164', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (448, 'TABIAZO', '080165', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (449, 'TACHINA', '080166', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (450, 'TONCHIGÜE', '080167', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (451, 'VUELTA LARGA', '080168', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (452, 'VALDEZ (LIMONES)', '080250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (453, 'ANCHAYACU', '080251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (454, 'ATAHUALPA (CAB. EN CAMARONES)', '080252', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (455, 'BORBÓN', '080253', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (456, 'LA TOLA', '080254', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (457, 'LUIS VARGAS TORRES (CAB. EN PLAYA DE ORO)', '080255', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (458, 'MALDONADO', '080256', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (459, 'PAMPANAL DE BOLÍVAR', '080257', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (460, 'SAN FRANCISCO DE ONZOLE', '080258', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (461, 'SANTO DOMINGO DE ONZOLE', '080259', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (462, 'SELVA ALEGRE', '080260', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (463, 'TELEMBÍ', '080261', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (464, 'COLÓN ELOY DEL MARÍA', '080262', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (465, 'SAN JOSÉ DE CAYAPAS', '080263', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (466, 'TIMBIRÉ', '080264', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (467, 'MUISNE', '080350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (468, 'BOLÍVAR', '080351', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (469, 'DAULE', '080352', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (470, 'GALERA', '080353', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (471, 'QUINGUE (OLMEDO PERDOMO FRANCO)', '080354', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (472, 'SALIMA', '080355', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (473, 'SAN FRANCISCO', '080356', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (474, 'SAN GREGORIO', '080357', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (475, 'SAN JOSÉ DE CHAMANGA (CAB.EN CHAMANGA)', '080358', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (476, 'ROSA ZÁRATE (QUININDÉ)', '080450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (477, 'CUBE', '080451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (478, 'CHURA (CHANCAMA) (CAB. EN EL YERBERO)', '080452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (479, 'MALIMPIA', '080453', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (480, 'VICHE', '080454', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (481, 'LA UNIÓN', '080455', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (482, 'SAN LORENZO', '080550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (483, 'ALTO TAMBO (CAB. EN GUADUAL)', '080551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (484, 'ANCÓN (PICHANGAL) (CAB. EN PALMA REAL)', '080552', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (485, 'CALDERÓN', '080553', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (486, 'CARONDELET', '080554', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (487, '5 DE JUNIO (CAB. EN UIMBI)', '080555', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (488, 'CONCEPCIÓN', '080556', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (489, 'MATAJE (CAB. EN SANTANDER)', '080557', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (490, 'SAN JAVIER DE CACHAVÍ (CAB. EN SAN JAVIER)', '080558', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (491, 'SANTA RITA', '080559', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (492, 'TAMBILLO', '080560', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (493, 'TULULBÍ (CAB. EN RICAURTE)', '080561', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (494, 'URBINA', '080562', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (495, 'ATACAMES', '080650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (496, 'LA UNIÓN', '080651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (497, 'SÚA (CAB. EN LA BOCANA)', '080652', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (498, 'TONCHIGÜE', '080653', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (499, 'TONSUPA', '080654', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (500, 'RIOVERDE', '080750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (501, 'CHONTADURO', '080751', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (502, 'CHUMUNDÉ', '080752', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (503, 'LAGARTO', '080753', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (504, 'MONTALVO (CAB. EN HORQUETA)', '080754', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (505, 'ROCAFUERTE', '080755', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (506, 'LA CONCORDIA', '080850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (507, 'MONTERREY', '080851', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (508, 'LA VILLEGAS', '080852', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (509, 'PLAN PILOTO', '080853', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (510, 'AYACUCHO', '090101', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (511, 'BOLÍVAR (SAGRARIO)', '090102', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (512, 'CARBO (CONCEPCIÓN)', '090103', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (513, 'FEBRES CORDERO', '090104', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (514, 'GARCÍA MORENO', '090105', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (515, 'LETAMENDI', '090106', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (516, 'NUEVE DE OCTUBRE', '090107', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (517, 'OLMEDO (SAN ALEJO)', '090108', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (518, 'ROCA', '090109', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (519, 'ROCAFUERTE', '090110', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (520, 'SUCRE', '090111', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (521, 'TARQUI', '090112', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (522, 'URDANETA', '090113', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (523, 'XIMENA', '090114', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (524, 'PASCUALES', '090115', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (525, 'GUAYAQUIL', '090150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (526, 'CHONGÓN', '090151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (527, 'JUAN GÓMEZ RENDÓN (PROGRESO)', '090152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (528, 'MORRO', '090153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (529, 'PASCUALES', '090154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (530, 'PLAYAS (GRAL. VILLAMIL)', '090155', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (531, 'POSORJA', '090156', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (532, 'PUNÁ', '090157', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (533, 'TENGUEL', '090158', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (534, 'ALFREDO BAQUERIZO MORENO (JUJÁN)', '090250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (535, 'BALAO', '090350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (536, 'BALZAR', '090450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (537, 'COLIMES', '090550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (538, 'SAN JACINTO', '090551', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (539, 'DAULE', '090601', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (540, 'LA AURORA (SATÉLITE)', '090602', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (541, 'BANIFE', '090603', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (542, 'EMILIANO CAICEDO MARCOS', '090604', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (543, 'MAGRO', '090605', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (544, 'PADRE JUAN BAUTISTA AGUIRRE', '090606', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (545, 'SANTA CLARA', '090607', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (546, 'VICENTE PIEDRAHITA', '090608', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (547, 'DAULE', '090650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (548, 'ISIDRO AYORA (SOLEDAD)', '090651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (549, 'JUAN BAUTISTA AGUIRRE (LOS TINTOS)', '090652', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (550, 'LAUREL', '090653', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (551, 'LIMONAL', '090654', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (552, 'LOMAS DE SARGENTILLO', '090655', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (553, 'LOS LOJAS (ENRIQUE BAQUERIZO MORENO)', '090656', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (554, 'PIEDRAHITA (NOBOL)', '090657', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (555, 'ELOY ALFARO (DURÁN)', '090701', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (556, 'EL RECREO', '090702', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (557, 'ELOY ALFARO (DURÁN)', '090750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (558, 'VELASCO IBARRA (EL EMPALME)', '090850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (559, 'GUAYAS (PUEBLO NUEVO)', '090851', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (560, 'EL ROSARIO', '090852', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (561, 'EL TRIUNFO', '090950', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (562, 'MILAGRO', '091050', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (563, 'CHOBO', '091051', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (564, 'GENERAL ELIZALDE (BUCAY)', '091052', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (565, 'MARISCAL SUCRE (HUAQUES)', '091053', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (566, 'ROBERTO ASTUDILLO (CAB. EN CRUCE DE VENECIA)', '091054', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (567, 'NARANJAL', '091150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (568, 'JESÚS MARÍA', '091151', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (569, 'SAN CARLOS', '091152', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (570, 'SANTA ROSA DE FLANDES', '091153', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (571, 'TAURA', '091154', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (572, 'NARANJITO', '091250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (573, 'PALESTINA', '091350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (574, 'PEDRO CARBO', '091450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (575, 'VALLE DE LA VIRGEN', '091451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (576, 'SABANILLA', '091452', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (577, 'SAMBORONDÓN', '091601', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (578, 'LA PUNTILLA (SATÉLITE)', '091602', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (579, 'SAMBORONDÓN', '091650', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (580, 'TARIFA', '091651', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (581, 'SANTA LUCÍA', '091850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (582, 'BOCANA', '091901', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (583, 'CANDILEJOS', '091902', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (584, 'CENTRAL', '091903', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (585, 'PARAÍSO', '091904', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (586, 'SAN MATEO', '091905', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (587, 'EL SALITRE (LAS RAMAS)', '091950', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (588, 'GRAL. VERNAZA (DOS ESTEROS)', '091951', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (589, 'LA VICTORIA (ÑAUZA)', '091952', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (590, 'JUNQUILLAL', '091953', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (591, 'SAN JACINTO DE YAGUACHI', '092050', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (592, 'CRNEL. LORENZO DE GARAICOA (PEDREGAL)', '092051', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (593, 'CRNEL. MARCELINO MARIDUEÑA (SAN CARLOS)', '092052', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (594, 'GRAL. PEDRO J. MONTERO (BOLICHE)', '092053', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (595, 'SIMÓN BOLÍVAR', '092054', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (596, 'YAGUACHI VIEJO (CONE)', '092055', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (597, 'VIRGEN DE FÁTIMA', '092056', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (598, 'GENERAL VILLAMIL (PLAYAS)', '092150', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (599, 'SIMÓN BOLÍVAR', '092250', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (600, 'CRNEL.LORENZO DE GARAICOA (PEDREGAL)', '092251', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (601, 'CORONEL MARCELINO MARIDUEÑA (SAN CARLOS)', '092350', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (602, 'LOMAS DE SARGENTILLO', '092450', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (603, 'ISIDRO AYORA (SOLEDAD)', '092451', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (604, 'NARCISA DE JESÚS', '092550', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (605, 'GENERAL ANTONIO ELIZALDE (BUCAY)', '092750', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (606, 'ISIDRO AYORA', '092850', '2019-10-07 19:14:59', '2019-10-08 16:15:12', NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (607, 'CARANQUI', '100101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (608, 'GUAYAQUIL DE ALPACHACA', '100102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (609, 'SAGRARIO', '100103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (610, 'SAN FRANCISCO', '100104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (611, 'LA DOLOROSA DEL PRIORATO', '100105', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (612, 'SAN MIGUEL DE IBARRA', '100150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (613, 'AMBUQUÍ', '100151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (614, 'ANGOCHAGUA', '100152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (615, 'CAROLINA', '100153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (616, 'LA ESPERANZA', '100154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (617, 'LITA', '100155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (618, 'SALINAS', '100156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (619, 'SAN ANTONIO', '100157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (620, 'ANDRADE MARÍN (LOURDES)', '100201', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (621, 'ATUNTAQUI', '100202', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (622, 'ATUNTAQUI', '100250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (623, 'IMBAYA (SAN LUIS DE COBUENDO)', '100251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (624, 'SAN FRANCISCO DE NATABUELA', '100252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (625, 'SAN JOSÉ DE CHALTURA', '100253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (626, 'SAN ROQUE', '100254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (627, 'SAGRARIO', '100301', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (628, 'SAN FRANCISCO', '100302', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (629, 'COTACACHI', '100350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (630, 'APUELA', '100351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (631, 'GARCÍA MORENO (LLURIMAGUA)', '100352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (632, 'IMANTAG', '100353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (633, 'PEÑAHERRERA', '100354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (634, 'PLAZA GUTIÉRREZ (CALVARIO)', '100355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (635, 'QUIROGA', '100356', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (636, '6 DE JULIO DE CUELLAJE (CAB. EN CUELLAJE)', '100357', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (637, 'VACAS GALINDO (EL CHURO) (CAB.EN SAN MIGUEL ALTO', '100358', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (638, 'JORDÁN', '100401', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (639, 'SAN LUIS', '100402', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (640, 'OTAVALO', '100450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (641, 'DR. MIGUEL EGAS CABEZAS (PEGUCHE)', '100451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (642, 'EUGENIO ESPEJO (CALPAQUÍ)', '100452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (643, 'GONZÁLEZ SUÁREZ', '100453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (644, 'PATAQUÍ', '100454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (645, 'SAN JOSÉ DE QUICHINCHE', '100455', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (646, 'SAN JUAN DE ILUMÁN', '100456', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (647, 'SAN PABLO', '100457', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (648, 'SAN RAFAEL', '100458', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (649, 'SELVA ALEGRE (CAB.EN SAN MIGUEL DE PAMPLONA)', '100459', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (650, 'PIMAMPIRO', '100550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (651, 'CHUGÁ', '100551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (652, 'MARIANO ACOSTA', '100552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (653, 'SAN FRANCISCO DE SIGSIPAMBA', '100553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (654, 'URCUQUÍ CABECERA CANTONAL', '100650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (655, 'CAHUASQUÍ', '100651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (656, 'LA MERCED DE BUENOS AIRES', '100652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (657, 'PABLO ARENAS', '100653', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (658, 'SAN BLAS', '100654', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (659, 'TUMBABIRO', '100655', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (660, 'EL SAGRARIO', '110101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (661, 'SAN SEBASTIÁN', '110102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (662, 'SUCRE', '110103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (663, 'VALLE', '110104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (664, 'LOJA', '110150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (665, 'CHANTACO', '110151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (666, 'CHUQUIRIBAMBA', '110152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (667, 'EL CISNE', '110153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (668, 'GUALEL', '110154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (669, 'JIMBILLA', '110155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (670, 'MALACATOS (VALLADOLID)', '110156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (671, 'SAN LUCAS', '110157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (672, 'SAN PEDRO DE VILCABAMBA', '110158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (673, 'SANTIAGO', '110159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (674, 'TAQUIL (MIGUEL RIOFRÍO)', '110160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (675, 'VILCABAMBA (VICTORIA)', '110161', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (676, 'YANGANA (ARSENIO CASTILLO)', '110162', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (677, 'QUINARA', '110163', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (678, 'CARIAMANGA', '110201', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (679, 'CHILE', '110202', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (680, 'SAN VICENTE', '110203', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (681, 'CARIAMANGA', '110250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (682, 'COLAISACA', '110251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (683, 'EL LUCERO', '110252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (684, 'UTUANA', '110253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (685, 'SANGUILLÍN', '110254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (686, 'CATAMAYO', '110301', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (687, 'SAN JOSÉ', '110302', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (688, 'CATAMAYO (LA TOMA)', '110350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (689, 'EL TAMBO', '110351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (690, 'GUAYQUICHUMA', '110352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (691, 'SAN PEDRO DE LA BENDITA', '110353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (692, 'ZAMBI', '110354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (693, 'CELICA', '110450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (694, 'CRUZPAMBA (CAB. EN CARLOS BUSTAMANTE)', '110451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (695, 'CHAQUINAL', '110452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (696, '12 DE DICIEMBRE (CAB. EN ACHIOTES)', '110453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (697, 'PINDAL (FEDERICO PÁEZ)', '110454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (698, 'POZUL (SAN JUAN DE POZUL)', '110455', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (699, 'SABANILLA', '110456', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (700, 'TNTE. MAXIMILIANO RODRÍGUEZ LOAIZA', '110457', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (701, 'CHAGUARPAMBA', '110550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (702, 'BUENAVISTA', '110551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (703, 'EL ROSARIO', '110552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (704, 'SANTA RUFINA', '110553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (705, 'AMARILLOS', '110554', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (706, 'AMALUZA', '110650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (707, 'BELLAVISTA', '110651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (708, 'JIMBURA', '110652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (709, 'SANTA TERESITA', '110653', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (710, '27 DE ABRIL (CAB. EN LA NARANJA)', '110654', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (711, 'EL INGENIO', '110655', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (712, 'EL AIRO', '110656', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (713, 'GONZANAMÁ', '110750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (714, 'CHANGAIMINA (LA LIBERTAD)', '110751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (715, 'FUNDOCHAMBA', '110752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (716, 'NAMBACOLA', '110753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (717, 'PURUNUMA (EGUIGUREN)', '110754', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (718, 'QUILANGA (LA PAZ)', '110755', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (719, 'SACAPALCA', '110756', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (720, 'SAN ANTONIO DE LAS ARADAS (CAB. EN LAS ARADAS)', '110757', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (721, 'GENERAL ELOY ALFARO (SAN SEBASTIÁN)', '110801', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (722, 'MACARÁ (MANUEL ENRIQUE RENGEL SUQUILANDA)', '110802', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (723, 'MACARÁ', '110850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (724, 'LARAMA', '110851', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (725, 'LA VICTORIA', '110852', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (726, 'SABIANGO (LA CAPILLA)', '110853', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (727, 'CATACOCHA', '110901', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (728, 'LOURDES', '110902', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (729, 'CATACOCHA', '110950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (730, 'CANGONAMÁ', '110951', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (731, 'GUACHANAMÁ', '110952', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (732, 'LA TINGUE', '110953', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (733, 'LAURO GUERRERO', '110954', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (734, 'OLMEDO (SANTA BÁRBARA)', '110955', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (735, 'ORIANGA', '110956', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (736, 'SAN ANTONIO', '110957', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (737, 'CASANGA', '110958', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (738, 'YAMANA', '110959', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (739, 'ALAMOR', '111050', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (740, 'CIANO', '111051', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (741, 'EL ARENAL', '111052', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (742, 'EL LIMO (MARIANA DE JESÚS)', '111053', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (743, 'MERCADILLO', '111054', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (744, 'VICENTINO', '111055', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (745, 'SARAGURO', '111150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (746, 'EL PARAÍSO DE CELÉN', '111151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (747, 'EL TABLÓN', '111152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (748, 'LLUZHAPA', '111153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (749, 'MANÚ', '111154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (750, 'SAN ANTONIO DE QUMBE (CUMBE)', '111155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (751, 'SAN PABLO DE TENTA', '111156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (752, 'SAN SEBASTIÁN DE YÚLUC', '111157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (753, 'SELVA ALEGRE', '111158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (754, 'URDANETA (PAQUISHAPA)', '111159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (755, 'SUMAYPAMBA', '111160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (756, 'SOZORANGA', '111250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (757, 'NUEVA FÁTIMA', '111251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (758, 'TACAMOROS', '111252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (759, 'ZAPOTILLO', '111350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (760, 'MANGAHURCO (CAZADEROS)', '111351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (761, 'GARZAREAL', '111352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (762, 'LIMONES', '111353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (763, 'PALETILLAS', '111354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (764, 'BOLASPAMBA', '111355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (765, 'PINDAL', '111450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (766, 'CHAQUINAL', '111451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (767, '12 DE DICIEMBRE (CAB.EN ACHIOTES)', '111452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (768, 'MILAGROS', '111453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (769, 'QUILANGA', '111550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (770, 'FUNDOCHAMBA', '111551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (771, 'SAN ANTONIO DE LAS ARADAS (CAB. EN LAS ARADAS)', '111552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (772, 'OLMEDO', '111650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (773, 'LA TINGUE', '111651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (774, 'CLEMENTE BAQUERIZO', '120101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (775, 'DR. CAMILO PONCE', '120102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (776, 'BARREIRO', '120103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (777, 'EL SALTO', '120104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (778, 'BABAHOYO', '120150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (779, 'BARREIRO (SANTA RITA)', '120151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (780, 'CARACOL', '120152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (781, 'FEBRES CORDERO (LAS JUNTAS)', '120153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (782, 'PIMOCHA', '120154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (783, 'LA UNIÓN', '120155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (784, 'BABA', '120250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (785, 'GUARE', '120251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (786, 'ISLA DE BEJUCAL', '120252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (787, 'MONTALVO', '120350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (788, 'PUEBLOVIEJO', '120450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (789, 'PUERTO PECHICHE', '120451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (790, 'SAN JUAN', '120452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (791, 'QUEVEDO', '120501', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (792, 'SAN CAMILO', '120502', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (793, 'SAN JOSÉ', '120503', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (794, 'GUAYACÁN', '120504', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (795, 'NICOLÁS INFANTE DÍAZ', '120505', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (796, 'SAN CRISTÓBAL', '120506', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (797, 'SIETE DE OCTUBRE', '120507', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (798, '2019-05-24', '120508', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (799, 'VENUS DEL RÍO QUEVEDO', '120509', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (800, 'VIVA ALFARO', '120510', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (801, 'QUEVEDO', '120550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (802, 'BUENA FÉ', '120551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (803, 'MOCACHE', '120552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (804, 'SAN CARLOS', '120553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (805, 'VALENCIA', '120554', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (806, 'LA ESPERANZA', '120555', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (807, 'CATARAMA', '120650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (808, 'RICAURTE', '120651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (809, '2019-11-10', '120701', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (810, 'VENTANAS', '120750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (811, 'QUINSALOMA', '120751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (812, 'ZAPOTAL', '120752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (813, 'CHACARITA', '120753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (814, 'LOS ÁNGELES', '120754', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (815, 'VINCES', '120850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (816, 'ANTONIO SOTOMAYOR (CAB. EN PLAYAS DE VINCES)', '120851', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (817, 'PALENQUE', '120852', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (818, 'PALENQUE', '120950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (819, 'SAN JACINTO DE BUENA FÉ', '121001', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (820, '2019-08-07', '121002', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (821, '2019-10-11', '121003', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (822, 'SAN JACINTO DE BUENA FÉ', '121050', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (823, 'PATRICIA PILAR', '121051', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (824, 'VALENCIA', '121150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (825, 'MOCACHE', '121250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (826, 'QUINSALOMA', '121350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (827, 'PORTOVIEJO', '130101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (828, '2019-03-12', '130102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (829, 'COLÓN', '130103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (830, 'PICOAZÁ', '130104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (831, 'SAN PABLO', '130105', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (832, 'ANDRÉS DE VERA', '130106', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (833, 'FRANCISCO PACHECO', '130107', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (834, '2019-10-18', '130108', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (835, 'SIMÓN BOLÍVAR', '130109', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (836, 'PORTOVIEJO', '130150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (837, 'ABDÓN CALDERÓN (SAN FRANCISCO)', '130151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (838, 'ALHAJUELA (BAJO GRANDE)', '130152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (839, 'CRUCITA', '130153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (840, 'PUEBLO NUEVO', '130154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (841, 'RIOCHICO (RÍO CHICO)', '130155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (842, 'SAN PLÁCIDO', '130156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (843, 'CHIRIJOS', '130157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (844, 'CALCETA', '130250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (845, 'MEMBRILLO', '130251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (846, 'QUIROGA', '130252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (847, 'CHONE', '130301', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (848, 'SANTA RITA', '130302', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (849, 'CHONE', '130350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (850, 'BOYACÁ', '130351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (851, 'CANUTO', '130352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (852, 'CONVENTO', '130353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (853, 'CHIBUNGA', '130354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (854, 'ELOY ALFARO', '130355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (855, 'RICAURTE', '130356', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (856, 'SAN ANTONIO', '130357', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (857, 'EL CARMEN', '130401', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (858, '2019-12-04', '130402', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (859, 'EL CARMEN', '130450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (860, 'WILFRIDO LOOR MOREIRA (MAICITO)', '130451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (861, 'SAN PEDRO DE SUMA', '130452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (862, 'FLAVIO ALFARO', '130550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (863, 'SAN FRANCISCO DE NOVILLO (CAB. EN', '130551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (864, 'ZAPALLO', '130552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (865, 'DR. MIGUEL MORÁN LUCIO', '130601', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (866, 'MANUEL INOCENCIO PARRALES Y GUALE', '130602', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (867, 'SAN LORENZO DE JIPIJAPA', '130603', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (868, 'JIPIJAPA', '130650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (869, 'AMÉRICA', '130651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (870, 'EL ANEGADO (CAB. EN ELOY ALFARO)', '130652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (871, 'JULCUY', '130653', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (872, 'LA UNIÓN', '130654', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (873, 'MACHALILLA', '130655', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (874, 'MEMBRILLAL', '130656', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (875, 'PEDRO PABLO GÓMEZ', '130657', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (876, 'PUERTO DE CAYO', '130658', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (877, 'PUERTO LÓPEZ', '130659', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (878, 'JUNÍN', '130750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (879, 'LOS ESTEROS', '130801', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (880, 'MANTA', '130802', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (881, 'SAN MATEO', '130803', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (882, 'TARQUI', '130804', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (883, 'ELOY ALFARO', '130805', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (884, 'MANTA', '130850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (885, 'SAN LORENZO', '130851', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (886, 'SANTA MARIANITA (BOCA DE PACOCHE)', '130852', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (887, 'ANIBAL SAN ANDRÉS', '130901', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (888, 'MONTECRISTI', '130902', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (889, 'EL COLORADO', '130903', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (890, 'GENERAL ELOY ALFARO', '130904', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (891, 'LEONIDAS PROAÑO', '130905', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (892, 'MONTECRISTI', '130950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (893, 'JARAMIJÓ', '130951', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (894, 'LA PILA', '130952', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (895, 'PAJÁN', '131050', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (896, 'CAMPOZANO (LA PALMA DE PAJÁN)', '131051', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (897, 'CASCOL', '131052', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (898, 'GUALE', '131053', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (899, 'LASCANO', '131054', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (900, 'PICHINCHA', '131150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (901, 'BARRAGANETE', '131151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (902, 'SAN SEBASTIÁN', '131152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (903, 'ROCAFUERTE', '131250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (904, 'SANTA ANA', '131301', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (905, 'LODANA', '131302', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (906, 'SANTA ANA DE VUELTA LARGA', '131350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (907, 'AYACUCHO', '131351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (908, 'HONORATO VÁSQUEZ (CAB. EN VÁSQUEZ)', '131352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (909, 'LA UNIÓN', '131353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (910, 'OLMEDO', '131354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (911, 'SAN PABLO (CAB. EN PUEBLO NUEVO)', '131355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (912, 'BAHÍA DE CARÁQUEZ', '131401', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (913, 'LEONIDAS PLAZA GUTIÉRREZ', '131402', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (914, 'BAHÍA DE CARÁQUEZ', '131450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (915, 'CANOA', '131451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (916, 'COJIMÍES', '131452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (917, 'CHARAPOTÓ', '131453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (918, '2019-08-10', '131454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (919, 'JAMA', '131455', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (920, 'PEDERNALES', '131456', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (921, 'SAN ISIDRO', '131457', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (922, 'SAN VICENTE', '131458', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (923, 'TOSAGUA', '131550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (924, 'BACHILLERO', '131551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (925, 'ANGEL PEDRO GILER (LA ESTANCILLA)', '131552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (926, 'SUCRE', '131650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (927, 'BELLAVISTA', '131651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (928, 'NOBOA', '131652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (929, 'ARQ. SIXTO DURÁN BALLÉN', '131653', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (930, 'PEDERNALES', '131750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (931, 'COJIMÍES', '131751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (932, '2019-08-10', '131752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (933, 'ATAHUALPA', '131753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (934, 'OLMEDO', '131850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (935, 'PUERTO LÓPEZ', '131950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (936, 'MACHALILLA', '131951', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (937, 'SALANGO', '131952', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (938, 'JAMA', '132050', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (939, 'JARAMIJÓ', '132150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (940, 'SAN VICENTE', '132250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (941, 'CANOA', '132251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (942, 'MACAS', '140150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (943, 'ALSHI (CAB. EN 9 DE OCTUBRE)', '140151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (944, 'CHIGUAZA', '140152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (945, 'GENERAL PROAÑO', '140153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (946, 'HUASAGA (CAB.EN WAMPUIK)', '140154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (947, 'MACUMA', '140155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (948, 'SAN ISIDRO', '140156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (949, 'SEVILLA DON BOSCO', '140157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (950, 'SINAÍ', '140158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (951, 'TAISHA', '140159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (952, 'ZUÑA (ZÚÑAC)', '140160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (953, 'TUUTINENTZA', '140161', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (954, 'CUCHAENTZA', '140162', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (955, 'SAN JOSÉ DE MORONA', '140163', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (956, 'RÍO BLANCO', '140164', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (957, 'GUALAQUIZA', '140201', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (958, 'MERCEDES MOLINA', '140202', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (959, 'GUALAQUIZA', '140250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (960, 'AMAZONAS (ROSARIO DE CUYES)', '140251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (961, 'BERMEJOS', '140252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (962, 'BOMBOIZA', '140253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (963, 'CHIGÜINDA', '140254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (964, 'EL ROSARIO', '140255', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (965, 'NUEVA TARQUI', '140256', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (966, 'SAN MIGUEL DE CUYES', '140257', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (967, 'EL IDEAL', '140258', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (968, 'GENERAL LEONIDAS PLAZA GUTIÉRREZ (LIMÓN)', '140350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (969, 'INDANZA', '140351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (970, 'PAN DE AZÚCAR', '140352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (971, 'SAN ANTONIO (CAB. EN SAN ANTONIO CENTRO', '140353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (972, 'SAN CARLOS DE LIMÓN (SAN CARLOS DEL', '140354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (973, 'SAN JUAN BOSCO', '140355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (974, 'SAN MIGUEL DE CONCHAY', '140356', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (975, 'SANTA SUSANA DE CHIVIAZA (CAB. EN CHIVIAZA)', '140357', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (976, 'YUNGANZA (CAB. EN EL ROSARIO)', '140358', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (977, 'PALORA (METZERA)', '140450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (978, 'ARAPICOS', '140451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (979, 'CUMANDÁ (CAB. EN COLONIA AGRÍCOLA SEVILLA DEL ORO)', '140452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (980, 'HUAMBOYA', '140453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (981, 'SANGAY (CAB. EN NAYAMANACA)', '140454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (982, 'SANTIAGO DE MÉNDEZ', '140550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (983, 'COPAL', '140551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (984, 'CHUPIANZA', '140552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (985, 'PATUCA', '140553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (986, 'SAN LUIS DE EL ACHO (CAB. EN EL ACHO)', '140554', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (987, 'SANTIAGO', '140555', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (988, 'TAYUZA', '140556', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (989, 'SAN FRANCISCO DE CHINIMBIMI', '140557', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (990, 'SUCÚA', '140650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (991, 'ASUNCIÓN', '140651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (992, 'HUAMBI', '140652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (993, 'LOGROÑO', '140653', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (994, 'YAUPI', '140654', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (995, 'SANTA MARIANITA DE JESÚS', '140655', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (996, 'HUAMBOYA', '140750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (997, 'CHIGUAZA', '140751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (998, 'PABLO SEXTO', '140752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (999, 'SAN JUAN BOSCO', '140850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1000, 'PAN DE AZÚCAR', '140851', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1001, 'SAN CARLOS DE LIMÓN', '140852', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1002, 'SAN JACINTO DE WAKAMBEIS', '140853', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1003, 'SANTIAGO DE PANANZA', '140854', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1004, 'TAISHA', '140950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1005, 'HUASAGA (CAB. EN WAMPUIK)', '140951', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1006, 'MACUMA', '140952', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1007, 'TUUTINENTZA', '140953', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1008, 'PUMPUENTSA', '140954', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1009, 'LOGROÑO', '141050', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1010, 'YAUPI', '141051', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1011, 'SHIMPIS', '141052', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1012, 'PABLO SEXTO', '141150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1013, 'SANTIAGO', '141250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1014, 'SAN JOSÉ DE MORONA', '141251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1015, 'TENA', '150150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1016, 'AHUANO', '150151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1017, 'CARLOS JULIO AROSEMENA TOLA (ZATZA-YACU)', '150152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1018, 'CHONTAPUNTA', '150153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1019, 'PANO', '150154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1020, 'PUERTO MISAHUALLI', '150155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1021, 'PUERTO NAPO', '150156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1022, 'TÁLAG', '150157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1023, 'SAN JUAN DE MUYUNA', '150158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1024, 'ARCHIDONA', '150350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1025, 'AVILA', '150351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1026, 'COTUNDO', '150352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1027, 'LORETO', '150353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1028, 'SAN PABLO DE USHPAYACU', '150354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1029, 'PUERTO MURIALDO', '150355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1030, 'EL CHACO', '150450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1031, 'GONZALO DíAZ DE PINEDA (EL BOMBÓN)', '150451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1032, 'LINARES', '150452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1033, 'OYACACHI', '150453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1034, 'SANTA ROSA', '150454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1035, 'SARDINAS', '150455', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1036, 'BAEZA', '150750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1037, 'COSANGA', '150751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1038, 'CUYUJA', '150752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1039, 'PAPALLACTA', '150753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1040, 'SAN FRANCISCO DE BORJA (VIRGILIO DÁVILA)', '150754', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1041, 'SAN JOSÉ DEL PAYAMINO', '150755', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1042, 'SUMACO', '150756', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1043, 'CARLOS JULIO AROSEMENA TOLA', '150950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1044, 'PUYO', '160150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1045, 'ARAJUNO', '160151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1046, 'CANELOS', '160152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1047, 'CURARAY', '160153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1048, 'DIEZ DE AGOSTO', '160154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1049, 'FÁTIMA', '160155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1050, 'MONTALVO (ANDOAS)', '160156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1051, 'POMONA', '160157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1052, 'RÍO CORRIENTES', '160158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1053, 'RÍO TIGRE', '160159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1054, 'SANTA CLARA', '160160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1055, 'SARAYACU', '160161', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1056, 'SIMÓN BOLÍVAR (CAB. EN MUSHULLACTA)', '160162', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1057, 'TARQUI', '160163', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1058, 'TENIENTE HUGO ORTIZ', '160164', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1059, 'VERACRUZ (INDILLAMA) (CAB. EN INDILLAMA)', '160165', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1060, 'EL TRIUNFO', '160166', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1061, 'MERA', '160250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1062, 'MADRE TIERRA', '160251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1063, 'SHELL', '160252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1064, 'SANTA CLARA', '160350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1065, 'SAN JOSÉ', '160351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1066, 'ARAJUNO', '160450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1067, 'CURARAY', '160451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1068, 'BELISARIO QUEVEDO', '170101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1069, 'CARCELÉN', '170102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1070, 'CENTRO HISTÓRICO', '170103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1071, 'COCHAPAMBA', '170104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1072, 'COMITÉ DEL PUEBLO', '170105', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1073, 'COTOCOLLAO', '170106', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1074, 'CHILIBULO', '170107', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1075, 'CHILLOGALLO', '170108', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1076, 'CHIMBACALLE', '170109', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1077, 'EL CONDADO', '170110', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1078, 'GUAMANÍ', '170111', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1079, 'IÑAQUITO', '170112', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1080, 'ITCHIMBÍA', '170113', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1081, 'JIPIJAPA', '170114', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1082, 'KENNEDY', '170115', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1083, 'LA ARGELIA', '170116', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1084, 'LA CONCEPCIÓN', '170117', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1085, 'LA ECUATORIANA', '170118', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1086, 'LA FERROVIARIA', '170119', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1087, 'LA LIBERTAD', '170120', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1088, 'LA MAGDALENA', '170121', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1089, 'LA MENA', '170122', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1090, 'MARISCAL SUCRE', '170123', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1091, 'PONCEANO', '170124', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1092, 'PUENGASÍ', '170125', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1093, 'QUITUMBE', '170126', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1094, 'RUMIPAMBA', '170127', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1095, 'SAN BARTOLO', '170128', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1096, 'SAN ISIDRO DEL INCA', '170129', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1097, 'SAN JUAN', '170130', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1098, 'SOLANDA', '170131', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1099, 'TURUBAMBA', '170132', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1100, 'QUITO DISTRITO METROPOLITANO', '170150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1101, 'ALANGASÍ', '170151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1102, 'AMAGUAÑA', '170152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1103, 'ATAHUALPA', '170153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1104, 'CALACALÍ', '170154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1105, 'CALDERÓN', '170155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1106, 'CONOCOTO', '170156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1107, 'CUMBAYÁ', '170157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1108, 'CHAVEZPAMBA', '170158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1109, 'CHECA', '170159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1110, 'EL QUINCHE', '170160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1111, 'GUALEA', '170161', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1112, 'GUANGOPOLO', '170162', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1113, 'GUAYLLABAMBA', '170163', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1114, 'LA MERCED', '170164', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1115, 'LLANO CHICO', '170165', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1116, 'LLOA', '170166', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1117, 'MINDO', '170167', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1118, 'NANEGAL', '170168', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1119, 'NANEGALITO', '170169', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1120, 'NAYÓN', '170170', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1121, 'NONO', '170171', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1122, 'PACTO', '170172', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1123, 'PEDRO VICENTE MALDONADO', '170173', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1124, 'PERUCHO', '170174', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1125, 'PIFO', '170175', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1126, 'PÍNTAG', '170176', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1127, 'POMASQUI', '170177', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1128, 'PUÉLLARO', '170178', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1129, 'PUEMBO', '170179', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1130, 'SAN ANTONIO', '170180', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1131, 'SAN JOSÉ DE MINAS', '170181', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1132, 'SAN MIGUEL DE LOS BANCOS', '170182', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1133, 'TABABELA', '170183', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1134, 'TUMBACO', '170184', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1135, 'YARUQUÍ', '170185', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1136, 'ZAMBIZA', '170186', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1137, 'PUERTO QUITO', '170187', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1138, 'AYORA', '170201', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1139, 'CAYAMBE', '170202', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1140, 'JUAN MONTALVO', '170203', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1141, 'CAYAMBE', '170250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1142, 'ASCÁZUBI', '170251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1143, 'CANGAHUA', '170252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1144, 'OLMEDO (PESILLO)', '170253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1145, 'OTÓN', '170254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1146, 'SANTA ROSA DE CUZUBAMBA', '170255', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1147, 'MACHACHI', '170350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1148, 'ALÓAG', '170351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1149, 'ALOASÍ', '170352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1150, 'CUTUGLAHUA', '170353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1151, 'EL CHAUPI', '170354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1152, 'MANUEL CORNEJO ASTORGA (TANDAPI)', '170355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1153, 'TAMBILLO', '170356', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1154, 'UYUMBICHO', '170357', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1155, 'TABACUNDO', '170450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1156, 'LA ESPERANZA', '170451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1157, 'MALCHINGUÍ', '170452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1158, 'TOCACHI', '170453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1159, 'TUPIGACHI', '170454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1160, 'SANGOLQUÍ', '170501', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1161, 'SAN PEDRO DE TABOADA', '170502', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1162, 'SAN RAFAEL', '170503', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1163, 'SANGOLQUI', '170550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1164, 'COTOGCHOA', '170551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1165, 'RUMIPAMBA', '170552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1166, 'SAN MIGUEL DE LOS BANCOS', '170750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1167, 'MINDO', '170751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1168, 'PEDRO VICENTE MALDONADO', '170752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1169, 'PUERTO QUITO', '170753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1170, 'PEDRO VICENTE MALDONADO', '170850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1171, 'PUERTO QUITO', '170950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1172, 'ATOCHA – FICOA', '180101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1173, 'CELIANO MONGE', '180102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1174, 'HUACHI CHICO', '180103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1175, 'HUACHI LORETO', '180104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1176, 'LA MERCED', '180105', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1177, 'LA PENÍNSULA', '180106', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1178, 'MATRIZ', '180107', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1179, 'PISHILATA', '180108', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1180, 'SAN FRANCISCO', '180109', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1181, 'AMBATO', '180150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1182, 'AMBATILLO', '180151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1183, 'ATAHUALPA (CHISALATA)', '180152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1184, 'AUGUSTO N. MARTÍNEZ (MUNDUGLEO)', '180153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1185, 'CONSTANTINO FERNÁNDEZ (CAB. EN CULLITAHUA)', '180154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1186, 'HUACHI GRANDE', '180155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1187, 'IZAMBA', '180156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1188, 'JUAN BENIGNO VELA', '180157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1189, 'MONTALVO', '180158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1190, 'PASA', '180159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1191, 'PICAIGUA', '180160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1192, 'PILAGÜÍN (PILAHÜÍN)', '180161', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1193, 'QUISAPINCHA (QUIZAPINCHA)', '180162', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1194, 'SAN BARTOLOMÉ DE PINLLOG', '180163', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1195, 'SAN FERNANDO (PASA SAN FERNANDO)', '180164', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1196, 'SANTA ROSA', '180165', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1197, 'TOTORAS', '180166', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1198, 'CUNCHIBAMBA', '180167', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1199, 'UNAMUNCHO', '180168', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1200, 'BAÑOS DE AGUA SANTA', '180250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1201, 'LLIGUA', '180251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1202, 'RÍO NEGRO', '180252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1203, 'RÍO VERDE', '180253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1204, 'ULBA', '180254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1205, 'CEVALLOS', '180350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1206, 'MOCHA', '180450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1207, 'PINGUILÍ', '180451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1208, 'PATATE', '180550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1209, 'EL TRIUNFO', '180551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1210, 'LOS ANDES (CAB. EN POATUG)', '180552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1211, 'SUCRE (CAB. EN SUCRE-PATATE URCU)', '180553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1212, 'QUERO', '180650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1213, 'RUMIPAMBA', '180651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1214, 'YANAYACU - MOCHAPATA (CAB. EN YANAYACU)', '180652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1215, 'PELILEO', '180701', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1216, 'PELILEO GRANDE', '180702', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1217, 'PELILEO', '180750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1218, 'BENÍTEZ (PACHANLICA)', '180751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1219, 'BOLÍVAR', '180752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1220, 'COTALÓ', '180753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1221, 'CHIQUICHA (CAB. EN CHIQUICHA GRANDE)', '180754', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1222, 'EL ROSARIO (RUMICHACA)', '180755', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1223, 'GARCÍA MORENO (CHUMAQUI)', '180756', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1224, 'GUAMBALÓ (HUAMBALÓ)', '180757', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1225, 'SALASACA', '180758', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1226, 'CIUDAD NUEVA', '180801', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1227, 'PÍLLARO', '180802', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1228, 'PÍLLARO', '180850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1229, 'BAQUERIZO MORENO', '180851', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1230, 'EMILIO MARÍA TERÁN (RUMIPAMBA)', '180852', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1231, 'MARCOS ESPINEL (CHACATA)', '180853', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1232, 'PRESIDENTE URBINA (CHAGRAPAMBA -PATZUCUL)', '180854', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1233, 'SAN ANDRÉS', '180855', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1234, 'SAN JOSÉ DE POALÓ', '180856', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1235, 'SAN MIGUELITO', '180857', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1236, 'TISALEO', '180950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1237, 'QUINCHICOTO', '180951', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1238, 'EL LIMÓN', '190101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1239, 'ZAMORA', '190102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1240, 'ZAMORA', '190150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1241, 'CUMBARATZA', '190151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1242, 'GUADALUPE', '190152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1243, 'IMBANA (LA VICTORIA DE IMBANA)', '190153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1244, 'PAQUISHA', '190154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1245, 'SABANILLA', '190155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1246, 'TIMBARA', '190156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1247, 'ZUMBI', '190157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1248, 'SAN CARLOS DE LAS MINAS', '190158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1249, 'ZUMBA', '190250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1250, 'CHITO', '190251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1251, 'EL CHORRO', '190252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1252, 'EL PORVENIR DEL CARMEN', '190253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1253, 'LA CHONTA', '190254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1254, 'PALANDA', '190255', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1255, 'PUCAPAMBA', '190256', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1256, 'SAN FRANCISCO DEL VERGEL', '190257', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1257, 'VALLADOLID', '190258', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1258, 'SAN ANDRÉS', '190259', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1259, 'GUAYZIMI', '190350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1260, 'ZURMI', '190351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1261, 'NUEVO PARAÍSO', '190352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1262, '28 DE MAYO (SAN JOSÉ DE YACUAMBI)', '190450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1263, 'LA PAZ', '190451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1264, 'TUTUPALI', '190452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1265, 'YANTZAZA (YANZATZA)', '190550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1266, 'CHICAÑA', '190551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1267, 'EL PANGUI', '190552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1268, 'LOS ENCUENTROS', '190553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1269, 'EL PANGUI', '190650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1270, 'EL GUISME', '190651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1271, 'PACHICUTZA', '190652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1272, 'TUNDAYME', '190653', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1273, 'ZUMBI', '190750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1274, 'PAQUISHA', '190751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1275, 'TRIUNFO-DORADO', '190752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1276, 'PANGUINTZA', '190753', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1277, 'PALANDA', '190850', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1278, 'EL PORVENIR DEL CARMEN', '190851', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1279, 'SAN FRANCISCO DEL VERGEL', '190852', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1280, 'VALLADOLID', '190853', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1281, 'LA CANELA', '190854', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1282, 'PAQUISHA', '190950', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1283, 'BELLAVISTA', '190951', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1284, 'NUEVO QUITO', '190952', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1285, 'PUERTO BAQUERIZO MORENO', '200150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1286, 'EL PROGRESO', '200151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1287, 'ISLA SANTA MARÍA (FLOREANA) (CAB. EN PTO. VELASCO IBARRA)', '200152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1288, 'PUERTO VILLAMIL', '200250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1289, 'TOMÁS DE BERLANGA (SANTO TOMÁS)', '200251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1290, 'PUERTO AYORA', '200350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1291, 'BELLAVISTA', '200351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1292, 'SANTA ROSA (INCLUYE LA ISLA BALTRA)', '200352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1293, 'NUEVA LOJA', '210150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1294, 'CUYABENO', '210151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1295, 'DURENO', '210152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1296, 'GENERAL FARFÁN', '210153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1297, 'TARAPOA', '210154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1298, 'EL ENO', '210155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1299, 'PACAYACU', '210156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1300, 'JAMBELÍ', '210157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1301, 'SANTA CECILIA', '210158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1302, 'AGUAS NEGRAS', '210159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1303, 'EL DORADO DE CASCALES', '210250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1304, 'EL REVENTADOR', '210251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1305, 'GONZALO PIZARRO', '210252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1306, 'LUMBAQUÍ', '210253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1307, 'PUERTO LIBRE', '210254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1308, 'SANTA ROSA DE SUCUMBÍOS', '210255', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1309, 'PUERTO EL CARMEN DEL PUTUMAYO', '210350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1310, 'PALMA ROJA', '210351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1311, 'PUERTO BOLÍVAR (PUERTO MONTÚFAR)', '210352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1312, 'PUERTO RODRÍGUEZ', '210353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1313, 'SANTA ELENA', '210354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1314, 'SHUSHUFINDI', '210450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1315, 'LIMONCOCHA', '210451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1316, 'PAÑACOCHA', '210452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1317, 'SAN ROQUE (CAB. EN SAN VICENTE)', '210453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1318, 'SAN PEDRO DE LOS COFANES', '210454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1319, 'SIETE DE JULIO', '210455', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1320, 'LA BONITA', '210550', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1321, 'EL PLAYÓN DE SAN FRANCISCO', '210551', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1322, 'LA SOFÍA', '210552', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1323, 'ROSA FLORIDA', '210553', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1324, 'SANTA BÁRBARA', '210554', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1325, 'EL DORADO DE CASCALES', '210650', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1326, 'SANTA ROSA DE SUCUMBÍOS', '210651', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1327, 'SEVILLA', '210652', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1328, 'TARAPOA', '210750', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1329, 'CUYABENO', '210751', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1330, 'AGUAS NEGRAS', '210752', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1331, 'PUERTO FRANCISCO DE ORELLANA (EL COCA)', '220150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1332, 'DAYUMA', '220151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1333, 'TARACOA (NUEVA ESPERANZA: YUCA)', '220152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1334, 'ALEJANDRO LABAKA', '220153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1335, 'EL DORADO', '220154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1336, 'EL EDÉN', '220155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1337, 'GARCÍA MORENO', '220156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1338, 'INÉS ARANGO (CAB. EN WESTERN)', '220157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1339, 'LA BELLEZA', '220158', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1340, 'NUEVO PARAÍSO (CAB. EN UNIÓN', '220159', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1341, 'SAN JOSÉ DE GUAYUSA', '220160', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1342, 'SAN LUIS DE ARMENIA', '220161', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1343, 'TIPITINI', '220201', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1344, 'NUEVO ROCAFUERTE', '220250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1345, 'CAPITÁN AUGUSTO RIVADENEYRA', '220251', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1346, 'CONONACO', '220252', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1347, 'SANTA MARÍA DE HUIRIRIMA', '220253', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1348, 'TIPUTINI', '220254', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1349, 'YASUNÍ', '220255', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1350, 'LA JOYA DE LOS SACHAS', '220350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1351, 'ENOKANQUI', '220351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1352, 'POMPEYA', '220352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1353, 'SAN CARLOS', '220353', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1354, 'SAN SEBASTIÁN DEL COCA', '220354', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1355, 'LAGO SAN PEDRO', '220355', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1356, 'RUMIPAMBA', '220356', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1357, 'TRES DE NOVIEMBRE', '220357', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1358, 'UNIÓN MILAGREÑA', '220358', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1359, 'LORETO', '220450', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1360, 'AVILA (CAB. EN HUIRUNO)', '220451', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1361, 'PUERTO MURIALDO', '220452', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1362, 'SAN JOSÉ DE PAYAMINO', '220453', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1363, 'SAN JOSÉ DE DAHUANO', '220454', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1364, 'SAN VICENTE DE HUATICOCHA', '220455', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1365, 'ABRAHAM CALAZACÓN', '230101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1366, 'BOMBOLÍ', '230102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1367, 'CHIGUILPE', '230103', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1368, 'RÍO TOACHI', '230104', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1369, 'RÍO VERDE', '230105', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1370, 'SANTO DOMINGO DE LOS COLORADOS', '230106', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1371, 'ZARACAY', '230107', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1372, 'SANTO DOMINGO DE LOS COLORADOS', '230150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1373, 'ALLURIQUÍN', '230151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1374, 'PUERTO LIMÓN', '230152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1375, 'LUZ DE AMÉRICA', '230153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1376, 'SAN JACINTO DEL BÚA', '230154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1377, 'VALLE HERMOSO', '230155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1378, 'EL ESFUERZO', '230156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1379, 'SANTA MARÍA DEL TOACHI', '230157', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1380, 'BALLENITA', '240101', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1381, 'SANTA ELENA', '240102', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1382, 'SANTA ELENA', '240150', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1383, 'ATAHUALPA', '240151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1384, 'COLONCHE', '240152', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1385, 'CHANDUY', '240153', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1386, 'MANGLARALTO', '240154', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1387, 'SIMÓN BOLÍVAR (JULIO MORENO)', '240155', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1388, 'SAN JOSÉ DE ANCÓN', '240156', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1389, 'LA LIBERTAD', '240250', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1390, 'CARLOS ESPINOZA LARREA', '240301', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1391, 'GRAL. ALBERTO ENRÍQUEZ GALLO', '240302', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1392, 'VICENTE ROCAFUERTE', '240303', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1393, 'SANTA ROSA', '240304', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1394, 'SALINAS', '240350', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1395, 'ANCONCITO', '240351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1396, 'JOSÉ LUIS TAMAYO (MUEY)', '240352', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1397, 'LAS GOLONDRINAS', '900151', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1398, 'MANGA DEL CURA', '900351', '2019-10-07 19:14:59', NULL, NULL, 1);
INSERT INTO `ctlg_parroquias` VALUES (1399, 'EL PIEDRERO', '900451', '2019-10-07 19:14:59', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_periodos
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_periodos`;
CREATE TABLE `ctlg_periodos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codigo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_periodos
-- ----------------------------
INSERT INTO `ctlg_periodos` VALUES (1, 'Primer Quimestre', 'Q1', '2019-11-04 06:05:56', '2019-11-04 06:06:00', NULL, 1);
INSERT INTO `ctlg_periodos` VALUES (2, 'Segundo Quimestre', 'Q2', '2019-11-04 06:06:10', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_profesiones
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_profesiones`;
CREATE TABLE `ctlg_profesiones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_profesiones_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 239 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_profesiones
-- ----------------------------
INSERT INTO `ctlg_profesiones` VALUES (1, 'Abogado', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (2, 'Académico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (3, 'Actor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (4, 'Administrador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (5, 'Administrativo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (6, 'Agente de viajes', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (7, 'Agrícola', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (8, 'Agrónomo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (9, 'Alergólogo – Alergista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (10, 'Almacenero – Almacenista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (11, 'Anatomista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (12, 'Anestesiólogo – Anestesista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (13, 'Antologista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (14, 'Antropólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (15, 'Arabista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (16, 'Archivero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (17, 'Arqueólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (18, 'Arquitecto', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (19, 'Astrólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (20, 'Astrónomo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (21, 'Atleta', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (22, 'ATS', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (23, 'Autor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (24, 'Auxiliar de operaciones', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (25, 'Avicultor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (26, 'Bacteriólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (27, 'Barrendero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (28, 'Bedel', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (29, 'Bibliógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (30, 'Bibliotecario', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (31, 'Biofísico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (32, 'Biógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (33, 'Bioquímico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (34, 'Bombero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (35, 'Botánico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (36, 'Camarero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (37, 'Cancerólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (38, 'Cardiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (39, 'Carnicero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (40, 'Carpintero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (41, 'Cartero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (42, 'Cartógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (43, 'Castrador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (44, 'Cirujano', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (45, 'Citólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (46, 'Climatólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (47, 'Cocinero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (48, 'Comadrón', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (49, 'Conductor de autobús', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (50, 'Consejero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (51, 'Conserje', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (52, 'Conservador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (53, 'Contable', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (54, 'Cosmógrado', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (55, 'Cosmólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (56, 'Criminalista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (57, 'Cronólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (58, 'Decorador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (59, 'Delineante', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (60, 'Demógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (61, 'Dentista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (62, 'Dependiente', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (63, 'Dermatólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (64, 'Dibujante', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (65, 'Diseñador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (66, 'Documentalista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (67, 'Ecólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (68, 'Economista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (69, 'Educador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (70, 'Egiptólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (71, 'Electricista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (72, 'Endocrinólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (73, 'Enfermero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (74, 'Enólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (75, 'Entomólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (76, 'Epidemiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (77, 'Espeleólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (78, 'Estadista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (79, 'Estadístico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (80, 'Estilista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (81, 'Etimólogo – Etimologista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (82, 'Etnógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (83, 'Etnólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (84, 'Etólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (85, 'Farmacéutico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (86, 'Farmacólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (87, 'Filólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (88, 'Filósofo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (89, 'Fiscal', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (90, 'Físico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (91, 'Fisiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (92, 'Fisioterapeuta', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (93, 'Florista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (94, 'Fonetista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (95, 'Foníatra', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (96, 'Fonólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (97, 'Fontanero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (98, 'Forense', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (99, 'Fotógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (100, 'Gemólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (101, 'Genetista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (102, 'Geobotánica', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (103, 'Geodesta', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (104, 'Geofísico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (105, 'Geógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (106, 'Geólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (107, 'Geomántico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (108, 'Geómetra', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (109, 'Geoquímica', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (110, 'Geriatra', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (111, 'Gerontólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (112, 'Grabador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (113, 'Graduado social', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (114, 'Grafólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (115, 'Gramático', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (116, 'Hemtólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (117, 'Hepatólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (118, 'Hidrogeólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (119, 'Hidrógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (120, 'Hidrólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (121, 'Higienista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (122, 'Hispanista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (123, 'Historiador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (124, 'Homeópata', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (125, 'Informático', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (126, 'Inmunólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (127, 'Interventor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (128, 'Investigador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (129, 'Jardinero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (130, 'Jefe de obra', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (131, 'Juez', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (132, 'Latinista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (133, 'Lexicógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (134, 'Lexicólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (135, 'Lingüista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (136, 'Limpiador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (137, 'Limpiador de cristales', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (138, 'Logopeda', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (139, 'Maestro', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (140, 'Matemático', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (141, 'Matrón', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (142, 'Mecánico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (143, 'Meteorólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (144, 'Micólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (145, 'Microcirujano', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (146, 'Mimógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (147, 'Mineralogista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (148, 'Modelo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (149, 'Monitor de actividades de ocio y tiempo libre', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (150, 'Musicólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (151, 'Nefrólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (152, 'Neumólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (153, 'Neuroanatomista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (154, 'Neurobiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (155, 'Neurocirujano', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (156, 'Neuroembriólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (157, 'Neurofisiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (158, 'Neurólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (159, 'Nutrólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (160, 'Oceanógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (161, 'Odontólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (162, 'Oficinista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (163, 'Oftalmólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (164, 'Oncólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (165, 'Óptico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (166, 'Optometrista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (167, 'Ordenanza', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (168, 'Orientador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (169, 'Ornitólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (170, 'Ortopédico – Ortopedista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (171, 'Osteólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (172, 'Osteópata', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (173, 'Otorrinolaringólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (174, 'Paleobiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (175, 'Paleobotánico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (176, 'Paleógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (177, 'Paleólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (178, 'Paleontólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (179, 'Panadero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (180, 'Patólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (181, 'Pedagogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (182, 'Pediatra', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (183, 'Pedicuro', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (184, 'Peluquero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (185, 'Periodista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (186, 'Piloto de avión', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (187, 'Piscicultor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (188, 'Podólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (189, 'Plicía', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (190, 'Portero', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (191, 'Prehistoriador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (192, 'Proctólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (193, 'Programador', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (194, 'Protésico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (195, 'Psicoanalista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (196, 'Psicólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (197, 'Psicofísico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (198, 'Psicopedagogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (199, 'Psicoterapeuta', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (200, 'Psiquiatra', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (201, 'Publicista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (202, 'Publicitario', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (203, 'Puericultor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (204, 'Químico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (205, 'Quiropráctico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (206, 'Radioastrónomo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (207, 'Radiofonista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (208, 'Radiólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (209, 'Radiotécnico', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (210, 'Radiotelefonista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (211, 'Radiotelegrafista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (212, 'Radioterapeuta', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (213, 'Recepcionista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (214, 'Sastre', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (215, 'Sexólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (216, 'Sismólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (217, 'Sociólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (218, 'Socorrista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (219, 'Soldado', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (220, 'Taxista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (221, 'Telefonista', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (222, 'Teólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (223, 'Terapeuta', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (224, 'Tocoginecólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (225, 'Tocólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (226, 'Toxicólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (227, 'Traductor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (228, 'Transcriptor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (229, 'Traumatólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (230, 'Urólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (231, 'Vendedor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (232, 'Veterinario', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (233, 'Virólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (234, 'Viticultor', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (235, 'Vulcanólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (236, 'Xilógrafo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (237, 'Zoólogo', '2019-10-08 14:33:50', NULL, NULL, 1);
INSERT INTO `ctlg_profesiones` VALUES (238, 'Zootécnico', '2019-10-08 14:33:50', NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_provincias
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_provincias`;
CREATE TABLE `ctlg_provincias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `codigo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_provincias_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_provincias
-- ----------------------------
INSERT INTO `ctlg_provincias` VALUES (1, 'AZUAY', '01', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (2, 'BOLIVAR', '02', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (3, 'CAÑAR', '03', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (4, 'CARCHI', '04', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (5, 'COTOPAXI', '05', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (6, 'CHIMBORAZO', '06', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (7, 'EL ORO', '07', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (8, 'ESMERALDAS', '08', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (9, 'GUAYAS', '09', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (10, 'IMBABURA', '10', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (11, 'LOJA', '11', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (12, 'LOS RIOS', '12', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (13, 'MANABI', '13', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (14, 'MORONA SANTIAGO', '14', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (15, 'NAPO', '15', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (16, 'PASTAZA', '16', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (17, 'PICHINCHA', '17', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (18, 'TUNGURAHUA', '18', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (19, 'ZAMORA CHINCHIPE', '19', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (20, 'GALAPAGOS', '20', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (21, 'SUCUMBIOS', '21', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (22, 'ORELLANA', '22', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (23, 'SANTO DOMINGO DE LOS TSÁCHILAS', '23', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (24, 'SANTA ELENA', '24', '2019-10-07 17:46:44', NULL, 1, NULL);
INSERT INTO `ctlg_provincias` VALUES (25, 'ZONAS NO DELIMITADAS', '90', '2019-10-07 19:08:14', NULL, 1, NULL);

-- ----------------------------
-- Table structure for ctlg_tipos_documentos
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_tipos_documentos`;
CREATE TABLE `ctlg_tipos_documentos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_tipos_documentos_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_tipos_documentos
-- ----------------------------
INSERT INTO `ctlg_tipos_documentos` VALUES (1, 'R.U.C.', NULL, NULL, NULL, 1);
INSERT INTO `ctlg_tipos_documentos` VALUES (2, 'Cedula', NULL, NULL, NULL, 1);
INSERT INTO `ctlg_tipos_documentos` VALUES (3, 'Pasaporte', NULL, NULL, NULL, 1);

-- ----------------------------
-- Table structure for ctlg_tipos_sangre
-- ----------------------------
DROP TABLE IF EXISTS `ctlg_tipos_sangre`;
CREATE TABLE `ctlg_tipos_sangre`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `ctlg_tipos_sangre_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ctlg_tipos_sangre
-- ----------------------------
INSERT INTO `ctlg_tipos_sangre` VALUES (1, 'A+', '2019-10-08 14:20:41', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (2, 'A-', '2019-10-08 14:20:56', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (3, 'O+', '2019-10-08 14:21:01', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (4, 'O-', '2019-10-08 14:21:06', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (5, 'B+', '2019-10-08 14:21:37', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (6, 'B-', '2019-10-08 14:21:40', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (7, 'AB+', '2019-10-08 14:21:47', NULL, NULL, 1);
INSERT INTO `ctlg_tipos_sangre` VALUES (8, 'AB-', '2019-10-08 14:21:55', NULL, NULL, 1);

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ctlg_cursos` int(11) NULL DEFAULT NULL,
  `id_organizaciones` int(11) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `paralelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_ctlg_cursos`(`id_ctlg_cursos`) USING BTREE,
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cursos_ibfk_3` FOREIGN KEY (`id_ctlg_cursos`) REFERENCES `ctlg_cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES (19, 1, 1, 1, '2019-11-04 05:24:50', NULL, NULL, 'a');

-- ----------------------------
-- Table structure for cursos_aulas
-- ----------------------------
DROP TABLE IF EXISTS `cursos_aulas`;
CREATE TABLE `cursos_aulas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cursos` int(11) NOT NULL,
  `id_aulas` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_cursos`(`id_cursos`) USING BTREE,
  INDEX `id_aulas`(`id_aulas`) USING BTREE,
  CONSTRAINT `cursos_aulas_ibfk_1` FOREIGN KEY (`id_cursos`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cursos_aulas_ibfk_2` FOREIGN KEY (`id_aulas`) REFERENCES `aulas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cursos_aulas
-- ----------------------------
INSERT INTO `cursos_aulas` VALUES (1, 19, 7, '2019-11-04 05:24:50', NULL, NULL, 1);

-- ----------------------------
-- Table structure for cursos_jornadas
-- ----------------------------
DROP TABLE IF EXISTS `cursos_jornadas`;
CREATE TABLE `cursos_jornadas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cursos` int(11) NOT NULL,
  `id_jornadas` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_cursos`(`id_cursos`) USING BTREE,
  INDEX `id_jornadas`(`id_jornadas`) USING BTREE,
  CONSTRAINT `cursos_jornadas_ibfk_1` FOREIGN KEY (`id_cursos`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cursos_jornadas_ibfk_2` FOREIGN KEY (`id_jornadas`) REFERENCES `jornadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cursos_jornadas
-- ----------------------------
INSERT INTO `cursos_jornadas` VALUES (3, 19, 35, '2019-11-04 05:24:50', NULL, NULL, 1);

-- ----------------------------
-- Table structure for cursos_tutores
-- ----------------------------
DROP TABLE IF EXISTS `cursos_tutores`;
CREATE TABLE `cursos_tutores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cursos` int(11) NOT NULL,
  `id_docentes` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_cursos`(`id_cursos`) USING BTREE,
  INDEX `id_docentes`(`id_docentes`) USING BTREE,
  CONSTRAINT `cursos_tutores_ibfk_1` FOREIGN KEY (`id_cursos`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cursos_tutores_ibfk_2` FOREIGN KEY (`id_docentes`) REFERENCES `docentes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cursos_tutores
-- ----------------------------
INSERT INTO `cursos_tutores` VALUES (4, 19, 7, '2019-11-04 05:24:50', NULL, NULL, 1);

-- ----------------------------
-- Table structure for docentes
-- ----------------------------
DROP TABLE IF EXISTS `docentes`;
CREATE TABLE `docentes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `numero_documento` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_profesiones` int(11) NOT NULL,
  `correo_electronico` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefonos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `id_ctlg_generos` int(11) NOT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `id_organizaciones` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `familiares_fk_2`(`id_ctlg_profesiones`) USING BTREE,
  INDEX `docentes_ibfk_5`(`id_ctlg_generos`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_ctlg_profesiones`) REFERENCES `ctlg_profesiones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `docentes_ibfk_5` FOREIGN KEY (`id_ctlg_generos`) REFERENCES `ctlg_generos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `docentes_ibfk_6` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `docentes_ibfk_7` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of docentes
-- ----------------------------
INSERT INTO `docentes` VALUES (1, 'Juan', 'Perez', '09314568898', 1, 'oantepara@viamtica.com', 'sauces 5', '5454455', '2019-10-11 02:11:31', '2019-11-04 03:11:17', '2019-11-04 03:11:17', 1, 2, 1);
INSERT INTO `docentes` VALUES (2, 'Miguel', 'Cortez', '09356456526', 2, 'oantepara@viamtica.com', 'samborondon', '2554655', '2019-10-12 01:01:29', '2019-11-04 03:11:20', '2019-11-04 03:11:20', 1, 2, 1);
INSERT INTO `docentes` VALUES (3, 'oscar', 'antepara', '0926434499', 15, 'oaoaa@gmail.com', 'saaaa', '0998686731', '2019-10-14 16:51:21', '2019-11-04 02:54:23', '2019-11-04 02:54:23', 1, 2, 1);
INSERT INTO `docentes` VALUES (4, 'dani', 'aaa', '0926434499', 16, 'dsfgfd@fff.com', 'oscar', '042215869', '2019-10-14 17:16:04', '2019-11-04 02:54:20', '2019-11-04 02:54:20', 1, 2, 1);
INSERT INTO `docentes` VALUES (5, 'julio', 'angulo', '092454557', 15, 'aaaa@fgfgg.ggg', 'hjghjgh', '454545', '2019-11-04 01:52:10', '2019-11-04 02:54:18', '2019-11-04 02:54:18', 1, 2, 1);
INSERT INTO `docentes` VALUES (6, 'oscar enrique', 'antepara cerezo', '0926434499', 4, 'scrntprcrz@gmail.com', 'samanes 7', '042215869', '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31', 1, 2, 1);
INSERT INTO `docentes` VALUES (7, 'oscar enrique', 'antepara cerezo', '0926434499', 13, 'scrntprcrz@gmail.com', 'aaa', '042215869', '2019-11-04 03:18:25', NULL, NULL, 1, 1, 1);

-- ----------------------------
-- Table structure for docentes_jornadas_ctlg_asignaturas
-- ----------------------------
DROP TABLE IF EXISTS `docentes_jornadas_ctlg_asignaturas`;
CREATE TABLE `docentes_jornadas_ctlg_asignaturas`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_docentes` int(11) NOT NULL,
  `id_jornadas` int(11) NOT NULL,
  `id_ctlg_asignaturas` int(11) NOT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_docentes`(`id_docentes`) USING BTREE,
  INDEX `id_jornadas`(`id_jornadas`) USING BTREE,
  INDEX `ctlg_asignaturas`(`id_ctlg_asignaturas`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `docentes_jornadas_ctlg_asignaturas_ibfk_1` FOREIGN KEY (`id_docentes`) REFERENCES `docentes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `docentes_jornadas_ctlg_asignaturas_ibfk_2` FOREIGN KEY (`id_jornadas`) REFERENCES `jornadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `docentes_jornadas_ctlg_asignaturas_ibfk_3` FOREIGN KEY (`id_ctlg_asignaturas`) REFERENCES `ctlg_asignaturas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `docentes_jornadas_ctlg_asignaturas_ibfk_4` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of docentes_jornadas_ctlg_asignaturas
-- ----------------------------
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (16, 1, 13, 6, 2, '2019-11-03 06:24:47', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (17, 1, 13, 7, 2, '2019-11-03 22:51:16', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (18, 1, 13, 6, 2, '2019-11-04 01:51:16', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (19, 1, 13, 12, 2, '2019-11-04 01:51:16', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (20, 1, 13, 6, 2, '2019-11-04 01:51:27', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (21, 1, 13, 12, 2, '2019-11-04 01:51:27', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (22, 1, 13, 7, 2, '2019-11-04 01:51:27', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (23, 1, 13, 11, 2, '2019-11-04 01:51:27', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (24, 5, 14, 6, 2, '2019-11-04 01:52:10', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (25, 5, 14, 8, 2, '2019-11-04 01:52:10', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (26, 5, 14, 9, 2, '2019-11-04 01:52:10', '2019-11-04 03:16:56', '2019-11-04 03:16:56');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (27, 6, 35, 6, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (28, 6, 35, 7, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (29, 6, 35, 8, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (30, 6, 35, 9, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (31, 6, 35, 10, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (32, 6, 35, 11, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (33, 6, 35, 12, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (34, 6, 36, 6, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (35, 6, 36, 7, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (36, 6, 36, 8, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (37, 6, 36, 9, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (38, 6, 36, 10, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (39, 6, 36, 11, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (40, 6, 36, 12, 2, '2019-11-04 03:12:01', '2019-11-04 03:17:31', '2019-11-04 03:17:31');
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (41, 7, 35, 6, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (42, 7, 35, 7, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (43, 7, 35, 9, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (44, 7, 35, 10, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (45, 7, 35, 8, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (46, 7, 35, 11, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (47, 7, 35, 12, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (48, 7, 36, 6, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (49, 7, 36, 7, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (50, 7, 36, 8, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (51, 7, 36, 9, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (52, 7, 36, 10, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (53, 7, 36, 11, 1, '2019-11-04 03:18:25', NULL, NULL);
INSERT INTO `docentes_jornadas_ctlg_asignaturas` VALUES (54, 7, 36, 12, 1, '2019-11-04 03:18:25', NULL, NULL);

-- ----------------------------
-- Table structure for documentos
-- ----------------------------
DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of documentos
-- ----------------------------
INSERT INTO `documentos` VALUES (1, 'Original y copia de la cédula de ciudadanía', '2019-10-11 17:01:00', '2019-10-11 21:52:50', NULL, 1);
INSERT INTO `documentos` VALUES (2, 'Original última libreta de calificación', '2019-10-11 21:53:33', NULL, NULL, 1);
INSERT INTO `documentos` VALUES (3, 'Copia de partida de nacimiento', '2019-10-11 21:54:38', NULL, NULL, 1);
INSERT INTO `documentos` VALUES (4, 'Certificado de promoción', '2019-10-11 21:55:13', NULL, NULL, 1);
INSERT INTO `documentos` VALUES (5, 'Fotos', '2019-10-11 21:55:37', NULL, NULL, 1);

-- ----------------------------
-- Table structure for edificios
-- ----------------------------
DROP TABLE IF EXISTS `edificios`;
CREATE TABLE `edificios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direccion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_organizaciones` int(255) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `edificios_ibfk_1` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `edificios_ibfk_2` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edificios
-- ----------------------------
INSERT INTO `edificios` VALUES (1, 'San Francisco 300', 'Boyaca y 9 de octuvre', 1, '2019-10-13 04:38:43', '2019-11-04 02:30:45', '2019-11-04 02:30:45', 2);
INSERT INTO `edificios` VALUES (2, 'ddd', 'ddd', 1, '2019-11-03 05:09:55', '2019-11-04 02:30:42', '2019-11-04 02:30:42', 2);
INSERT INTO `edificios` VALUES (3, 'Saman', 'samanes 7', 1, '2019-11-04 02:31:29', '2019-11-04 03:42:35', '2019-11-04 03:42:35', 2);
INSERT INTO `edificios` VALUES (4, 'defggd', 'jghjghj', 1, '2019-11-04 02:38:01', '2019-11-04 03:42:32', '2019-11-04 03:42:32', 2);
INSERT INTO `edificios` VALUES (5, 'Principal', 'Samanes 7', 1, '2019-11-04 03:43:00', NULL, NULL, 1);

-- ----------------------------
-- Table structure for edificios_anos_lectivos
-- ----------------------------
DROP TABLE IF EXISTS `edificios_anos_lectivos`;
CREATE TABLE `edificios_anos_lectivos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_edificios` int(11) NOT NULL,
  `id_anos_lectivos` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_edificios`(`id_edificios`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_anos_lectivos`(`id_anos_lectivos`) USING BTREE,
  CONSTRAINT `edificios_anos_lectivos_ibfk_1` FOREIGN KEY (`id_edificios`) REFERENCES `edificios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `edificios_anos_lectivos_ibfk_3` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `edificios_anos_lectivos_ibfk_4` FOREIGN KEY (`id_anos_lectivos`) REFERENCES `anos_lectivos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edificios_anos_lectivos
-- ----------------------------
INSERT INTO `edificios_anos_lectivos` VALUES (1, 1, 1, '2019-11-03 04:05:23', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (2, 1, 1, '2019-11-03 04:18:52', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (3, 1, 19, '2019-11-03 04:18:52', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (4, 1, 1, '2019-11-03 04:19:04', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (5, 1, 19, '2019-11-03 04:19:04', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (6, 1, 1, '2019-11-03 04:34:32', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (7, 1, 1, '2019-11-03 05:07:57', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (8, 1, 20, '2019-11-03 05:07:57', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (9, 1, 19, '2019-11-03 05:07:57', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (10, 2, 19, '2019-11-03 05:09:55', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (11, 3, 24, '2019-11-04 02:31:29', '2019-11-04 02:37:12', '2019-11-04 02:37:12', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (12, 1, 31, '2019-11-04 02:33:21', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (13, 1, 24, '2019-11-04 02:33:28', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (14, 1, 31, '2019-11-04 02:33:28', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (15, 1, 24, '2019-11-04 02:33:52', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (16, 1, 31, '2019-11-04 02:33:52', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (17, 1, 31, '2019-11-04 02:35:12', '2019-11-04 02:36:06', '2019-11-04 02:36:06', 2);
INSERT INTO `edificios_anos_lectivos` VALUES (18, 1, 24, '2019-11-04 02:36:06', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (19, 1, 31, '2019-11-04 02:36:06', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (20, 3, 24, '2019-11-04 02:37:12', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (21, 3, 31, '2019-11-04 02:37:12', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (22, 4, 24, '2019-11-04 02:38:01', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (23, 4, 31, '2019-11-04 02:38:01', NULL, NULL, 1);
INSERT INTO `edificios_anos_lectivos` VALUES (24, 5, 24, '2019-11-04 03:43:00', NULL, NULL, 1);

-- ----------------------------
-- Table structure for estudiantes
-- ----------------------------
DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `numero_documento` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_tipos_documentos` int(11) NULL DEFAULT NULL,
  `id_ctlg_provincias` int(11) NULL DEFAULT NULL,
  `id_ctlg_parroquias` int(11) NULL DEFAULT NULL,
  `id_ctlg_cantones` int(11) NULL DEFAULT NULL,
  `observacion` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `fecha_nacimiento` date NULL DEFAULT NULL,
  `edad` tinyint(2) NULL DEFAULT NULL,
  `id_ctlg_tipos_sangre` int(11) NULL DEFAULT NULL,
  `id_ctlg_generos` int(11) NULL DEFAULT NULL,
  `id_ctlg_parentescos` int(11) NULL DEFAULT NULL,
  `id_ctlg_paises` int(11) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `estudiantes_fk_2`(`id_ctlg_tipos_documentos`) USING BTREE,
  INDEX `estudiantes_fk_3`(`id_ctlg_provincias`) USING BTREE,
  INDEX `estudiantes_fk_4`(`id_ctlg_parroquias`) USING BTREE,
  INDEX `estudiantes_fk_5`(`id_ctlg_cantones`) USING BTREE,
  INDEX `estudiantes_fk_6`(`id_ctlg_tipos_sangre`) USING BTREE,
  INDEX `estudiantes_fk_7`(`id_ctlg_generos`) USING BTREE,
  INDEX `id_ctlg_parentescos`(`id_ctlg_parentescos`) USING BTREE,
  INDEX `id_ctlg_paises`(`id_ctlg_paises`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `estudiantes_fk_2` FOREIGN KEY (`id_ctlg_tipos_documentos`) REFERENCES `ctlg_tipos_documentos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_fk_3` FOREIGN KEY (`id_ctlg_provincias`) REFERENCES `ctlg_provincias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_fk_4` FOREIGN KEY (`id_ctlg_parroquias`) REFERENCES `ctlg_parroquias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_fk_5` FOREIGN KEY (`id_ctlg_cantones`) REFERENCES `ctlg_cantones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_fk_6` FOREIGN KEY (`id_ctlg_tipos_sangre`) REFERENCES `ctlg_tipos_sangre` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_fk_7` FOREIGN KEY (`id_ctlg_generos`) REFERENCES `ctlg_generos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_ctlg_parentescos`) REFERENCES `ctlg_parentescos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`id_ctlg_paises`) REFERENCES `ctlg_paises` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estudiantes
-- ----------------------------
INSERT INTO `estudiantes` VALUES (1, 'Alex', 'Martin Mendez', 'fa-cogs', '0956258475', 'ahhige', 'Vergeles', '2258963', '0999568752', 2, 1, 1, 1, 'enfermo', '1991-08-15', NULL, 1, 1, 1, 50, 1, '2019-10-11 00:47:55', '2019-10-12 00:41:50', NULL);
INSERT INTO `estudiantes` VALUES (2, 'Maria', 'Cerezo Franco', 'fa-cogs', '0930645869', 'ghggh', 'Urdesa', '2235689', '0936545698', 2, 1, 1, 1, NULL, NULL, NULL, 2, 2, 1, 50, 1, '2019-10-12 00:19:40', '2019-10-12 00:42:10', NULL);

-- ----------------------------
-- Table structure for estudiantes_documentos
-- ----------------------------
DROP TABLE IF EXISTS `estudiantes_documentos`;
CREATE TABLE `estudiantes_documentos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiantes` int(11) NULL DEFAULT NULL,
  `id_documentos` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_estudiantes`(`id_estudiantes`) USING BTREE,
  INDEX `id_documentos`(`id_documentos`) USING BTREE,
  CONSTRAINT `estudiantes_documentos_ibfk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_documentos_ibfk_2` FOREIGN KEY (`id_documentos`) REFERENCES `documentos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estudiantes_documentos
-- ----------------------------
INSERT INTO `estudiantes_documentos` VALUES (1, 1, 1, '2019-10-12 00:18:54', NULL, NULL);
INSERT INTO `estudiantes_documentos` VALUES (2, 1, 2, '2019-10-12 00:19:01', NULL, NULL);
INSERT INTO `estudiantes_documentos` VALUES (3, 1, 3, '2019-10-12 00:19:06', NULL, NULL);
INSERT INTO `estudiantes_documentos` VALUES (4, 1, 4, '2019-10-12 00:19:11', NULL, NULL);
INSERT INTO `estudiantes_documentos` VALUES (5, 1, 5, '2019-10-12 00:21:28', NULL, NULL);
INSERT INTO `estudiantes_documentos` VALUES (6, 2, 4, '2019-10-12 00:21:38', NULL, NULL);
INSERT INTO `estudiantes_documentos` VALUES (7, 2, 1, '2019-10-12 00:21:45', NULL, NULL);

-- ----------------------------
-- Table structure for estudiantes_familiares
-- ----------------------------
DROP TABLE IF EXISTS `estudiantes_familiares`;
CREATE TABLE `estudiantes_familiares`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiantes` int(11) NULL DEFAULT NULL,
  `id_familiares` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_estudiantes`(`id_estudiantes`) USING BTREE,
  INDEX `id_familiares`(`id_familiares`) USING BTREE,
  CONSTRAINT `estudiantes_familiares_ibfk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estudiantes_familiares_ibfk_2` FOREIGN KEY (`id_familiares`) REFERENCES `familiares` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estudiantes_familiares
-- ----------------------------
INSERT INTO `estudiantes_familiares` VALUES (1, 1, 1, '2019-10-12 00:42:34', NULL, NULL);
INSERT INTO `estudiantes_familiares` VALUES (2, 1, 2, '2019-10-12 00:42:44', NULL, NULL);
INSERT INTO `estudiantes_familiares` VALUES (3, 2, 3, '2019-10-12 00:43:06', NULL, NULL);

-- ----------------------------
-- Table structure for familiares
-- ----------------------------
DROP TABLE IF EXISTS `familiares`;
CREATE TABLE `familiares`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_tipos_documentos` int(11) NULL DEFAULT NULL,
  `numero_documento` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_profesiones` int(11) NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_parentescos` int(11) NULL DEFAULT NULL,
  `direccion_domicilio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono_domicilio` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_estados_civil` int(11) NULL DEFAULT NULL,
  `lugar_trabajo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `direccion_trabajo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_cantones` int(11) NULL DEFAULT NULL,
  `telefono_trabajo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cargo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `flg_representante` int(1) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `familiares_fk_1`(`id_ctlg_tipos_documentos`) USING BTREE,
  INDEX `familiares_fk_2`(`id_ctlg_profesiones`) USING BTREE,
  INDEX `familiares_fk_3`(`id_ctlg_parentescos`) USING BTREE,
  INDEX `familiares_fk_4`(`id_ctlg_estados_civil`) USING BTREE,
  INDEX `familiares_fk_5`(`id_ctlg_cantones`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `familiares_fk_1` FOREIGN KEY (`id_ctlg_tipos_documentos`) REFERENCES `ctlg_tipos_documentos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `familiares_fk_2` FOREIGN KEY (`id_ctlg_profesiones`) REFERENCES `ctlg_profesiones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `familiares_fk_3` FOREIGN KEY (`id_ctlg_parentescos`) REFERENCES `ctlg_parentescos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `familiares_fk_4` FOREIGN KEY (`id_ctlg_estados_civil`) REFERENCES `ctlg_estados_civil` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `familiares_fk_5` FOREIGN KEY (`id_ctlg_cantones`) REFERENCES `ctlg_cantones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `familiares_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of familiares
-- ----------------------------
INSERT INTO `familiares` VALUES (1, 'Juan', 'Martin', 2, '0963653525', 3, 'hghg', 1, 'Sauces', '2256589', '0963528589', 2, 'Coca-Cola', 'Florida', 1, '22586974', 'gerente', '2019-10-12 00:27:48', NULL, NULL, NULL, 1);
INSERT INTO `familiares` VALUES (2, 'Maria', 'Mendez', 2, '0965653645', 15, 'ouio', 2, 'Sauces', '2256589', '0936566599', 2, NULL, NULL, NULL, NULL, 'ama de casa', '2019-10-12 00:29:12', NULL, '2019-10-12 00:30:41', NULL, 1);
INSERT INTO `familiares` VALUES (3, 'Kika', 'Franco', 2, '0965556434', 2, 'ghjghk', 2, 'Vergeles', '2215869', '0956548536', 2, 'Unilever', 'Urdesa', 1, '26564364', 'asistente', '2019-10-12 00:31:35', NULL, '2019-10-12 00:33:54', NULL, 1);

-- ----------------------------
-- Table structure for insumos
-- ----------------------------
DROP TABLE IF EXISTS `insumos`;
CREATE TABLE `insumos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parciales` int(255) NULL DEFAULT NULL,
  `id_ctlg_insumos` int(255) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_parciales`(`id_parciales`) USING BTREE,
  INDEX `id_ctlg_insumos`(`id_ctlg_insumos`) USING BTREE,
  CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `insumos_ibfk_3` FOREIGN KEY (`id_ctlg_insumos`) REFERENCES `ctlg_insumos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `insumos_ibfk_4` FOREIGN KEY (`id_parciales`) REFERENCES `parciales` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of insumos
-- ----------------------------
INSERT INTO `insumos` VALUES (1, 1, 1, 1, '2019-10-12 00:07:05', NULL, '2019-11-04 06:18:38');
INSERT INTO `insumos` VALUES (2, 1, 2, 1, '2019-10-12 00:07:16', NULL, '2019-11-04 06:18:41');
INSERT INTO `insumos` VALUES (3, 1, 6, 1, '2019-10-12 00:07:37', NULL, '2019-11-04 06:18:45');
INSERT INTO `insumos` VALUES (4, 2, 1, 1, '2019-10-12 00:07:41', NULL, '2019-11-04 06:18:59');
INSERT INTO `insumos` VALUES (5, 2, 2, 1, '2019-10-12 00:07:52', NULL, '2019-11-04 06:19:02');
INSERT INTO `insumos` VALUES (6, 2, 6, 1, '2019-10-12 00:08:04', NULL, '2019-11-04 06:19:13');
INSERT INTO `insumos` VALUES (7, 2, 5, 1, '2019-11-04 06:19:26', NULL, NULL);
INSERT INTO `insumos` VALUES (8, 1, 5, 1, '2019-11-04 06:19:36', NULL, NULL);

-- ----------------------------
-- Table structure for jornadas
-- ----------------------------
DROP TABLE IF EXISTS `jornadas`;
CREATE TABLE `jornadas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ctlg_jornadas` int(11) NOT NULL,
  `id_anos_lectivos` int(11) NOT NULL,
  `id_organizaciones` int(11) NOT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_jornadas`(`id_ctlg_jornadas`) USING BTREE,
  INDEX `id_anos_lectivos`(`id_anos_lectivos`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `jornadas_ibfk_1` FOREIGN KEY (`id_ctlg_jornadas`) REFERENCES `ctlg_jornadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jornadas_ibfk_2` FOREIGN KEY (`id_anos_lectivos`) REFERENCES `anos_lectivos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jornadas_ibfk_3` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jornadas_ibfk_4` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jornadas
-- ----------------------------
INSERT INTO `jornadas` VALUES (12, 1, 1, 1, 2, '2019-11-03 03:43:27', '2019-11-04 01:55:34', '2019-11-04 01:55:34');
INSERT INTO `jornadas` VALUES (13, 1, 1, 1, 2, '2019-11-03 03:43:43', '2019-11-04 01:55:34', '2019-11-04 01:55:34');
INSERT INTO `jornadas` VALUES (14, 2, 1, 1, 2, '2019-11-03 03:43:43', '2019-11-04 01:55:34', '2019-11-04 01:55:34');
INSERT INTO `jornadas` VALUES (15, 2, 20, 1, 2, '2019-11-03 05:07:37', '2019-11-04 02:26:34', '2019-11-04 02:26:34');
INSERT INTO `jornadas` VALUES (16, 3, 20, 1, 2, '2019-11-03 05:07:37', '2019-11-04 02:26:23', '2019-11-04 02:26:23');
INSERT INTO `jornadas` VALUES (17, 1, 20, 1, 2, '2019-11-03 05:07:37', '2019-11-04 02:26:18', '2019-11-04 02:26:18');
INSERT INTO `jornadas` VALUES (18, 1, 1, 1, 2, '2019-11-04 01:55:34', '2019-11-04 02:26:14', '2019-11-04 02:26:14');
INSERT INTO `jornadas` VALUES (19, 2, 1, 1, 2, '2019-11-04 01:55:34', '2019-11-04 02:25:25', '2019-11-04 02:25:25');
INSERT INTO `jornadas` VALUES (20, 3, 1, 1, 2, '2019-11-04 01:55:34', '2019-11-04 02:25:29', '2019-11-04 02:25:29');
INSERT INTO `jornadas` VALUES (21, 1, 21, 1, 2, '2019-11-04 02:10:12', '2019-11-04 02:25:33', '2019-11-04 02:25:33');
INSERT INTO `jornadas` VALUES (22, 2, 21, 1, 2, '2019-11-04 02:10:12', '2019-11-04 02:25:37', '2019-11-04 02:25:37');
INSERT INTO `jornadas` VALUES (23, 1, 23, 1, 2, '2019-11-04 02:11:30', '2019-11-04 02:25:41', '2019-11-04 02:25:41');
INSERT INTO `jornadas` VALUES (24, 2, 23, 1, 2, '2019-11-04 02:11:30', '2019-11-04 02:25:44', '2019-11-04 02:25:44');
INSERT INTO `jornadas` VALUES (25, 2, 24, 1, 2, '2019-11-04 02:14:47', '2019-11-04 02:26:42', '2019-11-04 02:26:42');
INSERT INTO `jornadas` VALUES (26, 2, 25, 1, 2, '2019-11-04 02:16:45', '2019-11-04 02:26:11', '2019-11-04 02:26:11');
INSERT INTO `jornadas` VALUES (27, 3, 25, 1, 2, '2019-11-04 02:16:45', '2019-11-04 02:26:09', '2019-11-04 02:26:09');
INSERT INTO `jornadas` VALUES (28, 3, 26, 1, 2, '2019-11-04 02:17:10', '2019-11-04 02:26:04', '2019-11-04 02:26:04');
INSERT INTO `jornadas` VALUES (29, 2, 26, 1, 2, '2019-11-04 02:17:10', '2019-11-04 02:25:59', '2019-11-04 02:25:59');
INSERT INTO `jornadas` VALUES (30, 3, 27, 1, 2, '2019-11-04 02:17:30', '2019-11-04 02:26:06', '2019-11-04 02:26:06');
INSERT INTO `jornadas` VALUES (31, 2, 27, 1, 2, '2019-11-04 02:17:30', '2019-11-04 02:26:02', '2019-11-04 02:26:02');
INSERT INTO `jornadas` VALUES (32, 1, 28, 1, 2, '2019-11-04 02:18:49', '2019-11-04 02:25:54', '2019-11-04 02:25:54');
INSERT INTO `jornadas` VALUES (33, 2, 28, 1, 2, '2019-11-04 02:18:49', '2019-11-04 02:25:57', '2019-11-04 02:25:57');
INSERT INTO `jornadas` VALUES (34, 2, 29, 1, 2, '2019-11-04 02:19:49', '2019-11-04 02:25:51', '2019-11-04 02:25:51');
INSERT INTO `jornadas` VALUES (35, 1, 24, 1, 1, '2019-11-04 02:26:42', NULL, NULL);
INSERT INTO `jornadas` VALUES (36, 2, 24, 1, 1, '2019-11-04 02:26:42', NULL, NULL);
INSERT INTO `jornadas` VALUES (37, 3, 24, 1, 2, '2019-11-04 02:26:42', '2019-11-04 02:26:48', '2019-11-04 02:26:48');
INSERT INTO `jornadas` VALUES (38, 1, 30, 1, 1, '2019-11-04 02:32:47', NULL, NULL);
INSERT INTO `jornadas` VALUES (39, 2, 30, 1, 1, '2019-11-04 02:32:47', NULL, NULL);
INSERT INTO `jornadas` VALUES (40, 3, 30, 1, 1, '2019-11-04 02:32:47', NULL, NULL);
INSERT INTO `jornadas` VALUES (41, 3, 31, 1, 1, '2019-11-04 02:33:11', NULL, NULL);
INSERT INTO `jornadas` VALUES (42, 2, 31, 1, 1, '2019-11-04 02:33:11', NULL, NULL);

-- ----------------------------
-- Table structure for matriculas
-- ----------------------------
DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE `matriculas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiantes` int(11) NOT NULL,
  `id_cursos` int(11) NOT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `matriculas_fk_1`(`id_estudiantes`) USING BTREE,
  INDEX `matriculas_fk_2`(`id_cursos`) USING BTREE,
  INDEX `matriculas_fk_5`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `matriculas_fk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `matriculas_fk_2` FOREIGN KEY (`id_cursos`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `matriculas_fk_5` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for modulos
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orden` int(11) NULL DEFAULT NULL,
  `icono` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_organizaciones` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES (1, 'Administracion', 1, 'fa-cogs', 1, '2019-10-10 00:10:32', NULL, NULL);

-- ----------------------------
-- Table structure for opciones
-- ----------------------------
DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulos` int(11) NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orden` int(11) NULL DEFAULT NULL,
  `icono` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vista` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_organizaciones` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_modulos`(`id_modulos`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`id_modulos`) REFERENCES `modulos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `opciones_ibfk_2` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `opciones_ibfk_3` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opciones
-- ----------------------------
INSERT INTO `opciones` VALUES (3, 1, 'Año Lectivo', 1, 'fa-circle-o', 'anosLectivos', 1, '2019-10-12 17:58:50', '2019-10-12 18:21:46', NULL, 1);
INSERT INTO `opciones` VALUES (4, 1, 'Jornadas', 2, 'fa-circle-o', 'jornadas', 1, '2019-10-13 02:11:13', '2019-10-13 03:43:38', NULL, 1);
INSERT INTO `opciones` VALUES (5, 1, 'Edificios', 3, 'fa-circle-o', 'edificios', 1, '2019-10-13 04:32:35', '2019-10-13 04:32:54', NULL, 1);
INSERT INTO `opciones` VALUES (6, 1, 'Aulas', 4, 'fa-circle-o', 'aulas', 1, '2019-10-13 04:33:21', '2019-10-13 04:33:29', NULL, 1);
INSERT INTO `opciones` VALUES (7, 1, 'Cursos', 6, 'fa-circle-o', 'cursos', 1, '2019-10-13 05:51:23', '2019-10-14 14:31:47', NULL, 1);
INSERT INTO `opciones` VALUES (8, 1, 'Docentes', 5, 'fa-circle-o', 'docentes', 1, '2019-10-14 14:31:46', '2019-10-14 14:32:10', NULL, 1);

-- ----------------------------
-- Table structure for organizaciones
-- ----------------------------
DROP TABLE IF EXISTS `organizaciones`;
CREATE TABLE `organizaciones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_ctlg_paises` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `organizaciones_ibfk_1`(`id_ctlg_paises`) USING BTREE,
  CONSTRAINT `organizaciones_ibfk_1` FOREIGN KEY (`id_ctlg_paises`) REFERENCES `ctlg_paises` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of organizaciones
-- ----------------------------
INSERT INTO `organizaciones` VALUES (1, 'Interamericana', 'aanteparacerezo@gmail.com', 'samanes7', 2, '2019-10-10 00:04:29', NULL, '2019-10-13 02:19:22');
INSERT INTO `organizaciones` VALUES (2, 'Leonidas Garcia', 'aanteparacerezo@gmail.com', 'samanes7', NULL, '2019-10-13 02:19:12', NULL, '2019-10-13 02:19:39');

-- ----------------------------
-- Table structure for parciales
-- ----------------------------
DROP TABLE IF EXISTS `parciales`;
CREATE TABLE `parciales`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodos` int(11) NOT NULL,
  `id_ctlg_parciales` int(255) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_periodos`(`id_periodos`) USING BTREE,
  INDEX `id_ctlg_parciales`(`id_ctlg_parciales`) USING BTREE,
  CONSTRAINT `parciales_ibfk_1` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `parciales_ibfk_2` FOREIGN KEY (`id_periodos`) REFERENCES `periodos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `parciales_ibfk_3` FOREIGN KEY (`id_ctlg_parciales`) REFERENCES `ctlg_parciales` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parciales
-- ----------------------------
INSERT INTO `parciales` VALUES (1, 1, 1, '2019-10-11 22:45:04', '2019-11-04 06:09:32', NULL, 1);
INSERT INTO `parciales` VALUES (2, 1, 2, '2019-10-11 22:45:27', '2019-11-04 06:09:35', NULL, 1);
INSERT INTO `parciales` VALUES (3, 1, 3, '2019-10-11 22:45:56', '2019-11-04 06:09:39', NULL, 1);
INSERT INTO `parciales` VALUES (4, 2, 1, '2019-11-04 06:00:00', '2019-11-04 06:09:41', NULL, 1);
INSERT INTO `parciales` VALUES (5, 2, 2, '2019-11-04 06:00:35', '2019-11-04 06:09:45', NULL, 1);
INSERT INTO `parciales` VALUES (7, 2, 3, '2019-11-04 06:00:54', '2019-11-04 06:09:49', NULL, 1);

-- ----------------------------
-- Table structure for perfiles
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_organizaciones` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_organizaciones`(`id_organizaciones`) USING BTREE,
  CONSTRAINT `perfiles_ibfk_1` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES (1, 'Administrador', 1, '2019-10-10 00:06:16', NULL, '2019-10-10 00:07:42');
INSERT INTO `perfiles` VALUES (2, 'Director Académico', 1, '2019-10-12 23:26:35', NULL, '2019-10-12 23:27:40');
INSERT INTO `perfiles` VALUES (3, 'Secretaria', 1, '2019-10-12 23:26:56', NULL, '2019-10-12 23:27:42');
INSERT INTO `perfiles` VALUES (4, 'Docente', 1, '2019-10-12 23:27:38', NULL, '2019-10-12 23:27:50');

-- ----------------------------
-- Table structure for perfiles_opciones
-- ----------------------------
DROP TABLE IF EXISTS `perfiles_opciones`;
CREATE TABLE `perfiles_opciones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfiles` int(11) NULL DEFAULT NULL,
  `id_opciones` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_perfiles`(`id_perfiles`) USING BTREE,
  INDEX `id_opciones`(`id_opciones`) USING BTREE,
  CONSTRAINT `perfiles_opciones_ibfk_1` FOREIGN KEY (`id_perfiles`) REFERENCES `perfiles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `perfiles_opciones_ibfk_2` FOREIGN KEY (`id_opciones`) REFERENCES `opciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfiles_opciones
-- ----------------------------
INSERT INTO `perfiles_opciones` VALUES (3, 1, 3, '2019-10-12 18:02:49', NULL, NULL);
INSERT INTO `perfiles_opciones` VALUES (4, 1, 4, '2019-10-13 02:11:50', NULL, NULL);
INSERT INTO `perfiles_opciones` VALUES (5, 1, 5, '2019-10-13 04:33:48', NULL, NULL);
INSERT INTO `perfiles_opciones` VALUES (6, 1, 6, '2019-10-13 04:33:56', NULL, NULL);
INSERT INTO `perfiles_opciones` VALUES (7, 1, 7, '2019-10-13 05:54:14', NULL, NULL);
INSERT INTO `perfiles_opciones` VALUES (8, 1, 8, '2019-10-14 14:32:24', NULL, NULL);

-- ----------------------------
-- Table structure for periodos
-- ----------------------------
DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anos_lectivos` int(11) NULL DEFAULT NULL,
  `id_ctlg_periodos` int(255) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_ctlg_estados` int(255) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `periodos_fk_1`(`id_anos_lectivos`) USING BTREE,
  INDEX `id_ctlg_estados`(`id_ctlg_estados`) USING BTREE,
  INDEX `id_ctlg_periodos`(`id_ctlg_periodos`) USING BTREE,
  CONSTRAINT `periodos_ibfk_1` FOREIGN KEY (`id_anos_lectivos`) REFERENCES `anos_lectivos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `periodos_ibfk_2` FOREIGN KEY (`id_ctlg_estados`) REFERENCES `ctlg_estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `periodos_ibfk_3` FOREIGN KEY (`id_ctlg_periodos`) REFERENCES `ctlg_periodos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of periodos
-- ----------------------------
INSERT INTO `periodos` VALUES (1, 24, 1, '2019-10-11 22:50:28', '2019-11-04 06:06:20', NULL, 1);
INSERT INTO `periodos` VALUES (2, 24, 2, '2019-10-11 22:50:54', '2019-11-04 06:06:23', NULL, 1);

-- ----------------------------
-- Table structure for provincias_cantones_parroquias
-- ----------------------------
DROP TABLE IF EXISTS `provincias_cantones_parroquias`;
CREATE TABLE `provincias_cantones_parroquias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ctlg_provincias` int(11) NULL DEFAULT NULL,
  `id_ctlg_cantones` int(11) NULL DEFAULT NULL,
  `id_ctlg_parroquias` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ctlg_cantones`(`id_ctlg_cantones`) USING BTREE,
  INDEX `id_ctlg_provincias`(`id_ctlg_provincias`) USING BTREE,
  INDEX `id_ctlg_parroquias`(`id_ctlg_parroquias`) USING BTREE,
  CONSTRAINT `provincias_cantones_parroquias_ibfk_1` FOREIGN KEY (`id_ctlg_cantones`) REFERENCES `ctlg_cantones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `provincias_cantones_parroquias_ibfk_2` FOREIGN KEY (`id_ctlg_provincias`) REFERENCES `ctlg_provincias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `provincias_cantones_parroquias_ibfk_3` FOREIGN KEY (`id_ctlg_parroquias`) REFERENCES `ctlg_parroquias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1396 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provincias_cantones_parroquias
-- ----------------------------
INSERT INTO `provincias_cantones_parroquias` VALUES (1, 1, 1, 1, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (2, 1, 1, 2, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (3, 1, 1, 3, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (4, 1, 1, 4, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (5, 1, 1, 5, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (6, 1, 1, 6, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (7, 1, 1, 7, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (8, 1, 1, 8, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (9, 1, 1, 9, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (10, 1, 1, 10, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (11, 1, 1, 11, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (12, 1, 1, 12, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (13, 1, 1, 13, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (14, 1, 1, 14, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (15, 1, 1, 15, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (16, 1, 1, 16, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (17, 1, 1, 17, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (18, 1, 1, 18, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (19, 1, 1, 19, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (20, 1, 1, 20, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (21, 1, 1, 21, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (22, 1, 1, 22, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (23, 1, 1, 23, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (24, 1, 1, 24, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (25, 1, 1, 25, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (26, 1, 1, 26, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (27, 1, 1, 27, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (28, 1, 1, 28, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (29, 1, 1, 29, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (30, 1, 1, 30, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (31, 1, 1, 31, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (32, 1, 1, 32, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (33, 1, 1, 33, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (34, 1, 1, 34, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (35, 1, 1, 35, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (36, 1, 1, 36, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (37, 1, 1, 37, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (38, 1, 2, 38, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (39, 1, 2, 39, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (40, 1, 2, 40, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (41, 1, 3, 41, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (42, 1, 3, 42, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (43, 1, 3, 43, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (44, 1, 3, 44, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (45, 1, 3, 45, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (46, 1, 3, 46, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (47, 1, 3, 47, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (48, 1, 3, 48, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (49, 1, 3, 49, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (50, 1, 3, 50, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (51, 1, 3, 51, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (52, 1, 4, 52, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (53, 1, 4, 53, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (54, 1, 4, 54, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (55, 1, 4, 55, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (56, 1, 4, 56, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (57, 1, 5, 57, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (58, 1, 5, 58, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (59, 1, 5, 59, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (60, 1, 5, 60, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (61, 1, 5, 61, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (62, 1, 5, 62, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (63, 1, 5, 63, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (64, 1, 5, 64, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (65, 1, 5, 65, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (66, 1, 5, 66, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (67, 1, 5, 67, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (68, 1, 5, 68, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (69, 1, 5, 69, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (70, 1, 6, 70, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (71, 1, 6, 71, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (72, 1, 6, 72, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (73, 1, 7, 73, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (74, 1, 7, 74, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (75, 1, 8, 75, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (76, 1, 8, 76, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (77, 1, 8, 77, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (78, 1, 8, 78, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (79, 1, 8, 79, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (80, 1, 9, 80, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (81, 1, 9, 81, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (82, 1, 9, 82, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (83, 1, 9, 83, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (84, 1, 9, 84, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (85, 1, 9, 85, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (86, 1, 9, 86, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (87, 1, 10, 87, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (88, 1, 10, 88, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (89, 1, 11, 89, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (90, 1, 11, 90, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (91, 1, 11, 91, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (92, 1, 11, 92, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (93, 1, 11, 93, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (94, 1, 12, 94, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (95, 1, 12, 95, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (96, 1, 12, 96, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (97, 1, 12, 97, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (98, 1, 13, 98, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (99, 1, 13, 99, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (100, 1, 13, 100, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (101, 1, 14, 101, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (102, 1, 15, 102, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (103, 1, 15, 103, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (104, 2, 16, 104, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (105, 2, 16, 105, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (106, 2, 16, 106, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (107, 2, 16, 107, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (108, 2, 16, 108, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (109, 2, 16, 109, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (110, 2, 16, 110, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (111, 2, 16, 111, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (112, 2, 16, 112, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (113, 2, 16, 113, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (114, 2, 16, 114, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (115, 2, 16, 115, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (116, 2, 16, 116, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (117, 2, 16, 117, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (118, 2, 17, 118, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (119, 2, 17, 119, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (120, 2, 18, 120, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (121, 2, 18, 121, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (122, 2, 18, 122, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (123, 2, 18, 123, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (124, 2, 18, 124, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (125, 2, 18, 125, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (126, 2, 19, 126, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (127, 2, 20, 127, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (128, 2, 20, 128, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (129, 2, 20, 129, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (130, 2, 20, 130, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (131, 2, 20, 131, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (132, 2, 20, 132, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (133, 2, 20, 133, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (134, 2, 21, 134, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (135, 2, 22, 135, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (136, 2, 22, 136, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (137, 2, 22, 137, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (138, 3, 23, 138, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (139, 3, 23, 139, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (140, 3, 23, 140, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (141, 3, 23, 141, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (142, 3, 23, 142, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (143, 3, 23, 143, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (144, 3, 23, 144, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (145, 3, 23, 145, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (146, 3, 23, 146, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (147, 3, 23, 147, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (148, 3, 23, 148, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (149, 3, 23, 149, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (150, 3, 23, 150, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (151, 3, 23, 151, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (152, 3, 23, 152, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (153, 3, 24, 153, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (154, 3, 24, 154, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (155, 3, 24, 155, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (156, 3, 24, 156, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (157, 3, 24, 157, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (158, 3, 25, 158, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (159, 3, 25, 159, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (160, 3, 25, 160, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (161, 3, 25, 161, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (162, 3, 25, 162, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (163, 3, 25, 163, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (164, 3, 25, 164, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (165, 3, 25, 165, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (166, 3, 25, 166, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (167, 3, 25, 167, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (168, 3, 25, 168, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (169, 3, 25, 169, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (170, 3, 25, 170, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (171, 3, 25, 171, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (172, 3, 26, 172, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (173, 3, 26, 173, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (174, 3, 26, 174, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (175, 3, 27, 175, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (176, 3, 28, 176, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (177, 3, 28, 177, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (178, 3, 29, 178, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (179, 4, 30, 179, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (180, 4, 30, 180, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (181, 4, 30, 181, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (182, 4, 30, 182, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (183, 4, 30, 183, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (184, 4, 30, 184, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (185, 4, 30, 185, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (186, 4, 30, 186, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (187, 4, 30, 187, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (188, 4, 30, 188, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (189, 4, 30, 189, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (190, 4, 30, 190, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (191, 4, 30, 191, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (192, 4, 30, 192, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (193, 4, 31, 193, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (194, 4, 31, 194, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (195, 4, 31, 195, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (196, 4, 31, 196, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (197, 4, 31, 197, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (198, 4, 31, 198, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (199, 4, 32, 199, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (200, 4, 32, 200, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (201, 4, 32, 201, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (202, 4, 32, 202, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (203, 4, 32, 203, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (204, 4, 32, 204, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (205, 4, 33, 205, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (206, 4, 33, 206, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (207, 4, 33, 207, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (208, 4, 33, 208, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (209, 4, 34, 209, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (210, 4, 34, 210, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (211, 4, 34, 211, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (212, 4, 34, 212, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (213, 4, 34, 213, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (214, 4, 34, 214, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (215, 4, 34, 215, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (216, 4, 34, 216, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (217, 4, 35, 217, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (218, 4, 35, 218, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (219, 5, 36, 219, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (220, 5, 36, 220, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (221, 5, 36, 221, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (222, 5, 36, 222, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (223, 5, 36, 223, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (224, 5, 36, 224, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (225, 5, 36, 225, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (226, 5, 36, 226, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (227, 5, 36, 227, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (228, 5, 36, 228, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (229, 5, 36, 229, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (230, 5, 36, 230, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (231, 5, 36, 231, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (232, 5, 36, 232, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (233, 5, 36, 233, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (234, 5, 36, 234, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (235, 5, 36, 235, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (236, 5, 36, 236, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (237, 5, 36, 237, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (238, 5, 37, 238, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (239, 5, 37, 239, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (240, 5, 37, 240, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (241, 5, 37, 241, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (242, 5, 37, 242, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (243, 5, 37, 243, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (244, 5, 38, 244, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (245, 5, 38, 245, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (246, 5, 38, 246, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (247, 5, 38, 247, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (248, 5, 39, 248, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (249, 5, 39, 249, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (250, 5, 39, 250, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (251, 5, 39, 251, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (252, 5, 39, 252, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (253, 5, 39, 253, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (254, 5, 39, 254, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (255, 5, 39, 255, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (256, 5, 39, 256, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (257, 5, 40, 257, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (258, 5, 40, 258, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (259, 5, 40, 259, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (260, 5, 40, 260, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (261, 5, 40, 261, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (262, 5, 40, 262, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (263, 5, 41, 263, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (264, 5, 41, 264, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (265, 5, 41, 265, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (266, 5, 41, 266, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (267, 5, 42, 267, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (268, 5, 42, 268, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (269, 5, 42, 269, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (270, 5, 42, 270, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (271, 5, 42, 271, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (272, 6, 43, 272, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (273, 6, 43, 273, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (274, 6, 43, 274, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (275, 6, 43, 275, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (276, 6, 43, 276, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (277, 6, 43, 277, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (278, 6, 43, 278, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (279, 6, 43, 279, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (280, 6, 43, 280, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (281, 6, 43, 281, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (282, 6, 43, 282, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (283, 6, 43, 283, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (284, 6, 43, 284, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (285, 6, 43, 285, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (286, 6, 43, 286, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (287, 6, 43, 287, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (288, 6, 43, 288, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (289, 6, 44, 289, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (290, 6, 44, 290, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (291, 6, 44, 291, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (292, 6, 44, 292, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (293, 6, 44, 293, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (294, 6, 44, 294, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (295, 6, 44, 295, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (296, 6, 44, 296, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (297, 6, 44, 297, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (298, 6, 44, 298, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (299, 6, 44, 299, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (300, 6, 45, 300, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (301, 6, 45, 301, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (302, 6, 45, 302, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (303, 6, 45, 303, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (304, 6, 45, 304, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (305, 6, 45, 305, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (306, 6, 45, 306, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (307, 6, 46, 307, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (308, 6, 47, 308, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (309, 6, 47, 309, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (310, 6, 47, 310, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (311, 6, 47, 311, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (312, 6, 47, 312, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (313, 6, 48, 313, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (314, 6, 48, 314, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (315, 6, 48, 315, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (316, 6, 49, 316, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (317, 6, 49, 317, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (318, 6, 49, 318, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (319, 6, 49, 319, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (320, 6, 49, 320, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (321, 6, 49, 321, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (322, 6, 49, 322, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (323, 6, 49, 323, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (324, 6, 49, 324, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (325, 6, 49, 325, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (326, 6, 49, 326, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (327, 6, 49, 327, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (328, 6, 50, 328, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (329, 6, 51, 329, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (330, 6, 51, 330, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (331, 6, 51, 331, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (332, 6, 51, 332, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (333, 6, 51, 333, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (334, 6, 51, 334, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (335, 6, 51, 335, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (336, 6, 52, 336, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (337, 7, 53, 337, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (338, 7, 53, 338, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (339, 7, 53, 339, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (340, 7, 53, 340, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (341, 7, 53, 341, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (342, 7, 53, 342, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (343, 7, 53, 343, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (344, 7, 53, 344, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (345, 7, 54, 345, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (346, 7, 54, 346, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (347, 7, 54, 347, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (348, 7, 54, 348, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (349, 7, 54, 349, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (350, 7, 54, 350, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (351, 7, 55, 351, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (352, 7, 55, 352, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (353, 7, 55, 353, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (354, 7, 55, 354, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (355, 7, 55, 355, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (356, 7, 55, 356, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (357, 7, 56, 357, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (358, 7, 56, 358, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (359, 7, 57, 359, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (360, 7, 58, 360, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (361, 7, 58, 361, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (362, 7, 58, 362, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (363, 7, 58, 363, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (364, 7, 58, 364, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (365, 7, 59, 365, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (366, 7, 59, 366, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (367, 7, 59, 367, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (368, 7, 59, 368, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (369, 7, 59, 369, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (370, 7, 59, 370, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (371, 7, 60, 371, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (372, 7, 60, 372, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (373, 7, 61, 373, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (374, 7, 61, 374, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (375, 7, 61, 375, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (376, 7, 61, 376, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (377, 7, 61, 377, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (378, 7, 61, 378, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (379, 7, 61, 379, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (380, 7, 61, 380, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (381, 7, 61, 381, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (382, 7, 61, 382, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (383, 7, 61, 383, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (384, 7, 62, 384, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (385, 7, 62, 385, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (386, 7, 62, 386, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (387, 7, 62, 387, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (388, 7, 62, 388, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (389, 7, 62, 389, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (390, 7, 62, 390, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (391, 7, 62, 391, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (392, 7, 62, 392, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (393, 7, 62, 393, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (394, 7, 63, 394, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (395, 7, 63, 395, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (396, 7, 63, 396, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (397, 7, 63, 397, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (398, 7, 64, 398, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (399, 7, 64, 399, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (400, 7, 64, 400, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (401, 7, 64, 401, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (402, 7, 64, 402, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (403, 7, 64, 403, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (404, 7, 64, 404, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (405, 7, 64, 405, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (406, 7, 64, 406, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (407, 7, 64, 407, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (408, 7, 64, 408, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (409, 7, 64, 409, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (410, 7, 64, 410, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (411, 7, 65, 411, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (412, 7, 65, 412, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (413, 7, 65, 413, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (414, 7, 65, 414, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (415, 7, 65, 415, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (416, 7, 65, 416, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (417, 7, 65, 417, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (418, 7, 65, 418, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (419, 7, 65, 419, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (420, 7, 65, 420, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (421, 7, 66, 421, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (422, 7, 66, 422, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (423, 7, 66, 423, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (424, 7, 66, 424, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (425, 7, 66, 425, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (426, 7, 66, 426, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (427, 7, 66, 427, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (428, 8, 67, 428, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (429, 8, 67, 429, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (430, 8, 67, 430, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (431, 8, 67, 431, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (432, 8, 67, 432, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (433, 8, 67, 433, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (434, 8, 67, 434, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (435, 8, 67, 435, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (436, 8, 67, 436, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (437, 8, 67, 437, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (438, 8, 67, 438, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (439, 8, 67, 439, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (440, 8, 67, 440, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (441, 8, 67, 441, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (442, 8, 67, 442, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (443, 8, 67, 443, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (444, 8, 67, 444, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (445, 8, 67, 445, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (446, 8, 67, 446, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (447, 8, 67, 447, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (448, 8, 67, 448, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (449, 8, 67, 449, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (450, 8, 67, 450, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (451, 8, 67, 451, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (452, 8, 68, 452, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (453, 8, 68, 453, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (454, 8, 68, 454, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (455, 8, 68, 455, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (456, 8, 68, 456, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (457, 8, 68, 457, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (458, 8, 68, 458, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (459, 8, 68, 459, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (460, 8, 68, 460, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (461, 8, 68, 461, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (462, 8, 68, 462, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (463, 8, 68, 463, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (464, 8, 68, 464, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (465, 8, 68, 465, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (466, 8, 68, 466, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (467, 8, 69, 467, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (468, 8, 69, 468, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (469, 8, 69, 469, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (470, 8, 69, 470, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (471, 8, 69, 471, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (472, 8, 69, 472, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (473, 8, 69, 473, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (474, 8, 69, 474, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (475, 8, 69, 475, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (476, 8, 70, 476, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (477, 8, 70, 477, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (478, 8, 70, 478, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (479, 8, 70, 479, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (480, 8, 70, 480, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (481, 8, 70, 481, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (482, 8, 71, 482, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (483, 8, 71, 483, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (484, 8, 71, 484, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (485, 8, 71, 485, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (486, 8, 71, 486, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (487, 8, 71, 487, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (488, 8, 71, 488, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (489, 8, 71, 489, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (490, 8, 71, 490, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (491, 8, 71, 491, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (492, 8, 71, 492, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (493, 8, 71, 493, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (494, 8, 71, 494, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (495, 8, 72, 495, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (496, 8, 72, 496, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (497, 8, 72, 497, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (498, 8, 72, 498, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (499, 8, 72, 499, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (500, 8, 73, 500, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (501, 8, 73, 501, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (502, 8, 73, 502, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (503, 8, 73, 503, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (504, 8, 73, 504, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (505, 8, 73, 505, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (506, 9, 74, 510, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (507, 9, 74, 511, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (508, 9, 74, 512, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (509, 9, 74, 513, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (510, 9, 74, 514, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (511, 9, 74, 515, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (512, 9, 74, 516, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (513, 9, 74, 517, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (514, 9, 74, 518, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (515, 9, 74, 519, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (516, 9, 74, 520, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (517, 9, 74, 521, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (518, 9, 74, 522, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (519, 9, 74, 523, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (520, 9, 74, 524, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (521, 9, 74, 525, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (522, 9, 74, 526, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (523, 9, 74, 527, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (524, 9, 74, 528, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (525, 9, 74, 529, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (526, 9, 74, 530, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (527, 9, 74, 531, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (528, 9, 74, 532, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (529, 9, 74, 533, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (530, 9, 75, 534, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (531, 9, 76, 535, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (532, 9, 77, 536, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (533, 9, 78, 537, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (534, 9, 78, 538, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (535, 9, 79, 539, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (536, 9, 79, 540, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (537, 9, 79, 541, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (538, 9, 79, 542, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (539, 9, 79, 543, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (540, 9, 79, 544, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (541, 9, 79, 545, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (542, 9, 79, 546, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (543, 9, 79, 547, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (544, 9, 79, 548, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (545, 9, 79, 549, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (546, 9, 79, 550, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (547, 9, 79, 551, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (548, 9, 79, 552, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (549, 9, 79, 553, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (550, 9, 79, 554, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (551, 9, 80, 555, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (552, 9, 80, 556, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (553, 9, 80, 557, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (554, 9, 81, 558, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (555, 9, 81, 559, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (556, 9, 81, 560, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (557, 9, 82, 561, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (558, 9, 83, 562, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (559, 9, 83, 563, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (560, 9, 83, 564, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (561, 9, 83, 565, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (562, 9, 83, 566, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (563, 9, 84, 567, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (564, 9, 84, 568, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (565, 9, 84, 569, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (566, 9, 84, 570, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (567, 9, 84, 571, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (568, 9, 85, 572, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (569, 9, 86, 573, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (570, 9, 87, 574, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (571, 9, 87, 575, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (572, 9, 87, 576, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (573, 9, 88, 577, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (574, 9, 88, 578, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (575, 9, 88, 579, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (576, 9, 88, 580, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (577, 9, 89, 581, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (578, 9, 90, 582, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (579, 9, 90, 583, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (580, 9, 90, 584, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (581, 9, 90, 585, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (582, 9, 90, 586, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (583, 9, 90, 587, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (584, 9, 90, 588, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (585, 9, 90, 589, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (586, 9, 90, 590, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (587, 9, 91, 591, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (588, 9, 91, 592, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (589, 9, 91, 593, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (590, 9, 91, 594, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (591, 9, 91, 595, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (592, 9, 91, 596, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (593, 9, 91, 597, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (594, 9, 92, 598, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (595, 9, 93, 599, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (596, 9, 93, 600, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (597, 9, 94, 601, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (598, 9, 95, 602, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (599, 9, 95, 603, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (600, 9, 96, 604, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (601, 9, 97, 605, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (602, 9, 98, 606, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (603, 10, 99, 607, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (604, 10, 99, 608, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (605, 10, 99, 609, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (606, 10, 99, 610, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (607, 10, 99, 611, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (608, 10, 99, 612, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (609, 10, 99, 613, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (610, 10, 99, 614, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (611, 10, 99, 615, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (612, 10, 99, 616, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (613, 10, 99, 617, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (614, 10, 99, 618, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (615, 10, 99, 619, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (616, 10, 100, 620, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (617, 10, 100, 621, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (618, 10, 100, 622, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (619, 10, 100, 623, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (620, 10, 100, 624, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (621, 10, 100, 625, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (622, 10, 100, 626, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (623, 10, 101, 627, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (624, 10, 101, 628, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (625, 10, 101, 629, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (626, 10, 101, 630, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (627, 10, 101, 631, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (628, 10, 101, 632, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (629, 10, 101, 633, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (630, 10, 101, 634, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (631, 10, 101, 635, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (632, 10, 101, 636, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (633, 10, 101, 637, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (634, 10, 102, 638, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (635, 10, 102, 639, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (636, 10, 102, 640, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (637, 10, 102, 641, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (638, 10, 102, 642, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (639, 10, 102, 643, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (640, 10, 102, 644, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (641, 10, 102, 645, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (642, 10, 102, 646, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (643, 10, 102, 647, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (644, 10, 102, 648, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (645, 10, 102, 649, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (646, 10, 103, 650, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (647, 10, 103, 651, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (648, 10, 103, 652, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (649, 10, 103, 653, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (650, 10, 104, 654, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (651, 10, 104, 655, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (652, 10, 104, 656, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (653, 10, 104, 657, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (654, 10, 104, 658, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (655, 10, 104, 659, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (656, 11, 105, 660, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (657, 11, 105, 661, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (658, 11, 105, 662, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (659, 11, 105, 663, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (660, 11, 105, 664, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (661, 11, 105, 665, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (662, 11, 105, 666, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (663, 11, 105, 667, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (664, 11, 105, 668, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (665, 11, 105, 669, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (666, 11, 105, 670, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (667, 11, 105, 671, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (668, 11, 105, 672, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (669, 11, 105, 673, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (670, 11, 105, 674, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (671, 11, 105, 675, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (672, 11, 105, 676, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (673, 11, 105, 677, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (674, 11, 106, 678, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (675, 11, 106, 679, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (676, 11, 106, 680, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (677, 11, 106, 681, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (678, 11, 106, 682, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (679, 11, 106, 683, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (680, 11, 106, 684, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (681, 11, 106, 685, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (682, 11, 107, 686, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (683, 11, 107, 687, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (684, 11, 107, 688, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (685, 11, 107, 689, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (686, 11, 107, 690, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (687, 11, 107, 691, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (688, 11, 107, 692, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (689, 11, 108, 693, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (690, 11, 108, 694, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (691, 11, 108, 695, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (692, 11, 108, 696, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (693, 11, 108, 697, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (694, 11, 108, 698, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (695, 11, 108, 699, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (696, 11, 108, 700, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (697, 11, 109, 701, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (698, 11, 109, 702, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (699, 11, 109, 703, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (700, 11, 109, 704, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (701, 11, 109, 705, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (702, 11, 110, 706, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (703, 11, 110, 707, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (704, 11, 110, 708, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (705, 11, 110, 709, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (706, 11, 110, 710, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (707, 11, 110, 711, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (708, 11, 110, 712, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (709, 11, 111, 713, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (710, 11, 111, 714, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (711, 11, 111, 715, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (712, 11, 111, 716, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (713, 11, 111, 717, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (714, 11, 111, 718, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (715, 11, 111, 719, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (716, 11, 111, 720, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (717, 11, 112, 721, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (718, 11, 112, 722, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (719, 11, 112, 723, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (720, 11, 112, 724, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (721, 11, 112, 725, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (722, 11, 112, 726, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (723, 11, 113, 727, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (724, 11, 113, 728, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (725, 11, 113, 729, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (726, 11, 113, 730, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (727, 11, 113, 731, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (728, 11, 113, 732, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (729, 11, 113, 733, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (730, 11, 113, 734, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (731, 11, 113, 735, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (732, 11, 113, 736, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (733, 11, 113, 737, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (734, 11, 113, 738, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (735, 11, 114, 739, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (736, 11, 114, 740, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (737, 11, 114, 741, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (738, 11, 114, 742, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (739, 11, 114, 743, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (740, 11, 114, 744, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (741, 11, 115, 745, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (742, 11, 115, 746, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (743, 11, 115, 747, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (744, 11, 115, 748, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (745, 11, 115, 749, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (746, 11, 115, 750, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (747, 11, 115, 751, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (748, 11, 115, 752, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (749, 11, 115, 753, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (750, 11, 115, 754, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (751, 11, 115, 755, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (752, 11, 116, 756, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (753, 11, 116, 757, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (754, 11, 116, 758, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (755, 11, 117, 759, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (756, 11, 117, 760, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (757, 11, 117, 761, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (758, 11, 117, 762, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (759, 11, 117, 763, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (760, 11, 117, 764, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (761, 11, 118, 765, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (762, 11, 118, 766, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (763, 11, 118, 767, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (764, 11, 118, 768, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (765, 11, 119, 769, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (766, 11, 119, 770, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (767, 11, 119, 771, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (768, 11, 120, 772, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (769, 11, 120, 773, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (770, 12, 121, 774, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (771, 12, 121, 775, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (772, 12, 121, 776, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (773, 12, 121, 777, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (774, 12, 121, 778, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (775, 12, 121, 779, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (776, 12, 121, 780, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (777, 12, 121, 781, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (778, 12, 121, 782, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (779, 12, 121, 783, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (780, 12, 122, 784, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (781, 12, 122, 785, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (782, 12, 122, 786, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (783, 12, 123, 787, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (784, 12, 124, 788, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (785, 12, 124, 789, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (786, 12, 124, 790, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (787, 12, 125, 791, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (788, 12, 125, 792, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (789, 12, 125, 793, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (790, 12, 125, 794, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (791, 12, 125, 795, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (792, 12, 125, 796, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (793, 12, 125, 797, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (794, 12, 125, 798, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (795, 12, 125, 799, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (796, 12, 125, 800, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (797, 12, 125, 801, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (798, 12, 125, 802, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (799, 12, 125, 803, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (800, 12, 125, 804, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (801, 12, 125, 805, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (802, 12, 125, 806, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (803, 12, 126, 807, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (804, 12, 126, 808, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (805, 12, 127, 809, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (806, 12, 127, 810, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (807, 12, 127, 811, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (808, 12, 127, 812, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (809, 12, 127, 813, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (810, 12, 127, 814, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (811, 12, 128, 815, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (812, 12, 128, 816, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (813, 12, 128, 817, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (814, 12, 129, 818, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (815, 12, 130, 819, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (816, 12, 130, 820, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (817, 12, 130, 821, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (818, 12, 130, 822, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (819, 12, 130, 823, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (820, 12, 131, 824, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (821, 12, 132, 825, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (822, 12, 133, 826, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (823, 13, 134, 827, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (824, 13, 134, 828, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (825, 13, 134, 829, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (826, 13, 134, 830, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (827, 13, 134, 831, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (828, 13, 134, 832, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (829, 13, 134, 833, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (830, 13, 134, 834, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (831, 13, 134, 835, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (832, 13, 134, 836, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (833, 13, 134, 837, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (834, 13, 134, 838, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (835, 13, 134, 839, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (836, 13, 134, 840, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (837, 13, 134, 841, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (838, 13, 134, 842, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (839, 13, 134, 843, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (840, 13, 135, 844, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (841, 13, 135, 845, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (842, 13, 135, 846, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (843, 13, 136, 847, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (844, 13, 136, 848, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (845, 13, 136, 849, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (846, 13, 136, 850, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (847, 13, 136, 851, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (848, 13, 136, 852, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (849, 13, 136, 853, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (850, 13, 136, 854, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (851, 13, 136, 855, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (852, 13, 136, 856, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (853, 13, 137, 857, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (854, 13, 137, 858, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (855, 13, 137, 859, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (856, 13, 137, 860, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (857, 13, 137, 861, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (858, 13, 138, 862, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (859, 13, 138, 863, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (860, 13, 138, 864, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (861, 13, 139, 865, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (862, 13, 139, 866, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (863, 13, 139, 867, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (864, 13, 139, 868, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (865, 13, 139, 869, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (866, 13, 139, 870, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (867, 13, 139, 871, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (868, 13, 139, 872, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (869, 13, 139, 873, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (870, 13, 139, 874, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (871, 13, 139, 875, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (872, 13, 139, 876, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (873, 13, 139, 877, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (874, 13, 140, 878, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (875, 13, 141, 879, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (876, 13, 141, 880, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (877, 13, 141, 881, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (878, 13, 141, 882, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (879, 13, 141, 883, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (880, 13, 141, 884, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (881, 13, 141, 885, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (882, 13, 141, 886, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (883, 13, 142, 887, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (884, 13, 142, 888, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (885, 13, 142, 889, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (886, 13, 142, 890, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (887, 13, 142, 891, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (888, 13, 142, 892, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (889, 13, 142, 893, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (890, 13, 142, 894, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (891, 13, 143, 895, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (892, 13, 143, 896, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (893, 13, 143, 897, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (894, 13, 143, 898, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (895, 13, 143, 899, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (896, 13, 144, 900, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (897, 13, 144, 901, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (898, 13, 144, 902, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (899, 13, 145, 903, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (900, 13, 146, 904, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (901, 13, 146, 905, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (902, 13, 146, 906, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (903, 13, 146, 907, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (904, 13, 146, 908, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (905, 13, 146, 909, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (906, 13, 146, 910, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (907, 13, 146, 911, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (908, 13, 147, 912, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (909, 13, 147, 913, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (910, 13, 147, 914, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (911, 13, 147, 915, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (912, 13, 147, 916, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (913, 13, 147, 917, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (914, 13, 147, 918, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (915, 13, 147, 919, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (916, 13, 147, 920, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (917, 13, 147, 921, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (918, 13, 147, 922, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (919, 13, 148, 923, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (920, 13, 148, 924, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (921, 13, 148, 925, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (922, 13, 149, 926, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (923, 13, 149, 927, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (924, 13, 149, 928, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (925, 13, 149, 929, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (926, 13, 150, 930, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (927, 13, 150, 931, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (928, 13, 150, 932, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (929, 13, 150, 933, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (930, 13, 151, 934, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (931, 13, 152, 935, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (932, 13, 152, 936, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (933, 13, 152, 937, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (934, 13, 153, 938, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (935, 13, 154, 939, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (936, 13, 155, 940, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (937, 13, 155, 941, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (938, 14, 156, 942, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (939, 14, 156, 943, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (940, 14, 156, 944, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (941, 14, 156, 945, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (942, 14, 156, 946, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (943, 14, 156, 947, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (944, 14, 156, 948, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (945, 14, 156, 949, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (946, 14, 156, 950, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (947, 14, 156, 951, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (948, 14, 156, 952, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (949, 14, 156, 953, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (950, 14, 156, 954, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (951, 14, 156, 955, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (952, 14, 156, 956, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (953, 14, 157, 957, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (954, 14, 157, 958, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (955, 14, 157, 959, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (956, 14, 157, 960, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (957, 14, 157, 961, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (958, 14, 157, 962, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (959, 14, 157, 963, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (960, 14, 157, 964, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (961, 14, 157, 965, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (962, 14, 157, 966, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (963, 14, 157, 967, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (964, 14, 158, 968, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (965, 14, 158, 969, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (966, 14, 158, 970, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (967, 14, 158, 971, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (968, 14, 158, 972, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (969, 14, 158, 973, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (970, 14, 158, 974, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (971, 14, 158, 975, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (972, 14, 158, 976, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (973, 14, 159, 977, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (974, 14, 159, 978, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (975, 14, 159, 979, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (976, 14, 159, 980, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (977, 14, 159, 981, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (978, 14, 160, 982, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (979, 14, 160, 983, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (980, 14, 160, 984, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (981, 14, 160, 985, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (982, 14, 160, 986, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (983, 14, 160, 987, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (984, 14, 160, 988, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (985, 14, 160, 989, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (986, 14, 161, 990, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (987, 14, 161, 991, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (988, 14, 161, 992, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (989, 14, 161, 993, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (990, 14, 161, 994, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (991, 14, 161, 995, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (992, 14, 162, 996, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (993, 14, 162, 997, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (994, 14, 162, 998, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (995, 14, 163, 999, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (996, 14, 163, 1000, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (997, 14, 163, 1001, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (998, 14, 163, 1002, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (999, 14, 163, 1003, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1000, 14, 164, 1004, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1001, 14, 164, 1005, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1002, 14, 164, 1006, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1003, 14, 164, 1007, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1004, 14, 164, 1008, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1005, 14, 165, 1009, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1006, 14, 165, 1010, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1007, 14, 165, 1011, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1008, 14, 166, 1012, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1009, 14, 167, 1013, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1010, 14, 167, 1014, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1011, 15, 168, 1015, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1012, 15, 168, 1016, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1013, 15, 168, 1017, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1014, 15, 168, 1018, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1015, 15, 168, 1019, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1016, 15, 168, 1020, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1017, 15, 168, 1021, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1018, 15, 168, 1022, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1019, 15, 168, 1023, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1020, 15, 169, 1024, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1021, 15, 169, 1025, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1022, 15, 169, 1026, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1023, 15, 169, 1027, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1024, 15, 169, 1028, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1025, 15, 169, 1029, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1026, 15, 170, 1030, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1027, 15, 170, 1031, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1028, 15, 170, 1032, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1029, 15, 170, 1033, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1030, 15, 170, 1034, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1031, 15, 170, 1035, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1032, 15, 171, 1036, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1033, 15, 171, 1037, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1034, 15, 171, 1038, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1035, 15, 171, 1039, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1036, 15, 171, 1040, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1037, 15, 171, 1041, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1038, 15, 171, 1042, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1039, 15, 172, 1043, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1040, 16, 173, 1044, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1041, 16, 173, 1045, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1042, 16, 173, 1046, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1043, 16, 173, 1047, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1044, 16, 173, 1048, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1045, 16, 173, 1049, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1046, 16, 173, 1050, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1047, 16, 173, 1051, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1048, 16, 173, 1052, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1049, 16, 173, 1053, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1050, 16, 173, 1054, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1051, 16, 173, 1055, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1052, 16, 173, 1056, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1053, 16, 173, 1057, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1054, 16, 173, 1058, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1055, 16, 173, 1059, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1056, 16, 173, 1060, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1057, 16, 174, 1061, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1058, 16, 174, 1062, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1059, 16, 174, 1063, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1060, 16, 175, 1064, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1061, 16, 175, 1065, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1062, 16, 176, 1066, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1063, 16, 176, 1067, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1064, 17, 177, 1068, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1065, 17, 177, 1069, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1066, 17, 177, 1070, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1067, 17, 177, 1071, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1068, 17, 177, 1072, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1069, 17, 177, 1073, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1070, 17, 177, 1074, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1071, 17, 177, 1075, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1072, 17, 177, 1076, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1073, 17, 177, 1077, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1074, 17, 177, 1078, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1075, 17, 177, 1079, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1076, 17, 177, 1080, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1077, 17, 177, 1081, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1078, 17, 177, 1082, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1079, 17, 177, 1083, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1080, 17, 177, 1084, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1081, 17, 177, 1085, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1082, 17, 177, 1086, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1083, 17, 177, 1087, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1084, 17, 177, 1088, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1085, 17, 177, 1089, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1086, 17, 177, 1090, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1087, 17, 177, 1091, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1088, 17, 177, 1092, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1089, 17, 177, 1093, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1090, 17, 177, 1094, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1091, 17, 177, 1095, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1092, 17, 177, 1096, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1093, 17, 177, 1097, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1094, 17, 177, 1098, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1095, 17, 177, 1099, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1096, 17, 177, 1100, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1097, 17, 177, 1101, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1098, 17, 177, 1102, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1099, 17, 177, 1103, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1100, 17, 177, 1104, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1101, 17, 177, 1105, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1102, 17, 177, 1106, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1103, 17, 177, 1107, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1104, 17, 177, 1108, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1105, 17, 177, 1109, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1106, 17, 177, 1110, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1107, 17, 177, 1111, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1108, 17, 177, 1112, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1109, 17, 177, 1113, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1110, 17, 177, 1114, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1111, 17, 177, 1115, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1112, 17, 177, 1116, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1113, 17, 177, 1117, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1114, 17, 177, 1118, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1115, 17, 177, 1119, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1116, 17, 177, 1120, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1117, 17, 177, 1121, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1118, 17, 177, 1122, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1119, 17, 177, 1123, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1120, 17, 177, 1124, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1121, 17, 177, 1125, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1122, 17, 177, 1126, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1123, 17, 177, 1127, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1124, 17, 177, 1128, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1125, 17, 177, 1129, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1126, 17, 177, 1130, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1127, 17, 177, 1131, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1128, 17, 177, 1132, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1129, 17, 177, 1133, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1130, 17, 177, 1134, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1131, 17, 177, 1135, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1132, 17, 177, 1136, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1133, 17, 177, 1137, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1134, 17, 178, 1138, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1135, 17, 178, 1139, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1136, 17, 178, 1140, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1137, 17, 178, 1141, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1138, 17, 178, 1142, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1139, 17, 178, 1143, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1140, 17, 178, 1144, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1141, 17, 178, 1145, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1142, 17, 178, 1146, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1143, 17, 179, 1147, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1144, 17, 179, 1148, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1145, 17, 179, 1149, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1146, 17, 179, 1150, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1147, 17, 179, 1151, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1148, 17, 179, 1152, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1149, 17, 179, 1153, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1150, 17, 179, 1154, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1151, 17, 180, 1155, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1152, 17, 180, 1156, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1153, 17, 180, 1157, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1154, 17, 180, 1158, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1155, 17, 180, 1159, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1156, 17, 181, 1160, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1157, 17, 181, 1161, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1158, 17, 181, 1162, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1159, 17, 181, 1163, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1160, 17, 181, 1164, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1161, 17, 181, 1165, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1162, 17, 182, 1166, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1163, 17, 182, 1167, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1164, 17, 182, 1168, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1165, 17, 182, 1169, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1166, 17, 183, 1170, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1167, 17, 184, 1171, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1168, 18, 185, 1172, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1169, 18, 185, 1173, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1170, 18, 185, 1174, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1171, 18, 185, 1175, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1172, 18, 185, 1176, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1173, 18, 185, 1177, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1174, 18, 185, 1178, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1175, 18, 185, 1179, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1176, 18, 185, 1180, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1177, 18, 185, 1181, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1178, 18, 185, 1182, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1179, 18, 185, 1183, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1180, 18, 185, 1184, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1181, 18, 185, 1185, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1182, 18, 185, 1186, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1183, 18, 185, 1187, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1184, 18, 185, 1188, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1185, 18, 185, 1189, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1186, 18, 185, 1190, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1187, 18, 185, 1191, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1188, 18, 185, 1192, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1189, 18, 185, 1193, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1190, 18, 185, 1194, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1191, 18, 185, 1195, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1192, 18, 185, 1196, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1193, 18, 185, 1197, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1194, 18, 185, 1198, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1195, 18, 185, 1199, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1196, 18, 186, 1200, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1197, 18, 186, 1201, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1198, 18, 186, 1202, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1199, 18, 186, 1203, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1200, 18, 186, 1204, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1201, 18, 187, 1205, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1202, 18, 188, 1206, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1203, 18, 188, 1207, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1204, 18, 189, 1208, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1205, 18, 189, 1209, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1206, 18, 189, 1210, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1207, 18, 189, 1211, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1208, 18, 190, 1212, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1209, 18, 190, 1213, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1210, 18, 190, 1214, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1211, 18, 191, 1215, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1212, 18, 191, 1216, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1213, 18, 191, 1217, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1214, 18, 191, 1218, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1215, 18, 191, 1219, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1216, 18, 191, 1220, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1217, 18, 191, 1221, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1218, 18, 191, 1222, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1219, 18, 191, 1223, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1220, 18, 191, 1224, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1221, 18, 191, 1225, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1222, 18, 192, 1226, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1223, 18, 192, 1227, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1224, 18, 192, 1228, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1225, 18, 192, 1229, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1226, 18, 192, 1230, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1227, 18, 192, 1231, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1228, 18, 192, 1232, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1229, 18, 192, 1233, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1230, 18, 192, 1234, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1231, 18, 192, 1235, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1232, 18, 193, 1236, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1233, 18, 193, 1237, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1234, 19, 194, 1238, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1235, 19, 194, 1239, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1236, 19, 194, 1240, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1237, 19, 194, 1241, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1238, 19, 194, 1242, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1239, 19, 194, 1243, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1240, 19, 194, 1244, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1241, 19, 194, 1245, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1242, 19, 194, 1246, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1243, 19, 194, 1247, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1244, 19, 194, 1248, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1245, 19, 195, 1249, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1246, 19, 195, 1250, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1247, 19, 195, 1251, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1248, 19, 195, 1252, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1249, 19, 195, 1253, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1250, 19, 195, 1254, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1251, 19, 195, 1255, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1252, 19, 195, 1256, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1253, 19, 195, 1257, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1254, 19, 195, 1258, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1255, 19, 196, 1259, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1256, 19, 196, 1260, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1257, 19, 196, 1261, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1258, 19, 197, 1262, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1259, 19, 197, 1263, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1260, 19, 197, 1264, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1261, 19, 198, 1265, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1262, 19, 198, 1266, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1263, 19, 198, 1267, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1264, 19, 198, 1268, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1265, 19, 199, 1269, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1266, 19, 199, 1270, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1267, 19, 199, 1271, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1268, 19, 199, 1272, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1269, 19, 200, 1273, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1270, 19, 200, 1274, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1271, 19, 200, 1275, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1272, 19, 200, 1276, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1273, 19, 201, 1277, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1274, 19, 201, 1278, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1275, 19, 201, 1279, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1276, 19, 201, 1280, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1277, 19, 201, 1281, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1278, 19, 202, 1282, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1279, 19, 202, 1283, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1280, 19, 202, 1284, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1281, 20, 203, 1285, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1282, 20, 203, 1286, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1283, 20, 203, 1287, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1284, 20, 204, 1288, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1285, 20, 204, 1289, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1286, 20, 205, 1290, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1287, 20, 205, 1291, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1288, 20, 205, 1292, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1289, 21, 206, 1293, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1290, 21, 206, 1294, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1291, 21, 206, 1295, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1292, 21, 206, 1296, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1293, 21, 206, 1297, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1294, 21, 206, 1298, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1295, 21, 206, 1299, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1296, 21, 206, 1300, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1297, 21, 206, 1301, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1298, 21, 206, 1302, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1299, 21, 207, 1303, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1300, 21, 207, 1304, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1301, 21, 207, 1305, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1302, 21, 207, 1306, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1303, 21, 207, 1307, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1304, 21, 207, 1308, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1305, 21, 208, 1309, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1306, 21, 208, 1310, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1307, 21, 208, 1311, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1308, 21, 208, 1312, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1309, 21, 208, 1313, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1310, 21, 209, 1314, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1311, 21, 209, 1315, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1312, 21, 209, 1316, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1313, 21, 209, 1317, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1314, 21, 209, 1318, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1315, 21, 209, 1319, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1316, 21, 210, 1320, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1317, 21, 210, 1321, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1318, 21, 210, 1322, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1319, 21, 210, 1323, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1320, 21, 210, 1324, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1321, 21, 211, 1325, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1322, 21, 211, 1326, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1323, 21, 211, 1327, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1324, 21, 212, 1328, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1325, 21, 212, 1329, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1326, 21, 212, 1330, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1327, 22, 213, 1331, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1328, 22, 213, 1332, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1329, 22, 213, 1333, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1330, 22, 213, 1334, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1331, 22, 213, 1335, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1332, 22, 213, 1336, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1333, 22, 213, 1337, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1334, 22, 213, 1338, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1335, 22, 213, 1339, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1336, 22, 213, 1340, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1337, 22, 213, 1341, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1338, 22, 213, 1342, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1339, 22, 214, 1343, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1340, 22, 214, 1344, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1341, 22, 214, 1345, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1342, 22, 214, 1346, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1343, 22, 214, 1347, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1344, 22, 214, 1348, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1345, 22, 214, 1349, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1346, 22, 215, 1350, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1347, 22, 215, 1351, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1348, 22, 215, 1352, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1349, 22, 215, 1353, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1350, 22, 215, 1354, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1351, 22, 215, 1355, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1352, 22, 215, 1356, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1353, 22, 215, 1357, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1354, 22, 215, 1358, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1355, 22, 216, 1359, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1356, 22, 216, 1360, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1357, 22, 216, 1361, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1358, 22, 216, 1362, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1359, 22, 216, 1363, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1360, 22, 216, 1364, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1361, 23, 217, 1365, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1362, 23, 217, 1366, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1363, 23, 217, 1367, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1364, 23, 217, 1368, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1365, 23, 217, 1369, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1366, 23, 217, 1370, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1367, 23, 217, 1371, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1368, 23, 217, 1372, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1369, 23, 217, 1373, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1370, 23, 217, 1374, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1371, 23, 217, 1375, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1372, 23, 217, 1376, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1373, 23, 217, 1377, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1374, 23, 217, 1378, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1375, 23, 217, 1379, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1376, 24, 219, 1380, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1377, 24, 219, 1381, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1378, 24, 219, 1382, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1379, 24, 219, 1383, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1380, 24, 219, 1384, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1381, 24, 219, 1385, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1382, 24, 219, 1386, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1383, 24, 219, 1387, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1384, 24, 219, 1388, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1385, 24, 220, 1389, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1386, 24, 221, 1390, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1387, 24, 221, 1391, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1388, 24, 221, 1392, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1389, 24, 221, 1393, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1390, 24, 221, 1394, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1391, 24, 221, 1395, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1392, 24, 221, 1396, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1393, 25, 222, 1397, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1394, 25, 223, 1398, NULL, '2019-10-08 16:15:57', NULL);
INSERT INTO `provincias_cantones_parroquias` VALUES (1395, 25, 224, 1399, NULL, '2019-10-08 16:15:57', NULL);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_perfiles` int(11) NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_organizaciones` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `usuarios_fk_1`(`id_organizaciones`) USING BTREE,
  INDEX `usuarios_fk_2`(`id_perfiles`) USING BTREE,
  CONSTRAINT `usuarios_fk_1` FOREIGN KEY (`id_organizaciones`) REFERENCES `organizaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `usuarios_fk_2` FOREIGN KEY (`id_perfiles`) REFERENCES `perfiles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'oscar', 'antepara', 1, 'admin@gmail.com', 'sha1$4bbb8945$1$65bd3a7400af50457b154941dda4352215345683', NULL, 1, NULL, NULL, '2020-02-16 00:00:53');

SET FOREIGN_KEY_CHECKS = 1;
