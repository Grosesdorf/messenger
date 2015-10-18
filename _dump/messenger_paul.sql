/*
Navicat MySQL Data Transfer

Source Server         : support
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : messenger_paul

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-10-19 00:01:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Dialogs
-- ----------------------------
DROP TABLE IF EXISTS `Dialogs`;
CREATE TABLE `Dialogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_owner_dialog` int(11) unsigned NOT NULL,
  `id_companion_dialog` int(11) unsigned NOT NULL,
  `status_owner_dialog` smallint(1) unsigned NOT NULL,
  `status_companion_dialog` smallint(1) unsigned NOT NULL,
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_update_owner` timestamp NULL DEFAULT NULL,
  `date_update_companion` timestamp NULL DEFAULT NULL,
  `date_del_owner` timestamp NULL DEFAULT NULL,
  `date_del_companion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_owner_dialog_2` (`id_owner_dialog`),
  KEY `id_companion_dialog` (`id_companion_dialog`),
  KEY `status_owner_dialog` (`status_owner_dialog`,`status_companion_dialog`),
  KEY `status_owner_dialog_2` (`status_owner_dialog`),
  KEY `status_companion_dialog` (`status_companion_dialog`),
  CONSTRAINT `dialogs_ibfk_1` FOREIGN KEY (`id_owner_dialog`) REFERENCES `Users` (`id`),
  CONSTRAINT `dialogs_ibfk_2` FOREIGN KEY (`id_companion_dialog`) REFERENCES `Users` (`id`),
  CONSTRAINT `dialogs_ibfk_3` FOREIGN KEY (`status_owner_dialog`) REFERENCES `Status` (`id`),
  CONSTRAINT `dialogs_ibfk_4` FOREIGN KEY (`status_companion_dialog`) REFERENCES `Status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Dialogs
-- ----------------------------
INSERT INTO `Dialogs` VALUES ('1', '1', '2', '3', '3', '2015-10-14 16:46:06', null, null, null, null);
INSERT INTO `Dialogs` VALUES ('2', '1', '3', '3', '3', '2015-10-14 16:46:20', null, null, null, null);
INSERT INTO `Dialogs` VALUES ('3', '4', '1', '3', '3', '2015-10-14 16:46:33', null, null, null, null);

-- ----------------------------
-- Table structure for Messages
-- ----------------------------
DROP TABLE IF EXISTS `Messages`;
CREATE TABLE `Messages` (
  `id` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_dialog` smallint(11) unsigned NOT NULL,
  `id_user` smallint(11) unsigned NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_dialog` (`id_dialog`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Messages
-- ----------------------------
INSERT INTO `Messages` VALUES ('1', '1', '1', 'Привет!', '2015-10-14 19:08:48');
INSERT INTO `Messages` VALUES ('2', '1', '2', 'Здарово...', '2015-10-14 19:08:59');
INSERT INTO `Messages` VALUES ('3', '1', '1', 'Как дела?', '2015-10-14 19:09:23');
INSERT INTO `Messages` VALUES ('4', '1', '1', 'Что нового?', '2015-10-14 19:09:30');
INSERT INTO `Messages` VALUES ('5', '1', '2', 'всё хорошо, что у тебя?', '2015-10-14 19:09:47');
INSERT INTO `Messages` VALUES ('6', '1', '1', 'всё гуд!!!', '2015-10-14 19:09:56');
INSERT INTO `Messages` VALUES ('7', '2', '1', 'привет, где заказ?', '2015-10-14 19:10:50');
INSERT INTO `Messages` VALUES ('8', '2', '3', 'в пути', '2015-10-14 19:10:55');
INSERT INTO `Messages` VALUES ('9', '2', '1', 'срочно нужен', '2015-10-14 19:11:43');
INSERT INTO `Messages` VALUES ('10', '2', '3', 'привет..', '2015-10-14 19:11:38');
INSERT INTO `Messages` VALUES ('11', '2', '1', 'по времени примерно сколько?', '2015-10-14 19:11:29');
INSERT INTO `Messages` VALUES ('12', '2', '3', 'пару часов ещё..', '2015-10-14 19:12:00');
INSERT INTO `Messages` VALUES ('13', '3', '4', 'вчера был в сауне', '2015-10-14 19:12:15');
INSERT INTO `Messages` VALUES ('14', '3', '1', 'нормально..', '2015-10-14 19:12:20');
INSERT INTO `Messages` VALUES ('15', '3', '1', 'где денег взял?', '2015-10-14 19:12:25');
INSERT INTO `Messages` VALUES ('16', '3', '4', 'был на халтуре', '2015-10-14 19:12:31');
INSERT INTO `Messages` VALUES ('17', '3', '4', 'по стройке', '2015-10-14 19:12:36');
INSERT INTO `Messages` VALUES ('18', '3', '4', 'Строители со стажем могут рассказать множество историй о домах, возведенных в неудачных местах. Последствия строительства с нарушением местных законов могут вылиться в значительные финансовые потери. Поэтому, если дом надо построить с учетом \"красной линии\", лучше нанять профессионального землемера для разбивки углов постройки. Однако если дом или пристройка будут располагаться далеко от \"красной линии\", то землемер может и не понадобиться.\r\nПосле определения специалистом границ владения и разметки \"красной линии\" нового строительного объекта я предпочитаю выходить на участок вместе с владельцем и архитектором (если он есть), чтобы предварительно обсудить выбранную площадку. Например, если планируется устройство канализационной системы, должно быть оговорено размещение септиков по отношению к дому. Я беру 30-метровую рулетку, колышки, шнур, ленту с флажками, нивелир с измерительной рейкой. Будущий хозяин (лучше, если он будет с хозяйкой) должен иметь с собой планы дома и участка. ', '2015-10-14 19:15:33');

-- ----------------------------
-- Table structure for Roles
-- ----------------------------
DROP TABLE IF EXISTS `Roles`;
CREATE TABLE `Roles` (
  `id` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) NOT NULL,
  `date_add` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL,
  `date_del` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Roles
-- ----------------------------
INSERT INTO `Roles` VALUES ('1', 'admin', '2015-10-13 22:37:55', null, null);
INSERT INTO `Roles` VALUES ('2', 'user', '2015-10-13 22:38:16', null, null);

-- ----------------------------
-- Table structure for Status
-- ----------------------------
DROP TABLE IF EXISTS `Status`;
CREATE TABLE `Status` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name_status` varchar(255) NOT NULL,
  `date_add` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL,
  `date_del` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Status
-- ----------------------------
INSERT INTO `Status` VALUES ('1', 'allow', '2015-10-13 22:44:57', null, null);
INSERT INTO `Status` VALUES ('2', 'deny', '2015-10-13 22:45:00', null, null);
INSERT INTO `Status` VALUES ('3', 'normal', '2015-10-13 22:45:03', null, null);
INSERT INTO `Status` VALUES ('4', 'edited', '2015-10-13 22:45:05', null, null);
INSERT INTO `Status` VALUES ('5', 'deleted', '2015-10-13 22:45:08', null, null);

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` smallint(1) unsigned NOT NULL,
  `role` smallint(1) unsigned NOT NULL,
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL,
  `date_del` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `role` (`role`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status`) REFERENCES `Status` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role`) REFERENCES `Roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('1', 'Pauleg', 'grosesdorf@gmail.com', 'qwerty', '1', '2', '2015-10-13 22:39:14', null, null);
INSERT INTO `Users` VALUES ('2', 'Ivan', 'ivan@mail.ru', 'qwerty', '1', '2', '2015-10-14 16:43:00', null, null);
INSERT INTO `Users` VALUES ('3', 'Vladimir', 'vladimir@ya.ru', 'qwerty', '1', '2', '2015-10-14 16:43:26', null, null);
INSERT INTO `Users` VALUES ('4', 'Олег', 'oleg@ro.ru', 'qwerty', '1', '2', '2015-10-14 16:43:49', null, null);
INSERT INTO `Users` VALUES ('6', 'Vasya', 'vasya@ro.ru', 'qwerty', '1', '2', '2015-10-18 18:07:10', null, null);
INSERT INTO `Users` VALUES ('7', 'Valera', 'val@ro.ru', '123456', '1', '2', '2015-10-18 18:07:48', null, null);
INSERT INTO `Users` VALUES ('8', 'Ted', 'teodor@mail.ru', 'asdfgh', '1', '2', '2015-10-18 18:10:16', null, null);
INSERT INTO `Users` VALUES ('9', 'Lilu', 'lilu@ya.ru', 'zxcvbn', '1', '2', '2015-10-18 18:23:06', null, null);
INSERT INTO `Users` VALUES ('10', 'Igor', 'igorigor@outlook.com', 'dfghjk', '1', '2', '2015-10-18 18:33:37', null, null);
INSERT INTO `Users` VALUES ('11', 'Yoda', 'yoda@starwars.sk', 'qazwsx', '1', '2', '2015-10-18 20:53:33', null, null);
