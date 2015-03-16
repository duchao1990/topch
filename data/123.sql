-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.5-10.0.14-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 methink 的数据库结构
CREATE DATABASE IF NOT EXISTS `methink` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `methink`;


-- 导出  表 methink.ad_control 结构
CREATE TABLE IF NOT EXISTS `ad_control` (
  `control_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '操作id',
  `contro_name` varchar(20) NOT NULL DEFAULT '0' COMMENT '操作名',
  `c` varchar(20) NOT NULL DEFAULT '0' COMMENT '控制器名controller',
  `v` varchar(20) NOT NULL DEFAULT '0' COMMENT '方法名',
  `is_display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示,0为不显示,1为显示',
  `sort_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '显示顺序',
  PRIMARY KEY (`control_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='操作';

-- 正在导出表  methink.ad_control 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `ad_control` DISABLE KEYS */;
INSERT INTO `ad_control` (`control_id`, `contro_name`, `c`, `v`, `is_display`, `sort_id`) VALUES
	(1, '控制台显示', 'index', 'index', 0, 0);
/*!40000 ALTER TABLE `ad_control` ENABLE KEYS */;


-- 导出  表 methink.ad_department 结构
CREATE TABLE IF NOT EXISTS `ad_department` (
  `depart_Id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `parent_id` int(11) NOT NULL COMMENT '父类id',
  `depart_name` varchar(12) NOT NULL COMMENT '部门名称',
  `description` varchar(250) NOT NULL COMMENT '部门描述',
  PRIMARY KEY (`depart_Id`),
  UNIQUE KEY `depart_name` (`depart_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='部门';

-- 正在导出表  methink.ad_department 的数据：~5 rows (大约)
/*!40000 ALTER TABLE `ad_department` DISABLE KEYS */;
INSERT INTO `ad_department` (`depart_Id`, `parent_id`, `depart_name`, `description`) VALUES
	(1, 0, '总裁办公室', '经理级别'),
	(8, 1, '运营中心', '网站运营部'),
	(9, 1, '设计中心', '网站产品部'),
	(10, 1, '研发中心', '系统研发部'),
	(11, 1, '人资中心', '人力资源部门');
/*!40000 ALTER TABLE `ad_department` ENABLE KEYS */;


-- 导出  表 methink.ad_navi 结构
CREATE TABLE IF NOT EXISTS `ad_navi` (
  `naviId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `naviname` char(50) NOT NULL DEFAULT '0' COMMENT '导航名字',
  `c` char(50) DEFAULT '0' COMMENT '控制器',
  `v` char(50) DEFAULT '0' COMMENT '方法',
  `control_ids` varchar(350) DEFAULT '0' COMMENT '行为id',
  `sort_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '显示顺序',
  `desc` varchar(250) NOT NULL DEFAULT '0' COMMENT '描述',
  PRIMARY KEY (`naviId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='导航条';

-- 正在导出表  methink.ad_navi 的数据：~17 rows (大约)
/*!40000 ALTER TABLE `ad_navi` DISABLE KEYS */;
INSERT INTO `ad_navi` (`naviId`, `parent_id`, `naviname`, `c`, `v`, `control_ids`, `sort_id`, `desc`) VALUES
	(1, 0, '控制台', 'index', 'index', '1', 1, '0'),
	(2, 0, '设置', '', '', '0', 2, '0'),
	(3, 0, '商品', 'pro', 'index', '0', 3, '0'),
	(4, 0, '交易', '0', '0', '0', 4, '0'),
	(5, 0, '会员', '0', '0', '0', 5, '0'),
	(6, 0, '网站', '0', '0', '0', 6, '0'),
	(7, 0, '运营', '0', '0', '0', 7, '0'),
	(8, 2, '导航管理', 'nav', 'index', '0', 1, '0'),
	(9, 2, '用户管理', 'member', 'index', '0', 2, '0'),
	(10, 2, '邮箱设置', 'mail', 'index', '0', 3, '0'),
	(11, 2, '支付方式', 'pay', 'index', '0', 4, '0'),
	(12, 2, '快递公司', 'express', 'index', '0', 5, '0'),
	(13, 9, '用户信息', 'user', 'userInfo', '0', 1, '0'),
	(14, 9, '用户权限', '0', '0', '0', 2, '0'),
	(15, 9, '用户行为', '0', '0', '0', 3, '0'),
	(16, 9, '用户日志', '0', '0', '0', 4, '0'),
	(17, 9, '用户添加', 'user', 'adduser', '0', 0, '0');
/*!40000 ALTER TABLE `ad_navi` ENABLE KEYS */;


-- 导出  表 methink.ad_role 结构
CREATE TABLE IF NOT EXISTS `ad_role` (
  `roleId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(50) NOT NULL COMMENT '角色名称',
  `depart_id` tinyint(4) unsigned NOT NULL COMMENT '部门id',
  `naviId` varchar(50) DEFAULT NULL COMMENT '可以访问的导航ID',
  `description` varchar(250) DEFAULT NULL COMMENT '角色描述',
  PRIMARY KEY (`roleId`),
  UNIQUE KEY `role_name` (`role_name`),
  KEY `navi` (`naviId`),
  KEY `depart_id` (`depart_id`),
  CONSTRAINT `depart_id` FOREIGN KEY (`depart_id`) REFERENCES `ad_department` (`depart_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

-- 正在导出表  methink.ad_role 的数据：~2 rows (大约)
/*!40000 ALTER TABLE `ad_role` DISABLE KEYS */;
INSERT INTO `ad_role` (`roleId`, `role_name`, `depart_id`, `naviId`, `description`) VALUES
	(1, '超级管理员', 1, NULL, NULL),
	(3, 'php程序员', 9, NULL, '程序开发者');
/*!40000 ALTER TABLE `ad_role` ENABLE KEYS */;


-- 导出  表 methink.ad_user 结构
CREATE TABLE IF NOT EXISTS `ad_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `uname` varchar(12) NOT NULL COMMENT '用户名',
  `pwd` char(32) NOT NULL COMMENT '密码',
  `sex` tinyint(1) unsigned DEFAULT '1' COMMENT '性别,0为女,1为男',
  `salt` char(9) NOT NULL COMMENT '随机码',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户账号状态:0冻结,1正常',
  `roleId` tinyint(3) unsigned NOT NULL COMMENT '角色',
  `mobile` char(11) DEFAULT NULL COMMENT '电话号码',
  `qq` char(12) DEFAULT NULL COMMENT 'qq号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `icon` char(50) DEFAULT NULL COMMENT '头像',
  `wId` varchar(50) DEFAULT NULL COMMENT '微信Id',
  `address` varchar(50) DEFAULT NULL COMMENT '地址',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`uname`),
  KEY `roleId` (`roleId`),
  CONSTRAINT `roleId` FOREIGN KEY (`roleId`) REFERENCES `ad_role` (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- 正在导出表  methink.ad_user 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `ad_user` DISABLE KEYS */;
INSERT INTO `ad_user` (`uid`, `uname`, `pwd`, `sex`, `salt`, `status`, `roleId`, `mobile`, `qq`, `email`, `icon`, `wId`, `address`) VALUES
	(1, 'admin', '2b612daa718d413e575a9efc97767ac6', 1, 'skqwdcer', 1, 1, '18339836275', '384652412', '384652412@qq.com', NULL, '123456', '金水区');
/*!40000 ALTER TABLE `ad_user` ENABLE KEYS */;


-- 导出  表 methink.t_r 结构
CREATE TABLE IF NOT EXISTS `t_r` (
  `Name` char(50) DEFAULT NULL,
  `Action` char(50) DEFAULT NULL,
  `Account` int(11) DEFAULT NULL,
  `kd_price` varchar(15) DEFAULT NULL,
  `es_price` varchar(15) DEFAULT NULL,
  `py_price` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='测试sql语句';

-- 正在导出表  methink.t_r 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `t_r` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_r` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
