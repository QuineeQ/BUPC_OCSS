//START
name: 'business_name',     
validators: [
    {
        checkInput: function(value) {
            return value.trim().length == 0;
        },
        invalidMessage: invmsg('str=0')
    }
]
//END