document.addEventListener("DOMContentLoaded", function () {
  var burgerMenu = document.querySelector(".header_nav");
  var navMenu = document.querySelector(".header_nav ul");
  navMenu.style.display = "none"; // устанавливаем начальное состояние меню

  burgerMenu.addEventListener("mousedown", function (event) {
    event.preventDefault(); // предотвращаем стандартное действие браузера
    if (navMenu.style.display === "flex") {
      navMenu.style.display = "none";
    } else {
      navMenu.style.display = "flex";
    }
  });

  window.addEventListener("resize", function () {
    if (window.innerWidth > 749) {
      navMenu.style.display = "flex";
    } else {
      navMenu.style.display = "none";
    }
  });

  document.addEventListener("click", function (event) {
    if (!event.target.closest(".header_nav")) {
      navMenu.style.display = "none";
    }
  });
});