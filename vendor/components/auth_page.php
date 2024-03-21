<?php
require "../functions/core.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма авторизации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #262c38;
            color: #6f8a2b;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #6f8a2b;
        }

        form {
            background-color: #262c38;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-left: 40px;
        }

        label {
            color: #6f8a2b;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px;
            border: 1px solid #6f8a2b;
            border-radius: 3px;
            background-color: #262c38;
            color: #6f8a2b;
            transition: all 0.3s ease;
        }

        button {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 3px;
            background-color: #6f8a2b;
            color: #262c38;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #262c38;
            color: #6f8a2b;
        }

        div {
            margin-top: 15px;
            padding: 10px;
            border: 1px solid #6f8a2b;
            border-radius: 5px;
            background-color: #262c38;
            color: #6f8a2b;
        }
    </style>
</head>

<body>
    <h2>Форма авторизации</h2>
    <form action="../functions/auth.php" method="POST">
        <label for="login">Логин:</label><br>
        <input type="login" id="login" name="login"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <button name="log" type="submit">Войти</button>

        <?php if (isset($_SESSION['errors'])) : ?>
            <div>
                <?php foreach ($_SESSION['errors'] as $key => $value) : ?>
                    <p><?= $value ?></p>
                <?php endforeach; ?>
            </div>
        <?php
            # после вывода ошибки стираем сессию ошибок, иначе она будет выводиться нам всегда, даже когда мы вводим правильные данные
            unset($_SESSION['errors']);
        endif; ?>
    </form>
</body>

</html>