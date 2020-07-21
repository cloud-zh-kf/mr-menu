<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>专辑分类管理</title>
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
		<li>女神管理</li>
		<li>专辑列表</li>
		</ul>
    </div>
    
    <div class="rightinfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Del',"fid=".I('get.fid',0)."");?>">
 		<input type="hidden" name="fid" value="<?php echo I('get.fid',0);?>">
	
		<div class="tools">
		
			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
				<li>&nbsp;<input type="checkbox" name="all" onClick="CheckAll(this);"> 全选</li>
				<a href="<?php echo U(CONTROLLER_NAME.'/Add',"fid=".I('get.fid',0)."");?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="return checkData();" name="ok" value="删 除">
			</ul>
		
		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th width="50">选择</th>
 				<th width="80">序号|排序</th>
				<th width="80">封面图</th>
				<th width="120">专辑名称</th>
				<th width="80">专辑价格</th>
				<th width="80">文件大小</th>
				<th width="80">状态</th>
				<th width="100">发布时间</th>
				<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?>|<?php echo ($v["disorder"]); ?></td>
			<td><img src="<?php echo ((isset($v["img1"]) && ($v["img1"] !== ""))?($v["img1"]):'/Uploads/nopic.jpg'); ?>" width="80" /></td>
			<td><?php echo ($v["catname"]); ?> <?php if($v['isgood'] == 1): ?><font color="red">推荐</font><?php endif; ?> </td>
			<td><?php echo ($v["price"]); ?> 元</td>
			<td><?php echo ($v["filesize"]); ?> M</td>
			<td>
			<?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"fid=".I('get.fid',0)."&id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
			<?php else: ?>
			<a href="<?php echo U(CONTROLLER_NAME.'/Audit',"fid=".I('get.fid',0)."&id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?></td>
			<td><?php echo (date('Y-m-d',$v["sendtime"])); ?></td>
			<td><a href="<?php echo U(CONTROLLER_NAME.'/Update',"id=".$v['id']."&fid=".I('get.fid')."");?>" class="tablelink">修改</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>