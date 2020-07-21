<?php
$arr1=array(
	//'配置项'=>'配置值'
);
$arr2=include 'config.inc.php';  
return array_merge($arr1,$arr2);  
?>