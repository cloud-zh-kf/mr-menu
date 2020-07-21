<?php 
//include 'function.php';  

#文件单位
function get_size($size,$digits=2){ 
  $unit= array('','M','G','T','P');
  $base= 1024;
  $i   = floor(log($size,$base));
  $n   = count($unit);
  if($i >= $n){
          $i=$n-1;
        }
  return round($size/pow($base,$i),$digits).' '.$unit[$i] . 'B';
}

//获取权限ac
function get_role_auth_ac($string){
	if($string){
		$arr=explode(",",$string);
		$array=array_unique($arr);
		$auth=implode(",",$array);
	}else{
		$auth="所有权限";
	}	
	return $auth;
}


//根据条件获取
function role_auth_ids($ids){
    $str="";
    $list=D('sort')->field('pid')->group('pid')->where("status=1 AND id in(".$ids.")")->select();
    foreach($list as $key=>$arr){
        $str.=",{$arr['pid']}";
    }
    return $str;
}

//根据条件获取
function get_mytable_list($table='sort',$sqlkey){
    if(session('admin_role_auth_ids')==0) $sqlkey.="";else $sqlkey.=" AND id in(".session("admin_role_auth_ids").")";
    $list=D($table)->field('*')->where("status=1{$sqlkey}")->order('disorder asc,id asc')->select();
    return $list;
}

//按条件获取数量
function get_mytable_count($table,$where){
    if(session('admin_role_auth_ids')==0) $where.="";else $where.=" AND id in(".session("admin_role_auth_ids").")";
    $count=D($table)->where($where)->count();
    return (int)$count;
}


//增加日志文件
function sys_log($_logcontent) {
 	$db=M("logs");
	$_POST['id']=null;
	$_POST['username']=session('admin_username');
	$_POST['content']=$_logcontent;
	$_POST['ip']=get_client_ip();
	$_POST['sendtime']=time();
	$db->create();
	$db->add();
} 
 
//类别id
function get_catid($id){
	$arr=D("sort")->field("pid")->find($id);
 	return (int)$arr['pid'];
} 

//获取当前id
function get_cur_newsid($pid,$ty,$tty){
  	$arr=D("news")->field("id")->where(" pid={$pid} AND ty={$ty} AND tty={$tty}")->find();
	if($arr['id']) $strs=$arr['id'];else $strs=0;
 	return $strs;
}

//获取图片名称
function get_imgname($i,$pid,$ty,$tty){
	if($tty>0) $id=$tty;
	elseif($ty>0) $id=$ty;
	elseif($pid>0) $id=$pid;
  	$imgname=get_sort_zd($id,'imgname');
  	$arrValue=explode(',',$imgname);
  	if($imgname){
        if(count($arrValue)==1){
            $str=$imgname;
        }else{
            $str=$arrValue[$i-1];
        }
    }else{
  	    $str="配置图片";
    }

  	return $str;
}

//获取BANNER图片名称
function get_banner_imgname($i){
    $imgname=C('BANNER_NAME');
    $arrValue=explode(',',$imgname);
    if($imgname){
        if(count($arrValue)==1){
            $str=$imgname;
        }else{
            $str=$arrValue[$i-1];
        }
    }else{
        $str="配置图片";
    }

    return $str;
}

//获取BANNER图片尺寸
function get_banner_imgsize($i){
    $imgsize=C('BANNER_SIZE');
    $arrValue=explode(',',$imgsize);
    if(count($arrValue)==1){
        $str=$imgsize;
    }else{
        $str=$arrValue[$i-1];
    }
    return $str;
}

//获取图片尺寸
function get_imgsize($i,$pid,$ty,$tty){
	if($tty>0) $id=$tty;
	elseif($ty>0) $id=$ty;
	elseif($pid>0) $id=$pid;
  	$imgsize=get_sort_zd($id,'imgsize');
  	$arrValue=explode(',',$imgsize);
  	if(count($arrValue)==1){
		$str=$imgsize;
	}else{
		$str=$arrValue[$i-1];
	}
  	return $str;
}

//获取指定表的字段
function get_myfields_list($pid){
    $tablename=get_forms_zd($pid);
    $list=M()->query("SHOW FULL COLUMNS from `__PREFIX__{$tablename}`");
    foreach ($list as $k=>$v){
        $arr=explode("_",$v['Comment']);
        $list[$k]['title']=$arr[0];
        $list[$k]['tip']=$arr[1];
    }
    return $list;
}

