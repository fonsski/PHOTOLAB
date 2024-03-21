<?php
require_once "vendor/functions/core.php";

$category = $link->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" />
  <title>PHOTOLAB</title>
</head>

<body>
  <header>
    <img src="assets/img/photologo.svg" alt="Логотип" class="logo" />
    <nav class="header_nav">
      <ul class="nav_bar">
        <li class="nav_element"><a href="#banner">ГЛАВНАЯ</a></li>
        <li class="nav_element"><a href="#services">КАТАЛОГ</a></li>
        <li class="nav_element"><a href="#footer">КОНТАКТЫ</a></li>
        <li class="nav_element"><a href="">РАССЧИТАТЬ СТОИМОСТЬ</a></li>
      </ul>
    </nav>
  </header>

  <section id="banner">
    <div class="banner_content">
      <div class="banner_image">
        <img src="assets/img/products/IMG_1690.JPG" alt="Кружка" />
      </div>

      <div class="banner_text">
        <h1>Lorem, ipsum.</h1>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus
          dolorum autem asperiores soluta velit quis aspernatur repellendus
          exercitationem deserunt libero!
        </p>
      </div>
    </div>
  </section>

  <section id="services">
    <h1 class="services_title">Наши услуги</h1>
    <div class="search_field">
      <form name="search" method="POST" action="vendor/functions/">
        <input type="search" name="query" placeholder="Поиск" />
        <button class="butt">
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
    </div>

    <nav class="services_nav__block">
      <?php foreach ($category as $cat) { ?>
        <button class="services_button" id="<?= $cat['id'] ?>"><?= $cat['name'] ?></button>
      <?php } ?>
    </nav>

    <div class="services_content">
    </div>



  </section>

  <section id="addresses">
    <h1 class="addresses_title">Адреса</h1>
    <nav class="address_nav__block">
      <button class="address_button" id="1">1-я транспортная</button>
      <button class="address_button" id="2">6-я станционная 2/3</button>
      <button class="address_button" id="3">Дианова, 14</button>
      <button class="address_button" id="4">Комарова 6к1</button>
    </nav>
    <div class="address_content">
      <a class="dg-widget-link" href="http://2gis.ru/omsk/firm/70000001047537964/center/73.4114170074463,54.96110887404802/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Омска</a>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/firm/70000001047537964/photos/70000001047537964/center/73.4114170074463,54.96110887404802/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/center/73.411413,54.960681/zoom/16/routeTab/rsType/bus/to/73.411413,54.960681╎Photolab, фотоцентр?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Photolab, фотоцентр</a></div>
      <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
      <script charset="utf-8">
        new DGWidgetLoader({
          "width": 690,
          "height": 300,
          "borderColor": "#a3a3a3",
          "pos": {
            "lat": 54.96110887404802,
            "lon": 73.4114170074463,
            "zoom": 16
          },
          "opt": {
            "city": "omsk"
          },
          "org": [{
            "id": "70000001047537964"
          }]
        });
      </script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
    </div>
    <div class="address_content">
      <a class="dg-widget-link" href="http://2gis.ru/omsk/firm/70000001047782588/center/73.45916032791139,54.92371399061932/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Омска</a>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/firm/70000001047782588/photos/70000001047782588/center/73.45916032791139,54.92371399061932/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/center/73.45916,54.922053/zoom/16/routeTab/rsType/bus/to/73.45916,54.922053╎Photolab, фотоцентр?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Photolab, фотоцентр</a></div>
      <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
      <script charset="utf-8">
        new DGWidgetLoader({
          "width": 690,
          "height": 300,
          "borderColor": "#a3a3a3",
          "pos": {
            "lat": 54.92371399061932,
            "lon": 73.45916032791139,
            "zoom": 16
          },
          "opt": {
            "city": "omsk"
          },
          "org": [{
            "id": "70000001047782588"
          }]
        });
      </script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
    </div>
    <div class="address_content">
      <a class="dg-widget-link" href="http://2gis.ru/omsk/firm/70000001047783407/center/73.25007677078248,54.99558878914401/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Омска</a>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/firm/70000001047783407/photos/70000001047783407/center/73.25007677078248,54.99558878914401/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/center/73.250073,54.995135/zoom/16/routeTab/rsType/bus/to/73.250073,54.995135╎Photolab, фотоцентр?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Photolab, фотоцентр</a></div>
      <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
      <script charset="utf-8">
        new DGWidgetLoader({
          "width": 690,
          "height": 300,
          "borderColor": "#a3a3a3",
          "pos": {
            "lat": 54.99558878914401,
            "lon": 73.25007677078248,
            "zoom": 16
          },
          "opt": {
            "city": "omsk"
          },
          "org": [{
            "id": "70000001047783407"
          }]
        });
      </script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
    </div>
    <div class="address_content">
      <a class="dg-widget-link" href="http://2gis.ru/omsk/firm/70000001048019006/center/73.28571796417238,54.9987028372875/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Омска</a>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/firm/70000001048019006/photos/70000001048019006/center/73.28571796417238,54.9987028372875/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div>
      <div class="dg-widget-link"><a href="http://2gis.ru/omsk/center/73.285721,54.996825/zoom/16/routeTab/rsType/bus/to/73.285721,54.996825╎Photolab, фотоцентр?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Photolab, фотоцентр</a></div>
      <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
      <script charset="utf-8">
        new DGWidgetLoader({
          "width": 690,
          "height": 400,
          "borderColor": "#a3a3a3",
          "pos": {
            "lat": 54.9987028372875,
            "lon": 73.28571796417238,
            "zoom": 16
          },
          "opt": {
            "city": "omsk"
          },
          "org": [{
            "id": "70000001048019006"
          }]
        });
      </script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
    </div>
  </section>

  <section id="footer">
    <div class="footer_content">
      <div class="footer_content1">
        <h1>НАШИ УСЛУГИ</h1>
        <ul>
          <li><a href="#">Печать фотографий</a></li>
          <li><a href="#">Сувениры</a></li>
          <li><a href="#">Широкоформатная печать</a></li>
          <li><a href="#">Полиграфия</a></li>
        </ul>
      </div>

      <div class="footer_content2">
        <h1>О КОМПАНИИ</h1>
        <nav>
          <ul>
            Мы в соцсетях
            <li>
              <a href="https://vk.com/fotolab55"><i class="fa fa-vk" aria-hidden="true"></i></a>
            </li>
            <li><a href="#about">О нас</a></li>
          </ul>
        </nav>
        <p></p>
      </div>

      <div class="copyright_block">
        <i class="fa fa-copyright" aria-hidden="true">2021-2024 Photolab Все права защищены</i>
      </div>
    </div>
  </section>
  <script src="assets/js/navigation.js"></script>
  <script src="assets/js/addresses.js"></script>
  <script>

  </script>
</body>

</html>