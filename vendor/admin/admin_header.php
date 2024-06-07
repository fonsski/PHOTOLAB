<?php
require_once "../functions/core.php";
isAdmin();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />  
    <link rel="stylesheet" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/admin_board.css" />
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon" />
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="/assets/img/photologo.svg" />
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp"> close </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="admin_panel.php">
                    <span class="material-icons-sharp"> dashboard </span>
                    <h3>Главная</h3>
                </a>
                <a href="categories.php">
                    <span class="material-icons-sharp"> local_offer </span>
                    <h3>Категории</h3>
                </a>
                <a href="products.php">
                    <span class="material-icons-sharp"> store </span>
                    <h3>Товары</h3>
                </a>
                <a href="banner.php">
                    <span class="material-icons-sharp"> collections </span>
                    <h3>Баннер</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp"> mail_outline </span>
                    <h3>Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp"> inventory </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp"> report_gmailerrorred </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp"> logout </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        