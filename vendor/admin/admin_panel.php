<?php
// Подключение файла ядра, содержащего подключение к бд и ряд функций
require "../functions/core.php";
// Проверка на администратора
isAdmin();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="view-transition" content="same-origin" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/admin_board.css">
    <title>Панель администратора</title>
</head>

<body>
    <nav>
        <ul class="nav-list">
            <li>
                <button aria-current="page" class="admin-navigation" id="1">Главная</button>
            </li>
            <li>
                <button class="admin-navigation" id="2">Товары</button>
            </li>
            <li><button class="admin-navigation" id="3">Категории товаров</button></li>
            <li>
                <button class="admin-navigation" id="4">Настройки баннера</button>
            </li>
        </ul>
    </nav>
    <div class="main">
        <!-- Сюда с помощью AJAX динамически подставляется контент из admin_components.php -->
    </div>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.admin-navigation');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                // Удаление класса active у всех li элементов
                const allLiElements = document.querySelectorAll('.nav-list li');
                allLiElements.forEach(li => {
                    li.classList.remove('active');
                });
                // Добавление класса active к родительскому элементу li
                this.parentElement.classList.add('active');
                // Отправка POST запроса на сервер
                fetch("admin_components.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json;charset=utf-8",
                        },
                        body: JSON.stringify({
                            'id': this.id
                        }),
                    })
                    .then(response => response.json())
                    .then(result => {
                        let html = '';
                        // Формирование HTML кода на основе полученных данных
                        result.forEach(element => {
                            html += htmlCreate(element);
                        });
                        // Вставка сформированного HTML кода в элемент с классом main
                        document.querySelector(".main").innerHTML = html;
                    });
            });
        });
    });

    // Функция для создания HTML элемента на основе данных
    function htmlCreate(component) {
        return `
    <div class="components_content">
        <h1 class="j_title">${component.h1}</h1>
        ${component.content}
    </div>
    `;
    }

    // Запуск контента с id 1 по умолчанию после загрузки страницы
    document.addEventListener('DOMContentLoaded', function() {
        // Находим кнопку с id 1 и эмулируем клик на нее
        const defaultButton = document.getElementById('1');
        if (defaultButton) {
            defaultButton.click();
        }
    });
</script>