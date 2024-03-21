<?php

include "../functions/core.php";

$product_name = $_POST['name_old'];


if (!empty($_FILES['img__new'])) {
    $files = $_FILES['img__new'];
    $img = $files['name'];
}

move_uploaded_file($files['tmp_name'], '../../assets/img/products/' . $img);

$link->query("UPDATE `products` SET `category_id`='{$_POST['category_id__new']}',`name`='{$_POST['products__name_new']}',`cost`='{$_POST['cost__new']}',`img`='$img' WHERE `name` = '$product_name'");

redirectUser('../admin/admin_panel.php');