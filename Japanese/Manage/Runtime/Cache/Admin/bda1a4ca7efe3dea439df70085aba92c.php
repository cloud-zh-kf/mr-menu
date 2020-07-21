<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员资料详情</title>
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
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">会员中心</a></li>
			<li>会员资料详情</li>
    		<li><a href="javascript:void()" onclick="javascript:history.back(-1);">返回列表页</a></li> 
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
     
		<div id="tab1" class="tabson">
		 <table class="tablelist">
		<form name="sofrm" method="post" action="<?php echo U(CONTROLLER_NAME.'/View');?>">
		<input type="hidden" name="id" value="<?php echo I('get.id');?>">
			<?php if($v['realname'] != ''&&$v['card'] != ''&&$v['img3'] != ''&&$v['img4'] != ''): ?><tr>
				<td width="15%" align="right" bgcolor="#CCCCCC"></td>
				<td align="left" bgcolor="#CCCCCC"><b>个人认证资料</b></td>
			</tr>
			<tr>
				<td width="15%" align="right">真实姓名：</td>
				<td align="left"><?php echo ($v["realname"]); ?></td>
			</tr>
		
			<tr>
				<td width="15%" align="right">身份证号码：</td>
				<td align="left"><?php echo ($v["card"]); ?></td>
			</tr>
		
			<tr>
				<td width="15%" align="right">身份证正面：</td>
				<td align="left"><img width="80" src="<?php echo ($v["img3"]); ?>"/></td>
			</tr>
		
			<tr>
				<td width="15%" align="right">身份证反面：</td>
				<td align="left"><img width="80" src="<?php echo ($v["img4"]); ?>"/></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">个人认证：</td>
				<td align="left"><input type="checkbox" name="isrz" value="1" <?php if($v['isrz'] == 1): ?>checked="checked"<?php endif; ?>><?php if($v['isrz'] == 1): ?><font color="red">已认证</font><?php else: ?><font color="blue">待认证</font><?php endif; ?></td>
			</tr><?php endif; ?>
			
			<?php if($v['contactname'] != ''&&$v['phone'] != ''&&$v['img2'] != ''): ?><tr>
				<td width="15%" align="right" bgcolor="#CCCCCC"></td>
				<td align="left" bgcolor="#CCCCCC"><b>经纪认证资料</b></td>
			</tr>
			<tr>
				<td width="15%" align="right">负责人：</td>
				<td align="left"><?php echo ($v["contactname"]); ?></td>
			</tr>
		
			<tr>
				<td width="15%" align="right">联系电话：</td>
				<td align="left"><?php echo ($v["phone"]); ?></td>
			</tr>
		
			<tr>
				<td width="15%" align="right">地区：</td>
				<td align="left"><?php echo ($v["province"]); ?> <?php echo ($v["city"]); ?></td>
			</tr>
		
			<tr>
				<td width="15%" align="right">机构资质：</td>
				<td align="left"><img width="80" src="<?php echo ($v["img2"]); ?>"/></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">企业认证：</td>
				<td align="left"><input type="checkbox" name="jjrz" value="1" <?php if($v['jjrz'] == 1): ?>checked="checked"<?php endif; ?>><?php if($v['jjrz'] == 1): ?><font color="red">已认证</font><?php else: ?><font color="blue">待认证</font><?php endif; ?></td>
			</tr><?php endif; ?>
			
			<tr>
			  <td align="right">&nbsp;</td>
			  <td align="left"><input name="update" type="submit" value=" 确定审核 " class="btn"> </td>
		   </tr>
			
		</form>
		</table>
				
		</div> 
		   
	</div> 
    
</div>

</body>

</html>