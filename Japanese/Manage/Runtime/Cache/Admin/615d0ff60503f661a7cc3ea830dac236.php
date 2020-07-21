<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理页面</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
     
    <div class="welinfo"><b><?php echo (session('admin_username')); ?>，欢迎使用信息管理系统</b><?php if($_SESSION['admin_role_auth_ids']== 0): ?><a href="<?php echo U('Manager/Person');?>">帐号设置</a><?php endif; ?></div>
      
    <div class="xline"></div>
    
    <ul class="iconlist">
	<table width='100%' height="351" border="1" cellpadding="1" cellspacing="0" bordercolorlight="#c0c0c0" bordercolordark="#FFFFFF">
		  <tr>
			<td height="27" colspan="2" align="center" bgcolor="#ffffff" class="red_3"><strong>服务器的有关参数</strong></td>
		  </tr>
		  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td width="26%" height="23">&nbsp;<?php echo ($key); ?>：</td>
			<td width="74%" height="23">&nbsp;<?php echo ($v); ?></td>
		  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		  <tr>
			<td height="23" colspan="2">&nbsp;</td>
		  </tr>
      </table>
    </ul>
 </div>
</body>

</html>