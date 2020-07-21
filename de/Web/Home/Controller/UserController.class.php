<?php
namespace Home\Controller;
use Think\Controller;
use Tool\PurviewController;
class UserController extends PurviewController {
    //验证码
    public function Yzm(){
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




    //发送验证码
    public function Sms(){
        $db=D('yzm');
        $tel=I('post.mobile');
        $yzm=random(4,0);
        $xmlObj=sendSms($tel,$yzm);
        //$result_code=$xmlObj->Message;
        if($xmlObj){
            $sqla="insert into __PREFIX__yzm set tel='{$tel}',yzm='{$yzm}'";
            $db->execute($sqla);
            cookie('send_zt',1,60);
            //echo "发送成功";
        }
    }


    //注册
    public function Reg(){
        $db=D("user");
        $verify = new \Think\Verify();
        if(IS_POST){
            if($verify->check(I('post.yzm'))){
				$username=I('post.username');
				$tel_code=I('post.tel_code');
                $counts=$db->where("username='$username'")->count();
                if($counts){
                    $this->mysuccess("注册失败，该手机号已被注册请重新输入",'/User-Reg-pid-5-ty-19.html');
                    exit();
                }

                $count=D('yzm')->where("yzm='$tel_code' AND username='$username' AND status=0")->count();
                if($count==0){
                    $this->mysuccess("对不起,您的手机验证码错误或已被使用!",'/User-Reg-pid-5-ty-19.html');
                    exit();
                }


                $_POST['sendtime']=time();
                $_POST['ip']=get_client_ip();
                $_POST['status']=1;
                if (!$db->create()){
                    $this->error($db->getError());
                }else{
                    if($id=$db->add()){
                        cookie('user_id',$id,62400);
                        cookie('user_name',$username,62400);

                        $sqla="update __PREFIX__yzm set status=1 where username='{$username}' AND yzm='{$tel_code}'";
                        if($db->execute($sqla)){
                            $this->mysuccess("恭喜,注册成功！",U("User/Write"));
                            exit();
                        }

                    }else{
                        $this->mysuccess("注册失败！",'/User-Reg-pid-5-ty-19.html');
                    }
                }
            }else{
                $this->mysuccess("图片证码输入有误!",'/User-Reg-pid-5-ty-19.html');
                exit();
            }
        }
        $this->display();
    }





    //登录
    public function Login(){
        $db = D('user');
        $verify = new \Think\Verify();
        if(IS_POST){
            if($verify->check(I('post.yzm'))) {
                $username = I('post.username');
                $password = I('post.userpwd');
                $info = $db->where("username='$username'")->find();

                if ($info) {
                    if ($info['userpwd'] <> $password) {
                        $this->mysuccess("登录密码错误!",'/User-Login-pid-5-ty-19.html');
                    } else {
                        cookie('user_id', $info['id'], 62400);
                        cookie('user_name', $username, 62400);
                        $login = time();
                        $sqls = "update __PREFIX__user set lastlogintime='$login',login='$login',loginip='" . get_client_ip() . "',logincount=logincount+1 where id={$info['id']}";
                        $db->execute($sqls);
                        $this->Redirect('/User-Write');
                        exit();
                    }
                } else {
                    $this->mysuccess("登录信息错误!", '/User-Login-pid-5-ty-19.html', 3000);
                    exit();
                }
            }else{
                $this->mysuccess("图片证码输入有误!",'/User-Login-pid-5-ty-19.html');
                exit();
            }
        }
        $this->display();
    }


    //注册
    public function Write(){
        $sys_guestid=cookie('sys_guestid');
        $uid=cookie('user_id');
        $db=D("user");
        $dbs=D("apply");
        $vs=$dbs->where("guestid='$sys_guestid'")->order('id desc')->find();
        $vt=$db->where("id='$uid'")->find();
        if(IS_POST){
            if(isset($_FILES['img1']) && $_FILES['img1']['error'] == 0){
                $ret = uploadimgOne('img1', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img1'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img2']) && $_FILES['img2']['error'] == 0){
                $ret = uploadimgOne('img2', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img2'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img3']) && $_FILES['img3']['error'] == 0){
                $ret = uploadimgOne('img3', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img3'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img4']) && $_FILES['img4']['error'] == 0){
                $ret = uploadimgOne('img4', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img4'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img5']) && $_FILES['img5']['error'] == 0){
                $ret = uploadimgOne('img5', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img5'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img6']) && $_FILES['img6']['error'] == 0){
                $ret = uploadimgOne('img6', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img6'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img7']) && $_FILES['img7']['error'] == 0){
                $ret = uploadimgOne('img7', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img7'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img8']) && $_FILES['img8']['error'] == 0){
                $ret = uploadimgOne('img8', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img8'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }

            $_POST['id']=$uid;
            $db->create();
            if($db->save()!== false){
                $this->mysuccess("修改成功",U("User/My"));
                exit();
            }else{
                $this->myerror("修改失败");
            }
        }

        $this->assign('vs',$vs);
        $this->assign('vt',$vt);
        $this->display();
    }
    //注册
    public function My(){
         $uid=cookie('user_id');
        $db=D("user");
        $vs=$db->where("id='$uid'")->order('id desc')->find();
        if($vs){
            if($vs['img1']) $vs['img1']=$vs['img1'];else $vs['img1']="images/clzm.jpg";
            if($vs['img2']) $vs['img2']=$vs['img2'];else $vs['img2']="images/clzm.jpg";
            if($vs['img3']) $vs['img3']=$vs['img3'];else $vs['img3']="images/clzm.jpg";
            if($vs['img4']) $vs['img4']=$vs['img4'];else $vs['img4']="images/clzm.jpg";
            if($vs['img5']) $vs['img5']=$vs['img5'];else $vs['img5']="images/clzm.jpg";
            if($vs['img6']) $vs['img6']=$vs['img6'];else $vs['img6']="images/clzm.jpg";
            if($vs['img7']) $vs['img7']=$vs['img7'];else $vs['img7']="images/clzm.jpg";
            if($vs['img8']) $vs['img8']=$vs['img8'];else $vs['img8']="images/clzm.jpg";
        }
        $this->assign('vs',$vs);
        $this->display();
    }


    //修改登录密码
    public function Uppwd(){
        $db=D("user");
        $uid=cookie('user_id');
        $verify = new \Think\Verify();
        if(IS_POST){
            if($verify->check(I('post.yzm'))) {
                $username=I('post.username');

                $count=$db->where("id={$uid} AND userpwd='".I('request.oldpwd')."'")->count();
                if($count==0){
                    $this->mysuccess("对不起,原密码错误!",U("User/Uppwd"));
                    exit();
                }


                $sql="update __PREFIX__user set userpwd='".I('request.userpwd')."' where id={$uid}";
                if($db->execute($sql)){

                    $this->mysuccess("恭喜,登录密码修改成功！",U("User/Uppwd"));
                    exit();

                }else{
                    $this->mysuccess("对不起,网络异常,操作失败!",U("User/Uppwd"));
                    exit();
                }
            }else{
                $this->mysuccess("图片证码输入有误!",U("User/Uppwd"));
                exit();
            }
        }
        $this->display();
    }


    //找回密码
    public function Forget(){
        $db=D("user");
        $verify = new \Think\Verify();

        if(IS_POST){
            if($verify->check(I('post.yzm'))) {
                $username=I('post.username');
                $tel_code=I('post.tel_code');
                $userpwd=I('post.userpwd');

                $count=D('yzm')->where("yzm='$tel_code' AND username='$username' AND status=0")->count();
                if($count==0){
                    $this->myerror("对不起,您的手机验证码错误或已被使用!");
                    exit();
                }

                $sql="update __PREFIX__user set userpwd='$userpwd' where username='$username'";
                if($db->execute($sql)){

                    $sqla="update __PREFIX__yzm set status=1 where username='{$username}' AND yzm='{$tel_code}'";
                    if($db->execute($sqla)){
                        $this->mysuccess("恭喜,登录密码修改成功！",'/User-Login-pid-5-ty-19.html');
                        exit();
                    }
                }else{
                    $this->myerror("对不起,网络异常,操作失败!");
                    exit();
                }
            }else{

                $this->myerror("图片证码输入有误!");
                exit();
            }
        }else{

            $this->display();
        }


    }


    //退出
    public function Logout(){
        $uid=cookie('user_id');;
        unlink('Web/Log/'.$uid.'.txt');
        cookie('user_id',null);
        cookie('user_name',null);
        cookie('user_pwd',null);
        $this->mysuccess("退出成功|跳转中...",'/User-Login-pid-5-ty-19.html');
        exit();
    }

}

?>