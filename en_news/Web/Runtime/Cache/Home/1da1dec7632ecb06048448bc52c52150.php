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
     <script src="js/lanjs.js"></script>
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
                                      <li><a <?php echo empty($vpid) ? 'class="act_nav"':''; ?> href="/en/">Home Page</a></li>
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
                                           class="val ibvm">English</span></div>
                                 <div class="lanLay">
                                      <ul class="lanul cle">
                                           <li><a href="/en/">English</a></li>
                                           <li><a href="/" >Chinese</a></li>
                                           <li><a href="/Japanese/">Japanese</a></li>
                                           <li><a href="/Espanol/">Espanol</a></li>
                                           <li><a href="/Korean/">Korean</a></li>
                                           <li><a href="/de/">German</a></li>
                                           <li><a href="/lt/">Italy</a></li>
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
                                      <dt><a href="/en/">Home Page</a></dt>
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
                                                             <a href="List-video-pid-23-ty-30.html" class="sbtn_ban btn rd40">
                                                                  <span class="val">Click video for more information</span>
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

     <!--底部-->
     <!--pc footer-->
     <div class="footer">
          <div class="f_t">
               <div class="wp">
                    <div class="fdown cle">
                         <h4 class="tit">click<span class="pcshow">right</span><span class="wapshow">lower</span>Side download mr.menu application
                         </h4>
                         <div class="nr">
                         	<?php $_result=get_news(23,32,0,0,'*',3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["file1"]); ?>" download="<?php echo ($v["file1"]); ?>"><img src="<?php echo ($v["img1"]); ?>" alt="" class="tp rd6"></a><?php endforeach; endif; else: echo "" ;endif; ?>
                              <!-- <a href=""><img src="./images/down02.png" alt="" class="tp rd6"></a>
                              <a href=""><img src="./images/down03.png" alt="" class="tp rd6"></a> -->
                         </div>
                    </div>
                    <div class="fnav">
                         <ul class="fnavul cle">
                         	<?php $_result=get_news(23,31,0,0,'*',3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                   <h4 class="ftit b"><?php echo ($v["title"]); ?></h4>
                                   <div class="nr1">
                                        <p class="p1"><?php echo get_nl2br($v['introduce']);?></p>
                                        <!-- <p class="p1">090-1819-7623</p>
                                        <p class="p1">yosuke.natsume@mr-menu.com</p>
                                        <p class="p1">〒150-0042</p>
                                        <p class="p1">東京都渋谷区宇田川町6-20 パラシ オン・シブヤ 603号室</p> -->
                                   </div>
                              </li><?php endforeach; endif; else: echo "" ;endif; ?>
                              <!-- <li>
                                   <h4 class="ftit b">Mr.Menu Euro</h4>
                                   <div class="nr1">
                                        <p class="p1">COO：戴媛（Yuan）</p>
                                        <p class="p1">0049-1783-713-318</p>
                                        <p class="p1">Daiyuan@mr-menu.com</p>
                                        <p class="p1">東京都渋谷区宇田川町6-20 パラシ オン・シブヤ 603号室</p>
                                   </div>
                              </li>
                              <li>
                                   <h4 class="ftit b">Mr.Menu USA</h4>
                                   <div class="nr1">
                                        <p class="p1">COO：Bryan</p>
                                        <p class="p1">813-388-8871</p>
                                        <p class="p1">Bryan@greedycatusa.com</p>
                                        <p class="p1">7815 N Dale Mabry Hwy, Suit 108, Tampa, Florida, 33614.</p>
                                   </div>
                              </li> -->
                              <li>
                                   <h4 class="ftit"><?php echo get_sort_zd(18);?></h4>
                                   <div class="nr2">
                                   		<?php $_result=get_sort_list(18);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <!-- <a href="">隐私政策 </a>
                                        <a href="">意见反馈</a>
                                        <a href="">合作了解</a> -->
                                   </div>
                              </li>
                              <li>
                                   <h4 class="ftit">Information
								   </h4>
                                   <div class="nr2">
                                        <!-- <a href="">FAQ</a> -->
                                        <a href="<?php echo get_nav_url(4,15);?>"><?php echo get_sort_zd(15);?></a>
                                   </div>
                              </li>
                              <li>
                                   <h4 class="ftit"><img src="./images/icon/f_logo.png" alt="" class="tp"></h4>
                                   <div class="nr1">
                                        <p class="p1">Cooperation:
											：<?php echo sys('sys_gz');?></p>
                                        <p class="p1">Recruitment:
											：<?php echo sys('sys_zp');?></p>
                                   </div>
                              </li>
                         </ul>
                    </div>
               </div>
          </div>
          <div class="f_b">
               <div class="copyright tc"><?php echo sys('sys_copyright');?>
               		<a href="http://www.9-xin.com" style="margin-left:5px;color:#666" target="_blank">Technical support: Jiuxin network</a>
					<a href="http://beian.miit.gov.cn" style="margin-left:5px;color:#666" target="_blank"><?php echo sys('sys_icp');?></a>
               </div>
          </div>
     </div>
     <?php if($vpid == 0): ?><!--底部-->
	     <div class="floatpart">
	          <ul class="floatpartul">
	               <li class="gotop"><a href="javascript:;"><img src="./images/icon/side01.png" alt="" class="tp"></a></li>
	               <li ><a href="javascript:;" class="messbtn"><img src="./images/icon/side02.png" alt="" class="tp"></a>
	                    <div class="messlay">
	                              <form class="hmform" method="post" action="index.php?m=Home&c=List&a=message"><h4 class="tit">Consultation for cooperation
								  </h4>
	                              	<input type="hidden" name="typeid" value="5">
	                                   <div class="item">
	                                        <div class="attrmc">Name
												<i class="require">*</i></div>
	                                        <div class="attrval"><input placeholder="Name
" required oninvalid="setCustomValidity('Please input the correct contact name')" oninput="setCustomValidity('')" type="text" name="username" id="username" class="text rd10">
	                                             <!-- <div class="msg"></div> -->
	                                        </div>
	                                   </div>
	                                   <div class="item">
	                                        <div class="attrmc">Contact information
												<i class="require">*</i></div>
	                                        <div class="attrval"><input placeholder="Contact information
" required oninvalid="setCustomValidity('Please enter contact information')" oninput="setCustomValidity('')" type="number" name="tel" id="tel" class="text rd10">
	                                             <div class="msg"></div>
	                                        </div>
	                                   </div>
	                                   <div class="item">
	                                        <div class="attrmc">Country
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
	                                        <div class="attrmc">Restaurant name
												<i class="require">*</i></div>
	                                        <div class="attrval"><input placeholder="Restaurant name
" required oninvalid="setCustomValidity('Please enter the restaurant name')" oninput="setCustomValidity('')" type="text" name="name" id="name" class="text rd10">
	                                             <!-- <div class="msg">Please enter the correct surname restaurant name</div> -->
	                                        </div>
	                                   </div>
	                                   <div class="item">
	                                        <div class="attrmc">Restaurant address
												<i class="require">*</i></div>
	                                        <div class="attrval">
	                                             <textarea  class="textarea" name="add" required oninvalid="setCustomValidity('Please enter the restaurant address')" oninput="setCustomValidity('')" placeholder="Restaurant address
" id="add" cols="30" rows="10"></textarea>
	                                             <!-- <div class="msg">Please enter the correct Restaurant Address</div> -->
	                                        </div>
	                                   </div>
	                                   <div class="item tj tc"><input class="sbtn rd40 btn sbtn_green hmformBtn" type="submit" value="Submit
" /></div>
	                              </form>
                                   <script type="text/javascript">
                                        $('.hmformBtn').click(function(){
                                             tel = $('.hmform #tel');
                                             username=$('.hmform #username').val();
                                             var zz = /^[0-9][0-9][0-9]{4,9}$/;
                                             var dh=/^[0-9][0-9][0-9]{11}$/;
                                             if(tel.val() && username){
                                                  if (!(zz.test(tel.val()) || dh.test(tel.val()))) {
                                                    $('.hmform #tel').focus();
                                                    $('.hmform #tel').next('.msg').html('The format of your mobile number is incorrect！');
                                                    return false;
                                                  }else{
                                                    $('.hmform #tel').next('.msg').html('');
                                                  }
                                             }
                                        });
                                   </script>
	                              <div class="subAchieve">
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
	                              </div>
	                         </div>
	               </li>
	               <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side03.png" alt="" class="tp"></a>
	                    <div class="codeLay">
	                         <img src="<?php echo sys('sys_img9');?>" alt="" class="tp">
	                         <p class="tit">Public account of Mr.Menu
							 </p>
	                    </div>
	               </li>
	               <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side04.png" alt="" class="tp"></a>
	                    <div class="codeLay">
	                              <img src="<?php echo sys('sys_img8');?>" alt="" class="tp">
	                              <p class="tit">Weibo of Mr.Menu
								  </p>
	                         </div>
	               </li>
	               <li class="codeBtn"><a href="javascript:;"><img src="./images/icon/side05.png" alt="" class="tp"></a>
	                    <div class="codeLay">
	                              <img src="<?php echo sys('sys_img7');?>" alt="" class="tp">
	                              <p class="tit">Tiktok of Mr.Menu
								  </p>
	                         </div>

	          </ul>
	     </div><?php endif; ?>
</body>
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
</html>