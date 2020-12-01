/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : mytodo

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 01/12/2020 10:22:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_todos
-- ----------------------------
DROP TABLE IF EXISTS `t_todos`;
CREATE TABLE `t_todos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `completed` tinyint DEFAULT NULL,
  `create_time` int DEFAULT NULL,
  `completed_time` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_todos
-- ----------------------------
BEGIN;
INSERT INTO `t_todos` VALUES (1, 1, 'go to store', 0, 1606458581, 0);
INSERT INTO `t_todos` VALUES (2, 2, '去吃饭', 0, 1606447559, 0);
INSERT INTO `t_todos` VALUES (4, 1, 'Hello World', 0, 1606455875, 0);
INSERT INTO `t_todos` VALUES (5, 1, '写完MyTodo', 0, 1606457769, 0);
INSERT INTO `t_todos` VALUES (6, 1, '学会Vue', 0, 1606458393, 0);
INSERT INTO `t_todos` VALUES (7, 1, 'Web Json Token', 0, 1606469278, 0);
INSERT INTO `t_todos` VALUES (8, 1, 'Demo', 0, 1606549204, 0);
INSERT INTO `t_todos` VALUES (9, 1, 'demo', 0, 1606549229, 0);
INSERT INTO `t_todos` VALUES (10, 1, 'aaa', 0, 1606549235, 0);
INSERT INTO `t_todos` VALUES (11, 1, 'aa', 0, 1606618675, 0);
INSERT INTO `t_todos` VALUES (12, 1, 'dsfsd', 0, 1606618703, 0);
INSERT INTO `t_todos` VALUES (13, 1, 'dfgdf', 0, 1606618723, 0);
INSERT INTO `t_todos` VALUES (14, 1, '士大夫是对的', 0, 1606618870, 0);
INSERT INTO `t_todos` VALUES (15, 1, 'sss', 0, 1606618910, 0);
INSERT INTO `t_todos` VALUES (16, 1, 'aaaa', 0, 1606618930, 0);
INSERT INTO `t_todos` VALUES (17, 1, 'aa', 0, 1606618955, 0);
INSERT INTO `t_todos` VALUES (18, 1, '你好', 1, 1606619054, 1606736627);
INSERT INTO `t_todos` VALUES (19, 1, '啊啊', 0, 1606619086, 0);
INSERT INTO `t_todos` VALUES (20, 1, 'nmsl', 0, 1606619099, 0);
INSERT INTO `t_todos` VALUES (21, 1, 'Test', 0, 1606620688, 0);
INSERT INTO `t_todos` VALUES (22, 1, '干饭', 0, 1606653607, 0);
INSERT INTO `t_todos` VALUES (23, 1, 'aaa', 0, 1606736609, 0);
COMMIT;

-- ----------------------------
-- Table structure for t_users
-- ----------------------------
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE `t_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(50) NOT NULL,
  `create_time` int NOT NULL,
  `update_time` int NOT NULL,
  `delete_time` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_users
-- ----------------------------
BEGIN;
INSERT INTO `t_users` VALUES (1, 'admin', 'admin', 1, 1, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
