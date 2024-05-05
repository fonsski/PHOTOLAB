<?php
require "core.php";
$_POST = (array) json_decode(file_get_contents('php://input'));
$products = $link->query("SELECT * FROM `products` WHERE category_id = '{$_POST['id']}'");
$data = array();
foreach ($products as $key => $value) {
    $data[] = [
        'name' => $value['name'],
        'price' => $value['cost'],
        'img' => $value['img'],
    ];
}
echo json_encode($data);
?>