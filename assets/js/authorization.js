$( document ).ready(function() {

    $("#register-form").submit(function (e){
        e.preventDefault();
        console.log('click');
        let formData = $(this).serializeArray();
        let action = "Registration";
        $.ajax({
            url: '../../Controllers/UserController.php',
            method: 'POST',
            data: {
                action: action,
                data: formData,
            },
            success: function () {
                window.location.href = '/views/login.php';
            }
        });
    });

    $("#login-form").submit(function (e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        let action = "Login";
        $.ajax({
            url: '../../Controllers/UserController.php',
            method: 'POST',
            data: {
                action: action,
                data: formData,
            },
            success: function () {
                window.location.href = '/';
            }
        });
    });

    $("#signOut").on('click', function (e){
        e.preventDefault();

        let action = "Logout";

        $.ajax({
            url: '../../Controllers/UserController.php',
            method: 'POST',
            data: {
                action: action,
            },
            success: function () {
                window.location.href = '/'
            }
        });
    })
});