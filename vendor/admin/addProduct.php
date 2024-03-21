<?php
// Этот код выполняет загрузку изображения, сохранение информации о продукте в базе данных и перенаправление пользователя на административную панель.

include "../functions/core.php";
if (!empty($_FILES['img'])) {
    $files = $_FILES['img'];
    $img = $files['name'];
    move_uploaded_file($files['tmp_name'], '../../assets/img/products/' . $img);
}
$link->query("INSERT INTO `products` (id, `category_id`, `name`, `cost`, `img`) 
VALUES (NULL, '{$_POST['category_id']}', '{$_POST['name']}', '{$_POST['cost']}', '$img')");
redirectUser('../admin/admin_panel.php');