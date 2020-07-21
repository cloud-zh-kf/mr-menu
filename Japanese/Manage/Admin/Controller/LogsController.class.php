<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class LogsController extends PurviewController {

	//显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
		$db=D("logs");
 		$count = $db->count();
		$Page = new \Think\AdminPage($count,20);
 		
		$show = $Page->show();
		$list = $db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
  		
 		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }

	//删除
	public function Del(){
		$db=M("logs");
		$id=I('request.id',0);
		if($id){
            F("model_{$id}",NULL,TEMP_PATH);//删除缓存
			if($db->delete($id)){
 				sys_log("删除日志:(id:$id)");
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