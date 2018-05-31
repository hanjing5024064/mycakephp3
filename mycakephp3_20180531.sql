/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80011
 Source Host           : 127.0.0.1
 Source Database       : mycakephp3

 Target Server Type    : MySQL
 Target Server Version : 80011
 File Encoding         : utf-8

 Date: 05/31/2018 23:16:31 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `actions`
-- ----------------------------
BEGIN;
INSERT INTO `actions` VALUES ('1', 'Actions-index', 'Actions', 'index', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('2', 'Actions-add', 'Actions', 'add', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('3', 'Actions-edit', 'Actions', 'edit', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('4', 'Actions-view', 'Actions', 'view', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('5', 'Actions-delete', 'Actions', 'delete', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('6', 'Roles-index', 'Roles', 'index', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('7', 'Roles-add', 'Roles', 'add', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('8', 'Roles-edit', 'Roles', 'edit', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('9', 'Roles-view', 'Roles', 'view', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('10', 'Roles-delete', 'Roles', 'delete', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('11', 'RolesActions-index', 'RolesActions', 'index', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('12', 'RolesActions-add', 'RolesActions', 'add', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('13', 'RolesActions-edit', 'RolesActions', 'edit', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('14', 'RolesActions-view', 'RolesActions', 'view', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('15', 'RolesActions-delete', 'RolesActions', 'delete', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('16', 'SysMenus-index', 'SysMenus', 'index', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('17', 'SysMenus-add', 'SysMenus', 'add', '2018-05-31 22:28:26', '2018-05-31 22:28:26'), ('18', 'SysMenus-edit', 'SysMenus', 'edit', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('19', 'SysMenus-view', 'SysMenus', 'view', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('20', 'SysMenus-delete', 'SysMenus', 'delete', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('21', 'UserWechatOpenids-index', 'UserWechatOpenids', 'index', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('22', 'UserWechatOpenids-add', 'UserWechatOpenids', 'add', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('23', 'UserWechatOpenids-edit', 'UserWechatOpenids', 'edit', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('24', 'UserWechatOpenids-view', 'UserWechatOpenids', 'view', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('25', 'UserWechatOpenids-delete', 'UserWechatOpenids', 'delete', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('26', 'UserWechats-index', 'UserWechats', 'index', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('27', 'UserWechats-add', 'UserWechats', 'add', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('28', 'UserWechats-edit', 'UserWechats', 'edit', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('29', 'UserWechats-view', 'UserWechats', 'view', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('30', 'UserWechats-delete', 'UserWechats', 'delete', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('31', 'Users-index', 'Users', 'index', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('32', 'Users-add', 'Users', 'add', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('33', 'Users-edit', 'Users', 'edit', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('34', 'Users-view', 'Users', 'view', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('35', 'Users-delete', 'Users', 'delete', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('36', 'UsersRoles-index', 'UsersRoles', 'index', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('37', 'UsersRoles-add', 'UsersRoles', 'add', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('38', 'UsersRoles-edit', 'UsersRoles', 'edit', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('39', 'UsersRoles-view', 'UsersRoles', 'view', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('40', 'UsersRoles-delete', 'UsersRoles', 'delete', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('41', 'WechatGzhs-index', 'WechatGzhs', 'index', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('42', 'WechatGzhs-add', 'WechatGzhs', 'add', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('43', 'WechatGzhs-edit', 'WechatGzhs', 'edit', '2018-05-31 22:28:27', '2018-05-31 22:28:27'), ('44', 'WechatGzhs-view', 'WechatGzhs', 'view', '2018-05-31 22:28:28', '2018-05-31 22:28:28'), ('45', 'WechatGzhs-delete', 'WechatGzhs', 'delete', '2018-05-31 22:28:28', '2018-05-31 22:28:28');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', '管理员', '2017-03-07 12:16:44', '2018-05-31 22:29:17');
COMMIT;

-- ----------------------------
--  Table structure for `roles_actions`
-- ----------------------------
DROP TABLE IF EXISTS `roles_actions`;
CREATE TABLE `roles_actions` (
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `roles_actions`
-- ----------------------------
BEGIN;
INSERT INTO `roles_actions` VALUES ('1', '1'), ('1', '2'), ('1', '3'), ('1', '4'), ('1', '5'), ('1', '6'), ('1', '7'), ('1', '8'), ('1', '9'), ('1', '10'), ('1', '11'), ('1', '12'), ('1', '13'), ('1', '14'), ('1', '15'), ('1', '16'), ('1', '17'), ('1', '18'), ('1', '19'), ('1', '20'), ('1', '21'), ('1', '22'), ('1', '23'), ('1', '24'), ('1', '25'), ('1', '26'), ('1', '27'), ('1', '28'), ('1', '29'), ('1', '30'), ('1', '31'), ('1', '32'), ('1', '33'), ('1', '34'), ('1', '35'), ('1', '36'), ('1', '37'), ('1', '38'), ('1', '39'), ('1', '40'), ('1', '41'), ('1', '42'), ('1', '43'), ('1', '44'), ('1', '45');
COMMIT;

-- ----------------------------
--  Table structure for `sys_menus`
-- ----------------------------
DROP TABLE IF EXISTS `sys_menus`;
CREATE TABLE `sys_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `menuorder` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `sys_menus`
-- ----------------------------
BEGIN;
INSERT INTO `sys_menus` VALUES ('1', '微信相关', null, '1', '6', 'ooo', '', '10', null, '2018-05-31 23:05:26', '2018-05-31 23:05:26'), ('2', '公众号管理', '1', '2', '3', 'WechatGzhs', 'index', '10', '', '2018-05-31 23:05:55', '2018-05-31 23:05:55'), ('3', '微信关注用户', '1', '4', '5', 'UserWechats', 'index', '20', '', '2018-05-31 23:07:47', '2018-05-31 23:07:47');
COMMIT;

-- ----------------------------
--  Table structure for `user_wechat_openids`
-- ----------------------------
DROP TABLE IF EXISTS `user_wechat_openids`;
CREATE TABLE `user_wechat_openids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_wechat_id` int(11) DEFAULT NULL,
  `wechat_gzh_id` int(11) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `user_wechats`
-- ----------------------------
DROP TABLE IF EXISTS `user_wechats`;
CREATE TABLE `user_wechats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `headimgurl` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `head_img` int(11) DEFAULT NULL,
  `from_where` varchar(255) DEFAULT NULL,
  `if_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'super_admin', '$2y$10$V7JQlYfWTeVrGgqmgF240uhn3ntHsHDu.Zzps.AX.naPGh90w7rgy', null, '', '1', '2017-08-23 14:10:24', '2018-05-31 19:08:24');
COMMIT;

-- ----------------------------
--  Table structure for `users_roles`
-- ----------------------------
DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users_roles`
-- ----------------------------
BEGIN;
INSERT INTO `users_roles` VALUES ('1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `wechat_gzhs`
-- ----------------------------
DROP TABLE IF EXISTS `wechat_gzhs`;
CREATE TABLE `wechat_gzhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `appid` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `oauth_scopes` varchar(255) DEFAULT NULL,
  `oauth_callback` varchar(255) DEFAULT NULL,
  `payment` text,
  `menu` text,
  `template` text,
  `subscribemsg` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
