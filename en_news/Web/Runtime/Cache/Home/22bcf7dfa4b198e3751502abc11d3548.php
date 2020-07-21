<?php if (!defined('THINK_PATH')) exit(); $PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']); $PHP_URL=basename($PHP_SELF); $id=I('request.id',0); $pid=I('request.pid',0); $ty=I('request.ty',0); $tty=I('request.tty',0); $ttty=I('request.ttty',0); if($id){ $bd=M('news')->field("pid,ty,tty,ttty,title,seotitle,seokeywords,seodescription")->where("status=1 AND id={$id}")->find(); if($bd){ $id=$id; $vpid=$bd['pid']; cookie('vpid',$vpid,62400); $vty=$bd['ty']; $vtty=$bd['tty']; $vttty=$bd['ttty']; $Title=$bd['title']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($pid&&$id==0){ if($ty) $zid=$ty; else $zid=$pid; $vtty=$tty; $vttty=$ttty; $bd=M('sort')->field("catname,seotitle,seokeywords,img1,seodescription")->where("status=1 AND id={$zid}")->find(); if($bd){ if($pid) $vpid=$pid; if($ty) $vty=$ty;else $vty=$zid; $banner_img=$bd['img1']; $Title=$bd['catname']; $Seotitle=$bd['seotitle']; $Seokeywords=$bd['seokeywords']; $Seodescription=$bd['seodescription']; } }elseif($id==0){ $vpid=0; $Seotitle=sys('sys_seotitle'); $Seokeywords=sys('sys_seokeywords'); $Seodescription=sys('sys_seodescription'); } if($Custitle){ $Seotitle=$Custitle; }else{ if($Title) $Seotitle="{$Title}_";elseif($Seotitle) $Seotitle="{$Seotitle}_";else $Seotitle=""; } ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo ($Seotitle); ?>_<?php echo sys('sys_sitename');?></title>
    <meta name="keywords" content="<?php echo ($Seokeywords); ?>" />
    <meta name="description" content="<?php echo ($Seodescription); ?>" />
    <meta name="viewport" content="width=device-width">
    <link href="static/css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="static/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="static/js/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="static/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="static/js/jquery.superslide.js"></script>
    <script src="static/js/common.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">
    $(function() {

        $(".indexMain ul li:nth-child(4)").css("margin-right","0")
    });
    $(document).ready(function(){
        $('.nav-btn').click(function(){
            $('.nav').toggle();
        });
        $(".nav-show").hide();

        $(".nav").hover(function(){
            $(".nav-show").show();
        },function(){
            $(".nav-show").hide();
        });

        $(".nav-show").hover(function(){
            $(".nav-show").show();
        },function(){
            $(".nav-show").hide();
        });
    })
</script>
<header>
    <div class="wrap">
        <div class="fl"><a href="/"><img class="logo" src="<?php echo sys('sys_img1');?>"></a></div>
        <div class="fr">
            <div class="lan"><a href="/"><img src="static/picture/icon-lan-cn.jpg"></a> <a style="padding-right:0" href="#"><img src="static/picture/icon-lan-en.jpg"></a></div>
            <ul class="list-none nav-btn fr"><li class="l1"></li><li></li><li></li></ul>
            <ul class="nav">
                <li><a href="/">首页</a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(1,10,33);?>"><?php echo get_sort_zd(1);?></a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(2,12);?>"><?php echo get_sort_zd(2);?></a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(3,14,38);?>"><?php echo get_sort_zd(3);?></a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(4,18);?>"><?php echo get_sort_zd(4);?></a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(5,21);?>"><?php echo get_sort_zd(5);?></a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(6,23);?>"><?php echo get_sort_zd(6);?></a></li>
                <li class="line"> | </li>
                <li><a href="<?php echo get_nav_url(7,27);?>"><?php echo get_sort_zd(7);?></a></li>
            </ul>
        </div>
    </div>
</header>


<?php if($vpid==0){?>
    <div class="index_focus">
        <div class="bd">
            <ul class="list-none">
                <?php $_result=get_news(9,31,0,0,'*',10,0,'asc');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><img src="<?php echo get_img($v['img1']);?>" width="100%"></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <a href="javascript:;" class="index_focus_pre">&nbsp;</a>
        <a href="javascript:;" class="index_focus_next">&nbsp;</a>
    </div>

<?php }else{?>
    <div class="pagebanner"><img src="<?php echo get_zd_name('img1','sort',"id=".$vpid."");?>"></div>
    <div class="clearfix"></div>

    <div class="local">
        <div class="wrap">
            <a href="/">首页</a> >
            > <?php echo get_sort_zd($vpid);?>
            > <?php echo get_sort_zd($vty);?>
        </div>
    </div>
<?php }?>




