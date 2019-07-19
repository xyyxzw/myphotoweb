/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50562
Source Host           : 127.0.0.1:3306
Source Database       : test1

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2019-07-18 19:51:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for myphotoweb_photos
-- ----------------------------
DROP TABLE IF EXISTS `myphotoweb_photos`;
CREATE TABLE `myphotoweb_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL COMMENT '照片标题',
  `imgsrc` varchar(100) DEFAULT NULL COMMENT '图像路径',
  `intro` text COMMENT '照片简介',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '访问量',
  `addate` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myphotoweb_photos
-- ----------------------------
