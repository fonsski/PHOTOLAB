// Этот код добавляет обработчики событий на нажатие клавиш клавиатуры. При нажатии комбинации клавиш Ctrl + Alt + 'a' или Ctrl + Alt + 'ф' происходит перенаправление на страницу auth_page.php в папке vendor/components.

document.addEventListener("keydown", function (event) {
  if (event.ctrlKey && event.altKey && event.key === "a") {
    window.location.href = "../../vendor/components/auth_page.php";
  }
});

document.addEventListener("keydown", function (event) {
  if (event.ctrlKey && event.altKey && event.key === "ф") {
    window.location.href = "../../vendor/components/auth_page.php";
  }
});
