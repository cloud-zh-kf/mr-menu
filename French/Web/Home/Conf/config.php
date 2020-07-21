<?php
$arr1=array(
    'DEFAULT_MODULE' => 'Home',
	'HTML_CACHE_ON'     =>    false, // 开启静态缓存
	'HTML_CACHE_TIME'   =>    10,   // 全局静态缓存有效期（秒）
	'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
	'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则   '静态地址'    =>     array('静态规则', '有效期', '附加规则'), 
	 	/* 'Index:Index'    			=>     array('Index'), 
	 	 'List:About'  				=>     array('ListAbout-{pid}-{ty}'), 
	 	 'Goddess:Home'  			=>     array('GoddessHome-{id}'), */
	 	  
 	) 
);
$arr2=include 'config.inc.php';  
return array_merge($arr1,$arr2);  
?>