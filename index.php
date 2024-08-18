<?php
$title = "PHOTOLAB";
require_once "vendor/components/header.php";
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
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
    <h2 class="addresses_title">Адреса</h2>
    <div class="addresses_category__block">
      <button class="addresses_mobile__nav"><i class="fa fa-bars" aria-hidden="true"></i></button>
      <h2>Открыть список</h2>
    </div>
    <nav class="address_nav__block">
      <button class="address_button" id="1">1-я транспортная, 10</button>
      <button class="address_button" id="2">6-я станционная 2/3</button>
      <button class="address_button" id="3">Дианова, 14</button>
      <button class="address_button" id="4">Комарова 6к1</button>
    </nav>
    <div class="address_content">
      <div id="map"></div>
    </div>
  </section>

</div>

<?php
require_once "vendor/components/footer.php";
?>
