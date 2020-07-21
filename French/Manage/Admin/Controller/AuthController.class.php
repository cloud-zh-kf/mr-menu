<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class AuthController extends PurviewController {
	//显示
    public function Index(){
		$db=D("auth");
		$list=$db->order("auth_path")->select();
		$this->assign("list",$list);
		$this->display();
    }
	//添加
    public function Add(){
		$db=M("auth");
		if(IS_POST){
			$auth_pid=I('post.auth_pid');
			//$_POST['auth_level']=$auth_pid?1:0;
			$_POST['sendtime']=time();
			if($db->create(I('post.'),1)){
				if($newid=$db->add()){
					$auth=$db->field("auth_pid")->find($newid);
					if($auth['auth_pid']==0) $path=$newid;else $path="{$auth['auth_pid']}-{$newid}";
					$level=count(explode("-",$path))-1;
					$db->execute("update __PREFIX__auth set auth_path='$path',auth_level='$level' where auth_id='{$newid}'");
					$this->success("添加成功",U("Auth/Index"));
					exit();
				}
			}	
			$this->error($db->getError());	
		}
		$list=$db->where(" auth_pid=0")->select();
		//dump($list);
		$this->assign("list",$list);
		$this->display();
    }
	
	//更新
    public function Update($auth_id){
		$db=M("auth");
		if(IS_POST){
			$auth_pid=I('post.auth_pid');
 			if($auth_pid==0) $path=$auth_id;else $path="{$auth_pid}-{$auth_id}";
 			$level=count(explode("-",$path))-1;
			$_POST['auth_path']=$path;
			$_POST['auth_level']=$level;
			$_POST['sendtime']=time();
			if($db->create(I('post.'),1)){
				if($db->save($data)!== false){
					$this->success("编辑成功",U("Auth/Index"));
					exit();
				}
			}	
			$this->error($db->getError());	
 		}
		$r=$db->find($auth_id);
 		$list=$db->where(" auth_pid=0")->select();
		$this->assign("r",$r);
		$this->assign("list",$list);
		$this->display();
    }
	
	//审核
	public function Audit($auth_id){
		$db=M("auth");
		$list=$db->field("status")->find($auth_id);
		$status=$list['status'];
		$_POST['auth_id']=$auth_id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				$this->success("审核成功",U("Auth/Index"));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function Del(){
		$db=M("auth");
		$did=I('post.checkid');
		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			if($db->delete($id)){
				$this->success("删除成功",U("Auth/Index"));
				exit();
			}else{
				$this->error("删除失败");
			}
		}else{
			$this->error('请选择删除信息!');
		}
	}
}

?>