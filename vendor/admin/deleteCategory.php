<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
require "../functions/core.php";

$category_name = $_POST['category_old_del'];

$link->query("DELETE FROM `categories` WHERE name = '$category_name'");

redirectUser('../admin/admin_panel.php');
