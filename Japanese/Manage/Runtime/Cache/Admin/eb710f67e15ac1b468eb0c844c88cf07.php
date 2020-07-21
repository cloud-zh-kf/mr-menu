<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退货管理</title>
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
		<li><a href="<?php echo U('Returns/Index');?>">退货管理</a></li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
  		  <b>服务类型：</b><select name="servicetype">
					<option value="">请选择</option>
					<option value="退货退款" <?php if($_GET['servicetype']== '退货退款'): ?>selected<?php endif; ?>>退货退款</option>
					<option value="仅退款" <?php if($_GET['servicetype']== '仅退款'): ?>selected<?php endif; ?>>仅退款</option>
					<option value="退单" <?php if($_GET['servicetype']== '退单'): ?>selected<?php endif; ?>>退单</option>
			</select>
  		  <b>退货原因：</b><select name="reasons">
					<option value="">请选择</option>
					<option value="认为是假货" <?php if($_GET['reasons']== '认为是假货'): ?>selected<?php endif; ?>>认为是假货</option>
					<option value="货不对版" <?php if($_GET['reasons']== '货不对版'): ?>selected<?php endif; ?>>货不对版</option>
					<option value="功能缺失" <?php if($_GET['reasons']== '功能缺失'): ?>selected<?php endif; ?>>功能缺失</option>
					<option value="质量问题" <?php if($_GET['reasons']== '质量问题'): ?>selected<?php endif; ?>>质量问题</option>
					<option value="效果问题" <?php if($_GET['reasons']== '效果问题'): ?>selected<?php endif; ?>>效果问题</option>
					<option value="破损/少件" <?php if($_GET['reasons']== '破损/少件'): ?>selected<?php endif; ?>>破损/少件</option>
					<option value="服务承诺/态度" <?php if($_GET['reasons']== '服务承诺/态度'): ?>selected<?php endif; ?>>服务承诺/态度</option>
					<option value="拍错/多拍/不想要/不喜欢" <?php if($_GET['reasons']== '拍错/多拍/不想要/不喜欢'): ?>selected<?php endif; ?>>拍错/多拍/不想要/不喜欢</option>
					<option value="其他" <?php if($_GET['reasons']== '其他'): ?>selected<?php endif; ?>>其他</option>
			</select>
  		  <b>服务类型：</b><select name="status">
					<option value="">请选择</option>
					<option value="0" <?php if($_GET['status']== '0'): ?>selected<?php endif; ?>>待处理</option>
					<option value="1" <?php if($_GET['status']== '1'): ?>selected<?php endif; ?>>已退款</option>
					<option value="2" <?php if($_GET['status']== '2'): ?>selected<?php endif; ?>>已退货退款</option>
					<option value="3" <?php if($_GET['status']== '3'): ?>selected<?php endif; ?>>未退款</option>
			</select>
  		  <b>订单号：</b><input name="orderid" type="text" class="dfinput" value="<?php echo ($_GET['orderid']); ?>"/>
          <input name="search" type="submit" class="btn" value="搜索"/></td>
 		</tr> 
 	   </form>
    </table>	
    <div class="rightinfo">
		<form name="formlist" method="post" action="<?php echo U('Returns/Del');?>">
	
		<div class="tools">
		
			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
				<li>&nbsp;<input type="checkbox" name="all" onClick="CheckAll(this);"> 全选</li>
				<!--<a href="<?php echo U('User/Add');?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>-->
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="return checkData();" name="ok" value="删 除">
			</ul>
		
		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th>选择</th>
				<th>序号</th>
				<th>申请用户</th>
				<th>订单号</th>
				<th>商品名称</th>
				<th>服务类型</th>
				<th>退货原因</th>
				<th>退款金额</th>
				<th>退货说明</th>
				<th>退款状态</th>
				<th>申请时间</th>
				<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo get_user_zd($v['uid']);?></td>
			<td><?php echo ($v["orderid"]); ?></td>
			<td>
			<?php $_result=get_user_goods_list($v['orderid'],$v['uid']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><span>
				<img src="<?php echo ((isset($t["img1"]) && ($t["img1"] !== ""))?($t["img1"]):'Uploads/nopic.jpg'); ?>" width="80"/>
				<p><?php echo ($t["title"]); ?> x <?php echo ($t["buynum"]); ?></p>
 			</span><?php endforeach; endif; else: echo "" ;endif; ?>
			</td>
			<td><?php echo ($v["servicetype"]); ?></td>
			<td><?php echo ($v["reasons"]); ?></td>
			<td><?php echo ($v["money"]); ?></td>
			<td><?php echo ($v["description"]); ?></td>
			<td>
			<?php if($v['status'] == 0): ?>待处理
			<?php elseif($v['status'] == 1): ?>
			已退款
			<?php elseif($v['status'] == 2): ?>
			已退货退款
			<?php elseif($v['status'] == 3): ?>
			未退款<?php endif; ?>			</td>
			<td><?php echo (date('Y-m-d',$v["sendtime"])); ?></td>
			<td><a href="<?php echo U('Returns/Update',"id=".$v['id']."");?>" class="tablelink">修改</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>