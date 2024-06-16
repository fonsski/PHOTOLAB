<?php
require_once "core.php";
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

// Функция для добавления продукта
function addProduct()
{
    global $link;
    $img = '';
    if (!empty($_FILES['img'])) {
        $files = $_FILES['img'];
        $img = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/products/' . $img);
    }
    $stmt = $link->prepare("INSERT INTO `products` (`category_id`, `name`, `cost`, `img`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $_POST['productCategory'], $_POST['productName'], $_POST['productCost'], $img);
    $stmt->execute();
    $stmt->close();
}

// Функция для удаления продукта
function deleteProduct()
{
    global $link;
    $stmt = $link->prepare("DELETE FROM `products` WHERE name = ?");
    $stmt->bind_param("s", $_POST['productDelete']);
    $stmt->execute();
    $stmt->close();
}

// Функция для обновления продукта
function updateProduct()
{
    global $link;
    $product_id = $_POST['productUpdate'];
    $img = ''; // Переменная для хранения имени файла

    if (!empty($_FILES['productImgNew']['name'])) { // Проверка, был ли выбран файл
        $files = $_FILES['productImgNew'];
        $img = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/products/' . $img);
    }

    if (!empty($img)) {
        $stmt = $link->prepare("UPDATE `products` SET `category_id`=?, `name`=?, `cost`=?, `img`=? WHERE `id`=?");
        $stmt->bind_param("isssi", $_POST['productCategoryNew'], $_POST['productNameNew'], $_POST['productCostNew'], $img, $product_id);
    } else {
        $stmt = $link->prepare("UPDATE `products` SET `category_id`=?, `name`=?, `cost`=? WHERE `id`=?");
        $stmt->bind_param("issi", $_POST['productCategoryNew'], $_POST['productNameNew'], $_POST['productCostNew'], $product_id);
    }

    $stmt->execute();
    $stmt->close();
}

// Функция для обновления статуса баннера
function updateBannerStatus()
{
    global $link;
    $stmt = $link->prepare("UPDATE banner SET active = '0' WHERE name != ?");
    $stmt->bind_param("s", $_POST['activeBanner']);
    $stmt->execute();
    $stmt->close();

    $stmt = $link->prepare("UPDATE banner SET active = '1' WHERE name = ?");
    $stmt->bind_param("s", $_POST['activeBanner']);
    $stmt->execute();
    $stmt->close();
}

// Функция для добавления баннера
function addBanner()
{
    global $link;
    if (!empty($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
        $files = $_FILES['banner_image'];
        $banner_image = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);
        $stmt = $link->prepare("INSERT INTO `banner`(`name`, `title`, `text`, `img`, `active`) VALUES (?, ?, ?, ?, NULL)");
        $stmt->bind_param("ssss", $_POST['bannerName'], $_POST['bannerTitle'], $_POST['bannerText'], $banner_image);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Ошибка при загрузке файла.";
    }
}

// Функция для удаления баннера
function deleteBanner()
{
    global $link;
    $stmt = $link->prepare("DELETE FROM `banner` WHERE name = ?");
    $stmt->bind_param("s", $_POST['deleteBanner']);
    $stmt->execute();
    $stmt->close();
}

// Функция для обновления баннера
function updateBanner()
{
    global $link;
    $banner_name = $_POST['bannerOld'];
    $banner_image = '';

    if (!empty($_FILES['imgNew']['name'])) {
        $files = $_FILES['imgNew'];
        $banner_image = $files['name'];
        move_uploaded_file($files['tmp_name'], '../../assets/img/banner/' . $banner_image);
    }

    $stmt = $link->prepare("UPDATE `banner` SET `name`=?, `title`=?, `text`=?, `img`=? WHERE `name`=?");
    $stmt->bind_param("sssss", $_POST['bannerNameNew'], $_POST['bannerTitleNew'], $_POST['bannerTextNew'], $banner_image, $banner_name);
    $stmt->execute();
    $stmt->close();
}

// Функция для добавления категории
function addCategory()
{
    global $link;
    $stmt = $link->prepare("INSERT INTO `categories`(`name`) VALUES (?)");
    $stmt->bind_param("s", $_POST['categoryAdd']);
    $stmt->execute();
    $stmt->close();
}

// Функция для удаления категории
function deleteCategory()
{
    global $link;
    $stmt = $link->prepare("DELETE FROM `categories` WHERE name = ?");
    $stmt->bind_param("s", $_POST['deleteCategory']);
    $stmt->execute();
    $stmt->close();
}

// Функция для обновления имени категории
function changeCategoryName()
{
    global $link;
    $stmt = $link->prepare("UPDATE `categories` SET `name`=? WHERE `name` = ?");
    $stmt->bind_param("ss", $_POST['categoryNameChange'], $_POST['categoryOldName']);
    $stmt->execute();
    $stmt->close();
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
    header("Location: /admin/admin_panel.php"); // Перенаправление на стандартную страницу, если нет сохраненного URL
}
