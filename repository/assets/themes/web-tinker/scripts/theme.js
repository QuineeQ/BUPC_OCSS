var successList = $('.success-list');

if(successList.length) {
    setTimeout(function() {
        successList.addClass('hide');
    }, 5000);
}

var navbar = $('nav')

if(navbar.length) {
    var background = navbar.attr('background');
    navbar.css('background', background);
}


var floatingLabels = $('.floating-label');
var textInputs = floatingLabels.find('[type=text], [type=password], [type=email]');

textInputs.each(function() {

    $(this).attr('autocomplete', 'off');
    $(this).attr('placeholder', ' ');

    var attr = $(this).attr('custom-placeholder');  

    if(typeof attr !== 'undefined' && attr !== false) {

        placeholderName = attr;

    } else {

        placeholderName = $(this).attr('name');
        placeholderName = placeholderName.replace('_', ' ');
        placeholderName = placeholderName.replace(/^(.)|\s+(.)/g, function(x) {
            return x.toUpperCase();
        });

    }

    $(this).after('<label class="input-label">' + placeholderName + '</label>');
});

var passwordInput = $('[type=password]');

if(passwordInput.length) {
    var showPassword = false;
    passwordInput.before('<a class="password-toggler"><i class="fas fa-eye"></i></a>');
    var passwordToggler = $('.password-toggler');
    if(passwordToggler) {
        passwordToggler.on('click', function() {
            if(!showPassword) {
                passwordInput.attr('type', 'text');
                passwordToggler.html('<i class="fas fa-eye-slash"></i>');
                showPassword = true;
            } else {
                passwordInput.attr('type', 'password');
                passwordToggler.html('<i class="fas fa-eye"></i>');
                showPassword = false;
            }
        });
    }
}

var body = $('body');

if(body) {
    if(body.attr('formvalidation')) {
        if(body.attr('formvalidation').normalize() == "on") {
            textInputs.each(function() {
                $(this).on('keyup', function() {
                    var nameValue = $(this).attr('name');
                    var inputValue = $(this).val();
                    var formGroup = $('.val-' + nameValue);
                    for(var i = 0; i < validations.length; i++) {
                        if(nameValue.normalize() === validations[i].name.normalize()) {
                            var validator = validations[i];
                            for(var j = 0; j < validator.validators.length; j++) {
                                var checkValidity = validator.validators[j];

                                if(checkValidity.checkInput(inputValue)) {
                                    invalidInput(formGroup, checkValidity.invalidMessage)
                                    $(this)[0].setCustomValidity(checkValidity.invalidMessage);
                                    break;
                                }
                                else {
                                    validInput(formGroup, 'Nice, Very Good!')
                                    $(this)[0].setCustomValidity('');
                                }
                            }
                        }
                    }
                })  
            })
        }
    }
}

function invalidInput(element, message) {
    element.addClass('invalid')
    element.removeClass('valid')
    var icon = '<i class="far fa-exclamation-circle mr-2"></i>';
    element.children('.input-info').html(icon + message)
}
function validInput(element, message) {
    element.removeClass('invalid')
    element.addClass('valid')
    var icon = '<i class="far fa-check-circle mr-2"></i>';
    element.children('.input-info').html(icon + message)
}