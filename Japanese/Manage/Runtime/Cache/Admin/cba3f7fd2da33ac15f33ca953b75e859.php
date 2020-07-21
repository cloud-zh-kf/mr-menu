<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业通告管理</title>
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
		<li><?php echo get_sort_zd(I('get.pid'));?></li>
		<li><?php echo get_sort_zd(I('get.ty'));?></li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
   		  <b>主题关键字：</b>
   		  <input name="title" type="text" class="dfinput" value="<?php echo ($_GET['title']); ?>"/>
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
		
		
		<table class="tablelist" style="width:1300px;">
			<thead>
				<tr>
				<th width="35px">选择</th>
				<th width="40px">序号</th>
				<th width="90px">发布用户</th>
				<th width="160px">企业通告主题</th>
				<th>工作地区</th>
				<th>工作日期</th>
				<th>截至时间</th>
				<th>人数</th>
				<th>人均费用</th>
				<th>主办方</th>
				<th width="50px">联系人</th>
				<th width="110px">联系电话</th>
				<th width="40px">详情</th>
				<th width="35px">支付</th>
				<th width="35px">状态</th>
				<th width="65px">发布时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo get_username($v['uid']);?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["province"]); echo ($v["city"]); ?></td>
			<td><?php echo ($v["starttime"]); ?>-<?php echo ($v["endtime"]); ?></td>
			<td><?php echo ($v["overtime"]); ?></td>
			<td><?php echo ($v["num"]); ?> 人</td>
			<td><?php echo ($v["cost"]); ?>/<?php echo ($v["unit"]); ?></td>
			<td><?php echo ($v["organizer"]); ?></td>
			<td><?php echo ($v["realname"]); ?></td>
			<td><?php echo ($v["tel"]); ?></td>
			<td><a href="<?php echo U(CONTROLLER_NAME.'/View',"id=".$v['id']."");?>" style="color:red">查看</a></td>
			<td><?php if(($v['ispay']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Pay',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
                    <?php else: ?>
                  <a href="<?php echo U(CONTROLLER_NAME.'/Pay',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?>				  </td>
			<td><?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
                    <?php else: ?>
                  <a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?>            </td>
			<td><?php echo (date('y-m-d',$v["sendtime"])); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>