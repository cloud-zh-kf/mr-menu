<?php
$arr1=array(
	'DEFAULT_MODULE' => 'Admin', //设置默认的模块名
	//'配置项'=>'配置值'
);
$arr2=include 'function.php';  
return array_merge($arr1,$arr2);  
?>