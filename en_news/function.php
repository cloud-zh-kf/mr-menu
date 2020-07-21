<?php
return array(
	//'配置项'=>'配置值'
	'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_MODEL' => 0, //URL模式 0:普通模式 1：PATHINFO模式 2：REWRITE模式 3：兼容模式
	'URL_PATHINFO_DEPR' => '-', //PATHINFO URL分割符
	'URL_HTML_SUFFIX' => '.html', //后缀
	//'APP_GROUP_LIST' => 'Admin', //项目分组设
	
	'URL_CASE_INSENSITIVE' => false,		  //URL忽略大小写 试试
	'SHOW_ERROR_MSG' 	   => false, 		  // 显示错误信息
 
	'TMPL_L_DELIM'=>'{my',
	'TMPL_R_DELIM'=>'}',


	// 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>true, //启用smtp认证
    'MAIL_USERNAME' =>'sendmail1984@163.com',//你的邮箱名
    'MAIL_FROM' =>'sendmail1984@163.com',//发件人地址
    'MAIL_FROMNAME'=>'网站管理员',//发件人姓名
    'MAIL_PASSWORD' =>'acegbd220',//授权码//163
	'MAIL_PORT' =>'25',//服务器的端口号
	'MAIL_SECURE' =>'tls',//设置启用加密，注意：tls必须打开 php_openssl 模块  
	'MAIL_CHARSET' =>'utf-8',//设置邮件编码
	'SMTPDebug' =>'0',//开启调试 1=开启
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件   
	
	'UPLOAD_SITEIMG_QINIU' => array ( 
	
		'maxSize' => 5 * 1024 * 1024,//文件大小
		'rootPath' => './',
		'saveName' => array ('uniqid', ''),
		'driver' => 'Qiniu',
		'driverConfig' => array (
			'secrectKey' => '<这里填七牛SK>', 
			'accessKey' => '<这里填七牛AK>',
			'domain' => '<空间名称>.qiniudn.com',
			'bucket' => '<空间名称>', 
		 )
	)	
); 




  
/**
* 邮件发送函数
*/
function sendMail($to, $title, $content) {
	import('Vendor.PHPMailer.smtp');
	import('Vendor.PHPMailer.phpmailer');
	$mail = new \PHPMailer();  //实例化
	$mail->IsSMTP(); // 启用SMTP
	$mail->SMTPDebug =C('SMTPDebug');//开启调试
	$mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
	$mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
	$mail->Port =C('MAIL_PORT');//服务器的端口号
	$mail->SMTPSecure = C('MAIL_SECURE'); //启用smtp认证
	$mail->Username = C('MAIL_USERNAME'); //你的邮箱名
	$mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
	$mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
	$mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
	$mail->AddAddress($to,"尊敬的客户");
	$mail->WordWrap = 50; //设置每行字符长度
	$mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
	$mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
	$mail->Subject =$title; //邮件主题
	$mail->Body = $content; //邮件内容
	$mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
	return $mail->Send();
}

//从当前URL中去掉某个参数之后的URL
function filterUrl($param){
	// 先取出当前的URL地址
	$url = $_SERVER['PHP_SELF'];
	// 正则去掉某个参数
	$re = "/\/$param\/[^\/]+/";
	return preg_replace($re, '', $url);
}

//使用一个表中的数据制作下拉框
function buildSelect($tableName, $selectName, $valueFieldName, $textFieldName, $selectedValue = ''){
	$model = D($tableName);
	$data = $model->field("$valueFieldName,$textFieldName")->select();
	$select = "<select name='$selectName'><option value=''>请选择</option>";
	foreach ($data as $k => $v)
	{
		$value = $v[$valueFieldName];
		$text = $v[$textFieldName];
		if($selectedValue && $selectedValue==$value)
			$selected = 'selected="selected"';
		else 
			$selected = '';
		$select .= '<option '.$selected.' value="'.$value.'">'.$text.'</option>';
	}
	$select .= '</select>';
	echo $select;
}

//删除图片
function deleteImage($image){
	@unlink(str_replace("/Uploads/","./Uploads/",$image));
}

/**
 * 上传图片并生成缩略图
 * 用法：
 * $ret = uploadOne('logo', 'Goods', array(
			array(600, 600),
			array(300, 300),
			array(100, 100),
		));
	返回值：
	if($ret['ok'] == 1)
		{
			$ret['images'][0];   // 原图地址
			$ret['images'][1];   // 第一个缩略图地址
			$ret['images'][2];   // 第二个缩略图地址
			$ret['images'][3];   // 第三个缩略图地址
		}
		else 
		{
			$this->error = $ret['error'];
			return FALSE;
		}
 *
 */
 
//小头像图片 
function get_avatar($imgpath,$noimg="noavatar.gif"){
	if($imgpath) $str=$imgpath;else $str="Uploads/{$noimg}";
	return $str;
}  

//大头像图片
function get_photo($imgpath,$noimg="nophoto.jpg"){
	if($imgpath) $str=$imgpath;else $str="Uploads/{$noimg}";
	return $str;
} 

//封面图片
function get_coverimg($imgpath,$noimg="nopic.jpg"){
	if($imgpath) $str=$imgpath;else $str="Uploads/{$noimg}";
	return $str;
} 
 

//封面图片
function get_dcoverimg($imgpath,$noimg="nopic.jpg"){
	if($imgpath) $str=$imgpath;else $str="Uploads/{$noimg}";
	return $str;
}  
//urlsafe_base64_encode函数
function urlsafe_base64_encode($data) {
   $data = base64_encode($data);
   $data = str_replace(array('+','/'),array('-','_'),$data);
   return $data;
}
 
//视频格式转换
function qiniu_Convert($key){
    $data = 'bucket=model-video&key=' . $key . '&fops=' . urlencode('avthumb/flv') . '&pipeline=model-video';
    $sign = hash_hmac('sha1', "/pfop/\n" . $data, 'zj91Utea1dFR4_p7dcAlsAcGxvNXIy8ntzlAyip2', true);
    $token = 'LhLWyxUTMh8hX5IPuHoJ3s70WmhsKJj9BsCpTMxz' . ':' . str_replace(array('+', '/'), array('-', '_'), base64_encode($sign));
    $header = array('Content-Type:application/x-www-form-urlencoded', 'Authorization: QBox ' . $token);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://api.qiniu.com/pfop/');
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $result = json_decode(curl_exec($curl), true);
    curl_close($curl);
}

//生成token
function qiniu_token($type='imgbucket'){
	import('Vendor.Qiniu.Auth');
	import('Vendor.Qiniu.functions');
	
	$ic = C('UPLOAD_SITEIMG_QINIU');
   
    $accessKey = $ic['accessKey'];  
   
    $secretKey = $ic['secretKey'];  
   
    $bucket = $ic[$type];  
	
    $auth = new \Auth($accessKey, $secretKey);  
   
    $token = $auth->uploadToken($bucket); 
	
	return  $token;
}
 
 
//删除缩略图
function delete_thumb($key){
	import('Vendor.Qiniu.Auth');
	import('Vendor.Qiniu.functions');
	import('Vendor.Qiniu.BucketManager');
	
	if($key){
		$ic = C('UPLOAD_SITEIMG_QINIU');
		$accessKey = $ic['accessKey'];  
		$secretKey = $ic['secretKey'];
		$bucket	   = $ic['imgbucket'];
	
		$auth = new \Auth($accessKey, $secretKey);
		$config = new \Config();
		$bucketManager = new \BucketManager($auth, $config);
	
		$err = $bucketManager->delete($bucket, $key);
		if ($err) {
			print_r($err);
		}
	}	
}
 
