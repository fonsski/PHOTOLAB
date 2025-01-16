<?php
$pageTitle = "Авторизация";
require "../functions/core.php";
session_start(); // Стартуем сессию
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Авторизация</title>
    <link rel="stylesheet" href="/assets/css/auth.css">
</head>

<body>
    <form action="../functions/auth.php" method="POST">
        <h1>Авторизация</h1>
        <?php
        if (isset($_SESSION['errors']['login'])) {
            echo '<p class="error-message">' . $_SESSION['errors']['login'] . '</p>';
            unset($_SESSION['errors']['login']);
        }
        ?>
        <input name="login" type="text" id="username" placeholder="Введите логин" required>
        <label for="username" onclick="expand(this)">Логин</label>
        <input name="password" type="password" id="password" placeholder="Введите пароль" required>
        <label for="password" onclick="expand(this)">Пароль</label>
        <button name="log" type="submit">Войти</button>
    </form>
    <script src="/assets/js/auth_page.js"></script>
</body>

</html>