//START
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
//END
