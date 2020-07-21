<?php
$arr1=array(
    'MODULE_ALLOW_LIST' => array ('Home','Admin'),
	'TMPL_ACTION_SUCCESS'=>THINK_PATH.'Tpl/mydispatch_jump.tpl',
	'TMPL_ACTION_ERROR'=>THINK_PATH.'Tpl/mydispatch_jump.tpl',


);
$arr2=include 'function.php';  
return array_merge($arr1,$arr2);  
?>