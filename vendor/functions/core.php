<?php
session_start();
$link = new mysqli('localhost', 'root', '',  'photolab', );
$link->set_charset('utf8mb4');

// Переход на другую страницу
function redirectUser($url = false)
{
    if ($url) {
        header("Location: " . $url);
    } else {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
// Проверка на администратора
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