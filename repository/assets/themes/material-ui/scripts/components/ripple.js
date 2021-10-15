var parents = $('.ui-button, .ui-sidebar-menu-item, .ui-nav-toggler, .ui-nav-menu-item');

if(parents.length > 0) {
    parents.each(function() {
        var parent = $(this);
        parent.on('click', function(e) {

            var diameter = Math.max(parent.innerWidth(), parent.innerHeight());
            var radius = diameter / 2;
            var x = e.clientX - parent.offset().left - radius;
            var y = e.clientY - parent.offset().top - radius;

            var ripple = document.createElement('span');
            ripple.setAttribute('class', 'ripple');
            ripple.style.width = `${diameter}px`;
            ripple.style.height = `${diameter}px`;
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';

            parent.append(ripple);

            setTimeout(function() {
                ripple.remove();
            }, 500);

        });
    });
}