function goTop(){	
	$(window).scroll(function(e) {
		if($(window).scrollTop()>100)
			$(".gotop").fadeIn(350).css("display","block");
		else
			$(".gotop").fadeOut(350).css("display","none");
	});
		
	$(".gotop").click(function(e) {
		$('body,html').animate({scrollTop:0},500);
		return false;
	});		
};

$(document).ready(function() { 
	// 多语言
	$('.language ul.sf-menu').superfish({ 
		delay:       500,
		animation:   {opacity:'fast',height:'show'},
		speed:       'fast',
		autoArrows:  true,
		dropShadows: false
	});
	
	// 导航菜单
	$('.main-nav ul.sf-menu').superfish({ 
		delay:       500,
		animation:   {opacity:'fast',height:'show'},
		speed:       'fast',
		autoArrows:  true,
		dropShadows: false 
	}); 
	//$('.main-nav ul.sf-menu > li').last().addClass('last').end().hover(function(){ $(this).addClass('nav-hover'); },function(){ $(this).removeClass('nav-hover'); });
	
	
	//tab		
	$(".tabs-nav").tabs(" > .tabs-panes > div");
		
	// accordion
	$(".accordion").tabs(".accordion .accordion-pane", {tabs: '.accordion-handle', effect: 'slide',initialIndex: 0});	
	$.tools.tabs.addEffect("slide", function(tabIndex, done) {
		this.getPanes().slideUp("fast").eq(tabIndex).slideDown("fast");
		done.call();
	});
		
	
	//显示（视频、图片弹窗）说明
	$('.portfolio-img').hover(function(){
		//$(this).find('.opacity-overlay').show();
	},function(){
		//$(this).find('.opacity-overlay').hide();
	});
	
	
	//table
	/*
	$(".table tbody>tr:odd").addClass("odd-row");
	$(".table tbody>tr:even").addClass("even-row");
	$(".table tbody>tr").hover(function(){ 
		$(this).addClass("trhover");
	},function(){
		$(this).removeClass("trhover");
	});*/
	
	//左右悬浮
	$(".fixed-left").fixed({halfTop : true});
	$(".fixed-right").fixed({halfTop : true});	
	//
	$(".service-close-btn").click(function(){
		var serviceMax =  $(this).parents(".service-max"),
			serviceMin =  serviceMax.next(".service-min");		
		serviceMin.show();
		serviceMax.hide();
	});		
	$(".service-open-btn").click(function(){
		var serviceMax =  $(this).prev(".service-max"),
			fixedELement = $(this).parents(".fixed");		
		$(this).hide();
		serviceMax.show();
	});
	
	//返回顶部
	goTop();
	
	
	
    var isMobile = device.mobile(),
    	isTable  = device.tablet(),
    	isiPhone = device.iphone(),
    	isiPad   = device.ipad();
      
    if(isMobile || isTable || isiPhone || isiPad){  
     	$('a').removeAttr('target');
    }	
    
}); 