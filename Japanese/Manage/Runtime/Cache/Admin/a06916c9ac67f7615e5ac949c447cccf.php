<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>院校加专业高考报考参数修改</title>
	<link href="<?php echo (ADMIN_PUBLIC); ?>/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo (ADMIN_PUBLIC); ?>/css/select.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js" type="text/javascript"></script>
	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/selectarea.js" type="text/javascript"></script>
	<style>
		/*报名信息填写*/
		.bmxxtxwp{background-color: #eef8f7; border: 1px solid #eeeeee; padding: 20px; margin-top: 12px;}
		.bmxxtxwp table{width: 100%}
		.bmxxtxwp table td{padding: 5px; width: 22%}
		.bmxkb{background: #fff; display: flex; justify-content: flex-start; align-items: center; line-height: 29px; border: 1px solid #eeeeee; font-size: 14px; color: #333}
		.bmxkb i{color: #f91717; display: inline-block; font-style: normal;}
		.bmxkb span{background: #cce7f0; display: inline-block; padding: 0 10px; white-space: nowrap;}
		.bmxktxt{line-height: 29px; width: 100%; border: none; padding: 0 5px; }
		.baxxsel{width: 70%; line-height: 29px; border: none; text-align: right;}
		.bamktar{height: 50px; width: 80%; border: none; resize: none; padding: 0 5px;}
		.bamxkco{line-height: 50px;}
		.lxtable th{font-size: 14px; color: #333; font-weight: 500; padding: 5px; background: #cce7f0; border: 1px solid #eeeeee;}
		.bmxxtxwp table.lxtable td{border: 1px solid #eeeeee; padding: 0; width: auto;}
		.bmxxtxwp table.lxtable td .bmxkb span{width: 100%;}
		.bmradio li{float: left; /*width: 10%;*/ margin:0 2%; text-align: center; cursor: pointer;}
		.bmradio{width: 80%}
		.bmxttj{font-size: 20px; color: #fff; background: #bc0707; border-radius: 3px; padding: 5px 30px;}
		.membelst{position:relative;}
		.clzm span{display: inline-block; padding: 0 10px; white-space: nowrap; font-size: 14px; color: #333}


		.perinfor .tp{ width:72px;text-align:center;position: relative; display: inline-block; vertical-align: top;}
		.perinfor .tp img{ width:72px; height:72px; }
		.perinfor .opa{
			width:100%;
			height:100%;
			position:absolute;
			top: 0;
			left: 0; }
		.perinfor .opa .btn1{
			cursor:pointer;
			width:100%;
			height:100%;
			position:absolute;
			top: 0;
			left: 0;
			z-index:6;
			filter:alpha(opacity=0);
			-moz-opacity:0;
			-khtml-opacity: 0;
			opacity: 0;
		}
		.bmxktxt.Wdate{border:none;}
		.mxgu{background: #fff; display: block; line-height: 29px; font-size: 14px; padding: 0 5px; color: #333}
		.mxgn{background: #fff; display: block; line-height: 29px; font-size: 14px; padding: 0 5px; color: #333}
		</style>
</head>

<body>

<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="<?php echo U('Admin/Index');?>" target="_top">首页</a></li>
		<li>申请入学</li>
		<li>报名信息</li>
	</ul>
</div>

<div class="formbody">


	<div class="bmxxtxwp">
		<table>
			<form action="/Admin-User-Show" method="post" name="form1" enctype="multipart/form-data" onsubmit="return check_write(this)">
				<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
				<tr>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 姓名:</span>
							<input type="text" name="xs_realname" value="<?php echo ($vs["xs_realname"]); ?>" class="bmxktxt">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 性别:</span>
							<select class="baxxsel gender" name="sex">
								<option value="男" <?php if($vs['sex']=='男') echo 'selected';?>>男</option>
								<option value="女" <?php if($vs['sex']=='女') echo 'selected';?>>女</option>
							</select>
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 民族:</span>
							<input type="text" name="mz" class="bmxktxt" value="<?php echo ($vs["mz"]); ?>">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 出生年月:</span>
							<input type="text" name="csrq" id="d4311" value="<?php echo ($vs["csrq"]); ?>" class="Wdate bmxktxt" placeholder="" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',})">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 国籍:</span>
							<input type="text" name="gj" class="bmxktxt" value="<?php echo ($vs["gj"]); ?>">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 证件类型:</span>
							<select class="baxxsel" name="zjlx">
								<option value="身份证" <?php if($vs['zjlx']=='身份证') echo 'selected';?>>身份证</option>
								<option value="户口簿" <?php if($vs['zjlx']=='户口簿') echo 'selected';?>>户口簿</option>
							</select>
						</div>
					</td>
					<td colspan="2">
						<div class="bmxkb">
							<span><i>*</i> 证件号码:</span>
							<input type="text" name="zjhm" class="bmxktxt" value="<?php echo ($vs["zjhm"]); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb bamxkco">
							<span><i>*</i> 家庭住址:</span>
							<textarea class="bamktar" name="jtzz"><?php echo ($vs["jtzz"]); ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 毕业学校全称:</span>
							<input type="text" name="byxx" class="bmxktxt" value="<?php echo ($vs["byxx"]); ?>">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span><i>*</i> 班级:</span>
							<input type="text" name="bj" class="bmxktxt" value="<?php echo ($vs["bj"]); ?>">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span>班主任:</span>
							<input type="text" name="bzr" class="bmxktxt" value="<?php echo ($vs["bzr"]); ?>">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<span>班主任联系方式：</span>
							<input type="text" name="bzrlxfs" class="bmxktxt" value="<?php echo ($vs["bzrlxfs"]); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="bmxkb">
							<span><i>*</i>毕业学校所在地：</span>
							<input type="text" name="city" class="bmxktxt" value="<?php echo ($vs["city"]); ?>">
						</div>
					</td>
					<td>
						<div class="bmxkb">
							<input type="text" name="area" class="bmxktxt" value="<?php echo ($vs["area"]); ?>" placeholder="区">
						</div>
					</td>
					<td colspan="2">
						<div class="bmxkb">
							<span>其他地区：</span>
							<input type="text" name="qtarea" class="bmxktxt" value="<?php echo ($vs["qtarea"]); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<table class="lxtable">
							<tr>
								<th>联系人</th>
								<th>姓名</th>
								<th>与学生关系</th>
								<th>文化程度</th>
								<th>工作单位</th>
								<th>职务名称</th>
								<th>工作单位地址</th>
								<th>联系电话</th>
							</tr>
							<tr>
								<td>
									<div class="bmxkb"><span><i>*</i>父亲</span></div>
								</td>
								<td><input type="text" name="fq_realname" value="<?php echo ($vs["fq_realname"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="fq_gx" value="<?php echo ($vs["fq_gx"]); ?>" class="bmxktxt mxgn"></td>
								<td><input type="text" name="fq_whcd" value="<?php echo ($vs["fq_whcd"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="fq_gzdw" value="<?php echo ($vs["fq_gzdw"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="fq_zwmc" value="<?php echo ($vs["fq_zwmc"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="fq_gzdwdz" value="<?php echo ($vs["fq_gzdwdz"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="fq_lxdh" value="<?php echo ($vs["fq_lxdh"]); ?>" class="bmxktxt"></td>
							</tr>
							<tr>
								<td>
									<div class="bmxkb"><span><i>*</i>母亲</span></div>
								</td>
								<td><input type="text" name="mq_realname" value="<?php echo ($vs["mq_realname"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="mq_gx" value="<?php echo ($vs["mq_gx"]); ?>" class="bmxktxt mxgu"></td>
								<td><input type="text" name="mq_whcd" value="<?php echo ($vs["mq_whcd"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="mq_gzdw" value="<?php echo ($vs["mq_gzdw"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="mq_zwmc" value="<?php echo ($vs["mq_zwmc"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="mq_gzdwdz" value="<?php echo ($vs["mq_gzdwdz"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="mq_lxdh" value="<?php echo ($vs["mq_lxdh"]); ?>" class="bmxktxt"></td>
							</tr>
							<tr>
								<td>
									<div class="bmxkb"><span>其他联系人</span></div>
								</td>
								<td><input type="text" name="qt_realname" value="<?php echo ($vs["qt_realname"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="qt_gx" value="<?php echo ($vs["qt_gx"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="qt_whcd" value="<?php echo ($vs["qt_whcd"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="qt_gzdw" value="<?php echo ($vs["qt_gzdw"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="qt_zwmc" value="<?php echo ($vs["qt_zwmc"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="qt_gzdwdz" value="<?php echo ($vs["qt_gzdwdz"]); ?>" class="bmxktxt"></td>
								<td><input type="text" name="qt_lxdh" value="<?php echo ($vs["qt_lxdh"]); ?>" class="bmxktxt"></td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="bmxkb">
										<span><i>*</i>优先联系人</span>
										<input type="text" name="yxlxr" value="<?php echo ($vs["yxlxr"]); ?>" class="bmxktxt">
									</div>
								</td>
								<td colspan="4">
									<div class="bmxkb">
										<span><i>*</i>主要监护人姓名</span>
										<input type="text" name="zyjhrxm" value="<?php echo ($vs["zyjhrxm"]); ?>" class="bmxktxt">
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb bamxkco">
							<span><i>*</i> 兴趣爱好:</span>
							<textarea class="bamktar" name="xqah"><?php echo ($vs["xqah"]); ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb">
							<span><i>*</i> 最擅长的学习方式</span>
							<ul class="bmradio clearfix">
								<li>
									<input type="radio" name="xxfs" value="听" class="inbk" <?php if($vs['xxfs']=='听') echo 'checked';?>>
									<label>听</label>
								</li>
								<li>
									<input type="radio" name="xxfs" value="读"  lass="inbk" <?php if($vs['xxfs']=='读') echo 'checked';?>>
									<label>读</label>
								</li>
								<li>
									<input type="radio" name="xxfs" value="写" class="inbk" <?php if($vs['xxfs']=='写') echo 'checked';?>>
									<label>写</label>
								</li>
								<li>
									<input type="radio" name="xxfs" value="讨论" class="inbk" <?php if($vs['xxfs']=='讨论') echo 'checked';?>>
									<label>讨论</label>
								</li>
								<li>
									<input type="radio" name="xxfs" value="体验" class="inbk" <?php if($vs['xxfs']=='体验') echo 'checked';?>>
									<label>体验</label>
								</li>
							</ul>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb bamxkco">
							<span>特长及其水平</span>
							<textarea class="bamktar" name="tc"><?php echo ($vs["tc"]); ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb bamxkco">
							<span>获奖情况</span>
							<textarea class="bamktar" name="hj"><?php echo ($vs["hj"]); ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="clzm perinfor">
							<span>上传证明材料:</span>
							<div class="tp">
								<img id="img1" src="<?php echo ($vs["img1"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img1" onchange="PreviewImage(this,'img1','divPreview1')">
								</div>
							</div>
							<div class="tp">
								<img id="img2" src="<?php echo ($vs["img2"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img2" onchange="PreviewImage(this,'img2','divPreview2')">
								</div>
							</div>
							<div class="tp">
								<img id="img3" src="<?php echo ($vs["img3"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img3" onchange="PreviewImage(this,'img3','divPreview3')">
								</div>
							</div>
							<div class="tp">
								<img id="img4" src="<?php echo ($vs["img4"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img4" onchange="PreviewImage(this,'img4','divPreview4')">
								</div>
							</div>
							<div class="tp">
								<img id="img5" src="<?php echo ($vs["img5"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img5" onchange="PreviewImage(this,'img5','divPreview5')">
								</div>
							</div>
							<div class="tp">
								<img id="img6" src="<?php echo ($vs["img6"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img6" onchange="PreviewImage(this,'img6','divPreview6')">
								</div>
							</div>
							<div class="tp">
								<img id="img7" src="<?php echo ($vs["img7"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img7" onchange="PreviewImage(this,'img7','divPreview7')">
								</div>
							</div>
							<div class="tp">
								<img id="img8" src="<?php echo ($vs["img8"]); ?>">
								<div class="opa">
									<input class="wfile btn1" type="file" name="img8" onchange="PreviewImage(this,'img8','divPreview8')">
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb">
							<span><i>*</i> 您是通过何种渠道获知我校信息</span>
							<ul class="bmradio clearfix">
								<li>
									<input type="radio" name="qd" value="微信公众号" class="inbk" <?php if($vs['qd']=='微信公众号') echo 'checked';?>>
									<label>微信公众号</label>
								</li>
								<li>
									<input type="radio" name="qd" value="线下广告" class="inbk" <?php if($vs['qd']=='线下广告') echo 'checked';?>>
									<label>线下广告</label>
								</li>
								<li>
									<input type="radio" name="qd" value="老师推荐" class="inbk" <?php if($vs['qd']=='老师推荐') echo 'checked';?>>
									<label>老师推荐</label>
								</li>
								<li>
									<input type="radio" name="qd" value="通过网络广告" class="inbk" <?php if($vs['qd']=='通过网络广告') echo 'checked';?>>
									<label>通过网络广告</label>
								</li>
								<li>
									<input type="radio" name="qd" value="通过朋友介绍" class="inbk" <?php if($vs['qd']=='通过朋友介绍') echo 'checked';?>>
									<label>通过朋友介绍</label>
								</li>
								<li>
									<input type="radio" name="qd" value="其他" class="inbk" <?php if($vs['qd']=='其他') echo 'checked';?>>
									<label>其他</label>
								</li>
							</ul>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb bamxkco">
							<span><i>*</i>您在为孩子选择学校时最关心哪些方面:</span>
							<textarea class="bamktar" name="gx"><?php echo ($vs["gx"]); ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="bmxkb bamxkco">
							<span>备注:</span>
							<textarea class="bamktar" name="bz"><?php echo ($vs["bz"]); ?></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="tc">
						<button class="bmxttj">修改</button>
					</td>
				</tr>
			</form>
		</table>
	</div>

</div>

</body>

</html>