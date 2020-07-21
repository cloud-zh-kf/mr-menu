if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
 var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        wow.init();
};

$(function(){
	//首页导航鼠标放上效果
	$(".navul li a").hover(function(){
	    var w=$(this).innerWidth();
	    $(this).find(".ico").stop(true,false).animate({width:22+'px',marginLeft:-(22/2)+'px'},400)
	    },function(){
		    $(this).find(".ico").stop(true,false).animate({width:0+'px',marginLeft:0+'px'},400)
		    })
	//首页导航下拉
	$(".navul li").hover(
	  function(){
		  $(".subnav",this).stop(false,true);
		  $(".subnav",this).slideDown(200);
		  },
	  function(){
		  $(".subnav",this).stop(false,true);
		  $(".subnav",this).slideUp(200);
		  }
	)
	//手机导航
	$(".menubtn").click(function(){
		  $(this).toggleClass("on");
		  $(".inav").slideToggle();
		  $(".inav").find("li").toggleClass("on");
		  });
	$(".inav dl").each(function(index,element){
		if($(this).has("dd").length){
			$(this).find("dt a").attr("href","javascript:void(0)")
		}else{
			$(this).find("dt em").css("display","none");
			}
	});
	$(".inav dl").click(function(){
		$(this).find("dd").slideToggle().parent().siblings().find("dd").slideUp();
		$(this).find("dt").toggleClass("act_inav").parent().siblings().find("dt").removeClass("act_inav");
	})	
     //banner
	 var mySwiper = new Swiper('.banner', {
		// 如果需要分页器
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		// 如果需要前进后退按钮
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		loop: true,
		speed: 1000,
		// autoplay: true,
		autoplay: {
			delay: 4000,
			stopOnLastSlide: false,
			disableOnInteraction: true,
		},
		autoHeight: true,//高度随内容而变化
	});
	// tab
    function qiehuan(qhmain, qhan, qhshow, qhon) {
        $(qhan).click(function() {
            $(this).parents(qhmain).find(qhan).removeClass(qhon);
            $(this).addClass(qhon);
            var i = $(this).index();
            $(this).parents(qhmain).find(qhshow).eq(i).show();
            $(this).parents(qhmain).find(qhshow).eq(i).siblings(qhshow).hide();
        });
    }
    /*qiehuan(".hptab",".hp_tit span",".hpbox","act_hp");*/
    function qiehuan_hover(qhmain, qhan, qhshow, qhon) {
        $(qhan).hover(function() {
            $(this).parents(qhmain).find(qhan).removeClass(qhon);
            $(this).addClass(qhon);
            var i = $(this).index();
            $(this).parents(qhmain).find(qhshow).eq(i).show();
            $(this).parents(qhmain).find(qhshow).eq(i).siblings(qhshow).hide();
        });
    }
	/*qiehuan_hover(".hptab",".hp_tit span",".hpbox","act_hp");*/
		// 固定导航
	// Cache selectors for faster performance.
	var $window = $(window),
	$mainMenuBar = $('#mainMenuBar'),
	$mainMenuBarAnchor = $('#mainMenuBarAnchor');

// Run this on scroll events.
//scroll()
//当用户滚动指定的元素时，会发生scroll事件。
//scroll事件适用于所有可滚动的元素和window对象（浏览器窗口）
//scroll()方法触发scroll事件，或规定当发生scroll事件时运行的函数
$window.scroll(function() {
	//scrollTop()方法返回或设置匹配元素的滚动条的垂直位置
	var window_top = $window.scrollTop();
  //javascript用offsetTop();jquery用offset().top;
	var div_top = $mainMenuBarAnchor.offset().top;
	if (window_top > div_top) {
		// Make the div sticky.
		$mainMenuBar.addClass('stick');
		$mainMenuBarAnchor.height($mainMenuBar.height());
	}
	else {
		// Unstick the div.
		$mainMenuBar.removeClass('stick');
		$mainMenuBarAnchor.height(0);
	}
});
	// 首页-支持城市
	qiehuan(".hstab",".hstit span",".hsbox","act_hs");
	// 解决方案1
	qiehuan(".soluArea",".sa_tit li",".sabox","act_sa");
	
	//常见问题
	$(".joindl dt").click(function(){
		$(this).next("dd").slideToggle();
		$(this).toggleClass("act_join");
		
		$(this).siblings("dt").removeClass("act_join");
		$(this).next("dd").siblings("dd").slideUp();
		})

	//侧边浮动
		$('.hmformBtn').click(function(){
			$('.hmform').hide(200);
			$('.subAchieve').show(200);
		})
		$('.subAchieveBtn').click(function(){
			$('.hmform').hide(0);
			$('.subAchieve').hide(0);
		})
		$(window).scroll(function(){
			if($(window).scrollTop()>100){
				$(".floatpart").fadeIn();	
			}
			else{
				$(".floatpart").hide();
			}
		});
	
		$(".gotop").click(function(){
			$('html,body').animate({'scrollTop':0},500);
		});
	$('.messbtn,.hscanBtn').click(function(){
		$('.messlay').toggle();
	})

    //尺寸限制
	+f()
	window.onresize = function () {
		f();
	}
	function f() {
		var _height = $(window).height();
		var _width = $(window).width();
		if(_width<767){
			document.getElementsByTagName("html")[0].style.fontSize = _width * (1/7.5) + "px";
			//手机适配
			setTimeout(function(){
				$('body').css('opacity',1)
				},300)
		}
		if(_width<1200){
			

		}
		// 相关资讯
		var limit1=$('.newsul .tparea').width();
		$('.newsul .tparea .tp').height((228/384) * limit1);
		// 合作餐厅列表
		var limit2=$('.cooResul li a').width();
		$('.cooResul li a .tp').height((100/180) * limit2);
		// 解决方案
		var limit3=$('.sabox').width();
		$('.sabox .tp').height((588/272) * limit3);
		// 首页-产品功能
		var limit4=$('.hmanul .tparea ').width();
		$('.hmanul .tparea  .tp').height((550/300) * limit4);

		// 添加内容
		var limit5=$('.hmItem3ul .tparea').width();
		$('.hmItem3ul .tparea .tp').height((465/280) * limit5);
		var limit6=$('.hposul li a').width();
		$('.hposul li a .tp').height((80/220) * limit6);
		var limit7=$('.appFul .tparea').width();
		$('.appFul .tparea .tp').height((48/28) * limit7);
		var limit8=$('.mobileFul .tparea').width();
		$('.mobileFul .tparea .tp').height((440/244) * limit8);
		var limit9=$('.websiteFul .tparea').width();
		$('.websiteFul .tparea .tp').height((214/384) * limit9);
		
	}
	
})



