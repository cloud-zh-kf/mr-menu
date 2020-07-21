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
 	K('#img1_btn').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				imageUrl : K('#img1').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#img1').val(url);
					editor.hideDialog();
				}
			});
		});
	});
 });
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
    <li><?php echo ($typename); ?>分类管理</li>
    <li>分类添加</li>
	<li><a href="javascript:history.go(-1)" style="color:blue">返回列表</a></li>
	</ul>
    </div>
    
    <div class="formbody">
     
		<div id="usual1" class="usual"> 
		
			<div class="itab">
				<ul> 
				<li><a href="#tab1" class="selected">分类添加</a></li> 
 				</ul>
			</div> 
			
			<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Add');?>" onSubmit="return check_sort_add(this);">
 			<input type="hidden" name="fid" value="<?php echo I('get.fid',0);?>">
 			<input type="hidden" name="typeid" value="<?php echo I('get.typeid');?>">
 			<input type="hidden" name="pid" value="<?php echo I('get.pid',0);?>">
 			<input type="hidden" name="ty" value="<?php echo I('get.ty',0);?>">
 			<input type="hidden" name="tty" value="<?php echo I('get.tty',0);?>">
 			<div id="tab1" class="tabson">
				<ul class="forminfo">
					 
					<li><label>分类名称<b>*</b></label><input name="catname" type="text" class="dfinput" value=""/></li>
					<li><label>英文名称<b>*</b></label><input name="encatname" type="text" class="dfinput" value=""/></li>
 					<?php if($_GET['typeid']== 0): ?><li><label>配置图片</label>
						<input type="text" name="img1" id="img1" value="" class="dfinput"/> <input type="button" <?php if(OPEN_CROPPED == 1): ?>onClick="window.open('/manage/Jcrop/?a=img1&picsize=<?php echo get_imgsize(1,I('get.pid'),I('get.ty'),I('get.tty'));?>','','width=750,height=565,top=80,left=80,toolbar=no, menubar=no, scrollbars=no, resizable=no')"<?php else: ?>id="img1_btn"<?php endif; ?> value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：<?php echo get_imgsize(1,I('get.pid'),I('get.ty'),I('get.tty'));?>px</font>
					 </li>
					<li><label>链接地址<b>*</b></label><input name="linkurl" type="text" class="dfinput" value=""/></li><?php endif; ?>
 					<li><label>类别排序<b>*</b></label><input name="disorder" type="text" class="dfinput" value="0" style="width:100px;"/> 注：数字越小越排在前</li>
  					
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