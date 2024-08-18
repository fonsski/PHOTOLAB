<?php
$title = "Категории товаров";
require_once "admin_header.php";
$category = $link->query("SELECT * FROM categories");
?>
<main>
    <h1>Действия с категориями товаров</h1>
    <div class="form_container">
        <form class="adminForm" action="../functions/allAdminFunctions.php#addCategory" method="POST">
            <input type="hidden" name="action" value="addCategory">
            <label for="categoryAdd">Добавить категорию</label>
            <input name="categoryAdd" placeholder="Введите название категории">
            <button type="submit">Добавить категорию</button>
        </form>

        <form class="changeCategoryName" action="../functions/allAdminFunctions.php#changeCategoryName" method="POST">
            <label for="categoryNameChange">Редактировать категорию</label>
            <select name="categoryOldName">
                <?php foreach ($category as $categoryOldName) { ?>
                    <option value="<?= $categoryOldName['name'] ?>"><?= $categoryOldName['name'] ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="action" value="changeCategoryName">
            <input name="categoryNameChange" placeholder="Введите новое название категории">
            <button type="submit">Редактировать категорию</button>
        </form>

        <form class="deleteCategory" action="../functions/allAdminFunctions.php#deleteCategory" method="POST">
            <input type="hidden" name="action" value="deleteCategory">
            <label for="deleteCategory">Удалить категорию</label>
            <select name="deleteCategory">
                <?php foreach ($category as $categoryOldName) { ?>
                    <option value="<?= $categoryOldName['name'] ?>"><?= $categoryOldName['name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Удалить категорию</button>
        </form>
    </div>
    
    <div class="success_window">
        
    </div>
</main>
<?php
require_once "right_section.php";
?>
</body>