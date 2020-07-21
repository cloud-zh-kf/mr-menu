<?php
namespace Tool;
use Think\Controller;

class PurviewController extends Controller {
    function __construct(){
 		parent::__construct();
		$now_ac=CONTROLLER_NAME."-".ACTION_NAME;

 		if(session('admin_id')){
		}else{
			$this->success("请先登录！",U("Login/Index"),1);
			exit();
		}
        $admin_role_auth_ids=session('admin_role_auth_ids');
        $qxid=explode(",",$admin_role_auth_ids);
 		if($admin_role_auth_ids){
            $now_ty=I('request.ty');

            if(CONTROLLER_NAME=='News'){
                if(!in_array($now_ty,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }


            if(CONTROLLER_NAME=='Settings'){
                if(!in_array(9901,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Model'){
                if(!in_array(9902,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Sort'&&ACTION_NAME<>'Make'){
                if(!in_array(9903,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Role'){
                if(!in_array(9904,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Manager'&&ACTION_NAME<>'Person'){
                if(!in_array(9905,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Logs'){
                if(!in_array(9906,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Backup'){
                if(!in_array(9907,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

            if(CONTROLLER_NAME=='Sort'&&ACTION_NAME=='Make'){
                if(!in_array(9908,$qxid)){
                    $this->success("没有权限！",U("Login/Index"),1);
                    exit();
                }
            }

        }
    }
}
?>