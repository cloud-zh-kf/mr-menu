<?php
header("content-type:text/html;charset=utf-8");
define("APP_DEBUG",true);//开启调试模式
#define('COMMON_PATH','./Common/');
define("APP_PATH","./Manage/");//定义应用目录
define("TEMP_PATH","./Manage/Tmp/");//系统配置缓存目录
define("OPEN_CROPPED","0");//是否开启裁剪
define("ADMIN_PUBLIC",'https://'.$_SERVER['HTTP_HOST']."/tr/Manage/Admin/Public");//定义后台公用文件常量
#define('BIND_MODULE','Admin');  //定义默认模块，开启后隐藏模块名
require("./ThinkPHP/ThinkPHP.php");//引入ThinkPHP入口文件 

if(version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');

?>