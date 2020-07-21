<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class ManagerController extends PurviewController {

	//显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
		$db=D("manager");
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
		$db=M("manager");
		$id=I('request.id',0);
  		$v=$db->find($id);
  		if($v){
        }else{
            $v['status']=1;
        }
 		if(IS_POST){
            $_POST['password']=md5(I('post.password',trim));
            $_POST['sendtime']=time();
			if($db->create(I('post.'),1)){
                F("role_{$id}",$_POST, TEMP_PATH);//存入缓存
			    if($id){
                    if($db->save()!== false){
                        sys_log("编辑系统用户:{$_POST['username']}(id:$id)");
                        $this->success("编辑成功",cookie('Jumpurl'));
                        exit();
                    }
                }else{
                    if($id=$db->add()){
                        sys_log("添加系统用户:{$_POST['username']}(id:$id)");
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

    //更新
    public function Person(){
        $db=M("manager");
        $oldpwd=md5(I('post.oldpwd'));
        $admin_id=session('admin_id');
        $v=$db->find($admin_id);
        $count=$db->where("id={$admin_id} AND password='$oldpwd'")->count();
        if(IS_POST){
            if($count<1){
                $this->error("原密码错误！");
            }
            $_POST['id']=$admin_id;
            $_POST['password']=md5(I('post.newpwd'));
            $_POST['sendtime']=time();
            if($db->create(I('post.'),1)){
                if($db->save()!== false){
                    sys_log("修改密码:{$_POST['username']}(id:$admin_id)");
                    $this->success("修改成功！",U('Manager/Person'));
                    exit();
                }
            }
            $this->error($db->getError());
        }
        $this->assign("v",$v);
        $this->display();
    }

	//审核
	public function Audit($id){
		$db=M("manager");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核系统用户:(id:$id)");
				$this->success("审核成功",cookie('Jumpurl'));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function Del(){
		$db=M("manager");
		$id=I('request.id',0);
		if($id){
            F("role_{$id}",NULL,TEMP_PATH);//删除缓存
			if($db->delete($id)){
 				sys_log("删除系统用户:(id:$id)");
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