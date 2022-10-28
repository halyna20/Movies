$(document).ready(function () {

    $("#register-form").submit(function (e) {
        e.preventDefault();

        let formData = getValidDataRegister();

        if (Object.keys(formData).length > 0) {
            let action = "Registration";
            $.ajax({
                url: '../../Controllers/UserController.php',
                method: 'POST',
                data: {
                    action: action,
                    data: formData,
                },
                dataType: 'json',
                success: function (data) {
                    if (data.error) {
                        displayError(data);
                    } else {
                        window.location.href = '/views/login.php';
                    }
                }
            });
        }
    });

    $("#login-form").submit(function (e) {
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
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    displayError(data);
                    $("#login-form")[0].reset();
                } else {
                    window.location.href = '/index.php';
                }
            }
        });
    });

    $("#signOut").on('click', function (e) {
        e.preventDefault();

        let action = "Logout";

        $.ajax({
            url: '../../Controllers/UserController.php',
            method: 'POST',
            data: {
                action: action,
            },
            success: function () {
                window.location.href = '/index.php'
            }
        });
    })
});

function getValidDataRegister(){
    let nickname = $('#nickname');
    let nicknameVal = validateNickname(nickname);
    let data = new Object();
    if (!nicknameVal) {
        $("label[for='nickname']").text("Не допустимі символи.Nickname складається з латинських букв чи цифр, символу підкреслення або дефіс");
    } else {
        $("label[for='nickname']").text('');
    }

    let name = $('#name');
    let nameVal = validateText(name);
    if (!nameVal) {
        $("label[for='name']").text("Не вірні дані. Використовуйте лише літери кирилиці");
    }else {
        $("label[for='name']").text('');
    }

    let surname = $('#surname');
    let surnameVal = validateText(surname);
    if (!surnameVal) {
        $("label[for='surname']").text("Не вірні дані. Використовуйте лише літери кирилиці");
    } else {
        $("label[for='surname']").text('');
    }

    let password = $('#password');
    let passwordVal = validatePass(password);
    if (!passwordVal) {
        $("label[for='password']").text("Не допустимі символи. Пароль повинен складатись з букв, цифр або символ підкреслення, дефісу");
    } else {
        $("label[for='password']").text('');
    }

    if (nicknameVal && nameVal && surnameVal && passwordVal) {
        data = {
            'nickname' : nickname.val(),
            'name' : name.val(),
            'surname' : surname.val(),
            'email' : $('#email').val(),
            'password' : password.val()
        }
    }

    return data;
}