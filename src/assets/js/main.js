$(document).ready(function () {
    loadData();

    function loadData() {
        let action = "Load";
        $.ajax({
            url: '../../Controllers/FilmController.php',
            method: 'POST',
            data: {action: action},
            dataType: 'json',
            success: function (data) {
                let output = "";
                if (Array.isArray(data)) {
                   output = displayData(data);
                } else {
                    output = displayItem(data);
                }
                $('.movies').html(output);
            }
        });
    }

    $('.sort-link').on('click', function (e) {
        e.preventDefault();

        if ($(this).data("name") === 0) {
            let action = "SortByName";
            $.ajax({
                url: '../../Controllers/FilmController',
                data: {action: action},
                method: 'POST',
                dataType: 'json',
                success: function (data) {
                    let output = displayData(data);
                    $('.movies').html(output);
                    $('.sort-link').data("name", 1);
                    $('.sort-link').addClass("active");
                },
            });
        } else {
            loadData();
            $(this).data("name", 0);
            $(this).removeClass("active");
        }
    });

    function displayData(data) {
        let output = "";
        data.forEach(function (item) {
            output += `<div class="movie">
                            <h2 class="movie-title">
                                <a id="movieLink" href="./views/infomovie.php?id=${item.id}" target="_blank">
                                    ${item.title}
                                    (${item.year}) </a>
                            </h2>
                            <div class="movie-inner">`;
            if (item.movieImg) {
                output += `<img src="${item.movieImg}" alt="постер" />`;
            }

            if (item.description) {
                output += `<div class="description">
                                <p>
                                    ${item.description}
                                </p>
                            </div>`;

            }

            output += `<div class="action">
                                <button class="delete-btn" data-id="${item.id}">Видалити</button>
                            </div>
                        </div>
                    </div>`;
        });

        return output;
    }

    function displayItem(data) {
        let output = "";
        output += `<div class="movie">
                            <h2 class="movie-title">
                                <a id="movieLink" href="./views/infomovie.php?id=${data.id}" target="_blank">
                                    ${data.title}
                                    (${data.year}) </a>
                            </h2>
                            <div class="movie-inner">`;
        if (data.movieImg) {
            output += `<img src="${data.movieImg}" alt="постер" />`;
        }

        if (data.description) {
            output += `<div class="description">
                                <p>
                                    ${data.description}
                                </p>
                            </div>`;

        }

        output += `<div class="action">
                                <button class="delete-btn" data-id="${data.id}">Видалити</button>
                            </div>
                        </div>
                    </div>`;
        return output;
    }

    $('.movies').on('click', '.delete-btn', function () {
        let conf = confirm('Ви впевнені?');
        if (conf) {
            let id = $(this).data('id');
            let action = "Delete";
            let btn = $(this);


            $.ajax({
                url: '../../Controllers/FilmController',
                data: {
                    action: action,
                    id: id
                },
                method: 'POST',
                dataType: 'json',
                success: function (data) {
                    $('body,html').animate({scrollTop: 0}, 400);
                    message(data);
                    btn.parent().parent().parent().remove();
                },
            });
        }
    });

    $('#searchForm').submit(function (e) {
        e.preventDefault();
        let data = $(this).find('#search__input').val();

        let action = "Search";
        $.ajax({
            url: '../../Controllers/SearchController',
            data: {
                action: action,
                search: data
            },
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    displayError(data);
                } else {
                    let output = "";
                    if (Array.isArray(data)) {
                         output = displayData(data);
                    } else {
                         output = displayItem(data);
                    }

                    $('.movies').html(output);
                    $('#searchForm')[0].reset();
                }
            }
        });
    });
});