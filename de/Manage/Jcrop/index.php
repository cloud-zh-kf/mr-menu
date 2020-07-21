<?
@session_start();
if(!isset($_SESSION['admin_id'])){
 	echo"<script language='javascript'>top.document.location.href='/Admin-Login-Index.html';</script>";
	exit();
}
$picsize=$_GET['picsize'];
$arr=explode("*",$picsize);
$w=$arr[0];
$h=$arr[1];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片裁剪</title>
<script src="js/jquery.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script src="js/jquery.form.js"></script>
<link href="css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/*上传文件的css*/
.btn {
	float:left;
	position: relative;
	overflow:hidden;
	margin-right:4px;
	display:inline-block;
	*display:inline;
	padding:4px 10px 4px;
	font-size:14px;
	line-height:18px;
	*line-height:20px;
	color:#fff;
	text-align:center;
	vertical-align:middle;
	cursor:pointer;
	background-color:#5bb75b;
	border:1px solid #cccccc;
	border-color:#e6e6e6 #e6e6e6 #bfbfbf;
	border-bottom-color:#b3b3b3;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
}
.btn input {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	border: solid transparent;
	opacity:0;
	filter:alpha(opacity=0);
	cursor: pointer;
}
.Intercbtn {
	float:left;
	background-color:#e38102;
	color:#FFF;
	padding:6px 10px 6px 10px;
	border:0;
}
.progress {
	position:relative;
	margin-left:100px;
	margin-top:-24px;
	width:200px;
	padding: 1px;
	border-radius:3px;
	display:none
}
.bar {
	background-color: green;
	display:block;
	width:0%;
	height:20px;
	border-radius: 3px;
}
.percent {
	position:absolute;
	height:20px;
	display:inline-block;
	top:3px;
	left:2%;
	color:#fff
}
.files {
	height:22px;
	line-height:22px;
	margin:10px 0
}
.delimg {
	margin-left:20px;
	color:#090;
	cursor:pointer
}
</style>
<script>
	$(document).ready(function(){
		var bar = $('.bar');
		var percent = $('.percent');
		var showimg = $('#showimg');
		var progress = $(".progress");
		var files = $(".files");
		var btn = $(".btn span");
		$("#fileupload").wrap("<form id='myupload' action='action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload").change(function(){  //选择文件
			$("#myupload").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg.empty();	//清空显示的图片
					progress.show();	//显示进度条
					var percentVal = '0%';	//开始进度为0%
					bar.width(percentVal);	//进度条的宽度
					percent.html(percentVal);//显示进度为0% 
					btn.html("上传中...");	//上传按钮显示上传中
				},
				/*uploadProgress: function(event, position, total, percentComplete) {
					var percentVal = percentComplete + '%';	//获得进度
					bar.width(percentVal);	//上传进度条宽度变宽
					percent.html(percentVal);	//显示上传进度百分比
				},*/
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img = "../../uploadfile/upload/image/<?=date('Ymd')?>/"+data.pic;
					//判断上传图片的大小 然后设置图片的高与宽的固定宽
					showimg.html("<img src='"+img+"' id='cropbox' />");
					//传给php页面，进行保存的图片值
					$("#src").val(img);
					//截取图片的js
					$('#cropbox').Jcrop({
						aspectRatio: 0,
						//minSize:[<?=$w?>,<?=$h?>],
						//maxSize:[<?=$w?>,<?=$h?>],
						onSelect: updateCoords,
 						dragEdges:true, //允许选择
						allowResize:true, //是否允许调整大小
						setSelect: [ 0, 0, <?=$w?>, <?=$h?> ]
					});
					btn.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn.html("上传失败");
					bar.width('0')
					files.html(xhr.responseText);	//返回失败信息
				}
			});
		});
		
		$(".delimg").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("action.php?act=delimg",{imagename:pic},function(msg){
				if(msg==1){
					files.html("删除成功.");
					showimg.empty();	//清空图片
					progress.hide();	//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
	});
	
	function updateCoords(c){
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
	
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
		alert('请选择一个裁剪区域，然后按提交.');
		return false;
	};
</script>
</head>
<body>
<div class="Personal" style="padding-top:20px;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="13%"><form action="Modifyface.php" method="post" onSubmit="return checkCoords();">
          <div class="demo">
		    <p>说明：仅支持png/gif/jpg格式的图片，图片大小:<?=get_cfg_var("post_max_size")?>内</p>
             <div class="btn"> <span>上传图片</span>
              <input id="fileupload" type="file" name="mypic" accept="image/gif,image/jpeg,image/png" >
            </div>
            <input type="submit" value="确认保存" class="Intercbtn" />
            <div class="progress"> <span class="bar"></span><span class="percent">0%</span > </div>
            <div class="files"></div>
            <div id="showimg"></div>
          </div>
          <input type="hidden" id="src" name="src" value="" />
          <input type="hidden" id="x" name="x" />
		  <input type="hidden" id="y" name="y" />
		  <input type="hidden" id="w" name="w" />
		  <input type="hidden" id="h" name="h" />
          <input type="hidden" id="a" name="a" value="<?=$_GET['a']?>" />
        </form></td>
    </tr>
  </table>
</div>
</body>
</html>