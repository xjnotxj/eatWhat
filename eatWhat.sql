/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : eatWhat

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 03/08/2017 16:21:18 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `drink`
-- ----------------------------
DROP TABLE IF EXISTS `drink`;
CREATE TABLE `drink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '日期',
  `number` int(10) NOT NULL COMMENT '次数',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `month_unique` (`month`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL COMMENT '日期',
  `number` int(10) NOT NULL COMMENT '次数',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_unique` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
