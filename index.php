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
               <a class="add-link" href="<?php echo $siteName . '/views/add_film.php'; ?>"> <button class="add-btn">Додати</button></a>
            </div>

            <div class="movies"></div>
        </div>
    </main>

    <script src="/assets/js/message.js"></script>
    <script src="/assets/js/authorization.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
