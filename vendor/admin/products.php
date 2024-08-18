<?php
$title = "Товары";
require_once "admin_header.php";
$category = $link->query("SELECT * FROM categories");
$products = $link->query("SELECT * FROM products");
?>
<main>
    <h1>Действия с товарами</h1>
    <div class="form_container">
        <form class="adminForm" action="../functions/allAdminFunctions.php#addProduct" method="post" enctype="multipart/form-data">
            <h2>Добавить товар</h2>
            <input type="hidden" name="action" value="addProduct">
            <label for="productName">Название товара</label>
            <input type="text" name="productName" placeholder="Введите название товара">
            <label for="productCost">Цена товара</label>
            <div class="a"><input type="text" name="productCost" placeholder="Введите цену товара">
                <p>р.</p>
            </div>
            <label for="productCategory">Категория товара</label>
            <select name="productCategory">
                <?php foreach ($category as $categoryName) { ?>
                    <option value="<?= $categoryName['id'] ?>"><?= $categoryName['name'] ?></option>
                <?php } ?>
            </select>
            <input type="file" name="img">
            <button type="submit">Добавить товар</button>
        </form>


        <form class="adminForm" action="../functions/allAdminFunctions.php#deleteProduct" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="updateProduct">
            <label for="productUpdate">Редактировать товар</label>
            <select name="productUpdate" class="productUpdate">
                <option value="" disabled selected>Выберите товар</option>
                <?php foreach ($products as $productName) { ?>
                    <option value="<?= $productName['id'] ?>"><?= $productName['name'] ?></option>
                <?php } ?>
            </select>
            <label for="productCategoryNew">Новая категория товара</label>
            <select name="productCategoryNew" class="productCategoryNew">
                <?php foreach ($category as $categoryName) { ?>
                    <option value="<?= $categoryName['id'] ?>"><?= $categoryName['name'] ?></option>
                <?php } ?>
            </select>
            <label for="productNameNew">Новое название товара</label>
            <input name="productNameNew" class="productNameNew" value="" placeholder="Введите новое название товара">
            <label for="productCostNew">Новая цена товара</label>
            <div class="a"><input name="productCostNew" class="productCostNew" value="" placeholder="Введите новую цену товара">
                <p>р.</p>
            </div>
            <label for="productImgNew">Новое изображение товара</label>
            <input type="file" name="productImgNew">
            <button type="submit">Изменить товар</button>
        </form>

        <form class="adminForm" action="../functions/allAdminFunctions.php#deleteProduct" method="post">
            <input type="hidden" name="action" value="deleteProduct">
            <label for="productDelete">Удалить товар</label>
            <select name="productDelete">
                <?php foreach ($products as $productName) { ?>
                    <option value="<?= $productName['name'] ?>"><?= $productName['name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Удалить товар</button>
        </form>
</main>
<?php
require_once "right_section.php";
?>