<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
include "../functions/core.php";

$banner_name = $_POST['bannerOld'];


if (!empty($_FILES['banner_image'])) {
    $files = $_FILES['banner_image'];
    $banner_image = $files['name'];
    move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);
}


$link->query("UPDATE `banner` SET `name`='{$_POST['banner_name__new']}',`title`='{$_POST['banner_title__new']}',`text`='{$_POST['banner_text__new']}',`img`= '$banner_image' WHERE `name` = '$banner_name'");
redirectUser('../admin/admin_panel.php');
