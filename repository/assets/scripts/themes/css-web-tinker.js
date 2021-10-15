
$(document).ready(function() {
    var showPassword = $('.show-password')
    
    showPassword.on('click', function() {
        var passwordInput = $('[name=password]')
        if(showPassword[0].checked)
            passwordInput.attr('type', 'text')
        else
            passwordInput.attr('type', 'password')
    })

    var bread = $('.own-breadcrumbs.breadcrumbs-responsive')
    var child = bread.children('.own-breadcrumb-item.active')
    bread.scrollLeft(child.position().left);

    $(window).on('resize', function() {
       bread.scrollLeft(child.position().left);
    })

    $('.scrollbar-to-bottom').scrollTop($(this).innerHeight());

    var body = $('body')

    if(body) {
        if(body.attr('formvalidation')) {
            if(body.attr('formvalidation').normalize() == "on") {
                var inputs = $('[type=text], [type=password]');
                inputs.each(function() {
                    $(this).on('keyup', function() {
                        var nameValue = $(this).attr('name')
                        var inputValue = $(this).val()
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
        var icon = '<i class="fas fa-exclamation-circle mr-fixed-10"></i>';
        element.children('.input-info').html(icon + message)
    }
    function validInput(element, message) {
        element.removeClass('invalid')
        element.addClass('valid')
        var icon = '<i class="fas fa-check-circle mr-fixed-10"></i>';
        element.children('.input-info').html(icon + message)
    }
    
})