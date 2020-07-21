<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类添加</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/myeditor/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.idTabs.min.js" type="text/javascript"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K) {
	var editor = K.editor({
		allowFileManager : true
	});
	<?php if(is_array($list6)): $i = 0; $__LIST__ = $list6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v6): $mod = ($i % 2 );++$i;?>K('#<?php echo ($v6["varname"]); ?>_btn').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				imageUrl : K('#<?php echo ($v6["varname"]); ?>').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#<?php echo ($v6["varname"]); ?>').val(url);
					editor.hideDialog();
				}
			});
		});
	});<?php endforeach; endif; else: echo "" ;endif; ?>
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
    <li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">分类管理</a></li>
    <li>分类添加</li>
	</ul>
    </div>
    
    <div class="formbody">
     
		<div id="usual1" class="usual"> 
		
			<div class="itab">
				<ul> 
				<li><a href="#tab1" class="selected">分类添加</a></li> 
				<li><a href="#tab2">SEO设置</a></li> 
				</ul>
			</div> 
			
			<form name="formlist" method="post" action="/Admin-Class-Add" onSubmit="return check_sort_add(this);">
			<input type="hidden" name="pid" value="<?php echo I('get.pid');?>">
			<div id="tab1" class="tabson">
				<ul class="forminfo">
					<li><label>所属栏目<b>*</b></label>
						<cite>
						<select name="pid" >
						<option value="0">无(属一级栏目)</option>
						<?php if(is_array($sort)): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><option value="<?php echo ($s["id"]); ?>"<?php if($s['id'] == $pid): ?>selected<?php endif; ?>><?php echo str_repeat("&nbsp;&nbsp;└",$s['level']); echo ($s["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						</cite>
					</li>
					<li><label>栏目名称<b>*</b></label><input name="catname" type="text" class="dfinput" value=""/></li>
					<li><label>英文名称<b>*</b></label><input name="encatname" type="text" class="dfinput" value=""/></li>
					<li><label>栏目模块<b>*</b></label>
						<cite>
						<select name="module_id" id="module_id" >
						<option value="0">请选择</option>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["module_id"]); ?>|<?php echo get_module_zd($v['module_id'],'module_c');?>|<?php echo get_module_zd($v['module_id'],'module_a');?>" <?php if($v['module_id'] == $arr['module_id']): ?>selected<?php endif; ?>><?php echo ($v["module_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						</cite>
					</li>
					<?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><li><label style="width:110px;"><?php echo ($v2["varinfo"]); ?></label>
						<input type="text" name="img<?php echo ($i); ?>" id="img<?php echo ($i); ?>" value="" class="dfinput"/> <input type="button" id="img<?php echo ($i); ?>_btn" value="选择图片" class="btn" />
					 </li><?php endforeach; endif; else: echo "" ;endif; ?>
					<li><label>图片数量<b>*</b></label><input name="imgnum" type="text" class="dfinput" value="<?php echo ($arr['imgnum']); ?>"/></li>
					<li><label>图片尺寸<b>*</b></label><input name="imgsize" type="text" class="dfinput" value="<?php echo ($arr['imgsize']); ?>"/></li>
					<li><label>图片名称<b>*</b></label><input name="imgname" type="text" class="dfinput" value="配置图片"/></li>
					<li><label>所属模板<b>*</b></label><input name="templet" id="templet" type="text" class="dfinput" value="<?php echo get_sort_zd($pid,'templet');?>"/></li>
					<li><label>控制器<b>*</b></label><input name="sort_c" id="sort_c" type="text" class="dfinput" value="<?php echo get_sort_zd($pid,'sort_c');?>"/></li>
					<li><label>操作方法<b>*</b></label><input name="sort_a" id="sort_a" type="text" class="dfinput" value="<?php echo get_sort_zd($pid,'sort_a');?>"/></li>
					<li><label>传值参数<b>*</b></label><input name="sort_p" id="sort_p" type="text" class="dfinput" value=""/> 如:typeid=1 多个用&连接</li>
					<li><label>外部链接<b>*</b></label><input name="outlinkurl" id="outlinkurl" type="text" class="dfinput" value=""/> 如:http://www.baidu.com</li>
					<li><label>内部链接<b>*</b></label><input name="inlinkurl" id="inlinkurl" type="text" class="dfinput" value="<?php echo get_zd_name("inlinkurl","sort","id={$pid}")?>"/></li>

					<li><label>开放分类<b>*</b></label>
						<select name="isopen" >
						<option value="0">关闭</option>
						<option value="1">开启</option>
 						</select>
					</li>
					<li><label>类别排序<b>*</b></label><input name="disorder" type="text" class="dfinput" value="5" style="width:100px;"/> 注：数字越小越排在前</li>
  					
 				</ul>
			
			</div> 
		
			<div id="tab2" class="tabson">
				<ul class="forminfo">
					<li><label>页面标题<b>*</b></label><input name="seotitle" type="text" class="dfinput" value=""/></li>
					<li><label>页面关键字<b>*</b></label><input name="seokeywords" type="text" class="dfinput" value=""/></li>
					<li><label>页面描述<b>*</b></label><textarea name="seodescription" id="seodescription" style="width:520px;height:100px;" class="dfinput"></textarea></li>
				</ul>
			</div>  
		  
		<li><label>&nbsp;</label> <input name="dosubmit" type="submit" class="btn" value="马上发布"/></li>
		</form>
		  
		   
		</div> 
    
    </div>

<script type="text/javascript"> 
  $("#usual1 ul").idTabs(); 
</script>

</body>

</html>