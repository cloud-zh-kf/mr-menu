<?php if (!defined('THINK_PATH')) exit(); $PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']); $PHP_URL=basename($PHP_SELF); $id=I('request.id',0); $pid=I('request.pid',0); $ty=I('request.ty',0); $tty=I('request.tty',0); $ttty=I('request.ttty',0); if($id){ $bd=M('news')->field("pid,ty,tty,ttty,title,seotitle,seokeywords,seodescription")->where("status=1 AND id={$id}")->find(); if($bd){ $id=$id; $case=$bd['pid']; $vpid=$bd['pid']; cookie('vpid',$vpid,62400); $vty=$bd['ty']; $vtty=$bd['tty']; $vttty=$bd['ttty']; $Title=$bd['title']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($pid&&$id==0){ if($ty) $zid=$ty; else $zid=get_nextid($pid); $vtty=$tty; $vttty=$ttty; $bd=M('sort')->field("catname,seotitle,seokeywords,img1,seodescription")->where("status=1 AND id={$zid}")->find(); if($bd){ if($pid) $vpid=$pid; if($ty) $vty=$ty;else $vty=$zid; $banner_img=$bd['img1']; $Title=$bd['catname']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($id==0){ $vpid=0; $Seotitle=sys('sys_seotitle'); $Seokeywords=sys('sys_seokeywords'); $Seodescription=sys('sys_seodescription'); } if($Custitle){ $Seotitle=$Custitle; }else{ if($Title) $Seotitle="{$Title}_";elseif($Seotitle) $Seotitle="{$Seotitle}_";else $Seotitle=""; } ?>



 <!doctype html>
<html>

<head>
     <meta charset="utf-8">
     <title><?php echo ($Seotitle); ?>_<?php echo sys('sys_sitename');?></title>
     <meta name="keywords" content="<?php echo ($Seokeywords); ?>" />
     <meta name="description" content="<?php echo ($Seodescription); ?>" />
     <meta name="renderer" content="webkit">
     <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <meta name="msapplication-tap-highlight" content="no">
     <meta name="format-detection" content="telephone=no" />
     <link rel="shortcut icon" href="images/icon/favicon.ico">
     <link rel="stylesheet" href="css/cui.css" />
     <link rel="stylesheet" href="css/lib.css" />
     <link rel="stylesheet" href="font/iconfont.css" />
     <link rel="stylesheet" href="css/style.css" />
     <link rel="stylesheet" type="text/css" href="swiper/swiper5.css" />
     <link rel="stylesheet" href="css/style-rel.css" />
     <script src="js/jquery.js"></script>
     <script type="text/javascript" src="js/lib.js"></script>
     <script src="js/placeholderfriend.js"></script>
     <!--[if IE]>
    <script src="js/html5.js"></script>
    <script src="js/respond.js"></script>
<![endif]-->
</head>

