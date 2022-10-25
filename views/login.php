<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php';
?>

<main class="main-filter">
    <div class="filter-top">
        <img src="../assets/img/popcorn1.svg" alt="" class="filter-img">
        <h1>KINOBANDA</h1>
        <p>Знайди фільм на свій смак</p>
    </div>

    <div class="filter-bottom" id="login-area">
        <form id="login-form" method="POST">
            <div class="filter-data">
                <input type="text" name="emailAuth" placeholder="Введіть свій email">
                <input type="password" name="passAuth" placeholder="Введіть свій пароль">
            </div>
            <button type="submit" class="login-btn" id="login-button">Увійти</button>
        </form>
    </div>

</main>

<script src="/assets/js/authorization.js"></script>
</body>

</html>