<?php
session_start();
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./App/');

 	
define('BIND_MODULE','Home');


// // 获取网站所属用户名
// $prefix_array = explode('.',$_SERVER['HTTP_HOST']);
// $_SESSION['prefix']  =  $prefix_array['0'];
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

