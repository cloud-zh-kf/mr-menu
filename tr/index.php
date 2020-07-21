<?php
header("content-type:text/html;charset=utf-8");
define("APP_DEBUG",true);//开启调试模式
#define('COMMON_PATH','./Common/');
define("APP_PATH","./Web/");//定义应用目录
define("TEMP_PATH","./Manage/Tmp/");//系统配置缓存目录
define("ADMIN_PUBLIC",'https://'.$_SERVER['HTTP_HOST']."/tr/Manage/Admin/Public");//定义后台公用文件常量
require("./ThinkPHP/ThinkPHP.php");//引入ThinkPHP入口文件 
if(version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');
?>