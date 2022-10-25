/*****ToDo:*******
 1. Авторизація користувача
 ////// 1.1. Візуальне відображення ////
 1.2. Запит на реєстрацію
 1.3. Обробка додавання нового користувача
 1.4. Запит на вхід
 1.5. Обробка входу
 1.6. Запит на вихід
 1.7. Здійснення виходу
 //////// 2. Додати фільм ////////
 ////// 2.1. Візуальне відображення кнопки + форма з додаванням ///////
 /////// 2.2. Створити аякс запит на додавання ///////////
 ////// 2.3. Виконати запит та ///////
 ////// 2.4. Повернути повідомленя про успішне створення /////
 //////// 3. Видалити фільм //////
 ///// 3.1. Візуальне відображення //////
 ///// 3.2. Створити аякс запит ///////
 ///// 3.3. Зробити виконання запиту та повернути повідомлення ////
 ////// 4. Показати інформацію про фільм ////
 ///// 4.1. Зробити візуальне відображення /////
 ///// 4.2. Вивести детальну інформацію про фільм при кліку //////
 //////// 5. Показати список фільмів відсортованих за назвою в алфавітному порядку ///
 //////// 6. Знайти фільм за назвою. /////
 //////// 7. Знайти фільм на ім'я актора. //////
 8. Імпорт фільмів із текстового файлу (приклад файлу надається “sample_movies.txt”). Файл повинен завантажуватись через веб-інтерфейс.
 9. Зробити пагінацію
 9.1 Перевірити чи існує користувач з таким емейлом при реєстрації
 9.2. Форма входу - перевірка значень
 9.3. Коли вхід та реєстрація не вдались, то показати помилки
 10. Навести лад з css
 11. Зробити доки
 12. Навести лад в імпорті файлів - якщо не вдався то помилки
 13. Підготувати БД для імпорту
 14. Насипати коментів в код дрібку

 **/

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
                let output = displayData(data)
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
                if (data.message) {
                    displayError(data);
                } else {
                    let output = displayData(data);
                    $('.movies').html(output);
                    $('#searchForm')[0].reset();
                }
            }
        });
    });
});
