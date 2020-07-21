<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>专辑分类修改</title>
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
			<li>女神管理</li>
			<li>专辑修改</li>
			<li><a href="javascript:history.go(-1)" style="color:blue">返回列表</a></li>
		</ul>
    </div>
    
    <div class="formbody">
     
		<div id="usual1" class="usual"> 
		
			<div class="itab">
				<ul> 
				<li><a href="#tab1" class="selected">分类修改</a></li> 
 				</ul>
			</div> 
			
			<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_sort_add(this);" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			<input type="hidden" name="fid" value="<?php echo ($v["uid"]); ?>">
   			<div id="tab1" class="tabson">
				<ul class="forminfo">
  					<li><label>专辑名称<b>*</b></label><input name="catname" type="text" class="dfinput" value="<?php echo ($v["catname"]); ?>"/> <input type="checkbox" name="isgood" value="1" <?php if($v['isgood'] == 1): ?>checked<?php endif; ?>> 推荐</li>
					<li><label>专辑介绍<b>*</b></label><textarea name="introduction" style="width:520px;height:100px;" class="dfinput"><?php echo ($v["introduction"]); ?></textarea></li>		 			
					<?php if($v['typeid'] == 0): ?><li><label>专辑封面</label>
						<input type="text" name="img1" id="img1" value="<?php echo ($v["img1"]); ?>" class="dfinput"/> <input type="button" <?php if(OPEN_CROPPED == 1): ?>onClick="window.open('/manage/Jcrop/?a=img1&picsize=<?php echo get_imgsize(1,I('get.pid'),I('get.ty'),I('get.tty'));?>','','width=750,height=565,top=80,left=80,toolbar=no, menubar=no, scrollbars=no, resizable=no')"<?php else: ?>id="img1_btn"<?php endif; ?> value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：190 x 266px</font>
					 </li><?php endif; ?>
					
					<li><label>图片预览<br /><font color="#FF0000">(双击图片删除)</font></label>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><img src="<?php echo ($vs["img1"]); ?>" width="80" height="80" class="img<?php echo ($vs["id"]); ?>" ondblclick="deleteimg(<?php echo ($vs["id"]); ?>)" style="margin-right:10px;"><?php endforeach; endif; else: echo "" ;endif; ?>
					</li>
  					<li><label>专辑图片<b>*</b></label><input type="file" name="photo[]" multiple></li>
  					<li><label>专辑价格<b>*</b></label><input name="price" type="text" class="dfinput" value="<?php echo ($v["price"]); ?>" style="width:100px;"/> 元</li>
  					<li><label>文件大小<b>*</b></label><input name="filesize" type="text" class="dfinput" value="<?php echo ($v["filesize"]); ?>" style="width:100px;"/> M</li>
					<li><label>类别排序<b>*</b></label><input name="disorder" type="text" class="dfinput" value="<?php echo ($v["disorder"]); ?>" style="width:100px;"/> 注：数字越小越排在前</li>
  				</ul>
			
			</div> 
		 
		  
		<li><label>&nbsp;</label> <input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
		</form>
		  
		   
		</div> 
    
    </div>

</body>

</html>