<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优惠券管理</title>
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
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
   		  <b>开始时间：</b><input name="sdate" type="text" class="dfinput" value="<?php echo ($_GET['sdate']); ?>" style="width:100px;" onFocus="WdatePicker({lang:'zh-cn'})"/>
  		  <b>结束时间：</b><input name="edate" type="text" class="dfinput" value="<?php echo ($_GET['edate']); ?>" style="width:100px;" onFocus="WdatePicker({lang:'zh-cn'})"/>
          <input name="search" type="submit" class="btn" value="搜索"/></td>
 		</tr> 
 	   </form>
    </table>	
    <div class="rightinfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Del');?>">
	
		<div class="tools">
 			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
				<li>&nbsp;<input type="checkbox" name="all" onClick="CheckAll(this);"> 全选</li>
				<a href="<?php echo U(CONTROLLER_NAME.'/Add');?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="return checkData();" name="ok" value="删 除">
			</ul>
 		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th>选择</th>
				<th>序号</th>
				<th>发放总数</th>
				<th>已领取数</th>
				<th>优惠金额</th>
				<th>开始时间</th>
				<th>结束时间</th>
				<th>状态</th>
				<th>添加时间</th>
				<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["totalnum"]); ?></td>
			<td><?php echo ($v["getnum"]); ?></td>
			<td><?php echo ($v["money"]); ?> 元</td>
			<td><?php echo ($v["sdate"]); ?></td>
			<td><?php echo ($v["edate"]); ?></td>
			<td>
			<?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
			<?php else: ?>
			<a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?>			</td>
			<td><?php echo (date('Y-m-d',$v["sendtime"])); ?></td>
			<td><a href="<?php echo U(CONTROLLER_NAME.'/Update',"id=".$v['id']."");?>" class="tablelink">修改</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>