/*
SQLyog  v12.2.6 (64 bit)
MySQL - 5.5.40 : Database - gamebeta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gamebeta` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gamebeta`;

/*Table structure for table `game_manager` */

DROP TABLE IF EXISTS `game_manager`;

CREATE TABLE `game_manager` (
  `manager_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `manager_account` varchar(20) DEFAULT NULL,
  `manager_salt` varchar(20) DEFAULT NULL,
  `manager_pwd` varchar(50) DEFAULT NULL,
  `manager_name` varchar(20) DEFAULT NULL,
  `manager_sex` int(1) DEFAULT NULL COMMENT '1男2女',
  `manager_role` varchar(255) DEFAULT NULL,
  `manager_email` varchar(20) DEFAULT NULL,
  `manager_mobile` varchar(11) DEFAULT NULL,
  `manager_head` varchar(50) DEFAULT NULL,
  `manager_status` int(1) DEFAULT '-1' COMMENT '1启用，-1未启用',
  `manager_note` varchar(255) DEFAULT NULL,
  `manager_jointime` int(13) DEFAULT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `game_manager` */

insert  into `game_manager`(`manager_id`,`manager_account`,`manager_salt`,`manager_pwd`,`manager_name`,`manager_sex`,`manager_role`,`manager_email`,`manager_mobile`,`manager_head`,`manager_status`,`manager_note`,`manager_jointime`) values 
(1,'admin','591542696ff06','7bd46afa3189f86d92aaa17b53ceb273','刘江江',1,'4','469028589@qq.com','18234070211',NULL,-1,'',1494565481),
(2,'测试管理员1','591542d1d339d','0788de0393c819b184346efc67a826a5','测试',1,'4','123@12.com','13212341234',NULL,-1,'',1494565585);

/*Table structure for table `game_menu` */

DROP TABLE IF EXISTS `game_menu`;

CREATE TABLE `game_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) DEFAULT NULL,
  `menu_pid` int(11) DEFAULT '0',
  `menu_level` int(1) DEFAULT '1',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `game_menu` */

insert  into `game_menu`(`menu_id`,`menu_name`,`menu_pid`,`menu_level`) values 
(1,'系统管理',0,1),
(2,'按钮管理',1,2),
(3,'系统设置',1,2),
(4,'栏目管理',1,2),
(5,'管理员管理',0,1),
(6,'角色管理',5,2),
(7,'权限管理',5,2),
(8,'管理员列表',5,2);

/*Table structure for table `game_power` */

DROP TABLE IF EXISTS `game_power`;

CREATE TABLE `game_power` (
  `power_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `power_name` varchar(50) DEFAULT NULL,
  `power_url` varchar(50) DEFAULT NULL,
  `power_menu` int(10) DEFAULT NULL,
  `power_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`power_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `game_power` */

insert  into `game_power`(`power_id`,`power_name`,`power_url`,`power_menu`,`power_note`) values 
(16,'添加角色','Manager/save_role',6,'1'),
(15,'角色列表','Manager/list_role',6,''),
(12,'权限节点查看','Manager/list_power',7,''),
(13,'添加权限节点','Manager/save_power',7,''),
(14,'修改权限节点','Manager/edit_power',7,''),
(17,'修改角色','Manager/edit_role',6,'');

/*Table structure for table `game_role` */

DROP TABLE IF EXISTS `game_role`;

CREATE TABLE `game_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `role_note` varchar(255) DEFAULT NULL,
  `role_power` text,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `game_role` */

insert  into `game_role`(`role_id`,`role_name`,`role_note`,`role_power`) values 
(4,'测试角色管理','','a:3:{i:0;s:2:\"16\";i:1;s:2:\"15\";i:2;s:2:\"17\";}'),
(5,'测试权限管理','','a:3:{i:0;s:2:\"12\";i:1;s:2:\"13\";i:2;s:2:\"14\";}');

/*Table structure for table `game_system` */

DROP TABLE IF EXISTS `game_system`;

CREATE TABLE `game_system` (
  `system_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `system_key` varchar(255) DEFAULT NULL,
  `system_value` text,
  PRIMARY KEY (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=sjis;

/*Data for the table `game_system` */

insert  into `game_system`(`system_id`,`system_key`,`system_value`) values 
(1,'system_sitename','佑祥??'),
(2,'system_keywords','引爆平台,引爆流量'),
(3,'system_description','引爆平台,引爆流量'),
(4,'system_static','/static'),
(5,'system_upload','/upload'),
(6,'system_copyright','微奥所有'),
(7,'system_icp',''),
(8,'system_count',''),
(9,'system_allowip',''),
(10,'system_login','5'),
(11,'system_send',''),
(12,'system_smtphost',''),
(13,'system_smtpport','25'),
(14,'system_emailaccount','admin'),
(15,'system_emailpwd','123123'),
(16,'system_emailaddr','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
