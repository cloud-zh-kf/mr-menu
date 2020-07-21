<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员修改</title>
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
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">会员管理</a></li>
			<li>会员修改</li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">会员修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
			<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_user_add(this);">
			<input type="hidden" name="id" value="<?php echo ($r["id"]); ?>">
			<li><label>用户名<b>*</b></label><input name="username" type="text" class="dfinput" value="<?php echo ($r["username"]); ?>"/></li>
			<li><label>昵称<b>*</b></label><input name="nickname" type="text" class="dfinput" value="<?php echo ($r["nickname"]); ?>"/></li>
			<li><label>手机号<b>*</b></label><input name="tel" type="text" class="dfinput" value="<?php echo ($r["tel"]); ?>"/></li>
			<li><label>邮箱地址<b>*</b></label><input name="email" type="text" class="dfinput" value="<?php echo ($r["email"]); ?>"/></li>
			<li><label>密码<b>*</b></label><input name="userpwd" type="text" class="dfinput" value="<?php echo ($r["userpwd"]); ?>"/></li>
			<li><label>可用资金帐户<b></b></label>
			<select name="user_typeid">
			  <option value="0" selected="selected">选择</option>
			  <option value="1">增加账户余额</option>
			  <option value="2">减少账户余额</option>
			  <option value="3">增加虚拟币</option>
			  <option value="4">减少虚拟币</option>
			</select>
			<input name="user_money" type="text" class="dfinput" value="0" style="width:100px;" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')"/> 当前值：￥0.00
  			</li>
			<li><label>帐户变动原因<b></b></label><textarea name="remark" style="width:520px;height:100px;" class="dfinput"></textarea></li>
			<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
			</form>
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>