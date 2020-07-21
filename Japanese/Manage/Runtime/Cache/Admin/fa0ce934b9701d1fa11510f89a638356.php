<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优惠券修改</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/My97DatePicker/WdatePicker.js" type="text/javascript"></script>
</head>

<body>

	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
			<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
			<li><a href="<?php echo U('Coupon/Index');?>">优惠券管理</a></li>
			<li>优惠券修改</li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">优惠券修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
			<form name="formlist" method="post" action="<?php echo U('Coupon/Update');?>" onSubmit="return check_user_add(this);">
			<input type="hidden" name="id" value="<?php echo ($r["id"]); ?>">
 			<li><label>优惠金额<b>*</b></label><input name="money" type="text" class="dfinput" value="<?php echo ($r["money"]); ?>"/></li>
			<li><label>开始时间<b>*</b></label><input name="sdate" type="text" class="dfinput" value="<?php echo ($r["sdate"]); ?>" onFocus="WdatePicker({lang:'zh-cn'})"/></li>
			<li><label>结束时间<b>*</b></label><input name="edate" type="text" class="dfinput" value="<?php echo ($r["edate"]); ?>" onFocus="WdatePicker({lang:'zh-cn'})"/></li>
 			<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
			</form>
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>