//START
name: 'email_address',
validators: [
    {
        checkInput: function(inputValue) {
            return inputValue.trim().length == 0;
        },
        invalidMessage: invmsg('str=0')
    },
    {
        checkInput: function(inputValue) {
            return inputValue.trim().length < 6;
        },
        invalidMessage: invmsg('str<6')
    },
    {
        checkInput: function(value) {
            var illegalCharacters = value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
            return illegalCharacters ? false : true;
        },
        invalidMessage: invmsg('!email')
    }
]
//END
