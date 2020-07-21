<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class SettingsController extends PurviewController {
    //显示
    public function Index(){
		$db=M("config");
 		$list1=$db->where("typeid=1")->select();
 		$list2=$db->where("typeid=2")->select();
		$list3=$db->where("typeid=3")->select();
		$list4=$db->where("typeid=4")->select();
        $list6=$db->where("vartype=2")->select();
 		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->assign("list3",$list3);
		$this->assign("list4",$list4);
        $this->assign("list6",$list6);
  		$this->display();
    }
	
	//添加
	public function Add(){
		$db=M("config");
		if(IS_POST){
			$_POST['typeid']=1;
 			if($db->create(I('post.'),1)){
				if($id=$db->add()){
					sys_log("添加配置信息:(id:$id)");
					$this->success("添加成功",U("Settings/Index"));
					exit();
				}
			}
			$this->error($db->getError());
		}
	}
	
	//更新
	public function Update(){
		$db=M("config");
 		foreach($_POST as $k=>$v){
			$sql="UPDATE __PREFIX__config SET `varvalue`='$v' WHERE varname='$k'";
			if($db->execute($sql)){
 			} 
			if($k<>'dosubmit') F($k,$v, TEMP_PATH);
		}
		sys_log("编辑配置信息");
		$this->success("修改成功",U("Settings/Index"));
		exit();
	}
	
	//获取地图
	public function Map(){
		$result=I('request.result');
 		if(IS_POST){
			echo "<script>window.opener.document.myform3.sys_ll.value='".$result."'</script>";
			echo "<script language=\"javascript\">
			window.alert(\"筛选成功!\");
			window.close();
			</script>";
		}
 		$this->display();
	}
	
}

?>