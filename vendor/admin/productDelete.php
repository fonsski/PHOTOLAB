<?php
require "../functions/core.php";

$product_name = $_POST['product__delete'];

$link->query("DELETE FROM `products` WHERE name = '$product_name'");

redirectUser('../admin/admin_panel.php');