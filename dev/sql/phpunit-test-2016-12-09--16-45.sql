/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : phpunit-test

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-09 16:45:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '余额',
  `money` decimal(15,3) DEFAULT '0.000',
  `point` decimal(15,3) DEFAULT '0.000' COMMENT '积分',
  `created` datetime DEFAULT NULL COMMENT '添加时间',
  `changed` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('253', '1', '12345.678', '3000.567', '2016-12-07 16:19:03', '2016-12-07 16:19:03');
INSERT INTO `account` VALUES ('254', '2', '0.000', '0.000', '2016-12-09 16:39:44', '2016-12-09 16:39:44');
INSERT INTO `account` VALUES ('173', '0', '0.000', '0.000', '2016-12-08 14:20:05', '2016-12-08 14:20:05');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '商品名',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '商品价格',
  `point` decimal(10,2) DEFAULT '0.00' COMMENT '购买积分',
  `type` tinyint(4) DEFAULT '0' COMMENT '商品类型,1虚拟商品,0普通商品',
  `quantity` int(11) DEFAULT '0' COMMENT '数量',
  `sale_quantity` int(11) DEFAULT '0' COMMENT '销售数量',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `changed` datetime DEFAULT NULL COMMENT '修改时间',
  `shop_id` int(11) DEFAULT '0' COMMENT '店铺id',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('38', '测试产品2016-12-08 17:05', '123.45', '456.78', '1', '20', '15', '2016-12-09 16:39:44', '2016-12-09 16:39:44', '0');