<body>
     <?php if($vpid == 0 || $case == 3): ?><div class="ban_header">
          <div id="mainMenuBarAnchor"></div>
          <div id="mainMenuBar" class="header_nav"><?php endif; ?>

          <!--头部-->
          <?php if($vpid == 0 || $case == 3): ?><header class="header">
          <?php else: ?>
              <header class="header iheader"><?php endif; ?>
                  <div class="loarea">
                       <div class="wp clearfix">
                            <a class="logo"><img src="<?php echo sys('sys_img1');?>" /></a>
                            <!--PC nav -->
                            <nav class="nav">
                                 <ul class="wp navul">
                                      <li><a <?php echo empty($vpid) ? 'class="act_nav"':''; ?> href="/">首页</a></li>
                                      <li><a <?php echo $vpid==1 ? 'class="act_nav"':''; ?> href="<?php echo get_nav_url(1);?>"><?php echo get_sort_zd(1);?></a></li>
                                      <li><a <?php echo $vpid==2 ? 'class="act_nav"':''; ?> href="<?php echo get_nav_url(2);?>"><?php echo get_sort_zd(2);?></a></li>
                                      <li><a <?php echo $vpid==3 ? 'class="act_nav"':''; ?> href="javascript:;"><?php echo get_sort_zd(3);?> <i class="iconfont icon-down2"></i></a>
                                           <div class="subnav">
                                                <div class="nr">
                                                     <?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                                     <!-- <a href="#">日本案例</a> -->
                                                </div>
                                            </div>
                                      </li>
                                      <li><a href="javascript:;"><?php echo get_sort_zd(4);?> <i class="iconfont icon-down2"></i></a>
                                           <div class="subnav">
                                                <div class="nr">
                                                     <?php $_result=get_sort_list(4);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </div>
                                      </li>
                                 </ul>
                            </nav>
                            <!-- 语种选择 -->
                            <div class="chooseLan rd30">
                                 <div class="curLan"><img src="./images/icon/lan01.png" alt="" class="icon ibvm"><span
                                           class="val ibvm">简体中文</span></div>
                                 <div class="lanLay">
                                      <ul class="lanul cle">
                                           <li><a href="">English</a></li>
                                           <li><a href="">简体中文</a></li>
                                           <li><a href="">繁体中文</a></li>
                                           <li><a href="">日本語</a></li>
                                           <li><a href="">Espanol</a></li>
                                           <li><a href="">한국어</a></li>

                                      </ul>
                                 </div>
                            </div>

                            <!--手机导航begin-->
                            <div class="menubtn fr">
                                 <i></i>
                                 <i></i>
                                 <i></i>
                            </div>
                            <div class="inav">
                                 <dl>
                                      <dt><a href="/">首页</a></dt>
                                 </dl>
                                 <dl>
                                      <dt><a href="<?php echo get_nav_url(1);?>"><?php echo get_sort_zd(1);?></a></dt>
                                 </dl>
                                 <dl>
                                      <dt><a href="<?php echo get_nav_url(2);?>"><?php echo get_sort_zd(2);?></a></dt>
                                 </dl>
                                 <dl>
                                      <dt><em class="inavbtn"></em><a href="javascript:;"><?php echo get_sort_zd(3);?></a></dt>
                                      <dd>
                                          <?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><h6><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a></h6><?php endforeach; endif; else: echo "" ;endif; ?>
                                           <!-- <h6><a href="">美国案例</a></h6>

                                           <h6><a href="">日本案例</a></h6> -->
                                      </dd>
                                 </dl>
                                 <dl>
                                      <dt><em class="inavbtn"></em><a href="javascript:;"><?php echo get_sort_zd(4);?></a></dt>
                                      <dd>
                                           <?php $_result=get_sort_list(4);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><h6><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a></h6><?php endforeach; endif; else: echo "" ;endif; ?>
                                      </dd>
                                 </dl>
                            </div>
                            <!--手机导航end-->
                       </div>
                  </div>
              </header>

               <!--头部-->
        <?php if($vpid == 0 || $case == 3): ?></div>
            <?php if($case == 3): ?><!--banner begin-->
                    <div class="i_banner">
                        <img src="<?php echo get_sort_zd($vty,'img2');?>" alt="" class="tp">
                    </div>
                    <!--banner end-->
            <?php else: ?>
                  <!--banner begin-->
                  <div class="swiper-container banner">
                       <div class="swiper-wrapper">
                            <?php $_result=get_news(23,26,0,0,'*',5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($i == 2): ?><div class="swiper-slide">
                                         <img src="<?php echo ($v["img1"]); ?>" class="banimg" />
                                         <div class="banIntro">
                                              <div class="wp">
                                                   <div class="des">
                                                        <div class="nr"><img src="./images/ban02_wz1.png" alt="" class="tp"></div>
                                                        <div class="mandiv">
                                                            <a href="video/z.mp4" class="popupVideo1 sbtn_ban btn rd40">
                                                                  <span class="val">点击视频了解Mr.Menu</span>
                                                                  <span class="icon iconfont icon-play_go"></span>
                                                             </a>
                                                        </div>
                                                   </div>
                                                   <div class="tparea">
                                                        <img src="./images/ban02_tp1.png" alt="" class="tp">
                                                   </div>
                                              </div>
                                         </div>
                                    </div>
                                <?php else: ?>
                                    <div class="swiper-slide">
                                         <img src="<?php echo ($v["img1"]); ?>" class="banimg" />
                                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                       </div>
                       <!-- 如果需要分页器 -->
                       <div class="swiper-pagination"></div>
                       <!-- 如果需要导航按钮 -->
                       <div class="swiper-button-prev swiper-button-white"></div>
                       <div class="swiper-button-next swiper-button-white"></div>
                  </div>
                  <div class="bannerBg"><img src="./images/icon/ban_shadow.png" alt="" class="tp"></div>
                  <!--banner end--><?php endif; ?>
     </div><?php endif; ?>

<body class="bg_fa">
    <style>
        html,body{ height: 100%; }
        </style>
   <div class="imain2 bcover" style="background-image: url(./images/cooG_bg.png);">
        <div class="wrap">
                <div class="h20"></div>
                <div class="wrap2">
                        <div class="cooGrasp">
                                <div class="i_tit3 tc">
                                    <h4 class="tit">Mr.Menu合作</h4>
                                    <p class="tip">
                                           请您填写以下表单，我们会在收到您的需求后尽快回复～
                                    </p>
                                </div>  
                                <div class="achieve">
                                    <div class="nr">
                                        <p class="p1">提交成功</p>
                                        <p class="p2">谢谢你的反馈，我们会尽快回复您～</p>
                                    </div>
                                    <div class="mandiv tc">
                                          <a href="/List-message-pid-18-ty-22-tty-0.html"> <input type="submit" value="返回"  class="rd10 sbtn sbtn_green btn"></a>
                                    </div>
                                </div>
                        </div>
                        
                </div>
        </div>
   </div>
</body>
<!--own js-->
<link rel="stylesheet" href="css/animate.min.css" />
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="swiper/swiper5.js"></script>
<script type="text/javascript" src="swiper/swiper.animate.min.js"></script>
<script src="js/js.js"></script>

</html>