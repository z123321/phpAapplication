/* This file is created by MySQLReback 2020-09-28 15:17:53 */
 /* 创建表结构 `ds_announce` */
 DROP TABLE IF EXISTS `ds_announce`;/* MySQLReback Separation */ CREATE TABLE `ds_announce` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `operator` varchar(45) NOT NULL DEFAULT '' COMMENT '发布人',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `image` varchar(255) NOT NULL COMMENT '标题图像',
  `viewer` varchar(10) NOT NULL DEFAULT 'all' COMMENT '查看权限 all:所有人  member:会员  center:报单中心 ',
  `tid` int(10) unsigned NOT NULL COMMENT '类别ID',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=755 ROW_FORMAT=DYNAMIC COMMENT='公告信息表';/* MySQLReback Separation */
 /* 创建表结构 `ds_announce_click` */
 DROP TABLE IF EXISTS `ds_announce_click`;/* MySQLReback Separation */ CREATE TABLE `ds_announce_click` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=131519 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `ds_announcetype` */
 DROP TABLE IF EXISTS `ds_announcetype`;/* MySQLReback Separation */ CREATE TABLE `ds_announcetype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别ID',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=24 ROW_FORMAT=DYNAMIC COMMENT='公告类别';/* MySQLReback Separation */
 /* 插入数据 `ds_announcetype` */
 INSERT INTO `ds_announcetype` VALUES ('1','每日早报'),('2','新手入门'),('3','会员答疑'),('4','教程');/* MySQLReback Separation */
 /* 创建表结构 `ds_auth_group` */
 DROP TABLE IF EXISTS `ds_auth_group`;/* MySQLReback Separation */ CREATE TABLE `ds_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(500) NOT NULL DEFAULT '',
  `description` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_auth_group` */
 INSERT INTO `ds_auth_group` VALUES ('7','首页管理员','1','13,14,15,16,17,18,19,20,21,22,23,24,25,26,9','能够管理首页推荐位'),('4','超级管理员','1','13,14,15,16,17,18,19,20,21,22,23,24,25,26,89,27,28,29,30,31,32,80,81,33,34,35,36,37,38,39,41,42,43,44,45,46,47,48,49,50,51,52,82,83,84,85,87,88,9,10,11,12,86,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,7913,14,15,16,17,18,19,20,21,22,23,24,25,26,89,27,28,29,30,31,32,80,81,33,34,35,36,37,38,39,41,42,43,44,45,46,47,48,49,50,51,52,82,83,84,85,87,88,9,10,11,12,86,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79','拥有所有权限的管理员'),('8','广告管理员','1','27,28,29,30,31,32,9','管理全部广告'),('9','分类管理员','1','33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,9','分类管理员'),('10','优惠券管理','1','53,54,55,56,57,58,59,60','优惠券管理');/* MySQLReback Separation */
 /* 创建表结构 `ds_auth_group_access` */
 DROP TABLE IF EXISTS `ds_auth_group_access`;/* MySQLReback Separation */ CREATE TABLE `ds_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_auth_group_access` */
 INSERT INTO `ds_auth_group_access` VALUES ('2651','4');/* MySQLReback Separation */
 /* 创建表结构 `ds_auth_rule` */
 DROP TABLE IF EXISTS `ds_auth_rule`;/* MySQLReback Separation */ CREATE TABLE `ds_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `mid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_auth_rule` */
 INSERT INTO `ds_auth_rule` VALUES ('9','Admin/Index/index','登录首页','1','1','','9'),('10','Admin/Websetting/index','基础配置','1','1','','9'),('11','Admin/Navsetting/index','导航配置','1','1','','9'),('12','Admin/Friendlink/index','友情链接配置','1','1','','9'),('13','Admin/Indexset/index','查看首页管理','1','1','','1'),('14','Admin/Indexset/addFloor','添加楼层','1','1','','1'),('15','Admin/Indexset/modifyFloor','修改楼层','1','1','','1'),('16','Admin/Indexset/deleteFloor','删除楼层','1','1','','1'),('17','Admin/Indexset/loadData','显示楼层图片广告','1','1','','1'),('18','Admin/Indexset/viewClass','查看可添加楼层','1','1','','1'),('19','Admin/Indexset/editAd','修改楼层广告','1','1','','1'),('20','Admin/Indexset/insertAd','添加楼层广告','1','1','','1'),('21','Admin/Indexset/deleteAd','删除楼层广告','1','1','','1'),('22','Admin/Indexset/createPic','添加楼层广告页面','1','1','','1'),('23','Admin/Indexset/createText','添加楼层文字广告页面','1','1','','1'),('24','Admin/Indexset/editPic','修改楼层广告页面','1','1','','1'),('25','Admin/Indexset/editText','修改楼层文字广告页面','1','1','','1'),('26','Admin/Indexset/loadText','显示楼层文字广告','1','1','','1'),('27','Admin/Adset/index','广告管理首页','1','1','','2'),('28','Admin/Adset/createAd','广告添加页面','1','1','','2'),('29','Admin/Adset/insertAd','广告添加','1','1','','2'),('30','Admin/Adset/editAd','广告修改页面','1','1','','2'),('31','Admin/Adset/updataAd','广告修改','1','1','','2'),('32','Admin/Adset/deleteAd','广告删除','1','1','','2'),('33','Admin/GoodsClass/index','商品分类显示','1','1','','4'),('34','Admin/GoodsClass/addClass','商品分类添加页面','1','1','','4'),('35','Admin/GoodsClass/modifyClass','商品分类修改页面','1','1','','4'),('36','Admin/GoodsClass/insertClass','商品分类添加','1','1','','4'),('37','Admin/GoodsClass/updataClass','商品分类修改','1','1','','4'),('38','Admin/GoodsClass/deleteClass','商品分类删除','1','1','','4'),('39','Admin/GoodsClass/viewClassId','商品分类显示分类id','1','1','','4'),('41','Admin/Goodsattr/index','商品属性查看','1','1','','4'),('42','Admin/Goodsattr/addAttr','商品属性添加页面','1','1','','4'),('43','Admin/Goodsattr/modifyAttr','商品属性修改页面','1','1','','4'),('44','Admin/Goodsattr/insertAttr','商品属性添加','1','1','','4'),('45','Admin/Goodsattr/updataAttr','商品属性修改','1','1','','4'),('46','Admin/Goodsattr/deleteAttr','商品属性删除','1','1','','4'),('47','Admin/Goodsbrand/index','商品品牌查看','1','1','','4'),('48','Admin/Goodsbrand/addBrand','商品品牌添加页面','1','1','','4'),('49','Admin/Goodsbrand/modifyBrand','商品品牌修改页面','1','1','','4'),('50','Admin/Goodsbrand/insertBrand','商品品牌添加','1','1','','4'),('51','Admin/Goodsbrand/updataBrand','商品品牌修改','1','1','','4'),('52','Admin/Goodsbrand/deleteBrand','商品品牌删除','1','1','','4'),('53','Admin/Couponmanage/index','显示优惠券组列表','1','1','','7'),('54','Admin/Couponmanage/coupons','优惠券详情列表','1','1','','7'),('55','Admin/Couponmanage/addCoupon','添加优惠券','1','1','','7'),('56','Admin/Couponmanage/modifyCoupon','修改优惠券','1','1','','7'),('57','Admin/Couponmanage/insertCoupon','优惠券添加','1','1','','7'),('58','Admin/Couponmanage/updataCoupon','优惠券修改','1','1','','7'),('59','Admin/Couponmanage/deleteCoupon','删除优惠券','1','1','','7'),('60','Admin/Couponmanage/couponState','更新优惠券状态','1','1','','7'),('62','Admin/Accesslist/index','权限列表页面','1','1','','10'),('63','Admin/Accesslist/addAccess','权限添加页面','1','1','','10'),('64','Admin/Accesslist/modifyAccess','权限修改页面','1','1','','10'),('65','Admin/Accesslist/insertAccess','权限添加','1','1','','10'),('66','Admin/Accesslist/updataAccess','权限修改','1','1','','10'),('67','Admin/Accesslist/deleteAccess','权限删除','1','1','','10'),('68','Admin/Accesslist/accessState','权限状态更新','1','1','','10'),('69','Admin/Grouplist/index','角色管理页面','1','1','','10'),('70','Admin/Grouplist/addGroup','角色添加页面','1','1','','10'),('71','Admin/Grouplist/modifyGroup','角色修改页面','1','1','','10'),('72','Admin/Grouplist/insertGroup','角色添加','1','1','','10'),('73','Admin/Grouplist/updataGroup','角色修改','1','1','','10'),('74','Admin/Grouplist/deleteGroup','角色删除','1','1','','10'),('75','Admin/Grouplist/groupState','角色状态更新','1','1','','10'),('76','Admin/Grouplist/groupMem','角色成员管理页面','1','1','','10'),('77','Admin/Grouplist/addMem','角色成员添加页面','1','1','','10'),('78','Admin/Grouplist/insertMem','角色成员添加','1','1','','10'),('79','Admin/Grouplist/deleteMem','角色成员删除','1','1','','10'),('80','Admin/Member/index','用户管理','1','1','','3'),('81','Admin/Memlevel/index','用户等级','1','1','','3'),('82','Admin/Goodsissue/index','商品发布','1','1','','5'),('83','Admin/Goodsup/index','商品上架','1','1','','5');/* MySQLReback Separation */
 /* 插入数据 `ds_auth_rule` */
 INSERT INTO `ds_auth_rule` VALUES ('84','Admin/Goodsdown/index','商品下架','1','1','','5');/* MySQLReback Separation */
 /* 插入数据 `ds_auth_rule` */
 INSERT INTO `ds_auth_rule` VALUES ('85','Admin/Ordermanage/index','订单管理','1','1','','6'),('86','Admin/Reviewmanage/index','评价管理','1','1','','9'),('87','Admin/Articleclasses/index','文章分类','1','1','','8'),('88','Admin/Articlemanage/index','文章管理','1','1','','8'),('89','Admin/index/mang','网站管理','1','1','','1');/* MySQLReback Separation */
 /* 创建表结构 `ds_bankcard` */
 DROP TABLE IF EXISTS `ds_bankcard`;/* MySQLReback Separation */ CREATE TABLE `ds_bankcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL COMMENT '中文名',
  `card` varchar(100) DEFAULT NULL,
  `kaihuhang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=824 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_bankcard` */
 INSERT INTO `ds_bankcard` VALUES ('821','1','中国建设银行','6217000360005195688','开户行啊'),('823','158148','中国工商银行','131321321321231','12132132123');/* MySQLReback Separation */
 /* 创建表结构 `ds_banner` */
 DROP TABLE IF EXISTS `ds_banner`;/* MySQLReback Separation */ CREATE TABLE `ds_banner` (
  `id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `href` varchar(100) DEFAULT NULL,
  `addtime` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_banner` */
 INSERT INTO `ds_banner` VALUES ('4','/Public/Uploads/20181117/3.jpg','#','',''),('2','/Public/Uploads/20181117/4.jpg','#','',''),('3','/Public/Uploads/20181117/2.jpg','#','',''),('1','/Public/Uploads/20181117/1.jpg','#','','');/* MySQLReback Separation */
 /* 创建表结构 `ds_complete` */
 DROP TABLE IF EXISTS `ds_complete`;/* MySQLReback Separation */ CREATE TABLE `ds_complete` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '会员编号',
  `pic` varchar(100) NOT NULL COMMENT '头像',
  `jinbi` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `addtime` int(10) NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=20115 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=278 ROW_FORMAT=DYNAMIC COMMENT='会员';/* MySQLReback Separation */
 /* 插入数据 `ds_complete` */
 INSERT INTO `ds_complete` VALUES ('20113','18888888888','/Public/Uploads/1559017160770.png','10.00','1','1559017161'),('20114','18888888888','/Public/Uploads/1559213060427.png','10.00','0','1559213061');/* MySQLReback Separation */
 /* 创建表结构 `ds_emoneydetail` */
 DROP TABLE IF EXISTS `ds_emoneydetail`;/* MySQLReback Separation */ CREATE TABLE `ds_emoneydetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '会员号',
  `mode` varchar(100) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL COMMENT '提现金额',
  `charge` decimal(15,0) DEFAULT NULL COMMENT '手续费',
  `payment` decimal(10,0) DEFAULT NULL COMMENT '实际支付',
  `kaihuhang` varchar(100) DEFAULT NULL,
  `card` varchar(255) NOT NULL COMMENT '提现银行卡',
  `wei` varchar(255) DEFAULT NULL,
  `zhifu` varchar(255) DEFAULT NULL,
  `addtime` int(10) DEFAULT NULL COMMENT '提现时间',
  `type` int(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `remark` varchar(100) NOT NULL COMMENT '描述',
  `status` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_emoneydetail` */
 INSERT INTO `ds_emoneydetail` VALUES ('22','18888888888','2','500','50','450','','','','/Public/Uploads//1545382386482.jpg','1545382985','2','申请提现500元,扣除50作为手续费扣除','1'),('23','18888888888','3','500','50','450','','','/Public/erwei/18888888888.png','','1545383003','3','申请提现500元,扣除50作为手续费扣除','1'),('24','18888888888','中国建设银行','500','50','450','开户行啊','6217000360005195688','','','1545383024','1','申请提现500元,扣除50作为手续费扣除','1'),('25','18888888888','2','50','2','48','','','','/Public/Uploads//1545382386482.jpg','1559197430','2','申请提现50元,扣除2作为手续费扣除','1'),('26','13073884398','2','50','2','48','','','','/Public/Uploads/1561200477328.jpg','1561200485','2','申请提现50元,扣除2作为手续费扣除','1'),('27','18888888888','2','1000','50','950','','','','/Public/Uploads/1570444737759.jpg','1570444765','2','申请提现1000元,扣除50作为手续费扣除','1'),('28','18888888888','中国工商银行','50','2','48','12132132123','131321321321231','','','1570445166','1','申请提现50元,扣除2作为手续费扣除','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_jinbidetail` */
 DROP TABLE IF EXISTS `ds_jinbidetail`;/* MySQLReback Separation */ CREATE TABLE `ds_jinbidetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `tgaward` varchar(255) DEFAULT NULL,
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(15,5) unsigned DEFAULT '0.00000' COMMENT '添加',
  `reduce` decimal(15,5) unsigned DEFAULT '0.00000' COMMENT '减少',
  `balance` decimal(15,5) unsigned DEFAULT '0.00000' COMMENT '余额',
  `addtime` int(10) DEFAULT '0' COMMENT '操作时间',
  `statustime` int(11) unsigned NOT NULL DEFAULT '0',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `member` (`member`),
  KEY `jid` (`jid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=514621 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=68 ROW_FORMAT=DYNAMIC COMMENT='金币明细';/* MySQLReback Separation */
 /* 插入数据 `ds_jinbidetail` */
 INSERT INTO `ds_jinbidetail` VALUES ('514586','0','2','18888888888','0','12.00000','0.00000','0.00000','1570527996','0','1级购买奖励','1'),('514587','0','2','18888888888','','7.00000','0.00000','0.00000','1570527996','0','2级购买奖励','1'),('514588','0','2','18888888888','','4.00000','0.00000','0.00000','1570527996','0','3级购买奖励','1'),('514589','31512','1','','18888888888','27.20683','0.00000','27091.59000','1570528788','0','光伏发电收益','1'),('514590','0','2','18888888888','','13.60342','0.00000','0.00000','1570528788','0','1级收益奖励','1'),('514591','0','2','18888888888','','6.80171','0.00000','0.00000','1570528788','0','2级收益奖励','1'),('514592','0','2','18888888888','','1.36034','0.00000','0.00000','1570528788','0','3级收益奖励','1'),('514593','31510','1','','18888888888','114.73736','0.00000','27206.33000','1570544929','0','光伏发电收益','1'),('514594','0','2','18888888888','','57.36868','0.00000','0.00000','1570544929','0','1级收益奖励','1'),('514595','0','2','18888888888','','28.68434','0.00000','0.00000','1570544929','0','2级收益奖励','1'),('514596','0','2','18888888888','','5.73687','0.00000','0.00000','1570544929','0','3级收益奖励','1'),('514597','31508','1','','18888888888','64.57591','0.00000','27270.91000','1570544948','0','光伏发电收益','1'),('514598','0','2','18888888888','','32.28796','0.00000','0.00000','1570544948','0','1级收益奖励','1'),('514599','0','2','18888888888','','16.14398','0.00000','0.00000','1570544948','0','2级收益奖励','1'),('514600','0','2','18888888888','','3.22880','0.00000','0.00000','1570544948','0','3级收益奖励','1'),('514601','31509','1','','18888888888','64.37259','0.00000','27335.28000','1570544964','0','光伏发电收益','1'),('514602','0','2','18888888888','','32.18629','0.00000','0.00000','1570544964','0','1级收益奖励','1'),('514603','0','2','18888888888','','16.09315','0.00000','0.00000','1570544964','0','2级收益奖励','1'),('514604','0','2','18888888888','','3.21863','0.00000','0.00000','1570544964','0','3级收益奖励','1'),('514605','31495','1','','18888888888','0.00000','0.00000','27335.28000','1570544979','0','光伏发电收益','1'),('514606','0','2','18888888888','','0.00000','0.00000','0.00000','1570544979','0','1级收益奖励','1'),('514607','0','2','18888888888','','0.00000','0.00000','0.00000','1570544979','0','2级收益奖励','1'),('514608','0','2','18888888888','','0.00000','0.00000','0.00000','1570544979','0','3级收益奖励','1'),('514609','31491','1','','18888888888','0.00000','0.00000','27335.28000','1570544985','0','光伏发电收益','1'),('514610','0','2','18888888888','','0.00000','0.00000','0.00000','1570544985','0','1级收益奖励','1'),('514611','0','2','18888888888','','0.00000','0.00000','0.00000','1570544985','0','2级收益奖励','1'),('514612','0','2','18888888888','','0.00000','0.00000','0.00000','1570544985','0','3级收益奖励','1'),('514613','0','0','','18888888888','0.00000','21.00000','27314.28000','1570560277','0','购买太阳能光伏（1800W）','1'),('514614','0','2','18888888888','0','12.00000','0.00000','0.00000','1570560277','0','1级购买奖励','1'),('514615','0','2','18888888888','','7.00000','0.00000','0.00000','1570560277','0','2级购买奖励','1'),('514616','0','2','18888888888','','4.00000','0.00000','0.00000','1570560277','0','3级购买奖励','1'),('514617','0','0','','17606651551','0.00000','21.00000','58.00000','1601276123','0','购买太阳能光伏（1800W）','1'),('514618','0','2','17606651551','18888888888','20.00000','0.00000','27334.28000','1601276123','0','1级购买奖励','1'),('514619','0','2','17606651551','','7.00000','0.00000','0.00000','1601276123','0','2级购买奖励','1'),('514620','0','2','17606651551','','4.00000','0.00000','0.00000','1601276123','0','3级购买奖励','1');/* MySQLReback Separation */
 /* 创建表结构 `ds_log` */
 DROP TABLE IF EXISTS `ds_log`;/* MySQLReback Separation */ CREATE TABLE `ds_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `logaccount` varchar(45) NOT NULL DEFAULT '' COMMENT '操作对应的账号',
  `logip` varchar(100) NOT NULL DEFAULT '' COMMENT '操作者IP',
  `logdesc` varchar(200) NOT NULL DEFAULT '' COMMENT '操作描述',
  `logtype` varchar(10) NOT NULL DEFAULT '' COMMENT '日志类型: member:会员日志 admin:管理员日志',
  `logiplocal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logtype` (`logtype`)
) ENGINE=MyISAM AUTO_INCREMENT=18707 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=68 ROW_FORMAT=DYNAMIC COMMENT='系统操作日志';/* MySQLReback Separation */
 /* 插入数据 `ds_log` */
 INSERT INTO `ds_log` VALUES ('18706','1601275874','17606651551','127.0.0.1','管理员[17606651551]清空日志','admin','本机地址');/* MySQLReback Separation */
 /* 创建表结构 `ds_member` */
 DROP TABLE IF EXISTS `ds_member`;/* MySQLReback Separation */ CREATE TABLE `ds_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '会员编号',
  `password` varchar(32) DEFAULT NULL COMMENT '一级密码',
  `level` int(4) DEFAULT '0',
  `regaddress` varchar(255) DEFAULT NULL COMMENT 'IP地址',
  `regdate` int(10) DEFAULT NULL COMMENT '注册时间',
  `parent` varchar(255) DEFAULT NULL COMMENT '推荐人',
  `parent_id` int(11) unsigned NOT NULL COMMENT '推荐人ID',
  `pic` varchar(100) NOT NULL COMMENT '头像',
  `jifen` decimal(10,0) DEFAULT '0',
  `erwei` varchar(255) DEFAULT NULL,
  `dongjie` decimal(15,2) DEFAULT '0.00' COMMENT '冻结金额',
  `parentcount` int(11) DEFAULT '0' COMMENT '推荐人数',
  `name` varchar(255) DEFAULT '会员',
  `money` decimal(15,2) unsigned DEFAULT '0.00' COMMENT '金币数量',
  `truename` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机',
  `logintime` int(10) DEFAULT '0' COMMENT '本次登录时间',
  `gamecount` int(10) DEFAULT '0',
  `robotcount` int(10) DEFAULT '0' COMMENT '机器人总数',
  `logincount` int(10) DEFAULT '0' COMMENT '登录总次数',
  `parentpath` longtext COMMENT '推荐遗传码',
  `online_time` int(10) DEFAULT NULL COMMENT '最后登陆时间',
  `wei` varchar(100) DEFAULT NULL,
  `zhifu` varchar(100) DEFAULT NULL,
  `lock` tinyint(4) DEFAULT NULL COMMENT '锁定',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `parent` (`parent`)
) ENGINE=MyISAM AUTO_INCREMENT=158165 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=278 ROW_FORMAT=DYNAMIC COMMENT='会员';/* MySQLReback Separation */
 /* 插入数据 `ds_member` */
 INSERT INTO `ds_member` VALUES ('158148','18888888888','e10adc3949ba59abbe56e057f20f883e','0','','1540644377','','0','/public/wx/wx/guanliyuan.jpg','20','/Public/erwei/18888888888.png','-1965.00','12','会员42345','27334.28','','18888888888','1570558551','53','45','171','','1570795664','','/Public/Uploads/1570444737759.jpg',''),('158164','17606651551','9ae81abd7711a46a9f0dc1d7b3cbfdf5','0','美国','1562851827','18888888888','158148','','0','/Public/erwei/17606651551.png','0.00','0','会员','58.00','张三','17606651551','1601275368','0','3','2','158148|','1601276551','','','');/* MySQLReback Separation */
 /* 创建表结构 `ds_member_award_log` */
 DROP TABLE IF EXISTS `ds_member_award_log`;/* MySQLReback Separation */ CREATE TABLE `ds_member_award_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `userortype_id` int(11) NOT NULL,
  `send_style` tinyint(1) NOT NULL,
  `num` int(11) NOT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_member_award_log` */
 INSERT INTO `ds_member_award_log` VALUES ('3','158148','1','0','1','2','1559184215'),('4','158148','1','0','1','3','1559184228'),('5','158148','1','0','1','3','1559184232'),('6','158148','1','0','1','3','1559184235'),('7','158148','1','0','1','3','1559184239'),('8','158148','1','0','1','3','1559184242'),('9','158148','1','0','1','3','1559184245'),('10','158148','1','0','1','3','1559184249'),('11','158148','1','0','1','3','1559184253');/* MySQLReback Separation */
 /* 创建表结构 `ds_member_recharge` */
 DROP TABLE IF EXISTS `ds_member_recharge`;/* MySQLReback Separation */ CREATE TABLE `ds_member_recharge` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(100) NOT NULL,
  `fkzh` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gbc` decimal(15,2) NOT NULL,
  `rmb` decimal(15,2) NOT NULL,
  `bili` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pay_type` varchar(30) NOT NULL,
  `note` varchar(100) NOT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员充值表';/* MySQLReback Separation */
 /* 创建表结构 `ds_message` */
 DROP TABLE IF EXISTS `ds_message`;/* MySQLReback Separation */ CREATE TABLE `ds_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(45) NOT NULL DEFAULT '' COMMENT '发件人',
  `pic` varchar(100) DEFAULT NULL COMMENT '头像',
  `truename` varchar(100) DEFAULT NULL,
  `content` text NOT NULL COMMENT '内容',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='站内信息表';/* MySQLReback Separation */
 /* 插入数据 `ds_message` */
 INSERT INTO `ds_message` VALUES ('23','18888888888','/public/wx/wx/guanliyuan.jpg','Leader','1','1542953506'),('24','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','2','1543589074'),('25','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','2','1543589074'),('26','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','2','1543589074'),('27','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','2','1543589074'),('28','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','2','1543589074'),('29','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','111','1543668403'),('30','18888888888','/public/wx/wx/guanliyuan.jpg','系统管理员','你好','1544015924'),('31','18295756368','/Public/touxiang/Uploads/touxiang//1544272504520.png','张碧莹','在','1544274836'),('32','18295756368','/Public/touxiang/Uploads/touxiang//1544272504520.png','张碧莹','在','1544274836'),('33','15581920309','/Public/Uploads/touxiang/1542770980918.png','乔运虎','nihao','1544274881');/* MySQLReback Separation */
 /* 创建表结构 `ds_node` */
 DROP TABLE IF EXISTS `ds_node`;/* MySQLReback Separation */ CREATE TABLE `ds_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `name` (`name`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=35 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_node` */
 INSERT INTO `ds_node` VALUES ('1','systemlogined','后台应用','1','','1','0','1'),('6','Rbac','Rbac权限控制','1','','6','1','2'),('7','Index','后台首页','1','','1','1','2'),('10','index','用户列表','1','','1','6','3'),('11','role','角色列表','1','','1','6','3'),('12','node','节点列表','1','','1','6','3'),('16','index','后台首页','1','','1','7','3'),('17','Member','会员管理','1','','2','1','2'),('18','uncheck','未审核会员','1','','1','17','3'),('19','check','会员查询','1','','1','17','3'),('20','pw_list','团队排位图','1','','1','17','3'),('21','shu_list','团队树形图','1','','1','17','3'),('22','Jinbidetail','资金管理','1','','4','1','2'),('23','index','pv明细','1','','1','22','3'),('24','paylists','充值管理','1','','1','22','3'),('25','emoneyWithdraw','提现管理','1','','1','22','3'),('26','shop','商城管理','1','','3','1','2'),('27','type_list','分类列表','1','','1','26','3'),('28','Info','信息交流','1','','5','1','2'),('29','announce','公告管理','1','','1','28','3'),('30','annType','公告类别','1','','1','28','3'),('31','msgReceive','收件箱','1','','1','28','3'),('32','msgSend','发件箱','1','','1','28','3'),('33','System','系统设置','1','','7','1','2'),('34','backUp','数据备份','1','','1','33','3'),('35','customSetting','自定义配置','1','','1','33','3'),('36',' jiangjin','奖金查询','1','','1','22','3'),('37','member_group','会员等级','1','','1','17','3'),('38','lists','商品列表','1','','1','26','3'),('39','orderlist','订单列表','1','','1','26','3'),('40','paylist','零售管理','1','','1','22','3'),('41','jinzhongzi','重消明细','1','','1','22','3'),('42','point','代金券明细','1','','1','22','3'),('43','editPay','零售操作','1','','1','22','3'),('44','editPays','充值操作','1','','1','22','3'),('45','editEmoney','提现操作','1','','1','22','3'),('46','editPayhandles','充值提交操作','1','','1','22','3');/* MySQLReback Separation */
 /* 创建表结构 `ds_order` */
 DROP TABLE IF EXISTS `ds_order`;/* MySQLReback Separation */ CREATE TABLE `ds_order` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) DEFAULT NULL,
  `tuijian` varchar(255) DEFAULT NULL COMMENT '推荐人',
  `user_id` int(11) unsigned NOT NULL,
  `project` varchar(30) DEFAULT NULL,
  `count` decimal(10,2) DEFAULT '0.00',
  `sumprice` decimal(10,2) NOT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `UG_getTime` int(11) unsigned NOT NULL DEFAULT '0',
  `zt` int(10) NOT NULL DEFAULT '0',
  `sid` int(11) DEFAULT NULL,
  `imagepath` text,
  `yxzq` varchar(60) DEFAULT NULL COMMENT '可运行时间小时',
  `shouyi` decimal(15,8) DEFAULT NULL COMMENT '收益每小时',
  `kjbh` varchar(255) DEFAULT NULL,
  `already_profit` decimal(15,8) NOT NULL COMMENT '已经收益',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31516 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_order` */
 INSERT INTO `ds_order` VALUES ('31514','18888888888','','158148','太阳能光伏（1800W）','0.00','21.00','2019-10-09 02:44:37','1570560277','1','3','/Public/Uploads/20191008/5d9ca996ef038.jpg','720','1.16000000','A096027775','0.00000000'),('31515','17606651551','18888888888','158164','太阳能光伏（1800W）','0.00','21.00','2020-09-28 14:55:23','1601276123','1','3','/Public/Uploads/20191008/5d9ca996ef038.jpg','720','1.16000000','A287612393','0.00000000');/* MySQLReback Separation */
 /* 创建表结构 `ds_paydetail` */
 DROP TABLE IF EXISTS `ds_paydetail`;/* MySQLReback Separation */ CREATE TABLE `ds_paydetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `addtime` int(11) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 创建表结构 `ds_product` */
 DROP TABLE IF EXISTS `ds_product`;/* MySQLReback Separation */ CREATE TABLE `ds_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `title` char(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` mediumint(9) NOT NULL DEFAULT '0',
  `yxzq` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `shouyi` decimal(15,8) unsigned NOT NULL DEFAULT '0.00000000',
  `thumb` char(255) NOT NULL DEFAULT 'pic.png',
  `content` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `inputtime` int(11) unsigned NOT NULL,
  `xiangou` int(11) NOT NULL COMMENT '限购',
  `is_on` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_product` */
 INSERT INTO `ds_product` VALUES ('3','1','太阳能光伏（1800W）','21.00','999969','720','1.16000000','/Public/Uploads/20191008/5d9ca996ef038.jpg','','0','1509817831','100','0'),('27','2','太阳能光伏（3700W）','368.00','4997','0','1.95170000','/Public/Uploads/20191008/5d9ca9be883b0.jpg','','0','1559197126','10','0'),('28','1','太阳能光伏（7000W）','588.00','2999','720','2.35720000','/Public/Uploads/20191008/5d9ca9e08ba60.jpg','','0','1559197175','10','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_qjinbidetail` */
 DROP TABLE IF EXISTS `ds_qjinbidetail`;/* MySQLReback Separation */ CREATE TABLE `ds_qjinbidetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '余额',
  `addtime` int(10) DEFAULT '0' COMMENT '操作时间',
  `statustime` int(11) unsigned NOT NULL DEFAULT '0',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `member` (`member`)
) ENGINE=MyISAM AUTO_INCREMENT=6921 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=68 ROW_FORMAT=DYNAMIC COMMENT='欠钱明细';/* MySQLReback Separation */
 /* 插入数据 `ds_qjinbidetail` */
 INSERT INTO `ds_qjinbidetail` VALUES ('6889','0','18888888888','20.00','0.00','0.00','1542369106','0','冻结购买任务金额20','1'),('6890','0','18888888888','100.00','0.00','0.00','1542385212','0','','1'),('6891','0','15581920309','20.00','0.00','0.00','1542772849','0','冻结购买任务金额20','1'),('6892','0','15581920309','20.00','0.00','0.00','1542773304','0','冻结购买任务金额20','1'),('6893','0','15581920309','20.00','0.00','0.00','1542773368','0','冻结购买任务金额20','1'),('6894','0','18888888888','20.00','0.00','0.00','1542892330','0','冻结购买任务金额20','1'),('6895','0','15581920309','80.00','0.00','0.00','1543027471','0','冻结购买任务金额80','1'),('6896','0','18295756368','20.00','0.00','0.00','1544273892','0','冻结购买任务金额20','1'),('6897','0','18903597331','20.00','0.00','0.00','1544275188','0','冻结购买任务金额20','1'),('6898','0','18295756368','65.00','0.00','0.00','1544276414','0',' 提现冻结','1'),('6899','0','18295756368','3000.00','0.00','0.00','1544276438','0',' 提现冻结','1'),('6900','0','18888888888','111.00','0.00','0.00','1545055012','0',' 提现冻结','1'),('6901','0','18888888888','100.00','0.00','0.00','1545056997','0',' 提现冻结','1'),('6902','0','18888888888','100.00','0.00','0.00','1545282508','0',' 提现冻结','1'),('6903','0','18888888888','0.00','100.00','0.00','1545282632','0','提现被拒','1'),('6904','0','18888888888','0.00','100.00','0.00','1545282820','0','提现被拒','1'),('6905','0','18888888888','200.00','0.00','0.00','1545283407','0',' 提现冻结','1'),('6906','0','18888888888','100.00','0.00','0.00','1545284220','0',' 提现冻结','1'),('6907','0','18888888888','50.00','0.00','0.00','1545365284','0',' 提现冻结','1'),('6908','0','18888888888','500.00','0.00','0.00','1545381918','0',' 提现冻结','1'),('6909','0','18888888888','0.00','500.00','0.00','1545382196','0','提现被拒','1'),('6910','0','18888888888','600.00','0.00','0.00','1545382202','0',' 提现冻结','1'),('6911','0','18888888888','500.00','0.00','0.00','1545382407','0',' 提现冻结','1'),('6912','0','18888888888','500.00','0.00','0.00','1545382437','0',' 提现冻结','1'),('6913','0','18888888888','500.00','0.00','0.00','1545382475','0',' 提现冻结','1'),('6914','0','18888888888','500.00','0.00','0.00','1545382985','0',' 提现冻结','1'),('6915','0','18888888888','500.00','0.00','0.00','1545383003','0',' 提现冻结','1'),('6916','0','18888888888','500.00','0.00','0.00','1545383024','0',' 提现冻结','1'),('6917','0','18888888888','50.00','0.00','0.00','1559197430','0',' 提现冻结','1'),('6918','0','13073884398','50.00','0.00','0.00','1561200485','0',' 提现冻结','1'),('6919','0','18888888888','1000.00','0.00','0.00','1570444765','0',' 提现冻结','1'),('6920','0','18888888888','50.00','0.00','0.00','1570445166','0',' 提现冻结','1');/* MySQLReback Separation */
 /* 创建表结构 `ds_session` */
 DROP TABLE IF EXISTS `ds_session`;/* MySQLReback Separation */ CREATE TABLE `ds_session` (
  `session_id` varchar(255) NOT NULL DEFAULT '',
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=196 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 创建表结构 `ds_sms_log` */
 DROP TABLE IF EXISTS `ds_sms_log`;/* MySQLReback Separation */ CREATE TABLE `ds_sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机号',
  `session_id` varchar(128) DEFAULT '' COMMENT 'session_id',
  `add_time` int(11) DEFAULT '0' COMMENT '发送时间',
  `code` varchar(10) DEFAULT '' COMMENT '验证码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24678 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_sms_log` */
 INSERT INTO `ds_sms_log` VALUES ('24646','15581920309','99fon7sc25938f77nq1a2eac56','1542770867','2732'),('24647','18035982029','l5drgugtkfpjogi3casmac6u51','1543292247','9159'),('24644','18903597331','5h6tcf1ovvuglkqj4pf836m9f6','1542770538','9176'),('24645','13103598345','5h6tcf1ovvuglkqj4pf836m9f6','1542770554','9176'),('24648','18295756368','8dd9cf3ea1fb3c63c6a774c0c587a84e','1543641363','5421'),('24649','18295756368','8dd9cf3ea1fb3c63c6a774c0c587a84e','1543642112','6573'),('24650','18295756368','8dd9cf3ea1fb3c63c6a774c0c587a84e','1543973499','7515'),('24651','18295756368','mg9qikmitst5js9cshqbeq81g4','1544272379','9569'),('24652','13753904686','p28cpmec2gm4ruo3th1vvpn682','1544275027','4245'),('24653','15581920309','a59u36jaac9k2c4qc3bd18t705','1544342262','5044'),('24654','13617334190','18gr38j1dm24681hs8efq739c3','1544354674','7402'),('24655','13103598345','25m261kmrns150f6u0qc73cej2','1545139653','7132'),('24656','18903597331','25m261kmrns150f6u0qc73cej2','1545158190','6246'),('24657','18903597333','25m261kmrns150f6u0qc73cej2','1545159900','8307'),('24658','13073884398','cqebq8d5hcklum6k66agbd6d61','1559430748','8217'),('24659','18718287351','cqebq8d5hcklum6k66agbd6d61','1559431078','8882'),('24660','13073884398','cqebq8d5hcklum6k66agbd6d61','1559431185','4883'),('24661','18718287351','cqebq8d5hcklum6k66agbd6d61','1559431297','4877'),('24662','13073884398','cqebq8d5hcklum6k66agbd6d61','1559431394','3187'),('24663','18718287351','cqebq8d5hcklum6k66agbd6d61','1559431513','6270'),('24664','18718287351','1ctc0lascko7dcqi1e730ku496','1561293331','7359'),('24665','13073884398','1ctc0lascko7dcqi1e730ku496','1561293449','4108'),('24666','18824438888','1ctc0lascko7dcqi1e730ku496','1561293494','1021'),('24667','18718287351','1ctc0lascko7dcqi1e730ku496','1561294003','8789'),('24668','13073884398','1ctc0lascko7dcqi1e730ku496','1561294095','8005'),('24669','18718287351','1ctc0lascko7dcqi1e730ku496','1561294215','4904'),('24670','13073884398','1ctc0lascko7dcqi1e730ku496','1561294290','6568'),('24671','18718287351','1ctc0lascko7dcqi1e730ku496','1561294409','2001'),('24672','13073884398','1ctc0lascko7dcqi1e730ku496','1561294493','4157'),('24673','18718287351','1ctc0lascko7dcqi1e730ku496','1561294602','7896'),('24674','13073884398','1ctc0lascko7dcqi1e730ku496','1561295575','4547'),('24675','17832092666','1ctc0lascko7dcqi1e730ku496','1561295679','8326'),('24676','17832092666','1ctc0lascko7dcqi1e730ku496','1561296264','3855'),('24677','17606651551','v441cdmrmi05kuui74uhps1ji4','1562851811','2327');/* MySQLReback Separation */
 /* 创建表结构 `ds_type` */
 DROP TABLE IF EXISTS `ds_type`;/* MySQLReback Separation */ CREATE TABLE `ds_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` char(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_type` */
 INSERT INTO `ds_type` VALUES ('1','A','0','0'),('2','B','0','0'),('3','C','0','0'),('4','D','0','0'),('5','E','0','0'),('6','F','0','0'),('7','G','0','0'),('8','H','0','0'),('9','I','0','0'),('10','J','0','0'),('11','K','0','0'),('12','L','0','0'),('13','M','0','0'),('14','N','0','0'),('15','O','0','0'),('16','P','0','0'),('17','Q','0','0'),('18','R','0','0'),('19','S','0','0'),('20','T','0','0'),('21','U','0','0'),('22','V','0','0'),('23','W','0','0'),('24','X','0','0'),('25','Y','0','0'),('26','Z','0','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_user` */
 DROP TABLE IF EXISTS `ds_user`;/* MySQLReback Separation */ CREATE TABLE `ds_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logtime` int(10) NOT NULL,
  `loginip` char(30) NOT NULL DEFAULT '',
  `lock` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=256 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_user` */
 INSERT INTO `ds_user` VALUES ('1','admin','e10adc3949ba59abbe56e057f20f883e','1601275310','127.0.0.1','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_xiangmu` */
 DROP TABLE IF EXISTS `ds_xiangmu`;/* MySQLReback Separation */ CREATE TABLE `ds_xiangmu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=755 ROW_FORMAT=DYNAMIC COMMENT='公告信息表';/* MySQLReback Separation */
 /* 插入数据 `ds_xiangmu` */
 INSERT INTO `ds_xiangmu` VALUES ('1','租赁一个太阳能每天可以赚多少钱？','亲，您好，租赁一个太阳能每天可以赚多少钱？','1542525927','1601275832');/* MySQLReback Separation */