<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻管理</title>
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
		<li><?php echo get_sort_zd($arr['pid']);?></li>
		<li><?php echo get_sort_zd($arr['ty']);?></li>
		<li><?php echo get_sort_zd($arr['tty']);?></li>
		<li>信息列表</li>
		</ul>
    </div>
    
	<table class="tablelist">
	 <form action="" method="get" name="formlists">
		<input type="hidden" name="pid" value="<?php echo ($arr['pid']); ?>">
		<input type="hidden" name="ty" value="<?php echo ($arr['ty']); ?>">
		<input type="hidden" name="tty" value="<?php echo ($arr['tty']); ?>">
    	<thead>
  		<tr>
          <td>
  		  <b>姓名关键字：</b><input name="key" type="text" class="dfinput" value="<?php echo ($_GET['key']); ?>"/>
          <input name="search" type="submit" class="btn" value="搜索"/></td>
 		</tr> 
 	   </form>
    </table>	

	
    <div class="rightinfo">
	<form name="formlist" method="post" action="">
		<input type="hidden" name="pid" value="<?php echo ($arr['pid']); ?>">
		<input type="hidden" name="ty" value="<?php echo ($arr['ty']); ?>">
		<input type="hidden" name="tty" value="<?php echo ($arr['tty']); ?>">
		<input type="hidden" name="acts" value="Del">

		<div class="tools">
 			<ul class="toolbar">
				<a href=""><img src="<?php echo (ADMIN_PUBLIC); ?>/images/sx.jpg" /></a>
				<li>&nbsp;<input type="checkbox" name="all" onClick="CheckAll(this);"> 全选</li>
				<a href="<?php echo U(CONTROLLER_NAME.'/Add',"pid=".$arr['pid']."&ty=".$arr['ty']."&tty=".$arr['tty']."");?>"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/add.jpg" /></a>
				<input type="image" src="<?php echo (ADMIN_PUBLIC); ?>/images/del.jpg" onClick="document.formlist.acts.value='Del';document.formlist.action='<?php echo U(CONTROLLER_NAME.'/Actions');?>';" value="删 除">
			</ul>
 		</div>
		
		
		<table class="tablelist">
			<thead>
				<tr>
				<th width="50px">选择</th>
				<th width="50px">序号</th>
				<?php if($imgnum > 0): ?><th width="80px">缩略图</th><?php endif; ?>
				<th>姓名</th>
				<th>职务</th>
				<th width="50px">状态</th>
				<th width="140px">发布时间</th>
				<th width="50px">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="checkid[]" type="checkbox" value="<?php echo ($v["id"]); ?>"></td>
			<td><?php echo ($v["id"]); ?></td>
			<?php if($imgnum > 0): ?><td><img src="<?php echo ((isset($v["img1"]) && ($v["img1"] !== ""))?($v["img1"]):'/Uploads/nopic.jpg'); ?>" width="80" /></td><?php endif; ?>
			<td>
			<?php echo ($v["title"]); ?> <?php if($v['isgood'] == 1): ?><font color="red">推荐</font><?php endif; ?> <?php if($v['istop'] == 1): ?><font color="blue">置顶</font><?php endif; ?>
			</td>
			<td><?php echo ($v["tags"]); ?></td>
			<td>
			<?php if(($v['status']) == "1"): ?><a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已启用" src="<?php echo (ADMIN_PUBLIC); ?>/images/p.png"/></a>
			<?php else: ?>
			<a href="<?php echo U(CONTROLLER_NAME.'/Audit',"id=".$v['id']."");?>"><img width="16" height="16" border="0" alt="已查封" src="<?php echo (ADMIN_PUBLIC); ?>/images/x.png"/></a><?php endif; ?>
				</td>
			<td><?php echo (date('Y-m-d H:i:s',$v["sendtime"])); ?></td>
			<td><a href="<?php echo U(CONTROLLER_NAME.'/Update',"id=".$v['id']."");?>" class="tablelink">修改</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	   
		<div id="page">
		    <?php echo ($page); ?> 
			<div style="float:right; display: none">
 			<select name="lm">
			<option value="0">请选择要移动/复制的目标栏目</option>
			<?php if(is_array($sort)): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i; if($s['level'] == 0): ?><optgroup label="<?php echo ($s["catname"]); ?>"></optgroup>
				<?php else: ?>
				<option value="<?php echo ($s['level']); ?>|<?php echo ($s["id"]); ?>"><?php echo str_repeat("&nbsp;└",$s['level']); echo ($s["catname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<input type="submit" class="btn" value="移动" onClick="document.formlist.acts.value='Move';document.formlist.action='<?php echo U(CONTROLLER_NAME.'/Actions');?>';"/>
			<input type="submit" class="btn" value="复制" onClick="document.formlist.acts.value='Copy';document.formlist.action='<?php echo U(CONTROLLER_NAME.'/Actions');?>';"/>
			</div>
  		</div>
	  </form>
	</div>	 
</body>

</html>