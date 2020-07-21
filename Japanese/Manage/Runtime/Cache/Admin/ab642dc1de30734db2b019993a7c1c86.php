<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单详情</title>
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/My97DatePicker/WdatePicker.js" type="text/javascript"></script>
</head>

<body>

	<div class="place">
		<span>位置：</span>
		<ul class="placeul">
			<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
			<li><a href="<?php echo U(CONTROLLER_NAME.'/Index');?>">订单管理</a></li>
			<li>订单详情</li>
    		<li><a href="javascript:void()" onclick="javascript:history.back(-1);">返回列表页</a></li> 
		</ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
     
		<div id="tab1" class="tabson">
 	
	<div class="place">
    <ul class="placeul">
  	<li><b>订单状态</b></li>
    </ul>
    </div>
    <table class="tablelist">
	<tr>
		<td width="15%" align="right">订单号：</td>
		<td align="left"><?php echo ($v["orderid"]); ?></td>
	</tr>
	<tr>
		<td width="15%" align="right">总服务费：</td>
		<td align="left"><?php echo ($v["totalmoney"]); ?> 元</td>
	</tr>
	<tr>
		<td align="right">使用优惠券：</td>
		<td align="left"><?php echo ($v["couponmoney"]); ?> 元</td>
	</tr>
	<tr>
		<td align="right">订单状态：</td>
		<td align="left">未处理&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="right">出发城市：</td>
		<td align="left"><?php echo ($v["scity"]); ?></td>
	</tr>
	<tr>
		<td align="right">到达城市：</td>
		<td align="left"><?php echo ($v["ecity"]); ?></td>
	</tr>
	<tr>
		<td align="right">出发日期：</td>
		<td align="left"><?php echo ($v["cdate"]); ?></td>
	</tr>
 	<tr>
		<td align="right">指定车次：</td>
		<td align="left"><?php echo ($v["trips"]); ?></td>
	</tr>
 	<tr>
		<td align="right">坐席类型：</td>
		<td align="left"><?php echo ($v["agenttype"]); ?></td>
	</tr>
 	<tr>
		<td align="right">联系手机：</td>
		<td align="left"><?php echo ($v["tel"]); ?></td>
	</tr>
 	<tr>
		<td align="right">备用手机：</td>
		<td align="left"><?php echo ($v["baktel"]); ?></td>
	</tr>
 	<tr>
		<td align="right">微信：</td>
		<td align="left"><?php echo ($v["weixin"]); ?></td>
	</tr>
 	<tr>
		<td align="right">QQ：</td>
		<td align="left"><?php echo ($v["qq"]); ?></td>
	</tr>
 	<tr>
		<td align="right">12306账户：</td>
		<td align="left"><?php echo ($v["username"]); ?></td>
	</tr>
 	<tr>
		<td align="right">12306密码：</td>
		<td align="left"><?php echo ($v["userpwd"]); ?></td>
	</tr>
 	<tr>
		<td align="right">抢票备注：</td>
		<td align="left"><?php echo ($v["message"]); ?></td>
	</tr>
</table>
	
	<div class="clear"></div>		
	<div class="place">
    <ul class="placeul">
  	<li><b>乘客信息</b></li>
    </ul>
    </div>
    <table class="tablelist">
            <tr>
            <th width="25%" align="center">购票类型</th>
            <th width="25%" align="center">乘客姓名</th>
            <th width="25%" align="center">证件类型</th>
            <th width="25%" align="center">证件号码</th>
            </tr>
			<?php $_result=get_user_contact_list($v['passengerids']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($t["typename"]); ?></td>
			<td><?php echo ($t["realname"]); ?></td>
			<td><?php echo ($t["cardtype"]); ?></td>
			<td><?php echo ($t["cardcode"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       </table>
  	
 	<div class="clear"></div>	
	<div class="place">
    <ul class="placeul">
  	<li><b>订单价格</b></li>
    </ul>
    </div>
 	 
			 
  	<div class="clear"></div>	
      <table class="tablelist">
 		<tr>
		  <td colspan="5">
				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<form name="sofrm" method="post" action="<?php echo U(CONTROLLER_NAME.'/show');?>">
				<input type="hidden" name="orderid" value="<?php echo ($v["orderid"]); ?>">
				<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
  				  <tr class="listHeaderTr">
					<td height="60" style="text-align:left; padding-left:10px;">
<b>服务价：</b><input name="totalmoney" type="text" value="<?php echo ($v["totalmoney"]); ?>" class="dfinput" style="width:70px;"/>
<b>取票号：</b><input name="ticketnumber" type="text" value="<?php echo ($v["ticketnumber"]); ?>" class="dfinput" style="width:110px;"/>
<b>席别：</b><input name="seattype" type="text" value="<?php echo ($v["seattype"]); ?>" class="dfinput" style="width:150px;"/>
<b>乘车日期：</b><input name="cdate" type="text" value="<?php echo ($v["cdate"]); ?>" class="dfinput" style="width:90px;"/>
<b>乘车人：</b><input name="seatperson" type="text" value="<?php echo ($v["seatperson"]); ?>" class="dfinput" style="width:150px;"/>
<b>乘车区间：</b><input name="scity" type="text" value="<?php echo ($v["scity"]); ?>" class="dfinput" style="width:60px;"/>-<input name="ecity" type="text" value="<?php echo ($v["ecity"]); ?>" class="dfinput" style="width:60px;"/>
<b>座位号：</b><input name="seatnumber" type="text" value="<?php echo ($v["seatnumber"]); ?>" class="dfinput" style="width:150px;"/>
<b>付款状态：</b>
<select name="ispay">
<option value="">请选择</option>
<option value="0"<?php if($v['ispay'] == 0): ?>selected<?php endif; ?>>待支付</option>
<option value="1"<?php if($v['ispay'] == 1): ?>selected<?php endif; ?>>抢票中</option>
<option value="2"<?php if($v['ispay'] == 2): ?>selected<?php endif; ?>>已完成</option>
<option value="3"<?php if($v['ispay'] == 3): ?>selected<?php endif; ?>>已取消</option>
</select> 	 
<input name="update" type="submit" value=" 确定提交 " class="btn"> 
</td>
				  </tr>
			   </form>  
			   </table>		  
		  </td>
	    </tr>
	
	</table>
			 
			
    </div> 
       
	</div> 
    
</div>

</body>

</html>