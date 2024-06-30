<?php
require_once "header.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Конструктор заказа</title>
</head>
<body>
    <h1>3D Конструктор заказа</h1>
    <div>
        <label for="product">Выберите изделие:</label>
        <select id="product">
            <option value="tshirt">Футболка</option>
            <option value="mug">Кружка</option>
        </select>
    </div>
    <div>
        <label for="upload">Загрузите изображение:</label>
        <input type="file" id="upload">
    </div>
    <div id="3d-container" style="width: 600px; height: 400px;"></div>
    <button id="order-button">Оформить заказ</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
