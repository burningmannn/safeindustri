$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Отменяем обычное поведение формы
        var formData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: 'config/login.php',
            dataType: 'json',
            async: true,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    closeModal("authModal");
                    get_header();
                    get_all_records();
                } else {
                    $('#loginForm #message').html("Неверное имя пользователя или пароль");
                    $('#loginForm #message').css('display', 'block');
                    console.log(data.message);
                }
            },
            error: function(){
                console.log("Возникла ошибка при выполнении php");
            },
        });
    });
});

function logout(){
    $.ajax({
        type: 'POST',
        url: 'config/logout.php',
        dataType: 'json',
        async: true,
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.status) {
                get_header();
                get_all_records();
            } else {
                console.log(data.message);
            }
        },
        error: function(){
            console.log("Возникла ошибка при выполнении php");
        },
    });
}