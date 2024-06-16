// Получаем все кнопки адресов и блоки с адресами
const addressButtons = document.querySelectorAll(".address_button");
const addressBlocks = document.querySelectorAll(".address_content");
const addressesMobile = document.querySelectorAll(".addresses_mobile__nav");
const addressesNavBlock = document.querySelectorAll(".address_nav__block");

if (addressButtons.length > 0 && addressBlocks.length > 0) {
  addressBlocks.forEach((block) => (block.style.display = "none")); // Скрыть все блоки адресов

  // Добавить класс "active_adr" к первой кнопке при загрузке страницы
  addressButtons[0].classList.add("active_adr");
  addressBlocks[0].style.display = "flex"; // Показать первый блок адреса

  addressButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      addressBlocks.forEach((block, i) => {
        if (i === index) {
          block.style.display = "flex";
          addressButtons[i].classList.add("active_adr");
        } else {
          block.style.display = "none";
          addressButtons[i].classList.remove("active_adr");
        }
      });
    });
  });
}

if (addressesMobile.length > 0 && addressesNavBlock.length > 0) {
  addressesMobile[0].addEventListener("click", function () {
    addressesNavBlock[0].classList.toggle("open");
  });
}