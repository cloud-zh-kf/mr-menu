<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
 	//自动验证
	 protected $_validate = array(     
 		// array('typeid','require','会员等级必须选择！'), 
 		// array('realname','require','联系人必须填写！'), 
 		// array('username','require','客户编码必须填写！'), 
		// array('username','','客户编码已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		// array('userpwd','/^\w(4,8)$/','密码格式错误！'), // 正则验证
 		 array('userpwd','require','密码必须填写！'), 
		// array('reuserpwd','userpwd','确认密码不正确！',0,'confirm'), // 验证确认密码是否和密码一致
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