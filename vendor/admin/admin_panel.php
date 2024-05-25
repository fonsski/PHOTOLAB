<!-- © Все права на код принадлежат Photolab, ИП Столяров -->
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
    <section class="admin_blocks">
        <nav>
            <ul class="nav-list">
                <li>
                    <button aria-current="page" class="admin-navigation" id="1">Товары</button>
                </li>
                <li>
                    <button class="admin-navigation" id="2">Категории</button>
                </li>
                <li><button class="admin-navigation" id="3">Настройки баннера</button></li>
            </ul>
        </nav>

        <div class="admin_content">
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
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="img">Выберете изображение</label>
                        <input type="file" name="img">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>
            </div>


            <div class="cls">
                <h1>Редактировать товар</h1>
                <form action="productUpdate.php" method="POST" enctype="multipart/form-data">
                    <label for="name_old">Выберите товар для редактирования</label>
                    <select name="name_old" class="select_old">
                        <?php foreach ($products as $key) { ?>
                            <option value="<?= $key['name'] ?>" data-price="<?= $key['cost'] ?>"><?= $key['name'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="products__name_new">Введите новое название товара</label>
                    <input type="text" name="products__name_new">
                    <label for="cost__new">Введите новую цену</label>
                    <input type="text" name="cost__new">
                    <label for="product_category__new">Выберите новую категорию товара</label>
                    <select name="category_id__new">
                        <?php foreach ($category as $item) { ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="file" name="img__new">
                    <button class="admin_button">Подтвердить</button>
                </form>
            </div>

            <div class="cls">
                <h1>Удалить товар</h1>
                <form action="productDelete.php" method="POST">
                    <label for="product__delete">Введите название товара</label>
                    <select name="product__delete">
                        <?php foreach ($products as $item) { ?>
                            <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
                    <button class="admin_button">Подтвердить</button>
                </form>
            </div>
        </div>
        <div class="admin_content">
            <div class="products_block">
                <div class="cls">
                    <h1>Добавить категорию</h1>
                    <form action="addCategory.php" method="post">
                        <label for="category_name">Введите название категории</label>
                        <input type="text" name="category_name">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>
                <div class="cls">
                    <h1>Редактировать категорию</h1>
                    <form action="updateCategory.php" method="POST">
                        <select name="category_old_red" class="category_old">
                            <?php foreach ($category as $item) { ?>
                                <option value="<?= $item['name'] ?>" data-category="<?= $item['name'] ?>"><?= $item['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="category_new_name">Введите новое значение категории</label>
                        <input type="text" name="category_new_name">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>

                <div class="cls">
                    <h1>Удалить категорию</h1>
                    <form action="deleteCategory.php" method="POST">
                        <label for="category_old_del">Выберите категорию для удаления</label>
                        <select name="category_old_del">
                            <?php foreach ($category as $item) { ?>
                                <option value="<?= $item['name'] ?>"><?= $item['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="admin_content">
            <div class="products_block">
                <div class="cls">
                    <h1>Создать баннер</h1>
                    <form action="bannerAdd.php" method="POST" enctype="multipart/form-data">
                        <label for="banner_name">Введите название баннера</label>
                        <input type="text" name="banner_name">
                        <label for="banner_title">Введите заголовок баннера</label>
                        <input type="text" name="banner_title">
                        <label for="banner_text">Введите текстовое содержание баннера</label>
                        <input type="text" name="banner_text">
                        <label for="banner_image">Выберете изображение</label>
                        <input type="file" name="banner_image">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>

                <div class="cls">
                    <h1>Редактировать баннер</h1>
                    <form action="bannerUpdate.php" method="POST" enctype="multipart/form-data">
                        <label for="bannerOld">Выберите баннер</label>
                        <select class="bannerOld" name="bannerOld">
                            <?php foreach ($banner as $item) { ?>
                                <option value="<?= $item['name'] ?>" data-bannerTitle="<?= $item['title'] ?>" data-bannerDescription="<?= $item['text'] ?>"><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="banner_name__new">Введите новое название баннера</label>
                        <input type="text" name="banner_name__new">
                        <label for="banner_title__new">Введите новый заголовок баннера</label>
                        <input type="text" name="banner_title__new">
                        <label for="banner_text__new">Введите новое текстовое содержание баннера</label>
                        <input type="text" name="banner_text__new">
                        <label for="banner_image__new">Выберете новое изображение</label>
                        <input type="file" name="banner_image">
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>

                <div class="cls">
                    <h1>Удалить баннер</h1>
                    <form action="bannerDelete.php" method="POST">
                        <label for=" bannerDelete">Выберите баннер который хотите удалить</label>
                        <select name="bannerDelete">
                            <?php foreach ($banner as $item) { ?>
                                <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>

                <div class="cls">
                    <h1>Выбрать активный баннер</h1>
                    <form action="bannerActive.php" method="POST" enctype="multipart/form-data">
                        <label for="banneActive">Выберите баннер</label>
                        <select name="bannerActive">
                            <?php foreach ($banner as $item) { ?>
                                <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                        <button class="admin_button">Подтвердить</button>
                    </form>
                </div>
            </div>
    </section>
</body>
<script src="../../assets/js/adminFunctions.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectOld = document.querySelector('.select_old');
        const productNameNew = document.querySelector('input[name="products__name_new"]');
        const costNew = document.querySelector('input[name="cost__new"]');
        const categoryNew = document.querySelector('input[name="category_new_name"]');
        selectOld.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            productNameNew.value = selectedOption.value;
            costNew.value = selectedOption.getAttribute('data-price');
            categoryNew.value = selectedOption.getAttribute('data-category');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const selectOld = document.querySelector('.category_old');
        const categoryNew = document.querySelector('input[name="category_new_name"]');
        selectOld.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            categoryNew.value = selectedOption.getAttribute('data-category');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const selectOld = document.querySelector('.bannerOld');
        const bannernameNew = document.querySelector('input[name="banner_name__new"]');
        const bannertitleNew = document.querySelector('input[name="banner_title__new"]');
        const bannerdescriptionNew = document.querySelector('input[name="banner_text__new"]');

        selectOld.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            bannernameNew.value = selectedOption.value;
            bannertitleNew.value = selectedOption.getAttribute('data-bannerTitle');
            bannerdescriptionNew.value = selectedOption.getAttribute('data-bannerDescription');
        });
    });
</script>

</html>