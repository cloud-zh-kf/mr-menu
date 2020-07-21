<?php if (!defined('THINK_PATH')) exit(); $Custitle="填写报名表"?>
<?php
$PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']); $PHP_URL=basename($PHP_SELF); $PHP_URL=str_replace("index.php","",$PHP_URL); cookie('whj','cn'); $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); if (preg_match("/en/i", $lang)){ header("location:/en.php/{$PHP_URL}"); exit(); } $id=I('request.id',0); $pid=I('request.pid',0); $ty=I('request.ty',0); $tty=I('request.tty',0); $ttty=I('request.ttty',0); if($id){ $bd=M('news')->field("pid,ty,title,seotitle,seokeywords,seodescription")->where("status=1 AND id={$id}")->find(); if($bd){ $id=$id; $vpid=$bd['pid']; cookie('vpid',$vpid,62400); $vty=$bd['ty']; $vtty=$bd['tty']; $vttty=$bd['ttty']; $Title=$bd['title']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($pid&&$id==0){ if($ty) $zid=$ty; else $zid=$pid; $bd=M('sort')->field("catname,seotitle,seokeywords,img1,seodescription")->where("status=1 AND id={$zid}")->find(); if($bd){ if($pid) $vpid=$pid; if($ty) $vty=$ty;else $vty=$zid; $banner_img=$bd['img1']; $Title=$bd['catname']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($id==0){ $vpid=0; $Seotitle=sys('sys_seotitle'); $Seokeywords=sys('sys_seokeywords'); $Seodescription=sys('sys_seodescription'); } if($Custitle){ $Seotitle=$Custitle; }else{ if($Title) $Seotitle="{$Title}_";elseif($Seotitle) $Seotitle="{$Seotitle}_";else $Seotitle=""; } $ua = strtolower($_SERVER['HTTP_USER_AGENT']); $uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i"; if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap')){ echo "<script>window.location.href = \"/Wap.php\"</script>"; exit(); } ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo ($Seotitle); ?>_<?php echo sys('sys_sitename');?></title>
    <meta name="keywords" content="<?php echo ($Seokeywords); ?>" />
    <meta name="description" content="<?php echo ($Seodescription); ?>" />
    <meta name="renderer" content="webkit">
    <meta name ="viewport" content ="initial-scale=1, maximum-scale=3, minimum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="format-detection" content="telephone=no"/>
    <!-- <link rel="shortcut icon" href="images/icon/favicon.ico"> -->
    <link rel="stylesheet" href="css/lib.css"/>
    <link rel="stylesheet" href="css/slick.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="swiper/swiper.min.css"/>
    <link rel="stylesheet" href="css/style-rel.css" />
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/lib.js"></script>
    <script type="text/javascript" src="js/checkform.js"></script>
    <!--[if IE]>
    <script src="js/html5.js"></script>
    <script src="js/respond.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/selectarea.js"></script>
 
