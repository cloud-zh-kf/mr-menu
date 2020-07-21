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
                              <a class="logo" href="/lt/"><img src="<?php echo sys('sys_img1');?>" /></a>
                              <!--PC nav -->
                              <nav class="nav">
                                   <ul class="wp navul">
                                        <li><a <?php echo empty($vpid) ? 'class="act_nav"':''; ?> href="/lt/">CASA</a></li>
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
                                        <li><a href="javascript:;" <?php echo $vpid==18 ? 'class="act_nav"':''; echo $vpid==35 ? 'class="act_nav"':''; ?>>riguardo a noi<i class="iconfont icon-down2"></i></a>
                                             <div class="subnav zj">
                                                  <div class="nr">
                                                    <a href="index.php?m=&c=List&a=About&pid=35&ty=37&tty=0" >Visione aziendale</a>
                                                    <a href="index.php?m=&c=List&a=common&pid=18&ty=21&tty=0" ><?php echo get_sort_zd(21);?></a>
                                                    <a href="index.php?m=&c=List&a=message&pid=18&ty=22&tty=0" >sulla cooperazione</a>
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
                                        <span class="val ibvm">Italiano</span></div>
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
                                             <dt><a href="/lt/">CASA</a></dt>
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
                                             <h6><a href="index.php?m=&c=List&a=About&pid=35&ty=37&tty=0" >Visione aziendale</a></h6>
                                             <h6><a href="index.php?m=&c=List&a=common&pid=18&ty=21&tty=0" ><?php echo get_sort_zd(21);?></a></h6>
                                             <h6><a href="index.php?m=&c=List&a=message&pid=18&ty=22&tty=0" >sulla cooperazione</a></h6>
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
                                                  <span class="val">per saperne di più su Mr. Menu</span>
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
    <!--main-->
    <div class="i_main mt20">
        <div class="wp">
            <h4 class="i_tit tc">List of Cooperative Restaurants
            </h4>
            <div class="cooRes">
                <ul class="cooResul cle">
                    <?php $_result=get_news_fy(6,$vpid,$vty);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo get_url($v['id'],'List','details');?>" class="tp"><img src="<?php echo ($v["img1"]); ?>" alt="" class="tp">
                                <h4 class="tit"><?php echo ($v["title"]); ?></h4>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
                <!-- turnpage -->
                <div class="turnpage">
                    
                    <?php echo get_news_fym(6,$vpid,$vty);?>

                    <em class="go">To
                        <input type="text" name="page" value="<?php echo $_GET['p'] ? $_GET['p']:1;?>" class="num">page</em>
                    <input type="submit" class="tj fytj" value="确定">
                </div>
                <script type="text/javascript">
                    $('.fytj').click(function(){
                        var page=$(':input[name="page"]').val();
                        // alert();
                        var sl=$('.turnpage .sl').size();
                        if(page>sl){
                            page=sl;
                        }
                        window.location.href='List-caselist.html?Home-List-caselist_html=&pid='+<?php echo $vpid;?>+'&ty='+<?php echo $vty;?>+'&tty='+<?php echo $vtty;?>+'&Home-List-caselist-pid-'+<?php echo $vpid;?>+'-ty-'+<?php echo $vty;?>+'-tty-'+<?php echo $vtty;?>+'_html=&p='+page;

                    });
                </script>
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
                         <h4 class="tit">Fare clic sul pulsante per scaricare l'applicazione del Mr.menu</h4>
                         <div class="nr">
                              <?php $_result=get_news(23,32,0,0,'*',3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a download="<?php echo ($v["file1"]); ?>" href="<?php echo ($v["file1"]); ?>"><img src="<?php echo ($v["img1"]); ?>" alt="" class="tp rd6">
                                   <div class="hdownLay">
                                        <img src="<?php echo ($v["img2"]); ?>" alt="" class="tp">
                                        <h4 class="tit2">Scansiona il codice per provare</h4>
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
                                   <h4 class="ftit b">Assistenza clienti</h4>
                                   <div class="nr2">
                                        <?php $_result=get_sort_list(18);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                   </div>
                              </li>
                              <li>
                                   <h4 class="ftit"><img src="./images/icon/f_logo.png" alt="" class="tp"></h4>
                                   <div class="nr1">
                                        <p class="p1">Cooperazione:<?php echo sys('sys_gz');?></p>
                                        <p class="p1">Reclutamento:<?php echo sys('sys_zp');?></p>
                                   </div>
                              </li>
                         </ul>
                    </div>
               </div>
          </div>
          <div class="f_b">
               <div class="copyright tc"><?php echo sys('sys_copyright');?>
                    <a href="http://beian.miit.gov.cn" style="margin-left:5px;color:#fff" target="_blank"><?php echo sys('sys_icp');?></a>
                    <a href="http://www.9-xin.com" style="margin-left:5px;color:#fff" target="_blank">Technical support: Jiuxin network</a>
               </div>
          </div>
     </div>
     <!--底部-->
          <div class="floatpart">
               <ul class="floatpartul">
                    <li class="gotop"><a href="javascript:;"><img src="./images/icon/side01.png" alt="" class="tp"></a></li>
                    <li ><a href="javascript:;" class="messbtn"><img src="./images/icon/side02.png" alt="" class="tp"></a>
                         <div class="messlay">
                                   <form class="hmform" method="post" action="index.php?m=Home&c=List&a=message"><h4 class="tit">Conoscenza di cooperazione
                                          </h4>
                                        <input type="hidden" name="typeid" value="5">
                                        <div class="item">
                                             <div class="attrmc">Nome
                                                            <i class="require">*</i></div>
                                             <div class="attrval"><input placeholder="Nome
" required oninvalid="setCustomValidity('Inserire il nome di contatto corretto')" oninput="setCustomValidity('')" type="text" name="username" id="username" class="text rd10">
                                                  <!-- <div class="msg"></div> -->
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">Informazioni di contatto
                                                            <i class="require">*</i></div>
                                             <div class="attrval"><input placeholder="Informazioni di contatto
" required oninvalid="setCustomValidity('Si prega di inserire le informazioni di contatto')" oninput="setCustomValidity('')" type="number" name="tel" id="tel" class="text rd10">
                                                  <div class="msg"></div>
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">Paese
                                                            <i class="require">*</i></div>
                                             <div class="attrval">
                                                  <select name="guojia" id="guojia" class="selCountry rd10" >
                                                       <option value="China">China
                                                                   </option>
                                                       <option value="US">US
                                                                   </option>
                                                       <option value="UK">UK
                                                                   </option>
                                                       <option value="Germany">Germany
                                                                   </option>
                                                       <option value="Japan">Japan
                                                                   </option>
                                                       <option value="Spain">Spain</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">Nome del ristorante
                                                            <i class="require">*</i></div>
                                             <div class="attrval"><input placeholder="Nome del ristorante
" required oninvalid="setCustomValidity('Si prega di inserire il nome del ristorante')" oninput="setCustomValidity('')" type="text" name="name" id="name" class="text rd10">
                                                  <!-- <div class="msg">Please enter the correct surname restaurant name</div> -->
                                             </div>
                                        </div>
                                        <div class="item">
                                             <div class="attrmc">Indirizzo del ristorante
                                                            <i class="require">*</i></div>
                                             <div class="attrval">
                                                  <textarea  class="textarea" name="add" required oninvalid="setCustomValidity('Riportare il Indirizzo del ristorante')" oninput="setCustomValidity('')" placeholder="Restaurant address
" id="add" cols="30" rows="10"></textarea>
                                                  <!-- <div class="msg">Please enter the correct Restaurant Address</div> -->
                                             </div>
                                        </div>
                                        <div class="item tj tc"><input class="sbtn rd40 btn sbtn_green hmformBtn" type="submit" value="Invia
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
                                                    $('.hmform #tel').next('.msg').html('Il formato del tuo numero di cellulare non è corretto!');
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
                                  <!--  <div class="subAchieve">
                                        <h4 class="tit">Consultation for cooperation
                                                </h4>
                                        <div class="nr">
                                             <div class="tp"><i class="iconfont icon-jinakangbaoicons17"></i></div>
                                             <p class="p1">Submit successfully
                                                            <br>We will contact you soon
                                                            ～</p>
                                        </div>
                                        <div class="tj tc">
                                             <input class="sbtn rd40 btn sbtn_green subAchieveBtn" type="submit" value="Ok" />
                                        </div>
                                   </div> -->
                              </div>
                    </li>
                    <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side03.png" alt="" class="tp"></a>
                         <div class="codeLay">
                              <img src="<?php echo sys('sys_img9');?>" alt="" class="tp">
                              <p class="tit">Mr. Menu pubblico n.
                                    </p>
                         </div>
                    </li>
                    <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side04.png" alt="" class="tp"></a>
                         <div class="codeLay">
                                   <img src="<?php echo sys('sys_img8');?>" alt="" class="tp">
                                   <p class="tit">Mr. Menu weibo
                                          </p>
                              </div>
                    </li>
                    <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side05.png" alt="" class="tp"></a>
                         <div class="codeLay">
                                   <img src="<?php echo sys('sys_img7');?>" alt="" class="tp">
                                   <p class="tit">Mr. Menu scosso suono
                                          </p>
                              </div>

               </ul>
          </div>
</body>
</html>