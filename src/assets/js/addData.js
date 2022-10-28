$(document).ready(function () {
    $('#addForm').submit(function (e) {
        e.preventDefault();

        let formData = getValidFilmData();

        if (Object.keys(formData).length > 0) {
            let action = "AddFilm";

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
        }
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

function getValidFilmData() {
    let name = $('#name');
    let nameVal = validateFilmName(name);
    let data = new Object();

    if (!nameVal) {
        $("label.error[for='name']").text("Не допустимі символи");
    } else {
        $("label.error[for='name']").text('');
        data = {
            'name': nameVal,
            'year': $('#year').val(),
            'format': $('#format').val(),
            'description' : $('#description').val(),
            'stars' : $('#stars').val()
        }

    }
    return data;
}