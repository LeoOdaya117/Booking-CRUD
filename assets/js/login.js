$(document).ready(function() {
    $('#login-form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var url = 'api/login.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.success) {
                    alert(data.message);
                    window.location.href = 'index.php';
                } else {
                    // $('#error-message').html(data);
                    alert(data.message);
                }
            },
            error: function(xhr, status, error) {  // Corrected this part
                console.log(xhr.responseText); // Logs server response
            }
        });
    });
});