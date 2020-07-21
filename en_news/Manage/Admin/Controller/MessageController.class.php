<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class MessageController extends PurviewController {
	//显示
    public function Index(){
		$db=D("message");
 		$email=I('get.email');
   		$map="1=1";
  		if($email) $map.=" AND email like '%$email%'";
 		
		$count = $db->where($map)->count();
		$Page = new \Think\AdminPage($count,10);
 		
		$show = $Page->show();
		$list = $db->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
  		
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }
 	
	//审核
	public function Audit($id){
		$db=D("message");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
 		if($db->create(I('post.'),1)){
			if($db->save($data)!== false){
				sys_log("审核在线提问:(id:$id)");
				$this->success("审核成功",U("Message/Index"));
				exit();
			}
		}
		$this->error($db->getError());	
	}
	
	
	//删除
	public function Del(){
		$db=D("message");
		$did=I('post.checkid');
		$data=I('post.data');

		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			foreach ($did as $k=>$v){
				F("Message_{$v}",NULL,TEMP_PATH);//删除缓存
			}
			if($db->delete($id)){
				sys_log("删除在线提问:(id:$id)");
				$this->success("删除成功！",U("Message/Index"));
			}else{
				$this->error("删除失败！");
			}
		}else{
			$this->error('请选择删除信息!');
		}

	}	
	
	
	//回复
	public function Reply($id){
	   $db=M("message");
	   $v=$db->find($id);
 	   if(IS_POST){
			$_POST['replytime']=time();
			$_POST['status']=1;
 			
			if($db->create(I('post.'),1)){
				if($id=$db->save($data)){
					sys_log("回复我要提问:{$_POST['email']}(id:$id)");
					$this->success("回复成功",U("Message/Index"));
					exit();
				}
			}
			$this->error($db->getError());	
	   }
 	   $this->assign("v",$v);	
	   $this->display();
	}
	
	
}

?>