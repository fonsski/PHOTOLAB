document.addEventListener("DOMContentLoaded", function() {
    const hamburger = document.querySelector(".hamburger_nav");
    const mobileNav = document.querySelector(".mobile_nav");

    hamburger.addEventListener("click", (e) => {
        e.stopPropagation(); // предотвращаем всплытие события, чтобы клик на гамбургер не закрывал меню
        mobileNav.classList.toggle("open");
    });

    document.addEventListener("click", (e) => {
        if (!mobileNav.contains(e.target) && e.target !== hamburger) {
            mobileNav.classList.remove("open");
        }
    });
});