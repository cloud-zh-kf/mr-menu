<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>比赛活动管理</title>
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
		<li>比赛活动管理</li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
  		  <b>举办城市：</b><select name="cityid" >
			<option value="0">举办城市</option>
			<?php if(is_array($cs)): $i = 0; $__LIST__ = $cs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><option value="<?php echo ($s["id"]); ?>"<?php if($_GET['cityid']== $s['id']): ?>selected<?php endif; ?>><?php echo str_repeat("&nbsp;└",$s['level']); echo ($s["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
  		  <b>参赛/活动标题：</b><input name="title" type="text" class="dfinput" value="<?php echo ($_GET['title']); ?>" style="width:200px;"/>
           <input name="search" type="submit" class="btn" value="搜索"/></td>
 		</tr> 
 	   </form>
    </table>	
    <div class="rightinfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Del',"bid=".I('get.pid',0)."&mid=".I('get.ty',0)."&sid=".I('get.tty',0)."");?>">
	
		<div class="tools">
		
			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
				<li>&nbsp;<input type="checkbox" name="all" onClick="CheckAll(this);"> 全选</li>
				<a href="<?php echo U(CONTROLLER_NAME.'/Add',"pid=".I('get.pid',0)."&ty=".I('get.ty',0)."&tty=".I('get.tty',0)."");?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="return checkData();" name="ok" value="删 除">
			</ul>
		
		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th>选择</th>
				<th>序号</th>
				<th>举办城市</th>
				<th>参赛/活动标题</th>
				<th>参赛/活动时间</th>
				<th>费用</th>
				<th>主办方名称</th>
				<th>参赛对象</th>
				<th>状态</th>
				<th>发布时间</th>
				<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo get_type_zd($v['cityid']);?></td>
			<td><?php echo ($v["title"]); ?>
			<?php if($v['istop'] == 1): ?><font color="red">置顶</font><?php endif; ?>
			<?php if($v['isindex'] == 1): ?><font color="blue">上首页</font><?php endif; ?>
			</td>
			<td><?php echo (date('Y-m-d',$v["startdate"])); ?>--<?php echo (date('Y-m-d',$v["enddate"])); ?></td>
			<td><?php echo ($v["money"]); ?></td>
			<td><?php echo ($v["zbf"]); ?></td>
			<td><?php echo ($v["csdx"]); ?></td>
			<td>
			<?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"bid=".I('get.pid')."&mid=".I('get.ty')."&sid=".I('get.tty')."&id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
			<?php else: ?>
			<a href="<?php echo U(CONTROLLER_NAME.'/Audit',"bid=".I('get.pid')."&mid=".I('get.ty')."&sid=".I('get.tty')."&id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?></td>
			<td><?php echo (date('Y-m-d',$v["sendtime"])); ?></td>
			<td><a href="<?php echo U(CONTROLLER_NAME.'/Update',"id=".$v['id']."&pid=".I('get.pid')."&ty=".I('get.ty')."&tty=".I('get.tty')."");?>" class="tablelink">修改</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page"><?php echo ($page); ?></div>
	  </form>
	</div>	 
</body>

</html>