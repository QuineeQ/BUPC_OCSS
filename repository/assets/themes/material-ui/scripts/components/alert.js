var alerts = $('.ui-alert');

alerts.each(function() {

	var alert = $(this);

	var alertMessage = alert.find('.ui-alert-message');

	if(alert.hasClass('ui-alert-info')) {

		var icon = document.createElement('i');
		icon.setAttribute('class', 'far fa-info-circle ui-alert-icon');
		alertMessage.before(icon);

	} else if(alert.hasClass('ui-alert-danger')) {

		var icon = document.createElement('i');
		icon.setAttribute('class', 'far fa-exclamation-triangle ui-alert-icon');
		alertMessage.before(icon);

	} else if(alert.hasClass('ui-alert-success')) {

		var icon = document.createElement('i');
		icon.setAttribute('class', 'far fa-check-circle ui-alert-icon');
		alertMessage.before(icon);

	}

});