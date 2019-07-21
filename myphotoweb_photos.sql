/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50562
Source Host           : localhost:3306
Source Database       : test1

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2019-07-21 16:37:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for myphotoweb_photos
-- ----------------------------
DROP TABLE IF EXISTS `myphotoweb_photos`;
CREATE TABLE `myphotoweb_photos` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `title` varchar(20) DEFAULT NULL COMMENT '照片标题',
  `imgsrc` varchar(100) DEFAULT NULL COMMENT '图像路径',
  `intro` text COMMENT '照片简介',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '访问量',
  `addate` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myphotoweb_photos
-- ----------------------------
INSERT INTO `myphotoweb_photos` VALUES ('1', '1', 'ces', '../images/5d34114d6f70d.jpg', '123', '9', '1563693389');
INSERT INTO `myphotoweb_photos` VALUES ('2', '2', 'admin2d', '../images/5d3413166b639.jpg', '这是admin2上穿的', '1', '1563693846');
INSERT INTO `myphotoweb_photos` VALUES ('3', '1', 'admin再上穿', '../images/5d3414d29bac1.jpg', '再上传', '3', '1563694290');
INSERT INTO `myphotoweb_photos` VALUES ('4', '1', '3次上传', '../images/5d3415510974f.jpg', '56789', '8', '1563694417');
INSERT INTO `myphotoweb_photos` VALUES ('5', '1', '1234567', '../images/5d34157f421b4.png', '6789', '4', '1563694463');
