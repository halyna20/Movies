<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php';
?>
<main class="add-film">
    <div class="container">
        <div class="add-film__inner">
            <div id="success"></div>
            <div class="add-top">
                <h2 class="title">Додати фільм</h2>
                <div class="file-container">
                    <form id="fileForm" method="post" enctype="multipart/form-data">
                        <label for="file" id="fileUpload">
                            Імпорт файлу
                        </label>
                        <input id="file" name="file" type="file" class="import-btn" accept="text/plain" style="display: none">
                        <button id="sendFile" type="submit" >Відправити</button>
                    </form>
                </div>
            </div>
            <form class="add-form" id="addForm">
                <div class="form-container">
                    <div class="form-group">
                        <label class="label-group" for="name">Назва фільму</label>
                        <input id="name" name="name" class="form-item" type="text" placeholder="Введіть назву фільму" required>
                    </div>
                    <div class="form-group">
                        <label class="label-group" for="year">Рік випуску</label>
                        <input id="year" name="year" class="form-item" type="number" placeholder="Введіть рік" min="1940"
                               max="2022" required>
                    </div>
                    <div class="form-group">
                        <label class="label-group" for="format">Формат</label>
                        <select id="format" class="form-item form-select" name="format">
                            <option value="DVD">
                                DVD
                            </option>
                            <option value="VHS">
                                VHS
                            </option>
                            <option value="Blu-Ray">Blu-Ray</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-group" for="stars">Список акторів</label>
                        <textarea id="stars" class="form-item" name="stars" placeholder="Введіть ім'я акторів"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-group" for="description">Опис фільму</label>
                        <textarea id="description" class="form-item" name="description" - placeholder="Введіть опис фільму"></textarea>
                    </div>
                </div>
                <button class="add-btn" type="submit" id="addData">Додати</button>
            </form>
        </div>
    </div>
</main>
<script src="/assets/js/message.js"></script>
<script src="/assets/js/addData.js"></script>
</body>

</html>
