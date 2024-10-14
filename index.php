<?php
$title = "PHOTOLAB";
require_once "vendor/components/header.php";
global $link;
$category = $link->query("SELECT * FROM categories");
$banner = $link->query("SELECT * FROM banner WHERE active = 1");
?>

<div class="content">
  <section id="banner">
    <?php foreach ($banner as $banner_cont) { ?>
      <div class="banner_content">
        <div class="info_banner">
          <img src="/assets/img/banner/<?= $banner_cont['img'] ?>" alt="<?= $banner_cont['name'] ?>" />
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
    <div class="services_category__block">
      <button class="services_mobile__nav"><i class="fa fa-bars" aria-hidden="true"></i></button>
      <h2>Открыть каталог</h2>
    </div>
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
    <div class="dg-widget-container">
      <a class="dg-widget-link" href="http://2gis.ru/omsk/profiles/70000001090625202,70000001047537964,70000001047782588,70000001047783407,70000001048019006/center/73.3546165,54.96770315122562/zoom/11?utm_medium=widget-s ource&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Омска</a>
      <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
      <script charset="utf-8">
        new DGWidgetLoader({
          "width": 640,
          "height": 600,
          "pos": {
            "lat": 54.96770315122562,
            "lon": 73.3546165,
            "zoom": 11
          },
          "opt": {
            "city": "omsk"
          },
          "org": [{
            "id": "70000001090625202"
          }, {
            "id": "70000001047537964"
          }, {
            "id": "70000001047782588"
          }, {
            "id": "70000001047783407"
          }, {
            "id": "70000001048019006"
          }]
        });
      </script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
    </div>
  </section>

</div>

<?php
require_once "vendor/components/footer.php";
?>