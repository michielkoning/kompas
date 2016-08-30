function validateEmail(email) {
	var pattern  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return email.match(pattern);
}

function validateInput($input) {

	var isValid = true;
	$input.removeClass('error');

	if ($input.attr('type') === 'email') {
		isValid = validateEmail($input.val());
	}

	if ($input.val() === '') {
		isValid = false;
	}

	if (!isValid) {
		$input.addClass('error');
	}

	return isValid;
}

var form = function($) {
	$document.ready(function(){
		$('form').attr('novalidate', true);
		$('form').submit(function(event){

			event.preventDefault();

			var hasErrors = false,
				$form = $(this),
				$message = $form.find('.form-message');

			$message.removeClass('active');

			$form.find('input[required], textarea[required]').each(function(){
				if (!validateInput($(this))) {
					hasErrors = true;
				}
			});

			var data = $form.serializeArray();
			data.push({
				name: "ajax",
				value: true
			});
			data = $.param(data);

			if (hasErrors) {
				$message.addClass('active');
			} else {
				$.ajax({
					type: "POST",
					url: ajaxurl,
					data: data
				}).done(function(response) {
					$form.html(response);
				});
			}
		});

		$('input[required], textarea[required]').blur(function(){
			validateInput($(this));
		});
	});
}(jQuery);