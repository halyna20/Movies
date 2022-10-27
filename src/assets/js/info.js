$(document).ready(function () {
    loadDetails();

    function loadDetails() {
        let action = "FilmById";
        let id = GetURLParameter('id');

        $.ajax({
            url: '../../Controllers/FilmController.php',
            data: {
                action: action,
                id: id
            },
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let output = displayDetails(data);
                $('.info-movie').html(output);
            },
        });
    }
});

function displayDetails(data) {
    let output = "";
    output += `<h2 class="movie-title">
                    ${data.title}
                </h2>`;
    if (data.movieImg) {
        output += `<img src="${data.movieImg}" alt="постер" />`;
    }

    output += ` <div class="description">
                    <div class="format">Формат: ${data.format}</div>
                    <p class="year">Рiк: ${data.year}</p>`;
    if (data.stars) {
        output += `<p class="stars">В ролях: ${data.stars}</p>`;
    }

    if (data.description) {
        output += `<p> ${data.description}</p>`;
    }

    if (data['frame']) {
        output += "<div class='screen'> <ul>";

        data["movieFrame"].forEach(function (item) {
            output += `<li><img class="image" src="${data['frame']}/${item}"></li>`
        });
        output += "</ul></div>";
    }

    output += "</div>";

    return output;
}


function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return decodeURIComponent(sParameterName[1]);
        }
    }
}