<?php
require_once "{$_SERVER["DOCUMENT_ROOT"]}/vendor/functions/core.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Готовите к печати фотографии? Нужна срочная печать брошюр? Хотите заказать брендированные сувениры? Сеть рекламных и полиграфических услуг «Photolab» выполнит любой заказ! Мы предлагаем широкий спектр услуг: от печати фотографий до изготовления рекламной продукции. Качественная работа, индивидуальный подход и конкурентные цены — вот почему клиенты выбирают нас!">
  <meta name="keywords" content="Печать фотографий, фото, печать, документы, брошурация, сувениры, печать документов, печать визиток, печать листовок, печать плакатов, печать баннеров, печать на кружках, печать на футболках, сувениры, рекламная продукция, типография «Photolab».">
  <link rel="stylesheet" href="/assets/css/main.css" />
  <link rel="stylesheet" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon"/>
  <title><?php echo $title; ?></title>
</head>

<body>
  <header>
    <a href="/index.php"><img src="/assets/img/logo.svg" alt="Логотип типография Photolab" class="logo" /></a>
    <nav class="header_nav">
      <ul class="nav_bar">
        <li class="nav_element"><a href="/index.php">ГЛАВНАЯ</a></li>
        <li class="nav_element"><a href="/index.php#services">КАТАЛОГ</a></li>
        <li class="nav_element"><a href="/index.php#footer">КОНТАКТЫ</a></li>
        <li class="nav_element"><a href="/vendor/components/about.php">О НАС</a></li>
        <?php if (isset($_SESSION["admin"])) { ?>
          <li class="nav_element"><a href="/vendor/admin/admin_panel.php">АДМИН-ПАНЕЛЬ</a></li>
          <li class="nav_element"><a href="/vendor/functions/logout.php">ВЫХОД</a></li>
        <?php } ?>
        <!-- <button type="button" class="btn btn-default" data-modal="modal_1">РАССЧИТАТЬ СТОИМОСТЬ</button> -->
      </ul>
    </nav>
    <button class="hamburger_nav"><i class="fa fa-bars" aria-hidden="true"></i></button>

    <nav class="mobile_nav">
      <ul class="nav_bar__mobile">
        <li class="nav_element__mobile"><a href="/index.php">ГЛАВНАЯ</a></li>
        <li class="nav_element__mobile"><a href="#services">КАТАЛОГ</a></li>
        <li class="nav_element__mobile"><a href="#footer">КОНТАКТЫ</a></li>
        <li class="nav_element__mobile"><a href="/vendor/components/about.php">О НАС</a></li>
        <?php if (isset($_SESSION["admin"])) { ?>
          <li class="nav_element__mobile"><a href="/vendor/admin/admin_panel.php">АДМИН-ПАНЕЛЬ</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <button class="topButton"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
  <!-- <div class="overlay" data-close=""></div>
  <div id="modal_1" class="dlg-modal dlg-modal-fade">
    <span class="closer" data-close=""></span>
    <h3>Здесь Вы можете рассчитать примерную стоимость заказа</h3>
    <p>Стоимость рассчитывается примерно, точную полную стоимость согласует оператор в филиале</p>
  </div>
  </div> -->
