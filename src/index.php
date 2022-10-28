<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/conf/setting.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php';
?>
    <main>
        <div class="container">
            <div id="success"></div>
            <div id="error"></div>
            <div class="movies-top">
                <p>Сортування: <a class="sort-link" id="sort-link" href="#" data-name="0">за назвою</a></p>
                <form id="searchForm">
                    <div class="search">
                        <input id="search__input" type="text" name="search" placeholder="Шукати">
                        <div id="search__button">
                            <button><img src="/assets/img/search.svg" alt="search"/></button>
                        </div>
                    </div>
                </form>
                <?php if(isset($_COOKIE['user'])) {?>
                    <a class="add-link" href="<?php echo $siteName . '/views/add_film.php'; ?>"> <button class="add-btn">Додати</button></a>
                <?php } ?>
            </div>

            <div class="movies"></div>
        </div>
    </main>

    <script src="/assets/js/message.js"></script>
    <script src="/assets/js/validation.js"></script>
    <script src="/assets/js/authorization.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
