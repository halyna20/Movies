<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php';
?>
<main class="main-sign">
    <div class="sign-top">
        <img src="../assets/img/popcorn1.svg" alt="" class="sign-img ">
        <h1>Реєстрація користувача</h1>
        <p>Знайди фільм на свій смак</p>
    </div>
    <div id="error"></div>
    <!-- Форма реєстрації -->
    <div class="sign-bottom" id="register-area">
        <form id="register-form" method="POST">
            <div class="sign-data">
                </br>
                <div>
                    <input type="text" id="nickname" name="nickname" minlength="2" maxlength="20"
                           placeholder="Введіть свiй логiн " required>
                    <label class="error" for="nickname"></label>
                </div>
                </br>

                <div>
                    <input type="email" id="email" name="email" maxlength="40" placeholder="Введіть свій email"
                           required>
                </div>

                </br>
                <div>
                    <input type="text" id="name" name="name" minlength="2" maxlength="20"
                           placeholder="Введіть своє ім'я"
                           required>
                    <label class="error" for="name"></label>
                </div>

                </br>
                <div>
                    <input type="text" id="surname" name="surname" minlength="2" maxlength="20"
                       placeholder="Введіть своє прізвище" required>
                    <label class="error" for="surname"></label>
                </div>

                </br>

                <div>
                    <input type="password" id="password" name="password" minlength="8" maxlength="20"
                       placeholder="Введіть свій пароль" required>
                    <label class="error" for="password"></label>
                </div>

                <button type="submit" class="login-btn" id="register-button">Зареєструватись</button>
            </div>
        </form>
    </div>
</main>

<script src="/assets/js/message.js"></script>
<script src="/assets/js/validation.js"></script>
<script src="/assets/js/authorization.js"></script>
</body>

</html>
