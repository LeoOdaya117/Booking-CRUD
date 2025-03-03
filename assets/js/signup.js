$(document).ready(function(){

    $('#signup-form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var url = 'api/signup.php';

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function(response){
                response = JSON.parse(response);
                if(response.success){
                    alert(response.message);
                    window.location.href = 'login.php';
                }
                else{
                    alert(response.message);
                }
            },eroor: function(xhr, status, error){
                alert(xhr.responseText);
            }
        });
    });
});