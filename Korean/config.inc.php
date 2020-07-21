<?php
return array(
	 //'配置项'=>'配置值'
	
    'DB_TYPE'               =>  'mysql',      // 数据库类型
    'DB_HOST'               =>  'rm-j6c36d988od8557t348790.mariadb.rds.aliyuncs.com',  // 服务器地址
    'DB_NAME'               =>  'br_men',// 数据库名
    'DB_USER'               =>  'www',       // 用户名
    'DB_PWD'                =>  'mrMenu88!',     // 密码
    'DB_PORT'               =>  '3306',       // 端口
    'DB_PREFIX'             =>  'tpko_',    	  // 数据库表前缀
 	'SHOW_PAGE_TRACE'		=>	false,		  //开启报错
    'SHOW_ERROR_MSG' 		=>  true, 		  // 显示错误信息
	'ERROR_PAGE'			=>	'404.html',	  //错误定向页面
	'DEFAULT_FILTER' 		=> 'trim,htmlspecialchars',//过滤

    'BANNER_NUM' =>'2',                         //Banner数量，最多支持3个，数量大于0为开启
    'BANNER_NAME' =>'通栏图片,栏目图片',            //Banner名称
    'BANNER_SIZE' =>'1920*286,170*80',     //Banner尺寸

    /************ 图片相关的配置 ***************/
    'IMAGE_CONFIG' => array(
    	'maxSize' => 1024*1024,
    	'exts' => array('jpg', 'gif', 'png', 'jpeg'),
    	'rootPath' => './Uploads/image/',  // 上传图片的保存路径  -> PHP要使用的路径，硬盘上的路径
    	'viewPath' => '/Uploads/image/',   // 显示图片时的路径    -> 浏览器用的路径，相对网站根目录
    ),
	
    /************ 文件相关的配置 ***************/
    'File_CONFIG' => array(
    	'maxSize' => 1024*1024*10,
    	'exts' => array('rar', 'zip', 'doc','docx'),
    	'rootPath' => './Uploads/file/',  // 上传图片的保存路径  -> PHP要使用的路径，硬盘上的路径
    	'viewPath' => '/Uploads/file/',   // 显示图片时的路径    -> 浏览器用的路径，相对网站根目录
    ),

    //自定义数组
    "zt" => array ("1"=>"成交"),
    "ispay" => array ("0"=>"未支付","1"=>"部分支付","2"=>"全部支付"),
    "iszt" => array ("0"=>"审核中","1"=>"在售","2"=>"已预定","3"=>"交接中","4"=>"已售出"),
    "isstock" => array ("0"=>"未付款","1"=>"已预定","2"=>"交接中","3"=>"已完成"),
    "isstate" => array ("99"=>"全部","0"=>"未审核","1"=>"已审核"),
    "zid" => array ("1"=>"支付宝","2"=>"微信"),
    "typeid" => array ("1"=>"作品","2"=>"协会","3"=>"院系管理"),
    "model_fields" => array ("1"=>"标题","2"=>"标签","3"=>"推荐","4"=>"置顶","5"=>"外链","6"=>"摘要","7"=>"SEO关键字","8"=>"SEO描述","9"=>"详情","10"=>"配置图片","11"=>"文件上传","12"=>"来源","13"=>"作者","14"=>"价格","15"=>"人气","16"=>"多图"),


 	//Memcache
	/*'DATA_CACHE_PREFIX' => 'Memcache_',//缓存前缀 	
	'DATA_CACHE_TYPE' => 'Memcache', //设置缓存方式为file         
	'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211', //端口号   
	'DATA_CACHE_TIME' => '3600',*/  // 数据缓存有效期 0表示永久缓存
	
	/*'DATA_CACHE_PREFIX' => 'Redis_',//缓存前缀
    'DATA_CACHE_TYPE'=>'Redis',//默认动态缓存为Redis
    'REDIS_RW_SEPARATE' => false, //Redis读写分离 true 开启
    'REDIS_HOST'=>'127.0.0.1', //redis服务器ip，多台用逗号隔开；读写分离开启时，第一台负责写，其它[随机]负责读；
    'REDIS_PORT'=>'6379',//端口号
    'REDIS_TIMEOUT'=>'30',//超时时间
    'REDIS_PERSISTENT'=>false,//是否长连接 false=短连接
    'REDIS_AUTH'=>'test123',//AUTH认证密码
    'DATA_CACHE_TIME'       => 3600,*/   
	
	//文件缓存
 	'DATA_CACHE_TYPE'=>'File',
	'DATA_CACHE_TIME'=>'1',
	//'DATA_CACHE_SUBDIR'=>true,//开启子目录
	//'DATA_CACHE_LEVEL'=>3,//设置子目录的层次
);
?>