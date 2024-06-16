<?php
require_once "core.php"; // подключаем ядро сайта

if (isset($_POST['log'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Подготовленный запрос для проверки логина и пароля
    $stmt = $link->prepare("SELECT id FROM users WHERE login = ? AND password = ? AND `role` = 'admin'");
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $_SESSION['errors']['login'] = "Неправильный логин или пароль";
        redirectUser('../components/auth_page.php'); // перенаправление на страницу с сообщением об ошибке
        $stmt->close();
        exit();
    }

    $user = $result->fetch_assoc();
    $_SESSION['admin']['id'] = $user['id'];
    $stmt->close();
    redirectUser('../../index.php'); // перенаправление на страницу администратора
    exit();
}

exit();