//获取指定表的字段
function get_list_myfields_list($pid){
    $tablename=get_forms_zd($pid);
    $list=M()->query("SHOW FULL COLUMNS from `__PREFIX__{$tablename}`");
    //print_r($list);
    foreach ($list as $k=>$v){
        $arr=explode("_",$v['Comment']);
        $list[$k]['title']=$arr[0];
        $list[$k]['tip']=$arr[1];
        if($v['Field']=='id'||$v['Field']=='ip'||$v['Field']=='status'||$v['Field']=='sendtime'){
            unset($list[$k]);
        }
    }

    return $list;
}


//获取指定表的字段
function get_js_myfields_list($pid){
    $tablename=get_forms_zd($pid);
    $list=M()->query("SHOW FULL COLUMNS from `__PREFIX__{$tablename}`");
    foreach ($list as $k=>$v){
        $arr=explode("_",$v['Comment']);
        $list[$k]['tip']=$arr[1];
        if($arr[1]){
            $list[$k]['js']="if(checkspaces(formlist.{$v['Field']}.value)){
						        alert('{$arr[1]}');
						        formlist.{$v['Field']}.focus();
						        return false;
					         }\n";
        }else{
            $list[$k]['js']='';
        }

    }
    //print_r($list);
    return $list;
}
 
//获取模块字段
function get_fields($pid,$ty,$tty){
	$module_id=get_module_id($pid,$ty,$tty);
	$module_field=get_module_field($module_id);
	$str=explode(",",$module_field);
	return $str;
}

#文件单位
function formatBytes($size){ 
	$units=array('B','K','M','G','TB'); 
	for($i=0;$size>=1024&&$i<4;$i++)
	{
		$size/=1024;
	}
	return round($size,2).' '.$units[$i]; 
}

//列出文件列表
function deal_arr($data,$root,$name=array()){
	unset($data[0]);unset($data[1]);
	$a=array();
	$b=array();
	
	foreach ($data as $key=>$val)
	{
		if(is_dir($root.'/'.$val))
		{
			echo "{$val}";
			$a[$key]=array('0'=>iconv("gb2312","utf-8",$val),'1'=>filemtime($root.'/'.$val));
		}
		elseif(is_file($root.'/'.$val))
		{
			$ext=strtolower(strrchr($root.'/'.$val,'.'));
			$b[$key]=array('0'=>iconv("gb2312","utf-8",$val),'1'=>filemtime($root.'/'.$val),'2'=>formatBytes(filesize($root.'/'.$val)),'3'=>$ext,'4'=>is_image($ext));
		}
		else
		{
			unset($data[$key]);
		}
	}
	krsort($a);
	krsort($b);
	return array('0'=>$a,'1'=>$b);
}

//格式判断
function is_image($a)
{
	if(in_array($a,array('.gif','.jpg','jpeg','.png','.bmp')))
	{
		return '1';
	}
	else
	{
		return '0';
	}
}
 
//模块名称
function get_model_name($strs){
	$v = split(',',$strs);
    $model_fields=C('model_fields');
	for($i=0;$i<count($v);$i++){
		if($i>0)
		$str.="、".$model_fields[$v[$i]];
		else
		$str.=$model_fields[$v[$i]];
	}
	return $str;
}


//获取新闻列表
function get_titlepic($pid){
    $list=M("titlepic")->field('*')->where("status=1 AND pid={$pid}")->order('id asc')->select();
    return $list;
}



//表单构建
function get_frm_out_put($arr,$nm,$tag,$value='',$js="",$firstNode=""){
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
                        $str .= "\n<input type='".$tag."' class='checkbox' lay-skin='primary' title='".$v."' name='".$nm."[]' checked='checked' value='".$k."' ".$js.">\n";
                        $checkTag++;
                    }
                }
                if($checkTag==0){
                    $str .= "\n<input type='".$tag."' class='checkbox' lay-skin='primary' title='".$v."' name='".$nm."[]' value='".$k."' ".$js.">\n";
                }
                $checkTag=0;
            }
            break;
    }
    return $str;
}
?>