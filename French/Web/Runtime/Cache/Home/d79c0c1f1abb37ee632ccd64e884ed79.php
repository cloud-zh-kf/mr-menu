<?php if (!defined('THINK_PATH')) exit(); $PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']); $PHP_URL=basename($PHP_SELF); $id=I('request.id',0); $pid=I('request.pid',0); $ty=I('request.ty',0); $tty=I('request.tty',0); $ttty=I('request.ttty',0); if($id){ $bd=M('news')->field("pid,ty,tty,ttty,title,seotitle,seokeywords,seodescription")->where("status=1 AND id={$id}")->find(); if($bd){ $id=$id; $case=$bd['pid']; $vpid=$bd['pid']; cookie('vpid',$vpid,62400); $vty=$bd['ty']; $vtty=$bd['tty']; $vttty=$bd['ttty']; $Title=$bd['title']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($pid&&$id==0){ if($ty) $zid=$ty; else $zid=get_nextid($pid); $vtty=$tty; $vttty=$ttty; $bd=M('sort')->field("catname,seotitle,seokeywords,img1,seodescription")->where("status=1 AND id={$zid}")->find(); if($bd){ if($pid) $vpid=$pid; if($ty) $vty=$ty;else $vty=$zid; $banner_img=$bd['img1']; $Title=$bd['catname']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($id==0){ $vpid=0; $Seotitle=sys('sys_seotitle'); $Seokeywords=sys('sys_seokeywords'); $Seodescription=sys('sys_seodescription'); } if($Custitle){ $Seotitle=$Custitle; }else{ if($Title) $Seotitle="{$Title}_";elseif($Seotitle) $Seotitle="{$Seotitle}_";else $Seotitle=""; } ?>



<!doctype html>
<html>

<head>
     <meta charset="utf-8">
     <title><?php echo ($Seotitle); ?>_<?php echo sys('sys_sitename');?></title>
     <meta name="keywords" content="<?php echo ($Seokeywords); ?>" />
     <meta name="description" content="<?php echo ($Seodescription); ?>" />
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
          <?php if($vpid == 0 || $case == 3): ?><div id="mainMenuBarAnchor"></div>
              <header id="mainMenuBar" class="header">
          <?php else: ?>
                <div id="mainMenuBarAnchor"></div>
              <header  id="mainMenuBar" class="header iheader"><?php endif; ?>
                  <div class="loarea">
                         <div class="wp clearfix">
                              <a class="logo" href="/French/"><img src="<?php echo sys('sys_img1');?>" /></a>
                              <!--PC nav -->
                              <nav class="nav">
                                   <ul class="wp navul">
                                        <li><a <?php echo empty($vpid) ? 'class="act_nav"':''; ?> href="/French/">Accueil</a></li>
                                        <li><a href="javascript:;" <?php echo $vpid==3 ? 'class="act_nav"':''; ?> ><?php echo get_sort_zd(3);?><i class="iconfont icon-down2"></i></a>
                                             <div class="subnav">
                                                  <div class="nr">
                                                      <?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                                  </div>
                                        </li>
                                        <!-- <style type="text/css">
                                          .zj .nr a{
                                            width:100%;
                                          }
                                          .zj{
                                            width: 180px;
                                          }
                                          
                                        </style> -->
                                        <li><a href="javascript:;" <?php echo $vpid==18 ? 'class="act_nav"':''; echo $vpid==35 ? 'class="act_nav"':''; ?>>À notre sujet<i class="iconfont icon-down2"></i></a>
                                             <div class="subnav zj">
                                                  <div class="nr">
                                                    <a href="index.php?m=&c=List&a=About&pid=35&ty=37&tty=0" >VISION</a>
                                                    <a href="index.php?m=&c=List&a=common&pid=18&ty=21&tty=0" ><?php echo get_sort_zd(21);?></a>
                                                    <a href="index.php?m=&c=List&a=message&pid=18&ty=22&tty=0" >à propos de la coopération</a>
                                                  </div>
                                             </div>
                                        </li>
                                   </ul>
                              </nav>
                              <!-- 语种选择 -->
                              <div class="chooseLan rd30">
                                   <div class="curLan">
                                        <img src="./images/icon/lan01.png" alt="" class="icon icon01">
                                        <img src="./images/icon/lan02.png" alt="" class="icon icon02">
                                        <span class="val ibvm">Français</span></div>
                                   <div class="lanLay">
                                        <ul class="lanul cle">
                                             <li><a href="/en/">English</a></li>
                                             <li><a href="/" >简体中文</a></li>
                                             <li><a href="/tr/" >繁體中文</a></li>
                                             <li><a href="/de/">Deutsch</a></li>
                                             <li><a href="/Espanol/">Español</a></li>
                                             <li><a href="/French/">Français</a></li>
                                             <li><a href="/Japanese/">日本語</a></li>
                                             <li><a href="/lt/">Italiano</a></li>
                                             <li><a href="/Korean/">한국어</a></li>
                                             
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
                                   <div class="wrap">
                                        <dl>
                                             <dt><a href="/French/">Accueil</a></dt>
                                        </dl>
                                        <dl>
                                             <dt><em class="inavbtn"></em><a href="javascript:;"><?php echo get_sort_zd(3);?></a></dt>
                                             <dd>
                                             <?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><h6><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a></h6><?php endforeach; endif; else: echo "" ;endif; ?>
                                             </dd>
                                        </dl>
                                        <dl>
                                             <dt><em class="inavbtn"></em><a href="javascript:;"><?php echo get_sort_zd(43);?></a></dt>
                                             <dd>
                                             <h6><a href="index.php?m=&c=List&a=About&pid=35&ty=37&tty=0" >VISION</a></h6>
                                             <h6><a href="index.php?m=&c=List&a=common&pid=18&ty=21&tty=0" ><?php echo get_sort_zd(21);?></a></h6>
                                             <h6><a href="index.php?m=&c=List&a=message&pid=18&ty=22&tty=0" >à propos de la coopération</a></h6>
                                             </dd>
                                        </dl>
                                   </div>
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
                 <?php $_result=get_news(23,26,0,0,'*',5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                         <img src="<?php echo ($v["img1"]); ?>" class="banimg" />
                         <div class="banIntro">
                              <div class="wp">
                                   <div class="des">
                                        <div class="nr"><img src="<?php echo ($v["img2"]); ?>" alt="" class="tp"></div>
                                        <div class="mandiv">
                                          <!-- popupVideo1 -->
                                             <a href="<?php echo get_url($v['id'],'List','video');?>" class=" sbtn_ban btn rd40">
                                                  <span class="val">En savoir plus sur Mr.Menu</span>
                                                  <span class="icon iconfont icon-play_go"></span>
                                             </a>
                                        </div>
                                   </div>
                                   <div class="tparea">
                                        <img src="<?php echo ($v["img3"]); ?>" alt="" class="tp">
                                   </div>
                              </div>
                         </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
                                    <h4 class="tit">Mr.Menu cooperation
                                    </h4>
                                    <p class="tip">
                                        Please fill in the form below and we will reply as soon as we receive your request
                                    </p>
                                </div>  
                                <div class="achieve">
                                    <div class="nr">
                                        <p class="p1">Submit successfully
                                        </p>
                                        <p class="p2">Thank you for your feedback, we will reply to you as soon as possible～</p>
                                    </div>
                                    <div class="mandiv tc">
                                          <a href="/List-message-pid-18-ty-22-tty-0.html"> <input type="submit" value="Back
"  class="rd10 sbtn sbtn_green btn"></a>
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