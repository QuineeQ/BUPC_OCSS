var breadcrumbsItems = $('.ui-breadcrumbs .item');

breadcrumbsItems.each(function() {
    var item = $(this);
    item.on('click', function() {
        breadcrumbsItems.each(function() {
            $(this).removeClass('active');
        });
        item.toggleClass('active');
        $('.pages').each(function() {
            var page = $(this);
            if(page.hasClass(item.attr('data-page'))) {
                if(!page.hasClass('active'))
                    page.addClass('active');
            } else {
                page.removeClass('active');
            }
        });
    });
});

var commentSections = $('.comments-section');

commentSections.each(function() {
    var commentSection = $(this);
    var tgl = commentSection.find('.tgl');
    tgl.on('click', function() {
        if(commentSection.hasClass('active'))
            tgl.html('<i class="fas fa-chevron-down"></i>');
        else
            tgl.html('<i class="fas fa-chevron-up"></i>');
        commentSection.toggleClass('active');
    });
});