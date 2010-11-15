/*
MySQL Data Transfer
Source Host: localhost
Source Database: onliner
Target Host: localhost
Target Database: onliner
Date: 15.11.2010 16:14:33
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(15) unsigned NOT NULL auto_increment,
  `comment_parent_id` int(15) unsigned NOT NULL,
  `comment_content` text NOT NULL,
  `comment_add_datetime` datetime NOT NULL,
  `file_id` int(15) unsigned NOT NULL,
  `user_id` int(15) unsigned NOT NULL,
  PRIMARY KEY  (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `file_id` int(15) unsigned NOT NULL auto_increment,
  `file_name` varchar(255) NOT NULL,
  `file_origin_name` varchar(255) NOT NULL,
  `file_header` varchar(255) NOT NULL,
  `file_content` text NOT NULL,
  `file_add_datetime` datetime NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_id` int(15) unsigned NOT NULL,
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(15) unsigned NOT NULL auto_increment,
  `user_login` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_signin_datetime` datetime NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Evegreen', '20e44ee8afd089bf22e7d2da787678d5', 'uncoart@gmail.com', '2010-11-14 21:35:09');
INSERT INTO `users` VALUES ('2', 'Rand', '20e44ee8afd089bf22e7d2da787678d5', 'rand@gmail.com', '2010-11-14 21:59:13');
INSERT INTO `users` VALUES ('3', 'Lis', '20e44ee8afd089bf22e7d2da787678d5', 'lis@open.by', '2010-11-14 21:59:40');
INSERT INTO `users` VALUES ('4', 'Agvein', '20e44ee8afd089bf22e7d2da787678d5', 'agvein@gmail.com', '2010-11-14 22:00:05');
INSERT INTO `users` VALUES ('5', 'Avienda', '20e44ee8afd089bf22e7d2da787678d5', 'avienda@gmail.com', '2010-11-14 22:00:31');
INSERT INTO `users` VALUES ('6', 'Letta', '20e44ee8afd089bf22e7d2da787678d5', 'letta@gmail.com', '2010-11-14 22:00:48');
INSERT INTO `users` VALUES ('7', 'MIN', '20e44ee8afd089bf22e7d2da787678d5', 'min@gmail.com', '2010-11-14 22:01:25');
INSERT INTO `users` VALUES ('8', 'Lain', '20e44ee8afd089bf22e7d2da787678d5', 'lain@gmail.com', '2010-11-14 22:01:53');
INSERT INTO `users` VALUES ('9', 'Velena', '20e44ee8afd089bf22e7d2da787678d5', 'velena@gmail.com', '2010-11-14 22:02:50');
