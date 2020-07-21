<?php
@session_start();
if(!isset($_SESSION['admin_id']))
{
 	echo"<script language='javascript'>top.document.location.href='/Admin-Login-Index.html';</script>";
	exit();
}
$action = $_GET['act'];
$path=date("Ymd");
$dir_name="../../Uploads/image/{$path}";
 
if ($dir_name) {
	$root_path .= $dir_name . "/";
	if (!file_exists($root_path)) {
		mkdir($root_path);
	}
}	

if($action=='delimg'){
	$filename = $_POST['imagename'];
	if(!empty($filename)){
		unlink("{$dir_name}/{$filename}");
		echo '1';
	}else{
		echo '删除失败.';
	}
}else{
	$picname = $_FILES['mypic']['name'];
	$picsize = $_FILES['mypic']['size'];
	if ($picname != "") {
		if ($picsize > 1024000) {
			echo '图片大小不能超过1M';
			exit;
		}
		$type = strstr($picname, '.');
		if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
			echo '图片格式不对！';
			exit;
		}
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		//上传路径
		$pic_path = "{$dir_name}/{$pics}";
		move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
	}
	$size = round($picsize/1024,2);
	$image_size = getimagesize($pic_path);
	$arr = array(
		'name'=>$picname,
		'pic'=>$pics,
		'size'=>$size,
		'width'=>$image_size[0],
		'height'=>$image_size[1]
	);
	echo json_encode($arr);
}
?>