<!-- © Все права на код принадлежат Photolab, ИП Столяров -->

<?php
include_once "core.php"; // подключаем ядро сайта

if (isset($_POST['log'])) {
    $login = $link->real_escape_string($_POST['login']); // защита от SQL инъекций
    $password = $link->real_escape_string($_POST['password']); // защита от SQL инъекций

    $users = $link->query("SELECT id FROM users WHERE login = '$login' AND password = '$password' AND `role` = 'admin'");
    #прикрутить препэйр prepare
    if ($users->num_rows == 0) {
        $_SESSION['errors']['login'] = "Неправильный логин или пароль";
        redirectUser('../components/auth_page.php'); // перенаправление на страницу с сообщением об ошибке
        exit();
    }

    $user = $users->fetch_assoc();
    $_SESSION['admin']['id'] = $user['id'];
    redirectUser('../../index.php'); // перенаправление на страницу администратора
    exit();
}

exit();