//七牛云生成指定尺寸的缩略图thumb
function make_thumb($pre,$filename,$w=162,$h=162,$domain="p1cnskacn"){
	import('Vendor.Qiniu.Auth');
	import('Vendor.Qiniu.functions');

	$ic = C('UPLOAD_SITEIMG_QINIU');
    $accessKey = $ic['accessKey'];  
    $secretKey = $ic['secretKey'];
    $bucket	   = $ic['imgbucket'];
  	 
 	$newurl = "{$domain}.bkt.clouddn.com/{$filename}?imageView2/2/w/{$w}/h/{$h}/q/100|saveas/".urlsafe_base64_encode("{$bucket}:{$pre}_{$filename}");
 	$finalURL = "http://".$newurl."/sign/".$accessKey.":".urlsafe_base64_encode(hash_hmac("sha1", $newurl,$secretKey, true));

	$arr = file_get_contents($finalURL);
	
	$bd= (array)json_decode($arr,true);  
	
	$thumb=$bd['key'];
	
	return  $thumb;
}
  
 
//七牛云视频截图thumb
function make_video_thumb($pre,$key,$w=270,$h=160,$domain="p1cnskacn"){
	import('Vendor.Qiniu.Auth');
	import('Vendor.Qiniu.PersistentFop');

	$ic = C('UPLOAD_SITEIMG_QINIU');
    $accessKey = $ic['accessKey'];  
    $secretKey = $ic['secretKey'];
 	$bucket	   = $ic['videobucket'];
	
	$auth = new \Auth($accessKey, $secretKey);
 	
 	$pipeline = 'model-video'; 
	
	$force = false;
	
	$notifyUrl = '';
	
	$config = new \Config();
 	
 	//$config->useHTTPS = true;
	
 	$pfop = new PersistentFop($auth, $config);
	
	$arr=explode(".",$key);
	
	$new_name="{$pre}_{$arr[0]}.jpg";
 
 	$fops = "vframe/jpg/offset/3/w/{$w}/h/{$h}/rotate/auto|saveas/" . base64_urlSafeEncode($bucket . ":{$new_name}");

	$pfop->execute($bucket, $key, $fops, $pipeline, $notifyUrl, $force);
	
	return $new_name;
}
 
 
//七牛云视频格式转换
function make_video_formart($key,$w=640,$h=360,$domain="p4n2wnw5k"){
	import('Vendor.Qiniu.Auth');
	import('Vendor.Qiniu.PersistentFop');

	$ic = C('UPLOAD_SITEIMG_QINIU');
    $accessKey = $ic['accessKey'];  
    $secretKey = $ic['secretKey'];
 	$bucket	   = $ic['videobucket'];
	
	$auth = new \Auth($accessKey, $secretKey);
 	
 	$pipeline = 'model-video'; 
	
	$force = false;
	
	$notifyUrl = '';
	
	$config = new \Config();
	
 	$pfop = new PersistentFop($auth, $config);
	
	$arr=explode(".",$key);
	
	$new_name="{$arr[0]}.flv";
 
 	$fops = "avthumb/flv/s/{$w}x{$h}/vb/1.4m|saveas/" . base64_urlSafeEncode($bucket . ":{$new_name}");

	$pfop->execute($bucket, $key, $fops, $pipeline, $notifyUrl, $force);
	
	return $new_name;
}

function msectime() {
    list($msec, $sec) = explode(' ', microtime());
    $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000).rand(3);
    return $msectime;
}

//上传图片 
function uploadimgOne($imgName, $dirName, $thumb = array()){
	// 上传LOGO
	if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0){
		$ic = C('IMAGE_CONFIG');
		$upload = new \Think\Upload(array(
			'rootPath' => $ic['rootPath'],
			'maxSize' => $ic['maxSize'],
			'exts' => $ic['exts'],
		));// 实例化上传类
        $upload->saveName ='msectime';
		$upload->subName   = array('date','Ymd');  
		$upload->savePath = $dirName . '/'; // 图片二级目录的名称
		// 上传文件 
		// 上传时指定一个要上传的图片的名称，否则会把表单中所有的图片都处理，之后再想其他图片时就再找不到图片了
		$info   =   $upload->upload(array($imgName=>$_FILES[$imgName]));
		if(!$info){
			return array(
				'ok' => 0,
				//'error' => $upload->getError(),
			);
		}else{
			$ret['ok'] = 1;
		    $ret['images'][0] = $logoName = $info[$imgName]['savepath'] . $info[$imgName]['savename'];
		    // 判断是否生成缩略图
		    if($thumb){
		    	$image = new \Think\Image();
		    	// 循环生成缩略图
		    	foreach ($thumb as $k => $v){
		    		$ret['images'][$k+1] = $info[$imgName]['savepath'] . 'thumb_'.$k.'_' .$info[$imgName]['savename'];
		    		// 打开要处理的图片
				    $image->open($ic['rootPath'].$logoName);
				    $image->thumb($v[0], $v[1],$image::IMAGE_THUMB_FIXED)->save($ic['rootPath'].$ret['images'][$k+1]);
		    	}
		    }
			$ret['newsavepath']= $ic['viewPath'].$ret['images'][0];
		    return $ret;
		}
	}
}

 
//上传文件
function uploadfileOne($imgName, $dirName)
{
	// 上传上传文件
	if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0){
		$ic = C('File_CONFIG');
		$upload = new \Think\Upload(array(
			'rootPath' => $ic['rootPath'],
			'maxSize' => $ic['maxSize'],
			'exts' => $ic['exts'],
		));// 实例化上传类
		$upload->subName   = array('date','Ymd');  
		$upload->savePath = $dirName . '/'; // 图片二级目录的名称
		// 上传文件 
		// 上传时指定一个要上传的图片的名称，否则会把表单中所有的图片都处理，之后再想其他图片时就再找不到图片了
		$info   =   $upload->upload(array($imgName=>$_FILES[$imgName]));
		if(!$info){
			return array(
				'ok' => 0,
				'error' => $upload->getError(),
			);
		}else{
			$ret['ok'] = 1;
		    $ret['images'][0] = $logoName = $info[$imgName]['savepath'] . $info[$imgName]['savename'];
 			$ret['newsavepath']= $ic['viewPath'].$ret['images'][0];
		    return $ret;
		}
	}
}


//显示图片
function showImage($url, $width = '', $height = '')
{
	$ic = C('IMAGE_CONFIG');
	if($width)
		$width = "width='$width'";
	if($height)
		$height = "height='$height'";
	echo "<img $width $height src='{$ic['viewPath']}$url' />";
}
//获取FLV视频时长
function get_videotime($video){
	//echo $videos;
	$video=str_replace("/Uploads/","./Uploads/",$video);
  	$time=getTime($video);
	return fn($time);
}

