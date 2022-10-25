$( document ).ready(function() {
    loadDetails();

    function loadDetails() {
        let action = "FilmById";
        let id = GetURLParameter('id');

        $.ajax({
            url: '../../Controllers/FilmController',
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
                    ${data[0].title}
                </h2>`;
    if(data[0].movieImg) {
        output += `<img src="${data[0].movieImg}" alt="постер" />`;
    }

    output += ` <div class="description">
                    <div class="format">Формат: ${data[0].format}</div>
                    <p class="year">Рiк: ${data[0].year}</p>`;
    if (data[0].stars) {
        output += `<p class="stars">В ролях: ${data[0].stars}</p>`;
    }

    if(data[0].description) {
        output += `<p> ${data[0].description}</p>`;
    }

    if (data[0]["frame"]) {
        output += "<div class='screen'> <ul>";

        data[0]["movieFrame"].forEach(function (item) {
            console.log(item)
           output += `<li><img class="image" src="${data[0]['frame']}/${item}"></li>`
        });
        output += "</ul></div>";
    }

    output += "</div>";

    return output;
}


function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return decodeURIComponent(sParameterName[1]);
        }
    }
}