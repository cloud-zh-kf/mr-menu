<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据还原</title>
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
		<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">数据备份</a></li>
		<li>信息列表</li>
		</ul>
    </div>
    
    <div class="rightinfo">
		 <input type="hidden" id="url" value="Admin-Backup">
		 <form method="post" id="form_name">
	
		<div class="tools">
		
			<ul class="toolbar">
				<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>" class="btachs">返回列表</a></li>
				<li><a href="javascript:;" class="btach" type="1">备份数据</a></li>
				<li><a href="javascript:;" class="btach" type="2">优化数据</a></li>
				<li><a href="javascript:;" class="btach" type="3">修复数据</a></li>
				<li><a href="<?php echo U(CONTROLLER_NAME.'/Import');?>" class="btachs">还原数据</a></li>
 			</ul>
		
		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th>文件名称</th>
				<th>大小</th>
				<th>创建时间</th>
				<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($v[0]); ?></td>
			<td><?php echo ($v[2]); ?></td>
			<td><?php echo (date('Y-m-d H:i:s',$v[1])); ?></td>
			<td><a href="javascript:;" class="import" data-name="<?php echo ($v[0]); ?>" go-url="Manage-Backup-Import"> 还原</a>　<a href="javascript:;" class="del" data-url="<?php echo U(CONTROLLER_NAME.'/Del',"key=".$v[0]."");?>" go-url="<?php echo U(CONTROLLER_NAME.'/Import');?>"> 删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
	
</body>

</html>