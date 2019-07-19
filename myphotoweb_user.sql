/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50562
Source Host           : 127.0.0.1:3306
Source Database       : test1

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2019-07-18 19:50:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for myphotoweb_user
-- ----------------------------
DROP TABLE IF EXISTS `myphotoweb_user`;
CREATE TABLE `myphotoweb_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myphotoweb_user
-- ----------------------------
INSERT INTO `myphotoweb_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
