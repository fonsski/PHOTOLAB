<?php
// © Все права на код принадлежат Photolab, ИП Столяров
session_start();
$link = new mysqli('localhost', 'root', '', 'photolab');
$link->set_charset('utf8mb4');
// Проверка соединения
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

function redirectUser($url = false)
{
    if ($url) {
        header("Location: " . $url);
    } else {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}

function isAdmin($bool = false)
{
    if ($bool) {
        return isset($_SESSION['admin']);
    } else {
        if (!isset($_SESSION['admin'])) {
            redirectUser('/');
        }
    }
}