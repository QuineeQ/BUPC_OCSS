var inputFiles = $('#uploadButton');

inputFiles.each(function() {
    $(this).on('change', function(e) {
        
        var fileName = '';
        var image = $(this).prev();
        var label = $(this).next();
        
        if(this.files)
            fileName = e.target.value.split('\\').pop();

        if(fileName)
            if(fileName.length > 16)
                label.find('span.upload-name').html((fileName.slice(0, -(fileName.length - 16))) + '...');
            else
                label.find('span.upload-name').html(fileName);
        else
            label.find('span.upload-name').html('Upload Photo');

        image.attr('src', URL.createObjectURL(e.target.files[0]));
        image.onload = function() {
            URL.revokeObjectURL(output.src);
          }

    });
    
});
