<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class JobController extends PurviewController {
	//显示
    public function Index(){
		$db=D("job");
 		$title=I('get.title');
   		$map="1=1";
  		if($title) $map.=" AND title like '%$title%'";
 		
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
		$db=D("job");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
 		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核在线提问:(id:$id)");
				$this->success("审核成功",U("Job/Index"));
				exit();
			}
		}
		$this->error($db->getError());	
	}
	
	
	//删除
	public function Del(){
		$db=D("job");
		$did=I('post.checkid');
		$data=I('post.data');

		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			if($db->delete($id)){
				sys_log("删除在线提问:(id:$id)");
				$this->success("删除成功！",U("Job/Index"));
			}else{
				$this->error("删除失败！");
			}
		}else{
			$this->error('请选择删除信息!');
		}

	}	
}

?>