//获取FLV视频时长
function BigEndian2Int($byte_word, $signed = false) {
	$int_value=0;
	$byte_wordlen = strlen($byte_word);
	for ($i = 0; $i < $byte_wordlen; $i++){
		$int_value += ord($byte_word{$i}) * pow(256, ($byte_wordlen - 1 - $i));
	}
	if ($signed){
		$sign_mask_bit = 0x80 << (8 * ($byte_wordlen - 1));
		if ($int_value & $sign_mask_bit){
			$int_value = 0 - ($int_value & ($sign_mask_bit - 1));
		}
	}
	return $int_value;
}

//获取FLV视频时长
function getTime($name){
	if(!file_exists($name)){
		return;
	}

	$flv_data_length=filesize($name);
	$fp = @fopen($name, 'rb');
	$flv_header = fread($fp, 5);
	fseek($fp, 5, SEEK_SET);
	$frame_size_data_length =BigEndian2Int(fread($fp, 4));
	$flv_header_frame_length = 9;
	if ($frame_size_data_length > $flv_header_frame_length) {
		fseek($fp, $frame_size_data_length - $flv_header_frame_length, SEEK_CUR);
	}
	$duration = 0;
	while ((ftell($fp) + 1) < $flv_data_length) {
		$this_tag_header = fread($fp, 16);
		$data_length = BigEndian2Int(substr($this_tag_header, 5, 3));
		$timestamp = BigEndian2Int(substr($this_tag_header, 8, 3));
		$next_offset = ftell($fp) - 1 + $data_length;
		if ($timestamp > $duration) {
			$duration = $timestamp;
		}
		fseek($fp, $next_offset, SEEK_SET);
	}
	fclose($fp);
	return $duration;
}

//获取FLV视频时长
function fn($time){
	$num = $time;
	$sec = intval($num / 1000);
	$h = intval($sec / 3600);
	$m = intval(($sec % 3600) / 60);
	$s = intval(($sec % 60 ));
	$tm = $h . ':' . $m . ':' . $s ;
	return $tm;
}

/**
* 生成随机数
*/
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = '0123456789';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}


 

//增加日志文件
function my_log($uid,$typeid=1,$_logtitle,$_logcontent) {
 	$db=M("info");
	$_POST['uids']=$uid;
	$_POST['typeid']=$typeid;
	$_POST['title']=$_logtitle;
	$_POST['content']=$_logcontent;
	$_POST['status']=1;
	$_POST['sendtime']=time();
	$db->create();
	$db->add();
} 
 
//获取评论
function get_rating($v,$c='act_star.png'){
	for($i=0;$i<=$v;$i++){
 		$str.="<img src=\"/public/images/icon/{$c}\" class=\"star\" />";
	}
	return $str;
}
 
 
 
//获取下拉框数据
function get_select_data($min,$max,$v){
	for($i=$min;$i<=$max;$i++){
		if($i==$v) $c=" selected";else $c="";
		$str.="<option value=\"{$i}\"{$c}>{$i}</option>";
	}
	return $str;
}

//获取下拉框数据
function get_tip($v){
	if($v) $str="<span class=\"nr\">{$v}</span>";else $str="<span class=\"nr notadd\">未添加</span>";
	return $str;
}

//获取下拉框数据
function get_tags($str,$c='rd2'){
	$arr=explode(",",$str);
	foreach ($arr as $k=>$v){
 		$strs.="<span class=\"rd2\">{$v}</span>";
	}
	return $strs;
}

//七牛接口 // URLSafeBase64Encode
function Qiniu_Encode($str){
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($str));
}

//七牛接口
function Qiniu_Sign($url) {//$info里面的url
    $setting = C ( 'UPLOAD_SITEIMG_QINIU' );
    $duetime = NOW_TIME + 86400;//下载凭证有效时间
    $DownloadUrl = $url . '?e=' . $duetime;
    $Sign = hash_hmac ( 'sha1', $DownloadUrl, $setting ["driverConfig"] ["secrectKey"], true );
    $EncodedSign = Qiniu_Encode ( $Sign );
    $Token = $setting ["driverConfig"] ["accessKey"] . ':' . $EncodedSign;
    $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
    return $RealDownloadUrl;
}


//获取分类相关字段
function get_topurl($pid,$ty){
    if($ty) $ty=$ty;else $ty=get_nextid($pid);
    $module_id=get_sort_zd($ty,'module_id');
    if($pid==5){
        $url="AboutUs";
    }elseif($pid==6){
        $url="Help";
    }elseif($pid==7){
        $url="Service";
    }elseif($pid==8){
        $url="News";
    }else{
        if($module_id==1) $url="News";
        elseif($module_id==2||$ty==28) $url="About";
        elseif($module_id==3) $url="Video";
        elseif($module_id==6) $url="Message";
        elseif($module_id==7) $url="Movies";
    }
    //echo $url;
    $str=U('List/'.$url,"pid={$pid}&ty={$ty}");
    return $str;
}


//获取导航URL
function get_nav_url($pid,$ty,$tty){
    if($tty){
        $mc=get_zd_name("inlinkurl","sort","id={$ty}");
        $str=U('List/'.$mc,"pid={$pid}&ty={$ty}&tty={$ty}&tty={$tty}");
    }elseif($ty){
        //$mc=get_sort_zd($ty,'inlinkurl');
        $mc=get_zd_name("inlinkurl","sort","id={$ty}");
        $str=U('List/'.$mc,"pid={$pid}&ty={$ty}");
    }else{
        //$mc=get_sort_zd($pid,'inlinkurl');
        $mc=get_zd_name("inlinkurl","sort","id={$pid}");
        $str=U('List/'.$mc,"pid={$pid}");
    }
    return $str;
}

//字符截取
function cutstr_html($string, $sublen){
  $string = htmlspecialchars_decode($string);
  $string = strip_tags($string);
  $string = preg_replace ('/\n/is', '', $string);
  $string = preg_replace ('/ |　/is', '', $string);
  $string = preg_replace ('/&nbsp;/is', '', $string);
   
  preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);   
  if(count($t_string[0]) - 0 > $sublen) $string = join('', array_slice($t_string[0], 0, $sublen))."…";   
  else $string = join('', array_slice($t_string[0], 0, $sublen));
  return $string;
}


