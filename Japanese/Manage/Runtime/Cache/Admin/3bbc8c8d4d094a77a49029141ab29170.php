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
	var editor1 = K.create('.editor_id', {
		filterMode: false,//是否开启过滤模式
		cssPath : '<?php echo (ADMIN_PUBLIC); ?>/myeditor/plugins/code/prettify.css',
		uploadJson : '<?php echo (ADMIN_PUBLIC); ?>/myeditor/php/upload_json.php',
		fileManagerJson : '<?php echo (ADMIN_PUBLIC); ?>/myeditor/php/file_manager_json.php',
		allowFileManager : true,
 		afterBlur : function() {
		 this.sync();
		 K.ctrl(document, 13, function() {
		  K('form[name=formlist]')[0].submit();
		 });
		 K.ctrl(this.edit.doc, 13, function() {
		  K('form[name=formlist]')[0].submit();
		 });
		}
	});
 	
	var editor = K.editor({
		allowFileManager : true
	});
	<?php $__FOR_START_26087__=1;$__FOR_END_26087__=$imgnum;for($i=$__FOR_START_26087__;$i < $__FOR_END_26087__;$i+=1){ ?>K('#img<?php echo ($i); ?>_btn').click(function() {
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
		<li><?php echo get_sort_zd($list['pid']);?></li>
		<li><?php echo get_sort_zd($list['ty']);?></li>
		<li><?php echo get_sort_zd($list['tty']);?></li>
		<li>信息修改</li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected"><?php echo get_sort_zd($list['ty']);?></a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
		<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME."/".$action."");?>" onSubmit="return check_manager_add(this);">
		<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
		<input type="hidden" name="pid" value="<?php echo ($list["pid"]); ?>">
		<input type="hidden" name="ty" value="<?php echo ($list["ty"]); ?>">
		<input type="hidden" name="tty" value="<?php echo ($list["tty"]); ?>">
		
		<li><label>合同名称<b>*</b></label><input name="title" type="text" class="dfinput" value="<?php echo ($v["title"]); ?>"/></li>
		
 		<li><label>乙方<b>*</b></label><input name="tags" type="text" value="<?php echo ($v["tags"]); ?>" class="dfinput"></li>	
 		
 		<li><label>法定代表人<b>*</b></label><input name="source" type="text" value="<?php echo ($v["source"]); ?>" class="dfinput"></li>	
 		
 		<li><label>通讯地址<b>*</b></label><input name="author" type="text" value="<?php echo ($v["author"]); ?>" class="dfinput"></li>	
 		
 		<li><label>不托管平台<b>*</b></label><textarea name="introduce" style="width:520px;height:100px;" class="dfinput"><?php echo ($v["introduce"]); ?></textarea></li>	
 		
 		<li><label>定金费用<b>*</b></label><input name="price" type="text" value="<?php echo ($v["price"]); ?>" class="dfinput"> 元</li>	
 		
 		<li><label>合同内容<b>*</b></label><textarea class="editor_id" name="content" style="width:667px;height:350px;"><?php echo ($v["content"]); ?></textarea></li>
		
 		<li><label>其他说明<b>*</b></label><textarea class="editor_id" name="seodescription" style="width:667px;height:350px;"><?php echo ($v["seodescription"]); ?></textarea></li>
   
   		<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
		</form>
	
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>