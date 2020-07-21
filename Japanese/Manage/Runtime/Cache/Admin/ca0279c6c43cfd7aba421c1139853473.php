<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>报名详情</title>
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
			<li><?php echo get_sort_zd($v['pid']);?></li>
			<li><?php echo get_sort_zd($v['ty']);?></li>
			<li>内容详情</li>
    		<li><a href="javascript:void()" onclick="javascript:history.back(-1);">返回列表页</a></li> 
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
     
		<div id="tab1" class="tabson">
 	
			<div class="place">
			<ul class="placeul">
			<li><b><?php echo get_sort_zd($v['ty']);?></b></li>
			</ul>
			</div>
			<table class="tablelist">
			<form name="sofrm" method="post" action="<?php echo U(CONTROLLER_NAME.'/show');?>">
			<input type="hidden" name="id" value="<?php echo I('get.id');?>">
			
			<tr>
				<td width="15%" align="right">主题：</td>
				<td align="left"><?php echo ($v["title"]); ?></td>
			</tr>
			<tr>
				<td width="15%" align="right">类型：</td>
				<td align="left"><?php echo ($v["tags"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">内容：</td>
				<td align="left"><?php echo ($v["content"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">工作地点：</td>
				<td align="left"><?php echo ($v["province"]); echo ($v["city"]); echo ($v["address"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">工作时间：</td>
				<td align="left"><?php echo ($v["starttime"]); ?>-<?php echo ($v["endtime"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">工作时间：</td>
				<td align="left"><?php echo ($v["worktime"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">报名截止日期：</td>
				<td align="left"><?php echo ($v["overtime"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">需求人数：</td>
				<td align="left"><?php echo ($v["num"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">人均费用：</td>
				<td align="left"><?php echo ($v["cost"]); ?>/<?php echo ($v["unit"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">主办方：</td>
				<td align="left"><?php echo ($v["organizer"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">联系人：</td>
				<td align="left"><?php echo ($v["realname"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">联系电话：</td>
				<td align="left"><?php echo ($v["tel"]); ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">相关图片：</td>
				<td align="left"><?php if($v["img1"] != ''): ?><img src="<?php echo ($v["img1"]); ?>" width="120"><?php endif; ?> <?php if($v["img2"] != ''): ?><img src="<?php echo ($v["img2"]); ?>" width="120"><?php endif; ?> <?php if($v["img3"] != ''): ?><img src="<?php echo ($v["img3"]); ?>" width="120"><?php endif; ?> <?php if($v["img4"] != ''): ?><img src="<?php echo ($v["img4"]); ?>" width="120"><?php endif; ?> <?php if($v["img5"] != ''): ?><img src="<?php echo ($v["img5"]); ?>" width="120"><?php endif; ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">状态：</td>
				<td align="left"><?php if($v['status'] == 1): ?>进行中<?php else: ?>已结束<?php endif; ?></td>
			</tr>
			
			<tr>
				<td width="15%" align="right">支付状态：</td>
				<td align="left"><?php if($v['ispay'] == 1): ?>已支付<?php else: ?>待支付<?php endif; ?></td>
			</tr>
			
			<!--<tr>
			  <td align="right">&nbsp;</td>
			  <td align="left"><input name="update" type="submit" value=" 确定提交 " class="btn"> </td>
			</tr>-->
			</form> 
			</table>
 
 			
    </div> 
       
	</div> 
    
</div>

</body>

</html>