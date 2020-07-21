<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class SortController extends PurviewController {

    //显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
        $db=D("sort");
        $list = $db->getTree();
        if(IS_POST){
            $sorting_arr=I('post.sorting');
            $checkid=I('post.checkid');
            for($i=0;$i<count($checkid);$i++) {
                D()->execute("update __PREFIX__sort set disorder=$sorting_arr[$i] where id='{$checkid[$i]}'");
                sys_log("更新栏目排序:(id:$checkid[$i])");
            }
            $this->success("栏目排序更新成功",cookie('Jumpurl'));
        }
        $this->assign('list',$list);
        $this->display();
    }


    //生成缓存
    public function Make(){
        //生成模型缓存
        $model=D('model')->where("status=1")->select();
        foreach ((array)$model as $k => $v){
            F("model_{$v['id']}",$v, TEMP_PATH);//存入缓存
        }

        //生成角色缓存
        $role=D('role')->where("status=1")->select();
        foreach ((array)$role as $k => $v){
            F("role_{$v['id']}",$v, TEMP_PATH);//存入缓存
        }

        //生成管理员缓存
        $manager=D('manager')->where("status=1")->select();
        foreach ((array)$manager as $k => $v){
            F("manager_{$v['id']}",$v, TEMP_PATH);//存入缓存
        }

        //生成栏目缓存
        $sort=D('sort')->where("status=1")->select();
        foreach ((array)$sort as $k => $v){
            F("sort_{$v['id']}",$v, TEMP_PATH);//存入缓存
        }


        //生成系统配置缓存
        $sort=D('config')->select();
        foreach ((array)$sort as $k => $v){
            F("{$v['varname']}",$v['varvalue'], TEMP_PATH);//存入缓存
        }

        $this->success("缓存更新成功",cookie('Jumpurl'));
    }

    //添加&&编辑
    public function Add(){
        $db=D("sort");
        $id=I('request.id',0);
        $pid=I('request.pid',0);
        $v=$db->find($id);
        if($v){
			if($v['pid'])
			$v['pidcatname']=get_sort_zd($v['pid']);
			else
			$v['pidcatname']="一级栏目";	
        }else{
            $v=$db->find($pid);
            $v['pidcatname']=get_sort_zd($pid);
            $v['catname']='';
            $v['id']=0;
            $v['pid']=$pid;
            $v['isopen']=0;
            $v['status']=1;
            $v['disorder']=$db->max('disorder')+5;
        }
        if(IS_POST){
            $model_arr=explode("|",I('request.model_id'));
            $_POST['model_id']=$model_arr[0];
            $_POST['sendtime']=time();
            if($db->create(I('post.'),1)){
                F("sort_{$id}",$_POST, TEMP_PATH);//存入缓存
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
                sys_log("审核栏目:(id:$id)");
                $this->success("审核成功",cookie('Jumpurl'));
                exit();
            }
        }
        $this->error($db->getError());
    }

    //删除
    public function Del(){
        $db=M("sort");
        $id=I('request.id',0);
        if($id){
            F("sort_{$id}",NULL,TEMP_PATH);//删除缓存
            if($db->delete($id)){
                sys_log("删除栏目:(id:$id)");
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