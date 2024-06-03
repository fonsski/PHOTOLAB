function positionFooter() {
    const footer = document.querySelector('footer');
    const content = document.querySelector('.content');
    const windowHeight = window.innerHeight;
    const footerHeight = footer.offsetHeight;
    const contentHeight = content.offsetHeight;

    if ((contentHeight + footerHeight) < windowHeight) {
        footer.style.position = 'fixed';
        footer.style.bottom = '0';
    } else {
        footer.style.position = 'static';
    }
}

window.addEventListener('load', positionFooter);
window.addEventListener('resize', positionFooter);