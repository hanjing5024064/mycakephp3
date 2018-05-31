/*
 Navicat Premium Data Transfer

 Source Server         : HW_WC_182.254.223.160
 Source Server Type    : MySQL
 Source Server Version : 50550
 Source Host           : 182.254.223.160
 Source Database       : mycakephp3

 Target Server Type    : MySQL
 Target Server Version : 50550
 File Encoding         : utf-8

 Date: 10/30/2017 15:23:35 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `actions`
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `actions`
-- ----------------------------
BEGIN;
INSERT INTO `actions` VALUES ('1', '用户列表', 'Users', 'index', '2017-03-08 01:35:50', '2017-03-08 01:35:50'), ('2', '添加用户', 'Users', 'add', '2017-03-08 01:36:09', '2017-03-08 01:36:09'), ('3', '编辑用户', 'Users', 'edit', '2017-03-08 01:36:26', '2017-03-08 01:36:26'), ('4', '删除用户', 'Users', 'delete', '2017-03-08 01:36:40', '2017-03-08 01:36:40');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', '管理员', '2017-03-07 12:16:44', '2017-03-08 01:38:24'), ('2', '用户监督员', '2017-03-08 01:38:08', '2017-03-08 01:38:08');
COMMIT;

-- ----------------------------
--  Table structure for `roles_actions`
-- ----------------------------
DROP TABLE IF EXISTS `roles_actions`;
CREATE TABLE `roles_actions` (
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `roles_actions`
-- ----------------------------
BEGIN;
INSERT INTO `roles_actions` VALUES ('1', '2'), ('1', '3'), ('2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `sys_menus`
-- ----------------------------
DROP TABLE IF EXISTS `sys_menus`;
CREATE TABLE `sys_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `menuorder` varchar(10) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'zj', '$2y$10$aW5mMKF.pm/NWasVkpMCeug0/0pK/1eXcsEkOxmiRr/7U0EuIl9Py', '2017-03-07 12:34:29', '2017-03-08 01:38:39'), ('2', 'zjt', '$2y$10$Tm5euupjd90IU.scEoWe9e0V8EyaFXojYtDJEaa8UPHBLbfP/YfD2', '2017-03-08 01:05:03', '2017-03-08 01:05:03');
COMMIT;

-- ----------------------------
--  Table structure for `users_roles`
-- ----------------------------
DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users_roles`
-- ----------------------------
BEGIN;
INSERT INTO `users_roles` VALUES ('1', '1'), ('1', '2'), ('2', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