<div class="page">
     <div class="wrap">
          <div class="side">
    <img src="<?php echo get_zd_name('img2','sort',"id=".$vpid."");?>">
    <ul class="sidenav">

        <?php if($vpid==3){?>

        <li>
            <h3><?php echo get_sort_zd(8);?></h3>
            <?php $_result=get_sort_list(8);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div id="div_85" class="class1">
                <a id="cate_85" href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><span>></span><?php echo ($v["catname"]); ?></a>
                <div class="class2">

                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </li>
        <li>
            <h3>产品分类</h3>
            <?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="class1">
                <a  href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><span>></span><?php echo get_sort_zd($v['id']);?></a>
                <div class="class2">
                    <?php $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a id="cate_92" href="<?php echo get_sort_url($v['pid'],$v2['pid'],$v2['id'],$v['linkurl']);?>"><span>></span><?php echo get_sort_zd($v2['id']);?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </li>

        <?php }else{?>
		
        
			<?php if($vpid==1){?>
				<?php $_result=get_sort_list($vpid);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
					<h3><?php echo ($v["catname"]); ?></h3>
					<?php $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($vpid,$v2['pid'],$v2['id'],$v['linkurl']);?>" <?php if($v2['id']==$vtty) echo 'class="current"';?>><span>></span><?php echo ($v2["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php }else{?>
				<?php $_result=get_sort_list($vpid);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if($vpid==4){?>class="service"<?php }?>><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>" <?php if($v['id']==$vty) echo 'class="current"';?>><span>></span><?php echo ($v["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php }?>
      
        <?php }?>

    </ul>

    <script type="text/javascript">
        $(function () {
            $('#cate_' + $('#cate').attr('data-id')).addClass('current');
        });
    </script>

    <img class="sidecontactimg" src="static/picture/side-top-contact.jpg">
    <div class="sidecontact"><?php echo sys('sys_address');?><br>
        TEL : <?php echo sys('sys_phone');?><br>
        FAX : <?php echo sys('sys_fax');?></div>
</div>
          <?php $_result=get_news($vpid,$vty,$vtty,0,'*',1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="main">
                    <div class="editor">
                         <?php echo get_html($v['content']);?>

                    </div>
               </div><?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="clearfix"></div>
     </div>
</div>



<footer>
	<div class="wrap">
		<div class="footnav">
			<ul>
				<li><h4><?php echo get_sort_zd(1);?></h4>
					<?php $_result=get_sort_list(1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $_result=get_sort_list($v['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v2['pid'],$v2['id'],$v['linkurl']);?>"><?php echo ($v2["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
				</li>
				<li><h4><?php echo get_sort_zd(2);?></h4>
					<?php $_result=get_sort_list(2);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
				<li><h4><?php echo get_sort_zd(3);?></h4>
					<?php $_result=get_sort_list(8);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					<?php $_result=get_sort_list(3);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
				<li><h4><?php echo get_sort_zd(4);?></h4>
					<?php $_result=get_sort_list(4);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
				<li><h4><?php echo get_sort_zd(5);?></h4>
					<?php $_result=get_sort_list(5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
				<li><h4><?php echo get_sort_zd(6);?></h4>
					<?php $_result=get_sort_list(6);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
				<li><h4><?php echo get_sort_zd(7);?></h4>
					<?php $_result=get_sort_list(7);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo get_sort_url($v['pid'],$v['id'],0,$v['linkurl']);?>"><?php echo ($v["catname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</li>
			</ul>
		</div>
		<ul class="qrs">
			<li><img src="<?php echo sys('sys_img4');?>" width="95" height="95"><span>关注 官方微信</span></li>
			<li><img src="<?php echo sys('sys_img5');?>" width="95" height="95"><span style=" color:#fff">关注 公众号</span></a></li>
		</ul>
		<div class="clearfix"></div>
		<img class="footimg" src="<?php echo sys('sys_img3');?>">
	</div>
	<div class="copyright"><?php echo sys('sys_copyright');?></div>

</footer>
</body>
</html>