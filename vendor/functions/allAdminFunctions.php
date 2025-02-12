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
    $fields = [
        "name" => $_POST["categoryAdd"],
    ];

    addEntity("categories", $fields);
    redirectUser();
}

function updateCategory()
{
    $fields = [
        "name" => $_POST["categoryNameChange"],
    ];

    $condition = ["id" => $_POST["categoryOld"]];

    updateEntity("categories", $fields, $condition);
    redirectUser();
}

function deleteCategory()
{
    $condition = ["id" => $_POST["deleteCategory"]];

    deleteEntity("categories", $condition);
    redirectUser();
}

function addBanner()
{
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

    $fields = [
        "name" => $_POST["bannerName"],
        "title" => $_POST["bannerTitle"],
        "text" => $_POST["bannerText"],
        "img" => $img,
    ];

    addEntity("banner", $fields);
    redirectUser();
}

function updateBanner()
{
    function updateBanner()
    {
        $fields = [
            "name" => $_POST["bannerNameNew"],
            "title" => $_POST["bannerTitleNew"],
            "text" => $_POST["bannerTextNew"],
        ];

        // Проверяем, загружено ли новое изображение
        if (
            !empty($_FILES["imgNew"]) &&
            $_FILES["imgNew"]["error"] === UPLOAD_ERR_OK
        ) {
            $files = $_FILES["imgNew"];
            $fileType = mime_content_type($files["tmp_name"]);
            if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
                die("Неверный тип файла");
            }
            $img = $files["name"];
            move_uploaded_file(
                $files["tmp_name"],
                "../../assets/img/banner/" . $img
            );
            $fields["img"] = $img;
        }

        $condition = ["id" => $_POST["bannerOld"]];

        updateEntity("banner", $fields, $condition);
        redirectUser();
    }
}

function updateBannerStatus()
{
    global $link;
    $link->query("UPDATE `banner` SET `active` = 0 WHERE 1");
    $link->query(
        "UPDATE `banner` SET `active` = 1 WHERE `id` = '{$_POST["activeBanner"]}'"
    );

    redirectUser();
}

function deleteBanner()
{
    $condition = ["id" => $_POST["deleteBanner"]];

    deleteEntity("banner", $condition);
    redirectUser();
}