function cutstr($string, $length, $dot='...') {
    global $charset;

    if(strlen($string) <= $length) {
        return $string;
    }

    $string = str_replace(array('&amp;', '&quot;', '&#39;', '&lt;', '&gt;'), array('&', '"', '\'', '<', '>'), $string);
    $string = str_replace('&nbsp;', ' ', $string);

    $strcut = '';
    if(strtolower($charset) == 'utf-8') {

        $n = $tn = $noc = 0;
        while($n < strlen($string)) {

            $t = ord($string[$n]);
            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                $tn = 1; $n++; $noc++;
            } elseif(194 <= $t && $t <= 223) {
                $tn = 2; $n += 2; $noc += 2;
            } elseif(224 <= $t && $t < 239) {
                $tn = 3; $n += 3; $noc += 2;
            } elseif(240 <= $t && $t <= 247) {
                $tn = 4; $n += 4; $noc += 2;
            } elseif(248 <= $t && $t <= 251) {
                $tn = 5; $n += 5; $noc += 2;
            } elseif($t == 252 || $t == 253) {
                $tn = 6; $n += 6; $noc += 2;
            } else {
                $n++;
            }

            if($noc >= $length) {
                break;
            }

        }
        if($noc > $length) {
            $n -= $tn;
        }

        $strcut = substr($string, 0, $n);

    } else {
        for($i = 0; $i < $length - strlen($dot) - 1; $i++) {
            $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
        }
    }

    $strcut = str_replace(array('&', '"', '\'', '<', '>'), array('&amp;', '&quot;', '&#39;', '&lt;', '&gt;'), $strcut);

    return $strcut.$dot;
}


//获取发团计划表信息
function get_tripprice_list($pid,$tid,$num="999999999"){
	$list=D('tripprice')->field('*')->where("status=1 AND pid={$pid} AND tid={$tid}")->limit($num)->select();
  	return $list;
} 
 
//获取新闻表字段内容
function get_single_content($pid,$ty,$tty=0,$ttty=0,$zd='content'){
 	$str="";
	if($pid) $sqlkey=" AND pid={$pid}";
	if($ty) $sqlkey.=" AND ty={$ty}";
	if($tty) $sqlkey.=" AND tty={$tty}";
	if($ttty) $sqlkey.=" AND ttty={$ttty}";
	$itemnoa = "get_single_content{$ty}{$num}{$limit}";
	$cacheDataa=S($itemno);
	if(!$cacheData){
 		$list=D('news')->field($zd)->where("status=1{$sqlkey}")->find();
 		//$list=html_entity_decode($arr['content']);
		S($itemno, $list);
	}else{
		$list=$cacheData;
	}	
  	return $list;
}


//获取新闻列表
function get_news_good($pid,$ty,$tty=0,$ttty=0,$zd="*",$num=8,$limit=0,$desc='desc'){
    $str="";
    $q=trim($_GET['q']);
    if($pid) $sqlkey=" AND pid={$pid}";
    if($ty) $sqlkey.=" AND ty={$ty}";
    if($tty) $sqlkey.=" AND tty={$tty}";
    if($ttty) $sqlkey.=" AND ttty={$ttty}";
    if($q) $sqlkey .= " and title like '%".$q."%'";

    $itemno = "get_news{$ty}{$num}{$limit}";
    $cacheDataa=S($itemno);
    $cacheData=false;
    if(!$cacheData){
        $list=D("news")->field($zd)->where("status=1 AND isgood=1{$sqlkey}")->order("disorder desc,id {$desc}")->limit($limit,$num)->select();
        S($itemno, $list);
    }else{
        $list=$cacheData;
    }
    return $list;
}


//获取新闻列表
function get_news($pid,$ty,$tty=0,$ttty=0,$zd="*",$num=8,$limit=0,$desc='desc'){
	$str="";
    $q=trim($_GET['q']);
	if($pid) $sqlkey=" AND pid={$pid}";
	if($ty) $sqlkey.=" AND ty={$ty}";
	if($tty) $sqlkey.=" AND tty={$tty}";
	if($ttty) $sqlkey.=" AND ttty={$ttty}";
    if($q) $sqlkey .= " and title like '%".$q."%'";

    $itemno = "get_news{$ty}{$num}{$limit}";
	$cacheDataa=S($itemno);
    $cacheData=false;
	if(!$cacheData){
		$list=D("news")->field($zd)->where("status=1{$sqlkey}")->order("disorder desc,id {$desc}")->limit($limit,$num)->select();
 		S($itemno, $list);
	}else{
		$list=$cacheData;
	}
  	return $list;
}

//获取新闻列表
function get_case($pid,$ty,$tty=0,$ttty=0,$zd="*",$num=8,$limit=0,$desc='desc'){
	$str="";
    $q=trim($_GET['q']);
	if($pid) $sqlkey=" AND pid={$pid}";
	if($ty) $sqlkey.=" AND ty={$ty}";
	if($tty) $sqlkey.=" AND tty={$tty}";
	if($ttty) $sqlkey.=" AND ttty={$ttty}";
    if($q) $sqlkey .= " and title like '%".$q."%'";

    $itemno = "get_case{$ty}{$num}{$limit}";
	$cacheDataa=S($itemno);
    $cacheData=false;
	if(!$cacheData){
		$list=D("casexq")->field($zd)->where("status=1{$sqlkey}")->order("disorder desc,id {$desc}")->limit($limit,$num)->select();
 		S($itemno, $list);
	}else{
		$list=$cacheData;
	}
  	return $list;
}


//获取新闻列表
function get_news_pic($pid,$ty,$tty=0,$ttty=0,$zd="*",$num=8,$limit=0,$desc='desc'){
    $str="";
    $q=trim($_GET['q']);
    if($pid) $sqlkey=" AND pid={$pid}";
    if($ty) $sqlkey.=" AND ty={$ty}";
    if($tty) $sqlkey.=" AND tty={$tty}";
    if($ttty) $sqlkey.=" AND ttty={$ttty}";
    if($q) $sqlkey .= " and title like '%".$q."%'";

    $itemno = "get_news{$ty}{$num}{$limit}";
    $cacheDataa=S($itemno);
    $cacheData=false;
    if(!$cacheData){
        $list=D("news")->field($zd)->where("status=1 AND img1<>''{$sqlkey}")->order("disorder desc,id {$desc}")->limit($limit,$num)->select();
        S($itemno, $list);
    }else{
        $list=$cacheData;
    }
    return $list;
}

