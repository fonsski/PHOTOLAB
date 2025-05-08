<?php
session_start();
$link = new mysqli("localhost", "root", "", "photolab");
$link->set_charset("utf8mb4");
// Переход на другую страницу
function redirectUser($url = false)
{
    if ($url) {
        header("Location: " . $url);
    } else {
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
}

function isAdmin()
{
    if (!isset($_SESSION["admin"])) {
        redirectUser("../../index.php");
    }
}

// Функция добавления записи в БД
function addEntity($table, $fields)
{
    global $link;

    $query =
        "INSERT INTO `$table` (" .
        implode(", ", array_keys($fields)) .
        ") VALUES ('" .
        implode("', '", array_values($fields)) .
        "')";
    $link->query($query);
}

// Функция обновления записи в БД
function updateEntity($table, $fields, $condition)
{
    global $link;
    $setClause = implode(
        ", ",
        array_map(
            fn($key, $value) => "`$key` = '$value'",
            array_keys($fields),
            array_values($fields)
        )
    );
    $conditionClause = implode(
        " AND ",
        array_map(
            fn($key, $value) => "`$key` = '$value'",
            array_keys($condition),
            array_values($condition)
        )
    );

    $query = "UPDATE `$table` SET $setClause WHERE $conditionClause";
    $link->query($query);
}

// Функция удаления записи из БД
function deleteEntity($table, $condition)
{
    global $link;
    $query =
        "DELETE FROM `$table` WHERE " .
        implode(
            " AND ",
            array_map(
                fn($key, $value) => "`$key` = '$value'",
                array_keys($condition),
                array_values($condition)
            )
        );
    $link->query($query);
}