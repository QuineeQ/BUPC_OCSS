//START
name: 'home_address',     
validators: [       
    {
        checkInput: function(inputValue) {
            return inputValue.trim().length == 0;
        },
        invalidMessage: 'Input can\'t be empty'
    },
    {
        checkInput: function(inputValue) {
            return inputValue.trim().length < 2; 
        },
        invalidMessage: 'Input needs to be at least 2 characters'
    }
]
//END