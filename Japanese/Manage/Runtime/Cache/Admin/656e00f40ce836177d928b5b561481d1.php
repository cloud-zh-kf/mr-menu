<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>比赛活动添加</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/lang/zh_CN.js"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/My97DatePicker/WdatePicker.js" type="text/javascript"></script>

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
	<?php $__FOR_START_9288__=1;$__FOR_END_9288__=$imgnum;for($i=$__FOR_START_9288__;$i < $__FOR_END_9288__;$i+=1){ ?>K('#img<?php echo ($i); ?>_btn').click(function() {
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
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
    <li>比赛活动管理</li>
    <li>比赛活动添加</li>
	<li><a href="javascript:history.go(-1)" style="color:blue">返回列表</a></li>
	</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
		<ul> 
		<li><a href="#tab1" class="selected">比赛活动添加</a></li> 
		</ul>
    </div> 
    
  	<div id="tab1" class="tabson">
     
		<ul class="forminfo">
			<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Add');?>" onSubmit="return check_goods_add(this);">
 			<input type="hidden" name="bid" value="<?php echo I('get.pid',0);?>">
 			<input type="hidden" name="mid" value="<?php echo I('get.ty',0);?>">
 			<input type="hidden" name="sid" value="<?php echo I('get.tty',0);?>">
			<li><label>参赛/活动标题<b>*</b></label><input name="title" type="text" class="dfinput" value=""/>
			<input type="checkbox" name="istop" value="1"> 置顶
			<input type="checkbox" name="isindex" value="1"> 上首页
			</li>
			<li><label>举办城市<b>*</b></label> 
			<select name="cityid" >
			<?php if(is_array($cs)): $i = 0; $__LIST__ = $cs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><option value="<?php echo ($d["id"]); ?>"<?php if($s['catname'] == $v['cityid']): ?>selected<?php endif; ?>><?php echo ($d["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			具体地址:<input name="address" type="text" class="dfinput" value=""/>
			</li>			
			<li><label>SEO关键字<b>*</b></label><input name="seokeywords" type="text" value="" class="dfinput" style="width:518px;"></li>	
			<li><label>SEO描述<b>*</b></label><textarea name="seodescription" style="width:520px;height:100px;" class="dfinput"></textarea></li>	 
			
			<li><label>参赛/活动时间<b>*</b></label>开始时间:<input name="startdate" placeholder="点击选择日期" style="width:100px;" type="text" class="dfinput" value="" onFocus="WdatePicker({lang:'zh-cn'})"/>
			结束时间:<input name="enddate" type="text"  style="width:100px;" placeholder="点击选择日期" class="dfinput" value="" onFocus="WdatePicker({lang:'zh-cn'})"/>
			</li>
			<li><label>参赛对象<b>*</b></label><input name="csdx" type="text" class="dfinput" value=""/></li>
			<li><label>相关费用<b>*</b></label><input name="money" type="text" class="dfinput" value=""/> 0:免费</li>
			<li><label>主办方名称<b>*</b></label><input name="zbf" type="text" class="dfinput" value=""/></li>
			<li><label>报名跳链<b>*</b></label><input name="linkurl" type="text" class="dfinput" value=""/></li>
			<li><label>内容详情<b>*</b></label><textarea class="editor_id" name="content" style="width:667px;height:350px;"></textarea></li>
  			<?php $__FOR_START_4833__=1;$__FOR_END_4833__=$imgnum;for($i=$__FOR_START_4833__;$i < $__FOR_END_4833__;$i+=1){ ?><li><label><?php if($i == 1): ?>封面图<?php elseif($i == 2): ?>内面图<?php else: ?>主办方<?php endif; ?><b>*</b></label><input type="text" name="img<?php echo ($i); ?>" id="img<?php echo ($i); ?>" value="" class="dfinput"/> <input type="button" 
			<?php if(OPEN_CROPPED == 1): ?>onClick="window.open('/manage/Jcrop/?a=img<?php echo ($i); ?>&picsize=<?php echo get_imgsize($i,$list['pid'],$list['ty'],$list['tty']);?>','','width=750,height=565,top=80,left=80,toolbar=no, menubar=no, scrollbars=no, resizable=no')"<?php else: ?>id="img<?php echo ($i); ?>_btn"<?php endif; ?>
			 value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：<?php echo get_imgsize($i,$list['pid'],$list['ty'],$list['tty']);?>px</font></li><?php } ?>
			<li><label>创建时间<b>*</b></label><input name="sendtime" type="text" class="dfinput" value="<?php echo (date('Y-m-d g:i a',time())); ?>" style="width:150px;"/></li>
			
			<li><label>信息排序<b>*</b></label><input name="disorder" type="text" class="dfinput" value="0" style="width:100px;"/> 注：数字越大越排在前</li>	

			<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上添加"/></li>
			</form>
		</ul>
    
    </div> 
        
	</div> 
    
    </div>

</body>

</html>