<?php
// Подключение файла ядра, содержащего подключение к бд и ряд функций
require "../functions/core.php";
// Проверка на администратора
isAdmin();
$category = $link->query("SELECT * FROM `categories`");
$products = $link->query("SELECT * FROM `products`");
$banner = $link->query("SELECT * FROM `banner`");
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
            <li>
                <button class="admin-navigation" id="3">Категории товаров</button>
            </li>
            <li>
                <button class="admin-navigation" id="4">Настройки баннера</button>
            </li>
        </ul>
    </nav>
    <div class="main">
        <div class="admin_content" style="display: none;">
            <div class="products_block">
                <div class="cls">
                    <h1>Добавить товар</h1>
                    <form action="addProduct.php" method="POST" enctype="multipart/form-data">
                        <label for="products">Введите название товара</label>
                        <input type="text" name="name">
                        <label for="products">Введите цену</label>
                        <input type="text" name="cost">
                        <label for="product_category">Выберите категорию товара</label>
                        <select name="category_id">
                            <?php foreach ($category as $item) { ?>
                                <option value="<?=$item['id']?>"><?=$item['name']?></option>
                            <?php } ?> 
                        </select>
                        <label for="img">Выберете изображение</label>
                        <input type="file" name="img">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>


                <div class="cls">
                    <h1>Редактировать товар</h1>
                    <form action="productUpdate.php" method="POST" enctype="multipart/form-data">
                        <label for="name_old">Выберите товар для редактирования</label>
                        <select name="name_old" class="select_old">
                            
                            </select>
                        <label for="products__name_new">Введите новое название товара</label>
                        <input type="text" name="products__name_new">
                        <label for="cost__new">Введите новую цену</label>
                        <input type="text" name="cost__new">
                        <label for="product_category__new">Выберите новую категорию товара</label>
                        <select name="category_id__new">' .
                            $resultCategory
                            . '</select>
                        <input type="file" name="img__new">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>

                <div class="cls">
                    <h1>Удалить товар</h1>
                    <form action="productDelete.php" method="POST">
                        <label for="product__delete">Введите название товара</label>
                        <select name="product__delete">' .
                            $resultProduct
                            . '</select>
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>
            </div>
            <div class="admin_content" style="display: none;">
                Адрес 2
            </div>
            <div class="admin_content" style="display: none;">
                Адрес 3
            </div>
            <div class="admin_content" style="display: none;">
                Адрес 4
            </div>
        </div>
</body>

</html>
<script>
    // Получаем все кнопки навигации и блоки с адресами
    const navigationButtons = document.querySelectorAll(".admin-navigation");
    const adminBlocks = document.querySelectorAll(".admin_content");

    // Скрываем все блоки с адресами
    adminBlocks.forEach((block) => (block.style.display = "none"));

    // Добавляем обработчики событий для кнопок навигации
    navigationButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            adminBlocks.forEach((block, i) => {
                if (i === index) {
                    block.style.display = "flex";
                } else {
                    block.style.display = "none";
                }
            });
        });
    });
</script>