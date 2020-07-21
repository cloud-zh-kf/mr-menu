<?php
namespace Home\Controller;
use Think\Controller;
use Tool\TopController;
class IndexController extends TopController {
    
	//首页
	public function Index(){
        $url=$_SERVER['HTTP_REFERER'];
        $sys_guestid=cookie('sys_guestid');
        if($sys_guestid){

        }else{
            cookie('sys_guestid',time());
        }
        if(IS_POST){
            $db=D("apply");
            $_POST['guestid']=$sys_guestid;
            $_POST['sendtime']=time();
            $_POST['ip']=get_client_ip();
            $_POST['status']=1;
            if($db->create(I('post.'),1)){
                if($id=$db->add()){
                    $this->redirect('List-Success');
                    exit();
                }
            }
            $this->error($db->getError());
        }
        $this->display();
    }

    
	
}
?>