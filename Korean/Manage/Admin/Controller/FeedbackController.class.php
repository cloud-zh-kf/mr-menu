<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class FeedbackController extends PurviewController {
	//显示
    public function Index(){
		$db=D("feedback");
 		$realname=I('get.realname');
		$contact=I('get.contact');
   		$map="1=1";
 		if($realname) $map.=" AND realname like '%$realname%'";
 		if($contact) $map.=" AND contact like '%$contact%'";
 		
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
		$db=M("feedback");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
 		if($db->create(I('post.'),1)){
			if($db->save($data)!== false){
				sys_log("审核意见反馈:(id:$id)");
				$this->success("审核成功",U("Feedback/Index"));
				exit();
			}
		}
		$this->error($db->getError());	
	}
	
	
	//删除
	public function Del(){
		$db=M("feedback");
		$did=I('post.checkid');
		$data=I('post.data');

		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			foreach ($did as $k=>$v){
				F("Feedback_{$v}",NULL,TEMP_PATH);//删除缓存
			}
			if($db->delete($id)){
				sys_log("删除意见反馈:(id:$id)");
				$this->success("删除成功！",U("Feedback/Index"));
			}else{
				$this->error("删除失败！");
			}
		}else{
			$this->error('请选择删除信息!');
		}

	}	
}

?>