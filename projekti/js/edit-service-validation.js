$(function () {
	$("form[name='edit-service']").validate({
		rules: {
                title: {
                    required: true,
                },
                content: {
                    required: true,
                },
                file: {
                    required: true,
                    accept: "image/*"
                }
            },
		submitHandler: function (form) {
			form.submit();
		}
	});
});