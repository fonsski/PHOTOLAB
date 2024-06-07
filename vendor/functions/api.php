<?php
require_once "core.php";
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

$_POST = (array) json_decode(file_get_contents('php://input'));

function getProductApi($id)
{
    global $link;
    $products = $link->query("SELECT * FROM `products` WHERE `id` = '$id'");
    $product = $products->fetch_assoc();
    return $product;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'getProductApi':
                $result = getProductApi($_POST['id']);
                break;
            default:
                // Обработка случая, если действие не определено
                break;
        }
    }
}

$response = json_encode($result);
echo $response;
