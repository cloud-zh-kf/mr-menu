<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class FormsController extends PurviewController {
	//显示
    public function Index(){
        cookie('Jumpurl',basename($_SERVER['REQUEST_URI']));
		$db=D("forms");
 		$count = $db->count();
		$Page = new \Think\AdminPage($count,10);
		$show = $Page->show();
		$list = $db->limit($Page->firstRow.','.$Page->listRows)->select();
 		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }


    //添加
    public function Add(){
		$db=M("forms");
        $id=I('request.id',0);
        $v=$db->find($id);
        if($v){

        }else{

        }
		if(IS_POST){
   			$_POST['status']=1;
   			$_POST['sendtime']=time();
			if($db->create(I('post.'),1)){
			    if($id){
                    if($db->save()!== false){
                        $title=I('request.title');
                        $tablename=I('request.tablename');
                        $oldtablename=I('request.oldtablename');
                        $sqls="rename table `__PREFIX__{$oldtablename}` to `__PREFIX__{$tablename}`";
                        $db->execute($sqls);

                        $sqlss="ALTER TABLE  `__PREFIX__{$tablename}` CHANGE  `id` `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT  '{$title}表'";
                        $db->execute($sqlss);

                        F("forms_{$id}",$_POST, TEMP_PATH);//存入缓存
                        sys_log("编辑表单名称:{$title}(id:$id)");
                        $this->success("编辑成功",cookie('Jumpurl'));
                        exit();
                    }
                }else{
                    if($id=$db->add()){
                        $title=I('request.title');
                        $tablename=I('request.tablename');
                        F("forms_{$id}",$_POST, TEMP_PATH);//存入缓存

                        $sqls="CREATE TABLE `__PREFIX__{$tablename}` (
                              `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '{$title}表',
                              `ip` varchar(15) NOT NULL DEFAULT '' COMMENT 'ip地址',
                              `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
                              `sendtime` varchar(10) NOT NULL DEFAULT '' COMMENT '操作时间',
                              PRIMARY KEY (`id`),
                              KEY `{$tablename}` (`status`)
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
                        $db->execute($sqls);


                        sys_log("添加表单名称:{$title}(id:$id)");
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

    //显示
    public function Fields($typeid){
        cookie('Jumpurls',basename($_SERVER['REQUEST_URI']));
        $tablename=get_forms_zd($typeid);
        $list=M()->query("SHOW FULL COLUMNS from `__PREFIX__{$tablename}`");

        $field = M($tablename)->getDbFields();

        foreach ($list as $k=>$v){
            $arr=explode("_",$v['Comment']);
            $list[$k]['title']=$arr[0];
            $list[$k]['tip']=$arr[1];


        }

        $end= $field[count($field)-4];
        cookie('zd',$end);
        $this->assign('list',$list);
        $this->display();
    }

    //显示
    public function Infos($typeid){
        $tablename=get_forms_zd($typeid);
        $db=D("{$tablename}");
        $count = $db->count();
        $Page = new \Think\AdminPage($count,10);
        $show = $Page->show();
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $k=>$v){
            if($v['status']==1) $status="<a href=\"/Admin-Forms-Audit-typeid-{$typeid}-id-{$v['id']}.html\"><img width=\"16\" height=\"16\" border=\"0\" alt=\"已启用\" src=\"/Manage/Admin/Public/images/p.png\"/></a>
";else $status="<a href=\"/Admin-Forms-Audit-typeid-{$typeid}-id-{$v['id']}.html\"><img width=\"16\" height=\"16\" border=\"0\" alt=\"已查封\" src=\"/Manage/Admin/Public/images/x.png\"/></a>";
            $list[$k]['status']=$status;
            $list[$k]['sendtime']=date('Y-m-d',$v['sendtime']);
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

//添加
    public function InfoAdd($typeid){
        if(IS_POST){
            $tablename=get_forms_zd($typeid);
            $db=D("{$tablename}");
            $_POST['sendtime']=time();
            $_POST['ip']=get_client_ip();
            $_POST['status']=1;
            if($db->create(I('post.'),1)){
                if($id=$db->add()){
                    $this->success("添加成功",U("Forms/Infos?typeid={$typeid}"));
                    exit();
                }
            }
            $this->error($db->getError());
        }
        $this->assign("list");
        $this->display();
    }

    //添加
    public function FieldAdd(){
        $zd=cookie('zd');
        $typeid=I('request.typeid',0);
        if(IS_POST){
            //print_r($_POST);
            $act=I('request.act');
            $tablename=I('request.table');
            $name=trim(I('request.name'));
            $title=trim(I('request.title'));
            $tip=trim(I('request.tip'));
            $typeid=I('request.typeid',0);
            if($act=='up'){
                $oldname=trim(I('request.oldname'));
                $sqls="ALTER TABLE  `__PREFIX__{$tablename}` CHANGE  `{$oldname}` `{$name}` VARCHAR( 3000 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '' COMMENT '{$title}_{$tip}'";
                //exit($sqls);
                M()->execute($sqls);
                $this->success("修改成功",cookie('Jumpurls'));
                exit();
            }else{
                $sqls="ALTER TABLE  `__PREFIX__{$tablename}` ADD `{$name}` VARCHAR( 3000 ) NOT NULL DEFAULT  '' COMMENT  '{$title}_{$tip}' AFTER `{$zd}`";
                M()->execute($sqls);
                $this->success("添加成功",cookie('Jumpurls'));
                exit();
            }

            $this->error(M()->getError());
        }
        $this->assign("list");
        $this->display();
    }

    //更新
    public function FieldUpdate($typeid){
        $tablename=get_forms_zd($typeid);
        if(IS_POST){
            $oldname=trim(I('request.oldname'));
            $name=trim(I('request.name'));
            $title=trim(I('request.title'));
            $tip=trim(I('request.tip'));
            $pid=I('request.typeid',0);
            $sqls="ALTER TABLE  `__PREFIX__{$tablename}` CHANGE  `{$oldname}` `{$name}` VARCHAR( 3000 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '' COMMENT '{$title}_{$tip}'";
            //exit($sqls);
            M()->execute($sqls);
            $this->success("修改成功",U("Forms/Fields?typeid={$typeid}"));
            exit();
            $this->error(M()->getError());
        }
        $this->display();
    }

    //更新
    public function FieldDel($typeid){
        if(IS_GET){
            $tablename=get_forms_zd($typeid);
            $zd=trim(I('get.zd'));
            $sqls=" ALTER TABLE `__PREFIX__{$tablename}` DROP `{$zd}`";
            M()->execute($sqls);
            $this->success("删除成功",cookie('Jumpurls'));
            exit();
            $this->error(M()->getError());
        }
        $this->display();
    }
	
	//审核
	public function Audit($typeid,$id){
        $tablename=get_forms_zd($typeid);
		$db=M("{$tablename}");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核表单:(id:$id)");
				$this->success("审核成功",U("Forms/Infos?typeid={$typeid}"));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function FormsDel(){
		$db=M("forms");
		$id=I('request.id',0);
		if($id){
            $tablename=get_forms_zd($id);
           // echo $tablename;
            $sqls=" DROP TABLE `__PREFIX__{$tablename}`";
            //exit($sqls);
            M()->execute($sqls);
            F("forms_{$id}",NULL,TEMP_PATH);//删除缓存

			if($db->delete($id)){
 				sys_log("删除表单:(id:$id)");
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
    public function InfoDel($typeid){
        $tablename=get_forms_zd($typeid);
        $db=D("{$tablename}");
        $did=I('post.checkid');
        if(!empty($did) && is_array($did)){
            $id=implode(",",$did);
            if($db->delete($id)){
                $this->success("删除成功！",U("Forms/Infos?typeid={$typeid}"));
            }else{
                $this->error("删除失败！");
            }
        }else{
            $this->error('请选择删除信息!');
        }

    }
}

?>