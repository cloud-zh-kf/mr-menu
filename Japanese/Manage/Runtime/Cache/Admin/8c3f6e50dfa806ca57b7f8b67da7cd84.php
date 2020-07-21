<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>礼物管理</title>
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
		<li><a href="/Admin-User-Gift-uid-2.html">礼物管理</a></li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
   		  <b>流水号：</b><input name="orderid" type="text" class="dfinput" value="<?php echo ($_GET['orderid']); ?>" style="width:200px;"/>
          <input name="search" type="submit" class="btn" value="搜索"/></td>
 		</tr> 
 	   </form>
    </table>	
    <div class="rightinfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Del');?>">
	
		<div class="tools">
 			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
  			</ul>
 		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th width="50px">选择</th>
				<th width="50px">序号</th>
				<th width="110px">打赏者</th>
				<th width="110px">被打赏者</th>
				<th width="110px">流水号</th>
				<th width="80px">支付方式</th>
				<th width="80px">金额</th>
				<th>打赏数量</th>
				<th width="80px">小计</th>
				<th width="160px">备注</th>
				<th width="110px">IP</th>
				<th width="140px">操作时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo get_username($v['uid']);?></td>
			<td><?php echo get_username($v['pid']);?></td>
			<td><?php echo ($v["orderid"]); ?></td>
			<td>余额</td>
			<td <?php if($v['status'] == 1): ?>style="color:blue"<?php else: ?>style="color:red"<?php endif; ?>>￥<?php echo ($v["money"]); ?></td>
			<td><?php echo ($v["num"]); ?></td>
			<td <?php if($v['status'] == 1): ?>style="color:blue"<?php else: ?>style="color:red"<?php endif; ?>>￥<?php echo ($v["totalmoney"]); ?></td>
			<td><?php echo ($v["remark"]); ?></td>
			<td><?php echo ($v["ip"]); ?></td>
			<td><?php echo (date('Y-m-d H:i:s',$v["sendtime"])); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>