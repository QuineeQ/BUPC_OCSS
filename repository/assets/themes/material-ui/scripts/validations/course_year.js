//START
    name: 'course_year',     
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
        }
    ]
//END