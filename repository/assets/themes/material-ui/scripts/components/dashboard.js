var sidebar = $('.ui-sidebar');
var nav = $('.ui-nav');
//var state = 1; //0: hide, 1: show 

if(sidebar.length > 0 && nav.length > 0) {
    
    var screenWidth = window.innerWidth;
    var screenHeight = window.innerHeight;

    if(screenWidth < 960) {
        sidebar.addClass('auto-hide');
    } else {
        sidebar.removeClass('auto-hide');
    }
    
    var navToggler = nav.find('.ui-nav-toggler');

    navToggler.on('click', function() {
        if(sidebar.hasClass('auto-hide')) {
            sidebar.removeClass('auto-hide');
            sidebar.removeClass('hide');
        }
        else
            sidebar.toggleClass('hide');
    });

    $(window).on('resize', function() {
        var screenWidth = window.innerWidth;
        var screenHeight = window.innerHeight;

        if(screenWidth < 960) {
            sidebar.addClass('auto-hide');
        } else {
            sidebar.removeClass('auto-hide');
        }
    });
}