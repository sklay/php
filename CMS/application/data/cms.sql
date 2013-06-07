/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50514
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50514
File Encoding         : 65001

Date: 2013-04-28 17:54:03
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `t_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE `t_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `create_at` datetime NOT NULL,
  `modify_at` datetime DEFAULT NULL,
  `title` varchar(240) DEFAULT NULL,
  `comment_type_id` bigint(20) DEFAULT NULL,
  `creator` bigint(20) DEFAULT NULL,
  `modifier` bigint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKF437E19456E05B74` (`comment_type_id`),
  KEY `FKF437E194FF56EC8E` (`creator`),
  KEY `FKF437E1949D586F39` (`modifier`),
  KEY `FKF437E194466D4F8A` (`parent_id`),
  CONSTRAINT `FKF437E194466D4F8A` FOREIGN KEY (`parent_id`) REFERENCES `t_comment` (`id`),
  CONSTRAINT `FKF437E19456E05B74` FOREIGN KEY (`comment_type_id`) REFERENCES `t_comment_type` (`id`),
  CONSTRAINT `FKF437E1949D586F39` FOREIGN KEY (`modifier`) REFERENCES `t_identity` (`id`),
  CONSTRAINT `FKF437E194FF56EC8E` FOREIGN KEY (`creator`) REFERENCES `t_identity` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_comment
-- ----------------------------
INSERT INTO `t_comment` VALUES ('1', '1', '2013-04-01 16:01:19', '2013-04-01 16:01:22', '1', '1', '1', '1', null);
INSERT INTO `t_comment` VALUES ('2', 'fsdfsdf', '2013-04-01 16:19:33', null, 'fsdfsd', '1', null, null, null);
INSERT INTO `t_comment` VALUES ('7', 'fdfd', '2013-04-01 17:15:31', null, 'dfd', '2', null, null, null);
INSERT INTO `t_comment` VALUES ('8', 'sww', '2013-04-08 09:48:38', null, 'sss', '1', null, null, null);
INSERT INTO `t_comment` VALUES ('9', '', '2013-04-08 09:51:05', null, 'ssssss', '1', null, null, null);
INSERT INTO `t_comment` VALUES ('10', '<img alt=\"\" src=\"/static/thirdparty/kindeditor/attached/image/20130408/20130408094711_99.jpg\" />', '2013-04-08 09:58:55', null, 'qqqqqq', '1', null, null, null);

-- ----------------------------
-- Table structure for `t_comment_type`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment_type`;
CREATE TABLE `t_comment_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `decription` varchar(255) DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_comment_type
-- ----------------------------
INSERT INTO `t_comment_type` VALUES ('1', 'ddfdf', 'news', '');
INSERT INTO `t_comment_type` VALUES ('2', '2', 'news', '1');
INSERT INTO `t_comment_type` VALUES ('3', 'dfgdfgdfg', 'news', 'fdgdfgdf');
INSERT INTO `t_comment_type` VALUES ('4', 'sss', 'news', 'sss');

-- ----------------------------
-- Table structure for `t_identity`
-- ----------------------------
DROP TABLE IF EXISTS `t_identity`;
CREATE TABLE `t_identity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nick_name` varchar(20) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_identity
-- ----------------------------
INSERT INTO `t_identity` VALUES ('1', 'admin@163.com', 'abc', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `t_module`
-- ----------------------------
DROP TABLE IF EXISTS `t_module`;
CREATE TABLE `t_module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ch_name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_module
-- ----------------------------
INSERT INTO `t_module` VALUES ('1', 'news', '新闻', '1', '1');
INSERT INTO `t_module` VALUES ('2', 'news.lists', '新闻列表', '1', '2');
INSERT INTO `t_module` VALUES ('3', 'news.detail', '新闻详情', '1', '4');
INSERT INTO `t_module` VALUES ('4', 'news.manager', '新闻管理', '1', '3');
INSERT INTO `t_module` VALUES ('5', 'game', '游戏', '2', '1');
INSERT INTO `t_module` VALUES ('6', 'game.chess', '五子棋', '2', '2');
INSERT INTO `t_module` VALUES ('7', 'breadcrumb', '面包屑', '3', '1');
INSERT INTO `t_module` VALUES ('8', 'breadcrumb.line', '线型', '3', '2');
INSERT INTO `t_module` VALUES ('9', 'slider', '滚动条', '4', '1');
INSERT INTO `t_module` VALUES ('10', 'slider.flexSlider', 'FlexSlider', '4', '2');
INSERT INTO `t_module` VALUES ('11', 'gather', '页面采集', '5', '1');
INSERT INTO `t_module` VALUES ('12', 'gather.iframe', 'Iframe', '5', '2');
INSERT INTO `t_module` VALUES ('13', 'gather.proxy', '代理模式', '5', '3');

