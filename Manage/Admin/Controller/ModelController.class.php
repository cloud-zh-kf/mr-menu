<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class ModelController extends PurviewController {

	//显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
		$db=D("model");
 		$count = $db->count();
		$Page = new \Think\AdminPage($count,20);
 		
		$show = $Page->show();
		$list = $db->limit($Page->firstRow.','.$Page->listRows)->order('disorder asc,id asc')->select();
  		
 		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }
 
	
	//添加&&编辑
    public function Add(){
		$db=M("model");
		$id=I('request.id',0);
 		$model_fields=C('model_fields');
 		$v=$db->find($id);
 		if($v){

        }else{
            $v['status']=1;
            $v['disorder']=$db->max('disorder')+5;
        }
		$arr=get_frm_out_put($model_fields,"model_fields","checkbox",$v['model_fields'],"","");
		if(IS_POST){

  			$_POST['model_fields']=implode(",",I('post.model_fields'));
			if (in_array("10",explode(",",I('post.model_fields')))) $_POST['ispic']=1;else $_POST['ispic']=0;
			if($db->create(I('post.'),1)){
                F("model_{$id}",$_POST, TEMP_PATH);//存入缓存
			    if($id){
                    if($db->save()!== false){
                        sys_log("编辑模块名称:{$_POST['model_name']}(id:$id)");
                        $this->success("编辑成功",cookie('Jumpurl'));
                        exit();
                    }
                }else{
                    if($id=$db->add()){
                        sys_log("添加模块名称:{$_POST['model_name']}(id:$id)");
                        $this->success("添加成功",cookie('Jumpurl'));
                        exit();
                    }
                }
			}
			$this->error($db->getError());
		}
        $this->assign("v",$v);
		$this->assign("model_fields",$arr);
		$this->display();
    }
	

	//审核
	public function Audit($id){
		$db=M("model");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核模块:(id:$id)");
				$this->success("审核成功",cookie('Jumpurl'));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function Del(){
		$db=M("model");
		$id=I('request.id',0);
		if($id){
            F("model_{$id}",NULL,TEMP_PATH);//删除缓存
			if($db->delete($id)){
 				sys_log("删除模块:(id:$id)");
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