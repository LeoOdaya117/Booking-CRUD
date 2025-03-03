$(document).ready(function(){

    $('#create-room-form').submit(function(e){
        e.preventDefault();
        var form = $(this);

        var url = 'api/insert.php';
       

        $.ajax({

            type: 'POST',
            url:url,
            data: form.serialize(),
            success: function(response){
                response = JSON.parse(response);

                if(response.success){
                    alert(response.message);
                    window.location.href = 'rooms.php';
                }
                else{
                    alert(response.message);
                }
            },
            error: function(xhr, status, error){
                alert(xhr.responseText);
            }
        });
    });
});