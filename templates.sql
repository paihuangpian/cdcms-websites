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
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL DEFAULT '/Templates/Default/' COMMENT '模板路径',
  `name` varchar(255) NOT NULL COMMENT '模板名称',
  `type` tinyint(4) NOT NULL COMMENT '模板类型',
  `thumb` varchar(255) NOT NULL COMMENT '模板缩略图',
  `url` varchar(255) DEFAULT NULL,
  `dir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,'/Templates/Cms/Fuzhuang/Fuzhuang/Tongzhuang/','童装',13,'/Uploads/Admin/2016-10-11/57fcda258956d.png','demo_cms_0001.ydwzjs.cn','Tongzhuang'),(4,'/Templates/Cms/Shuma/JiasiJiaju/Jiazhuangsheji/','家私家具设计',1,'/Uploads/Admin/2016-10-11/57fce1a532ccb.jpg','demo_cms_0002.ydwzjs.cn','Jiazhuangsheji'),(3,'/Templates/Cms/Huagong/HuagongTuliao/hggy1i/','化工工业',1,'/Uploads/Admin/2016-10-11/57fce1b462b02.jpg','demo_cms_0003.ydwzjs.cn','hggy1i'),(5,'/Templates/Cms/It/WLjianshesheji/','网络建设',54,'/Uploads/Admin/2016-10-11/57fce136e2d72.png','demo_cms_0004.ydwzjs.cn','WLjianshesheji'),(6,'/Templates/Cms/Jiaoyu/Yiyuan/Yiliaojhgc/','医疗',69,'/Uploads/Admin/2016-10-11/57fce28f94844.png','demo_cms_0005.ydwzjs.cn','Yiliaojhgc'),(7,'/Templates/Cms/Canyin/Lvyou/Xiaohua/','风景',65,'/Uploads/Admin/2016-10-12/57fda6ce36afd.jpg','demo_cms_0006.ydwzjs.cn','Xiaohua'),(16,'/Templates/Cms/Jinrong/Fangdichan/Fdcqiyedaili/','房地产',42,'/Uploads/Admin/2016-10-12/57fda6ce36afd.jpg','demo_cms_0008.ydwzjs.cn','Fdcqiyedaili');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-12 12:48:01
