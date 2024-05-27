<?php
  $title = "PHOTOLAB";
  require_once "vendor/components/header.php";
?>

  <section id="banner">
    <?php foreach ($banner as $banner_cont) { ?>
      <div class="banner_content">
        <div class="banner_image">
          <img src="/assets/img/banner/<?= $banner_cont['img'] ?>" alt="Изображение баннера типографии Photolab" />
        </div>

        <div class="banner_text">
          <h1><?= $banner_cont['title'] ?></h1>
          <p>
            <?= $banner_cont['text'] ?>
          </p>
        </div>
      </div>
    <?php } ?>
  </section>

  <section id="services">
    <h2 class="services_title">Наши услуги</h2>
    <nav class="services_nav__block">
      <?php foreach ($category as $categor) { ?>
        <button class="services_button" id="<?= $categor['id'] ?>"><?= $categor['name'] ?></button>
      <?php } ?>
    </nav>
    
    <div class="services_content">

    </div>
  </section>

  <section id="addresses">
    <h2 class="addresses_title">Адреса</h2>
    <nav class="address_nav__block">
      <button class="address_button" id="1">1-я транспортная</button>
      <button class="address_button" id="2">6-я станционная 2/3</button>
      <button class="address_button" id="3">Дианова, 14</button>
      <button class="address_button" id="4">Комарова 6к1</button>
      <!-- <button class="address_button" id="5">Добровольского, 10</button> -->
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
          "height": 300,
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

    <!-- сюда засунуть 2гис скрипт добровольского -->
  </section>

  <?php
    require_once "vendor/components/footer.php";
  ?>
  <button class="topButton"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
  <script src="assets/js/navigation.js" defer></script>
  <script src="assets/js/addresses.js"></script>
  <script>
    const typeAnimate = 'fade';
  </script>
  <script src="assets/js/popup.function.js"></script>
  <script src="/assets/js/dashtoadmin.js"></script>
  <script src="/assets/js/hamburger.js"></script>
  <script src="/assets/js/navRotation.js"></script>
</body>

</html>