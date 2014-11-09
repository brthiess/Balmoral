$(function() {


	var form = $('[id^=form]');
	
	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		console.log(form);
		console.log(e);
		
		// Stop the browser from submitting the form.
		e.preventDefault();
		
		form = event.target.id;
		console.log(form);
		// Serialize the form data.
		var formData = $("#" + form).serialize();
		console.log(formData);
		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $("#" + form).attr('action'),
			data: formData
		})
		.done(function(response) {
			console.log("Append to" + form);
			// Make sure that the formMessages div has the 'success' class.
			$("." + form).html("<img class='success' src='../images/checkmark.gif' width='20' height='20'>");
		})
		.fail(function(data) {
			// Set the message text.
			if (data.responseText !== '') {
				$("." + form).text(data.responseText);
			} else {
				$("." + form).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
});
