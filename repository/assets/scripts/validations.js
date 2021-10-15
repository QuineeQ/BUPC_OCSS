validations = [
    {
    name: 'business_name',     
    validators: [
        {
            checkInput: function(value) {
                return value.trim().length == 0;
            },
            invalidMessage: invmsg('str=0')
        }
    ]
    },
    {
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
    },
    {
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
    },
    {
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
    },
    {
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
    },
    {
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
    },
    {
        name: 'middle_name',     
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
    },
    {
        name: 'name',     
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
    },
    {
    name: 'password',
    validators: [       
        {
            checkInput: function(value) {
                return value.trim().length < 6;
            },
            invalidMessage: invmsg('str<6')
        },
        {
            checkInput: function(value) {
                return value.trim().length > 255;
            },
            invalidMessage: invmsg('str>255')
        },
        {
            checkInput: function(value) {
                return value.trim().length == 0;
            },
            invalidMessage: invmsg('str=0')
        },
        {
            checkInput: function(value) {
                var illegalCharacters = value.match(/[^a-zA-Z0-9]/g);
                return illegalCharacters ? true : false;    
            },
            invalidMessage: invmsg('ltrnum')
        }
    ]
    },
    {
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
    },
    {
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
    }
];
