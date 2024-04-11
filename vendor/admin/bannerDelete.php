<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
include "../functions/core.php";

$banner_name = $_POST['bannerDelete'];

$link->query("DELETE FROM `banner` WHERE name = '$banner_name'");

redirectUser('../admin/admin_panel.php');