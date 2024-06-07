<?php
$title = "Настройки баннера";
require_once "admin_header.php";
?>
<main>
    <h1>Действия с баннерами</h1>
    <div class="form_container">
        <form class="adminForm" action="../functions/allAdminFunctions.php#addProduct" method="post" enctype="multipart/form-data">
            <h2>Добавить баннер</h2>
            <input type="hidden" name="action" value="addProduct">
            <label for="productName">Название баннера</label>
            <input name="productName">
            <label for="productCost">Описание баннера</label>
            <input name="productCost">
            <label for="img">Изображение для баннера</label>
            <input type="file" name="img">
            <button type="submit">Добавить баннер</button>
    </div>
</main>
<?php
require_once "right_section.php";
?>