/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50514
Source Host           : localhost:3306
Source Database       : mall

Target Server Type    : MYSQL
Target Server Version : 50514
File Encoding         : 65001

Date: 2013-03-25 17:40:16
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `article_id` int(4) NOT NULL AUTO_INCREMENT,
  `article_category` int(4) DEFAULT NULL,
  `article_title` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `article_description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `article_count` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `article_date` int(4) DEFAULT NULL,
  `article_pubdate` int(4) DEFAULT NULL,
  `article_hit` int(4) DEFAULT NULL,
  `article_type` int(4) DEFAULT NULL,
  `article_content` text COLLATE utf8_bin,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of mall_article
-- ----------------------------
INSERT INTO `mall_article` VALUES ('1', '11', '11', '111', '11', '11', '1', '11', '11', null);

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
INSERT INTO `mall_category` VALUES ('1', '0', 'qingchunmeinv', '分类1', '分类1', '2', '2');
INSERT INTO `mall_category` VALUES ('2', '0', 'news', '最新动态', '最新动态', '0', '1');
INSERT INTO `mall_category` VALUES ('3', '0', 'adv', '广告栏', '广告栏', '2', '2');
INSERT INTO `mall_category` VALUES ('4', '0', 'meituimote', '分类4', '分类4', '1', '0');
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
  `post_description` varchar(100) DEFAULT NULL,
  `post_thumb` varchar(100) DEFAULT NULL,
  `post_pictures` text,
  `post_count` varchar(64) DEFAULT NULL,
  `post_date` int(4) DEFAULT NULL,
  `post_pubdate` int(4) DEFAULT NULL,
  `post_hit` int(4) DEFAULT NULL,
  `post_type` int(4) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mall_posts
-- ----------------------------
INSERT INTO `mall_posts` VALUES ('13', '1', '图片测试', '图片测试', '图片测试', 'pic/201303/21/1363829460.jpg', 'a:0:{}', '0', '1363829403', '1364201735', '26', '2');
INSERT INTO `mall_posts` VALUES ('14', '3', 'adv', '广告栏', 'sdsdsdsdsdssdsdsdsdsdsds', 'pic/201303/25/1364197685.jpg', 'a:36:{i:0;s:50:\"pic/201303/25/cb6572dc0851ec3c5c72e0915e9b5dc2.jpg\";i:1;s:50:\"pic/201303/25/7ee3d3c86364011a21b8457d1229c976.jpg\";i:2;s:50:\"pic/201303/25/b0c4d2e87c0aa228a5bbcd9b7718bc9e.jpg\";i:3;s:50:\"pic/201303/25/b1eeaa6ca95a41afc1f2af2949a0ad41.jpg\";i:4;s:50:\"pic/201303/25/6cfe08cd0a44c8307434f8912171204d.jpg\";i:5;s:50:\"pic/201303/25/1c67b5cf7d8ebb44dfc8ad02eee24b1a.jpg\";i:6;s:50:\"pic/201303/25/8d3a8afaa315e57439431e7b352af4e3.jpg\";i:7;s:50:\"pic/201303/25/36f4812e9d8f499eb9dbbad875055044.jpg\";i:8;s:50:\"pic/201303/25/40b196dbcf346e91d7cdfe8abfe82509.jpg\";i:9;s:50:\"pic/201303/25/7ec4d7170c31b6c54fc30152d9979e89.jpg\";i:10;s:50:\"pic/201303/25/b2ace0a190ec55a482419b72579701e4.jpg\";i:11;s:50:\"pic/201303/25/f1b17b77a473404c0587f998d04025f6.jpg\";i:12;s:50:\"pic/201303/25/1a2bd79e1a1a0f60ac9c884310bde0d3.jpg\";i:13;s:50:\"pic/201303/25/4a00635c3d2319cd97221b14859984bd.jpg\";i:14;s:50:\"pic/201303/25/8343dafc7f12d9c7487f10aca1da052b.jpg\";i:15;s:50:\"pic/201303/25/dfc5297a5d88e098ac7f00aa8bddda8d.jpg\";i:16;s:50:\"pic/201303/25/68626d47e34f3c13f57a30a8afd3e785.jpg\";i:17;s:50:\"pic/201303/25/076e3caed758a1c18c91a0e9cae3368f.jpg\";i:18;s:50:\"pic/201303/25/36d51d9c97acab0cdd1853323848e48f.jpg\";i:19;s:50:\"pic/201303/25/ba45c8f60456a672e003a875e469d0eb.jpg\";i:20;s:50:\"pic/201303/25/266a9a6d1fdffdf7033f92f0ba6ed311.jpg\";i:21;s:50:\"pic/201303/25/b06f54d5bc543e26a49e6fa7a084425b.jpg\";i:22;s:50:\"pic/201303/25/bee17f32b7a45787dc5463b646d8b2f0.jpg\";i:23;s:50:\"pic/201303/25/b4eebfabe6dcb54d0dadcedb4a334b74.jpg\";i:24;s:50:\"pic/201303/25/652c798114a1e6c3d81fc5d8b309dd5f.jpg\";i:25;s:50:\"pic/201303/25/660086ec9e0f0e8d6649692819e8e55f.jpg\";i:26;s:50:\"pic/201303/25/bdf3bf1da3405725be763540d6601144.jpg\";i:27;s:50:\"pic/201303/25/5a44c7ba5bbe4ec867233d67e4806848.jpg\";i:28;s:50:\"pic/201303/25/18a784e42a1d9d6138fd64f251e8e7f5.jpg\";i:29;s:50:\"pic/201303/25/2b04df3ecc1d94afddff082d139c6f15.jpg\";i:30;s:50:\"pic/201303/25/884e51fdba395a024ce38450ce0ffdd9.jpg\";i:31;s:50:\"pic/201303/25/8969288f4245120e7c3870287cce0ff3.jpg\";i:32;s:50:\"pic/201303/25/be0048c1fffdd99c66f1939d293138c8.jpg\";i:33;s:50:\"pic/201303/25/3b3497222ff51ec057febf0b1421e4a8.jpg\";i:34;s:50:\"pic/201303/25/9d377b10ce778c4938b3c7e2c63a229a.jpg\";i:35;s:50:\"pic/201303/25/fafa5efeaf3cbe3b23b2748d13e629a1.jpg\";}', '36', '1364197628', '1364197685', '204', '0');

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
INSERT INTO `sessions` VALUES ('724d183f8f50d74c67a7d5df70f00e09', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', '1364204347', 'a:2:{s:6:\"userid\";s:1:\"1\";s:10:\"login_time\";s:19:\"2013-03-25 13:29:06\";}');

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