//获取新闻置顶
function get_news_zdfy($pagesize=8,$pid,$ty,$tty=0,$ttty=0){
    $db=D('news');
    $gpid=I('get.pid',0);
    $gty=I('get.ty',0);
    $gtty=I('get.tty',0);
    $gttty=I('get.ttty',0);
    $q=trim($_GET['q']);

    if($gpid) $pid=$gpid;else $pid=$pid;
    if($gty) $ty=$gty;else $ty=$ty;
    if($gtty) $tty=$gtty;else $tty=$tty;
    if($gttty) $ttty=$gttty;else $ttty=$ttty;
    if($q) $sqlkey .= " and title like '%".$q."%'";
    $sqlkey="status=1";
    if($pid) $sqlkey.=" AND pid={$pid}";
    if($ty) $sqlkey.=" AND ty={$ty}";
    if($tty) $sqlkey.=" AND tty={$tty}";
    if($ttty) $sqlkey.=" AND ttty={$ttty}";
    $count = $db->where($sqlkey)->count();
    $Page = new \Think\WebPage($count,$pagesize);
    $list = $db->where($sqlkey)->order('disorder desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    return $list;
}

//获取新闻列表
function get_news_fy($pagesize=8,$pid,$ty,$tty=0,$ttty=0){
    $db=D('news');
    $gpid=I('get.pid',0);
    $gty=I('get.ty',0);
    $gtty=I('get.tty',0);
    $gttty=I('get.ttty',0);
    $q=trim($_GET['q']);

    if($gpid) $pid=$gpid;else $pid=$pid;
    if($gty) $ty=$gty;else $ty=$ty;
    if($gtty) $tty=$gtty;else $tty=$tty;
    if($gttty) $ttty=$gttty;else $ttty=$ttty;
    
    $sqlkey="status=1";
    if($pid) $sqlkey.=" AND pid={$pid}";
    if($ty) $sqlkey.=" AND ty={$ty}";
    if($tty) $sqlkey.=" AND tty={$tty}";
    if($ttty) $sqlkey.=" AND ttty={$ttty}";
    if($q) $sqlkey .= " and title like '%".$q."%'";
    $count = $db->where($sqlkey)->count();
    $Page = new \Think\WebPage($count,$pagesize);
    $list = $db->where($sqlkey)->order('disorder desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    return $list;
}

//获取新闻分页
function get_news_fym($pagesize=8,$pid,$ty,$tty=0,$ttty=0){
    $db=D('news');
    $gpid=I('get.pid',0);
    $gty=I('get.ty',0);
    $gtty=I('get.tty',0);
    $gttty=I('get.ttty',0);
    $q=trim($_POST['q']);

    if($gpid) $pid=$gpid;else $pid=$pid;
    if($gty) $ty=$gty;else $ty=$ty;
    if($gtty) $tty=$gtty;else $tty=$tty;
    if($gttty) $ttty=$gttty;else $ttty=$ttty;

    $sqlkey="status=1";
    if($pid) $sqlkey.=" AND pid={$pid}";
    if($ty) $sqlkey.=" AND ty={$ty}";
    if($tty) $sqlkey.=" AND tty={$tty}";
    if($ttty) $sqlkey.=" AND ttty={$ttty}";
    if($q) $sqlkey .= " and title like '%".$q."%'";
    $count = $db->where($sqlkey)->count();
    $Page = new \Think\WebPage($count,$pagesize);
    $Pageshow = $Page->show();
    return $Pageshow;
}

//获取指定URL链接
function get_cur($pid,$str,$vpid){
    if($pid==I('get.pid')&&$pid>0||$pid==$vpid&&$pid>0||$pid==$vpid&&$pid==0&&I('get.pid')==0) $cur=$str;else $cur='';
    return $cur;
}


//获取指定URL链接
function get_url($id,$c='List',$m='View'){
    $myurl=U("{$c}/{$m}?id={$id}");
    return $myurl;
}

//获取指定URL链接
function get_sort_url($pid,$ty,$tty,$m='View',$c='List'){
    $myurl=U("{$c}/{$m}?pid={$pid}&ty={$ty}&tty={$tty}");
    return $myurl;
}

//获取指定图片
function get_img($v,$defaultimg='/Uploads/nopic.jpg'){
    if($v) $myimg=$v;else $myimg=$defaultimg;
    return $myimg;
}

//获取指定见时间
function get_time($v,$default='Y-m-d'){
    if($v) $mytime=date($default,$v);
    return $mytime;
}

//获取指定见时间
function get_content($v,$len='0'){
    if($len) $myvalue=cutstr_html($v,$len);else $myvalue=$v;
    return $myvalue;
}


//我的上一篇
function get_prev($id){
    $db=M('news');
    $v=$db->where("status=1 AND id={$id}")->find();
    if($v['disorder']) $ss1=" and disorder>{$v['disorder']} ";else $ss1=" and id>{$id}";
    $list=$db->field('id,title')->where("pid={$v['pid']} and ty={$v['ty']} and status=1 {$ss1}")->order("disorder asc,id asc")->limit(1)->select();
    return $list;
}


//我的下一篇
function get_next($id){
    $db=M('news');
    $v=$db->where("status=1 AND id={$id}")->find();
    if($v['disorder']) $ss1=" and disorder<{$v['disorder']} ";else $ss1=" and id<{$id}";
    $list=$db->field('id,title')->where("pid={$v['pid']} and ty={$v['ty']} and status=1 {$ss1}")->order("disorder asc,id asc")->limit(1)->select();
    return $list;
}

//我的详情
function get_view($myid){
    $db=M('news');
    if($myid) $id=$myid;else $id=I('get.id',0);
    $v=$db->where("status=1 AND id={$id}")->limit(1)->select();
    $count=$db->where("status=1 AND id={$id}")->count();
    if($v&&$count){
        $sqls="update __PREFIX__news set hits=hits+1 where id={$id}";
        $db->execute($sqls);
    }else{
       echo "<script>alert('访问出错');location.href='/'</script>";
       exit();
    }
    return $v;
}

//生成orderid
function get_orderid(){
	$curDateTime = date("ymdHis");
	$strDate = date("ymd");
	$strTime = date("His");
	//4位隨機數
	$randNum = rand(1000, 9999);
	//10位序列號,可以自行調整。
	$strReq = $strTime . $randNum;
	 /* 商家的定單號 */
	$orderid = $curDateTime . $randNum;
	return $orderid;
}

//推荐标语
function get_slogan($str,$c='rd3'){
	$arr=explode(",",$str);
	foreach ($arr as $k=>$v){
 		$strs.="<span class=\"{$c}\">{$v}</span>\n";
	}
	return $strs;
}

//推荐标语
function get_vslogan($str,$c='rd3'){
	$arr=explode(",",$str);
	foreach ($arr as $k=>$v){
 		$strs.="<a>{$v}</a>\n";
	}
	return $strs;
}


//优势 
function get_advantage($str,$c='wz'){
	$keyword_list = trim($str);
	$arr = explode("\r\n", $keyword_list);
	foreach ($arr as $k=>$v){
 		$strs.="<p class=\"{$c}\">{$v}</p>";
	}
	return $strs;
}

//获取优惠券数量
function get_Couponcount($id){
 	$uid=cookie('user_id');
	$count=D("mycoupon")->where("uid={$uid} AND pid={$id}")->count();
	//print_r($arr);
  	return $count;
} 
 
//封装https请求（GET和POST）
function https_requests($url,$data=null){
	//1、初始化curl
	$ch = curl_init();
 	//2、设置传输选项
	curl_setopt($ch, CURLOPT_URL, $url);//请求的url地址
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//将请求的结果以文件流的形式返回
 	if(!empty($data))
	{
		curl_setopt($ch,CURLOPT_POST,1);//请求POST方式
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//POST提交的内容
	}
 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);////设定是否显示头信息
	curl_setopt($ch,CURLOPT_HEADER,false);//设定是否输出页面内容
 	//3、执行请求并处理结果
	$outopt = curl_exec($ch);
 	if($outopt===false){
		echo "error".curl_error($ch)."<br>";
	}
	//4、关闭curl
	curl_close($ch);
 	return $outopt;
}

function https_request($url,$data=null){
	$ch = curl_init(); //初始化curl
	curl_setopt($ch,CURLOPT_URL, $url);//请求的url地址
	curl_setopt($ch,CURLOPT_HTTPHEADER, array('Authorization:Bearer 2cdaddd100f2a7feaa4172a8b2d199ab48eb7ec0a0f056a77a38473ced357bf8','Content-Type:application/json'));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//将请求的结果以文件流的形式返回
	curl_setopt($ch,CURLOPT_POST,1);//请求POST方式
	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//POST提交的内容
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);////设定是否显示头信息
	curl_setopt($ch,CURLOPT_HEADER,false);//设定是否输出页面内容
	$outopt = curl_exec($ch); //执行请求并处理结果
	if($outopt===false){
		echo "error".curl_error($ch)."<br>";
	}
	curl_close($ch); //关闭curl
	return $outopt;
}

