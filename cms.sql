

--栏目表
create table if not exists `cms_column`(
	`column_id` int unsigned not null auto_increment primary key COMMENT '栏目id',
	`column_userid` int unsigned not null COMMENT '用户id',
	`column_name` varchar(255) not null COMMENT'栏目名称',
	`column_title` varchar(255) not null default '栏目title',
	`column_keywords` varchar(255) not null default '关键字',
	`column_description` text not null COMMENT '栏目描述',
	`column_pid` char(20) not null COMMENT '栏目父id',
	`column_type` char(20) not null default 'product' COMMENT '栏目类型 默认为产品类型 共两种类型 产品和资讯newss 封面cover',
	`column_path` varchar(255) not null COMMENT '栏目路径',
	`column_status` tinyint(1) not null default 0 COMMENT '栏目状态 0在前端显示 1不显示',
	`column_text` text COMMENT '栏目内容',
	`column_time` int not null COMMENT '添加时间'
)engine=innodb default charset=utf8;



--文章表
  create table if not exists `cms_article`(
   `article_id` int unsigned not null auto_increment primary key COMMENT '文章id',
   `article_userid` int unsigned not null COMMENT '用户id',
   `article_title` varchar(255) not null COMMENT '文章标题',
   `article_keywords` varchar(255) not null default '关键字',
   `article_description` text not null COMMENT '文章描述',
   `article_column` int unsigned not null COMMENT '所属栏目',
   `article_pic` varchar(255) not null default '/Templates/Default/Public/article_pic.jpg' COMMENT '文章缩略图',
   `article_publisher` char(50) default '未知发布者' COMMENT '发布者',
   `article_clicks` int unsigned default 0 COMMENT '点击数',
   `article_status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
   `article_text` text not null COMMENT '文章内容',
   `article_time` int not null COMMENT '添加时间'
   )engine=innodb default charset=utf8;



--网站配置表
create table if not exists `cms_config`(
	`config_id` int unsigned not null auto_increment primary key COMMENT '配置id',
	`config_userid` int unsigned not null COMMENT '用户id',
	`config_name` varchar(255) not null default '广州云狄网络科技有限公司' COMMENT '公司名称',
	`config_title` varchar(255) not null default '广州云狄网络科技有限公司' COMMENT '网站主标题',
	`config_keywords` varchar(255) not null default '云狄建站' COMMENT '站点关键字',
	`config_description` text COMMENT '站点描述',
	`config_about` text COMMENT '关于我们',
	`config_home` varchar(255) not null COMMENT '主页链接名',
	`config_ico` varchar(255) not null default '/Templates/Default/Public/default.ico' COMMENT '网站ico图标',
	`config_logo` varchar(255) not null default '/Templates/Default/Public/default.png' COMMENT '网站LOGO',
	`config_pic` varchar(255) not null default '/Templates/Default/Public/erweima.png' COMMENT '二维码',
	`config_tel` char(20) not null default '020-85026566' COMMENT '服务电话',
	`config_chuanzhen` varchar(255) not null COMMENT '传真',
	`config_phone` char(20) not null default '13711012007' COMMENT '手机',
	`config_customer` varchar(255) not null COMMENT '在线客服',
	`config_weibo` varchar(255) not null COMMENT '微博',
	`config_copyright` varchar(255) not null COMMENT '版权信息',
	`config_record` varchar(255) not null COMMENT '备案信息',
	`config_address` varchar(255) not null default '广州市白云区金沙洲沙凤商业大厦8楼' COMMENT '联系地址',
	`config_email` varchar(255) not null default 'yundijz@163.com' COMMENT '邮箱',
	`config_statistics` varchar(255) not null COMMENT '站长统计',
	`config_time` int unsigned not null COMMENT '添加时间'
)engine=innodb default charset=utf8;



--单页面表
create table if not exists `cms_single`(
	`single_id` int unsigned not null auto_increment primary key COMMENT 'id',
	`single_userid` int unsigned not null COMMENT '用户id',
	`single_title` varchar(255) not null UNIQUE COMMENT '标题',
	`single_keywords` varchar(255) not null COMMENT '关键字',
	`single_description` text COMMENT '描述',
	`single_text` text COMMENT '主体内容',
	`single_pic` varchar(255) 	COMMENT '缩略图',
	`single_status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
	`single_publisher` char(50) default '未知发布者' COMMENT '发布者',
	`single_num` int not null default 0 COMMENT '点击量',
	`single_time` int unsigned not null COMMENT '添加时间'
)engine=innodb default charset=utf8;




--轮播图
create table if not exists `cms_carousel`(
	`carousel_id` int unsigned not null auto_increment primary key COMMENT 'id',
	`carousel_userid` int unsigned not null COMMENT '用户id',
	`carousel_name` varchar(255) not null COMMENT '轮播图名',
  	`carousel_url` varchar(255) not null COMMENT '链接地址',
  	`carousel_pic` varchar(255) not null COMMENT '图片',
  	`carousel_status` tinyint(1) default '0' COMMENT '状态 0显示 1不显示',
 	`carousel_remarks` varchar(255) default null COMMENT '备注',
  	`carousel_addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;



--友情链接
create table if not exists `cms_friendship`(
	`friendship_id` int unsigned not null auto_increment primary key COMMENT 'id',
	`friendship_userid` int unsigned not null COMMENT '用户id',
	`friendship_name` varchar(255) NOT NULL COMMENT '连接名',
  	`friendship_url` varchar(255) NOT NULL COMMENT '连接地址',
  	`friendship_logo` varchar(255) DEFAULT NULL COMMENT '链接图片',
  	`friendship_email` varchar(255) DEFAULT NULL COMMENT '站长邮箱',
  	`friendship_status` tinyint(1) DEFAULT '0' COMMENT '连接状态 0显示 1不显示',
  	`friendship_remarks` varchar(255) DEFAULT NULL COMMENT '备注',
  	`friendship_addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;


--留言表
create table if not exists `cms_message`(
	`message_id` int unsigned not null auto_increment primary key COMMENT 'id',
	`message_userid` int unsigned not null COMMENT '用户id',
	`message_username` varchar(255) NOT NULL COMMENT '留言者姓名',
	`message_tel` varchar(255) NOT NULL COMMENT '留言者电话',
  	`message_url` varchar(255) NOT NULL COMMENT '留言页面',
  	`message_email` varchar(255) DEFAULT NULL COMMENT '留言者邮箱',
  	`message_qq` varchar(255) DEFAULT NULL COMMENT '留言者qq',
  	`message_text` text DEFAULT NULL COMMENT '留言内容',
  	`message_addtime` int unsigned default null COMMENT '留言时间'
)engine=innodb default charset=utf8;




--模板分类表
create table if not exists `tpl_type`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`name` varchar(255) COMMENT '模板分类名称',
	`pid` int COMMENT '模板父id',
	`path` varchar(255) COMMENT '路径',
  	`addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;


insert into tpl_type values(1,'服装、饰品、个人护理',0,123123123);
