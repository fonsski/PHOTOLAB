// Получаем все кнопки адресов и блоки с адресами
const addressButtons = document.querySelectorAll(".address_button");
const addressBlocks = document.querySelectorAll(".address_content");

addressBlocks.forEach((block) => (block.style.display = "none")); // Скрыть все блоки адресов

const defaultActiveButton = document.getElementById("1");
defaultActiveButton.classList.add("active_adr"); // Добавить класс активного элемента по умолчанию
addressBlocks[0].style.display = "block"; // Показать первый блок адреса

addressButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    addressBlocks.forEach((block, i) => {
      if (i === index) {
        block.style.display = "block";
        button.classList.add("active_adr");
      } else {
        block.style.display = "none";
        addressButtons[i].classList.remove("active_adr");
      }
    });
  });
});