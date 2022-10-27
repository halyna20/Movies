$(document).ready(function () {
    $('#addForm').submit(function (e) {
        e.preventDefault();

        let action = "AddFilm";
        let formData = $(this).serializeArray();
        $.ajax({
            url: '../../Controllers/FilmController.php',
            method: 'POST',
            data: {
                action: action,
                data: formData
            },
            dataType: 'json',
            success: function (data) {
                message(data);

                $('#addForm')[0].reset();
            }
        });
    });

    $("#fileForm").submit(function (e) {
        e.preventDefault();
        let action = "Import";
        let fileData = $('#file').prop('files')[0];
        if (fileData != undefined) {

            let formData = new FormData($('#fileForm')[0]);
            formData.append('file', fileData);
            formData.append('action', action);

            $.ajax({
                url: '../../Controllers/FilmController.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if (data.message) {
                        message(data);
                    } else if (data.error) {
                        displayError(data);
                    }

                    $('#file').val('');
                }
            });
        } else {
            let data = {error: 'Оберіть файл!'};
            displayError(data);
        }
    })
});