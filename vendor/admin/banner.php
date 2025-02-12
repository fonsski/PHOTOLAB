<?php
$title = "Настройки баннера";
require_once "admin_header.php";
global $link;
$banner = $link->query("SELECT * FROM banner");
?>
<main>
    <h1>Действия с баннерами</h1>
    <div class="form_container">
        <form class="adminForm" action="/vendor/functions/allAdminFunctions.php" method="post" enctype="multipart/form-data">
            <h2>Добавить баннер</h2>
            <input type="hidden" name="action" value="addBanner">
            <label for="bannnerName">Название баннера</label>
            <input name="bannerName" placeholder="Название баннера">
            <label for="bannerTitle">Заголовок баннера</label>
            <input name="bannerTitle" placeholder="Заголовок баннера">
            <label for="bannerText">Текст баннера</label>
            <input name="bannerText" placeholder="Текст баннера">
            <label for="banner_image">Изображение для баннера</label>
            <input type="file" name="banner_image">
            <button type="submit">Добавить баннер</button>
        </form>

        <form class="adminForm" action="/vendor/functions/allAdminFunctions.php" method="post" enctype="multipart/form-data">
            <h2>Редактировать баннер</h2>
            <input type="hidden" name="action" value="updateBanner">
            <select class="bannerOld" name="bannerOld">
                <option value="">Выбрать баннер</option>
                <?php foreach ($banner as $bannerUpdate) { ?>
                    <option value="<?= $bannerUpdate["id"] ?>">
                        <?= $bannerUpdate["name"] ?></option>
                <?php } ?>
            </select>
            <label for="bannerNameNew">Новое название баннера</label>
            <input class="bannerNameNew" name="bannerNameNew" placeholder="Новое название баннера">
            <label for="bannerTitleNew">Новый заголовок баннера</label>
            <input class="bannerTitleNew" name="bannerTitleNew" placeholder="Новый заголовок баннера">
            <label for="bannerTextNew">Новый текст баннера</label>
            <input class="bannerTextNew" name="bannerTextNew" placeholder="Новый текст для баннера">
            <label for="imgNew">Новое изображение для баннера</label>
            <input type="file" name="imgNew">
            <button type="submit">Изменить баннер</button>
        </form>

        <form class="adminForm" action="../functions/allAdminFunctions.php#deleteBanner" method="post" enctype="multipart/form-data">
            <h2>Удалить баннер</h2>
            <input type="hidden" name="action" value="deleteBanner">
            <select name="deleteBanner">
                <?php foreach ($banner as $bannerDelete) { ?>
                    <option value="<?= $bannerDelete["id"] ?>"><?= $bannerDelete["name"] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Удалить баннер</button>
        </form>

        <form class="adminForm" action="../functions/allAdminFunctions.php#updateBannerStatus" method="post" enctype="multipart/form-data">
            <h2>Выбрать активный баннер</h2>
            <input type="hidden" name="action" value="updateBannerStatus">
            <select name="activeBanner">
                <?php foreach ($banner as $bannerActive) { ?>
                    <option value="<?= $bannerActive["id"] ?>"
                        <?php
                        echo  $bannerActive['active'] == 1 ? "selected" : "";
                        ?>
                        ><?= $bannerActive["name"] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Выбрать баннер</button>
        </form>
    </div>
</main>
<?php require_once "right_section.php";
?>
