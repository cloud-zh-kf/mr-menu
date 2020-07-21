<?php if (!defined('THINK_PATH')) exit(); $PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']); $PHP_URL=basename($PHP_SELF); $PHP_URL=str_replace("index.php","",$PHP_URL); cookie('whj','cn'); $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); if (preg_match("/en/i", $lang)){ header("location:/en.php/{$PHP_URL}"); exit(); } $id=I('request.id',0); $pid=I('request.pid',0); $ty=I('request.ty',0); $tty=I('request.tty',0); $ttty=I('request.ttty',0); if($id){ $bd=M('news')->field("pid,ty,title,seotitle,seokeywords,seodescription")->where("status=1 AND id={$id}")->find(); if($bd){ $id=$id; $vpid=$bd['pid']; cookie('vpid',$vpid,62400); $vty=$bd['ty']; $vtty=$bd['tty']; $vttty=$bd['ttty']; $Title=$bd['title']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($pid&&$id==0){ if($ty) $zid=$ty; else $zid=$pid; $bd=M('sort')->field("catname,seotitle,seokeywords,img1,seodescription")->where("status=1 AND id={$zid}")->find(); if($bd){ if($pid) $vpid=$pid; if($ty) $vty=$ty;else $vty=$zid; $banner_img=$bd['img1']; $Title=$bd['catname']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($id==0){ $vpid=0; $Seotitle=sys('sys_seotitle'); $Seokeywords=sys('sys_seokeywords'); $Seodescription=sys('sys_seodescription'); } if($Custitle){ $Seotitle=$Custitle; }else{ if($Title) $Seotitle="{$Title}_";elseif($Seotitle) $Seotitle="{$Seotitle}_";else $Seotitle=""; } $ua = strtolower($_SERVER['HTTP_USER_AGENT']); $uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i"; if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap')){ echo "<script>window.location.href = \"/Wap.php\"</script>"; exit(); } ?>

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
	<script>
        function displayWindowSize(){
            // 获取窗口的宽度和高度，不包括滚动条
            var w = document.documentElement.clientWidth;
            if(w<=1024){
                location.href='/Wap.php';
            }
        }
        // 将事件侦听器函数附加到窗口的resize事件
        window.addEventListener("resize", displayWindowSize);
        displayWindowSize();
    </script>
 
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
                                        <?php $_result=get_sort_list(1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd <?php if($v['id']==$vty) echo 'class="on"';?>>
                                                <a href="<?php echo get_sort_url($v['pid'],$v['id'],$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a>
                                                <div class="thtena">
                                                    <?php $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_urls($v['pid'],$v1['pid'],$v1['id'],$v1['linkurl']);?>"><?php echo ($v1["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </dl>
                                </div>
                            </li>
                            <li><a href="<?php echo get_nav_url(2,13);?>" <?php echo get_cur(2,'class="act_nav"');?>>创新体系</a>
                                <div class="subnav">
                                    <dl class="clearfix">
                                        <?php $_result=get_sort_list(2);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd <?php if($v['id']==$vty) echo 'class="on"';?>>
                                            <a href="<?php echo get_sort_url($v['pid'],$v['id'],$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a>
                                            <div class="thtena">
                                                <?php $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_urls($v['pid'],$v1['pid'],$v1['id'],$v1['linkurl']);?>"><?php echo ($v1["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </dl>
                                </div>
                            </li>
                            <li><a href="<?php echo get_nav_url(3,34);?>" <?php echo get_cur(3,'class="act_nav"');?>>校园生活</a>
                                <div class="subnav">
                                    <dl class="clearfix">
                                        <?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd <?php if($v['id']==$vty) echo 'class="on"';?>>
                                            <a href="<?php echo get_sort_url($v['pid'],$v['id'],$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a>
                                            <div class="thtena">
                                                <?php $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_urls($v['pid'],$v1['pid'],$v1['id'],$v1['linkurl']);?>"><?php echo ($v1["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </dl>
                                </div>
                            </li>
                            <li>
                                <a href="/List-Public-pid-4.html" <?php echo get_cur(4,'class="act_nav"');?>>最新动态</a>
                                <div class="subnav">
                                    <dl class="clearfix">
                                        <?php $_result=get_sort_list(4);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd <?php if($v['id']==$vty) echo 'class="on"';?>>
                                            <a href="<?php echo get_sort_url($v['pid'],$v['id'],$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a>
                                            <div class="thtena">
                                                <?php $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_urls($v['pid'],$v1['pid'],$v1['id'],$v1['linkurl']);?>"><?php echo ($v1["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            </dd><?php endforeach; endif; else: echo "" ;endif; ?>
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
        <?php $_result=get_news(7,25,0,0,'*',1000);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
            <div class="banimgarea">
                <img src="<?php echo get_img($v['img1']);?>" class="banimg"  alt="<?php echo ($v["title"]); ?>" />
                <div class="bantxt">
                    <img src="<?php echo get_img($v['img3']);?>">
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
<?php }else{ if($vpid&&$vty&&$vtty) $myids=$vtty;elseif($vpid&&$vty&&$vtty==0) $myids=$vty;if($vpid&&$vty==0&&$vtty==0) $myids=$vpid; ?>
<div class="nrban">
    <img src="<?php echo get_sort_zd($myids,'img1');?>">
    <div class="nrbanbox">
        <h3><?php echo get_sort_zd($myids);?></h3>
        <i></i>
        <p><?php echo get_sort_zd($myids,'seodescription');?></p>
    </div>
</div>
<?php }?>
<!-- 学术委员会 -->
<div class="wp">
    <div class="curtbox">
    <img src="images/cutr.png">您的位置：
    <a href="/">首页</a> >
    <a href="<?php echo get_nav_url($vpid,0);?>"><?php echo get_sort_zd($vpid);?></a> >
    <?php if($vty){?><a href="<?php echo get_nav_url($vpid,$vty);?>" class="on"> <?php echo get_sort_zd($vty);?></a><?php }?>
