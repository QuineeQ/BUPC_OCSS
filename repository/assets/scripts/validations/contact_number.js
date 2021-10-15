//START
name: 'contact_number',     
validators: [       
    {
        checkInput: function(inputValue) {
            return inputValue.trim().length == 0;
        },
        invalidMessage: invmsg('str=0')
    },
    {
        checkInput: function(inputValue) {
            return inputValue.trim().length < 11; 
        },
        invalidMessage: invmsg('str<11')
    },
    {
        checkInput: function(inputValue) {
            var illegalCharacters = inputValue.match(/^09\d{9}$/);
            return illegalCharacters ? false : true;    
        },
        invalidMessage: invmsg('phonenum')
    }
]
//END