-- ----------------------------
-- Table structure for `t_page`
-- ----------------------------
DROP TABLE IF EXISTS `t_page`;
CREATE TABLE `t_page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) DEFAULT NULL,
  `custom_css` longtext,
  `description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `layout` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `can_show` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKCB61437A65C1917D` (`parent_id`),
  CONSTRAINT `FKCB61437A65C1917D` FOREIGN KEY (`parent_id`) REFERENCES `t_page` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_page
-- ----------------------------
INSERT INTO `t_page` VALUES ('4', 'cms', null, null, null, '1_1-1_1.tpl', 'CMS', 'CMS', null, '0');
INSERT INTO `t_page` VALUES ('7', '7', '								\r\n			\r\n			', 'games', 'games', '1_2-1_1.tpl', 'games', 'games', null, '0');
INSERT INTO `t_page` VALUES ('8', 'cms_1', '				\r\n			', 'cms_1', 'cms_1', '1.tpl', 'cms_1', 'cms_1', '7', '0');
INSERT INTO `t_page` VALUES ('9', '9', null, null, null, '1_3-1_1.tpl', 'newsdetail', null, '7', '1');
INSERT INTO `t_page` VALUES ('10', 'newManage', '				\r\n			', null, null, '1_1-1_1.tpl', '新闻管理', '新闻管理', null, '0');

-- ----------------------------
-- Table structure for `t_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `t_sessions`;
CREATE TABLE `t_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) DEFAULT '0',
  `user_agent` varchar(50) DEFAULT '',
  `last_activity` int(10) DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_sessions
-- ----------------------------
INSERT INTO `t_sessions` VALUES ('694b5dc8869c381d42ff78d64a26fe4a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', '1367142716', null);

-- ----------------------------
-- Table structure for `t_seting`
-- ----------------------------
DROP TABLE IF EXISTS `t_seting`;
CREATE TABLE `t_seting` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `open` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_seting
-- ----------------------------
INSERT INTO `t_seting` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nick_name` varchar(20) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `salt` varchar(30) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_user
-- ----------------------------

-- ----------------------------
-- Table structure for `t_widget`
-- ----------------------------
DROP TABLE IF EXISTS `t_widget`;
CREATE TABLE `t_widget` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `border_class` varchar(100) DEFAULT NULL,
  `border_tpl` varchar(100) NOT NULL,
  `container` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `page_id` bigint(20) DEFAULT NULL,
  `borderTpl` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK847FAC6FBA75B178` (`page_id`),
  CONSTRAINT `FK847FAC6FBA75B178` FOREIGN KEY (`page_id`) REFERENCES `t_page` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_widget
-- ----------------------------
INSERT INTO `t_widget` VALUES ('16', 'green', 't-c-f.tpl', 'row3', 'news.lists', '1', '', '4', '');
INSERT INTO `t_widget` VALUES ('29', null, 't-c-f.tpl', 'row0', 'game.chess', '-1', null, '7', '');
INSERT INTO `t_widget` VALUES ('31', '', 't-c-f.tpl', 'row0', 'breadcrumb.line', '2', '', '4', '');
INSERT INTO `t_widget` VALUES ('35', '', 't-c-f.tpl', 'row0', 'breadcrumb.line', '0', '', '8', '');
INSERT INTO `t_widget` VALUES ('37', null, 't-c-f.tpl', 'row3', 'breadcrumb.line', '0', null, '4', '');
INSERT INTO `t_widget` VALUES ('38', null, 't-c-f.tpl', 'row0', 'news.manager', '1', null, '8', '');
INSERT INTO `t_widget` VALUES ('41', null, 't-c-f.tpl', 'row0', 'news.manager', '-1', null, '9', '');
INSERT INTO `t_widget` VALUES ('42', null, 't-c-f.tpl', 'row1', 'news.manager', '0', null, '10', '');
INSERT INTO `t_widget` VALUES ('47', 'darkgrey', 't-c-f.tpl', 'row1', 'gather.iframe', '1', '', '10', '');
INSERT INTO `t_widget` VALUES ('51', null, 't-c-f.tpl', 'row0', 'news.lists', '-1', null, '10', '');

-- ----------------------------
-- Table structure for `t_widget_setting`
-- ----------------------------
DROP TABLE IF EXISTS `t_widget_setting`;
CREATE TABLE `t_widget_setting` (
  `widget_id` bigint(20) NOT NULL,
  `attr_value` longtext,
  `attr_key` varchar(64) NOT NULL,
  PRIMARY KEY (`widget_id`,`attr_key`),
  KEY `FKDCAE8280B22989D8` (`widget_id`),
  CONSTRAINT `FKDCAE8280B22989D8` FOREIGN KEY (`widget_id`) REFERENCES `t_widget` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_widget_setting
-- ----------------------------
INSERT INTO `t_widget_setting` VALUES ('16', '10', 'fetchSize');
INSERT INTO `t_widget_setting` VALUES ('16', '', 'style');
INSERT INTO `t_widget_setting` VALUES ('16', 'lists.tpl', 'template');
INSERT INTO `t_widget_setting` VALUES ('16', '', 'type');
INSERT INTO `t_widget_setting` VALUES ('35', '', '');
INSERT INTO `t_widget_setting` VALUES ('47', '100%', 'height');
INSERT INTO `t_widget_setting` VALUES ('47', 'http://www-ig-opensocial.googleusercontent.com/gadgets/ifr?exp_rpc_js=1&exp_track_js=1&url=http%3A%2F%2Fwww.gstatic.com%2Fig%2Fmodules%2Ftabnews%2Ftabnews_v2.xml&container=ig&view=home&lang=zh-cn&country=US&sanitize=0&v=dadcd56d7947b0c3&parent=http://www.google.com&libs=core:core.io:core.iglegacy:auth-refresh&synd=ig&mid=7#rpctoken=-775028032&ifpctok=-775028032&up_items=5&up_ned=&up_queryList=&up_font_size=13pt&up_selectedTab=0&up_tabs=&up_last_url=http://ajax.googleapis.com/ajax/services/search/news%3Fv%3D1.0%26hide%3Drelated%26key%3Dinternal-ig-tabnews%26ned%3Dus%26topic%3Dh%26rsz%3Dlarge&up_onebox=&up_show_image=0', 'url');
INSERT INTO `t_widget_setting` VALUES ('47', '100%', 'width');
