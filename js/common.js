$(document).ready(function(){

    $('#load-posts a').addClass('show_more_btn');

    $('#user').click(function(e) {
        e.preventDefault();
        $('.log_toggle_form').slideToggle(100);
    });

    var mainMenu = $('.main_menu'),
    	toggleMnu = $('.toggle_mnu'),
    	wind = $(window);

	$(toggleMnu).click(function() {
        $('.sandwich').toggleClass("active");

    });

    $(toggleMnu).click(function() {
        if ($(mainMenu).is(':visible')) {
            $('.top_text').removeClass('h_opasify');
            $(mainMenu).fadeOut(600);
        } else {
            $('.top_text').addClass('h_opasify');
            $(mainMenu).fadeIn(600);
        };
    });

    if($(wind).width() < 992) {
	    $('.main_menu a').click(function() {
		    	$(mainMenu).fadeOut(600);
		    	$('.sandwich').toggleClass("active");
	    });
    }
	    	
	var windowResize = function () {
    	if($(wind).width() > 992) {
    		mainMenu.css('display', 'block');
    	} else {
    		mainMenu.css('display', 'none');
    	}
    };

    var menuToTop = function() {
    	if($(wind).scrollTop() <= 70) {
    		$(toggleMnu).css('top', '');
    	} else if ($(wind).scrollTop() > 70) {
    		$(toggleMnu).css('top', '20px');
    	}
    };

    $(wind).scroll(function() {
    	menuToTop();
    });

    $(wind).resize(function() {
        windowResize();    
    });
});
