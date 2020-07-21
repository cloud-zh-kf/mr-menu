<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类修改</title>
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

    K('#img2_btn').click(function() {
        editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
                imageUrl : K('#img2').val(),
                clickFn : function(url, title, width, height, border, align) {
                    K('#img2').val(url);
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
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">分类管理</a></li>
			<li>分类修改</li>
		</ul>
    </div>
    
    <div class="formbody">
     
		<div id="usual1" class="usual"> 
		
			<div class="itab">
				<ul> 
				<li><a href="#tab1" class="selected">分类修改</a></li> 
				<li><a href="#tab2">SEO设置</a></li> 
				</ul>
			</div> 
			
			<form name="formlist" method="post" action="/Admin-Sort-Update" onSubmit="return check_sort_add(this);">
			<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			<input type="hidden" name="inlinkurl" id="inlinkurl" value="<?php echo ($v["inlinkurl"]); ?>">
			<input type="hidden" name="templet" id="templet" value="<?php echo ($v["templet"]); ?>">
			<div id="tab1" class="tabson">
				<ul class="forminfo">
					<?php if($v['pid'] > 0): ?><li><label>所属栏目<b>*</b></label><cite><?php echo get_sort_zd($v['pid']);?></cite></li><?php endif; ?>
 					<li><label>栏目名称<b>*</b></label><input name="catname" type="text" class="dfinput" value="<?php echo ($v["catname"]); ?>"/></li>
 					<li><label>英文名称<b>*</b></label><input name="encatname" type="text" class="dfinput" value="<?php echo ($v["encatname"]); ?>"/></li>
					<li style="display: none"><label>栏目模块<b>*</b></label>
						<select name="module_id" id="module_id">
						<option value="0">请选择</option>
						<?php if(is_array($module)): $i = 0; $__LIST__ = $module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["module_id"]); ?>|<?php echo get_module_zd($v['module_id'],'module_c');?>|<?php echo get_module_zd($v['module_id'],'module_a');?>" title="<?php echo ($vv["ispic"]); ?>" <?php if($v['module_id'] == $vv['module_id']): ?>selected<?php endif; ?>><?php echo ($vv["module_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</li>

					<?php if(C(OPEN_BANNER) == 1): ?><li>
							<label>BANNER图片</label>
							<input type="text" name="img1" id="img1" value="<?php echo ($v["img1"]); ?>" class="dfinput"/> <input type="button" id="img1_btn" value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：1920 * 519 px</font>
						 </li>

						<li><label>通用图片</label>
							<input type="text" name="img2" id="img2" value="<?php echo ($v["img2"]); ?>" class="dfinput"/> <input type="button" id="img2_btn" value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：498 * 211 px</font>
						</li><?php endif; ?>
 					
					<label class="show" <?php if($v['imgnum'] > 0): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>> 
						<li><label>图片数量<b>*</b></label><input name="imgnum" type="text" class="dfinput" value="<?php echo ($v['imgnum']); ?>"/></li>
						<li><label>图片尺寸<b>*</b></label><input name="imgsize" type="text" class="dfinput" value="<?php echo ($v['imgsize']); ?>"/></li>
					</label>
					
					<li><label>类别排序<b>*</b></label><input name="disorder" type="text" class="dfinput" value="<?php echo ($v["disorder"]); ?>" style="width:100px;"/> 注：数字越小越排在前</li>
  					
 				</ul>
			
			</div> 
		
			<div id="tab2" class="tabson">
				<ul class="forminfo">
					<li><label>页面标题<b>*</b></label><input name="seotitle" type="text" class="dfinput" value="<?php echo ($v["seotitle"]); ?>"/></li>
					<li><label>页面关键字<b>*</b></label><input name="seokeywords" type="text" class="dfinput" value="<?php echo ($v["seokeywords"]); ?>"/></li>
					<li><label>页面描述<b>*</b></label><textarea name="seodescription" id="seodescription" style="width:520px;height:100px;" class="dfinput"><?php echo ($v["seodescription"]); ?></textarea></li>
				</ul>
			</div>  
		  
		<li><label>&nbsp;</label> <input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
		</form>
		  
		   
		</div> 
    
    </div>

<script type="text/javascript"> 
  $("#usual1 ul").idTabs(); 
</script>

</body>

</html>