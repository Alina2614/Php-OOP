/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lindisfarnedb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-31 20:23:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `animals`
-- ----------------------------
DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_name` varchar(255) NOT NULL,
  `animal_age` varchar(255) NOT NULL,
  `animal_photo_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of animals
-- ----------------------------
INSERT INTO `animals` VALUES ('27', 'Kitten', '1', '12', 'Adorable kitten');

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_type` varchar(255) NOT NULL,
  `booling_time` varchar(255) NOT NULL,
  `booking_cost` varchar(255) NOT NULL,
  `booked_by` varchar(255) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('0', 'Adults', '12:00', '', 'u1@b.c');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('12', '27', './resources/images/27/1501444606.jpg');

-- ----------------------------
-- Table structure for `ticket_types`
-- ----------------------------
DROP TABLE IF EXISTS `ticket_types`;
CREATE TABLE `ticket_types` (
  `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_type_name` varchar(255) NOT NULL,
  `ticket_price` varchar(255) NOT NULL,
  `on_discount` varchar(255) NOT NULL,
  `discount_amount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`ticket_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ticket_types
-- ----------------------------
INSERT INTO `ticket_types` VALUES ('1', 'Adults', '12.23', 'on', '10', 'Adult tickets');
INSERT INTO `ticket_types` VALUES ('2', 'Children', '7.20', '0', '0', 'Tickets for children');
INSERT INTO `ticket_types` VALUES ('3', 'Old Age Pensioners', '10.52', '0', '0', 'Tickets for Old people');
INSERT INTO `ticket_types` VALUES ('4', 'VIP', '15', '0', '0', 'VIP Tickets');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Customer',
  `postal_address` varchar(255) NOT NULL,
  `postcode` int(11) NOT NULL,
  `gender` char(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', '0', '', '0', '', 'a@b.c', '123');
INSERT INTO `users` VALUES ('2', 'User', '1', '', '0', '', 'u1@b.c', 'u123');
