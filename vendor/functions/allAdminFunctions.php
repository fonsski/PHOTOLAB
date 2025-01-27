<?php
require_once "core.php";

// Выбор функции на основе полученного действия с админ-панели
if (isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "addProduct":
            addProduct();
            break;
        case "updateProduct":
            updateProduct();
            break;
        case "deleteProduct":
            deleteProduct();
            break;
        case "addCategory":
            addCategory();
            break;
        case "updateCategory":
            updateCategory();
            break;
        case "deleteCategory":
            deleteCategory();
            break;
        case "addBanner":
            addBanner();
            break;
        case "updateBanner":
            updateBanner();
            break;
        case "updateBannerStatus":
            updateBannerStatus();
            break;
        case "deleteBanner":
            deleteBanner();
            break;
        default:
            die("Некорректное действие");
    }
}

// Функция добавления продукта
function addProduct()
{
    $img = "";
    if (!empty($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
        $files = $_FILES["img"];
        $fileType = mime_content_type($files["tmp_name"]);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            die("Неверный тип файла");
        }
        $img = $files["name"];
        move_uploaded_file(
            $files["tmp_name"],
            "../../assets/img/products/" . $img
        );
    }

    $fields = [
        "category_id" => $_POST["productCategory"],
        "name" => $_POST["productName"],
        "cost" => $_POST["productCost"],
        "img" => $img,
    ];

    addEntity("products", $fields);
    redirectUser();
}

function updateProduct()
{
    $fields = [
        "category_id" => $_POST["productCategoryNew"],
        "name" => $_POST["productNameNew"],
        "cost" => $_POST["productCostNew"],
    ];

    // Проверяем, загружено ли новое изображение
    if (
        !empty($_FILES["productImgNew"]) &&
        $_FILES["productImgNew"]["error"] === UPLOAD_ERR_OK
    ) {
        $files = $_FILES["productImgNew"];
        $fileType = mime_content_type($files["tmp_name"]);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            die("Неверный тип файла");
        }
        $img = $files["name"];
        move_uploaded_file(
            $files["tmp_name"],
            "../../assets/img/products/" . $img
        );
        $fields["img"] = $img;
    }

    $condition = ["id" => $_POST["productUpdate"]];

    updateEntity("products", $fields, $condition);
    redirectUser();
}

function deleteProduct()
{
    $condition = ["id" => $_POST["productDelete"]];

    deleteEntity("products", $condition);
    redirectUser();
}

function addCategory()
{
    global $link;
    $link->query(
        "INSERT INTO `categories`(`name`) VALUES ('{$_POST["categoryAdd"]}')"
    );
    redirectUser();
}

function updateCategory()
{
    global $link;
    $link->query(
        "UPDATE `categories` SET `name`='{$_POST["categoryNameChange"]}' WHERE id = '{$_POST["categoryOld"]}'"
    );
    redirectUser();
}

function deleteCategory()
{
    global $link;

    $link->query(
        "DELETE FROM `categories` WHERE id = '{$_POST["deleteCategory"]}'"
    );
    redirectUser();
}

function addBanner()
{
    global $link;

    $img = "";
    if (
        !empty($_FILES["banner_image"]) &&
        $_FILES["banner_image"]["error"] === UPLOAD_ERR_OK
    ) {
        $files = $_FILES["banner_image"];
        $fileType = mime_content_type($files["tmp_name"]);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            die("Неверный тип файла");
        }
        $img = $files["name"];
        move_uploaded_file(
            $files["tmp_name"],
            "../../assets/img/banner/" . $img
        );
    }
    $link->query("INSERT INTO `banner`(`name`, `title`, `text`, `img`) VALUES
    (
    '{$_POST["bannerName"]}',
    '{$_POST["bannerTitle"]}',
    '{$_POST["bannerText"]}',
    '$img'
    )");
    redirectUser();
}

function updateBanner()
{
    global $link;
    $img = "";

    // Проверяем, загрузил ли пользователь новое изображение
    if (
        !empty($_FILES["imgNew"]) &&
        $_FILES["imgNew"]["error"] === UPLOAD_ERR_OK
    ) {
        $files = $_FILES["productImgNew"];
        $fileType = mime_content_type($files["tmp_name"]);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            die("Неверный тип файла");
        }
        $img = $files["name"];
        move_uploaded_file(
            $files["tmp_name"],
            "../../assets/img/banner/" . $img
        );
    }

    // Если новое изображение не загружено, то не обновляем поле `img`
    $imgUpdate = $img ? ", `img` = '$img'" : "";

    // Обновляем данные по баннеру с проверкой по ID
    $link->query("UPDATE `banner` SET
        `name` = '{$_POST["bannerNameNew"]}',
        `title` = '{$_POST["bannerTitleNew"]}',
        `text` = '{$_POST["bannerTextNew"]}'
        $imgUpdate
        WHERE `id` = '{$_POST["bannerOld"]}'");
    redirectUser();
}

function updateBannerStatus()
{
    global $link;
    $link->query(
        "UPDATE `banner` SET `active` = 1 WHERE `id` = '{$_POST["activeBanner"]}'"
    );
    redirectUser();
}

function deleteBanner()
{
    global $link;
    $link->query(
        "DELETE FROM `banner` WHERE `id` = '{$_POST["deleteBanner"]}'"
    );
    redirectUser();
}
?>
