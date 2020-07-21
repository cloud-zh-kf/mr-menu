<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class ClassController extends PurviewController {
	//显示
    public function Index(){
		$db=D("sort");
  		$list = $db->getTree();
		foreach($list as $key=>$arr){
  			$list[$key]['module_name']=get_module_zd($arr['module_id'],'module_name');
 		}
  		$this->assign('list',$list);
		$this->display();
    }
	//添加
    public function Add(){
		$db=D("sort");
		$pid=I('request.pid',0);
		$module_ids=I('request.module_id');
		$module_arr=explode("|",$module_ids);
		
		$arr=$db->field("module_id,imgnum,imgsize")->find($pid);
 		$module_id=$arr['module_id'];
   		
		if(IS_POST){
 			$_POST['module_id']=$module_arr[0];
			$_POST['sendtime']=time();
   			$_POST['status']=1;
			if($db->create(I('post.'),1)){
				if($newid=$db->add()){
					F("sort_{$newid}",$_POST, TEMP_PATH);//存入缓存
					sys_log("添加分类:{$_POST['catname']}(id:$newid)");
					$this->success("添加成功",U("Class/Index"));
					exit();
				}
			}	
			$this->error($db->getError());	
		}
   		$this->assign("arr",$arr);
  		$this->assign("pid",$pid);
  		$this->assign("list",D("module")->select());
  		$this->assign("sort",$db->getTree());
		$this->display();
    }
	
	//更新
    public function Update($id){
		$db=D("sort");
 		$list=$db->find($id);
  		if(IS_POST){
			$module_ids=I('request.module_id');
			$module_arr=explode("|",$module_ids);
			
 			$_POST['module_id']=$module_arr[0];
			if($db->create(I('post.'),1)){
				if($db->save($data)!== false){
					F("sort_{$id}",$_POST, TEMP_PATH);//存入缓存
					sys_log("编辑分类:{$_POST['catname']}(id:$id)");
					$this->success("编辑成功",U("Class/Index"));
					exit();
				}
			}	
			$this->error($db->getError());	
 		}
		$this->assign("v",$list);
 		$module=D("module")->select();		
   		$this->assign("module",$module);
		$this->assign("sort",$db->getTree());
		$this->display();
    }
	
	//审核
	public function Audit($id){
		$db=M("sort");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核分类:(id:$id)");
				$this->success("审核成功",U("Class/Index"));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function Del(){
		$db=D("sort");
		$did=I('post.checkid');
		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			foreach ($did as $k=>$v){
				F("sort_{$v}",NULL,TEMP_PATH);//删除缓存
			}
			if($db->delete($id)!== false){
				sys_log("删除分类:(id:$id)");
				$this->success("删除成功",U("Class/Index"));
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