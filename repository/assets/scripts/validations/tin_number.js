//START
name: 'tin_number',     
validators: [
    {
        checkInput: function(value) {
            return value.trim().length == 0;
        },
        invalidMessage: 'Input can\'t be empty'
    },   
    {   
        checkInput: function(value) {
            var illegalCharacters = value.match(/^\d{3}-\d{3}-\d{3}-\d{3}$/);
            return illegalCharacters ? false : true;
        },  
        invalidMessage: 'Please input a valid TIN Number e.g., (177-528-817-000)'
    }
]
//END