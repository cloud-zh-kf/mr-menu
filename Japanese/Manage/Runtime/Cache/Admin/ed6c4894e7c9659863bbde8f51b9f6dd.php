<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员修改</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
</head>

<body>

	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
			<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">管理员管理</a></li>
			<li>管理员修改</li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">管理员修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
			<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_manager_add(this);">
			<input type="hidden" name="id" value="<?php echo ($r["id"]); ?>">
			<li><label>选择角色<b>*</b></label><cite>
			<select name="role_id">
				<option value="">请选择</option>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["role_id"]); ?>"<?php if($v['role_id'] == $r['role_id']): ?>selected<?php endif; ?>><?php echo ($v["role_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select></cite>
			</li>
			<li><label>管理姓名<b>*</b></label><input name="realname" type="text" class="dfinput" value="<?php echo ($r["realname"]); ?>"/></li>
			<li><label>管理帐号<b>*</b></label><input name="username" type="text" class="dfinput" value="<?php echo ($r["username"]); ?>"/></li>
			<li><label>登陆密码<b>*</b></label><input name="password" type="text" class="dfinput" value=""/></li>
			<li><label>确认密码<b>*</b></label><input name="repassword" type="text" class="dfinput" value=""/></li>
			<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
			</form>
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>