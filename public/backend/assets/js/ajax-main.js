$(document).ready(function(){
    $('#levelSelect').change(function(){
        var level = $(this).val();

        if(level !== "") {
            $.ajax({
                url: "/get-content", 
                type: "POST",
                data: {level: level},
                dataType: "json",
                success: function(response) {
                    $('#content').html(response.content); 
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    $('#content').html('<p style="color:red;">Gagal memuat halaman</p>');
                }
            });
        } else {
            $('#content').html('');
        }
    });
  });