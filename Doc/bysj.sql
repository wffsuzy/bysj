/*
Navicat MySQL Data Transfer

Source Server         : bysj
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : bysj

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-04-17 20:13:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_account
-- ----------------------------
DROP TABLE IF EXISTS `tp_account`;
CREATE TABLE `tp_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_account
-- ----------------------------

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_group_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '1', null);

-- ----------------------------
-- Table structure for tp_cash
-- ----------------------------
DROP TABLE IF EXISTS `tp_cash`;
CREATE TABLE `tp_cash` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(3,0) NOT NULL DEFAULT '0',
  `status` smallint(1) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_cash
-- ----------------------------

-- ----------------------------
-- Table structure for tp_menu
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_menu
-- ----------------------------
INSERT INTO `tp_menu` VALUES ('1', ' 顶级菜单', 'Admin/index/index', '0', null);
INSERT INTO `tp_menu` VALUES ('2', ' 用户管理', 'Home/User/index', '0', null);
INSERT INTO `tp_menu` VALUES ('3', '借贷管理', 'Home/Order/index', '0', null);
INSERT INTO `tp_menu` VALUES ('4', '资金管理', 'Home/Account/index', '0', null);
INSERT INTO `tp_menu` VALUES ('5', '模块管理', 'Home/Menu/index', '0', null);

-- ----------------------------
-- Table structure for tp_pay
-- ----------------------------
DROP TABLE IF EXISTS `tp_pay`;
CREATE TABLE `tp_pay` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT '0',
  `type` smallint(6) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_pay
-- ----------------------------

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pay_password` varchar(255) DEFAULT NULL,
  `truename` varchar(255) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1',
  `out_money` decimal(10,0) DEFAULT NULL COMMENT '待收金额',
  `bind_money` decimal(10,0) DEFAULT NULL,
  `balance` decimal(10,0) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `bank_card` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `is_check` smallint(1) DEFAULT NULL,
  `e-mail` varchar(20) DEFAULT NULL,
  `id_card` varchar(18) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `education` varchar(10) DEFAULT NULL COMMENT ' 学历',
  `credit_limit` decimal(10,0) DEFAULT NULL,
  `guarantee_amount` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'Hello', '4324', '5345345', '王大锤', '1', '1000', '3000', '3000', '423423423', '234324234234', '1460890681', '1', '497506902@qq.com', '320911199401162814', 'xxxxxxx', null, null, null, null);
