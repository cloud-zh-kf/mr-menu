<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>模块修改</title>
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
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">模块管理</a></li>
			<li>模块修改</li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">模块修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
			<ul class="forminfo">
				<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_module_add(this);">
				<input type="hidden" name="module_id" value="<?php echo ($v["module_id"]); ?>">
				<li><label>模块名称<b>*</b></label><input name="module_name" type="text" class="dfinput" value="<?php echo ($v["module_name"]); ?>"/></li>
				<li><label>所需字段<b>*</b></label><?php echo ($module_fields); ?></li>
				<li><label>控制器<b>*</b></label><input name="module_c" id="module_c" type="text" class="dfinput" value="<?php echo ($v["module_c"]); ?>"/></li>
				<li><label>操作方法<b>*</b></label><input name="module_a" id="module_a" type="text" class="dfinput" value="<?php echo ($v["module_a"]); ?>"/></li>
				<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
				</form>
			</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>