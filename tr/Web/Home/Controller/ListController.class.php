<?php
namespace Home\Controller;
use Think\Controller;
use Tool\TopController;
class ListController extends TopController {
	//留言
	public function message(){
        $url=$_SERVER['HTTP_REFERER'];
        // print_r($_POST);
        if(IS_POST){
            $tablename=get_forms_zd(I('request.typeid',0));
            $db=D("{$tablename}");
            $_POST['sendtime']=time();
            $_POST['ip']=get_client_ip();
            $_POST['status']=1;
            if($db->create(I('post.'),1)){
                if($id=$db->add()){
                    //$nr="姓名:{$_POST['realname']}<br>邮箱:{$_POST['email']}<br>地址:{$_POST['address']}<br>电话:{$_POST['tel']}<br>留言:{$_POST['message']}<br>时间:".date('Y-m-d H:i:s')."";
                    //sendMail(sys('sys_reviceemail'),"来自{$_POST['realname']}的留言！",$nr);
                    if(I('request.typeid',0)==3 || I('request.typeid',0)==4){
                        $this->success("提交成功！",'index.php?m=&c=List&a=message&pid=18&ty=22&tty=0');
                    }else{
                        $this->success("提交成功！",$url);
                    }
                    exit();
                }
            }
            $this->error($db->getError());
        }
 		$this->display();
	}

//留言
    public function down($id){
        $db=M('news');
        $v=$db->field('file1')->where("status=1 AND id={$id}")->find();
        $count=$db->where("status=1 AND id={$id}")->count();
        if($v&&$count){
            $sqls="update __PREFIX__news set tags=tags+1 where id={$id}";
            $db->execute($sqls);
            $files=$v['file1'];
            header("location:{$files}");
            exit();
        }else{
            echo "<script>alert('访问出错');location.href='/en/'</script>";
            exit();
        }
    }

    //发送
    public function Send(){
	    $yzm=randoms();
	    $tel=I('post.mobile');
	    $typeid=I('post.typeid',0);
        if($typeid==1) $code="SMS_185980184";//注册
        elseif($typeid==2) $code="SMS_185980183";
        sendSms($tel,$yzm,$code);
    }

    //留言
    public function Up(){
        $uid=cookie('user_id');
        $db=D("job");

        if(IS_POST){

            if(isset($_FILES['files']) && $_FILES['files']['error'] == 0){
                $ret = uploadfileOne('files', 'Video', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['files'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }

            }
            $_POST['sendtime'] = time();
            $_POST['ip'] = get_client_ip();
            $db->create();
            if($db->add()!== false){
                $this->mysuccess("简历发送成功",'List-Recruitment-pid-6-ty-20.html');
                exit();
            }else{
                $this->myerror("简历发送失败");
            }
        }
    }
 }
?>