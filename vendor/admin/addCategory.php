<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
# код запроса для добавления категории
include "../functions/core.php";

$link->query("INSERT INTO `categories`(`id`, `name`) VALUES (NULL,'{$_POST['category_name']}')");

redirectUser('../admin/admin_panel.php');