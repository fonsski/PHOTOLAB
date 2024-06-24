<?php
// Подключение к базе данных и выполнение запроса
$pdo = new PDO('mysql:host=localhost;dbname=photolab', 'root', '');
$stmt = $pdo->query('SELECT id, name, cost, updated_at FROM products ORDER BY updated_at DESC');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($products);