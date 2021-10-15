var floatingLabel = $('.floating-label');

	if(floatingLabel.length) {
		
		var textInputs = floatingLabel.find('[type=text], [type=password], [type=email]');

		textInputs.each(function() {
			$(this).attr('placeholder', ' ');
			var fixedPlaceholder = $(this).attr('fixed-placeholder');
			var placeholderName = " ";
			if (typeof fixedPlaceholder !== 'undefined' && fixedPlaceholder !== false) {
				placeholderName = fixedPlaceholder;
			} else {
				placeholderName = fixedPlaceholder;
			    placeholderName = $(this).attr('name');
				placeholderName = placeholderName.replace('_', ' ');
				placeholderName = placeholderName.replace(/^(.)|\s+(.)/g, function(x) {
					return x.toUpperCase();
				});
			}
			$(this).after('<label class="form-input-label">' + placeholderName + '</label>');
		});

	}

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

	var modalTarget = $('[modal-target]');

	if(modalTarget.length) {
		modalTarget.on('click', function() {
			var modalTargetValue = $(this).attr('modal-target');
			var modal = $(modalTargetValue);
			if(modal)
				modal.addClass('shown');
		});
	}

	var modalClose = $('.wt-modal-close');

	modalClose.each(function() {
		modalClose.on('click', function() {
			var modals = $('.wt-modal');
			modals.each(function() {
				$(this).removeClass('shown');
			});
		});
	});

	var successList = $('.success-list');

	if(successList.length) {
		setTimeout(function() {
			successList.addClass('hide');
		}, 5000);
	}

	var dropdownTarget = $('[dropdown-target]');

	if(dropdownTarget.length) {
		dropdownTarget.on('click', function() {
			var dropdownTargetValue = $(this).attr('dropdown-target');
			var dropdown = $(dropdownTargetValue);
			if(dropdown.length)
				dropdown.toggleClass('shown');
		});
	}