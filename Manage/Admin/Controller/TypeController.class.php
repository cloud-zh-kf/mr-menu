<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class TypeController extends PurviewController {
	//显示
    public function Index(){
		$db=D("type");
		$typeid=I('request.typeid',0);
		$fid=I('request.fid',0);
		$webarr=module_fields();
 		$typename=$webarr["typeid"][$typeid];
 		
 		$count = $db->where("typeid=$typeid AND pid={$fid}")->count();
		$Page = new \Think\AdminPage($count,10);
 		
		$show = $Page->show();
		$list = $db->order("disorder asc,id asc")->where("typeid=$typeid AND pid={$fid}")->limit($Page->firstRow.','.$Page->listRows)->select();
		
   		$this->assign('list',$list);
   		$this->assign('typename',$typename);
		$this->assign('page',$show);
		$this->display();
    }
	
	//添加
    public function Add(){
		$py = new \Org\Util\Pinyin;
		$db=M("type");
 		$webarr=module_fields();
		$fid=I('request.fid',0);
		$typeid=I('request.typeid',0);
 		$typename=$webarr["typeid"][$typeid];
   		$opath=get_type_zd($fid,'path');
 		if(IS_POST){
			
			$initials=$py->qupinyin(I('post.catname'));
 			$_POST['initials']=strtoupper(substr($initials,0,1));
			$_POST['pid']=$fid;
			$_POST['sendtime']=time();
   			$_POST['status']=1;
			if($db->create(I('post.'),1)){
				if($newid=$db->add()){
				
					if($fid) $path="{$opath}-{$newid}"; else $path=$newid;
					$level=count(explode("-",$path))-1;
					$db->execute("update __PREFIX__type set path='$path',level='$level' where id='{$newid}'");
					$_POST['path']=$path;
					F("type_{$newid}",$_POST, TEMP_PATH);//存入缓存
					sys_log("添加分类:{$_POST['catname']}(id:$newid)");
					$this->success("添加成功",U("Type/Index?typeid=".I('request.typeid',0)."&fid=".I('request.fid',0)."&pid=".I('request.pid',0)."&ty=".I('request.ty',0)."&tty=".I('request.tty',0).""));
					exit();
				}
			}	
			$this->error($db->getError());
		}
		$this->assign("typename",$typename);
		$this->assign("sort",$sort);
		$this->display();
    }
	
	//更新
    public function Update($id){
		$py = new \Org\Util\Pinyin;
		$db=M("type");
 		$list=$db->find($id);
		$webarr=module_fields();
 		$typename=$webarr["typeid"][$list['typeid']];
		if(IS_POST){
 			
			$initials=$py->qupinyin(I('post.catname'));
 			$_POST['initials']=strtoupper(substr($initials,0,1));
			$_POST['pid']=I('request.fid',0);
			$_POST['sendtime']=time();
			if($db->create(I('post.'),1)){
				if($db->save($data)!== false){
					F("type_{$id}",$_POST, TEMP_PATH);//存入缓存
					sys_log("编辑分类:{$_POST['catname']}(id:$id)");
					$this->success("编辑成功",U("Type/Index?typeid=".I('request.typeid',0)."&fid=".I('request.fid',0)."&pid=".I('request.pid',0)."&ty=".I('request.ty',0)."&tty=".I('request.tty',0).""));
					exit();
				}
			}	
			$this->error($db->getError());
 		}
		$this->assign("v",$list);
 		$catname=get_type_zd($list['pid']);
		$this->assign("typename",$typename);
   		$this->assign("catname",$catname);
 		$this->display();
    }
	
	//审核
	public function Audit($id){
 		$db=M("type");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		if($db->create(I('post.'),1)){
			if($db->save()!== false){
				sys_log("审核分类:(id:$id)");
				$this->success("审核成功",U("Type/Index?typeid=".I('request.typeid',0)."&fid=".I('request.fid',0)."&pid=".I('request.pid',0)."&ty=".I('request.ty')."&tty=".I('request.tty',0).""));
				exit();
			}
		}	
		$this->error($db->getError());	
	}
	
	//删除
	public function Del(){
 		$db=M("type");
		$did=I('post.checkid');
		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			foreach ($did as $k=>$v){
				F("type_{$v}",NULL,TEMP_PATH);//删除缓存
			}
 			if($db->delete($id)){
 				sys_log("删除分类:(id:$id)");
				$this->success("删除成功",U("Type/Index?typeid=".I('request.typeid',0)."&fid=".I('request.fid',0)."&pid=".I('request.pid',0)."&ty=".I('request.ty',0)."&tty=".I('request.tty',0).""));
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