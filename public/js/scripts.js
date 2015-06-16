function Common () {
    
    this.BodyLoad = function() {
	    //All pages load on top
		$('body').animate({
			scrollTop:0
		});
    }
    
    this.LoadFunctions = function() {
	    var ww = $(window).width(), wh = $(window).height();
	    
		//Body and main content min height 
		$('#main').css({
			'min-height':wh - 92
		});
		
		$('body, body.landing-page, .landing-page #main').css({
			'min-height':wh - 50
		});
    }
    
    this.MainMenu = function() {
	    var ww = $(window).width(), wh = $(window).height();
			
		//Menus min height
		$('.mobile-menu-inner, .profile-menu-inner').css('min-height',wh);
		
		//Main menu button	
		$('.menu-btn').click(function(){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$('.main-inner').removeClass('mobile-menu-visible');
				$('.mobile-menu-inner').removeClass('active');
				$('#header').removeClass('main-active');
			} else {
				$(this).addClass('active');
				$('.main-inner').addClass('mobile-menu-visible');
				$('.mobile-menu-inner').addClass('active');
				$('#header').addClass('main-active');
			}
			return false;
		});
		
		// Profile button
		$('.profile-btn').click(function(){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$('.main-inner').removeClass('profile-menu-visible');
				$('.profile-menu-inner').removeClass('active');
				$('#header').removeClass('profile-active');
			} else {
				$(this).addClass('active');
				$('.main-inner').addClass('profile-menu-visible');
				// $('.bottom-bar').addClass('inactive');
				$('.profile-menu-inner').addClass('active');
				$('#header').addClass('profile-active');
			}
			return false;
		});
    }
}

var common = new Common;

$(document).ready(function(){
	
	common.BodyLoad();
	common.MainMenu();
	common.LoadFunctions();
	
});

//Resize functions
$(window).resize(function(){
	
	common.LoadFunctions();
	
});