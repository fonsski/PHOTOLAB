<?php
include "../functions/core.php";

$category_name = $_POST['category_old'];

$link->query("UPDATE `categories` SET `name`='{$_POST['category_new_name']}' WHERE `name` = '$category_name'");

redirectUser('../admin/admin_panel.php');