<?php
include "../functions/core.php";

$banner_name = $_POST['name_old'];


if (!empty($_FILES['img__new'])) {
    $files = $_FILES['img__new'];
    $banner_image = $files['name'];
}

move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);

$link->query("UPDATE `banner` SET `name`='{$_POST['']}',`title`='[value-3]',`text`='[value-4]',`img`='[value-5]' WHERE `name` = '$banner_name'");
