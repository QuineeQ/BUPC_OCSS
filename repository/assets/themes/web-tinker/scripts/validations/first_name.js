//START
    name: 'first_name',     
    validators: [       
        {
            checkInput: function(value) {
                return value.trim().length < 2;
            },
            invalidMessage: invmsg('str<2')
        },
        {
            checkInput: function(value) {
                return value.trim().length == 0;
            },
            invalidMessage: 'Input can\'t be empty'
        },
        {
            checkInput: function(value) {
                var illegalCharacters = value.match(/[^a-zA-Z., ]/g);
                return illegalCharacters ? true : false;    
            },
            invalidMessage: 'Only letters and some special characters like space (.,-)'
        }
    ]
//END