<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class SingleController extends Controller {
 	//显示
    public function Index(){
	  import('Vendor.Qiniu.Auth');
	  import('Vendor.Qiniu.functions');
	  import('Vendor.Qiniu.UploadManager');

	  $db=D("news");
 	  $list['pid']=I('request.pid','0');
 	  $list['ty']=I('request.ty','0');
 	  $list['tty']=I('request.tty','0');
	  $id=get_cur_newsid($list['pid'],$list['ty'],$list['tty']);

	 // echo $id;
 	  if($id){
	  	   $list=$db->find($id);
		   $this->assign("v",$list);
		   $this->assign("action",'update');
 	  }else{
		   $this->assign("action",'index');
 	  }

	  if($list['tty']>0) $zid=$list['tty'];
	  elseif($list['ty']>0) $zid=$list['ty'];
	  elseif($list['pid']>0) $zid=$list['pid'];
  	  $imgnum=get_sort_zd($zid,'imgnum');//获取当前栏目图片数量
 	  $module_id=get_sort_zd($zid,'module_id');//获取当前栏目模块id
	   if(IS_POST){
            //$images=I('post.images');
            //$picurl=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..","",$images);
 			$_POST['sendtime']=time();
			$_POST['status']=1;

			if(isset($_FILES['img1']) && $_FILES['img1']['error'] == 0){
   				$token=I('post.token');
 				$uploadMgr = new \UploadManager();
				$filePath = $_FILES['img1']['tmp_name'];
				$img_name=$_FILES['img1']['name'];
				$img_type=end(explode(".", basename($img_name)));
				$key = date("YmdHis").mt_rand(10,99).".".$img_type;
				$uploadMgr->putFile($token, $key, $filePath);
  				$_POST['img1'] = $key;

				delete_thumb(I('post.old_img1'));
  			}

			if($db->create(I('post.'),1)){
				if($id=$db->add()){
                    $images=$_POST['images'];
                    if($images){
                        $strings = explode('|',$images);
                        foreach ($strings as $v){
                            $vv=str_replace(".", "_", $v);
                            $bt=$_POST[$vv];
                            $pic=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..", "", $v);
                            if($pic){
                                $sqla="insert into __PREFIX__titlepic set pid='$id',title='$bt',img1='$pic',status=1,sendtime='".time()."'";
                                $db->execute($sqla);
                            }
                        }
                    }

					sys_log("添加单页面:{$_POST['title']}(id:$cid)");
					$this->success("添加成功",U("Single/Index?pid={$list['pid']}&ty={$list['ty']}&tty={$list['tty']}"));
					exit();
				}
			}
			$this->error($db->getError());
	   }

 	   $module_fields=get_module_zd($module_id,'module_fields');
	   $arr=explode(",",$module_fields);
  	   $this->assign("arr",$arr);
 	   $this->assign("v",$list);
  	   $this->assign("imgnum",$imgnum+1);
	   if($list['ty']==78) $tem='Ht';else $tem='index';
 	   $this->display($tem);
    }


	//审核
	public function Update($id){
	  import('Vendor.Qiniu.Auth');
	  import('Vendor.Qiniu.functions');
	  import('Vendor.Qiniu.UploadManager');

	  $db=D("news");
 	  $list['pid']=I('request.pid','0');
 	  $list['ty']=I('request.ty','0');
 	  $list['tty']=I('request.tty','0');
	  if($list['tty']>0) $zid=$list['tty'];
	  elseif($list['ty']>0) $zid=$list['ty'];
	  elseif($list['pid']>0) $zid=$list['pid'];
  	  $imgnum=get_sort_zd($zid,'imgnum');//获取当前栏目图片数量
 	  $module_id=get_sort_zd($zid,'module_id');//获取当前栏目模块id
 	   if(IS_POST){
  			$_POST['sendtime']=time();
			$_POST['status']=1;

			if(isset($_FILES['img1']) && $_FILES['img1']['error'] == 0){
   				$token=I('post.token');
 				$uploadMgr = new \UploadManager();
				$filePath = $_FILES['img1']['tmp_name'];
				$img_name=$_FILES['img1']['name'];
				$img_type=end(explode(".", basename($img_name)));
				$key = date("YmdHis").mt_rand(10,99).".".$img_type;
				$uploadMgr->putFile($token, $key, $filePath);
  				$_POST['img1'] = $key;

				delete_thumb(I('post.old_img1'));
  			}

			if($db->create(I('post.'),1)){
				if($db->save()!== false){

                    $images=$_POST['images'];
                    if($images){
                        $strings = explode('|',$images);
                        foreach ($strings as $v){
                            $vv=str_replace(".", "_", $v);
                            $bt=$_POST[$vv];
                            $pic=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..", "", $v);
                            if($pic){
                                $sqla="insert into __PREFIX__titlepic set pid='$id',title='$bt',img1='$pic',status=1,sendtime='".time()."'";
                                $db->execute($sqla);
                            }
                        }
                    }

					sys_log("编辑单页面:{$_POST['title']}(id:$id)");
					$this->success("修改成功",U("Single/Index?pid={$list['pid']}&ty={$list['ty']}&tty={$list['tty']}"));
					exit();
				}
			}
			$this->error($db->getError());
	   }

 	   $module_fields=get_module_zd($module_id,'module_fields');
	   $arr=explode(",",$module_fields);
	   //dump($arr);
 	   $this->assign("arr",$arr);
 	   $this->assign("list",$list);
  	   $this->assign("imgnum",$imgnum);
	   if($list['ty']==78) $tem='Ht';else $tem='index';
	   $this->display($tem);
	}


}

?>