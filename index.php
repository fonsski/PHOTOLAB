<?php
$pageTitle = "PHOTOLAB";
require_once "vendor/components/header.php";
global $link;
$category = $link->query("SELECT * FROM categories");
$banner = $link->query("SELECT * FROM banner WHERE active = 1");
?>

<div class="content">
    <section id="banner">
        <div class="info_banner">
        <?php foreach ($banner as $bann) { ?>
            <img src="assets/img/banner/<?= $bann["img"] ?>" alt="<?= $bann["img"] ?>" class="info_banner__img">
            <div class="info_banner__content">
                <h1 class="banner_title"><?= $bann["title"] ?></h1>
                <p class="banner_description">
                    <?= $bann["text"] ?>
                </p>
                <a href="vendor/components/stocks.php?id=<?= $bann['id']; ?>" class="banner_button">Подробнее</a>
            </div>
        <?php } ?>
        </div>
    </section>
  <section id="services">
    <h2 class="services_title">Наши услуги</h2>
    <div class="services_category__block">
      <button class="services_mobile__nav"><i class="fa fa-bars" aria-hidden="true"></i></button>
      <h2>Открыть каталог</h2>
    </div>
    <nav class="services_nav__block">
      <?php foreach ($category as $categor) { ?>
        <button class="services_button" id="<?= $categor["id"] ?>"><?= $categor["name"] ?>
    </button>
      <?php } ?>
    </nav>
    <div class="services_content">

    </div>
  </section>
  <!-- TODO: Решить где будет секция с адресами -->
  <!-- <section id="addresses">
    <h2 class="addresses_title">Адреса</h2>
  </section> -->

</div>

<?php 
require_once "vendor/components/footer.php";
?>