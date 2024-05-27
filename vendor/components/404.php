<?php
$title = "Страница не найдена";
require_once "header.php";
?>
<section class="page404">

    <div class="main_404">
        <h1 class="title404">СТРАНИЦА НЕ НАЙДЕНА</h1>
        <h2 class="error404">«Ошибка 404»</h2>
        <p class="desc">Вернитесь на главную и попробуйте снова</p>
        <div class="homepage">
            <button class="home"><i class="fa fa-home" aria-hidden="true"></i> Главная</button>
        </div>
        <div class="paws"><img src="/assets/img/icons/paws.png" alt="Лапки"></div>
    </div>

</section>
<?php
require_once "footer.php";
?>
</body>
<script>
    let homeButton = document.querySelector(".home");

    homeButton.addEventListener("click", () => {
        window.location.replace("/index.php");
    });
</script>

</html>