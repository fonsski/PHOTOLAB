document.addEventListener("DOMContentLoaded", function() {
    const hamburger = document.querySelector(".hamburger_nav");
    const mobileNav = document.querySelector(".mobile_nav");
    const bannerBlock = document.querySelector("#banner");

    hamburger.addEventListener("click", (e) => {
        e.stopPropagation();
        mobileNav.classList.toggle("open");
        if (mobileNav.classList.contains("open")) {
            if (bannerBlock) {
                bannerBlock.style.marginTop = "160px";
            }
        } else {
            if (bannerBlock) {
                bannerBlock.style.marginTop = "30px";
            }
        }
    });

    document.addEventListener("click", (e) => {
        if (!mobileNav.contains(e.target) && e.target !== hamburger) {
            mobileNav.classList.remove("open");
        }
    });
});