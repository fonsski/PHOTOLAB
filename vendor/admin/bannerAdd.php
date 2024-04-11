<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
include "../functions/core.php";
if (!empty($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
    $files = $_FILES['banner_image'];
    $banner_image = $files['name'];
    move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);

    $link->query("INSERT INTO `banner`(`id`, `name`, `title`, `text`, `img`, `active`) VALUES (NULL,'{$_POST['banner_name']}',
    '{$_POST['banner_title']}','{$_POST['banner_text']}', '$banner_image', NULL)");
    redirectUser('../admin/admin_panel.php');
} else {
    // Обработка ошибки загрузки файла
    echo "Ошибка при загрузке файла.";
}
?>