<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>私信管理</title>
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
		<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">私信管理</a></li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
   		  <b>私信标题：</b><input name="title" type="text" class="dfinput" value="<?php echo ($_GET['title']); ?>"/>
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
				<!--<a href="<?php echo U('User/Add');?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>-->
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="return checkData();" name="ok" value="删 除">
			</ul>
		
		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th width="50px">选择</th>
				<th width="50px">序号</th>
				<th width="140px">发信用户</th>
				<th width="140px">接收用户</th>
				<th width="140px">私信标题</th>
				<th>私信内容</th>
				<th width="50px">状态</th>
				<th width="140px">发送时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo get_username($v['uid']);?></td>
			<td><?php echo get_username($v['pid']);?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["content"]); ?></td>
			<td><?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
                    <?php else: ?>
                  <a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?>            </td>
			<td><?php echo (date('Y-m-d H:i:s',$v["sendtime"])); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>