<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>普通预约管理</title>
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
		<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">普通预约管理</a></li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
     	<thead>
  		<tr>
          <td>
   		  <b>工作类型：</b>
		  	<select name="typename">
				<option value="">请选择</option>
				<?php $_result=get_type_list(2);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["catname"]); ?>" <?php if($v['catname'] == I('get.typename')): ?>selected<?php endif; ?>><?php echo ($v["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
   		   <b>工作主题：</b><input name="title" type="text" class="dfinput" value="<?php echo ($_GET['title']); ?>" style="width:200px;"/>
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
		
		
		<table class="tablelist" style="width:1600px;">
			<thead>
				<tr>
				<th>选择</th>
				<th>序号</th>
				<th>预约用户</th>
				<th>被预约模特</th>
				<th>工作主题</th>
				<th>工作类型</th>
				<th style="width:150px;">工作内容</th>
				<th>工作数量</th>
				<th>工作日期</th>
				<th>工作地点</th>
				<th>联系人</th>
				<th>联系电话</th>
				<th>总费用</th>
				<th>状态</th>
				<th>预约时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo get_username($v['uid']);?></td>
			<td><?php echo get_username($v['pid']);?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["typename"]); ?></td>
			<td><?php echo ($v["content"]); ?></td>
			<td><?php echo ($v["event"]); ?>场/人</td>
			<td><?php echo ($v["starttime"]); ?>-<?php echo ($v["endtime"]); ?></td>
			<td><?php echo ($v["province"]); echo ($v["city"]); echo ($v["address"]); ?></td>
			<td><?php echo ($v["tel"]); ?></td>
			<td><?php echo ($v["realname"]); ?></td>
			<td style="color:red">￥<?php echo ($v["totalmoney"]); ?></td>
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