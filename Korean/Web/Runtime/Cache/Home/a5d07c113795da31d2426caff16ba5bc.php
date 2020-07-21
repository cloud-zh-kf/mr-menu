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
                              <a class="logo" href="/Korean/"><img src="<?php echo sys('sys_img1');?>" /></a>
                              <!--PC nav -->
                              <nav class="nav">
                                   <ul class="wp navul">
                                        <li><a <?php echo empty($vpid) ? 'class="act_nav"':''; ?> href="/Korean/">홈</a></li>
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
                                        <li><a href="javascript:;" <?php echo $vpid==18 ? 'class="act_nav"':''; echo $vpid==35 ? 'class="act_nav"':''; ?>>미스터메뉴 소개<i class="iconfont icon-down2"></i></a>
                                             <div class="subnav">
                                                  <div class="nr">
                                                    <a href="index.php?m=&c=List&a=About&pid=35&ty=37&tty=0" >회사 비전</a>
                                                    <a href="index.php?m=&c=List&a=common&pid=18&ty=21&tty=0" ><?php echo get_sort_zd(21);?></a>
                                                    <a href="index.php?m=&c=List&a=message&pid=18&ty=22&tty=0" >가입 정보</a>
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
                                        <span class="val ibvm">한국어</span></div>
                                   <div class="lanLay">
                                        <ul class="lanul cle">
                                             <li><a href="/en/">English</a></li>
                                             <li><a href="/" >简体中文</a></li>
                                             <li><a href="/tr/" >繁体中文</a></li>
                                             <li><a href="/de/">Deutsch</a></li>
                                             <li><a href="/Espanol/">Español</a></li>
                                             <li><a href="/French/">Français</a></li>
                                             <li><a href="/lt/">Italiano</a></li>
                                             <li><a href="/Japanese/">日本語</a></li>
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
                                             <dt><a href="/Korean/">홈</a></dt>
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
                                             <h6><a href="index.php?m=&c=List&a=About&pid=35&ty=37&tty=0" >회사 비전</a></h6>
                                             <h6><a href="index.php?m=&c=List&a=common&pid=18&ty=21&tty=0" ><?php echo get_sort_zd(21);?></a></h6>
                                             <h6><a href="index.php?m=&c=List&a=message&pid=18&ty=22&tty=0" >가입 정보</a></h6>
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
                                                  <span class="val">미스터메뉴를 더 많이 알아봅니다</span>
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
     <!-- Product introduction -->
     <div class="h_man">
          <div class="wp">
               <div class="h_tit">
                    <h4 class="tit tc green">제품소개</h4>
               </div>
               <!-- MOBILE ONLINE ORDER -->
               <?php $_result=get_news(1,34,0,0,'*',1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="hmItem hmItem1">
                         <h4 class="hm_tit tc"><?php echo ($v["title"]); ?></h4>
                         <div class="wrap">
                              <div class="tparea"><img src="<?php echo ($v["img1"]); ?>" alt="" class="tp"></div>
                              <div class="des">
                                   <div class="nr tc">
                                        <?php echo get_nl2br($v['introduce']);;?>
                                   </div>
                                   <div class="mandiv">
                                        <!-- popupVideo1 -->
                                        <a href="<?php echo get_url($v['id'],'List','video');?>" class="hsbtn sbtn  btn sbtn_orange rd40"><span
                                                  class="val">AI 다인-인</span>
                                             <span class="icon iconfont icon-play_go"></span></a>
                                        <a href="index.php?m=&c=List&a=Mobile&pid=1&ty=34&tty=0" class="hsbtn sbtn sbtn_green rd40">데모를 운영하기</a>
                                   </div>
                              </div>
                         </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
               <!-- WEBSITE ONLINE ORDER -->
               <?php $_result=get_news(35,37,0,0,'*',1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="hmItem hmItem2">
                    <h4 class="hm_tit tc"><?php echo ($v["title"]); ?></h4>
                    <div class="wrap">
                         <img src="<?php echo ($v["img1"]); ?>" alt="" class="tp">
                         <div class="mandiv mt10">
                              <a href="index.php?m=&c=List&a=Website&pid=35&ty=37&tty=0" class="hsbtn sbtn sbtn_green rd40">데모를 운영하기</a>
                         </div>
                    </div>
               </div><?php endforeach; endif; else: echo "" ;endif; ?>
               <!-- APP Introduction -->

               <div class="hmItem hmItem3">
                    <h4 class="hm_tit tc"><?php echo get_sort_zd(39);?></h4>
                    <div class="wrap">
                         <ul class="hmItem3ul">
                              <?php $_result=get_news(39,40,0,0,'*');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                   <div class="tparea"><img src="<?php echo ($v["img2"]); ?>" alt="" class="tp"></div>
                              </li><?php endforeach; endif; else: echo "" ;endif; ?>
                         </ul>
                         <div class="tip"><?php echo get_sort_zd(39,'encatname');?></div>
                         <div class="mandiv mt30 tc">
                              <a href="#xz" class="hsbtn sbtn sbtn_orange rd40">응용 프로그램 을 다운로드 하 다</a>
                              <a href="index.php?m=&c=List&a=App&pid=39&ty=40&tty=0" class="hsbtn sbtn sbtn_green rd40">미스터메뉴를 더 많이 알아봅니다</a>
                         </div>
                    </div>
               </div>

          </div>
     </div>
     <!-- 用自己的数字菜单打动您的客户 -->
     <div class="h_data">
          <div class="wp">
               <div class="h_tit">
                    <h4 class="tit tc green"><?php echo get_sort_zd(28);?></h4>
                    <p class="tip tc"><?php echo get_sort_zd(28,'encatname');?></p>
               </div>
               <div class="wrap tc">
                    <ul class="hdataul cle">
                         <?php $_result=get_news(23,28,0,0,'*');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                              <p class="p1"><span class="indexNum"><?php echo ($v["title"]); ?></span></p>
                              <p class="p2"><?php echo ($v["tags"]); ?></p>
                         </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
               </div>
          </div>
     </div>
     <!-- 好评案例 -->
     <div class="h_case bg_w">
          <div class="wp">
               <div class="h_tit">
                    <h4 class="tit green tc"><?php echo get_sort_zd(29);?></h4>
               </div>
               <div class="wrap ">
                    <ul class="hcaseul cle">
                         <?php $_result=get_news(23,29,0,0,'*');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                   <a href="javascript:;">
                                        <div class="intro cle">
                                             <img src="<?php echo ($v["img1"]); ?>" alt="" class="tp rd14">
                                             <div class="des">
                                                  <p class="p1"><?php echo ($v["title"]); ?></p>
                                                  <p class="p2"><?php echo ($v["content"]); ?></p>
                                             </div>
                                        </div>
                                        <div class="level">

                                             <?php echo get_xunhuan($v['tags']);?>

                                        </div>
                                        <div class="nr">
                                             <?php echo get_nl2br($v['introduce']);?>
                                        </div>
                                   </a>
                              </li><?php endforeach; endif; else: echo "" ;endif; ?>
                         
                    </ul>
                    <div class="morediv tc">
                         <a href="index.php?m=&c=List&a=favorabl&pid=23&ty=29&tty=0" class="sbtn sbtn_green_s btn"><span class="val">훨씬 많다</span><i
                                   class="iconfont icon-round-arrow_right_al"></i></a>
                    </div>
               </div>
          </div>
     </div>
     <!-- Join us -->
     <div class="h_join bcover" style="background-image: url(./images/h_join_Bg.jpg);">
          <div class="wp">
               <?php $_result=get_news(43,44,0,0,'*',1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="h_tit h_tit_w">
                    <h4 class="tit tc"><?php echo get_sort_zd($v['ty']);?></h4>
                    <div class="tip2 tc"><?php echo ($v["introduce"]); ?></div>
               </div>
               <div class="wrap mt100">
                    <div class="mandiv">
                         <a href="javascript:;" class="messbtn hsbtn sbtn sbtn_green rd40">제휴제안</a>
                    </div>
               </div><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
     </div>
     <!-- POS INTEGRATION/PARTNER -->
     <div class="h_pos">
          <div class="wp">
               <div class="h_tit">
                    <h4 class="tit green tc"><?php echo get_sort_zd(45);?></h4>
               </div>
               <div class="wrap">
                    <ul class="hposul cle">
                         <?php $_result=get_news_good(45,46,0,0,'*',8);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a ><img src="<?php echo ($v["img1"]); ?>" alt="" class="tp"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="mandiv tc">
                         <a href="index.php?m=&c=List&a=Partner&pid=45&ty=46&tty=0" class="sbtn sbtn_green_s btn"><span class="val">훨씬 많다</span><i
                              class="iconfont icon-round-arrow_right_al"></i></a>
                    </div>
               </div>
          </div>
     </div>


     <!--i_main end-->
<!--own js-->
<link rel="stylesheet" href="css/animate.min.css" />
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="swiper/swiper5.js"></script>
<script type="text/javascript" src="swiper/swiper.animate.min.js"></script>
<script src="js/js.js"></script>
<!--滚动数字-->
<!-- <script src="js/scrollnum.js"></script> -->
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.countup.min.js"></script>
<script type="text/javascript">
     $('.indexNum').countUp();
</script>
<!-- 视频弹窗 -->
<link rel="stylesheet" type="text/css" href="dist/magnific-popup.css">
<script src="dist/jquery.magnific-popup.js"></script>
<script type="text/jscript">
    $(document).ready(function() {
          $('.popupVideo1').magnificPopup({
               disableOn:false,
               type: 'iframe',
               mainClass: 'mfp-fade',
               removalDelay: 160,
               preloader: false,
               fixedContentPos: false
          });
     });
</script>
     <!--底部-->
     <!--pc footer-->
     <div class="footer" id="xz">
          <div class="f_t">
               <div class="wp">
                    <div class="fdown cle">
                         <h4 class="tit">메뉴 프로그램 을 다운로드 하려 면 단 추 를 누 르 십시오</h4>
                         <div class="nr">
                              <?php $_result=get_news(23,32,0,0,'*',3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a download="<?php echo ($v["file1"]); ?>" href="<?php echo ($v["file1"]); ?>"><img src="<?php echo ($v["img1"]); ?>" alt="" class="tp rd6">
                                   <div class="hdownLay">
                                        <img src="<?php echo ($v["img2"]); ?>" alt="" class="tp">
                                        <h4 class="tit2">코드 검색 을 시도 합 니 다</h4>
                                   </div>
                              </a><?php endforeach; endif; else: echo "" ;endif; ?>
                         </div>
                    </div>
                    <div class="fnav">
                         <ul class="fnavul cle">
                              <?php $_result=get_news(23,31,0,0,'*',3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                   <h4 class="ftit b"><?php echo ($v["title"]); ?></h4>
                                   <div class="nr1">
                                        <!-- <p class="p1">Greedy Cat Japan株式会社</p>
                                        <p class="p1">Greedy Cat Japan株式会社</p>
                                        <p class="p1">Greedy Cat Japan株式会社</p>
                                        <p class="p1">Greedy Cat Japan株式会社</p> -->
                                        <?php echo get_2explode($v['introduce']);?>
                                   </div>
                              </li><?php endforeach; endif; else: echo "" ;endif; ?>
                              <li>
                                   <h4 class="ftit b">고객지원</h4>
                                   <div class="nr2">
                                        <?php $_result=get_sort_list(18);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                   </div>
                              </li>
                              <li>
                                   <h4 class="ftit"><img src="./images/icon/f_logo.png" alt="" class="tp"></h4>
                                   <div class="nr1">
                                        <p class="p1">협력:<?php echo sys('sys_gz');?></p>
                                        <p class="p1">모집:<?php echo sys('sys_zp');?></p>
                                   </div>
                              </li>
                         </ul>
                    </div>
               </div>
          </div>
          <div class="f_b">
               <div class="copyright tc"><?php echo sys('sys_copyright');?>
                    <a href="http://beian.miit.gov.cn" style="margin-left:5px;color:#fff" target="_blank"><?php echo sys('sys_icp');?></a>
                    <a href="http://www.9-xin.com" style="margin-left:5px;color:#fff" target="_blank">기술 지원: 씬 네트워크</a>
               </div>
          </div>
     </div>
     <!--底部-->
          <div class="floatpart">
               <ul class="floatpartul">
                    <li class="gotop"><a href="javascript:;"><img src="./images/icon/side01.png" alt="" class="tp"></a></li>
                    <li ><a href="javascript:;" class="messbtn"><img src="./images/icon/side02.png" alt="" class="tp"></a>
                         <div class="messlay">
                                   <form class="hmform" method="post" action="index.php?m=Home&c=List&a=message"><h4 class="tit">제휴제안
                                          </h4>
                                        <input type="hidden" name="typeid" value="5">
                                        <div class="item">
                                             <div class="attrmc">이름
                                                            <i class="require">*</i></div>
                                             <div class="attrval"><input placeholder="이름
" required oninvalid="setCustomValidity('이름을 정확하게 입력하세요')" oninput="setCustomValidity('')" type="text" name="username" id="username" class="text rd10">
                                                  <!-- <div class="msg"></div> -->
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">연락처
                                                            <i class="require">*</i></div>
                                             <div class="attrval"><input placeholder="연락처
" required oninvalid="setCustomValidity('정확한 연락처를 입력하세요')" oninput="setCustomValidity('')" type="number" name="tel" id="tel" class="text rd10">
                                                  <div class="msg"></div>
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">국가
                                                            <i class="require">*</i></div>
                                             <div class="attrval">
                                                  <select name="guojia" id="guojia" class="selCountry rd10" >
                                                       <option value="중국">중국
                                                                   </option>
                                                       <option value="미국">미국
                                                                   </option>
                                                       <option value="영국">영국
                                                                   </option>
                                                       <option value="독일">독일
                                                                   </option>
                                                       <option value="일본">일본
                                                                   </option>
                                                       <option value="스페인">스페인</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">레스토랑 이름
                                                            <i class="require">*</i></div>
                                             <div class="attrval"><input placeholder="레스토랑 이름
" required oninvalid="setCustomValidity('식당 이름 을 입력 하 세 요.')" oninput="setCustomValidity('')" type="text" name="name" id="name" class="text rd10">
                                                  <!-- <div class="msg">Please enter the correct surname restaurant name</div> -->
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">주소
                                                            <i class="require">*</i></div>
                                             <div class="attrval">
                                                  <textarea  class="textarea" name="add" required oninvalid="setCustomValidity('식당 주 소 를 입력 하 세 요.')" oninput="setCustomValidity('')" placeholder="주소
" id="add" cols="30" rows="10"></textarea>
                                                  <!-- <div class="msg">Please enter the correct Restaurant Address</div> -->
                                             </div>
                                        </div>
                                        <div class="item tj tc"><input class="sbtn rd40 btn sbtn_green hmformBtn" type="submit" value="접속하기
" /></div>
                                   </form>
                                   <script type="text/javascript">
                                        $('.hmformBtn').click(function(){
                                             tel = $('.hmform #tel');
                                             username=$('.hmform #username').val();
                                             var zz = /^[0-9][0-9][0-9]{4,10}$/;
                                             var dh=/^[0-9][0-9][0-9]{11}$/;
                                             if(tel.val() && username){
                                                  if (!(zz.test(tel.val()) || dh.test(tel.val()))) {
                                                    $('.hmform #tel').focus();
                                                    $('.hmform #tel').next('.msg').html('핸드폰 번호 형식 이 잘못 되 었 습 니 다.');
                                                    return false;
                                                  }else{
                                                    $('.hmform #tel').next('.msg').html('');
                                                  }
                                             }
                                        });
                                        $('input[type="text"]').click(function(){
                                             $('.msg').html('');
                                        });
                                        $('.textarea').click(function(){
                                             $('.msg').html('');
                                        });
                                   </script>
                                   <div class="subAchieve">
                                        <h4 class="tit">제휴제안
                                                </h4>
                                        <div class="nr">
                                             <div class="tp"><i class="iconfont icon-jinakangbaoicons17"></i></div>
                                             <p class="p1">접속되었습니다
                                                            <br>빠른 시간안에 연락드리겠습니다
                                                            ～</p>
                                        </div>
                                        <div class="tj tc">
                                             <input class="sbtn rd40 btn sbtn_green subAchieveBtn" type="submit" value="Ok" />
                                        </div>
                                   </div>
                              </div>
                    </li>
                    <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side03.png" alt="" class="tp"></a>
                         <div class="codeLay">
                              <img src="<?php echo sys('sys_img9');?>" alt="" class="tp">
                              <p class="tit">Mr.Menu 공식계정 (위챗)
                                    </p>
                         </div>
                    </li>
                    <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side04.png" alt="" class="tp"></a>
                         <div class="codeLay">
                                   <img src="<?php echo sys('sys_img8');?>" alt="" class="tp">
                                   <p class="tit">Mr.Menu 웨이보 닷컴
                                          </p>
                              </div>
                    </li>
                    <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side05.png" alt="" class="tp"></a>
                         <div class="codeLay">
                                   <img src="<?php echo sys('sys_img7');?>" alt="" class="tp">
                                   <p class="tit">Mr.Menu 틱톡
                                          </p>
                              </div>

               </ul>
          </div>
</body>
</html>