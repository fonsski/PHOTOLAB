<?php
$target_dir = "/assets/img/orders";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Проверьте, действительно ли файл является изображением
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Файл не является изображением.";
        $uploadOk = 0;
    }
}

// Проверка существования файла
if (file_exists($target_file)) {
    echo "Файл уже существует.";
    $uploadOk = 0;
}

// Ограничение размера файла (например, 5MB)
if ($_FILES["image"]["size"] > 5000000) {
    echo "Ваш файл слишком большой.";
    $uploadOk = 0;
}

// Разрешить только определенные форматы файлов
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Разрешены только файлы JPG, JPEG, PNG и GIF.";
    $uploadOk = 0;
}

// Проверьте, не возникли ли ошибки
if ($uploadOk == 0) {
    echo "Ваш файл не был загружен.";
// Если все в порядке, попытайтесь загрузить файл
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Файл ". basename( $_FILES["image"]["name"]). " был успешно загружен.";
        // Здесь можно добавить код для сохранения данных о заказе в базу данных
    } else {
        echo "Произошла ошибка при загрузке вашего файла.";
    }
}
?>