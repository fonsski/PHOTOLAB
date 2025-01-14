document.addEventListener("DOMContentLoaded", function() {
    // Находим элемент с классом "home"
    let homeButton = document.querySelector(".home");

    // Проверяем, есть ли элемент с классом "home"
    if (homeButton) {
        // Если элемент существует, добавляем обработчик события клика
        homeButton.addEventListener("click", () => {
            window.location.replace("/index.php");
        });
    }
});