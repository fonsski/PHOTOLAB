// © Все права на код принадлежат Photolab, ИП Столяров

// JavaScript код для функциональности навигации администратора
const addressButtons = document.querySelectorAll(".admin-navigation");
const addressBlocks = document.querySelectorAll(".admin_content");

// Изначально скрываем все блоки адресов
addressBlocks.forEach((block) => (block.style.display = "none"));

// Устанавливаем первую кнопку и блок как активные и видимые
addressButtons[0].classList.add("active");
addressBlocks[0].style.display = "block";

// Добавляем слушатель событий клика для каждой кнопки, чтобы переключать видимость
addressButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    addressBlocks.forEach((block, i) => {
      if (i === index) {
        block.style.display = "block";
        addressButtons[i].classList.add("active");
      } else {
        block.style.display = "none";
        addressButtons[i].classList.remove("active");
      }
    });
  });
});