//START
    name: 'folder_name',     
    validators: [       
        {
            checkInput: function(value) {
                return value.trim().length == 0;
            },
            invalidMessage: invmsg('str=0')
        },
        {
            checkInput: function(value) {
                return value.trim().length > 255;
            },
            invalidMessage: invmsg('str>255')
        }/*,
        {
            checkInput: function(value) {
                var illegalCharacters = value.match(/^0-9a-zA-Z$/);
                return illegalCharacters ? false : true;        
            },
            invalidMessage: 'Only letters, numbers and some special characters like space (.,-)'
        }*/
    ]
//END