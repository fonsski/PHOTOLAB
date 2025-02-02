<?php
// Подключение к базе данных
require_once "core.php";
global $link;

// Запрос к БД
$query = "SELECT id, name, cost, updated_at FROM products WHERE updated_at >= NOW() - INTERVAL 24 HOUR ORDER BY updated_at DESC";
$result = mysqli_query($link, $query);

// Формируем массив с результатами
$products = array();
while($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

// Возвращаем данные в формате JSON  
header('Content-Type: application/json');
echo json_encode($products);
?>