function randoms($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        /* $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';*/
        $chars = '0123456789';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}


//PHP stdClass Object转array
function object_array($array) {
    if(is_object($array)) {
        $array = (array)$array;
    } if(is_array($array)) {
        foreach($array as $key=>$value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}

//短信发送
function sendSms($tel,$yzm,$code) {
    import('Vendor.Sms.SignatureHelper');
    $params = array ();
    // *** 需用户填写部分 ***
    // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
    $accessKeyId = "LTAI4Fhh995iPVKCQh8bBymo";
    $accessKeySecret = "tdRzpdn3SQV9WpJOdJ1ECd2wowfVNc";
    // fixme 必填: 短信接收号码
    $params["PhoneNumbers"] = $tel;
    // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
    $params["SignName"] = "东联和信";
    // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
    $params["TemplateCode"] = $code;
    // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
    $params['TemplateParam'] = Array (
        "code" => $yzm
    );
    // fixme 可选: 设置发送短信流水号
    $params['OutId'] = "12345";
    // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
    $params['SmsUpExtendCode'] = "1234567";
    // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
    if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
        $params["TemplateParam"] = json_encode($params["TemplateParam"]);
    }
    // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
    $helper = new \SignatureHelper();
    // 此处可能会抛出异常，注意catch
    $content = $helper->request(
        $accessKeyId,
        $accessKeySecret,
        "dysmsapi.aliyuncs.com",
        array_merge($params, array(
            "RegionId" => "cn-hangzhou",
            "Action" => "SendSms",
            "Version" => "2017-05-25",
        ))
    );
    $arr=object_array($content);
    if($arr['Code']=='OK'){
        $db=M("yzm");
        $_POST['typeid']=1;
        $_POST['username']=$tel;
        $_POST['yzm']=$yzm;
        $_POST['status']=0;
        $_POST['sendtime']=time();
        $db->create();
        if($db->add()){
            echo "手机短信验证码发送成功!";
        }
    }
    //return $content;
}


function sms_send($data){
	//print_r($data);
	$ch = curl_init();
	/* 设置验证方式 */
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8',
		'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));
	/* 设置返回结果为流 */
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	/* 设置超时时间*/
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	/* 设置通信方式 */
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/single_send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $outopt = curl_exec($ch);
    if($outopt===false){
		echo "error".curl_error($ch);
	}
    return $outopt;
}

//导航选中状态
function get_on($v1,$v2,$c){
	$arr=explode("|",$v2);
	//echo count($arr);
	if(count($arr)>1){
		for($i=0;$i<=count($arr);$i++){
			if($arr[$i]==$v1) return $c;
		}
	}else{
		if($v1==$v2) return $c;
	}
}
  
//类别id
function get_son_count($typeid=0,$fid,$table="type"){
	if($typeid) $sqlkey=" AND typeid={$typeid}";
	$arr=M($table)->where("pid={$fid}{$sqlkey}")->count();
 	return (int)$arr;
} 
 
//获取指定表内容
function get_zd_name($zd='',$table='',$where){
	$list=M($table)->field($zd)->where($where)->find();
	return $list[$zd];
}
  
//获取系统设置参数
function sys($varname){
	$str="";
	$str=F("{$varname}", '', TEMP_PATH);
 	return $str;
}

//获取产品分类
function get_nextid($pid=0){
	$arr=M('sort')->field('id')->order('disorder asc,id asc')->where("status=1 and pid={$pid}")->find();
	return $arr['id'];
}

//我的默认值
function get_my_value($myvalue,$default){
    if($myvalue) $str=$myvalue;else $str=$default;
    return $str;
}


//我的默认值
function get_my_checked($myvalue,$default){
    if($myvalue==$default) $check_str='checked'; else $check_str='';
    return $check_str;
}

//根据条件获取
function get_table_list($table,$sqlkey,$zd="*",$limit="999999999"){
    $list=D($table)->field($zd)->where("status=1{$sqlkey}")->order('id asc')->limit($limit)->select();
    return $list;
}

//获取分类相关字段
function get_sort_zd($id,$zd='catname'){
 	$arr=F("sort_{$id}", '', TEMP_PATH);
 	if($arr[$zd]) $str=$arr[$zd];elseif($zd<>'imgsize'&&$zd<>'imgname') $str=$arr['catname'];else $str='';
  	return $str;
}
//获取分类相关字段
function get_forms_zd($id,$zd='tablename'){
    $arr=F("forms_{$id}", '', TEMP_PATH);
    $str=$arr[$zd];
    return $str;
}
//获取类别相关字段
function get_type_zd($id,$zd='catname'){
 	$arr=F("type_{$id}", '', TEMP_PATH);
 	return $arr[$zd];
}

// //获取类别相关字段
// function get_config_zd($id,$zd='catname'){
//  	$arr=F("config_{$id}", '', TEMP_PATH);
//  	return $arr[$zd];
// }

//获取分类相关字段
function get_config_zd($id,$zd='varvalue'){
 	$arr=F("config_{$id}", '', TEMP_PATH);
 	if($arr[$zd]) $str=$arr[$zd];elseif($zd<>'imgsize'&&$zd<>'imgname') $str=$arr['varvalue'];else $str='';
  	return $str;
}

//获取模块相关字段
function get_model_zd($module_id,$zd='model_name'){
	$arr=F("model_{$module_id}", '', TEMP_PATH);
	return $arr[$zd];
} 

//获取角色相关字段
function get_role_zd($role_id,$zd='role_name'){
	$arr=F("role_{$role_id}", '', TEMP_PATH);
	return $arr[$zd];
} 


//获取会员相关字段
function get_user_zd($uid,$zd='nickname'){
	//if($uid) $uid=$uid;else $uid=cookie('user_id');
	//$arr=F("user_{$uid}", '', TEMP_PATH);
	$arr=D('user')->field($zd)->find($uid);
 	return $arr[$zd];
} 
 
//按条件获取数量
function get_count($table,$where){
	$count=D($table)->where($where)->count();
  	return (int)$count;
}
 
 
//调用会员表中的资料信息
function get_user_list($zd='*',$guid){
	$uid=cookie('user_id');
	if($guid) $uid=$guid;else $uid=$uid;
 	$users=D('user')->field($zd)->find($uid);
 	$users['tx']=$users['img1']?$users['img1']:'Uploads/nophoto.jpg';
	return $users;
} 
  
//购物车商品数
function get_cart_count(){
	//$orderid=session('temp_orderid'); 
	$uid=cookie('user_id');
	if($uid){
		$count=D("tempdata")->where("uid={$uid}")->count();
	}else{
		$count=0;
	}	
  	return (int)$count;
} 
 
  
//图片下载 
function http_down($url, $filename, $timeout = 60) {
    $path = dirname($filename);
    if (!is_dir($path) && !mkdir($path, 0755, true)) {
        return false;
    }
    $fp = fopen($filename, 'w');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    return $filename;
} 
 
 
//购物车商品价格
function get_cart_momey($ids){
	if($ids) $where=" AND id in(".$ids.")";
 	$uid=cookie('user_id');
	$orderid=session('temp_orderid'); 
	$arr=D("tempdata")->field('sum(buynum*buyprice) as money')->where("orderid={$orderid} AND uid={$uid}{$where} ")->find();
  	return $arr['money'];
} 

//购物车商品税费
function get_cart_tax_momey($ids){
	if($ids) $where=" AND id in(".$ids.")";
 	$uid=cookie('user_id');
	$orderid=session('temp_orderid'); 
	$arr=D("tempdata")->field('sum(buynum*buytaxprice) as money')->where("orderid={$orderid} AND uid={$uid}{$where} ")->find();
	//print_r($arr);
  	return $arr['money'];
} 

//购物车商品总价格带运费
function get_cart_all_momey($ids){
	if($ids) $where=" AND id in(".$ids.")";
 	$uid=cookie('user_id');
	$orderid=session('temp_orderid'); 
	$arr=D("tempdata")->field('sum(buynum*buyprice+buynum*buytaxprice) as money')->where("orderid={$orderid} AND uid={$uid}{$where} ")->find();
  	return $arr['money']+get_user_zd(cookie('user_id'),'fare');
} 

//购物车商品总价格不带运费
function get_cart_all_momeyno(){
	$orderid=session('temp_orderid'); 
	$arr=D("tempdata")->field('sum(buynum*buyprice+buynum*buytaxprice) as money')->where("orderid={$orderid}")->find();
  	return $arr['money'];
} 


//获取封面图片
function get_coverimage($id){
 	$v=D("photo")->field('img1')->where("pid={$id}")->find();
	if($v['img1']) $str=$v['img1'];else $str='/Uploads/nopic.jpg';
  	return $str;
} 

//评论列表
function get_comments_list($typeid=0,$pid=0,$limit=10){
	$str="";
	$list=M()->table("dy_comments c,dy_user u")->field('c.title,c.img1,c.img2,c.img3,c.content,c.rating1,c.rating2,u.nickname,u.img1 as tx')->where("c.uid=u.id AND c.status=1 AND c.typeid={$typeid} AND c.pid={$pid}")->order('c.id desc')->select();
 	return $list;
}

//留言列表
function get_message_list($typeid=0,$pid=0,$limit=10){
	$str="";
	$list=D('message')->where("status=1 AND pid={$pid} AND typeid={$typeid}")->limit($limit)->select();
 	return $list;
}
 
//评论数量
function get_comments_count($typeid=0,$pid=0,$limit=10){
	$str="";
	$list=M()->table("dy_comments c,dy_user u")->field('c.title,c.img1,c.img2,c.img3,c.content,c.rating1,c.rating2,u.nickname,u.img1 as tx')->where("c.uid=u.id AND c.status=1 AND c.typeid={$typeid} AND c.pid={$pid}")->order('c.id desc')->count();
 	return $list;
}
 
//留言数量
function get_message_count($typeid=0,$pid=0,$limit=10){
	$str="";
	$list=D('message')->where("status=1 AND pid={$pid} AND typeid={$typeid}")->limit($limit)->count();
 	return $list;
}
  
//获取产品分类
function get_sort_list($pid=0,$num=0,$limit=0){
	$list=D('sort')->field('id,catname,outlinkurl,inlinkurl,img1,img2,introduce,seodescription,encatname,pid')->order('disorder asc,id asc')->where("status=1 and pid={$pid}")->limit($limit,$num)->select();
    foreach ((array)$list as $k => $v){
       if($v['outlinkurl']) $linkurl=$v['outlinkurl'];else $linkurl=$v['inlinkurl'];
        $list[$k]['linkurl'] = $linkurl;
    }
	return $list;
}

//获取产品分类
function get_type_list($pid){
	$list=D('sort')->field('id,catname,pid')->order('disorder asc,id asc')->where("status=1 and pid={$pid}")->select();
	return $list;
}
 
  
//获取新闻表字段内容
function get_html($string){
 	$str=html_entity_decode($string);
  	return $str;
}

//获取摘要字段内容
function get_nl2br($string){
 	$str=nl2br($string);
  	return $str;
}

//获取字符串分割链接
function get_explode($string){
 	$str1=explode(',',$string);
 	$str='';
 	foreach ($str1 as $value) {
 		$str.="<span>".$value."</span>";
 	}
  	return $str;
}

//获取字符串循环
function get_xunhuan($number){
 	$str='';
 	for ($i=0; $i < $number; $i++) { 
 		$str.="<i class=\"iconfont icon-star\"></i>";
 	}
  	return $str;
}

 
 //获取权限名称
function get_role_auth_name($ids){
	$str="";
	$list=D('sort')->field('catname')->where("status=1 AND id in (".$ids.")")->select();
	foreach((array)$list as $key=>$arr){
 		$str.=$arr['catname']."、";
	}
 	return $str;
} 
 

//获取导航
function get_location($pid,$ty,$tty){
	$str="";
 	if($pid) $str="<em>></em><a>".get_type_zd($pid)."</a>";
	if($ty) $str.="<em>></em><a>".get_type_zd($ty)."</a>";
	if($tty) $str.="<em>></em><a>".get_type_zd($tty)."</a>";
	return $str;
}
 
/**
 * 计算几分钟前、几小时前、几天前、几月前、几年前。
 * $agoTime string Unix时间
 * @author tangxinzhuan
 * @version 2016-10-28
 */
function time_ago($agoTime){
    $agoTime = (int)$agoTime;
    
    // 计算出当前日期时间到之前的日期时间的毫秒数，以便进行下一步的计算
    $time = time() - $agoTime;
    
    if ($time >= 31104000) { // N年前
        $num = (int)($time / 31104000);
        return $num.'年前';
    }
    if ($time >= 2592000) { // N月前
        $num = (int)($time / 2592000);
        return $num.'月前';
    }
    if ($time >= 86400) { // N天前
        $num = (int)($time / 86400);
        return $num.'天前';
    }
    if ($time >= 3600) { // N小时前
        $num = (int)($time / 3600);
        return $num.'小时前';
    }
    if ($time > 60) { // N分钟前
        $num = (int)($time / 60);
        return $num.'分钟前';
    }
    return '1分钟前';
}
 

//获取回复内容
function get_reply_message_list($fid){
	$uid=cookie('user_id');
	$list=D('letter')->field('id,title,content,sendtime')->order('id desc')->where("uid={$uid} AND fid={$fid}")->select();
   	return $list;
}

//查看图片
function get_img_show($img1){
	$path=get_photo($img1);
	if($img1)
	$str=" <a href=\"{$path}\" target=\"_blank\" style=\"color:blue\">查看图片</a>";
	else
	$str="";
	echo $str;
}

//查看图片
function get_imgs_show($img1){
 	if($img1)
	$str=" <a href=\"{$img1}\" target=\"_blank\" style=\"color:blue\">查看图片</a>";
	else
	$str="";
	echo $str;
}



//求两个日期之间相差的天数
function diffBetweenTwoDays ($day1, $day2){
  $second1 = strtotime($day1);
  $second2 = strtotime($day2);
    
  if ($second1 < $second2) {
    $tmp = $second2;
    $second2 = $second1;
    $second1 = $tmp;
  }
  return ($second1 - $second2) / 86400;
}


//会员类型
function get_user_type($typeid,$isbroker=0,$isgoddess=0){
 	if($typeid==2&&$isgoddess==0) $usertype='平面模特';
	elseif($typeid==2&&$isgoddess==1) $usertype='女神模特';
	elseif($typeid==3&&$isbroker==0) $usertype='企业';
	elseif($typeid==4&&$isbroker==0) $usertype='个人';
	elseif($typeid==3&&$isbroker==1) $usertype='经纪公司';
	elseif($typeid==4&&$isbroker==1) $usertype='个人经纪人';
	return $usertype;
}

//会员类型
function get_admin_list($typeid,$isbroker=0,$isgoddess=0){
	$arr=explode(",",$typeid);
	$strs='';
	foreach ($arr as $k => $v){
		if($k==0) $zt="";else $zt="、";
		$strs.=$zt.get_user_type($v,$isbroker,$isgoddess);
	}
	return $strs;
}


//产品参数
function get_pc_cs($nr){
    $arr=explode(",",$nr);
    $strs='';
    foreach ($arr as $k => $v){
        $strs.="<div class=\"swiper-slide\"><span>{$v}</span></div>\n";
    }
    return $strs;
}

//产品参数
function get_wap_cs($nr){
    $arr=explode("\r\n",$nr);
    $strs='';
    foreach ($arr as $k => $v){
        $strs.="{$v} ; ";
    }
    return $strs;
}

//表单构建
function frm_out_put($arr,$nm,$tag,$value='',$js="",$firstNode=""){
/***********************************
	功能：从初始化到表单的生成
	参数
***********************************/
	$value=trim($value);
	switch($tag){
		case 'option':
			$str="<select name=\"info[$nm]\" id=\"{$nm}\" ".$js.">\n";
			if($firstNode){
				$str.="\t<option value='99'>".$firstNode."</option>\n";

			}
			foreach ($arr as $k => $v) {
				if($value==$k&&$value!=''){
					$str .= "\t<$tag value='$k' selected>$v</$tag>\n";
				}else{
					$str .= "\t<$tag value='$k' $defaultCk>$v</$tag>\n";
				}
			}
			$str.="</select>";
			break;

		case 'radio':
			$i=0;
			foreach ($arr as $k => $v) {
				if($value==$k&&$value!=''){
					$str .= "\n<input type='".$tag."' name='".$nm."' id='".$nm.$k."' class='radio' checked='checked' value='".$k."' ".$js."> ".$v."</input>\n ";
				}else{
					if($i==0 && $value==''){$defaultCk = 'checked';$i++;}
					$str .= "\n<input type='".$tag."' name='".$nm."' id='".$nm.$k."' class='radio' value='".$k."' ".$js." $defaultCk> ".$v."</input>\n ";
					$defaultCk='';
				}
			}
			break;

		case 'checkbox':
			if($value)
				$arrValue = explode(',',$value);
			else
				$arrValue = array();
			$checkTag=0;
			foreach ($arr as $k => $v) {
				for($i=0;$i<count($arrValue);$i++){
					if($arrValue[$i]==$k&&$value!=''){
						$str .= "\n<input type='".$tag."' name='".$nm."[]' value='".$k."' checked='checked' ".$js.">".$v."&nbsp;\n";
						$checkTag++;
					}
				}
				if($checkTag==0){
					$str .= "\n<input type='".$tag."' name='".$nm."[]' value='".$k."' ".$js.">".$v."</input>&nbsp;\n";
				}
				$checkTag=0;
			}
			break;
	}
	return $str;
}

//远程下载
function getFile($url,$path='',$filename='',$type=0){
    if($url==''){return false;}
    //获取远程文件数据
    if($type===0){
        $ch=curl_init();
        $timeout=5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);//最长执行时间
        curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);//最长等待时间
        
        $img=curl_exec($ch);
        curl_close($ch);
    }
    if($type===1){
        ob_start(); 
        readfile($url);
        $img=ob_get_contents(); 
        ob_end_clean(); 
    }
    if($type===2){
        $img=file_get_contents($url);
    }
    //判断下载的数据 是否为空 下载超时问题
    if(empty($img)){
        throw new \Exception("下载错误,无法获取下载文件！");
    }
    
    //没有指定路径则默认当前路径
    if($path===''){
        $path="./";
    }
    //如果命名为空
    if($filename===""){
        $filename=md5($img);
    }
    //获取后缀名
    $ext=substr($url, strrpos($url, '.'));
    if($ext && strlen($ext)<5){
        $filename.=$ext;
    }
    
    //防止"/"没有添加
    $path=rtrim($path,"/")."/";
    //var_dump($path.$filename);die();
    $fp2=@fopen($path.$filename,'a');

    fwrite($fp2,$img);
    fclose($fp2);
    //echo "finish";
    return $filename;
}

