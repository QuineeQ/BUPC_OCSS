var selectInputs = $('.ui-select');


selectInputs.each(function() {
    var selectInput = $(this);
    var selectInputToggler = selectInput.find('.ui-select-toggler');
    var selectInputMenu = selectInput.find('.ui-select-menu');  

    selectInputToggler.after('<span class="ui-select-icon"></span>');
   
    var selectInputIcon = selectInput.find('.ui-select-icon');
    
    selectInputIcon.html('<i class="far fa-chevron-down"></i>');
    
    selectInputToggler.on('click', function() {
          
        selectInputMenu.toggleClass('active');

        if(selectInputMenu.hasClass('active')) {
            
            selectInputIcon.html('<i class="far fa-chevron-up"></i>');
            
            var selectInputMenuItems = selectInputMenu.find('.ui-select-menu-item');
            
            selectInputMenuItems.each(function() {
                var selectInputMenuItem = $(this);  
                var itemLabel = selectInputMenuItem.find('label');  
                itemLabel.on('click', function() {
                    selectInputToggler.html(itemLabel.html());
                    selectInputMenu.removeClass('active');
                    selectInputIcon.html('<i class="far fa-chevron-down"></i>');
                });
            });
        }
        else {
            selectInputIcon.html('<i class="far fa-chevron-down"></i>');
        }

    });
});