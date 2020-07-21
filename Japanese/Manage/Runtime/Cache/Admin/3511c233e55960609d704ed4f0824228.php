<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类管理</title>
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
		<li><?php echo ($typename); ?>分类管理</li>
		<li>信息列表</li>
		</ul>
    </div>
    
    <div class="rightinfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Del',"pid=".I('get.pid',0)."&ty=".I('get.ty',0)."&tty=".I('get.tty',0)."&typeid=".I('get.typeid',0)."&fid=".I('get.fid',0)."");?>">
		<input type="hidden" name="typeid" value="<?php echo I('get.typeid',0);?>">
		<input type="hidden" name="fid" value="<?php echo I('get.fid',0);?>">
	
		<div class="tools">
		
			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
				<li>&nbsp;<input type="checkbox" name="all" onClick="CheckAll(this);"> 全选</li>
				<a href="<?php echo U(CONTROLLER_NAME.'/Add',"pid=".I('get.pid',0)."&ty=".I('get.ty',0)."&tty=".I('get.tty',0)."&typeid=".I('get.typeid',0)."&fid=".I('get.fid',0)."");?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="return checkData();" name="ok" value="删 除">
			</ul>
		
		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th width="50">选择</th>
 				<th width="80">序号|排序</th>
				<th width="120">分类名称</th>
				<th width="80">状态</th>
				<th width="100">发布时间</th>
				<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?>|<?php echo ($v["disorder"]); ?></td>
			<td><?php echo ($v["catname"]); ?> <?php echo ($v["encatname"]); ?></td>
			<td>
			<?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"pid=".I('get.pid')."&ty=".I('get.ty')."&tty=".I('get.tty')."&typeid=".$v['typeid']."&fid=".I('get.fid',0)."&id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
			<?php else: ?>
			<a href="<?php echo U(CONTROLLER_NAME.'/Audit',"pid=".I('get.pid')."&ty=".I('get.ty')."&tty=".I('get.tty')."&typeid=".$v['typeid']."&fid=".I('get.fid',0)."&id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?></td>
			<td><?php echo (date('Y-m-d',$v["sendtime"])); ?></td>
			<td>
			<?php if($_GET['typeid']== 1): ?><a href="<?php echo U(CONTROLLER_NAME.'/Index',"pid=".I('get.pid')."&ty=".I('get.ty')."&tty=".I('get.tty')."&typeid=".I('get.typeid')."&fid=".$v['id']."");?>">子分类（<?php echo get_son_count($v['typeid'],$v['id']);?>个）</a><?php endif; ?>
			<a href="<?php echo U(CONTROLLER_NAME.'/Update',"id=".$v['id']."&pid=".I('get.pid')."&ty=".I('get.ty')."&tty=".I('get.tty')."");?>" class="tablelink">修改</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>