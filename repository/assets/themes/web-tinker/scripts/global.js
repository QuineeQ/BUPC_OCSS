var invalidMessages = [

	{key: '!email', value: 'Input a valid email address'},
	{key: 'str=0', value: 'The input must not be empty'},
	{key: 'str>255', value: 'The input must not exceed 255 characters'},
	{key: 'str<6', value: 'Input atleast 6 characters'},
	{key: 'str<2', value: 'Input atleast 2 characters'},
	{key: 'str<11', value: 'Input atleast 11 characters'},
	{key: 'phonenum', value: 'Input a valid contact number and atleast 11 characters'},
	{key: 'ltrnum', value: 'Letters and numbers only'},

]

function invmsg(key) {

	var result = '';

	for(var i = 0; i < invalidMessages.length; i++) {

		var invalidMessage = invalidMessages[i];

		if(invalidMessage.key.normalize() === key.normalize()) {

			result = invalidMessage.value;
			break;

		}

	}

	return result;

}
