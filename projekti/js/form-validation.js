// Wait for the DOM to be ready
$(function () {
	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form[name='send-email']").validate({
		// Specify validation rules
		rules: {
			// The key name on the left side is the name attribute
			// of an input field. Validation rules are defined
			// on the right side
			name: {
				required: true,
				minlength: 2,
				lettersonly: true
			},
			email: {
				required: true,
				// Specify that email should be validated
				// by the built-in "email" rule
				email: true
			}
		},
		// Specify validation error messages
		messages: {
			name: {
				required: "Please enter your name",
				minlength: "Your name must be at least 2 characters",
				lettersonly: "Only letters are accepted"
			},
			email: {
				required: "Pease enter your email",
				email : "Enter a valid email"
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function (form) {
			form.submit();
		}
	});
});