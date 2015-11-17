/*
Navicat MySQL Data Transfer

Source Server         : start
Source Server Version : 50041
Source Host           : localhost:3306
Source Database       : news

Target Server Type    : MYSQL
Target Server Version : 50041
File Encoding         : 65001

Date: 2015-11-17 21:28:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admininfo`
-- ----------------------------
DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE `admininfo` (
  `a_id` int(11) NOT NULL auto_increment,
  `a_loginname` varchar(50) NOT NULL,
  `a_password` varchar(100) default NULL,
  `a_name` varchar(50) NOT NULL,
  `a_permission` varchar(200) NOT NULL,
  `a_addtime` varchar(50) NOT NULL,
  `a_loginip` varchar(100) default NULL,
  `a_logintime` varchar(50) default NULL,
  `a_passcode` varchar(100) default NULL,
  PRIMARY KEY  (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admininfo
-- ----------------------------
INSERT INTO `admininfo` VALUES ('2', 'start', 'd7af994f1f1ef8b5e3beb9f7fb139f57', '群群', 'superadmin', '1447558243', null, null, null);
INSERT INTO `admininfo` VALUES ('3', 'test', 'd7af994f1f1ef8b5e3beb9f7fb139f57', 'test', 'category', '1447578036', null, null, null);

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `c_id` int(11) NOT NULL auto_increment,
  `c_cid` int(11) default '0',
  `c_name` varchar(200) default NULL,
  `c_addtime` varchar(50) default NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '0', 'testwesdfs', null);
INSERT INTO `category` VALUES ('10', '0', 'world', '1447252384');
INSERT INTO `category` VALUES ('12', '0', 'hello', '1447335528');

-- ----------------------------
-- Table structure for `newsinfo`
-- ----------------------------
DROP TABLE IF EXISTS `newsinfo`;
CREATE TABLE `newsinfo` (
  `n_id` int(11) NOT NULL auto_increment,
  `n_cid` int(11) default NULL,
  `n_title` varchar(500) default NULL,
  `n_subtitle` varchar(200) default NULL,
  `n_content` text,
  `n_addtime` varchar(200) default NULL,
  `n_addadmin` varchar(200) default NULL,
  `n_edittime` varchar(200) default NULL,
  `n_editadmin` varchar(200) default NULL,
  PRIMARY KEY  (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newsinfo
-- ----------------------------
INSERT INTO `newsinfo` VALUES ('1', '12', '我和我最后的倔强', '我最后的倔强', '当我和世界不一样，那就让我不一样。', '1447591440', null, '1447598262', '群群');
INSERT INTO `newsinfo` VALUES ('2', '12', '很热要爆肝', '爆肝爆肝', null, '1447591548', '群群', null, null);
