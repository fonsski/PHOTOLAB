<?php
$title = "Настройки баннера";
require_once "admin_header.php";
$banner = $link->query("SELECT * FROM banner");
?>
<main>
    <h1>Действия с баннерами</h1>
    <div class="form_container">
        <form class="adminForm" action="../functions/allAdminFunctions.php#addBanner" method="post" enctype="multipart/form-data">
            <h2>Добавить баннер</h2>
            <input type="hidden" name="action" value="addBanner">
            <label for="bannnerName">Название баннера</label>
            <input name="bannerName">
            <label for="bannerDescription">Описание баннера</label>
            <input name="bannerDescription">
            <label for="img">Изображение для баннера</label>
            <input type="file" name="img">
            <button type="submit">Добавить баннер</button>
        </form>

        <form class="adminForm" action="../functions/allAdminFunctions.php#updateBanner" method="post" enctype="multipart/form-data">
            <h2>Редактировать баннер</h2>
            <input type="hidden" name="action" value="updateBannner">
            <label for="bannerNameNew">Новое название баннера</label>
            <input name="bannerNameNew">
            <label for="bannerCostNew">Новое описание баннера</label>
            <input name="bannerCostNew">
            <label for="imgNew">Новое изображение для баннера</label>
            <input type="file" name="imgNew">
            <button type="submit">Изменить баннер</button>
        </form>

        <form class="adminForm" action="../functions/allAdminFunctions.php#updateBanner" method="post" enctype="multipart/form-data">
            <h2>Удалить баннер</h2>
            <input type="hidden" name="action" value="deleteBanner">
            <select name="deleteBaner">
                <?php foreach ($banner as $bannerDelete) { ?>
                    <option value="<?= $bannerDelete['id'] ?>"><?= $bannerDelete['name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Удалить баннер</button>
        </form>

        <form class="adminForm" action="../functions/allAdminFunctions.php#updateBanner" method="post" enctype="multipart/form-data">
            <h2>Выбрать активный баннер</h2>
            <input type="hidden" name="action" value="updateBannerStatus">
            <select name="activeBaner">
                <?php foreach ($banner as $bannerActive) { ?>
                    <option value="<?= $bannerActive['id'] ?>"><?= $bannerActive['name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Выбрать баннер</button>
        </form>
    </div>
</main>
<?php
require_once "right_section.php";
?>