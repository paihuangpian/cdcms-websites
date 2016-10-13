-- MySQL dump 10.13  Distrib 5.5.23, for Linux (i686)
--
-- Host: localhost    Database: cdcms
-- ------------------------------------------------------
-- Server version	5.5.23-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `template_type`
--

DROP TABLE IF EXISTS `template_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) DEFAULT NULL COMMENT '模板分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '模板父id',
  `path` varchar(255) DEFAULT '0' COMMENT '路径',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_type`
--

LOCK TABLES `template_type` WRITE;
/*!40000 ALTER TABLE `template_type` DISABLE KEYS */;
INSERT INTO `template_type` VALUES (1,'服装、饰品、个人护理 ',0,'/Templates/Cms/Fuzhuang/',NULL),(2,'文化、广告、设计服务',0,'/Templates/Cms/Wenhua/',NULL),(3,'五金、设备、工业制品',0,'/Templates/Cms/Wujin/',NULL),(4,'IT、互联网、行业门户',0,'/Templates/Cms/It/',NULL),(5,'教育、政府、机构组织 ',0,'/Templates/Cms/Jiaoyu/',NULL),(6,'化工、原材料、农畜牧',0,'/Templates/Cms/Huagong/',NULL),(7,'金融、运输、工商服务',0,'/Templates/Cms/Jinrong/',NULL),(8,'食品、茶饮、养生保健',0,'/Templates/Cms/Shipin/',NULL),(9,'数码、家具、家居百货',0,'/Templates/Cms/Shuma/',NULL),(10,'婚庆、摄影、生活服务',0,'/Templates/Cms/Sheying/',NULL),(11,'餐饮、酒店、旅游服务',0,'/Templates/Cms/Canyin/',NULL),(12,'礼品、玩具、小商品 ',0,'/Templates/Cms/lipin/',NULL),(13,'服装',1,'/Templates/Cms/Fuzhuang/Fuzhuang/',NULL),(14,'饰品',1,'/Templates/Cms/Fuzhuang/Shipin/',NULL),(15,'鞋帽箱包',1,'/Templates/Cms/Fuzhuang/XiemaoXiangbao/',NULL),(16,'户外用品',1,'/Templates/Cms/Fuzhuang/XiemaoXiangbao/',NULL),(17,'美容护肤',1,'/Templates/Cms/Fuzhuang/MeirongHufu/',NULL),(18,'广告',2,'/Templates/Cms/Wenhua/Guanggao/',NULL),(19,'文化传媒',2,'/Templates/Cms/Wenhua/WenhuaChuanmei/',NULL),(20,'印刷包装',2,'/Templates/Cms/Wenhua/YinshuaBaoz/',NULL),(21,'展览设计',2,'/Templates/Cms/Wenhua/Guanggao/',NULL),(22,'园林设计',2,'/Templates/Cms/Wenhua/YuanlinSheji/',NULL),(23,'五金',3,'/Templates/Cms/Wujin/Wujin/',NULL),(24,'门窗照明',3,'/Templates/Cms/Wujin/MenchuangZhaoming/',NULL),(25,'汽车汽配',3,'/Templates/Cms/Wujin/QichePeijian/',NULL),(26,'电子电工',3,'/Templates/Cms/Wujin/DianziDiangong/',NULL),(27,'机械设备',3,'/Templates/Cms/Wujin/JiqiShebei/',NULL),(28,'仪器器材',3,'/Templates/Cms/Wujin/YiqiQicai/',NULL),(29,'安防监控',3,'/Templates/Cms/Wujin/AnquanJiankong/',NULL),(30,'学校',5,'/Templates/Cms/Jiaoyu/Xuexiao/',NULL),(31,'政府',5,'/Templates/Cms/Jiaoyu/Zhengfu/',NULL),(32,'教育培训',5,'/Templates/Cms/Jiaoyu/JiaoyuPeixun/',NULL),(33,'机构组织',5,'/Templates/Cms/Jiaoyu/JigouZuzhi/',NULL),(34,'建筑建材',6,'//Templates/Cms/Huagong/JianzhuJiancai/',NULL),(35,'纺织辅料',6,'/Templates/Cms/Huagong/FangzhiFuliao/',NULL),(36,'化工涂料',6,'/Templates/Cms/Huagong/HuagongTuliao/',NULL),(37,'橡胶塑料',6,'/Templates/Cms/Huagong/XiangjiaoSuliao/',NULL),(38,'环保回收',6,'/Templates/Cms/Huagong/HuanbaoHuishou/',NULL),(39,'农业畜牧',6,'/Templates/Cms/Huagong/NongyeXumu/',NULL),(40,'贸易',7,'/Templates/Cms/Jinrong/Maoyi/',NULL),(41,'运输',7,'/Templates/Cms/Jinrong/Yunshu/',NULL),(42,'房地产',7,'/Templates/Cms/Jinrong/Fangdichan/',NULL),(43,'金融保险',7,'/Templates/Cms/Jinrong/JinrongBaoxian/',NULL),(44,'工商服务',7,'/Templates/Cms/Jinrong/GongshangFuwu/',NULL),(45,'人力资源',7,'/Templates/Cms/Jinrong/RenliZiyuan/',NULL),(46,'法律服务',7,'/Templates/Cms/Jinrong/FalvFuwu/',NULL),(47,'蔬果',8,'/Templates/Cms/Shipin/Shuguo/',NULL),(48,'茶叶',8,'/Templates/Cms/Shipin/Chaye/',NULL),(49,'酒类',8,'/Templates/Cms/Shipin/Jiulei/',NULL),(50,'食品饮料',8,'/Templates/Cms/Shipin/ShipinYinliao/',NULL),(51,'电脑',9,'/Templates/Cms/Shuma/Diannao/',NULL),(52,'电器',9,'/Templates/Cms/Shuma/Dianqi/',NULL),(53,'手机数码',9,'/Templates/Cms/Shuma/ShoujiShuma/',NULL),(54,'家私家具',9,'/Templates/Cms/Shuma/JiasiJiaju/',NULL),(55,'家居家纺',9,'/Templates/Cms/Shuma/Diannao/',NULL),(56,'日用百货',9,'/Templates/Cms/Shuma/RiyongBaihuo/',NULL),(57,'鲜花',10,'/Templates/Cms/Sheying/Xianhua/',NULL),(58,'婚庆',10,'/Templates/Cms/Sheying/Hunqing/',NULL),(59,'摄影',10,'/Templates/Cms/Sheying/Sheying/',NULL),(60,'宠物',10,'/Templates/Cms/Sheying/Chongwu/',NULL),(61,'装修',10,'/Templates/Cms/Sheying/Zhuangxui/',NULL),(62,'生活服务',10,'/Templates/Cms/Sheying/ShenghuoFuwu/',NULL),(63,'餐饮',11,'/Templates/Cms/Canyin/Yinliao/',NULL),(64,'酒店',11,'/Templates/Cms/Canyin/Jiudian/',NULL),(65,'旅游',11,'/Templates/Cms/Canyin/Lvyou/',NULL),(66,'礼品',12,'/Templates/Cms/lipin/Lipin/',NULL),(67,'文具',12,'/Templates/Cms/lipin/wenju/',NULL),(68,'玩具乐器',12,'/Templates/Cms/lipin/WanjuYueqi/',NULL);
/*!40000 ALTER TABLE `template_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-11 20:23:40
