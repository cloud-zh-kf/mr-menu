<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色修改</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
</head>

<body>

	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
			<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">角色管理</a></li>
			<li>角色修改</li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">角色修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
			<ul class="forminfo">
				<form name="formlist" method="post" action="/Admin-Role-Update" onSubmit="return check_role_add(this);">
				<input type="hidden" name="role_id" value="<?php echo ($r["role_id"]); ?>">
				<li><label>角色名称<b>*</b></label><input name="role_name" type="text" class="dfinput" value="<?php echo ($r["role_name"]); ?>"/></li>
				<li><label>管理权限<b>*</b></label>
				
					<?php if(is_array($auth_infoA)): $i = 0; $__LIST__ = $auth_infoA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="list" style="padding-left:90px;">
						<b class="checkboxs"><input type="checkbox" name="role_auth_ids[]" value="<?php echo ($v["id"]); ?>" <?php if(in_array($v['id'],$r['role_auth_ids'])): ?>checked<?php endif; ?> /> <?php echo ($v["catname"]); ?>></b>
						
						<?php if(is_array($auth_infoB)): $i = 0; $__LIST__ = $auth_infoB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($vv['pid'] == $v['id']): ?><lable class="auth_rules">&nbsp;<input type="checkbox" name="role_auth_ids[]" value="<?php echo ($vv["id"]); ?>" <?php if(in_array($vv['id'],$r['role_auth_ids'])): ?>checked<?php endif; ?> /> <?php echo ($vv["catname"]); ?></lable><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<br>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
 				
				<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
				</form>
			</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>