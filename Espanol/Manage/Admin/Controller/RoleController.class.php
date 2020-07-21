<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class RoleController extends PurviewController {

	//显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
		$db=D("role");
 		$count = $db->count();
		$Page = new \Think\AdminPage($count,20);
 		
		$show = $Page->show();
		$list = $db->limit($Page->firstRow.','.$Page->listRows)->select();
  		
 		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }
 
	
	//添加&&编辑
    public function Add(){
		$db=M("role");
		$id=I('request.id',0);
  		$v=$db->find($id);
  		if($v){
            $v['role_auth_ids']=explode(",",$v['role_auth_ids']);
        }else{
            $v['status']=1;
        }
 		if(IS_POST){
  		    $auth_ids=implode(",",I('post.role_auth_ids'));//把数组分割成字符串
            if($auth_ids){
                $pids=role_auth_ids($auth_ids);
                $_POST['role_auth_ids']=$auth_ids.$pids;
            }
            $_POST['sendtime']=time();
			if($db->create(I('post.'),1)){
                F("role_{$id}",$_POST, TEMP_PATH);//存入缓存
			    if($id){
                    if($db->save()!== false){
                        sys_log("编辑角色名称:{$_POST['role_name']}(id:$id)");
                        $this->success("编辑成功",cookie('Jumpurl'));
                        exit();
                    }
                }else{
                    if($id=$db->add()){
                        sys_log("添加角色名称:{$_POST['model_name']}(id:$id)");
                        $this->success("添加成功",cookie('Jumpurl'));
                        exit();
                    }
                }
			}
			$this->error($db->getError());
		}

        $this->assign("v",$v);


		$this->display();
    }
	

	//审核
	public function Audit($id){
		$db=M("role");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核角色:(id:$id)");
				$this->success("审核成功",cookie('Jumpurl'));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function Del(){
		$db=M("role");
		$id=I('request.id',0);
		if($id){
            F("role_{$id}",NULL,TEMP_PATH);//删除缓存
			if($db->delete($id)){
 				sys_log("删除角色:(id:$id)");
				$this->success("删除成功",cookie('Jumpurl'));
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