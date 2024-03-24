<?php
include "../functions/core.php";

if (!empty($_FILES['img'])) {
    $files = $_FILES['img'];
    $banner_image = $files['name'];
    move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);
}

$link->query("INSERT INTO `banner`(`id`, `name`, `title`, `text`, `img`) VALUES (NULL,'{$_POST['banner_name']}',
'{$_POST['banner_title']}','{$_POST['banner_text']}', '$banner_image')");

redirectUser('../admin/admin_panel.php');