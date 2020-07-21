jQuery(document).ready(function($) {
    // 手机头部浮动
    $(window).scroll(function(){

        if( $(window).scrollTop() > 50 ){
            $('#cui-mobile-header').addClass('cui-mobile-header-fix');
        }else{
            $('#cui-mobile-header').removeClass('cui-mobile-header-fix');
        };
        
    });

    // 菜单
    $('.m_menu').click(function(e){
        if( $('.m_nav').is(':visible') ){
            $('.m_nav').slideUp(400);
        };

        $('.m_nav').stop().slideToggle(400);
        e.stopPropagation();
    });
    $('#cui-mobile-pop-menu a.v1').click(function(){
        if( $(this).next('dl').length > 0 ){
            $(this).parents('li').siblings('li').removeClass('on');
            $(this).parents('li').toggleClass('on');
            $(this).parents('li').siblings('li').find('dl').stop().slideUp(400);
            if( $(this).parents('li').hasClass('on') ){
                $(this).parents('li').find('dl').stop().slideDown(400);
            }else{
                $(this).parents('li').find('dl').stop().slideUp(400);
            };
            return false;
        }
    });
    $('#cui-mobile-pop-menu').click(function(e){
        e.stopPropagation();
    });
    $('body').click(function(){
        $('#cui-mobile-pop-menu').slideUp(400);
        $('.search-btn').removeClass('search-btn-on');
        $('#cui-mobile-so-box').stop().slideUp(300);
    });

    // 搜索框
    $('.search-btn').click(function(e){
        if( $('#cui-mobile-pop-menu').is(':visible') ){
            $('#cui-mobile-pop-menu').slideUp(300);
        };

        $(this).toggleClass('search-btn-on');
        $('#cui-mobile-so-box').stop().slideToggle(400);
        e.stopPropagation();

        $('.moban-top').toggleClass('moban-top-on');
    });
    $('#cui-mobile-so-box').click(function(e) {
        e.stopPropagation();
    });
});
