<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理页面</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
</head>

<body style="background:url(<?php echo (ADMIN_PUBLIC); ?>/images/topbg.gif) repeat-x;">
    <div class="topleft" style="font-size:28px; font-weight:bold; color:#FFFFFF; padding-top:10px; padding-left:10px;"><?php echo sys('sys_sitename');?>管理系统</div>
    <ul class="nav">
		<li><a href="<?php echo U('Admin/Index');?>" target="_top" class="selected"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon01.png" title="工作台" /><h2>工作台</h2></a></li>
		<?php if($_SESSION['admin_role_auth_ids']== 0): ?><li><a href="<?php echo U('Sort/Index');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon02.png" title="栏目管理" /><h2>栏目管理</h2></a></li>
		<li><a href="<?php echo U('Role/Index');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon03.png" title="角色管理" /><h2>角色管理</h2></a></li>
		<li><a href="<?php echo U('Manager/Index');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon05.png" title="用户管理" /><h2>用户管理</h2></a></li>
		<li><a href="<?php echo U('Backup/Index');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon07.png" title="用户管理" /><h2>数据备份</h2></a></li>
		<li><a href="<?php echo U('Logs/Index');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon07.png" title="用户管理" /><h2>操作日志</h2></a></li>
		<li><a href="<?php echo U('Settings/Index');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon06.png" title="系统设置" /><h2>系统设置</h2></a></li>
		<?php else: ?>
 		<li><a href="<?php echo U('Manager/Person');?>" target="rightFrame"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon09.png" title="修改密码" /><h2>修改密码</h2></a></li><?php endif; ?>
	</ul>
            
    <div class="topright">    
		<ul>
			<li><a href="/" target="_blank">网站首页</a></li>
			<li><a href="<?php echo U('Manager/Person');?>"  target="rightFrame">修改密码</a></li>
			<li><a href="<?php echo U('Admin/Logout');?>" target="_top" onClick="return confirm('确定退出系统吗？\n\n退出后自动关闭窗口！');">退出</a></li>
		</ul>
		<div class="user">
			<span>→ 管理员：<?php echo (session('admin_username')); ?>   当前级别：<?php echo (session('admin_role_name')); ?></span>
		</div>    
    </div>

</body>
</html>