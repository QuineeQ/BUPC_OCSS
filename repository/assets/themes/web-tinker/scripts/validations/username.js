//START
name: 'username',
validators: [       
    {
        checkInput: function(value) {
            return value.trim().length < 6;
        },
        invalidMessage: 'Input needs to be at least 6 characters'
    },
    {
        checkInput: function(value) {
            return value.trim().length == 0;
        },
        invalidMessage: 'Input can\'t be empty'
    },
    {
        checkInput: function(value) {
            var illegalCharacters = value.match(/[^a-zA-Z0-9]/g);
            return illegalCharacters ? true : false;    
        },
        invalidMessage: 'Only letters and numbers only'
    }
]
//END