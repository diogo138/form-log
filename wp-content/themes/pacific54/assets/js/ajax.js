jQuery(document).ready(function($) {
    $('#myForm').submit(function(e) {
        e.preventDefault();

        let formData = {
            'action': 'my_action',
            'name': $('#name').val(),
            'phoneNumber': $('#phoneNumber').val(),
            'email': $('#email').val(),
            'message': $('#message').val()
        };

        $.post(my_ajax_object.ajax_url, formData, function(response) {
            let result = document.getElementById('result');
            let data = JSON.parse(response);

            if (data.status === 'success') {
                $('#name').val('');
                $('#phoneNumber').val('');
                $('#email').val('');
                $('#message').val('');

                result.innerHTML = "form sent successfully!";

                setTimeout(function() {
                    result.innerHTML = "";
                }, 2000);
            } else {
                result.innerHTML = "something get wrong!";
            }
        });
    });
});
