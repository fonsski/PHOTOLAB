<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
include "../functions/core.php";

// Сбросить значение "active" для всех баннеров
$link->query("UPDATE banner SET active = '0' WHERE name != '{$_POST['bannerActive']}'");

// Установить значение "active" только для выбранного баннера
$link->query("UPDATE banner SET active = '1' WHERE name = '{$_POST['bannerActive']}'");

redirectUser('../admin/admin_panel.php');
?>