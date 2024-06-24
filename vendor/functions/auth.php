<?php
require_once "core.php"; // Подключаем ядро сайта
session_start(); // Стартуем сессию

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (empty($login) || empty($password)) {
        $_SESSION['errors']['login'] = "Логин и пароль не должны быть пустыми";
        redirectUser('../components/auth_page.php');
        exit();
    }

    // Подготовленный запрос для проверки логина и пароля
    if ($stmt = $link->prepare("SELECT id, password FROM users WHERE login = ? AND role = 'admin'")) {
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION['errors']['login'] = "Неправильный логин или пароль";
            redirectUser('../components/auth_page.php'); // Перенаправление на страницу с сообщением об ошибке
            $stmt->close();
            exit();
        }

        $user = $result->fetch_assoc();
        $stmt->close();

        // Проверяем пароль
        if ($password !== $user['password']) {
            $_SESSION['errors']['login'] = "Неправильный логин или пароль";
            redirectUser('../components/auth_page.php'); // Перенаправление на страницу с сообщением об ошибке
            exit();
        }

        $_SESSION['admin']['id'] = $user['id'];
        redirectUser('../../index.php'); // Перенаправление на страницу администратора
        exit();
    } else {
        $_SESSION['errors']['login'] = "Ошибка запроса к базе данных: " . $link->error;
        redirectUser('../components/auth_page.php');
        exit();
    }
} else {
    $_SESSION['errors']['login'] = "Некорректный запрос";
    redirectUser('../components/auth_page.php');
    exit();
}
exit();