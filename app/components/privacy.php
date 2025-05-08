<?php
require_once 'header.php';
$pageTitle = "Политика конфиденциальности";
?>
<div class="container privacy-container">
    <h1>Политика конфиденциальности</h1>
    <p>Настоящая Политика конфиденциальности определяет порядок обработки и защиты персональных данных пользователей сайта Photolab.</p>
    <h2>1. Общие положения</h2>
    <p>Использование сайта означает согласие пользователя с настоящей Политикой и условиями обработки его персональных данных.</p>
    <h2>2. Персональные данные</h2>
    <p>Сайт может собирать следующие данные: имя, адрес электронной почты, номер телефона, а также иные сведения, предоставляемые пользователем добровольно.</p>
    <h2>3. Цели обработки данных</h2>
    <ul>
        <li>Обработка заказов и обратной связи</li>
        <li>Улучшение качества обслуживания</li>
        <li>Информирование о новостях и акциях</li>
    </ul>
    <h2>4. Защита данных</h2>
    <p>Сайт принимает необходимые организационные и технические меры для защиты персональных данных от неправомерного доступа и иных противоправных действий.</p>
    <h2>5. Передача данных третьим лицам</h2>
    <p>Персональные данные не передаются третьим лицам, за исключением случаев, предусмотренных законодательством РФ.</p>
    <h2>6. Изменения политики</h2>
    <p>Администрация сайта вправе вносить изменения в настоящую Политику. Новая редакция вступает в силу с момента размещения на сайте.</p>
    <h2>7. Контакты</h2>
    <p>По вопросам обработки персональных данных вы можете связаться с нами по электронной почте: photolabzakaz@yandex.ru</p>
</div>
<?php
require_once 'footer.php';
?>

<style>
.privacy-container {
    background: #e8dbdb;
    border-radius: 15px;
    margin: 40px auto;
    padding: 2rem 2.5rem;
    max-width: 700px;
    color: #222;
    font-family: Gotham-regular, Arial, sans-serif;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
}
.privacy-container h1 {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    font-family: Gotham-bold;
}
.privacy-container h2 {
    font-size: 1.2rem;
    margin-top: 1.5rem;
    margin-bottom: 0.5rem;
    font-family: Gotham-medium;
}
.privacy-container ul {
    margin-left: 1.2rem;
    margin-bottom: 1rem;
}
.privacy-container li {
    margin-bottom: 0.5rem;
}
@media (max-width: 600px) {
    .privacy-container {
        padding: 1rem 0.5rem;
        font-size: 14px;
    }
    .privacy-container h1 {
        font-size: 1.2rem;
    }
    .privacy-container h2 {
        font-size: 1rem;
    }
}
</style>