<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站信息</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>


</head>
<body style="background:#f0f9fd;">
<div class="lefttop"><span></span>网 站 信 息</div>
    
<dl class="leftmenu" style="height:500px; overflow-y:auto; padding-bottom:0px;">

	<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd>
		<div class="title"><span><img src="<?php echo (ADMIN_PUBLIC); ?>/images/leftico01.png" /></span><?php echo ($v["catname"]); ?></div>
		<ul class="menuson">
		
		<?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($vv['pid'] == $v['id']): ?><li style="margin-left:-20px;"><cite></cite><a 
				<?php if($vv['count'] > 0): ?>href="javascript:void()"
				<?php else: ?>
					<?php if($vv['sort_p'] != ''): ?>href="<?php echo U("".$vv['sort_c']."/".$vv['sort_a']."","".$vv['sort_p']."&pid=".$vv['pid']."&ty=".$vv['id']."");?>"<?php else: ?>href="<?php echo U("".$vv['sort_c']."/".$vv['sort_a']."","pid=".$vv['pid']."&ty=".$vv['id']."");?>"<?php endif; endif; ?>
				target="rightFrame"><?php echo ($vv["catname"]); ?></a><i></i>
			</li>
				
			<?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i; if($vvv['pid'] == $vv['id']): ?><li style="margin-left:-20px;" class="pro_type2">
						<?php if($vvv['sort_p'] != ''): ?><a href="<?php echo U("".$vvv['sort_c']."/".$vvv['sort_a']."","".$vvv['sort_p']."&pid=".$vv['pid']."&ty=".$vv['id']."&tty=".$vvv['id']."");?>" target="rightFrame"><?php echo ($vvv["catname"]); ?></a><?php else: ?><a href="<?php echo U("".$vvv['sort_c']."/".$vvv['sort_a']."","pid=".$vv['pid']."&ty=".$vv['id']."&tty=".$vvv['id']."");?>" target="rightFrame"><?php echo ($vvv["catname"]); ?></a><?php endif; ?>
					</li><?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>

		</ul>   
		</dd><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if($_SESSION['admin_id']== 99999999): ?><dd>
	<div class="title" style="color:#FF0000"><span><img src="<?php echo (ADMIN_PUBLIC); ?>/images/leftico01.png" /></span>功能模块</div>
	<ul class="menuson">
 							
	<li style="margin-left:-20px;"><cite></cite><a href="<?php echo U('Class/Index');?>" target="rightFrame">栏目管理</a><i></i></li>
	
	<li style="margin-left:-20px;"><cite></cite><a href="<?php echo U('Module/Index');?>" target="rightFrame">模块管理</a><i></i></li>
  							
	<li style="margin-left:-20px;"><cite></cite><a href="<?php echo U('Role/Index');?>" target="rightFrame">角色管理</a><i></i></li>
 							
	<li style="margin-left:-20px;"><cite></cite><a href="<?php echo U('Manager/Index');?>" target="rightFrame">网站管理员</a><i></i></li>
	<li style="margin-left:-20px;"><cite></cite><a href="<?php echo U('Forms/Index');?>" target="rightFrame">表单管理</a><i></i></li>

	</ul>    
	</dd><?php endif; ?>

</dl>
    
</body>
</html>