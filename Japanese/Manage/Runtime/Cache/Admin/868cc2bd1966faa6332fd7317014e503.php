<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员修改</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/myeditor/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K) {
 	var editor = K.editor({
		allowFileManager : true
	});
	<?php $__FOR_START_10485__=1;$__FOR_END_10485__=$imgnum;for($i=$__FOR_START_10485__;$i < $__FOR_END_10485__;$i+=1){ ?>K('#img<?php echo ($i); ?>_btn').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				imageUrl : K('#img<?php echo ($i); ?>').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#img<?php echo ($i); ?>').val(url);
					editor.hideDialog();
				}
			});
		});
	});<?php } ?>
	
	<?php if(in_array(11,$arr)): ?>K('#insert_file1').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#file1').val(),
				clickFn : function(url, title) {
					K('#file1').val(url);
					editor.hideDialog();
				}
			});
		});
	});<?php endif; ?>
	
});
</script>
</head>

<body>

	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
		<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
		<li><?php echo get_sort_zd($v['pid']);?></li>
		<li><?php echo get_sort_zd($v['ty']);?></li>
		<li><?php echo get_sort_zd($v['tty']);?></li>
		<li>信息修改</li>
		<li><a href="javascript:history.go(-1)" style="color:blue">返回列表</a></li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">信息修改</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_manager_add(this);">
		<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
		<li><label>信息标题<b>*</b></label><input name="title" type="text" class="dfinput" value="<?php echo ($v["title"]); ?>" style="width:518px;"/>
		<?php if(in_array(3,$arr)): ?><input type="checkbox" name="isgood" value="1" <?php if($v['isgood'] == 1): ?>checked<?php endif; ?>> 推荐<?php endif; ?>
		<?php if(in_array(4,$arr)): ?><input type="checkbox" name="istop" value="1" <?php if($v['istop'] == 1): ?>checked<?php endif; ?>> 置顶<?php endif; ?>
		</li>

 		<li><label>信息备注<b>*</b></label><input name="remark" type="text" value="<?php echo ($v["remark"]); ?>" class="dfinput" style="width:518px;"></li>	
 
 		<li><label>外部链接<b>*</b></label><input name="linkurl" type="text" value="<?php echo ($v["linkurl"]); ?>" class="dfinput" style="width:518px;"></li>	
  		
		<?php if(in_array(10,$arr)): $__FOR_START_18058__=1;$__FOR_END_18058__=$imgnum;for($i=$__FOR_START_18058__;$i < $__FOR_END_18058__;$i+=1){ $zd="img$i"; ?>
		<li><label><?php echo get_imgname($i,$v['pid'],$v['ty'],$v['tty']);?><b>*</b></label><input type="text" name="img<?php echo ($i); ?>" id="img<?php echo ($i); ?>" value="<?php echo ($v["img$i"]); ?>" class="dfinput"/> <input type="button" <?php if(OPEN_CROPPED == 1): ?>onClick="window.open('/manage/Jcrop/?a=img<?php echo ($i); ?>&picsize=<?php echo get_imgsize($i,$list['pid'],$list['ty'],$list['tty']);?>','','width=750,height=565,top=80,left=80,toolbar=no, menubar=no, scrollbars=no, resizable=no')"<?php else: ?>id="img<?php echo ($i); ?>_btn"<?php endif; ?> value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：<?php echo get_imgsize($i,$v['pid'],$v['ty'],$v['tty']);?>px<?php get_img_show($v[$zd]) ?></font></li><?php } endif; ?>
		
		<?php if(in_array(11,$arr)): ?><li><label>文件上传<b>*</b></label><input type="text" name="file1" id="file1" value="<?php echo ($v["file1"]); ?>" class="dfinput"/> <input type="button" id="insert_file1" value="选择文件" class="btn" /> <font color="#FF0000">文件大小:</font></li><?php endif; ?>
  		
		<li><label>创建时间<b>*</b></label><input name="sendtime" type="text" class="dfinput" value="<?php echo (date('Y-m-d g:i a',time())); ?>" style="width:150px;"/></li>
		
		<li><label>信息排序<b>*</b></label><input name="disorder" type="text" class="dfinput" value="<?php echo ($v["disorder"]); ?>" style="width:100px;"/> 注：数字越大越排在前</li>	
		<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
		</form>
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>