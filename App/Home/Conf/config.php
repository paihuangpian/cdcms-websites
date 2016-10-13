<?php
return array(
	

	'DB_TYPE'               =>     'mysql',    	 	              // 数据库类型
    'DB_HOST'               =>      '192.168.1.20', 	          // 服务器地址
    'DB_NAME'               =>      'cdcms',          	          // 数据库名
    'DB_USER'               =>      'root',      		          // 用户名
    'DB_PWD'                =>      'root',                       // 密码
    'DB_PREFIX'             =>      '',    		                  // 数据库表前缀
    'URL_MODEL'             =>      2,          		          //重写模式
   'SHOW_PAGE_TRACE'       =>      true,       		          //开启页面trace
    'URL_HTML_SUFFIX'       =>      'html',      		          //设置伪静态
    'TMPL_L_DELIM'    		=>      '{{',
    'TMPL_R_DELIM'    		=>      '}}',
	// 'TMPL_CACHE_TIME'       =>  1, 

    'TOKEN_ON'              =>      true,                       // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'            =>      '__hash__',                 // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'            =>      'md5',                      //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'           =>      true,                       //令牌验证出错后是否重置令牌 默认为true

    'VIEW_PATH'				=>		'./Templates/Default/',		//定义模版目录
    // 'TMPL_FILE_DEPR'		=>		'_',						//定义模板层级

    // 'MODULE_ALLOW_LIST'     =>         array('Home','Admin','User'),
);
