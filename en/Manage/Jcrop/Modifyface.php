<?php
@session_start();
if(!isset($_SESSION['admin_id']))
{
	echo"<script language='javascript'>top.document.location.href='/Admin-Login-Index.html';</script>";
	exit();
}
$path=date("Ymd");
$dir_name="../../Uploads/image/{$path}";
if ($dir_name) {
	$root_path .= $dir_name . "/";
	if (!file_exists($root_path)) {
		mkdir($root_path);
	}
}	

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	//删除会员以前的头像
	if(file_exists($MemberFace)) {
		unlink($MemberFace);
	}
	$MemberFace = sliceBanner("my");
	$filename=str_replace("../..","",$MemberFace);
	echo "<script>window.opener.document.formlist.".$_POST['a'].".value='".$filename."'</script>";
	echo "<script language=\"javascript\">
		window.alert(\"上传成功!\");
		window.close();
		</script>";
	exit;
}

function sliceBanner($UserName){
	global $dir_name;
	$x = (int)$_POST['x'];
	$y = (int)$_POST['y'];
	$w = (int)$_POST['w'];
	$h = (int)$_POST['h'];
	$pic = $_POST['src'];
	
	//剪切后小图片的名字
	$str = explode(".",basename($pic));//图片的格式
	$type = $str[1]; //图片的格式
	$filename = $UserName."_".date("YmdHis").".". $type; //重新生成图片的名字
	$uploadBanner = $pic;
	$sliceBanner = "{$dir_name}/{$filename}";//剪切后的图片存放的位置
	//创建图片
	$src_pic = getImageHander($uploadBanner);
	$dst_pic = imagecreatetruecolor($w, $h);
	imagecopyresampled($dst_pic,$src_pic,0,0,$x,$y,$w,$h,$w,$h);
	imagejpeg($dst_pic, $sliceBanner);
	imagedestroy($src_pic);
	imagedestroy($dst_pic);
	
	//删除已上传未裁切的图片
	if(file_exists($uploadBanner)) {
		unlink($uploadBanner);
	}
	//返回新图片的位置
	return $sliceBanner;
}
//初始化图片
function getImageHander ($url) {
	$size=@getimagesize($url);
	switch($size['mime']){
		case 'image/jpeg': $im = imagecreatefromjpeg($url);break;
		case 'image/gif' : $im = imagecreatefromgif($url);break;
		case 'image/png' : $im = imagecreatefrompng($url);break;
		default: $im=false;break;
	}
	return $im;
}
?>
