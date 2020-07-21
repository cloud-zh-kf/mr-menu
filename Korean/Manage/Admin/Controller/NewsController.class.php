<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class NewsController extends PurviewController {

    //显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
        $db=D("news");
        $id=I('request.id',0);
        $pid=I('request.pid',0);
        $ty=I('request.ty',0);
        $tty=I('request.tty',0);
        $ttty=I('request.ttty',0);
        $q=I('request.q');

        $sqlkey="id>0";
        if($ttty>0){
            $zid=$ttty;
            $sqlkey.=" AND tty={$ttty}";
        }elseif($tty>0){
            $zid=$tty;
            $sqlkey.=" AND tty={$tty}";
        }elseif($ty>0){
            $zid=$ty;
            $sqlkey.=" AND ty={$ty}";
        }elseif($pid>0){
            $zid=$pid;
            $sqlkey.=" AND pid={$pid}";
        }
        if($q) $sqlkey.=" AND title like '%".$q."%'";
        $vs['pid']=$pid;
        $vs['ty']=$ty;
        $vs['tty']=$tty;
        $vs['ttty']=$ttty;
        $vs['zid']=$zid;
        $vs['listurl']=U('News/Index',"pid={$pid}&ty={$ty}&tty={$tty}&ttty={$ttty}");
        $vs['addurl']=U('News/Add',"pid={$pid}&ty={$ty}&tty={$tty}&ttty={$ttty}");
        $vs['catname']=get_sort_zd($zid);
        $vs['imgnum']=get_sort_zd($zid,'imgnum');

        $count = $db->where($sqlkey)->count();
        $Page = new \Think\AdminPage($count,20);
        $show = $Page->show();

        $list = $db->where($sqlkey)->order("istop desc,id asc,disorder desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('vs',$vs);
        $this->assign('list',$list);
        $this->assign('page',$show);
        $templet=get_sort_zd($zid,'templet');//获取当前模板名称
        $this->display("{$templet}/Index");
    }

    //删除&&更新排序
    public function Action(){
        $db=D('news');
        if(IS_POST){
            $act=I('post.act');
            $sorting_arr=I('post.sorting');
            $checkid=I('post.checkid');
            if($act=='sorting'){
                for($i=0;$i<count($checkid);$i++) {
                    D()->execute("update __PREFIX__news set disorder=$sorting_arr[$i] where id='{$checkid[$i]}'");
                    sys_log("信息排序更新:(id:$checkid[$i])");
                }
                $this->success("信息排序更新成功",cookie('Jumpurl'));
            }elseif($act=='alldel') {
                for($i=0;$i<count($checkid);$i++) {
                    D()->execute("delete from  __PREFIX__news where id='{$checkid[$i]}'");
                    sys_log("删除信息:(id:$checkid[$i])");
                }
                $this->success("信息删除成功",cookie('Jumpurl'));
            }
        }
    }

    //添加&&编辑
    public function Add(){
        $db=D("news");
        $id=I('request.id',0);
        $pid=I('request.pid',0);
        $ty=I('request.ty',0);
        $tty=I('request.tty',0);
        $ttty=I('request.ttty',0);
        $v=$db->where("status=1")->find($id);
        if($v){
            $pid=$v['pid'];
            $ty=$v['ty'];
            $tty=$v['tty'];
            $ttty=$v['ttty'];
        }
        if($ttty>0){
            $zid=$ttty;
            $sqlkey=" AND tty={$ttty}";
        }elseif($tty>0){
            $zid=$tty;
            $sqlkey=" AND tty={$tty}";
        }elseif($ty>0){
            $zid=$ty;
            $sqlkey=" AND ty={$ty}";
        }elseif($pid>0){
            $zid=$pid;
            $sqlkey=" AND pid={$pid}";
        }
        if($v['id']){
            $v['pid']=$v['pid'];
            $v['ty']=$v['ty'];
            $v['tty']=$v['tty'];
            $v['ttyt']=$v['ttty'];
        }else{
            $v['pid']=$pid;
            $v['ty']=$ty;
            $v['tty']=$tty;
            $v['ttty']=$ttty;
        }
        $v['catname']=get_sort_zd($zid);
        $v['zid']=$zid;
        $v['imgnum']=get_sort_zd($zid,'imgnum')+1;
        $v['listurl']=U('News/Index',"pid={$pid}&ty={$ty}&tty={$tty}&ttty={$ttty}");
        $v['addurl']=U('News/Add',"pid={$pid}&ty={$ty}&tty={$tty}&ttty={$ttty}");
        if(IS_POST){
            if(I('post.isgood'))$_POST['isgood']=1;else $_POST['isgood']=0;
            if(I('post.istop'))$_POST['istop']=1;else $_POST['istop']=0;
            $_POST['sendtime']=time();
            $_POST['status']=1;
            if($db->create(I('post.'),1)){
                if($id){
                    if($db->save()!== false){
                        $images=$_POST['images'];
                        if($images){
                            $strings = explode('|',$images);
                            foreach ($strings as $v){
                                $vv=str_replace(".", "_", $v);
                                $bt=$_POST[$vv];
                                $pic=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..", "", $v);
                                if($pic){
                                    $sqla="insert into __PREFIX__titlepic set pid='$id',title='$bt',img1='$pic',status=1,sendtime='".time()."'";
                                    $db->execute($sqla);
                                }
                            }
                        }

                        sys_log("编辑{$v['catname']}栏目内容:{$v['title']}(id:$id)");
                        $this->success("修改成功",cookie('Jumpurl'));
                        exit();
                    }
                }else{
                    if($id=$db->add()){
                        $images=$_POST['images'];
                        if($images){
                            $strings = explode('|',$images);
                            foreach ($strings as $v){
                                $vv=str_replace(".", "_", $v);
                                $bt=$_POST[$vv];
                                $pic=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..", "", $v);
                                if($pic){
                                    $sqla="insert into __PREFIX__titlepic set pid='$id',title='$bt',img1='$pic',status=1,sendtime='".time()."'";
                                    $db->execute($sqla);
                                }
                            }
                        }

                        sys_log("添加{$v['catname']}栏目内容:{$v['title']}(id:$id)");
                        $this->success("添加成功",cookie('Jumpurl'));
                        exit();
                    }
                }
            }
            $this->error($db->getError());
        }

        $model_id=get_sort_zd($zid,'model_id');//获取当前栏目模块id
        $model_fields=get_model_zd($model_id,'model_fields');
        $arr=explode(",",$model_fields);
        $this->assign("arr",$arr);
        $this->assign("v",$v);
        $templet=get_sort_zd($zid,'templet');//获取当前模板名称
        $this->display("{$templet}/Add");
    }


    //审核
    public function Audit($id){
        $db=M("news");
        $list=$db->field("status")->find($id);
        $status=$list['status'];
        $_POST['id']=$id;
        $_POST['status']= $status ? 0 : 1;
        if($db->create(I('post.'),1)){
            if($db->save()!== false){
                sys_log("审核新闻:(id:$id)");
                $this->success("审核成功",cookie('Jumpurl'));
                exit();
            }
        }
        $this->error($db->getError());
    }

    //删除
    public function Del(){
        $db=M("news");
        $id=I('request.id',0);
        if($id){
            if($db->delete($id)){
                sys_log("删除新闻:(id:$id)");
                $this->success("删除成功",cookie('Jumpurl'));
                exit();
            }else{
                $this->error("删除失败");
            }
        }else{
            $this->error('请选择删除信息!');
        }
    }

    //删除
    public function Titlepic(){
        $db=M("titlepic");
        $id=I('request.id',0);
        if($id){
            $img=get_zd_name("img1","titlepic","id={$id}");
            if($img){
                @unlink(".".$img);
            }
            $db->delete($id);
        }
    }
    //单页面
    function Single(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
        $db=D("news");
        $id=I('request.id',0);
        $pid=I('request.pid',0);
        $ty=I('request.ty',0);
        $tty=I('request.tty',0);
        $ttty=I('request.ttty',0);
        if($ttty>0){
            $zid=$ttty;
            $sqlkey=" AND tty={$ttty}";
        }elseif($tty>0){
            $zid=$tty;
            $sqlkey=" AND tty={$tty}";
        }elseif($ty>0){
            $zid=$ty;
            $sqlkey=" AND ty={$ty}";
        }elseif($pid>0){
            $zid=$pid;
            $sqlkey=" AND pid={$pid}";
        }
        $v=$db->where("status=1{$sqlkey}")->find();
        if($v['id']){
        }else{
            $v['pid']=$pid;
            $v['ty']=$ty;
            $v['tty']=$tty;
            $v['ttyt']=$ttty;
            $v['title']=get_sort_zd($zid);
        }

        $v['catname']=get_sort_zd($zid);
        $v['zid']=$zid;
        $v['imgnum']=get_sort_zd($zid,'imgnum')+1;
        if(IS_POST){
            $_POST['sendtime']=time();
            $_POST['status']=1;
            if($db->create(I('post.'),1)){
                if($id){
                    if($db->save()!== false){
                        $images=$_POST['images'];
                        if($images){
                            $strings = explode('|',$images);
                            foreach ($strings as $v){
                                $vv=str_replace(".", "_", $v);
                                $bt=$_POST[$vv];
                                $pic=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..", "", $v);
                                if($pic){
                                    $sqla="insert into __PREFIX__titlepic set pid='$id',title='$bt',img1='$pic',status=1,sendtime='".time()."'";
                                    $db->execute($sqla);
                                }
                            }
                        }

                        sys_log("编辑{$v['catname']}栏目内容:{$v['title']}(id:$id)");
                        $this->success("修改成功",cookie('Jumpurl'));
                        exit();
                    }
                }else{
                    if($id=$db->add()){
                        $images=$_POST['images'];
                        if($images){
                            $strings = explode('|',$images);
                            foreach ($strings as $v){
                                $vv=str_replace(".", "_", $v);
                                $bt=$_POST[$vv];
                                $pic=str_replace("/Manage/Admin/Public/myeditor/php/../../../../..", "", $v);
                                if($pic){
                                    $sqla="insert into __PREFIX__titlepic set pid='$id',title='$bt',img1='$pic',status=1,sendtime='".time()."'";
                                    $db->execute($sqla);
                                }
                            }
                        }

                        sys_log("添加{$v['catname']}栏目内容:{$v['title']}(id:$id)");
                        $this->success("添加成功",cookie('Jumpurl'));
                        exit();
                    }
                }
            }
            $this->error($db->getError());
        }

        $model_id=get_sort_zd($zid,'model_id');//获取当前栏目模块id
        //echo $model_id;
        $model_fields=get_model_zd($model_id,'model_fields');
        $arr=explode(",",$model_fields);
        //print_r($arr);
        $this->assign("arr",$arr);
        $this->assign("v",$v);
        $templet=get_sort_zd($zid,'templet');//获取当前模板名称
        $this->display("{$templet}/Single");
    }
}
?>