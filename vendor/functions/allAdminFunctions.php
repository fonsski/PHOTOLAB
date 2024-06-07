<?php
require_once "core.php";
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

// Функция для добавления продукта
function addProduct()
{
    global $link;
    if (!empty($_FILES['img'])) {
        $files = $_FILES['img'];
        $img = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/products/' . $img);
    }
    $link->query("INSERT INTO `products` (id, `category_id`, `name`, `cost`, `img`) 
    VALUES (NULL, '{$_POST['productCategory']}', '{$_POST['productName']}', '{$_POST['productCost']}', '$img')");
}

// Функция для удаления продукта
function deleteProduct()
{
    global $link;
    $product_name = $_POST['productDelete'];
    $link->query("DELETE FROM `products` WHERE name = '$product_name'");
}

// Функция для обновления продукта
function updateProduct()
{
    global $link;
    $product_id = $_POST['productUpdate'];
    $img = ''; // Variable to store the file name

    if (!empty($_FILES['productImgNew']['name'])) { // Check if a file was selected
        $files = $_FILES['productImgNew'];
        $img = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/products/' . $img);
    }

    // Prepare the query with consideration for the presence or absence of a file
    $query = "UPDATE `products` SET `category_id`='{$_POST['productCategoryNew']}', `name`='{$_POST['productNameNew']}', `cost`='{$_POST['productCostNew']}'";
    if (!empty($img)) {
        $query .= ", `img`='$img'";
    }
    $query .= " WHERE `id` = '$product_id'";
    $link->query($query);
}

// Функция для обновления статуса баннера
function updateBannerStatus()   
{
    global $link;
    $link->query("UPDATE banner SET active = '0' WHERE name != '{$_POST['activeBanner']}'");
    $link->query("UPDATE banner SET active = '1' WHERE name = '{$_POST['activeBanner']}'");
}

// Функция для добавления баннера
function addBanner()
{
    global $link;
    if (!empty($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
        $files = $_FILES['banner_image'];
        $banner_image = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);
        $link->query("INSERT INTO `banner`(`id`, `name`, `title`, `text`, `img`, `active`) VALUES (NULL,'{$_POST['banner_name']}',
        '{$_POST['banner_title']}','{$_POST['banner_text']}', '$banner_image', NULL)");
    } else {
        echo "Ошибка при загрузке файла.";
    }
}

// Функция для удаления баннера
function deleteBanner()
{
    global $link;
    $banner_name = $_POST['deleteBanner'];
    $link->query("DELETE FROM `banner` WHERE name = '$banner_name'");
}

// Функция для обновления баннера
function updateBanner()
{
    global $link;
    $banner_name = $_POST['bannerOld'];
    if (!empty($_FILES['banner_image'])) {
        $files = $_FILES['banner_image'];
        $banner_image = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);
    }
    $link->query("UPDATE `banner` SET `name`='{$_POST['banner_name__new']}',`title`='{$_POST['banner_title__new']}',
    `text`='{$_POST['banner_text__new']}',`img`= '$banner_image' WHERE `name` = '$banner_name'");
}

// Функция для добавления категории
function addCategory()
{
    global $link;
    $link->query("INSERT INTO `categories`(`id`, `name`) VALUES (NULL,'{$_POST['categoryAdd']}')");
}

// Функция для удаления категории
function deleteCategory()
{
    global $link;
    $category_name = $_POST['deleteCategory'];
    $link->query("DELETE FROM `categories` WHERE name = '$category_name'");
}

// Функция для обновления имени категории
function changeCategoryName()
{
    global $link;
    $category_name = $_POST['categoryOldName'];
    $link->query("UPDATE `categories` SET `name`='{$_POST['categoryNameChange']}' WHERE `name` = '$category_name'");
}

// Вызов соответствующей функции в зависимости от отправленной формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'addCategory':
                addCategory();
                break;
            case 'addProduct':
                addProduct();
                break;
            case 'updateBannerStatus':
                updateBannerStatus();
                break;
            case 'addBanner':
                addBanner();
                break;
            case 'deleteBanner':
                deleteBanner();
                break;
            case 'updateBanner':
                updateBanner();
                break;
            case 'deleteCategory':
                deleteCategory();
                break;
            case 'deleteProduct':
                deleteProduct();
                break;
            case 'updateProduct':
                updateProduct();
                break;
            case 'changeCategoryName':
                changeCategoryName();
                break;
                // Добавьте другие случаи по мере необходимости
            default:
                // Обработка случая, если действие не определено
                break;
        }
    }
}

if (isset($_SESSION['referer'])) {
    header("Location: {$_SESSION['referer']}");
} else {
    header("Location: ../admin/admin_panel.php"); // Перенаправление на стандартную страницу, если нет сохраненного URL
}
