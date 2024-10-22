<?php
require_once "core.php";
$_SESSION["referer"] = $_SERVER["HTTP_REFERER"];

$_POST = (array) json_decode(file_get_contents("php://input"));

// Универсальная функция для получения данных
function getValue($entity, $id)
{
    global $link;

    switch ($entity) {
        case "product":
            $query = "SELECT * FROM `products` WHERE `id` = '$id'";
            break;
        case "category":
            $query = "SELECT * FROM `categories` WHERE `id` = '$id'";
            break;
        case "banner":
            $query = "SELECT * FROM `banner` WHERE `id` = '$id'";
            break;
        default:
            return ["error" => "Invalid entity"];
    }

    $result = $link->query($query);
    return $result ? $result->fetch_assoc() : ["error" => "Not found"];
}

// Обработка POST-запросов
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = [];

    if (isset($_POST["action"], $_POST["entity"], $_POST["id"])) {
        $action = $_POST["action"];
        $entity = $_POST["entity"];

        switch ($action) {
            case "getValue":
                $result = getValue($entity, $_POST["id"]);
                break;
            default:
                $result = ["error" => "Invalid action"];
                break;
        }
    } else {
        $result = ["error" => "Missing parameters"];
    }

    echo json_encode($result);
}