</head>
<body>
<div class="header_nav <?php if(CONTROLLER_NAME == 'User'): ?>menhebg<?php endif; ?>">
    <header class="header" id="header">
        <div class="loarea">
            <div class="wp clearfix">
                <a href="/" class="logo fl">
                    <img class="logimg" src="<?php echo sys('sys_img1');?>"/>
                    <img class="logfix" src="<?php echo sys('sys_img2');?>"/>
                </a>
                <!--PC nav -->
                <div class="fr hearfr">
                    <nav class="nav fl">
                        <ul class="navul">
                            <li>
                                <a href="/List-Public-pid-1.html" <?php echo get_cur(1,'class="act_nav"');?>>关于我们</a>
                                <div class="subnav">
                                    <dl class="clearfix">
                                        <?php $_result=get_sort_list(1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd <?php if($v['id']==$vty) echo 'class="on"';?>><a href="<?php echo get_sort_url($v['pid'],$v['id'],$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?></dd>
                                    </dl>
                                </div>
                            </li>
                            <li><a href="<?php echo get_nav_url(2,13);?>" <?php echo get_cur(2,'class="act_nav"');?>>创新体系</a></li>
                            <li><a href="<?php echo get_nav_url(3,15);?>" <?php echo get_cur(3,'class="act_nav"');?>>校园生活</a>
                                <div class="subnav">
                                    <dl class="clearfix">
                                        <dd <?php if($vty==15) echo 'class="on"';?>><a href="<?php echo get_nav_url(3,15);?>">校园风采</a></dd>
                                    </dl>
                                </div>

                            </li>
                            <li>
                                <a href="/List-Public-pid-4.html" <?php echo get_cur(4,'class="act_nav"');?>>最新动态</a>
                                <div class="subnav">
                                    <dl class="clearfix">
                                        <?php $_result=get_sort_list(4,10,0);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd <?php if($v['id']==$vty) echo 'class="on"';?>><a href="<?php echo get_sort_url($v['pid'],$v['id'],$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?></dd>
                                    </dl>
                                </div>
                            </li>
                            <li><a href="<?php echo get_nav_url(5,19);?>" <?php echo get_cur(5,'class="act_nav"');?>>申请入学 </a></li>
                            <li><a href="<?php echo get_nav_url(6,0);?>" <?php echo get_cur(6,'class="act_nav"');?>>加入我们</a></li>
                        </ul>
                    </nav>
                    <div class="serchbox fl">
                        <div class="serbtn">
                            <img class="logimg" src="images/serch.png"/>
                            <img class="logfix" src="images/seb.png"/>
                        </div>
                        <div class="search clearfix">
                            <form action="<?php echo U('List/Search');?>" method="get" name="formlists" onsubmit="return check_search(this)">
                                <input type="hidden" name="pid" value="4">
                            <input type="text" name="q" value="<?php echo ($_GET['q']); ?>" placeholder="请输入要检索的内容" class="fl seartxt">
                            <button class="seabtn fr">搜索</button>
                            </form>
                        </div>
                    </div>
                    <div class="inloginbxo fr">
                        <?php if(cookie('user_id')){?>
                        <a href="<?php echo U('User/My');?>"><?php echo cookie('user_name')?></a>
                        <?php }else{?>
                        <a href="/User-Login-pid-5-ty-19.html">登录</a>
                        <?php }?>
                        <i>|</i>
                        <a href="">EN</a>
                    </div>
                </div>

            </div>
        </div>
    </header>
</div>
<?php if($vpid==0&&empty($Custitle)){?>
<!--banner begin-->
<div class="swiper-container banner">
    <div class="swiper-wrapper">
        <?php $_result=get_news(7,25,0,0,'*',3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
            <div class="banimgarea">
                <img src="<?php echo get_img($v['img1']);?>" class="banimg"  alt="<?php echo ($v["title"]); ?>" />
                <div class="bantxt">
                    <img src="images/bantxt.png">
                    <p><?php echo nl2br($v['introduce']);?></p>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!-- 如果需要分页器 -->
    <div class="swiper-pagination"></div>
    <!-- 如果需要导航按钮 -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
<!--banner end-->
<?php }else{ $tmp_pid=I('get.pid',0); $tmp_ty=I('get.ty',0); if($tmp_pid&&$tmp_ty) $myids=$tmp_ty;if($tmp_pid&&$tmp_ty==0) $myids=$tmp_pid; ?>
<div class="nrban">
    <img src="<?php echo get_sort_zd($myids,'img1');?>">
    <div class="nrbanbox">
        <h3><?php echo get_sort_zd($myids);?></h3>
        <i></i>
        <p><?php echo get_sort_zd($myids,'seodescription');?></p>
    </div>
</div>
<?php }?>
<script type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="My97DatePicker/calendar.js"></script>

<div class="wp">
      <div class="clearfix membelst">
          <div class="memberfl fl">
    <div class="membertit"><?php echo cookie('user_name')?></div>
    <div class="menbernav">
        <a href="<?php echo U('User/Write');?>" <?php if(ACTION_NAME == 'Write'): ?>class="on"<?php endif; ?>><span class="bib">填写报名表</span></a>
        <a href="<?php echo U('User/My');?>" <?php if(ACTION_NAME == 'My'): ?>class="on"<?php endif; ?>><span class="bmx">我的报名信息</span></a>
        <a href="<?php echo U('User/Uppwd');?>" <?php if(ACTION_NAME == 'Uppwd'): ?>class="on"<?php endif; ?>><span class="pas">修改密码</span></a>
        <a href="<?php echo U('User/Logout');?>"><span class="ttu">退出</span></a>
    </div>
</div>
           <div class="memberfr fl">
                <div class="membfrtit">申请入学信息表<span>请完善您的报名信息，提高录取成功率</span></div>
                <div class="bmxxtxwp">
                     <table>
                         <form action="/Home-User-Write" method="post" name="form1" enctype="multipart/form-data" onsubmit="return check_write(this)">
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
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                    <span><i>*</i> 民族:</span>
                                    <input type="text" name="mz" class="bmxktxt">
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                    <span><i>*</i> 出生年月:</span>
                                    <input type="text" name="csrq" id="d4311" class="Wdate bmxktxt" placeholder="" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',})">
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td>
                               <div class="bmxkb">
                                    <span><i>*</i> 国籍:</span>
                                    <input type="text" name="gj" class="bmxktxt">
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                    <span><i>*</i> 证件类型:</span>
                                    <select class="baxxsel" name="zjlx">
                                        <option value="身份证">身份证</option>
                                        <option value="户口簿">户口簿</option>
                                    </select>
                               </div>
                            </td>
                            <td colspan="2">
                               <div class="bmxkb">
                                    <span><i>*</i> 证件号码:</span>
                                    <input type="text" name="zjhm" class="bmxktxt">
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td colspan="4">
                               <div class="bmxkb bamxkco">
                                    <span><i>*</i> 家庭住址:</span>
                                    <textarea class="bamktar" name="jtzz"></textarea>
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td>
                               <div class="bmxkb">
                                    <span><i>*</i> 毕业学校全称:</span>
                                    <input type="text" name="byxx" class="bmxktxt" value="<?php echo ($vs["school"]); ?>">
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                    <span><i>*</i> 班级:</span>
                                    <input type="text" name="bj" class="bmxktxt">
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                    <span>班主任:</span>
                                    <input type="text" name="bzr" class="bmxktxt">
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                    <span>班主任联系方式：</span>
                                    <input type="text" name="bzrlxfs" class="bmxktxt">
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td>
                                <div class="bmxkb">
                                    <span><i>*</i>毕业学校所在地：</span>
                                    <input type="text" name="city" class="bmxktxt" value="阜阳市">
                               </div>
                            </td>
                            <td>
                               <div class="bmxkb">
                                   <input type="text" name="area" class="bmxktxt" value="" placeholder="区">
                               </div>
                            </td>
                            <td colspan="2">
                                <div class="bmxkb">
                                    <span>其他地区：</span>
                                    <input type="text" name="qtarea" class="bmxktxt">
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
                                       <td><input type="text" name="fq_gx" value="父子" class="bmxktxt mxgn"></td>
                                       <td><input type="text" name="fq_whcd" class="bmxktxt"></td>
                                       <td><input type="text" name="fq_gzdw" class="bmxktxt"></td>
                                       <td><input type="text" name="fq_zwmc" class="bmxktxt"></td>
                                       <td><input type="text" name="fq_gzdwdz" class="bmxktxt"></td>
                                       <td><input type="text" name="fq_lxdh" value="<?php echo ($vs["fq_tel"]); ?>" class="bmxktxt"></td>
                                    </tr>
                                    <tr>
                                       <td>
                                           <div class="bmxkb"><span><i>*</i>母亲</span></div>
                                       </td>
                                       <td><input type="text" name="mq_realname" value="<?php echo ($vs["mq_realname"]); ?>" class="bmxktxt"></td>
                                       <td><input type="text" name="mq_gx" value="母子" class="bmxktxt mxgu"></td>
                                       <td><input type="text" name="mq_whcd" class="bmxktxt"></td>
                                       <td><input type="text" name="mq_gzdw" class="bmxktxt"></td>
                                       <td><input type="text" name="mq_zwmc" class="bmxktxt"></td>
                                       <td><input type="text" name="mq_gzdwdz" class="bmxktxt"></td>
                                       <td><input type="text" name="mq_lxdh" value="<?php echo ($vs["mq_tel"]); ?>" class="bmxktxt"></td>
                                    </tr>
                                    <tr>
                                       <td>
                                           <div class="bmxkb"><span>其他联系人</span></div>
                                       </td>
                                       <td><input type="text" name="qt_realname" class="bmxktxt"></td>
                                       <td><input type="text" name="qt_gx" class="bmxktxt"></td>
                                       <td><input type="text" name="qt_whcd" class="bmxktxt"></td>
                                       <td><input type="text" name="qt_gzdw" class="bmxktxt"></td>
                                       <td><input type="text" name="qt_zwmc" class="bmxktxt"></td>
                                       <td><input type="text" name="qt_gzdwdz" class="bmxktxt"></td>
                                       <td><input type="text" name="qt_lxdh" class="bmxktxt"></td>
                                    </tr>
                                    <tr>
                                       <td colspan="4">
                                           <div class="bmxkb">
                                                <span><i>*</i>优先联系人</span>
                                                <input type="text" name="yxlxr" class="bmxktxt">
                                           </div>
                                       </td>
                                       <td colspan="4">
                                           <div class="bmxkb">
                                                <span><i>*</i>主要监护人姓名</span>
                                                <input type="text" name="zyjhrxm" class="bmxktxt">
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
                                    <textarea class="bamktar" name="xqah"></textarea>
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td colspan="4">
                               <div class="bmxkb">
                                    <span><i>*</i> 最擅长的学习方式</span>
                                    <ul class="bmradio clearfix">
                                        <li>
                                           <input type="radio" name="xxfs" value="听" class="inbk">
                                           <label>听</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="xxfs" value="读" lass="inbk">
                                           <label>读</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="xxfs" value="写" class="inbk">
                                           <label>写</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="xxfs" value="讨论" class="inbk">
                                           <label>讨论</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="xxfs" value="体验" class="inbk">
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
                                    <textarea class="bamktar" name="tc"></textarea>
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td colspan="4">
                               <div class="bmxkb bamxkco">
                                    <span>获奖情况</span>
                                    <textarea class="bamktar" name="hj"></textarea>
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td colspan="4">
                               <div class="clzm perinfor">
                                    <span>上传证明材料:</span>
                                    <div class="tp">
                                         <img id="img1" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img1" onchange="PreviewImage(this,'img1','divPreview1')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img2" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img2" onchange="PreviewImage(this,'img2','divPreview2')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img3" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img3" onchange="PreviewImage(this,'img3','divPreview3')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img4" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img4" onchange="PreviewImage(this,'img4','divPreview4')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img5" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img5" onchange="PreviewImage(this,'img5','divPreview5')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img6" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img6" onchange="PreviewImage(this,'img6','divPreview6')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img7" src="images/clzm.jpg">
                                         <div class="opa">
                                              <input class="wfile btn1" type="file" name="img7" onchange="PreviewImage(this,'img7','divPreview7')">
                                         </div>
                                    </div>
                                    <div class="tp">
                                         <img id="img8" src="images/clzm.jpg">
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
                                           <input type="radio" name="qd" value="微信公众号" class="inbk">
                                           <label>微信公众号</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="qd" value="线下广告" class="inbk">
                                           <label>线下广告</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="qd" value="老师推荐" class="inbk">
                                           <label>老师推荐</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="qd" value="通过网络广告" class="inbk">
                                           <label>通过网络广告</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="qd" value="通过朋友介绍" class="inbk">
                                           <label>通过朋友介绍</label>
                                        </li>
                                        <li>
                                           <input type="radio" name="qd" value="其他" class="inbk">
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
                                    <textarea class="bamktar" name="gx"></textarea>
                               </div>
                            </td>
                         </tr>
                         <tr>
                            <td colspan="4">
                               <div class="bmxkb bamxkco">
                                    <span>备注:</span>
                                    <textarea class="bamktar" name="bz"></textarea>
                               </div>
                            </td>
                         </tr>
                             <?php if(empty($vs['xs_realname'])){?>
                         <tr>
                            <td colspan="4" class="tc">
                                <button class="bmxttj">提交</button>
                            </td>
                         </tr>
                             <?php }?>
                         </form>
                     </table>
                </div>
           </div>
      </div>
</div>

<!-- 报名提示 -->
<div class="pup-box" id="account_bmts">
     <div class="pup-cell">
          <div class="bmtsbox">
               <div class="bmtsTop">学生身体健康情况告知书</div>
               <div class="bmtsCon">
                    <div class="bmtsbt">您好！为了您孩子的健康，为了所有孩子的健康，请您看<br/>看您的孩子是否有以下情况。</div>
                    <div class="bmtstab">
                         <table>
                             <tr>
                                <th>
                                   <div class="bmsf">是否有下列不适应寄宿的疾病</div>
                                </th>
                             </tr>
                             <tr>
                                <td>
                                   <ul class="clearfix bmxzz">
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>癫痫病</label>
                                      </li>
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>先天性心脏病</label>
                                      </li>
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>哮喘</label>
                                      </li>
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>高血压</label>
                                      </li>
                                   </ul>
                                </td>
                             </tr>
                             <tr>
                                <td>
                                   <ul class="clearfix bmxzz">
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>肝炎</label>
                                      </li>
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>夜游症状</label>
                                      </li>
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>患有传染病者</label>
                                      </li>
                                   </ul>
                                </td>
                             </tr>
                             <tr>
                                <td>
                                   <ul class="clearfix bmxzz">
                                      <li>
                                         <input type="radio" name="" checked>
                                         <label>其它不适应寄宿生活的疾病和心理问题</label>
                                      </li>
                                   </ul>
                                </td>
                             </tr>
                         </table>
                    </div>
                    <div class="bmtsbot">
                        如有既往病史，请直接告诉我们招生老师，以便判断您的孩子是否适合就读寄宿学校。<br/><br/>
                        为了您的孩子和他人的健康，学生入学后，学校将统一核查学生身体健康情况。如发现您的孩子有不适宜寄宿的疾病等，请您给您的孩子办理转学，谢谢合作！
                    </div>

                    <div class="tc"><span class="rety-close">我知道了</span></div>



               </div>
          </div>
     </div>
</div>
<!--pc footer-->
<!-- 咨询电话 -->
<div class="zxphone"><b>咨询电话：<?php echo sys('sys_phone');?></b></div>
<div class="footer">
	<div class="wp">
		<div class="footerTop clearfix">
			<div class="f_l fl">
				<img class="f_logo" src="<?php echo sys('sys_img3');?>" />
			</div>
			<div class="f_m fl">
				<h3>联系我们</h3>
				<p><img src="images/foot01.png">电话：<?php echo sys('sys_phone');?></p>
				<p><img src="images/foot02.png">邮箱：<?php echo sys('sys_email');?></p>
				<p><img src="images/foot03.png">地址：<?php echo sys('sys_address');?></p>
			</div>
			<div class="f_r fr">
				<ul class="codeul clearfix">
					<li>
						<img src="<?php echo sys('sys_img4');?>"/>
						<p>扫一扫，加我微信</p>
					</li>
					<li>
						<img src="<?php echo sys('sys_img5');?>" />
						<p>扫一扫，加我微信</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="footerBot">
			<div class="fyq">
				<span>关联学校:  </span>
				<?php $_result=get_news(7,26,0,0,'*',20);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["linkurl"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="copy"><?php echo sys('sys_copyright');?></div>
		</div>
	</div>
</div>
<a href="<?php echo get_nav_url(5,19);?>" target="_bank" class="zxbm"><img src="images/zxbm.png"></a>
<link rel="stylesheet" href="css/animate.min.css" />
<script type="text/javascript" src="js/wow.min.js"></script>
<script src="js/slick.js"></script>
<script type="text/javascript" src="swiper/swiper.min.js"></script>
<script type="text/javascript" src="swiper/swiper.animate.min.js"></script>
<script src="js/js.js"></script>
</body>
</html>