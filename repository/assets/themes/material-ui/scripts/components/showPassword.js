var passwordWrappers = $('.ui-password-wrapper');

passwordWrappers.each(function() {

    var passwordWrapper = $(this);
    var passwordInput = passwordWrapper.find('[type=password]');

    if(passwordInput.length > 0) {

        var showPassword = false;
        var passwordToggler = document.createElement('a');
        passwordToggler.setAttribute('class', 'ui-password-toggler');
        passwordToggler.innerHTML = '<i class="far fa-eye"></i>';
        passwordInput.before(passwordToggler);

        var passwordToggler = passwordWrapper.find('.ui-password-toggler');

        passwordToggler.on('click', function() {
            if(!showPassword) {
                passwordInput.attr('type', 'text');
                passwordToggler.html('<i class="far fa-eye-slash"></i>');
                showPassword = true;
            } else {
                passwordInput.attr('type', 'password');
                passwordToggler.html('<i class="far fa-eye"></i>');
                showPassword = false;
            }
        });

    }

});