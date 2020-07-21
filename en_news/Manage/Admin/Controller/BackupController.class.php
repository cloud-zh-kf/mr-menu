<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class BackupController extends PurviewController {
 	
	public function Index()
	{
		$list=M()->query('show table status');
        $this->assign('list',$list);
		$this->display("Index");
	}

	public function Import()
	{
		set_time_limit(0);
		$key=I('get.key');
		if(IS_GET&&$key)
		{
			
			$key=str_replace('..','',$key);
			$name='Manage/Admin/Public/Backup/'.$key;
			//echo $name;
			//exit();
			if(!is_file($name))
			{
				$this->error('备份文件不存在');
			}
			else
			{
				$f=fopen($name,"rb");
		        //创建表缓冲变量
		        $create_table='';
		        while(!feof($f))
		        {
		            $line=fgets($f);
		            // 这一步为了将创建表合成完整的sql语句
		            // 如果结尾没有包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)
		            if (!preg_match('/;/',$line) || preg_match ( '/ENGINE=/', $line )) 
		            {
		                // 将本次sql语句与创建表sql连接存起来
		                $create_table .= $line;
		                // 如果包含了创建表的最后一句
		                if (preg_match ( '/ENGINE=/', $create_table)) {
		                    //执行sql语句创建表
		                     M()->query($create_table);
		                    //清空当前，准备下一个表的创建
		                    $create_table = '';
		                }
		                // 跳过本次
		                continue;
		            }
		            M()->query($line);
		        }
		        fclose($f);
				sys_log("还原数据文件:(名称:$key)");
				echo '数据库还原成功';
 			}
		}
		else
		{
			$root='Manage/Admin/Public/Backup';
			$list=deal_arr(scandir($root),$root);
			$this->assign('list',$list[1]);
  			$this->display("Import");
		}
	}

	public function Del()
	{
		$key=I('get.key');
		$key=str_replace('..','',$key);
		@unlink('Manage/Admin/Public/Backup/'.$key);
		sys_log("删除备份文件:(名称:$key)");
		echo '数据库文件删除成功!';
	}

	public function Btach()
	{
		$type=I("get.type");
		$id=I("get.id");
		if(empty($id))
		{
			$this->error('至少选择一个表');
			exit();
		}
		else
		{
			switch ($type)
			{
				case '1':
					$this->backup($id);
					break;
				case '2':
					$this->optimize($id);
					break;
				case '3':
					$this->repair($id);
					break;
			}
		}
 	}

	public function Optimize($table)
	{
		$arr=explode(',',$table);
		foreach($arr as $key)
		{
			M()->query("OPTIMIZE TABLE `{$key}`");
		}
		sys_log("优化数据表:(名称:$key)");
		echo '优化成功';
	}

	public function Repair($table)
	{
		$arr=explode(',',$table);
		foreach($arr as $key)
		{
			M()->query("REPAIR TABLE `{$key}`");
		}
		sys_log("修复数据表:(名称:$key)");
		echo '修复成功';
	}

	public function Backup($table)
	{
		set_time_limit(0);
		$list=explode(',',$table);
		$name=uniqid().'_'.date('Ymd_his').'.sql';
		$db=M();
		$sql  = "-- -----------------------------\n";
        $sql .= "-- SDCMS MySQL Data Transfer \n";
        $sql .= "-- \n";
        $sql .= "-- Date:".date("Y-m-d H:i:s") . "\n";
        $sql .= "-- -----------------------------\n\n";
        $sql .= "SET FOREIGN_KEY_CHECKS = 0;\n\n";

		foreach($list as $key)
		{
			
			$data=M()->query("SHOW CREATE TABLE `{$key}`");
			$sql .= "\n";
            $sql .= "-- -----------------------------\n";
            $sql .= "-- Table structure for `{$key}`\n";
            $sql .= "-- -----------------------------\n";
            $sql .= "DROP TABLE IF EXISTS `{$key}`;\n";
            $sql .= trim($data[0]['Create Table']) . ";\n\n";
		}

		foreach($list as $key)
		{
			$data=M()->query("SELECT * FROM `{$key}`");
			$sql .= "-- -----------------------------\n";
	        $sql .= "-- Records of `{$key}`\n";
	        $sql .= "-- -----------------------------\n";
	        foreach($data as $row)
	        {
	        	$val=implode("','",$row);
	        	$val=str_replace(PHP_EOL, '\r\n', $val);
	        	$dt=str_replace('"','\"',$val);
	        	$sql.= "INSERT INTO `{$key}` VALUES ('".$dt."');\n";
	        }
		}
		sys_log("备份数据表:(名称:$name)");
		file_put_contents('Manage/Admin/Public/Backup/'.$name,$sql);
		echo '数据库备份成功';
	}
}
?>