$(document).ready(function(){
    $("form").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'add_title.php',
            type: 'POST',
            data: formData,
            success: function(response){
                alert('Тайтл успешно добавлен');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $.ajax({
        url: 'get_titles.php',
        type: 'GET',
        success: function(response){
            $('#titlesTable').html(response);
        }
    });
});