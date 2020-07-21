<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员修改</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/myeditor/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
</head>

<body>

	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
		<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
		<li>系统消息</li>
		<li>信息修改</li>
		<li><a href="javascript:history.go(-1)" style="color:blue">返回列表</a></li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">信息修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_manager_add(this);">
		<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
		<li><label>消息标题<b>*</b></label><input name="title" type="text" class="dfinput" value="<?php echo ($v["title"]); ?>" style="width:518px;"/></li>

		<li><label>消息内容<b>*</b></label><textarea name="content" style="width:520px;height:100px;" class="dfinput"><?php echo ($v["content"]); ?></textarea></li>
  		
		<li><label>创建时间<b>*</b></label><input name="sendtime" type="text" class="dfinput" value="<?php echo (date('Y-m-d g:i a',time())); ?>" style="width:150px;"/></li>
		
 		<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
		</form>
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>