</div>
</div>
<div class="cxjb">
    <?php $_result=get_news(7,14,0,0,'*',1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="wp">
            <?php echo get_html($v['content']);?>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="wp">
    <div class="campusTop">
         <ul class="clearfix">
             <?php $_result=get_news(7,15,0,0,'id,title',5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if($i==1) echo 'class="on"';?>><?php echo ($v["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
    </div>
</div>
<div class="campusBot">
     <div class="wp">

          <?php $_result=get_news(7,15,0,0,'*',5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="campuscon <?php if($i==1) echo 'on';?>">
               <h3><?php echo ($v["title"]); ?></h3>
               <p><br/><?php echo get_html($v['content']);?></p>
               <ul class="clearfix">
                  <li class="boxW">
                     <div class="imgW inbk"><img src="images/campus01.png" class="img" width="118" height="118"></div>
                     <div class="inbk mlW">
                          <h3><span><?php echo ($v["tags"]); ?></span>M <i>2</i></h3>
                          <p>占地面积</p>
                     </div>
                  </li>
                  <li class="boxW">
                     <div class="imgW inbk"><img src="images/campus02.png" class="img" width="118" height="118"></div>
                     <div class="inbk mlW">
                          <h3><span><?php echo ($v["source"]); ?></span>M <i>2</i></h3>
                          <p>建筑面积</p>
                     </div>
                  </li>
                  <li class="boxW">
                     <div class="imgW inbk"><img src="images/campus03.png" class="img" width="118" height="118"></div>
                     <div class="inbk mlW">
                          <h3><span><?php echo ($v["author"]); ?></span>间</h3>
                          <p>教育配套设施</p>
                     </div>
                  </li>
               </ul>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
</div>
<!--  -->
<div class="camup newsmain">
     <ul class="clearfix">
        <?php $_result=get_news(3,34,0,0,'id,title,img1',8);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
           <a>
              <img src="<?php echo get_img($v['img1']);?>" alt="<?php echo ($v["title"]); ?>">
              <p><?php echo ($v["tags"]); ?></p>
           </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
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