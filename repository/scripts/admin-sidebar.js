var sidebarToggler = $('.toggler');
var sidebar = $('.sidebar');
var wrapper = $('.wrapper');

sidebarToggler.on('click', function() {
    sidebar.toggleClass('hide');
    if(sidebar.hasClass('hide')) {
        wrapper.css('margin-left', '128px');
    } else {
        wrapper.css('margin-left', '312px');
    }
}); 