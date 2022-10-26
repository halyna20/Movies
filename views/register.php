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
                    <input type="text" name="nickname" maxlength="20" placeholder="Введіть свiй логiн " required>
                    </br>
                    </br>

                    <input type="email" name="email" maxlength="35" placeholder="Введіть свій email" required>
                    </br>
                    </br>

                    <input type="text" name="name" maxlength="20" placeholder="Введіть своє ім'я" required>
                    </br>
                    </br>

                    <input type="text" name="surname" maxlength="20" placeholder="Введіть своє прізвище" required>
                    </br>
                    </br>

                    <input type="password" name="password" min="8" max="20" placeholder="Введіть свій пароль" required>

                    <button type="submit" class="login-btn" id="register-button">Зареєструватись</button>
                </div>
            </form>
        </div>
    </main>

<script src="/assets/js/message.js"></script>
<script src="/assets/js/authorization.js"></script>
</body>

</html>
