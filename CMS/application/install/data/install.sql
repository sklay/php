/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50514
Source Host           : localhost:3306
Source Database       : mall

Target Server Type    : MYSQL
Target Server Version : 50514
File Encoding         : 65001

Date: 2013-03-28 11:36:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `identity_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `identity_login_log`;
CREATE TABLE `identity_login_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `login_expore` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `uid` bigint(255) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `login_user_type` int(11) DEFAULT NULL,
  `login_ip` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of identity_login_log
-- ----------------------------
INSERT INTO `identity_login_log` VALUES ('1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 18:44:44', '2013-03-23 19:01:19', '1', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('2', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 19:46:24', '2013-03-23 19:47:10', '1', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('3', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 19:47:27', null, '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('4', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 20:45:14', null, '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('5', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 21:32:00', null, '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('6', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 22:19:16', '2013-03-23 22:37:04', '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('7', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-23 22:45:49', null, '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('8', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-24 12:23:09', '2013-03-24 12:23:42', '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-24 12:23:47', '2013-03-24 12:25:50', '0', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('10', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-24 12:25:55', '2013-03-24 12:26:11', '1', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('11', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.97 Safari/537.22', '1', '2013-03-24 12:26:28', null, '1', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('12', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.19 (KHTML, like Gecko) Chrome/25.0.1323.1 Safari/537.19', '1', '2013-03-25 13:29:06', null, '1', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('13', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.19 (KHTML, like Gecko) Chrome/25.0.1323.1 Safari/537.19', '1', '2013-03-26 08:58:46', null, '1', '127.0.0.1');
INSERT INTO `identity_login_log` VALUES ('14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)', '1', '2013-03-26 14:27:46', null, '1', '127.0.0.1');

-- ----------------------------
-- Table structure for `identity_operation_log`
-- ----------------------------
DROP TABLE IF EXISTS `identity_operation_log`;
CREATE TABLE `identity_operation_log` (
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  `description` varchar(4000) COLLATE utf8_bin NOT NULL COMMENT '操作描述',
  `operation_type` int(11) NOT NULL COMMENT '操作类型',
  `ip_address` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'ip地址',
  `optimist` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '时间戳',
  `creation_time` datetime NOT NULL COMMENT '创建时间',
  `created_by` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '创建人',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `updated_by` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '更新人',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of identity_operation_log
-- ----------------------------

-- ----------------------------
-- Table structure for `identity_password`
-- ----------------------------
DROP TABLE IF EXISTS `identity_password`;
CREATE TABLE `identity_password` (
  `uid` bigint(20) NOT NULL COMMENT '用户id',
  `pwd` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '密码（密文）',
  `protection_question` int(11) NOT NULL COMMENT '密码保护项',
  `protection_answer` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '密码保护答案',
  `pwd_bak` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '密码备份（密文）',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of identity_password
-- ----------------------------
INSERT INTO `identity_password` VALUES ('1', '21232f297a57a5a743894a0e4a801fc3', '0', '0', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `identity_security`
-- ----------------------------
DROP TABLE IF EXISTS `identity_security`;
CREATE TABLE `identity_security` (
  `id` bigint(20) NOT NULL COMMENT '密保id',
  `question` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '密保问题',
  `answer` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '密保答案',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of identity_security
-- ----------------------------

-- ----------------------------
-- Table structure for `identity_user`
-- ----------------------------
DROP TABLE IF EXISTS `identity_user`;
CREATE TABLE `identity_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `nick_name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `user_photo` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '用户头像',
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '简介',
  `user_type` int(11) NOT NULL,
  `statues` int(11) NOT NULL DEFAULT '0' COMMENT '用户状态[0：锁定（未激活），1：正常（已激活），3：屏蔽（激活后被停用）]',
  `optimist` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '时间戳',
  `creation_time` datetime NOT NULL COMMENT '创建时间',
  `created_by` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '创建人',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `updated_by` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '更新人',
  `user_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of identity_user
-- ----------------------------
INSERT INTO `identity_user` VALUES ('1', '我是第一', 'dsdsd', '', '1', '0', '2013-03-24 12:25:42', '2013-03-22 15:26:39', '0', '2013-03-22 15:26:39', '0', 'admin');
INSERT INTO `identity_user` VALUES ('2', 'guest', 'ss', '', '0', '0', '2013-03-23 19:10:42', '2013-03-23 10:27:29', '0', '2013-03-23 10:27:29', '0', 'guest');

-- ----------------------------
-- Table structure for `identity_user_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `identity_user_attribute`;
CREATE TABLE `identity_user_attribute` (
  `uid` bigint(20) NOT NULL DEFAULT '0' COMMENT '用户id',
  `key` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '属性名(用于存储查询)',
  `key_name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '属性名(用于页面显示)',
  `value` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '属性值',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of identity_user_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for `mall_article`
-- ----------------------------
DROP TABLE IF EXISTS `mall_article`;
CREATE TABLE `mall_article` (
  `article_id` bigint(4) NOT NULL AUTO_INCREMENT,
  `article_category` int(4) DEFAULT NULL,
  `article_title` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `article_description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `article_count` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `article_date` datetime DEFAULT NULL,
  `article_pubdate` datetime DEFAULT NULL,
  `article_hit` int(4) DEFAULT NULL,
  `article_type` int(4) DEFAULT NULL,
  `article_content` text COLLATE utf8_bin,
  `article` varchar(255) COLLATE utf8_bin DEFAULT 'article' COMMENT '标识为article',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of mall_article
-- ----------------------------
INSERT INTO `mall_article` VALUES ('1', '1', '11', '111', '11', '2013-03-26 09:56:30', '2013-03-26 09:56:32', '11', '11', null, 'article');
INSERT INTO `mall_article` VALUES ('2', '1', '舍不得说再见', '舍不得说再见', '0', '2013-03-26 09:52:59', '0000-00-00 00:00:00', '133', null, 0x3C7370616E207374796C653D22636F6C6F723A20726762283231362C203231362C20323136293B20666F6E742D66616D696C793A20E5BEAEE8BDAFE99B85E9BB913B20666F6E742D73697A653A206D656469756D3B206C696E652D6865696768743A206E6F726D616C3B206261636B67726F756E642D636F6C6F723A207267622832312C2032372C203330293B223EE69C89E697B6E58099E4BC9AE683B3E3808220E68891E7A9B6E7AB9FE5969CE6ACA2E4BDA0E4BB80E4B988E3808220E68891E7A9B6E7AB9FE59CA8E7AD89E4BDA0E4BB80E4B988EFBC9F20E4B99FE8AEB8E5BE97E4B88DE588B0E79A84E6898DE79C9FE79A84E698AFE69C80E5A5BDE79A84E3808220E58F88E68896E88085EFBC8CE68891E58FAAE698AFE6B2A1E69C89E98187E8A781EFBC8CE6AF94E4BDA0E69BB4E5A5BDE79A84E3808220E4BDA0E4B88DE79FA5E98193E69F90E4BA9BE697B6E588BBEFBC8CE68891E69C89E5A49AE4B988E99ABEE8BF87E3808220E4BDA0E4B88DE79FA5E98193EFBC8CE6B2A1E69C89E59B9EE5BA94E79A84E7AD89E5BE85EFBC8CE79C9FE79A84E8AEA9E4BABAE5BE88E7B4AFE3808220E4BDA0E4B88DE79FA5E98193EFBC8CE68891E698AFE9BC93E8B5B7E4BA86E5A49AE5A4A7E79A84E58B87E6B094EFBC8CE6898DE695A2E5BFB5E5BFB5E4B88DE5BF98E3808220E4B880E6ACA1E6ACA1E58F8DE5A48DE3808220E593ADE7B4AFE4BA86EFBC8CE6B289E9BB98E4BA86E3808220E683B3E694BEE5BC83E4BA86EFBC8CE586B7E6B7A1E4BA86E3808220E58FAFE698AFE697B6E997B4E4B880E8BF87EFBC8CE58DB4E58F88E8BF98E698AFE683B3E5BFB5E4BA86E3808220E694BEE4B88DE4B88BEFBC8CE5BF98E4B88DE68E89EFBC8CE68892E4B88DE4BA86EFBC8CE8B5B0E4B88DE5BC80E3808220E8BAABE8BEB9E79A84E4BABAE983BDE4BC9AE5BF83E796BCE3808220E591A8E59BB4E79A84E4BABAE983BDE4BC9AE58A9DE8A7A3E3808220E58FAFE698AFE4B8BAE4BB80E4B988EFBC8CE68891E59091E5B7A6E8B5B0EFBC8CE59091E58FB3E8B5B0EFBC8CE8BF98E698AFE8B5B0E4B88DE587BAE788B1E4BDA0E79A84E59C86E3808220E5918AE8AF89E887AAE5B7B1EFBC8CE8AEA9E887AAE5B7B1E7A6BBE5BC80E4BDA0EFBC9BE5918AE8AF89E887AAE5B7B1EFBC8CE8BF99E698AFE69C80E5908EE4B880E6ACA1E593ADE6B3A3E3808220E5BE88E5A49AE4BA8BE68385EFBC8CE983BDE698AFE69C89E7958CE99990E79A84EFBC9BE5BE88E5A49AE697B6E58099EFBC8CE5868DE59D9AE5BCBAE79A84E4BABAE983BDE698AFE4BC9AE7B4AFE79A84E3808220E68891E4B88DE698AFE79C9FE79A84E582BBE7939CEFBC8CE58FAAE698AFE69BBEE7BB8FE4B8BAE4BDA0E5BF83E79498E68385E684BFE3808220E5BE88E581B6E5B094E79A84E4BDA0E4BC9AE689BEE68891EFBC8CE88194E7B3BBE68891E3808220E4BDA0E79A84E7AA81E784B6E587BAE78EB0EFBC8CE8BF98E698AFE4BC9AE68C91E8B5B7E68891E5BF83E9878CE79A84E5BCA6E3808220E58FAAE698AFEFBC8CE68891E4B99FE5ADA6E4BC9AE5AFB9E4BDA0E4BCAAE8A385E4BA86EFBC8CE4B88DE586B7E4B88DE783ADEFBC8CE4B88DE592B8E4B88DE6B7A1E3808220E784B6E5908EE590ACE4BDA0E8BDBBE8BDBBE59CB0E8AFB4EFBC8CE4BDA0E58F98E4BA86E3808220E68891E4B88DE79FA5E98193EFBC8CE698AFE8AFA5E7AC91E8BF98E698AFE8AFA5E593ADE3808220E4B99FE6B2A1E69C89E6848FE4B989E4BA86EFBC8CE4B88DE698AFE59097E3808220E58FAAE698AFE5BE88E7AA81E784B6E79A84E79C8BE588B0E4B880E4B8AAE79BB8E4BCBCE79A84E8BAABE5BDB1EFBC8CE590ACE588B0E4B880E4B8AAE79BB8E4BCBCE79A84E5A3B0E99FB3E680BBE4BC9AE8BAABE4B88DE794B1E5B7B1EFBC8CE680BBE4BC9AE999B7E585A5E59B9EE5BF86E3808220E4B88DE8BF87EFBC8CE685A2E685A2E79A84EFBC8CE68891E4B99FE5ADA6E79D80E694BEE4B88BE4BA86E3808220E4B88DE698AFE68891E58F98E4BA86EFBC8CE698AFE68891E79C9FE79A84E697A0E883BDE4B8BAE58A9BE4BA86E38081E68891E8AEA4E8BE93E4BA86E38081E68891E68A98E885BEE4B88DE58AA8E4BA86E3808220E58FAAE698AFE7AA81E784B6E59CB0E590ACE8A781E982A3E4BA9BE6AD8CE7AA81E784B6E683B3E8B5B7E4BDA0E3808220E4BDA0E4BC9AE59CA8E593AAE9878CEFBC9F20E8BF87E5BE97E5BFABE4B990E68896E5A794E5B188EFBC9F20E6AF8FE5BD93E590ACE588B0E8BF99E6A0B7E79A84E6AD8CE8AF8DEFBC8CE680BBE698AFE4B88DE794B1E887AAE4B8BBE59CB0E683B3E8B5B7E68891E4BBACE3808220E58FAAE698AFEFBC8CE68891E79FA5E98193EFBC8CE68891E4BBACE79A84E788B1E5868DE4B99FE59B9EE4B88DE588B0E4BB8EE5898DE4BA86E3808220E7A6BBE5BC80E4BA86EFBC8CE8888DE4B88DE5BE97E4B99FE8A681E8AFB4E5868DE8A7812668656C6C69703B2668656C6C69703B20E4BD9CE88085E4B88DE8AFA620E69CACE69687E68EA8E88D90E4BABAE69687E99B8620E7BB99E69CACE69687E68EA8E88D90E4BABAE79599E8A88020E68891E8A681E68A95E7A8BF20E58886E4BAABE69CACE69687E588B0EFBC9A20E4B88AE4B880E7AF87EFBC9AE69C89E697B6EFBC8CE4BABAE7949FE5B0B1E698AFE8BF99E6A0B7E79A84E697A0E5A58820E4B88BE4B880E7AF87EFBC9AE6B2A1E69C89E4BA8620E794A8E688B7E5908D3A28E696B0E6B3A8E5868C2920E5AF86E7A0813A20E58CBFE5908DE58F91E8A1A820E58F91E8A1A8E6849FE8A880205BE694B6E8978FE69CACE696875D20E58F91E8A1A8E8AFBBE5908EE6849FEFBC9A28E58CBFE5908DE58F91E8A1A8E697A0E99C80E799BBE5BD95EFBC8CE5B7B2E799BBE5BD95E794A8E688B7E58FAFE79BB4E68EA5E58F91E8A1A8E380822920E69C80E696B0E6849FE8A880EFBC9A20E68980E69C89E6849FE8A880283839E69DA12920E58F91E8A880E4BABAEFBC9AE58CBFE5908D20E697B6E997B4EFBC9A20323031332D30332D323520E59B9EE5A48D20E7B1BBE4BCBCE79A84E69BBEE7BB8FEFBC8CE69BBEE7BB8FE79A84E5BE80E4BA8BEFBC8CE4B880E5B995E5B995E587BAE78EB0E59CA8E79CBCE5898DEFBC8120E58F91E8A880E4BABAEFBC9AE58CBFE5908D20E697B6E997B4EFBC9A20323031332D30332D323520E59B9EE5A48D20E58699E587BAE4BA86E68891E79A84E5BF83E5A3B0E5958A20E58F91E8A880E4BABAEFBC9AE58CBFE5908D20E697B6E997B4EFBC9A20323031332D30332D323420E59B9EE5A48D20E6849FE5908CE8BAABE58F9720E58F91E8A880E4BABAEFBC9AE58CBFE5908D20E697B6E997B4EFBC9A20323031332D30332D323420E59B9EE5A48D20E58784E5878920E58F91E8A880E4BABAEFBC9AE58CBFE5908D20E697B6E997B4EFBC9A20323031332D30332D323420E59B9EE5A48D20E69687E7ABA0E79C9FE7BE8EEFBC8CE4B8BBE4BABAE79A84E69585E4BA8BE4B99FE5BE88E58784E7BE8EEFBC8CE697B6E997B4E58FAFE4BBA5E694B9E58F98E5928CE6B7A1E5BF98E4B880E8B5B7E3808220E58F91E8A880E4BABAEFBC9AE58CBFE5908D20E697B6E997B4EFBC9A20323031332D30332D323420E59B9EE5A48D20E591B520E69CACE6A08FE99A8FE69CBAE68EA8E88D90E69687E7ABA020266D6964646F743BE6B2A1E69C89E992B1EFBC8CE68891E4BBACE883BDE788B1E5A49AE4B985EFBC9F20266D6964646F743BE6B2A1E4BB80E4B988E4BA8BE698AFE694BEE4B88DE4B88BE79A84EFBC8CE7979BE4BA86EFBC8CE4BDA0E887AA20266D6964646F743BE5AE88E580993138E5B9B4EFBC8CE4B8BAE68891E4BBACE693A6E882A9E8808CE8BF87E79A84E788B1E6838520266D6964646F743BE788B1E68385EFBC8CE68B92E7BB9DE6B289E9BB9820266D6964646F743BE68891E788B1E4BDA0EFBC8CE788B1E4BA86E5A5BDE4B98520266D6964646F743BE585B3E4BA8EE788B1E68385EFBC8CE79C9FE8AF9DE5BE80E5BE80E69C80E6AE8BE5BF8D20266D6964646F743B322E3035E7B1B3E79A84E7BBB3E5AD9020266D6964646F743BE4B88DE79498E5BF83E58FAAE698AFE69C8BE58F8B20266D6964646F743BE4BBA3E58FB731303236E79A84E794B7E5AD9020266D6964646F743BE69C89E4B880E6AEB5E68385EFBC8CE6B8A9E69A96E8BF87E7949FE591BD20266D6964646F743BE4B896E7958CE4B88AE69C80E981A5E8BF9CE79A84E8B79DE7A6BB20266D6964646F743BE68891E788B1E4BDA0EFBC81E6B0B8E8BF9CE983BDE788B1EFBC8120E68890E58A9FE8AEADE7BB8320E694B9E58F98E887AAE5B7B1E4BB8EE8BF99E9878CE5BC80E5A78B20E29885E5A682E69E9CE4BDA0E7979BE681A8E887AAE5B7B1E689BEE4B88DE588B0E4BABAE7949FE696B9E5909120E29885E5A682E69E9CE4BDA0E7979BE681A8E887AAE5B7B1E694BEE5BC83E4BA86E79BAEE6A08720E29885E5A682E69E9CE4BDA0E7979BE681A8E887AAE5B7B1E68792E683B0E38081E6B2A1E586B3E5BF8320E29885E5A682E69E9CE4BDA0E7979BE681A8E887AAE5B7B1E59D9AE68C81E4B88DE4B88BE58EBB20E29885E5A682E69E9CE4BDA0E7979BE681A8E887AAE5B7B1E78EB0E59CA8E8BF98E69CAAE68890E58A9F20E681ADE5969CE4BDA020E4BDA0E88EB7E5BE97E4BA86E8BF9BE585A53231E5A4A9E8AEADE7BB83E890A5E79A84E9809AE8A18CE8AF8120E79BB8E585B3E79FADE6968720266D6964646F743BE69C89E697B6EFBC8CE4BABAE7949FE5B0B1E698AFE8BF99E6A0B7E79A84E697A0E5A58820266D6964646F743BE7AA81E784B6E5A5BDE683B3E4BDA0EFBC8CE4BDA0E4BC9AE59CA8E593AAE9878C20266D6964646F743BE788B1E59CA8E5BF83E5A4B4EFBC8CE7BE9EE59CA8E58FA3E5A4B420266D6964646F743BE4B880E694AFE58FA3E7BAA2E4BDBFE6849FE68385E8B5B0E588B0E5B0BDE5A4B420266D6964646F743BE69C89E5A49AE5B091E788B1E8BDACE8BAABE58DB3E68890E9998CE8B7AF20266D6964646F743BE69C89E4B880E6AEB5E68385EFBC8CE6B8A9E69A96E8BF87E7949FE591BD20266D6964646F743BE4B880E58EA2E68385E684BFE79A84E6849FE68385EFBC8CE98692E98692E590A7EFBC8CE588ABE582BBE4BA8620266D6964646F743BE8B0A2E8B0A2E4BDA0EFBC8CE788B1E8BF87E6889120266D6964646F743BE982A3E4BA9BE5B9B4EFBC8CE69BBEE7BB8FE79A84E788B120266D6964646F743BE680BBE69C89E4B880E4BA9BE58FA5E5AD90EFBC8CE4BC9AE6BBB4E5A2A8E68890E4BCA420266D6964646F743BE69BBEE7BB8FE79A84E5B9B4E5B091E8BDBBE78B82EFBC8CE58E9FE69DA5E698AFE982A3E4B988E79A84E58FAF20266D6964646F743BE69C89E4BA9BE4BABAEFBC8CE69C89E4BA9BE4BA8BEFBC8CE69C89E4BA9BE8AF9DEFBC8CE69C89E4BA9BE788B13C2F7370616E3E, 'article');
INSERT INTO `mall_article` VALUES ('3', '2', 'dddddddddd', 'zxczxczx', '0', '2013-03-26 10:33:03', '2013-03-26 10:35:43', '111', null, 0x637A78637A7863, 'article');

-- ----------------------------
-- Table structure for `mall_category`
-- ----------------------------
DROP TABLE IF EXISTS `mall_category`;
CREATE TABLE `mall_category` (
  `category_id` int(4) NOT NULL AUTO_INCREMENT,
  `category_parent` int(4) DEFAULT '0',
  `category_slug` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `category_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `category_description` text CHARACTER SET utf8,
  `category_count` int(4) DEFAULT NULL,
  `category_type` int(4) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mall_category
-- ----------------------------
INSERT INTO `mall_category` VALUES ('1', '0', 'adv', '广告栏', '广告栏', '3', '2');
INSERT INTO `mall_category` VALUES ('2', '0', 'news', '最新动态', '最新动态', '7', '1');
INSERT INTO `mall_category` VALUES ('3', '0', 'hot', '热门推荐', '热门推荐', '1', '1');
INSERT INTO `mall_category` VALUES ('4', '0', 'picture', '图集', '图集', '6', '0');
INSERT INTO `mall_category` VALUES ('5', '0', 'mingxingxiezhen', '分类5', '分类5', '1', '0');
INSERT INTO `mall_category` VALUES ('6', '0', 'shaofuyouhuo', '分类6', '诱惑6', '0', '0');
INSERT INTO `mall_category` VALUES ('7', '0', 'top1', '顶部栏位', '顶部栏位', '0', '0');
INSERT INTO `mall_category` VALUES ('8', '0', 'ssssssaa', '顶部栏位2', '顶部栏位', '0', '0');

-- ----------------------------
-- Table structure for `mall_constant_code`
-- ----------------------------
DROP TABLE IF EXISTS `mall_constant_code`;
CREATE TABLE `mall_constant_code` (
  `cid` bigint(20) NOT NULL COMMENT '常量id',
  `constant_code_name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '类型名称',
  `constant_type` int(11) NOT NULL COMMENT '类型（0：用户状态项，1：公告类别项，3：行为类别项）',
  `state` int(11) NOT NULL COMMENT '状态（0：不启用，1：启动）',
  `description` varchar(4000) COLLATE utf8_bin DEFAULT NULL COMMENT '操作描述',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of mall_constant_code
-- ----------------------------

-- ----------------------------
-- Table structure for `mall_constant_define`
-- ----------------------------
DROP TABLE IF EXISTS `mall_constant_define`;
CREATE TABLE `mall_constant_define` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '类别id',
  `constant_code` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '类别名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of mall_constant_define
-- ----------------------------

-- ----------------------------
-- Table structure for `mall_notice`
-- ----------------------------
DROP TABLE IF EXISTS `mall_notice`;
CREATE TABLE `mall_notice` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '标题',
  `notice_hot` int(11) NOT NULL COMMENT '显示属性（0：无 1：推荐 2：热点 4：醒目 8：置顶）',
  `notice_content` text COLLATE utf8_bin NOT NULL COMMENT '公告内容',
  `notice_type` int(11) NOT NULL COMMENT '说明公类别 如： 就业，兼职',
  `notice_sources` int(11) NOT NULL COMMENT '来源(0：个人，1：系统)',
  `statues` int(11) NOT NULL COMMENT '状态(0：锁定，1：正常，3：屏蔽)',
  `optimist` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '时间戳',
  `creation_time` datetime NOT NULL COMMENT '创建时间',
  `created_by` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '创建人',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `updated_by` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of mall_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `mall_options`
-- ----------------------------
DROP TABLE IF EXISTS `mall_options`;
CREATE TABLE `mall_options` (
  `option_id` int(4) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `option_slug` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `option_value` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mall_options
-- ----------------------------
INSERT INTO `mall_options` VALUES ('1', '网站名称', 'webtitle', '尒鈅工作室');
INSERT INTO `mall_options` VALUES ('2', '关键词（KeyWords）', 'keywords', '测试机');
INSERT INTO `mall_options` VALUES ('3', '描述（Description）', 'description', '测试机');
INSERT INTO `mall_options` VALUES ('4', '版权信息', 'copyright', 'any.com');
INSERT INTO `mall_options` VALUES ('5', '邮箱', 'email', '57013652@qq.com');
INSERT INTO `mall_options` VALUES ('6', '联系地址', 'address', '南京市雨花区郁金香路17号');
INSERT INTO `mall_options` VALUES ('7', '电话', 'tel', '110');
INSERT INTO `mall_options` VALUES ('8', '邮编', 'zip', '210000');
INSERT INTO `mall_options` VALUES ('9', '公司名称', 'company', '尒鈅工作室');
INSERT INTO `mall_options` VALUES ('10', 'QQ号', 'qq', '57013652');
INSERT INTO `mall_options` VALUES ('11', 'ICP（备案号）', 'icp', '11000766号-8');

-- ----------------------------
-- Table structure for `mall_posts`
-- ----------------------------
DROP TABLE IF EXISTS `mall_posts`;
CREATE TABLE `mall_posts` (
  `post_id` int(4) NOT NULL AUTO_INCREMENT,
  `post_category` int(4) DEFAULT NULL,
  `post_slug` varchar(32) DEFAULT NULL,
  `post_title` varchar(64) DEFAULT NULL,
  `post_description` varchar(2000) DEFAULT NULL,
  `post_thumb` varchar(100) DEFAULT NULL,
  `post_pictures` text,
  `post_count` varchar(64) DEFAULT NULL,
  `post_date` int(4) DEFAULT NULL,
  `post_pubdate` int(4) DEFAULT NULL,
  `post_hit` int(4) DEFAULT NULL,
  `post_type` int(4) DEFAULT NULL,
  `post` varchar(255) DEFAULT 'post' COMMENT '标识为post',
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mall_posts
-- ----------------------------
INSERT INTO `mall_posts` VALUES ('14', '1', 'adv', '广告栏', 'Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy', 'pic/201303/25/1364197685.jpg', 'a:36:{i:0;s:50:\"pic/201303/25/cb6572dc0851ec3c5c72e0915e9b5dc2.jpg\";i:1;s:50:\"pic/201303/25/7ee3d3c86364011a21b8457d1229c976.jpg\";i:2;s:50:\"pic/201303/25/b0c4d2e87c0aa228a5bbcd9b7718bc9e.jpg\";i:3;s:50:\"pic/201303/25/b1eeaa6ca95a41afc1f2af2949a0ad41.jpg\";i:4;s:50:\"pic/201303/25/6cfe08cd0a44c8307434f8912171204d.jpg\";i:5;s:50:\"pic/201303/25/1c67b5cf7d8ebb44dfc8ad02eee24b1a.jpg\";i:6;s:50:\"pic/201303/25/8d3a8afaa315e57439431e7b352af4e3.jpg\";i:7;s:50:\"pic/201303/25/36f4812e9d8f499eb9dbbad875055044.jpg\";i:8;s:50:\"pic/201303/25/40b196dbcf346e91d7cdfe8abfe82509.jpg\";i:9;s:50:\"pic/201303/25/7ec4d7170c31b6c54fc30152d9979e89.jpg\";i:10;s:50:\"pic/201303/25/b2ace0a190ec55a482419b72579701e4.jpg\";i:11;s:50:\"pic/201303/25/f1b17b77a473404c0587f998d04025f6.jpg\";i:12;s:50:\"pic/201303/25/1a2bd79e1a1a0f60ac9c884310bde0d3.jpg\";i:13;s:50:\"pic/201303/25/4a00635c3d2319cd97221b14859984bd.jpg\";i:14;s:50:\"pic/201303/25/8343dafc7f12d9c7487f10aca1da052b.jpg\";i:15;s:50:\"pic/201303/25/dfc5297a5d88e098ac7f00aa8bddda8d.jpg\";i:16;s:50:\"pic/201303/25/68626d47e34f3c13f57a30a8afd3e785.jpg\";i:17;s:50:\"pic/201303/25/076e3caed758a1c18c91a0e9cae3368f.jpg\";i:18;s:50:\"pic/201303/25/36d51d9c97acab0cdd1853323848e48f.jpg\";i:19;s:50:\"pic/201303/25/ba45c8f60456a672e003a875e469d0eb.jpg\";i:20;s:50:\"pic/201303/25/266a9a6d1fdffdf7033f92f0ba6ed311.jpg\";i:21;s:50:\"pic/201303/25/b06f54d5bc543e26a49e6fa7a084425b.jpg\";i:22;s:50:\"pic/201303/25/bee17f32b7a45787dc5463b646d8b2f0.jpg\";i:23;s:50:\"pic/201303/25/b4eebfabe6dcb54d0dadcedb4a334b74.jpg\";i:24;s:50:\"pic/201303/25/652c798114a1e6c3d81fc5d8b309dd5f.jpg\";i:25;s:50:\"pic/201303/25/660086ec9e0f0e8d6649692819e8e55f.jpg\";i:26;s:50:\"pic/201303/25/bdf3bf1da3405725be763540d6601144.jpg\";i:27;s:50:\"pic/201303/25/5a44c7ba5bbe4ec867233d67e4806848.jpg\";i:28;s:50:\"pic/201303/25/18a784e42a1d9d6138fd64f251e8e7f5.jpg\";i:29;s:50:\"pic/201303/25/2b04df3ecc1d94afddff082d139c6f15.jpg\";i:30;s:50:\"pic/201303/25/884e51fdba395a024ce38450ce0ffdd9.jpg\";i:31;s:50:\"pic/201303/25/8969288f4245120e7c3870287cce0ff3.jpg\";i:32;s:50:\"pic/201303/25/be0048c1fffdd99c66f1939d293138c8.jpg\";i:33;s:50:\"pic/201303/25/3b3497222ff51ec057febf0b1421e4a8.jpg\";i:34;s:50:\"pic/201303/25/9d377b10ce778c4938b3c7e2c63a229a.jpg\";i:35;s:50:\"pic/201303/25/fafa5efeaf3cbe3b23b2748d13e629a1.jpg\";}', '36', '1364197628', '1364266234', '207', '1', 'post');
INSERT INTO `mall_posts` VALUES ('15', '4', '图集1', '图集1', 'Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printingLorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing..', 'pic/201303/26/1364285069.jpg', 'a:36:{i:0;s:50:\"pic/201303/26/cb6572dc0851ec3c5c72e0915e9b5dc2.jpg\";i:1;s:50:\"pic/201303/26/7ee3d3c86364011a21b8457d1229c976.jpg\";i:2;s:50:\"pic/201303/26/b0c4d2e87c0aa228a5bbcd9b7718bc9e.jpg\";i:3;s:50:\"pic/201303/26/b1eeaa6ca95a41afc1f2af2949a0ad41.jpg\";i:4;s:50:\"pic/201303/26/6cfe08cd0a44c8307434f8912171204d.jpg\";i:5;s:50:\"pic/201303/26/1c67b5cf7d8ebb44dfc8ad02eee24b1a.jpg\";i:6;s:50:\"pic/201303/26/8d3a8afaa315e57439431e7b352af4e3.jpg\";i:7;s:50:\"pic/201303/26/36f4812e9d8f499eb9dbbad875055044.jpg\";i:8;s:50:\"pic/201303/26/40b196dbcf346e91d7cdfe8abfe82509.jpg\";i:9;s:50:\"pic/201303/26/7ec4d7170c31b6c54fc30152d9979e89.jpg\";i:10;s:50:\"pic/201303/26/b2ace0a190ec55a482419b72579701e4.jpg\";i:11;s:50:\"pic/201303/26/f1b17b77a473404c0587f998d04025f6.jpg\";i:12;s:50:\"pic/201303/26/1a2bd79e1a1a0f60ac9c884310bde0d3.jpg\";i:13;s:50:\"pic/201303/26/4a00635c3d2319cd97221b14859984bd.jpg\";i:14;s:50:\"pic/201303/26/8343dafc7f12d9c7487f10aca1da052b.jpg\";i:15;s:50:\"pic/201303/26/dfc5297a5d88e098ac7f00aa8bddda8d.jpg\";i:16;s:50:\"pic/201303/26/68626d47e34f3c13f57a30a8afd3e785.jpg\";i:17;s:50:\"pic/201303/26/076e3caed758a1c18c91a0e9cae3368f.jpg\";i:18;s:50:\"pic/201303/26/36d51d9c97acab0cdd1853323848e48f.jpg\";i:19;s:50:\"pic/201303/26/ba45c8f60456a672e003a875e469d0eb.jpg\";i:20;s:50:\"pic/201303/26/266a9a6d1fdffdf7033f92f0ba6ed311.jpg\";i:21;s:50:\"pic/201303/26/b06f54d5bc543e26a49e6fa7a084425b.jpg\";i:22;s:50:\"pic/201303/26/bee17f32b7a45787dc5463b646d8b2f0.jpg\";i:23;s:50:\"pic/201303/26/b4eebfabe6dcb54d0dadcedb4a334b74.jpg\";i:24;s:50:\"pic/201303/26/652c798114a1e6c3d81fc5d8b309dd5f.jpg\";i:25;s:50:\"pic/201303/26/660086ec9e0f0e8d6649692819e8e55f.jpg\";i:26;s:50:\"pic/201303/26/bdf3bf1da3405725be763540d6601144.jpg\";i:27;s:50:\"pic/201303/26/5a44c7ba5bbe4ec867233d67e4806848.jpg\";i:28;s:50:\"pic/201303/26/18a784e42a1d9d6138fd64f251e8e7f5.jpg\";i:29;s:50:\"pic/201303/26/2b04df3ecc1d94afddff082d139c6f15.jpg\";i:30;s:50:\"pic/201303/26/884e51fdba395a024ce38450ce0ffdd9.jpg\";i:31;s:50:\"pic/201303/26/8969288f4245120e7c3870287cce0ff3.jpg\";i:32;s:50:\"pic/201303/26/be0048c1fffdd99c66f1939d293138c8.jpg\";i:33;s:50:\"pic/201303/26/3b3497222ff51ec057febf0b1421e4a8.jpg\";i:34;s:50:\"pic/201303/26/9d377b10ce778c4938b3c7e2c63a229a.jpg\";i:35;s:50:\"pic/201303/26/fafa5efeaf3cbe3b23b2748d13e629a1.jpg\";}', '36', '1364285032', '1364285069', '0', '0', 'poster');
INSERT INTO `mall_posts` VALUES ('16', '4', '图集2', '图集2', 'Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.', 'pic/201303/26/1364285099.jpg', 'a:7:{i:0;s:50:\"pic/201303/26/cb6572dc0851ec3c5c72e0915e9b5dc2.jpg\";i:1;s:50:\"pic/201303/26/7ee3d3c86364011a21b8457d1229c976.jpg\";i:2;s:50:\"pic/201303/26/b0c4d2e87c0aa228a5bbcd9b7718bc9e.jpg\";i:3;s:50:\"pic/201303/26/b1eeaa6ca95a41afc1f2af2949a0ad41.jpg\";i:4;s:50:\"pic/201303/26/6cfe08cd0a44c8307434f8912171204d.jpg\";i:5;s:50:\"pic/201303/26/1c67b5cf7d8ebb44dfc8ad02eee24b1a.jpg\";i:6;s:50:\"pic/201303/26/8d3a8afaa315e57439431e7b352af4e3.jpg\";}', '7', '1364285082', '1364285099', '0', '0', 'poster');
INSERT INTO `mall_posts` VALUES ('17', '4', '图集3', '图集3', 'Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.', 'pic/201303/26/1364285191.jpg', 'a:7:{i:0;s:50:\"pic/201303/26/cb6572dc0851ec3c5c72e0915e9b5dc2.jpg\";i:1;s:50:\"pic/201303/26/7ee3d3c86364011a21b8457d1229c976.jpg\";i:2;s:50:\"pic/201303/26/b0c4d2e87c0aa228a5bbcd9b7718bc9e.jpg\";i:3;s:50:\"pic/201303/26/b1eeaa6ca95a41afc1f2af2949a0ad41.jpg\";i:4;s:50:\"pic/201303/26/6cfe08cd0a44c8307434f8912171204d.jpg\";i:5;s:50:\"pic/201303/26/1c67b5cf7d8ebb44dfc8ad02eee24b1a.jpg\";i:6;s:50:\"pic/201303/26/8d3a8afaa315e57439431e7b352af4e3.jpg\";}', '7', '1364285170', '1364285191', '0', '1', 'poster');
INSERT INTO `mall_posts` VALUES ('18', '4', '图集4', '图集4', 'Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.', 'pic/201303/26/1364285211.jpg', 'a:5:{i:0;s:50:\"pic/201303/26/cb6572dc0851ec3c5c72e0915e9b5dc2.jpg\";i:1;s:50:\"pic/201303/26/7ee3d3c86364011a21b8457d1229c976.jpg\";i:2;s:50:\"pic/201303/26/b0c4d2e87c0aa228a5bbcd9b7718bc9e.jpg\";i:3;s:50:\"pic/201303/26/b1eeaa6ca95a41afc1f2af2949a0ad41.jpg\";i:4;s:50:\"pic/201303/26/6cfe08cd0a44c8307434f8912171204d.jpg\";}', '5', '1364285197', '1364285212', '0', '0', 'poster');
INSERT INTO `mall_posts` VALUES ('19', '4', '图集5', '图集5', 'Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.Lorem Ipsum has been the industry\'s standard dummy text ever since thes, when an unknown printer. Simply dummy text of the printing.', 'pic/201303/26/1364285229.jpg', 'a:3:{i:0;s:50:\"pic/201303/26/1c67b5cf7d8ebb44dfc8ad02eee24b1a.jpg\";i:1;s:50:\"pic/201303/26/8d3a8afaa315e57439431e7b352af4e3.jpg\";i:2;s:50:\"pic/201303/26/36f4812e9d8f499eb9dbbad875055044.jpg\";}', '3', '1364285217', '1364285407', '0', '0', 'poster');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) DEFAULT '0',
  `user_agent` varchar(50) DEFAULT '',
  `last_activity` int(10) DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('a67958115ad90cc05427d38aafc8541a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', '1364291501', 'a:2:{s:6:\"userid\";s:1:\"1\";s:10:\"login_time\";s:19:\"2013-03-26 08:58:46\";}');
INSERT INTO `sessions` VALUES ('31aa45c14b736a92ec995ebd1c9ca416', '127.0.0.1', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1;', '1364281390', 'a:2:{s:6:\"userid\";s:1:\"1\";s:10:\"login_time\";s:19:\"2013-03-26 14:27:46\";}');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
