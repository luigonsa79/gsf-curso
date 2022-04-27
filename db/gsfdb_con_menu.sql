/*
 Navicat Premium Data Transfer

 Source Server         : 127.1.1.0
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : gsf-curso-menu

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 14/04/2022 14:13:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `nombre_cat` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_cat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'categoria 1');
INSERT INTO `categorias` VALUES (2, 'Categoria 2');

-- ----------------------------
-- Table structure for paginas
-- ----------------------------
DROP TABLE IF EXISTS `paginas`;
CREATE TABLE `paginas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NULL DEFAULT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `page` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '#',
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icono` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` int NOT NULL DEFAULT 1,
  `creado` datetime(0) NOT NULL,
  `actualizado` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pagina_subpagina`(`menu_id`) USING BTREE,
  CONSTRAINT `paginas_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `paginas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of paginas
-- ----------------------------
INSERT INTO `paginas` VALUES (1, NULL, 'Perfil', 'perfil', 'Informacion general del usuario', 'fa fa-cogs', 1, '2022-03-13 23:10:43', '2022-03-13 16:12:57');
INSERT INTO `paginas` VALUES (2, NULL, 'Dashboard', 'dashboard', 'Informacion general del sistema', 'fa fa-laptop', 1, '2022-03-13 23:10:43', '2022-03-13 16:12:57');
INSERT INTO `paginas` VALUES (3, NULL, 'Usuarios', 'usuarios', 'Administración de usuarios', 'fa fa-users', 1, '2022-03-13 23:10:43', '2022-03-13 16:12:57');
INSERT INTO `paginas` VALUES (4, NULL, 'Roles', 'roles', 'Informacion general de los roles de usuarios', 'fa fa-key', 1, '2022-03-13 23:10:43', '2022-03-13 16:12:57');
INSERT INTO `paginas` VALUES (5, NULL, 'Productos', '#', 'Informacion de todos los productos', 'fa fa-product-hunt', 1, '2022-03-13 23:10:43', '2022-03-13 16:12:57');
INSERT INTO `paginas` VALUES (6, NULL, 'Categorias', 'categorias', 'Informacion general de categorias', '', 1, '2022-03-13 23:10:43', '2022-03-13 16:12:57');
INSERT INTO `paginas` VALUES (7, 5, 'Lista', 'productos', 'Crear nuevo producto', 'fa fa-list', 1, '2022-04-12 02:38:42', '2022-04-11 18:39:13');

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `id_pagina` int NOT NULL,
  `c` int NOT NULL DEFAULT 0,
  `r` int NOT NULL DEFAULT 0,
  `u` int NOT NULL DEFAULT 0,
  `d` int NOT NULL DEFAULT 0,
  `creado` datetime(0) NOT NULL,
  `actualizado` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permisos_rol`(`id_rol`) USING BTREE,
  INDEX `permisos_pagina`(`id_pagina`) USING BTREE,
  INDEX `id_pagina`(`id_pagina`) USING BTREE,
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_pagina`) REFERENCES `paginas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (1, 1, 1, 1, 1, 1, 1, '2022-03-02 15:40:39', '2022-03-02 08:41:46');
INSERT INTO `permisos` VALUES (2, 1, 2, 1, 1, 1, 1, '2022-03-02 15:40:39', '2022-03-02 08:41:46');
INSERT INTO `permisos` VALUES (3, 1, 3, 1, 1, 1, 1, '2022-02-02 15:40:39', '2022-03-02 08:41:46');
INSERT INTO `permisos` VALUES (4, 1, 4, 1, 1, 1, 1, '2022-03-02 15:40:39', '2022-03-02 08:41:46');
INSERT INTO `permisos` VALUES (5, 1, 5, 1, 1, 1, 1, '2022-03-02 15:41:55', '2022-03-02 08:43:04');
INSERT INTO `permisos` VALUES (12, 3, 2, 1, 0, 1, 1, '2022-03-14 00:10:20', '2022-03-13 17:10:36');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id_pro` int NOT NULL AUTO_INCREMENT,
  `id_categoria_pro` int NOT NULL,
  `nombre_pro` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_pro`) USING BTREE,
  INDEX `rel_categoria_producto`(`id_categoria_pro`) USING BTREE,
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria_pro`) REFERENCES `categorias` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 1, 'Producto 1');
INSERT INTO `productos` VALUES (2, 1, 'Producto 2');
INSERT INTO `productos` VALUES (3, 2, 'Producto 3');
INSERT INTO `productos` VALUES (4, 2, 'Producto 4');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activo` int NOT NULL DEFAULT 1,
  `creado` datetime(0) NOT NULL,
  `actualizado` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'root', 1, '2022-03-13 23:04:23', '2022-03-13 16:05:17');
INSERT INTO `roles` VALUES (2, 'admin', 1, '2022-03-13 23:04:23', '2022-03-13 16:05:17');
INSERT INTO `roles` VALUES (3, 'editor', 1, '2022-03-13 23:04:23', '2022-03-13 16:05:17');
INSERT INTO `roles` VALUES (4, 'default', 1, '2022-03-13 23:04:23', '2022-03-13 16:05:17');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_activo` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `usuarios_roles`(`id_rol`) USING BTREE,
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 1, 'Luis Gonzalez', 'admin@admin.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1);
INSERT INTO `usuarios` VALUES (2, 4, 'Juan', 'vistante@visitante.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1);
INSERT INTO `usuarios` VALUES (3, 3, 'Fernando', 'editor@editor.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 1);
INSERT INTO `usuarios` VALUES (4, 4, 'Allan', 'luis@luis.com', 'ec7908dc8241f0e4340266990dfe6001b1757084d891c6758bfaac826750009a', 0);

SET FOREIGN_KEY_CHECKS = 1;
