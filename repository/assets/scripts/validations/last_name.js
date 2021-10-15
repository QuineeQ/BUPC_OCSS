//START
    name: 'last_name',     
    validators: [       
        {
            checkInput: function(inputValue) {
                return inputValue.trim().length < 2; 
            },
            invalidMessage: 'Input needs to be at least 2 characters'
        },
        {
            checkInput: function(inputValue) {
                return inputValue.trim().length == 0;
            },
            invalidMessage: 'Input can\'t be empty'
        },
        {
            checkInput: function(inputValue) {
                var illegalCharacters = inputValue.match(/[^a-zA-Z., ]/g);
                return illegalCharacters ? true : false;    
            },
            invalidMessage: 'Only letters and some special characters like space (.,-)'
        }
    ]
//END