<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>比赛活动修改</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/myeditor/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/selectarea.js" type="text/javascript"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo (ADMIN_PUBLIC); ?>/myeditor/lang/zh_CN.js"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/My97DatePicker/WdatePicker.js" type="text/javascript"></script>

<script>
KindEditor.ready(function(K) {
 	var editor = K.editor({
		allowFileManager : true
	});
	<?php $__FOR_START_27069__=1;$__FOR_END_27069__=$imgnum;for($i=$__FOR_START_27069__;$i < $__FOR_END_27069__;$i+=1){ ?>K('#img<?php echo ($i); ?>_btn').click(function() {
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
		<li><?php echo get_sort_zd($list['pid']);?></li>
		<li><?php echo get_sort_zd($list['ty']);?></li>
		<li><?php echo get_sort_zd($list['tty']);?></li>
		<li>信息编辑</li>
		<li><a href="javascript:history.go(-1)" style="color:blue">返回列表</a></li>
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
		<div class="itab">
			<ul> 
			<li><a href="#tab1" class="selected">信息编辑</a></li> 
			</ul>
		</div> 
    
		<div id="tab1" class="tabson">
		 
		<ul class="forminfo">
			<form name="formlist" method="post" action="<?php echo U(CONTROLLER_NAME.'/Update');?>" onSubmit="return check_user_add(this);">
			<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
 			<input type="hidden" name="bid" value="<?php echo I('get.pid',0);?>">
 			<input type="hidden" name="mid" value="<?php echo I('get.ty',0);?>">
 			<input type="hidden" name="sid" value="<?php echo I('get.tty',0);?>">
			<li><label>活动标题<b>*</b></label><input name="title" type="text" class="dfinput" value="<?php echo ($v["title"]); ?>"/></li>
			<li><label>工作地区<b>*</b></label>
          <select name="province" id="province" onChange="changepro('city','province');">
		  <option value="" selected="selected">省/直辖市</option>
 		  <?php if($v['province'] != ''): ?><option value='<?php echo ($v["province"]); ?>' selected="selected"><?php echo ($v["province"]); ?></option><?php endif; ?>
          <option value='北京市'>北京市</option>
          <option value='天津市'>天津市</option>
          <option value='河北省'>河北省</option>
          <option value='山西省'>山西省</option>
          <option value='内蒙古区'>内蒙古区</option>
          <option value='辽宁省'>辽宁省</option>
          <option value='吉林省'>吉林省</option>
          <option value='黑龙江省'>黑龙江省</option>
          <option value='上海市'>上海市</option>
          <option value='江苏省'>江苏省</option>
          <option value='浙江省'>浙江省</option>
          <option value='安徽省'>安徽省</option>
          <option value='福建省'>福建省</option>
          <option value='江西省'>江西省</option>
          <option value='山东省'>山东省</option>
          <option value='河南省'>河南省</option>
          <option value='湖北省'>湖北省</option>
          <option value='湖南省'>湖南省</option>
          <option value='广东省'>广东省</option>
          <option value='广西区'>广西区</option>
          <option value='海南省'>海南省</option>
          <option value='重庆市'>重庆市</option>
          <option value='四川省'>四川省</option>
          <option value='贵州省'>贵州省</option>
          <option value='云南省'>云南省</option>
          <option value='西藏区'>西藏区</option>
          <option value='陕西省'>陕西省</option>
          <option value='甘肃省'>甘肃省</option>
          <option value='青海省'>青海省</option>
          <option value='宁夏区'>宁夏区</option>
          <option value='新疆区'>新疆区</option>
        </select>
        &nbsp;
        <select name="city" id="city"  >
          <option value="">请选择</option>
 		  <?php if($v['city'] != ''): ?><option value='<?php echo ($v["city"]); ?>' selected="selected"><?php echo ($v["city"]); ?></option><?php endif; ?>
		</select>
        &nbsp;
 			
			
			<input name="address" type="text" class="dfinput" value="<?php echo ($v["address"]); ?>" placeholder="详细地址" style="width:200px;"/>
			</li>
			<li><label>工作日期<b>*</b></label>开始时间:<input name="starttime" placeholder="点击选择日期" style="width:100px;" type="text" class="dfinput" value="<?php echo ($v["starttime"]); ?>" onFocus="WdatePicker({lang:'zh-cn'})"/>
			结束时间:<input name="endtime" type="text"  style="width:100px;" placeholder="点击选择日期" class="dfinput" value="<?php echo ($v["endtime"]); ?>" onFocus="WdatePicker({lang:'zh-cn'})"/>
			</li>
			<li><label>工作时间<b>*</b></label><input name="worktime" type="text" class="dfinput" value="<?php echo ($v["worktime"]); ?>"/></li>
			<li><label>报名截至<b>*</b></label><input name="overtime" placeholder="点击选择日期" style="width:100px;" type="text" class="dfinput" value="<?php echo ($v["overtime"]); ?>" onFocus="WdatePicker({lang:'zh-cn'})"/></li>
			<li><label>人均费用<b>*</b></label><input name="cost" type="text" class="dfinput" value="<?php echo ($v["cost"]); ?>" style="width:100px"/>
			<select name="unit" id="unit" >
				<option value=''>单位</option>
				<option value="时"<?php if($v['unit'] == '时'): ?>selected<?php endif; ?>>时</option>
 				<option value="天"<?php if($v['unit'] == '天'): ?>selected<?php endif; ?>>天</option>
 				<option value="周"<?php if($v['unit'] == '周'): ?>selected<?php endif; ?>>周</option>
			</select></li>
			<li><label>需求人数<b>*</b></label><input name="num" type="text" class="dfinput" value="<?php echo ($v["num"]); ?>" style="width:100px;"/> 人</li>
			<li><label>主办方<b>*</b></label><input name="organizer" type="text" class="dfinput" value="<?php echo ($v["organizer"]); ?>"/></li>
			<li><label>联系人<b>*</b></label><input name="realname" type="text" class="dfinput" value="<?php echo ($v["realname"]); ?>"/></li>
			<li><label>联系电话<b>*</b></label><input name="tel" type="text" class="dfinput" value="<?php echo ($v["tel"]); ?>"/></li>
			<li><label>标签<b>*</b></label><input name="tags" type="text" class="dfinput" value="<?php echo ($v["tags"]); ?>"/> 多个用,分割</li>
			<li><label>活动坐标<b>*</b></label><input name="ll" type="text" class="dfinput" value="<?php echo ($v["ll"]); ?>"/> <a href="<?php echo U('Activity/Map');?>" style="color:red" target="_blank">获取经纬度</a></li>
 			<li><label>活动详情<b>*</b></label><textarea name="content" style="width:520px;height:200px;" class="dfinput"><?php echo ($v["content"]); ?></textarea></li>
			<?php $__FOR_START_19378__=1;$__FOR_END_19378__=$imgnum;for($i=$__FOR_START_19378__;$i < $__FOR_END_19378__;$i+=1){ $zd="img$i"; ?>
			<li><label><?php echo get_imgname($i,$list['pid'],$list['ty'],$list['tty']);?><b>*</b></label><input type="text" name="img<?php echo ($i); ?>" id="img<?php echo ($i); ?>" value="<?php echo ($v["img$i"]); ?>" class="dfinput"/> <input type="button" 
			<?php if(OPEN_CROPPED == 1): ?>onClick="window.open('/manage/Jcrop/?a=img<?php echo ($i); ?>&picsize=<?php echo get_imgsize($i,$list['pid'],$list['ty'],$list['tty']);?>','','width=750,height=565,top=80,left=80,toolbar=no, menubar=no, scrollbars=no, resizable=no')"<?php else: ?>id="img<?php echo ($i); ?>_btn"<?php endif; ?>
			 value="选择图片" class="btn" /> <font color="#FF0000">图片大小:<?php echo get_cfg_var("post_max_size");?>内,图片尺寸：<?php echo get_imgsize($i,$list['pid'],$list['ty'],$list['tty']);?>px<?php get_img_show($v[$zd]) ?></font></li><?php } ?>
			<li><label>创建时间<b>*</b></label><input name="sendtime" type="text" class="dfinput" value="<?php echo (date('Y-m-d g:i a',time())); ?>" style="width:150px;"/></li>
 			<li><label>&nbsp;</label><input name="dosubmit" type="submit" class="btn" value="马上修改"/></li>
			</form>
		</ul>
		
		</div> 
       
	</div> 
    
</div>

</body>

</html>