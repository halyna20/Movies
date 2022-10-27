<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php';
?>

<main class="main-sign">
    <div class="sign-top">
        <img src="../assets/img/popcorn1.svg" alt="" class="sign-img">
        <h1>KINOBANDA</h1>
        <p>Знайди фільм на свій смак</p>
    </div>
    <div id="error"></div>
    <div class="sign-bottom" id="login-area">
        <form id="login-form" method="POST">
            <div class="sign-data">
                <input type="email" name="emailAuth" placeholder="Введіть свій email" required>
                <input type="password" name="passAuth" placeholder="Введіть свій пароль" required>
            </div>
            <button type="submit" class="login-btn" id="login-button">Увійти</button>
        </form>
    </div>

</main>

<script src="/assets/js/message.js"></script>
<script src="/assets/js/authorization.js"></script>
</body>

</html>