/**
  +----------------------------------------------------------
 * 浏览记录按照时间排序
  +----------------------------------------------------------
 */
function my_sort($a, $b){
    $a = substr($a,1);
    $b = substr($b,1);
    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
  }
/**
  +----------------------------------------------------------
 * 网页浏览记录生成
  +----------------------------------------------------------
 */
function cookie_history($id,$title,$price,$oldprice,$img,$url){
    $dealinfo['title'] = $title;
    $dealinfo['price'] = $price;
    $dealinfo['oldprice'] = $oldprice;
    $dealinfo['img'] = $img;
    $dealinfo['url'] = $url;
    $time = 't'.NOW_TIME;
    $cookie_history = array($time => json_encode($dealinfo));  //设置cookie
    if (!cookie('history')){//cookie空，初始一个
        cookie('history',$cookie_history);
        }else{
        $new_history = array_merge(cookie('history'),$cookie_history);//添加新浏览数据
        uksort($new_history, "my_sort");//按照浏览时间排序
        $history = array_unique($new_history);
        if (count($history) > 4){
            $history = array_slice($history,0,4);
        }
        cookie('history',$history);
    }
}
/**
  +----------------------------------------------------------
 * 网页浏览记录读取
  +----------------------------------------------------------
 */
function cookie_history_read(){
	$arr = cookie('history');
	foreach ((array)$arr as $k => $v){
		$list[$k] = json_decode($v,true);
	}
	return $list;
}


// 获取指定表字段
function  get_columns($table){
	$sql="SHOW FIELDS FROM __PREFIX__{$table}";
	$arr=M()->query($sql);
	foreach ($arr as $k => $v) {
		 if($k) $str.=",{$v['Field']}";
	}
	$str=ltrim($str,",");
	return $str;
}
?>