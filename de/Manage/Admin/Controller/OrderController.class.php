<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class OrderController extends PurviewController {
	//显示
    public function Index(){
		$db=D("order");
 		$username=I('get.username');
  		$sdate=I('get.sdate');
		$edate=I('get.edate');
		$ispay=I('get.ispay',0);
		
		$paymentmethod=I('get.paymentmethod');
		$username=I('get.username');
		$map="1=1";
		if($sdate) $map.=" AND sendtime>'".strtotime($sdate)."'";
		if($edate) $map.=" AND sendtime<'".strtotime($edate)."'";
		if($ispay==1) $map.=" AND ispay=2";
		elseif($ispay==2) $map.=" AND ispay=1";
		elseif($ispay==3) $map.=" AND ispay=0";
		elseif($ispay==4) $map.=" AND ispay=3";
		if($paymentmethod) $map.=" AND paymentmethod='$paymentmethod'";
		if($username) $map.=" AND username like '%$username%'";
  		
		$count = $db->where($map)->count();
		$Page = new \Think\AdminPage($count,100);
 		
		$show = $Page->show();
		$list = $db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key=>$arr){
			$list[$key]['fareprice']=sprintf('%.2f', $arr['fareprice']);
			$list[$key]['shippingprice']=sprintf('%.2f', $arr['shippingprice']);
			$list[$key]['shopprice']=sprintf('%.2f', $arr['shopprice']);
			$list[$key]['totalprice']=sprintf('%.2f', $arr['totalprice']);
		}
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }
	
 	 //更新
     public function Query(){
	 	$db=D('orderitem');
 		if(IS_POST){
			$did=I('post.ids');
			$shippingprice=I('post.shippingprice');
 			$orderid=I('post.orderid');
			if(!empty($did) && is_array($did)){
				$buyprice=I('post.buyprice');
				$num=I('post.num');
				$oldnum=I('post.oldnum');
				$tariff=I('post.tariff');
				$remark=I('post.remark');
				
				$oldmz=I('post.oldmz');
				$mz=I('post.mz');
				$xs=I('post.xs');
				$oldkxz=I('post.oldkxz');
				$kxz=I('post.kxz');
				$jz=I('post.jz');
				$zk=I('post.zk');
				//print_r($_POST);
				
				foreach ($did as $k=>$v){
					$buyprices=$buyprice[$k];
					$nums=$num[$k];
					$oldnums=$oldnum[$k];
					$tariffs=($tariff[$k]/100);
					$remarks=$remark[$k];
 					$xss=$xs[$k];
					 
					if($xss){
						$xss=$xss;
						$ixss=$xss;
					}else{
						$xss=1;
						$ixss='';
					} 
					
					$per_mz=$mz[$k]/$oldnums;
					$per_kxz=$kxz[$k]/$oldnums;
 					
					if($mz[$k]<>$oldmz[$k])$mzs=$mz[$k];else $mzs=$per_mz*$nums;
					if($kxz[$k]<>$oldkxz[$k])$kxzs=$kxz[$k];else $kxzs=$per_kxz*$nums;
 					
 					$jzs=$mzs-$kxzs;
					
					$zks=($zk[$k]/100);
					if($zks==1) $tep=1;else $tep=1-$zks;
				
					$slprice=$tariffs*$buyprices*$nums;
					$fareprice=$fareprice+$slprice;
				
					$shopprice=$buyprices*$nums*$tep;
					$shopprices=$shopprice+$shopprices;
					
 					$sql="update __PREFIX__orderitem set buyprice='$buyprices',buynum='$nums',tariff='$tariffs',remark='$remarks',xs='$ixss',mz='$mzs',kxz='$kxzs',jz='$jzs',zk='$zks' where id={$v}";
					//echo $sql;
					//exit();
 					$db->execute($sql);
				}
				
			}
 			$totalmoney=$shopprices+$shippingprice+$fareprice;
 			
			$sqls="update __PREFIX__order set shopprice='$shopprices',fareprice='$fareprice',totalprice='$totalmoney' where orderid='{$orderid}'";
 			$db->execute($sqls);
 			
			$this->success("操作成功！",U("Order/Show?orderid={$orderid}"));
		}
     }
	
  	
	//审核
	public function Show($orderid){
 		$db=D('order');
		if(IS_POST){
			$ispay=I('request.ispay',0);
			$totalprice=I('post.totalprice');
			$paid=I('post.paid');
			$unpaid=$totalprice-$paid;
			$_POST['totalprice']=$totalprice;
			$_POST['paid']=$paid;
			$_POST['unpaid']=$unpaid;
			
 			$db->create();
			if($db->save()!== false){
				$sqls="update __PREFIX__orderitem set ispay={$ispay} where orderid='{$orderid}'";
				//echo $sqls;
				//exit();
				$db->execute($sqls);
				$this->success("操作成功！",U("Order/Index"));
			}else{
				$this->error("操作失败！");
			}
		}
		
		
		$v=$db->where("orderid={$orderid}")->order('id desc')->find();
 		$v['shippingprice']=sprintf("%.2f",$v['shippingprice']);
		$v['fareprice']=sprintf("%.2f",$v['fareprice']);
		$v['totalprice']=sprintf("%.2f",$v['totalprice']);
 		$list=D('orderitem')->where("orderid={$orderid}")->order('id asc')->select();
		$this->assign("lm",D("type")->where('status=1 AND typeid=4')->select());	
		
		$this->assign("lms",D("news")->where('status=1 AND ty=11')->select());	
		
		$this->assign('list',$list);
		$this->assign('v',$v);
  	    $this->display();
	}
	
  	
	//审核
	public function History($uid){
  		$list=D('orderitem')->where("uid={$uid}")->order('id desc')->select();
		foreach($list as $key=>$arr){
			$list[$key]['tt']=sprintf('%.2f', $arr['buynum']*$arr['buyprice']*$tmp);
		}
		
		$this->assign('list',$list);
   	    $this->display();
	}
	
	
	
	
  	
	//审核
	public function Prints($orderid){
   		$bd=D('order')->where("orderid={$orderid}")->find();
		$v=D('user')->where("id={$bd['uid']}")->find();
		$bd['shippingprice']=sprintf('%.2f', $bd['shippingprice']);
		$bd['fareprice']=sprintf('%.2f', $bd['fareprice']);
		$bd['totalprice']=sprintf('%.2f', $bd['totalprice']);
		$this->assign('bd',$bd);
		$this->assign('v',$v);
   	    $this->display();
	}
	
  	
	//审核
	public function Noprints($orderid){
   		$bd=D('order')->where("orderid={$orderid}")->find();
		$bd['totalmoney']=$bd['totalprice']-$bd['fareprice'];
		
		$v=D('user')->where("id={$bd['uid']}")->find();
		$bd['shippingprice']=sprintf('%.2f', $bd['shippingprice']);
		$bd['fareprice']=sprintf('%.2f', $bd['fareprice']);
		$bd['totalprice']=sprintf('%.2f', $bd['totalprice']);
		$this->assign('bd',$bd);
		$this->assign('v',$v);
   	    $this->display();
	}
	
  	
	//审核
	public function sprints($orderid){
   		$bd=D('order')->where("orderid={$orderid}")->find();
		$bd['totalmoney']=$bd['totalprice']-$bd['fareprice'];
		
		$v=D('user')->where("id={$bd['uid']}")->find();
		$bd['shippingprice']=sprintf('%.2f', $bd['shippingprice']);
		$bd['fareprice']=sprintf('%.2f', $bd['fareprice']);
		$bd['totalprice']=sprintf('%.2f', $bd['totalprice']);
		$this->assign('bd',$bd);
		$this->assign('v',$v);
   	    $this->display();
	}
	
	
	//删除
	public function Del(){
		$db=M("order");
		$did=I('post.checkid');
		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			if($db->delete($id)){
				sys_log("删除订单:(id:$id)");
				$this->success("删除成功！",U("Order/Index"));
			}else{
				$this->error("删除失败！");
			}
		}else{
			$this->error('请选择删除信息!');
		}
	}
	
	//删除
	public function ItemDel(){
		$db=M("orderitem");
		$orderid=I('get.orderid');
		$id=I('get.id');
		if(!empty($id)){
 			if($db->delete($id)){
				sys_log("删除成功:(id:$id)");
				$this->success("删除成功！",U("Order/Show?orderid={$orderid}"));
			}else{
				$this->error("删除失败！");
			}
		}else{
			$this->error('请选择删除信息!');
		}
	}
	
	
	//相关操作
	public function Actions(){
		 $db=M("order");
		 $acts=I('request.acts');
 		 $did=I('post.checkid');

		 if($acts=='Del'){
 			if(!empty($did) && is_array($did)){
				$id=implode(",",$did);
				if($db->delete($id)){
					sys_log("删除订单:(id:$id)");
					$this->success("删除成功！",U("Order/Index"));
				}else{
					$this->error("删除失败");
				}
			}else{
				$this->error('请选择删除信息!');
			}
		}elseif($acts=='Print'){ //打印
 			$dbs=D('orderitem');
  			if(!empty($did) && is_array($did)){
				$ids=implode(",",$did);
				$list=$db->field('orderid')->where("id in(".$ids.")")->select();
				foreach($list as $key=>$arr){
  					if($key==0) $orderids.=$arr['orderid']; else $orderids.=",".$arr['orderid'];
				}
 				 
				$bd=$dbs->group('gid')->where("orderid in(".$orderids.")")->select();
				foreach($bd as $key=>$arr){
					$bd1=$dbs->field('sum(buynum) as num')->where("orderid in(".$orderids.") AND gid={$arr['gid']}")->find();
 					$bd[$key]['tnum']=$bd1['num'];
					
			
					$bd2=$dbs->field('sum(buynum*buyprice) as money')->where("orderid in(".$orderids.") AND gid={$arr['gid']}")->find();
 					$bd[$key]['tmoney']=$bd2['money'];
					
					$bd3=$dbs->field('sum(xs) as xs')->where("orderid in(".$orderids.") AND gid={$arr['gid']}")->find();
 					$bd[$key]['txs']=$bd3['xs'];
					
 				}
							
 				$this->assign('bd',$bd); 
				
			}else{
				$this->error('请选择打印信息!');
			}
			
			$this->assign('bd',$bd);
			$this->display('sprints');
			
		}	
	}
}

?>