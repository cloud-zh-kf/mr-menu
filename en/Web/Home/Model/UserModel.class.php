<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
 	//自动验证
	 protected $_validate = array(     
 		 //array('username','require','用户名必须填写！'), 
		 //array('username','','用户名已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		
 		 //array('tel','require','手机号必须填写！'), 
		 //array('tel','','手机号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		
		 //array('userpwd','/^\w(6,20)$/','密码格式错误！'), // 正则验证
 		// array('userpwd','require','密码必须填写！'), 
		// array('userpwd2','userpwd','确认密码不正确！',0,'confirm'), // 验证确认密码是否和密码一致
	 );
	 
	/*//自动完成 
	protected $_auto = array (          
		array('status','3'),
		array('userpwd','md5',3,'function'),
		array('sendtime','time',3,'function'),
	);	
	
	
	 protected $_map = array(        
	  'name' =>'username', // 把表单中name映射到数据表的username字
	 );*/
	 
}

?>